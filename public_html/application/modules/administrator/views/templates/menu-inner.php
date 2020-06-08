<!-- Header-->
         <header id="header" class="header">
            <div class="header-menu">               
               <?php if($page_module=='dashboard'){?>
               <div class="col-12 col-sm-1 text-center mobile-center">
                  <img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
               </div>
               <div class="col-12 col-sm-11">
               <?php }else{?>
               <div class="col-sm-2">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
               </div>
               <div class="col-12 col-sm-10">
               <?php }?>
                  <div class="header-left float-right mt-2 text-right">
                     <label class="text-success">                     
                         <a class="text-success text-capitalize" href="#">
                             <?php echo 'Hi, '.$_SESSION['name'];?>
                         </a>
                     </label>
                  </div>
                  <div class="user-area dropdown float-right text-center">
                     <a class="nav-link signout" href="#"><i class="fa fa-power-off text-danger"></i></a>
                  </div>    
                  <!--<div class="user-area dropdown float-right text-center">
                     <a class="nav-link" href="#"><i class="fa fa-cog text-success"></i></a>
                  </div>-->    
                                  
                   
                   <div class="header-left float-right">
                     <div class="dropdown for-notification" >
                        <div class="btn-group" style="right:0;" role="group" aria-label="..." >
                           <div class="btn-group" role="group" style="right:0;">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-user-cog fa-x text-success"></i>
                           </button>
                           <ul class="dropdown-menu"  style="border: 1px solid #a9c33a;"> 
                              <li style="border-bottom: 1px solid #a9c33a;">
                              <a  href="<?php echo base_url('administrator/Administrator/profile');?>">
                              <p class="">Profile</p>
                              </a>
                              </li>
							  <li>
							  <a class="" href="<?php echo base_url('administrator/administrator/changepassword/'.$this->session->userdata('user_id'));?>">
                              <p class="">Change Password</p>
							  </a>
							  </li>
                            
                           </ul>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="header-left float-right">
                     <div class="dropdown for-notification">
                        <div class="btn-group" style="right:0;" role="group" aria-label="...">
                           <div class="btn-group" role="group" style="right:0;">
                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-bell text-success"></i>
                              <span class="count bg-danger">5</span>
                              <span class="caret"></span>
                           </button>
                           <!--<ul class="dropdown-menu ">
                              <li><a class="" href="#">
                              <p class="bg-flat-color-1"> <i class="fa fa-check"></i>Server #1 overloaded.</p>
                              </a></li>
                              <li>
                              <a  href="#">
                              <p class="bg-flat-color-4">   <i class="fa fa-info"></i>Server #2 overloaded.</p>
                              </a>
                              </li>
                           </ul>-->
                           </div>
                        </div>
                     </div>
                  </div>  
                   
                  <div class="dropdown for-notification buttons float-right">
                     <button class="grid-view text-success" type="button" id="notification" data-toggle="" aria-haspopup="true" aria-expanded="false" onclick="gridMenuShow();"><i class="fa fa-th"></i></button>
                     <div id="grid" class="grid">
                        <div class="container-fluid">
                           <div class="row grid-wrepper-row">
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/profile');?>"><img src="<?php echo asset_url()?>img/icons/profile.png" class="img-fluid">
                              <p class="text-center mt-2">Profile </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2 text-center" href="<?php echo base_url('administrator/dashboard/active_module/master_data');?>"><img src="<?php echo asset_url()?>img/icons/master.png" class="img-fluid">
                              <p class="text-center mt-2">Masters </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/user');?>"><img src="<?php echo asset_url()?>img/icons/user.png" class="img-fluid">
                              <p class="text-center mt-2">User </p>
                              </a>
                              </div>
                           
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/role');?>"><img src="<?php echo asset_url()?>img/icons/role.png" class="img-fluid">
                              <p class="text-center mt-2">Role</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/finance');?>"><img src="<?php echo asset_url()?>img/icons/finance.png" class="img-fluid">
                              <p class="text-center mt-2">Finance</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/inventory');?>"><img src="<?php echo asset_url()?>img/icons/f-diary.png" class="img-fluid">
                              <p class="text-center mt-2">Inventory</p>
                              </a>
                              </div>
                           
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/share/fpo_sharelist');?>"><img src="<?php echo asset_url()?>img/icons/share.png" class="img-fluid">
                              <p class="text-center mt-2">Share</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/operation');?>"><img src="<?php echo asset_url()?>img/icons/fpo.png" class="img-fluid">
                              <p class="text-center mt-2">Operation</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/crop');?>"><img src="<?php echo asset_url()?>img/icons/crop.png" class="img-fluid">
                              <p class="text-center mt-2">Crop</p>
                              </a>
                              </div>
                           
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/soil');?>"><img src="<?php echo asset_url()?>img/icons/soil.png" class="img-fluid">
                              <p class="text-center mt-2">Soil</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" target="blank" href="http://easzapps.net/EaszManuERP/"><img src="<?php echo asset_url()?>img/icons/production.png" class="img-fluid">
                              <p class="text-center mt-2">Production</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/market');?>"><img src="<?php echo asset_url()?>img/icons/market.png" class="img-fluid">
                              <p class="text-center mt-2">Market</p>
                              </a>
                              </div>
                           
                              <div class="col-4 text-center">
                              <a class="mt-2" target="blank" href="http://35.197.91.188/EaszERP/"><img src="<?php echo asset_url()?>img/icons/supply-chain.png" class="img-fluid">
                              <p class="text-center mt-2">Supply Chain</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" target="blank" href="http://easzapps.net/EaszBB/"><img src="<?php echo asset_url()?>img/icons/e-commerce.png" class="img-fluid">
                              <p class="text-center mt-2">E-commerce</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/loan');?>"><img src="<?php echo asset_url()?>img/icons/loan.png" class="img-fluid">
                              <p class="text-center mt-2">Loan</p>
                              </a>
                              </div>
                              
                              <div class="col-4 text-center">
                              <a class="mt-2" target="blank" href="http://104.196.222.48/EaszHCM"><img src="<?php echo asset_url()?>img/icons/hr.png" class="img-fluid">
                              <p class="text-center mt-2">HR</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" target="blank" href="http://104.196.222.48/EaszHCM"><img src="<?php echo asset_url()?>img/icons/hiring.png" class="img-fluid">
                              <p class="text-center mt-2">Hiring</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="<?php echo base_url('administrator/dashboard/active_module/tax');?>"><img src="<?php echo asset_url()?>img/icons/tax.png" class="img-fluid">
                              <p class="text-center mt-2">Tax</p>
                              </a>
                              </div>                              
                           </div>
                        </div>
                     </div>
                  </div>					 
               </div>
            </div>         
         </header><!-- /header -->
                   