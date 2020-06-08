<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

  <body>
      <div class="container-fluid pl-0 pr-0">
         <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Company Secretary</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewcompany_secretary/'.$secretary['id']);?>">View Company Secretary</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="#"  method="post"  id="secretaryform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space  mt-4">
												<div class="col-md-3">&nbsp;
												</div>												
												 <div class="form-group col-md-6">
													  <label class=" form-control-label">Is the Turnover of the Company is more than > 5 Crs for last 3 years <span class="text-danger">*</span></label>
													  <div class="row">
													  <div class="col-md-2">&nbsp;
													  </div>
														<div class="col-md-4">
														  <div class="form-check-inline form-check">
															<label for="ismore1" class="form-check-label">
															  <input type="radio" id="ismore1" name="is_turnover_slab" <?php if($secretary['is_turnover_slab'] == 1) { echo 'checked="checked"'; } ?> value="1" required="required" class="form-check-input" disabled data-validation-required-message="Please select"><span class="ml-1">Yes</span>
															</label>
														  </div> 
														</div>
														<div class="col-md-4">
														  <div class="form-check-inline form-check">
															<label for="ismore2" class="form-check-label">
															  <input type="radio" id="ismore2" name="is_turnover_slab" <?php if($secretary['is_turnover_slab'] == 2) { echo 'checked="checked"'; } ?> value="2" required="required" class="form-check-input" disabled data-validation-required-message="Please select"><span class="ml-1">No</span>
															</label>
															</div>
														</div>
													<div class="col-md-2">&nbsp;
													  </div>			  
													  </div>
													  <div class="help-block with-errors text-danger ml-5"></div>	
												</div>
												<div class="col-md-3">&nbsp;
												</div>	
												</div>
												<div class="row row-space" id="div1">
												  <div class="form-group col-md-4" >
													<label for="">Name of the Company Secretary <span class="text-danger">*</span></label>
													<input type="text" class="form-control" disabled maxlength="50" id="name" name="name"  value="<?php echo $secretary['name']; ?>" placeholder="Name of the Company Secretary" required="required" data-validation-required-message="Please enter company secretary name.">
													<div class="help-block with-errors text-danger"></div>
												  </div>
												  <div class="form-group col-md-4" >
													<label for="">Registration Number</label>
													<input type="text" class="form-control" disabled maxlength="10" id="reg_number" name="reg_number" value="<?php echo $secretary['reg_number']; ?>" placeholder="Registration Number">
												  </div>
												   <div class="form-group col-md-4">
													<label for="">Name of the Firm </label>
													<input type="text" class="form-control" disabled maxlength="100" id="firm_name" name="firm_name" value="<?php echo $secretary['firm_name']; ?>" placeholder="Name of the Firm ">
													<p class="help-block text-danger"></p>
												  </div>
												</div>
											   <div class="row row-space" id="div2">
												  <div class="form-group col-md-4">
													  <label for="">Firm Registration Number</label>
													 <input type="text" class="form-control" disabled maxlength="10" id="firm_reg_number" name="firm_reg_number" value="<?php echo $secretary['firm_reg_number']; ?>" placeholder="Firm Registration Number">
													 <p class="help-block text-danger"></p>
												  </div> 
												<div class="col-md-4 form-group">
												<label for="inputAddress2">PINCODE </label>
												<input type="text" class="form-control numberOnly this_pin_code" disabled onkeyup="getPincode(this.value)"  maxlength="6" pattern="[1-9][0-9]{5}" id="pincode" name="pincode" value="<?php echo $secretary['pincode']; ?>"  placeholder="PINCODE">
												<div class="help-block with-errors text-danger" id="pincode_validate"></div>
											</div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">State </label>
												<select id="state" class="form-control sel_state" disabled name="state" >
													<option value="">Select State </option>
													<option  value="<?php echo $secretary['state_code']?>" <?php if($secretary['state_code'] >0) { echo 'selected="selected"'; } ?> ><?php echo $secretary['state_name']?></option>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>													 
											</div>
											 <div class="row row-space" id="div3">
											 <div class="form-group col-md-4">
												<label for="inputAddress2">District </label>
												<select id="district" class="form-control sel_district" disabled name="district" >
													<option value="">Select District </option>
													<option  value="<?php echo $secretary['district']?>" <?php if($secretary['district'] >0) { echo 'selected="selected"'; } ?> ><?php echo $secretary['district_name']?></option>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
											   <div class="form-group col-md-4">
												<label for="inputAddress2">Taluk </label>
												<select class="form-control sel_taluk" disabled name="taluk"  id="taluk" >
													<option value="">Select Taluk </option>
													<?php foreach($taluk_info as $taluk){
															if($taluk->taluk_code == $secretary['taluk'])
															   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
															else
															   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
														 }
													?>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">Block </label>
													<select id="block" class="form-control sel_block" disabled name="block" >
														<option value="">Select Block </option>
														<?php foreach($block_info as $block){
																if($block->block_code == $secretary['block'])
																   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
																else
																   echo "<option value='".$block->block_code."'>".$block->name."</option>";
															 }
														?>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
											 </div>
											 <div class="row row-space" id="div4">
											 <div class="form-group col-md-4">						    
												<label for="inputAddress2">Gram Panchayat </label>
												<select id="panchayat" class="form-control sel_panchayat"  disabled id="panchayat" name="panchayat" >
													<option value="">Select Gram Panchayat </option>
													<?php foreach($panchayat_info as $panchayat){
															if($panchayat->panchayat_code == $secretary['panchayat'])
															   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
															else
															   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
														 }
													?>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
											   <div class="form-group col-md-4">                            
												<label for="inputAddress2">Village </label>
												<select id="village" class="form-control sel_village" disabled id="village"  name="village">
													<option value="">Select Village</option>
													<?php foreach($village_info as $village){
														if($village->id == $secretary['village'])
														   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
														else
														   echo "<option value='".$village->id."'>".$village->name."</option>";
													 }
													 ?>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
												  <div class="form-group col-md-4">
													<label for="inputAddress2">Street</label>
													<input type="text" class="form-control"  disabled maxlength="75"  id="street" name="street" value="<?php echo $secretary['street']; ?>" placeholder="Street" value="">
												</div>
											 </div>
											<div class="row row-space" id="div5">
												<div class="form-group col-md-4">
														<label for="inputAddress2">Door No</label>
														<input type="text" class="form-control" disabled maxlength="10"  id="door" name="door" value="<?php echo $secretary['door']; ?>" placeholder="Door No." value="">
													</div>
												  <div class="form-group col-md-4">
													<label for="">Mobile Number </label>
													<input type="text" class="form-control numberOnly" disabled maxlength="10" id="mobile" name="mobile" value="<?php echo $secretary['mobile']; ?>" pattern="^[6-9]\d{9}$" placeholder="Mobile Number" >
													<p class="help-block text-danger"></p>
												  </div>
												  <div class="form-group col-md-2">
													  <label for="">STD Code </label>
													<input type="text" class="form-control numberOnly" disabled title="STD Code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" value="<?php echo $secretary['std_code']; ?>" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012">
													 <p class="help-block text-danger"></p>
												  </div> 
												  <div class="form-group col-md-2">
													  <label for="">Landline Number </label>
													 <input type="text" class="form-control numberOnly"  disabled minlength="6"   maxlength="8" id="landline" name="landline"  value="<?php echo $secretary['landline']; ?>" placeholder="Landline Number">			
													 <p class="help-block text-danger"></p>
												  </div> 												  
											</div>
											<div class="row row-space " id="div6">
													<div class="form-group col-md-4">
													  <label for="">Email ID </label>
													 <input type="email" class="form-control" disabled maxlength="50" id="email" name="email" value="<?php echo $secretary['email']; ?>" placeholder="Email ID">
													 <p class="help-block text-danger"></p>
												  </div>
												  <div class="form-group col-md-4">
													<label for="">Date of Consent Letter </label>
													<input type="date" class="form-control"  disabled id="consent_date" name="consent_date" value="<?php echo $secretary['consent_date']; ?>" max="2050-12-31"  >
													<p class="help-block text-danger"></p>
												  </div>
												  <div class="form-group col-md-4">
													  <label for="">Date of Certificate  </label>
													 <input type="date" class="form-control"  disabled id="certificate_date" name="certificate_date" value="<?php echo $secretary['certificate_date']; ?>" max="2050-12-31"  >
													 <p class="help-block text-danger"></p>
												  </div>
												  <?php
													if(isset($secretary['consent_file'])) {
														?>
															<div class="form-group col-md-4" id="consent_letter">
																<label for="">Consent Letter </label>
																<div><a href="<?php echo base_url($secretary['consent_file']); ?>" target="_blank">Download</a></div>
															</div>
														<?php
													}
												  ?>
												  <?php
													if(isset($secretary['certificate_file'])) {
														?>
															<div class="form-group col-md-4" id="certificate">
																  <label for="">Certificate File </label>
																  <div><a href="<?php echo base_url($secretary['certificate_file']); ?>" target="_blank">Download</a></div>
															</div>
														<?php
													}
												  ?>
													<div class="form-group col-md-4" id="div7">
													  <label for="">Date of Appointment <span class="text-danger">*</span></label>
													 <input type="date" class="form-control" value="<?php echo $secretary['appointment_date']; ?>" disabled min="<?php echo date("Y-m-d"); ?>" max="2050-12-31" value="<?php echo date("Y-m-d"); ?>" id="appointment_date" name="appointment_date"  required="required" data-validation-required-message="Please select date of appointment.">
													 <p class="help-block text-danger"></p>
												  </div>
													<?php 
														if(isset($secretary['terminated_on'])) {
															?>
																<div class="form-group col-md-4">
																	<label for="">Date of Termination <span class="text-danger">*</span></label>
																	<input type="date" class="form-control" value="<?php echo $secretary['terminated_on']; ?>" disabled min="<?php echo date("Y-m-d"); ?>" max="2050-12-31" id="terminated_on" name="terminated_on" required="required" data-validation-required-message="Please enter date of termination.">
																	<p class="help-block text-danger"></p>
																</div>
																<?php
																	if(isset($secretary['reason'])) {
																		?>
																		<div class="form-group col-md-4">
																			<label for="">Reason for Termination </label>
																			<div><?php echo $secretary['reason']; ?></div>
																		</div>
																		<?php
																	}
														}
													?>	
											</div>
										</div>										
										<div class="col-md-12 text-center">
											<?php 
											if($secretary['status'] == 1) {
											?>
												<a href="<?php echo base_url('staff/operation/editcompany_secretary/'.$secretary['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Secretary<a>
											<?php
											}
											?>
											<a href="<?php echo base_url('staff/operation/company_secretarylist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
										</div>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
</body>
</html>