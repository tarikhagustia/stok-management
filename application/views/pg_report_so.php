
<script type='text/javascript' language='JavaScript'>
   

	function ijinkan(){
		window.location = '<?php echo base_url() ?>index.php/home/soreport_print?inv_no='+document.stokopname.inv_no.value;
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
					<span>Inventory Management</span>
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
			
				<h4 class="page-header">STOK OPNAME REPORT</h4>
				
				<!-- FROM GROUP -->
						
						
						
					
						<form action="ajax/modul.php" method="post" class="form-horizontal" name="stokopname">
						
						
						<div class="form-group">
						
						<label class="col-sm-2 control-label">Inventory Nomor</label>
						<div class="col-sm-2">

						<select class="form-control" name='inv_no' onchange='ijinkan()'>
						<option value=""> - Select Inventory No -</option>
						<?php
						$inv_no = $this->input->get('inv_no');
						foreach ($data as $rows) {
						$row = $rows['nomor_so'];							
						?>
						<option value="<?php echo $row ?>"<?php if ($inv_no == $row) { echo " SELECTED "; } ?>><?php echo $row ?></option>
						<?php
						}
					
						?>
						
				
						</select>
						</div>
						
						
						</div>
						
				


					
					<div class="clearfix"></div>
					
					
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

