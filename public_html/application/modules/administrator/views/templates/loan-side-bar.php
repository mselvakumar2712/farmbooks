				 
				<ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown">
                  <a href="<?php echo base_url('administrator/popi');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sitemap"></i>POPI /Federation </a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                  <a href="<?php echo base_url('administrator/fpo');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon far fa-building"></i>FPO</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                  <a href="<?php echo base_url('administrator/fig');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>FIG</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                  <a href="<?php echo base_url('administrator/fpg');?>" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>FPG</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'FIG Representative' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/fig/figrepresentativelist');?>" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-user-tie" aria-hidden="true"></i><span class="ml-1">FIG Representative</span></a>
                  </li>	
				  <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fab fa-pied-piper-alt"></i>Farmer</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="menu-icon fas fa-user-tie"></i><a href="<?php echo base_url('administrator/farmer/profilelist');?>">Profile </a></li>
				  <li><i class="fas fa-igloo"></i><a href="<?php echo base_url('administrator/farmer/landlist');?>">Land Details</a></li>
                  <li><i class="fas fa-tractor"></i><a <?php echo $page_title == 'Farm implement List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/farmer/farmimplementlist');?>">Farm Implements</a></li>
                  <li><i class="fas fa-dove"></i><a <?php echo $page_title == 'Live Stocks List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/farmer/livestocklist');?>">Live Stocks</a></li>
                  </ul>
                  </li>
				</ul>				             			   