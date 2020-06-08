<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.text-right {
   font-style: normal ! important;
}
.select2-selection__rendered {
    border-color: #007901 ! important;
    display: block;
    width: 100%;
    height: calc(2.35rem + 2px) ! important;
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
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-transform: capitalize;
}
#suggestions,#suggestionsMobile {
	position: absolute;
    z-index: 1;
    background-color: #fff;
    width: 91%;
}
#autoSuggestionsList > ul,#autoSuggestionsListMobile > ul {
    list-style: none outside none;
	margin-bottom: 0;
}
#autoSuggestionsList > ul > li,#autoSuggestionsListMobile > ul > li {
    padding: 3px 15px 3px 13px;
}
#autoSuggestionsList > ul > li > div,#autoSuggestionsListMobile > ul > li > div {
    cursor: pointer;
}
.auto_list {
    border: 1px solid #007901;
    border-radius: 5px 5px 5px 5px;
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
								<li><a href="#">Maintenance</a></li>
                        <?php 
                        if($page_module == 'market') {
                        ?>
								<li><a class="active" href="<?php echo base_url('fpo/Market/customers');?>">Customers</a></li>
                        <?php }else if($page_module == 'finance') {
                        ?>
								<li><a class="active" href="<?php echo base_url('fpo/finance/customers');?>">Customers</a></li>
                        <?php }else {
                        ?>
								<li><a class="active" href="<?php echo base_url('fpo/Market/customers');?>">Customers</a></li>
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
                     if($page_module == 'market') {
                     ?>
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postcustomer')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
                     <?php }else if($page_module == 'finance') {
                     ?>
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/finance/postcustomer')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
                     <?php }else {
                     ?>
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postcustomer')?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
                     <?php }?>
									<div>
                                    <div class="row">
                                    <div class="col-md-4 mt-4 ml-4">
                                          <input type="checkbox" name="same_supplier" id="same_supplier" value="1" class="">&nbsp; &nbsp; Also as Supplier
                                    </div>
                                        <div class="form-group col-md-4 text-center">
                                            <label for="inputAddress2">Select a Customer</label>
                                            <select class="form-control new_cus" id="customer" name="customer">
                                              <option value="0">New Customer</option>
                                                <?php for($i=0; $i<count($customer);$i++) { ?>	
                                                <option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
                                                <?php } ?>
                                            </select>		
                                        </div>
                                        <div class="form-group col-md-4"></div>
                                    </div>
									<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
										<h4 class="text-center text-success mt-1">Name and Billing Address</h4>
										<div class="form-group col-md-12 mt-4">
									   <div class="form-group col-md-3">
											<label for="inputAddress2">Mobile Number </label>
											<input type="text" autofocus class="form-control numberOnly new_mobile" autocomplete="off" onkeyup="ajaxmobileSearch()" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" placeholder="Mobile Number"  data-validation-required-message="Please enter mobile number.">
											<div id="suggestionsMobile">
												 <div id="autoSuggestionsListMobile"></div>
											</div>
											<div id="mbl_validate" class="help-block with-errors text-danger"></div>
										</div>
                              
										<div class="form-group col-md-3 ">
											<label for="">Name of the Customer <span class="text-danger">*</span></label>
											<input type="text" class="form-control" autocomplete="off" maxlength="100" id="customer_name" name="customer_name" placeholder="Customer Name" required="required" data-validation-required-message="Please enter customer name."><!--onkeyup="ajaxSearch()"-->
											<div id="suggestions">
												<div id="autoSuggestionsList"></div>
											</div>
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-3">
											<label for="">Customer Short Name </label>
											<input type="text" class="form-control" maxlength="20" onfocus="clearSearch()" id="customer_short_name" name="customer_short_name" placeholder="Customer Short Name" >
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
											<select class="form-control" id="gl_group" name="gl_group" required="required" data-validation-required-message="Please select gl group.">
											  <?php for($i=0; $i<count($gl_group_info);$i++) { ?>                    
											  <option value="<?php echo $gl_group_info[$i]->account_code; ?>"><?php echo $gl_group_info[$i]->account_name; ?></option>
											  <?php } ?>
											</select>
											<div class="help-block with-errors text-danger"></div>
										  </div>
															
										<!--<div class="form-group col-md-4">
											<label for="inputAddress2">GST No</label>
											<input type="text" class="form-control text-uppercase" name="gst" maxlength="15"  id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
										   <div class="help-block with-errors text-danger"></div>
										</div>-->
										</div>
										<div class="form-group col-md-12 mt-1">
										<!--<div class="form-group col-md-8">
											<label for="inputAddress2">Address</label>
											<textarea type="text" class="form-control" rows="3" id="address" name="address" maxlength="100" placeholder="Address"></textarea>						
										 </div>-->
										 <div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
											<input type="text" onfocus="clearSearch()" autocomplete="off" onkeyup="getPincode(this.value)" class="form-control numberOnly this_pin_code" required="required" id="pin_code" pattern="[1-9][0-9]{5}" name="pin_code" minlength="6" maxlength="6" placeholder="PINCODE"  data-validation-required-message="Please enter pincode.">						
											 <p class="help-block with-errors text-danger" id="pincode_validate"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select id="state" name="state" class="form-control sel_state" required="required" data-validation-required-message="Please Select state." readonly>
											 <option value="">Select State </option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District <span class="text-danger">*</span> </label>
											<select id="district" name="district" class="form-control sel_district" required="required" data-validation-required-message="Please Select district."readonly>
											 <option value="">Select District </option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										</div>
										<div class="col-md-12 form-group">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk </label>
											<select id="taluk_id" name="taluk_id" class="form-control sel_taluk" >
											 <option value="">Select Taluk </option>
											 </select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block </label>
											<select id="block" name="block" class="form-control sel_block">
											 <option value="">Select Block </option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat </label>
											<select  name="gram_panchayat" id="gram_panchayat" class="form-control sel_panchayat" >
											<option value="">Select Gram Panchayat </option>
											</select>							
										</div>
										</div>
										<div class="col-md-12 form-group">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village / City </label>
											<select id="village" name="village" class="form-control sel_village" >
											 <option value="">Select Village </option>
											</select>
										</div>																													
										<div class="form-group col-md-4">
											<label for="inputAddress2">Name of the Contact Person </label>
											<input type="text"  class="form-control" id="contact_person" name="contact_person" maxlength="100" placeholder="Contact Person" >
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address </label>
											<input type="email" class="form-control" id="email_address" name="email_address" placeholder="E-Mail Address" data-validation-required-message="Please enter email address.">
											<div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<div class="form-group col-md-12">
										 <div class="form-group col-md-3">
											<label for="">STD Code</label>
											<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." id="std_code" maxlength="8" name="std_code" title="Std Code starts with '0'" placeholder="Ex:012">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Phone Number </label>
											<input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="phone_number" name="phone_number"  placeholder="Phone Number ">				
										    <div class="help-block with-errors text-danger"></div>
										</div>	
										<div class="form-group col-md-5">
											<label for="inputAddress2">Door No / Street</label>
											<textarea id="street" maxlength="50" name="street" class="form-control"></textarea>
										</div>
										<div class="col-md-12">
											<input type="checkbox" name="sameaddress" id="same_address" value="1" class="" >&nbsp; &nbsp; Billing address same as Supply address
										</div>
										</div>
										
										<h4 class="text-center text-success">Supply Address</h4>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE </label>
											<input type="text" onkeyup="getphysical_Pincode(this.value)" class="form-control numberOnly this_physical_pincode" id="physical_pincode" pattern="[1-9][0-9]{5}" name="physical_pincode" minlength="6" maxlength="6" placeholder="PINCODE"  data-validation-required-message="Please enter pincode.">						
											 <p class="help-block text-danger with-errors" id="physical_pincode_validate"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">State </label>
											<select id="physical_state" class="form-control" readonly name="physical_state" data-validation-required-message="Please Select State .">
											 <option value="">Select State </option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District </label>
											<select id="physical_district" class="form-control" readonly name="physical_district" data-validation-required-message="Please Select District .">
											 <option value="">Select District </option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk </label>
											<select class="form-control" name="physical_taluk_id" id="physical_taluk_id" data-validation-required-message="Please Select Taluk .">
											 <option value="">Select Taluk </option>
											 </select>
											 <p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block </label>
											<select id="physical_block" class="form-control" name="physical_block" data-validation-required-message="Please Select Block .">
											 <option value="">Select Block </option>
											</select>
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat </label>
											<select id="physical_gram_panchayat" class="form-control" id="physical_gram_panchayat" name="physical_gram_panchayat" data-validation-required-message="Please Select gram panchayat .">
											<option value="">Select Gram Panchayat </option>
											</select>
											 <p class="help-block with-errors text-danger"></p>								
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village / City </label>
											<select id="physical_village" class="form-control" id="physical_village" name="physical_village" data-validation-required-message="Please enter village.">
											 <option value="">Select Village </option>
											</select>
											 <p class="help-block  with-errors text-danger"></p>
										</div>										
										<div class="form-group col-md-4">
											<label for="inputAddress2">Name of the Contact Person </label>
											<input type="text" class="form-control" id="physical_contact_person" name="physical_contact_person" maxlength="100" placeholder="Contact Person" >					
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address </label>
											<input type="email" class="form-control"  id="physical_email" name="physical_email" placeholder="E-Mail Address" data-validation-required-message="Please enter email address.">
											<div class="help-block with-errors text-danger"></div>
										</div>
										</div>
										<div class="form-group col-md-12">
										 <div class="form-group col-md-3">
											<label for="">STD Code</label>
											<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." id="physical_std_code" maxlength="8" name="physical_std_code" title="Std Code starts with '0'" placeholder="Ex:012">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">										
											<label for="inputAddress2">Phone Number </label>
											<input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="physical_phone_number" name="physical_phone_number" placeholder="Phone Number ">
										    <div class="help-block with-errors text-danger"></div>
										</div>	
										<div class="form-group col-md-5">
											<label for="inputAddress2">Door No / Street</label>
											<textarea id="physical_street" maxlength="50" name="physical_street" class="form-control"></textarea>
										</div>
									    </div>
										
										<h4 class="text-center text-success">Tax Details</h4>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-3">
											<label for="inputAddress2">Place of Customer</label>
											<select id="place_of_customer" name="place_of_customer" class="form-control"  >
											 <option value="">Select State </option>
											</select> 
										<!-- <select id="place_of_customer" name="place_of_customer" class="form-control" >
											<option value="">Select Place of Customer</option>
											<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>	
											</select> --> 
											<div class="help-block with-errors text-danger"></div>
										</div>										
										<div class="form-group col-md-3">
											<label for="inputAddress2">PAN</label>
											<input type="text" class="form-control text-uppercase" id="pan_promoting_institution" maxlength="10" name="pan_promoting_institution" placeholder="EX:AAAPL1234C" data-validation-required-message="Please enter pan of promoting institution.">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">GST No</label>
											<input type="text" class="form-control text-uppercase" name="gst" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
										   <div class="help-block with-errors text-danger"></div>
									
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Registration Type</label>
											<select id="registration_type" name="registration_type" class="form-control">
												<option value="">Select Registration Type</option>
												<option value="1">Regular</option>
												<option value="2">Composition</option>
												<option value="3">Consumer</option>
												<option value="4">Unregistered</option>
												<option value="5">Overseas</option>
												<option value="6">Special Economic Zone</option>
											</select>							
										</div>
										
										</div>
										<h4 class="text-center text-success">Bank Details </h1>
										<div class="form-group col-md-12 mt-3">	
											<div class="form-group col-md-4">
												<label class=" form-control-label">Provide Bank A/c details</label>
											   <select id="bank_info" name="bank_info" class="form-control">
													 <option value="2" selected>No</option>
													 <option value="1">Yes</option>
												</select>
											</div>
											<div class="form-group col-md-4" id="bank_details1">
												<label for="inputAddress2">Bank Name</label>
                                                <select class="form-control" id="bank_name" name="bank_name">
                                                   <option value="">Select Bank Name</option>
                                                    <!--<?php for($i=0; $i<count($bank_name);$i++) { ?>	
                                                     <option value="<?php echo $bank_name[$i]->id; ?>"><?php echo $bank_name[$i]->name; ?></option>
                                                    <?php } ?>-->
                                                </select> 
											</div>
											<div class="form-group col-md-4" id="bank_details2">
												<label for="inputAddress2">Branch Name</label>
												<select id="branch_name" name="branch_name" class="form-control" >
												<option value="0">Select Branch Name</option>		
												</select>	 
											</div>
										</div>
										<div class="form-group col-md-12 mt-4" id="bank_details3">										
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account Number</label>
												<input type="text" class="form-control text-uppercase" maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IFSC Code</label>
												<input type="text" class="form-control text-uppercase" maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
											</div>
										</div>
										<h4 class="text-center text-success">Sales</h4>
										<div class="form-group col-md-12 mt-4">										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" maxlength="2" name="discount_percent" id="discount_percent" placeholder="Discount Percent" >
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Credit Limit (Rupees)</label>
											<input type="text" class="form-control numberOnly" minlength="2" maxlength="6" name="credit_limit" id="credit_limit" placeholder="Credit Limit">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Prompt Payment Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" maxlength="2" name="prompt_discount_percent" id="prompt_discount_percent" placeholder="Prompt Payment Discount Percent" >
										</div>
										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Payment Terms</label>
											<select id="payment_terms" name="payment_terms" class="form-control" >
											<option value="">Select Payment Terms</option>
											<?php for($i=0; $i<count($payment_terms);$i++) { ?>	
                                            <option value="<?php echo $payment_terms[$i]->terms_indicator; ?>"><?php echo $payment_terms[$i]->terms; ?></option>
                                            <?php } ?>	
											</select>	 
										</div>
										</div>
										
										<h4 class="text-center text-success">Others</h4>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Credit Status</label>
											<select id="credit_status" name="credit_status" class="form-control">
												<option value="">Select Credit Status</option>
												<option value="1">Active</option>
												<option value="2">In Active</option>
											</select>											
										</div>								
										<div class="form-group col-md-3" id="credit_period1" style="display:none;">
											<label for="inputAddress2">Credit Period (Days)</label>
											<input type="text" class="form-control numberOnly" maxlength="3" name="credit_period" id="credit_period" placeholder="Credit Period">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-6" >
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly text-right" maxlength="6" name="opening_balance" value="0" id="opening_balance" required placeholder="Opening Balance" data-validation-required-message="Provide the opening balance">
												<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-6">
												<label class="form-control-label">Balance Type <span class="text-danger">*</span></label>
												<select id="transaction_type" name="transaction_type" class="form-control" required data-validation-required-message="Provide the balance type">
												<option value="2" selected>Dr</option>
												<option value="1">Cr</option>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>											
										</div>
										</div>
										<div class="form-group col-md-12">	
										<div class="form-group col-md-6">	
											<label for="inputAddress2">General Notes</label>
											<textarea id="general_notes" maxlength="50" name="general_notes" class="form-control"></textarea>										
										</div>														
										</div>		
									  </div>
									  <div class="form-group col-md-12 text-center">
									  <!--<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>-->
										<button id="general_submit" align="center" name="general_submit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Save</button>										
										<!--<button align="center" id="update" name="update" class="btn btn-success text-center"  type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>-->
										
                               <?php 
                                 if($page_module == 'market') {
                                 ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else if($page_module == 'finance') {
                                 ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else {
                                 ?>
                              <a href="" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }?>
                              
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
 <script src="<?php echo asset_url()?>js/select2.min.js"></script>  
<script>
/*$('#bank_name').change(function(){
    var get_bank_id = $("#bank_name").val();
    getBankAddressByBankName( get_bank_id );
});*/
$('.new_cus').select2();
function ajaxSearch() {
    var input_data = $('#customer_name').val();
    if (input_data.length < 3) {
        $('#suggestions').hide();
    }
    else {
		var arrFields = ["customer_name", "customer", "gl_group", "bank_info", "bank_name", "branch_name", "account_number", "ifsc_code", "transaction_type"];
      $('#addpopi_Form').find('input[type=text], select').each(function(){
         if(arrFields.indexOf($(this).attr('name')) >= 0 ) {
         }
         else {
				$(this).val('');
			}
 		});
		$('#same_address').prop('checked', false);
		
        var post_data = {
            'search_data': input_data,
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>fpo/market/getAllCustomersSuppliers",
            data: post_data,
            success: function (data) {
                if (data.length > 0) {
                    $('#suggestions').show();
  				    $('#autoSuggestionsList').addClass('auto_list');
                    $('#autoSuggestionsList').html(data);
                }
				else {
					$('#suggestions').hide();
  				    $('#autoSuggestionsList').removeClass('auto_list');
                    $('#autoSuggestionsList').html('');
				}
            }
         });
     }
 }
//search mobile number
function ajaxmobileSearch() {
    var input_data = $('#mobile_num').val();
    if (input_data.length < 10) {
       $('#suggestionsMobile').hide();
    }
   else {
		var arrFields = ["mobile_num","customer_name", "customer", "gl_group", "bank_info", "bank_name", "branch_name", "account_number", "ifsc_code", "transaction_type"];
		$('#addpopi_Form').find('input[type=text], select').each(function(){
         if(arrFields.indexOf($(this).attr('mobile_num')) >= 10 ) {
        }
         else {
				//$(this).val('');
			}
 		});
		$('#same_address').prop('checked', false);
		
        var post_data = {
            'search_data': input_data,
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>fpo/market/getAllMobileCustomersSuppliers",
            data: post_data,
            success: function (data) {
                if (data.length > 0) {
                     $('#suggestionsMobile').show();
                     $('#autoSuggestionsListMobile').addClass('auto_list');
                     $('#autoSuggestionsListMobile').html(data);
                }
				else {
                  $('#suggestions').hide();
                  $('#autoSuggestionsListMobile').removeClass('auto_list');
                  $('#autoSuggestionsListMobile').html('');
				}
            }
         });
     }
 }

  
 function clearSearch() {
	 $('#suggestions').hide();
	 $('#autoSuggestionsList').removeClass('auto_list');
	 $('#autoSuggestionsList').html('');
 }
 
 function fnCustomer(element, id) {
	var name = $(element).data('name');
	$('#customer_name').val(name);
	clearSearch();
	var post_data = {
		'debtor_no': id,
	};
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>fpo/market/getCustomer",
		data: post_data,
		success: function (response) {
			responsearr = $.parseJSON(response);
			$.each(responsearr, function(key, value) {
				$('#customer_short_name').val(value.debtor_ref);
				$('#pin_code').val(value.pincode);
				populateBasedOnPIN( value.pincode, value.taluk_id, value.block, value.state, value.district );
				if(value.block) {
					getPanchayatList( value.block, value.panchayat );
				}
				if(value.panchayat) {
					getVillageList(value.panchayat, value.village);
				}
				$('#street').val(value.address);
				$('#contact_person').val(value.contact_person);
				$('#std_code').val(value.std_code);
				$('#phone_number').val(value.phone_number);
				$('#mobile_num').val(value.mobile_number);
				$('#email_address').val(value.email);
				if(value.sameaddress == 1) {
					$('#same_address').prop('checked', true);
				}
				$('#physical_pincode').val(value.physical_pincode);
				getphysical_Pincode(value.physical_pincode, value.physical_taluk_id, value.physical_block);
				if(value.physical_block) {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_panchayat) {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
				$('#physical_street').val(value.physical_street);
				$('#physical_contact_person').val(value.physical_contact_person);
				$('#physical_std_code').val(value.physical_std_code);
				$('#physical_phone_number').val(value.physical_phone_number);
				$('#physical_mobile_num').val(value.physical_mobile_num);
				$('#physical_email').val(value.physical_email);
				$('#pan_promoting_institution').val(value.pan_no);
				$('#gst').val(value.gst_no);
            getplaceofcustomer(value.place_of_customer);
				$('#registration_type').val(value.registration_type);
				
				if(value.block && value.panchayat && $('#gram_panchayat').val() == '') {
					getPanchayatList( value.block, value.panchayat );
				}
				if(value.panchayat && value.village && $('#village').val() == '') {
					getVillageList( value.panchayat, value.village );
				}
				if(value.physical_block && value.physical_panchayat && $('#physical_gram_panchayat').val() == '') {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_panchayat && value.physical_village && $('#physical_village').val() == '') {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
			});
		}
	 });
 }
 
 function populateBasedOnPIN( pin_code, taluk_id, block, state, district ) {    
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
  				response=response.trim();
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {
					var strState = '<option value="">Select State </option>';
					var strDistrict = '<option value="">Select District </option>';
 					var strBlock ='<option value="">Select Block</option>';
					var strTaluk ='<option value="">Select Taluk</option>';
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
						if(value.id == taluk_id) {
							strTaluk += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							strTaluk += '<option value='+value.id+'>'+value.name+'</option>'
						}
                    });
                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
						if(value.id == block) {
							strBlock += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							strBlock += '<option value='+value.id+'>'+value.name+'</option>'
						}
                    });
					$.each(responseArray.getlocation['cityInfo'],function(key, value){
						if(value.id == district) {
							strDistrict += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							strDistrict += '<option value='+value.id+'>'+value.name+'</option>'
						}
                    });
                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
						if(value.id == state) {
							strState += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							strState += '<option value='+value.id+'>'+value.name+'</option>'
						}
                    });
					$('#taluk_id').html(strTaluk);
					$('#block').html(strBlock);
					$('#state').html(strState);
              // $('#place_of_customer').html(strState);
					$('#district').html(strDistrict);
                } 
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}
 
 function fnSupplier(element, id) {
	 var name = $(element).data('name');
	 $('#customer_name').val(name);
	 clearSearch();
	var post_data = {
		'supplier_id': id,
	};
	$.ajax({
		type: "POST",
		url: "<?php echo base_url(); ?>fpo/market/getSupplier",
		data: post_data,
		success: function (response) {
			responsearr = $.parseJSON(response);
			$.each(responsearr, function(key, value) {
				$('#customer_short_name').val(value.supp_ref);
				$('#pin_code').val(value.mailing_pincode);
				populateBasedOnPIN( value.mailing_pincode, value.mailing_taluk_id, value.mailing_block, value.mailing_state, value.mailing_district );
				if(value.mailing_block) {
					getPanchayatList( value.mailing_block, value.mailing_panchayat );
				}
				if(value.mailing_village) {
					getVillageList(value.mailing_panchayat, value.mailing_village);
				}
				$('#street').val(value.mailing_street);
				$('#contact_person').val(value.mailing_contact_person);
				$('#std_code').val(value.mailing_std_code);
				$('#phone_number').val(value.mailing_phone_no);
				$('#mobile_num').val(value.mailing_mobile_no);
				$('#email_address').val(value.mailing_email_id);
				if(value.same_address == 1) {
					$('#same_address').prop('checked', true);
				}
				$('#physical_pincode').val(value.physical_pincode);
				getphysical_Pincode(value.physical_pincode, value.physical_taluk_id, value.physical_block);
				if(value.physical_block) {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_village) {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
				$('#physical_street').val(value.physical_street);
				$('#physical_contact_person').val(value.physical_contact_person);
				$('#physical_std_code').val(value.physical_std_code);
				$('#physical_phone_number').val(value.physical_phone_no);
				$('#physical_mobile_num').val(value.physical_mobile_no);
				$('#physical_email').val(value.physical_email_id);
				$('#pan_promoting_institution').val(value.pan_no);
				$('#gst').val(value.gst_no);
            getplaceofcustomer(value.supp_place);
				$('#registration_type').val(value.regist_type);
				
				if(value.block && value.panchayat && $('#gram_panchayat').val() == '') {
					getPanchayatList( value.block, value.panchayat );
				}
				if(value.panchayat && value.village && $('#village').val() == '') {
					getVillageList( value.panchayat, value.village );
				}
				if(value.physical_block && value.physical_panchayat && $('#physical_gram_panchayat').val() == '') {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_panchayat && value.physical_village && $('#physical_village').val() == '') {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
			});
			
		}
	 });
 }
 
 $(document).on('click', function(event) {
	 if(!event.target.id) {
		 clearSearch();
	 }
 });
 
 


$('#credit_status').change(function(){
    var credit_status = $(this).val();  
    if(credit_status == 1) {
		$('#credit_period1').show();
    }else{
		$('#credit_period1').hide();
	}
});
 
$("#same_address").click(CopyAdd);
function CopyAdd() {
		if (this.checked==true) {
            var sameaddress = $("#sameaddress").html();
            var pin_code = $("#pin_code").html();
            var state = $("#state").html();
            var district = $("#district").html();
            var taluk_id = $("#taluk_id").html();
            var block = $("#block").html();
            var gram_panchayat = $("#gram_panchayat").html();
            var village = $("#village").html();
            var street = $("#street").html();
				var contact_person = $("#contact_person").html();
				var std_code = $("#std_code").html();
				var phone_number = $("#phone_number").html();            
				var mobile_num = $("#mobile_num").html();
				var email = $("#email_address").html();
				$("#physical_pin_code").html(pin_code);
				document.getElementById('physical_contact_person').innerHTML = contact_person;
				document.getElementById('physical_std_code').innerHTML = std_code;
				document.getElementById('physical_phone_number').innerHTML = phone_number;                                        
				//document.getElementById('physical_mobile_num').innerHTML = phone_number;
				document.getElementById('physical_email').innerHTML = email;
				document.getElementById('physical_pincode').innerHTML = pin_code;
				document.getElementById('physical_state').innerHTML = state;
				document.getElementById('physical_district').innerHTML = district;
				document.getElementById('physical_taluk_id').innerHTML = taluk_id;
				document.getElementById('physical_block').innerHTML = block;
				document.getElementById('physical_gram_panchayat').innerHTML = gram_panchayat;
				document.getElementById('physical_village').innerHTML = village;
				document.getElementById('physical_street').innerHTML =street; 
				document.getElementById('physical_pincode').value = $("#pin_code").val();
				document.getElementById('physical_state').value = $("#state").val();
				document.getElementById('physical_district').value = $("#district").val();
				document.getElementById('physical_taluk_id').value = $("#taluk_id").val();
				document.getElementById('physical_block').value = $("#block").val();
				document.getElementById('physical_gram_panchayat').value = $("#gram_panchayat").val();
				document.getElementById('physical_village').value = $("#village").val();
				document.getElementById('physical_contact_person').value = $("#contact_person").val();
				document.getElementById('physical_std_code').value = $("#std_code").val();
				document.getElementById('physical_phone_number').value = $("#phone_number").val();
				//document.getElementById('physical_mobile_num').value = $("#mobile_num").val();
				document.getElementById('physical_email').value = $("#email_address").val();
				document.getElementById('physical_street').value = $("#street").val();
  }
} 

			function validateEmail(emailField){
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(emailField.value) == false) {
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
				} else {
					$("#gst").val('');
					//alert('Not a valid GST number');
					$("#gst").focus();
					swal("Sorry!", "Not a valid GST number");
					event.preventDefault(); 
				} 
			} else { 
				$("#gst").val('');
				//alert('Please enter 15 digits for a valid GST number');
				swal("Sorry!", "Please enter 15 digits for a valid GST number");
				$("#gst").focus();
				event.preventDefault(); 
			}  
		});	
		
		
		$('#pan_promoting_institution').change(function (event) { 
			var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
			var txtpan = $(this).val(); 
			if (txtpan.length == 10 ) { 
				if( txtpan.match(regExp) ){ 
				// alert('PAN match found');
				} else {
					$("#pan_promoting_institution").val('');
					//alert('Not a valid PAN number');
					$("#pan_promoting_institution").focus();
					swal("Sorry!", "Not a valid PAN number");
					event.preventDefault();
				} 
			} else { 
				$("#pan_promoting_institution").val('');
				//alert('Please enter 10 digits for a valid PAN number');
				$("#pan_promoting_institution").focus();
				swal("Sorry!", "Please enter 10 digits for a valid PAN number");
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
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {	
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
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {
								div_data +="<option value="+value.debtor_no+">"+value.name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#customer');
						}
					});
				}		  
		}
		
		
$("#update").hide();	
$('select[name="customer"]').on('change', function(e) {
		$("#general_submit").hide();
		$("#update").show();
		e.preventDefault();
		var customer = $(this).val();
      
       <?php 
         if($page_module == 'market') {
         ?>
         window.location = "<?php echo base_url();?>fpo/Market/customeredit/"+customer;    
         <?php }else if($page_module == 'finance') {
         ?>
         window.location = "<?php echo base_url();?>fpo/finance/customeredit/"+customer;          
         <?php }else {
         ?>
         window.location = "<?php echo base_url();?>fpo/Market/customeredit/"+customer;  
         <?php }?>     	
});
	
$('#gram_panchayat').change(function(){	
	var gram_panchayat = $("#gram_panchayat").val();
	getVillageList(gram_panchayat);
});  
$('#block').change(function(){	
	var block = $("#block").val();
	getPanchayatList( block);
}); 

$('#physical_gram_panchayat').change(function(){
	var gram_panchayat = $("#physical_gram_panchayat").val();
	getphysical_VillageList( gram_panchayat );
}); 
 
$('#physical_block').change(function(){		
	var block = $("#physical_block").val();	
	getphysical_PanchayatList( block);
});

function getVillageList( panchayat_code, village_code ) {
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
					if(village_code == value.id) {
						village += '<option value='+value.id+' selected="selected">'+value.name+'</option>';
					}
					else {
						village += '<option value='+value.id+'>'+value.name+'</option>';
					}
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

	function getPanchayatList( block_code, panchayat ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
 				response=response.trim();
				responseArray=$.parseJSON(response);
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
					if(value.panchayat_code == panchayat) {
						gram_panchayat += '<option value='+value.panchayat_code+' selected="selected">'+value.name+'</option>';
					}
					else {
						gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
					}
                });                                
                $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
 
function getphysical_Pincode( pin_code, taluk_code, block_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
 				response=response.trim();
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {
               var state = '<option value="">Select State </option>';
					var district = '<option value="">Select District </option>';
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
						if(taluk_code == value.id) {
							taluk_id += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							taluk_id += '<option value='+value.id+'>'+value.name+'</option>'
						}	
                    });

                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
						if(block_code == value.id) {
							block += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
						}
						else {
							block += '<option value='+value.id+'>'+value.name+'</option>'
						}
                    });

                    $.each(responseArray.getlocation['cityInfo'],function(key, value){
                        district += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
                        state += '<option value='+value.id+' selected="selected">'+value.name+'</option>'
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

function getphysical_PanchayatList( block_code, panchayat) {
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
					if(panchayat == value.panchayat_code) {
						gram_panchayat += '<option value='+value.panchayat_code+' selected="selected">'+value.name+'</option>';
					}
					else {
						gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
					}
                 });  
                $('#physical_gram_panchayat').html(gram_panchayat); 
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getphysical_VillageList( panchayat_code, village_code ) {	
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
					if(village_code == value.id) {
						village += '<option value='+value.id+' selected="selected">'+value.name+'</option>';
					}
					else {
						village += '<option value='+value.id+'>'+value.name+'</option>';
					}
                 });                                
                $('#physical_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}  

$('#bank_details1').hide();
	$('#bank_details2').hide();
	$('#bank_details3').hide();
$('#bank_info').change(function(){
	var bank_info = $("#bank_info").val();
	//alert(crop_category);
	showDiv( bank_info );
}); 
$('#bank_name').change(function(){
	var branch_info = $("#bank_name").val();
	//alert(crop_category);
	getBankAddressByBankName( branch_info );
}); 
	
function showDiv(bank_detail){  
   if(bank_detail == 1){
   $('#bank_details1').show();
	$('#bank_details2').show();
	$('#bank_details3').show();
   }
   else{
      $('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
   }
}

$('#pin_code').focusout(function(e){
   var state_id = $("#state").val();
   getbanklist(state_id);
   getplaceofcustomer(state_id);
});

   function getbanklist(state_id) {
      $("#bank_name option").remove();
			$.ajax({
				url:"<?php echo base_url();?>fpo/market/getbanklist/"+state_id,
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
 					response=response.trim();
					responseArray=$.parseJSON(response);
					/* var village = '<option value="">Select bank</option>';
					var gram_panchayat = "";
					$.each(responseArray.villageInfo, function(key, value){
						if(village_code == value.id) {
							village += '<option value='+value.id+' selected="selected">'+value.bank_name+'</option>';
						}
						else {
							village += '<option value='+value.id+'>'+value.name+'</option>';
						}
					});                                
					$('#bank_name').html(village);   */ 
        
			     if (Object.keys(responseArray).length > 0) {
			         $("#bank_name").append($('<option></option>').val(0).html('Select Bank Name'));
			     }
			 $.each(responseArray,function(key,value){
			     $("#bank_name").append($('<option></option>').val(value.id).html(value.bank_name));
			 });
			               
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}	
   
   function getBankAddressByBankName( bank_name_id ) {
    $("#branch_name option").remove();
     var state_id = $("#state").val();
    if(bank_name_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/market/getBankAddressByBankName",
		  type:"POST",
        data:{bank_name:bank_name_id,state:state_id},
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
              response=response.trim();                
              responseArray=$.parseJSON(response);
			 if(responseArray.status == 1){
             var village ='<option value="">Select Branch Name</option>';
			     if (Object.keys(responseArray).length > 0) {
			         $("#branch_name").append($('<option></option>').val(0).html('Select Branch Name'));
			     }
			 $.each(responseArray.bankaddress_list,function(key,value){
			     village += '<option value='+value.id+'>'+value.branch_name+'-'+value.ifsc_code+'</option>';
			 })
          $('#branch_name').html(village); 
			}
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } else {
        swal("Sorry!", "Select the bank name");
    } 
}
 
 function getplaceofcustomer(state_id) {
        $("#place_of_customer option").remove();
       var state_id = state_id;
     
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getplacesupply/",
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
 					response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Place of Supply</option>';
					var gram_panchayat = "";
					$.each(responseArray.supplyplace, function(key, value){
						if(state_id == value.state_code) {
							village += '<option value='+value.state_code+' selected="selected">'+value.name+'</option>';
						}
						else {
							village += '<option value='+value.state_code+'>'+value.name+'</option>';
						}
					});                                
					$('#place_of_customer').html(village);    
        
			     /* if (Object.keys(responseArray).length > 0) {
			         $("#supply_place").append($('<option></option>').val(0).html('Select Bank Name'));
			     }
			 $.each(responseArray,function(key,value){
			     $("#supply_place").append($('<option></option>').val(value.id).html(value.bank_name));
			 }); */
			               
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}


$('#mobile_num').focusout(function(){	
	var mobile_number = $(this).val();
	if(mobile_number.length == 10){
		$("#customer_name").removeAttr("onkeyup");
	$.ajax({
		url: '<?php echo base_url(); ?>fpo/market/getCustomerByMobileNumber/'+mobile_number,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,		
		success:function(response){			
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				$('#customer_name').prop('readonly', true);
				var customer_data = responseArray.customer_data;
				console.log(customer_data);
				if(responseArray.user_type == 3){
					var customer_name = customer_data.producer_organisation_name
					var short_name = customer_data.producer_organisation_name
					var pinCode = customer_data.pin_code;
					var stateId = customer_data.state;
					var districtId = customer_data.district;
					var talukId = customer_data.taluk_id;
					var blockId = customer_data.block;
					var panchayatId = customer_data.panchayat;
					var villageId = customer_data.village;
					var PAN = customer_data.pan;
					var GST = customer_data.gst;
					var STDCode = customer_data.std_code;
					var phoneNum = customer_data.land_line;
					var contactPerson = customer_data.contact_person;
					var streetName = customer_data.street;
					var emailId = customer_data.email;
				} else {
					var customer_name = customer_data.profile_name
					var short_name = customer_data.alias_name
					var pinCode = customer_data.pin_code;
					var stateId = customer_data.state;
					var districtId = customer_data.district;
					var talukId = customer_data.taluk;
					var blockId = customer_data.block;
					var panchayatId = customer_data.panchayat;
					var villageId = customer_data.village;
					var PAN = '';
					var GST = '';
					var STDCode = '';
					var phoneNum = '';
					var contactPerson = '';
					var streetName = customer_data.door_no+' , '+customer_data.street;
					var emailId = '';
				}				
				$('#customer_name').val(customer_name);
				$('#customer_short_name').val(short_name);
				//Billing Address update
				$('#pin_code').val(pinCode);				
				populateBasedOnPIN(pinCode, talukId, blockId, stateId, districtId);
				if(blockId) {
					getPanchayatList(blockId, panchayatId);
				}
				if(panchayatId) {
					getVillageList(panchayatId, villageId);
				}				
				$('#std_code').val(STDCode);
				$('#phone_number').val(phoneNum);				
				$('#contact_person').val(contactPerson);
				$('#street').val(streetName);
				$('#email_address').val(emailId);
				
				//Billing & Physical address same	
				$('#same_address').prop('checked', true);
				
				//Physical address update
				$('#physical_pincode').val(pinCode);
				getphysical_Pincode(pinCode, talukId, blockId);
				if(blockId) {
					getphysical_PanchayatList(blockId, panchayatId);
				}
				if(panchayatId) {
					getphysical_VillageList(panchayatId, villageId);
				}						
				$('#physical_std_code').val(STDCode);
				$('#physical_phone_number').val(phoneNum);				
				$('#physical_contact_person').val(contactPerson);
				$('#physical_street').val(streetName);
				$('#physical_email').val(emailId);
				
				$('#pan_promoting_institution').val(PAN);
				$('#gst').val(GST);
				
				getplaceofcustomer(stateId);
				
				if(blockId && panchayatId && $('#gram_panchayat').val() == '') {
					getPanchayatList(blockId, panchayatId);
				}
				if(panchayatId && villageId && $('#village').val() == '') {
					getVillageList(panchayatId, villageId);
				}
				if(blockId && panchayatId && $('#physical_gram_panchayat').val() == '') {
					getphysical_PanchayatList(blockId, panchayatId);
				}
				if(panchayatId && villageId && $('#physical_village').val() == '') {
					getphysical_VillageList(panchayatId, villageId);
				}
			} else {
				//swal("Sorry!", responseArray.message, "warning");
				//$('#mobile_num').val('');				
				$('#customer_name').prop('readonly', false);
				$('#customer_name').val('');
				$('#pin_code').val('');				
				$('#physical_pincode').val('');
				//$("#customer_name").attr('onkeyup', 'ajaxSearch()');	
				//$('#mobile_num').focus();
			}				
		}
	});		
	}
});	

</script>
</body>
</html>