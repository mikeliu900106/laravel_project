<html>
<head>
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <?php include "../../header.php"?>
    <script src = "../../js/index.js"></script>
</head>
<body>
<?php
include 'teacher_object'; 
$verification_button = @$_POST["verification_button"];
$ram_num = @$_POST["ram_num"];
$user_id = @$_POST["id"];
$today = date("Ynj");
$teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');

if($verification_button == $ram_num){
    ?>
        <script type="text/javascript">
            alert("驗證瑪正確回到登入頁面登入");
        </script>
    <?php
    header("Refresh:1;url=../../login.php");
}elseif($verification_button != $ram_num){
    ?>
        <script type="text/javascript">
            alert("驗證瑪輸入錯誤,請回註冊頁面重新登入");
        </script>
    <?php
    header("Refresh:1;url=company_signup_sure.php");
    $sql2="DELETE FROM `teacher` WHERE teacher_id = '".$id."'";
    $teacher_object -> delete_me($table = "`teacher`", $key = "teacher_id", $id = $user_id);

    $sql1="DELETE FROM `login` WHERE id = '".$id."'";
    $teacher_object -> delete_me($table = "`login`", $key = "id", $id = $user_id);

}
?>
</body>

</html>