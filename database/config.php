<?php 
// database connection 
function doConnection(){
    // creates database connection
    $connection = mysqli_connect("localhost", "sixdgt", "1234", "project_ims_php");
    return $connection;
}

// building sql execution function
function getUserByUsername($connection, $param_username){
    // building select query
    $sql = "SELECT * FROM ims_user WHERE username={$param_username} AND is_removed=0";
    // executing query and it will return array object
    $data = mysqli_query($connection, $sql);
    $response = array();
    // checking if data exist
    if(mysqli_num_rows($data) > 0){
        // extracting array object return by query execution
        while($row = mysqli_fetch_array($data)){
            $response = [
                "username" => $row["username"],
                "email" => $row["email"],
                "password" => $row["passkey"],
            ];
        }
    }
    return $response;
}