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
                        <h1>Add Chartered Accountant</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/addchartered');?>">Add Chartered Accountant</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_chartered_accountant') ?>" method="post" enctype="multipart/form-data" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space mt-4">
													<input type="hidden" class="form-control" id="accountant_master_id" name="accountant_master_id">
													  <div class="form-group col-md-4">
														  <label for="">Type of Appointment <span class="text-danger">*</span></label>
														  <select class="form-control" id="appointment_type" name="appointment_type" required data-validation-required-message="Please select appointment type">
															  <option value="">Select Appointment Type</option>
															  <option value="1">Statutory Audit</option>
															  <option value="2">Internal Audit</option>
															  <option value="3">Taxation</option>
															  <option value="4">Others</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Name of the Chartered Accountant <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="accountant_name" name="accountant_name" placeholder="Name of the Chartered Accountant" required="required" data-validation-required-message="Please enter chartered accountant name.">														
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4" >
														<label for="">Registration Number</label>
														<input type="text" class="form-control" maxlength="10" id="registration_num" name="registration_num" placeholder="Registration Number">
													  <div class="help-block with-errors text-danger"></div>
                                         </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="">Name of the Firm </label>
														<input type="text" class="form-control" maxlength="100" id="name_firm" name="name_firm" placeholder="Name of the Firm " >
													  <div class="help-block with-errors text-danger"></div>
                                         </div>
													 <div class="form-group col-md-4">
														  <label for="">Firm Registration Number</label>
														 <input type="text" class="form-control" maxlength="10" id="firm_number" name="firm_number" placeholder="Firm Registration Number">
													     <div class="help-block with-errors text-danger"></div>
                                         </div>
													   <div class="col-md-4 form-group">
															<label for="inputAddress2">PINCODE </label>
															<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)"  maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code"   placeholder="PINCODE">
														   <div class="help-block with-errors text-danger"></div>
                                          </div>
												</div>
												<div class="row row-space  mt-4">
													 <div class="form-group col-md-4">
														<label for="inputAddress2">State </label>
														<select id="state" class="form-control sel_state" readonly name="state">
														<option value="">Select State </option>
														</select>
													</div>	
													 <div class="form-group col-md-4">
														<label for="inputAddress2">District </label>
														<select id="district" class="form-control sel_district" readonly name="district" >
														<option value="">Select District </option>
														</select>
													</div>
													    <div class="form-group col-md-4">
															<label for="inputAddress2">Taluk </label>
															<select class="form-control sel_taluk" name="taluk_id"  id="taluk_id" >
															<option value="">Select Taluk </option>
															</select>
														</div>
												</div>
												<div class="row row-space  mt-4">
													 <div class="form-group col-md-4">
															<label for="inputAddress2">Block </label>
															<select id="block" class="form-control sel_block" name="block">
															<option value="">Select Block </option>
															</select>
														</div>
													<div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat </label>
														<select id="gram_panchayat" class="form-control sel_panchayat"  id="gram_panchayat" name="gram_panchayat">
														<option value="">Select Gram Panchayat </option>
														</select>
													</div>
													<div class="form-group col-md-4">                            
														<label for="inputAddress2">Village </label>
														<select id="village" class="form-control sel_village" id="village" name="village">
														<option value="">Select Village</option>
														</select>
													</div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control" maxlength="75" id="street_name" name="street_name" placeholder="Street" value="">
													    <div class="help-block with-errors text-danger"></div>
                                       </div>
													<div class="form-group col-md-4">
															<label for="inputAddress2">Door No</label>
															<input type="text" class="form-control" maxlength="10" id="door_no" name="door_no" placeholder="Door No." value="">
														   <div class="help-block with-errors text-danger"></div>
                                          </div>
													 <div class="form-group col-md-4">
														<label for="">Mobile Number </label>
														<input type="text" class="form-control numberOnly" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" placeholder="Mobile Number" >
                                          <div class="help-block with-errors text-danger"></div>
                                        </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-2">
														  <label for="">STD Code </label>
														<input type="text" class="form-control numberOnly" title="Std code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012">
													  <div class="help-block with-errors text-danger"></div>
                                         </div> 
													<div class="form-group col-md-2">
														  <label for="">Landline Number </label>
														 <input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="landline_num" name="landline_num" placeholder="Landline Number">			
													  <div class="help-block with-errors text-danger"></div>
                                         </div> 
													 <div class="form-group col-md-4">
														  <label for="">Email ID </label>
														 <input type="email" class="form-control" maxlength="50" id="email_address" name="email_address" placeholder="Email ID">
													    <div class="help-block with-errors text-danger"></div>
                                         </div>
													   <div class="form-group col-md-4">
														<label for="">Date of Consent Letter </label>
														<input type="date" class="form-control" id="date_of_consent" name="date_of_consent" max="2050-12-31" min="1900-01-01">
													 
                                        </div>
												</div>
												<div class="row row-space  mt-4">
													   <div class="form-group col-md-4">
														  <label for="">Date of Certificate  </label>
														 <input type="date" class="form-control" id="date_of_certificate" name="date_of_certificate" max="<?php echo date("Y-m-d"); ?>">
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
														 <input type="date" class="form-control" min="<?php echo $appoint_date;?>" id="date_of_appointment" name="date_of_appointment" max="2050-12-31"  required="required" data-validation-required-message="Please select date of appoinment.">
														 <p class="help-block with-errors  text-danger"></p>
													  </div>
													   <div class="form-group col-md-4" id="years_appoinment" style="display:none;">
														  <label for="">No. of Years of Appointment <span class="text-danger">*</span></label>
														  <select class="form-control" id="tenure_year" name="tenure_year" required data-validation-required-message="Please select no of years of appointment">
															  <option value="">Select No. of Years of Appoinment</option>
															  <option value="1">1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
														  </select>
														 <p class="help-block with-errors text-danger"></p>
													  </div>
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Accountant</button>
											<a href="<?php echo base_url('staff/operation/charteredlist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$('#date_of_appointment').focusout(function() {
   var date_certificate=document.getElementById("date_of_certificate").value;  
   var date_of_appointment= document.getElementById("date_of_appointment").value;
   if( new Date(date_certificate).getTime() >=  new Date(date_of_appointment).getTime())  {
      $('#date_of_appointment').val('');
      swal("",'Date of appoinment should be greater than date of certificate');
    return false;
   }
 });
 $('#date_of_certificate').focusout(function() {
   var date_certificate=document.getElementById("date_of_certificate").value;  
   var date_of_appointment= document.getElementById("date_of_appointment").value;
   if( new Date(date_of_appointment).getTime()< new Date(date_certificate).getTime() )  {
      $('#date_of_certificate').val('');
      swal("",'Date of certificate should be less than date of appoinment');
    return false;
   }
 });
 /* $("#date_of_certificate").focusout(function() {
	var date_of_certificate = $(this).val();
    $("#date_of_appointment").attr("min", date_of_certificate);
});

$("#date_of_appointment").focusout(function() {
	var date_training = $(this).val();
    $("#date_of_certificate").attr("max", date_training);
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
      $('#date_of_consent').attr('max', maxDate);
	  $('#date_of_certificate').attr('max', maxDate);
	  //$('#date_of_appointment').attr('max', maxDate);
	  
	$("#appointment_type").change(function () {
        if ($(this).find("option:selected").val() == "1") {
            $("#years_appoinment").show();
        } else {
            $("#years_appoinment").hide();
        }
	});
	
	$('#certificate').hide();
	$('#consent_letter').hide();
	$('input[name=date_of_consent]').on('change', function() {
		var ismoreinfo = $(this).val();  
		if(ismoreinfo != "") {
			$('#consent_letter').show();
			
		}else{
			$('#consent_letter').hide();
		}
	});	
	
	$('input[name=date_of_certificate]').on('change', function() {
		var ismoreinfo = $(this).val();  
		if(ismoreinfo != "") {
			$('#certificate').show();
			
		}else{
			$('#certificate').hide();
		}
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
	
	$('#gram_panchayat').change(function(){
		var gram_panchayat = $("#gram_panchayat").val();
		getVillageList( gram_panchayat );
	});  
	$('#block').change(function(){
		 var block = $("#block").val();
		 getPanchayatList( block );
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

/** Fetching the table reference informations by using the charted accountant name & Registration number **/
$("#registration_num").focusout(function(){
	var registration_num = $(this).val();
    var fn = $("#registration_num").val();
    var regex = /^[0-9a-zA-Z\_]+$/;
    if((regex.test(fn))== false){
       $('#registration_num').val("");
    }
	var accountant_name = $("#accountant_name").val();
	if(registration_num!="" && accountant_name!=""){
		var accountant_info = {'accountant_name':accountant_name, 'registration_num':registration_num};
		$.ajax({
			url:"<?php echo base_url();?>staff/operation/getCharteredAccountantInformation",
			type:"POST",
			data:accountant_info,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                //console.log(responseArray);
                if(responseArray.status == 1 && responseArray.accountantInfo!= null) {    
                    $("#accountant_master_id").val(responseArray.accountantInfo.id);  
					$("#name_firm").val(responseArray.accountantInfo.firm_name);  
                    $("#firm_number").val(responseArray.accountantInfo.firm_reg_number);	
					$("#pin_code").val(responseArray.accountantInfo.pincode);					
					$("#state").html('<option value='+responseArray.accountantInfo.state_code+'>'+responseArray.accountantInfo.state_name+'</option>');  
					$("#district").html('<option value='+responseArray.accountantInfo.district+'>'+responseArray.accountantInfo.district_name+'</option>'); 
					$("#taluk_id").html('<option value='+responseArray.accountantInfo.taluk+'>'+responseArray.accountantInfo.taluk_name+'</option>'); 
					$("#block").html('<option value='+responseArray.accountantInfo.block+'>'+responseArray.accountantInfo.block_name+'</option>'); 
                    $("#gram_panchayat").html('<option value='+responseArray.accountantInfo.panchayat+'>'+responseArray.accountantInfo.panchayat_name+'</option>'); 	
					$("#village").html('<option value='+responseArray.accountantInfo.village+'>'+responseArray.accountantInfo.village_name+'</option>'); 
                    $("#street_name").val(responseArray.accountantInfo.street);	
					$("#door_no").val(responseArray.accountantInfo.door);   
                    $("#mobile_num").val(responseArray.accountantInfo.mobile);	
                    $("#std_code").val(responseArray.accountantInfo.std_code);	
					$("#landline_num").val(responseArray.accountantInfo.landline);   
                    $("#email_address").val(responseArray.accountantInfo.email);	
					$("#date_of_consent").val(responseArray.accountantInfo.consent_date);   
                    $("#date_of_certificate").val(responseArray.accountantInfo.certificate_date);	
                    $("#secretary_validate").html("<div class='alert alert-success'>Verify the displayed values and confirm</div>");
                } else {                                        
                    //$("#certificate_number").focus();                    
					$("#certificate_validate").html("<div class='alert alert-danger'>No records found</div>");
					//$("#secretary_validate").val('');
                } 
            }
        });  
	} else {
		swal("Sorry!", "Provide the Chartered Accountant Name & Register Number");
	}
});

</script>	 
</body>
</html>