<?php
 session_start();
 if ( $_SESSION["login_session"]=="false" ) 
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
#rows {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#rows td, #rows th {
  border: 1px solid #ddd;
  padding: 8px;
}

#rows tr:nth-child(even){background-color: #f2f2f2;}

#rows tr:hover {background-color: #ddd;}

#rows th {
  text-align: middle;
  background-color: #FFA500;
  color: white;
}

</style>

<html lang="en">

<head>
<meta charset="UTF-8">
</head>
<body>
<form name="login" action="searchsong.php" method="post">

<DIV style="text-align:middle;text-valign:middle;background:orange">
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>
<span style="font-size:480%; background:orange">歡迎光臨音樂蕉流平台</span>
<img src="https://steamuserimages-a.akamaihd.net/ugc/960853363633424461/4C0E46016EE7ABF8440FCA7B9B5AB60EF55AA969/"
style="width:120px;height:85px"/>

<br>
<table id="rows">
<tr>
    <th width="20%"><a style="font-size:120%;" href="mainpage.php"><big>首頁</big></a></th>
    <th width="20%" ><a style="font-size:120%;" href="mysongs.php"><big>我的歌曲</big></a></th>
	<th width="20%" ><a style="font-size:120%;" href="displayallsongs.php"><big>所有歌曲</big></a></th>
    <th width="20%"><a style="font-size:120%;" href="uploadpage.html"><big>上傳</big></a></th>
	
	<th><input value="搜尋歌曲" style="width:200px;height:30px" type=text name="searchsong"/></th>
</tr>
</table>
</DIV>
<DIV style="text-align:right;">
<th><span style="font-size:150%; background:#008000">使用者 : </span>
<?php echo '<span style="font-size:150%;background:#008000">'.$_SESSION["login_session"].'</span>'?></th>
<br>
<th><a style="font-size:100%;" href="action_logout.php"><big>登出</big></a></th>
<th><a style="font-size:100%;" href="accsetting.html"><big>更改密碼</big></a></th>
</DIV>

<?php
$db_host = "localhost"; 
$db_id = "root";        
$db_pw = "";
$db = "musicweb";
$con = new mysqli($db_host,$db_id,$db_pw,$db);

mysqli_query($con,"set names utf8");

$sql = "SELECT * FROM songdata";
$result = $con->query($sql);

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
?>
</tr>
</form>
</body>
</html>