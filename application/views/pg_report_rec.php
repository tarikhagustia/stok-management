<link rel="stylesheet" href="<?php echo base_url()?>asset/css/jquery.dateselect.css">
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
					<span>Receiving Report</span>
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


				<form action="<?php echo base_url(). "index.php/home/recreport" ?>" method="post" class="form-horizontal">
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
						<label class="col-sm-2 control-label">Tanggal</label>
						<div class="col-sm-4">
							<input type="text" name="tgl" data-select="date" class="form-control" placeholder="Tanggal">
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
				
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
					<thead>
						<tr>
							<th><label>#</label></th>
							<th><label>PLU</label></th>
							<th><label>Brand</label></th>
							<th><label>Article</label></th>
							<th><label>Tanggal</label></th>
							<th><label>Qty</label></th>
							<th><label>Total</label></th>
							
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach($reports as $row) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row['plu']; ?></td>
							<td><?php echo $row['brand']; ?></td>
							<td><?php echo $row['article']; ?></td>
							<td><?php echo $row['tgl_rec']; ?></td>
							<td><?php echo $row['jml_rec']; ?></td>
							<td><?php echo $row['total']; ?></td>
							
						</tr>
						<?php
						$total = $total + $row['total'];
						}
						?>
						
					</tbody>
					
						<tr>
            <td colspan="6" align="center"><b>Receiving Amount</b></td>
            <td><b><?php echo $total; ?></b></td>
        </tr>
					
				</table>
			</div>
		</div>
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo base_url()."asset/plugins/jquery/jquery.min.js"?>"></script>
<script src="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.js"?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="<?php echo base_url()."asset/plugins/jquery/jquery.mousewheel.min.js"?>"></script>
<script type="text/javascript" src="<?php echo base_url()."asset/js/jquery.dateselect.js"?>"></script>
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
			$("#user-result").html('<img src="ajax-loader.gif" />');
			$.post('inc/check_username.php', {'plu':plu}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	
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
