<?php
session_start();
require_once "input.class.php";
require_once "conn.php";
$input= new input();
$act=$input->get('act');
if($act!==false){
    $username=$input->post('username');
    $password=$input->post('password');

 $sql = "select * from adm where username='{$username}'AND
password='{$password}'";
    $mysqli_result=mysqli_query($conn,$sql);

   if($row=$mysqli_result->fetch_array()){
	          setcookie('username123',$row['username']);
       $_SESSION['username1']=$row['username'];
       //echo "登录成功";
       header("Location:share.php");

   }else{
       echo "<h1 style=\"color: red\">您没有权限登陆！！</h1>";
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员登陆界面</title>
    <style>
        body{
            background-color: #3d3743;
            background-size: cover;
 }
        .input{
            margin: 150px auto;
            border: 2px solid gray;
            border-radius: 9px;
            width: 500px;
            height: 380px;
           background-color: #584f60;
        }
        form {
            font-family: Verdana, Arial, sans-serif;

        }
        .input h2{

            margin-top: 10px;
            margin-left: 30%;
        }
        .input input{
           margin-top: 10px;

        }
        .input input{
            margin-left: 15%;
        }
    </style>
</head>
<body>

<div class="input">
    <h2 style="color: whitesmoke;">管理员登陆界面</h2>
    <form action="admlogin.php?act=chk" method="post" >
        <font color="#f0f8ff"><lable>&nbsp;用户:</lable></font><input type="text" name="username" style="width: 320px;height: 45px;border-radius: 10px;"><br>
        <font color="#f0f8ff"><lable>&nbsp;密码:</lable></font><input type="password" name="password" style="width: 320px;height: 45px;border-radius: 10px"><br>

        <lable>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable> <input style="width: 250px;height: 45px;background-color: #1dcb8b;border-radius: 8px;color: ghostwhite" type="submit" value="点击登录">
    </form></div>

</body>
</html>