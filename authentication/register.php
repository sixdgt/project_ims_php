<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container row">
        <div class="card col-md-6 offset-3 p-5 mt-5">
            <div class="card-header">
                <div class="card-title"><h1>User Register | IMS</h1></div>
            </div>
            <div class="card-body">
                <form action="registerFunc.php" method="post">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="passkey" id="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="1" class="form-control">Admin</option>
                            <option value="2" class="form-control">User</option>
                            <option value="3" class="form-control">Student</option>
                        </select>
                    </div>
                    <input type="submit" value="Register" name="register" class="btn btn-primary col-12">
                </form>
            </div>
            <div class="card-footer">
                Already have an account? <a href="login.php">Login Now</a>
            </div>
        </div>
    </div>
</body>
</html>