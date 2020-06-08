<?php 
$directory = 'assets/uploads/training_CEO/training_'.$ceo[0]->id.'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
?>
<style>
.text-right{
   font-style: inherit !important;
}
.text-center {
    text-align: left!important; 
}
</style>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainingToCEO" class="myModal">
	<div class="modal-header">
		<button type="button" id='Close' class="close" data-dismiss="modal">&times;</button>
	</div>        
    <div class="modal-body">						
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">									
					<div class="container-fluid">
						<div class="row row-space mt-4"> 
							<div class="form-group col-md-4">
								<label for="">Name of the CEO <span class="text-danger">*</span></label>
								<input type="text" class="form-control" disabled id="ceo_name" name="ceo_name" required="required" data-validation-required-message="Please enter name of the ceo" value="<?php echo $ceo[0]->ceo_name; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="">Date of Commencement of Training <span class="text-danger">*</span></label>
								<input type="date" id="date_training" disabled name="date_training" class="form-control" required="required" data-validation-required-message="Please select date of commencement of training" value="<?php echo $ceo[0]->training_start_date; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="">Date of Completion of Training <span class="text-danger">*</span></label>
								<input type="date" id="date_completeion" disabled name="date_completeion" class="form-control" required="required" data-validation-required-message="Please select date of completion of training" value="<?php echo $ceo[0]->training_end_date; ?>">
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-4">
								<label for="">No. of Days of Training <span class="text-danger">*</span></label>
								<input type="text" id="total_days" disabled name="total_days" class="form-control" required="required" data-validation-required-message="Please enter number of days" value="<?php echo $ceo[0]->no_of_days; ?>">					
							</div>
							<div class="form-group col-md-4">
								<label for="">Trainer Name <span class="text-danger">*</span></label>
								<input type="text" id="trainer_name" disabled maxlength="50" name="trainer_name" class="form-control" required="required" data-validation-required-message="Please enter trainer name" value="<?php echo $ceo[0]->trainer_name; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="">Training Institute’s Name </label>
								<input type="text" id="institutes_name" disabled maxlength="75" name="institutes_name" class="form-control" required="required" value="<?php echo $ceo[0]->institute_name; ?>">					
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-4">
								<label for="">Date of Exposure Visit</label>
								<input type="date" id="exposure_date" disabled name="exposure_date" class="form-control" value="<?php echo $ceo[0]->exposure_date; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="">Place of Visit </label>
								<input type="text" id="place_visit" disabled maxlength="50" name="place_visit" class="form-control" value="<?php echo $ceo[0]->place_to_visit; ?>">
							</div>	
							<div class="form-group col-md-4 mt-4">
								<label for="inputAddress2">Cost Involved</label>
								<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($ceo[0]->cost_involved==1)?'checked':''; ?> disabled>
							</div>
						</div>						
						<div class="row row-space">
							<div class="form-group col-md-8">
								<label for="">Program Photo </label>
								<div class="">
								<?php 
									if($uploadedImages){
										for($i=0;$i<count($uploadedImages);$i++){?>
										<div class="col-md-3">
											<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
										</div>
								<?php }} ?>
								</div>
							</div>
							<div class="form-group col-md-4" id="costHolder">
								<label for="inputAddress2">Total Cost ( <span class="fa fa-inr"></span> )<span class="text-danger">*</span></label>
								<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2 text-right" placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost" value="<?php echo $ceo[0]->involved_cost; ?>" disabled>	
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

var cost_involved = "<?php echo $ceo[0]->cost_involved; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}
</script>	 