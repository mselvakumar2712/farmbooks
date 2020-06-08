<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="UserDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
<div class="modal-body">
						<input type="hidden" name="userid" value="<?php echo $user_info['id']; ?>" id="userid">
				   <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space  mt-4"> 
                                      <div class="form-group col-md-4">
                                         <label for="">User Type <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" maxlength="50" readonly value="<?php echo $user_info['profile_name']; ?>" id="staff_name" name="staff_name" placeholder="Username" required="required" data-validation-required-message="Please enter username.">
                                      </div>
                                      <div class="form-group col-md-4">
                                          <label for="">Name <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" maxlength="50" readonly value="<?php echo $user_info['staff_name']; ?>" id="staff_name" name="staff_name" placeholder="Username" required="required" data-validation-required-message="Please enter username.">
                                       </div>
                                      <div class="form-group col-md-4">
                                          <label for="">Mobile Number (Username) <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" readonly value="<?php echo $user_info['username']; ?>" pattern="^[6-9]\d{9}$" maxlength="10" id="username" name="username" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
                                      </div>
											 </div>
                                 <div class="row row-space  mt-4"> 
                                    <div class="form-group col-md-4">
                                       <label for="">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" readonly value="<?php echo $user_info['password']; ?>" maxlength="6" minlength="6" id="password" name="password" placeholder="Password" required="required" data-validation-required-message="Please enter password.">
                                    </div>
                                 <div class="form-group col-md-4">
                                   <label class=" form-control-label">Status <span class="text-danger">*</span></label>
                                      <div class="row">
                                          <div class="col-md-6">
                                               <div class="form-check-inline form-check">
                                                   <label for="inline-radio1" class="form-check-label">
                                                     <input type="radio" id="inline-radio1" name="status" value="1" disabled class="form-check-input" <?php echo $user_info['status'] == 1?" checked='checked'":''?>  required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
                                                   </label>
                                               </div> 
                                          </div>
                                       <div class="col-md-6">
                                            <div class="form-check-inline form-check">
                                                <label for="inline-radio2" class="form-check-label">
                                                     <input type="radio" id="inline-radio1" name="status" value="2" disabled class="form-check-input" <?php echo $user_info['status'] != 1?" checked='checked'":''?> required="required" data-validation-required-message="Please select."><span class="ml-1">InActive</span>
                                                </label>
                                             </div>
                                       </div>			
                                      </div>
                                 </div>
                             </div>
										</div>	
									</div>
								</div>
							</div>
					</div>
      </div>
</div>               
<script>
$("#page_reload").click(function(){
 location.reload();
});
$('#UserDetails').on('hidden.bs.modal', function () {
    location.reload();
});
</script>