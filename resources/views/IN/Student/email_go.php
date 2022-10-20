<html>

<head>
<link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'student_object.php'; 
        ?>
</head>

<body>
    <?php

$user_id = @$_POST['user_id'];
$company_id = @$_POST['company_id'];
$company_email = @$_POST['company_email'];
$email_content = @$_POST['email_content'];

//測試資料傳直
echo $user_id ;
echo$company_id ;
echo$company_email ;
echo $email_content;
echo "</br>";

 //"SELECT {$fields} FROM {$table} WHERE {$condition} ORDER BY {$order_by} {$limit}
    $student_object = new student_object('localhost','root','1qaz2wsx','study');
    $resume_select = $student_object -> select_me( $table = "resume", $condition ="`user_id` = '".$user_id."'", $order_by = "1", $fields = "`path`, `file_name`", $limit = "",$user_id);
    while($result = $resume_select -> fetch_array()){
        $path = $result["path"] ;
        $file_name = $result["file_name"];
        $real_file = $path .$file_name;
        
        
    }
    $student_object -> vacancies_mail_go($company_id,$company_email,$email_content,$real_file);



?>

</body>

</html>
