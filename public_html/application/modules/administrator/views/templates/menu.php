<!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
         <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img class="img-fluid" src="<?php echo asset_url()?>img/logo-placer.png" alt="FPO"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav  ml-auto">
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/dashboard')?>">
                     <i class="fas fa-home"></i>
                     </a>
                  </li>
						 <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/partners')?>">
                    Partners
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/EDM')?>">
                     EDM
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/reports')?>">
                     Reports
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/sales')?>">Sales</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/payout')?>">Pay-Out</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link js-scroll-trigger" href="<?php echo base_url('admin/promotions')?>">
                     Promotions
                     </a>
                  </li>
                  <li class="nav-item dropdown" >
                     <a class="nav-link"  href="#products-menu"><i class="fas fa-bell mt-1"></i><span class="badge"><?php echo ($this->session->userdata('bankinfo_count') + $this->session->userdata('partners_count')+$this->session->userdata('invinfo_count'));?></span></a>
                     <ul id="products-menu" class="dropdown-menu clearfix" role="menu" style="width:200px;">
                        <li class="dropdown-item"><a class="ml-3" href="<?php echo base_url('admin/partners')?>">Bank Information<sup><span class="badge"><?php echo $this->session->userdata('bankinfo_count');?></span></sup></a></li>
                        <li class="dropdown-item"><a class="ml-3" href="<?php echo base_url('admin/partners')?>">Partner Registration<sup><span class=" badge"><?php echo $this->session->userdata('partners_count');?></span></sup></a></li>
                        <li class="dropdown-item"><a class="ml-3" href="<?php echo base_url('admin/partners')?>">Invoice Uploads<sup><span class=" badge"><?php echo $this->session->userdata('invinfo_count');?></span></sup></a></li>
                     </ul>
                     
                  </li>
				   <li class="nav-item dropdown" >
                     <a class="nav-link"  href="<?php echo base_url('admin/partners/partner_queries')?>"><i class="fas fa-envelope mt-1"></i><span class="badge"><?php echo (count($this->session->userdata('partners_queries')));?></span></a>
                    <?php $query=$this->session->userdata('partners_queries');?>
					   <?php if($query){?>
					   <ul id="mail-menu" class="dropdown-menu clearfix"  role="menu" style="width:200px;">
                        	<!--<p class="ml-2">You have received a mails</p>-->
                        
						<?php	foreach($query as $result){?>
							<li class="dropdown-item ml-1"><a class="ml-3 text-capitalize"  href="#"><?php echo $result['partner_name']?></a></li>
                                    <span class="ml-5 text-white"><?php echo $result['message']?></span>
							<?php }?>
						</ul>
                        <?php }?>                     
                  </li>
                  <!--<li class="nav-item dropdown">
                     <a class="nav-link js-scroll-trigger "  href="#portfolio"><i class="fas fa-cog mt-1"></i></a>
                     <ul id="products-menu" class="dropdown-menu clearfix" role="menu">
                        <li><a class="ml-4"href="">Product</a></li>
                        <li><a class="ml-4"href="">Group</a></li>
                        <li><a class="ml-4"href="<?php echo base_url('admin/country')?>">Country</a></li>
                     </ul>
                  </li>-->

                  <li class="nav-item">
                     <a href="<?php echo base_url('admin/login/signout')?>" class=" nav-link js-scroll-trigger ">
                     <i class="fas fa-power-off mt-1"></i>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>