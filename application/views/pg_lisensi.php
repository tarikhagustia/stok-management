<link rel="stylesheet" href="css/jquery.dateselect.css">
<style>
		.date-select { font-family: 'Open Sans', sans-serif; }
	</style>
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">I-STORE</a></li>
			<li><a href="#">Sales</a></li>
		</ol>
		<?php include "sosmed.php"; ?>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Sales Form</span>
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
			<?php 
			include "attention.php";
			?>
				<h4 class="page-header">Sales Input</h4>
				
				<!-- FROM GROUP -->
				
						
						<form action="ajax/modul.php" method="post" class="form-horizontal">
						<div class="form-group">
						<label class="col-sm-2 control-label">Serial 1</label>
						<div class="col-sm-4">
							<input type="text" id="plu" name="serial" class="form-control" placeholder="Article PLU" data-toggle="tooltip" data-placement="bottom" title="Masukkan Nomor Kartu">
						</div>
						
						
						</div>
				

						
						<div class="form-group">
						<label class="col-sm-2 control-label">Serial 2</label>
						<div class="col-sm-4">
							<input type="text" name="serial2" class="form-control" placeholder="Qty" data-toggle="tooltip" data-placement="bottom" title="Masukkan Nomor Kartu">
						</div>
						
						</div>
								


					
								
					
					
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="reset" class="btn btn-default btn-label-left">
							<span><i class="fa fa-clock-o txt-danger"></i></span>
								Cancel
							</button>
						</div>
						
						<div class="col-sm-2">
							<button type="submit" name="simpan_lisensi1" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>
						</form>

					
	
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="plugins/jquery/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="js/jquery.dateselect.js"></script>

