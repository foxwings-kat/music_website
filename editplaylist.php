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
<span style="font-size:480%; background:orange">編輯歌單</span>
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>	
<br>
</DIV>
<br>
<?php
$playlist = $_POST["selectedlist"];
echo '<a>目前歌單：'.$playlist.'</a><br>';
?>
<a href="uploadtolist.php">上傳歌曲至歌單</a>
<a href="deletefromlist.php">從歌單移除歌曲</a>
<a href="mysongs.php">返回</a>

<?php
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);
$user_id = $_SESSION["login_session"];
$playlist = $_POST["selectedlist"];
$_SESSION["playlist"] = $_POST["selectedlist"];

//echo '<a>目前歌單：'.$playlist.'</a>';
if ($playlist=="")
{
	echo '<a>你沒有選擇清單</a>';
	header( "refresh:3;url=myplaylist.php" );
}
else {
$sql = 'SELECT * FROM songdata LEFT JOIN list_songs ON(songdata.songname = list_songs.songname) where list_songs.list_name ="'.$playlist.'"';
$result = $con->query($sql);
echo '<br><br>';
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$src = "https://www.youtube.com/embed/".$row["url"];
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'; //網頁編碼宣告  
    echo '<iframe width="560" height="315" src='.$src.' frameborder="0"
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
	picture-in-picture" allowfullscreen></iframe>';
	echo '<br>';
	echo '<a>歌名：</a>';
	echo $row["songname"];
	echo '<br>';
	if ($row["songwriter"]=="")
	{
		echo $row["songwriter"];
	}
	else 
	{
		echo '<a>作者：</a>';
		echo $row["songwriter"];
		echo '<br>';
	}
	echo '<a>上傳者：</a>';
	echo $row["uploader"];
	echo '<br>';
	echo '<br>';
}
$con->close();
}
?>
</tr>
<br><br>


</form>
</body>
</html>