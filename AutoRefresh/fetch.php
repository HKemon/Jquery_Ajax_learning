<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 7/30/2018
 * Time: 3:24 AM
 */

$connection = mysqli_connect('localhost', 'emon', 'emon', 'ajax');

$sql = "select * from tbl_tweet order by tweet_id desc";

$res = mysqli_query($connection, $sql);

//echo $res;

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
        echo '<p>' . $row['tweet'] . '</p>';
    }
}