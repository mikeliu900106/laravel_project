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
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    
    <?php include "../../header.php";
          include 'company_object.php';
          header("Content-Type:text/html; charset=utf-8"); //重要顯示中文ˊ重要部分
    ?>
    
</head>

<body>
    <div id="wrap">
        <?php
        $user_id = $_SESSION["user_id"];
        ?>

        <div id="content" style="height: 1300px;">
            

            <div id="responseBox">
                <ul>
                    <?php
                    $company_object = new company_object('localhost','root','1qaz2wsx','study');
                    $sql = "SELECT `chat_id`, `chat_maker`, `chat_subject`, `chat_content`, `chat_date` FROM `chat`  ";
                    $chat_data = $company_object -> select_me($table = "`chat`", $condition = "1", $order_by = "1", $fields = "`chat_id`, `chat_maker`, `chat_subject`, `chat_content`, `chat_date`", $limit = "");
                    
                    foreach ($chat_data as $vlaue) {
                    ?>
                        <li>
                            <div class="author">作者：<? echo $vlaue["chat_maker"] ?></div>
                            <div class="article">主旨：<? echo $vlaue["chat_subject"] ?></div>
                            <div class="time">時間：<? echo $vlaue["chat_date"] ?></div>
                            <hr>
                            <div class="message"><? echo $vlaue["chat_content"] ?></div>
                        </li>
                    <?php } ?>
                </ul>

                <form class="leavecomment" action="response_input.php" method="post">
                    <div class="author">
                        <input name="user_id" type="hidden" value =<?=$user_id?>>
                        <p>作者</p><input name="maker" type="text">
                    </div>
                    <div class="gist">
                        <p>主旨</p><input name="subject" type="text">
                        <br>
                    </div>
                    <div class="content">
                        <p>內容</p><textarea name="content" id="" cols="30" rows="10"></textarea>
                        <input type="submit" value="送出">
                    </div>
                </form>
            </div>
        </div> <!-- content -->
    </div> <!-- wrap -->
    <script src = "../../js/header.js"></script>
</body>

</html>