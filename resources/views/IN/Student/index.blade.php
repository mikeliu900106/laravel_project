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
    <form action="{{route('Student.store')}}" method="post">
        @csrf
        <div class="AccountBox">
            <h1>學生註冊</h1>
            <!-- 註冊資料輸入欄 -->
            <div class="Section">
                <input class="Account_text" type="text" placeholder="Username" name="username" /> <span>請輸入帳號</span>
                <input class="Account_text" type="password" placeholder="Password" name="password" /> <span>請輸入密碼</span>
                <input class="Account_text" type="text" placeholder="Email" name="email" /> <span>請輸入信箱</span> <br>
            </div>
            <!-- 登入 提交 -->

            <div class="bottom_row">
                <input class="submit_button" type="submit" value="提交" />
            </div>

            <!-- 回登入 回首頁 -->
            <a href="../../register_select.php"><img src="../../image/return.png" style="position: absolute; top: 5px; left: 5px;" width="30px"></a>
            <a href="../../index.php"><img src="../../image/homeLogo.png" style="position: absolute; top: 5px; right: 5px;" width="30px"></a>
        </div>
    </form>
    @endsection


    @section('footer')
        @parent
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src = "js/index.js"></script>
    @endsection 
  
</body>