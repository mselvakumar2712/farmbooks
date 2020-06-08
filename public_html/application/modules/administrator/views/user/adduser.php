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
                            <li><a href="<?php echo base_url('administrator/user');?>">Users</a></li>
                            <li class="active">Add User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('administrator/user/post_user')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4">  
													 <div class="form-group col-md-4">
														<label for="inputAddress2">Select POPI <span class="text-danger">*</span></label>
															<select class="form-control" id="popi_list" name="popi_name" required data-validation-required-message="Select any POPI">
																<option value="">Select POPI</option>
															</select>
														<div class="help-block with-errors text-danger mt-3"></div>
														</div>
													  <div class="form-group col-md-4">
														  <label for="">Select FPO <span class="text-danger">*</span></label>
														  <select class="form-control" id="fpo_list" name="fpo_name" required data-validation-required-message="Select any FPO">
															  <option value="">Select FPO</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">User Type <span class="text-danger">*</span></label>
														  <select class="form-control" id="profile_type" name="profile_type" required data-validation-required-message="Select User type">
															  <option value="">Select User Type</option>
                                                              <?php for($i=0; $i<count($role_list);$i++) { ?>
                                                              <option value="<?php echo $role_list[$i]->id; ?>"><?php echo $role_list[$i]->profile_name; ?></option>
                                                              <?php } ?>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
													<label for="">Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlength="50" id="staff_name" name="staff_name"  placeholder="Name" required="required" data-validation-required-message="Please enter username.">
													<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
													<label for="">Mobile Number (Username) <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="username" name="username" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
													<div id="mbl_validate" class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
													<label for="">Password <span class="text-danger">*</span></label>
												    <input type="password" class="form-control" maxlength="6" minlength="6" id="password" name="password" placeholder="Password" required="required" data-validation-required-message="Please enter password.">
													<p class="help-block text-danger"></p>
													</div>
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('administrator/user');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
$(document).ready(function() {
	$.ajax({
		url: "<?php echo base_url();?>administrator/popi/popiDropDownList",
		type: "GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response){
		response=response.trim();
		responseArray=$.parseJSON(response);
		 if(responseArray.status == 1){
			var popilist = '<option value="">Select POPI</option>';
			$.each(responseArray.popi_list,function(key,value){
			 popilist += '<option value='+value.id+'>'+value.institution_name+'</option>';
			});
			$('#popi_list').html(popilist);
			} 
		},
		error:function(){

		$('#example').DataTable();
		} 
		});
}); 

$('#popi_list').change(function(){
	 var get_fpo = $("#popi_list").val();
	  getFpo( get_fpo );
 });

$('#fpo_list').change(function(){
	 var get_fpo = $("#fpo_list").val();
 });
 
//fpo_list 
function getFpo( popi_id  ) {
	 $("#fpo_list option").remove() ;
	if( popi_id !='')
	{   
		 $.ajax({
			url:"<?php echo base_url();?>administrator/fig/fponame/"+popi_id,
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
				if (Object.keys(responseArray).length > 0) {
				$("#fpo_list").append($('<option></option>').val(0).html('Select FPO'));
				}
				$.each(responseArray.fponame_list,function(key,value){
				$("#fpo_list").append($('<option></option>').val(value.id).html(value.producer_organisation_name));
				});
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	}
	else
	{
	alert('Please provide mandatory field');
	} 
}

function verifyMobileNumber(mobilenumber) {
	 if(mobilenumber.length == 10 && (mobilenumber.charAt(0) == 6 || mobilenumber.charAt(0) == 7 || mobilenumber.charAt(0) == 8 || mobilenumber.charAt(0) == 9)) {
		 $.ajax({
		url:"<?php echo base_url();?>administrator/User/checkusername/"+mobilenumber,
		type:"GET",
		data:"",
		dataType:"html",
				cache:false,      
		success:function(response) {                
		  response=response.trim();
		  responseArray=$.parseJSON(response);
					 console.log(responseArray);
					 if(responseArray.status == 1){
						  $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
		  } else {
			           $("#username").val('');
						  $("#username").focus();
						  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
					 } 
				}
			});            
	 }
	 
}

 
</script>
	 
</body>
</html>