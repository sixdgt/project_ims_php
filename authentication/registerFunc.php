<?php
// database connection
include_once("../database/config.php");

// user registration
if(isset($_POST['register'])){
    require_once "../config/mail_handler.php";
    require_once '../config/random_string_handler.php';
    // user input
    $inputEmail = $_POST['email'];
    $inputUsername = $_POST['username'];
    $inputPasskey = $_POST['passkey'];
    $inputUserType = $_POST['usertype'];
    
    $data = getUserByUsername($connection, $inputUsername);

    if($data != 0){
        echo "Username already exist";
        exit();
    }
    
    // hashing password
    $hashPasskey = password_hash($inputPasskey, PASSWORD_BCRYPT);
    $verification_code = generateRandom();
    // building sql query
    $sql = "INSERT INTO ims_user(`email`, `username`, `passkey`, `user_type_id`, `is_removed`, `verification_code`) VALUES(
        '$inputEmail', '$inputUsername', '$hashPasskey', $inputUserType, 0, '$verification_code')";
    
    // calling user register function from config 
    if(!registerUser($connection, $sql)){
        echo "Request Failed!!";
        exit();
    }
    
    sendEmail("c4crytp@gmail.com", $inputEmail, $verification_code);
    header("location: login.php?status=success");
}