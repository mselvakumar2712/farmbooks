        
		 <ul class="nav navbar-nav">			
            <li id="inv-parent" class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
               <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Quotation Entry'||'Sales Order Entry'||'Direct Sales Delivery'||'Direct Sales Invoice'||'Delivery Against Sales Order'||'Template Delivery'||'Template Invoice'||'Recurrent Invoice'||'Customer Payments'||'Customer Allocation'||'Customer Credit Notes'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-exchange-alt"></i><span class="ml-1"> Transaction</span></a>                 
               <ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction' ){echo 'show';}?>">
                  <!--<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Quotation Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesquotationentry');?>">Sales Quotation</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Order Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesorderentry');?>">Sales Order</a></li>				 
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Sales Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/directsalesdelivery');?>">Direct Delivery</a></li>				 				 
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Direct Sales Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/directsalesinvoice');?>">Direct Invoice</a></li>				 				 				 
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Delivery Against Sales Order' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/deliverysalesorder');?>">Delivery SO</a></li>	
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Invoice Against Sales Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/invoicesalesdelivery');?>">Invoice SO</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Template Delivery' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/templatedelivery');?>">Template <br> Delivery</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Template Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/templateinvoice');?>">Template Invoice</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Recurrent Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/printrecurrentinvoice');?>">Recurrent <br> Invoice</a></li>				
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customerpayments');?>">Customer <br>Payments</a></li>								
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Allocation' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customerallocation');?>">Customer <br>Allocation</a></li>	
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Credit Notes' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customercreditnotes');?>">Customer<br>Credit Notes</a></li>-->	
                  <li><i class="fas fa-hand-holding-usd"></i><a <?php echo $page_title == 'Sales Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesentry');?>">Sales</a></li>		
               </ul>
            </li>	
              <!--<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
              <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Quotation Inquiry'||'Sales Order Inquiry'||'Customer Allocatoion Inquiry'||'Customer Transaction Inquiry'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-inr"></i><span class="ml-1"> Inquiries and Reports</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Quotation Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesquotationinquiry');?>">SQ Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Order Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesorderinquiry');?>">SO Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Transaction Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customertransactioninquiry');?>">Customer <br> Transaction Inquiry</a></li>						
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Allocation Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customerallocationinquiry');?>">Customer <br> Allocation Inquiry</a></li>										
				</ul>
            </li>-->	
            <li class="menu-item-has-children dropdown <?php  if($page == 'Maintanance' ){echo 'show open';}?>">
              <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Sales Groups'||'Sales Types'||'Sales Areas'||'Sales Persons'||'Recurrent Sales Invoice'||'Credit Status'||'Customers'||'Customer Branches'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1"> Maintanance</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintanance' ){echo 'show';}?>">				
				  <li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Customers' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customers');?>">Customers</a></li>
				  <li><i class="fas fa-sitemap"></i><a <?php echo $page_title == 'Customer Branches' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/customerbranches');?>">Customer Branches</a></li>								
				  <!--<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Groups' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesgroups');?>">Sales Groups</a></li>														
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Recurrent Sales Invoice' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/recurrentinvoice');?>">Recurrent Invoices</a></li>				
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Types' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salestypes');?>">Sales Types</a></li>																		
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Persons' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salespersons');?>">Sales Persons</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Areas' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/salesareas');?>">Sales Areas</a></li>																												  
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Credit Status' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/market/creditstatus');?>">Credit Status</a></li>-->	
				</ul>
            </li>					
		</ul>				             			   