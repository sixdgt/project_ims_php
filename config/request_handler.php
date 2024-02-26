<?php
// handling server method with $_SERVER[]
if($_SERVER['REQUEST_METHOD'] != "POST"){
    header("location: login.php?status=not allowed");
    exit();
}
