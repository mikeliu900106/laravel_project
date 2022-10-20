<html>

<head>
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/account.css">
    <?php include "header.php";?>
</head>

<body>
    <form action="" method="post">
        <div class="AccountBox">
            <h1 class="" style="font-size: 50px">註冊</h1>
            <div class="Register_select">
                <a href="IN/student/signup.php" class="selectBox">
                    <img src="image/畢業帽帽.png" alt="">
                    <p>我是學生</p>
                </a>
                <a href="IN/company/signup.php" class="selectBox">
                    <img src="image/廠商.png" alt="">
                    <p>我是廠商</p>
                </a>
                <a href="IN/teacher/signup.php" class="selectBox">
                    <img src="image/教師3.jpg" alt="">
                    <p>我是教師</p>
                </a>
            </div>

            <!-- 登入 提交 -->
            <div class="bottom_row">
                <!-- <input class="Submit_button" type="submit" value="Submit" /> -->
            </div>

            <!-- 回登入 回首頁 -->
            <a href="login.php"><img src="image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
            <a href="index.php"><img src="image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
        </div>
    </form>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/index.js"></script>
</body>

</html>