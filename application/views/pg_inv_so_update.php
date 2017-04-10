<?php $inv_no = $this->input->get('inv_no'); ?>
<script type='text/javascript' language='JavaScript'>
   

	function ijinkan(){
		window.location = '?inv_no='+document.stokopname.inv_no.value;
	}
	function numbersonly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8)
	{ //if the key isn't the backspace key (which we should allow)
		if (unicode<48||unicode>57) //if not a number
		return false //disable key press
    }
}

</script>
<body>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">I-STORE</a></li>
			<li><a href="#">Inventory</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Inventory Form</span>
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
			
				<h4 class="page-header">STOK OPNAME UPDATE</h4>
				
				<!-- FROM GROUP -->
						<?php
						echo $this->session->flashdata('pesan');
						?>
						
						
						<form action="ajax/modul.php" method="post" class="form-horizontal" name="stokopname">
						<div class="form-group">
						<label class="col-sm-2 control-label">Inventory Description</label>
						<div class="col-sm-2" hidden>
							<input type="text" name="inv_desc" class="form-control" value="" >
						
						</div>
						<div class="col-sm-2">
						<?php
						$inv_no = $this->input->get('inv_no');
						$d = $this->db->query("SELECT * FROM db_inv_so WHERE nomor_so='$inv_no' GROUP by nomor_so")->result_array();
						?>
						<span><?php echo $d[0]['inv_desc']; ?></span>
						
						</div>
						
						</div>
						
						<div class="form-group">
						
						<label class="col-sm-2 control-label">Inventory Nomor</label>
						<div class="col-sm-2">

						<select class="form-control" name='inv_no' onchange='ijinkan()'>
						<option value=""> - Select Inventory No -</option>
						<?php
						$inv_no = $this->input->get('inv_no');
						foreach($kategoris as $k) {
						?>
						<option value="<?php echo $k['nomor_so'] ?>" <?php if ($inv_no == $k['nomor_so']) { echo " SELECTED "; } ?>><?php echo $k['nomor_so'] ?></option>
						<?php } ?>
						
						</select>
						</div>
						
						
						</div>
						
				


					
					<div class="clearfix"></div>
					
					
						</form>
<form id="" action="<?php echo base_url()."index.php/home/update_so" ?>" method="post">
						<table class="table table-hover">
					<thead>
						<tr>
				 			<th>#</th>
							<th>Plu</th>
							<th>Description</th>
							<th>Qty</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$i = 1;
					foreach($datas as $d) {
					?>
						<tr>
						<input type="hidden" name="nomor_so" value="<?php echo $inv_no; ?>">
							<td><?php echo $i; ?></td>
							<td><input type="text" name="plu<?php echo $i; ?>" placeholder="Qty" maxlength="16" value="<?php echo $d['plu'] ?>"></td>
							<td><?php echo $d['brand'] ?> <?php echo $d['article'] ?> <?php echo $i; ?></td>
							<td><input type="text" name="qty2<?php echo $i; ?>" placeholder="Qty" maxlength="16" value="<?php echo $d['qty2'] ?>"></td>
							<td></td>
						</tr>
						<?php 
						$i++;
						}
						$jml = $i-1;
						
						 ?>
					<input type="hidden" name="jml" value="<?php echo $jml; ?>">
						
					</tbody>
				</table>
				<button type="submit" name="update_so_inv" class="btn btn-success btn-label-left" onclick="return confirm('Apakah anda yakin akan mengupdate ke Inventory\ndengan Nomor : <?php echo $inv_no; ?> ?');">
							<span><i class="fa fa-clock-o"></i></span>
								Update
							</button>
				</form>
						


					
	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->

