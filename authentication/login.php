<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS | Login</title>
</head>
<body>
    <h1>Login | IMS</h1>
    <form action="loginFunc.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <select name="usertype" id="usertype">
            <option value="1">Admin</option>
            <option value="2">User</option>
            <option value="3">Student</option>
        </select>
        <br>
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>