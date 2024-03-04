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
                <a href="add_shift.php" class="btn btn-primary mb-4">Add Shift</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Shift</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Morning</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>