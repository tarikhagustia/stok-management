<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>M.U.G.E.N</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../plugins/bootstrap/bootstrap.css" rel="stylesheet">
		
		<link href="../css/style_v2.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div id="page-500" class="col-xs-12 text-center">
			<h1>W A R N I N G !!</h1>
			<h3>
				<?php
							$s = $_GET['s'];

									switch ($s) {
									    case "true":
									        echo "Your License Is ACTIVE, Thankyou :)";
									        break;
									    case "wrong":
									        echo "Fatal Error, Please Call Administrator";
									        break;
									    case "wrong1":
									        echo "
The license that you entered is wrong!, you have 3 chances if you fail the system will auto-delete
";
									        break;
									     case "expire":
									        echo "
The license has expired, please enter a new license
";
									        break;
									    default:
									        echo "License Error, Your License Isn't Active please enter your license key or call the administrator for Help.";
									}
								
							

						?>
			</h3>
			<img src="../img/mugen.png" alt="" />

			<a href="../index.php" class="btn btn-default btn-label-left"><span><i class="fa fa-reply"></i></span> Go to Dashboard</a>
			<form action="modul.php" method="post" class="form-horizontal">
						<div class="form-group">
						<label class="col-sm-4 control-label"></label>
						<div class="col-sm-4">
							<input type="text" id="plu" maxlength="40" name="serial2" class="form-control" placeholder="Enter Your License Here" data-toggle="tooltip" data-placement="bottom" ><span ></span>
						</div>
						<span id="user-result"></span>

						
						</div>

						


					
								
					
					
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-4">
							<button type="submit" name="simpan_lisensi" class="btn btn-primary btn-label-left">
							
								Genrate !!
							</button>
						</div>
						
						
					</div>
						</form>
		</div>

	</div>
</div>
</body>
</html>
