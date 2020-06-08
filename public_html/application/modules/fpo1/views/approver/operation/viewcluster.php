<style>
.text-center {
    text-align: left!important; 
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="clusterIdentify" class="myModal">
	<div class="modal-header">
		<button type="button" id='Close' class="close" data-dismiss="modal">&times;</button>
	</div>        
    <div class="modal-body">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="container-fluid">
						<div class="row row-space mt-4"> 
							<div class="form-group col-md-6">
								<label for="">Date of Identification</label>
								<input type="date" id="date_identification" disabled max="" name="date_identification" value="<?php echo $cluster[0]->identification_date; ?>" class="form-control">					
							</div>
							<div class="form-group col-md-6">
								<label for="">Name of the Cluster <span class="text-danger">*</span></label>
								<input type="text" id="place_program" disabled maxlength="50" name="place_program" required="required" value="<?php echo $cluster[0]->cluster_name; ?>" data-validation-required-message="Please enter cluster name" class="form-control" >					
							</div>
						</div>
						<div class="row row-space">
							<div class="form-group col-md-12" id="block">
								<label for="">Blocks <span class="text-danger">*</span></label>
								<table id="example" class="table table-striped table-bordered">							
									<tbody id="blocklist"></tbody>
								</table>
							</div>
						</div>	
						<div class="row row-space">
							<div class="form-group col-md-4">                            
								<label for="inputAddress2">Villages Covered <span class="text-danger">*</span></label>
								<select id="village" class="form-control sel_village" disabled id="village" name="village[]" required data-validation-required-message="Please select village." multiple>
								<option value="">Select Village</option>
								</select>
							</div>
							<div class="form-group col-md-4">                            
								<label for="inputAddress2">No. of Farmers <span class="text-danger">*</span></label>
								<input type="text" id="place_program" maxlength="50" disabled name="place_program" required="required" value="<?php echo $cluster[0]->no_of_farmers; ?>" data-validation-required-message="Please enter No of farmer " class="form-control" >				
							</div>	
							<div class="form-group col-md-4">                            
								<label for="inputAddress2">Activities </label>
								<select id="activities" class="form-control sel_village" disabled id="activities"  name="activities[]"  data-validation-required-message="Please select village." >
								<option value="">Select Activities</option>
								</select>
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

var blockList_DB = "<?php echo $cluster[0]->blocks; ?>";
var blockList_DB_temp = JSON.parse("[" + blockList_DB + "]");
var villageList_DB = "<?php echo $cluster[0]->villages_covered; ?>";
var villageList_DB_temp = JSON.parse("[" + villageList_DB + "]");
getVillageList( blockList_DB_temp );


$(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id'); ?>";
	getFPODetails(fpo_id);
}); 

function getFPODetails(fpo_id) {
    $.ajax({
	   url:"<?php echo base_url(); ?>fpo/operation/getdistrictByFpo/"+fpo_id,
	   type:"GET",
	   data:"",
	   dataType:"html",
	   cache:false,			
	   success:function(response) {
		   response=response.trim();
		   responseArray=$.parseJSON(response);
		   var pincode = responseArray.location_data[0]['pin_code'];
		   var district = responseArray.location_data[0]['district'];
		   getBlockByDistrict( district );
		   
	   },
	   error:function(response){
		   alert('Error!!! Try again');
	   } 			
   }); 
} 

function getBlockByDistrict(districtCode){
    $.ajax({
		url:"<?php echo base_url(); ?>fpo/Operation/getBlocksByDistrict/"+districtCode,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
			console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response); 
			var block = '';
		console.log(response['blockInfo']);
		var col_count = 0;
		var td_count = 0;
		var block_data = '';
		var totalCol = responseArray['blockInfo'].length;
		
		$.each(responseArray.blockInfo,function(key, value){
			col_count++;
			td_count++;
			var isInArray = blockList_DB.includes(value.block_code);
			if(col_count == 1) {
				block_data += '<tr class="col-md-12">';
				if(isInArray == true) {
					block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled checked required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				} else {
					block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				}
			} else {
				if(isInArray == true) {
					block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled checked required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				} else {
					block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				}
			}
			
			if(col_count % 6 ==0) {
				td_count = 0;
				block_data += '</tr>';
				
			} else if(totalCol == col_count) {
				var diff = 6 - td_count;
					
				block_data += '	<td colspan="'+diff+'"></td>';
				block_data += '</tr>';
			}
			block ='<tr class="row row-space"><td class="col-md-12 text-center"><button type="button" id="save_value" name="save_value" class="btn btn-success btn-fs text-center">Find Villages</button></td></tr>'; 
		});
		 $("#blocklist").append(block_data);
		 $('#blockbutton').html(block);
		 
		block_data += '</div>';
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
}

function getVillageList( block ) {		
	var block_name = {'block':block};
	$.ajax({
		url:"<?php echo base_url(); ?>fpo/operation/getvillagesbyblock",
		type:"Post",
		data:block_name,
		dataType:"html",
		cache:false,			
		success:function(response) {
			console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);                
			var block = '';            
		var village='<option value="">Select Village</option>';			
		var totalCol = responseArray.villageInfo.length;
		$.each(responseArray.villageInfo,function(key, value){
			var isInArray = villageList_DB.includes(value.id);
			if(isInArray == true) {
				village += '<option value='+value.id+' selected>'+value.name+'</option>'; 
			} else {
				village += '<option value='+value.id+'>'+value.name+'</option>'; 
			}
		});
		 $('#village').html(village);
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
}

</script>	 
