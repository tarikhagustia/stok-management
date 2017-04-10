
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">I-STORE</a></li>
			<li><a href="#">Users</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Application Users</span>
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
			<? echo $this->session->flashdata('pesan'); ?>
			
			<form action="<?php echo base_url()."index.php/home/application_do" ?>" method="post" class="form-horizontal" id="defaultForm">
						<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-2">
						<input type="text" id="username" name="username" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Masukkan username">
						</div>
						<span id="user-result"></span>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
						<div class="col-sm-2">
						<input type="text" name="nama" class="form-control" data-toggle="tooltip" data-placement="bottom">
						</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Akses</label>
							<div class="col-sm-2">
								<select name="akses">
									<option value="">-- Select Access -</option>
									<option value="admin">Administrasi</option>
									<option value="root">Root</option>
									<option value="user">User</option>
									<option value="su">Super User</option>
									
								</select>
							</div>
						</div>
						
						<div class="form-group">
						<label class="col-sm-2 control-label">Passwrod</label>
						<div class="col-sm-2">
						<input type="password" name="password" class="form-control" data-toggle="tooltip" data-placement="bottom">
						</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Ulangi password</label>
						<div class="col-sm-2">
						<input type="password" name="confirmPassword" class="form-control" data-toggle="tooltip" data-placement="bottom">
						</div>
						
						</div>
						
						
						<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" name="usr_baru" class="btn btn-primary btn-label-left">
							<span><i class="fa fa-clock-o"></i></span>
								Create New Users
							</button>
						</div>
						
						
					</div>


			</form>
				
			
				<table class="table table-bordered table-striped table-hover table-heading table-bordered">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Username</th>
							<th>Akses</th>
							<th>Password</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php
					$no = 1;
					foreach($datas as $data) {
					?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data['usr_username']; ?></td>
							<td><?php echo $data['usr_akses']; ?></td>
							<td><?php echo $data['usr_password']; ?></td>
							<td><a onclick="return confirm('Are you sure you want to delete this User?');" href="<?php echo base_url()."index.php/home/application_delete/".$data['id']; ?>">HAPUS</a></td>
							
						</tr>
					<?php } ?>
						
					<!-- End: list_row -->
					</tbody>
					
					
				</table>
			</div>
		</div>
	</div>
</div>

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
	$('#s2_country').select2({placeholder: "Select OS"});
	
}
// Run timepicker

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