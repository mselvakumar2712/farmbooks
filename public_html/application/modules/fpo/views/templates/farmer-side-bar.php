				<ul class="nav navbar-nav">
						<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer' ){echo 'show open';}?>">
							<a href="<?php echo base_url('fpo/farmer/profilelist');?>" aria-haspopup="true" <?php echo $page_title == 'List Farmer Profile' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-pied-piper-alt"></i><span class="ml-1">Profile</span></a>
						</li>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer Land' ){echo 'show open';}?>">
							<a href="<?php echo base_url('fpo/farmer/landlist');?>" aria-haspopup="true" <?php echo $page_title == 'Land Details List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-map-signs"></i><span class="ml-1">Land Details</span></a>
						</li>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer Implement' ){echo 'show open';}?>">
							<a href="<?php echo base_url('fpo/farmer/farmimplementlist');?>" aria-haspopup="true" <?php echo $page_title == 'Farm implement List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-tractor"></i><span class="ml-1">Farm Implements</span></a>
						</li>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Farmer Livestock' ){echo 'show open';}?>">
							<a href="<?php echo base_url('fpo/farmer/livestocklist');?>" aria-haspopup="true" <?php echo $page_title == 'Live Stocks List' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-dove"></i><span class="ml-1">Live Stocks</span></a>
						</li>
				 </ul>
