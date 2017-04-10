<link rel="stylesheet" href="<?php echo base_url()."asset/css/jquery.dateselect.css"?>">
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
			<li><a href="#">Receiving</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Receiving Form</span>
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
			<?php echo "<h2>".$this->session->flashdata('berhasil')."</h2>" ?>
			
				<h4 class="page-header">Receiving</h4>
				
				<!-- FROM GROUP -->
				
					<!-- 	<form id="defaultForm" method="post" action="validators.html" class="form-horizontal">
					<fieldset>
						<legend>Not Empty validator</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Username</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="username" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Country</label>
							<div class="col-sm-5">
								<select class="populate placeholder" name="country" id="s2_country">
									<option value="">-- Select a country --</option>
									<option value="fr">France</option>
									<option value="de">Germany</option>
									<option value="it">Italy</option>
									<option value="jp">Japan</option>
									<option value="ru">Russia</option>
									<option value="gb">United Kingdom</option>
									<option value="us">United State</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-9 col-sm-offset-3">
								<div class="checkbox">
									<label>
										<input type="checkbox"  name="acceptTerms" /> Accept the terms and policies
										<i class="fa fa-square-o small"></i>
									</label>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Regular expression based validators</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Email address</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="email" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Website</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="website" placeholder="http://" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Phone number</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" name="phoneNumber" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Hex color</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="color" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">US zip code</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="zipCode" />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Identical validator</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="password" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Retype password</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" name="confirmPassword" />
							</div>
						</div>
					</fieldset>
					<fieldset>
						<legend>Other validators</legend>
						<div class="form-group">
							<label class="col-sm-3 control-label">Ages</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" name="ages" />
							</div>
						</div>
					</fieldset>
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form> -->
						<form action="<?php echo base_url()."index.php/home/insertRec/" ?>" id="defaultForm" method="post" class="form-horizontal">
						<div class="form-group">
						<label class="col-sm-2 control-label">Plu</label>
						<div class="col-sm-4">
						<input type="text" onKeyPress="return onlyNumbers(event);" id="plu" maxlength="20" name="plu" class="form-control" placeholder="Article PLU"><span ></span>
						</div>
						<span id="user-result"></span>					
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Qty</label>
						<div class="col-sm-2">
							<input type="text" name="qty" class="form-control" placeholder="Qty">
						</div>
						
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Receiving</label>
						<div class="col-sm-3">
						  <input type="text" name="tgl_rec" value="" id="tgl_lahir" class="form-control" placeholder="Tanggal Receiving" data-select="date"/>
						  
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
							<button type="submit" name="simpan_rec" class="btn btn-primary btn-label-left">
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