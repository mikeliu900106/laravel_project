<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>


<?php
include "student_object.php";
$user_id  = @$_POST['user_id'];
$maker = @$_POST['maker'];
$subject = @$_POST['subject'];
$content = @$_POST['content'];
echo $user_id;
$student_object = new student_object('localhost','root','1qaz2wsx','study');
$student_object -> add_chat($user_id,$maker,$subject,$content,$url ="response.php")
?>
</body>
</html>