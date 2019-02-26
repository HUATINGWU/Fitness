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
        <form action="alteruser_c.php" method="post">
            <label>account</label>
            <input type="text" name="txt_ant"/>
            <br>
            <label>old name</label>
            <input type="text" name="txt_oldnm"  />
            <br>
<!--             <label>old password</label>
            <input type="text" name="txt_oldpwd"  />
            <br>-->
             <label>new name</label>
            <input type="text" name="txt_newnm"  />
            <br>
<!--             <label>new password</label>
            <input type="text" name="txt_newpwd"  />
            <br>-->
            <label>alter</label>
            <input type="submit" name="sub_alt" />
        </form>
        <?php
       
        //$account=$_COOKIE['txt_account_login'];
        //
        //
        //
//        $ant = $_POST['txt_ant'];
//        $oldnm = $_POST['txt_oldnm'];
////        $oldpwd = $_POST['txt_oldpwd'];
//        $newnm = $_POST['txt_newnm'];
////        $newpwd = $_POST['txt_newpwd'];
//        
//        include_once 'connect.php';//链接数据库
//       if(!empty($account)&&!empty($oldnm)&&!empty($newnm)){
//           $find ="select username from userinfo where useraccount='$ant'";
//           $query =  mysqli_query($con, $find);
//           while ($row= mysqli_fetch_array($query)){
//               if($row['username']==$oldnm){
//                   $alter = "update userinfo set username ='$newnm' where useraccount='$ant'";
//                   $alterquery = mysqli_query($con, $alter);
//                   echo'<script>alter("ok")</script>';
//                   setcookie('account',"$account", time()-1);
//                   sleep(1);
//                   header("location:index1.php");
//               }else{
//                   echo'<script>alter("name or account is wrong")</script>';
//               }
//           }
//       }else{
//           echo'<script>alter("something is null")</script>';
//       }
//        
        
        
        
        
//        if(!empty($oldnm) && !empty($oldpwd) && !empty($newnm) && !empty($newpwd)){
//           $find = "select userpassword from userinfo where username='$oldnm'";
//           $query = mysqli_query($con , $find);
////           if($query==1){
////               while($row= mysqli_fetch_array($query)){
////                   
////               }
////           } 
//           while ($row= mysqli_fetch_array($query)){
//        if($oldnm==$row['userpassword']){
//            $alter = "update userinfo set userpassword='$newpwd' where username='$oldnm'";
//        }
//    }
//        }else{
//            echo'<script>alter("something is null")</script>';
//                
//        }
        
        ?>
    </body>
</html>
