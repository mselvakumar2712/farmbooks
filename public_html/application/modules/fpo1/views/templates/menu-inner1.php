<style>

button {  
  font-size: 24px;
  text-align: center;
  line-height: 1.4;
  border-radius: 4px;
  border: none;
  outline: none;
  background-color: white;
 }

button:hover {
  cursor: pointer;
  box-shadow: 0px 0px 3px #666;
}

button.on {
  color: white;
  background-color: #ccc;
}

span.price {
  color: orange;
}

.list {
  .item {
    width: 100%;
    margin: 0 auto 20px;
  }
  
  img {
    max-width: 30%;
  }
  
  .details {
    float: left;
    max-width: 66%;
    margin-top: 4%;
    margin-left: 1%;
  }
}

.grid {
  .item {
    width: 32%;
    margin: 0 2% 20px 0;
    float: left;
    text-align: center;
  }
  
  .item:nth-child(3n) {
    margin-right: 0;
  }
  
  img {
    padding-top: 0;
    max-width: 90%;
    margin: 0 auto;
    float: none;
  }
 
  
  .details {
    float: none;
    max-width: 90%;
    margin: -20px auto 0;

  } 
 
}

.panel {
    
    width:33%;
	margin-left:25px;

}

.grid {
    position: absolute;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 420px ! important;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #a9c33a;
    border-radius: .25rem;
}

.dropdown, .dropleft, .dropright, .dropup {
   position: relative;
   /* width:90px;
   margin-right: 9px ! important; */
}
.bordered{
   border-bottom:1px solid #a9c33a;
}
.for-notification a:hover, .for-notification a:focus {
    text-decoration: none;
    color: #a9c33a;
}
</style>

<!-- Header-->
         <header id="header" class="header">
            
            <div class="header-menu">
               <?php if($page_module=='dashboard'){?>
               <div class="col-sm-2 bg-success text-center">           
                  <img class="img-fluid" src="<?php echo asset_url()?>img/fpo-logo.png" style="margin:auto; max-height:45px;" alt="FPO">
               </div>
               <div class="col-sm-10">
               <?php }else{?>
               <div class="col-sm-12">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
               <?php }?>
                  <div class="user-area dropdown float-right">
                     <a class="nav-link" href="<?php echo base_url('administrator/login/signout');?>"><i class="fa fa-power-off text-success"></i></a>
                  </div>
                  <div class="header-left float-right">
                     <div class="dropdown for-notification">
                        <div class="btn-group" role="group" aria-label="...">
                           <div class="btn-group" role="group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <i class="fa fa-bell text-success"></i>
                                 <span class="count bg-danger">5</span>
                              </button>                              
                           </div>
                        </div>
                     </div>
                  </div> 

                  <div class="dropdown for-notification buttons">
                     <button class="grid-view  text-success " type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th"></i></button>
                     <div class="dropdown-menu grid">
                        <div class="container-fluid">
                           <div class="row bordered mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/profile');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-user-circle-o fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Profile </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3 text-center" href="<?php echo base_url('administrator/dashboard/active_module/master_data');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-sitemap fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Master Data </p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/user');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-user-circle-o fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">User </p>
                              </a>
                              </div>
                           </div>
                           <div class="row bordered mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/role');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-users fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Role</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/finance');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-dollar fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Finance</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/inventory');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-tasks fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Inventory</p>
                              </a>
                              </div>
                           </div>
                           <div class="row bordered mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/share');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-handshake-o fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Share</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/operation');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-spinner fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Operation</p>
                              </a>
                              </div>
                              <div class="col-4 text-center" >
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/crop');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-pagelines fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Crop</p>
                              </a>
                              </div>
                           </div>
                           <div class="row bordered mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/soil');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-tree fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Soil</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/production');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-cogs fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Production</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/market');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-map-marker fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Market</p>
                              </a>
                              </div>
                           </div>
                           <div class="row bordered mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/supply_chain');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-chain  fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Supply Chain</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/ecommerce');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-shopping-cart  fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Ecommerce</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/loan');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-bank fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Loan</p>
                              </a>
                              </div>
                           </div>							
                           <div class="row mt-2">
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/hr');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-black-tie fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">HR</p>
                              </a>
                              </div>
                              <div class="col-4 text-center">
                              <a class="mt-3" href="<?php echo base_url('administrator/dashboard/active_module/hiring');?>" style="width: 100%; margin: 0; float: none; text-align:center"><i class="fa fa-envelope-open-o fa-3x " aria-hidden="true"></i>
                              <p class="text-center mt-2">Hiring</p>
                              </a>
                              </div>
                              <div class="col-4 text-center mt-2">&nbsp;</div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         
         </header><!-- /header -->