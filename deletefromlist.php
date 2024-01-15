<?php
 session_start();
 if ( $_SESSION["login_session"]=="" ) 
 header( "Location:login.html" );
 if ($_SESSION["playlist"]=="")
 header( "Location:myplaylist.php" );
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
<form name="login" action="action_deletefromlist.php" method="post">

<DIV style="text-align:middle;background:orange">
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>
<span style="font-size:480%; background:orange">從歌單移除歌曲</span>
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>	
<br>
</DIV>

<tr>

<br><br>
<form id="form1" name="form1" method="post" action="">
<label>移除歌曲
<select name="selectedsongs">
<br><br>

<?php
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);
$user_id = $_SESSION["login_session"];
$dplaylist = $_SESSION["playlist"];

mysqli_query($con,"set names utf8");

$sql = "SELECT * FROM list_songs where list_name =".$dplaylist."";
$result = $con->query($sql);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	echo '<option value="'.$row["songname"].'">'.$row["songname"].'</option>';
}
echo '<input type="submit" value="移除">';
$con->close();
?>
</tr>
<br><br>
<a href="uploadpage.html">上傳歌曲</a>
<a href="mysongs.php">返回</a>

</form>
</body>
</html>