<?php
include "company_object.php";

;
$verification_button = @$_POST["verification_button"];
$ram_num = @$_POST["ram_num"];
$user_id = @$_POST["id"];
$today = date("Ynj");

  
$company_object = new company_object('localhost','root','1qaz2wsx','study');
if($verification_button == $ram_num){
    echo "驗證瑪正確回到登入頁面登入";
    $company_object -> run_page("../../login.php");
}elseif($verification_button != $ram_num){
    ?>
    <script type="text/javascript">
        lert("驗證瑪輸入錯誤,將返回註冊頁面重新登入");
    </script>
    <?php
    echo "驗證瑪輸入錯誤,請回註冊頁面重新登入";
    $company_object -> run_page("signup.php");
    $company_object -> delete_me( `company`,$key = "company_id", $id = $user_id);
    $company_object -> delete_me( `login`,$column = "id", $id = $user_id) ;
}
    ?>