<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
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

/*.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left: 830px;
}*/
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
								<?php 
                           if($page_module == 'market') {
                           ?>
								 <li><a href="#">Market</a></li>
                           <?php }else if($page_module == 'finance') {
                           ?>
                         <li><a href="#">Finance</a></li>
                           <?php }else {
                           ?>
								 <li><a href="#">Market</a></li>
                           <?php }?>
                         <?php 
                           if($page_module == 'market') {
                           ?>
								<li><a class="active" href="<?php echo base_url('fpo/market/customerbranches');?>">Customer Branches</a></li>
                           <?php }else if($page_module == 'finance') {
                           ?>
								<li><a class="active" href="<?php echo base_url('fpo/finance/customerbranches');?>">Customer Branches</a></li>
                           <?php }else {
                           ?>
								<li><a class="active" href="<?php echo base_url('fpo/market/customerbranches');?>">Customer Branches</a></li>
                           <?php }?>
                  
                        
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
                    <?php 
                     if($page_module == 'market'){ ?>
						<form  id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postcustomerbranch')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php } else if($page_module == 'finance'){ ?>
						<form  id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/finance/postcustomerbranch')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php } else { ?>
						<form  id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postcustomerbranch')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php } ?>
                  						
								<div class="row">
									<div class="form-group col-md-4"></div>
									<div class="form-group col-md-4 text-center">
										<label for="inputAddress2">Select a Customer <span class="text-danger">*</span></label>
										<select  class="form-control" id="customer"  name="customer" required data-validation-required-message="Please select customer">
											<option value="0">Select Customer</option>
											<?php for($i=0; $i<count($customer);$i++) { ?>	
											<option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
											<?php } ?>
										</select>
                                        <div class="help-block with-errors text-danger"></div>										
									</div>
									<div class="form-group col-md-4"></div>
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
												<th class="text-center">Action</th>
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
								<!--<div id="smartwizard">-->
									<!--<ul>
										<li><a style="width:80px;"href="#step-1">General settings <br></a></li>
										<li><a style="width:80px;"href="#step-2">Contacts</a></li>
									</ul>-->
								
									<div>
									<!--<div id="step-1">-->
									<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
										<h4 class="text-center text-success">Name and Contact</h4>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-6 ">
											<label for="">Branch Name<span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="30" id="branch_name" name="branch_name" placeholder="Branch Name" required="required" data-validation-required-message="Please enter brnach name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-6 ">
											<label for="">Branch Short Name</label>
											<input type="text" class="form-control" maxlength="20" id="branch_short_name" name="branch_short_name" placeholder="Branch Short Name"  data-validation-required-message="Please enter branch short name.">
											<div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<!--<h4 class="text-center text-success">Sales</h4>
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
											<option value="">Select Sales Area</option>
											<?php for($i=0; $i<count($sale_area);$i++) { ?>	
                                            <option value="<?php echo $sale_area[$i]->id; ?>"><?php echo $sale_area[$i]->area_name; ?></option>
                                            <?php } ?>
											</select>	 
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Group</label>
											<select id="sales_group" name="sales_group" class="form-control">
											<option value="">Select Sales Group</option>
											<?php for($i=0; $i<count($sale_group);$i++) { ?>	
                                            <option value="<?php echo $sale_group[$i]->id; ?>"><?php echo $sale_group[$i]->group_name; ?></option>
                                            <?php } ?>
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
											<option value="">Select Tax Group</option>
											<?php for($i=0; $i<count($tax_group);$i++) { ?>	
                                            <option value="<?php echo $tax_group[$i]->id; ?>"><?php echo $tax_group[$i]->name; ?></option>
                                            <?php } ?>
											</select>	 
										</div>
										</div>-->
										<h4 class="text-center text-success">GL Accounts</h4>
										<div class="form-group col-md-12 mt-3">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
											<select class="form-control" id="gl_group" name="gl_group" required="required" data-validation-required-message="Please select gl group.">
											  <option value="">Select GL Group </option>
											  <?php for($i=0; $i<count($gl_group_info);$i++) { ?>                    
											  <option value="<?php echo $gl_group_info[$i]->account_code; ?>"><?php echo $gl_group_info[$i]->account_name; ?></option>
											  <?php } ?>
											</select>
											<div class="help-block with-errors text-danger"></div>
										  </div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Sales Account</label>
											<select id="sales_account" name="sales_account" class="form-control">
											<option value="">Select Sales Account</option>
											<option value="1">Current Assets</option>
											<option value="2">Inventory Assets</option>
											<option value="3">Capital Assets</option>
											</select>	 
										</div>	
										<div class="form-group col-md-4">
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
											<!--<h4 class="text-center text-success">Branch</h4>-->
										<!--<div class="form-group col-md-12 mt-4">	
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
										
										</div>-->
										<div class="form-group col-md-12">	
										<!--<div class="form-group col-md-4">
											<label for="inputAddress2">Fax Number</label>
											<input type="text" class="form-control numberOnly" minlength="10" maxlength="20" name="fax_number"  id="fax_number" placeholder="Fax Number">											 
										</div>-->
										<!--<div class="form-group col-md-8">
											<label for="inputAddress2">E-Mail Address</label>
								            <input type="email" class="form-control"  id="email" name="email" placeholder="E-Mail Address">
										</div>-->
										<!--<div class="form-group col-md-4">
											<label for="inputAddress2">Document Language</label>
											<select id="doc_lang" name="doc_lang" class="form-control">
											<option value="0">Select Document Language </option>
											<option value="1">Customer default </option>
											<option value="2">English</option>
											</select>	 
										</div>-->	
										</div>
										
											<h4 class="text-center text-success">Address</h4>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-6">	
											<label for="inputAddress2">Billing Address</label>
											<!--<textarea id="mailing_address" maxlength="50" name="mailing_address" class="form-control"></textarea>-->
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" required="required" maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE"  data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="pincode_validate"></div>
												</div>
												<div class="col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="state" class="form-control sel_state" readonly name="state" required="required" data-validation-required-message="Please Select State .">
													<option value="">Select State </option>
													</select>
													<!--<input class="form-control" id="state" name="state"  readonly placeholder="State" required="required" data-validation-required-message="state." >-->
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="district" class="form-control sel_district" readonly name="district" required="required" data-validation-required-message="Please Select District .">
													<option value="">Select District </option>
													</select>
													<!--<input type="text" class="form-control"  id="district" readonly name="district" placeholder="District" required="required" data-validation-required-message="Please enter district.">-->
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk </label>
													<select class="form-control sel_taluk" name="taluk_id" id="taluk_id">
													<option value="">Select Taluk </option>
													</select>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block </label>
													<select id="block" class="form-control sel_block" name="block">
													<option value="">Select Block </option>
													</select>
													<!--<input class="form-control" id="block" name="block"  readonly placeholder="Block" required="required" data-validation-required-message="Please enter block.">-->	
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat </label>
													<select id="gram_panchayat" class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" >
													<option value="">Select Gram Panchayat </option>
													</select>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village </label>
													<select id="village" class="form-control sel_village" id="village" name="village" >
													<option value="">Select Village</option>
													</select>
											    </div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street">
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3" maxlength="50" name="contact_person" id="contact_person" placeholder="Contact Person" >											 
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Mobile Number  </label>
													<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="mobile_num" name="mobile_num" placeholder="Mobile Number">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly" title="Std Code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="phone_number" name="phone_number" placeholder="Phone Number ">													
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control" id="email_address" name="email_address" placeholder="E-Mail Address">
												 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Supply Address</label>
											<!--<textarea id="physical_address" maxlength="50" name="physical_address" class="form-control"></textarea>-->
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <!--<span class="text-danger">*</span>--></label>
													<input type="text" class="form-control numberOnly this_physical_pincode" onkeyup="getphysical_Pincode(this.value)" maxlength="6" pattern="[1-9][0-9]{5}" id="physical_pin_code" name="physical_pin_code" placeholder="PINCODE"  data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="physical_pincode_validate"></div>
												</div>
												<div class="form-group col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <!--<span class="text-danger">*</span>---></label>
													<select id="physical_state" class="form-control" readonly name="physical_state" data-validation-required-message="Please Select State .">
													<option value="">Select State </option>
													</select>
													<!--<input class="form-control" id="state" name="state"  readonly placeholder="State" required="required" data-validation-required-message="state." >-->
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <!--<span class="text-danger">*</span>--></label>
													<select id="physical_district" class="form-control" readonly name="physical_district" data-validation-required-message="Please Select District.">
													<option value="">Select District </option>
													</select>
													<!--<input type="text" class="form-control"  id="district" readonly name="district" placeholder="District" required="required" data-validation-required-message="Please enter district.">-->
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk <!--<span class="text-danger">*</span>--></label>
													<select class="form-control" name="physical_taluk_id" id="physical_taluk_id" >
													<option value="">Select Taluk </option>
													</select>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block <!--<span class="text-danger">*</span>--></label>
													<select id="physical_block" class="form-control" name="physical_block" >
													<option value="">Select Block </option>
													</select>
													<!--<input class="form-control" id="block" name="block"  readonly placeholder="Block" required="required" data-validation-required-message="Please enter block.">-->	
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat <!--<span class="text-danger">*</span>--></label>
													<select id="physical_gram_panchayat" class="form-control" id="physical_gram_panchayat" name="physical_gram_panchayat" >
													<option value="">Select Gram Panchayat </option>
													</select>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village <!--<span class="text-danger">*</span>--></label>
													<select id="physical_village" class="form-control" id="physical_village" name="physical_village" >
													<option value="">Select Village</option>
													</select>
											    </div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75" id="physical_street" name="physical_street" placeholder="Street">
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3" maxlength="50" name="physical_contact_person" id="physical_contact_person" placeholder="Contact Person" >
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Mobile Number </label>
													<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="physical_mobile_num" name="physical_mobile_num" placeholder="Mobile Number">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly" title="Std Code starts with '0'" pattern="^[0][0-9]{2,8}$" id="physical_std_code" maxlength="8" minlength="3" name="physical_std_code" placeholder="Ex:012">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="physical_phone_number" name="physiacl_phone_number" placeholder="Phone Number ">												
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control" id="physical_email" name="physical_email" placeholder="E-Mail Address">
												 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
											</div>
											<div class="form-group col-md-12">
												<div class="col-md-12">
													<input type="checkbox" name="sameaddress" id="same_address" value="1" class="" >&nbsp; &nbsp; Physial address same as Mailing address
												</div>
											</div>
											<div class="form-group col-md-12 mt-1">
									<!--	<div class="form-group col-md-6">	
										<h4 class="text-center text-success">Dimension</h1>
											<label for="inputAddress2">Dimension 1</label>
											<select id="dimension" name="dimension" class="form-control" required>
											<option value="1">1 Support </option>
											<option value="2">2 Development </option>
											</select>		
										</div>-->
										<div class="form-group col-md-3">	
										</div>
										<div class="form-group col-md-6">	
										<h4 class="text-center text-success">General</h1>
												
											<label for="inputAddress2">General Notes</label>
											<textarea id="general_notes" rows="3" maxlength="50" name="general_notes" class="form-control"></textarea>											
										
										</div>
										</div>
										
										</div>
										<div class="form-group col-md-12 text-center">
										<button align="center" name="general_submit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                              <?php 
                              if($page_module == 'market') {
                              ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                              <?php }else if($page_module == 'finance') {
                              ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                              <?php }else {
                              ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                              <?php }?>
                              </div>										
									  </div>
									 
									<!--</div>-->
						<!--	<div id="step-2" >
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
									</div> -->								
								</div>
							<!--</div>-->
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
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script>
$(document).ready(function() {
	$("#form-step-0").hide();
   $('#customer').select2();
});
  $("#same_address").click(CopyAdd);
	  function CopyAdd() {
	if (this.checked==true) {
	            var sameaddress = $("#sameaddress").html();
                var pincode = $("#pin_code").html();
                var state = $("#state").html();
                var district = $("#district").html();
				var taluk_id = $("#taluk_id").html();
				//alert(taluk_id);
                var block = $("#block").html();
				//alert(block);
                var gram_panchayat = $("#gram_panchayat").html();
                var village = $("#village").html();
                var street = $("#street").html();
				var contact_person = $("#contact_person").html();
				var std_code = $("#std_code").html();
				var mobile_num = $("#mobile_num").html();
				var phone_number = $("#phone_number").html();
				var email_address = $("#email_address").html();
				$("#physical_pin_code").html(pincode);
				//getphysical_Pincode( pincode );
                //$("#physical_state").innerHTML=state;
               // $("#physical_district").innerHTML=district;
				 //$("#physical_taluk_id").innerHTML=taluk_id;
				 document.getElementById('physical_contact_person').innerHTML = contact_person;
				 document.getElementById('physical_std_code').innerHTML = std_code;
				 document.getElementById('physical_mobile_num').innerHTML = mobile_num;
				 document.getElementById('physical_phone_number').innerHTML = phone_number;
				 document.getElementById('physical_email').innerHTML = email_address;
				document.getElementById('physical_pin_code').innerHTML = pincode;
				document.getElementById('physical_state').innerHTML = state;
				document.getElementById('physical_district').innerHTML = district;
				document.getElementById('physical_taluk_id').innerHTML = taluk_id;
				document.getElementById('physical_block').innerHTML = block;
				document.getElementById('physical_gram_panchayat').innerHTML = gram_panchayat;
				document.getElementById('physical_village').innerHTML = village;
				document.getElementById('physical_street').innerHTML =street; 
				document.getElementById('physical_pin_code').value = $("#pin_code").val();
				document.getElementById('physical_state').value = $("#state").val();
				document.getElementById('physical_district').value = $("#district").val();
				document.getElementById('physical_taluk_id').value = $("#taluk_id").val();
				document.getElementById('physical_block').value = $("#block").val();
				document.getElementById('physical_gram_panchayat').value = $("#gram_panchayat").val();
				document.getElementById('physical_village').value = $("#village").val();
				document.getElementById('physical_contact_person').value = $("#contact_person").val();
				document.getElementById('physical_std_code').value = $("#std_code").val();
				document.getElementById('physical_phone_number').value = $("#phone_number").val();
				document.getElementById('physical_mobile_num').value = $("#mobile_num").val();
				document.getElementById('physical_email').value = $("#email_address").val();
				document.getElementById('physical_street').value = $("#street").val();
				
  } else {

  }
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
								 //alert('Oops we still have error in the form');
								 return false;
							}else{
								 //alert('Great! we are ready to submit form');
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
		$("#form-step-0").show();
			//$("#supplier_del").show();
			e.preventDefault();
			var customer = $(this).val();		
			if(customer) { 
			$.ajax({
				url: "<?php echo base_url();?>fpo/Market/customerbranchlist/"+customer,
				type: "GET",
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
							customerbranch_list += '<tr><td>'+value.branch_ref+'</td><td>'+value.br_name+'</td><td>'+value.contact_name+'</td><td></td><td></td><td><?php if($page_module == 'market') {?><a href="<?php echo base_url("fpo/market/editcustomerbranch/'+value.branch_code+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><?php }else if($page_module == 'finance') {?><a href="<?php echo base_url("fpo/finance/editcustomerbranch/'+value.branch_code+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><?php }else {?><a href="<?php echo base_url("fpo/market/editcustomerbranch/'+value.branch_code+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td><?php }?></tr>';
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
		
		$('#gram_panchayat').change(function(){

	var gram_panchayat = $("#gram_panchayat").val();
	//alert(crop_category);
	getVillageList( gram_panchayat );
	});  
	 $('#block').change(function(){
		
		 var block = $("#block").val();
		  //alert(crop_category);
		  getPanchayatList( block );
	 });
	 	$('#physical_gram_panchayat').change(function(){

	var gram_panchayat = $("#physical_gram_panchayat").val();
	//alert(crop_category);
	getphysical_VillageList( gram_panchayat );
	});  
	 $('#physical_block').change(function(){
		
		 var block = $("#physical_block").val();
		  //alert(crop_category);
		  getphysical_PanchayatList( block );
	 });
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
function getphysical_Pincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);                
				response=response.trim();
				responseArray=$.parseJSON(response);
				//alert(responseArray.status);
                if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
    				/* $.each(responseArray.getlocation['villageInfo'],function(key, value){
                        village += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                        gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                    });	*/
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk_id += '<option value='+value.id+'>'+value.name+'</option>'
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
                    $('#physical_village').html(village);
                    $('#physical_gram_panchayat').html(gram_panchayat);
					$('#physical_state').html(state);
					$('#physical_district').html(district);
					$('#physical_block').html(block);
					$('#physical_taluk_id').html(taluk_id);
                } else {
					$(".this_physical_pincode").val('');
					$(".this_physical_pincode").focus();
					$("#physical_pincode_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$("#physical_state").html('<option value="">Select State</option>');
					$("#physical_district").html('<option value="">Select District</option>');
					$("#physical_taluk").html('<option value="">Select Taluk</option>');
					$("#physical_block").html('<option value="">Select Block</option>');
					$("#physical_panchayat").html('<option value="">Select Gram Panchayat</option>');
					$("#physical_village").html('<option value="">Select Village</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}

function getphysical_PanchayatList( block_code ) {
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
                $('#physical_gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getphysical_VillageList( panchayat_code ) {
	
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
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#physical_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}	
</script>
</body>
</html>