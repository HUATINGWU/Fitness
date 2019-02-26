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
        $account = $_POST['txt_acount_reg'];
        $pwd = $_POST['txt_pwd_reg'];
        $username = $_POST['txt_nm_reg'];
        $gender = $_POST['gender'];
        $age = $_POST['txt_age_reg'];
        $tel = $_POST['tel_tnm_reg'];
        $email = $_POST['txt_em_reg'];
        $adress = $_POST['txt_ad_reg'];
        
//        $account ='a123';
//        $pwd = '123';
//        $username = '123';
//        $gender = 'n';
//        $age = '255';
//        $tel = '1234567891234';
//        $email = '5555';
//        $adress ='99';
        include_once 'connect.php';//链接数据库 
//        $query= "select useraccount from userinfo where username = '$username' limit 1";
//        $result = mysqli_query($con,$query);
//        if(mysqli_fetch_array($result)){
//            echo'错误，账号'.$account.'已存在<a href="javascript:history.back(-1);">返回</a>';
//            exit;
//        }
        //$pwd = md5($pwd);
//        $sql = "insert into userinfo "
//       . " values ('". $account."','". $username."','".$pwd."','".$gender."','". $age." ','". $tel."','".$email." ','".$adress."')";
//         $sql = "insert into userinfo values('" . $account . "','" .  $username . "','" . $pwd . "','" . $gender . "','".$age."','".$tel."','".$email."','".$adress."');";
      $sql=  "insert into userinfo (useraccount,username,userpassword,usergender,userage,usertel,useremail,useradr) values 
('".$account."','".$username."','".$pwd."','".$gender."','".$age."','".$tel."','".$email."','".$adress."');";
//      $sql=  "insert into userinfo (useraccount,username,userpassword,usergender,userage,usertel,useremail,useradr) values 
//('".$account." ','".$username."','".$pwd."','".$gender."','1','13112312312','11@11.com ','121');";
       $result = mysqli_query($con,$sql);
        if($result!==0){
            exit('用户注册成功！点击此处 <a href="index.php">登录</a>');
           // echo"<script>alert('chenggong')</script>";
        }
 else {
     echo'抱歉';
     echo '<br>点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
 }
        
        ?>
    </body>
</html>
