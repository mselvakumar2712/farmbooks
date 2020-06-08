				  <ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown <?php  if($page == 'operation' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Appointment List' or 'Add Appointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i>Appointment of Directors</a>
                  </li>
				  				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'reappointment' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Reappointment List' or 'Add Reappointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-calendar-alt"></i>Reappointment of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'removal' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'View Removal' or 'Edit Removal' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-slash"></i>Removal of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'constitution' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Constitution List' or 'Add Constitution' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-plus"></i>Constitution of Board of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'committee' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Committee List' or 'Add Committee' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-shield"></i>Committee Members</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'notice' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Notice List' or 'Add Notice' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-receipt"></i>Notice to Directors</a>
                  </li>
				 
				
				 <li class="menu-item-has-children dropdown <?php  if($page == 'meeting' ){echo 'show open';}?>">
                  <a href="<?php //echo base_url('fpo/operation/meetinglist');?>" aria-haspopup="true"   <?php echo $page_title == 'List Meeting' or 'Add Meeting' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher" aria-hidden="true"></i><span class="ml-1"> Meetings</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'meeting' ){echo 'show';}?>">
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Board Meeting' ? 'class="active"' : ''; ?> href="#">Board Meeting</a></li>
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Committee Meeting' ? 'class="active"' : ''; ?> href="#">Committee Meeting</a></li>
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Annual Meeting' ? 'class="active"' : ''; ?> href="#">Annual Meeting</a></li>
                  </ul>
                </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'ceo' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List CEO' or 'Add CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i> Chief Executive Officer</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'company secretary' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Company Secretary' or 'Add Company Secretary' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon far fa-user"></i> Company Secretary</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'chartered account' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Chartered Account' or 'Add Chartered Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon far fa-user"></i> Chartered Accountant</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training directors' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training Directors' or 'Add Training Directors' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher"></i> Training to Directors</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training ceo' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher"></i> Training to CEO</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'exposure' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Exposure' or 'Add Exposure' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-eye"></i> Exposure Visit</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-ninja"></i>  Awareness Program</a>
                  </li>
			
				   <li class="menu-item-has-children dropdown">

				   <li class="menu-item-has-children dropdown <?php  if($page == 'cluster' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Cluster' or 'Add Cluster' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-ninja"></i>Cluster Identification </a>
                  </li>

				
				  <li class="menu-item-has-children dropdown <?php  if($page == 'baseline' ){echo 'show open';}?>">
                  <a href="#" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-info-circle"></i>Generation of Baseline Information</a>

                  </li>
				  
				  </ul>				             			   