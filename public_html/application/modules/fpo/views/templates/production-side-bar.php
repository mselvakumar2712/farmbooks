<ul class="nav navbar-nav">			
	<li id="inv-parent" class="menu-item-has-children dropdown <?php if($page == 'Transaction'){echo 'show open';} ?>">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Work Order Entry'||'Outstanding Work Order Entry'||'Dimension Entry' ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?>> <i class="menu-icon fas fa-exchange-alt"></i><span class="ml-1">Transaction</span></a>
		<ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction'){echo 'show';} ?>">
			<li><i class="fa fa-shopping-cart"></i><a <?php echo $page_title == 'Work Order Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production');?>">Work Order Entry</a></li>
            <li><i class="fas fa-truck"></i><a <?php echo $page_title == 'Outstanding Work Order Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/outstandingWorkOrderEntry');?>">Outstanding Work Orders</a></li>
            <li><i class="fas fa-adjust"></i><a <?php echo $page_title == 'Dimension Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/dimensionEntry');?>">Dimension Entry</a></li>
		</ul>
	</li>
	
	<li class="menu-item-has-children dropdown <?php if($page == 'Inquiries and Reports'){echo 'show open';} ?>">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Costed Bill of Material Inquiry'||'Inventory Item Where Used Inquiry'||'Work Order Inquiry'||'Dimension Inquiry' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-file"></i><span class="ml-1">Inquiries and Reports</span></a>
		<ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports'){echo 'show';} ?>">
			<li><i class="fas fa-shipping-fast"></i><a <?php echo $page_title == 'Costed Bill of Material Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/costedBillofMaterialInquiry');?>">Costed Bill of Material Inquiry</a></li>
			<li><i class="fas fa-file-invoice-dollar"></i><a <?php echo $page_title == 'Inventory Item Where Used Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/inventoryItemWhereUsedInquiry');?>">Inventory Item Where Used Inquiry</a></li>
			<li><i class="fas fa-file-invoice-dollar"></i><a <?php echo $page_title == 'Work Order Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/workOrderInquiry');?>">Work Order Inquiry</a></li>
			<li><i class="fas fa-file-invoice-dollar"></i><a <?php echo $page_title == 'Dimension Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/dimensionInquiry');?>">Dimension Inquiry</a></li>
		</ul>
	</li>
	
	<li class="menu-item-has-children dropdown <?php if($page == 'Maintenance'){echo 'show open';} ?>">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Work Centre'||'Bills of Material'||'Dimension Tags' ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?>> <i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>
		<ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance'){echo 'show';} ?>">
			<li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Bills of Material' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/billofMaterials'); ?>">Bill Of Materials</a></li>
			<li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Work Centre' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/workCentre'); ?>">Work Centre</a></li>
			<li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Dimension Tags' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/production/dimensionTags'); ?>">Dimension Tags</a></li>
		</ul>
	</li>			

</ul>		