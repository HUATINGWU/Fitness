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
        //echo'hello';
        $ant = $_POST['txt_ant'];
        $oldnm = $_POST['txt_oldnm'];
//        $oldpwd = $_POST['txt_oldpwd'];
        $newnm = $_POST['txt_newnm'];
//        $newpwd = $_POST['txt_newpwd'];
        
        include_once 'connect.php';//链接数据库
       if(!empty($ant) && !empty($oldnm) && !empty($newnm)){
           $find ="select username from userinfo where useraccount='$ant'";
           $query =  mysqli_query($con, $find);
           while ($row= mysqli_fetch_array($query)){
               if($row['username']==$oldnm){
                   $alter = "update userinfo set username ='$newnm' where useraccount='$ant'";
                   $alterquery = mysqli_query($con, $alter);
                   echo'<script>alter("ok")</script>';
                   //echo'ok';
                   setcookie('account',"$account", time()-1);
                   sleep(1);
                   header("location:index.php");
               }else{
                   //echo'<script>alter("name or account is wrong")</script>)';
                   echo'wrong';
               }
           }
       }
       else{
           //echo'<script>alter("something is null")</script>';
           echo'zheshi'.$ant.$oldnm.$newnm;
           echo'<br>something wrong';
       }
        
        ?>
    </body>
</html>
