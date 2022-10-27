<!DOCTYPE html>
<html>
@extends('layout.app')
@section('head')
    @parent
    
@endsection

<body>
    @section('nav') 
        @parent
    @endsection

    @section('content')
        @parent
        <div id="wrap">
            <div id="content">
                <form action="resume_upload.php" method="post" enctype="multipart/form-data">
                    <div id="resumeBox">
                        <div class="profile">

                            <div class="profile-info-row">
                                <div class="profile-info-name">
                                    <span>PDF履歷上傳</span>
                                </div>
                                <div class="profile-info-value">
                                    <a href='download.php?user_id=<?= $user_id ?>' target='_blank'>你的履歷下載</a>
                                </div>
                            </div>
                            <div id="edit">
                                <!-- <div id="edit-save">
                                    <input type="submit" value="儲存">
                                    <img src="../../image/check-square.svg"></img> 
                                </div> -->
                                <div id="edit-modify">
                                    <!-- <a class="edit-save" type="button" href="student_resume.php?<?= $user_id ?>">修改</a> -->
                                    <a href="resume_change.php?user_id=<?=$user_id?>">
                                        修改
                                        <img src="../../image/pencil-square.svg"></img>
                                    </a>
                            
                            
                    
                        </div> <!-- profile -->
                    </div> <!-- resumeBox -->
                </form>
            </div> <!-- content -->
        </div> <!-- wrap -->
            
       


        
    @endsection


    @section('footer')
        @parent
    
    @endsection
</body>

</html>