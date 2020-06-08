				 

				 <ul class="nav navbar-nav">
				 <!-- Location-->
				  <li class="menu-item-has-children dropdown <?php  if($page == 'State Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/statelist');?>" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List state Master' ||'Add State Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-globe"></i><span class="ml-1">Location</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'State Master' ){echo 'show';}?>">
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List State Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/statelist');?>">State</a></li>
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List District Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/districtlist');?>">District</a></li>
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List Block Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/blocklist');?>">Block</a></li>
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List Taluk Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/taluklist');?>">Taluk</a></li>
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List Gram Panchayat Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/grampanchayatlist');?>">Gram Panchayat</a></li>
                  <li><i class="fa fa-globe"></i><a   <?php echo $page_title == 'List Village Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/villagelist');?>">Village</a></li>
	              </ul>
                  </li>
               <!-- Product-->
               <li class="menu-item-has-children dropdown <?php  if($page == 'Product Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/productlist');?>" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Product Master' ||'Add Product Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-product-hunt" aria-hidden="true"></i><span class="ml-1">Product</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Product Master' ){echo 'show';}?>">
                     <li><i class="fab fa-product-hunt"></i><a <?php echo $page_title == 'List Stock group' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/stockgrouplist');?>">Stock Groups</a></li>
                     <li><i class="fab fa-product-hunt"></i><a   <?php echo $page_title == 'List Category Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/categorylist');?>">Category</a></li>                    
                     <li><i class="fab fa-product-hunt"></i><a   <?php echo $page_title == 'List SubCategory Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/subcategorylist');?>">Sub Category</a></li>
                     <li><i class="fab fa-product-hunt"></i><a   <?php echo $page_title == 'List Product Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/productlist');?>">Product</a></li>
                     <li><i class="fab fa-product-hunt"></i><a   <?php echo $page_title == 'List Product FPO Mapping' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/productfpolist');?>">FPO Products</a></li>                    
                  </ul>
                  </li>
               <!-- bank--> 
               <li class="menu-item-has-children dropdown <?php  if($page == 'Bank Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/banklist');?>" aria-haspopup="true" <?php echo $page_title == 'List Bank Master' ||'Add Bank Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-bank"></i><span class="ml-1">Bank</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Bank Master' ){echo 'show';}?>">
                     <li><i class="fa fa-bank"></i><a   <?php echo $page_title == 'List Name Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/banknamelist');?>">Name</a></li>
                     <li><i class="fa fa-sitemap"></i><a   <?php echo $page_title == 'List Bank Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/banklist');?>">Branch</a></li>
                  </ul>
               </li>
				  
               <!-- General-->  
               <li class="menu-item-has-children dropdown <?php  if($page == 'UOM Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/uomlist');?>" aria-haspopup="true" <?php echo $page_title == 'List UOM Master' ||'Add UOM Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="fa fa-cog menu-icon" aria-hidden="true"></i><span class="ml-1">General</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'UOM Master' ){echo 'show';}?>">
                  <li><i class="fas fa-balance-scale"></i><a   <?php echo $page_title == 'List UOM Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/uomlist');?>">UOM</a></li>
                  <li><i class="fas fa-cloud-sun"></i><a   <?php echo $page_title == 'List Humidity Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/humiditylist');?>">Humidity</a></li>
                  <li><i class="fas fa-tape"></i><a   <?php echo $page_title == 'List Size Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/sizelist');?>">Size</a></li>
                  <li><i class="fas fa-palette"></i><a   <?php echo $page_title == 'List Colour Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/colourlist');?>">Colour</a></li>
                  <li><i class="fas fa-industry"></i><a   <?php echo $page_title == 'List Nature of Business Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/natureofbusinesslist');?>">Nature of Business</a></li>
                  <li><i class="far fa-snowflake"></i><a <?php echo $page_title == 'List Season Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/seasonlist');?>">Season</a></li>
                  <li><i class="fas fa-industry"></i><a <?php echo $page_title == 'List Post Harvest Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/postharvestlist');?>">Post Harvest</a></li>
				 </ul>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/cropmaster');?>" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Master'||'Add Crop Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-canadian-maple-leaf" aria-hidden="true"></i><span class="ml-1"> Crop Master</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Master' ){echo 'show';}?>">
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Crop Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/cropmaster');?>">Crop </a></li>
                  <li><i class="fas fa-seedling"></i><a   <?php echo $page_title == 'List Crop Standard Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/cropstandard');?>">Crop Standards</a></li>
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Crop Category' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/category');?>">Crop Category </a></li>
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Crop Subcategory Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/subcategory');?>">Crop Sub Category</a></li>
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Crop Name Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/name');?>">Crop Name</a></li>
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Crop Variety Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/variety');?>">Crop Variety</a></li>
                  <li><i class="fas fa-seedling"></i><a <?php echo $page_title == 'List Seed Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/seedlist');?>">Seed</a></li>
				  </ul>
                  </li>
				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Godown Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/godownlist');?>" aria-haspopup="true" <?php echo $page_title == 'List Godown Master' ||'Add Godown Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-home"></i><span class="ml-1">Godown</span></a>
                  </li>
						  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Nutrient Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/nutrientlist');?>" aria-haspopup="true" <?php echo $page_title == 'List Nutrient Master' ||'Add Nutrient Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fab fa-product-hunt"></i><span class="ml-1">Agro Products</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Nutrient Master' ){echo 'show';}?>">
                  <li><i class="fas fa-spray-can"></i><a <?php echo $page_title == 'List Nutrient Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/nutrientlist');?>">Nutrient</a></li>
                  <li><i class="fas fa-spray-can"></i><a <?php echo $page_title == 'List Fertilizer Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>">Fertilizer</a></li>
                  <li><i class="fas fa-spray-can"></i><a <?php echo $page_title == 'List Pesticides Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/pesticideslist');?>">Pesticides</a></li>
				  <li><i class="fab fa-bimobject"></i><a <?php echo $page_title == 'List Brand Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/brandlist');?>">Brands</a></li>
				  <li><i class="fas fa-industry"></i><a <?php echo $page_title == 'List Manufacturer Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/manufacturerlist');?>">Manufacturer</a></li>
                  </ul>
                  </li>
			
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Farm Implements Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>"  aria-haspopup="true" <?php echo $page_title == 'List Farm Implements Master' ||'Add Farm Implements Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa-truck"></i><span class="ml-1">Farm Implements</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farm Implements Master' ){echo 'show';}?>">
                  <li><i class="fa fa-tractor"></i><a <?php echo $page_title == 'List Farm Implements Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>">Implements</a></li>
                  <li><i class="fa fa-tractor"></i><a <?php echo $page_title == 'List Farm Implements Make and Model Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">Make </a></li>
                  <li><i class="fa fa-tractor"></i><a <?php echo $page_title == 'List Farm Implements Make and Model Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>">Make & Model</a></li>
                  </ul>
                  </li>
				  
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Live Stocks Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/livestockslist');?>" aria-haspopup="true" <?php echo $page_title == 'Add Live Stocks Master' ||'List Live Stocks Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-dove" aria-hidden="true"></i><span class="ml-1">Live Stocks</span></a>
                 </li>
                  <li class="menu-item-has-children dropdown <?php  if($page == 'Live Stocks Variety Master' ){echo 'show open';}?>">
                  <a href="<?php echo base_url('administrator/masterdata/livestocksvarietylist');?>" aria-haspopup="true" <?php echo $page_title == 'Add Live Stocks Variety Master' ||'List Live Stocks Variety Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fas fa-dove" aria-hidden="true"></i><span class="ml-1">Live Stocks Variety</span></a>
                  </li>
				 <!-- <li class="menu-item-has-children dropdown <?php  if($page == 'Constitution of Committee of Directors Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Add Constitution of Committee of Directors Master' ||'List Constitution of Committee of Directors Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Constitution of <br>Committee of Directors</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Constitution of Committee of Directors Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Constitution of Committee of Directors Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/committeedirectorslist');?>">List Constitution<br>of Committee of<br>Directors</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Constitution of Committee of Directors Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addcommitteedirectors');?>">Add Constitution <br>of Committee of <br>Directors</a></li>                  
                  </ul>
                  </li>-->
				  </ul>				             			   