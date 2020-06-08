				 
	<ul class="nav navbar-nav">
	  <li class="menu-item-has-children dropdown <?php  if($page == 'GST settings for FPO' ){echo 'show open';}?>">
	   <a href="<?php echo base_url('staff/setting');?>" aria-haspopup="true" <?php echo $page_title == 'List GST' ||'Add GST' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tag"></i><span class="ml-1">GST</span></a>
	  </li>	 				  
				  
	  <li class="menu-item-has-children dropdown <?php  if($page == 'incorporate_operation' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('staff/operation/incorporatelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Incorporate' or 'Add Incorporate' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Upload Incorporation Documents </a>
	  </li>	 
	  <!--<li class="menu-item-has-children dropdown <?php  if($page == 'Shares Value' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('staff/setting/sharesvalue');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Shares Value' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-share-alt"></i>Share Value</a>
	  </li>-->
	  <li class="menu-item-has-children dropdown <?php  if($page == 'Invoice Prefix' ){echo 'show open';}?>">
	  <a href="<?php echo base_url('staff/setting/invoiceprefix');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Invoice Prefix' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-exchange"></i>Invoice Prefix</a>
	  </li>	
	  
	</ul>
	