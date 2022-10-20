<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/css/account.css">
    <link rel="stylesheet" href="../../style/css/header.css">
    <link rel="stylesheet" href="../../style/css/student.css">
    <?php include "../../header.php";
        include 'student_object.php'; 
    ?>
    <script src = "../../js/index.js"></script>
</head>


<body>
    <?php //require_once "user_connect.php";
    $user_id = @$_GET["user_id"];
    $company_id = @$_GET["company_id"];
    $company_name = @$_GET["company_name"];
    echo $user_id;
    echo $company_id;
    echo $company_name;
    $student_object = new student_object('localhost','root','1qaz2wsx','study');
    $company_data = $student_object -> select_me($table = "`company`", $condition = "company_id = '" . $company_id . "'", $order_by = "1", $fields = "`company_email`,`company_name`", $limit = "");
    $sql = "SELECT `company_email`,`company_name` FROM `company` WHERE company_id = '" . $company_id . "'";

    // echo $company_email;
    ?>
    <div id="wrap">
        <div id="content" style="background-color: #ddd">
            
            <form method="POST" action="email_go.php">
                <div id="emailBox">
                    <div class="Towho">
                    <?php foreach($company_data as $value) { ?>
                            <p>公司：</p><span><? echo  $value["company_name"]; ?></span><br>
                            <p>信箱：</p><span><input type="email" value="<?= $value["company_email"]; ?>"></span>
                    </div>
                    <div class="Content">
                        <label for="email_content">Email 內容填寫：</label><br><br>
                        <textarea name="email_content"></textarea>

                        <input type="hidden" name="user_id" value="<?= $user_id ?>">
                        <input type="hidden" name="company_id" value="<?=$company_id?>">
                        <input type="hidden" name="company_email" value="<?=$value["company_email"] ?>">
                        <!-- <input type="file"> -->
                    <?php } ?>
                    <br>
                    </div>
                    <input type="submit" class="btn" value="寄出">
                </div>
            </form>
        </div> <!-- content -->
</body>

</html>