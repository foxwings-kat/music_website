<?php
 session_start();
?>
<style>
body {
font-weight: bold;
color:white;
text-align:center;
background-image: url('https://cdn.shopify.com/s/files/1/0285/1316/products/w0275_1s_Velvet-Bananas-Removable-Peel-and-Stick-Wallpaper_Repeating-Pattern-Sample-2.jpg?v=1604091425');
  background-repeat: no-repeat; background-attachment: fixed; background-position: center center;
}

</style>
<?php
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);

mysqli_query($con,"set names utf8");



$account =$_POST['account'];
$password =$_POST['password'];
if ($account=="" || $password=="")
{
	echo "帳號密碼不可為空白";
	header( "refresh:3;url=signin.html" );
}
else
{
$sql = "SELECT*FROM userdata WHERE user_id = '$account'";//檢測資料庫是否已有帳號
$result = $con->query($sql);
	
if(mysqli_num_rows($result))
{
	echo "<br><br><br>帳號已經存在";
	header( "refresh:3;url=signin.html" );
}
else
{
	$sql2 = "insert into userdata(user_id,user_pw)Values('$account','$password')";
	$con->query($sql2);
	echo "<br><br><br>註冊成功";
	header( "refresh:3;url=login.html" );
	echo "<br><br>";
}
}

$con->close();
?>