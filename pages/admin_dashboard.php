<?php
require_once "../config/admin_session_handler.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card p-5 mt-5">
            <h1>Welcome to Admin Dashboard <?php echo $_SESSION['user']['username']; ?></h1>
            <div class="card-body">
                <a href="../config/logout_handler.php">Logout</a>
            </div>
            <div class="card-footer">
                <a href="shift/index_shift.php" class="btn btn-primary">SHIFT</a>
                <a href="shift/index_shift.php" class="btn btn-primary">COURSE</a>
                <a href="shift/index_shift.php" class="btn btn-primary">STUDENT</a>
                <a href="shift/index_shift.php" class="btn btn-primary">MENTOR</a>
            </div>
        </div>
    </div>
</body>
</html>