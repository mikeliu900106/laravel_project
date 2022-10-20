<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>


<?php
include "company_object.php";
$user_id  = @$_POST['user_id'];
$maker = @$_POST['maker'];
$subject = @$_POST['subject'];
$content = @$_POST['content'];
echo $user_id;
$company_object = new company_object('localhost','root','1qaz2wsx','study');
$company_object -> add_chat($user_id,$maker,$subject,$content,$url ="response.php")
?>
</body>
</html>