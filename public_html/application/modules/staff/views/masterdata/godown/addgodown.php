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
                        <h1>Add Godown</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('staff/masterdata/godownlist');?>">Godown</a></li>
                            <li class="active">Add Godown</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('staff/masterdata/post_godown')?>"  method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Name<span class="text-danger">*</span></label>
													<input type="text" class="form-control"  maxlength="50" id="name" name="name" placeholder="Name"  required="required" data-validation-required-message="Please enter name .">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Alias</label>
													<input type="text" class="form-control"  maxlength="50" id="alias" name="alias" placeholder="Alias">
												</div>
												<div class="form-group col-md-4">
												  <label class=" form-control-label">Ownership <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="ownership1" class="form-check-label">
														  <input type="radio" id="ownership1" name="ownership" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."><span class="ml-1">Owned</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="ownership2" class="form-check-label">
														  <input type="radio" id="ownership2" name="ownership" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."><span class="ml-1">Hired</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
											</div>
											<div class="row row-space">												
												<div class="form-group col-md-3">
													<label for="inputAddress2">Type<span class="text-danger">*</span></label>
													<select  class="form-control" id="type" name="type">
													<option value="">Select Type </option>
													<option value="1">Cold Storage</option>
													<option value="2">Normal Godown</option>
													<option value="3">Others</option>
													</select>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Capacity</label>
													<input type="text" class="form-control numberOnly" maxlength="10" id="capacity" name="capacity" placeholder="Capacity" >
												</div>
												<div class="form-group col-md-3" id="capacity_uom">
													<label for="inputAddress2">UOM<span class="text-danger">*</span></label>
													<select  class="form-control" id="uom" name="uom" required="required" data-validation-required-message="Please Select uom.">
													<option value="">Select UOM </option>
													<?php for($i=0; $i<count($uom);$i++) { ?>										
															 <option value="<?php echo $uom[$i]->id; ?>"><?php echo $uom[$i]->short_name; ?></option>
															<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Number of Compartments </label>
													<input type="text" class="form-control numberOnly"  maxlength="3" id="compartments_no" name="compartments_no" placeholder="Number of Compartments ">
												</div>
												<div class="form-group col-md-5">
												  <label class=" form-control-label">Location <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="location1" class="form-check-label">
														  <input type="radio" id="location1" name="location" value="1" class="form-check-input" required data-validation-required-message="Please Check location."><span class="ml-1">Inside Premises</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="location2" class="form-check-label">
														  <input type="radio" id="location2" name="location" value="2" class="form-check-input" required data-validation-required-message="Please Check location."><span class="ml-1">Outside Premises</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											  </div>
											</div>
											<div class="row row-space">
											<div class="col-md-12">
											<h4 class="text-center text-success">Address</h4>
											</div>
											</div>																   
										<div class="row row-space mt-2">
										<div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
											<input type="text" onkeyup="getPincode(this.value)" class="form-control numberOnly this_pin_code" id="pincode" pattern="[1-9][0-9]{5}" name="pincode" minlength="6" maxlength="6" placeholder="PINCODE" value="<?php echo $fpoInfo[0]->pin_code; ?>" required="required" data-validation-required-message="Please enter pincode.">
											 <p class="help-block text-danger" id="pincode_validate"></p>
										</div>	
										<div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select id="state" name="state" class="form-control sel_state" required="required" data-validation-required-message="Please Select state." readonly>
												<option value="<?php echo $fpoInfo[0]->state; ?>"><?php echo $fpoInfo[0]->state_name; ?></option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District <span class="text-danger">*</span> </label>
											<select id="district" name="district" class="form-control sel_district" required="required" data-validation-required-message="Please Select district."readonly>
												<option value="<?php echo $fpoInfo[0]->district; ?>"><?php echo $fpoInfo[0]->district_name; ?></option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										</div>
										 <div class="row row-space">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
											<select id="taluk" name="taluk" class="form-control sel_taluk" required="required" data-validation-required-message="Please Select taluk.">
												<option value="">Select Taluk </option>
												<?php for($i=0; $i<count($talukInfo);$i++) { ?>
												<option value="<?php echo $talukInfo[$i]->taluk_code; ?>" <?php if($talukInfo[$i]->taluk_code == $fpoInfo[0]->taluk_id){ ?>selected<?php } ?>><?php echo $talukInfo[$i]->name; ?></option>
												<?php } ?>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block <span class="text-danger">*</span></label>
											<select id="block" name="block" class="form-control sel_block" required="required" data-validation-required-message="Please Select block.">
												<option value="">Select Block </option>
												<?php for($i=0; $i<count($blockInfo);$i++) { ?>
												<option value="<?php echo $blockInfo[$i]->block_code; ?>" <?php if($blockInfo[$i]->block_code == $fpoInfo[0]->block){ ?>selected<?php } ?>><?php echo $blockInfo[$i]->name; ?></option>
												<?php } ?>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
											<select  name="gram_panchayat" id="gram_panchayat" class="form-control sel_panchayat" required="required" data-validation-required-message="Please Select gram panchayat.">
												<option value="<?php echo $fpoInfo[0]->panchayat; ?>"><?php echo $fpoInfo[0]->panchayat_name; ?></option>
											</select>
											<p class="help-block text-danger"></p>								
										</div>
										</div>
										<div class="row row-space">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village <span class="text-danger">*</span></label>
											<select id="village" name="village" class="form-control sel_village" required="required" data-validation-required-message="Please Select village.">
												<?php if($fpoInfo[0]->village != null){ ?>
													<option value="<?php echo $fpoInfo[0]->village; ?>"><?php echo $fpoInfo[0]->village_name; ?></option>
												<?php } else { ?>
													<option value="">Select Village</option>
												<?php } ?>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Door No / Street</label>
										<textarea id="address" maxlength="50" name="address" class="form-control"></textarea>
											<!--/* <label for="inputAddress2">Street </label>
											<input type="text" id="street" name="street" maxlength="75" class="form-control" maxlength="75" id="street" placeholder="Street">	
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Door No </label>
											<input type="text" class="form-control" name="door_no" maxlength="10" id="door_no" placeholder="Door No"> */-->
										</div>
										</div>
										<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Save</button>
												 <a href="<?php echo base_url('staff/masterdata/godownlist');?>" class="btn-fs btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>											
										</div>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>  
$('#gram_panchayat').change(function(){	
	var gram_panchayat = $("#gram_panchayat").val();
	getVillageList( gram_panchayat );
});  
$('#block').change(function(){	
	var block = $("#block").val();
	getPanchayatList( block );	
}); 

function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat); 
				$('#village').html('<option value="">Select Village</option>');
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}   
</script>
</body>
</html>