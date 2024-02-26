<?php 
// for logout we can simply destroy session
function logout(){
    session_start();
    session_destroy();
    echo "Logout successfully";
    header("location: ../authentication/login.php?status=logout");
    exit();
}

logout();