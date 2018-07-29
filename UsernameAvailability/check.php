<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 7/30/2018
 * Time: 3:24 AM
 */

$connection = mysqli_connect('localhost', 'emon', 'emon', 'ajax');

$sql = "select * from tbl_user where user_name = '".$_POST["user_name"]."'";

$res = mysqli_query($connection, $sql);

//echo $res;

if (mysqli_num_rows($res) > 0) {
    echo "Not Available";
}else echo "Available";