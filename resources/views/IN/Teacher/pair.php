
<?php session_start(); 
if(!isset($_SESSION["user_id"]) || ($_SESSION["user_id"]=="")){
    ?>
    <script type="text/javascript">
        alert("請先登入才能使用");
    </script>
    <?php
    header("Refresh:0;url=../../login.php");

}
if(!isset($_SESSION["level"]) || ($_SESSION["level"] !="2")){
    ?>
    <script type="text/javascript">
        alert("您不是老師");
    </script>
    <?php
    header("Refresh:0;url=../../index.php");

}
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    

    
    <?php 
        include "../../header.php";
        include 'teacher_object.php'; 
    ?>
    <?header("Content-Type:text/html; charset=utf-8");//重要顯示中文ˊ重要部分?>
</head>

<body>
<?php 
$user_id = $_SESSION["user_id"];
$teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');
$pair_data = $teacher_object-> select_me($table = "`pair`", $condition = "1", $order_by = "1", $fields = "`user_id`, `teacher_name`, `company_name`, `start_time`, `end_time`", $limit = "");
    ?>
    <?foreach($pair_data as $value){?>
    <table style = "width:500px;border: black 1px solid;position: absolute;left: 50%;top: 20%;transform: translateX(-50%) translateY(-50%);">
        <tr>
            <th>教授名稱</th>
            <th>公司名稱</th>
            <th>開始時間</th>
            <th>結束時間</th>
        </tr>
        <tr>
            <td><?echo $value["teacher_name"]?></td>
            <td><?echo $value["company_name"]?></td>
            <td><?echo $value["start_time"]?></td>
            <td><?echo $value["end_time"]?></td>
        </tr>
    </table>
    <?}  ?>
    </div> <!-- wrap -->
    <script src = "../../js/header.js"></script>
</body>

</html>