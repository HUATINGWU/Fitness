<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <style>


            .m{  
                color: red;
                position: relative;
                top: 120px;
                left: 200px;
                background-color: papayawhip;
                border: 1px solid graytext;
            }
        </style>
        <meta charset="UTF-8">
        <title>calliven健身椅仰卧起坐多功能哑铃 </title>
        <link rel="stylesheet" href="css/base.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/cl.css">
        <script type="text/javascript" src="js/jsAddress.js"></script>
    </head>

    <body>
        <!--    <div class="top">-->
        <!---->
        <!--        <div class="top_left">-->
        <!--            <h1>-->
        <!--                <a href="#" title="天行健"><img src="" alt=""></a>-->
        <!--            </h1>-->
        <!--        </div>-->
        <!--        <div class="top_right">-->
        <!--            <ul class="top_nav">-->
        <!---->
        <!--                <li><a href="index-基本结构1.html">课程内容</a></li>-->
        <!--                <li><a href="index-基本结构1.html">社区</a></li>-->
        <!--                <li><a href="index-基本结构1.html">商城</a></li>-->
        <!--            </ul>-->
        <!--            <ul class="top_login">-->
        <!---->
        <!--                <li><a href="#">登录</a></li>-->
        <!--                <li><a href="#">注册</a></li>-->
        <!--                <li></li>-->
        <!--            </ul>-->
        <!--        </div>-->
        <!--    </div>-->
        <?php
        require_once 'con1.php';
//        $localhost = 'localhost';
//        $usernamesql = 'root';
//        $passwordsql = '';
//        $database = 'commodity';
        $com_id = $_GET['com_id'];
//        $con = mysqli_connect($localhost, $usernamesql, $passwordsql, $database);
//         mysqli_query($con, 'set names utf8');
        echo $com_id;
        $select = "select * from commodities where com_ID=$com_id";
        $findrow = mysqli_query($con, $select);
        while ($row = mysqli_fetch_array($findrow)) {
            $com_id = $row['com_ID'];
            $com_name = $row['com_name'];
            $com_price = $row['com_price'];
            $com_show = $row['com_show'];
        }
        echo "<div class=\"photo\">
        <img style=\"width:220px; height:220px\" class=\"img1\" src=\"$com_show\" alt=\"\">

    </div>
    <p class=\"p1\">$com_name</p>
    <p class=\"p2\">青岛 至

        <!--<lable for=\"state\"></lable>-->
        <select id=\"cmbProvince\" name=\"cmbProvince\"></select>
        <select id=\"cmbCity\" name=\"cmbCity\"></select>
        <select id=\"cmbArea\" name=\"cmbArea\"></select> 运费 0.00元
    </p>
    <p class=\"p3\">
        <tr>
            <td>月销量 <span id=\"sp1\">0</span> </td>
            <td>累计评价</td>
            <td>送天猫积分 100</td>
        </tr>
    </p>


    <p class=\"p4\" >
        购买数量：
        <input id=\"pp4\" type=\"number\" value=\"1\" min=\"1\" max=\"10\"> 件
    </p>
    <p class=\"p6\">$com_price</p>
    <p class=\"p5\">
        <tr>
            <td><button type=\"submit\" class=\"btn1\" onclick=\"sp()\"><a href=\"#\">立即购买</a></button></td>
            <td><button class=\"btn2\" onclick=\"spp()\"><a href=\"#\">加入购物车</a></button></td>
            </td>
        </tr>
    </p>";



        if (isset($_COOKIE['username123'])) {
            echo "<a href=\"alter.php\">  alter</a>";
        }

        setcookie('com_id', $com_id);
        ?>


        <?php
        if (isset($_COOKIE['account'])) {
            echo"    <script type=\"text/javascript\">
        addressInit('cmbProvince', 'cmbCity', 'cmbArea');
        var a = 0;
        function sp() {
            // var a = document.getElementById('sp1').value;
            var c = document.getElementById('pp4').value;
            var b =parseInt(c);
            var d =a+b;

            document.getElementById('sp1').innerHTML =d;
            alert('购买成功');
            a =d;
        }
        function spp(){
            alert('加入购物车成功');
        }
    </script>";
        } else {
            echo"    <script type=\"text/javascript\">
        addressInit('cmbProvince', 'cmbCity', 'cmbArea');
        var a = 0;
        function sp() {
            // var a = document.getElementById('sp1').value;
            var c = document.getElementById('pp4').value;
            var b =parseInt(c);
            var d =a+b;

            document.getElementById('sp1').innerHTML =d;
            alert('请先登录');
            a =d;
        }
        function spp(){
            alert('请先登录');

        }
    </script>";
        }
        ?>
        <form style="    position: relative;top: 120px;left: 200px;" action="pinglun1.php" method="get">
            <textarea name="txt" rows="4" cols="20">
            </textarea>
            <input type="submit" value="sumbit" />
        </form>

        <?php
        $select123 = 'select * from pinglun';
        $select1234 = mysqli_query($con, $select123);
        while ($row = mysqli_fetch_array($select1234)) {
            $com_name = $row['com_name'];
            $txt = $row['text'];
            echo"<a><div class='m'><span>" . $com_name . ":" . ""
            . "<br>" . $txt . "</span></div>" . "<br>";
        }
        ?>





        <form action=""></form>


<!--    <script type="text/javascript">-->
        <!--        addressInit('cmbProvince', 'cmbCity', 'cmbArea');-->
        <!--        var a = 0;-->
        <!--        function sp() {-->
        <!--            // var a = document.getElementById('sp1').value;-->
        <!--            var c = document.getElementById('pp4').value;-->
        <!--            var b =parseInt(c);-->
        <!--            var d =a+b;-->
        <!--            -->
        <!--            document.getElementById('sp1').innerHTML =d;-->
        <!--            alert('购买成功');-->
        <!--            a =d;-->
        <!--        }-->
        <!--        function spp(){-->
        <!--            alert('加入购物车成功');-->
        <!--        }-->
        <!--    </script>-->
    </body>

</html>