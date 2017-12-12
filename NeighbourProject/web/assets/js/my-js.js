$(document).ready(function(){
    $('#openNewUserModal').click( function(){
        $('#newUserModal').modal("show")
    });
    $('#openConnectUserModal').click( function(){
        $('#connectUserModal').modal("show")
    });

    $('#toolsTable').DataTable();
});