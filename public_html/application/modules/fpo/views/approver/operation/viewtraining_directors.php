<?php 
$directory = 'assets/uploads/training_director/training_'.$director[0]->id.'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");

$activeDirectors = explode(',', $director[0]->attended_director);
$program_speakers = explode(',', $director[0]->program_speaker);
?>
<style>
.text-right{
   font-style:inherit ! important;
}
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: red;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

#remove_0 {
	display: none;
}
.text-center {
    text-align: left!important; 
}
</style>
      

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="trainingToDirectors" class="myModal">
	<div class="modal-header">
		<button type="button" id='Close' class="close" data-dismiss="modal">&times;</button>
	</div>        
    <div class="modal-body">						
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row row-space"> 
							<div class="form-group col-md-4">
								<label for="">Date of Training <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="date_of_training" name="date_of_training" value="<?php echo $director[0]->training_date; ?>" readonly required="required" data-validation-required-message="Please select date of training">
							</div>
							<div class="form-group col-md-8">
								<label for="">Directors Attended <span class="text-danger">*</span></label>
								<div class="row">
								<?php foreach($directors as $directors){ ?>														
									<div class="form-group col-md-3">
										<label for="director_<?php echo $directors->id; ?>" style="text-transform: capitalize;"><?php echo $directors->name; ?></label>
										<input type="checkbox" id="director_<?php echo $directors->id; ?>" name="directors_attended[]" value="<?php echo $directors->id; ?>" class="ml-2" <?php if(in_array($directors->id, $activeDirectors)){?> checked <?php } ?> disabled>                        
									</div>
								<?php } ?>
								</div>
							</div>
						</div>
						<div class="row row-space">
							<div class="form-group col-md-6">
								<div class="table-responsive">  
									<table class="table table-bordered" id="dynamic_field">
									<thead>
										<tr>
											<th class="text-center">Program Speaker <span class="text-danger">*</span></th>	
										</tr>
									</thead>
									<tbody>
									<?php foreach($program_speakers as $program_speaker): ?>
									<tr>  
										<td width="50%">													
										<input type="text" class="form-control" maxlength="50" value="<?php echo $program_speaker; ?>" id="program_speakers0" name="program_speakers[]" placeholder="Program Speaker" readonly>
										</td>
									</tr>
									<?php endforeach; ?>																
									</tbody>
									</table>  
								</div>
							</div>
							<div class="form-group col-md-3 mt-4">
								<label for="inputAddress2">Cost Involved</label>
								<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($director[0]->cost_involved==1)?'checked':''; ?> disabled>
							</div> 
							<div class="form-group col-md-3" id="costHolder">
								<label for="inputAddress2">Total Cost ( <span class="fa fa-inr"></span> )<span class="text-danger">*</span></label>
								<input type="text" id="involved_cost_value" name="involved_cost_value" value="<?php echo $director[0]->involved_cost; ?>" class="form-control numberOnly ml-2 text-right" readonly placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost">												
							</div> 
						</div>
					
						<div class="row row-space">
							<div class="form-group col-md-12">
								<label for="">Program Photo </label>
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


var cost_involved = "<?php echo $director[0]->cost_involved; ?>";
costHolder(cost_involved);
function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}
	
</script>	 
