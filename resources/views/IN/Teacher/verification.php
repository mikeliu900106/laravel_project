<html>

<head>
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/header.css">
        <?php include "../../header.php";
            include "teacher_object.php";?>
        <script src = "../../js/index.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <form action="sure.php" method="POST">

        <div class="accountBox">
            <h1 class="" style="font-size: 50px">Register</h1>
            <div class="verification">
                <input class="account_text" type="text" placeholder="驗證碼" name="verification_button" style="width: 300px; margin-left: -5px;" />
                
            </div>
            <?php

            $teacher_username = @$_POST["teacher_username"];
            $teacher_password = @$_POST["teacher_password"];
            $teacher_real_name = @$_POST["teacher_real_name"];
            $teacher_email = @$_POST["teacher_email"];
            echo $teacher_email;
            echo $teacher_username;
            echo  $teacher_password;
            $teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');
            $user_id = $teacher_object -> get_teacher_id();
            $teacher_object -> add_teacher($user_id,$teacher_username,$teacher_password,$teacher_email, $teacher_real_name,$url ="signup.php");
            echo $user_id;
            $random = $teacher_object -> codestr();
            $teacher_object -> teacher_check_mail_go($user_id,$teacher_email,$teacher_real_name,$random,$messange = "",$url = "signup.php")
            ?>
            <div class="bottom_row">
                    <input type="hidden" value="<? echo $com_num ?>" name="id">
                    <input type="hidden" value="<? echo $yanzhen ?>" name="ram_num">
                    <input class="Submit_button" type="submit" value="驗證" />
            </div>
            <!-- 回登入 回首頁 -->
            <a href="../../login.php"><img src="../../image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
            <a href="../../index.php"><img src="../../image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
        </div>
    </form>
</body>

</html>