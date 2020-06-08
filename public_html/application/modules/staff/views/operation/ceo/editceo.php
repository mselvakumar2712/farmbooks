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
                        <h1>Edit Chief Executive Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/editceo/'.$ceo['id']);?>">Edit Chief Executive Officer</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/update_ceo/'.$ceo['id']) ?>"  method="post"  id="ceoform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														    <label for="">Name of the Chief Executive Officer <span class="text-danger">*</span></label>
															<input type="text" class="form-control" readonly maxlength="50" id="ceo_name" name="ceo_name"  value="<?php echo $ceo['name']; ?>" placeholder="Name of the Chief Executive Officer" required="required" data-validation-required-message="Please enter chief executive officer name.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Father Name / Spouse Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control"  maxlength="50" id="father_name" name="father_name"  value="<?php echo $ceo['father_name']; ?>" placeholder="Father Name / Spouse Name" required="required" data-validation-required-message="Please enter father / spouse name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Birth <span class="text-danger">*</span></label>
														<input type="date" class="form-control" id="dob" name="dob"  value="<?php echo $ceo['dob']; ?>" data-validation-required-message="Please enter date of birth." min="1950-01-01" max="<?php echo date("Y-m-d")?>">
													    <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  ">
													  <div class="col-md-4 form-group">
															<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" required maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" value="<?php echo $ceo['pincode']; ?>"  placeholder="PINCODE"  data-validation-required-message="Please enter pin code.">
															<div class="help-block with-errors text-danger" id="pincode_validate"></div>
														</div>
													 <div class="form-group col-md-4">
														<label for="inputAddress2">State <span class="text-danger">*</span></label>
														<select id="state" class="form-control sel_state" readonly name="state" required  data-validation-required-message="Please select State ." >
															<option  value="<?php echo $ceo['state']?>"><?php echo $ceo['state_name']?></option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												   <div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span></label>
														<select id="district" class="form-control sel_district" readonly name="district" required  data-validation-required-message="Please select District .">
															<option  value="<?php echo $ceo['district']?>"><?php echo $ceo['district_name']?></option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Taluk </label>
														<select class="form-control sel_taluk" name="taluk_id"  id="taluk_id" >
														<?php foreach($taluk_info as $taluk){
															if($taluk->taluk_code == $ceo['taluk'])
															   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
															else
															   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
														 }
														 ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												   <div class="form-group col-md-4">
														<label for="inputAddress2">Block </label>
														<select id="block" class="form-control sel_block" name="block">
															<option value="">Select Block </option>
															<?php foreach($block_info as $block){
																if($block->block_code == $ceo['block'])
																   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
																else
																   echo "<option value='".$block->block_code."'>".$block->name."</option>";
															 }
															 ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												     <div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat </label>
														<select id="gram_panchayat" class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat"  >
															<option value="">Select Gram Panchayat </option>
															<?php foreach($panchayat_info as $panchayat){
																if($panchayat->panchayat_code == $ceo['panchayat'])
																   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
																else
																   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
															 }
															 ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
												<div class="row row-space">
													 <div class="form-group col-md-4">                            
														<label for="inputAddress2">Village </label>
														<select id="village" class="form-control sel_village" id="village"  name="village" >
															<option value="">Select Village</option>
															<?php foreach($village_info as $village){
																if($village->id == $ceo['village'])
																   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
																else
																   echo "<option value='".$village->id."'>".$village->name."</option>";
															 }
															 ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													 <div class="form-group col-md-8">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control" maxlength="75"  id="street_name" name="street_name" value="<?php echo $ceo['street']; ?>" placeholder="Street">
													</div>
												</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Door No</label>
														<input type="text" class="form-control" maxlength="10"  id="door_no" name="door_no" value="<?php echo $ceo['door']; ?>" placeholder="Door No.">
													</div>
													<div class="form-group col-md-4">
														  <label for="">Qualification <span class="text-danger">*</span></label>
														  <select class="form-control" id="qualification" name="qualification" required="required" data-validation-required-message="Please select qualification" >
															  <option value="">Select Qualification</option>
															  <option value="1" <?php if($ceo['qualification'] == 1) {echo 'selected="selected"'; } ?> >Post Graduate</option>
															  <option value="2" <?php if($ceo['qualification'] == 2) {echo 'selected="selected"'; } ?> >Graduate</option>
															  <option value="3" <?php if($ceo['qualification'] == 3) {echo 'selected="selected"'; } ?> >Class 9-12</option>
															  <option value="4" <?php if($ceo['qualification'] == 4) {echo 'selected="selected"'; } ?> >Class 6- 8</option>
															  <option value="5" <?php if($ceo['qualification'] == 5) {echo 'selected="selected"'; } ?> >Class 0-5</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="inputAddress2">Experience <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="500"  id="experience" name="experience" required="required" value="<?php echo $ceo['experience']; ?>" data-validation-required-message="Please enter experience" placeholder="Experience" >
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="row row-space">
												<div class="form-group col-md-4">
														<label for="">Date of Appointment <span class="text-danger">*</span></label>
														<input type="date" class="form-control" readonly value="<?php echo $ceo['appointment_date']; ?>" min="<?php echo date("Y-m-d"); ?>" max="2050-12-31"  id="appointment_date" name="appointment_date" required="required" data-validation-required-message="Please enter date of appointment.">
														<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
														<label for="">Date of Resignation </label>
														<input type="date" class="form-control" min="<?php echo $ceo['appointment_date']; ?>" max="2050-12-31"  id="resignation_date" name="resignation_date" >
														<p class="help-block text-danger"></p>
												</div>
                                    <div class="form-group col-md-4">
														<label for="">Reason for Resignation </label>
														<textarea class="form-control" name="reason" id="reason" maxlength="200"></textarea>
														<p class="help-block text-danger"></p>
													</div>
												</div>
										</div>										
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
											<a href="<?php echo base_url('staff/operation/ceolist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
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
	 function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
 				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
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
$('#appointment_date').on('change', function () {
   var date_certificate='<?php echo $fpo_list[0]->date_formation;?>';  
   var date_of_appointment= document.getElementById("appointment_date").value;
   if( new Date(date_certificate).getTime() >=  new Date(date_of_appointment).getTime())  {
      $('#appointment_date').val('');
      swal("",'Date of appoinment should be greater than date of formation');
    return false;
   }
 });
 $('#resignation_date').on('change', function () {
   var date_certificate=document.getElementById("resignation_date").value;  
   var date_of_appointment= '<?php echo $ceo['appointment_date'];?>';
   if( new Date(date_of_appointment).getTime() >=  new Date(date_certificate).getTime())  {
      $('#resignation_date').val('');
      swal("",'Date of resignation should be greater than date of appoinment');
    return false;
   }
 });
</script>
</body>
</html>