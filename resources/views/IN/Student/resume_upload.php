
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php 
        include "../../header.php";
        include 'student_object.php';
    ?>

</head>
<?php
include "../student_object.php";
header("Content-Type:text/html; charset=utf-8"); //重要顯示中文ˊ重要部分
$name = @$_POST["name"];
$sex = @$_POST["sex"];
$birthday = @$_POST["birthday"];
$email = @$_POST["email"];
$contact = @$_POST["contact"];
$phone = @$_POST["phone"];
$home = @$_POST["home"];
$other = @$_POST["other"];
$county = @$_POST["county"];
$district = @$_POST["district"];
$address = @$_POST["address"];
$user_id = @$_POST["user_id"];
?>
<body>
    <?php
echo $name . "<br>";
echo $sex . "<br>";
echo $birthday . "<br>";
echo $email . "<br>";
echo $contact . "<br>";
echo $phone . "<br>";
echo $home . "<br>";
echo $other . "<br>";
echo $county . "<br>";
echo $district . "<br>";
echo $address . "<br>";
echo $user_id . "<br>";

echo $_FILES["file_Upload"]["tmp_name"];
$student_object = new student_object('localhost','root','1qaz2wsx','study');
$insert_name = $_FILES["file_Upload"]["name"]; //insert 用
$upload_name = iconv("utf-8", "big5", $_FILES["file_Upload"]["name"]); //用來上傳
//$uploadfile = iconv("utf-8", "big5", $_FILES["file_Upload"]["name"]); //問題
$file_path = " C:\staff_mysql\final_project\upload\ "; //此行為絕對路徑

if ($_FILES["file_Upload"]["error"] == 0) {
    
    if (move_uploaded_file($_FILES["file_Upload"]["tmp_name"], $file_path . $upload_name)) {
        echo "上傳成功<br />";
        echo "檔案名稱：" . $_FILES["file_Upload"]["name"] . "<br />";
        echo "檔案類型：" . $_FILES["file_Upload"]["type"] . "<br />";
        echo "檔案大小：" . $_FILES["file_Upload"]["size"] . "<br />";
        $student_object -> add_resume($user_id,$name,$sex ,$birthday ,$email, $contact, $phone , $home,  $county ,  $district,  $address ,  $file_path , $insert_nam ,$url ="student_resume_modify.php");
    ?>
        <br>
        <a href = "resume_watch.php?user_id=<?=$user_id?>" target="_blank">顯示你的履歷</a>
    <?php
        echo "<a href='javascript:window.history.back();'>回上一頁</a>";
    } else {
        echo "上傳失敗! ";
        echo "<a href='javascript:window.history.back();'>回上一頁</a>";
    }
}
?>
    <script src="../../js/index.js"></script>
</body>
</html>