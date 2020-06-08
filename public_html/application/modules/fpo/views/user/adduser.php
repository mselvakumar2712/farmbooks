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
                        <h1>Add User</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">User Management</a></li>
                            <li><a href="<?php echo base_url('fpo/user');?>">Users</a></li>
                            <li class="active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
             
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/user/post_user')?>"  method="post"  id="" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">User Type <span class="text-danger">*</span></label>
														  <select class="form-control" id="profile_type" name="profile_type" required data-validation-required-message="Select profile type">
															  <option value="">Select Role Type</option>
                                                              <?php for($i=0; $i<count($role_list);$i++) { ?>
                                                              <option value="<?php echo $role_list[$i]->id; ?>"><?php echo $role_list[$i]->profile_name; ?></option>
                                                              <?php } ?>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="staff_name" name="staff_name"  placeholder="Name" required="required" data-validation-required-message="Please enter staff name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Mobile Number (Username) <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="username" name="username" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
														<p id="user_name" class="help-block with-errors text-danger"></p>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Password <span class="text-danger">*</span></label>
														<input type="password" class="form-control" maxlength="6" minlength="6" id="password" name="password" placeholder="Password" required="required" data-validation-required-message="Please enter password.">
														<p class="help-block text-danger"></p>
													  </div>
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
                                <button id="sendMessageButton" value="Save" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<!--<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>-->
											<a href="<?php echo base_url('fpo/user');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
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
console.log(response);         
		  response=response.trim();
		  responseArray=$.parseJSON(response);
			console.log(responseArray);
			if(responseArray.status == 1){
                $("#user_name").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
		      } else {
			     $("#username").val('');
				$("#username").focus();
				$("#user_name").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
              } 
            }
         });            
	 }
	 
}

 
</script>
	 
</body>
</html>