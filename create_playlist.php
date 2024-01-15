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
$user_id = $_SESSION["login_session"];
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);

mysqli_query($con,"set names utf8");



$playlistname =$_POST['playlistname'];
if ($playlistname=="")
{
	echo "播放清單名稱不可為空白";
	header( "refresh:3;url=create_playlist.html" );
}
else
{
$sql = "SELECT*FROM playlist_data WHERE playlist_name = '$playlistname'";//檢測資料庫是否已有
$result = $con->query($sql);
	
if(mysqli_num_rows($result))
{
	echo "<br><br><br>歌單已經存在";
	header( "refresh:3;url=create_playlist.html" );
}
else
{
	$sql2 = "insert into playlist_data(playlist_name,playlist_owner)Values('$playlistname','$user_id')";
	$con->query($sql2);
	echo "<br><br><br>歌單創建成功";
	header( "refresh:3;url=create_playlist.html" );
	echo "<br><br>";
}
}

$con->close();
?>