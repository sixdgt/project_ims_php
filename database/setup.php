<?php
// defining database configuration properties
$localhost = "localhost"; // we can also define 127.0.0.1 
$user = "sixdgt"; // database user
$password = "1234"; // database user password

// redirect function
function redirect(){
    // header() function is use to redirect page in php
    header("Location: ../authentication/login.php");
}

// this function takes 4 params and establish db connection
function createConnection($param_host, $param_user, $param_password, $param_db){
    $connection = mysqli_connect($param_host, $param_user, $param_password, $param_db);
    return $connection;
}

// this function takes two params and create database table
function executeQuery($connection, $sql){
    $status = false;
    // executing sql query with connection object
    // mysqli_query() takes
    // first arg as connection
    // second arg as query string
    if(mysqli_query($connection, $sql)){
        $status = true;
    }
    return $status;
}

// establising database connection
$connection = mysqli_connect($localhost, $user, $password);

// here $connection is the connection object
if($connection){
    // building database create sql query in String
    $sql = "CREATE DATABASE project_ims_test";

    // calling our custom query execution function
    // handling exception so that our program would not stop
    try{
        $dbCreate = executeQuery($connection, $sql);
        echo "Database created successfully<br>";
    } catch(Exception $e){
        echo "Database already exist<br>";
    }
    
    // database name
    $dbName = "project_ims_test";

    // calling our custom db connection function that returns connection object
    $imsConnection = createConnection($localhost, $user, $password, $dbName);

    // creating database tables
    // 1. usertype
    $utSql = "CREATE TABLE ims_usertype(
        ut_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        userytype VARCHAR(200) NOT NULL,
        is_removed TINYINT NOT NULL DEFAULT 0,
        is_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        is_updated_at DATETIME NULL,
        is_removed_at DATETIME NULL
    )";
    // handling exception while creating tables
    try{
        $utCreate = executeQuery($imsConnection, $utSql);
        echo "Table created successfully!!<br>";
    } catch(Exception $e){
        echo "Table already exist!!<br>";
        echo "Error: {$e->getMessage()}<br>";
    } finally{
        // finally execute anyhow either exception raise or handle
        redirect();
    }
    
} else {
    echo "No connection found!!";
    exit();
}
