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
<form name="login" action="logged.php" method="post">

<h1>歡迎光臨音樂蕉流平台</h1>
<h1>user:<?php echo $_SESSION["login_session"]?></h1>
<h1><a href="action_logout.php">登出</a></h1>
<tr>
    <th><a href="logged.php">首頁</a></th>
    <th>帳號管理</th> 
    <th><a href="uploadpage.html">上傳</a></th>
	<th>所有歌曲</th>
	<th>搜尋歌曲<input type=text name="searchsong"></th>
	<iframe width="560" height="315" src="https://www.youtube.com/embed/LoDJPZ81Ww0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</tr>
</form>
</body>
</html>