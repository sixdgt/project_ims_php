<?php
    require_once "../../config/shift_handler.php";
    session_start();
    $message = "";
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

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(remove_shift()){
            $message = "Shift removed successfully!!";
        }
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

    <!-- font awesome icon cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="card p-5 mt-5">
            <h1>Manage SHIFT </h1>
            <?php if($message != ""){
                ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
                <?php
            }
            ?>
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
                                        <td>
                                            <a href="edit_shift.php?id=<?php echo $data[$i]['shift_id']; ?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen"></i> Edit</a></td>
                                        <td>
                                            <form action="" method="POST">
                                                <input type="hidden" name="shift_id" value="<?php echo $data[$i]['shift_id']; ?>">
                                                <button type="submit" value="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
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