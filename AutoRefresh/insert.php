<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 7/27/2018
 * Time: 8:18 PM
 */

$connection = mysqli_connect('localhost','emon','emon','ajax');
//echo "151";
$sql = "insert into tbl_tweet(tweet) values ('".$_POST["tweet"]."')";

mysqli_query($connection,$sql);