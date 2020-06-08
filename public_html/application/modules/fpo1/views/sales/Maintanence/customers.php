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
								<li><a href="#">Market</a></li>
								<li><a class="active" href="<?php echo base_url('fpo/Market/customers');?>">Customers</a></li>
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
							<form  id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postcustomer')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
								<input type="hidden" class="form-control" id="debtor_no" name="debtor_no">
								<div class="row">
										<div class="form-group col-md-3">						
										</div>
									<div class="form-group col-md-4 text-center">
										<label for="inputAddress2">Select a Customer</label>
										<select  class="form-control" id="customer"  name="customer">
										  <option value="0">New Customer</option>
											<?php for($i=0; $i<count($customer);$i++) { ?>										
											<option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
											<?php } ?>
										</select>		
									</div>
									<div class="form-group col-md-3  mt-4">
										<label for="inputAddress2">Show Inactive:</label>
									  <input type="checkbox" id="item" name="item" class="form-check-input ml-2" onchange="activeClick(this);">												
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
											<input type="text" class="form-control"  name="gst" maxlength="15"  id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
										   <div class="help-block with-errors text-danger"></div>
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
											<option value="1">Retail</option>
											<option value="2">Wholesale</option>
											</select>							
										</div>
										</div>
										<h4 class="text-center text-success">Branch</h1>
										<div class="form-group col-md-12 mt-4">	
									
										<div class="form-group col-md-4">
											<label for="inputAddress2">Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10"  pattern="^[6-9]\d{9}$"  name="phone_num"  id="phone_num" placeholder="Phone Number">											 
										   <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Secondary Phone Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" pattern="^[6-9]\d{9}$"  name="secondary_phone_num"  id="secondary_phone_num" placeholder="Secondary Phone Number">											 
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Contact Person</label>
											 <input type="text" class="form-control" minlength="3" maxlength="30" name="contact_person"  id="contact_person" placeholder="Contact Person" >											 
										    <div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<div class="form-group col-md-12">	
										<!-- <div class="form-group col-md-4">
											<label for="inputAddress2">Fax Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="20" name="fax_number"  id="fax_number" placeholder="Fax Number">											 
										</div> -->
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address</label>
												<input type="email" class="form-control"  id="email" name="email" placeholder="E-Mail Address">
										       <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Person</label>
											<select id="sales_person" name="sales_person" class="form-control">
											<option value="">Select Sales Person</option>
                                  <?php for($i=0; $i<count($salesperson);$i++) { ?>										
                                  <option value="<?php echo $salesperson[$i]->salesman_code; ?>"><?php echo $salesperson[$i]->salesman_name; ?></option>
                                  <?php } ?>
											</select>	 
										</div>	
										</div>
										<div class="form-group col-md-12">	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Default Inventory Location</label>
											<select id="inventory_location" name="inventory_location" class="form-control">
											<option value="0">Select Inventory Location</option>
											<option value="1">Location 1</option>
											<option value="2">Location 2</option>
											<option value="3">Location 3</option>
											<option value="4">Location 4</option>
											</select>	 
										</div>	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Default Shipping Company</label>
											<select id="shipping_company" name="shipping_company" class="form-control">
											<option value="0">Select Shipping Company</option>
											<option value="1">SproutsIO</option>
											<option value="2">BrightFarms</option>
											<option value="3">Edenworks</option>
											<option value="4">Fujitsu</option>
											
											</select>	 
										</div>	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Sales Area</label>
											<select id="sales_area" name="sales_area" class="form-control">
											<option value="0">Select Sales Area</option>
											<option value="1">Erode</option>
											<option value="2">Chennai</option>
											<option value="1">Cbe</option>
											</select>	 
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Tax Group</label>
											<select id="tax_group" name="tax_group" class="form-control">
											<option value="0">Select Tax Group</option>
											<option value="1">Tax</option>
											<option value="2">Tax Exempt</option>
											</select>	 
										</div>
										</div>
										<h4 class="text-center text-success">Sales</h1>
										<div class="form-group col-md-12 mt-4">										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly"  maxlength="2" name="discount_percent"  id="discount_percent" placeholder="Discount Percent" >
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Credit Limit</label>
											<input type="text" class="form-control numberOnly" value="1,000" minlength="2" maxlength="10" name="credit_limit"  id="credit_limit" placeholder="Credit Limit">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Prompt Payment Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly"  maxlength="2" name="prompt_discount_percent"  id="prompt_discount_percent" placeholder="Prompt Payment Discount Percent" >
										</div>
										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Payment Terms</label>
											<select id="payment_terms" name="payment_terms" class="form-control" >
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
											<select id="dimension1" name="dimension1" class="form-control" >
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
									  <!--<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>-->
										<button  id="general_submit" align="center" name="general_submit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
										
										<button   align="center" id="update" name="update" class="btn btn-success text-center"  type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
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
														<select id="dimension1" multiple="multiple" name="dimension1" class="form-control">
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
												<input  class="form-control" type="date"   id="transaction_from" name="transaction_from">		
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">To</label>
												<input  class="form-control" type="date"   id="transaction_to" name="transaction_to">		
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
												<input  class="form-control" type="date"   id="purchase_from" name="purchase_from">		
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">To</label>
												<input  class="form-control" type="date"   id="purchase_to" name="purchase_to">		
											</div>
												
										</div>
										
										<div class="row ">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Location</label>
												<select  class="form-control" id="receive_into"  name="receive_into" >
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
												<select  class="form-control" id="receive_into"  name="receive_into" >
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
			function validateEmail(emailField){
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(emailField.value) == false) 
					{
						//alert('Invalid Email Address');
						return false;
					}

					return true;

			} 
		$('#gst').change(function (event) { 
			var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/; 
			var txtgst = $(this).val(); 
			if (txtgst.length == 15 ) { 
			if( txtgst.match(regExp) ){ 
		//	alert('GST match found');
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
	function activeClick(customerval) {
				if(customerval.checked == true) { 
					$("#customer option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('fpo/market/getallcustomer')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {	
							console.log(value.debtor_no);									   
								div_data +="<option value="+value.debtor_no+">"+value.name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#customer');
						}
					});
				}else{
					 $("#customer option").remove() ;		
					$.ajax({
						url: '<?php echo base_url('fpo/market/getactivecustomer')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {
								console.log(value.supplier_id);							   
								div_data +="<option value="+value.debtor_no+">"+value.name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#customer');
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
			$('#transaction_from').attr('max', maxDate);
			$('#transaction_to').attr('max', maxDate);
			$('#purchase_from').attr('max', maxDate);
			$('#purchase_to').attr('max', maxDate);
		
		});
		
		$("#update").hide();
		//$("#supplier_del").hide();
		$('select[name="customer"]').on('change', function(e) {
			$("#general_submit").hide();
			$("#update").show();
			//$("#supplier_del").show();
			e.preventDefault();
			var customer = $(this).val();			
			if(customer) { 
			$.ajax({
				url: "<?php echo base_url();?>fpo/Market/editcustomer/"+customer,
				type: "POST",
				data:{customer:customer},
				success:function(response) {
					responsearr=$.parseJSON(response);
					console.log(response);
					$.each(responsearr, function(key, value) {						
					document.getElementById("debtor_no").value=value.debtor_no;	
					document.getElementById("customer_name").value=value.name;	
					document.getElementById("customer_short_name").value=value.debtor_ref;	
					document.getElementById("address").value=value.address;	
					document.getElementById("tax_group").value=value.tax_id;	
					document.getElementById("discount_percent").value=value.discount;	
					document.getElementById("credit_limit").value=value.credit_limit;	
					document.getElementById("prompt_discount_percent").value=value.pymt_discount;	
					document.getElementById("payment_terms").value=value.payment_terms;
					document.getElementById("credit_status").value=value.credit_status;
					// var $radios = $('input:checkbox[name=tax_included]');
					// var tax_included=value.tax_included;
                    // if(tax_included == 1){
                         // if($radios.is(':checked') === false) {
                                // $radios.filter('[value=1]').prop('checked', true);              
                        // }
                    // }
					
					document.getElementById("dimension1").value=value.dimension_id;	
					document.getElementById("notes").value=value.general_notes;	
					document.getElementById("dimension").value=value.dimension2_id;	
					document.getElementById("sales_area").value=value.area;	
					document.getElementById("contact_person").value=value.contact_name;
					document.getElementById("sales_person").value=value.salesman;
					document.getElementById("inventory_location").value=value.default_location;
					document.getElementById("shipping_company").value=value.default_ship_via;
					//document.getElementById("sales_person").value=value.salesman;
					//document.getElementById("sales_person").value=value.salesman;
					
					}); 
					  
				}
			});
			}						
		});

</script>
</body>
</html>