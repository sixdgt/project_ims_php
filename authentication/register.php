<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title>
</head>
<body>
    <h1>User Register | IMS</h1>
    <form action="registerFunc.php" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="passkey">Passkey</label>
        <input type="text" name="passkey" id="passkey">
        <br>
        <label for="usertype">UserType</label>
        <select name="usertype" id="">
            <option value="1">Admin</option>
            <option value="2">User</option>
        </select>
        <br>
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>