<?php

function verifyUser($username, $code){
    $connection = mysqli_connect("localhost", "sixdgt", "1234", "project_ims_php");
    $check_sql = "SELECT * FROM ims_user WHERE username='$username' AND verification_code='$code'";
    $status = false;
    try{
        $data = mysqli_query($connection, $check_sql);
    } catch (Exception $e){
        echo $e->getMessage();
    }
    if(!mysqli_num_rows($data) == 0){
        $update_sql = "UPDATE ims_user SET is_verified=1 WHERE username='$username' AND verification_code='$code'";

        $res = mysqli_query($connection, $update_sql);
        $status = true;
    }
    return $status;
}