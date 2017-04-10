<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['usr_username']) || empty($_SESSION['usr_username'])) {
	//redirect ke halaman login
	header('location:login.php');
}
?>