<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
        require_once 'mysql.php';
        ?>
    <meta charset="gb2312">
    <title>天行健 |Build up Your Body </title>
   <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/index.css">
    <script type="text/javascript" src="js\jquery-2.2.1.min.js"></script>
     <script src="js1\db_user.js"></script>
    <script src="third-part\JQuery\jquery-1.12.1.min.js"></script>
<script src="js\jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/animate.min.css">

    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script>
        $(document).ready(function () {
            var userManager = getUserManager();
            // ---------------------------------------------------------
            $('#btn_login').click(function () {
                var account = $('#account0').val();   // string key
                var pwd = $('#pwd0').val();           // string
                if (userManager.login(account, pwd)) {
                    
                    $('#LoginBox').hide();
                    $('#mask').addClass('#mask').hide();
                    //
                    $('#div_loginOrRegister').hide();
                    $('#div_account').show();
                    var user = userManager.getCurrentUser();
                    $('#span_name').html(user.name +"欢迎你");
                } else {
                    alert('用户名或密码不正确');
                }
            });
            $('#btn_logout').click(function () {
                userManager.logout();
                $('#div_account').hide();
                $('#div_loginOrRegister').show();
                $('#span_name').empty();
            });
            $('#btn_register').click(function () {
                var user = {
                    account: $('#account').val(),   // string key
                    pwd: $('#pwd').val(),           // string
                    name: $('#name').val(),         // string
                    gender: $('#gender').val(),     // string
                    age: parseInt($('#age').val()), // int
                    tel: $('#tel').val(),           // string
                    email: $('#email').val(),       // string
                    address: $('#address').val(),   // string
                };
                if (userManager.registerUser(user)) {
                    $('#div_loginOrRegister').hide();
                    if (userManager.login(user.name, user.pwd)) {
                        $('#div_register').hide();
                    $('#mask').addClass('#mask').hide();
                        //
                        $('#div_loginOrRegister').hide();
                        $('#div_account').show();
                        $('#span_name').html(user.name +"欢迎你");
                    } else {
                    }
                } else {
                    alert('注册失败');
                }
            });
            // ---------------------------------------------------------挡住登陆或者注册页面
            $('#btn_to_login').click(function () {
                $('#div_login').show();
                $('#div_register').hide();
            });
            $('#btn_to_register').click(function () {
                $('#div_login').hide();
                $('#div_register').show();
            });
            // ---------------------------------------------------------
            var user = userManager.getCurrentUser();
            if (user) {
                $('#div_account').show();
                $('#span_name').html(user.name);
            } else {
                $('#div_loginOrRegister').show();
            }
        });
    </script>

    

    <style>
    #div_register{position:absolute;left:460px;top:150px;background:white;width:426px;height:682px;border:3px solid #444;border-radius:7px;z-index:10000;display:none;}
.row3{background:#f7f7f7;padding:0px 20px;line-height:50px;height:50px;font-weight:bold;color:#666;font-size:20px;}
.row4{height:57px;line-height:77px;padding:0px 30px;font-family:华文楷体;font-size:x-large;}


    </style>

</head>
<body>
<!--顶部区域-->

<div class="top">
        <div class="top_in">
        <div class="top_left">
            <h1><a href="#" title="天行健"><img src="" alt=""></a></h1>
        </div>
		 <?php require_once"count.php";?>
        <div class="top_right">
            <ul class="top_nav">

                <li><a href="#class">课程内容</a></li>
                <li><a href="#photo_share">社区</a></li>
                <li><a href="#store">商城</a></li>
             </ul>
			

                     <ul class="top_login">
                <?php
//                    session_start();
//                if($_SESSION['txt_account_login']){
                    
                    
//                  
//                      $useraccount = $_COOKIE['username'];
                
                if(isset($_COOKIE)){
                if(isset($_COOKIE['account'])){
                    //echo'<ul class="top_login">';
               echo"<font color='#fffaa' size='4px' >welcome ".$_COOKIE['account'];
              echo'<li><a href="logout.php" id="lg_id" name="lg_nm">注销</a>|<a href="alteruser.php" id="alt_id" name="alt_nm">修改</a></li>';
                   //echo'<a href="logout.php" id="lg_id" name="lg_nm">修改</a>';
//                    echo'welcom'.$_s
                    
                }else{
                   echo ' <ul class="top_login">
                    <li><a href="#" id="btn_to_login">登录</a></li>
                <li><a href="#" id="btn_to_register">注册</a></li>
                <li></li>'; 
                    
                }
                
                }
                else {
                echo ' <ul class="top_login">
                    <li><a href="#" id="btn_to_login">登录</a></li>
                <li><a href="#" id="btn_to_register">注册</a></li>
                <li></li>';    
                }
                ?>

<!--                 <li><a href="#" id="btn_to_login">登录</a></li>
                <li><a href="#" id="btn_to_register">注册</a></li>
                <li></li>-->
             
            </ul>
            
        </div>
           
</div>
<div id="div_account" style=" float: right;color: gray; font-size: 15px;font-weight:initial ;margin-top: -50px" >
                <span id="span_name" ></span>
                <button id="btn_logout" style="background:salmon;text-align: none;opacity: 0">注销</button>
                </div>
                <div id="user1" style="float: right;margin-top: -30px;" >
<!--                    <a href="html\allUsers.html">所有用户</a>-->
                </div>
</div>




<!--登陆窗-->
<form id="LoginBox" style=" display:none;" action="login.php" method="post" name="loginbox1">
    <div class="row1">
        登录窗口<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="closeBtn">×</a>
    </div>
    
    <div class="row">
        账号: <span class="inputBox">
            <input type="text" id="account0" name="txt_account_login" placeholder="账号/邮箱" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn">*</a>
    </div>
    <div class="row">
        密&nbsp;码: <span class="inputBox">
            <input type="text" id="pwd0" name="txt_pwd_login" placeholder="密码" />
            </span><a href="javascript:void(0)" title="提示" class="warning" id="warn2">*</a>
    </div>
    <div class="row">
        <input type="submit" name="submit_login" value="sbumit">
    </div>
</form>

<script type="text/javascript">
    $(function ($) {
        //弹出登录
        $("#btn_to_login").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.6'
            }, 1000);
        }).on('click', function () {
            $("body").append("<div id='mask'></div>");
            $("#mask").addClass("mask").fadeIn("slow");
            $("#LoginBox").fadeIn("slow");
        });
        //
        //按钮的透明度
        $("#loginbtn").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.8'
            }, 1000);
        });
        //文本框不允许为空---按钮触发
//        $("#loginbtn").on('click', function () {
//            var txtName = $("#txtName").val();
//            var txtPwd = $("#txtPwd").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
//                    $(".warning").css({ display: 'block' });
//                }
//                else {
//                    $("#warn").css({ display: 'block' });
//                    $("#warn2").css({ display: 'none' });
//                }
//            }
//            else {
//                if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
//                    $("#warn").css({ display: 'none' });
//                    $(".warn2").css({ display: 'block' });
//                }
//                else {
//                    $(".warning").css({ display: 'none' });
//                }
//            }
//        });
//        //文本框不允许为空---单个文本触发
//        $("#txtName").on('blur', function () {
//            var txtName = $("#txtName").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                $("#warn").css({ display: 'block' });
//            }
//            else {
//                $("#warn").css({ display: 'none' });
//            }
//        });
//        $("#txtName").on('focus', function () {
//            $("#warn").css({ display: 'none' });
//        });
//        //
//        $("#txtPwd").on('blur', function () {
//            var txtName = $("#txtPwd").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                $("#warn2").css({ display: 'block' });
//            }
//            else {
//                $("#warn2").css({ display: 'none' });
//            }
//        });
//        $("#txtPwd").on('focus', function () {
//            $("#warn2").css({ display: 'none' });
//        });
        //关闭
        $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
            $("#LoginBox").fadeOut("fast");
            $("#mask").css({ display: 'none' });
        });
    });
</script>

<!--注册-->
<div id="div_register" style="display: none;"   >
    
   <div class="row3">
        注册窗口<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="closeBtn">×</a>
    </div>
    <form action="register.php" method="post">
     <div class="row4">
         
         账号<input type="text" id="account" name="txt_acount_reg">
         
   </div>

<!--        <div class="row4">密码<input  type="text" id="pwd" name="txt_pwd_reg">
</div>-->

        <div class="row4">姓名<input type="text" id="name" name="txt_nm_reg">   
</div>
        <div class="row4">密码<input  type="text" id="pwd" name="txt_pwd_reg">
</div>
<!--     <div class="row4">性别<select name="" id="gender" name="sl_gdr_reg">
        <option value="male" >男</option>
        <option value="female">女</option>
    </select>
</div>-->
     <div class="row4" id="gender">性别
         <input type="radio" name="gender" value="male">男
         <input type="radio" name="gender" value="female">女  
         
     </div>
     <div class="row4">年龄<input type="text" id="age" name="txt_age_reg" min="10" max="50">
</div>

     <div class="row4">电话号码<input type="tel" name="tel_tnm_reg" id="tel" > 
</div>

     <div class="row4">邮箱<input type="text" id="email" name="txt_em_reg">  
</div>

     <div class="row4">地址<input type="text" id="address" name="txt_ad_reg">  
</div>

<div class="row4">
    <label>注册</label>>
   <input type="submit" name="submit">
</div>
</form>
</div>
<script type="text/javascript">
	$(function ($) {
		//弹出登录
		$("#btn_to_register").hover(function () {
			$(this).stop().animate({
				opacity: '1'
			}, 600);
		}, function () {
			$(this).stop().animate({
				opacity: '0.6'
			}, 1000);
		}).on('click', function () {
			$("body").append("<form id='mask'></div>");
			 $("#mask").addClass("mask").fadeIn("slow");
			$("#div_register").fadeIn("slow");
		});

	  //
        //按钮的透明度
        $("#loginbtn").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.8'
            }, 1000);
        });
//        //文本框不允许为空---按钮触发
//        $("#loginbtn").on('click', function () {
//            var txtName = $("#txtName").val();
//            var txtPwd = $("#txtPwd").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
//                    $(".warning").css({ display: 'block' });
//                }
//                else {
//                    $("#warn").css({ display: 'block' });
//                    $("#warn2").css({ display: 'none' });
//                }
//            }
//            else {
//                if (txtPwd == "" || txtPwd == undefined || txtPwd == null) {
//                    $("#warn").css({ display: 'none' });
//                    $(".warn2").css({ display: 'block' });
//                }
//                else {
//                    $(".warning").css({ display: 'none' });
//                }
//            }
//        });
//        //文本框不允许为空---单个文本触发
//        $("#txtName").on('blur', function () {
//            var txtName = $("#txtName").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                $("#warn").css({ display: 'block' });
//            }
//            else {
//                $("#warn").css({ display: 'none' });
//            }
//        });
//        $("#txtName").on('focus', function () {
//            $("#warn").css({ display: 'none' });
//        });
//        //
//        $("#txtPwd").on('blur', function () {
//            var txtName = $("#txtPwd").val();
//            if (txtName == "" || txtName == undefined || txtName == null) {
//                $("#warn2").css({ display: 'block' });
//            }
//            else {
//                $("#warn2").css({ display: 'none' });
//            }
//        });
//        $("#txtPwd").on('focus', function () {
//            $("#warn2").css({ display: 'none' });
//        });
//        //关闭
        $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
            $("#div_register").fadeOut("fast");
            $("#mask").css({ display: 'none' });
        });
  
	});
	</script>	



<!--主页区域-->
<div class="home">
   
	<div class="video-bg"><video class="video-bg" src="images/sports.mp4" autoplay loop></div>
    <div class="motto">
        <h4>PERFECT BODY REQUIRES A LOT OF TRAINING</h4>
        <p>Start your way to healthy life with our personalized CrossFit programs.</p></div>
</div>





<!--课程区域-->
  <div class="classes_out" id="class">
<div class="classes">
    <div class="classes_top">
        <div class="title">
            <h4>专业课程，量身打造，你的私人定制</h4>
            <p>高水准教练，结合科学训练方法，这个夏天赐予你撩人身材</p>
        </div>
    </div>
    <div class="classes_content">
        <?php
        require_once "conn.php";

        $pic="select * from upload where uploadid>=68 and uploadid<=73";
        $rows=mysqli_query($conn,$pic);

        foreach($rows as $row){
            $src="{$row['pic']}";
//            echo "<ul>
//<li><a href={$row['name']}>
//<img src={$row['pic']}><h3>{$row['title']}</h3></a>
//</li></ul>";

        }


        ?>
        <ul>
            <li><a href="classes_swim.php"><img src=""><div class="classes_content_swim"><h3>游泳课程</h3></div></a></li>
            <li><a href="classes_yujia.php"><div class="classes_content_yujia"><h3>瑜伽课程</h3></div></a></li>
            <li><a href="classes_run.php"><div class="classes_content_run"><h3>跑步课程</h3></div></a></li>
            <li><a href="classes_qixie.php"><div class="classes_content_jutie"><h3>器械课程</h3></div></a></li>
            <li><a href="classes_quanji.php"><div class="classes_content_quanji"><h3>拳击课程</h3></div></a></li>
            <li><a href="classes_bike.php"><div class="classes_content_bk"><h3>动感单车课程</h3></div></a></li>

    </div>
</div>
      </div>
<!--分享区域-->
<div class="share" id="photo_share">

        <div class="share_top">
        <h4>这条路上，你并不孤独，他们成功了！</h4>
        <p>小伙伴们与你分享健身的体验与经历......</p>
            </div>
			<div class="share_login">

			</div>
    <li><a href="admlogin.php"><img src="images/alert.png" alt="" style="border-radius: 45px;width: 45px;height: 45px;"></a></li>
    <?php
    require_once "conn.php";

    $pic="select * from upload where uploadid>=56 and uploadid<=67";
    $rows=mysqli_query($conn,$pic);

    foreach($rows as $row){

        echo "<ul><li>
<img src='{$row['pic']}'>
         <div>

            <span><h3 style=\"color: #1dcb8b\">{$row['name']}:</h3>{$row['title']}</span>

        </div>
        </li></ul>";

    }


    ?>
<!--    <ul>-->
<!--        <li>-->
<!--         <div>-->
<!--            <img src="images/share00.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">陈小曼:</h3>健身很苦，但收获却是喜悦的,姐妹们加油哦</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share01.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">安其拉:</h3>人鱼线，马甲线，咖喱给gay，我可以的</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share02.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">赵英旗:</h3>举铁三个多月来瘦了15斤，肌肉也结实了不少，力量明显增强了</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share03.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">王鹏飞:</h3>这里的私教课不错，教练也都很耐心的为我指导动作，强烈推荐</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share04.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">郑则栋:</h3>穿衣显瘦，脱衣有肉，上衣一脱，美女的眼睛就没离开过我的胸肌，害羞</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share05.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">欧尚尚:</h3>大二下学期可比较少就选择了去健身房锻炼，一来是为了让自己不这么虚度时间，二来是强身健体</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share06.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">鹿粒:</h3>我好喜欢瑜伽，这里的老师身材超棒的，我的小肚腩也不见了</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share07.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">庞婷:</h3>我喜欢挥汗如雨的感觉，跑完步后出汗感觉被洗礼了一样，nice</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share08.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">钱烨:</h3>和男朋友一起来健身，晚上下班后虽然时间不多，但是挤挤还是会有的，加油！</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share09.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">叶余田:</h3>哈哈，健身两周啦，现在虽然不是很明显，不过坚持下去我相信很快就瘦了</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share10.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">黄子豪:</h3>我就是我，不一样的烟火，你就是你，两毛钱一盒的擦炮。嘲笑我没肌肉的人等着吧</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!--         <li>-->
<!--         <div>-->
<!--            <img src="images/share11.png" alt="">-->
<!--            <span><h3 style="color: #1dcb8b">那誰:</h3>我要前凸后翘，甩掉我的渣男我会然你后悔的，两个月后遇见一个不一样的自己！</span>-->
<!---->
<!--        </div>-->
<!--        </li>-->
<!---->
<!---->
<!--    </ul>-->
</div>

<!--商城-->
        <div class="sales" id="store">
            <h4 >器材专区</h4>
            <div class="sales_one"> <ul>

                    <?php
                    require_once 'con1.php';
//                    $localhost = 'localhost';
//                    $usernamesql = 'root';
//                    $passwordsql = 'root';
//                    $database = 'commodity';
//
//                    $con = mysqli_connect($localhost, $usernamesql, $passwordsql, $database);
//                    mysqli_query($con, 'set names utf8');
                    $select = 'select * from commodities limit 5';
                    $findrow = mysqli_query($con, $select);
                    while ($row = mysqli_fetch_array($findrow)) {
                        $i = 1;
                        $com_id = $row['com_ID'];
                        $com_name = $row['com_name'];
                        $com_price = $row['com_price'];
                        $com_show = $row['com_show'];
                        echo "
        <li>
    <a href=\"cod1.php?com_id=$com_id\">  <img src=\"$com_show\" alt=\"\"></a>            <p>$com_name</p>
        </li>
";
                    }
                    ?>

                </ul></div>
            <h4>食品专区</h4>
            <div class="food_one"> <ul>
                    <?php
//                $localhost = 'localhost';
//        $usernamesql = 'root';
//        $passwordsql = 'root';
//        $database = 'commodity';
//        $con = mysqli_connect($localhost, $usernamesql, $passwordsql, $database);
//        mysqli_query($con, 'set names utf8');
                    require_once 'con1.php';
                    $select = 'select * from commodities limit 5,10';
                    $findrow = mysqli_query($con, $select);
                    while ($row = mysqli_fetch_array($findrow)) {
                        $i = 1;
                        $com_id = $row['com_ID'];
                        $com_name = $row['com_name'];
                        $com_price = $row['com_price'];
                        $com_show = $row['com_show'];
                        echo "
        <li>
    <a href=\"cod1.php?com_id=$com_id\">  <img src=\"$com_show\" alt=\"\"></a>            <p>$com_name</p>
        </li>
";
                    }
                    ?>
                </ul></div>
        </div>
<!--底部区域-->
<div class="footer">
    <p><a href="#">关于天行健</a>   <a href="#">客户服务</a>  <a href="#">隐私政策</a>|  天行健公司版权所有 © 1997-2017 吴华庭、郑则栋、王鹏飞、赵英旗

</p>
</div>
</body>
</html>