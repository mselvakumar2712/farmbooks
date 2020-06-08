<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left:830px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none !important; 
    border-radius: 4px;
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
										<h1>Add FPO</h1>
								  </div>
							 </div>
						</div>
						<div class="col-sm-8">
							 <div class="page-header float-right">
								  <div class="page-title">
										<ol class="breadcrumb text-right">
											 <li><a href="#">Profile Management</a></li>
											 <li><a href="<?php echo base_url('administrator/fpo');?>">FPO</a></li>
											 <li class="active">Add FPO</li>
										</ol>
								  </div>
							 </div>
						</div>
				  </div>
					<div class="content mt-3">
						<div class="animated fadeIn">
							<div class="card">
								<div class="card-body">
									<form action="<?php echo base_url()?>administrator/fpo/postfpo" id="fpo_addForm" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
										<div id="smartwizard">
										<ul>
										<li><a style="width:80px;" href="#step-1">Step <br>1<br><small>FPO Details</small></a></li>
										<li><a style="width:80px;" href="#step-2">Step <br>2<br><small>Persuing</small></a></li>
										</ul>
											<div>
												<div  id="step-1">
													<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Select POPI <span class="text-danger">*</span></label>
																		<select class="form-control" id="popi_list" name="popi_name" required="required"  data-validation-required-message="Select POPI...">
																		<!--<option value="">Select State </option>-->
																		</select>
																	<div class="help-block with-errors text-danger mt-3"></div>
																</div>												
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																		<label for="inputAddress2">Name of the Producers Organisation <span class="text-danger">*</span></label>
																		<input type="text" class="form-control" maxlength="100"  name="producer_organisation_name"  id="producer_organisation_name" placeholder="Name of the Producers Organisation " required="required" data-validation-required-message="Please enter promoting institution name.">
																		<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																		<label for="inputAddress2">Pin Code <span class="text-danger">*</span></label>
																		<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="Pin Code" required="required" data-validation-required-message="Please enter pin code.">
																		<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																		<label for="inputAddress2">State <span class="text-danger">*</span></label>
																		<select id="state" class="form-control" readonly name="state" required="required"  data-validation-required-message="Please Select State .">
																		<option value="">Select State </option>
																		</select>
																		<!--<input class="form-control" id="state" name="state"  readonly placeholder="State" required="required" data-validation-required-message="state." >-->
																		<div class="help-block with-errors text-danger"></div>
																</div>
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																		<label for="inputAddress2">District <span class="text-danger">*</span></label>
																		<select id="district" class="form-control" readonly name="district" required="required"  data-validation-required-message="Please Select District .">
																		<option value="">Select District </option>
																		</select>
																		<!--<input type="text" class="form-control"  id="district" readonly name="district" placeholder="District" required="required" data-validation-required-message="Please enter district.">-->
																		<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																		<label for="inputAddress2">Block <span class="text-danger">*</span></label>
																		<select id="block" class="form-control" readonly name="block" required="required"  data-validation-required-message="Please Select Block .">
																		<option value="">Select Block </option>
																		</select>
																		<!--<input class="form-control" id="block" name="block"  readonly placeholder="Block" required="required" data-validation-required-message="Please enter block.">-->	
																		<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																		<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
																		<select id="taluk" class="form-control" readonly name="taluk" required="required"  data-validation-required-message="Please Select Taluk .">
																		<option value="">Select Taluk </option>
																		</select>
																		<!--<input class="form-control" id="taluk" name="taluk"  readonly placeholder="Taluk" required="required" data-validation-required-message="Please enter block.">-->	
																		<div class="help-block with-errors text-danger"></div>
																</div>
																
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">						    
																		<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
																		<select id="gram_panchayat" class="form-control" id="gram_panchayat" name="gram_panchayat" required="required" onchange="getVillageList(this.value);" data-validation-required-message="Please Select gram panchayat .">
																		<option value="">Select Gram Panchayat </option>
																		</select>
																		<div class="help-block with-errors text-danger"></div>
																</div>															
																<div class="form-group col-md-4">                            
																		<label for="inputAddress2">Village <span class="text-danger">*</span></label>
																		<select id="village" class="form-control" id="village" name="village" required="required" data-validation-required-message="Please enter village.">
																		<option value="">Select Village</option>
																		</select>
																		<div class="help-block with-errors text-danger"></div>
																</div>	
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Street</label>
																	<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street">
																</div>
																
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Door No</label>
																	<input type="text" class="form-control" maxlength="10" id="door_no" name="door_no" placeholder="Door No">
																</div>
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Land Line Number – STD Code</label>
																	<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" id="std_code" maxlength="8" minlength="3" name="std_code" placeholder="STD Code">
																	<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Land Line Number  </label>
																	<input class="form-control numberOnly" maxlength="8" minlength="6" id="land_line" name="land_line"  placeholder="Land Line Number ">				
																	<div class="help-block with-errors text-danger"></div>
																</div>
																
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
																	<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="10" id="mobile_num" name="mobile_num" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
																	<div id="mbl_validate" class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Email Address <span class="text-danger">*</span></label>
																	<input type="email" class="form-control"  id="email" name="email" placeholder="Email Address " required="required" data-validation-required-message="Please enter email address.">
																	<div class="help-block with-errors text-danger"></div>
																</div>
																<div class="form-group col-md-4">
																<label class=" form-control-label">Constitution <span class="text-danger">*</span></label>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio1" class="form-check-label">
																					<input type="radio" id="constitution" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Company</span>	
																				</label>
																			</div> 
																		</div>
																		<div class="col-md-6">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio2" class="form-check-label">
																					<input type="radio" id="constitution" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Society</span>
																				</label>
																			</div>
																		</div>			
																	</div>
																	<div class="help-block with-errors text-danger"></div>
															</div>
															
														</div>
													</div>
												</div>
												<div  id="step-2">
													<div id="form-step-1" class="form-horizontal" role="form" data-toggle="validator">								
														<div class="form-group col-md-12 mt-1">
															<div class="form-group col-md-4">
																<label for="inputAddress2">Formation Date <span class="text-danger">*</span></label>
																<input type="date" class="form-control"  name="date_formation"  id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31">
																<div class="help-block with-errors text-danger"></div>
															</div>
															<div class="form-group col-md-4">
																<label for="inputAddress2">Registration Number(CIN)/Society <span class="text-danger">*</span></label>
																	<input type="text" class="form-control" maxlength="21"  name="reg_no"  id="reg_no" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." >
																	<div class="help-block with-errors text-danger"></div>
															</div>
															<div class="form-group col-md-4">
																<label for="inputAddress2">Permanent Account Number(PAN) <span class="text-danger">*</span> </label>
																	<input type="text" class="form-control"  maxlength="10" id="pan" name="pan" placeholder="Ex:AAAAA0000A" required="required" data-validation-required-message="Please enter pan.">
																	<div class="help-block with-errors text-danger"></div>
															</div>
															
														</div>
														<div class="form-group col-md-12 mt-1">
															<div class="form-group col-md-4">
																<label for="inputAddress2">Tax Deduction Account(TAN)</label>
																<input type="text" class="form-control" id="tax_deduction" maxlength="10" name="tax_deduction" placeholder="Ex:AAAA00000A" required="required" data-validation-required-message="Please enter tax deduction account.">
															</div>
															<div class="form-group col-md-4">
																<label for="inputAddress2">Goods & Service Tax Number (GST)</label>
																<input type="text" class="form-control"  name="gst" maxlength="15" pattern="([0][1-9]|[1-2][0-9]|[3][0-5])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$" id="gst" placeholder="Ex:33AAAAA0000A1Z1" required="required" data-validation-required-message="Please enter GST">
															</div>
															<div class="form-group col-md-4">
																<label for="inputAddress2">IE Code Number</label>
																<input type="text" class="form-control"  name="ie_code" maxlength="10" id="ie_code" placeholder="IE Code Number" required="required" data-validation-required-message="Please enter GST">
															</div>
														</div>
														<div class="form-group col-md-12 mt-1">
															<div class="form-group col-md-6">
																<label class=" form-control-label">Type Of Business <span class="text-danger">*</span></label>
																	<div class="row">
																		<div class="col-md-5">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio1" class="form-check-label">
																					<input type="checkbox" id="business_type" name="business_type[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select.">Manufacturing
																					
																				</label>
																			</div> 
																		</div>
																		<div class="col-md-4">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio2" class="form-check-label">
																					<input type="checkbox" id="business_type" name="business_type[]" value="option2" class="form-check-input" data-validation-required-message="Please select.">Trading
																							
																				</label>
																			</div>
																		</div>	
																		<div class="col-md-3">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio2" class="form-check-label">
																					<input type="checkbox" id="business_type" name="business_type[]" value="option3" class="form-check-input"  data-validation-required-message="Please select.">Service
																							
																				</label>
																			</div>
																		</div>
																	</div>
																	<div class="help-block with-errors text-danger"></div>			
															</div>
															<div class="form-group col-md-6">
																<label for="inputAddress">Nature of Business <span class="text-danger">*</span></label>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio1" class="form-check-label">
																					<input type="checkbox" id="business_nature" name="business_nature[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select.">Rice
																				</label>
																			</div> 
																		</div>
																		<div class="col-md-4">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio2" class="form-check-label">
																					<input type="checkbox" id="business_nature" name="business_nature[]" value="option2" class="form-check-input"  data-validation-required-message="Please select.">Corn
																				</label>
																			</div>
																		</div>	
																		<div class="col-md-4">
																			<div class="form-check-inline form-check">
																				<label for="inline-radio2" class="form-check-label">
																					<input type="checkbox" id="business_nature" name="business_nature[]" value="option3" class="form-check-input" data-validation-required-message="Please select.">Wheat
																				</label>
																			</div>
																		</div>										
																	</div>
																	<div class="help-block with-errors text-danger"></div>								  
															</div>
														</div>
														<div class="form-group col-md-12 mt-1">
															<div class="form-group col-md-4">
																<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span></label>
																	<input type="text" class="form-control"  name="contact_person_name"  id="contact_person_name" placeholder="Name of the Contact Person" required="required" data-validation-required-message="Please enter contact person name.">
																	<div class="help-block with-errors text-danger"></div>
															</div>
															<div class="form-group col-md-4">
																<label class=" form-control-label">Inventory Required <span class="text-danger">*</span></label>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-check-inline form-check">
																			<label for="inline-radio1" class="form-check-label">
																				<input type="radio" id="inventory_required" name="inventory_required" value="1" class="form-check-input" required="required" data-validation-required-message="Please select inventory.">Yes
																				<div class="help-block with-errors text-danger"></div>
																			</label>
																		</div> 
																	</div>
																	<div class="col-md-6">
																		<div class="form-check-inline form-check">
																			<label for="inline-radio2" class="form-check-label">
																				<input type="radio" id="inventory_required" name="inventory_required" value="2" class="form-check-input" required="required" data-validation-required-message="Please select inventory.">No
																				<div class="help-block with-errors text-danger"></div>
																			</label>
																		</div>
																	</div>			
																</div>
																<div class="help-block with-errors text-danger"></div>
															</div>
															<div class="form-group col-md-4">
																<label for="inputAddress2">Financial Year Begins From <span class="text-danger">*</span></label>
																<input type="date" class="form-control"  name="financial_year" id="financial_year" value="2018-04-01" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31">
																<div class="help-block with-errors text-danger"></div>
															</div>
															</div>
															<div class="form-group col-md-12 mt-1">
																<div class="form-group col-md-4">
																	<label for="inputAddress2">Business Commence From <span class="text-danger">*</span></label>
																	<input type="date" class="form-control"  name="business_commence_from" maxlength="10" id="business_commence_from" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31">
																	<div class="help-block with-errors text-danger"></div>
																</div>
															</div>
														</div>
													          							
														<div class="col-md-12 text-center">
															<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
															<a href="<?php echo base_url('administrator/fpo');?>" id="" class="btn btn-outline-dark">Cancel</a>
														</div>
												</div>
											</div>													           
										</div>	
									</form>
								</div>							
							</div>
						</div>
					</div>
        </div>
	</div>
	
	<!-- .animated -->
</div><!-- .content -->
</div>     	
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>js/select2.min.js"></script>
<script>
$(document).ready(function(){
// Toolbar extra buttons
var btnFinish = $('<button></button>').text('Finish')
.addClass('btn btn-info')
.on('click', function(){
	if( !$(this).hasClass('disabled')){
		var elmForm = $("#fpo_addForm");
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
var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger')
.on('click', function(){
	$('#smartwizard').smartWizard("reset");
	$('#fpo_addForm').find("input, textarea").val("");
});



// Smart Wizard
$('#smartwizard').smartWizard({
selected: 0,
theme: 'circles',
transitionEffect:'fade',
toolbarSettings: {toolbarPosition: 'bottom'
				 // toolbarExtraButtons: [btnFinish, btnCancel]
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
});
        
        
function getPincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);                
				response=response.trim();responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {
                    var village = '<option value="">Select Village</option>';
                    var state = '';var district = '';var block ='';var taluk ='';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                    $.each(responseArray.getlocation['villageInfo'],function(key, value){
                        village += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                        gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
                       block += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['cityInfo'],function(key, value){
                        district += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
                        state += '<option value='+value.id+'>'+value.name+'</option>'
                    });
                    $('#village').html(village);
                    $('#gram_panchayat').html(gram_panchayat);
					$('#state').html(state);
					$('#district').html(district);
					$('#block').html(block);
					$('#taluk').html(taluk);
                } else {
                    alert(responseArray.message);
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
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
                var village = "";var gram_panchayat = "";
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
        
        
//FPO ADD API Call
$('form').submit(function(e){
	e.preventDefault();
	const fpodata = $('#fpo_addForm').serializeObject();
	console.log(fpodata);
		 $.ajax({
			url:"<?php echo base_url();?>administrator/fpo/postfpo",
			type:"POST",
			data:fpodata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/fpo')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
			}); 
});
        
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
		
			$('#pan').change(function (event) { 
				var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
				var txtpan = $(this).val(); 
				if (txtpan.length == 10 ) { 
				if( txtpan.match(regExp) ){ 
				alert('PAN match found');
				}
				else {
				alert('Not a valid PAN number');
				event.preventDefault(); 
				} 
				} 
				else { 
				alert('Please enter 10 digits for a valid PAN number');
				event.preventDefault(); 
				}  
			});
			
			$('#tax_deduction').change(function (event) { 
				var regExp = /[a-zA-z]{4}\d{5}[a-zA-Z]{1}/; 
				var txtpan = $(this).val(); 
				if (txtpan.length == 10 ) { 
				if( txtpan.match(regExp) ){ 
				alert('TAN match found');
				}
				else {
				alert('Not a valid TAN number');
				event.preventDefault(); 
				} 
				} 
				else { 
				alert('Please enter 10 digits for a valid TAN number');
				event.preventDefault(); 
				}  
			});
			$('#gst').change(function (event) { 
				var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/; 
				var txtgst = $(this).val(); 
				if (txtgst.length == 15 ) { 
				if( txtgst.match(regExp) ){ 
				alert('GST match found');
				}
				else {
				alert('Not a valid GST number');
				event.preventDefault(); 
				} 
				} 
				else { 
				alert('Please enter 15 digits for a valid GST number');
				event.preventDefault(); 
				}  
			});
		
// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
	//$("#financial_year").val(new Date().toISOString().substring(0, 10));
   //document.getElementById("financial_year").innerHTML = d;
    
    

    $('#popi_list').select2();

        //POPI list API CALL
				$.ajax({
						url: "<?php echo base_url();?>administrator/popi/popi_list",
						type: "GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						console.log(response);
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.popi_list);
						 if(responseArray.status == 1){
							var popilist = '<option value="">Select POPI</option>';
							$.each(responseArray.popi_list,function(key,value){
							 popilist += '<option value='+value.id+'>'+value.institution_name+'</option>';
							});
							$('#popi_list').html(popilist);
							} 
						},
						error:function(){
						
						$('#example').DataTable();
						} 
						});
});    



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
											  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
										 } 
									}
								});            
						 }
						 
					}

</script>
</body>
</html>