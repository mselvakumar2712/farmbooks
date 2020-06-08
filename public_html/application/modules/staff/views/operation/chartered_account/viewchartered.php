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
                        <h1>View Chartered Accountant</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewchartered/'.$accountant['id']);?>">View Chartered Accountant</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="#"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">Type of Appointment <span class="text-danger">*</span></label>
														  <select class="form-control" id="appointment_type" name="appointment_type" disabled required data-validation-required-message="Select appointment type">
															  <option value="">Select Appointment Type</option>
															  <option value="1" <?php if($accountant['appointment_type'] == 1) { echo 'selected="selected"'; } ?> >Statutory Audit</option>
															  <option value="2" <?php if($accountant['appointment_type'] == 2) { echo 'selected="selected"'; } ?> >Internal Audit</option>
															  <option value="3" <?php if($accountant['appointment_type'] == 3) { echo 'selected="selected"'; } ?> >Taxation</option>
															  <option value="4" <?php if($accountant['appointment_type'] == 4) { echo 'selected="selected"'; } ?> >Others</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Name of the Chartered Accountant <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="accountant_name" name="accountant_name" value="<?php echo $accountant['name']; ?>" disabled placeholder="Name of the Chartered Accountant" required="required" data-validation-required-message="Please enter chartered accountant name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4" >
														<label for="">Registration Number</label>
														<input type="text" class="form-control" maxlength="10" id="registration_num" name="registration_num" value="<?php echo $accountant['reg_number']; ?>" disabled placeholder="Registration Number">
													  </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="">Name of the Firm </label>
														<input type="text" class="form-control" maxlength="100" id="name_firm" name="name_firm" value="<?php echo $accountant['firm_name']; ?>" disabled placeholder="Name of the Firm " >
														<p class="help-block text-danger"></p>
													  </div>
													 <div class="form-group col-md-4">
														  <label for="">Firm Registration Number</label>
														 <input type="text" class="form-control" maxlength="10" id="firm_number" name="firm_number" value="<?php echo $accountant['firm_reg_number']; ?>" disabled placeholder="Firm Registration Number">
													  </div>
													   <div class="col-md-4 form-group">
															<label for="inputAddress2">PINCODE </label>
															<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" disabled maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" value="<?php echo $accountant['pincode']; ?>"  placeholder="PINCODE">
														</div>
												</div>
												<div class="row row-space  mt-4">
													 <div class="form-group col-md-4">
														<label for="inputAddress2">State </label>
														<select id="state" class="form-control sel_state" readonly name="state">
															<option value="">Select State </option>
															<option  value="<?php echo $accountant['state_code']?>" <?php if($accountant['state_code'] >0) { echo 'selected="selected"'; } ?> ><?php echo $accountant['state_name']?></option>
														</select>
													</div>	
													 <div class="form-group col-md-4">
														<label for="inputAddress2">District </label>
														<select id="district" class="form-control sel_district" readonly name="district" >
															<option value="">Select District </option>
															<option  value="<?php echo $accountant['district']?>" <?php if($accountant['district'] >0) { echo 'selected="selected"'; } ?> ><?php echo $accountant['district_name']?></option>
														</select>
													</div>
													    <div class="form-group col-md-4">
															<label for="inputAddress2">Taluk </label>
															<select class="form-control sel_taluk" name="taluk_id" disabled id="taluk_id" >
																<option value="">Select Taluk </option>
															<?php foreach($taluk_info as $taluk){
																	if($taluk->taluk_code == $accountant['taluk'])
																	   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
																	else
																	   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
																 }
															?>
															</select>
														</div>
												</div>
												<div class="row row-space  mt-4">
													 <div class="form-group col-md-4">
															<label for="inputAddress2">Block </label>
															<select id="block" class="form-control sel_block" disabled name="block">
																<option value="">Select Block </option>
															<?php foreach($block_info as $block){
																	if($block->block_code == $accountant['block'])
																	   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
																	else
																	   echo "<option value='".$block->block_code."'>".$block->name."</option>";
																 }
															?>
															</select>
														</div>
													<div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat </label>
														<select id="gram_panchayat" class="form-control sel_panchayat" disabled id="gram_panchayat" name="gram_panchayat">
															<option value="">Select Gram Panchayat </option>
														<?php foreach($panchayat_info as $panchayat){
																if($panchayat->panchayat_code == $accountant['panchayat'])
																   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
																else
																   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
															 }
														?>
														</select>
													</div>
													<div class="form-group col-md-4">                            
														<label for="inputAddress2">Village </label>
														<select id="village" class="form-control sel_village" id="village" disabled name="village">
															<option value="">Select Village</option>
														<?php foreach($village_info as $village){
															if($village->id == $accountant['village'])
															   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
															else
															   echo "<option value='".$village->id."'>".$village->name."</option>";
														 }
														 ?>
														</select>
													</div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control"  maxlength="75" disabled id="street_name" name="street_name" value="<?php echo $accountant['street']; ?>" placeholder="Street" >
													</div>
													<div class="form-group col-md-4">
															<label for="inputAddress2">Door No</label>
															<input type="text" class="form-control" maxlength="10" disabled id="door_no" name="door_no" value="<?php echo $accountant['door']; ?>" placeholder="Door No." >
														</div>
													 <div class="form-group col-md-4">
														<label for="">Mobile Number </label>
														<input type="text" class="form-control numberOnly" maxlength="10" disabled id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" value="<?php echo $accountant['mobile']; ?>" placeholder="Mobile Number" >
													  </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-2">
														  <label for="">Std Code </label>
														<input type="text" class="form-control numberOnly"  disabled title="Std code starts with '0'" pattern="^[0][0-9]{2,8}$" id="std_code" maxlength="8" minlength="3" name="std_code" value="<?php echo $accountant['std_code']; ?>" placeholder="Ex:012">
													  </div> 
													<div class="form-group col-md-2">
														  <label for="">Landline Number </label>
														 <input type="text" class="form-control numberOnly"  minlength="6"  disabled maxlength="8" id="landline_num" name="landline_num"  value="<?php echo $accountant['landline']; ?>" placeholder="Landline Number">			
													  </div> 
													 <div class="form-group col-md-4">
														  <label for="">Email ID </label>
														 <input type="email" class="form-control" maxlength="50" disabled id="email_address" name="email_address" value="<?php echo $accountant['email']; ?>" placeholder="Email ID">
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Date of Consent Letter </label>
														<input type="date" class="form-control"  id="date_of_consent" disabled name="date_of_consent" value="<?php echo $accountant['consent_date']; ?>">
													  </div>
												</div>
												<div class="row row-space  mt-4">
													   <div class="form-group col-md-4">
														  <label for="">Date of Certificate  </label>
														 <input type="date" class="form-control"  id="date_of_certificate" disabled name="date_of_certificate" value="<?php echo $accountant['certificate_date']; ?>">
													  </div> 
													  <?php
														if(isset($accountant['consent_file'])) {
															?>
																<div class="form-group col-md-4" id="consent_letter">
																	<label for="">Consent Letter </label>
																	<div><a href="<?php echo base_url($accountant['consent_file']); ?>" target="_blank">Download</a></div>
																</div>
															<?php
														}
													  ?>
													  <?php
														if(isset($accountant['certificate_file'])) {
															?>
																<div class="form-group col-md-4" id="certificate">
																	  <label for="">Certificate File </label>
																	  <div><a href="<?php echo base_url($accountant['certificate_file']); ?>" target="_blank">Download</a></div>
																</div>
															<?php
														}
													  ?>
													   <div class="form-group col-md-4" id="div7">
														  <label for="">Date of Appointment <span class="text-danger">*</span></label>
														 <input type="date" class="form-control"  id="date_of_appoinment" name="date_of_appoinment" value="<?php echo $accountant['appointment_date']; ?>" disabled required="required" data-validation-required-message="Please select date of appoinment.">
													  </div>
													   <div class="form-group col-md-4" id="years_appoinment" <?php if($accountant['tenure_year'] == 0) { echo 'style="display:none;"'; } ?> >
														  <label for="">No. of Years of Appointment <span class="text-danger">*</span></label>
														  <select class="form-control" id="tenure_year" name="tenure_year" disabled required data-validation-required-message="Select no of years of appointment">
															  <option value="">Select No. of Years of Appoinment</option>
															  <option value="1" <?php if($accountant['tenure_year'] == 1) { echo 'selected="selected"'; } ?> >1</option>
															  <option value="2" <?php if($accountant['tenure_year'] == 2) { echo 'selected="selected"'; } ?> >2</option>
															  <option value="3" <?php if($accountant['tenure_year'] == 3) { echo 'selected="selected"'; } ?> >3</option>
															  <option value="4" <?php if($accountant['tenure_year'] == 4) { echo 'selected="selected"'; } ?> >4</option>
															  <option value="5" <?php if($accountant['tenure_year'] == 5) { echo 'selected="selected"'; } ?> >5</option>
														  </select>
													  </div>
													  <?php 
														if(isset($accountant['terminated_on'])) {
															?>
															  <div class="form-group col-md-4">
																<label for="">Date of Termination </label>
																<input type="date" class="form-control"  id="date_of_termination" value="<?php echo $accountant['terminated_on']; ?>" disabled name="date_of_termination" max="2050-12-31">
															  </div>
															  <?php
																	if(isset($accountant['reason'])) {
																		?>
																		  <div class="form-group col-md-4">
																			<label for="inputAddress2">Reason for Termination</label>
																			<div><?php echo $accountant['reason']; ?></div>
																		  </div>
																		  <?php
																	}
														}
													?>	
												</div>
										</div>										
										<div class="col-md-12 text-center">
											<?php 
												if($accountant['status'] == 1) {
												?>
													<a href="<?php echo base_url('staff/operation/editchartered/'.$accountant['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Accountant<a>
												<?php
												}
											?>
											<a href="<?php echo base_url('staff/operation/charteredlist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
</body>
</html>