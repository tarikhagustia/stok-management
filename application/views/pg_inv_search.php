
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a> 
		<ol class="breadcrumb pull-left">
			<li><a href="#">I-STORE</a></li>
			<li><a href="#">Quick Search</a></li>
			
		</ol>
		
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Inventory List</span>
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
			<?
			echo $this->session->flashdata('berhasil');
			?>
			<div class="box-content table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-3">
					<thead>
						<tr>
							<th>PLU</th>
							<th>Brand</th>
							<th>Article Name</th>
							<th>Harga</th>
							<th>Jml Inv</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($datas as $data) {
						?>
						<tr>
							<td><?php echo $data['plu']; ?></td>
							<td><?php echo $data['brand']; ?></td>
							<td><?php echo $data['article']; ?></td>
							<td><?php echo $data['harga_jual']; ?></td>
							<td><?php echo $data['jml_inv']; ?></a></td>
							<td><a href="<?php echo base_url()."index.php/home/invdelete_do/".$data['plu']; ?>" onclick="return confirm('Are you sure you want to delete this Article?');">Hapus</a></td>
						</tr>
						<?php }
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>PLU</th>
							<th>Brand</th>
							<th>Article</th>
							<th>Harga</th>
							<th>Qty</th>
							
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url()."asset/plugins/jquery/jquery.min.js"?>"></script>
<script src="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.js"?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
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

