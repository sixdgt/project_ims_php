<?php
if(isset($_POST['login'])){
    // starting session
    session_start();

    // importing config file
    include("../database/config.php");
    include("../config/dashboard_handler.php");
    // taking user input parameter
    $inputUsername = "";
    $inputPassword = "";
    $inputUsertype = $_POST['usertype'];

    // php array
    $errorMsg = array();

    // first step user input validation
    if(isset($_POST['username'])){
        $inputUsername = $_POST['username'];
    } else {
        // associative
        $errorMsg = [
            "username" => "Field required"
        ];
    }

    if(isset($_POST['password'])){
        $inputPassword = $_POST["password"];
    } else {
        $errorMsg = [
            "password" => "Field required"
        ];
    }

    // response data
    $data = getUserByUsername($connection, $inputUsername);

    if($data == 0){
        echo "User is not registered";
        exit();
    }
    
    if(password_verify($inputPassword, $data['password']) &&
    $inputUsername === $data['username'] &&
    $inputUsertype === $data['usertype']){
        echo "Login Successfully";

        // storing single session data
        $_SESSION['username'] = $data['username'];
        
        // storing multiple session data
        $_SESSION["user"] = array(
            "username" => $data["username"],
            "usertype" => $data["usertype"],
            "email" => $data["email"],
        );

        $_SESSION['is_verified'] = $data['is_verified'];

        // redirecting user with respect to their types
        if($inputUsertype == 1){
            redirect_dashboard("admin");
            exit();
        } else if ($inputUsertype == 2){
            redirect_dashboard("user");
            exit();
        } else if ($inputUsertype == 3){
            redirect_dashboard("student");
            exit();
        }
    }

    echo "Invalid Username or password";
}