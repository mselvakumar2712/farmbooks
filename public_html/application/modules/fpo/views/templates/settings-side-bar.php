				<ul class="nav navbar-nav">
					<li class="menu-item-has-children dropdown <?php  if($page == 'GST settings for FPO' ){echo 'show open';}?>">
						<a href="<?php echo base_url('fpo/setting');?>" aria-haspopup="true" <?php echo $page_title == 'List GST' ||'Add GST' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-tag"></i><span class="ml-1">GST</span></a>
					</li>
					<li class="menu-item-has-children dropdown <?php  if($page == 'incorporate_operation' ){echo 'show open';}?>">
						<a href="<?php echo base_url('fpo/operation/incorporatelist');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'List Incorporate' or 'Add Incorporate' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-upload"></i>Incorporation Documents </a>
					</li>
					<!--<li class="menu-item-has-children dropdown <?php  if($page == 'Shares Value' ){echo 'show open';}?>">
				<a href="<?php echo base_url('fpo/setting/sharesvalue');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Shares Value' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-share-alt"></i>Share Value</a>
				</li>-->
					<li class="menu-item-has-children dropdown <?php  if($page == 'Invoice Prefix' ){echo 'show open';}?>">
						<a href="<?php echo base_url('fpo/setting/invoiceprefix');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Invoice Prefix' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fas fa-file-invoice"></i>Invoice Prefix</a>
					</li>
					<li class="menu-item-has-children dropdown <?php  if($page == 'Pricing' ){echo 'show open';}?>">
						<a href="<?php echo base_url('fpo/setting/pricing');?>" aria-haspopup="true" aria-expanded="false" <?php echo $page_title == 'Pricing' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>> <i class="menu-icon fa fa-tag"></i>Pricing</a>
					</li>
					<li class="menu-item-has-children dropdown <?php  if($page == 'Product FPO Mapping' ){echo 'show open';}?>">
				 		<a href="<?php echo base_url('fpo/masterdata/productfpolist');?>" aria-haspopup="true" <?php echo $page_title == 'List Product FPO Mapping' ||'Add Product FPO Mapping' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i
				 			  class="menu-icon fab fa-product-hunt"></i><span class="ml-1">Product</span></a>
				 	</li>
				 	<li class="menu-item-has-children dropdown <?php  if($page == 'Bank Master' ){echo 'show open';}?>">
				 		<a href="<?php echo base_url('fpo/masterdata/banklist');?>" aria-haspopup="true" <?php echo $page_title == 'List Bank Master' ||'Add Bank Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i
				 			  class="menu-icon fa fa-bank"></i><span class="ml-1">Bank</span></a>
				 	</li>
				 	<li class="menu-item-has-children dropdown <?php  if($page == 'Godown Master' ){echo 'show open';}?>">
				 		<a href="<?php echo base_url('fpo/masterdata/godownlist');?>" aria-haspopup="true" <?php echo $page_title == 'List Godown Master' ||'Add Godown Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i
				 			  class="menu-icon fa fa-home"></i><span class="ml-1">Godown</span></a>
				 	</li>
				</ul>
