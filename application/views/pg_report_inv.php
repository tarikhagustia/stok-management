

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">I-STORE</a></li>
			<li><a href="#">Report Center</a></li>
			
		</ol>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Inventory Report</span>
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
			
			<div class="box-content table-responsive">


				<form action="<?php echo base_url()."index.php/home/invreport" ?>" method="post" class="form-horizontal" id="defaultForm">
						<div class="form-group">
						<label class="col-sm-2 control-label">Plu</label>
						<div class="col-sm-4">
							<input type="text" name="plu" class="form-control" placeholder="Article PLU">
						</div>					
						</div>

						<div class="form-group">
						<label class="col-sm-2 control-label">Brand</label>
						<div class="col-sm-4">
							<input type="text" name="brand" class="form-control" placeholder="Article Brand">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Article</label>
						<div class="col-sm-4">
							<input type="text" name="article" class="form-control" placeholder="Article Name">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Harga</label>
						<div class="col-sm-4">
							<input type="text" name="harga" class="form-control" placeholder="Harga">
						</div>
						
						</div>
						


					
								
					
					
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" name="cari" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Search
							</button>
						</div>
						</div>
						
						</form>



			</div>
			<div class="box-content table-responsive">
				<table class="table table-bordered table-hover table-striped " id="datatable-3">
					<thead>
						<tr>
							<th><label>#</label></th>
							<th><label>PLU</label></th>
							<th><label>Brand</label></th>
							<th><label>Article</label></th>
							<th><label>Qty</label></th>
							<th><label>Harga</label></th>
							
							
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($reports as $row) {
						?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $row['plu']; ?></td>
							<td><?php echo $row['brand']; ?></td>
							<td><?php echo $row['article']; ?></td>
							<td><?php echo $row['jml_inv']; ?></td>
							<td><?php echo $row['harga_beli']; ?></td>
						</tr>
						<?php } ?>
						
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>PLU</th>
							<th>Brand</th>
							<th>Article</th>
							<th>Qty</th>
							<th>Harga</th>
							
							
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->

					
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo base_url()."asset/plugins/jquery/jquery.min.js"?>"></script>
<script src="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.js"?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo base_url()."asset/plugins/jquery/jquery.mousewheel.min.js"?>"></script>

<script type="text/javascript">
function onlyNumbers(evt) {
    // Mendapatkan key code 
    var charCode = (evt.which) ? evt.which : event.keyCode;
 
    // Validasi hanya tombol angka
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
$(document).ready(function() {
	$("#plu").keyup(function (e) {
	
		//removes spaces from plu
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var plu = $(this).val();
		if(plu.length < 4){$("#user-result").html('');return;}
		
		if(plu.length >= 4){
			$("#user-result").html('<img src="<?php echo base_url()."asset/img/ajax-loader.gif"?>"" />');
			$.post('<?php echo base_url()."asset/inc/check_username.php"?>', {'plu':plu}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>
