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

mysqli_query($con,"set names utf8");

$songname = $_POST['songname'];
$songwriter =$_POST['songwriter'];      
$uploader = $_SESSION["login_session"];

$sql = "SELECT*FROM songdata WHERE songname = '$songname'";//檢測資料庫是否已有帳號
$result = $con->query($sql);
	
if(mysqli_num_rows($result))
{
   echo "<br><br><br>歌曲已存在";
   header( "refresh:3;url=uploadpage.html" );
}
else
{
	$songname_no_blank = str_replace(" ","%",$songname);
	$songwriter_no_blank = str_replace(" ","%",$songwriter);
   $search_txt = $songname_no_blank.$songwriter_no_blank;
   
   $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=".$search_txt."&key=AIzaSyBMVkiyC3ru5vufSJuKNwXF880bjBuiGek&type=video&maxResults=1";
   $ch = curl_init();
   $timeout = 5;
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
   $contents = curl_exec($ch);
   
   if(strpos($contents,'error') == false&& strpos($contents,'"totalResults": 0,') == false)
   {
	    $TryStrpos = strpos($contents,'"videoId": "');
		echo $contents;
		curl_close($ch);
		echo "<br><br><br>歌曲新增成功";
		//$contents = trim($contents);
		//$contents = preg_replace('/\s(?=)/', '', $contents);
   
		$yturl = substr($contents,$TryStrpos+12,11);
		echo $yturl;
   
		$sql2 = "insert into songdata(songname,songwriter,uploader,url)Values('$songname','$songwriter','$uploader','$yturl')";
		$con->query($sql2);
		header( "refresh:10;url=uploadpage.html" );
		echo "<br><br>";
   }
   else 
   {
	   echo "<br><br><br>搜尋出現錯誤 請換關鍵字";
		header( "refresh:3;url=uploadpage.html" );
   }
   
   
}


$con->close();
?>
