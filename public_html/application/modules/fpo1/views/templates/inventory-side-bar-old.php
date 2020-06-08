        
		<ul class="nav navbar-nav">			
			<li class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Inventory Location Transfer'||'Inventory Adjustment' ||'Purchase Order Entry'||'Outstanding Purchase Orders Maintenance'||'Direct GRN'||'Direct Invoice'||'Supplier Payments'||'Allocate Supplier Payments'||'Supplier Credit Note' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-money"></i><span class="ml-1">Transaction</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction' ){echo 'show';}?>">
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Purchase Order Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/addpurchase');?>">PO Entry</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Outstanding Purchase Orders Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/outstandingpurchase');?>">Outstanding <br>PO Order</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct GRN' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/directgrn');?>">Direct GRN</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/directinvoice');?>">Direct Payments</a></li>
				<!---<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/directinvoicelist');?>">Direct Invoice</a></li>				 				 
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Supplier Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/supplierpaymentslist');?>">Payment<br>to Supplier</a></li>				 				 				 
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Supplier Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/supplierinvoicelist');?>">Supplier Invoices</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Supplier Credit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/suppliercreditlist');?>">Supplier Credit</a></li>-->
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Allocate Supplier Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/supplierallocation');?>">Supplier <br>Credit Allocations</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Inventory Location Transfer' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/inventorylocations');?>">Inventory <br>Location Transfer</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Inventory Adjustment' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/inventoryadjustment');?>">Inventory <br>Adjustments</a></li>		
				</ul>
			</li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Search Purchase Order'||'Supplier Transaction Inquiry'||'Supplier Allocation Inquiry'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-file"></i><span class="ml-1">Inquiries and Reports</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Search Purchase Order' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/searchpurchaseorder');?>">PO Inquiry</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Supplier Transaction Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/suppliertransactioninquiry');?>">Supplier<br>Transaction Inquiry</a></li>
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Supplier Allocation Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/supplierallocationinquiry');?>">Supplier<br>Allocation Inquiry</a></li>				 
				</ul>
			</li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Suppliers'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>
				<ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">
					<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Suppliers' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/inventory/suppliers');?>">Suppliers</a></li>				 	
				</ul>
			</li>			
		</ul>				             			   