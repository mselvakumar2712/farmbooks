        
		 <ul class="nav navbar-nav">
			<li class="menu-item-has-children dropdown  <?php  if($page == 'sales' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/market/customerlist');?>" aria-haspopup="true" aria-expanded="true" <?php echo $page_title == 'Customer List' ? 'class="active"' : ''; ?>><i class="menu-icon fas fa-user-tag" aria-hidden="true"></i><span class="ml-1">Customers &nbsp; &nbsp; </span></a>
            </li>
         <li class="menu-item-has-children dropdown <?php  if($page == 'Transactions' ){echo 'show open';}?>">
                 <!-- <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Quotation Entry'||'Sales Order Entry'||'Direct Sales Delivery'||'Direct Sales Invoice'||'Delivery Against Sales Order'||'Template Delivery'||'Template Invoice'||'Recurrent Invoice'||'Customer Payments'||'Customer Allocation'||'Customer Credit Notes'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><span class="ml-1"> </span></a>          
				 <!-- <ul class="sub-menu children dropdown-menu <?php  if($page == 'Transactions' ){echo 'show';}?>">
                  <!--<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Quotation Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesquotationentry');?>">SQ Entry</a></li>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Order Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesorderentry');?>">SO Entry</a></li>				 
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Sales Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/directsalesdelivery');?>">Direct Delivery</a></li>				 				 
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Sales Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/directsalesinvoice');?>">Direct Invoice</a></li>				 				 				 
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Delivery Against Sales Order' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/deliverysalesorder');?>">Delivery SO</a></li>	
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Invoice Against Sales Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/invoicesalesdelivery');?>">Invoice SO</a></li>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Template Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/templatedelivery');?>">Template <br> Delivery</a></li>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Template Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/templateinvoice');?>">Template Invoice</a></li>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Recurrent Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/printrecurrentinvoice');?>">Recurrent <br> Invoice</a></li>				
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customerpayments');?>">Customer <br>Payments</a></li>								
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Allocation' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customerallocation');?>">Customer <br>Allocation</a></li>	
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Credit Notes' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customercreditnotes');?>">Customer<br>Credit Notes</a></li>	
				   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Entry' ? 'class="active"' : ''; ?> href="">Sales Entry</a></li>
				</ul>-->
            </li>	
              <!--<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
              <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Quotation Inquiry'||'Sales Order Inquiry'||'Customer Allocatoion Inquiry'||'Customer Transaction Inquiry'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-file"></i><span class="ml-1"> Inquiries and Reports</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Quotation Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesquotationinquiry');?>">SQ Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Order Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesorderinquiry');?>">SO Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Transaction Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customertransactioninquiry');?>">Customer <br> Transaction Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Allocation Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customerallocationinquiry');?>">Customer <br> Allocation Inquiry</a></li>										
				</ul>
            </li>-->	
            <!-- <li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
              <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Groups'||'Sales Types'||'Sales Areas'||'Sales Persons'||'Recurrent Sales Invoice'||'Credit Status'||'Customers'||'Customer Branches'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1"> Maintenance</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">				
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customers' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customers');?>">Customers</a></li>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Branches' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/customerbranches');?>">Customer Branches</a></li>								
				 <!-- <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Groups' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesgroups');?>">Sales Groups</a></li>														
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Recurrent Sales Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/recurrentinvoice');?>">Recurrent Invoices</a></li>				
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Types' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salestypes');?>">Sales Types</a></li>																		
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Persons' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salespersons');?>">Sales Persons</a></li>
              <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Areas' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/salesareas');?>">Sales Areas</a></li>																												  
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Credit Status' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/market/creditstatus');?>">Credit Status</a></li>	
				</ul>
            </li> -->					
		</ul>				             			   