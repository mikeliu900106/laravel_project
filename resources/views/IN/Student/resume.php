<?php session_start(); 
if(!isset($_SESSION["user_id"]) || ($_SESSION["user_id"]=="")){
    ?>
    <script type="text/javascript">
        alert("請先登入才能使用");
    </script>
    <?php
    header("Refresh:0;url=../../login.php");

}
if(!isset($_SESSION["level"]) || ($_SESSION["level"]!="1")){
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
    <meta http-equiv="content-type" charset="UTF-8" />
</head>

<body>
    <?php $user_id =$_SESSION["user_id"];
    $student_object = new student_object('localhost','root','1qaz2wsx','study');
    if ($student_object -> select_me($table = "`resume`", $condition = "`user_id` = '" . $user_id . "'", $order_by = "1", $fields = "*", $limit = "") -> num_rows > 0) {
        $resume_data = $student_object -> select_me($table = "`resume`", $condition = "1", $order_by = "1", $fields = "*", $limit = "");
        foreach ($resume_data as $value) {
            var_dump($value);
    ?>
            <div id="wrap">
                <div id="content">
                    <form action="resume_upload.php" method="post" enctype="multipart/form-data">
                        <div id="resumeBox">
                            <div class="profile">

                                <div class="profile-info-row">
                                    <div class="profile-info-name">
                                        <span>PDF履歷上傳</span>
                                    </div>
                                    <div class="profile-info-value">
                                        <a href='download.php?user_id=<?= $user_id ?>' target='_blank'>你的履歷下載</a>
                                    </div>
                                </div>
                                <div id="edit">
                                    <!-- <div id="edit-save">
                                        <input type="submit" value="儲存">
                                        <img src="../../image/check-square.svg"></img> 
                                    </div> -->
                                    <div id="edit-modify">
                                        <!-- <a class="edit-save" type="button" href="student_resume.php?<?= $user_id ?>">修改</a> -->
                                        <a href="resume_change.php?user_id=<?=$user_id?>">
                                            修改
                                            <img src="../../image/pencil-square.svg"></img>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
        } else {
            ?>
            <script type="text/javascript">
                alert("履歷沒填,將跳轉至履歷畫面");
            </script>
            <?php
            header("Refresh:0;url=resume_modify.php?user_id=" . $user_id);
        } ?>
                </div> <!-- profile -->
            </div> <!-- resumeBox -->
            </form>
            </div> <!-- content -->
            </div> <!-- wrap -->

            <script src="../../third/erTWZipcode/js/er.twzipcode.data.js"></script>
            <script src="../../third/erTWZipcode/js/er.twzipcode.min.js"></script>
            <script type="text/javascript">
                erTWZipcode();
            </script>
            <script src="../../js/index.js"></script>
</body>

</html>