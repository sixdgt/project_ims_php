<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";

function sendEmail($sender, $receiver, $verification_code){
    $mail = new PHPMailer(true);
    try{
        // mail configuration
        // $mail->SMTPDebug = 2; // for displaying debug response message
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com"; // gmail STMP server
        $mail->Username = "c4crypt@gmail.com"; // Host Email User
        $mail->Password = "ngqrrrwndjvqszbe"; // Host App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
    
        // mail sender and receiver detail
        $mail->setFrom($sender, 'DAV College'); // sender
        $mail->addAddress($receiver, 'User Name'); // receipent
        // echo "Hello $verification_code";
        // mail body
        $mail->isHTML(true); // to embed HTML in mail body
        $mail->Subject = 'User Verification | IMS'; // mail subject
        $mail->Body = "Your accont has been created successfully. Your verification code is <strong>$verification_code</strong>"; // mail body
        $mail->send();
        echo "Email has been sent succefully.";
    } catch (Exception $e){
        echo "Fail to send email. Error Message: {$e->getMessage()}";
    }
}
