<?php
session_start();

if(!isset($_SESSION["user_id"]) || ($_SESSION["user_id"]=="")){
    ?>
    <script type="text/javascript">
        alert("請先登入才能使用");
    </script>
    <?php
    header("Refresh:0;url=../../login.php");

}
if(!isset($_SESSION["level"]) || ($_SESSION["level"] !="3")){
    ?>
    <script type="text/javascript">
        alert("您不是廠商");
    </script>
    <?php
    header("Refresh:0;url=../../index.php");

}


?>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'company_object.php'; 
    ?>
    
</head>

    <body>  
        <?php 
            $user_id = $_SESSION["user_id"];
            $company_object = new company_object('localhost','root','1qaz2wsx','study');
            $vances_data = $company_object -> select_me($table="vacancies",$condition = "company_id = '{$user_id}'", $order_by = "1", $fields = "*", $limit = "")
            
        ?>
        <table style = 
            "border: black 1px solid;
            margin-left:auto; 
            margin-right:auto;
            border-collapse: collapse;">
            <?php foreach($vances_data as $value) { ?>
            <tr>
                <th>工資</th>
                <th>工作時間</th>
                <th>工作地點</th>
                <th>工作內容</th>
                <th>工作詳情解釋</th>
                <th>教育程度需求</th>
                <th>工作職位</th>
                <th>工作有關事務</th>
                <th>工作保險</th>
                <th>教師是否同意刊登</th>
                <th>教師名稱</th>
                <th>修改</th>
            </tr>
            <tr>
                <td><?echo$value["company_money"]?></td>
                <td><?echo$value["company_time"]?></td>
                <td><?echo$value["company_place"]?></td>
                <td><?echo$value["company_content"]?></td>
                <td><?echo$value["company_work_experience"]?></td>
                <td><?echo$value["company_Education"]?></td>
                <td><?echo$value["company_department"]?></td>
                <td><?echo$value["company_other"]?></td>
                <td><?echo$value["company_safe"]?></td>
                <td><?echo$value["teacher_watch"]?></td>
                <td><?echo$value["teacher_name"]?></td>
                <?$vacancies_id = $value["vacancies_id"] ?>
                <td><a href="vacancies_change.php?vacancies_id=<?=$vacancies_id ?>">修改</a></td>
            </tr>
            <?php }?>
        </table>
        <script src = "../../js/header.js"></script>
    </body>
 



</html>








