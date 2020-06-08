<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>Edit User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">User Management</a></li>
                            <li><a href="<?php echo base_url('fpo/user/userlist');?>">Users</a></li>
                            <li class="active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/user/updateuser/' .$user_info['id'])?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >                   
						<input type="hidden" name="userid" value="<?php echo $user_info['id']?>" id="userid">
				   <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												   <div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">User Type <span class="text-danger">*</span></label>
														 <select class="form-control" id="profile_type" name="profile_type" required data-validation-required-message="Select User type">
															  <option value="">Select Role Type</option>
                                                              <?php for($i=0; $i<count($role_list);$i++) { ?>
                                                              <option value="<?php echo $role_list[$i]->id; ?>" <?php if($role_list[$i]->id == $user_info['profile_type']){ ?> selected <?php } ?> ><?php echo $role_list[$i]->profile_name; ?></option>
                                                              <?php } ?>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" value="<?php echo $user_info['staff_name'];?>" id="staff_name" name="staff_name" placeholder="Username" required="required" data-validation-required-message="Please enter username.">
														<div class="help-block with-errors text-danger"></div>
													   </div>
													 <div class="form-group col-md-4">
														<label for="">Mobile Number (Username) <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" readonly value="<?php echo $user_info['username'];?>" id="username" name="username" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
														<div id="mbl_validate" class="help-block with-errors text-danger"></div>
													</div>
												   </div>
												 <div class="row row-space  mt-4"> 
													 <div class="form-group col-md-4">
														<label for="">Password <span class="text-danger">*</span></label>
														<input type="password" class="form-control" maxlength="6" minlength="6" value="<?php echo $user_info['password'];?>" id="password" name="password" placeholder="Password" required="required" data-validation-required-message="Please enter password.">
														<p class="help-block text-danger"></p>
													</div>
												   <div class="form-group col-md-4">
												  <label class=" form-control-label">Status <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="inline-radio1" name="status" <?php echo $user_info['status'] == 1?" checked='checked'":''?>  value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
														  <p class="help-block text-danger"></p>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="inline-radio2" name="status" value="2" <?php echo $user_info['status'] != 1?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Inactive</span>
														  <p class="help-block text-danger"></p>
														</label>
														</div>
													</div>			
												  </div>
											  </div>
											  </div>
												   
												   
										</div>										
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
											<!--<a href="#" id="" class="del btn btn-danger">Delete</a>-->
											<a href="<?php echo base_url('fpo/user');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
											</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>
					
</div><!-- .animated -->
        </div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
function verifyMobileNumber(mobilenumber) {
	 if(mobilenumber.length == 10 && (mobilenumber.charAt(0) == 6 || mobilenumber.charAt(0) == 7 || mobilenumber.charAt(0) == 8 || mobilenumber.charAt(0) == 9)) {
		 $.ajax({
		url:"<?php echo base_url();?>fpo/User/checkusername/"+mobilenumber,
		type:"GET",
		data:"",
		dataType:"html",
				cache:false,      
		success:function(response) {                
		  response=response.trim();
		  responseArray=$.parseJSON(response);
					 console.log(responseArray);mbl_validate
					 if(responseArray.status == 1){
						  $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
		  } else {
			           $("#mobile_num").val('');
						  $("#mobile_num").focus();
						  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
					 } 
				}
			});            
	 }
	 
}

 
</script>
	 
</body>
</html>