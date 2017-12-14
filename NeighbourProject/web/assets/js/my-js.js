$(document).ready(function(){
    $(".msg-window").scrollTop(1000000);
    $('#openNewUserModal').click( function(){
        $('#newUserModal').modal("show")
    });
    $('#openConnectUserModal').click( function(){
        $('#connectUserModal').modal("show")
    });
    $('#toolsTable').DataTable({
        "lengthMenu": [7, 10, 25, 50]
    });

});