          <ul class="nav navbar-nav">
                  <li class="menu-item-has-children dropdown <?php  if($page == 'Tax List' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Tax List'||'Tax Add' ? 'aria-expanded="true"' : 'aria-expanded="false"';?> href="<?php echo base_url('administrator/tax');?>" ><i class="menu-icon fa fa-percent"></i><span class="ml-1"> Tax Master</span></a>                 
				 <!-- <ul class="sub-menu children dropdown-menu <?php  if($page == 'Tax List' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Tax List' ? 'class="active"' : ''; ?> >Tax List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Tax Add' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/tax/taxadd');?>">Tax Add</a></li>
                  </ul>-->
                  </li>	  
			<!-- <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Standard Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Standard Master' ||'Add Crop Standard Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop Standards Master</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Standard Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Crop Standard Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/cropstandard');?>">Crop Standards Master List </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Standard Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/cropstandard/addcropstandard');?>">Add Crop Standards Master</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Category Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Add Crop Category' ||'List Crop Category' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop Category Master</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Category Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Category' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/category');?>">Crop Category Master List </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Category' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/category/addcategory');?>">Add Crop Category Master</a></li>
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Subcategory Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Add Crop Subcategory Master' ||'List Crop Subcategory Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop SubCategory Master</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Subcategory Master' ){echo 'show';}?>">
                    <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Subcategory Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/subcategory');?>">Crop SubCategory Master List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Subcategory Master' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/subcategory/addsubcategory');?>">Add Crop SubCategory Master</a></li>
				  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Name Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Name Master' ||'Add Crop Name Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop Name Master</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Name Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Name Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/name');?>">Crop Name Master List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Name Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/name/addname');?>">Add Crop Name Master</a></li>					
				  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Variety Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Variety Master' ||'Add Crop Variety Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-leaf"></i><span class="ml-1">Crop Variety Master</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Variety Master' ){echo 'show';}?>">
                   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Variety Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/variety');?>">Crop Variety Master List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Variety Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/variety/addvariety');?>">Add Crop Variety Master</a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Update Crop' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Update Crop List' ||'Add Update Crop' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-leaf"></i>Update Crop</a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Update Crop' ){echo 'show';}?>">
                   <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Update Crop' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/updatecrop/viewcrop');?>">Update Crop View</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Update Crop' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/updatecrop/addupdatecrop');?>">Add Update Crop</a></li>                  
                  </ul>
                  </li> -->
				  </ul>				             			   				  