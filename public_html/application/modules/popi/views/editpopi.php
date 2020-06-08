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
							<h1>VIEW POPI</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Profile Management</a></li>
								<li><a href="<?php echo base_url('popi');?>">POPI</a></li>
								<li class="active">View POPI</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-body">
							<form action="#" id="editpopi_Form" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
								<div id="smartwizard">
									<ul class="nav nav-tabs">
										<li><a style="width:80px;" href="#step-1">Step <br>1<br /><small>POPI Details</small></a></li>
										<li><a style="width:80px;" href="#step-2" class="nav-left">Step <br>2<br /><small>Persuing</small></a></li>
									</ul>
									<div>
										<div  id="step-1">
											<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-4 ">
													<input type="hidden" name="popi_id" value="<?php echo $_REQUEST['id']?>" id="popi_id">
														<label class=" form-control-label">Type of Promoting Institution <span class="text-danger">*</span></label>
														<div class="row">
															<div class="col-md-6">
																<div class="form-check-inline form-check">
																	<label for="inline-radio1" class="form-check-label">
																		<input type="radio" id="institution_type" name="institution_type" value="1" disabled class="form-check-input" required><span class="ml-1">POPI</span>
																	</label>
																</div> 
															</div>
															<div class="col-md-6">
																<div class="form-check-inline form-check">
																	<label for="inline-radio2" class="form-check-label">
																		<input type="radio" id="institution_type" name="institution_type" value="2" disabled class="form-check-input" required><span class="ml-1">Federation</span>
																	</label>
																</div>
															</div>			
														</div>
														<div class="help-block with-errors text-danger"></div>
													</div>  
													<div class="form-group col-md-4 ">
														<label for="inputAddress2">Name of the Promoting Institution <span class="text-danger">*</span></label>
														<input type="text" class="form-control " min="3" max="100" name="institution_name"  disabled id="institution_name" placeholder="Name of the Promoting Institution " required>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Pin Code <span class="text-danger">*</span> </label>
														<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" id="pin_code" disabled name="pin_code" placeholder="Pin Code" required>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-4">
														<label for="inputAddress2">State <span class="text-danger">*</span> </label>
														<select  class="form-control" id="state" name="state" readonly placeholder="State" required>
															<option value="">Select State </option>
														</select>
														<!--<input class="form-control" type="text" id="state" name="state"  placeholder="State" readonly required>-->			
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span> </label>
														<select  class="form-control" id="district" name="district" readonly placeholder="District" required>
															<option value="">Select District </option>
														</select>
														<!--<input type="text" class="form-control numberOnly"  id="district" readonly name="district" placeholder="District" required>-->
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Block </label>
														<select  class="form-control" id="block" name="block" readonly placeholder="Block" required>
															<option value="">Select Block</option>
														</select>
														<!--<input class="form-control" id="block" name="block"  readonly placeholder="Block">	-->			
													</div>
												</div>
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Taluk </label>
														<select  class="form-control" id="taluk" name="taluk" readonly placeholder="Taluk" required>
															<option value="">Select Taluk</option>
														</select>
														<!--<input class="form-control" id="taluk" name="taluk"  readonly placeholder="taluk">-->				
													</div>	
													<div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat </label>
														<select  class="form-control" id="panchayat" disabled name="panchayat" onchange="getVillageList(this.value);">
															<option value="">Select Gram Panchayat </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">						    
														<label for="inputAddress2">Village </label>
														<select id="village" class="form-control"  disabled name="village">
															<option value="">Select Village </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>	
													
												</div>
												<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
														<label for="inputAddress2">Door No  </label>
														<input type="text" class="form-control" maxlength="10" id="door_no" disabled name="door_no" placeholder="Door No">
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control" maxlength="75" id="street" disabled name="street" placeholder="Street">
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Landline Number – STD Code  </label>
														<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$"  maxlength="8" disabled id="std_code" name="std_code" placeholder="STD Code" >
														
														<div class="help-block with-errors text-danger"></div>
													</div>
													
												</div>
												<div class="form-group col-md-12 mt-1">
												<div class="form-group col-md-4">
														<label for="inputAddress2">Landline Number </label>
														<input type="text" class="form-control numberonly" maxlength="8" minlength="6"id="land_line" name="land_line" disabled  placeholder="Landline Number " style="width:250px;">				
													<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
														<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="10" disabled id="mobile" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number." onfocusout="verifyMobileNumber(this.value)">
														<div id="mbl_validate" class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Email Address <span class="text-danger">*</span></label>
														<input type="email" class="form-control"  id="email" name="email" disabled placeholder="Email Address " required="required" data-validation-required-message="Please enter email address.">
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
																		<label for="inline-radio1" class="form-check-label">
																			<input type="radio" id="constitution" name="constitution" disabled value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Trust</span>
																		</label>
																	</div> 
																</div>
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio2" class="form-check-label">
																			<input type="radio" id="constitution" name="constitution" disabled value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Society</span>
																		</label>
																	</div>
																</div>			
															</div>
															<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Date of Formation <span class="text-danger">*</span></label>
														<input type="date" class="form-control"  name="date_formation"  disabled id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." min="2018-01-01" max="2050-12-31">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">PAN of the Promoting Institution <span class="text-danger">*</span>  </label>
														<input type="text" class="form-control"  disabled id="pan_promoting_inst" name="pan_promoting_institution" placeholder="EX:AAAPL1234C" required="required" data-validation-required-message="Please enter pan of promoting institution.">
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span> </label>
														<input type="text" class="form-control"  id="contact_person" disabled name="contact_person" placeholder="Name of the Contact Person  " required="required" data-validation-required-message="Please enter name of the contact person.">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Nature of Activity <span class="text-danger">*</span></label>
														<select class="form-control" id="nature_activity" name="nature_activity" disabled  required="required" data-validation-required-message="Please select nature of activity.">
															<option value="">Select Nature of Activity</option>
															<option value="1">Charitable</option>
															<option value="2">Agri</option>
															<option value="3">Social</option>
															<option value="4">Education</option>										
														</select>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Financial Year Begins From <span class="text-danger">*</span></label>
														<input type="date" class="form-control"  name="financial_year" disabled  id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year begins from." title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31">
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Business Commence From <span class="text-danger">*</span> </label>
														<input type="date" class="form-control"  name="business_commence" disabled  id="business_commence" placeholder="Business Commence From " required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label class=" form-control-label">Status <span class="text-danger">*</span></label>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio1" class="form-check-label">
																			<input type="radio" id="status" name="status" value="1" disabled checked class="form-check-input" required="required" data-validation-required-message="Please select status."><span class="ml-1">Active</span>
																		</label>
																	</div> 
																</div>
																<div class="col-md-6">
																		<div class="form-check-inline form-check">
																			<label for="inline-radio2" class="form-check-label">
																				<input type="radio" id="status" name="status" value="2" disabled class="form-check-input" required="required" data-validation-required-message="Please select status."><span class="ml-1">Inactive</span>
																			</label>
																		</div>
																</div>			
															</div>
															<div class="help-block with-errors text-danger"></div>
													</div>
												</div>																								
												
											</div>
										</div>
									</div>
								</div>
                                
                                <div class="col-md-12 text-center">
                                    <input id="edit" value="Edit"  class="btn btn-success mt-4 text-" type="button">
									<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-4" type="submit" style="display:none;">
									<a href="#" id="" class="del btn btn-danger mt-4">Delete</a>
									<a href="<?php echo base_url('administrator/popi');?>" id="cancel" class="btn btn-outline-dark mt-4" style="display:none;">Cancel</a>
									<a href="<?php echo base_url('administrator/popi');?>" id="ok" class=" btn btn-success mt-4">OK</a>
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
				  toolbarSettings:{toolbarPosition: 'bottom'
										  //toolbarExtraButtons: [btnFinish, btnCancel]
										},
				  anchorSettings: {
								  markDoneStep: true, // add done css
								  markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
								  removeDoneStepOnNavigateBack:false, // While navigate back done step after active step will be cleared
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
	
	  $('#edit').click(function(){
  $('#editpopi_Form').toggleClass('view');
  $("#sendMessageButton").show();
  $("#cancel").show();
  $("#edit").hide();
  $("#ok").hide();
  $('input').each(function(){
    var inp = $(this);
	 //var button = $(this);
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
     
     
//sweetalert
		$('a.del').click(function() {
		var popi_id = <?php echo $_REQUEST['id']?>;
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
              url: "<?php echo base_url();?>administrator/popi/deletepopi/"+popi_id,
              type: "POST",
              data: {
                 this_delete: popi_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('administrator/popi')?>");
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
            swal("Cancelled", "You have cancelled the POPI delete action", "info");
            return false;
         }
      });
	});






/* $('a.del').click(function() {
    var popi_id = <?php echo $_REQUEST['id']?>;;
    swal({
     title: '',
     text: 'Do you want to delete this POPI?',
     icon: "",
     buttons: [
       'Cancel',
       'Delete'
     ],
     dangerMode: false,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $(this).prop("disabled", true);
      $.ajax({
        url: "<?php echo base_url();?>administrator/popi/deletepopi/"+popi_id,
        type: "POST",
        data: {
           this_delete: popi_id,
        },
        cache: false,
        success: function() {        
           setTimeout(function() {
            window.location.replace("<?php echo base_url('administrator/popi')?>");
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
       swal("Cancelled", "You have cancelled the popi information deleted", "error");
      }
    });
  }); */
  
  
  $(document).ready(function(){
	    //edit popi API CALL
		var popi_id =<?php echo $_REQUEST['id']?>;
        // jQuery method
        $.ajax({
			url: "<?php echo base_url();?>administrator/popi/editpopi/"+popi_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
                console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
                $('input[type=radio][name="institution_type"][value='+responseArray.popi_list[0].institution_type+']').prop('checked', true);
                $('input[type=radio][name="constitution"][value='+responseArray.popi_list[0].constitution+']').prop('checked', true);
                $('input[type=radio][name="status"][value='+responseArray.popi_list[0].status+']').prop('checked', true);
                document.getElementById("institution_name").value=responseArray.popi_list[0].institution_name;
                document.getElementById("pin_code").value=responseArray.popi_list[0].pin_code;
                document.getElementById("state").value=responseArray.popi_list[0].state;
                document.getElementById("district").value=responseArray.popi_list[0].district;
                document.getElementById("block").value=responseArray.popi_list[0].block;
                //document.getElementById("panchayat").value=responseArray.popi_list[0].panchayat;
                //document.getElementById("village").value=responseArray.popi_list[0].village;
                document.getElementById("door_no").value=responseArray.popi_list[0].door_no;
                document.getElementById("street").value=responseArray.popi_list[0].street;
                document.getElementById("std_code").value=responseArray.popi_list[0].std_code;
                document.getElementById("land_line").value=responseArray.popi_list[0].land_line;
                document.getElementById("mobile").value=responseArray.popi_list[0].mobile;
                document.getElementById("email").value=responseArray.popi_list[0].email;
                document.getElementById("date_formation").value=responseArray.popi_list[0].date_formation;
                document.getElementById("pan_promoting_inst").value=responseArray.popi_list[0].pan_promoting_inst;
                document.getElementById("contact_person").value=responseArray.popi_list[0].contact_person;
                document.getElementById("nature_activity").value=responseArray.popi_list[0].nature_activity;
                document.getElementById("business_commence").value=responseArray.popi_list[0].business_commence;
                document.getElementById("financial_year").value=responseArray.popi_list[0].financial_year;
                var pincode=responseArray.popi_list[0].pin_code;
                var panchayat=responseArray.popi_list[0].panchayat;
                var village=responseArray.popi_list[0].village;
                getPincode( pincode );
                /*$.ajax({
                type: "post",
                url: "<?php echo base_url();?>administrator/Login/getlocation/"+pincode,
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
                       $('#village').append('<option value='+value.id+' >'+panch_name+'</option>');

                    });
                    },
                    error:function(response){
                        alert('Error!!! Try again');
                    } 
                    });*/
                } 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
        });			
		//$('[id^=door_no]').keypress(validateNumber);
});
			
$('form').submit(function(e){
	e.preventDefault();
	const popidata = $('#editpopi_Form').serializeObject();
	var popi_id =<?php echo $_REQUEST['id']?>;
	var url="<?php echo base_url();?>administrator/popi/updatepopi/"+popi_id;
	console.log(popidata);
		 $.ajax({
			url:url,
			type:"POST",
			data:popidata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/popi')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
}); 
});
				
				
			 $('#pan_promoting_institution').change(function (event) { 
		
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

				
				
			//$('[id^=door_no]').keypress(validateNumber);
			

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