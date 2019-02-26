<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑步课程</title>
    <link rel="stylesheet" href="css/base.css">-
    <link rel="stylesheet" href="css/quanji.css">
</head>
<body>
<!--顶部区域-->
<div class="top">
    <div class="top_in">
        <div class="top_left">
            <h1><a href="#" title="天行健"><img src="" alt=""></a></h1>
        </div>
        <div class="top_right">
            <ul class="top_nav">

                <li><a href="index.php">课程内容</a></li>
                <li><a href="index.php">社区</a></li>
                <li><a href="index.php">商城</a></li>
            </ul>
            <ul class="top_login">

                <li><a href="#">登录</a></li>
                <li><a href="#">注册</a></li>
                <li></li>
            </ul>
        </div>
    </div>
</div>
<!--课程内容-->
<div class="quanji_contect">
    <?php
    require_once "conn.php";

    $pic="select * from upload where uploadid>=113 and uploadid<=120 ";
    $rows=mysqli_query($conn,$pic);

    foreach($rows as $row){
        //echo $b=$row['pic']."<br>";

        echo "<ul><li><img src='{$row['pic']}'><p>{$row['title']}</p></li></ul>";

    }


    ?>
</div>
<!--底部区域-->
<div class="footer">
    <p><a href="#">关于天行健</a>   <a href="#">客户服务</a>  <a href="#">隐私政策</a>|  天行健公司版权所有 © 1997-2017 吴华庭、郑则栋、王鹏飞、赵英旗

    </p>
</div>
</body>
</html>