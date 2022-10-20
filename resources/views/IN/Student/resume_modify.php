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
    <meta http-equiv="content-type" charset="UTF-8" />
</head>

<body>
    <? $user_id = @$_GET["user_id"]; ?>
    <div id="wrap">
        <div id="content">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                
                <div id="resumeBox">
                    <div class="profile">
                        <div class="profile-info-row">
                            
                        <div class="profile-info-row">
                            <div class="profile-info-name">
                                <span>PDF履歷上傳</span>
                            </div>
                            <div class="profile-info-value">
                                <div class="PDFresume">
                                    <input type="file" name="file_Upload" />
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <input type="submit" value="上傳" />
                                </div>
                            </div>
                        </div>
                        <div id="edit">
                            <div id="edit-save">
                                <input type="submit" value="儲存">
                                <img src="../../image/check-square.svg"></img>
                            </div>
                            <div id="edit-modify">
                                <!-- <a class="edit-save" type="button" href="student_resume.php?<?= $user_id ?>">修改</a> -->
                                <a href="student_resume_modify.php?user_id=<?= $user_id ?>">
                                    修改
                                    <img src="../../image/pencil-square.svg"></img>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div> <!-- profile -->
    </div> <!-- resumeBox -->
    </form>
    </div> <!-- content -->
    </div> <!-- wrap -->

    <script src="../../third/erTWZipcode/js/er.twzipcode.data.js"></script>
    <script src="../../third/erTWZipcode/js/er.twzipcode.min.js"></script>
    <script type="text/javascript">
        erTWZipcode();
    </script>
</body>

</html>