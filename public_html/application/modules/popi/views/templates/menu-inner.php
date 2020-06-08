<!-- Header-->
         <header id="header" class="header">
            <div class="header-menu">               
               <?php if($page_module=='dashboard'){?>
               <div class="col-12 col-sm-1 text-center mobile-center">
                  <img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
               </div>
               <div class="col-12 col-sm-11">
               <?php }else if($page_module=='popiprofile'){?>
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
							   <a href="<?php echo base_url('popi/popi/profile/'.$_SESSION['user_id']);?>"> <p class="">Profile</p>
                              </a>
                              </li>
							  <li>
							  <a class="" href="<?php echo base_url('popi/popi/changepassword/'.$this->session->userdata('user_id'));?>">
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
                              <a class="mt-2" href="<?php echo base_url('popi/dashboard/active_module/profile');?>"><img src="<?php echo asset_url()?>img/icons/profile.png" class="img-fluid">
                              <p class="text-center mt-2">Profile </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2 text-center" href="#"><img src="<?php echo asset_url()?>img/icons/master.png" class="img-fluid">
                              <p class="text-center mt-2">Masters </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/user.png" class="img-fluid">
                              <p class="text-center mt-2">User </p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/finance.png" class="img-fluid">
                              <p class="text-center mt-2">Finance</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/f-diary.png" class="img-fluid">
                              <p class="text-center mt-2">Inventory</p>
                              </a>
                              </div>
                           
                              <div class="col-4 text-center">
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/share.png" class="img-fluid">
                              <p class="text-center mt-2">Share</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/fpo.png" class="img-fluid">
                              <p class="text-center mt-2">Operation</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/crop.png" class="img-fluid">
                              <p class="text-center mt-2">Crop</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/market.png" class="img-fluid">
                              <p class="text-center mt-2">Market</p>
                              </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
					 
               </div>
            </div>         
         </header><!-- /header -->
<script>
var menuClick = 0;
function gridMenuShow() {
    if(menuClick == 0) {
        document.getElementById("grid").style.display = "block";
        menuClick = 1;   
    } else {
       document.getElementById("grid").style.display = "none";
        menuClick = 0;
    }
    
}
</script>             