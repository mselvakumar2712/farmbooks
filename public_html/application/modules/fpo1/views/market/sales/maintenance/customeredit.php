<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
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
							<h1>Edit Customer</h1>
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
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postupdatecustomer/'.$customer_info[0]->debtor_no)?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php }else if($page_module == 'finance') {
                     ?>
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/finance/postupdatecustomer/'.$customer_info[0]->debtor_no)?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php }else {
                     ?>
                     <form id="addpopi_Form" method="POST" action="<?php echo base_url('fpo/Market/postupdatecustomer/'.$customer_info[0]->debtor_no)?>" role="form" name="sentMessage" novalidate="novalidate" data-toggle="validator" accept-charset="utf-8">
                     <?php }?>						
									<div>
                          <input type="hidden" class="form-control" id="debtor_no" name="debtor_no" value="<?php echo $customer_info[0]->debtor_no; ?>">                                    
									<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
										<div class="form-group col-md-12 mt-4">
										<div class="form-group col-md-4 ">
											<label for="">Customer Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="50" value="<?php echo $customer_info[0]->name; ?>" id="customer_name" name="customer_name" placeholder="Customer Name" required="required" data-validation-required-message="Please enter customer name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4 ">
											<label for="">Customer Short Name</label>
											<input type="text" class="form-control" maxlength="20" id="customer_short_name" value="<?php echo $customer_info[0]->debtor_ref; ?>" name="customer_short_name" placeholder="Customer Short Name" data-validation-required-message="Please enter customer short name.">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										
										<div class="form-group col-md-4">
											<label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
											<select class="form-control" id="gl_group" name="gl_group" required="required" data-validation-required-message="Please select gl group.">
											  <option value="">Select GL Group </option>
											  <?php foreach($gl_group_info as $gl_group){
												if($gl_group->account_code == $customer_info[0]->gl_group)
												   echo "<option value='".$gl_group->account_code."' selected='selected'>".$gl_group->account_name."</option>";
												else
												   echo "<option value='".$gl_group->account_code."'>".$gl_group->account_name."</option>";
											   }
											   ?>
											</select>
											<div class="help-block with-errors text-danger"></div>
										  </div>
										</div>
										<div class="form-group col-md-12 mt-1">

										<div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span> </label>
											<input type="text" onkeyup="getPincode(this.value)" class="form-control numberOnly this_pin_code" required="required" id="pincode" pattern="[1-9][0-9]{5}" readonly value="<?php echo $customer_info[0]->pincode; ?>" name="pincode" minlength="6" maxlength="6" placeholder="PINCODE"  data-validation-required-message="Please enter pincode.">						
											<p class="help-block text-danger" id="pincode_validate"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span> </label>
											<select id="state" name="state" class="form-control sel_state" required="required" data-validation-required-message="Please Select state." readonly>
											<option  value="<?php echo $customer_info[0]->state; ?>"><?php echo $customer_info[0]->state_name; ?></option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District <span class="text-danger">*</span> </label>
											<select id="district" name="district" class="form-control sel_district" required="required" data-validation-required-message="Please Select district." readonly>
											 <option  value="<?php echo $customer_info[0]->district; ?>"><?php echo $customer_info[0]->district_name; ?></option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										</div>
										<div class="form-group col-md-12">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk </label>
											<select id="taluk" name="taluk" class="form-control sel_taluk" >
											 <option value="">Select Taluk </option>
											 <?php foreach($taluk_info as $taluk){
                                                if($taluk->taluk_code == $customer_info[0]->taluk_id)
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
											 </select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block</label>
											<select id="block" name="block" class="form-control sel_block">
											 <option value="">Select Block </option>
											 <?php foreach($block_info as $block){
                                                if($block->block_code == $customer_info[0]->block)
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat </label>
											<select  name="gram_panchayat" id="gram_panchayat" class="form-control sel_panchayat" >
											<option value="">Select Gram Panchayat </option>
											<?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $customer_info[0]->panchayat)
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										</div>
										<div class="form-group col-md-12">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village / City </label>
											<select id="village" name="village" class="form-control sel_village" >
											 <option value="">Select Village </option>
											 <?php foreach($village_info as $village){
                                                if($village->id == $customer_info[0]->village)
                                                   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                                else
                                                   echo "<option value='".$village->id."'>".$village->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Door No / Street</label>
										<textarea id="street" maxlength="50" name="street" value="" class="form-control"><?php echo $customer_info[0]->address; ?></textarea>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Name of the Contact Person </label>
											<input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo $customer_info[0]->contact_person; ?>" maxlength="100" placeholder="Contact Person">
										</div>
										</div>
										<div class="form-group col-md-12 mt-2">
										 <div class="form-group col-md-2">
											<label for="">STD Code</label>
											<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." value="<?php echo $customer_info[0]->std_code; ?>" id="std_code" maxlength="8" name="std_code" title="Std Code starts with '0'" placeholder="Ex:012">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Phone Number </label>
											<input type="text" class="form-control numberOnly" minlength="6" maxlength="8" id="phone_number" name="phone_number" value="<?php echo $customer_info[0]->phone_number; ?>" placeholder="Phone Number">				
										    <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Mobile Number </label>
											<input type="text" class="form-control numberOnly" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" value="<?php echo $customer_info[0]->mobile_number; ?>" placeholder="Mobile Number" data-validation-required-message="Please enter mobile number.">
											<div id="mbl_validate" class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address </label>
											<input type="email" class="form-control" id="email_billing_address" name="email_billing_address" placeholder="E-Mail Address" value="<?php echo $customer_info[0]->email; ?>" data-validation-required-message="Please enter email address.">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="col-md-12">
											<input type="checkbox" name="sameaddress" id="same_address" value="1" class="" <?php echo ($customer_info[0]->sameaddress==1 ? 'checked' : '');?> >&nbsp; &nbsp; Billing address same as Supply address
										</div>
										</div>
										<h4 class="text-center text-success">Supply Address</h4>
										
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE </label>
											<input type="text" onkeyup="getphysical_Pincode(this.value)" class="form-control numberOnly this_physical_pincode" id="physical_pincode" pattern="[1-9][0-9]{5}" name="physical_pincode" minlength="6" maxlength="6" placeholder="PINCODE" value="<?php echo $customer_info[0]->physical_pincode; ?>" data-validation-required-message="Please enter pincode.">
											 <p class="help-block text-danger with-errors" id="physical_pincode_validate"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">State </label>
											<select id="physical_state" class="form-control" readonly name="physical_state" data-validation-required-message="Please Select State.">
											<option value="">Select State </option>
											<option value="<?php echo $customer_info[0]->physical_state; ?>" <?php if(!empty($customer_physical_info[0]->state_name)) { echo 'selected="selected"'; } ?> ><?php if(!empty($customer_physical_info[0]->state_name)) { echo $customer_physical_info[0]->state_name;} ?></option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District </label>
											<select id="physical_district" class="form-control" readonly name="physical_district" data-validation-required-message="Please Select District.">
											  <option value="">Select District </option>
                                   <option  value="<?php echo $customer_info[0]->physical_district; ?>" <?php if(!empty($customer_physical_info[0]->district_name)) { echo 'selected="selected"'; } ?> ><?php if(!empty($customer_physical_info[0]->district_name)) { echo $customer_physical_info[0]->district_name;} ?></option>
											</select> 
											<p class="help-block with-errors text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk </label>
											<select class="form-control " name="physical_taluk_id" id="physical_taluk_id" data-validation-required-message="Please Select Taluk .">
											 <option value="">Select Taluk </option>
											 <?php foreach($taluk_info1 as $taluk){
                                                if($taluk->taluk_code == $customer_info[0]->physical_taluk_id)
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
											 </select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block </label>
											<select id="physical_block" class="form-control" name="physical_block" data-validation-required-message="Please Select Block .">
											 <option value="">Select Block </option>
											 <?php foreach($block_info1 as $block){
                                                if($block->block_code == $customer_info[0]->physical_block)
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat </label>
											<select id="physical_gram_panchayat" class="form-control" name="physical_gram_panchayat" data-validation-required-message="Please Select gram panchayat .">
											<option value="">Select Gram Panchayat </option>
											<?php foreach($panchayat_info1 as $panchayat){
                                                if($panchayat->panchayat_code == $customer_info[0]->physical_panchayat)
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village / City </label>
											<select id="physical_village" class="form-control" name="physical_village" data-validation-required-message="Please enter village.">
											 <option value="">Select Village </option>
											 <?php foreach($village_info1 as $village){
                                                if($village->id == $customer_info[0]->physical_village)
                                                   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                                else
                                                   echo "<option value='".$village->id."'>".$village->name."</option>";
                                             }
                                             ?>
											</select>
										</div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Door No / Street</label>
										<textarea id="physical_street" maxlength="50" name="physical_street" class="form-control"><?php echo $customer_info[0]->physical_street; ?></textarea>
											
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Name of the Contact Person </label>
											<input type="text" class="form-control" id="physical_contact_person" name="physical_contact_person" value="<?php echo $customer_info[0]->physical_contact_person; ?>" maxlength="100" placeholder="Contact Person" >																
										</div>
										</div>
										<div class="form-group col-md-12 mt-2">
										 <div class="form-group col-md-2">
											<label for="">STD Code</label>
											<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." value="<?php echo $customer_info[0]->physical_std_code; ?>" id="physical_std_code" maxlength="8" name="physical_std_code" title="Std Code starts with '0'" placeholder="Ex:012">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-2">
											<label for="inputAddress2">Phone Number </label>
											<input type="text" class="form-control numberOnly" minlength="6" value="<?php echo $customer_info[0]->physical_phone_number; ?>" maxlength="8" id="physical_phone_number" name="physical_phone_number" placeholder="Phone Number">				
										    <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Mobile Number  </label>
											<input type="text" class="form-control numberOnly" maxlength="10" id="physical_mobile_num" pattern="^[6-9]\d{9}$" name="physical_mobile_num" value="<?php echo $customer_info[0]->physical_mobile_num; ?>" placeholder="Mobile Number" data-validation-required-message="Please enter mobile number.">
											<div id="mbl_validate" class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">E-Mail Address </label>
											<input type="email" class="form-control" id="physical_email" name="physical_email" placeholder="E-Mail Address" value="<?php echo $customer_info[0]->physical_email; ?>" data-validation-required-message="Please enter email address.">
											<div class="help-block with-errors text-danger"></div>
										</div>
									   									
										</div>
										<h4 class="text-center text-success">Tax Details</h4>
										<div class="form-group col-md-12 mt-4">
                              <div class="form-group col-md-3">
											<label for="inputAddress2">Place of Customer</label>
											<select id="place_of_customer" name="place_of_customer" class="form-control">
											<option value="">Select Place of Customer</option>
											<?php for($i=0; $i<count($state);$i++) {
														if($customer_info[0]->place_of_customer==$state[$i]->id){	
														echo '<option value="'.$state[$i]->id.'" selected="selected">'.$state[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$state[$i]->id.'">'.$state[$i]->name.'</option>';
														}?>										
													<?php }?>	
											</select>	 
										</div>										
										<div class="form-group col-md-3">
											<label for="inputAddress2">PAN </label>
											<input type="text" class="form-control text-uppercase" id="pan_promoting_institution" value="<?php echo $customer_info[0]->pan_no; ?>" maxlength="10" name="pan_promoting_institution" placeholder="EX:AAAPL1234C" data-validation-required-message="Please enter pan of promoting institution.">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">GST No</label>
											<input type="text" class="form-control text-uppercase" name="gst" value="<?php echo $customer_info[0]->gst_no; ?>" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
									
										</div>
										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Registration Type</label>
											<select id="registration_type" name="registration_type" class="form-control">
												<option value="">Select Registration Type</option>
												<option value="1" <?php if($customer_info[0]->registration_type == 1){ ?>selected<?php } ?>>Regular</option>
												<option value="2" <?php if($customer_info[0]->registration_type == 2){ ?>selected<?php } ?>>Composition</option>
												<option value="3" <?php if($customer_info[0]->registration_type == 3){ ?>selected<?php } ?>>Consumer</option>
												<option value="4" <?php if($customer_info[0]->registration_type == 4){ ?>selected<?php } ?>>Unregistered</option>
												<option value="5" <?php if($customer_info[0]->registration_type == 5){ ?>selected<?php } ?>>Overseas</option>
												<option value="6" <?php if($customer_info[0]->registration_type == 6){ ?>selected<?php } ?>>Special Economic Zone</option>
											</select>	
										</div>
										
										</div>
                              	<h4 class="text-center text-success">Bank Details </h1>
										<div class="form-group col-md-12 mt-3">	
											<div class="form-group col-md-4">
											<label class=" form-control-label">Provide Bank A/c details</label>
												<select id="bank_info" name="bank_info" class="form-control" >
													<option value="">Select Bank A/c Details</option>
													<option value="1" <?php if($customer_info[0]->bank_details == 1){ ?>selected<?php } ?>>Yes</option>
													<option value="2" <?php if($customer_info[0]->bank_details == 2){ ?>selected<?php } ?>>No</option>
												</select>
											</div>
											<div class="form-group col-md-4" id="bank_details1">
                                            <label for="inputAddress2">Bank Name</label>
                                                <select class="form-control"  id="bank_name" name="bank_name">
                                                    <option value="">Select Bank Name</option>
													<?php foreach($bank_name as $bank_name_info){
														if($bank_name_info->id == $customer_info[0]->bank_name)
														   echo "<option value='".$bank_name_info->id."' selected='selected'>".$bank_name_info->name."</option>";
														else
														   echo "<option value='".$bank_name_info->id."'>".$bank_name_info->name."</option>";
													 }
													 ?>
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
												<input type="text" class="form-control text-uppercase" value="<?php echo $customer_info[0]->account_number; ?>" maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IFSC Code</label>
												<input type="text" class="form-control text-uppercase" value="<?php echo $customer_info[0]->ifsc_code; ?>" maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
											</div>
										</div>
										<h4 class="text-center text-success">Sales</h4>
										<div class="form-group col-md-12 mt-4">										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" value="<?php echo $customer_info[0]->discount; ?>" maxlength="2" name="discount_percent" id="discount_percent" placeholder="Discount Percent">
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Credit Limit (Rupees)</label>
											<input type="text" class="form-control numberOnly" value="<?php echo $customer_info[0]->credit_limit; ?>" minlength="2" maxlength="6" name="credit_limit" id="credit_limit" placeholder="Credit Limit">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress2">Prompt Payment Discount Percent (%)</label>
											<input type="text" class="form-control numberOnly" value="<?php echo $customer_info[0]->pymt_discount; ?>" maxlength="2" name="prompt_discount_percent" id="prompt_discount_percent" placeholder="Prompt Payment Discount Percent" >
										</div>
										
										<div class="form-group col-md-3">
											<label for="inputAddress2">Payment Terms (Days)</label>
											<select id="payment_terms" name="payment_terms" class="form-control">
											<option value="">Select Payment Terms</option>
											<?php foreach($payment_terms as $payment_terms){
                                                if($payment_terms->terms_indicator == $customer_info[0]->payment_terms)
                                                   echo "<option value='".$payment_terms->terms_indicator."' selected='selected'>".$payment_terms->terms."</option>";
                                                else
                                                   echo "<option value='".$payment_terms->terms_indicator."'>".$payment_terms->terms."</option>";
                                             }
                                             ?>	
											</select>	 
										</div>
										</div>
									
										<h4 class="text-center text-success">Others</h4>
										<div class="form-group col-md-12 mt-4">	
										<div class="form-group col-md-3">
											<label for="inputAddress2">Credit Status</label>
											<select id="credit_status" name="credit_status" class="form-control">
												<option value="">Select Credit Status</option>
												<option value="1" <?php if($customer_info[0]->credit_status == 1){ ?>selected<?php } ?>>Active</option>
												<option value="2" <?php if($customer_info[0]->credit_status == 2){ ?>selected<?php } ?>>In Active</option>
											</select>		 
										</div>
										<div class="form-group col-md-3" id="credit_period1" style="display:none;">
											<label for="inputAddress2">Credit Period (Days)</label>
											<input type="text" class="form-control numberOnly" value="<?php echo $customer_info[0]->credit_period; ?>" maxlength="3" name="credit_period" id="credit_period" placeholder="Credit Period">
											 <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="col-md-6">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly text-right" maxlength="6" name="opening_balance" value="<?php echo $customer_info[0]->opening_balance; ?>" id="opening_balance" placeholder="Opening Balance" required data-validation-required-message="Provide the opening balance">
												<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-6">
												<label class="form-control-label">Balance Type <span class="text-danger">*</span></label>
												<select id="transaction_type" name="transaction_type" class="form-control" required data-validation-required-message="Provide the balance type">
												<option value="">Select Balance Type</option>
												<option value="1" <?php if($customer_info[0]->transaction_type == 1){ ?>selected<?php } ?>>Cr</option>
												<option value="2" <?php if($customer_info[0]->transaction_type == 2){ ?>selected<?php } ?>>Dr</option>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>											
										</div>
										</div>
										<div class="form-group col-md-12">	
											<div class="form-group col-md-6">	
												<label for="inputAddress2">General Notes</label>
												<textarea id="general_notes" maxlength="50" name="general_notes" class="form-control"><?php echo $customer_info[0]->notes; ?></textarea>
											</div>														
										</div>		
									  </div>
										
									  <div class="form-group col-md-12 text-center">
									  <!--<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>-->
										<!--<button id="edit" align="center" name="general_submit" class="btn btn-success text-center" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Edit</button>-->
										<button align="center" id="general_submit" name="update" class="btn btn-success text-center" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
										<!--<a href="" id="ok" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-arrow-circle-left"></i> Back</a>-->
                                <?php 
                                 if($page_module == 'market') {
                                 ?>
                              <a href="<?php echo base_url('fpo/market/customers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else if($page_module == 'finance') {
                                 ?>
                              <a href="<?php echo base_url('fpo/finance/customers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                 <?php }else {
                                 ?>
                              <a href="<?php echo base_url('fpo/market/customers');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
<script>
var credit_status = "<?php echo $customer_info[0]->credit_status; ?>";
creditStatus(credit_status);
	
$('#credit_status').change(function(){
    var credit_status = $(this).val();  
    creditStatus(credit_status);
});	

function creditStatus(credit_status) {
	if(credit_status == 1){
		$('#credit_period1').show();
    }else{
		$('#credit_period1').hide();
	}
}

/*	
var bank_info = $("input[name='credit_status']:checked").val();  
    if(bank_info == 1) {
		$('#credit_period1').show();
    }else{
		$('#credit_period1').hide();
	}
	$('input[name=bank_details]').on('change', function() {
    var bank_details = $("input[name='bank_details']:checked").val();  
    if(bank_details == 1) {
		$('#bankdetails1').show();
		$('#bankdetails2').show();
		$('#bankdetails3').show();
		//$('#bank_details2').show();
		//$('#bank_details3').show();
    }else{
		$('#bankdetails1').hide();
		$('#bankdetails2').hide();
		$('#bankdetails3').hide();
		//$('#bank_details3').hide();
	}
	});	
	var bank_detail_info = $("input[name='bank_details']:checked").val();  
    if(bank_detail_info == 1) {
		$('#bankdetails1').show();
		$('#bankdetails2').show();
		$('#bankdetails3').show();
    }else{
		$('#bankdetails1').hide();
		$('#bankdetails2').hide();
		$('#bankdetails3').hide();
	}
   
   
   
   $('#bank_name').change(function(){
		var get_bank_id = $("#bank_name").val();
		getBankAddressByBankName( get_bank_id );
	});
    var bankname= document.getElementById('bank_name').value; 
	var branch_name= '<?php echo $customer_info[0]->branch_name;?>'; 
	if(branch_name !=''){
		var get_bank_id = bankname;
		getBranchByBankName(get_bank_id);
	}else{
	}
     
function getBankAddressByBankName( bank_name_id ) {
    $("#branch_name option").remove();
    if(bank_name_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/market/getBankAddressByBankName/"+bank_name_id,
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
			         $("#branch_name").append($('<option></option>').val(0).html('Select branch'));
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
				  url:"<?php echo base_url();?>fpo/market/getBankAddressByBankName/"+bank_name_id,
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
			
			} 
	}
	*/
	
/* $(document).ready(function(){
	var bank_detail=<?php echo $customer_info[0]->bank_details;?>;
	 yesnoCheck( bank_detail );
	 var credit_status=<?php echo $customer_info[0]->credit_status;?>;
	 credistatusCheck( credit_status );
	 //hidecreditperiod( credit_status );
	//alert(credit_status);
}); */
	
    /* function yesnoCheck() {
		
        if (document.getElementById('bank_details1').checked) {
            document.getElementById('bankdetails1').style.display = 'block';
			document.getElementById('bankdetails2').style.display = 'block';
			document.getElementById('bankdetails3').style.display = 'block';
        } 
        else if(document.getElementById('bank_details2').checked){
            document.getElementById('bankdetails1').style.display = 'none';
			document.getElementById('bankdetails2').style.display = 'none';
			document.getElementById('bankdetails3').style.display = 'none';
        }
    }
	function credistatusCheck() {
        if (document.getElementById('credit_status1').checked) {
           document.getElementById('credit_period1').style.display = 'block'; 
        } 
        else if(document.getElementById('credit_status2').checked){
            document.getElementById('credit_period1').style.display = 'none';
        }
    } */
	/*  $("#credit_status1").click(showcreditperiod);
	  $("#credit_status2").click(hidecreditperiod);
	 function showcreditperiod()
	 {
		 if (credit_status1.checked == 1)
		 {
			document.getElementById('credit_period1').style.display = 'block'; 
		 }
		 
	 }
	 function hidecreditperiod()
	 {
		if(document.getElementById('credit_status2').checked)
		 {
			 document.getElementById('credit_period1').style.display = 'none';
		 }
		 
	 } */
	 
   $("#same_address").click(CopyAdd);

	function CopyAdd() {
		if (this.checked==true) {
	            var sameaddress = $("#sameaddress").html();
                var pin_code = $("#pin_code").html();
                var state = $("#state").html();
                var district = $("#district").html();
				var taluk_id = $("#taluk").html();
                var block = $("#block").html();
                var gram_panchayat= $("#gram_panchayat").html();
                var village = $("#village").html();
                var street = $("#street").html();
				var contact_person = $("#contact_person").html();
				var std_code = $("#std_code").html();
				var phone_number = $("#phone_number").html();
				var mobile_num = $("#mobile_num").html();
				var email = $("#email_billing_address").html();
				$("#physical_pin_code").html(pin_code);
				document.getElementById('physical_contact_person').innerHTML = contact_person;
				document.getElementById('physical_std_code').innerHTML = std_code;
				document.getElementById('physical_phone_number').innerHTML = phone_number;
				document.getElementById('physical_mobile_num').innerHTML = mobile_num;
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
				document.getElementById('physical_taluk_id').value = $("#taluk").val();
				document.getElementById('physical_block').value = $("#block").val();
				document.getElementById('physical_gram_panchayat').value = $("#gram_panchayat").val();
				document.getElementById('physical_village').value = $("#village").val();
				document.getElementById('physical_contact_person').value = $("#contact_person").val();
				document.getElementById('physical_std_code').value = $("#std_code").val();
				document.getElementById('physical_phone_number').value = $("#phone_number").val();
				document.getElementById('physical_mobile_num').value = $("#mobile_num").val();
				document.getElementById('physical_email').value = $("#email_billing_address").val();
				document.getElementById('physical_street').value = $("#street").val();
		}
	} 
	
/*	
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
			*/
			
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
				//alert('GST match found');
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
		
		
		/*$(function(){		 
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
		});*/
		
		//$("#update").hide();
		//$("#supplier_del").hide();
		/* $('select[name="customer"]').on('change', function(e) {
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
					document.getElementById("pincode").value=value.pincode;	
					var pincode=value.pincode;	
					getPincode( pincode );
					document.getElementById("state").value=value.state;
					document.getElementById("district").value=value.district;
					document.getElementById("taluk").value=value.taluk_id;
					document.getElementById("block").value=value.block;
					var block_id=value.block;
					getPanchayatList(block_id);
					var panchayat=value.panchayat;
					getVillageList(panchayat);
					document.getElementById("address").value=value.address;	
					
					document.getElementById("branch_name").value=value.br_name;	
					//document.getElementById("address").value=value.address;	
					//document.getElementById("address").value=value.address;	
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
					setTimeout(function(){  
					//console.log("hlo");
                        document.getElementById("taluk").value=value.taluk_id;
						document.getElementById("block").value=value.block;
                        document.getElementById("gram_panchayat").value=value.panchayat;
						document.getElementById("village").value=value.village;						
                    }, 1000);
					}); 
					  
				}
			});
			}						
		}); */
		
$('#gram_panchayat').change(function(){	
	var gram_panchayat = $("#gram_panchayat").val();
	getVillageList( gram_panchayat );
});  
$('#block').change(function(){	
	var block = $("#block").val();	
	getPanchayatList( block );
}); 
$('#physical_gram_panchayat').change(function(){	
	var gram_panchayat = $("#physical_gram_panchayat").val();
	getphysical_VillageList( gram_panchayat );
});  
$('#physical_block').change(function(){	
	var block = $("#physical_block").val();	
	getphysical_PanchayatList( block );
}); 
function getVillageList( panchayat_code ) {
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
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
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
                if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
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
  $( document ).ready(function() {
    var state_id='<?php echo $customer_info[0]->state;?>';
    ///alert(state_id);
     getbanklist(state_id);
    var place_customer='<?php echo $customer_info[0]->place_of_customer;?>';
    getplaceofsupplier(place_customer);
    var bank_id='<?php echo $customer_info[0]->bank_name;?>';
     getBankAddressByBankName(bank_id);
});
function getbanklist(state_id) {
   var bank_name='<?php echo $customer_info[0]->bank_name;?>';
   //alert(bank_name);
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
   var branch_name='<?php echo $customer_info[0]->branch_name;?>';
   var state_id = $("#state").val();
			$.ajax({
				 url:"<?php echo base_url();?>fpo/inventory/getBankAddressByBankName",
				type:"POST",
				data:{bank_name:bank_name_id,state:state_id},
				dataType:"html",
				cache:false,			
				success:function(response) {
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
$('#bank_name').change(function(){
	var branch_info = $("#bank_name").val();
	//alert(crop_category);
	getBankAddressByBankName( branch_info );
	});  
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
		
	var bank_detail = '<?php echo $customer_info[0]->bank_details;?>';  
    if(bank_detail == 1) {
		$('#bank_details1').show();
		$('#bank_details2').show();
		$('#bank_details3').show();
    }else{
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	}
   function getplaceofsupplier(id) {
     //alert(id);
        $("#place_of_customer option").remove();
       var state_id = id;
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
</script>
</body>
</html>