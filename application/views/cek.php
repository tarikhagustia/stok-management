<?php
include "inc/conn.php";
$tgl=date('Ymd');
$q_l = mysql_query("SELECT * FROM lisensi");
$lisensi_q = mysql_fetch_array($q_l);
$serial=$lisensi_q['serial'];
$serial2=$lisensi_q['serial2'];
$tgl_exp=$lisensi_q['tgl_exp'];
if ($tgl_exp<$tgl) {
	?><script language="javascript">document.location.href="ajax/error.php?s=expire";</script><?php
}else{

if ($serial<>$serial2) {
	?><script language="javascript">document.location.href="ajax/error.php";</script><?php
}else{
	
}

}


?>  