				  <ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown  <?php  if($page == 'Share List' ){echo 'show open';}?>">
                    <a href="<?php echo base_url('administrator/share/fpo_sharelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'FPO Share List' ? 'class="active"' : ''; ?>><i class="menu-icon fas fa-hand-holding-usd" aria-hidden="true"></i><span class="ml-1">  FPO Shares</span></a>
				  </li>
				  
					 <!--<li class="menu-item-has-children dropdown <?php  if($page == 'Share Application' ){echo 'show open';}?>">
						<a href="<?php echo base_url('administrator/share/fpo_sharelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'FPO Share List' or 'FPO Share Add' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-share-alt"></i>FPO Shares</a>
					</li>-->
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Share Application' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/share');?>" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Share Application Farmer List' ||'Share Application Farmer Add'||'Share Application FPO Add' ||'Share Application FPO View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-file"></i>Share Application</a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Share Application' ){echo 'show';}?>">
                  <li><i class="menu-icon fab fa-pied-piper-alt"></i><a <?php echo $page_title == 'Share Application Farmer List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/share');?>">Farmer</a></li>
				  <li><i class="menu-icon far fa-building"></i><a <?php echo $page_title == 'Share Application FPO List' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/share/fpo_shareapplication_list');?>">FPO</a></li>
                  </ul>
                  </li>
				  <li class="menu-item"><a href="#" ><i class="menu-icon fa fa-download"></i>Generate Application</a></li>
				  <li class="menu-item-has-children dropdown">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fas fa-coins" aria-hidden="true"></i>Allotment of Shares</a>
                  <ul class="sub-menu children dropdown-menu">
                  
				  <li><i class="fas fa-coins"></i><a <?php echo $page_title == 'Share Original Issue' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/share/shareallotment');?>">Add Original Issue</a></li>
				  <li><i class="fas fa-coins"></i><a href="#">Add Bonus Issue</a></li>
				  <li><i class="fas fa-coins"></i><a href="#">Add Right Issue</a></li>
				  </ul>
                  </li>
				  <li class="menu-item"><a href="<?php echo base_url('administrator/share/shareholders');?>"><i class="menu-icon fas fa-user-tie"></i>Shareholders List</a></li>
				  <li class="menu-item-has-children dropdown">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fas fa-award" aria-hidden="true"></i>Issue of Share Certificates</a>
                  <ul class="sub-menu children dropdown-menu">
                  <li><i class="fas fa-award"></i><a href="#">Issue of Original <br>Share Certificate</a></li>
				  <li><i class="fas fa-award"></i><a href="#">Issue Of Bonus <br>Share Certificate </a></li>
				  <li><i class="fas fa-award"></i><a href="#">Issue Of Right <br>Share Certificate </a></li>
				  </ul>
                  </li>
				  <li class="menu-item"><a href="#" ><i class="menu-icon fas fa-arrows-alt-h"></i>Share Transfer</a></li>
				  <li class="menu-item"><a href="#" ><i class="menu-icon fas fa-hand-holding-usd"></i>Share Surrender</a></li>		
                  <li class="menu-item-has-children dropdown <?php  if($page == 'Member Application' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/member');?>" aria-haspopup="true" <?php echo $page_title == 'Member Application List' ||'Member Application Add'||'Member Application View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i>Member Management</a>
                
				  </ul>				             			   