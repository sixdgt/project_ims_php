<?php

// function to set cookie 
function handleLoginAttempt(){
    $max_attempt = 3;
    $limit_time = 60;

    // checking if attempt is stored in session or not
    if(isset($_SESSION['login_attempt'])){
        $_SESSION['login_attempt']++;
    } else {
        $_SESSION['login_attempt'] = 1;
    }

    // checking max attempt
    if($_SESSION['login_attempt'] >= $max_attempt){
        // setting cookie
        setcookie('login_attempt', 'true', time() + $limit_time, '/');
        unset($_SESSION['login_attempt']);
    }
}

// to clear cookie
function clearLoginAttempt(){
    setcookie('login_attempt', '', time() - 3600, '/');
    unset($_SESSION['login_attempt']);
}