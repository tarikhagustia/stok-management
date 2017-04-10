<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="index.html">Home</a></li>
			<li><a href="#">Dashboard</a></li>
		</ol>
		
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->

<div id="dashboard-header" class="row">
	<div class="col-xs-12 col-sm-4 col-md-5">
		<h3>Hello, <?php echo $this->session->userdata('nama'); ?> !</h3>
	</div>
	<div class="clearfix visible-xs"></div>
	<div class="col-xs-12 col-sm-8 col-md-7 pull-right">
		<div class="row">
			<div class="col-xs-4">
				
			</div>
			
			
		</div>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10">
		<!--Start Dashboard Tab 1-->
		<div id="dashboard-overview" class="row" style="visibility: visible; position: relative;">
			<div id="ow-marketplace" class="col-sm-12 col-md-6">
				<div id="ow-setting">
					<a href="#"><i class="fa fa-folder-open"></i></a>
					<a href="#"><i class="fa fa-credit-card"></i></a>
					<a href="#"><i class="fa fa-ticket"></i></a>
					<a href="#"><i class="fa fa-bookmark-o"></i></a>
					<a href="#"><i class="fa fa-globe"></i></a>
				</div>
				<h4 class="page-header">Selamat Datang di <?php echo $this->config->item('app_name'). " " . $this->config->item('app_desc'); ?> </h4>
				<br><h2>Apa Itu <?php echo $this->config->item('app_name'); ?> </h2></br>
				<p>
				Adalah sebuah aplikasi pengolahan barang untuk sebuah toko kecil, apa saja fitur yang ada ?aplikasi ini memiliki beberapa keunggulan Yaitu
				</p>
				<ul>
					<li>Pengolahan Barang yang masuk</li>
					<li>Pengolahan Barang Yang keluar</li>
					<li>STOK OPNAME</li>
					<li>SALES</li>
					<li>user MANAGEMEN dengan AKSES</li>
				</ul>
			</div>
			<div class="col-xs-12 col-md-6">
				<div id="ow-donut" class="row">
					<div class="col-xs-4">
						<div id="morris_donut_1" style="width:120px;height:120px;"></div>
					</div>
					<div class="col-xs-4">
						<div id="morris_donut_2" style="width:120px;height:120px;"></div>
					</div>
					<div class="col-xs-4">
						<div id="morris_donut_3" style="width:120px;height:120px;"></div>
					</div>
				</div>
				<div id="ow-activity" class="row">
					<div class="col-xs-3 col-sm-3 col-md-1">
						<div class="v-txt">ACTIVITY</div>
					</div>
					<div class="col-xs-7 col-sm-5 col-md-6">
						<div class="row"><i class="fa fa-code"></i> Last Login <span class="label label-default pull-right"><?php echo $this->session->userdata('waktu'); ?> </span></div>
						
						<div class="row"><i class="fa fa-camera"></i> Your Access <span class="label label-default pull-right" > <?php echo $this->session->userdata('akses'); ?> 
						


						</span></div>
						
					</div>
					
				</div>
				
			</div>
		</div>
		<!--End Dashboard Tab 1-->
		<!--Start Dashboard Tab 2-->
		
		<!--End Dashboard Tab 2-->
		<!--Start Dashboard Tab 3-->
		<div id="dashboard-graph" class="row" style="width:100%; visibility: hidden; position: absolute;" >
			<div class="col-xs-12">
				<h4 class="page-header">OS Platform Statistics</h4>
				<div id="stat-graph" style="height: 300px;"></div>
			</div>
		</div>
		<!--End Dashboard Tab 3-->
		<!--Start Dashboard Tab 4-->
		
		<!--End Dashboard Tab 4-->
		<!--Start Dashboard Tab 5-->
		
		<!--End Dashboard Tab 5-->
		<!--Start Dashboard Tab 6-->
		
		<!--End Dashboard Tab 6-->
		<!--Start Dashboard Tab 7-->
		
		<!--End Dashboard Tab 7-->
	</div>
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
