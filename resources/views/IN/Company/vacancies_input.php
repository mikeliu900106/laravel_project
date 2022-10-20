<? session_start()?>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'company_object.php'; 
    ?>
    
</head>


<?php      

        $company_content = @$_POST["company_content"];
        $company_time = @$_POST["company_time"];
        $company_money = @$_POST["company_money"];
        $company_title = @$_POST["company_title"];
        $company_work_experience = @$_POST["company_work_experience"];

        $company_department = @$_POST["company_department"];
        $company_Education = @$_POST["company_Education"];
        $company_place = @$_POST["company_place"];
        $company_safe = @$_POST["company_safe"];
        $sql_type = @$_POST["sql_type"];
        $company_other = @$_POST["company_other"];
        $user_id = $_SESSION['user_id'];
        $company_object = new company_object('localhost','root','1qaz2wsx','study');
        $company_object->run_page("vacancies.php")
            ?>
        <body>  
            <?php 
                $company_object -> add_recruit($user_id,$vancanies_id,$company_money,$company_time,$company_place,$company_content,$company_work_experience,$company_department,$company_Education,$company_safe,$company_other,$sql_type );
            ?>
            <script src = "../../js/header.js"></script>
        </body>
 



</html>








