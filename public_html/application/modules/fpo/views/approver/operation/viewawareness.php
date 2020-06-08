<?php 
$directory = 'assets/uploads/awareness/program_'.$awareness[0]->id.'/';
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

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="awarenessProgram" class="myModal">
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
								<label for="">Date of Program <span class="text-danger">*</span></label>
								<input type="date" id="date_training" disabled max="" name="date_visit" value="<?php echo $awareness[0]->program_date; ?>" class="form-control" required="required" data-validation-required-message="Please select date of program ">					
							</div>
							<div class="form-group col-md-4">
								<label for="">Place of Conducting Program </label>
								<input type="text" id="place_program" maxlength="50" value="<?php echo $awareness[0]->conducting_place; ?>" disabled name="place_program" class="form-control" >					
							</div>
							<div class="form-group col-md-4">
								<label for="">No. of Participants </label>
								<input type="text" id="no_participants" name="no_participants" value="<?php echo $awareness[0]->no_of_participants; ?>" disabled maxlength="3" class="form-control numberOnly">					
							</div>																				 
						</div>
						<div class="row row-space mt-4"> 							
							<div class="form-group col-md-4 mt-4">
								<label for="inputAddress2">Cost Involved</label>
								<input type="checkbox" id="involved_cost" name="show_inactive" <?php echo ($awareness[0]->cost_involved==1)?'checked':''; ?> disabled value="1" class="ml-2" >												
							</div> 
							<div class="form-group col-md-4" id="costHolder">
								<label for="">Total Cost ( <span class="fa fa-inr"></span> ) <span class="text-danger">*</span></label>
								<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2 text-right" value="<?php echo $awareness[0]->involved_cost; ?>" placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost" disabled>
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
						<div class="row row-space">
							<div class="form-group col-md-12" id="Village">
								<label for="">Villages <span class="text-danger">*</span></label>
								<table id="example" class="table table-striped table-bordered">
									<tbody id="villagelist"></tbody>
								</table>
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

var villageList_DB = "<?php echo $awareness[0]->villages; ?>";
var villageList_DB_temp = JSON.parse("[" + villageList_DB + "]");

var cost_involved = "<?php echo $awareness[0]->cost_involved; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}

$(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";	
	getFPODetails( fpo_id );	
}); 

function getFPODetails(fpo_id){
    $.ajax({
	   url:"<?php echo base_url();?>fpo/operation/getblockByFpo/"+fpo_id,
	   type:"GET",
	   data:"",
	   dataType:"html",
	   cache:false,			
	   success:function(response) {
		   response=response.trim();
		   responseArray=$.parseJSON(response);
		   var panchayat = responseArray.location_data[0]['panchayat'];
		   getVillageList(panchayat);
	   },
	   error:function(response){
		   alert('Error!!! Try again');
	   } 			
    }); 
}

function getVillageList( panchayat ) {
	$.ajax({
		url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
			//console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);			
			var village = '';		
			var col_count = 0;
			var td_count = 0;
			var village_data = '';			
			var totalCol = responseArray['villageInfo'].length;
			
			$.each(responseArray.villageInfo,function(key, value){				
				col_count++;
				td_count++;
				var isInArray = villageList_DB.includes(value.id);
				if(col_count == 1) {
					village_data += '<tr class="col-md-12">';
					if(isInArray == true) {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required checked data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}					
				} else {
					if(isInArray == true) {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required checked data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}
				}
				if(col_count % 6 ==0) {
					td_count = 0;
					village_data += '</tr>';									
				}
				else if(totalCol == col_count) {
					var diff = 6 - td_count;
						
					village_data += '	<td colspan="'+diff+'"></td>';
					village_data += '</tr>';
				}
				//return false;
			});
			$("#villagelist").append(village_data);					          
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
}
</script>	 