	<ul class="nav navbar-nav">
	  <!--Profile-->
     <li class="menu-item-has-children dropdown <?php if($page == 'Profile List' ){echo 'show open';}?>">
	   <a href="<?php echo base_url('fpo/approver');?>" aria-haspopup="true" <?php echo $page_title == 'Profile List' ||'Profile List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user-tie"></i><span class="ml-1">Profile</span></a>
	  </li>	 				  
	  <!--Godown-->  
	  <li class="menu-item-has-children dropdown <?php if($page == 'Godown List' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('fpo/approver/godownlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Godown List' || 'Godown List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-home"></i>Godown</a>
	  </li>	 
	 <!--Bank-->
	  <li class="menu-item-has-children dropdown <?php if($page == 'Bank List' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('fpo/approver/banklist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Bank List' || 'Bank List'? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-bank"></i>Bank Accounts</a>
	  </li>
     <!--User-->
     <li class="menu-item-has-children dropdown <?php if($page == 'User List' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('fpo/approver/userlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'User List' || 'User List'? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-users"></i>Users</a>
	  </li>
     <!--Finance-->
     <li class="menu-item-has-children dropdown <?php if($page == 'Finance' ){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/receiptlist');?>"  <?php echo $page_title == 'Receipt List'||'Payment List'||'Contra List'||'Journal List'||'Debit Note List'||'Credit Note List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon far fa-money-bill-alt"></i><span class="ml-1">Finance</span></a>                 
      <ul class="sub-menu children dropdown-menu <?php if($page == 'Finance' ){echo 'show';}?>">
         <li><i class="fas fa-receipt"></i> <a <?php echo $page_title == 'Deposits' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/receiptlist');?>">Receipt</a></li>
         <li><i class="far fa-money-bill-alt"></i> <a <?php echo $page_title == 'Payments' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/paymentlist');?>">Payment</a></li>
         <li><i class="fas fa-exchange-alt"></i> <a <?php echo $page_title == 'Bank Accounts' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/contralist');?>">Contra</a></li>
         <li><i class="fa fa-paper-plane"></i> <a <?php echo $page_title == 'Journal Entry' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/journallist');?>">Journal</a></li>
         <li><i class="fa fa-credit-card"></i> <a <?php echo $page_title == 'Debit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/debitlist');?>">Debit Note</a></li>
         <li><i class="fa fa-credit-card"></i> <a <?php echo $page_title == 'Credit Note' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/creditlist');?>">Credit Note</a></li>
      </ul>
     </li>
     <!--Purchase-->
     <li class="menu-item-has-children dropdown <?php if($page == 'Inventory' ){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/purchaselist');?>"  <?php echo $page_title == 'Purchase List' || 'Purchase List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-shopping-cart"></i><span class="ml-1">Purchase</span></a>                 
     </li>
     <!--Supplier-->
     <li class="menu-item-has-children dropdown <?php  if($page == 'Supplier' ){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/supplierlist');?>"  <?php echo $page_title == 'Supplier List' || 'Supplier List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tag"></i><span class="ml-1">Supplier</span></a>                 
     </li>
     <!--sales-->
     <li class="menu-item-has-children dropdown <?php if($page == 'Sales' ){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/saleslist');?>"  <?php echo $page_title == 'Sales List' || 'Sales List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-shopping-bag"></i><span class="ml-1">Sales</span></a>                 
     </li>
     <!--Customer-->
     <li class="menu-item-has-children dropdown <?php  if($page == 'Customer' ){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/customerlist');?>"  <?php echo $page_title == 'Customer List' || 'Customer List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tag"></i><span class="ml-1">Customer</span></a>                 
     </li>
     <!--Share-->
      <li class="menu-item-has-children dropdown <?php if($page == 'Share' ){echo 'show open';}?>">
         <a href="<?php echo base_url('fpo/approver/shareAllotedList');?>" aria-haspopup="true" <?php echo $page_title == 'Allotment List' ||'Certificate List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-hand-holding-usd"></i>Share</a>
         <ul class="sub-menu children dropdown-menu <?php if($page == 'Share' ){echo 'show';}?>">
            <li><i class="fas fa-coins"></i><a <?php echo $page_title == 'Allotment List' ? 'class="active"' : ''; ?>  href="<?php echo base_url('fpo/approver/shareAllotedList');?>">Allotment of Shares</a></li>
            <li><i class="fas fa-award"></i><a <?php echo $page_title == 'Certificate List' ? 'class="active"' : ''; ?>  href="<?php echo base_url('fpo/approver/shareCertificateList');?>">Share Certificates</a></li>
         </ul>
      </li>
      <!--Operation-->
     <li class="menu-item-has-children dropdown <?php if($page == 'Operation'){echo 'show open';}?>">
      <a href="<?php echo base_url('fpo/approver/noticeToDirectors');?>" <?php echo $page_title == 'Notice to Director'||'Training to Director'||'Training to CEO'||'Exposure Visit'||'Awareness Program'||'Cluster Identification'||'Baseline Information' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i><span class="ml-1">Operation</span></a>
		<ul class="sub-menu children dropdown-menu <?php if($page == 'Operation' ){echo 'show';}?>">
			<li><i class="fas fa-receipt"></i> <a <?php echo $page_title == 'Notice to Director' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/noticeToDirectors');?>">Notice to Director</a></li>
			<li><i class="fas fa-chalkboard-teacher"></i> <a <?php echo $page_title == 'Training to Director' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/trainingToDirector');?>">Training to Director</a></li>
			<li><i class="fas fa-chalkboard-teacher"></i> <a <?php echo $page_title == 'Training to CEO' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/trainingToCEO');?>">Training to CEO</a></li>
			<li><i class="fa fa-eye"></i> <a <?php echo $page_title == 'Exposure Visit' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/exposureVisit');?>">Exposure Visit</a></li>
			<li><i class="fas fa-user-ninja"></i> <a <?php echo $page_title == 'Awareness Program' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/awarenessProgram');?>">Awareness Program</a></li>			
			<li><i class="fas fa-user-ninja"></i> <a <?php echo $page_title == 'Base Line Info' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/clusterIdentify');?>">Cluster Identification</a></li>
			<li><i class="fas fa-info-circle"></i> <a <?php echo $page_title == 'Base Line Info' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/approver/baselineInfo');?>">Generation of Baseline Information</a></li>
      </ul>
     </li>
	  
	</ul>
	