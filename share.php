<?php
session_start();
if ($_POST){
    include_once('conn.php');
    include_once('uploadclass.php');
    $title=$_POST['title'];
    $pic=$uploadfile;
    if($title == "")
     echo"<Script>window.alert('对不起！你输入的信息不完整!');history.back()</Script>";
    $sql="update upload set title='$title',pic='$pic' where uploadid=61 ";
    $result=mysqli_query($conn,$sql);
echo"<Script>window.alert('信息添加成功');location.href='upload.php'</Script>";
header("Location:index.php");
}
?>
<?php
include_once('conn.php');
$que="select username from adm";
$res=mysqli_query($conn,$que);
$row=$res->fetch_array();

?>
<html>
<head>
    <title>自拍分享社区</title>
    <style>
        .self{

            margin: 150px auto;
            border: 2px solid gray;
            border-radius: 9px;
            width: 500px;
            height: 380px;
            background-color: #584f60;
        }
        .self input{
            margin-top: 10px;

        }
        .self input{
            margin-left: 15%;
            width: 320px;
            height: 45px;
            border-radius: 10px;
        }
        body{
            background-color: #161616;
            background-size: cover;
        }
        .self td{
            color: ghostwhite;
        }
    </style>
</head>
<body>
<?php
if($_SESSION['username1']==$row['username']){
	echo"<div class='self'><form method=\"post\" action=\"?action=save\" enctype=\"multipart/form-data\" name='action'>
    <table border=0 cellspacing=0 cellpadding=0 align=center width=\"100%\">
        <tr>
            <td width=55 height=30 align=\"center\"> </TD>
            <td height=\"16\">

                <table width=\"48%\" height=\"93\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tr>
                        <td>语录：</td>
                        <td><input name=\"title\" type=\"text\" id=\"title\"></td>
                    </tr>
                    <tr>
                        <td>自拍： </td>
                        <td><label>
                                <input name=\"file\" type=\"file\" value=\"浏览\" >
                                <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2000000\">
                            </label></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td><input type=\"submit\" value=\"上 传\" name=\"upload\"></td>
                    </tr>
                </table></td>
        </tr>
    </table>
</form></div>";
}else{
	echo "<h1 style=\"color: red\">您没有权限登陆！！</h1>";
}
?>


</body>
</html>