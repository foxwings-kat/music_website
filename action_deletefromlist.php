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
$delfromplaylist = $_SESSION["playlist"];
mysqli_query($con,"set names utf8");

$delsongname = $_POST['selectedsongs'];

echo "<br><br><br><a>'$delsongname'移除成功</a>";
$sql2 = "DELETE FROM `list_songs` WHERE list_name = '$delfromplaylist' and songname = '$delsongname'";

$con->query($sql2);
header( "refresh:3;url=myplaylist.php" );
echo "";



$con->close();
?>