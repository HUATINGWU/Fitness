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
        $com_id = $_COOKIE['com_id'];

        echo "<form action=\"alter.php\" method=\"POST\" enctype=\"multipart/form-data\" >
            com_name: <input type=\"text\" name=\"com_name\" value=\"\" /></br>
            com_price: <input type=\"text\" name=\"com_price\" value=\"\" /></br>
            com_show: <input type=\"file\" name=\"com_show\" value=\"\" /></br>
            <input type=\"submit\" value=\"sumbit\"  /></br>
        </form>";
        
        ?>



<?php

if($_POST){
    
    $com_name=$_POST['com_name'];
    $com_price=$_POST['com_price'];
    $com_show=$_FILES['com_show']['name'];
    move_uploaded_file($_FILES['com_show']['tmp_name'], 'images/'.$com_show);
    
//$localhost = 'localhost';
//$usernamesql = 'root';
//$passwordsql = 'root';
//$database = 'commodity';
//$con = mysqli_connect($localhost, $usernamesql, $passwordsql, $database);
//mysqli_query($con, 'set names utf8');
    require_once 'con1.php';
$select = "update  commodities  set com_name='$com_name', com_price=$com_price,com_show='images/$com_show' where com_ID=$com_id";
$findrow = mysqli_query($con, $select);
}
?>
    </body>
</html>
frglki8