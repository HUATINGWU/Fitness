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
        require_once 'con1.php';
        $username = $_COOKIE['account'];
        $com_id = $_COOKIE['com_id'];
        if ($_COOKIE['account']) {
            $neirong = $_GET['txt'];

            $insert123 = "insert into pinglun values ('$username','$neirong')";
            $insert123 = mysqli_query($con, $insert123);
            header("Location:cod1.php?com_id=$com_id");
        } else {

            echo 'please login first!';
            sleep(1);
            header("Location:cod1.php?com_id=$com_id");
        }
        ?>
    </body>
</html>
