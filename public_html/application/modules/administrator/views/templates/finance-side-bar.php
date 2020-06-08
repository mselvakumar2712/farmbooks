        
		 <ul class="nav navbar-nav">
			 <li class="menu-item-has-children dropdown <?php  if($page == 'Transaction' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Payments'||'Deposits'||'Bank Accounts'||'Journal Entry'||'Budget Entry'||'Reconcile Bank Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-exchange-alt"></i><span class="ml-1">Transaction</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Transaction' ){echo 'show';}?>">
				  <li><i class="far fa-money-bill-alt"></i><a <?php echo $page_title == 'Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/payments');?>">Payments</a></li>
				  <li><i class="fas fa-receipt"></i><a <?php echo $page_title == 'Deposits' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/deposits');?>">Receipt</a></li>
                  <li><i class="fa fa-bank"></i><a <?php echo $page_title == 'Bank Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/bankaccounts');?>">Bank Accounts<br> Transfers</a></li>
                  <li><i class="fa fa-paper-plane"></i><a <?php echo $page_title == 'Journal Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/journalentry');?>">Journal Entry</a></li>
				<!--  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Budget Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/budgetentry');?>">Budget Entry</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Reconcile Bank Account' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/reconcilebankaccount');?>">Reconcile Bank<br> Account</a></li>-->
				  </ul>
            </li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Journal Inquiry'||'GL Inquiry'||'Bank Account Inquiry'||'Tax Inquiry'||'Trial Balance'||'Balance Sheet Drilldown'||'Profit And Loss Drilldown' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-bar-chart"></i><span class="ml-1">Inquiries and Reports</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Inquiries and Reports' ){echo 'show';}?>">
				  <li><i class="fa fa-bar-chart"></i><a <?php echo $page_title == 'Journal Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/journalinquiry');?>">Journal Inquiry</a></li>
              	  <li><i class="fa fa-bar-chart"></i><a <?php echo $page_title == 'GL Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/glinquiry');?>">GL Inquiry</a></li>              	 
				  <li><i class="fa fa-bank"></i><a <?php echo $page_title == 'Bank Account Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/bankaccountinquiry');?>">Bank Account<br>Inquiry</a></li>      
				  <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Tax Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/taxinquiry');?>">Tax Inquiry</a></li>    
				  <li><i class="fas fa-balance-scale"></i><a <?php echo $page_title == 'Trial Balance' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/trialbalance');?>">Trial Balance</a></li>    				 
				  <li><i class="fas fa-balance-scale"></i><a <?php echo $page_title == 'Balance Sheet Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/balancesheetdrilldown');?>">Balance Sheet</a></li>  
				  <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Profit And Loss Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/profitandloss');?>">Profit and Loss</a></li>  				  				
				</ul>
            </li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Maintenance' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Bank Accounts Maintenance'||'Quick Entries'||'Account Tags'||'GL Accounts'||'GL Account Groups'||'GL Account Classes' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Maintenance' ){echo 'show';}?>">
				  <li><i class="fa fa-bank"></i><a <?php echo $page_title == 'Bank Accounts Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/bank_accounts');?>">Bank Accounts</a></li>  				  				  
				<!--  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Quick Entries' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/quickentries');?>">Quick Entries</a></li>  				  				  
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Account Tags' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/account_tags');?>">Account Tags</a></li> --> 				  				  
				  <li><i class="fa fa-group"></i><a <?php echo $page_title == 'GL Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/glaccounts');?>">GL Accounts</a></li> 
				  <li><i class="fa fa-group"></i><a <?php echo $page_title == 'GL Account Groups' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/glaccount_groups');?>">GL Account<br>Groups</a></li> 
				  <li><i class="fa fa-group"></i><a <?php echo $page_title == 'GL Account Classes' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/glaccount_classes');?>">GL Account<br>Classes</a></li>
				  </ul>
            </li>
				<li class="menu-item-has-children dropdown <?php  if($page == 'Tax Sector' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Tax'||'Tax Group'||'Item Tax Types' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-percent"></i><span class="ml-1">Tax Sector</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Tax Sector' ){echo 'show';}?>">
				  <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Tax' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/tax');?>">Tax</a></li>  				  				  
				<!--  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Quick Entries' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/quickentries');?>">Quick Entries</a></li>  				  				  
				  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Account Tags' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/account_tags');?>">Account Tags</a></li> --> 				  				  
				  <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Tax Group' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/taxgroup');?>">Tax Group</a></li> 
				  <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Item Tax Types' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/finance/itemtax');?>">Item Tax Types</a></li> 
				  
				  </ul>
            </li>
		</ul>				             			   