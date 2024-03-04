<?php 
require_once "../../database/config.php";

function add_shift(){
    $shift = $_REQUEST['shift'];
    $sql = "INSERT INTO ims_shift(`shift`) VALUES('$shift')";

    $status = false;

    $res = mysqli_query($GLOBALS['connection'], $sql);

    if($res){
        $status = true;
    }
    return $res;
}

function load_shift(){
    $response_data = array();

    $sql = "SELECT * FROM ims_shift WHERE is_removed=0";

    $db_data = mysqli_query($GLOBALS['connection'], $sql);
    if(mysqli_num_rows($db_data) > 0){
        while($row = mysqli_fetch_array($db_data)){
            $response_data[] = array(
                "shift_id" => $row['shift_id'],
                "shift" => $row['shift']
            );
        }
    }

    return $response_data;
}

