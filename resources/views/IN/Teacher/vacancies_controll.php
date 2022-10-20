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
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'teacher_object.php'; 
    ?>
    
</head>

<body>
    <?php
    $user_id =  $_SESSION["user_id"];
    $teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');
    $vacancies_data = $teacher_object -> select_me($table = "vacancies", $condition = "teacher_watch != '通過'",$order_by = "1", $fields = "*", $limit = "");
    
    ?>
    
    <body>
        <div id="wrap">
            <div id="content">
                <h1>實習應徵</h1>
                <div id="applyBox">
                    <?php foreach($vacancies_data as $value) { ?>
                        <div class="jobscont">
                            <div class="job_img">//-
                                <img src="../../image/content2.jpg"></img>
                            </div>
                            <div class="job_t">
                                <p><?php echo $value["vacancies_name"] ?></p>
                            </div>
                            <a href="vacancies_deal.php?user_id=<?= $user_id ?>&company_id=<?= $value["company_id"] ?>&vacancies_id=<?= $value["vacancies_id"] ?>"><img src="../../image/info-circle.svg"></a>
                            <!-- <img src="image/info-circle.svg" class="moreInfobtn"> -->
                        </div>      
                    <?php } ?>
                </div>
            </div> <!-- content -->
        </div> <!-- wrap -->
    </body>
    
    </html>