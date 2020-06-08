<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="baselineInformation" class="myModal">
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
								<label for="">Date of Baseline Survey <span class="text-danger">*</span></label>
								<input type="date" class="form-control" id="baseline_date" readonly name="baseline_date" value="<?php echo $baseline_info[0]->baseline_date; ?>" required="required" data-validation-required-message="Please enter date.">
							</div>
							<div class="form-group col-md-4">
								<label for="">Name of the Cluster <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly id="cluster_name" name="cluster_name" placeholder="Name of the Cluster" value="<?php echo $baseline_info[0]->cluster; ?>" required="required" data-validation-required-message="Please enter name of the cluster.">
							</div>
							<div class="form-group col-md-4">
								<label for="">No. of Villages Covered <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly id="village_covered" name="village_covered" placeholder="No. of Villages Covered" required="required" data-validation-required-message="Please enter no. of the villages covered.">
							</div>
						</div>
						<div class="row row-space">
							<div class="form-group col-md-2">
								<label for="">No. of Farmers <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly id="farmer_covered" name="farmer_covered"  placeholder="No. of Farmers Covered" required="required" data-validation-required-message="Please enter no. of the farmers covered.">
							</div>
							<div class="form-group col-md-4">
								<label for="">Crop Grown <span class="text-danger">*</span></label>
								<select id="crop_grown" class="form-control" name="crop_grown[]" required="required" data-validation-required-message="Please select village." multiple>
									<option value="">Select Crop Grown</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<div class="table-responsive">  
									<table class="table table-bordered" id="dynamic_field">
										<thead>
											<tr><th class="text-center" colspan="2">Land Holding</th></tr>
											<tr><th class="text-center">Wet land</th><th class="text-center">Dry land</th></tr>
										</thead>
										<tbody>
											<tr> 
												<td><input type="text" class="form-control" readonly id="wet_land" name="wet_land"  placeholder="No. of Wet Land"></td>
												<td><input type="text" class="form-control" readonly id="dry_land" name="dry_land"  placeholder="No. of Dry Land"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row row-space"> 													  
							<div class="form-group col-md-4">
								<label for="">Availability of Water <span class="text-danger">*</span></label>
								<?php if($baseline_info[0]->water_availability == 1){
									$water_availability = 'Satisfactory';
								} else if($baseline_info[0]->water_availability == 2) {
									$water_availability = 'Poor';
								} else {
									$water_availability = 'Very Poor ';
								}?>
								<input type="text" readonly class="form-control" id="water_availability" name="water_availability" value="<?php echo $water_availability; ?>" placeholder="Water Availability">
							</div>
							<div class="form-group col-md-4">
								<label for="">Availability of Market <span class="text-danger">*</span></label>
								<input type="text" class="form-control" maxlength="100" id="market_availability" name="market_availability" readonly placeholder="Availability of Market" value="<?php echo $baseline_info[0]->market_availability; ?>" required="required" data-validation-required-message="Please enter availability of market.">
							</div>												
							<div class="form-group col-md-4">
								<label for="">Proximity to the Market </label>
								<input type="text" readonly class="form-control" id="market_proximity" name="market_proximity" placeholder="Proximity to the Market" value="<?php echo $baseline_info[0]->market_proximity; ?>" required="required" data-validation-required-message="Please enter proximity of market.">
							</div>													   
						</div>							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
var crop_grown_DB = "<?php echo $baseline_info[0]->crop_grown; ?>";

var cluster_name = "<?php echo $baseline_info[0]->cluster_name; ?>";
getClusterInformation(cluster_name);

function getClusterInformation(cluster_id){
	$.ajax({
	   url:"<?php echo base_url(); ?>fpo/operation/getClusterInformation/"+cluster_id,
	   type:"GET",
	   data:"",
	   dataType:"html",
	   cache:false,			
	   success:function(response) {
		   response=response.trim();
		   responseArray=$.parseJSON(response);
		   console.log(responseArray.clusterInfo);
		   var villagesCoveredList = JSON.parse("[" + responseArray.clusterInfo.villages_covered + "]");
		   console.log(villagesCoveredList.length);
		   $("#village_covered").val(villagesCoveredList.length);
		   $("#farmer_covered").val(responseArray.clusterInfo.no_of_farmers);
		   getFarmersLandCount(Array(villagesCoveredList)); 	
	   },
	   error:function(response){
		   alert('Error!!! Try again');
	   } 			
   }); 	
}

function getFarmersLandCount(villagesCoveredList){
	var villagesCovered = {'villagesCovered':villagesCoveredList};
	$.ajax({
		url:"<?php echo base_url(); ?>fpo/operation/getFarmersByVillage",
		type:"Post",
		data:villagesCovered,
		dataType:"html",
		cache:false,			
		success:function(response) {              
			response=response.trim();
			responseArray=$.parseJSON(response);                
			$("#wet_land").val(responseArray.wetland_count);
			$("#dry_land").val(responseArray.dryland_count);
							
			var crop_grown='<option value="">Select Crop Grown</option>';			
			$.each(responseArray.crop_grown,function(key, value){
				var isInArray = crop_grown_DB.includes(value.id);
				if(isInArray == true) {
					crop_grown += '<option value='+value.id+' selected>'+value.crop_name+'</option>'; 
				} else {
					crop_grown += '<option value='+value.id+'>'+value.crop_name+'</option>'; 
				}
			});
			$('#crop_grown').html(crop_grown);
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
}

</script>	 
</body>
</html>