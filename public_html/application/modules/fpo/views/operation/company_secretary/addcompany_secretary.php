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
                        <h1>Add Company Secretary</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/addcompany_secretary');?>">Add Company Secretary</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_secretary') ?>"  method="post"  enctype="multipart/form-data" id="secretaryform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space mt-4">
													<div class="col-md-3">&nbsp;</div>												
													 <div class="form-group col-md-6">
														  <label class=" form-control-label">Is the Turnover of the Company is more than > 5 Crs for last 3 years <span class="text-danger">*</span></label>
														  <div class="row">
														  <div class="col-md-2">&nbsp;</div>
															<div class="col-md-4">
															  <div class="form-check-inline form-check">
																<label for="ismore1" class="form-check-label">
																  <input type="radio" id="ismore1" name="is_turnover_slab" value="1" required="required" class="form-check-input" data-validation-required-message="Please select"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-4">
															  <div class="form-check-inline form-check">
																<label for="ismore2" class="form-check-label">
																  <input type="radio" id="ismore2" name="is_turnover_slab" value="2" <?php if($secretary_turnover == 1) { echo 'checked="checked"'; } ?> required="required" class="form-check-input" data-validation-required-message="Please select"><span class="ml-1">No</span>
																</label>
																</div>
															</div>
															<div class="col-md-2">&nbsp;</div>			  
														  </div>
														  <div class="help-block with-errors text-danger ml-5"></div>	
													</div>
													<div class="col-md-3">&nbsp;</div>	
													</div>
													<div class="row row-space" id="div1">
														<input type="hidden" class="form-control" id="secretary_master_id" name="secretary_master_id">
													  <div class="form-group col-md-4" >
														<label for="">Name of the Company Secretary <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="name" name="name" placeholder="Name of the Company Secretary" required="required" data-validation-required-message="Please enter company secretary name.">														
														<div class="help-block with-errors text-danger ml-5"></div>	
                                          <div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4" >
														<label for="">Registration Number</label>
														<input type="text" class="form-control" maxlength="10" id="reg_number" name="reg_number" placeholder="Registration Number">
														<div class="help-block with-errors text-danger ml-5"></div>	
                                          <div id="secretary_validate" class="with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Name of the Firm </label>
														<input type="text" class="form-control" maxlength="100" id="firm_name" name="firm_name" placeholder="Name of the Firm ">
													  </div>
												    </div>
												   <div class="row row-space" id="div2">
													  <div class="form-group col-md-4">
														  <label for="">Firm Registration Number</label>
														 <input type="text" class="form-control" maxlength="10" id="firm_reg_number" name="firm_reg_number" placeholder="Firm Registration Number">
													 <div class="help-block with-errors text-danger ml-5"></div>	
                                        </div> 
												    <div class="col-md-4 form-group">
													<label for="inputAddress2">PINCODE </label>
													<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" maxlength="6" pattern="[1-9][0-9]{5}" id="pincode" name="pincode" placeholder="PINCODE">
												   <div class="help-block with-errors text-danger ml-5"></div>	
                                    </div>
													<div class="form-group col-md-4">
													<label for="inputAddress2">State </label>
													<select id="state" class="form-control sel_state" readonly name="state" >
														<option value="">Select State </option>
													</select>
												</div>													 
												</div>
												 <div class="row row-space" id="div3">
												 <div class="form-group col-md-4">
													<label for="inputAddress2">District </label>
													<select id="district" class="form-control sel_district" readonly name="district" >
														<option value="">Select District </option>
													</select>
											    </div>
												   <div class="form-group col-md-4">
													<label for="inputAddress2">Taluk </label>
													<select class="form-control sel_taluk" name="taluk"  id="taluk" >
														<option value="">Select Taluk </option>
													</select>
											    </div>
												    <div class="form-group col-md-4">
													<label for="inputAddress2">Block </label>
														<select id="block" class="form-control sel_block" name="block" >
														<option value="">Select Block </option>
													</select>
											    </div>
												 </div>
												 <div class="row row-space" id="div4">
												 <div class="form-group col-md-4">						    
													<label for="inputAddress2">Gram Panchayat </label>
													<select id="panchayat" class="form-control sel_panchayat"  id="panchayat" name="panchayat" >
														<option value="">Select Gram Panchayat </option>
													</select>
											    </div>
												   <div class="form-group col-md-4">                            
													<label for="inputAddress2">Village </label>
													<select id="village" class="form-control sel_village" id="village"  name="village">
														<option value="">Select Village</option>
													</select>
											    </div>
													  <div class="form-group col-md-4">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control"  maxlength="75"  id="street" name="street" placeholder="Street" value="">
													   <div class="help-block with-errors text-danger ml-5"></div>	
                                       </div>
												 </div>
												<div class="row row-space" id="div5">
													<div class="form-group col-md-4">
															<label for="inputAddress2">Door No</label>
															<input type="text" class="form-control" maxlength="10"  id="door" name="door" placeholder="Door No." value="">
														<div class="help-block with-errors text-danger ml-5"></div>	
                                          </div>
													  <div class="form-group col-md-4">
														<label for="">Mobile Number </label>
														<input type="text" class="form-control numberOnly" maxlength="10" id="mobile" name="mobile" pattern="^[6-9]\d{9}$" placeholder="Mobile Number" >
													   <div class="help-block with-errors text-danger ml-5"></div>	
                                         </div>
													  <div class="form-group col-md-2">
														  <label for="">STD Code </label>
														<input type="text" class="form-control numberOnly" title="STD Code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012">
													   <div class="help-block with-errors text-danger ml-5"></div>	
                                         </div> 
													  <div class="form-group col-md-2">
														  <label for="">Landline Number </label>
														 <input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="landline" name="landline" placeholder="Landline Number">			
													  <div class="help-block with-errors text-danger ml-5"></div>	
                                         </div> 												  
												</div>
												<div class="row row-space " id="div6">
														<div class="form-group col-md-4">
														  <label for="">Email ID </label>
														 <input type="email" class="form-control" maxlength="50" id="email" name="email" placeholder="Email ID">
													  <div class="help-block with-errors text-danger ml-5"></div>	
                                         </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Consent Letter </label>
														<input type="date" class="form-control"  id="consent_date" name="consent_date" max="<?php echo date("Y-m-d"); ?>" >
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Date of Certificate  </label>
														 <input type="date" class="form-control"  id="certificate_date" name="certificate_date" max="<?php echo date("Y-m-d"); ?>" >
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4" id="consent_letter">
														  <label for="">Consent Letter Upload </label>
														 <input type="file" class="form-control" id="consent_file" name="consent_file" >
													  </div>
													   <div class="form-group col-md-4" id="certificate">
														  <label for="">Certificate File Upload </label>
														 <input type="file" class="form-control" id="certificate_file" name="certificate_file" >
													  </div>
													<div class="form-group col-md-4" id="div7">
														  <label for="">Date of Appointment <span class="text-danger">*</span></label>
														 <input type="date" class="form-control"  min="<?php echo $appoint_date;?>" max="2050-12-31"  id="appointment_date" name="appointment_date"  required="required" data-validation-required-message="Please select date of appointment.">
													    <div class="help-block with-errors text-danger ml-5"></div>	
                                         </div>													  
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Secretary</button>
											<a href="<?php echo base_url('fpo/operation/company_secretarylist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
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
	  //$('#appointment_date').attr('max', maxDate);
	  
	$('#div1').hide();
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
	});	
	$('#certificate').hide();
	$('#consent_letter').hide();
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
   var fn = $("#reg_number").val();
    var regex = /^[0-9a-zA-Z\_]+$/;
    if((regex.test(fn))== false)
    {
       $('#reg_number').val("");
    }
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

/* 
$("#certificate_date").focusout(function() {
	var date_of_certificate = $(this).val();
    $("#appointment_date").attr("min", date_of_certificate);
});

$("#appointment_date").focusout(function() {
	var date_training = $(this).val();
    $("#certificate_date").attr("max", date_training);
}); */
</script>	 
</body>
</html>