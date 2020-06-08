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
							<h1>Customer Branches</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Market</a></li>
								<li><a class="active" href="<?php echo base_url('fpo/market/customerbranches');?>">Customer Branches</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content mt-3">
			 <?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('info')){?>
					<div class="alert alert-info alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('info');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('warning')){?>
					<div class="alert alert-warning alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('warning');?></strong> 
					</div>
            <?php }?>
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-body">
							<form  id="addpopi_Form"  method="POST" action="<?php echo base_url('fpo/Market/postcustomerbranch')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator"  accept-charset="utf-8">
								<div class="row">
										<div class="form-group col-md-4">						
										</div>
									<div class="form-group col-md-4 text-center">
										<label for="inputAddress2">Select a customer</label>
										<select  class="form-control" id="customer"  name="customer">
											<option value="0">Select Customer</option>
											<?php for($i=0; $i<count($customer);$i++) { ?>										
											<option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
											<?php } ?>
										</select>		
									</div>
									<div class="form-group col-md-4">
									</div>
								</div>
								<div class="table-responsive" > 
									<table class="table table-bordered">
										<thead>
											<tr bgcolor="#afd66b">
												<th class="text-center">Short Name</th>
												<th class="text-center">Name</th>
												<th class="text-center">Contact</th>
												<th class="text-center">Sales Person</th>
												<th class="text-center">Tax Group</th>
												<th class="text-center"></th>
												
											</tr>
										</thead>
										<tbody id="customerbranch">
							
										
										<!--<tr>
											<td colspan="9" class="text-center" >  <input type="checkbox" id="in_active" name="in_active" class="form-check-input">show Inactive</td>
											<td colspan="1" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
										</tr>-->
										</tbody>
									</table> 				 
								</div>
								
								<input type="hidden" class="form-control" id="branch_code" name="branch_code">
								<div id="smartwizard">
									<ul>
										<li><a style="width:80px;"href="#step-1">General settings <br></a></li>
										<li><a style="width:80px;"href="#step-2">Contacts</a></li>
									</ul>
								
									<div>
									<div id="step-1">
									<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
										<h4 class="text-center text-success">Name and Contact</h1>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-6 ">
											<label for="">Branch Name<span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="30" id="branch_name" name="branch_name" placeholder="Branch Name" required="required" data-validation-required-message="Please enter brnach name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-6 ">
											<label for="">Branch Short Name<span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="20" id="branch_short_name" name="branch_short_name" placeholder="Customer Short Name" required="required" data-validation-required-message="Please enter branch short name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<h4 class="text-center text-success">Sales</h1>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Person</label>
                                 <select id="sales_person" name="sales_person" class="form-control">
											<option value="">Select Sales Person</option>
                                  <?php for($i=0; $i<count($salesperson);$i++) { ?>										
                                  <option value="<?php echo $salesperson[$i]->salesman_code; ?>"><?php echo $salesperson[$i]->salesman_name; ?></option>
                                  <?php } ?>
											</select>
											</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Area</label>
											<select id="sales_area" name="sales_area" class="form-control">
											<option value="0">Select Sales Area</option>
											<option value="1">Global</option>
											</select>	 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Group</label>
											<select id="sales_group" name="sales_group" class="form-control">
											<option value="0">Select Sales Group</option>
											<option value="1">Large</option>
											<option value="2">Medium</option>
											</select>	 
										</div>
										</div>
										<div class="form-group col-md-12">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Default Inventory Location</label>
											<select id="inventory_location" name="inventory_location" class="form-control">
											<option value="0">Select Inventory Location</option>
											<option value="1">Location 1</option>
											<option value="2">Location 2</option>
											<option value="3">Location 3</option>
											<option value="4">Location 4</option>
											</select>	 
										</div>	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Default Shipping Company</label>
											<select id="shipping_company" name="shipping_company" class="form-control">
											<option value="0">Select Shipping Company</option>
											<option value="1">SproutsIO</option>
											<option value="2">BrightFarms</option>
											<option value="3">Edenworks</option>
											<option value="4">Fujitsu</option>
											</select>	 
										</div>	
										
										<div class="form-group col-md-4">
											<label for="inputAddress2">Tax Group</label>
											<select id="tax_group" name="tax_group" class="form-control">
											<option value="1">Tax</option>
											<option value="2">Tax Exempt</option>
											</select>	 
										</div>
										</div>
										<h4 class="text-center text-success">GL Accounts</h1>
										<div class="form-group col-md-12 mt-3">	
										<div class="form-group col-md-6">
											<label for="inputAddress2">Sales Account</label>
											<select id="sales_account" name="sales_account" class="form-control">
											<option value="">Select Sales Account</option>
											<option value="1">Current Assets</option>
											<option value="2">Inventory Assets</option>
											<option value="3">Capital Assets</option>
											</select>	 
										</div>	
										<div class="form-group col-md-6">
											<label for="inputAddress2">Sales Discount Account</label>
											<select id="sales_discount" name="sales_discount" class="form-control">
											<option value="">Select Sales Discount Account</option>
											<option value="1">Share Capital</option>
											<option value="2">Retained Earnings</option>
											<option value="3">Sales Revenue</option>
											</select>	 
										</div>	
										</div>
										<div class="form-group col-md-12 mt-3">	
										<div class="form-group col-md-6">
											<label for="inputAddress2">Accounts Receivable Account</label>
											<select id="account_receivable" name="account_receivable" class="form-control">
											<option value="">Select Accounts Receivable Account</option>
											<option value="1">Bank Loans</option>
											<option value="2">Sales</option>
											<option value="3">Interest</option>
											</select>	 
										</div>	
										<div class="form-group col-md-6">
											<label for="inputAddress2">Prompt Payment Discount Account</label>
											<select id="prompt_payment" name="prompt_payment" class="form-control">
											<option value="">Select Prompt Payment Discount Account</option>
											<option value="1">Office Supplies</option>
											<option value="2">Rent </option>
											<option value="3">Repair & Maintanance</option>
											</select>	 
										</div>	
										</div>
											<h4 class="text-center text-success">Branch</h1>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Contact Person</label>
											<input type="text" class="form-control" minlength="3" maxlength="30" name="contact_person"  id="contact_person" placeholder="Contact Person" >											 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10"  pattern="^[6-9]\d{9}$"  name="phone_num"  id="phone_num" placeholder="Phone Number">											 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Secondary Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" pattern="^[6-9]\d{9}$"  name="secondary_phone_num"  id="secondary_phone_num" placeholder="Secondary Phone Number">											 
										</div>
										
										</div>
										<div class="form-group col-md-12">	
										<!--<div class="form-group col-md-4">
											<label for="inputAddress2">Fax Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="20" name="fax_number"  id="fax_number" placeholder="Fax Number">											 
										</div>-->
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address</label>
												<input type="email" class="form-control"  id="email" name="email" placeholder="E-Mail Address">
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Document Language</label>
											<select id="doc_lang" name="doc_lang" class="form-control">
											<option value="0">Select Document Language </option>
											<option value="1">Customer default </option>
											<option value="2">English</option>
											</select>	 
										</div>	
										</div>
											<h4 class="text-center text-success">Address</h1>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-4">	
											<label for="inputAddress2">Mailing Address</label>
											<textarea id="mailing_address" rows="4" maxlength="50" name="mailing_address" class="form-control"></textarea>											
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Physical Address</label>
											<textarea id="physical_address" rows="4" maxlength="50" name="physical_address" class="form-control"></textarea>
										</div>
										<div class="form-group col-md-4">	
											<label for="inputAddress2">General Notes</label>
											<textarea id="general_notes" rows="4" maxlength="50" name="general_notes" class="form-control"></textarea>											
										</div>
										</div>							
									  </div>
									  <div class="form-group col-md-12 text-center">
										<button align="center" name="general_submit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
									     <a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
									  </div>
									</div>
									<div id="step-2" >
										<div class="table-responsive" id="contact_table"> 
												<table class="table table-bordered">
													<thead>
														<tr bgcolor="#afd66b">
															<th class="text-center">
																Assignment
															</th>
															<th class="text-center">
																Reference
															</th>
															<th class="text-center">
																Full Name
															</th>
															<th class="text-center">
															   Phone
															</th>
															<th class="text-center">
															   Sec Phone
															</th>
															<th class="text-center">
															   Fax 
															</th>
															<th class="text-center">
															   Email 
															</th>
															<th class="text-center">
															</th>
															<th class="text-center">
															</th>
														</tr>
													</thead>
													<tbody>
													<tr>
														<td colspan="11" class="text-center" >No Records</td>
													</tr>
													</tbody>
													
												</table> 				 
											</div>
											<div  id="contact_form" style="display:none">
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-3">	
														<label for="inputAddress2">First Name</label>
													   <input type="text" class="form-control"  id="first_name" name="first_name" placeholder="First Name">
														
													</div>
													<div class="form-group col-md-3">	
														<label for="inputAddress2">Last Name</label>
													   <input type="text" class="form-control"  id="last_name" name="last_name" placeholder="Last Name">
										
													</div>
													<div class="form-group col-md-3">	
														<label for="inputAddress2">Reference</label>
													   <input type="text" class="form-control"  id="reference" name="reference" placeholder="Reference">
										
													</div>
													<div class="form-group col-md-3">
														<label for="inputAddress2">Document Language</label>
														<select id="dimension" name="dimension" class="form-control">
														<option value="1">System default</option>
														<option value="2">English</option>
														</select>	 
													</div>	
												</div>
												<div class="form-group col-md-12 mt-1">
													<div class="form-group col-md-5">	
														<label for="inputAddress2">Address</label>
														<textarea id="address" rows="3" maxlength="50" name="address" class="form-control" placeholder="Address"></textarea>
													
													</div>
													<div class="form-group col-md-2">
														<label for="inputAddress2">Contact active For</label>
														<select id="dimension" multiple="multiple" name="dimension" class="form-control">
														<option value="1">Deliveries</option>
														<option value="2">General</option>
														<option value="3">Invoices</option>
														<option value="4">Orders</option>
														</select>	 
													</div>
													
													<div class="form-group col-md-5">	
														<label for="inputAddress2">Notes</label>
														<textarea id="notes" rows="3" maxlength="50" name="notes" class="form-control" placeholder="Notes"></textarea>
													
													</div>
												</div>
												<div class="form-group col-md-12 mt-2">	
									
												<div class="form-group col-md-6">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly" minlength="10" maxlength="10"  pattern="^[6-9]\d{9}$"  name="phone_num"  id="phone_num" placeholder="Phone Number">											 
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Secondary Phone Number</label>
													<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" pattern="^[6-9]\d{9}$"  name="secondary_phone_num"  id="secondary_phone_num" placeholder="Secondary Phone Number">											 
												</div>
												
												</div>
												<div class="form-group col-md-12">	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Fax Number</label>
													<input type="text" class="form-control numberOnly" minlength="10" maxlength="20" name="fax_number"  id="fax_number" placeholder="Fax Number">											 
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Email</label>
														<input type="email" class="form-control"  id="email" name="email" placeholder="Email">
												</div>
												</div>
											</div>
										<div class="form-group col-md-12 text-center mt-1"id="addcontact">
										<input type="button" name="add" id="add_contact" value="Add New" class="btn btn-success">
										</div>
										<div class="form-group col-md-12 text-center mt-1" id="addcontactform" style="display:none">
										<input type="button" name="add" id="add_contact" value="Add" class="btn btn-success">
										<input  type="button" id="cancel" value="Cancel" class="btn btn-outline-dark">
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
			
			$('input[id="add_contact"]') .on('click', function(){
					$('#contact_form').show();
					$('#addcontactform').show();
					$('#addcontact').hide();
					$('#contact_table').hide();
			}); 
			$('input[id="cancel"]') .on('click', function(){
					$('#contact_form').hide();
					$('#addcontactform').hide();
					$('#addcontact').show();
					$('#contact_table').show();
			});
			
			$('select[name="customer"]').on('change', function(e) {
			//$("#supplier_del").show();
			e.preventDefault();
			var customer = $(this).val();		
			if(customer) { 
			$.ajax({
				url: "<?php echo base_url();?>fpo/Market/customerbrachlist/"+customer,
				type: "POST",
				data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray);
						 if(responseArray.status == 1){
							var customerbranch_list = "";
							$.each(responseArray.customerbranch_list,function(key,value){
							 //customerbranch_list += '<tr><td class="form-group"><input type="text" class="form-control" value='+value.salesman_name+' name="salesman_name" id="salesman_name" disabled></td><td class="form-group"><input type="text" class="form-control" value='+value.salesman_phone+' name="salesman_phone" id="salesman_phone" disabled></td><td class="form-group"><input type="text" class="form-control"value='+value.provision+' name="provision" id="provision" disabled ></td><td class="form-group"><input type="text" class="form-control" value='+value.break_pt+' disabled  name="break_pt" id="break_pt"></td><td class="form-group"><input type="text"  class="form-control" disabled value='+value.provision2+' name="provision2" id="provision2"></td><td class=""><a class="btn btn-success btn-sm edit" id="edit" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><button id="update" href="" value="Update" class="btn btn-success " type="button" style="display:none;" /></td></tr>';
							customerbranch_list += '<tr><td>'+value.branch_ref+'</td><td>'+value.br_name+'</td><td>'+value.contact_name+'</td><td>'+value.salesman+'</td><td>'+value.tax_group_id+'</td><td><a href="<?php echo base_url("fpo/editcustomer_branch/viewharvest?id='+value.debtor_no+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
							});
							$('#customerbranch').html(customerbranch_list);
							//$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
			}						
		});
			

</script>
</body>
</html>