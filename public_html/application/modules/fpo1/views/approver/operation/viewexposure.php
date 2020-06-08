<?php 
$directory = 'assets/uploads/exposure/exposure_visit_'.$exposure[0]->id.'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
?>
<style>
.text-right{
   font-style: inherit ! important;
}
.text-center {
    text-align: left!important; 
}
</style>
 
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="exposureVisit" class="myModal">
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
								<label for="">Date of Visit <span class="text-danger">*</span></label>
								<input type="date" id="date_training" value="<?php echo $exposure[0]->program_date; ?>" name="date_visit" disabled class="form-control" required="required" data-validation-required-message="Please select date of visit ">					
							</div>
							<div class="form-group col-md-4">
								<label for="">Place of Visit </label>
								<input type="text" id="place_visit" value="<?php echo $exposure[0]->conducting_place; ?>" placeholder="Place of Visit" maxlength="50" name="place_visit" disabled class="form-control" >					
							</div>
							<div class="form-group col-md-4">
								<label for="">No. of Participants </label>
								<input type="text" id="no_participants" value="<?php echo $exposure[0]->no_of_participants; ?>" placeholder="No. of Participants" name="no_participants" disabled maxlength="3" class="form-control numberOnly">					
							</div>
						</div>
						<div class="row row-space mt-4">
							<div class="form-group col-md-4">
								<label for="">No. of Villages Covered </label>
								<input type="text" id="no_villages" maxlength="3" value="<?php echo $exposure[0]->no_of_villages; ?>" placeholder="No. of Villages Covered" name="no_villages" disabled class="form-control numberOnly">					
							</div>
							<div class="form-group text-center mt-3 col-md-4">
								<label for="inputAddress2">Cost Involved</label>
								<input type="checkbox" id="cost_involved" <?php echo ($exposure[0]->cost_involved==1)? "checked":""; ?>  disabled name="cost_involved" value="1" class="ml-2" >												
							</div> 
							<div class="form-group col-md-4 mt-4" id="cost_inv_amt">
								<label for="">Total Cost ( <span class="fa fa-inr"></span> )</label>
								<input type="text" id="amount" maxlength="6" name="amount" placeholder="Amount" <?php echo ($exposure[0]->cost_involved==1)? "":"hidden"; ?> disabled value="<?php echo $exposure[0]->amount; ?>" class="form-control numberOnly mt-1 text-right">					
							</div>
						</div>
						<div class="row row-space">
							<div class="form-group col-md-12 ">
								<label for="inputAddress2">Program Photo</label>
								<div class="">
								<?php 
									if($uploadedImages){
										for($i=0;$i<count($uploadedImages);$i++){?>
										<div class="col-md-2">
											<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
										</div>
								<?php }} ?>
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
$("#Close").click(function(){
	location.reload();
});


$('input[name=cost_involved]').on('change', function() {
    var cost_inv = $("input[name='cost_involved']:checked").val();  
    if(cost_inv == 1) {
		$('#cost_inv_amt').show();

    }else{
		$('#cost_inv_amt').hide();
	}
});

</script>	 
</body>
</html>