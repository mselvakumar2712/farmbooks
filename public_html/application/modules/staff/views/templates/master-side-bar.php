				<ul class="nav navbar-nav">
					<?php if(check_staff_permission($_SESSION['profile_type'], 210) == 1) { ?>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Product FPO Mapping' ){echo 'show open';}?>">
						<a href="<?php echo base_url('staff/masterdata/productfpolist');?>" aria-haspopup="true" <?php echo $page_title == 'List Product FPO Mapping' ||'Add Product FPO Mapping' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-product-hunt"></i><span class="ml-1">Product</span></a>
						</li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 211) == 1) { ?>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Bank Master' ){echo 'show open';}?>">
						<a href="<?php echo base_url('staff/masterdata/banklist');?>" aria-haspopup="true" <?php echo $page_title == 'List Bank Master' ||'Add Bank Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-bank"></i><span class="ml-1">Bank</span></a>
						</li>
					<?php } ?>
					<?php if(check_staff_permission($_SESSION['profile_type'], 216) == 1) { ?>
						<li class="menu-item-has-children dropdown <?php  if($page == 'Godown Master' ){echo 'show open';}?>">
						<a href="<?php echo base_url('staff/masterdata/godownlist');?>" aria-haspopup="true" <?php echo $page_title == 'List Godown Master' ||'Add Godown Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-home"></i><span class="ml-1">Godown</span></a>					
						</li>
					<?php } ?>
				</ul>				             			   