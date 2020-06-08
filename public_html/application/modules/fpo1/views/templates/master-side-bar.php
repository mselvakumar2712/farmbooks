				 
				 <ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Product FPO Mapping' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/masterdata/productfpolist');?>" aria-haspopup="true" <?php echo $page_title == 'List Product FPO Mapping' ||'Add Product FPO Mapping' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-product-hunt"></i><span class="ml-1">Product</span></a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Bank Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/masterdata/banklist');?>" aria-haspopup="true" <?php echo $page_title == 'List Bank Master' ||'Add Bank Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-bank"></i><span class="ml-1">Bank</span></a>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Godown Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('fpo/masterdata/godownlist');?>" aria-haspopup="true" <?php echo $page_title == 'List Godown Master' ||'Add Godown Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-home"></i><span class="ml-1">Godown</span></a>
                
                  </li>

				  </ul>				             			   