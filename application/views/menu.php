
<ul class="nav main-menu">
				<li>
					<a href="<?php echo base_url(); ?>">
						<i class="fa fa-home"></i>
						<span class="hidden-xs">Home</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-download"></i>
						<span class="hidden-xs">Receiving</span>
					</a>
					<ul class="dropdown-menu">
						
						<li><a  href="<?php echo base_url()."index.php/home/receiving"; ?>">Receiving</a></li>
											
						
					</ul>
				</li>
				
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-book"></i>
						 <span class="hidden-xs">Inventory Management</span>
					</a>
					<ul class="dropdown-menu">
					
					<li 
			
	
			
			?>><a href="<?php echo base_url()."index.php/home/invadj"; ?>">Inventory Adjustment</a></li>
			<li><a href="<?php echo base_url()."index.php/home/invlist"; ?>">Inventory List</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle">
					<i class="fa fa-plus-square"></i>
						<span class="hidden-xs">Stok Opname</span>
				</a>
			<ul class="dropdown-menu">
			<li><a href="<?php echo base_url()."index.php/home/stokopname"; ?>">Form Stokopname</a></li>
			<li><a href="<?php echo base_url()."index.php/home/formupdate_so"; ?>">Update StokOpname</a></li>
			</ul>
			</li>


						
			</ul>
				</li>
			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-flag-o"></i>
						 <span class="hidden-xs">Article</span>
					</a>
					<ul class="dropdown-menu">
					<li><a href="<?php echo base_url()."index.php/home/articleinput"; ?>">Article Input</a></li>
					<li><a href="<?php echo base_url()."index.php/home/articlemtc"; ?>">Article Maintenance</a></li>
					
						

						
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-money"></i>
						 <span class="hidden-xs">Sales</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()."index.php/home/salesinput"; ?>">Sales Input</a></li>						
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-bar-chart-o"></i>
						 <span class="hidden-xs">Report Center</span>
					</a>
					<ul class="dropdown-menu">
						
							
						<li><a href="<?php echo base_url()."index.php/home/invreport"; ?>">Inventory Report</a></li>
						<li><a href="<?php echo base_url()."index.php/home/recreport"; ?>">Receiving Report</a></li>	
						<li><a href="<?php echo base_url()."index.php/home/salesreport"; ?>">Sales Report</a></li>
						<li><a href="<?php echo base_url()."index.php/home/soreport"; ?>">Stok Opname</a></li>							
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa fa-male"></i>
						 <span class="hidden-xs">Users</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url()."index.php/home/application"; ?>">Application Users</a></li>
						<li><a href="<?php echo base_url()."index.php/home/license"; ?>">Application License</a></li>						
					</ul>
				</li>
			
				</ul>