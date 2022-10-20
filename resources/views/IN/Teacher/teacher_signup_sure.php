<?
include '../../sql_function.php'; 
$verification_button = @$_POST["verification_button"];
$ram_num = @$_POST["ram_num"];
$user_id = @$_POST["id"];
$today = date("Ynj");
$sql_function = new sql_function('localhost','root','1qaz2wsx','study');

if($verification_button == $ram_num){
    echo "驗證瑪正確回到登入頁面登入";
    header("Refresh:2;url=../../login.php");
}elseif($verification_button != $ram_num){
    echo "驗證瑪輸入錯誤,請回註冊頁面重新登入";
    header("Refresh:2;url=company_signup_sure.php");
    $sql2="DELETE FROM `teacher` WHERE teacher_id = '".$id."'";
    $sql_function -> delete_me($table = "`teacher`", $key = "teacher_id", $id = $user_id);

    $sql1="DELETE FROM `login` WHERE id = '".$id."'";
    $sql_function -> delete_me($table = "`login`", $key = "id", $id = $user_id);

}
    ?>