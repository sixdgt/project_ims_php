<?php
// imported from config
include_once "../config/request_handler.php";

if(isset($_POST['login'])){
    // starting session
    session_start();
    // importing config file
    include("../database/config.php");
    include("../config/dashboard_handler.php");
    include("../config/login_attempt_handler.php");

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
    
    // checking cookies value to limit login attempt 
    if(isset($_COOKIE['login_attempt'])){
        // cookie set time - current time
        $limitAttempt = (int)$_COOKIE['login_attempt'] - time();
        echo "Try again later after $limitAttempt. Go to Login <a href='login.php'>Click Here</a>";
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

       // clearing cookie to remove login attempt sessions and cookie once the login credentials are correct

        clearLoginAttempt();

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
    // calling login attempt handler function from 'login_attempt_handler' to set cookie if login credentials are wrong
    handleLoginAttempt();
    echo "Invalid Username or password";
    header("location: login.php?status=login fail");
}