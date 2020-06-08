		<ul class="nav navbar-nav">	
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 101) == 1) { ?>
			<li class="menu-item-has-children dropdown  <?php  if($page == 'POPI' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/popi');?>" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-sitemap" aria-hidden="true"></i><span class="ml-1"> POPI /Federation </span></a>
            </li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 102) == 1) { ?>
			<li class="menu-item-has-children dropdown <?php  if($page == 'FPO' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/fpo');?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-building-o" aria-hidden="true"></i><span class="ml-1">FPO</span></a>
			</li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 103) == 1) { ?>
		   	<li class="menu-item-has-children dropdown <?php  if($page == 'FPG' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/fpg');?>" class="dropdown-toggle" aria-haspopup="true" <?php echo $page_title == 'List FPG' ||'Add FPG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-users" aria-hidden="true"></i><span class="ml-1">  FPG</span></a>
            </li>	
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 104) == 1) { ?>
		    <li class="menu-item-has-children dropdown <?php  if($page == 'FIG' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/fig');?>" aria-haspopup="true" <?php echo $page_title == 'List FIG' ||'Add FIG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-users" aria-hidden="true"></i><span class="ml-1">  FIG</span></a>
            </li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 105) == 1) { ?>
			<li class="menu-item-has-children dropdown <?php  if($page == 'FIG Representative' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/fig/figrepresentativelist');?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-black-tie" aria-hidden="true"></i><span class="ml-1">FIG Representative</span></a>
            </li>
			<?php } ?>
			
			<?php if(check_staff_permission($_SESSION['profile_type'], 106) == 1) { ?>
			<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/farmer/profilelist');?>" aria-haspopup="true"   <?php echo $page_title == 'List Farmer Profile'or'Add Farmer Profile' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf" aria-hidden="true"></i><span class="ml-1"> Farmer</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farmer' ){echo 'show';}?>">
					<?php if(check_staff_permission($_SESSION['profile_type'], 10601) == 1) { ?>
					  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Farmer Profile' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/farmer/profilelist');?>">Profile</a></li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 10602) == 1) { ?>  
					  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Land Details List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/farmer/landlist');?>">Land Details</a></li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 10603) == 1) { ?>  
					  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Farm implement List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/farmer/farmimplementlist');?>">Farm Implements</a></li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 10604) == 1) { ?>  
					  <li><i class="fa fas fa-paw"></i><a <?php echo $page_title == 'Live Stocks List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/farmer/livestocklist');?>">Live Stocks</a></li>
					<?php } ?>
                  </ul>
            </li>
			<?php } ?>
			
		</ul>				             			   