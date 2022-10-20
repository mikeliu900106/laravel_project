<?php
$company_id = @$_GET["company_id"];
include 'teacher_object.php'; 
$teacher_object = new teacher_object('localhost','root','1qaz2wsx','study');
$teacher_object-> delete_me($table ="vacancies", $key ="company_id", $id = $company_id);

?>




?>