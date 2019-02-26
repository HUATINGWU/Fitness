<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//      session_start();
        
      
      //注销登录 
//      if($_GET['action'] == "logout"){
//    unset($_SESSION['txt_acount_reg']);
//    unset($_SESSION['txt_nm_reg']);
//    echo '注销登录成功！点击此处 <a href="index1.php">登录</a>';
//    exit;
//}
$account = $_POST['txt_account_login'];
$userpwd = $_POST['txt_pwd_login'];

//登录
        include_once 'connect.php';
        //检测用户名
        $find="select username from userinfo where userpassword='$userpwd ' and useraccount ='$account'";
        $check_query =  mysqli_query($con,$find);
        $result = mysqli_fetch_array($check_query);
        if($result){
            $username=$result['username'];
            //$_SESSION['txt_account_login'] = $account;
            //$_SESSION['txt_pwd_login'] = $userpwd;
//            $_COOKIE['txt_account_login']=$account;
            setcookie('account',$username,time() + (3600 * 24 * 365));
     //       setcookie('name1','1',time())
            //sleep(1);
    //session_start();
           // $_SESSION['txt_account_login'] = $account;
           //echo $account.'欢迎你，点击进入<a href="index1.php">页面</a>';
           header("location:index.php");
            //echo"<script>alert('chenggong')</script>";
        }
        else{
           exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
        }
        ?>
    </body>
</html>
