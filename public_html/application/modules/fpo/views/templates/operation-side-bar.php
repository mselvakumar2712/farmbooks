				  <ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown <?php  if($page == 'operation' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Appointment List' or 'Add Appointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i>Appointment of Directors</a>
                  </li>
				  				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'reappointment' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/addreappointment');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Reappointment List' or 'Add Reappointment' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-calendar-alt"></i>Reappointment of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'removal' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/editremoval');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'View Removal' or 'Edit Removal' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-slash"></i>Removal of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'ceo' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/ceolist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List CEO' or 'Add CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i> Chief Executive Officer</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'constitution' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/constitutionlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Constitution List' or 'Add Constitution' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-plus"></i>Constitution of Board of Directors</a>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'committee' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/committeelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Committee List' or 'Add Committee' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-user-shield"></i>Committee Members</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'notice' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/noticelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Notice List' or 'Add Notice' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-receipt"></i>Notice to Directors</a>
                  </li>
				 
				
				 <li class="menu-item-has-children dropdown <?php  if($page == 'meeting' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/meetinglist');?>" aria-haspopup="true"   <?php echo $page_title == 'List Meeting' or 'Add Meeting' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher" aria-hidden="true"></i><span class="ml-1"> Meetings</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'meeting' ){echo 'show';}?>">
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Board Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/operation/boardmeetinglist');?>">Board Meeting</a></li>
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Committee Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/operation/committeemeetinglist');?>">Committee Meeting</a></li>
                  <li><i class="fas fa-chalkboard-teacher"></i><a <?php echo $page_title == 'List Annual Meeting' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/operation/annualmeetinglist');?>">Annual Meeting</a></li>
                  </ul>
				 </li>
				  <!--<li class="menu-item-has-children dropdown <?php  //if($page == 'ceo' ){echo 'show open';}?>">
                  <a href="<?php //echo base_url('fpo/operation/ceolist');?>" aria-haspopup="true" aria-expanded="false" <?php// echo $page_title == 'List CEO' or 'Add CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i> Chief Executive Officer</a>
                  </li>-->
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'company secretary' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/company_secretarylist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Company Secretary' or 'Add Company Secretary' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon far fa-user"></i> Company Secretary</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'chartered account' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/charteredlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Chartered Account' or 'Add Chartered Account' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon far fa-user"></i> Chartered Accountant</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training directors' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/training_directorslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training Directors' or 'Add Training Directors' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher"></i> Training to Directors</a>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'training ceo' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/training_ceolist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-chalkboard-teacher"></i> Training to CEO</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'exposure' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/exposurelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Exposure' or 'Add Exposure' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-eye"></i> Exposure Visit</a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/awarenesslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-ninja"></i>  Awareness Program</a>
                  </li>
				<!-- <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/awarenesslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>  Awareness Program</a>
                  </li>
				   <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/awarenesslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>  Awareness Program</a>
                  </li>
				   <li class="menu-item-has-children dropdown <?php  if($page == 'awarness' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/awarenesslist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Awarness' or 'Add Awarness' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tasks"></i>  Awareness Program</a>
                  </li> -->

				   <!--<li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Exposure Visit</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-circle-o"></i><a href="#">List Exposure Visit</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add Exposure Visit</a></li>
				  </ul>
                  </li>-->
				   <!--<li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Awareness Program</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-circle-o"></i><a href="#">List  Awareness Program</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add  Awareness Program</a></li>
				  </ul>
                  </li>-->
				   <!--<li class="menu-item-has-children dropdown">
||||||| .r703
				   <!--<li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Exposure Visit</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-circle-o"></i><a href="#">List Exposure Visit</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add Exposure Visit</a></li>
				  </ul>
                  </li>-->
				   <!--<li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Awareness Program</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-circle-o"></i><a href="#">List  Awareness Program</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add  Awareness Program</a></li>
				  </ul>
                  </li>-->
				   <li class="menu-item-has-children dropdown">

				 
				  <!--<li class="menu-item-has-children dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Cluster Identification</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fa fa-circle-o"></i><a href="#">List Cluster Identification</a></li>
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add Cluster Identification</a></li>
				  </ul>
                  </li>-->
				   <li class="menu-item-has-children dropdown <?php  if($page == 'cluster' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/clusterlist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Cluster' or 'Add Cluster' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-ninja"></i>Cluster Identification </a>
                  </li>

				 <!-- <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Generation of Baseline Information</a>
                  <ul class="sub-menu children dropdown-menu">
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add Baseline</a></li>
				  </ul>

				  <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Generation of Baseline Information</a>
                  <ul class="sub-menu children dropdown-menu">
				  <li><i class="fa fa fa-circle-o"></i><a href="#">Add Baseline</a></li>
				  </ul>-->

				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'baseline' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/operation/baselinelist' );?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Training CEO' or 'Add Training CEO' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-info-circle"></i>Generation of Baseline Information</a>

                  </li>
				  
				  </ul>				             			   