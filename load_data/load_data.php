<?php
$connect = mysqli_connect("localhost", "emon", "emon", "ajax");
$output = '';
$video_id = '';
sleep(1);
$sql = "SELECT * FROM tbl_video where video_id > " . $_POST['last_video_id'] . " LIMIT 2";

$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $video_id = $row["video_id"];
        $output .= '  
               <tbody>  
               <tr>  
               <td>' . $row["video_title"] . '</td>  
               </tr>
               </tbody>';
    }
    $output .= '  
               <tbody>
               <tr id="remove_row">  
                    <td><button type="button" name="btn_more" data-vid="' . $video_id . '" id="btn_more">more</button></td>  
               </tr>
               </tbody>  
     ';
    echo $output;
}
?>