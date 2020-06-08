		<ul class="nav navbar-nav">
			<?php if(check_staff_permission($_SESSION['logger_id'], 601) == 1) { ?>		 
				<li class="menu-item-has-children dropdown  <?php  if($page == 'Crop_Farmer_Mapping' ){echo 'show open';}?>">
					  <a href="<?php echo base_url('staff/crop');?>" aria-haspopup="true"   <?php echo $page_title == 'List Crops' ||'Add Crops' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf" aria-hidden="true"></i><span class="ml-1">New Crop Entry</span></a>
				</li>
            <?php } ?>
			
            <?php if(check_staff_permission($_SESSION['logger_id'], 602) == 1) { ?>
				<li class="menu-item-has-children dropdown <?php  if($page == 'Update Crop' ){echo 'show open';}?>">
					  <a href="<?php echo base_url('staff/updatecrop');?>" aria-haspopup="true" <?php echo $page_title == 'Update Crop List' ||'Add Update Crop' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Update Crop</span></a>
				</li>
            <?php } ?>
             
            <?php if(check_staff_permission($_SESSION['logger_id'], 603) == 1) { ?>
				<li class="menu-item-has-children dropdown <?php  if($page == 'Crop Harvest' ){echo 'show open';}?>">
					  <a href="<?php echo base_url('staff/updatecrop/cropharvest');?>" class="dropdown-toggle" aria-haspopup="true" <?php echo $page_title == 'Crop Harvest List' ||'Add Crop Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop Harvest</span></a>
				</li>
             <?php } ?>
             
            <?php if(check_staff_permission($_SESSION['logger_id'], 604) == 1) { ?>
			   <li class="menu-item-has-children dropdown <?php  if($page == 'Post Harvest' ){echo 'show open';}?>">
					  <a href="<?php echo base_url('staff/updatecrop/postharvest');?>" aria-haspopup="true" <?php echo $page_title == 'Post Harvest List' ||'Add Post Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-leaf"></i><span class="ml-1">Post harvest</span></a>
					 
				</li>
            <?php } ?>
             
            <?php if(check_staff_permission($_SESSION['logger_id'], 605) == 1) { ?> 
				<li class="menu-item-has-children dropdown <?php  if($page == 'Expenses' ){echo 'show open';}?>">
					  <a href="<?php echo base_url('staff/updatecrop/expenseslist');?>" aria-haspopup="true"  <?php echo $page_title == 'Expenses List' ||'Add Expenses Updation' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-leaf"></i><span class="ml-1">Expenses</span></a>
			
				</li>
			<?php } ?>
		</ul>				             			   