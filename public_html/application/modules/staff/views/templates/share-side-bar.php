				<ul class="nav navbar-nav">
					<?php if(check_staff_permission($_SESSION['profile_type'], 901) == 1) { ?>
					<li class="menu-item"<?php if($page == 'Share Settings'){ echo 'show'; }?>><a <?php echo $page_title == 'Share Settings' ? 'class="active"' : ''; ?>href="<?php echo base_url('staff/share/sharesvalue');?>" ><i class="menu-icon fa fa-share-alt"></i>Share Settings</a></li>				
				    <?php } ?>
					
					<?php if(check_staff_permission($_SESSION['profile_type'], 902) == 1) { ?>
					<li class="menu-item-has-children dropdown <?php  if($page == 'Share Application' ){echo 'show open';}?>">
					   <a href="<?php echo base_url('staff/share');?>" aria-haspopup="true" <?php echo $page_title == 'Share Application Farmer List' ||'Share Application Farmer Add'||'Share Application FPO Add' ||'Share Application FPO View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-share-alt"></i>Share Application</a>
					   <ul class="sub-menu children dropdown-menu <?php  if($page == 'Share Application' ){echo 'show';}?>">
						   <?php if(check_staff_permission($_SESSION['profile_type'], 90201) == 1) { ?>
						   <li><i class="menu-icon fa fa-circle-o"></i><a <?php echo $page_title == 'Share Application Farmer List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/share');?>">Farmer</a></li>
						   <?php } ?>
						   <?php if(check_staff_permission($_SESSION['profile_type'], 90202) == 1) { ?>
						   <li><i class="menu-icon fa fa-circle-o"></i><a <?php echo $page_title == 'Share Application FPO List' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/share/fpo_shareapplication_list');?>">FPO</a></li>
					       <?php } ?>
					   </ul>
					</li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 903) == 1) { ?>
					<li class="menu-item"<?php if($page == 'Generate Application' ){echo 'show';}?>><a <?php echo $page_title == 'Generate Application' ? 'class="active"' : ''; ?>href="<?php echo base_url('staff/share/generateshareapplication');?>" ><i class="menu-icon fa fa-download"></i>Generate Application</a></li>				
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 904) == 1) { ?>
				    <li class="menu-item-has-children dropdown <?php if($page == 'Allotment of Share' ){echo 'show open';}?>">
					  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Share Original Issue' ||'Share Bonus Issue'||'Share Right Issue' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-share-alt"></i>Allotment of Shares</a>
					  <ul class="sub-menu children dropdown-menu <?php if($page == 'Allotment of Share' ){echo 'show';}?>">
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90401) == 1) { ?>
						  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Share Original Issue' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/share/shareallotment');?>">Add Original Issue</a></li>
						  <?php } ?>
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90402) == 1) { ?>
						  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Share Bonus Issue' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/share/sharebonusissue');?>">Add Bonus Issue</a></li>
						  <?php } ?>
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90403) == 1) { ?>
						  <li><i class="fa fa fa-circle-o"></i><a <?php echo $page_title == 'Share Right Issue' ? 'class="active"' : ''; ?> href="<?php echo base_url('staff/share/sharerightissue');?>">Add Right Issue</a></li>
						  <?php } ?>
					  </ul>
					</li>
					</li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 905) == 1) { ?>
					<li class="menu-item"><a href="<?php echo base_url('staff/share/shareholders');?>" ><i class="menu-icon fa fa-users"></i>Shareholders List</a></li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 906) == 1) { ?>
					<li class="menu-item-has-children dropdown <?php if($page == 'Issue of Share Certificate' ){echo 'show open';}?>">
					  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title =='Issue of Original Share Certificate'||'Issue of Bonus Share Certificate'||'Issue of Right Share Certificate'? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-certificate"></i>Issue of Share Certificates</a>
					  <ul class="sub-menu children dropdown-menu <?php if($page == 'Issue of Share Certificate' ){echo 'show';}?>">
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90601) == 1) { ?>
						  <li><i class="fa fa-circle-o"></i><a href="<?php echo base_url('staff/share/originalsharecertificate');?>">Original Share</a></li>
						  <?php } ?>
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90602) == 1) { ?>
						  <li><i class="fa fa fa-circle-o"></i><a href="<?php echo base_url('staff/share/bonussharecertificate');?>">Bonus Share</a></li>
						  <?php } ?>
						  <?php if(check_staff_permission($_SESSION['profile_type'], 90603) == 1) { ?>
						  <li><i class="fa fa fa-circle-o"></i><a href="<?php echo base_url('staff/share/rightsharecertificate');?>">Right Share</a></li>
						  <?php } ?>
					  </ul>
					</li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 907) == 1) { ?>
					<li class="menu-item"><a href="<?php echo base_url('staff/share/sharetransfer');?>" ><i class="menu-icon fa fa-share-alt"></i>Share Transfer</a></li>
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 908) == 1) { ?>
					<li class="menu-item"><a href="<?php echo base_url('staff/share/sharesurrender');?>" ><i class="menu-icon fa fa-share-alt"></i>Share Surrender</a></li>		
					<?php } ?>
			
					<?php if(check_staff_permission($_SESSION['profile_type'], 909) == 1) { ?>
					<li class="menu-item-has-children dropdown <?php  if($page == 'Member Application' ){echo 'show open';}?>">
						<a href="<?php echo base_url('staff/member');?>" aria-haspopup="true" <?php echo $page_title == 'Member Application List' || 'Member Application Add' || 'Member Application View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-user"></i>Member Management</a>
					</li>
					<?php } ?>
			
					<?php //if(check_staff_permission($_SESSION['profile_type'], 602) == 1) { ?>
					<li class="menu-item"><a href="<?php echo base_url('staff/share/sharedfarmers');?>" ><i class="menu-icon fa fa-share-alt"></i>Existing Share Holder Setup</a></li>				
					<?php //} ?>
				</ul>				             			   