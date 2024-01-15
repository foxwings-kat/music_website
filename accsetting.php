<?php
 session_start();
 if ( $_SESSION["login_session"]=="" ) 
 header( "Location:login.html" );
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
$oldacc = $_SESSION["login_session"];

mysqli_query($con,"set names utf8");

echo $_SESSION["login_session"];
$password =$_POST['changepw'];

if ($password=="")
{
	echo "密碼不可為空白";
	header( "refresh:3;url=accsetting.html" );
}
else 
{
	
	//UPDATE `userdata` SET `user_id`=[value-1],`user_pw`=[value-2] WHERE 1
	$sql2 = "UPDATE userdata SET user_pw = '$password'
	WHERE user_id = '$oldacc'";
	$con->query($sql2);
	echo "<br><br><br>更改成功";
	$_SESSION["login_session"] = "";
	header( "refresh:3;url=login.html" );
}



$con->close();
?>