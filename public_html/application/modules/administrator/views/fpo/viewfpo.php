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
                        <h1>FPO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">User Management</a></li>
                            <li><a href="<?php echo base_url('administrator/fpo');?>">FPO</a></li>
                            <li class="active">View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<div class="card">
			<div class="card-body">
			     <form action="#" id="fpo_addForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

			    <div id="smartwizard">
				<ul>
                <li><a href="#step-1">Step 1<br /><small>FPO Details</small></a></li>
                <li><a href="#step-2">Step 2<br/><small>Continuation</small></a></li>
				</ul>
				<div>
				 <div  id="step-1">
					    <div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Name of the Producers Organisation</label>
									<input type="text" class="form-control" maxlength="100"  name="institution_name"  id="institution_name" placeholder="Name of the Promoting Institution " required="required" data-validation-required-message="Please enter promoting institution name." disabled>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Pin Code </label>
									<input type="number" class="form-control numberOnly" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="Pin Code" required="required" data-validation-required-message="Please enter pin code."disabled>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
								<label for="inputAddress2">State </label>
								<input class="form-control" id="state" name="state"   placeholder="State"readonly>
								<div class="help-block with-errors text-danger"></div>
							</div>							  	
							<div class="form-group col-md-4">
								<label for="inputAddress2">District </label>
								<input type="text" class="form-control numberOnly"  id="district" name="district" placeholder="District" required="required" data-validation-required-message="Please enter district."readonly>
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Block </label>
								<input class="form-control" id="block" name="block"   placeholder="Block"readonly>	
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-4">						    
								<label for="inputAddress2">Gram Panchayat </label>
								<select id="inputState" class="form-control" id="farmer_gram_panchayat" name="farmer_gram_panchayat"disabled>
								<option value="">Select Gram Panchayat </option>
								</select>
								<div class="help-block with-errors text-danger"></div>
							</div>															
						<div class="form-group col-md-4">						    
							<label for="inputAddress2">Village </label>
							<select id="inputState" class="form-control" id="village" name="village"disabled>
							<option value="">Select Village </option>
							</select>
							<div class="help-block with-errors text-danger"></div>
						</div>	
						<div class="form-group col-md-4">
							<label for="inputAddress2">Street</label>
							<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street"disabled>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Door No</label>
							<input type="text" class="form-control" maxlength="10" id="door_no" name="door_no" placeholder="Door No"disabled>
						</div>														
						<div class="form-group col-md-4">
							<label for="inputAddress2">Land Line Number – STD Code</label>
							<input type="number" class="form-control numberOnly" pattern="[789][0-9]{9}" id="std_code" name="std_code" placeholder="STD Code"disabled>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Land Line Number  </label>
							<input class="form-control"  id="land_line" name="land_line"  placeholder="Land Line Number "disabled>				
						</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Mobile Number  </label>
							<input type="text" class="form-control" pattern="^[6-9][0-9]{10}$" id="mobile_num" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number."disabled>
							<div class="help-block with-errors text-danger"></div>
						</div>
						<div class="form-group col-md-4">
							<label for="inputAddress2">Email Address </label>
							<input type="email" class="form-control"  id="email" name="email" placeholder="Email Address " required="required" data-validation-required-message="Please enter email address."disabled>
							<div class="help-block with-errors text-danger"></div>
						</div>
					   <div class="form-group col-md-4">
									<label class=" form-control-label">Constitution</label>
									<div class="row">
									<div class="col-md-6">
									<div class="form-check-inline form-check">
									<label for="inline-radio1" class="form-check-label">
									<input type="radio" id="constitution" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>Trust
									<div class="help-block with-errors text-danger"></div>
									</label>
									</div> 
									</div>
									<div class="col-md-6">
									<div class="form-check-inline form-check">
									<label for="inline-radio2" class="form-check-label">
									<input type="radio" id="constitution" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>Society
									<div class="help-block with-errors text-danger"></div>
									</label>
									</div>
									</div>			
									</div>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Formation Date</label>
								<input type="date" class="form-control"  name="date_formation"  id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow "disabled>
								<div class="help-block with-errors text-danger"></div>
							</div>
							</div>
							</div>
							
							<div  id="step-2">
							    <div id="form-step-1" class="form-horizontal" role="form" data-toggle="validator">								
									<div class="form-group col-md-4">
										<label for="inputAddress2">Registration Number(CIN)/Society</label>
										<input type="text" class="form-control" maxlength="21"  name="reg_no"  id="reg_no" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." title="If need date picker, click the arrow "disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Permanent Account Number(PAN) </label>
										<input type="text" class="form-control" pattern="([^\s][A-z0-9À-ž\s]+)" maxlength="10" id="pan" name="pan" placeholder="Permanent Account Number" required="required" data-validation-required-message="Please enter pan."disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Tax Deduction Account(TAN)</label>
										<input type="text" class="form-control" id="tax_deduction" maxlength="10" name="tax_deduction" placeholder="Tax Deduction Account(TAN)" required="required" data-validation-required-message="Please enter tax deduction account."disabled>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Goods & Service Tax Number (GST)</label>
										<input type="text" class="form-control"  name="gst" maxlength="15" id="gst" placeholder="Goods & Service Tax Number (GST)" required="required" data-validation-required-message="Please enter GST"disabled>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">IE Code Number</label>
										<input type="text" class="form-control"  name="ie_code" maxlength="10" id="ie_code" placeholder="Goods & Service Tax Number (GST)" required="required" data-validation-required-message="Please enter GST"disabled>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Name of the Contact Person</label>
										<input type="text" class="form-control"  name="contact_person_name"  id="contact_person_name" placeholder="Name of the Contact Person" required="required" data-validation-required-message="Please enter contact person name."disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>									
							   <div class="form-group col-md-6">
									<label class=" form-control-label">Type of Business</label>
								  <div class="row">
									<div class="col-md-5">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Manufacturing
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Trading
										  <div class="help-block with-errors text-danger"></div>
										  <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>	
									<div class="col-md-3">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Service
										  <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>										
								  </div>
								  <div class="help-block with-errors text-danger"></div>
								  </div>
								   <div class="form-group col-md-6">
								<label for="inputAddress">Nature of Business</label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Rice
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Corn
										  <div class="help-block with-errors text-danger"></div>
										  <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select."disabled>Wheat
										  <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>										
								  </div>
								<div class="help-block with-errors text-danger"></div>								  
							  </div>					 
							  <div class="form-group col-md-4">
								<label class=" form-control-label">Inventory Required</label>
							  <div class="row">
								<div class="col-md-6">
								  <div class="form-check-inline form-check">
									<label for="inline-radio1" class="form-check-label">
									  <input type="radio" id="constitution" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>Yes
									  <div class="help-block with-errors text-danger"></div>
									</label>
								  </div> 
								</div>
								<div class="col-md-6">
								  <div class="form-check-inline form-check">
									<label for="inline-radio2" class="form-check-label">
									  <input type="radio" id="constitution" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>No
									  <div class="help-block with-errors text-danger"></div>
									</label>
								   </div>
								</div>			
							  </div>
							  <div class="help-block with-errors text-danger"></div>
							 </div>
							 <div class="form-group col-md-4">
							<label for="inputAddress2">Financial Year Begins From</label>
							<input type="date" class="form-control"  name="financial_year" id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow "disabled>
							<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-4">
							<label for="inputAddress2">Business Commence From</label>
							<input type="date" class="form-control"  name="business_from" maxlength="10" id="business_from" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow "disabled>
							<div class="help-block with-errors text-danger"></div>
							</div>						
							<div class="form-group row col-md-12 mt-4">
								<div class="col-md-5">&nbsp;</div>                                    							
							    <div class="col-md-6">
								<div id="success"></div>
								<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
								<a href="#" id="" class="del btn btn-danger"><i class="fa fa-trash" aria-hidden="true">  Delete</i></a>									
								</div>
								<div class="col-md-3">&nbsp;</div>
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
	<script src="<?php echo asset_url()?>js/sweetalert.min.js"></script>	
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
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
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
						var elmErr = elmForm.children('.has-error');
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
				$('#fpo_addForm').toggleClass('view');
				$("#sendMessageButton").show();
				$("#edit").hide();	 
				$('input').each(function(){
					var inp = $(this);
					if (inp.attr('disabled')) {
					 inp.removeAttr('disabled');
					 document.getElementById("sendMessageButton").disabled =false;
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
					}
					else {
					  inp.attr('disabled', 'disabled');
					}
				});
			});
			$('a.del').click(function() {
				var partner_delete = $(this).attr('id');
				swal({
				 title: 'Are you sure!',
				 text: 'Do you want to delete this fpo?',
				 icon: "success",
				 buttons: [
				   'Cancel?',
				   'Yeah, Deleted!'
				 ],
				 dangerMode: false,
				}).then(function(isConfirm) {
					if (isConfirm) {
					$(this).prop("disabled", true);
					$.ajax({
						url: "",
						type: "POST",
						data: {
						   this_delete: partner_delete,
						},
						cache: false,
						success: function() {				
						   setTimeout(function() {
							  window.location.replace("");
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
					} else {
					 swal("Cancelled", "You have cancelled the fpo information deleted", "error");
					}
				});
			});
				
});
</script>
   </body>
</html>