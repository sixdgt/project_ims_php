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
        if(update_shift()){
            $message = "Shift updated successfully!!";
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
</head>
<body>
    <div class="container">
        <div class="card p-5 mt-5">
            <h1>Manage SHIFT</h1>
            <?php if($message != ""){
                ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
                <?php
            }
            ?>
            <div class="card-body">
            <a href="index_shift.php" class="btn btn-primary mb-4">Back</a>
                <!-- loading shift by id from database -->
                <?php $data = load_shift_by_id(); ?>
                
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label for="shift">Shift</label>
                        <input type="text" name="shift" id="shift" value="<?php echo $data['shift']; ?>" class="form-control">
                    </div>
                    <input type="hidden" name="shift_id" value="<?php echo $data['shift_id']; ?>">
                    <input type="submit" value="Update Shift" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>
</html>