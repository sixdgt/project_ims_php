<?php 
// creates database connection
$connection = mysqli_connect("localhost", "sixdgt", "1234", "project_ims_php");

// building sql execution function
function getUserByUsername($connection, $param_username){
    // building select query
    $sql = "SELECT * FROM ims_user WHERE username='{$param_username}' AND is_removed=0";
    
    $response = 0;

    try{
    // executing query and it will return array object
        $data = mysqli_query($connection, $sql);
        // checking if data exist
        if(mysqli_num_rows($data) > 0){
            // extracting array object return by query execution
            while($row = mysqli_fetch_array($data)){
                $response = [
                    "username" => $row["username"],
                    "email" => $row["email"],
                    "password" => $row["passkey"],
                    "usertype" => $row["user_type_id"],
                    "is_verified" => $row["is_verified"]
                ];
            }
        }
    } catch(Exception $e){
       $response = 0;
    }
    return $response;
}

function registerUser($connection, $sql){
    $status = false;
    try {
        $res = mysqli_query($connection, $sql);
        $status = true;
    } catch(Exception $e){
        $status = false;
    }
    
    return $status;
}