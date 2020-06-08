		<ul class="nav navbar-nav">			
			<li id="inv-parent" class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Inventory Location Transfer'||'Inventory Adjustment' ||'Purchase Order Entry'||'Outstanding Purchase Orders Maintenance'||'Direct GRN'||'Direct Invoice'||'Supplier Payments'||'Allocate Supplier Payments'||'Supplier Credit Note' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-exchange-alt"></i><span class="ml-1">Transaction</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction'  ){echo 'show';}?>">
					<li><i class="fa fa-shopping-cart"></i><a <?php echo $page_title == 'Direct Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/purchaseentry');?>">Purchase</a></li>
               <li><i class="fas fa-truck"></i><a <?php echo $page_title == 'Inventory Location Transfer' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/inventorylocations');?>">Location Transfer</a></li>
               <li><i class="fas fa-adjust"></i><a <?php echo $page_title == 'Inventory Adjustment' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/inventoryadjustment');?>">Location Adjustment</a></li>
				</ul>
			</li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Search Purchase Order'||'Supplier Transaction Inquiry'||'Supplier Allocation Inquiry'||'Stock Maintenance'||'Stock Reports'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-file"></i><span class="ml-1">Inquiries and Reports</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
					<li><i class="fas fa-shipping-fast"></i><a <?php echo $page_title == 'Stock Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/stockmovements');?>">Stock Movement</a></li>
					<li><i class="fas fa-file-invoice-dollar"></i><a <?php echo $page_title == 'Stock Reports' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/stockreports');?>">Stock Report</a></li>				 
				</ul>
			</li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Suppliers'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">
					<li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Suppliers' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/suppliers');?>">Suppliers</a></li>				 	
				</ul>
			</li>			
		</ul>				             			   