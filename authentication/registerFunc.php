<?php
// user registration
if(isset($_POST['register'])){
    // database connection
    include_once("../database/config.php");

    // user input
    $inputEmail = $_POST['email'];
    $inputUsername = $_POST['username'];
    $inputPasskey = $_POST['passkey'];
    $inputUserType = $_POST['usertype'];

    // establising db connection
    $connection = dbConnection();

    if(getUserByUsername($connection, $inputUsername) == null){

        // hashing password
        $hashPasskey = password_hash($inputPasskey, PASSWORD_BCRYPT);

        // building sql query
        $sql = "INSERT INTO ims_user(`email`, `username`, `passkey`, `user_type_id`, `is_removed`) VALUES(
            '$inputEmail', '$inputUsername', '$hashPasskey', $inputUserType, 0
        )";

        // calling user register function from config 
        if(!registerUser($connection, $sql)){
            echo "Request Failed!!";
        }
        echo "Registered successfully!!";

    } else {
        echo "Username already exist";
    }
}