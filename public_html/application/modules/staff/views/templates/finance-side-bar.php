		<ul  id="inv-parent" class="nav navbar-nav">
		<?php if(check_staff_permission($_SESSION['profile_type'], 501) == 1) { ?>
         <li class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Payments'||'Deposits'||'Bank Accounts'||'Journal Entry'||'Budget Entry'||'Reconcile Bank Account'||'Reconcile Bank Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-money"></i><span class="ml-1">Transaction</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction' ){echo 'show';}?>">
			<?php if(check_staff_permission($_SESSION['profile_type'], 50101) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/salesentry');?>">Sales</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50102) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Deposits' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/deposits');?>">Receipt</a></li>
			<?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50103) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Purchase Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/purchaseentry');?>">Purchase</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50104) == 1) { ?>   
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/payments');?>">Payment</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50105) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Bank Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/bankaccounts');?>">Contra</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50106) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Journal Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/journalentry');?>">Journal</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50107) == 1) { ?>
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Debit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/debitnote');?>">Debit Note</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50108) == 1) { ?>   
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Credit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/creditnote');?>">Credit Note</a></li>
			<?php } ?>
            </ul>
         </li>
		<?php } ?>
			
		<?php if(check_staff_permission($_SESSION['profile_type'], 502) == 1) { ?>
         <li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Journal Inquiry'||'GL Inquiry'||'Bank Account Inquiry'||'Tax Inquiry'||'Trial Balance'||'Balance Sheet Drilldown'||'Profit And Loss Drilldown' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-file"></i><span class="ml-1">Inquiries and Reports</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
			<?php if(check_staff_permission($_SESSION['profile_type'], 50201) == 1) { ?>   
			   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Sales Invoice List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/salesinvoicelist');?>">Sales Register</a></li>
			<?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50202) == 1) { ?>   
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Purchase Register List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/purchaseregisterlist');?>">Purchase Register</a></li>              
			<?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50203) == 1) { ?>   
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Journal Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/journalinquiry');?>">Journal Inquiry</a></li>
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50204) == 1) { ?>       
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'GL Reports' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/glreports');?>">GL Reports</a></li>                  
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50205) == 1) { ?>   
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Trial Balance' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/trialbalance');?>">Trial Balance</a></li>		 
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50206) == 1) { ?>       
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Balance Sheet Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/balancesheetdrilldown');?>">Balance Sheet</a></li>  
            <?php } ?>
			<?php if(check_staff_permission($_SESSION['profile_type'], 50207) == 1) { ?>       
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Profit And Loss Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/profitandloss');?>">Profit and Loss</a></li>  				  				
			<?php } ?>
            </ul>
         </li>
		<?php } ?>
			
		<?php if(check_staff_permission($_SESSION['profile_type'], 503) == 1) { ?>
         <li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Bank Accounts Maintenance'||'Quick Entries'||'Account Tags'||'GL Accounts'||'GL Account Groups'||'GL Account Classes'||'Suppliers' || 'Customers' || 'Customer Edit'|| 'Customer Branches'? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">
				<?php if(check_staff_permission($_SESSION['profile_type'], 50301) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Bank Accounts Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/bank_accounts');?>">Bank Accounts</a></li>  				  				  
                <?php } ?>
				<?php if(check_staff_permission($_SESSION['profile_type'], 50302) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'GL Account Groups' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/glaccount_groups');?>">GL Groups</a></li> 
                <?php } ?>
				<?php if(check_staff_permission($_SESSION['profile_type'], 50303) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'GL Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/glaccounts');?>">GL Accounts</a></li>
                <?php } ?>
				<?php if(check_staff_permission($_SESSION['profile_type'], 50304) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Suppliers' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/suppliers');?>">Suppliers</a></li> 
                <?php } ?>
				<?php if(check_staff_permission($_SESSION['profile_type'], 50305) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customers' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/customers');?>">Customer</a></li> 
                <?php } ?>
				<?php if(check_staff_permission($_SESSION['profile_type'], 50306) == 1) { ?>     
				<li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Customers Branches' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/finance/customerbranches');?>">Customer Branches</a></li> 
				<?php } ?>
            </ul>
         </li>
		<?php } ?>
			
      </ul>				             			   