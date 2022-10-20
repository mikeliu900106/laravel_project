<?php session_start()?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once "sql_function.php";
    $test_username = @$_POST["login_username"];
    $test_password = @$_POST["login_password"];



    $sql_function = new sql_function('localhost','root','1qaz2wsx','study');
    $login_data = $sql_function -> select_me($table="`login`",$condition = "`username`= '{$test_username}'", $order_by = "1", $fields = "`id`, `username`, `password`, `level`", $limit = "");

    $login_value = $login_data -> fetch_assoc();
    $user_id = $login_value["id"];
    $username = $login_value["username"];
    $password = $login_value["password"];
    $level = $login_value["level"];
    if (($test_password) == "" && ($test_username) == "") {
        ?>
            <script type="text/javascript">
                alert("帳號密碼沒寫,兩秒後返回登入畫面");
            </script>
        <?php
        header("Refresh:1;url=login.php");
    } elseif (($test_username) == "") {
        ?>
            <script type="text/javascript">
                alert("帳號沒寫,兩秒後返回登入畫面");
            </script>
        <?php
        header("Refresh:2;url=login.php");
    } elseif (($test_password) == "") {
        ?>
            <script type="text/javascript">
                alert("密碼沒寫,兩秒後返回登入畫面");
            </script>
        <?php
        header("Refresh:2;url=login.php");
    } elseif ($test_password != $password) { //當對應密碼不對時跳回index.html介面 
        ?>
            <script type="text/javascript">
                alert("密碼錯誤");
            </script>
        <?php
        header("Refresh:2;url=login.php");
    ?>
        <a href="login.php">回上一頁</a>
    <?php
    } elseif ($test_username == $username && $test_password == $password) {


        switch ($level) {
            case 1:
                $_SESSION["user_id"] = $user_id;
                $_SESSION["username"] = $username;

                $_SESSION["level"] = $level;
                header('location:index.php');
                break;
            case 2:
                $_SESSION["user_id"] = $user_id;
                $_SESSION["level"] = $level;
                header("location:index.php");
                break;
            case 3:
                $_SESSION["user_id"] = $user_id;
                $_SESSION["username"] = $username;

                $_SESSION["level"] = $level;
                header("location:index.php");
                break;
                //加session
        }
    }

    ?>
</body>




</html>