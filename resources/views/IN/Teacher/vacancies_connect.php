<html>

<head>
<link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'teacher_object.php'; 
        ?>
</head>
<body>
<?php
$company_id = @$_GET["company_id"];
$user_id = @$_GET["user_id"];

$row_array = array
  (
    'teacher_name' => $user_id,
    'teacher_watch' => '通過'
  );
$teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');
$teacher_object -> update_me($table ="vacancies",$rows_array = $row_array, $key ="company_id", $id = $company_id);

?>
<script src="../../js/index.js"></script>
</body>

</html>
