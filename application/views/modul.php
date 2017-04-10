<?

include "../inc/conn.php";
session_start();

$plu = $_POST['plu'];
$brand = $_POST['brand'];
$article = $_POST['article'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
if(isset($_POST['simpan_art'])){

	
	$query=mysql_query("INSERT INTO db_barang VALUES ('','$plu','$brand','$article','$harga_beli','$harga_jual')");


	
	if($query){
	
	mysql_query("INSERT INTO db_inv VALUES ('','$plu','0')");





		?><script language="javascript">document.location.href="../index.php?p=pg_inv_search&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_art_input&status=2";</script><?php
	}
	
}else{
	unset($_POST['simpan_art']);
}





?>
<?php

$plu = $_POST['plu'];
$qty = $_POST['qty'];
$tgl_rec = $_POST['tgl_rec'];

if(isset($_POST['simpan_rec'])){


	$plu_query=mysql_query("SELECT * FROM db_barang WHERE plu='$plu'");
	$data_plu=mysql_fetch_array($plu_query);
	$plu_id= $data_plu['id_brg'];
	$plu_harga=$data_plu['harga_beli'];
	$qty_jml=mysql_query("SELECT * FROM db_inv WHERE plu='$plu'");
	$data_qty=mysql_fetch_array($qty_jml);
	$qty_jml_data= $data_qty['jml_inv'];	
	$query=mysql_query("UPDATE db_inv SET jml_inv='$qty_jml_data'+$qty WHERE plu='$plu'");
	$query2=mysql_query("INSERT INTO db_rec VALUES ('','$plu','$qty','$tgl_rec','$qty'*$plu_harga)");
	
	if($query2&$query){
		
		?><script language="javascript">document.location.href="../index.php?p=pg_rec&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_rec&status=2";</script><?php
	}
	
}else{
	unset($_POST['simpan_rec']);
}


?>
<?php
if(isset($_POST['simpan_inv_adj'])){
	$plu = $_POST['plu_inv'];
	$qty = $_POST['qty_inv'];

	
	
	$query_inv=mysql_query("UPDATE db_inv SET jml_inv='$qty' WHERE plu='$plu'");
	
	if($query_inv){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_adj&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_adj&status=2";</script><?php
	}
	
}else{
	unset($_POST['simpan_inv_adj']);
}

?>
<?php
if(isset($_POST['simpan_sales'])){
	$plu = $_POST['plu_sales'];
	$qty = $_POST['qty_sales'];
	$tgl = $_POST['tgl_sales'];
		
	$plu_query=mysql_query("SELECT * FROM db_barang WHERE plu='$plu'");
	$data_plu=mysql_fetch_array($plu_query);
	
	$plu_harga= $data_plu['harga_jual'];

	$qty_jml=mysql_query("SELECT * FROM db_inv WHERE plu='$plu'");
	$data_qty=mysql_fetch_array($qty_jml);
	$qty_jml_data= $data_qty['jml_inv'];
	
	$query_inv=mysql_query("INSERT INTO db_sales VALUES ('','$plu','$tgl','$qty','$qty'*$plu_harga)");
	
	if($query_inv){
		$query3=mysql_query("UPDATE db_inv SET jml_inv='$qty_jml_data'-$qty WHERE plu='$plu'");

		?><script language="javascript">document.location.href="../index.php?p=pg_sales&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_sales&status=2";</script><?php
	}
	
}else{
	unset($_POST['simpan_sales']);
}

?>
<?php
if(isset($_POST['login'])){
//tangkap data dari form login
$usr_username = $_POST['usr_username'];
$usr_password = md5($_POST['usr_password']);

//untuk mencegah sql injection
//kita gunakan mysql_real_escape_string
$usr_username = mysql_real_escape_string($usr_username);
$usr_password = mysql_real_escape_string($usr_password);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($usr_username) && empty($usr_password)) {
	//kalau username dan password kosong
	header('location:../login.php?status=login1');
	break;
} else if (empty($usr_username)) {
	//kalau username saja yang kosong
	header('location:../login.php?status=login2');
	break;
} else if (empty($usr_password)) {
	//kalau password saja yang kosong
	header('location:../login.php?status=login3');
	break;
}

$q = mysql_query("select * from tb_users where usr_username='$usr_username' and usr_password='$usr_password'");
$q2 = mysql_query("select * from tb_users where usr_username='$usr_username' and usr_password='$usr_password'");
$sesi = mysql_fetch_array($q2);
$akses = mysql_fetch_assoc($q);
$jam=date("H:i:s");
if (mysql_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['usr_username'] = $usr_username;
	$_SESSION['usr_waktu'] = $jam;
	$_SESSION['usr_akses_1'] = $sesi['usr_akses'];
	$_SESSION['usr_nama'] =	$sesi['usr_nama'];
	
	//redirect ke halaman index
	header('location:../index.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:../login.php?status=login4');
	}

}else{
	unset($_POST['login']);
}

?>

<?php

if (isset($_POST['usr_baru'])) {
$usr_username_baru = $_POST['usr_username_baru'];
$usr_password_baru = md5($_POST['usr_password_baru']);
$usr_nama_baru = $_POST['usr_nama_baru'];
$usr_akses_baru = $_POST['usr_akses_baru'];

if (empty($usr_username_baru)) {
	//kalau username dan password kosong
	header('location:../index.php?p=pg_users&status=');
	break;
} else if (empty($usr_password_baru)) {
	//kalau username saja yang kosong
	header('location:../index.php?p=pg_users&status=2');
	break;
} 

// Cek username di database
$cek_user=mysql_num_rows(mysql_query("SELECT usr_username FROM tb_users WHERE usr_username='$usr_username_baru'"));
// Kalau username sudah ada yang pakai
if ($cek_user > 0){
	?>
  <script language="javascript">document.location.href="../index.php?p=pg_users&status=2";</script>
  <?php

}else{
  mysql_query("INSERT into tb_users VALUES('','$usr_username_baru','$usr_password_baru','$usr_nama_baru','$usr_akses_baru')");
	?><script language="javascript">document.location.href="../index.php?p=pg_users&status=1";</script><?php
}
  }

?>
<?php
$id_brg=$_GET['plu'];
if(isset($_GET['plu'])){
$query=mysql_query("DELETE FROM db_barang WHERE plu='$id_brg'");
if($query){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_search&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_search&status=2";</script><?php
	}
	}
?>
<?php
	
	$id_update = $_POST['id_brg'];
	$plu_update = $_POST['plu_update'];
	$brand_update = $_POST['brand_update'];
	$article_update = $_POST['article_update'];
	$harga_beli_update = $_POST['harga_beli_update'];
	$harga_jual_update = $_POST['harga_jual_update'];
if(isset($_POST['simpan_art_update'])){
		

		
	$query5=mysql_query("UPDATE db_barang SET brand='$brand_update',article='$article_update',harga_beli='$harga_beli_update',harga_jual='$harga_jual_update' WHERE id_brg='$id_update'");
	
	if($query5){
		?><script language="javascript">document.location.href="../index.php?p=pg_art_mtc&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_art_mtc&status=2";</script><?php
	}
	
}else{
	unset($_POST['simpan_art_update']);
}

?>
<?php
$hapus_usr=$_GET['hapus_usr'];
if(isset($_GET['hapus_usr'])){
$query=mysql_query("DELETE FROM tb_users WHERE usr_username='$hapus_usr'");
if($query){
		?><script language="javascript">document.location.href="../index.php?p=pg_users&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_users&status=2";</script><?php
	}
	}
?>
<?php
$lisensi=$_POST['serial2'];

if(isset($_POST['simpan_lisensi'])){
$bulandepan = mktime (0,0,0, date("m")+4, date("d"), date("Y"));
$bulansekarang=date('Ymd', $bulandepan);
$q_l = mysql_query("SELECT * FROM lisensi");
$lisensi_q = mysql_fetch_array($q_l);
$serial=$lisensi_q['serial'];
if($lisensi<>$serial){
	?><script language="javascript">document.location.href="error.php?s=wrong1";</script><?php
}
$query7=mysql_query("UPDATE lisensi SET serial2='$lisensi', tgl_exp='$bulansekarang' WHERE id='1' ");
if($query7){
		?><script language="javascript">document.location.href="error.php?s=true";</script><?php
	}else{
		?><script language="javascript">document.location.href="error.php?s=wrong";</script><?php
	}
	
	}else{
	unset($_POST['simpan_lisensi']);
}
?>
<?
$bulandepan = mktime (0,0,0, date("m")+4, date("d"), date("Y"));
$bulansekarang=date('Ymd', $bulandepan);
$serial2=$_POST['serial2'];
$serial=$_POST['serial'];
if(isset($_POST['simpan_lisensi1'])){

$query7=mysql_query("UPDATE lisensi SET serial2='$serial2', tgl_exp='$bulansekarang', serial='$serial' WHERE id='1' ");
if($query7){
		?><script language="javascript">document.location.href="error.php?s=true";</script><?php
	}else{
		?><script language="javascript">document.location.href="error.php?s=wrong";</script><?php
	}
	
	}else{
	unset($_POST['simpan_lisensi1']);
}

?>
<?php


if(isset($_POST['simpan_so_step1'])){
$inv_desc=$_POST['inv_desc'];
$nomor_so=date("YmHi");
$bulandepan = mktime (0,0,0, date("m"), date("d"), date("Y"));
$bulansekarang=date('Y-m-d', $bulandepan);


$query8=mysql_query("INSERT INTO db_inv_so (nomor_so, inv_desc, tgl_so, status) VALUES ('$nomor_so','$inv_desc','$bulansekarang','1')");
if($query8){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=2";</script><?php
	}
	
	}else{
	unset($_POST['simpan_so_step1']);
}
?>
<?php


if(isset($_POST['simpan_so'])){
// Fungsi mengambil data barang'
	

$inv_desc=$_POST['inv_desc'];
$inv_no=$_POST['inv_no'];
$plu=$_POST['plu'];
$tgl_so=$_POST['tgl_so'];
$qty2=$_POST['qty2'];
$querybarang = mysql_query("SELECT * FROM db_inv WHERE plu='$plu'");
$databarang=mysql_fetch_assoc($querybarang);
$qty=$databarang['jml_inv'];


// Cek PLU apakah ada atau tidak 
$cekplu = mysql_query("SELECT * FROM db_barang WHERE plu='$plu'");
if ($datacek = mysql_fetch_assoc($cekplu)) {
	if ($datacek['plu'] == $plu) {
		$cekpluso = mysql_query("SELECT * FROM db_inv_so WHERE plu='$plu' AND status='1'");
		$datacekso = mysql_fetch_assoc($cekpluso);
		if($datacekso['plu'] == $plu) { ?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=so2&inv_no=<?php echo $inv_no; ?>";</script><?php }else{ //
				$InsertQuery = "INSERT INTO db_inv_so VALUES ('','$inv_no','$inv_desc','$tgl_so','$plu','$qty','$qty2','1')";
				if(mysql_query($InsertQuery)){
					?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=so1&inv_no=<?php echo $inv_no; ?>";</script><?php
	
					}else{
		
	}
}
		
	}



}?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=so3&inv_no=<?php echo $inv_no; ?>";</script><?php // Menampilkan error data tidak ada


//$query8=mysql_query("INSERT INTO db_inv_so (nomor_so, inv_desc, tgl_so) VALUES ('$nomor_so','$inv_desc','$bulansekarang')");

	
	}else{
	unset($_POST['simpan_so']);
}
?>
<?php


if(isset($_GET['delete_so'])){
$nomor_so = $_GET['delete_so'];

$query9=mysql_query("DELETE FROM db_inv_so WHERE nomor_so='$nomor_so'");
if($query9){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=1";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=2";</script><?php
	}
	
	}else{
	unset($_GET['delete_so']);
}
?>
<?php


if(isset($_POST['update_so'])){
$nomor_so = $_POST['nomor_so'];
$jmlinv = $_POST['jmlinv'];
	
	
	for ($i=1; $i<=$jmlinv; $i++)
	{
	  
	   $plu  = $_POST['plu'.$i];
	   $qty2  = $_POST['qty2'.$i];
	  
	   $query = "UPDATE db_inv_so SET qty2='$qty2' WHERE plu='$plu' AND nomor_so='$nomor_so'";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=1&inv_no=<?php echo $nomor_so; ?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=2";</script><?php
	}
	
	
}else{
	unset($_POST['update_so']);
}
?>
<?php


if(isset($_GET['plu_del_so'])){
$plu = $_GET['plu_del_so'];
$nomor_so = $_GET['nomor_so'];	
	
	$query="DELETE FROM db_inv_so WHERE plu ='$plu'";
	$hasil=mysql_query($query);
	if($hasil){
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=1&inv_no=<?php echo $nomor_so; ?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so&status=2";</script><?php
	}
	
	
}else{
	unset($_GET['plu_del_so']);
}
?>
<?php


if(isset($_POST['update_so_inv'])){
$nomor_so = $_POST['nomor_so'];
$jmlinv = $_POST['jmlinv'];
	
	
	for ($i=1; $i<=$jmlinv; $i++)
	{
	  
	   $plu  = $_POST['plu'.$i];
	   $qty2  = $_POST['qty2'.$i];
	  
	   $query = "UPDATE db_inv SET jml_inv='$qty2' WHERE plu='$plu'";
	   $hasil=mysql_query($query);
	}
	
	if($hasil){
		$updatestatusso = mysql_query("UPDATE db_inv_so SET status='2' WHERE nomor_so='$nomor_so'");
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so_update&status=1&inv_no=<?php echo $nomor_so; ?>";</script><?php
	}else{
		?><script language="javascript">document.location.href="../index.php?p=pg_inv_so_update&status=2";</script><?php
	}
	
	
}else{
	unset($_POST['update_so_inv']);
}
?>

