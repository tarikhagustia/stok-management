<?php  session_start();
if(isset($_SESSION['username']))
{
	session_destroy();
	header('Location:login.php?status=Anda sudah Keluar');
}else{
	session_destroy();
	header('Location:login.php?status=Silahkan Login!');
}
?>