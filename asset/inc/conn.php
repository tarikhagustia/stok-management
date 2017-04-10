<?php

#######################################################
#######################################################
#########        ###       ###        #################
#########  #########  ########  #######################
#########  #########       ###  ##    #################
#########  #########  ########  ##### #################
#########        ###  ########        #################
#######################################################
#######################################################

# CONFIG FILE
$author="Denden Priatna";
$app="I - STORE";
$store_name="Toserba Yogya Sukabumi";
$store_address="JL. R E Martadinata No 3";
$app_version="1.0 BETA";
$app_desc="Aplikasi Pengolahan Inventori";
$host="localhost";
$user="root";
$pass="";
$db="db_toko";

# ----------------------------------------------------- #
$author_fb = "";
$author_gp = "";
$author_tw = "";

$entries=10;
$waktu=date("Y-m-d H:i:s");
$koneksi=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);

if($koneksi){
	//echo "Berhasil koneksi";
}else{
	?><script language="javascript">document.location.href="ajax/page_500.php";</script><?php
}
?>