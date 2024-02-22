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

    // building sql query
    $sql = "INSERT INTO ims_user(`email`, `username`, `passkey`, `user_type_id`, `is_removed`) VALUES(
        '$inputEmail', '$inputUsername', '$hashPasskey', $inputUserType, 0
    )";

    // calling user register function from config 
    if(!registerUser($connection, $sql)){
        echo "Request Failed!!";
        exit();
    }

    sendEmail("sender_email_address", $inputEmail, generateRandom());
    echo `<script>alert("Registered successfully!!")</script>`;
    header("location: login.php?status=success");
}