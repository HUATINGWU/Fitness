<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="gb2312">
    <title>游泳课程</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/swim.css">
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
<div class="swim_contect">
    <?php
    require_once "conn.php";

    $pic="select * from upload where uploadid>=1 and uploadid<=6 ";
    $rows=mysqli_query($conn,$pic);

foreach($rows as $row){
    //echo $b=$row['pic']."<br>";

    echo "<ul><li><img src='{$row['pic']}'><p>{$row['title']}</p></li></ul>";

}


?>


<!---->
<!--        <li><img src="images/swim01.png" alt=""><p>游泳·核心弹跳</p></li>-->
<!--        <li><img src="images/swim02.png" alt=""><p>游泳·蛙泳挺身</p></li>-->
<!--        <li><img src="images/swim03.png" alt=""><p>游泳·仰泳划臂</p></li>-->
<!--        <li><img src="images/swim04.png" alt=""><p>游泳·俯卧对角提膝</p></li>-->
<!--        <li><img src="images/swim05.png" alt=""><p>游泳-跪姿右侧转体</p></li>-->
<!--        <li><img src="images/swim06.png" alt=""><p>游泳·跪姿左侧转体</p></li>-->




</div>
<!--底部区域-->
<div class="footer">
    <p><a href="#">关于天行健</a>   <a href="#">客户服务</a>  <a href="#">隐私政策</a>|  天行健公司版权所有 © 1997-2017 吴华庭、郑则栋、王鹏飞、赵英旗

    </p>
</div>
</body>
</html>