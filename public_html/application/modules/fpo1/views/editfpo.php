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
.select2-container .select2-selection--single .select2-selection__rendered
{
	display:none;
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
                        <h1>View FPO </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('administrator/fpo');?>">FPO </a></li>
                            <li class="active">View FPO</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<div class="card">
			<div class="card-body">
			    <form action="#" id="editfpo_Form" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
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
											<select class="form-control" id="popi_list" name="popi_name" required="required" readonly data-validation-required-message="Select POPI...">
											<!--<option value="">Select State </option>-->
											</select>
										<div class="help-block with-errors text-danger mt-3"></div>
									</div>												
								</div>
							<div class="form-group col-md-12 mt-1">
									<div class="form-group col-md-4">
										<input type="hidden" name="fpo_id" value="<?php echo $_REQUEST['id']?>" id="fpo_id">
										<label for="inputAddress2">Name of the Producers Organisation <span class="text-danger">*</span></label>
										<input type="text" class="form-control" maxlength="100"  name="producer_organisation_name"  id="producer_organisation_name" placeholder="Name of the Producers Organisation " required="required" data-validation-required-message="Please enter promoting institution name." disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Pin Code <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="Pin Code" required="required" data-validation-required-message="Please enter pin code."disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">                                    
									<label for="inputAddress2">State <span class="text-danger">*</span></label>
									<select  class="form-control" id="state" name="state" readonly placeholder="State" required>
										<option value="">Select State </option>
									</select>
									<!--<input class="form-control" id="state" name="state"   placeholder="State"readonly>-->
									<div class="help-block with-errors text-danger"></div>
								</div>
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">District <span class="text-danger">*</span></label>
									<select  class="form-control" id="district" name="district" readonly placeholder="District" required>
										<option value="">Select District </option>
									</select>
									<!--<input type="text" class="form-control numberOnly"  id="district" name="district" placeholder="District" required="required" data-validation-required-message="Please enter district."readonly>-->
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Block <span class="text-danger">*</span></label>
									<select  class="form-control" id="block" name="block" readonly placeholder="Block" required>
										<option value="">Select Block </option>
									</select>
									<!--<input class="form-control" id="block" name="block"   placeholder="Block" required="required" data-validation-required-message="Please enter block."readonly>-->	
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
									<select  class="form-control" id="taluk" name="taluk" readonly placeholder="Taluk" required>
										<option value="">Select Taluk </option>
									</select>
									<!--<input class="form-control" id="taluk" name="taluk"   placeholder="Taluk" required="required" data-validation-required-message="Please enter taluk."readonly>-->	
									<div class="help-block with-errors text-danger"></div>
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">						    
									<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
									<select  class="form-control" id="panchayat" name="panchayat" disabled required="required" data-validation-required-message="Please select gram panchayat." onchange="getVillageList(this.value);">
									<option value="">Select Gram Panchayat </option>
									</select>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">						    
									<label for="inputAddress2">Village <span class="text-danger">*</span></label>
									<select class="form-control" id="village" name="village" disabled required="required" data-validation-required-message="Please select village."> 
									<option value="">Select Village </option>
									</select>
									<div class="help-block with-errors text-danger"></div>
								</div>	
								<div class="form-group col-md-4">
									<label for="inputAddress2">Street</label>
									<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street" disabled>
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Door No</label>
									<input type="text" class="form-control" maxlength="10" id="door_no" name="door_no" placeholder="Door No"disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Land Line Number – STD Code</label>
									<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{3,8}$" id="std_code" name="std_code" placeholder="STD Code"disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Land Line Number  </label>
									<input class="form-control numberOnly"  maxlength="8" id="land_line" name="land_line"  placeholder="Land Line Number "disabled>				
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
									<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" id="mobile" name="mobile" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number."disabled>
									<div id="mbl_validate" class=" help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Email Address <span class="text-danger">*</span> </label>
									<input type="email" class="form-control"  id="email" name="email" placeholder="Email Address " required="required" data-validation-required-message="Please enter email address."disabled>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
											<label class=" form-control-label">Constitution <span class="text-danger">*</span></label>
											<div class="row">
											<div class="col-md-6">
											<div class="form-check-inline form-check">
											<label for="inline-radio1" class="form-check-label">
											<input type="radio" id="constitution" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled><span class="ml-1">Company</span>
											<div class="help-block with-errors text-danger"></div>
											</label>
											</div> 
											</div>
											<div class="col-md-6">
											<div class="form-check-inline form-check">
											<label for="inline-radio2" class="form-check-label">
											<input type="radio" id="constitution" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled><span class="ml-1">Society</span>
											<div class="help-block with-errors text-danger"></div>
											</label>
											</div>
											</div>			
											</div>
									</div>
									
								</div>
							</div>
						</div>	
							<div  id="step-2">
							    <div id="form-step-1" class="form-horizontal" role="form" data-toggle="validator">								
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-4">
										<label for="inputAddress2">Formation Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  name="date_formation"  id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow "disabled min="2018-01-01" max="2050-12-31">
										<div class="help-block with-errors text-danger"></div>
									</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Registration Number(CIN)/Society <span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="21"  name="reg_no"  id="reg_no" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." disabled>
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Permanent Account Number(PAN) <span class="text-danger">*</span></label>
											<input type="text" class="form-control"  maxlength="10" id="pan" name="pan" placeholder="Ex:AAAAA1111A" required="required" data-validation-required-message="Please enter pan."disabled>
											<div class="help-block with-errors text-danger"></div>
										</div>
									</div>
									<div class="form-group col-md-12 mt-1">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Tax Deduction Account(TAN)</label>
												<input type="text" class="form-control" id="tax_deduction" maxlength="10" name="tax_deduction" placeholder="Ex:AAAA11111A" required="required" data-validation-required-message="Please enter tax deduction account."disabled>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Goods & Service Tax Number (GST)</label>
												<input type="text" class="form-control"  name="gst" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" required="required" data-validation-required-message="Please enter GST"disabled>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IE Code Number</label>
												<input type="text" class="form-control"  name="ie_code" maxlength="10" id="ie_code" placeholder="IE Code Number" required="required" data-validation-required-message="Please enter GST"disabled>
											</div>
										</div>
										
									</div>
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-6">
											<label class=" form-control-label">Type Of Business <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="business_type" name="business_type[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Manufacturing
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="business_type" name="business_type[]" value="option2" class="form-check-input"  data-validation-required-message="Please select."disabled>Trading
												</label>
												</div>
											</div>	
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="business_type" name="business_type[]" value="option3" class="form-check-input"  data-validation-required-message="Please select."disabled>Service
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
												  <input type="checkbox" id="business_nature" name="business_nature[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Rice
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="business_nature" name="business_nature[]" value="option2" class="form-check-input"  data-validation-required-message="Please select."disabled>Corn
												</label>
												</div>
											</div>	
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="business_nature" name="business_nature[]" value="option3" class="form-check-input"  data-validation-required-message="Please select."disabled>Wheat
												</label>
												</div>
											</div>	
											<div class="help-block with-errors text-danger"></div>											
										  </div>
																  
									  </div>
									</div>
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-4">
												<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span></label>
												<input type="text" class="form-control"  name="contact_person"  id="contact_person" placeholder="Name of the Contact Person" required="required" data-validation-required-message="Please enter contact person name."disabled>
												<div class="help-block with-errors text-danger"></div>
											</div>
									  <div class="form-group col-md-4">
										<label class=" form-control-label">Inventory Required <span class="text-danger">*</span></label>
									  <div class="row">
										<div class="col-md-6">
										  <div class="form-check-inline form-check">
											<label for="inline-radio1" class="form-check-label">
											  <input type="radio" id="inventory_required" name="inventory_required" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution." disabled><span class="ml-1">Yes</span>
											</label>
										  </div> 
										</div>
										<div class="col-md-6">
										  <div class="form-check-inline form-check">
											<label for="inline-radio2" class="form-check-label">
											  <input type="radio" id="inventory_required" name="inventory_required" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution." disabled><span class="ml-1">No</span>
											</label>
											</div>
										</div>
																	
									  </div>
									  <div class="help-block with-errors text-danger"></div>
									 </div>
									 <div class="form-group col-md-4">
									<label for="inputAddress2">Financial Year Begins From <span class="text-danger">*</span></label>
									<input type="date" class="form-control"  name="financial_year" id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31"disabled>
									<div class="help-block with-errors text-danger"></div>
									</div>
									
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Business Commence From <span class="text-danger">*</span></label>
									<input type="date" class="form-control"  name="business_from" maxlength="10" id="business_commence_from" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31"disabled>
									<div class="help-block with-errors text-danger"></div>
									</div>
								</div>
                     </div>													           
						</div>	
					  </div>
					 <div class="col-md-12 text-center">
								<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
								<a href="#" id="" class="del btn btn-danger">Delete</a>	
								<a href="<?php echo base_url('administrator/fpo');?>" id="ok" class="btn btn-success">OK</a>
								<a href="<?php echo base_url('administrator/fpo');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
						//  toolbarExtraButtons: [btnFinish, btnCancel]
						},
		anchorSettings: {
					markDoneStep: true, // add done css
					markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
					removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
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
	$('#edit').click(function(){
	$('#editfpo_Form').toggleClass('view');
	$("#sendMessageButton").show();
	$("#cancel").show();
	$("#edit").hide();
	$("#ok").hide();	
	$('input').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		 document.getElementById("sendMessageButton").disabled =false;
		 document.getElementById("cancel").disabled =false;
		}
		else {
		  inp.attr('disabled', 'disabled');
		}
	});
	$('select').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		 document.getElementById("sendMessageButton").disabled =false;
		 document.getElementById("cancel").disabled =false;
		}
		else {
		  inp.attr('disabled', 'disabled');
		}
	});
});
	$('a.del').click(function() {
		var fpo_id = <?php echo $_REQUEST['id']?>;
		swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
         if (result.value) {          
            $(this).prop("disabled", true);
            $.ajax({
              url: "<?php echo base_url();?>administrator/Fpo/deletefpo/"+fpo_id,
              type: "POST",
              data: {
                 this_delete: fpo_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('administrator/fpo')?>");
                 }, 1000);
              },
              error: function() {
                 
                 setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 1000);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "You have cancelled the FPO delete action", "info");
            return false;
         }
      });
	});
	
});

//edit fpo API CALL
 $(document).ready(function(){
	  //edit popi API CALL
	var fpo_id =<?php echo $_REQUEST['id']?>;
	//jQuery method
	$.ajax({
	url: "<?php echo base_url();?>administrator/Fpo/editfpo/"+fpo_id,
	type: "GET",
	dataType:"html",
	cache:false,			
	success:function(response){		  
	console.log(response);
	//alert(response);
	response=response.trim();
	responseArray=$.parseJSON(response);
	 if(responseArray.status == 1){
	document.getElementById("producer_organisation_name").value=responseArray.fpo_list[0].producer_organisation_name;
	document.getElementById("pin_code").value=responseArray.fpo_list[0].pin_code;
	document.getElementById("state").value=responseArray.fpo_list[0].state;
	document.getElementById("popi_list").value=responseArray.fpo_list[0].popi_id;
	document.getElementById("district").value=responseArray.fpo_list[0].district;
	document.getElementById("block").value=responseArray.fpo_list[0].block;
	//document.getElementById("panchayat").value=responseArray.fpo_list[0].panchayat;
	//document.getElementById("village").value=responseArray.fpo_list[0].village;
	document.getElementById("street").value=responseArray.fpo_list[0].street;
	var pincode=responseArray.fpo_list[0].pin_code;
	var panchayat=responseArray.fpo_list[0].panchayat;
	var village=responseArray.fpo_list[0].village;
	 getPincode( pincode );
	/* $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pincode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
				response=response.trim();
				responseArray=$.parseJSON(response);
				document.getElementById("taluk").value = responseArray.getlocation['taluk'];
                document.getElementById("panchayat").value = responseArray.getlocation['office_name'];
                document.getElementById("village").value = responseArray.getlocation['office_name'];
                $('#panchayat').html('<option value="0">Select Gram Panchayat </option>');
                $('#village').html('<option value="0">Select Village </option>');
                var pancahayatArray = responseArray.panchayat;
                $.each(pancahayatArray,function(key,value){ 
                 var panch_name = value.office_name;
				 if(value.id==panchayat){
					 
					   $('#panchayat').append('<option value='+value.id+' selected="selected">'+panch_name+'</option>');
				  }
				  
				  if(value.id==village){
					   $('#village').append('<option value='+value.id+' selected="selected">'+panch_name+'</option>');
				  }
				  $('#panchayat').append('<option value='+value.id+'>'+panch_name+'</option>');
                  $('#village').append('<option value='+value.id+'>'+panch_name+'</option>');
                });
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); */
	document.getElementById("door_no").value=responseArray.fpo_list[0].door_no;
	document.getElementById("std_code").value=responseArray.fpo_list[0].std_code;
	document.getElementById("land_line").value=responseArray.fpo_list[0].land_line;
	document.getElementById("mobile").value=responseArray.fpo_list[0].mobile;
	document.getElementById("email").value=responseArray.fpo_list[0].email;
	$('input[type=radio][name="constitution"][value='+responseArray.fpo_list[0].constitution+']').prop('checked', true);
	document.getElementById("date_formation").value=responseArray.fpo_list[0].date_formation;
	document.getElementById("reg_no").value=responseArray.fpo_list[0].reg_no;
	document.getElementById("pan").value=responseArray.fpo_list[0].pan;
	document.getElementById("tax_deduction").value=responseArray.fpo_list[0].tax_deduction;
	document.getElementById("gst").value=responseArray.fpo_list[0].gst;
	document.getElementById("ie_code").value=responseArray.fpo_list[0].ie_code;
	document.getElementById("contact_person").value=responseArray.fpo_list[0].contact_person;	
	document.getElementById("financial_year").value=responseArray.fpo_list[0].financial_year;
    document.getElementById("business_commence_from").value=responseArray.fpo_list[0].business_from; 	
	$('input[type=radio][name="inventory_required"][value='+responseArray.fpo_list[0].inventory_required+']').prop('checked', true);

		var business_nature = responseArray.fpo_list[0].business_nature.split(",");
		var items=document.getElementsByName('business_nature[]');
		for(var i=0; i<items.length; i++){
			for(var j=0; j<business_nature.length; j++){
				if(items[i].type=='checkbox' && items[i].value==business_nature[j])	{
					items[i].checked=true;
				}
			}
		}
		var business_type = responseArray.fpo_list[0].business_type.split(",");
		var items1=document.getElementsByName('business_type[]');
		for(var i=0; i<items1.length; i++){
			for(var j=0; j<business_type.length; j++){
				if(items1[i].type=='checkbox' && items1[i].value==business_type[j])	{
					items1[i].checked=true;
				}
			}
		}
		
	} 
	},
	error:function(){
	alert('Error!!! Try again');
	} 
	});
	//$('[id^=door_no]').keypress(validateNumber);
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
                
                var village = '';
					 var state = '';
					 var district = '';
					 var block ='';
					 var taluk ='';
					 var village = '';
					 var panchayat = '';
                $.each(responseArray.getlocation['villageInfo'],function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                    panchayat += '<option value='+value.id+'>'+value.name+'</option>'
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
                $('#panchayat').html(panchayat);
					 $('#state').html(state);
					 $('#district').html(district);
					 $('#block').html(block);
					 $('#taluk').html(taluk);
                
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
                var village = "";
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
        
        
//update fpo
$('form').submit(function(e){
	e.preventDefault();
	const fpodata = $('#editfpo_Form').serializeObject();
	var fpo_id =<?php echo $_REQUEST['id']?>;
	var url="<?php echo base_url();?>administrator/Fpo/updatefpo/"+fpo_id;
	console.log(fpodata);
		 $.ajax({
			url:url,
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

			function validateNumber(event) {
			 var key = window.event ? event.keyCode : event.which;
			 if (event.keyCode === 8 || event.keyCode === 46) {
				  return true;
			 } else if ( key < 48 || key > 57 ) {
				  return false;
			 } else {
				return true;
			 }
		};
			$.fn.serializeObject = function()
			{
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