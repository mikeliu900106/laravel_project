<?php session_start(); 
if(!isset($_SESSION["user_id"]) || ($_SESSION["user_id"]=="")){
    ?>
    <script type="text/javascript">
        alert("請先登入才能使用");
    </script>
    <?php
    header("Refresh:0;url=../../login.php");

}
if(!isset($_SESSION["level"]) || ($_SESSION["level"] !="1")){
    ?>
    <script type="text/javascript">
        alert("您不是學生");
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
    <?php include "../../header.php";
        include 'student_object.php'; 
    ?>
    
</head>

<?php 
header("Content-Type:text/html; charset=utf-8");

$student_object = new student_object('localhost','root','1qaz2wsx','study');
$vacancies_data = $student_object -> select_me($table = "vacancies", $condition = "teacher_watch = '通過'",$order_by = "1", $fields = "*", $limit = "");
//$sql = "SELECT `company_id`, `company_name`  FROM `company` Limit  10";
echo $_SESSION['username'];
$user_id = $_SESSION['user_id'];
?>

<body>
    <div id="wrap">
        <div id="content">
            
            <div id="applyBox">
                <?php foreach($vacancies_data as $value) { ?>
                    <div class="jobscont">
                        <div class="job_img">
                            <img src="../../image/content2.jpg"></img>
                        </div>
                        <div class="job_t">
                            <p><?php echo $value["vacancies_name"] ?></p>
                            <?$vacancies_name =  $value["vacancies_name"]?>
                        </div>
                        <a href="apply_for.php?user_id=<?=$user_id?>&company_id=<?= $value["company_id"] ?>&vacancies_name=<?=$vacancies_name?>"><img src="../../image/info-circle.svg"></a>
                        <!-- <img src="image/info-circle.svg" class="moreInfobtn"> -->
                    </div>
                <?php } ?>
            </div>
        </div> <!-- content -->
    </div> <!-- wrap -->
    <script src="../../js/index.js"></script>
</body>

</html>