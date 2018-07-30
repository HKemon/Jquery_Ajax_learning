<?php
$connect = mysqli_connect("localhost", "emon", "emon", "ajax");
$sql = "SELECT * FROM tbl_video LIMIT 2";
$result = mysqli_query($connect, $sql);
$video_id = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Load Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write("<script src='jquery-3.3.1.js'><\/script>");
    </script>
    <script>
        $(document).ready(function () {
            $(document).on('click', '#btn_more', function () {
                var last_video_id = $(this).data('vid');
                $('#btn_more').html("Loading ... ");
                $.ajax({
                    url: 'load_data.php',
                    method: 'POST',
                    data: {last_video_id: last_video_id},
                    dataType: 'text',
                    success: function (data) {
                        if (data != '') {
                            $('#remove_row').remove();
                            $('#load_data_table').append(data);
                        } else {
                            $('#btn_more').html("No More Data ... ");
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>

<div>
    <h2>Load More Data using Ajax Jquery</h2><br/>
    <table id="load_data_table">
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <!--                <td>--><?php //echo $row["video_id"]; ?><!--</td>-->
                <td><?php echo $row["video_title"]; ?></td>
            </tr>
            <?php $video_id = $row["video_id"];
        } ?>
        <tr id="remove_row">
            <td>
                <button type="button" name="btn_more" data-vid="<?php echo $video_id; ?>" id="btn_more">more</button>
            </td>
        </tr>
    </table>
</div>
</body>
</html>