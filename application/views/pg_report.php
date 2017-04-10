<?php
include "inc/conn.php";
?>
<link rel="stylesheet" href="css/jquery.dateselect.css">
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">Report Center</a></li>
			<li><a href="#">Card Expire</a></li>
			
		</ol>
		<div id="social" class="pull-right">
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-youtube"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-usd"></i>
					<span>Report Kartu Kadaluarsa</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
				
			</div>
			<div class="box-content">
			<form action="?p=pg_report" method="post" class="form-horizontal">
						<div class="form-group">
						<label class="col-sm-2 ">Tanggal Sekarang</label>
						<div class="col-sm-2">
						<input type="text" name="mbr_exp" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Masukkan Nomor Kartu" data-select="date">
						</div>
						<button type="submit" name="mbr_exp_cari" class="btn">GO</button>
						</div>
						</form>
				<?php
				if ($_POST['mbr_exp']) {
				?>
			
				<table class="table table-bordered table-striped table-hover table-heading table-bordered"  id="datatable-3">
					<thead>
						<tr>
							<th>Nomor Identitas</th>
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Tanggal Expire</th>
							<th>Negara Bagian</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php
					$mbr_exp = $_POST['mbr_exp'];
					if (isset($_POST['mbr_exp_cari'])) {
					
						$query=mysql_query("SELECT * FROM tb_member WHERE mbr_exp < '$mbr_exp'");
						
						while($data=mysql_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $data['mbr_nomor_lain']; ?></td>
							<td><?php echo $data['mbr_nama_depan']; ?> <?php echo $data['mbr_nama_belakang']; ?></td>
							<td><?php echo $data['mbr_tgl_lhr']; ?></td>
							<td><?php echo $data['mbr_jenis_kelamin']; ?></td>
							<td><?php echo $data['mbr_exp']; ?></td>
							<td><?php echo $data['mbr_kebangsaan']; ?></td>
						</tr>
						<?php
					}
				}

						?>
						
					<!-- End: list_row -->
					</tbody>
					<tfoot>
						<tr>
							<th>Nomor Identitas</th>
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Tanggal Expire</th>
							<th>Negara Bagian</th>
						</tr>
					</tfoot>
					<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="plugins/jquery/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/jquery.dateselect.js"></script>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
