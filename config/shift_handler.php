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

function update_shift(){
    $shift = $_REQUEST['shift'];
    $id = $_REQUEST['shift_id'];
    $sql = "UPDATE ims_shift SET shift='$shift' WHERE shift_id=$id";

    $status = false;

    $res = mysqli_query($GLOBALS['connection'], $sql);

    if($res){
        $status = true;
    }
    return $res;
}

function load_shift_by_id(){
    $id = $_GET['id'];

    $response_data = array();

    $sql = "SELECT * FROM ims_shift WHERE is_removed=0 AND shift_id=$id";

    $db_data = mysqli_query($GLOBALS['connection'], $sql);
    if(mysqli_num_rows($db_data) > 0){
        while($row = mysqli_fetch_array($db_data)){
            $response_data = array(
                "shift_id" => $row['shift_id'],
                "shift" => $row['shift']
            );
        }
    }

    return $response_data; 
}

function remove_shift(){
    $id = $_POST['shift_id'];
    $sql = "UPDATE ims_shift SET is_removed=1 WHERE shift_id=$id";
    
    // $rm_sql = "DELETE FROM ims_shift WHERE shift_id=$id";
    // we have is_removed attribute so that we can update it instead of delete it from database therefore
    // update query is used instead of delete query
    $status = false;

    $res = mysqli_query($GLOBALS['connection'], $sql);

    if($res){
        $status = true;
    }
    return $res;
}
