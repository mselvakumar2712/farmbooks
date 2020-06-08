				  <ul class="nav navbar-nav">
               <li class="menu-item"<?php  if($page == 'Share Settings' ){echo 'show';}?>><a <?php echo $page_title == 'Share Settings' ? 'class="active"' : ''; ?>href="<?php echo base_url('fpo/share/sharesvalue');?>" ><i class="menu-icon fas fa-hand-holding-usd"></i>Share Settings</a></li>				
               <li class="menu-item-has-children dropdown <?php  if($page == 'Share Application' ){echo 'show open';}?>">
               <a href="<?php echo base_url('fpo/share');?>" aria-haspopup="true" <?php echo $page_title == 'Share Application Farmer List' ||'Share Application Farmer Add'||'Share Application FPO Add' ||'Share Application FPO View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-file"></i>Share Application</a>
               <ul class="sub-menu children dropdown-menu <?php  if($page == 'Share Application' ){echo 'show';}?>">
               <li><i class="menu-icon fab fa-pied-piper-alt"></i><a <?php echo $page_title == 'Share Application Farmer List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/share');?>">Farmer</a></li>
               <li><i class="menu-icon far fa-building"></i><a <?php echo $page_title == 'Share Application FPO List' ? 'class="active"' : ''; ?> href="<?php echo base_url('fpo/share/fpo_shareapplication_list');?>">FPO</a></li>
               </ul>
               </li>

				  <li class="menu-item"<?php  if($page == 'Generate Application' ){echo 'show';}?>><a <?php echo $page_title == 'Generate Application' ? 'class="active"' : ''; ?>href="<?php echo base_url('fpo/share/generateshareapplication');?>" ><i class="menu-icon fa fa-download"></i>Generate Application</a></li>				
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Allotment of Share' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Share Original Issue' ||'Share Bonus Issue'||'Share Right Issue' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-coins"></i>Allotment of Shares</a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Allotment of Share' ){echo 'show';}?>">
                  <li><i class="fas fa-coins"></i><a <?php echo $page_title == 'Share Original Issue' ? 'class="active"' : ''; ?>  href="<?php echo base_url('fpo/share/shareallotment');?>">Add Original Issue</a></li>
				  <li><i class="fas fa-coins"></i><a <?php echo $page_title == 'Share Bonus Issue' ? 'class="active"' : ''; ?>  href="<?php echo base_url('fpo/share/sharebonusissue');?>">Add Bonus Issue</a></li>
				  <li><i class="fas fa-coins"></i><a <?php echo $page_title == 'Share Right Issue' ? 'class="active"' : ''; ?>  href="<?php echo base_url('fpo/share/sharerightissue');?>">Add Right Issue</a></li>
				  </ul>
                  </li>
				  <li class="menu-item"><a href="<?php echo base_url('fpo/share/shareholders');?>" ><i class="menu-icon fas fa-user-tie"></i>Shareholders List</a></li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Issue of Share Certificate' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title =='Issue of Original Share Certificate'||'Issue of Bonus Share Certificate'||'Issue of Right Share Certificate'? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-award"></i>Issue of Share Certificates</a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Issue of Share Certificate' ){echo 'show';}?>">
                  <li><i class="fas fa-award"></i><a href="<?php echo base_url('fpo/share/originalsharecertificate');?>">Original Share</a></li>
				  <li><i class="fas fa-award"></i><a href="<?php echo base_url('fpo/share/bonussharecertificate');?>">Bonus Share</a></li>
				  <li><i class="fas fa-award"></i><a href="<?php echo base_url('fpo/share/rightsharecertificate');?>">Right Share</a></li>
				  </ul>
                  </li>
				  <li class="menu-item" ><a href="<?php echo base_url('fpo/share/sharetransfer');?>" ><i class="menu-icon fas fa-arrows-alt-h"></i>Share Transfer</a></li>
				  <li class="menu-item"><a href="<?php echo base_url('fpo/share/sharesurrender');?>" ><i class="menu-icon fas fa-hand-holding-usd"></i>Share Surrender</a></li>		
                  <li class="menu-item-has-children dropdown <?php  if($page == 'Member Application' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/member');?>" aria-haspopup="true" <?php echo $page_title == 'Member Application List' ||'Member Application Add'||'Member Application View' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-user-tie"></i>Member Management</a>
                  </li>
                <li class="menu-item" ><a href="<?php echo base_url('fpo/share/sharedfarmers');?>" ><i class="menu-icon fas fa-user-tie"></i>Existing Shareholder Setup</a></li>				
				  </ul>				             			   