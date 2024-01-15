<?php
 session_start();
 if ( $_SESSION["login_session"]=="false" ) 
 header( "Location:logged.php" );
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

 $sql = "SELECT * FROM songdata ORDER BY rand() LIMIT 1";
 $result = $con->query($sql);

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$src = "https://www.youtube.com/embed/".$row["url"];
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'; //網頁編碼宣告  
    echo '<iframe width="560" height="315" src='.$src.' frameborder="0"
	allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
	picture-in-picture" allowfullscreen></iframe>';
	break;
}

$con->close();
?>
<head>
    <script>
        function resize() {
        parent.document.getElementById("mainframe").height = document.body.scrollHeight; //將子頁面高度傳到父頁面框架
    }
    </script>
</head>
<body onload="resize();">
