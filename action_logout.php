<?php
session_start();
$_SESSION['login_session']="";
header( "refresh:0;url=logged.php" );
?>