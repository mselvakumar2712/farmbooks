<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<style>
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left: 830px;
}
</style>
<body>
	<div class="container-fluid pl-0 pr-0">
	<?php $this->load->view('templates/side-bar.php');?>
	<!-- Right Panel -->
		<div id="right-panel" class="right-panel">
		<?php $this->load->view('templates/menu-inner.php');?>
		<!-- Header-->
			<div class="breadcrumbs">
				<div class="col-sm-4">
					<div class="page-header float-left">
						<div class="page-title">
							<h1> Add POPI</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Profile Management</a></li>
								<li><a href="<?php echo base_url('administrator/popi');?>">POPI</a></li>
								<li class="active">Add POPI</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-body">
							<form action="<?php echo base_url()?>administrator/popi/postpopi" id="addpopi_Form" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
								<div id="smartwizard">
									<ul class="nav nav-tabs">
										<li><a style="width:80px;" href="#step-1">Step<br> 1<br /><small>POPI Details</small></a></li>
										<li><a style="width:80px;" href="#step-2" class="nav-left">Step <br>2<br /><small>Persuing</small></a></li>
									</ul>
									<div>
										<div  id="step-1">
											<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4 ">
													<label class=" form-control-label">Type of Promoting Institution <span class="text-danger">*</span> </label>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="institution_type1" class="form-check-label">
																	<input type="radio" id="institution_type1" name="institution_type" value="1" class="form-check-input " required><span class="ml-1">POPI</span>
																</label>
															</div> 
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="institution_type2" class="form-check-label">
																	<input type="radio" id="institution_type2" name="institution_type" value="2" class="form-check-input ml-1" required><span class="ml-1">Federation</span>
																</label>
															</div>
														</div>			
													<div class="help-block with-errors text-danger"></div>
												</div>  
												<div class="form-group col-md-4 ">
													<label for="inputAddress2">Name of the Promoting Institution <span class="text-danger">*</span></label>
														<input type="text" class="form-control" min="3" max="100" name="institution_name"  id="institution_name" placeholder="Name of the Promoting Institution " required>
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
												    <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" maxlength="6" minlength="6" id="pin_code" name="pin_code" placeholder="PINCODE" required>
													<div class="help-block with-errors text-danger" id="pincode_validate"></div>
												</div>
											</div>
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
														<label for="inputAddress2">State <span class="text-danger">*</span></label>
														<select  class="form-control sel_state" id="state" name="state" readonly placeholder="State" required>
															<option value="">Select State </option>
														</select>
														<!--<input class="form-control" id="state" name="state"  readonly placeholder="State" required>	-->			
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span></label>
														<select  class="form-control sel_district" id="district" name="district" readonly placeholder="District" required>
															<option value="">Select District </option>
														</select>
														<!--<input type="text" class="form-control "  id="district" readonly name="district" placeholder="District" required>-->
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Taluk</label>
													<select  class="form-control sel_taluk" id="taluk_id" name="taluk"  placeholder="Taluk">
															<option value="">Select Taluk </option>
														</select>
													<!--<input type="text" class="form-control" id="taluk" name="taluk" placeholder="Taluk" readonly required="required" data-validation-required-message="Please enter taluk.">-->
													 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
											<div class="form-group col-md-12 mt-1">												
												<div class="form-group col-md-4">
														<label for="inputAddress2">Block </label>
														<select  class="form-control sel_block" id="block" name="block"  onchange="getPanchayatList(this.value);" placeholder="Block">
															<option value="">Select Block </option>
														</select>
														<!--<input class="form-control" id="block" name="block" readonly  placeholder="Block">-->				
												</div>
												<div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat </label>
														<select  class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" onchange="getVillageList(this.value);">
															<option value="">Select Gram Panchayat </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">	
													<label for="inputAddress2">Village </label>
													<select  class="form-control sel_village" id="village" name="village">
                                                        <option value="">Select Village </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>	
												
											</div>
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Door No </label>
													<input type="text" class="form-control" maxlength="10" id="door_no" name="door_no" placeholder="Door No">
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Street</label>
													<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street">
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Landline Number – STD Code </label>
													<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." id="std_code" maxlength="8" name="std_code" title="Landline number starts with '0'" placeholder="Ex:012">
													<div class="help-block with-errors text-danger"></div>
												</div>
												
											</div>
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Landline Number </label>
													<input type="text" class="form-control numberOnly" minlength="6"   maxlength="8" id="land_line" name="land_line"  placeholder="Landline Number ">				
												<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
													<input type="text" class="form-control numberOnly" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number." onfocusout="verifyMobileNumber(this.value)">
													<div id="mbl_validate" class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">E-Mail Address <span class="text-danger">*</span></label>
													<input type="email" class="form-control"  id="email" name="email" placeholder="E-Mail Address " required="required" data-validation-required-message="Please enter email address.">
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>
										</div>
										</div>
										<div  id="step-2">
											<div id="form-step-1" class="form-horizontal" role="form" data-toggle="validator">
												<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
													<label class=" form-control-label">Constitution <span class="text-danger">*</span></label>
													<div class="row">
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="constitution1" class="form-check-label">
																	<input type="radio" id="constitution1" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Trust</span>
																</label>
															</div> 
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="constitution2" class="form-check-label">
																	<input type="radio" id="constitution2" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Society</span>
																</label>
															</div>
														</div>			
													</div>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
														<label for="inputAddress2">Date of Formation <span class="text-danger">*</span></label>
														<input type="date" class="form-control" id="date_formation" value="<?php echo $date_formation;?>" onfocusout="calculatedate(this.value);" name="date_formation"  placeholder="Date of Formation"  required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow">
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
														<label for="inputAddress2">PAN of the Promoting Institution <span class="text-danger">*</span>  </label>
														<input type="text" class="form-control text-uppercase"   id="pan_promoting_institution" maxlength="10" name="pan_promoting_institution" placeholder="EX:AAAPL1234C" required="required" data-validation-required-message="Please enter pan of promoting institution.">
														<div class="help-block with-errors text-danger"></div>
												</div>
											</div>
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
														<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span> </label>
														<input type="text" class="form-control" maxlength="50"  id="contact_person" name="contact_person" placeholder="Name of the Contact Person  " required="required" data-validation-required-message="Please enter name of the contact person.">
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
														<label for="inputAddress2">Nature of Activity <span class="text-danger">*</span></label>
														<select class="form-control" id="nature_activity" name="nature_activity"  required="required" data-validation-required-message="Please select nature of activity.">
															<option value="">Select Nature of Activity</option>
															<option value="1">Charitable</option>
															<option value="2">Agri</option>
															<option value="3">Social</option>
															<option value="4">Education</option>										
														</select>
														<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Financial Year Begins  <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="financial_year" value="<?php echo $financial_year?>" id="financial_year" placeholder="Financial Year Begins" required="required" data-validation-required-message="Please enter financial year begins from."  title="If need date picker, click the arrow " value="<?php echo $financial_year;?>">
													<div class="help-block with-errors text-danger" id="validate_date1"></div>
												</div>
											</div>
											<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Business Commence From <span class="text-danger">*</span> </label>
													<input type="date" class="form-control"  name="business_commence"  onfocusout="calculatedate(this.value);" id="business_commence" placeholder="Business Commence From " required="required"  data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow " >
													<div class="help-block with-errors text-danger" id="validate_date"></div>
												</div>
												<div class="form-group col-md-4">
													<label class=" form-control-label">Status <span class="text-danger">*</span></label>
														<div class="row">
															<div class="col-md-6">
																<div class="form-check-inline form-check">
																	<label for="status1" class="form-check-label">
																		<input type="radio" id="status1" name="status" value="1" checked class="form-check-input" required="required" data-validation-required-message="Please select status."><span class="ml-1">Active</span>
																	</label>
																</div> 
															</div>
															<div class="col-md-6">
																<div class="form-check-inline form-check">
																	<label for="status2" class="form-check-label">
																		<input type="radio" id="status2" name="status" value="2" class="form-check-input" required="required" data-validation-required-message="Please select status."><span class="ml-1">Inactive</span>
																	</label>
																</div>
															</div>			
														</div>
													<div class="help-block with-errors text-danger"></div>
												</div>
												</div>
												</div>
												
												<div class="col-md-12 text-center">
												<button id="sendMessageButton" class="btn-fs btn btn-success mt-4 text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/popi');?>" class="btn-fs btn btn-outline-dark mt-4 "><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	

												</div>
												
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- .animated -->
		</div><!-- .content -->
	</div>     	
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>

<script>
//white spaces 
$(function() {
     $('.form-control').on('keypress', function(e) {
         if (e.which == 32){
			 var newStr = $(this).val().length;
			if(newStr){
				 return true;
			}
			  return false;
		 }else{
			 return true;
		 }
            
     });
 });  


   
$("#sendMessageButton").click(function() {
  var startDt=document.getElementById("date_formation").value;
  var endDt=document.getElementById("business_commence").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#validate_date").html("Selected date should be LATER than Formation date");
    return false;
  }
  }
  
  var startDt=document.getElementById("financial_year").value;
  var endDt=document.getElementById("business_commence").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#validate_date1").html("Selected date should not be Greater than Business Commence from");
    return false;
  }
  }
  
  
  
  
});  
 
function calculatedate (date_formation) {
	
	document.getElementById("business_commence").value = date_formation;	
	
}

var btnFinish = $('<button></button>').text('Finish')
		.addClass('btn btn-info')
		.on('click', function(){
				 if( !$(this).hasClass('disabled')){
					  var elmForm = $("#addpopi_Form");
					  if(elmForm){
							elmForm.validator('validate');
							var elmErr = elmForm.find('.has-error');
							if(elmErr && elmErr.length > 0){
								 alert('Oops we still have error in the form');
								 return false;
							}else{
								 alert('Great! we are ready to submit form');
								 elmForm.submit();
								 return false;
							}
					  }
				 }
			});
var btnCancel = $('<button></button>').text('Cancel')
					.addClass('btn btn-danger')
					.on('click', function(){
							 $('#smartwizard').smartWizard("reset");
							 $('#addpopi_Form').find("input, textarea").val("");
						});
						$('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'circles',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom'
                                      //toolbarExtraButtons: [btnFinish, btnCancel]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });
					  
				$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                  var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if(stepDirection === 'forward' && elmForm){
                    elmForm.validator('validate');
                    var elmErr = elmForm.children().children('.has-error');
                    if(elmErr && elmErr.length > 0){
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });
				$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if(stepNumber == 3){
                    $('.btn-finish').removeClass('disabled');
                }else{
                    $('.btn-finish').addClass('disabled');
                }
            });
				 $('.btnNext').click(function(){
				  $('.tablink > .active').next('tabcontent').find('tab').trigger('click');
			});
			$('.btnPrevious').click(function(){
			  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
			});
			
			$(document).ready(function(){
				
			 $('#pan_promoting_institution').change(function (event) { 
		
 var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
 var txtpan = $(this).val(); 
 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
  // alert('PAN match found');
  }
  else {
  $("#pan_promoting_institution").val('');
   alert('Not a valid PAN number');
  $("#pan_promoting_institution").focus();
   event.preventDefault();
  } 
 } 
 else { 
       $("#pan_promoting_institution").val('');
       alert('Please enter 10 digits for a valid PAN number');
     $("#pan_promoting_institution").focus();
       event.preventDefault();      
 }  
});
});

	/* function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
    	return true;
    }
}; */ 
			
				
//POPI ADD API Call
$(document).ready(function() {
   $.fn.serializeObject = function() {
     var o = {};
     var a = this.serializeArray();
     $.each(a, function() {
       if (o[this.name] !== undefined) {
         if (!o[this.name].push) {
           o[this.name] = [o[this.name]];
         }
         o[this.name].push(this.value || '');
       } else {
         o[this.name] = this.value || '';
       }
     });
     return o;
   };
}) 
 
function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            console.log(response);
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
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);

                 var village = '<option value="">Select Village</option>';
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

function verifyMobileNumber(mobilenumber) {
    if(mobilenumber.length == 10 && (mobilenumber.charAt(0) == 6 || mobilenumber.charAt(0) == 7 || mobilenumber.charAt(0) == 8 || mobilenumber.charAt(0) == 9)) {
       $.ajax({
			url:"<?php echo base_url();?>administrator/Login/checkusername/"+mobilenumber,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);mbl_validate
                if(responseArray.status == 1){
                    $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
				} else {
                     $("#mobile_num").val('');
							$("#mobile_num").focus();
                    $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                } 
            }
         });            
    }
    
}  

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
      $('#date_formation').attr('max', maxDate);
		$('#business_commence').attr('max', maxDate);
		$('#financial_year').attr('max', maxDate);
		
  });   
</script>
</body>
</html>