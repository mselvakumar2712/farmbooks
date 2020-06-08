<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$access_right_array = array_column($access_rights, 'module_id');
//if(in_array(301, $access_right_array)) {echo "FOUND";} else {echo "no";}
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
#viewRoleForm .accordion input[type=checkbox] {
	margin: 5px 10px 10px 10px;
	float: right;
}
#viewRoleForm .panel input[type=checkbox] {
    margin: 10px 10px 10px 10px;
}
    
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
  border-radius: 5px;
}

#viewRoleForm .active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

#viewRoleForm .active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>
<body>
<div class="container-fluid pl-0 pr-0">
    <?php $this->load->view('templates/side-bar.php');?>
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php $this->load->view('templates/menu-inner.php');?>
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Role</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('fpo/role');?>">Role Management</a></li>
                            <li class="active">View Role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="#" method="post" id="viewRoleForm" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">
                                        
                                        <div class="row row-space">                
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Role Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="role_name" maxlength="25" minlength="3" name="role_name" placeholder="Role Name" data-validation-required-message="Provide the role name" required value="<?php echo $access_profile[0]->profile_name;?>" disabled>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            
											<div class="form-group col-md-4">
												<!--<label for="inputAddress2">Application Type <span class="text-danger">*</span></label> -->     
                                                <input type="hidden" class="form-control" id="application_type" maxlength="25" minlength="3" value="1" name="application_type" placeholder="Application Type" data-validation-required-message="Provide the role name" required value="<?php echo $access_profile[0]->profile_name;?>" disabled>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div> 
                                            
                                            <div class="form-group col-md-4">
												<label class=" form-control-label">Status <span class="text-danger">*</span></label>
												<div class="row mt-2">
													<div class="col-md-6">
                                                        <div class="form-check-inline form-check">
															<label for="status1" class="form-check-label">
																<input type="radio" id="status1" name="status" value="1" <?php if($access_profile[0]->status == 1) { ?> checked <?php } ?> class="form-check-input" required="required" data-validation-required-message="Please select status." disabled><span class="ml-1">Active</span>
															</label>
														</div> 
												    </div>
													<div class="col-md-6">
													   <div class="form-check-inline form-check">
															<label for="status2" class="form-check-label">
																<input type="radio" id="status2" name="status" value="2" <?php if($access_profile[0]->status == 2) { ?> checked <?php } ?> class="form-check-input" required="required" data-validation-required-message="Please select status." disabled><span class="ml-1">Inactive</span>
															</label>
														</div>
                                                    </div>			
												</div>
												<div class="help-block with-errors text-danger"></div>
								            </div>
                                        </div> 
                                                                                
                                        
                                        <div class="row row-space"> 
											<?php for($i=0;$i<count($module_list);$i++){ ?>
											<div class="form-group col-md-4">
                                                <input type="hidden" id="finance_code" name="<?php echo 'modules['.$i.'][module_value]'; ?>" value="<?php echo $module_list[$i]->code; ?>" >                                                											
                                                <button class=""><?php echo $module_list[$i]->module_name; ?></button>
                                                <?php $submodule = $module_list[$i]->submodule; 
												for($j=0;$j<count($submodule);$j++){ 
												if($submodule[$j]->code != 101 && $submodule[$j]->code != 102){
												?>
												<p class="accordion"><?php echo $submodule[$j]->module_name; ?> <input type="checkbox" class="<?php echo 'submodule_'.$i.'-'.$j; ?>" value="<?php echo $submodule[$j]->code; ?>" name="<?php echo 'modules['.$i.'][submodule]['.$j.'][module_value]'; ?>" id="<?php echo $submodule[$j]->module_name.'_'.$j; ?>" <?php if(in_array($submodule[$j]->code, $access_right_array)) { ?> checked <?php } ?> disabled></p>
												<div class="panel" style="width: 100%;">
													<?php $menus = $submodule[$j]->menus; for($k=0;$k<count($menus);$k++){ ?>
                                                    <div>
                                                        <label class="col-md-10"><?php echo $menus[$k]->module_name; ?></label> 
                                                        <label for="finance_trans_payment" class="finance_trans_payment_label">
                                                            <input type="checkbox" class="<?php echo 'menus_'.$i.'-'.$j; ?>" value="<?php echo $menus[$k]->code; ?>" name="<?php echo 'modules['.$i.'][submodule]['.$j.'][menus]['.$k.'][module_value]'; ?>" <?php if(in_array($menus[$k]->code, $access_right_array)) { ?> checked <?php } ?> disabled>
                                                        </label>
                                                    </div>                                                   
													<?php } ?> 
                                                </div>												
												<?php }} ?> 
											</div>  
											<?php } ?> 
											
										
										
                                        <!-- Button creation for submit -->
										<div class="form-row mt-5">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
								                <a href="<?php echo base_url('fpo/role/editrole/'.$access_profile[0]->id);?>" id="" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit</a>
												<a href="<?php echo base_url('fpo/role');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
											 </div>											 
										</div>                                           
								    </div>
								    </div>
								</div>
				            </div>
				    </div>					
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
        
    </div>
</div>
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<!--<script src="<?php //echo asset_url()?>js/select2.min.js"></script>      -->      
<script>
$("#sendMessageButton").click(function() {
	var role_name=document.getElementById("role_name").value;
	var application_type=document.getElementById("application_type").value;

	if(role_name == ''){
		swal('Sorry','Provide the role name');
		return false;
	} else if(application_type == '') {
        swal('Sorry','Provide the application type');
		return false;    
    }
});
    

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>