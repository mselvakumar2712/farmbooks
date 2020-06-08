        
		 <ul class="nav navbar-nav">				
		   <li class="menu-item-has-children dropdown  <?php  if($page == 'Crop_Farmer_Mapping' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true"   <?php echo $page_title == 'List Crops' ||'Add Crops' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-pagelines"></i><span class="ml-1">New Crop Entry</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page== 'Crop_Farmer_Mapping' ){echo 'show';}?>">
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crops' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/crop');?>">Crop List</a></li>
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crops' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/crop/addcrop');?>">Add Crop</a></li>
				  </ul>
            </li>
             
		   <li class="menu-item-has-children dropdown <?php  if($page == 'Update Crop' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Update Crop List' ||'Add Update Crop' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-pagelines"></i><span class="ml-1">Update Crop</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Update Crop' ){echo 'show';}?>">
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Update Crop List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop');?>">Update Crop List</a></li>
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Update Crop' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop/add_updatecrop');?>">Add Update Crop</a></li>
				  </ul>
            </li>
             
		   <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Harvest' ){echo 'show open';}?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Crop Harvest List' ||'Add Crop Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-pagelines"></i><span class="ml-1">Crop Harvest</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Harvest' ){echo 'show';}?>">
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Crop Harvest List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop/cropharvest');?>">Crop Harvest List</a></li>
                      <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Harvest' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop/addharvest');?>">Add Crop Harvest</a></li>
				  </ul>
             </li>
             
		   <li class="menu-item-has-children dropdown <?php  if($page == 'Post Harvest' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Post Harvest List' ||'Add Post Harvest' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-pagelines"></i><span class="ml-1">Post harvest</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Post Harvest'){echo 'show';}?>">
                      <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Post Harvest List' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/updatecrop/postharvest');?>">Post Harvest List</a></li>
                      <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add Post Harvest' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop/addpostharvest');?>">Add Post Harvest</a></li>	                      
				  </ul>
            </li>
             
			<li class="menu-item-has-children dropdown">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pagelines"></i><span class="ml-1">Expenses</span></a>
                  <ul class="sub-menu children dropdown-menu ">
                      <li><i class="fa fa-circle-o"></i><a  href="#">Expenses List</a></li>
                      <li><i class="fa fa fa-circle-o"></i><a href="#">Add Expenses</a></li>                       
				  </ul>
            </li>

		</ul>				             			   