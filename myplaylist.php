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
<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
</head>
<body>
<form name="login" action="editplaylist.php" method="post">

<DIV style="text-align:middle;background:orange">
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>
<span style="font-size:480%; background:orange">我的歌單</span>
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>	
<br>
</DIV>

<br>
<a href="create_playlist.html">創建歌單</a>
<a href="mysongs.php">返回</a>
<br><br>
<tr>
<form id="form1" name="form1" method="post" action="">
<label>選擇你的歌單
<select name="selectedlist">
<br><br>

<?php
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);
$user_id = $_SESSION["login_session"];

mysqli_query($con,"set names utf8");

$sql = "SELECT * FROM playlist_data where playlist_owner = '$user_id'";
$result = $con->query($sql);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	echo '<option value='.$row["playlist_name"].'>'.$row["playlist_name"].'</option>';
}
echo '<input type="submit" value="選擇歌單">';
$con->close();
?>
</tr>
<br><br>


</form>
</body>
</html>