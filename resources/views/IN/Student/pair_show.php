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
    <?header("Content-Type:text/html; charset=utf-8");//重要顯示中文ˊ重要部分?>
</head>

<body>
<?php 
$user_id = $_GET["user_id"];
$student_object = new student_object('localhost','root','1qaz2wsx','study');
$sql = "SELECT  `company_name`  FROM `company` ";
$pair_data = $student_object-> select_me($table = "`pair`", $condition = "1", $order_by = "1", $fields = "`user_id`, `teacher_name`, `company_name`, `start_time`, `end_time`", $limit = "");
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