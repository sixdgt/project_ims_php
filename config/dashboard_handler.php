<?php

function redirect_dashboard($usertype){
    $page = strtolower($usertype);
    header("location: ../pages/{$page}_dashboard.php?status=success");
}