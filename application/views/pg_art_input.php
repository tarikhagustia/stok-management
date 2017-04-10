
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
					<span>Article Input Form</span>
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
			
			<?php echo $this->session->flashdata('berhasil'); ?>
				<h4 class="page-header">New Article</h4>
				
				<!-- FROM GROUP -->
				
						
						<form action="<?php echo base_url()."index.php/home/articleinput_do/" ?>" id="defaultForm" method="post" class="form-horizontal">
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
						<label class="col-sm-2 control-label">Harga Beli</label>
						<div class="col-sm-4">
							<input type="text" name="harga_beli" class="form-control" placeholder="Harga">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">harga Jual</label>
						<div class="col-sm-4">
							<input type="text" name="harga_jual" class="form-control" placeholder="Harga">
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
							<button type="submit" name="simpan_art" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Submit
							</button>
						</div>
					</div>
						</form>

					
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
			$("#user-result").html('<img src="<?php echo base_url()."asset/img/ajax-loader.gif"?>"" />');
			$.post('<?php echo base_url()."asset/inc/check_username.php"?>', {'plu':plu}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>
<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});
</script>