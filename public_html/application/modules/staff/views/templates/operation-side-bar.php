				<ul class="nav navbar-nav">
							
				<?php if(check_staff_permission($_SESSION['profile_type'], 801) == 1) { ?>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'operation' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Appointment List' or 'Add Appointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>Appointment of Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 802) == 1) { ?>  				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'reappointment' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/addreappointment');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Reappointment List' or 'Add Reappointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Reappointment of Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 803) == 1) { ?>    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'removal' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/editremoval');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'View Removal' or 'Edit Removal' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Removal of Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 804) == 1) { ?>    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'constitution' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/constitutionlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Constitution List' or 'Add Constitution' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Constitution of Board of Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 805) == 1) { ?>    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'committee' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/committeelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Committee List' or 'Add Committee' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Committee Members</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 806) == 1) { ?>   
				  <li class="menu-item-has-children dropdown <?php  if($page == 'notice' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/noticelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Notice List' or 'Add Notice' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tasks"></i>Notice to Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 807) == 1) { ?>  				
				 <li class="menu-item-has-children dropdown <?php  if($page == 'meeting' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/meetinglist');?>" aria-haspopup="true"   <?php echo $page_title == 'List Meeting' or 'Add Meeting' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks" aria-hidden="true"></i><span class="ml-1"> Meetings</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'meeting' ){echo 'show';}?>">
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 80701) == 1) { ?>
						<li><i class="fa fa-snowflake-o"></i><a <?php echo $page_title == 'List Board Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/operation/boardmeetinglist');?>">Board Meeting</a></li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 80702) == 1) { ?>
						<li><i class="fa fa-snowflake-o"></i><a <?php echo $page_title == 'List Committee Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/operation/committeemeetinglist');?>">Committee Meeting</a></li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 80703) == 1) { ?>
						<li><i class="fa fa-snowflake-o"></i><a <?php echo $page_title == 'List Annual Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/operation/annualmeetinglist');?>">Annual Meeting</a></li>
					<?php } ?>
					
				  </ul>
                 </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 808) == 1) { ?>  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'ceo' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/ceolist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List CEO' or 'Add CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Chief Executive Officer</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 809) == 1) { ?>   
				  <li class="menu-item-has-children dropdown <?php  if($page == 'company secretary' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/company_secretarylist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Company Secretary' or 'Add Company Secretary' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Company Secretary</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 810) == 1) { ?>  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'chartered account' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/charteredlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Chartered Account' or 'Add Chartered Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Chartered Accountant</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 811) == 1) { ?>   
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training directors' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/training_directorslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training Directors' or 'Add Training Directors' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Training to Directors</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 812) == 1) { ?>   
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training ceo' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/training_ceolist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Training to CEO</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 813) == 1) { ?>  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'exposure' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/exposurelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Exposure' or 'Add Exposure' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i> Exposure Visit</a>
                  </li>
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 814) == 1) { ?>  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/awarenesslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>  Awareness Program</a>
                  </li>				
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 815) == 1) { ?>    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'cluster' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/clusterlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Cluster' or 'Add Cluster' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>Cluster Identification </a>
                  </li>			
				<?php } ?>
			
				<?php if(check_staff_permission($_SESSION['profile_type'], 816) == 1) { ?>    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'baseline' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('staff/operation/baselinelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>Generation of Baseline Information</a>
                  </li>
				<?php } ?>
			
				</ul>				             			   