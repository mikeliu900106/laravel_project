
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <script src = "../../js/index.js"></script>
    <?php 
        include "../../header.php";
        include 'student_object.php';
    ?>

</head>
    <body>
    <?php
        header("Content-Type:text/html; charset=utf-8");//重要顯示中文ˊ重要部分

        $user_id = @$_POST["user_id"];
        $choose_company = @$_POST["choose_company"];
        $choose_teacher = @$_POST["choose_teacher"];
        $start_tme = @$_POST["start_tme"];
        $end_tme = @$_POST["end_tme"];
        echo $choose_company;
        echo $choose_teacher;
        $student_object = new student_object('localhost','root','1qaz2wsx','study');
        $pair_data = array
        (
            "user_id"      => $user_id,
            "teacher_name" => $choose_teacher,
            "company_name" => $choose_company,
            "start_time"   => $start_tme,
            "end_time"     => $end_tme
        );
        $student_object -> insert_me($table = "pair",$pair_data);
        echo "2秒返回配對畫面";
        $student_object->run_page("pair.php");
        ?>
        <script src = "../../js/header.js"></script>
    </body>
</html>






