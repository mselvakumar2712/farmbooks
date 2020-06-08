<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
 input[type="date"], input[type="email"] {
    text-transform: none ! important;
}
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


#suggestions {
	position: absolute;
    z-index: 1;
    background-color: #fff;
    width: 91%;
}
#autoSuggestionsList > ul {
    list-style: none outside none;
	margin-bottom: 0;
}
#autoSuggestionsList > ul > li {
    padding: 3px 15px 3px 13px;
}
#autoSuggestionsList > ul > li > div {
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
							<h1>Suppliers</h1>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="page-header float-right">
						<div class="page-title">
							<ol class="breadcrumb text-right">
                        <?php 
                        if($page_module == 'inventory') {
                        ?>
                        <li><a href="#">Inventory</a></li>
                        <?php }else if($page_module == 'finance') {
                        ?>
                       <li><a href="#">Finance</a></li>
                        <?php }else {
                        ?>
                        <li><a href="#">Inventory</a></li>
                        <?php }?>
                        
                         <?php if($page_module == 'inventory'){ ?>
								<li><a class="active" href="<?php echo base_url('fpo/inventory/suppliers');?>">Suppliers</a></li>
                           <?php } else if($page_module == 'finance'){ ?>
								<li><a class="active" href="<?php echo base_url('fpo/finance/suppliers');?>">Suppliers</a></li>
                           <?php } else { ?>
								<li><a class="active" href="<?php echo base_url('fpo/inventory/suppliers');?>">Suppliers</a></li>
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
					<div class="row">
					<div class="card">
						<div class="card-body">
							<div class="container-fluid">
							                        
                        <?php 
                           if($page_module == 'inventory') {
                              ?>
                             <form action="<?php echo base_url('fpo/inventory/post_suppliers')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >           
                           <?php }else if($page_module == 'finance') {
                              ?>
                                <form action="<?php echo base_url('fpo/finance/post_suppliers')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >           
                           <?php }else {
                              ?>
                                <form action="<?php echo base_url('fpo/inventory/post_suppliers')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >           
                           <?php }?>
                           	<div class="row">
								<div class="col-md-4 mt-4 ml-4">
                                  <input type="checkbox" name="same_customer" id="same_customer" value="1" class="">&nbsp; &nbsp; Also as Customer
								</div>
                              <div class="form-group col-md-4 text-center">
                                 <label for="inputAddress2">Select Supplier</label>
                                 <select class="form-control new_sup" id="supplier" name="supplier" required="required" data-validation-required-message="Please select supplier.">
                                    <option value="0">New Supplier</option>
                                    <?php for($i=0; $i<count($supplier);$i++) { ?>										
                                    <option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
                                    <?php } ?>	
                                 </select>		
                              </div>
                              <div class="form-group col-md-4">
                              </div>
                           </div>
                              <input type="hidden" class="form-control" id="supplier_id" name="supplier_id">														
                                 <h4 class="text-center text-success">Basic Data</h1>
                                 <div class="form-group col-md-12 mt-4">
									<div class="form-group col-md-3">
										<label for="inputAddress2">Mobile Number </label>
										<input type="text" autofocus class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="billing_mobile_num" name="billing_mobile_num" placeholder="Mobile Number">
										<div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4">
                                       <label for="">Supplier Name <span class="text-danger">*</span></label>
                                       <input type="text" class="form-control" autocomplete="off" onkeyup="ajaxSearch()" maxlength="100" id="supplier_name" name="supplier_name" placeholder="Supplier Name" required="required" data-validation-required-message="Please enter supplier name.">
                                        <div id="suggestions">
                                           <div id="autoSuggestionsList"></div>
                                       </div>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                       <label for="">Supplier Short Name</label>
                                       <input type="text" class="form-control" autocomplete="off" onfocus="clearSearch()" maxlength="20" id="supp_short_name" name="supp_short_name" placeholder="Supplier Short Name">
                                    </div>
                                    <div class="form-group col-md-2">
                                       <label for="inputAddress2">Customer No</label>
                                       <input type="text" class="form-control text-uppercase" maxlength="30" name="our_customer_no" value="<?php echo $last_supp_id; ?>" id="our_customer_no" placeholder="Our Customer No" readonly>
                                    </div>
                                 </div>
                                 <h4 class="text-center text-success">Accounts</h1>
                                 <div class="form-group col-md-12 mt-4">
                                       <div class="form-group col-md-3">
                                          <label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
                                          <select class="form-control" id="account_group"  name="account_group" required="required" data-validation-required-message="Please select gl group.">
                                             <option value="">Select GL Group </option>
                                             <?php for($i=0; $i<count($gl_group_info);$i++) { ?>										
                                             <option value="<?php echo $gl_group_info[$i]->account_code; ?>"><?php echo $gl_group_info[$i]->account_name; ?></option>
                                             <?php } ?>
                                          </select>
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-3">
                                             <label for="inputAddress2">Group Code</label>
                                             <input class="form-control" type="text" readonly placeholder="Group Code" id="group_code" name="group_code" >
                                              <p class="help-block text-danger"></p>
                                       </div>
                                       <div class="form-group col-md-3">
                                       <label for="inputAddress2">Account Status</label>
                                       <select class="form-control" id="account_status" name="account_status">
                                          <option value="">Select Account Status </option>
                                          <option value="1" selected>Active</option>
                                          <option value="2">Inactive</option>
                                       </select>
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
                                       <!--<div class="form-group col-md-4">
                                             <label for="inputAddress2">Account Name</label>
                                             <input class="form-control" type="text" maxlength="75" placeholder="Account Name" id="account_name" name="account_name">
                                              <p class="help-block text-danger"></p>
                                       </div>-->	
                                 </div>
                                 <div class="form-group col-md-12 ">																						
                                    
                                 </div>
                                 <h4 class="text-center text-success">Address</h1>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-6">	
											<label for="inputAddress2 " class="text-success">Billing Address</label>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)"  maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" required  placeholder="PINCODE"  data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="pincode_validate"></div>
												</div>
												<div class="col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="state" class="form-control sel_state" readonly name="state" required  data-validation-required-message="Please Select State ." >
													<option value="">Select State </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="district" class="form-control sel_district" readonly name="district" required  data-validation-required-message="Please Select District .">
													<option value="">Select District </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk</label>
													<select class="form-control sel_taluk" name="taluk_id" id="taluk_id">
													<option value="">Select Taluk </option>
													</select>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block</label>
													<select id="block" class="form-control sel_block" name="block">
													<option value="">Select Block </option>
													</select>
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat</label>
													<select id="gram_panchayat" class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat">
													<option value="">Select Gram Panchayat </option>
													</select>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village</label>
													<select id="village" class="form-control sel_village" id="village" name="village">
													<option value="">Select Village</option>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>																																		
												<div class="form-group col-md-4">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly" title="Std code starts with '0'" pattern="^[0][0-9]{2,8}$" id="billing_std_code" maxlength="8" minlength="3" name="billing_std_code" placeholder="Ex:012">
													 <div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-8">
													<label for="inputAddress2">Phone Number</label>															
													<input type="text" class="form-control numberOnly" minlength="6"   maxlength="8" id="billing_phone_num" name="billing_phone_num"  placeholder="Phone Number ">
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3" maxlength="50" name="billing_contact_person"  id="billing_contact_person" placeholder="Contact Person" >											 
												</div>	
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75" id="street" name="street" placeholder="Street">
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control"  id="billing_email" name="billing_email" placeholder="E-Mail Address">
												</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2" class="text-success">Supply Address</label>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_physical_pincode" onkeyup="getphysical_Pincode(this.value)" maxlength="6" pattern="[1-9][0-9]{5}" id="physical_pin_code" name="physical_pin_code"  required placeholder="PINCODE"  data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="physical_pincode_validate"></div>
												</div>
												<div class="form-group col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="physical_state" class="form-control " readonly name="physical_state" required  data-validation-required-message="Please Select State .">
													<option value="">Select State </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="physical_district" class="form-control" readonly name="physical_district"  required  data-validation-required-message="Please Select District .">
													<option value="">Select District </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk</label>
													<select class="form-control" name="physical_taluk_id" id="physical_taluk_id">
													<option value="">Select Taluk </option>
													</select>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block</label>
													<select id="physical_block" class="form-control" name="physical_block">
													<option value="">Select Block </option>
													</select>
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat</label>
													<select id="physical_gram_panchayat" class="form-control" id="physical_gram_panchayat" name="physical_gram_panchayat">
													<option value="">Select Gram Panchayat </option>
													</select>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village</label>
													<select id="physical_village" class="form-control" id="physical_village" name="physical_village">
													<option value="">Select Village</option>
													</select>
											    </div>																																	
												<div class="form-group col-md-4">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly" title="Std code starts with '0'" pattern="^[0][0-9]{2,8}$" id="shipping_std_code" maxlength="8" minlength="3" name="shipping_std_code" placeholder="Ex:012">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-8">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly"  minlength="6"   maxlength="8" id="shipping_phone_num" name="shipping_phone_num"  placeholder="Phone Number">																
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3" maxlength="50" name="shipping_contact_person"  id="shipping_contact_person" placeholder="Contact Person" >											 
												</div>		
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75" id="physical_street" name="physical_street" placeholder="Street">
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control"  id="shipping_email" name="shipping_email" placeholder="E-Mail Address">
												</div>
											</div>
											</div>
										</div>																				
										<div class="form-group col-md-12">
											<div class="col-md-12">
											<input type="checkbox" name="sameaddress" id="same_address" value="1" class=""  >&nbsp; &nbsp;Billing address same as Supply address
											</div>
										</div>
										<h4 class="text-center text-success">TAX Details </h1>
										<div class="form-group col-md-12 mt-3">
                              <div class="form-group col-md-3">
													<label for="inputAddress2">Place of Supply </label>
													<select id="supply_place" class="form-control"  name="supply_place">
                                          <option value="">Select Place of Supply </option>
													<?php /*for($i=0; $i<count($state);$i++) { ?>										
                                          <option value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } */?>
													</select>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">PAN </label>
												<input type="text" class="form-control text-uppercase" maxlength="10" id="pan" name="pan" placeholder="Ex:AAAPL1234C">
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Goods & Service Tax (GST) </label>
												<input type="text" class="form-control text-uppercase"  id="gst" name="gst" maxlength="15"  id="gst" placeholder="Ex:33AAAAA0000A1Z1">
											</div>
                                 <div class="col-md-3">                              
                                    <label class=" form-control-label ml-3">Registration Type </label>
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
										<div class="form-group col-md-12 mt-3">
                                
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
												<label for="inputAddress2">Enter Account Number</label>
												<input type="text" class="form-control text-uppercase"  maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IFSC Code</label>
												<input type="text" class="form-control text-uppercase"  maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
											</div>
										</div>
										<h4 class="text-center text-success">Others</h1>
										<div class="form-group col-md-12 mt-4">										
											<div class="form-group col-md-3">
												<label for="inputAddress2">Default Credit Period (Days)</label>
												<input type="text" class="form-control numberOnly"  maxlength="3"  id="credit_period" name="credit_period" placeholder="Credit Period">														 
											</div>
											<div class="form-group col-md-3">
											<label class=" form-control-label">Maintain Bill by Bill</label>
                                    <select id="maintain_bill" name="maintain_bill" class="form-control">
													<option value="">Select Maintain Bill by Bill</option>
													<option value="1">Yes</option>
													<option value="2">No</option>
												</select>
											</div>
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</label>
												<input type="text" class="form-control numberOnly text-right"  maxlength="15"  id="opening_balance" name="opening_balance" placeholder="Opening Balance">														 
												</div>
											<div class="col-md-3">
												<label class=" form-control-label">Balance Type <span class="text-danger">*</span></label>
                                       <select id="transaction_type" name="transaction_type" class="form-control" required>
														<option value="1" selected="selected">Cr</option>
														<option value="2">Dr</option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
										</div>
										<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-3">	
										</div>
										<div class="form-group col-md-6">	
										<h4 class="text-center text-success">General</h1>
											<label for="inputAddress2">General Notes</label>
											<textarea id="general_notes" maxlength="50" name="general_notes" class="form-control"></textarea>
										
										</div>
										</div>
										<div class="form-group col-md-12 text-center">
											<button id="edit" class="btn btn-success text-center btn-fs" type="button"><i class="fa fa-edit"></i> Edit</button>
											<button  id="general_submit" align="center" name="general_submit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<button   align="center" id="update" name="update" class="btn btn-success text-center"  type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
                                 <?php 
                                 if($page_module == 'inventory') {
                                 ?>
                                 <a href="<?php echo base_url('fpo/inventory/suppliers');?>" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                                 <?php }else if($page_module == 'finance') {
                                 ?>
                                 <a href="<?php echo base_url('fpo/finance/suppliers');?>" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                                 <?php }else {
                                 ?>
                                 <a href="<?php echo base_url('fpo/inventory/suppliers');?>" class="btn btn-outline-dark ml-2"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>
                                 <?php }?>
										</div>									 
									  </form>
									
									</div>
							   </div>
							</div>
					</div>
				</div>
			</div>
		</div>
		</div><!-- .animated -->
	</div><!-- .content -->
</div>     	
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
function ajaxSearch() {
    var input_data = $('#supplier_name').val();
    if (input_data.length < 3) {
        $('#suggestions').hide();
    }
    else {
      var arrFields = ["supplier_name", "supplier", "our_customer_no", "account_group", "group_code", "account_status", "payment_terms", "bank_info", "bank_name", "branch_name", "account_number", "ifsc_code","transaction_type"];
      $('#supplier_add').find('input[type=text], select').each(function(){
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
   
 function clearSearch() {
	 $('#suggestions').hide();
	 $('#autoSuggestionsList').removeClass('auto_list');
	 $('#autoSuggestionsList').html('');
 }

function fnCustomer(element, id) {
	var name = $(element).data('name');
	$('#supplier_name').val(name);
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
				$('#supp_short_name').val(value.debtor_ref);
				$('#pin_code').val(value.pincode);
				populateBasedOnPIN( value.pincode, value.taluk_id, value.block, value.state, value.district );
				if(value.mailing_block) {
					getPanchayatList( value.block, value.panchayat );
				}
				if(value.panchayat) {
					getVillageList(value.panchayat, value.village);
				}
				$('#street').val(value.address);
				$('#billing_contact_person').val(value.contact_person);
				$('#billing_std_code').val(value.std_code);
				$('#billing_phone_num').val(value.phone_number);
				$('#billing_mobile_num').val(value.mobile_number);
				$('#billing_email').val(value.email);
				if(value.sameaddress == 1) {
					$('#same_address').prop('checked', true);
				}
				$('#physical_pin_code').val(value.physical_pincode);
				getphysical_Pincode(value.physical_pincode, value.physical_taluk_id, value.physical_block);
				if(value.physical_block) {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_panchayat) {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
				$('#physical_street').val(value.physical_street);
				$('#shipping_contact_person').val(value.physical_contact_person);
				$('#shipping_std_code').val(value.physical_std_code);
				$('#shipping_phone_num').val(value.physical_phone_number);
				$('#shipping_mobile_num').val(value.physical_mobile_num);
				$('#shipping_email').val(value.physical_email);
				$('#pan').val(value.pan_no);
				$('#gst').val(value.gst_no);
            getplaceofsupplier(value.place_of_customer);
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
	 $('#supplier_name').val(name);
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
				$('#supp_short_name').val(value.supp_ref);
				$('#pin_code').val(value.mailing_pincode);
				populateBasedOnPIN( value.mailing_pincode, value.mailing_taluk_id, value.mailing_block, value.mailing_state, value.mailing_district );
				if(value.mailing_block) {
					getPanchayatList( value.mailing_block, value.mailing_panchayat );
				}
				if(value.mailing_panchayat) {
					getVillageList(value.mailing_panchayat, value.mailing_village);
				}
				$('#street').val(value.mailing_street);
				$('#billing_contact_person').val(value.mailing_contact_person);
				$('#billing_std_code').val(value.mailing_std_code);
				$('#billing_phone_num').val(value.mailing_phone_no);
				$('#billing_mobile_num').val(value.mailing_mobile_no);
				$('#billing_email').val(value.mailing_email_id);
				if(value.same_address == 1) {
					$('#same_address').prop('checked', true);
				}
				$('#physical_pin_code').val(value.physical_pincode);
				getphysical_Pincode(value.physical_pincode, value.physical_taluk_id, value.physical_block);
				if(value.physical_block) {
					getphysical_PanchayatList( value.physical_block, value.physical_panchayat );
				}
				if(value.physical_panchayat) {
					getphysical_VillageList( value.physical_panchayat, value.physical_village );
				}
				$('#physical_street').val(value.physical_street);
				$('#shipping_contact_person').val(value.physical_contact_person);
				$('#shipping_std_code').val(value.physical_std_code);
				$('#shipping_phone_num').val(value.physical_phone_no);
				$('#shipping_mobile_num').val(value.physical_mobile_no);
				$('#shipping_email').val(value.physical_email_id);
				$('#pan').val(value.pan_no);
				$('#gst').val(value.gst_no);
            getplaceofsupplier(value.supp_place);
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
 

   $('#edit').click(function(){
		  $('#editfig').toggleClass('view');
		  $("#update").show();
		  $("#cancel").show();
		  $("#edit").hide();
		   $("#ok").hide();
		  $('input').each(function(){
			var inp = $(this);
			 //var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("update").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  //inp.attr('disabled', 'disabled');
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
			  //inp.attr('disabled', 'disabled');
			}
		  });
		  $('textarea').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  //inp.attr('disabled', 'disabled');
			}
		  });
		});
   
	$("#same_address").click(CopyAdd);
	function CopyAdd() {
	if (this.checked==true) {
	            var sameaddress = $("#sameaddress").html();
                var pincode = $("#pin_code").html();
                var state = $("#state").html();
                var district = $("#district").html();
				var taluk_id = $("#taluk_id").html();
                var block = $("#block").html();
                var gram_panchayat = $("#gram_panchayat").html();
                var village = $("#village").html();
                var street = $("#street").html();
				$("#physical_pin_code").html(pincode);
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
				document.getElementById('physical_street').value = $("#street").val();
				document.getElementById('shipping_contact_person').value =$("#billing_contact_person").val();
				document.getElementById('shipping_phone_num').value =$("#billing_phone_num").val();
				document.getElementById('shipping_std_code').value =$("#billing_std_code").val();
				document.getElementById('shipping_email').value =$("#billing_email").val();
				//document.getElementById('shipping_mobile_num').value =$("#billing_mobile_num").val();
  } else {
	  
  }
}  

 
		
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
			$("#gst").val('');
			alert('Not a valid GST number');
			$("#gst").focus();
			event.preventDefault(); 
			} 
			} 
			else { 
			$("#gst").val('');
			alert('Please enter 15 digits for a valid GST number');
			$("#gst").focus();
			event.preventDefault(); 
			}
			});	

	 	function activeClick(supplierval) {
				if(supplierval.checked == true) { 
					$("#supplier option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('fpo/inventory/getallsupplier')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {	
								div_data +="<option value="+value.supplier_id+">"+value.supp_name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#supplier');
						}
					});
				}else{
					 $("#supplier option").remove() ;		
					$.ajax({
						url: '<?php echo base_url('fpo/inventory/getactivesupplier')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {
								div_data +="<option value="+value.supplier_id+">"+value.supp_name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#supplier');
						}
					});
				}
		  
		}	
		$("#update").hide();
		$("#edit").hide();
		$("#ok").hide();
		$("#supplier_del").hide();
		$('select[name="supplier"]').on('change', function(e) {
			$("#sendMessageButton").hide();
			$("#edit").show();
			//$("#general_submit").hide();
			$("#update").show();
			$("#supplier_del").show();
			e.preventDefault();
			var supplier = $(this).val();	
         
         <?php 
         if($page_module == 'inventory') {
         ?>
         window.location = "<?php echo base_url();?>fpo/inventory/editsupplier/"+supplier;    
         <?php }else if($page_module == 'finance') {
         ?>
         window.location = "<?php echo base_url();?>fpo/finance/editsupplier/"+supplier;          
         <?php }else {
         ?>
         window.location = "<?php echo base_url();?>fpo/inventory/editsupplier/"+supplier;    
         <?php }?>
         
            					
		});
		$('#search_item_desc').on('change', function () {
	    var description = $(this).val();
		document.getElementById('search_item_code').value=description;
		});
		
		var delivery_address='<?php echo json_encode($location); ?>';
		$('form[id="supplier_search"]').submit(function(e){
			e.preventDefault();
			var supplier=document.getElementById('purchase_supplier_id').value;
			var ref=document.getElementById('search_reference').value;
			var item_code=document.getElementById('search_item_code').value;
			var fromdate=document.getElementById('search_from').value;
			var todate=document.getElementById('search_to').value;
			var location=document.getElementById('search_location').value;
			var searchdata = {"supplier":supplier,"reference":ref, "item_code":item_code,"from":fromdate,"to":todate,"location":location};
			if(searchdata)
			{
				 $.ajax({
					url:"<?php echo base_url();?>fpo/inventory/suppliersearch",
					type:"POST",
					data:searchdata,
					dataType:"html",
					cache:false,			
					success:function(response){		  
					responsearr=$.parseJSON(response);
						var supplierinfo = "";
						var count=1;
						$.each(responsearr, function(key, value) {	
							var sno=count++;
							supplierinfo += '<tr><td>'+sno+'</td><td>'+value.reference+'</td><td>'+value.suppiler_name+'</td><td>'+value.suppiler_delivery_address+'</td><td></td><td>'+value.ord_date+'</td><td>'+value.total+'</td></tr>';

						});
						$('#supplier_info').html(supplierinfo);

					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
					}); 
			}
			else
			{
				alert('Please provide mandatory fields ');
			}
		});
		
		
			$('a.supplier_del').click(function() {
					var supplier_id=document.getElementById("supplier_id").value;	
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
						  url: "<?php echo base_url();?>fpo/inventory/delete_supplier/"+supplier_id,
						  type: "POST",
						  data: {
							 this_delete: supplier_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('fpo/inventory/suppliers')?>");
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
						swal("Cancelled", "You have cancelled the supplier information delete action", "info");
						return false;
					 }
				  }); 
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
                var village = "";
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

   function getphysical_PanchayatList( block_code, panchayat ) {
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
   
	$('#pan').change(function (event) { 
		var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
		var txtpan = $(this).val(); 
		if (txtpan.length == 10 ) { 
		if( txtpan.match(regExp) ){ 
		//alert('PAN match found');
		}
		else {
		$("#pan").val('');
		alert('Not a valid PAN number');
		$("#pan").focus();
		event.preventDefault(); 
		} 
		} 
		else { 
		$("#pan").val('');
		alert('Please enter 10 digits for a valid PAN number');
		$("#pan").focus();
		event.preventDefault(); 
		}  
	});

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

   function getBankAddressByBankName( bank_name_id ) {
      //alert(bank_name_id);
    $("#branch_name option").remove();
     var state_id = $("#state").val();
     //alert(state_id);
    if(bank_name_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/inventory/getBankAddressByBankName",
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

$('#account_group').on('change', function() {
	$("#group_code").val(this.value);
});
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
	} else {
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	}
}

$('.new_sup').select2();
$('#pin_code').focusout(function(e){
   var state_id = $("#state").val();
   //alert(state_id);
   getbanklist(state_id);
   getplaceofsupplier(state_id);
});

   function getbanklist(state_id) {
      $("#bank_name option").remove();
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getbanklist/"+state_id,
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
	
	
    function getplaceofsupplier(state_id) {
        $("#supply_place option").remove();
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
					$('#supply_place').html(village);			              
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}

$('#billing_mobile_num').focusout(function(){	
	var mobile_number = $(this).val();
	if(mobile_number.length == 10){
	$.ajax({
		url: '<?php echo base_url(); ?>fpo/inventory/getSupplierByMobileNumber/'+mobile_number,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,		
		success:function(response){			
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				var supplier_data = responseArray.supplier_data;
				console.log(supplier_data);
				if(responseArray.user_type == 3){
					var supplier_name = supplier_data.producer_organisation_name
					var short_name = supplier_data.producer_organisation_name
					var pinCode = supplier_data.pin_code;
					var stateId = supplier_data.state;
					var districtId = supplier_data.district;
					var talukId = supplier_data.taluk_id;
					var blockId = supplier_data.block;
					var panchayatId = supplier_data.panchayat;
					var villageId = supplier_data.village;
					var PAN = supplier_data.pan;
					var GST = supplier_data.gst;
					var STDCode = supplier_data.std_code;
					var phoneNum = supplier_data.land_line;
					var contactPerson = supplier_data.contact_person;
					var streetName = supplier_data.street;
					var emailId = supplier_data.email;
				} else {
					var supplier_name = supplier_data.profile_name
					var short_name = supplier_data.alias_name
					var pinCode = supplier_data.pin_code;
					var stateId = supplier_data.state;
					var districtId = supplier_data.district;
					var talukId = supplier_data.taluk;
					var blockId = supplier_data.block;
					var panchayatId = supplier_data.panchayat;
					var villageId = supplier_data.village;
					var PAN = '';
					var GST = '';
					var STDCode = '';
					var phoneNum = '';
					var contactPerson = '';
					var streetName = supplier_data.door_no+' , '+supplier_data.street;
					var emailId = '';
				}
				$('#supplier_name').val(supplier_name);
				$('#supp_short_name').val(short_name);
				//Billing Address update
				$('#pin_code').val(pinCode);				
				populateBasedOnPIN(pinCode, talukId, blockId, stateId, districtId);
				if(blockId) {
					getPanchayatList(blockId, panchayatId);
				}
				if(panchayatId) {
					getVillageList(panchayatId, villageId);
				}				
				$('#billing_std_code').val(STDCode);
				$('#billing_phone_num').val(phoneNum);				
				$('#billing_contact_person').val(contactPerson);
				$('#street').val(streetName);
				$('#billing_email').val(emailId);
				
				//Billing & Physical address same
				$('#same_address').prop('checked', true);
				
				//Physical address update
				$('#physical_pin_code').val(pinCode);
				getphysical_Pincode(pinCode, talukId, blockId);
				if(blockId) {
					getphysical_PanchayatList(blockId, panchayatId);
				}
				if(panchayatId) {
					getphysical_VillageList(panchayatId, villageId);
				}						
				$('#shipping_std_code').val(STDCode);
				$('#shipping_phone_num').val(phoneNum);
				$('#shipping_contact_person').val(contactPerson);
				$('#physical_street').val(streetName);	
				$('#shipping_email').val(emailId);
				
				$('#pan').val(PAN);
				$('#gst').val(GST);
				
				getplaceofsupplier(stateId);
				
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
				//$('#billing_mobile_num').val('');
				$('#supplier_name').val('');
				$('#pin_code').val('');
				$('#physical_pin_code').val('');				
				//$('#billing_mobile_num').focus();
			}				
		}
	});
	}
});
</script>
</body>
</html>