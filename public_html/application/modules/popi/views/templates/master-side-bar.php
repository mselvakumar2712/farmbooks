				  <ul class="nav navbar-nav">
				  <li class="menu-item-has-children dropdown <?php  if($page == 'State Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List state Master' ||'Add State Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">State</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'State Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List State Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/statelist');?>">List State</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add State Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addstate');?>">Add State</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'District Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List District Master' ||'Add District Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">District</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'District Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List District Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/districtlist');?>">List District</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add District Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/adddistrict');?>">Add District</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Block Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Block Master' ||'Add Block Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Block</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Block Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Block Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/blocklist');?>">List Block</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Block Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addblock');?>">Add Block</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Taluk Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Taluk Master' ||'Add Taluk Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Taluk</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Taluk Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Taluk Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/taluklist');?>">List Taluk</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Taluk Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addtaluk');?>">Add Taluk</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Gram Panchayat Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Gram Panchayat Master' ||'Add Gram Panchayat Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Gram Panchayat</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Gram Panchayat Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Gram Panchayat Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/grampanchayatlist');?>">List Gram<br>Panchayat</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Gram Panchayat Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addgrampanchayat');?>">Add Gram <br>Panchayat</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Village Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Village Master' ||'Add Village Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Village</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Village Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Village Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/villagelist');?>">List Village</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Village Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addvillage');?>">Add Village</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Category Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Category Master' ||'Add Category Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Category</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Category Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Category Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/categorylist');?>">List Category</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Category Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addcategory');?>">Add Category</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'SubCategory Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List SubCategory Master' ||'Add SubCategory Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Sub Category</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'SubCategory Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List SubCategory Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/subcategorylist');?>">List Sub Category</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add SubCategory Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addsubcategory');?>">Add Sub Category</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Product Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Product Master' ||'Add Product Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Product</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Product Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Product Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/productlist');?>">List Product</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Product Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addproduct');?>">Add Product</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Product FPO Mapping' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Product FPO Mapping' ||'Add Product FPO Mapping' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Product FPO Mapping</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Product FPO Mapping' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Product FPO Mapping' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/productfpolist');?>">List Product FPO<br> Mapping</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Product FPO Mapping' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addproductfpo');?>">Add Product FPO<br> Mapping</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Bank Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Bank Master' ||'Add Bank Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Bank</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Bank Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Bank Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/banklist');?>">List Bank </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Bank Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addbank');?>">Add Bank </a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'UOM Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List UOM Master' ||'Add UOM Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Unit of Measurement</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'UOM Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List UOM Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/uomlist');?>">List UOM</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add UOM Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/adduom');?>">Add UOM</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Humidity Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Humidity Master' ||'Add Humidity Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Humidity</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Humidity Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Humidity Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/humiditylist');?>">List Humidity</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Humidity Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addhumidity');?>">Add Humidity</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Size Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Size Master' ||'Add Size Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Size</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Size Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Size Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/sizelist');?>">List Size</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Size Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addsize');?>">Add Size</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Colour Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Colour Master' ||'Add Colour Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Colour</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Colour Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Colour Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/colourlist');?>">List Colour</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Colour Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addcolour');?>">Add Colour</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Godown Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Godown Master' ||'Add Godown Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Godown</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Godown Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Godown Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/godownlist');?>">List Godown</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Godown Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addgodown');?>">Add Godown</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Nature of Business Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Nature of Business Master' ||'Add Nature of Business Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Nature of Business</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Nature of Business Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Nature of Business Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/natureofbusinesslist');?>">List <br> Nature of Business</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Nature of Business Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/addnatureofbusiness');?>">Add <br> Nature of Business</a></li>
	              </ul>
                  </li>				 
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Category Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Add Crop Category' ||'List Crop Category' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Crop Category</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Category Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Category' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/category');?>">Crop Category<br> List </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Category' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/category/addcategory');?>">Add Crop<br>Category </a></li>
                  </ul>
                  </li>
				    
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Subcategory Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true"  <?php echo $page_title == 'Add Crop Subcategory Master' ||'List Crop Subcategory Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Crop Sub Category</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Subcategory Master' ){echo 'show';}?>">
                    <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Subcategory Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/subcategory');?>">Crop Sub Category <br>List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Subcategory Master' ? 'class="active"' : ''; ?>  href="<?php echo base_url('administrator/subcategory/addsubcategory');?>">Add Crop Sub <br>Category</a></li>
				  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Name Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Name Master' ||'Add Crop Name Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Crop Name</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Name Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Name Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/name');?>">Crop Name List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Name Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/name/addname');?>">Add Crop Name</a></li>					
				  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Variety Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Variety Master' ||'Add Crop Variety Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Crop Variety</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Variety Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Variety Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/variety');?>">Crop Variety <br>List</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Variety Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/variety/addvariety');?>">Add Crop <br>Variety</a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Master'||'Add Crop Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1"> Crop</span></a>                 
				  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Crop Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/cropmaster');?>">List Crop </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/cropmaster/addcrop');?>">Add Crop</a></li>
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Crop Standard Master' ){echo 'show open';}?>">
                  <a href="#" data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Crop Standard Master' ||'Add Crop Standard Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Crop Standards</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Crop Standard Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a   <?php echo $page_title == 'List Crop Standard Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/cropstandard');?>">Crop Standards <br>List </a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Crop Standard Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/cropstandard/addcropstandard');?>">Add Crop</a></li>
	              </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Seed Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Seed Master' ||'Add Seed Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Seed</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Seed Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Seed Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/seedlist');?>">List Seed</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Seed Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addseed');?>">Add Seed </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Nutrient Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Nutrient Master' ||'Add Nutrient Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Nutrient</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Nutrient Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Nutrient Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/nutrientlist');?>">List Nutrient</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Nutrient Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addnutrient');?>">Add Nutrient </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Fertilizer Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Fertilizer Master' ||'Add Fertilizer Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Fertilizer</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Fertilizer Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Fertilizer Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>">List Fertilizer</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Fertilizer Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addfertilizer');?>">Add Fertilizer </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Pesticides Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Pesticides Master' ||'Add Pesticides Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Pesticides</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Pesticides Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Pesticides Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/pesticideslist');?>">List Pesticides</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Pesticides Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addpesticides');?>">Add Pesticides </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Season Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Season Master' ||'Add Season Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Season</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Season Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Season Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/seasonlist');?>">List Season</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Season Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addseason');?>">Add Season </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Post Harvest Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Post Harvest Master' ||'Add Post Harvest Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Post Harvest</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Post Harvest Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Post Harvest Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/postharvestlist');?>">List Post Harvest</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Post Harvest Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addpostharvest');?>">Add Post Harvest </a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Farm Implements Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Farm Implements Master' ||'Add Farm Implements Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Farm Implements</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farm Implements Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Farm Implements Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>">List Farm <br> Implements</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Farm Implements Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addfarmimplements');?>">Add Farm <br> Implements</a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Farm Implements Make and Model Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'List Farm Implements Make and Model Master' ||'Add Farm Implements Make and Model Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Farm Implements Make <br>and Model </span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Farm Implements Make and Model Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Farm Implements Make and Model Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">List <br> Farm Implements <br>Make and Model</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Farm Implements Make and Model Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addfarmimplementsmake');?>">Add <br> Farm Implements <br>Make and Model</a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Live Stocks Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Add Live Stocks Master' ||'List Live Stocks Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Live Stocks</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Live Stocks Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Live Stocks Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/livestockslist');?>">List Live Stocks</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Live Stocks Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addlivestocks');?>">Add Live Stocks</a></li>                  
                  </ul>
                  </li>
               <li class="menu-item-has-children dropdown <?php  if($page == 'Live Stocks Variety Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Add Live Stocks Variety Master' ||'List Live Stocks Variety Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Live Stocks Variety</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Live Stocks Variety Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Live Stocks Variety Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/livestocksvarietylist');?>">List Live Stocks <br>Variety</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Live Stocks Variety Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addlivestocksvariety');?>">Add Live Stocks <br>Variety</a></li>                  
                  </ul>
                  </li>
				  <li class="menu-item-has-children dropdown <?php  if($page == 'Constitution of Committee of Directors Master' ){echo 'show open';}?>">
                  <a href="#"  data-toggle="dropdown" aria-haspopup="true" <?php echo $page_title == 'Add Constitution of Committee of Directors Master' ||'List Constitution of Committee of Directors Master' ? 'aria-expanded="true"' : 'aria-expanded="false"';?>><i class="menu-icon fa fa fa-sitemap"></i><span class="ml-1">Constitution of <br>Committee of Directors</span></a>
                  <ul class="sub-menu children dropdown-menu <?php  if($page == 'Constitution of Committee of Directors Master' ){echo 'show';}?>">
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'List Constitution of Committee of Directors Master' ? 'class="active"' : ''; ?> href="<?php echo base_url('administrator/masterdata/committeedirectorslist');?>">List Constitution<br>of Committee of<br>Directors</a></li>
                  <li><i class="fa fa-circle-o"></i><a <?php echo $page_title == 'Add Constitution of Committee of Directors Master' ? 'class="active"' : ''; ?>href="<?php echo base_url('administrator/masterdata/addcommitteedirectors');?>">Add Constitution <br>of Committee of <br>Directors</a></li>                  
                  </ul>
                  </li>
				  </ul>				             			   