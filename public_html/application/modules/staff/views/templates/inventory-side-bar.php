		<ul class="nav navbar-nav">	
			<?php if(check_staff_permission($_SESSION['profile_type'], 601) == 1) { ?>
			<li id="inv-parent" class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Inventory Location Transfer'||'Inventory Adjustment' ||'Purchase Order Entry'||'Outstanding Purchase Orders Maintenance'||'Direct GRN'||'Direct Invoice'||'Supplier Payments'||'Allocate Supplier Payments'||'Supplier Credit Note' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-money"></i><span class="ml-1">Transaction</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction'  ){echo 'show';}?>">
					<?php if(check_staff_permission($_SESSION['profile_type'], 60101) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/purchaseentry');?>">Purchase</a></li>
				    <?php } ?>
					
					<?php if(check_staff_permission($_SESSION['profile_type'], 60102) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Inventory Location Transfer' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/inventorylocations');?>">Location Transfer</a></li>
				    <?php } ?>
					
					<?php if(check_staff_permission($_SESSION['profile_type'], 60103) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Inventory Adjustment' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/inventoryadjustment');?>">Location Adjustment</a></li>
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 602) == 1) { ?>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Search Purchase Order'||'Supplier Transaction Inquiry'||'Supplier Allocation Inquiry'||'Stock Maintenance'||'Stock Reports'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-file"></i><span class="ml-1">Inquiries and Reports</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
					<?php if(check_staff_permission($_SESSION['profile_type'], 60201) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Stock Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/stockmovements');?>">Stock Movement</a></li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 60202) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Stock Reports' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/stockreports');?>">Stock Report</a></li>				 
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 603) == 1) { ?>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Suppliers'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">
					<?php if(check_staff_permission($_SESSION['profile_type'], 60301) == 1) { ?>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Suppliers' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/inventory/suppliers');?>">Suppliers</a></li>				 	
					<?php } ?>
				</ul>
			</li>
			<?php } ?>			
		</ul>				             			   