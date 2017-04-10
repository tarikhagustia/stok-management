
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">I-STORE</a></li>
			<li><a href="#">Article</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Article Mainteance</span>
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

			<h4 class="page-header">Article Mainteance</h4>
				
				<!-- FROM GROUP -->
						
						
						<form action="<?php echo base_url()."index.php/home/artmtc_do"?>" method="post" class="form-horizontal">
						<?php
						foreach ($datas as $data) {
												
						?>
						<div class="form-group">
						<label class="col-sm-2 control-label">Plu</label>
						<div class="col-sm-4">
							<input type="text" name="plu" class="form-control" value="<?php echo $data['plu'];?>" placeholder="Article PLU" readonly>
						</div>
						<div hidden="true" class="col-sm-4">
							<input type="text" name="id" class="form-control" value="<?php echo $data['id_brg'];?>" placeholder="Article PLU" hidden>
						</div>
						
						</div>

						<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $data['brand'];?>" name="brand" class="form-control" placeholder="Article Brand">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Article</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $data['article'];?>" name="article" class="form-control" placeholder="Article Name">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Harga Beli</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $data['harga_beli'];?>" name="hb" class="form-control" placeholder="Harga">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Harga Jual</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $data['harga_jual'];?>" name="hj" class="form-control" placeholder="Harga">
						</div>
						
						</div>
						<?php } ?>

					
								
					
					
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="cancel" class="btn btn-default btn-label-left">
							<span><i class="fa fa-clock-o txt-danger"></i></span>
								Cancel
							</button>
						</div>
						
						<div class="col-sm-2">
							<button type="submit" name="simpan_art_update" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>
						</form>

					
	
<script src="<?php echo base_url()."asset/plugins/jquery/jquery.min.js"?>"></script>
<script src="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.js"?>"></script>
