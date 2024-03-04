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
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Dashboard</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card p-5 mt-5">
        <form action="" method="GET">
            <div class="form-group mb-3">
                <label for="code">Verification Code</label>
                <input type="text" name="verification_code" id="verification_code" class="form-control">
            </div>
            
            <input type="submit" value="Verify" name="verify" class="btn btn-primary col-12">
        </form>
        </div>
    </div>
    </body>
    </html>
