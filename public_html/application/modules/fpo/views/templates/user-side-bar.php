					<ul class="nav navbar-nav">
		 			 	<li class="menu-item-has-children dropdown  <?php  if($page == 'User Management' ){echo 'show open';}?>">
		 			 		<a href="<?php echo base_url('fpo/user');?>" aria-haspopup="true" <?php echo $page_title == 'List User' ||'Add User' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user" aria-hidden="true"></i><span class="ml-1">User Management</span></a>
		 			 	</li>
		 			 	<li class="menu-item-has-children dropdown <?php  if($page == 'Role Management' ){echo 'show open';}?>">
		 			 		<a href="<?php echo base_url('fpo/role');?>" aria-haspopup="true" <?php echo $page_title == 'Role List' ||'Role Add' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-users"></i><span class="ml-1">Role Management</span></a>
		 			 	</li>
		 		 </ul>
