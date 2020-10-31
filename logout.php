<?php 
session_start();
//if(isset($_GET['logout']))
//{
	session_destroy();
setcookie('user', "", -time() + 60 * 60 * 24 * 365, '/');
setcookie('pass', "", -time() + 60 * 60 * 24 * 365, '/');
	header('location:index.php?logout=true');
	exit;
//}
?>