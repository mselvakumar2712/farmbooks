<style>
.text-center {
    text-align: left!important; 
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="noticeToDirectors" class="myModal">
	<div class="modal-header">
		<button type="button" id='Close' class="close" data-dismiss="modal">&times;</button>
	</div>        
    <div class="modal-body">						
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row row-space mt-4"> 
							<div class="form-group col-md-3">
								<label for="">Date of Notice <span class="text-danger">*</span></label>
								<input type="date" class="form-control" value="<?php echo $notice_director[0]->notice_date; ?>" readonly id="notice_date" min="<?php echo date("Y-m-d"); ?>" name="notice_date" required="required" data-validation-required-message="Please enter notice date.">								
							</div>
							<div class="form-group col-md-3">
								<label for="">Date of Meetings <span class="text-danger">*</span></label>
								<input type="date" class="form-control" readonly value="<?php echo $notice_director[0]->meeting_date; ?>" max="<?php echo date("Y-m-d",strtotime("+7 days")); ?>" id="meeting_date" name="meeting_date" required="required" data-validation-required-message="Please enter date of meeting.">
							</div>
							<div class="form-group col-md-3">
								<label for="">Time <span class="text-danger">*</span></label>
								<input type="time" class="form-control" readonly id="meeting_time" name="meeting_time" value="<?php echo $notice_director[0]->meeting_time; ?>" required="required" data-validation-required-message="Please enter meeting time.">
							</div>
							<div class="form-group col-md-3">
								<label for="">Place of Meeting <span class="text-danger">*</span></label>
								<input type="text" maxlength="50" readonly class="form-control" placeholder="Place of Meeting" value="<?php echo $notice_director[0]->place_of_meeting; ?>" id="meeting_place" name="meeting_place" required="required" data-validation-required-message="Please enter meeting place.">
							</div>
						</div>
						<div class="row row-space mt-4"> 
							<div class="form-group col-md-4">
								<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
								<input type="text" class="form-control numberOnly this_pin_code" readonly onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE" value="<?php echo $notice_director[0]->pincode; ?>" disabled>
							</div>
							<div class="form-group col-md-4">                                    
								<label for="inputAddress2">State <span class="text-danger">*</span></label>
								<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->state_name; ?>" id="meeting_place" name="meeting_place">
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">District <span class="text-danger">*</span></label>
								<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->district_name; ?>" id="meeting_place" name="meeting_place">
							</div>
						</div>
						<div class="row row-space mt-4"> 
							<div class="form-group col-md-4">
								<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
								<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->taluk_name; ?>" id="meeting_place" name="meeting_place">
							</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Block <span class="text-danger">*</span></label>
							<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->block_name; ?>" id="meeting_place" name="meeting_place">
						</div>
						<div class="form-group col-md-4">						    
							<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
							<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->panchayat_name; ?>" id="meeting_place" name="meeting_place">
						</div>
					</div>
					<div class="row row-space  mt-4"> 	
						<div class="form-group col-md-4">						    
							<label for="inputAddress2">Village <span class="text-danger">*</span></label>
							<input type="text" readonly class="form-control" placeholder="" value="<?php echo $notice_director[0]->village_name; ?>" id="meeting_place" name="meeting_place">
						</div>	
						<div class="form-group col-md-4">
							<label for="inputAddress2">Street</label>
							<input type="text" class="form-control" value="<?php echo $notice_director[0]->address; ?>" id="street" name="street" placeholder="Street" disabled>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Door No</label>
							<input type="text" class="form-control" maxlength="10" value="<?php echo $notice_director[0]->door_no; ?>" id="door_no" name="door_no" placeholder="Door No"disabled>
						</div>
					</div>
					<div class="row row-space  mt-4"> 
						<div class="form-group col-md-6">
							<label for="inputAddress2">Agenda <span class="text-danger">*</span></label>
							<textarea class="form-control" readonly id="agenda" name="agenda" value="" ><?php echo $notice_director[0]->agenda; ?></textarea>
						</div>
						<div class="form-group col-md-6">
							<label for="inputAddress2">Reason for Short Notice <span class="text-danger">*</span></label>
							<textarea class="form-control" disabled id="reason_notice" name="reason_notice" value=""><?php echo $notice_director[0]->short_notice_reason; ?></textarea>
						</div>
					</div>
					</div>										
					
				</div>
			</div>
		</div>
	</div>
</div>	
<script>
$("#Close").click(function(){
  location.reload();
});	
</script>
