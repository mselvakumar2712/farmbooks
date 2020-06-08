		<ul class="nav navbar-nav">	
			<?php if(check_staff_permission($_SESSION['profile_type'], 701) == 1) { ?>
            <li id="inv-parent" class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
               <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Sales Quotation Entry'||'Sales Order Entry'||'Direct Sales Delivery'||'Direct Sales Invoice'||'Delivery Against Sales Order'||'Template Delivery'||'Template Invoice'||'Recurrent Invoice'||'Customer Payments'||'Customer Allocation'||'Customer Credit Notes'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-money"></i><span class="ml-1"> Transaction</span></a>                 
               <ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction' ){echo 'show';}?>">
                  <?php if(check_staff_permission($_SESSION['profile_type'], 70101) == 1) { ?>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/market/salesentry');?>">Sales</a></li>		
				  <?php } ?>
               </ul>
            </li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 703) == 1) { ?>
            <li class="menu-item-has-children dropdown <?php  if($page == 'Maintanance' ){echo 'show open';}?>">
              <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Sales Groups'||'Sales Types'||'Sales Areas'||'Sales Persons'||'Recurrent Sales Invoice'||'Credit Status'||'Customers'||'Customer Branches'  ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1"> Maintanance</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintanance' ){echo 'show';}?>">				
				  <?php if(check_staff_permission($_SESSION['profile_type'], 70301) == 1) { ?>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customers' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/market/customers');?>">Customers</a></li>
				  <?php } ?>
				  <?php if(check_staff_permission($_SESSION['profile_type'], 70302) == 1) { ?>
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customer Branches' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/market/customerbranches');?>">Customer Branches</a></li>								
				  <?php } ?>
				</ul>
            </li>
			<?php } ?>
			
		</ul>				             			   