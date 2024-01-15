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


$sql = "SELECT*FROM userdata WHERE user_id = '$account' and user_pw ='$password'";//檢測資料庫是否有對應的username和password的sql
$result = $con->query($sql);

if(!mysqli_num_rows($result))
{
   echo "<br><br><br>登入失敗";
   header( "refresh:3;url=login.html" );
}
else
{
   $_SESSION["login_session"]=$account;
   
   echo '<DIV style="text-align:middle;text-valign:middle;background:orange">
		 <span style="font-size:300%; background:orange">歡迎回來'.$account.'</span>
		 </DIV>';
   header( "refresh:3;url=mainpage.php" );
   echo "<br><br>";
}


$con->close();
?>