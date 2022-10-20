

<?php

//[*郵件發送邏輯處理過程*系統核心配置文件*]

include "student_object.php";
$username = @$_POST['username'];
$password = @$_POST['password'];
$email = @$_POST['email'];
echo $username;
echo $password;
echo $email;
?>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <?php include "../../header.php"?>
    <script src = "../../js/index.js"></script>

</head>

<body>
    <form action="sure.php" method="POST">

        <div class="AccountBox">
            <h1 class="" style="font-size: 50px">Register</h1>
            <div class="verification">
                <input class="Account_text" type="text" placeholder="驗證碼" name="verification_button" style="width: 300px; margin-left: -5px;" />

            </div>
            <?php
            //$sql = "SELECT * FROM `user` where `user_name` ='" . $username . "'";
            $student_object = new student_object('localhost','root','1qaz2wsx','study');
            $user_id =  $student_object -> get_student_id();
            echo $user_id;
            $random =  $student_object -> codestr();
            $student_object -> add_student($user_id,$username,$password,$email,"student_signup.php");
            $student_object -> student_check_mail_go($user_id,$email,$username,$random,$messange = "","student_signup.php");
                        
            ?>
                <!-- 註冊資料輸入欄 -->

                <!-- 登入 提交 -->
                <div class="bottom_row">
                    <input type="hidden" value="<? echo $username ?>" name="username">
                    <input type="hidden" value="<? echo $password ?>" name="password">
                    <input type="hidden" value="<? echo $random ?>" name="ram_num">
                    <input type="hidden" value="<? echo $email ?>" name="email">
                    <input type="hidden" value="<? echo $user_id ?>" name="user_id">
                    <input class="Submit_button" type="submit" value="驗證" />
                </div>
            <?php
            ?>
            <!-- 回登入 回首頁 -->
            <a href="../../login.php"><img src="../../image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
            <a href="../../index.php"><img src="../../image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
        </div>
    </form>
</body>

</html>
?>