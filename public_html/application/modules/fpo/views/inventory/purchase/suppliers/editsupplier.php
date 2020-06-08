<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
 input[type="date"], input[type="email"] {
    text-transform: none ! important;
}
.text-right {
   font-style: normal ! important;
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
							<h1> Edit Supplier</h1>
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
                       
                        <?php 
                           if($page_module == 'inventory') {
                              ?>
								<li><a class="active" href="<?php echo base_url('fpo/inventory/suppliers');?>">Suppliers</a></li>
                           <?php }else if($page_module == 'finance') {
                              ?>
								<li><a class="active" href="<?php echo base_url('fpo/finance/suppliers');?>">Suppliers</a></li>
                           <?php }else {
                              ?>
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
                  <?php 
                           if($page_module == 'inventory') {
                              ?>
                             <form  action="<?php echo base_url('fpo/inventory/postupdatesuppliers/'.$supplier_info[0]->supplier_id)?>" method="post" id="supplier_add" name="sentMessage" role="form" id="form-step-0" novalidate="novalidate" data-toggle="validator">           
                           <?php }else if($page_module == 'finance') {
                              ?>
                                <form  action="<?php echo base_url('fpo/finance/postupdatesuppliers/'.$supplier_info[0]->supplier_id)?>" method="post" id="supplier_add" name="sentMessage" role="form" id="form-step-0" novalidate="novalidate" data-toggle="validator">           
                           <?php }else {
                              ?>
                                <form  action="<?php echo base_url('fpo/inventory/postupdatesuppliers/'.$supplier_info[0]->supplier_id)?>" method="post" id="supplier_add" name="sentMessage" role="form" id="form-step-0" novalidate="novalidate" data-toggle="validator">           
                           <?php }?>
                  
                  
                  
							<div class="container-fluid">
									<input type="hidden" class="form-control" id="supplier_id" name="supplier_id">																	
										<h4 class="text-center text-success">Basic Data</h1>
										<div class="form-group col-md-12 mt-4">
											<div class="form-group col-md-4 ">
												<label for="">Supplier Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" maxlength="50"  id="supplier_name" value="<?php echo $supplier_info[0]->supp_name ?>" name="supplier_name" placeholder="Supplier Name" required="required" data-validation-required-message="Please enter supplier name.">
												 <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-4 ">
												<label for="">Supplier Short Name</label>
												<input type="text" class="form-control" maxlength="20"  id="supp_short_name" value="<?php echo $supplier_info[0]->supp_ref ?>" name="supp_short_name" placeholder="Supplier Short Name">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Our Customer No</label>
												<input type="text" class="form-control text-uppercase" maxlength="30" name="our_customer_no" value="<?php echo $supplier_info[0]->supp_account_no ?>" id="our_customer_no" placeholder="Our Customer No" readonly>
											</div>
										</div>
										<h4 class="text-center text-success">Accounts</h1>
										<div class="form-group col-md-12 mt-4">
											<div class="form-group col-md-3">
												<label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
												<select class="form-control" id="account_group"  name="account_group" required="required" data-validation-required-message="Please select gl group.">
													<option value="">Select GL Group </option>
													<?php foreach($gl_group_info as $gl_group){
														if($gl_group->account_code == $supplier_info[0]->gl_group_id)
														   echo "<option value='".$gl_group->account_code."' selected='selected'>".$gl_group->account_name."</option>";
														else
														   echo "<option value='".$gl_group->account_code."'>".$gl_group->account_name."</option>";
													 }
													 ?>
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
												<select class="form-control" id="account_status"  name="account_status">
													<option value="">Select Account Status </option>
													<option <?php echo ($supplier_info[0]->gl_acc_status == '1') ?  "selected" : "selected" ;  ?> value="1">Active</option>
													<option <?php echo ($supplier_info[0]->gl_acc_status == '2') ?  "selected" : "" ;  ?> value="2">Inactive</option>
												</select>
											</div>
											<div class="form-group col-md-3">
											  <label for="inputAddress2">Payment Terms </label>
											  <select id="payment_terms"  name="payment_terms" class="form-control" >
											  <option value="">Select Payment Terms</option>
												 <?php foreach($payment_terms as $payment_term){
													if($payment_term->terms_indicator == $supplier_info[0]->payment_terms)
													   echo "<option value='".$payment_term->terms_indicator."' selected='selected'>".$payment_term->terms."</option>";
													else
													   echo "<option value='".$payment_term->terms_indicator."'>".$payment_term->terms."</option>";
												 }
												 ?>		
											  </select>   
											</div>
											<!--<div class="form-group col-md-4">
													<label for="inputAddress2">Account Name</label>
													<input class="form-control" type="text" maxlength="75" disabled placeholder="Account Name" value="<?php echo $supplier_info[0]->gl_acc_name?>" id="account_name" name="account_name">
												    <p class="help-block text-danger"></p>
											</div>-->	
										</div>
										<div class="form-group col-md-12 ">																							
											
										</div>
										<h4 class="text-center text-success">Address</h1>
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-6">	
											<label for="inputAddress2" class="text-success">Billing Address</label>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" readonly onkeyup="getPincode(this.value)" value="<?php echo $supplier_info[0]->mailing_pincode ?>" maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE" required  data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="pincode_validate"></div>
												</div>
												<div class="col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="state" class="form-control sel_state" readonly name="state"   data-validation-required-message="Please Select State ."required>
													<option  value="<?php echo $supplier_info[0]->mailing_state?>"><?php echo $supplier_info[0]->state_name ?></option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="district" class="form-control sel_district" readonly name="district"   data-validation-required-message="Please Select District ."required>
													<option  value="<?php echo $supplier_info[0]->mailing_district?>"><?php echo $supplier_info[0]->district_name?></option>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk</label>
													<select class="form-control sel_taluk" name="taluk_id" id="taluk_id"   data-validation-required-message="Please Select Taluk .">
													<option value="">Select Taluk </option>
													<?php foreach($taluk_info as $taluk){
                                                    if($taluk->taluk_code == $supplier_info[0]->mailing_taluk_id)
                                                     echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                    else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block </label>
													<select id="block" class="form-control sel_block" name="block"   data-validation-required-message="Please Select Block .">
													<option value="">Select Block </option>
													<?php foreach($block_info as $block){
                                                if($block->block_code == $supplier_info[0]->mailing_block)
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat</label>
													<select id="gram_panchayat" class="form-control sel_panchayat"   id="gram_panchayat" name="gram_panchayat"   data-validation-required-message="Please Select gram panchayat .">
													<option value="">Select Gram Panchayat </option>
													<?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $supplier_info[0]->mailing_panchayat)
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village </label>
													<select id="village" class="form-control sel_village" id="village"  name="village"   data-validation-required-message="Please enter village.">
													<option value="">Select Village</option>	<?php foreach($village_info as $village){
													if($village->id == $supplier_info[0]->mailing_village)
													   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
													else
													   echo "<option value='".$village->id."'>".$village->name."</option>";
												 }
												 ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75" id="street"  name="street" value="<?php echo $supplier_info[0]->mailing_street?>" placeholder="Street">
												</div>
													<div class="form-group col-md-6">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3" maxlength="50"   value="<?php echo $supplier_info[0]->mailing_contact_person?>"  name="billing_contact_person"  id="billing_contact_person" placeholder="Contact Person" >											 
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Mobile Number </label>
													<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$"  value="<?php echo $supplier_info[0]->mailing_mobile_no?>" maxlength="10" id="billing_mobile_num" name="billing_mobile_num">
													 <div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly"  title="std code starts with '0'" value="<?php echo $supplier_info[0]->mailing_std_code?>" pattern="^[0][0-9]{2,8}$" id="billing_std_code" maxlength="8" minlength="3" name="billing_std_code" placeholder="Ex:012">
													 <div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly"  maxlength="8" minlength="6" value="<?php echo $supplier_info[0]->mailing_phone_no?>" id="billing_phone_num" name="billing_phone_num"  placeholder="Phone Number">																
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control"   id="billing_email" name="billing_email" value="<?php echo $supplier_info[0]->mailing_email_id?>" placeholder="E-Mail Address">
													 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2" class="text-success">Supply Address</label>
											
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_physical_pincode" onkeyup="getphysical_Pincode(this.value)"  <?php echo ($supplier_info[0]->physical_pincode =='') ?  "disabled" : "readonly" ;  ?>   value="<?php echo $supplier_info[0]->physical_pincode ?>" maxlength="6" pattern="[1-9][0-9]{5}" id="physical_pin_code" name="physical_pin_code" placeholder="PINCODE" required data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="physical_pincode_validate"></div>
												</div>
												<div class="form-group col-md-6">&nbsp;</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="physical_state" class="form-control " readonly name="physical_state"  required data-validation-required-message="Please Select State .">
													<?php if($supplier_info[0]->physical_state !=''){?>
													<option  value="<?php echo $supplier_info[0]->physical_state;?>"><?php echo $supplier_info[0]->physical_state_name; ?></option>
													<?php }else{?>
													<option  "">Select state</option>
													<?php }?>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="physical_district" class="form-control " readonly name="physical_district" required  data-validation-required-message="Please Select District .">
													<?php if($supplier_info[0]->physical_district !=''){?>													
													<option  value="<?php echo $supplier_info[0]->physical_district;?>"><?php echo $supplier_info[0]->physical_district_name; ?></option>
													<?php }else{?>
													<option  "">Select District</option>
													<?php }?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk</label>
													<select class="form-control " name="physical_taluk_id"  id="physical_taluk_id"   data-validation-required-message="Please Select Taluk .">
													<option value="">Select Taluk </option>
													<?php foreach($taluk_info1 as $taluk){
                                                if($taluk->taluk_code == $supplier_info[0]->physical_taluk_id)
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Block</label>
													<select id="physical_block" class="form-control"   name="physical_block"   data-validation-required-message="Please Select Block .">
													<option value="">Select Block </option>
													<?php foreach($block_info1 as $block){
                                                if($block->block_code == $supplier_info[0]->physical_block)
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">						    
													<label for="inputAddress2">Gram Panchayat</label>
													<select id="physical_gram_panchayat" class="form-control"  id="physical_gram_panchayat" name="physical_gram_panchayat"   data-validation-required-message="Please Select gram panchayat .">
													<option value="">Select Gram Panchayat </option>
													<?php foreach($panchayat_info1 as $panchayat){
                                                if($panchayat->panchayat_code == $supplier_info[0]->physical_panchayat)
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-6">                            
													<label for="inputAddress2">Village <!--<span class="text-danger">*</span>--></label>
													<select id="physical_village" class="form-control"   id="physical_village" name="physical_village"  data-validation-required-message="Please enter village.">
													<option value="">Select Village</option>
													<?php foreach($village_info1 as $village){
														if($village->id == $supplier_info[0]->physical_village)
														   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
														else
														   echo "<option value='".$village->id."'>".$village->name."</option>";
													 }
													 ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
											    </div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">Door No / Street</label>
													<input type="text" class="form-control" maxlength="75"   value="<?php echo $supplier_info[0]->physical_street?>" id="physical_street" name="physical_street" placeholder="Street">
												</div>
																								<div class="form-group col-md-6">
													<label for="inputAddress2">Contact Person</label>
													<input type="text" class="form-control" minlength="3"  maxlength="50" name="shipping_contact_person" value="<?php echo $supplier_info[0]->physical_contact_person?>" id="shipping_contact_person" placeholder="Contact Person" >											 
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Mobile Number  </label>
													<input type="text" class="form-control numberOnly"  pattern="^[6-9]\d{9}$" maxlength="10" value="<?php echo $supplier_info[0]->physical_mobile_no?>"  id="shipping_mobile_num" name="shipping_mobile_num">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly"  title="Std code starts with '0'" value="<?php echo $supplier_info[0]->physical_std_code?>"  pattern="^[0][0-9]{2,8}$" id="shipping_std_code" maxlength="8" minlength="3" name="shipping_std_code" placeholder="Ex:012">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Phone Number</label>
													<input type="text" class="form-control numberOnly"   maxlength="8" minlength="6" value="<?php echo $supplier_info[0]->physical_phone_no?>"  id="shipping_phone_num" name="shipping_phone_num"  placeholder="Phone Number">																
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-12">
													<label for="inputAddress2">E-Mail Address </label>
													<input type="email" class="form-control"   id="shipping_email" value="<?php echo $supplier_info[0]->physical_email_id?>" name="shipping_email" placeholder="E-Mail Address">
												 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
											</div>
										</div>	
										<div class="form-group col-md-12">
											<div class="col-md-12">
											<input type="checkbox" name="sameaddress" id="same_address"  value="1" class="" <?php echo ($supplier_info[0]->same_address==1 ? 'checked' : '');?> >&nbsp; &nbsp; Billing address same as Supply address
											</div>
										</div>
										<h4 class="text-center text-success">TAX Details </h1>
										<div class="form-group col-md-12 mt-3">
                              <div class="form-group col-md-3">
													<label for="inputAddress2">Place of Supply </label>
													<select id="supply_place" class="form-control"   name="supply_place">
													<option value="">Select Place of Supply </option>
													<!--<?php foreach($state as $state_val){
														if($state_val->id == $supplier_info[0]->supp_place)
														   echo "<option value='".$state_val->id."' selected='selected'>".$state_val->name."</option>";
														else
														   echo "<option value='".$state_val->id."'>".$state_val->name."</option>";
													 }
													 ?>-->
													</select>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">PAN</label>
												<input type="text" class="form-control text-uppercase"  maxlength="10" id="pan" value="<?php echo $supplier_info[0]->pan_no?>" name="pan" placeholder="Ex:AAAPL1234C">
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Goods & Service Tax (GST) </label>
												<input type="text" class="form-control text-uppercase"   id="gst" name="gst" maxlength="15" value="<?php echo $supplier_info[0]->gst_no?>"  id="gst" placeholder="Ex:33AAAAA0000A1Z1">
											</div>
											
                                 <div class="col-md-3">                              
											<label class=" form-control-label ml-3">Registration Type </label>
                                    <select id="registration_type" name="registration_type"  class="form-control">
												<option value="">Select Registration Type</option>
												<option value="1" <?php if($supplier_info[0]->regist_type == 1){ ?>selected<?php } ?>>Regular</option>
												<option value="2" <?php if($supplier_info[0]->regist_type == 2){ ?>selected<?php } ?>>Composition</option>
												<option value="3" <?php if($supplier_info[0]->regist_type == 3){ ?>selected<?php } ?>>Consumer</option>
												<option value="4" <?php if($supplier_info[0]->regist_type == 4){ ?>selected<?php } ?>>Unregistered</option>
												<option value="5" <?php if($supplier_info[0]->regist_type == 5){ ?>selected<?php } ?>>Overseas</option>
												<option value="6" <?php if($supplier_info[0]->regist_type == 6){ ?>selected<?php } ?>>Special Economic Zone</option>
											</select>
                                 </div>	
										</div>
										<div class="form-group col-md-12 mt-3">
                                 
										</div>
										<h4 class="text-center text-success">Bank Details </h1>
										<div class="form-group col-md-12 mt-3">	
											<div class="form-group col-md-4">
											<label class=" form-control-label">Provide Bank A/c details</label>
                                 <select id="bank_info" name="bank_info" class="form-control" >
													<option value="">Select Bank A/c Details</option>
													<option value="1" <?php if($supplier_info[0]->bank_detail == 1){ ?>selected<?php } ?>>Yes</option>
													<option value="2" <?php if($supplier_info[0]->bank_detail == 2){ ?>selected<?php } ?>>No</option>
												</select>
											</div>
											<div class="form-group col-md-4" id="bank_details1">
                                            <label for="inputAddress2">Bank Name</label>
                                                <select class="form-control"  id="bank_name" name="bank_name">
                                                    <option value="">Select Bank Name</option>
												<!--<?php foreach($bank_name as $bank_name_info){
														if($bank_name_info->id == $supplier_info[0]->bank_name)
														   echo "<option value='".$bank_name_info->id."' selected='selected'>".$bank_name_info->name."</option>";
														else
														   echo "<option value='".$bank_name_info->id."'>".$bank_name_info->name."</option>";
													 }
													 ?> -->
                                                </select> 
                                            </div>
											<div class="form-group col-md-4" id="bank_details2">
												<label for="inputAddress2">Branch Name</label>
												<select id="branch_name" name="branch_name"  class="form-control" >
												<option value="0">Select Branch Name</option>		
												</select>	 
											</div>
										</div>
										<div class="form-group col-md-12 mt-4" id="bank_details3">										
											
											<div class="form-group col-md-4">
												<label for="inputAddress2">Enter Account Number</label>
												<input type="text" class="form-control text-uppercase"  value="<?php echo $supplier_info[0]->bank_account ;  ?>" maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IFSC Code</label>
												<input type="text" class="form-control text-uppercase"   value="<?php echo $supplier_info[0]->ifsc_code;  ?>" maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
											</div>
										</div>
										<h4 class="text-center text-success">Others</h1>
										<div class="form-group col-md-12 mt-4">										
											<div class="form-group col-md-3">
												<label for="inputAddress2">Default Credit Period (Days)</label>
												<input type="text" class="form-control numberOnly"   maxlength="3"  value="<?php echo $supplier_info[0]->credit_period;  ?>" id="credit_period" name="credit_period" placeholder="Credit Period">														 
											</div>
											<div class="form-group col-md-3">
											<label class=" form-control-label">Maintain Bill by Bill</label>
                                    <select id="maintain_bill" name="maintain_bill" class="form-control" >
													<option value="">Select Maintain Bill by Bill</option>
													<option value="1" <?php if($supplier_info[0]->maintain_bill == 1){ ?>selected<?php } ?>>Yes</option>
													<option value="2" <?php if($supplier_info[0]->maintain_bill == 2){ ?>selected<?php } ?>>No</option>
												</select>
											</div>
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</label>
												<input type="text" class="form-control numberOnly text-right"  maxlength="15"  value="<?php echo $supplier_info[0]->opening_balance; ?>" id="opening_balance" name="opening_balance" placeholder="Opening Balance">														 
												</div>
											<div class="col-md-3">
												
												<label class=" form-control-label">Balance Type<span class="text-danger">*</span></label>
												 <select id="transaction_type" name="transaction_type" class="form-control" required >
													<option value="">Select Balance Type</option>
													<option value="1" <?php if($supplier_info[0]->transaction_type == 1){ ?>selected<?php } ?>>Cr</option>
													<option value="2" <?php if($supplier_info[0]->transaction_type == 2){ ?>selected<?php } ?>>Dr</option>
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
											<textarea id="general_notes" maxlength="50"   name="general_notes" class="form-control"><?php echo $supplier_info[0]->notes?></textarea>
										
										</div>
										</div>
									  <div class="form-group col-md-12 text-center">
									   <!--<button id="edit" align="center" name="general_submit" class="btn btn-success text-center" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Edit</button>-->										
										<button align="center" id="general_submit" name="update" class="btn btn-success text-center"  type="submit" ><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
										<!--<a href="" id="ok" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-arrow-circle-left"></i> Back</a>-->
										
                               <?php 
                                 if($page_module == 'inventory') {
                                 ?>
                              <a href="<?php echo base_url('fpo/inventory/suppliers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2" > <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else if($page_module == 'finance') {
                                 ?>
                              <a href="<?php echo base_url('fpo/finance/suppliers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2" > <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else {
                                 ?>
                              <a href="<?php echo base_url('fpo/inventory/suppliers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2" > <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }?>
                              
									  </div>									 
								
									  </form>
									
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
   <script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
   <script>
 $('#edit').click(function(){
		  $('#form-step-0').toggleClass('view');
		  $("#general_submit").show();
		  $("#cancel").show();
		  $("#edit").hide();
		   $("#ok").hide();
		  $('input').each(function(){
			var inp = $(this);
			 //var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("general_submit").disabled =false;
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
			  document.getElementById("general_submit").disabled =false;
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
			  document.getElementById("general_submit").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  inp.attr('disabled', 'disabled');
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
				//alert(taluk_id);
                var block = $("#block").html();
				//alert(block);
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
				document.getElementById('shipping_mobile_num').value =$("#billing_mobile_num").val();
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
							console.log(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {	
							console.log(value.supplier_id);									   
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
							console.log(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {
								console.log(value.supplier_id);							   
								div_data +="<option value="+value.supplier_id+">"+value.supp_name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#supplier');
						}
					});
				}
		  
		}	
		
		$('#search_item_desc').on('change', function () {
	    var description = $(this).val();
		document.getElementById('search_item_code').value=description;
		});
		
		var delivery_address='<?php echo json_encode($location);?>';
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
			console.log(searchdata);
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

 
	var bankname= document.getElementById('bank_name').value; 
	var branch_name= '<?php echo $supplier_info[0]->branch_name;?>'; 
	if(branch_name !=''){
		var get_bank_id = bankname;
		getBranchByBankName(get_bank_id);
	}else{
	}

	function getBankAddressByBankName( bank_name_id ) {
		$("#branch_name option").remove();
			if(bank_name_id != ''){    
			   $.ajax({
				  url:"<?php echo base_url();?>fpo/finance/getBankAddressByBankName/"+bank_name_id,
				  type:"GET",
				   data:"",
				  dataType:"html",
				  cache:false,			
				  success:function(response) {
				  console.log(response);
					  response=response.trim();                
					  responseArray=$.parseJSON(response);
					  console.log(responseArray);
					 if(responseArray.status == 1){
						if (Object.keys(responseArray).length > 0) {
							$("#branch_name").append($('<option></option>').val(0).html('Select Branch Name'));
						}
						$.each(responseArray.bankaddress_list,function(key,value){
							$("#branch_name").append($('<option></option>').val(value.id).html(value.branch_name));
						});
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
	
	function getBranchByBankName( bank_name_id ) {
		$("#branch_name option").remove();
			if(bank_name_id != ''){    
			   $.ajax({
				  url:"<?php echo base_url();?>fpo/finance/getBankAddressByBankName/"+bank_name_id,
				  type:"GET",
				   data:"",
				  dataType:"html",
				  cache:false,			
				  success:function(response) {
				  console.log(response);
					  response=response.trim();                
					  responseArray=$.parseJSON(response);
					  console.log(responseArray);
					 if(responseArray.status == 1){
						if (Object.keys(responseArray).length > 0) {
							$("#branch_name").append($('<option></option>').val(0).html('Select Branch Name'));
						}
						$.each(responseArray.bankaddress_list,function(key,value){
							if(value.id==branch_name){
							$("#branch_name").append($('<option selected></option>').val(value.id).html(value.branch_name));
							}else{
							$("#branch_name").append($('<option></option>').val(value.id).html(value.branch_name));
							}
						});
					}
				  },
				  error:function(response){
					alert('Error!!! Try again');
				  }  			
			   }); 
			} else {
			$("#branch_name").append($('<option></option>').val(0).html('Select Branch Name'));
			} 
	}

	/* $('input[name=bank_info]').on('change', function() {
    var bank_info = $("input[name='bank_info']:checked").val();  
    if(bank_info == 1) {
		$('#bank_details1').show();
		$('#bank_details2').show();
		$('#bank_details3').show();
    }else{
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	}
	});	 */
   $('#bank_info').change(function(){
  
	var bank_info = $("#bank_info").val();
	//alert(crop_category);
	showDiv( bank_info );
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
		
	var bank_detail = '<?php echo $supplier_info[0]->bank_detail;?>';  
    if(bank_detail == 1) {
		$('#bank_details1').show();
		$('#bank_details2').show();
		$('#bank_details3').show();
    }else{
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	}

	$('#bank_name').change(function(){
		var get_bank_id = $("#bank_name").val();
		getBankAddressByBankName( get_bank_id );
	});
	var account_group= document.getElementById('account_group').value; 
	if(account_group!=''){
		$("#group_code").val(account_group);
	}
	$('#account_group').on('change', function() {
		$("#group_code").val(this.value);
	});
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
   $( document ).ready(function() {
    var state_id='<?php echo $supplier_info[0]->mailing_state;?>';
     getbanklist(state_id);
     var supp_place ='<?php echo $supplier_info[0]->supp_place;?>';
     //alert(supp_place);
      getplaceofsupplier(supp_place);
    var bank_id='<?php echo $supplier_info[0]->bank_name;?>';
     getBankAddressByBankName(bank_id);
});
function getbanklist(state_id) {
   var bank_name='<?php echo $supplier_info[0]->bank_name;?>';
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getbanklist/"+state_id,
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
               //console.log(response);
					response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Bank Name</option>';
					var gram_panchayat = "";
					$.each(responseArray, function(key, value){
						if(bank_name == value.id) {
							village += '<option value='+value.id+' selected="selected">'+value.bank_name+'</option>';
						}
						else {
							village += '<option value='+value.id+'>'+value.bank_name+'</option>';
						}
					});                                
					$('#bank_name').html(village);           
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}	
   function getBankAddressByBankName(bank_name_id) { 
   //alert(bank_name_id);
   $("#branch_name option").remove();
   var branch_name='<?php echo $supplier_info[0]->branch_name;?>';
   var state_id = $("#state").val();
			$.ajax({
				 url:"<?php echo base_url();?>fpo/inventory/getBankAddressByBankName",
				type:"POST",
				data:{bank_name:bank_name_id,state:state_id},
				dataType:"html",
				cache:false,			
				success:function(response) {
               console.log(response);
					response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Bank Name</option>';
					var gram_panchayat = "";
					$.each(responseArray.bankaddress_list, function(key, value){
                 
						if(branch_name == value.id) {
							village += '<option value='+value.id+' selected="selected">'+value.branch_name+'-'+value.ifsc_code+'</option>';
						}
						else {
							village += '<option value='+value.id+'>'+value.branch_name+'-'+value.ifsc_code+'</option>';
						}
					});                                
					$('#branch_name').html(village);           
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}
 $('#pin_code').focusout(function(e) 
{
   //var state_id = $("#state").val();
   //getbanklist(state_id);
   //getplaceofsupplier(state_id);
});
$('#bank_name').change(function(){
	var branch_info = $("#bank_name").val();
	//alert(crop_category);
	getBankAddressByBankName( branch_info );
	});
  function getplaceofsupplier(id) {
     //alert(id);
        $("#supply_place option").remove();
       var state_id = id;
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getplacesupply/",
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
               console.log(response);
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
</script>
</body>
</html>