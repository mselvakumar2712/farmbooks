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
                        <h1>Edit Company Secretary</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/editcompany_secretary/'.$secretary['id']);?>">Edit Company Secretary</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/update_secretary/'.$secretary['id'])?>"  method="post"  id="secretaryform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space  mt-4">
												<div class="col-md-3">&nbsp;
												</div>												
												 <div class="form-group col-md-6">
													  <label class=" form-control-label">Is the Turnover of the Company is more than > 5 Crs for last 3 years <span class="text-danger">*</span></label>
													  <div class="row">
													  <div class="col-md-2">&nbsp;
													  </div>
														<div class="col-md-4">
														  <div class="form-check-inline form-check">
															<label for="ismore1" class="form-check-label">
															  <input type="radio" id="ismore1" name="is_turnover_slab" <?php if($secretary['is_turnover_slab'] == 1) { echo 'checked="checked"'; } ?> value="1" required="required" class="form-check-input" disabled data-validation-required-message="Please select"><span class="ml-1">Yes</span>
															</label>
														  </div> 
														</div>
														<div class="col-md-4">
														  <div class="form-check-inline form-check">
															<label for="ismore2" class="form-check-label">
															  <input type="radio" id="ismore2" name="is_turnover_slab" <?php if($secretary['is_turnover_slab'] == 2) { echo 'checked="checked"'; } ?> value="2" required="required" class="form-check-input" disabled data-validation-required-message="Please select"><span class="ml-1">No</span>
															</label>
															</div>
														</div>
													<div class="col-md-2">&nbsp;
													  </div>			  
													  </div>
													  <div class="help-block with-errors text-danger ml-5"></div>	
												</div>
												<div class="col-md-3">&nbsp;
												</div>	
												</div>
												<div class="row row-space" id="div1">
												  <div class="form-group col-md-4" >
													<label for="">Name of the Company Secretary <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlength="50" id="name" name="name"  value="<?php echo $secretary['name']; ?>" placeholder="Name of the Company Secretary" required="required" data-validation-required-message="Please enter company secretary name.">
													<div class="help-block with-errors text-danger"></div>
												  </div>
												  <div class="form-group col-md-4" >
													<label for="">Registration Number</label>
													<input type="text" class="form-control" maxlength="10" id="reg_number" name="reg_number" value="<?php echo $secretary['reg_number']; ?>" placeholder="Registration Number">
												  </div>
												   <div class="form-group col-md-4">
													<label for="">Name of the Firm </label>
													<input type="text" class="form-control" maxlength="100" id="firm_name" name="firm_name" value="<?php echo $secretary['firm_name']; ?>" placeholder="Name of the Firm ">
												  </div>
												</div>
											   <div class="row row-space" id="div2">
												  <div class="form-group col-md-4">
													  <label for="">Firm Registration Number</label>
													 <input type="text" class="form-control" maxlength="10" id="firm_reg_number" name="firm_reg_number" value="<?php echo $secretary['firm_reg_number']; ?>" placeholder="Firm Registration Number">
												  </div> 
												<div class="col-md-4 form-group">
												<label for="inputAddress2">PINCODE </label>
												<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)"  maxlength="6" pattern="[1-9][0-9]{5}" id="pincode" name="pincode" value="<?php echo $secretary['pincode']; ?>"  placeholder="PINCODE">
											</div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">State </label>
												<select id="state" class="form-control sel_state" disabled name="state" >
													<option value="">Select State </option>
													<option  value="<?php echo $secretary['state_code']?>" <?php if($secretary['state_code'] >0) { echo 'selected="selected"'; } ?> ><?php echo $secretary['state_name']?></option>
												</select>
											</div>													 
											</div>
											 <div class="row row-space" id="div3">
											 <div class="form-group col-md-4">
												<label for="inputAddress2">District </label>
												<select id="district" class="form-control sel_district" disabled name="district" >
													<option value="">Select District </option>
													<option  value="<?php echo $secretary['district']?>" <?php if($secretary['district'] >0) { echo 'selected="selected"'; } ?> ><?php echo $secretary['district_name']?></option>
												</select>
											</div>
											   <div class="form-group col-md-4">
												<label for="inputAddress2">Taluk </label>
												<select class="form-control sel_taluk" name="taluk"  id="taluk" >
													<option value="">Select Taluk </option>
													<?php foreach($taluk_info as $taluk){
															if($taluk->taluk_code == $secretary['taluk'])
															   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
															else
															   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
														 }
													?>
												</select>
											</div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">Block </label>
													<select id="block" class="form-control sel_block" name="block" >
														<option value="">Select Block </option>
														<?php foreach($block_info as $block){
																if($block->block_code == $secretary['block'])
																   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
																else
																   echo "<option value='".$block->block_code."'>".$block->name."</option>";
															 }
														?>
												</select>
											</div>
											 </div>
											 <div class="row row-space" id="div4">
											 <div class="form-group col-md-4">						    
												<label for="inputAddress2">Gram Panchayat </label>
												<select id="panchayat" class="form-control sel_panchayat" id="panchayat" name="panchayat" >
													<option value="">Select Gram Panchayat </option>
													<?php foreach($panchayat_info as $panchayat){
															if($panchayat->panchayat_code == $secretary['panchayat'])
															   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
															else
															   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
														 }
													?>
												</select>
											</div>
											   <div class="form-group col-md-4">                            
												<label for="inputAddress2">Village </label>
												<select id="village" class="form-control sel_village" id="village"  name="village">
													<option value="">Select Village</option>
													<?php foreach($village_info as $village){
														if($village->id == $secretary['village'])
														   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
														else
														   echo "<option value='".$village->id."'>".$village->name."</option>";
													 }
													 ?>
												</select>
											</div>
												  <div class="form-group col-md-4">
													<label for="inputAddress2">Street</label>
													<input type="text" class="form-control" maxlength="75"  id="street" name="street" value="<?php echo $secretary['street']; ?>" placeholder="Street" value="">
												</div>
											 </div>
											<div class="row row-space" id="div5">
												<div class="form-group col-md-4">
														<label for="inputAddress2">Door No</label>
														<input type="text" class="form-control" maxlength="10"  id="door" name="door" value="<?php echo $secretary['door']; ?>" placeholder="Door No." value="">
													</div>
												  <div class="form-group col-md-4">
													<label for="">Mobile Number </label>
													<input type="text" class="form-control numberOnly" maxlength="10" id="mobile" name="mobile" value="<?php echo $secretary['mobile']; ?>" pattern="^[6-9]\d{9}$" placeholder="Mobile Number" >
												  </div>
												  <div class="form-group col-md-2">
													  <label for="">STD Code </label>
													<input type="text" class="form-control numberOnly" title="STD Code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" value="<?php echo $secretary['std_code']; ?>" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012">
												  </div> 
												  <div class="form-group col-md-2">
													  <label for="">Landline Number </label>
													 <input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="landline" name="landline"  value="<?php echo $secretary['landline']; ?>" placeholder="Landline Number">			
												  </div> 												  
											</div>
											<div class="row row-space " id="div6">
													<div class="form-group col-md-4">
													  <label for="">Email ID </label>
													 <input type="email" class="form-control" maxlength="50" id="email" name="email" value="<?php echo $secretary['email']; ?>" placeholder="Email ID">
												  </div>
												  <div class="form-group col-md-4">
													<label for="">Date of Consent Letter </label>
													<input type="date" class="form-control" id="consent_date" name="consent_date" value="<?php echo $secretary['consent_date']; ?>" max="<?php echo date("Y-m-d"); ?>">
												  </div>
												  <div class="form-group col-md-4">
													  <label for="">Date of Certificate  </label>
													 <input type="date" class="form-control" id="certificate_date" name="certificate_date" value="<?php echo $secretary['certificate_date']; ?>" max="<?php echo date("Y-m-d"); ?>">
												  </div>
												  <?php
													if(isset($secretary['consent_file'])) {
														?>
															<div class="form-group col-md-4" id="consent_letter">
																<label for="">Consent Letter </label>
																<div><a href="<?php echo base_url($secretary['consent_file']); ?>" target="_blank">Download</a></div>
															</div>
														<?php
													}
												  ?>
												  <?php
													if(isset($secretary['certificate_file'])) {
														?>
															<div class="form-group col-md-4" id="certificate">
																  <label for="">Certificate File </label>
																  <div><a href="<?php echo base_url($secretary['certificate_file']); ?>" target="_blank">Download</a></div>
															</div>
														<?php
													}
												  ?>
													<div class="form-group col-md-4" id="div7">
													  <label for="">Date of Appointment <span class="text-danger">*</span></label>
													 <input type="date" class="form-control" min="<?php echo $appoint_date;?>"  value="<?php echo $secretary['appointment_date']; ?>" max="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" id="appointment_date" name="appointment_date"  required="required" data-validation-required-message="Please select date of appointment.">
													 <p class="help-block text-danger"></p>
												  </div>
												<div class="form-group col-md-4">
													<label for="">Date of Termination </label>
													<input type="date" class="form-control"   max="2050-12-31" id="terminated_on" name="terminated_on"  >
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="">Reason Termination </label>
													<textarea class="form-control" name="reason" id="reason" maxlength="200"></textarea>
													<p class="help-block text-danger"></p>
												</div>
											</div>
										</div>
											
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update Secretary</button>
											<a href="<?php echo base_url('fpo/operation/company_secretarylist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
$('#terminated_on').on('change', function () {
   var date_certificate=document.getElementById("terminated_on").value;  
   var date_of_appointment= '<?php echo $secretary['appointment_date'];?>';
   if( new Date(date_of_appointment).getTime() >=  new Date(date_certificate).getTime())  {
      $('#terminated_on').val('');
      swal("",'Date of termination should be greater than date of appoinment');
    return false;
   }
 });
/* $(document).ready(function() {
var appoinment_date='<?php echo $secretary['appointment_date'];?>';
 $("#terminated_on").attr("min", appoinment_date);
}); */
$(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      
   var maxDate = year + '-' + month + '-' + day;
   $('#consent_date').attr('max', maxDate);
   $('#certificate_date').attr('max', maxDate);
   $('#appointment_date').attr('max', maxDate);
	  
	/* $('#div1').hide();
	$('#div2').hide();
	$('#div3').hide();
	$('#div4').hide();
	$('#div5').hide();
	$('#div6').hide();
	$('#div7').hide();
	$('input[name=is_turnover_slab]').on('change', function() {
    var ismoreinfo = $("input[name='is_turnover_slab']:checked").val();  
    if(ismoreinfo == 1) {
		$('#div1').show();
		$('#div2').show();
		$('#div3').show();
		$('#div4').show();
		$('#div5').show();
		$('#div6').show();
		$('#div7').show();
    }else{
		$('#div1').hide();
		$('#div2').hide();
		$('#div3').hide();
		$('#div4').hide();
		$('#div5').hide();
		$('#div6').hide();
		$('#div7').hide();
	}
	});	*/
	//$('#certificate').hide();
	//$('#consent_letter').hide();
	$('input[name=consent_date]').on('change', function() {
		var ismoreinfo = $(this).val();  
		if(ismoreinfo != "") {
			$('#consent_letter').show();
			
		} else {
			$('#consent_letter').hide();
			
		}
	});	
	
	$('input[name=certificate_date]').on('change', function() {
		var ismoreinfo = $(this).val();  
		if(ismoreinfo != "") {
			$('#certificate').show();
			
		} else {
			$('#certificate').hide();
		}
	});	
	$('#panchayat').change(function(){
		var gram_panchayat = $("#panchayat").val();
		getVillageList( gram_panchayat );
	});  
	$('#block').change(function(){
		var block = $("#block").val();
		getPanchayatList( block );
	});
	
	$("#consent_file, #certificate_file").on('change', function(event) {
		var file = event.target.files[0];
		var FileSize = file.size / 1024;
		if(FileSize > 1024) {
			swal('',"File size exceeds 1 MB");
			$(this).val(''); 
			return;
		}
		if(!file.type.match('application/pdf')) {                
			swal('',"Only PDF file allowed to upload");
			$(this).val('');
			return;
		}
	});	
	  
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
			$('#panchayat').html(gram_panchayat);                
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

/** Fetching the table reference informations by using the secretary name & Registration number **/
$("#reg_number").focusout(function(){
	var reg_number = $(this).val();
	var secretary_name = $("#name").val();
	if(secretary_name!= "" && reg_number!= ""){
		var secretary_info = {'secretary_name':secretary_name, 'reg_number':reg_number};
		$.ajax({
            url:"<?php echo base_url();?>fpo/operation/getCompanySecretaryInformation",
            type:"POST",
            data:secretary_info,
            dataType:"html",
            cache:false,			
            success:function(response) {                
            response=response.trim();
            responseArray=$.parseJSON(response);
                //console.log(responseArray);
                if(responseArray.status == 1 && responseArray.secretaryInfo!=null) {    
                     $("#secretary_master_id").val(responseArray.secretaryInfo.id);  
                     $("#firm_name").val(responseArray.secretaryInfo.firm_name);  
                     $("#firm_reg_number").val(responseArray.secretaryInfo.firm_reg_number);	
                     $("#pincode").val(responseArray.secretaryInfo.pincode);					
                     $("#state").html('<option value='+responseArray.secretaryInfo.state_code+'>'+responseArray.secretaryInfo.state_name+'</option>');  
                     $("#district").html('<option value='+responseArray.secretaryInfo.district+'>'+responseArray.secretaryInfo.district_name+'</option>'); 
                     $("#taluk").html('<option value='+responseArray.secretaryInfo.taluk+'>'+responseArray.secretaryInfo.taluk_name+'</option>'); 
                     $("#block").html('<option value='+responseArray.secretaryInfo.block+'>'+responseArray.secretaryInfo.block_name+'</option>'); 
                     $("#panchayat").html('<option value='+responseArray.secretaryInfo.panchayat+'>'+responseArray.secretaryInfo.panchayat_name+'</option>'); 	
                     $("#village").html('<option value='+responseArray.secretaryInfo.village+'>'+responseArray.secretaryInfo.village_name+'</option>'); 
                     $("#street").val(responseArray.secretaryInfo.street);	
                     $("#door").val(responseArray.secretaryInfo.door);   
                     $("#mobile").val(responseArray.secretaryInfo.mobile);	
                     $("#std_code").val(responseArray.secretaryInfo.std_code);	
                     $("#landline").val(responseArray.secretaryInfo.landline);   
                     $("#email").val(responseArray.secretaryInfo.email);	
                     $("#consent_date").val(responseArray.secretaryInfo.consent_date);   
                     $("#certificate_date").val(responseArray.secretaryInfo.certificate_date);	
                     $("#secretary_validate").html("<div class='alert alert-success'>Verify the displayed values and confirm</div>");
                  } else {                                        
                    //$("#certificate_number").focus();                    
                  $("#certificate_validate").html("<div class='alert alert-danger'>No records found</div>");
					//$("#secretary_validate").val('');
                } 
            }
        });  
	} else {
		swal("Sorry!", "Provide the Secretary name & register number");
	}
});

//Appoinment date greater than certificate date
$('#appointment_date').on('change', function () {
   var date_certificate=document.getElementById("certificate_date").value;  
   var date_of_appointment= document.getElementById("appointment_date").value;
   if( new Date(date_certificate).getTime() >=  new Date(date_of_appointment).getTime())  {
      $('#appointment_date').val('');
      swal("",'Date of appoinment should be greater than date of certificate');
    return false;
   }
 });
</script>
</body>
</html>