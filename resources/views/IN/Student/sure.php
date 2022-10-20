<?php
    $verification_button = @$_POST["verification_button"];
    $username = @$_POST["username"];
    $password = @$_POST["password"];
    $ram_num = @$_POST["ram_num"];
    $email= @$_POST["email"];
    $user_id = @$_POST["user_id"];
    echo $verification_button ;
    echo $username ;
    echo $password ;
    echo $ram_num ;
    echo$email;
?>
<html>
    <head>
        <link rel="stylesheet" href="../../style/css/header.css">
        <?php include "../../header.php"?>
        <script src = "../../js/index.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <body>
        
    <?php
    include 'student_object.php'; 
        $student_object = new student_object('localhost','root','1qaz2wsx','study');
        if($verification_button == $ram_num){
            $student_object->run_page("../../login.php");
        }
        elseif($verification_button != $ram_num){
            ?>
            <script type="text/javascript">
                alert("驗證瑪輸入錯誤,將返回註冊頁面重新登入");
            </script>
            
        <?php
            $student_object->run_page("../../register.php");
            $student_object -> delete_me($table = "user",$key = "`user_id`", $user_id);
            $student_object -> delete_me($table = "login",$key = "`id`", $user_id);
        }
        
        ?>
    </body>
   
        
    
   
</html>