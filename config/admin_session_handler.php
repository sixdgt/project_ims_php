<?php
session_start();

if(isset($_GET['status']) && isset($_SESSION['user'])){

    $status = $_GET['status'];
    $username = $_SESSION['user']['username'];
    $usertype = $_SESSION['user']['usertype'];

    if($status !== "success" && $usertype === 1){
        echo "Access Forbidden";
        exit();
    }
} else {
    echo "Access Forbidden";
    header("location: ../authentication/login.php?status=access forbidden");
    exit();
}