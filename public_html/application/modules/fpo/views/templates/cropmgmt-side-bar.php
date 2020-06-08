		 <ul class="nav navbar-nav">
			 	<li class="menu-item-has-children dropdown  <?php  if($page == 'crop' ){echo 'show open';}?>">
			 		<a href="<?php echo base_url('fpo/crop');?>" aria-haspopup="true" <?php echo $page_title == 'List Crops' ||'Add Crops' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf" aria-hidden="true"></i><span class="ml-1">New Crop Entry</span></a>
			 	</li>
			 	<li class="menu-item-has-children dropdown <?php  if($page == 'Update Crop' ){echo 'show open';}?>">
			 		<a href="<?php echo base_url('fpo/updatecrop');?>" aria-haspopup="true" <?php echo $page_title == 'Update Crop List' ||'Add Update Crop' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-drumstick-bite"></i><span class="ml-1">Update Crop</span></a>
			 	</li>
			 	<li class="menu-item-has-children dropdown <?php  if($page == 'Crop Harvest' ){echo 'show open';}?>">
			 		<a href="<?php echo base_url('fpo/updatecrop/cropharvest');?>" class="dropdown-toggle" aria-haspopup="true" <?php echo $page_title == 'Crop Harvest List' ||'Add Crop Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fab fa-canadian-maple-leaf"></i><span class="ml-1">Crop Harvest</span></a>
			 	</li>
			 	<li class="menu-item-has-children dropdown <?php  if($page == 'Post Harvest' ){echo 'show open';}?>">
			 		<a href="<?php echo base_url('fpo/updatecrop/postharvest');?>" aria-haspopup="true" <?php echo $page_title == 'Post Harvest List' ||'Add Post Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-industry"></i><span class="ml-1">Post harvest</span></a>
			 	</li>
			 	<li class="menu-item-has-children dropdown <?php  if($page == 'Expenses' ){echo 'show open';}?>">
			 		<a href="<?php echo base_url('fpo/updatecrop/expenseslist');?>" aria-haspopup="true" <?php echo $page_title == 'Expenses List' ||'Add Expenses Updation' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-hand-holding-usd"></i><span class="ml-1">Expenses</span></a>
			 	</li>
		 </ul>
