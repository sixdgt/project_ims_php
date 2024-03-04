<?php
    session_start();

    if(isset($_SESSION['user'])){
        $usertype = $_SESSION['user']['usertype'];
        if($usertype === 1){
            echo "Access Forbidden";
            exit();
        }
    } else {
        echo "Access Forbidden";
        header("location: ../authentication/login.php?status=access forbidden");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card p-5 mt-5">
            <h1>Manage SHIFT</h1>
            <div class="card-body">
            <a href="index_shift.php" class="btn btn-primary mb-4">Back</a>
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label for="shift">Shift</label>
                        <input type="text" name="shift" id="shift" class="form-control">
                    </div>
                    <input type="submit" value="Add Shift" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>