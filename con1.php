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
        $localhost = 'localhost';
        $usernamesql = 'root';
        $passwordsql = '';
        $database = 'commodity';
        $con = mysqli_connect($localhost, $usernamesql, $passwordsql, $database);
        mysqli_query($con, 'set names utf8');
        ?>
    </body>
</html>
