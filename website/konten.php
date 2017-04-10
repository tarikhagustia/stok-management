<?php
if(isset($_GET['page'])){
	$page=$_GET['page'];	
	$file="$page.php";
	
	if (!file_exists($file)){
		include ("404.php");
	}else{
		include ("$page.php");
	}
}else{
	include ("branda.php");
}
?>