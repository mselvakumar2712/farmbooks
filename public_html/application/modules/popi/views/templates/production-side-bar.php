        
		 <ul class="nav navbar-nav">				
		    <li class="menu-item-has-children dropdown <?php  if($page == 'Farmer' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"   <?php echo $page_title == 'List Farmer Profile'or'Add Farmer Profile' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user"></i><span class="ml-1"> Farmer Profile</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farmer' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Farmer Profile' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/farmer/profilelist');?>">List Farmer Profile</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Farmer Profile' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/farmer/addfarmer');?>">Add Farmer Profile</a></li>
                  </ul>
            </li>
		   <li class="menu-item-has-children dropdown  <?php  if($page == 'POPI' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true"   <?php echo $page_title == 'List POPI' ||'Add POPI' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user"></i><span class="ml-1">  POPI /Federation </span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page== 'POPI' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List POPI' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/popi');?>">POPI List</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add POPI' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/popi/addpopi');?>">Add POPI</a></li>
				  </ul>
            </li>
		   <li class="menu-item-has-children dropdown <?php  if($page == 'FIG' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List FIG' ||'Add FIG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user"></i><span class="ml-1">  FIG</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'FIG' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List FIG' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/fig');?>">FIG List</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add FIG' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/fig/addfig');?>">Add FIG</a></li>
				  </ul>
            </li>
		   <li class="menu-item-has-children dropdown <?php  if($page == 'FPG' ){echo 'show open';}?>">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List FPG' ||'Add FPG' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-user"></i><span class="ml-1">  FPG</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'FPG' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List FPG' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/fpg');?>">FPG List</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add FPG' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/fpg/addfpg');?>">Add FPG</a></li>
				  </ul>
             </li>
		   <li class="menu-item-has-children dropdown <?php  if($page == 'FPO' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i><span class="ml-1">FPO</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'FPO' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List FPO' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/fpo');?>">FPO List</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add FPO' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/fpo/addfpo');?>">Add FPO</a></li>					
				  </ul>
            </li>
			<li class="menu-item-has-children dropdown <?php  if($page == 'FIG Representative' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i><span class="ml-1">FIG Representative</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'FIG Representative' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List FIG Representative' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/fig/figrepresentativelist');?>">FPO List</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Add FIG Representativ' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/fig/addfigrepresent');?>">Add FPO</a></li>					
				  </ul>
            </li>

		</ul>				             			   