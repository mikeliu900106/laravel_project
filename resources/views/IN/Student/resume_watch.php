<?php
include 'student_object.php';
header("Content-Type:text/html; charset=utf-8");//重要顯示中文ˊ重要部分
?>

<?php
$filename = "/path/to/the/file.pdf";

$user_id = @$_GET["user_id"];   
echo $user_id;
$student_object = new student_object('localhost','root','1qaz2wsx','study');
$resume_data = $student_object-> select_me($table = "`resume`", $condition = "`user_id` = '".$user_id."'", $order_by = "1", $fields = " `path`, `file_name`", $limit = "");
$row_data = mysqli_fetch_array($resume_data,MYSQLI_ASSOC);

$real_file = $row_data["path"] . $row_data["file_name"];
echo $real_file;




    header("Content-type: application/pdf");
    header("Content-Length: " . filesize($real_file));
    readfile($real_file);

       //header("Content-type: application/doc");
        //header("Content-Length: " . filesize($real_file));
        //readfile($real_file);




// header("Content-Length: " . filesize($real_file));
// header("Content-Length: " . filesize($real_file));
   

// // 将文件发送到浏览器。

// readfile($real_file);
?>


















