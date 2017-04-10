<?php
###### db ##########
$db_plu = 'root';
$db_password = '';
$db_name = 'db_toko';
$db_host = 'localhost';
################


//check we have plu post var
if(isset($_POST["plu"]))
{
	//check if its ajax request, exit script if its not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		die();
	}
	
	//try connect to db
	$connecDB = mysqli_connect($db_host, $db_plu, $db_password,$db_name)or die('could not connect to database');
	
	//trim and lowercase plu
	$plu =  strtolower(trim($_POST["plu"])); 
	
	//sanitize plu
	$plu = filter_var($plu, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
	
	//check plu in db
	$results = mysqli_query($connecDB,"SELECT * FROM db_barang WHERE plu='$plu'");
	
	//return total count
	$plu_exist = mysqli_num_rows($results); //total records
	
	//if value is more than 0, plu is not available
	if($plu_exist) {
		die('<img src="available.png" />');
	}else{
		die('<img src="not-available.png" />');
	}
	
	//close db connection
	mysqli_close($connecDB);
}
?>

