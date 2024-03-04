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