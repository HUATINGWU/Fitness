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
        $username = 'root';
        $passname = '';
        $con = mysqli_connect($localhost, $username, $passname);
        mysqli_query($con, 'set names utf8');
        $createdatabase = 'create database if not exists commodity 
default character set gb2312
default collate gb2312_chinese_ci  ;
';
        $create1 = mysqli_query($con, $createdatabase);
        $usedatabase = 'use commodity';
        $usedatabase1 = mysqli_query($con, $usedatabase);
        $createtable = 'create table if not exists commodities (
com_ID int,
com_name text,
com_price int,
com_show char(50),
primary key (com_id)
)
engine=innodb;';
        $create2 = mysqli_query($con, $createtable);
        $insert = "insert into commodities values "
                . "(1,'calliven健身椅仰卧起坐多功能哑铃',1345,'images/qicai01.png'),"
                . "(2,'百事特仰卧起坐运动板',3325,'images/qicai02.png'),"
                . "(3,'健腹轮腹肌锻炼器材多功能家用',2452,'images/qicai03.png'),"
                . "(4,'莫比斯家用正品静音扶手瘦身踏步机',4224,'images/qicai04.png'),"
                . "(5,'汗马动感单车超静音健身脚踏车',3256,'images/qicai05.png'),"
                . "(6,'汇源肾宝片',348,'images/food01.png'),"
                . "(7,'健肌粉',156,'images/food02.png'),"
                . "(8,'乳清蛋白棒',138,'images/food03.png'),"
                . "(9,'左旋肉碱茶多酚荷叶片',335,'images/food04.png'),"
                . "(10,'瑞德梦减肥茶',321,'images/food05.png');";
        $insert1= mysqli_query($con, $insert);
        $createtable3 = 'create table if not exists pinglun (
com_name char(50),
text text
)
engine=innodb;';
        $create3 = mysqli_query($con, $createtable3);

        ?>
    </body>
</html>
