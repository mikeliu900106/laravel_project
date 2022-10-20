<?php

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class teacher_object{
    
    public $DB_HOST ;
    public $DB_USER ;
    public $DB_PWD  ;
    public $DB_NAME ;


    public function __construct($DB_HOST,$DB_USER,$DB_PWD,$DB_NAME) {   
        $this->mysql_address  = $DB_HOST;
        $this->mysql_username = $DB_USER;
        $this->mysql_password = $DB_PWD;
        $this->mysql_database = $DB_NAME;
        $this -> link = mysqli_connect($this->mysql_address,$this->mysql_username, $this->mysql_password,$this->mysql_database);
        if(mysqli_connect_errno()){
            $this->error_message = "MYsql連接不成功 " . mysqli_connect_error();
            echo $this->error_message;
        }
            mysqli_query($this->link , "SET NAMES utf8");
            mysqli_query($this->link , "SET CHARACTER_SET_database= utf8");
            mysqli_query($this->link , "SET CHARACTER_SET_CLIENT= utf8");
            mysqli_query($this->link , "SET CHARACTER_SET_RESULTS= utf8");
    }
        
    public function get_teacher_id(){
        $today = date("Ynj");
        $nums = $this -> select_me($table = 'teacher',$condition = "1", $order_by = "1", $fields = "count( * ) as num", $limit = "");
        var_dump($nums);
        $num = $nums->fetch_assoc();
        $row_num = $num["num"];
        $id = "T" . (($today * 10000) + ($row_num + 1));
        return $id;
    }

    public function check_int($check){
        if(!ctype_digit($check)){
            return false;
        }else{
            return true;
        }
    }

    public function run_page($url){
        header("Refresh:1;url=".$url);
    }

    public function check_email($check){
        if(!filter_var($check, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
    }

    public function codestr(){
        $arr = array_merge(range('a', 'b'), range('A', 'B'), range('0', '9'));
        shuffle($arr);
        $arr = array_flip($arr);
        $arr = array_rand($arr, 6);
        $res = '';
        foreach ($arr as $v) {
            $res .= $v;
        }
        return $res;
    }

    public function add_teacher($user_id,$username,$password,$email,$real_name,$url =""){
        if ($email == "" || $password == "" || $username == "") {
            ?>
            <script type="text/javascript">
                alert("有空格沒填,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
                //$this -> run_page($url);
            }
        }
        elseif(($this -> check_email($email)) == false){
            ?>
            <script type="text/javascript">
                alert("email格式錯誤,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
               // $this -> run_page($url);
            }
        }
        elseif(($this -> teacher_num_check($username) )== false){
            ?>
            <script type="text/javascript">
                alert("帳號已被使用,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
               // $this -> run_page($url);
            }
        }else{

            $teacher_data = array(
                'teacher_id'       => $user_id,
                'teacher_username' => $username,
                'teacher_password' => $password,
                'teacher_real_name'=> $real_name,
                'teacher_email'    => $email,
                'teacher_level'    => '2'
            );
            $login_data = array(
                'id'        =>  $user_id,
                'username'  =>  $username,
                'password'  =>  $password,
                'level'     =>  "2",
            );
            
            $this -> insert_me($table = "login",$login_data);
            $this -> insert_me($table = "teacher" ,$teacher_data);
        }
    }
    
    public function teacher_num_check($condition){//輸入字串
        $select_sql = "SELECT count( * ) as num FROM `login` WHERE  `username` = '$condition'";
        echo $select_sql;
        //$stmt = con()->query($sql);
        $num = mysqli_query($this->link, $select_sql);
        $num =$num->fetch_assoc();
        //$row_num =$num["num"];
        $row_num = $num["num"];
        //var_dump($num);
        if($row_num == 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function select_me($table,$condition = "1", $order_by = "1", $fields = "*", $limit = ""){
        $select_sql = "SELECT {$fields} FROM {$table} WHERE {$condition} ORDER BY {$order_by} {$limit}";
        echo $select_sql;
        //$stmt = con()->query($sql);
        $result = mysqli_query($this->link, $select_sql);
        var_dump($result);
        if(!is_object($result))return "資料查詢錯誤";
        return $result;
    }

    public function insert_me($table = null,$data_array = array()){
        if($table === NULL)return false;
        if(count($data_array) == 0) return false;
        $col = array();
        $dat = array();
        foreach ($data_array as $key => $value) {
                //$value  = $value -> real_escape_string();
            $col[] = $key;
            $dat[] = "'$value'";
            $columns = join(",",$col );
            $data = join(",",$dat);
        }
        $insert_sql = "INSERT INTO " . $table . "(" . $columns . ")VALUES(" . $data . ")";
        echo $insert_sql;
        mysqli_query($this->link, $insert_sql);
    }
 
    public function update_me($table = null,$rows_array = null,$key= null,$id= null){
        if($table == null){
            echo "table is null";
            return false;
        }
        if($id == null) return false;
        if($rows_array == null) return false;
        if(count($rows_array) == 0) return false;
        $set = [];
        foreach($rows_array as $k => $v) {
            $set[] = " `$k`='$v'";
        }
        $upsate_sql = "UPDATE {$table} SET ". implode(', ', $set) ." WHERE $key= '" .$id. "' ";
        echo $upsate_sql ;
        mysqli_query($this->link, $upsate_sql);
    }

    public function delete_me($table = null,$key = null, $id = null) {
        if ($table===null) return false;
        if($id===null) return false;
        if($key===null) return false;
        $delete_sql ="DELETE FROM {$table} WHERE " . $key . " = " . "\"" . $id . "\"";
        echo $delete_sql;
        mysqli_query($this->link, $delete_sql);        
    }   
    public function teacher_check_mail_go($id,$email,$name,$random,$messange = "",$url){
        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP(); 
            $mail->CharSet = "utf-8";                                           //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mikeliu20010106@gmail.com';                     //SMTP username
            $mail->Password   = 'yccglwermiavunxh';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->addAddress($email);     //Add a recipient
            $mail->setFrom("mikeliu20010106@gmail.com", 'Mike');  //寄件者信箱
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $name."驗證碼";
            $mail->Body = '你的驗證碼:'.$random;
            //$mail->AltBody = '歡迎使傻逼往,您的身份驗證碼是：' ;
            $mail->send();
            echo '寄送成功';
        } catch (Exception $e) {
            echo "寄送錯誤";
            $this -> delete_me($table = "teacher",$key = "`teacher_id`", $id);
            $this -> delete_me($table = "login",$key = "`id`", $id);
            //$this -> run_page($url);
        }
    }
    public function vacancies_mail_go($company_id,$company_email,$email_content,$real_file){
        if ($email_content == "") {
            echo "內容沒填,五秒後返回註冊畫面";
            header("Refresh:3;url=student_email_controll.php?user_id=".$user_id."&company_id=".$company_id );
        }else{
            $company_name = $this->select_me( $table = "company", $condition ="`company_id` = '".$company_id."'", $order_by = "1", $fields = "company_name");
            $mail = new PHPMailer(true);
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP(); 
                $mail->CharSet = "utf-8";                                           //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'mikeliu20010106@gmail.com';                     //SMTP username
                $mail->Password   = 'yccglwermiavunxh';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                $mail->addAddress($email);     //Add a recipient
                $mail->setFrom("mikeliu20010106@gmail.com", 'Mike');  //寄件者信箱
                $mail->addAttachment($real_file);         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $company_name."驗證";
                $mail->Body = $email_content;
                //$mail->AltBody = '歡迎使傻逼往,您的身份驗證碼是：' ;
                $mail->send();
                echo '寄送成功';
            } catch (Exception $e) {
                echo "寄送錯誤";
                header("Refresh:3;url=student_email.php?user_id=".$user_id);
            }
        }
    }
 

    function __destruct() {                   // 解構子
        mysqli_close($this->link);
    }
    
}   


?>