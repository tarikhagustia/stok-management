<?php $this->model->security(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="shortcut icon" type="image/png" href="img/faicon.png"/>
		<meta charset="utf-8">
		<title>I - STORE</title>
		
		<link href="<?php echo base_url()."asset/plugins/bootstrap/bootstrap.css"?>" rel="stylesheet">
		<link href="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.css" ?>" rel="stylesheet">
		<link href="<?php echo base_url()."asset/css/font-awesome.min.css"?>" rel="stylesheet">
		
		
		<link href="<?php echo base_url()."asset/css/style_v1.css"?>" rel="stylesheet">
		<link href="<?php echo base_url()."asset/css/not.css"?>" rel="stylesheet">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->


<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>


<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2 about">
				<a href="#">I - STORE</a>
			</div>

			<div id="top-panel" class="col-xs-12 col-sm-10 about">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						
						
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="<?php echo base_url()."asset/img/avatar.jpg"?>" class="img-circle" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?php echo $this->session->userdata('username'); ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url()."index.php/home/logout" ?>">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			
			<?php
			echo $sidemenu;
			?>

			
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			<div id="about">
				<div class="about-inner">
					<h4 class="page-header"></h4> 
					<p>Oleh </p>
					</a></p>
					<p></p>
                    <p></p>
				</div>
			</div>
			
			<div id="ajax-content">
				
				<?php
			echo $konten;
			?>

			</div>
			
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo base_url()."asset/plugins/jquery/jquery.min.js"?>"></script>
<script src="<?php echo base_url()."asset/plugins/jquery-ui/jquery-ui.min.js"?>"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url()."asset/plugins/bootstrap/bootstrap.min.js"?>"></script>


<!-- All functions for this theme + document.ready processing -->
<script src="<?php echo base_url()."asset/js/devoops.js"?>"></script>
</body>
</html>
