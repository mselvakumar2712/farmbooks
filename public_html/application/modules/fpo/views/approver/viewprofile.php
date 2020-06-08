<style>
.text-center{
   text-align:left ! important;
}
.text-right{
   font-style:inherit ! important;
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="profileDetails" class="myModal">
  <div class="modal-header">
    <button type="button" id='profileClose' class="close" data-dismiss="modal">&times;</button>
  </div>        
        <div class="modal-body">
		<?php if($state == 1){ ?>
			<div class="row row-space">
				<div class="form-group col-md-6">
					<label for="inputAddress2">PINCODE <span class="text-danger">*</span> </label>
					<input type="text" class="form-control numberOnly this_pin_code" maxlength="6" readonly value="<?php echo $fpg_info->PIN_Code?>"  onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" disabled name="pin_code" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
				</div>
				<div class="form-group col-md-6">
					<label for="inputAddress2">State <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->state_name; ?>" readonly>
				</div>		
			 </div>
			<div class="row row-space">
				<div class="form-group col-md-6">
					<label for="inputAddress2">District <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->district_name; ?>" readonly>
				</div>
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->taluk_name; ?>" readonly>
				</div>	
			</div>						  
			<div class="row row-space">
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Block <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->block_name; ?>" readonly>
				</div>	
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->panchayat_name; ?>" readonly>
				</div>
			</div>
			<div class="row row-space">										 
				<div class="form-group col-md-6">	
					<label for="inputAddress2">Village <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fpg_info->village_name; ?>" readonly>
				</div>		
				<div class="form-group col-md-6">
					<label for="inputAddress2">Name of the Farmer Producer Group <span class="text-danger">*</span> </label>
					<input type="text" class="form-control" id="interest_group" value="<?php echo $fpg_info->FPG_Name?>"  name="interest_group" disabled placeholder="Name of the Farmer Producer Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
				</div>
			 </div>
			<div class="row row-space">
				 <div class="form-group col-md-6">
					  <label class=" form-control-label">Status <span class="text-danger">*</span></label>
					  <div class="row">
						<div class="col-md-6">
						  <div class="form-check-inline form-check">
							<label for="inline-radio1" class="form-check-label">
							<input type="radio" id="inline-radio1" name="status" value="1" <?php echo $fpg_info->status == 1?" checked='checked'":''?> class="form-check-input" disabled required="required" data-validation-required-message="Please select.">Active
							</label>
						  </div> 
						</div>
						<div class="col-md-6">
						  <div class="form-check-inline form-check">
							<label for="inline-radio2" class="form-check-label">
							  <input type="radio" id="inline-radio2" name="status" value="2" <?php echo $fpg_info->status != 1?" checked='checked'":''?> class="form-check-input" disabled required="required" data-validation-required-message="Please select.">Inactive
							</label>
							</div>
						</div>			
					  </div>
				  </div>
			</div>
		<?php } else if($state == 2){ ?>
			<div class="row row-space">
				<div class="form-group col-md-6">
					<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
					<input type="text" class="form-control numberOnly this_pin_code" readonly value="<?php echo $fig_info['PIN_Code']; ?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" name="pin_code" disabled placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
				</div>
				<div class="form-group col-md-6">
					<label for="inputAddress2">State <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fig_info['state_name']; ?>" readonly>
				</div>		
			</div>
			<div class="row row-space">
				<div class="form-group col-md-6">
					<label for="inputAddress2">District <span class="text-danger">*</span></label>
					<input type="text" class="form-control" value="<?php echo $fig_info['district_name']; ?>" readonly>
				</div>
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>					
					<input type="text" class="form-control" value="<?php echo $fig_info['taluk_name']; ?>" readonly>
				</div>				
			</div>						  
			<div class="row row-space">
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Block <span class="text-danger">*</span></label>					
					<input type="text" class="form-control" value="<?php echo $fig_info['block_name']; ?>" readonly>
				</div>	
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>					
					<input type="text" class="form-control" value="<?php echo $fig_info['panchayat_name']; ?>" readonly>
				</div>																	
			</div>
			<div class="row row-space">
				<div class="form-group col-md-6">						    
					<label for="inputAddress2">Village <span class="text-danger">*</span></label>					
					<input type="text" class="form-control" value="<?php echo $fig_info['village_name']; ?>" readonly>
				</div>
				<div class="form-group col-md-6">
					<label for="inputAddress2">Name of the Farmer Interest Group <span class="text-danger">*</span> </label>
					<input type="text" class="form-control" value="<?php echo $fig_info['FIG_Name']; ?>" id="interest_group" name="interest_group" disabled placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
				</div>				  
			 </div>
			<div class="row row-space">
				<div class="form-group col-md-6">
					  <label class=" form-control-label">Status <span class="text-danger">*</span></label>
					  <div class="row">
						<div class="col-md-6">
						  <div class="form-check-inline form-check">
							<label for="inline-radio1" class="form-check-label">
							  <input type="radio" id="inline-radio1" name="status" value="1" <?php echo $fig_info['status'] == 1?" checked='checked'":''?> class="form-check-input"  readonly required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
							</label>
						  </div> 
						</div>
						<div class="col-md-6">
						  <div class="form-check-inline form-check">
							<label for="inline-radio2" class="form-check-label">
							  <input type="radio" id="inline-radio2" name="status" value="2" <?php echo $fig_info['status'] != 1?" checked='checked'":''?> class="form-check-input" readonly required="required" data-validation-required-message="Please select."><span class="ml-1">Inactive</span>							
							</label>
							</div>
						</div>
					  </div>
				  </div>
			 </div>
		<?php } else { ?>
			<div class="row row-space">
				<div class="form-group col-md-4">
					<label for="">FIG Representative</label>
					<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $figrepresent_list[0]->FIG_Name; ?>" readonly>
				</div>
				<div class="form-group col-md-4">
					<label for="inputAddress2">Date of Change</label>
					<input type="date" class="form-control" disabled maxlength="30" id="appointment_date" name="appointment_date" placeholder="Crop Name" required data-validation-required-message="Enter the date of appointment." value="<?php echo $figrepresent_list[0]->appointment_date; ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="inputAddress2">Representative Type </label>
					<select class="form-control" id="representative_type" disabled name="representative_type" required data-validation-required-message="Select the representative type">
						<option value="">Select Representative Type</option>
						<option value="1" <?php if($figrepresent_list[0]->representative_type == 1){?>selected<?php } ?> >President</option>
						<option value="2" <?php if($figrepresent_list[0]->representative_type == 2){?>selected<?php } ?> >Secretary</option>
						<option value="3" <?php if($figrepresent_list[0]->representative_type == 3){?>selected<?php } ?> >Treasurer</option>
						<option value="4" <?php if($figrepresent_list[0]->representative_type == 4){?>selected<?php } ?> >Director</option>										
					</select>
				</div>
			</div>			
			<div class="row row-space mt-3">		
				<div class="form-group col-md-6">
					<label for="inputAddress2">Reason <span class="text-danger">*</span></label>	
					<textarea class="form-control" id="reason" name="reason" readonly value="<?php echo ($figrepresent_list[0]->reason != null)?$figrepresent_list[0]->reason:''; ?>"></textarea>
				</div>
				<div class="form-group col-md-4">
					<label for="inputAddress2">Date of Terminate <span class="text-danger">*</span></label>	
					<input type="date" class="form-control" id="terminate_date" name="terminate_date" readonly title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31" value="<?php echo ($figrepresent_list[0]->terminated_on != null)?$figrepresent_list[0]->terminated_on:''; ?>" >
				</div>
			</div>
		<?php } ?>
		</div>
</div>		
								
<script>
$("#profileClose").click(function(){
  location.reload();
});	
</script>	
	