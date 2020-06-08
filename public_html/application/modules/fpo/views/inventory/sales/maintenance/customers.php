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
  .sw-main {
    position: relative;
    display: block;
    margin: 0;
    padding: 0;
    border-radius: .25rem!important;
    bottom: 40px;
}
.sw-theme-circles > ul.step-anchor:before {
    content: " ";
    position: absolute;
    top: 52% ! important;
    bottom: 0 ! important;
    left: 95px ! important;
    width: 63% ! important;
    height: 5px;
    background-color: #f5f5f5;
    /* border-radius: 3px; */
    z-index: 0;
}
.sw-theme-circles > ul.step-anchor > li {
    border: none;
    margin-left: 20px;
    z-index: 98;
    padding: 14px;
    width: 21%;
}
.sw-theme-circles > ul.step-anchor {
    position: relative;
    background: #fff;
    border: none;
    list-style: none;
    margin-bottom: 75px ! important;
    margin-left: 94px ! important;
    /* margin-left: 68px; */
}
.btn-toolbar {
    margin-top: 29px;
    float: left;
    /* right: 23px; */
    margin-left: 22px ! important;
    /* left: 10px; */
    /* padding: 0px 1px 0px 36px; */
}
@media only screen and (max-width:768px){
.sw-theme-circles > ul.step-anchor {

    margin-left: 0px ! important;
}	
.sw-theme-circles > ul.step-anchor > li {
    border: none;
    margin-left: 20px;
	margin-right: 20px;
    z-index: 98;
    padding: 14px;
    width: 20%;
}

}
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left: 780px;
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
							<h1>Customers</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Finance</a></li>
								<li><a class="active" href="<?php echo base_url('administrator/inventory/customers');?>">Customers</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="content mt-3">
				<div class="animated fadeIn">
					<div class="card">
						<div class="card-body">
							<form  id="addpopi_Form" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
								<div class="row">
										<div class="form-group col-md-3">						
										</div>
									<div class="form-group col-md-4 text-center">
										<label for="inputAddress2">Select a customer</label>
										<select  class="form-control" id="customer"  name="customer">
											<option value="1">New Customer</option>
										</select>		
									</div>
									<div class="form-group col-md-3  mt-4">
										<label for="inputAddress2">Show Inactive:</label>
									  <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">												
									</div>
									<div class="form-group col-md-3">
									</div>
								</div>
								<div id="smartwizard">
									<ul>
										<li><a style="width:80px;"href="#step-1">General settings <br></a></li>
										<li><a style="width:80px;"href="#step-2">Contacts</a></li>
										<li><a style="width:80px;" href="#step-3">Transactions</a></li>
										<li><a style="width:80px;"href="#step-4">Purchase Orders</a></li>
									</ul>
								
									<div>
									<div id="step-1">
									<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
										<h4 class="text-center text-success">Name and Address</h1>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-4 ">
											<label for="">Customer Name<span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="50" id="customer_name" name="customer_name" placeholder="Customer Name" required="required" data-validation-required-message="Please enter customer name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4 ">
											<label for="">Customer Short Name<span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="20" id="customer_short_name" name="customer_short_name" placeholder="Customer Short Name" required="required" data-validation-required-message="Please enter customer short name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">GSTNo</label>
											<input type="text" class="form-control"  name="gst" maxlength="15" pattern="([0][1-9]|[1-2][0-9]|[3][0-5])([a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[1-9a-zA-Z]{1}[zZ]{1}[0-9a-zA-Z]{1})+$" id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
										</div>
										</div>
										<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-8">
											<label for="inputAddress2">Address</label>
											<textarea type="text" class="form-control" rows="3" id="address" name="address" maxlength="100" placeholder="Address"></textarea>						
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Type/Price List</label>
											<select id="price_list" name="price_list" class="form-control" >
											<option value="">Select Price List</option>
											<option value="1"selected>Retail</option>
											<option value="2">Wholesale</option>
											</select>							
										</div>
										</div>
										<h4 class="text-center text-success">Branch</h1>
										<div class="form-group col-md-12 mt-4">	
									
										<div class="form-group col-md-4">
											<label for="inputAddress2">Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10"  pattern="^[6-9]\d{9}$"  name="phone_num"  id="phone_num" placeholder="Phone Number">											 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Seacondary Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" pattern="^[6-9]\d{9}$"  name="secondary_phone_num"  id="secondary_phone_num" placeholder="Secondary Phone Number">											 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Contact Person</label>
											<input type="text" class="form-control" minlength="3" maxlength="30" name="contact_person"  id="contact_person" placeholder="Contact Person" >											 
										</div>
										</div>
										<div class="form-group col-md-12">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">Fax Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="20" name="fax_number"  id="fax_number" placeholder="Fax Number">											 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Email</label>
												<input type="email" class="form-control"  id="email" name="email" placeholder="Email">
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Person</label>
											<select id="sales_person" name="sales_person" class="form-control">
											<option value="1"selected>Sales Person</option>
											</select>	 
										</div>	
										</div>
										<div class="form-group col-md-12">	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Default Inventory Location</label>
											<select id="inventory_location" name="inventory_location" class="form-control">
											<option value="1"selected>Default</option>
											</select>	 
										</div>	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Default Shipping Company</label>
											<select id="shipping_company" name="shipping_company" class="form-control">
											<option value="1"selected>Default</option>
											</select>	 
										</div>	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Sales Area</label>
											<select id="sales_area" name="sales_area" class="form-control">
											<option value="1"selected>Default</option>
											</select>	 
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Tax Group</label>
											<select id="tax_group" name="tax_group" class="form-control">
											<option value="1"selected>Tax</option>
											<option value="2">Tax Exempt</option>
											</select>	 
										</div>
										</div>
										<h4 class="text-center text-success">Sales</h1>
										<div class="form-group col-md-12 mt-4">										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" minlength="2" maxlength="20" name="discount_percent"  id="discount_percent" placeholder="Discount Percent" >
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Credit Limit</label>
											<input type="text" class="form-control numberOnly" value="1,000" minlength="2" maxlength="10" name="credit_limit"  id="credit_limit" placeholder="Credit Limit">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Prompt Payment Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" minlength="2" maxlength="20" name="discount_percent"  id="discount_percent" placeholder="Prompt Payment Discount Percent" >
										</div>
										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Payment Terms</label>
											<select id="payemnt_terms" name="payemnt_terms" class="form-control" >
											<option value="">Select Payment Terms</option>
											<option value="1">Cash Only</option>
											<option value="2">Due 15th Of the Following Month</option>
											<option value="3">Due By End Of the Following Month</option>
											<option value="4">Payment due Within 10days</option>
											<option value="5">Us Dollars</option>		
											</select>	 
											<div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Credit Status</label>
											<select id="credit_status" name="credit_status" class="form-control" >
											<option value="">Select Credit Status</option>
											<option value="1">Good History</option>
											<option value="2">In liquidation</option>
											<option value="3">No more work until payment received</option>	
											</select>	 
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Dimension 1</label>
											<select id="dimension" name="dimension" class="form-control" >
											<option value="">Select Dimension 1</option>
											<option value="1">1 Software</option>
											<option value="2">2 Development</option>
											</select>	 
										</div>
										<div class="form-group col-md-6">	
											<label for="inputAddress2">General Notes</label>
											<textarea id="general_notes" maxlength="50" name="general_notes" class="form-control"></textarea>										
										</div>														
										</div>		
									  </div>
									  <div class="form-group col-md-12 text-center">
										<input  value="Add New Supplier Details" align="center" name="general_submit" class="btn btn-success text-center" type="submit">
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
													<label for="inputAddress2">Seacondary Phone Number</label>
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
									<div id="step-3" >
										<div class="row ">
											<div class="form-group col-md-1">
												
											</div>	
											<div class="form-group col-md-3">
												<label for="inputAddress2">From</label>
												<input  class="form-control" type="date"   id="from" name="from">		
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">To</label>
												<input  class="form-control" type="date"   id="to" name="to">		
											</div>
											<div class="form-group col-md-2">
												<label for="inputAddress2">Types</label>
												<select  class="form-control" id="types"  name="types">
													<option value="">All Types</option>
													<option value="1">Default</option>
												</select>
											</div>
											<div class="form-group col-md-1 " >
												<label for="inputAddress2" ></label>
												<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
											</div>					
										</div>
										<div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">
													<th class="text-center">
														Currency
													</th>
													<th class="text-center">
														Terms
													</th>
													<th class="text-center">
														Current
													</th>
													<th class="text-center">
													  1-30 Days
													</th>
													<th class="text-center">
													 31-60 Days
													</th>
													<th class="text-center">
													  Over 60 Days	
													</th>
													<th class="text-center">
													 Total Balance
													</th>
												</tr>
											</thead>
											<tbody>
											<tr>
											   <td>DKK</td>
											   <td>Payment due within 10 days</td>
											   <td>0.00</td>
											   <td>0.00</td>
											   <td>0.00</td>
											   <td>0.00</td>
											   <td>0.00</td>
											</tr>
											</tbody>													
										</table>
									 </div>
									 <div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">
													<th class="text-center">
														Type
													</th>
													<th class="text-center">
														#
													</th>
													<th class="text-center">
														Order
													</th>
													<th class="text-center">
													  Reference
													</th>
													<th class="text-center">
													 Date
													</th>
													<th class="text-center">
													 Due Date
													</th>
													<th class="text-center">
													Branch
													</th>
													<th class="text-center">
													 Debit
													</th>
													<th class="text-center">
													 Credit
													</th>
													<th class="text-center">
													</th>
														<th class="text-center">
													</th>
												</tr>
											</thead>
											<tbody>
											<tr>
											   <td colspan="11">No records</td>
											</tr>
											</tbody>													
										</table>
									 </div>
									</div>
									<div id="step-4">
									  <div class="container">
										<div class="row ">
											<div class="form-group col-md-3">
												<label for="inputAddress2">#</label>
												<input  class="form-control" type="text"  placeholder="" id="id" name="id" >
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Ref</label>
												<input  class="form-control" type="text"  placeholder="Reference" id="ref" name="ref" >
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">From</label>
												<input  class="form-control" type="date"   id="from" name="from">		
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">To</label>
												<input  class="form-control" type="date"   id="to" name="to">		
											</div>
												
										</div>
										
										<div class="row ">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Location</label>
												<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
													<option value="">All Location</option>
													<option value="1">Default</option>
												</select>
											</div>	
											<div class="form-group col-md-3">
												<label for="inputAddress2">For Item</label>
												<input  class="form-control" type="text"  placeholder="" id="id" name="id" >
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-3 mt-2">
												<label for="inputAddress2"></label>
												<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
													<option value="">All Items</option>
												</select>
											</div>
											<div class="form-group col-md-3 mt-4">
												<label for="inputAddress2" ></label>
												<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
											</div>		
										</div>
										</div>
										<div class="table-responsive">  
											<table class="table table-bordered">
												<thead>
													<tr bgcolor="#afd66b">
														<th class="text-center">
															Order#
														</th>
														<th class="text-center">
															Ref
														</th>
														<th class="text-center">
															Customer
														</th>
														<th class="text-center">
															Branch
														</th>
														<th class="text-center">
														  Cust Order Ref	
														</th>
														<th class="text-center">
														  Order Date	
														</th>
														<th class="text-center">
														  Required By	
														</th>
														<th class="text-center">
														  Delivery To	
														</th>
														<th class="text-center">
														 Currency
														</th>
														<th class="text-center">
														 Order Total
														</th>
														<th class="text-center">
														 Currency
														</th>
														<th class="text-center">
														 Tmpl
														</th>
														<th class="text-center">
														</th>
														<th class="text-center">
														</th>
													</tr>
												</thead>
												<tbody>
												<tr>
												  <td colspan="14" class="text-center">No Records</td>
												</tr>
												</tbody>													
											</table>
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
</script>
</body>
</html>