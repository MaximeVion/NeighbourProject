<?php
namespace NeighbourBundle\Controller;
use NeighbourBundle\Entity\User;
use NeighbourBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $action = $request->request->get('action');
        $user = new User;
        $add_user_form = $this->get('form.factory')->create(UserType::class, $user);

        if ($request->isMethod('POST') && $action === "addUser") {
            /*$checkIfAlreadyHere = $this->get('devoir.doublon');
            $adress = $request->request->get('devoirbundle_bar')["adress"];
            if ($checkIfAlreadyHere->isAlreadyHere($adress)) {
                throw new \Exception('Le bar est deja sur dans la base');
            }*/
            $add_user_form->handleRequest($request);

            if ($add_user_form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }

        }else if ($request->isMethod('POST') && $action === "connectUser") {

            $userRepo = $this->getDoctrine()->getManager()->getRepository('NeighbourBundle:User');
            $userPseudo = $request->request->get('pseudoConnexion');
            $user = $userRepo->findOneByPseudo($userPseudo);

            if($user){

                $session = new Session();
                $session->set('user', $user);

                return $this->redirectToRoute('neighbour_homepage', [
                    "user" => $user
                ]);

            }else{

                return $this->render('NeighbourBundle:Home:index.html.twig', [
                    "notif" => "wrongpseudo",
                    "newUser" => $add_user_form->createView()
                ]);
            }
           
        }

        return $this->render('NeighbourBundle:Home:index.html.twig', [
            "newUser" => $add_user_form->createView()
        ]);
    }
    public function homeAction(Request $request)
    {
        $session = new Session();
        $uSession = $session->get('user');
        $action = $request->request->get('action');

        $toolRepo = $this->getDoctrine()->getManager()->getRepository('NeighbourBundle:Tool');
        $tools = $toolRepo->findAll();

        if($uSession == null){

            return $this->redirectToRoute('neighbour_connexion');
        }
        
        if ($request->isMethod('POST') && $action === "logOffUser") {

            $session->invalidate();
            $session->clear();

            return $this->redirectToRoute('neighbour_connexion');
        }

        return $this->render('NeighbourBundle:Home:home.html.twig', [
            "uSession" => $uSession,
            "tools"=>$tools
        ]);
    }
}