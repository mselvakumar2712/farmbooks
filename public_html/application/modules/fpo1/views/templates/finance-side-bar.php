      <ul id="inv-parent" class="nav navbar-nav">
         <li class="menu-item-has-children dropdown <?php if($page == 'Transaction' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Payments'||'Deposits'||'Bank Accounts'||'Journal Entry'||'Budget Entry'||'Reconcile Bank Account'||'Reconcile Bank Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-exchange-alt"></i><span class="ml-1">Transaction</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php if($page == 'Transaction' ){echo 'show';}?>">
               <li><i class="fas fa-hand-holding-usd"></i><a <?php echo $page_title == 'Sales Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/salesentry');?>">Sales</a></li>
               <li><i class="fas fa-receipt"></i><a <?php echo $page_title == 'Deposits' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/deposits');?>">Receipt</a></li>
               <li><i class="fa fa-shopping-cart"></i><a <?php echo $page_title == 'Purchase Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/purchaseentry');?>">Purchase</a></li>
               <li><i class="far fa-money-bill-alt"></i><a <?php echo $page_title == 'Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/payments');?>">Payment</a></li>
               <li><i class="fas fa-exchange-alt"></i><a <?php echo $page_title == 'Bank Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/bankaccounts');?>">Contra</a></li>
               <li><i class="fa fa-paper-plane"></i><a <?php echo $page_title == 'Journal Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/journalentry');?>">Journal</a></li>
               <li><i class="fa fa-credit-card"></i><a <?php echo $page_title == 'Debit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/debitnote');?>">Debit Note</a></li>
               <li><i class="fa fa-credit-card"></i><a <?php echo $page_title == 'Credit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/creditnote');?>">Credit Note</a></li>
               <!--  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Budget Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/budgetentry');?>">Budget Entry</a></li>
               <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Reconcile Bank Account' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/reconcilebankaccount');?>">Reconcile Bank<br> Account</a></li>-->
            </ul>
         </li>
         <li class="menu-item-has-children dropdown <?php if($page == 'Inquiries and Reports' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Journal Inquiry'||'GL Inquiry'||'Bank Account Inquiry'||'Tax Inquiry'||'Trial Balance'||'Balance Sheet Drilldown'||'Profit And Loss Drilldown' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-bar-chart"></i><span class="ml-1">Inquiries and Reports</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php if($page == 'Inquiries and Reports' ){echo 'show';}?>">
               <li><i class="fas fa-book-open"></i><a <?php echo $page_title == 'Sales Invoice List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/salesinvoicelist');?>">Sales Register</a></li>
               <li><i class="fas fa-book-open"></i><a <?php echo $page_title == 'Purchase Register List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/purchaseregisterlist');?>">Purchase Register</a></li>              
               <li><i class="fa fa-bar-chart"></i><a <?php echo $page_title == 'Journal Inquiry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/journalinquiry');?>">Journal Inquiry</a></li>
               <li><i class="fa fa-bar-chart"></i><a <?php echo $page_title == 'GL Reports' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/glreports');?>">GL Reports</a></li>                  
               <!--<li><i class="fa fa-circle-o"></i><a <?php //echo $page_title == 'Bank Account Inquiry' ? 'class="active"' : ''; ?> href="<?php //echo base_url('fpo/finance/bankaccountinquiry');?>">Bank Account<br>Inquiry</a></li>      
               <li><i class="fa fa-circle-o"></i><a <?php //echo $page_title == 'Tax Inquiry' ? 'class="active"' : ''; ?> href="<?php //echo base_url('fpo/finance/taxinquiry');?>">Tax Inquiry</a></li>-->    
               <li><i class="fas fa-balance-scale"></i><a <?php echo $page_title == 'Trial Balance' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/trialbalance');?>">Trial Balance</a></li>		 
               <li><i class="fas fa-balance-scale"></i><a <?php echo $page_title == 'Balance Sheet Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/balancesheetdrilldown');?>">Balance Sheet</a></li>  
               <li><i class="fa fa-percent"></i><a <?php echo $page_title == 'Profit And Loss Drilldown' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/profitandloss');?>">Profit and Loss</a></li>  				  				
            </ul>
         </li>
         <li class="menu-item-has-children dropdown <?php if($page == 'Maintenance' ){echo 'show open';}?>">
            <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Bank Accounts Maintenance'||'Quick Entries'||'Account Tags'||'GL Accounts'||'GL Account Groups'||'GL Account Classes'||'Suppliers' || 'Customers' || 'Customer Edit'|| 'Customer Branches'? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-cogs"></i><span class="ml-1">Maintenance</span></a>                 
            <ul class="sub-menu children dropdown-menu <?php if($page == 'Maintenance' ){echo 'show';}?>">
               <li><i class="fa fa-bank"></i><a <?php echo $page_title == 'Bank Accounts Maintenance' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/bank_accounts');?>">Bank Accounts</a></li>  				  				  
               <!--<li><i class="fa fa-circle-o"></i><a <?php //echo $page_title == 'Quick Entries' ? 'class="active"' : ''; ?> href="<?php //echo base_url('fpo/finance/quickentries');?>">Quick Entries</a></li>  				  				  
               <li><i class="fa fa-circle-o"></i><a <?php //echo $page_title == 'Account Tags' ? 'class="active"' : ''; ?> href="<?php //echo base_url('fpo/finance/account_tags');?>">Account Tags</a></li> --> 				  				  
               <li><i class="fa fa-group"></i><a <?php echo $page_title == 'GL Account Groups' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/glaccount_groups');?>">GL Groups</a></li> 
               <li><i class="fa fa-group"></i><a <?php echo $page_title == 'GL Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/glaccounts');?>">GL Accounts</a></li>
               <li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Suppliers' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/suppliers');?>">Suppliers</a></li> 
               <li><i class="fas fa-user-tag"></i><a <?php echo $page_title == 'Customers' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/customers');?>">Customers</a></li> 
               <li><i class="fas fa-sitemap"></i><a <?php echo $page_title == 'Customers Branches' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/finance/customerbranches');?>">Customer Branches</a></li> 
            <!--<li><i class="fa fa-circle-o"></i><a <?php //echo $page_title == 'GL Account Classes' ? 'class="active"' : ''; ?> href="<?php //echo base_url('fpo/finance/glaccount_classes');?>">GL Account<br>Classes</a></li>-->
            </ul>
         </li>
      </ul>				             			   