<html>

<head>
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/account.css">

</head>


<?php      
        include "company_object.php";
        include "../../header.php";
        $company_name = @$_POST["company_name"];
        $company_title = @$_POST["company_title"];
        $company_username = @$_POST["company_username"];
        $company_password = @$_POST["company_password"];
        $company_email = @$_POST["company_email"];
        $company_number = @$_POST["company_number"];
        $company_place = @$_POST["company_place"];
        $sql_type = @$_POST["sql_type"];
        echo $sql_type;
        $company_object = new company_object('localhost','root','1qaz2wsx','study');
        $user_id = $company_object -> get_company_id();
        $random = $company_object -> codestr();
        $company_object -> add_company($user_id,$company_name,$company_title,$company_number,$company_place,$company_email,$company_username,$company_password,"signup.php",$sql_type);
 ?>
            <body>
                <form action="sure.php" method="POST">

                    <div class="accountBox">
                        <h1 class="" style="font-size: 50px">Register</h1>
                        <div class="verification">
                            <input class="account_text" type="text" placeholder="驗證碼" name="verification_button" style="width: 300px; margin-left: -5px;" />
                            <p  style="font-size:25px"><?$yanzhen = $company_object->company_check_mail_go($user_id,$company_email,$company_name,$random,$messange = "",$url = "signup.php");?></p>
                        </div>                    
                            <div class="bottom_row">
                                <input type="hidden" value="<? echo $user_id?>" name="id">                               
                                <input type="hidden" value="<? echo $random ?>" name="ram_num">
                                
                                <input class="Submit_button" type="submit" value="驗證" />

                            </div>
                 
                        <a href="../../login.php"><img src="../../image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
                        <a href="../../index.php"><img src="../../image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
                    </div>
                </form>
                <script src = "../../js/header.js"></script>
            </body>
 



</html>








