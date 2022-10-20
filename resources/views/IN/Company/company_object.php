<?php
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    class company_object{
    
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
        
    public function get_company_id(){
        $today = date("Ynj");
        $nums = $this -> select_me($table = "company",$condition = "1", $order_by = "1", $fields = "count( * ) as num", $limit = "");
        var_dump($nums);
        $num = $nums->fetch_assoc();
        $row_num = $num["num"];
        $id = "C" . (($today * 10000) + ($row_num + 1));
        return $id;
    }

    public function get_vancanies_id(){
        $today = date("Ynj");
        $nums = $this -> select_me($table = "company",$condition = "1", $order_by = "1", $fields = "count( * ) as num", $limit = "");
        var_dump($nums);
        $num = $nums->fetch_assoc();
        $row_num = $num["num"];
        $id = "V" . (($today * 10000) + ($row_num + 1));
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
        header("Refresh:0;url=".$url);
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
    public function add_chat($user_id,$maker,$subject,$content,$url =""){
        if ($maker == "" && $subject == "" &&  $content == "") {
            echo "全部沒填,五秒後返回註冊畫面";
            $this ->run_page($url);;
        } elseif ($subject == "" && $content == "") {
            echo "大綱和內容都為空,五秒後返回心得填寫畫面";
            $this ->run_page($url);;
        } elseif ($maker == "") {
            echo "作者不得為空,五秒後返回心得填寫畫面";
            $this ->run_page($url);;
        } elseif ($content == "") {
            echo "大綱不得為空,五秒後返回心得填寫畫面";
            $this ->run_page($url);
        } elseif (isset($maker) == true && isset($subject) == true &&  isset($content) == true) //如果資料庫記憶體在相同使用者名稱，則'$rs'接收到的變數為'true'所以大於1為真，則返回'使用者名稱已存在'
        {
            $date = date("ymd");
            //$sql = "INSERT INTO `chat`(`chat_id`, `chat_maker`, `chat_subject`, `chat_content`, `chat_date`) VALUES (?,?,?,?,?)";
            $chat_data = array
            (
                'chat_id'       =>  $user_id ,
                'chat_maker'    =>  $maker  ,
                'chat_subject'  =>  $subject,
                'chat_content'  =>  $content,
                'chat_date'     =>  $date   
            );
            $this -> insert_me($table = "`chat`",$data_array = $chat_data);
            header("Refresh:0;url=response.php?user_id=" . $user_id);
        }
    }
    public function add_company($com_id,$company_name,$company_title,$company_number,$company_place,$company_email,$company_username,$company_password,$url ="",$sql_type){
        if ($company_name == "" ||  $company_username == "" || $company_password == "" || $company_number == "" || $company_email == ""  ) {
            ?>
            <script type="text/javascript">
                alert("有空格沒填,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
                $this -> run_page($url);
            }
        }
        elseif(($this -> check_int($company_number)) == false){
            ?>
            <script type="text/javascript">
                alert("電話只能用數字,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
                $this -> run_page($url);
            }
        }
        elseif(($this -> check_email($company_email)) == false){
            ?>
            <script type="text/javascript">
                alert("email表格不正確,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
                $this -> run_page($url);
            }
        }
        elseif(($this -> company_num_check($company_username) )== false){
            ?>
            <script type="text/javascript">
                alert("帳號使用過,將返回註冊頁面重新登入");
            </script>
            <?php
            if(!empty($url)){
                $this -> run_page($url);
            }
        }else{
            $company_data = array(
                'company_id'        =>  $com_id,
                'company_title'     =>  $company_title,
                'company_name'      =>  $company_name,
                'company_username'  =>  $company_username,
                'company_password'  =>  $company_password,
                'company_number'    =>  $company_number,
                'company_email'     =>  $company_email,
                'level'             =>  "3",
            );

            $login_data = array(
                'id'        =>  $com_id,
                'username'  =>  $company_username,
                'password'  =>  $company_password,
                'level'     =>  "3",
            );
            if($sql_type == "insert"){
                $this -> insert_me($table = "company" ,$company_data);
                $this -> insert_me($table = "login",$login_data);
            }elseif($sql_type == "update"){
                $this -> update_me($table = "company" ,$company_data,$key = "company_id",$id=$com_id);
                $this -> update_me($table = "login",$login_data,$key = "id",$id=$com_id);
            }

        }
    }
    public function add_recruit($user_id,$vancanies_id,$company_money,$company_time,$company_place,$company_content,$company_work_experience,$company_department,$company_Education,$company_safe,$company_other,$sql_type ){
        $vacancies_data = array(
            'company_id' 				=> $user_id,
            'vacancies_id'              => $vancanies_id,
            'company_money'				=> $company_money, 
            'company_time'				=> $company_time, 
            'company_place'				=> $company_place,
            'company_content'			=> $company_content,
            'company_work_experience'   => $company_work_experience,		
            'company_Education'			=> $company_Education,
            'company_department'		=> $company_department,
            'company_other'				=> $company_other, 
            'company_safe'				=> $company_safe,
        );
        if($sql_type == "insert"){
            $this -> insert_me($table = "vacancies" ,$vacancies_data);
            ?>
            <script type="text/javascript">
                alert("新增職位成功");
            </script>
            <?php

            //$this -> run_page("vacancies.php");
        }elseif($sql_type == "update"){
            $this -> update_me($table = "vacancies" ,$vacancies_data,$key = "vacancies_id",$id =$vacancies_id);
            ?>
            <script type="text/javascript">
                alert("更新職位成功");
            </script>
            <?php
            
        }


    }

    public function company_num_check($condition){//輸入字串
        $select_sql = "SELECT count(`company_username`) FROM 'company' WHERE  `company_username` = '$condition'";
        echo $select_sql;
        //$stmt = con()->query($sql);
        $result = mysqli_query($this->link, $select_sql);
        //  var_dump($result);
        if($result == 0){
            return true;
        }
        else{
            return false;
        }
    }
    public function select_me($table="",$condition = "1", $order_by = "1", $fields = "*", $limit = ""){
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

    public function update_me($table,$rows_array = null,$key= null,$id= null){
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
    public function company_check_mail_go($id,$email,$company_name,$random,$messange = "",$url){
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
            $mail->Subject = $company_name."驗證碼";
            $mail->Body    = '你的驗證碼:'.$random;
            //$mail->AltBody = '歡迎使傻逼往,您的身份驗證碼是：' ;
            $mail->send();
            echo '寄送成功';
        } catch (Exception $e) {
            echo "信箱寄送錯誤";
            $this -> delete_me($table = "company",$key = "`company_id`", $id);
            $this -> delete_me($table = "login",$key = "`id`", $id);
            $this-> run_page($url);
        }
    }
 

    function __destruct() {                   // 解構子
        mysqli_close($this->link);
    }
    
}   


?>