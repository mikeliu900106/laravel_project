<?php session_start(); 
if(!isset($_SESSION["user_id"]) || ($_SESSION["user_id"]=="")){
    ?>
    <script type="text/javascript">
        alert("請先登入才能使用");
    </script>
    <?php
    header("Refresh:0;url=../../login.php");

}

/*if(!isset($_SESSION["level"]) || ($_SESSION["level"]=="2")){
    ?>
    <script type="text/javascript">
        alert("您不是學生");
    </script>
    <?php
    header("Refresh:0;url=../../index.php");

}

*/
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'company_object.php'; 
    ?>
    
</head>
<body>
<form method="post" action="vacancies_change_controll.php">
        <?php 
        $vacancies_id = $_GET["vacancies_id"];
        ?>

        <div class="AccountBox CPN_RegisterBox">
            <h1>廠商註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <!-- 基本資料 -->
            <ul class="Section">
                <h3>徵才需求</h3>
                
                <li>
                    <label for="company_content">工作內容</label>
                    <input type="text" name="company_content" class="Account_text" style="width: 500px" placeholder="請輸入工作內容">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_time">工作時間</label>
                    <input type="text" name="company_time" class="Account_text" placeholder="請輸入工作時間">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_time">工作地點</label>
                    <input type="text" name="company_place" class="Account_text" placeholder="請輸入工作時間">
                </li>
                <li class=" li-inline">
                    <label for="company_money">工作待遇</label>
                    <input type="text" name="company_money" class="Account_text" placeholder="請輸入工作待遇">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_work_experience">工作經驗要求</label>
                    <input type="text" name="company_work_experience" class="Account_text" placeholder="工作經驗要求">
                </li>
                <li class="li-inline">
                    <label for="company_department">科系需求</label>
                    <input type="text" name="company_department" class="Account_text" placeholder="科系需求限制">
                </li>
                <li class="li-inline" style="margin-left: -25px">
                    <label for="company_Education">教育程度</label>
                    <input type="text" name="company_Education" class="Account_text" placeholder="教育程度限制">
                </li>
                <li class="li-inline">
                    <label for="company_safe">員工保險</label>
                    <input type="text" name="company_safe" class="Account_text" placeholder="請輸入員工保險">
                </li>
                <li>
                    <label for="company_other">其他補充事項</label>
                    <input type="hidden" name="sql_type" value = "update">
                    <input type="hidden" name="vacancies_id" value = "<?=$vacancies_id?>">
                    <textarea type="text" name="company_other" class="Account_text" placeholder="其他補充事項"></textarea>
                </li>
            </ul>

            <!-- <input type="submit" value="新增公司"> -->
            <!-- 登入 提交 -->
            <div class="bottom_row">
                <input class="submit_button" type="submit" value="提交" />
            </div>
    <script src="../../js/index.js"></script>
</body>

</html>