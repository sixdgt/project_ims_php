<?php
    require_once "../../config/shift_handler.php";
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
            <h1>Manage SHIFT </h1>
            <div class="card-body">
                <a href="add_shift.php" class="btn btn-primary mb-4">Add Shift</a>
                <a href="../admin_dashboard.php?status=success" class="btn btn-primary mb-4">Dashboard</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Shift</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = load_shift();
                            for($i = 0; $i < sizeof($data); $i++){
                                ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $data[$i]['shift']; ?></td>
                                        <td><a href="edit_shift.php?id=<?php echo $data[$i]['shift_id']; ?>">Edit</a></td>
                                        <td><a href="edit_shift.php?id=<?php echo $data[$i]['shift_id']; ?>">Delete</a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>