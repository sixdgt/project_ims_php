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
        <title>User Dashboard</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card p-5 mt-5">
            <h1>Welcome <?php echo $_SESSION['user']['username']; ?></h1>
            <div class="card-body">
                <a href="../config/logout_handler.php">Logout</a>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>