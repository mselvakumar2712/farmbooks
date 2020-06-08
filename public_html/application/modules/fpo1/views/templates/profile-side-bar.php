        
		 <ul class="nav navbar-nav">
		   <?php if($_SESSION['user_type']=='0'){?>
		   <?php } else if($_SESSION['user_type']=='3'){?>
		   	<li class="menu-item-has-children dropdown <?php  if($page == 'FPG' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/fpg');?>" class="dropdown-toggle" aria-haspopup="true" <?php echo $page_title == 'List FPG' ||'Add FPG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-users" aria-hidden="true"></i><span class="ml-1">  FPG</span></a>
            </li>	  
		    <li class="menu-item-has-children dropdown <?php  if($page == 'FIG' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/fig');?>" aria-haspopup="true" <?php echo $page_title == 'List FIG' ||'Add FIG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-users" aria-hidden="true"></i><span class="ml-1">  FIG</span></a>
            </li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'FIG Representative' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/fig/figrepresentativelist');?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-tie" aria-hidden="true"></i><span class="ml-1">FIG Representative</span></a>
            </li>		   
			<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/farmer/profilelist');?>" aria-haspopup="true"   <?php echo $page_title == 'List Farmer Profile'or'Add Farmer Profile' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-pied-piper-alt" aria-hidden="true"></i><span class="ml-1"> Farmer</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farmer' ){echo 'show';}?>">
                  <li><i class="fas fa-user-tie"></i><a <?php echo $page_title == 'List Farmer Profile' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/farmer/profilelist');?>">Profile</a></li>
                 <!-- <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Farmer Profile' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/farmer/addfarmer');?>">Add Farmer</a></li>-->
                  <li><i class="fas fa-igloo"></i><a <?php echo $page_title == 'Land Details List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/farmer/landlist');?>">Land Details</a></li>
                  <li><i class="fas fa-tractor"></i><a <?php echo $page_title == 'Farm implement List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/farmer/farmimplementlist');?>">Farm Implements</a></li>
                  <li><i class="fas fa-dove"></i><a <?php echo $page_title == 'Live Stocks List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/farmer/livestocklist');?>">Live Stocks</a></li>
                  </ul>
            </li>
			<?php }?>
		</ul>				             			   