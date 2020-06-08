<!-- Header-->
         <header id="header" class="header">
            <div class="header-menu">               
               <?php if($page_module=='dashboard'){?>
               <div class="col-12 col-sm-1 text-center mobile-center">
                  <img class="img-fluid" src="<?php echo asset_url(); ?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
               </div>
               <div class="col-12 col-sm-11">
               <?php }else if($page_module =='fpo-profile'){?>
               <div class="col-12 col-sm-1 text-center mobile-center">
                  <img class="img-fluid" src="<?php echo asset_url(); ?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
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
                              <?php //echo 'Hi, '.character_limiter($_SESSION['name'], 12);?>
                              <?php 
                                 $loggername = word_limiter($_SESSION['name'],2);
                                 echo 'Hi, '.character_limiter($loggername, 10);
                              ?>
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
                              <i class="fa fa-user-circle-o fa-x text-success"></i>
                           </button>
                           <ul class="dropdown-menu"  style="border: 1px solid #a9c33a;"> 
                              <li style="border-bottom: 1px solid #a9c33a;">
								  <a  href="<?php echo base_url('staff/profile/'.$_SESSION['logger_id']);?>">
								  <p class="">Profile</p>
								  </a>
                              </li>
							  <li>
								  <a class="" href="<?php echo base_url('staff/changepassword/'.$this->session->userdata('logger_id'));?>">
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
							<?php 
								$CI = get_instance();
								$roleMainModule = $CI->Role_Model->getModuleByRights(1, $this->session->userdata('profile_type'));
								for($i=0;$i<count($roleMainModule);$i++){
							?>
                              <div class="col-4 text-center">
                                 <a class="mt-2" href="<?php echo base_url('staff/dashboard/active_module/'.$roleMainModule[$i]->module_name);?>"><img src="<?php echo asset_url(); ?>img/icons/profile.png" class="img-fluid">
                                 <p class="text-center mt-2"><?php echo $roleMainModule[$i]->module_name; ?></p>
                                 </a>
                              </div>
							<?php } ?>							                            
                           </div>
                        </div>
                     </div>
                  </div>
                     <div class="header-left float-right">
                        <label class="btn btn-default">
                             <input class="form-control text-uppercase" id="module_code" name="module_code" placeholder="Quick Link">                            
                        </label>
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

/* $("#searchSubmit").click(function(){
    var panchayatCode = $('#search_panchayat').val();
    var villageCode = $('#search_village').val();
    var mobile_number = $('#mobile_num').val();
    loadFarmers(panchayatCode, villageCode, mobile_number);
});  */


function loadFarmers(module_code) {
    if(module_code != "") {
        var formedCode = {'module_code':module_code};    
        $.ajax({
				url:"<?php echo base_url();?>fpo/dashboard/searchByModule",
				type:"POST",
            data:formedCode,
				dataType:"html",
				cache:false,			
				success:function(response){		  
               //console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               if(responseArray.status == 1){
               var search_list = "";
               var count=1;
                   if(responseArray.search_list.length != 0) {                      
                      console.log(responseArray.search_list.length);                                       
                   } else {
                   }                 	
               }
				},
				error:function(){
				} 
			});                    
    } else {
        swal("Sorry", "Provide any field");
    }
}
</script>             