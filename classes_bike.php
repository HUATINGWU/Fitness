<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑步课程</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/bike.css">
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
<div class="bike_contect">
    <?php
    require_once "conn.php";

    $pic="select * from upload where uploadid>=80 and uploadid<=85 ";
    $rows=mysqli_query($conn,$pic);

    foreach($rows as $row){
        //echo $b=$row['pic']."<br>";

        echo "<ul><li><img src='{$row['pic']}'><p>{$row['title']}</p></li></ul>";

    }


    ?>
</div>
<!--底部区域-->
<!--底部区域-->
<?php
require_once "footer.php";
?>
</body>
</html>