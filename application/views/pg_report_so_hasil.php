<?php
$nomor_so = $_GET['inv_no'];

?>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Dashboard</a></li>
			<li><a href="#">Pages</a></li>
			<li><a href="#">Invoice Page</a></li>
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
<div class="row" id="report-print">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-content">
				<div class="col-xs-6">
					<b><?php echo $this->config->item('app_name'); ?></b>
					<address>
						<strong><?php echo $this->config->item('app_desc'); ?></strong><br>
						<?php echo $this->config->item('app_store'); ?><br>
						<?php echo $this->config->item('app_address'); ?><br>
						Indonesia<br>
						
					</address>
					<address>
						<strong><?php echo $_SESSION['username'] ?></strong><br>
						
					</address>
				</div>
				<div class="col-xs-6 text-right">
					<address>
						<strong><?php echo $this->config->item('app_name')." Verison ". $this->config->item('app_version'); ?> </strong><br>
						
						
						
					</address>
					<h3 class="invoice-header">Inventory No # <?php echo $nomor_so; ?></h3>
					
					<p class="txt-danger">Stok Opname Day :<?php echo $datas[0]['tgl_so']; ?></p>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-12">
					<br/>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Plu</th>
								<th>Article</th>
								<th>Theo. Qty</th>
								<th>Count. Qty</th>
								<th>Variance Qty</th>
								<th>Theo.Value</th>
								<th>Count. Value</th>
								<th>Variance Value</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($datalists as $datalist) {
							$jumlah = $datalist['c_hj']-$datalist['t_hj'];
							?>
							<tr>
								
								<td>1</td>
								
								<td><?php echo $datalist['plu']; ?></td>
								<td class="m-ticker"><b><?php echo $datalist['brand']; ?></b><span><?php echo $datalist['article']; ?></span></td>
								<td><?php echo $datalist['qty1']; ?></td>
								<td><?php echo $datalist['qty2']; ?></td>
								<td><?php echo $datalist['var_qty']; ?></td>
								<td><?php echo number_format($datalist['t_hj'] , 0 , ',' , '.' ); ?></td>
								<td><?php echo number_format( $datalist['c_hj'] , 0 , ',' , '.' ); ?></td>
								<td><?php echo number_format( $jumlah , 0 , ',' , '.' ); ?></td>
								
							
								
							</tr>
							<?php
							$total=$total+$jumlah;
						}
							?>

							
							
							<tr class="active">
							<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								
								<td><b><?php echo number_format( $total , 0 , ',' , '.' ); ?></b></td>
							</tr>
						</tbody>
					</table>
					<small>* VAT included</small>
				</div>
				<div class="clearfix"></div>
				<div class="col-xs-6 col-xs-offset-6">
					<div class="col-xs-4">
						<a href="#" id="cetak" class="btn btn-default btn-label-left"><span><i class="fa fa-floppy-o"></i></span>Print</a>
					</div>
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url() ?>asset/plugins/jquery/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url() ?>asset/plugins/jquery/jquery.PrintArea.js"></script>
<script>
		(function($) {
			// fungsi dijalankan setelah seluruh dokumen ditampilkan
			$(document).ready(function(e) {
				
				// aksi ketika tombol cetak ditekan
				$("#cetak").bind("click", function(event) {
					// cetak data pada area <div id="#data-mahasiswa"></div>
					$('#report-print').printArea();
				});
			});
		}) (jQuery);
</script>