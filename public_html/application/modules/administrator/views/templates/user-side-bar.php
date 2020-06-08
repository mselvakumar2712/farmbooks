				 
				<ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown <?php  if($page == 'User Management' ){echo 'show open';}?>">
                   <a href="<?php echo base_url('administrator/user');?>" class="children dropdown-menu" aria-haspopup="true" <?php echo $page_title == 'List User' ||'Add User' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-users"></i><span class="ml-1">Users</span></a>
                  </li>
				</ul>				             			   