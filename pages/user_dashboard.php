<?php
require_once "../config/user_session_handler.php";

if($_SESSION['is_verified'] == 0){
    echo "Please verify your email..";
    ?>
    <a href="user_verify.php?status=success">Click Here</a>
    <?php
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        Verified
    </body>
    </html>
    <?php
}
?>