<?php 
require_once "../config/user_handler.php";
session_start();

if(isset($_GET['verify'])){
    $code = $_GET['verification_code'];
    if($code !== ""){        
        if(verifyUser($_SESSION['user']['username'], $code)){
            $_SESSION['is_verified'] = 1;
            header("location: user_dashboard.php?status=success");
            exit();
        } else {
            echo "Invalid code";
        }
       
    } else {
        echo "Please enter verification code first";
    }
}
?>
<form action="" method="GET">
    <label for="code">Verification Code</label>
    <input type="text" name="verification_code" id="verification_code">
    <input type="submit" value="Verify" name="verify">
</form>