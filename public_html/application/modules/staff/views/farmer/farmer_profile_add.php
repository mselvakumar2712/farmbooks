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

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Farmer Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('staff/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">Add Farmer Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
				            <div class="container">
							<br />
							<form action="#" id="farmer_profileForm" name="farmer_profileForm" method="post" enctype="multipart/form-data">

        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a style="width:80px;"href="#step-1">Step <br>1<br /><small style="font-size:20px;"><label>Basic Profile</label></small></a></li>
                <li><a style="width:80px;"href="#step-2" id="step2">Step<br>2<br/><small style="font-size:20px;"><label>Land Details</label></small></a></li>
                <li><a style="width:80px;" href="#step-3">Step<br /> 3<br /><small style="font-size:20px;"><label>Farm Implements</label></small></a></li>
                <li><a style="width:80px;"href="#step-4">Step<br/>4<br/><small style="font-size:20px;"><label>Live Stocks</label></small></a></li>
            </ul>
            <div>
                
              		<div id="step-1">
							<div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6 mt-2">
									<label for="">Name of the Farmer <span class="text-danger">*</span></label>
									<input type="text" class="form-control" maxlength="100" id="farmer_profile_name" name="farmer_profile_name" placeholder="Name of The Farmer" required>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6 mt-2">
									<label for="">Alias Name</label>
									<input type="text" class="form-control" maxlength="100" id="farmer_alias_name" name="farmer_alias_name" placeholder="Alias Name">
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6">
									<label for="inputAddress2">Father Name/Spouse Name <span class="text-danger">*</span></label>
									<input type="text" class="form-control" id="farmer_father_spouse_name" name="farmer_father_spouse_name" maxlength="100" placeholder="Father Name/Spouse Name" required>						
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Number of Dependents</label>
									<select id="farmer_number_dependents" name="farmer_number_dependents" class="form-control" >
									<option value="">Select Number of Dependents</option>
                                    <?php for($i=1;$i<=14;$i++) { ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
									</select>							
								</div>
								</div>								
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" onkeyup="getfarmerPincode(this.value)" minlength="6" maxlength="6" pattern="[1-9][0-9]{5}" maxlength="6" id="farmer_pin_code" name="farmer_pin_code" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
									<div class="help-block with-errors text-danger"></div>								
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">State <span class="text-danger">*</span></label>
									<select  class="form-control" id="farmer_state" name="farmer_state" readonly placeholder="State" required>
										<option value="">Select State</option>
									</select>
									<div class="help-block with-errors text-danger"></div> 
								</div>
                                <div class="form-group col-md-4">
									<label for="inputAddress2">District <span class="text-danger">*</span></label>
									<select  class="form-control" id="farmer_district" name="farmer_district" readonly placeholder="District" required>
										<option value="">Select District</option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">	
                                <div class="form-group col-md-4">
									<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
									<select class="form-control" id="farmer_taluk" name="farmer_taluk" placeholder="Taluk" required>
										<option value="">Select Taluk</option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Block <span class="text-danger">*</span></label>
									<select class="form-control" id="farmer_block" name="farmer_block" placeholder="Block" required>
										<option value="">Select Block</option>
									</select> 
									 <div class="help-block with-errors text-danger"></div>
								</div>								
								<div class="form-group col-md-4">						    
									<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
									<select class="form-control" id="farmer_gram_panchayat" name="farmer_gram_panchayat" required="required" data-validation-required-message="Select gram panchayat">
								        <option value="">Select Gram Panchayat</option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">								
								<div class="form-group col-md-4">
									<label for="inputAddress2">Village </label>
									<select  class="form-control" id="farmer_village" name="farmer_village">
                                    <option value="">Select Village</option>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label for="inputAddress2">Door No </label>
									<input type="text" class="form-control" maxlength="10" id="farmer_door_no" name="farmer_door_no" placeholder="Door No">
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Street</label>
									<input type="text" class="form-control" maxlength="75" id="farmer_street" name="farmer_street" placeholder="Street">
								</div>
								</div>
                        <div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Mobile Number / Farmer Code <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" name="farmer_mobile_num" onfocusout="verifyMobileNumber(this.value)" pattern="^[6-9]\d{9}$" id="farmer_mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
									<div id="mbl_validate" class="help-block with-errors text-danger"></div>
								</div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>
                            <div class="form-check">
                                <label for="farmerNoMobile"><input class="form-check-input" type="checkbox" id="farmerNoMobile" value="1" name="farmerNoMobile" disabled> Mobile Number Not Available? </label>
                            </div>
                        </div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">AADHAAR Number</label>
									<input type="text" class="form-control numberOnly" minlength="12" maxlength="14" name="farmer_aadhaar_num" id="farmer_aadhaar_num" placeholder="AADHAAR Number">
									 <div class="help-block with-errors text-danger" id="adhaar-err"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">	
								<div class="form-group col-md-3">
									<label for="inputAddress2">Date of Birth <span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="farmer_dob" name="farmer_dob" placeholder="Date of Birth" required="required" data-validation-required-message="Please enter date of birth." max="2050-12-31">
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-3">
									<label for="inputAddress2">Age <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" maxlength="3" id="farmer_age" name="farmer_age" placeholder="Age" required>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Income Category </label>
									<select id="farmer_income_category" name="farmer_income_category" class="form-control" >
									<option value="">Select Income Category</option>
									<option value="1" selected>Above Poverty Line (APL)</option>
									<option value="2">Below Poverty Line (BPL)</option>
									</select>							
								</div>
								</div>
							    <div class="form-group col-md-12 mt-1">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-6 mt-5">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="farmer_ispromotor" value="1" name="farmer_ispromotor">
                                              <label class="form-check-label" for="gridCheck">
                                                Is Promoter 
                                              </label>
                                              <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mt-5">
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" id="farmer_istrader" value="1" name="farmer_istrader">
                                              <label class="form-check-label" for="gridCheck">
                                                Willing to be a Trader? 
                                              </label>
                                              <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>
                                    </div>		
                                    <!--<div class="form-group col-md-6 " id="filediv">
                                        <label for="inputAddress2">Photo</label>
                                        <input class="form-control" type="file" id="farmer_photo" name="farmer_photo" accept="image/jpeg,image/png,image/jpg" placeholder="Photo *">				
                                    </div>-->																			
								</div>
							</div>
                            </div>
                
                
							<div id="step-2" >
							 <div id="form-step-1" role="form" data-toggle="validator">
								  <div class="form-group col-md-12 mt-2">
									<div class="col-md-3">&nbsp;</div>
									<div class="form-group col-md-6">
									  <label for="landholdings">Land Holdings</label>
									  <select id="landholdings" class="form-control" id="farmer_land_holdings" name="farmer_land_holdings" required data-validation-required-message="Please select land holdings.">
										<option value="1">Yes</option>
										<option value="2" selected>No</option>
									  </select>								  
									</div>
									<div class="help-block with-errors text-danger"></div>
									<div class="col-md-3">&nbsp;</div>
								  </div>
                                    
								<div class="form-group col-md-12 mt-4" id="land_holdings1" style="display: none;">
                                    <hr style="border-bottom:1px solid black;">
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Land Ownership <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="land_ownership" name="land_ownership" value="1" class="form-check-input"><span class="ml-1">Own</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="land_ownership" name="land_ownership" value="2" class="form-check-input"><span class="ml-1">Lease</span>
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
                                      
                                      <div class="form-group col-md-4" id="landowner" style="display:none">
										<label for="inputAddress2">Name of the Land Owner <span class="text-danger">*</span></label>
										<input type="text" class="form-control" maxlength="50" name="land_owner"  id="land_owner" placeholder="Name of the Land Owner">
                                          <div class="help-block with-errors text-danger"></div>
									  </div>
                                      
                                      <div class="form-group col-md-4 mt-2">
										  <label class=" form-control-label">Type of Land <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="land_type" name="land_type" value="1" class="form-check-input"><span class="ml-1">Wet</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" name="land_type" id="land_type"  value="2" class="form-check-input"><span class="ml-1">Dry</span>
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="land_type" name="land_type" value="3" class="form-check-input"><span class="ml-1">Both</span>
												</label>
											   </div>
											</div>											
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>				 
									</div>
                                    										
								<div id="date_of_lease" style="display:none">
										<div class="form-group col-md-12 mt-2">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Number of Years of Lease <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly" name="land_year_lease" id="land_year_lease" maxlength="3" placeholder="Number of Years of Lease">
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">Date of Lease <span class="text-danger">*</span></label>
												<input type="date" class="form-control" name="land_date_lease"  id="land_date_lease" placeholder="Date of Lease" max="2050-12-31">
											</div>
										</div>
									</div>
                                 
                                <div class="form-group col-md-12 mt-1 mb-0" id="Land_Identify_head" style="display: none;">
                                    <div class="form-group col-md-6">
                                        <label>Land Identification <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group col-md-5">
                                            <label>Land Measurement </label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Land Measurement Unit <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-group col-md-1" id="">
                                        </div>
                                    </div>                                            
								 </div>
                                 
                                <div class="form-group col-md-12 mt-1 mb-0" id="bothLand_Identify_head" style="display: none;">
                                    <div class="form-group col-md-3">
                                        <label>Land Identification <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Land Measurement </label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Land Measurement Unit <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Land Type <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="form-group col-md-1" id="">
                                    </div>
								 </div> 
                                 
								<div id="div3" style="display:none;">                                   
                                    
						           <div class="form-group col-md-12 mb-0" id="land_holdings2_0">					              <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="wet_land_identification[]"  id="land_identification" maxlength="50" placeholder="Land Identification ">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control numberOnly" maxlength="3" id="wetland_land_measurement" name="wetland_land_measurement[]" placeholder="Measurement">						
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="wetland_land_measurement_unit" name="wetland_land_measurement_unit[]">
                                                <option value="">Select Measurement Unit</option>
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-1" title="Delete this entire row by click" id="removeCreatedElement">
                                                <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeWetLandMeasure(this)"></i>
                                            </div>
                                        </div>                                            
								    </div>
                                    
                                    <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreWetLandIdentify();" style="background-color: #afd66b;color: black;">Add More</button>
                                    </div>
                                    
									<div class="form-group col-md-12 mt-4">
									<div class="form-group col-md-6">
										<label for="inputAddress2">Survey Number</label>
										<input type="text" class="form-control text-uppercase" id="wetland_survey_number" name="wetland_survey_number" maxlength="50" placeholder="Survey Number">	
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Source of Irrigation</label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" maxlength="20" value="1" class="form-check-input wetland_source_irrigation1">Well
												</label>
											  </div> 
											</div>

											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" value="2" class="form-check-input wetland_source_irrigation">Canal
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" value="3" class="form-check-input wetland_source_irrigation3">Tube-well
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" value="4" class="form-check-input wetland_source_irrigation">Rainfed
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" value="5" class="form-check-input wetland_source_irrigation">River
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" value="6" class="form-check-input wetland_source_irrigation">Tanks
												</label>
											   </div>
											</div>												 
										  </div>
										  <!--<div class="help-block with-errors text-danger"></div> -->
									  </div>
									  
									 </div>
                                    
									<div class="form-group col-md-12">
									<div class="form-group col-md-6" id="number_wells" style="display:none">
										<label for="inputAddress2">Number of Wells </label>
										<input type="text" class="form-control numberOnly" maxlength="1" id="wetland_number_wells" name="wetland_number_wells" placeholder="Number of Wells" >
									</div>
									<div class="form-group col-md-6" id="number_tube_wells" style="display:none">
										<label for="inputAddress2">Number of Tube-wells </label>
										<input type="text" class="form-control numberOnly" maxlength="1" id="wetland_number_tubewells" name="wetland_number_tubewells" placeholder="Number of Tube-wells">
									</div>
									</div>
                                    
									<div class="form-group col-md-12">									
									<div class="form-group col-md-4" id="wet_method_irrigation" style="">
										  <label class=" form-control-label">Method of Irrigation </label>
										  <div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="2" class="form-check-input"> Drip Irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="3" class="form-check-input"> Micro Irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="4" class="form-check-input">Sprinkler Irrigation
												</label>
											   </div>
											</div>							
										  </div>
									  </div>
									  <div class="form-group col-md-4" id="wet_subsidy_avail" style="display:none">
										<label for="inputAddress2">Subsidy Availed</label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
                                    <div class="form-group col-md-4" style="display:none;" id="wet_year_subsidy_claim">
										<label for="inputAddress2">Year of Subsidy Claimed</label>
								        <select id="wetland_year_subsidy_Claimed" name="wetland_year_subsidy_Claimed" class="form-control">
                                            <option value="">Select Subsidy Claimed Year</option>
                                            <?php for($i = 0; $i <= 10; $i++) { ?>
                                                <option value="<?php echo  date("Y",strtotime("-".$i." year"));?>"><?php echo date("Y",strtotime("-".$i." year"));?></option>
                                            <?php } ?>  
                                        </select>				
									</div>	
									</div>
                                    
									<div class="form-group col-md-12">
									   <div class="form-group col-md-4">
										  <label class=" form-control-label">Farm Pond</label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									    </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group col-md-12" id="wet_farm_subsidy_availed" style="display:none">
                                              <label class=" form-control-label">Subsidy Availed </label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio"  id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                          </div>
                                        <div class="form-group col-md-12" id="wet_farm_construct_farm" style="display:none">
                                              <label class="form-control-label">Interested to construct Farm Pond  </label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                          </div>
                                        </div>
									
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Address Same as Farmer’s address <span class="text-danger">*</span> </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address" value="1" class="form-check-input"><span class="ml-1">Yes</span>												 
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>									
									</div>									
																							   
									<div id="wet_farm_address" style="display:none">
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-4">
										<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
										<input type="text" onkeyup="getwetPincode(this.value)" class="form-control numberOnly" id="wetland_pincode" pattern="[1-9][0-9]{5}" name="wetland_pincode" minlength="6" maxlength="6" placeholder="PIN Code" >						
										 <div class="help-block with-errors text-danger"></div>
									</div>	
									<div class="form-group col-md-4">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_state" name="wetland_state" readonly >
											<option value="">Select State </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">District <span class="text-danger">*</span> </label>
										<select  class="form-control" id="wetland_district" name="wetland_district" readonly>
											<option value="">Select District </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_taluk" name="wetland_taluk">
											<option value="">Select Taluk </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_block" name="wetland_block">
											<option value="">Select Block </option>
										</select> 
										 <div class="help-block with-errors text-danger"></div>
									</div>																		
									<div class="form-group col-md-4">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
										<select id="wetland_gram_panchayat" name="wetland_gram_panchayat" id="wetland_gram_panchayat" class="form-control">
										<option value="">Select Gram Panchayat </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>								
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-4">
										<label for="inputAddress2">Village </label>
										<select id="wetland_village" name="wetland_village" class="form-control" >
										 <option value="">Select Village </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street </label>
										<input type="text" id="wetland_street" name="wetland_street" class="form-control" maxlength="75" id="street" placeholder="Street">	
									</div>									
									<div class="form-group col-md-2">
										<label for="inputAddress2">Door No </label>
										<input type="text" class="form-control" name="wetland_door_no" maxlength="10" id="wetland_door_no" placeholder="Door No">
									</div>
									</div>
								  </div>
								</div>
                                    
								<div id="div4" style="display:none;">
								    <div class="form-group col-md-12" id="dryland_holdings2_0">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="dry_land_identification[]"  id="dry_land_identification" maxlength="50" placeholder="Land Identification">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-5">
                                                <input type="text" class="form-control numberOnly" maxlength="3" id="dryland_land_measurement" name="dryland_land_measurement[]" placeholder="Measurement">					
                                            </div>
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="dryland_land_measurement_unit" name="dryland_land_measurement_unit[]">
                                                <option value="">Select Measurement</option>
                                                </select>
                                                 <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-1" title="Delete this entire row by click" id="removeCreatedElement">
                                                <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeDryLandMeasure(this)"></i>
                                            </div>
                                        </div>
									</div>
                                    
                                    <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreDryLandIdentify();" style="background-color: #afd66b;color: black;">Add More</button>
                                    </div>
                                    
									<div class="form-group col-md-12 mt-4">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Survey Number</label>
										<input type="text" class="form-control text-uppercase" id="dryland_survey_number" name="dryland_survey_number" maxlength="50" placeholder="Survey Number">	
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Source of Irrigation </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation1" name="dryland_source_irrigation[]" value="1" class="form-check-input dryland_source_irrigation">Well
												</label>
											  </div> 
											</div>

											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation" name="dryland_source_irrigation[]" value="2" class="form-check-input dryland_source_irrigation">Canal
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation3" name="dryland_source_irrigation[]" value="3" class="form-check-input dryland_source_irrigation">Tube-well
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation" name="dryland_source_irrigation[]" value="4" class="form-check-input dryland_source_irrigation">Rainfed
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation" name="dryland_source_irrigation[]" value="5" class="form-check-input dryland_source_irrigation">River
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation" name="dryland_source_irrigation[]" value="6" class="form-check-input dryland_source_irrigation">Tanks
												</label>
											   </div>
											</div>
										  </div>
										 <div class="help-block with-errors text-danger"></div>
									  </div>
									</div>
                                    
									<div class="form-group col-md-12">	
                                        <div class="form-group col-md-6" id="dry_number_wells" style="display:none">
                                            <label for="inputAddress2">Number of Wells</label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="dryland_number_wells" name="dryland_number_wells" placeholder="Number of wells" >
                                        </div>
                                        <div class="form-group col-md-6" id="dry_tube_wells" style="display:none">
                                            <label for="inputAddress2">Number of Tube-wells  </label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="dryland_number_tubewells" name="dryland_number_tubewells" placeholder="Number of tube-wells" >
                                        </div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">										
									<div class="form-group col-md-4" id="dry_method_irrigation" style="">
										  <label class=" form-control-label">Method of Irrigation </label>
										  <div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="2" class="form-check-input"> Drip Irrigation
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="3" class="form-check-input"> Micro Irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="4" class="form-check-input">Sprinkler Irrigation										
												</label>
											   </div>
											</div>							
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									<div class="form-group col-md-4" id="dry_subsidy_avail" style="display:none">
										<label for="inputAddress2">Subsidy Availed</label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_subsidy_availed" name="dryland_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="dryland_subsidy_availed" name="dryland_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
                                    <div class="form-group col-md-4" id="dry_year_subsidy_claim" style="display:none">
								        <label for="inputAddress2">Year of Subsidy Claimed</label>
                                        <select id="dryland_year_subsidy_claimed" name="dryland_year_subsidy_claimed" class="form-control">
                                            <option value="">Select Subsidy Claimed Year</option>
                                            <?php for($i = 0; $i <= 10; $i++) { ?>
                                                <option value="<?php echo  date("Y",strtotime("-".$i." year"));?>"><?php echo date("Y",strtotime("-".$i." year"));?></option>
                                            <?php } ?>  
                                        </select>				
									</div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Farm Pond </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_farm_pond" name="dryland_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_farm_pond" name="dryland_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
                                      <div class="form-group col-md-4">
                                          <div class="form-group col-md-12" id="dry_farm_subsidy_availed" style="display:none">
                                              <label class=" form-control-label">Subsidy Availed </label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="dryland_farm_subsidy_availed" name="dryland_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="dryland_farm_subsidy_availed" name="dryland_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                          </div>
                                          
                                          <div class="form-group col-md-12" id="dry_farm_construct_farm" style="display:none">
										  <label class="form-control-label">Interested to construct Farm Pond  </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_construct_form_pond" name="dryland_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_construct_form_pond" name="dryland_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
                                      </div>
									  <div class="form-group col-md-4">
										  <label class=" form-control-label">Address Same as Farmer’s address <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_farmer_address" name="dryland_farmer_address" value="1" class="form-check-input">Yes
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_farmer_address" name="dryland_farmer_address" value="2" class="form-check-input">No
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									 </div>									
	
									<div id="dry_farm_address" style="display:none;">
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-4">
										<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" id="dryland_pincode" pattern="[1-9][0-9]{5}" name="dryland_pincode" minlength="6" maxlength="6" placeholder="PINCODE" >						
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select class="form-control" id="dryland_state" name="dryland_state" readonly >
											<option value="">Select State </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">District <span class="text-danger">*</span></label>
										<select class="form-control" id="dryland_district" name="dryland_district" readonly>
											<option value="">Select District</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select class="form-control" id="dryland_taluk" name="dryland_taluk">
											<option value="">Select Taluk</option>
										</select> 
										<div class="help-block with-errors text-danger"></div>
									</div>		
									<div class="form-group col-md-4">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
											<select  class="form-control" id="dryland_block" name="dryland_block">
											<option value="">Select Block</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>																					
									<div class="form-group col-md-4">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
										<select id="dryland_gram_panchayat" name="dryland_gram_panchayat" class="form-control">
											<option value="">Select Gram Panchayat</option>				
										</select>		
										 <div class="help-block with-errors text-danger"></div>								
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-4">
										<label for="inputAddress2">Village </label>
										<select id="dryland_village" name="dryland_village" class="form-control">
										<option value="">Select Village </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>						
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street</label>
										<input type="text" id="dryland_street" name="dryland_street" class="form-control" maxlength="75" id="street" placeholder="Street">	
									</div>
									<div class="form-group col-md-2">
										<label for="inputAddress2">Door No </label>
										<input type="text" class="form-control" name="dryland_door_no" maxlength="10" id="dryland_door_no" placeholder="Door No">
									</div>
									</div>
							    </div>
							</div>
                                 
                                <div id="div5" style="display:none;">
								    <div class="form-group col-md-12" id="bothland_holdings_0">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" name="both_land_identification[]"  id="both_land_identification" maxlength="50" placeholder="Land Identification">
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control numberOnly" maxlength="3" id="both_land_measurement" name="both_land_measurement[]" placeholder="Measurement">					
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" id="both_land_measurement_unit" name="both_land_measurement_unit[]">
                                                <option value="">Select Measurement</option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" id="identity_type" name="identity_type[]">
                                                <option value="">Select Land Type</option>
                                                <option value="1">Wet Land</option>
                                                <option value="2">Dry Land</option>
                                            </select>                      
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label title="Delete this entire row by click" id="removeBothCreatedElement" class="" style="float: right;">
                                                <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeBothLandMeasure(this);" style="padding: 5px 7px 5px 7px;"></i>
                                            </label>
                                        </div>      
									</div>
                                    
                                    <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreBothLandIdentify();" style="background-color: #afd66b;color: black;">Add More</button>
                                    </div>
                                    
									<div class="form-group col-md-12 mt-4">	
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Survey Number</label>
                                            <input type="text" class="form-control text-uppercase" id="both_survey_number" name="both_survey_number" maxlength="50" placeholder="Survey Number">
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Source of Irrigation </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation1" name="both_source_irrigation[]" value="1" class="form-check-input both_source_irrigation">Well
                                                    </label>
                                                  </div> 
                                                </div>

                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="2" class="form-check-input both_source_irrigation">Canal
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation3" name="both_source_irrigation[]" value="3" class="form-check-input both_source_irrigation">Tube-well
                                                    </label>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="4" class="form-check-input both_source_irrigation">Rainfed
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="5" class="form-check-input both_source_irrigation">River
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="6" class="form-check-input both_source_irrigation">Tanks
                                                    </label>
                                                   </div>
                                                </div>							
                                              </div>
                                             <div class="help-block with-errors text-danger"></div>
                                          </div>
                                    </div>
                                    
									<div class="form-group col-md-12">	
                                        <div class="form-group col-md-6" id="bothland_number_wells" style="display:none">
                                            <label for="inputAddress2">Number of Wells</label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="both_number_wells" name="both_number_wells" placeholder="Number of wells" >
                                        </div>
                                        <div class="form-group col-md-6" id="bothland_tube_wells" style="display:none">
                                            <label for="inputAddress2">Number of Tube-wells  </label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="both_number_tubewells" name="both_number_tubewells" placeholder="Number of tube-wells" >
                                        </div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">										
									<div class="form-group col-md-4" id="both_method_irrigation" style="">
										  <label class=" form-control-label">Method of Irrigation</label>
										  <div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="2" class="form-check-input"> Drip Irrigation
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="3" class="form-check-input"> Micro Irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="4" class="form-check-input">Sprinkler Irrigation										
												</label>
											   </div>
											</div>							
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									<div class="form-group col-md-4" id="bothland_subsidy_avail" style="display:none">
										<label for="inputAddress2">Subsidy Availed</label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_subsidy_availed" name="both_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="both_subsidy_availed" name="both_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
                                    <div class="form-group col-md-4" id="bothland_year_subsidy_claim" style="display:none">
								        <label for="inputAddress2">Year of Subsidy Claimed</label>
										<select id="both_year_subsidy_claimed" name="both_year_subsidy_claimed" class="form-control">
                                            <option value="">Select Subsidy Claimed Year</option>
                                            <?php for($i = 0; $i <= 10; $i++) { ?>
                                                <option value="<?php echo  date("Y",strtotime("-".$i." year"));?>"><?php echo date("Y",strtotime("-".$i." year"));?></option>
                                            <?php } ?>  
                                        </select>			
									</div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Farm Pond </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_farm_pond" name="both_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_farm_pond" name="both_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
                                      <div class="form-group col-md-4">
                                          <div class="form-group col-md-12" id="bothland_farm_subsidy_availed" style="display:none">
                                              <label class=" form-control-label">Subsidy Availed </label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="both_farm_subsidy_availed" name="both_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="both_farm_subsidy_availed" name="both_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                          </div>
                                          
                                          <div class="form-group col-md-12" id="bothland_farm_construct_farm" style="display:none">
										  <label class="form-control-label">Interested to construct Farm Pond </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_construct_form_pond" name="both_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_construct_form_pond" name="both_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
                                      </div>
									  <div class="form-group col-md-4">
										  <label class=" form-control-label">Address Same as Farmer’s address <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_farmer_address" name="both_farmer_address" value="1" class="form-check-input">Yes
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_farmer_address" name="both_farmer_address" value="2" class="form-check-input">No
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									 </div>									
	
									<div id="both_farm_address" style="display:none;">
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-4">
										<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" onkeyup="getBothLandPincode(this.value)" id="both_pincode" pattern="[1-9][0-9]{5}" name="both_pincode" minlength="6" maxlength="6" placeholder="PINCODE">					
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select class="form-control" id="both_state" name="both_state" readonly>
											<option value="">Select State</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">District <span class="text-danger">*</span></label>
										<select class="form-control" id="both_district" name="both_district" readonly>
											<option value="">Select District</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select class="form-control" id="both_taluk" name="both_taluk">
											<option value="">Select Taluk</option>
										</select> 
										<div class="help-block with-errors text-danger"></div>
									</div>	
									<div class="form-group col-md-4">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
											<select class="form-control" id="both_block" name="both_block">
											<option value="">Select Block</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>																					
									<div class="form-group col-md-4">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
										<select id="both_gram_panchayat" name="both_gram_panchayat" class="form-control" >
											<option value="">Select Gram Panchayat</option>					
                                        </select>		
								        <div class="help-block with-errors text-danger"></div>						
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-4">
										<label for="inputAddress2">Village </label>
										<select id="both_village" name="both_village" class="form-control">
										<option value="">Select Village</option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>						
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street</label>
										<input type="text" id="both_street" name="both_street"  maxlength="75" class="form-control" maxlength="75" id="street" placeholder="Street">	
									</div>
									<div class="form-group col-md-2">
										<label for="inputAddress2">Door No</label>
										<input type="text" class="form-control" name="both_door_no" maxlength="10" id="both_door_no" placeholder="Door No">
									</div>
									</div>
							    </div>

                                    <!--
                                    <div class="form-group col-md-12">
                                        <hr style="border-bottom:1px solid black;">     
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Organic Farmer</label>
                                            <select id="both_organic_former" name="both_organic_former" class="form-control">
                                            <option value="">Select Organic Farmer</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                            <option value="3">Both</option>								
                                            </select>
                                        </div>                                        
                                    </div>	
                                    
								    <div id="organic_farm_details" style="display:none;">
								                              
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6" id="land_identify" style="display:none">
                                            <label class=" form-control-label">Land Identification</label>
                                            <select id="both__identification" name="both__identification" class="form-control">
                                                <option value="">Select Land Identification</option>
                                                <option value="1">1</option>										
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area</label>
                                              <input type="text" class="form-control numberOnly" maxlength="3" minlength="3" id="both_organic_cultivation_area" name="both_organic_cultivation_area" placeholder="Cultivation Area">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area UOM</label>
                                              <select id="both_cultivation_area_uom" name="both_cultivation_area_uom" class="form-control" data-validation-required-message="Please select area uom">
                                                  <option value="">Select Area UOM</option>
                                              </select>                                             
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Organic Farming with Certification  </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="both_organic_certifiation" name="both_organic_certifiation" value="1" class="form-check-input"  data-validation-required-message="Please select land ownership."><span class="ml-1">Yes</span>
                                                       <div class="help-block with-errors text-danger"></div>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" checked id="both_organic_certifiation" name="both_organic_certifiation" value="2" class="form-check-input"  data-validation-required-message="Please select land ownership."><span class="ml-1">No</span>
                                                       <div class="help-block with-errors text-danger"></div>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                        </div>
                                    </div>

                                    <div id="organic_with_certification" style="display:none;">
									<div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Certification Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control numberOnly" maxlength="10" id="both_certifiation" name="both_certifiation" placeholder="Certification Number">
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>												
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Certification Agency Name <span class="text-danger">*</span></label>
                                             <input type="text" class="form-control" maxlength="100" id="both_certifiation_agency_name" name="both_certifiation_agency_name" placeholder="Certification Agency Name">
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Initial Date of Certification <span class="text-danger">*</span></label>
                                             <input type="date" class="form-control" id="both_intial_date_certifiation" name="both_intial_date_certifiation" placeholder="Initial date of certification" max="2050-12-31" >
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>	
                                        <div class="form-group col-md-4">
                                            <label class="form-control-label">Effective Period of Certification From</label>
                                           <input type="date" class="form-control" id="both_effective_period_certifiation_from" name="both_effective_period_certifiation_from" placeholder="Effective period of certification From" >
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-control-label">Effective Period of Certification To</label>
                                           <input type="date" class="form-control" id="both_effective_period_certifiation_to" name="both_effective_period_certifiation_to" placeholder="Effective period of certification To" >
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">								     		
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Accreditation Type <span class="text-danger">*</span></label>
                                                <select id="both_accreditation_type" name="both_accreditation_type" class="form-control"  data-validation-required-message="Please select accreditation type.">
                                                <option value="">Select Accreditation Type</option>
                                                <option value="1">NPOP</option>
                                                <option value="2">NOP</option>
                                                <option value="3">Others</option>								
                                                </select>
                                                 <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Certified Products</label>
                                                <select id="both_certified_products" name="both_certified_products"  class="form-control">
                                                <option value="">Select Products</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Jurisdiction <span class="text-danger">*</span></label>
                                                <select id="both_jurisdiction" name="both_jurisdiction"  class="form-control">
                                                <option value="">Select Jurisdiction</option>
                                                <option value="1">India</option>
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                    </div>
								
				                    </div>
				                </div>		-->																						
							</div>
                                    

                            <div class="organic_details" id="organic_details" style="display:none;">
                                <div class="form-group col-md-12">
                                    <hr style="border-bottom:1px solid black;">     
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Organic Farmer</label>
                                        <select id="organic_former" name="organic_former" class="form-control">
                                            <option value="">Select Farmer Type</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                            <option value="3">Both</option>								
                                        </select>
                                    </div>                                        
                                </div>	
                                    
								<div id="organic_farm_details" style="display:none;">								                              
                                    <!--<div class="form-group col-md-12">
                                        <div class="form-group col-md-6" id="land_identify" style="display:none">
                                            <label class="form-control-label">Land Identification</label>
                                            <input type="text" class="form-control" id="both__identification" name="both__identification" maxlength="50" placeholder="Land Identification">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area</label>
                                              <input type="text" class="form-control numberOnly" maxlength="3" id="organic_cultivation_area" name="organic_cultivation_area" placeholder="Cultivation Area">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area UOM</label>
                                              <select id="cultivation_area_uom" name="cultivation_area_uom" class="form-control" data-validation-required-message="Select area uom">
                                                  <option value="">Select Area UOM</option>
                                              </select>                                             
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Organic Farming with Certification </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="organic_certifiation" name="organic_certifiation" value="1" class="form-check-input" data-validation-required-message="Select certification mode"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" checked id="organic_certifiation" name="organic_certifiation" value="2" class="form-check-input" data-validation-required-message="Please select land ownership."><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>

                                    <div id="organic_with_certification" style="display:none;">
                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Certification Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" maxlength="10" id="certifiation" name="certifiation" placeholder="Certification Number">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>												
                                            <div class="form-group col-md-6">
                                                <label class=" form-control-label">Certification Agency Name <span class="text-danger">*</span></label>
                                                 <input type="text" class="form-control" maxlength="100" id="certifiation_agency_name" name="certifiation_agency_name" placeholder="Certification Agency Name">
                                                 <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Initial Date of Certification <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="intial_date_certifiation" name="intial_date_certifiation" placeholder="Initial date of certification" max="2050-12-31" >
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>	
                                            <div class="form-group col-md-4">
                                               <label class="form-control-label">Effective Period of Certification From <span class="text-danger">*</span></label>
                                               <input type="date" class="form-control" id="effective_period_certifiation_from" name="effective_period_certifiation_from" placeholder="Effective period of certification From" >
                                               <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-4">
                                               <label class="form-control-label">Effective Period of Certification To <span class="text-danger">*</span></label>
                                               <input type="date" class="form-control" id="effective_period_certifiation_to" name="effective_period_certifiation_to" placeholder="Effective period of certification To" >
                                               <div class="help-block with-errors text-danger"></div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">								     		
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Accreditation Type <span class="text-danger">*</span></label>
                                                <select id="accreditation_type" name="accreditation_type" class="form-control"  data-validation-required-message="Select accreditation type">
                                                <option value="">Select Accreditation Type</option>
                                                <option value="1">NPOP</option>
                                                <option value="2">NOP</option>
                                                <option value="3">Others</option>								
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Certified Products</label>
                                                <select id="certified_products" name="certified_products" class="form-control">
                                                    <option value="">Select Products</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Jurisdiction <span class="text-danger">*</span></label>
                                                <select id="jurisdiction" name="jurisdiction" class="form-control">
                                                    <option value="">Select Jurisdiction</option>
                                                    <option value="1" selected>India</option>
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                    </div>								
				                    </div>
                                    
				                </div>																								
                            </div>
                                 
							</div>
                        </div>
                                
                
							<div id="step-3" >
							    <div id="form-step-2" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="col-md-3">&nbsp;</div>
                                    							
									<div class="col-md-6">
                                        <label class="text-center">Farm Implements</label>		
                                        <select id="farm_implements" name="farm_implements" class="form-control">
                                            <option value="">Select Farm Implements</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        </select>
									</div>
									<div class="col-md-3">&nbsp;</div>
								</div>
								
								<div id="farm_implements_form" style="display:none;">
								
								<div class="form-group col-md-12 mt-3">
								    <hr style="border-bottom:1px solid black;">
									<div class="form-group col-md-6 mt-2">
										<label class="form-control-label">Name of The Implements <span class="text-danger">*</span></label>
										<select id="farm_implements_name" name="farm_implements_name" class="form-control"   data-validation-required-message="Please selectname of the implements.">
										<option value="">Select Name of The Implements</option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6 mt-2">
										<label class=" form-control-label">Make</label>
										<select id="farm_implements_make" name="farm_implements_make" class="form-control">
										<option value="">Select Make</option>
										</select>
									</div>										
								</div>
								<div class="form-group col-md-12 mt-2">
                                    <div class="form-group col-md-6">
										<label class=" form-control-label">Model</label>
										<select id="farm_implements_model" name="farm_implements_model" class="form-control">
										<option value="">Select Model</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Year</label>
	                                    <select id="farm_implements_year" name="farm_implements_year" class="form-control">
										<option value="">Select Year</option>
										<?php 
										   for($i = 1950 ; $i < date('Y'); $i++){
											  echo "<option>$i</option>";
										   }?>
										</select>	
									</div>
								</div>
                                    
                                <div class="form-group col-md-12 mt-2">
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Available for Hire </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="farm_implements_available_year" name="farm_implements_available_year" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_available_year" name="farm_implements_available_year" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Purchase through Loan </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan"  value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                        </div>
                                        <div class="form-group col-md-4" id="purchase_loan" style="display:none">
										  <label class=" form-control-label">Institution </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="farm_implements_institution" name="farm_implements_institution" value="1" class="form-check-input"><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"  id="farm_implements_institution" name="farm_implements_institution" value="2" class="form-check-input"><span class="ml-1">Finance</span>
												</label>
											   </div>
											</div>			
										  </div>
                                         <div class="help-block with-errors text-danger"></div>
									   </div>
                                </div>
                                    
								<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-4">
										<label class=" form-control-label">Insurance Coverage </label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>																		
									<div class="form-group col-md-4" id="insurance_coverage_from" style="display:none">
										<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  id="farm_implements_insurance_validity_from" name="farm_implements_insurance_validity_from" placeholder="Insurance Validity from" max="2050-12-31">
                                        <div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4" id="insurance_coverage_to" style="display:none">
										<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  id="farm_implements_insurance_validity_to" name="farm_implements_insurance_validity_to" placeholder="Insurance Validity to" max="2050-12-31">
                                        <div class="help-block with-errors text-danger"></div>
									</div>
								</div>						
							</div>
							</div>
							</div>
                
                
							<div id="step-4">
							  <div id="form-step-3" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="col-md-3">&nbsp;</div>                                    			<div class="col-md-6">
                                        <label class="form-control-label">Live Stocks</label>
                                        <select id="live_stocks" name="live_stocks" class="form-control">
                                            <option value="">Select Live Stocks</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        </select>
									</div>
									<div class="col-md-3">&nbsp;</div>
								</div>
                                
								<div id="live_stocks_form" style="display:none;">
								    <div class="form-group col-md-12 mt-2">
									<hr style="border-bottom:1px solid black;">
									</div>
									<div class="form-group col-md-12 mt-3">
                                            <div class="form-group col-md-3">
												<label class=" form-control-label">Type of Live Stock <span class="text-danger">*</span></label>
												<select class="form-control" name="live_stocks_type" id="live_stocks_type" data-validation-required-message="Select live stock type">
                                                    <option value="">Select Live Stock Type</option>
                                                    <option value="1">Cattle</option>
                                                    <option value="2">Animals</option>
                                                    <option value="3">Birds</option>
                                                    <option value="4">Other</option>
												</select>
								                <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Name of the Live Stock <span class="text-danger">*</span></label>
												<select id="live_stocks_name" class="form-control" name="live_stocks_name" id="live_stocks_name" data-validation-required-message="Please select name of the live stock">
												<option value="">Select Live Stock</option>
												</select>
												<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Variety</label>
												<select id="live_stocks_variety" class="form-control" name="live_stocks_variety"  placeholder="Variety">
												<option value="">Select Variety</option>
												</select>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Numbers </label>
												<input type="text" class="form-control numberOnly" maxlength="4" name="live_stocks_numbers" id="live_stocks_numbers" placeholder="Numbers">
												<div class="help-block with-errors text-danger"></div>
											</div>
								    </div>
                                    
                                    <div class="form-group col-md-12 mt-3">
                                        <div class="form-group col-md-4">
											<label class="form-control-label">Purchase through Loan </label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="inline-radio1" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan " name="live_stocks_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
													   
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan"  name="live_stocks_purchase_loan" value="2" class="form-check-input"><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>											
										</div>
                                        <div class="form-group col-md-4" id="live_purchase_loan" style="display:none">
										  <label class=" form-control-label">Institution <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" name="live_stocks_institution" value="1" class="form-check-input"><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" name="live_stocks_institution" value="2" class="form-check-input"><span class="ml-1">Finance</span>
												</label>
											   </div>
											</div>			
										  </div>
                                            <div class="help-block with-errors text-danger"></div>
									   </div>
                                    </div>
                                    
									<div class="form-group col-md-12 mt-2">																							
										<div class="form-group col-md-4">
											<label class=" form-control-label">Insurance Coverage </label>
											  <div class="row">
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio1" class="form-check-label">
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage"  value="1" class="form-check-input"><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage" value="2" class="form-check-input"><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>
										</div>
										<div class="form-group col-md-4" id="live_insurance_coverage_from" style="display:none">
											<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" id="live_stocks_insurance_validity_from" name="live_stocks_insurance_validity_from" placeholder="Insurance Validity from" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
                                        <div class="form-group col-md-4" id="live_insurance_coverage_to" style="display:none">
											<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="live_stocks_insurance_validity_to" id="live_stocks_insurance_validity_to" placeholder="Insurance Validity to" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
								    </div>
								 </div>
                            </div>
                                
                                
								 <div class="form-group col-md-12 text-center">
                                     <button align="center" name="profilesubmit" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
								 </div>
								 </div>
								 </div>
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
    </div><!-- /#right-panel -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
</body>
</html>
<script type="text/javascript">
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
    $('#farmer_dob').attr('max', maxDate);
});
   
    
$('input[name="farmer_dob"]').on('change', function() {
      var dob =  $(this).val();
      var today = new Date(), 
      dob = new Date(dob), 
      age = new Date(today - dob).getFullYear() - 1970;
      document.getElementById("farmer_age").value=age;
});
    
        $(document).ready(function(){            
            // Toolbar extra buttons				
			   $('input[name="profilesubmit"]') .on('click', function(){
					if( !$(this).hasClass('disabled')){
						var elmForm = $("#farmer_profileForm");
						if(elmForm){
							elmForm.validator('validate');
							var elmErr = elmForm.find('.has-error');
							if(elmErr && elmErr.length > 0){
								//alert('Oops we still have error in the form');
								return true;
							}else{
								//alert('Great! we are ready to submit form');
								elmForm.submit();
								return false;
							}
						}
					}
				});
            
				var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger')
									.on('click', function(){
										$('#smartwizard').smartWizard("reset");
										$('#farmer_profileForm').find("input, textarea").val("");
									});



				// Smart Wizard
				$('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'circles',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
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
               if(stepDirection === 'forward' && elmForm && stepNumber == 0){
                  elmForm.validator('validate');
                  var elmErr = elmForm.children().children('.has-error');
                  if(elmErr && elmErr.length > 0){
                     // Form validation failed
                     if(stepNumber=='1'){
                        if($('#form-step-1').find("select").val()==2){
                           return true;
                        }else if($('#form-step-1').find("select").val()==1){
                           return false;                  
                        }
                     }              
                     return false;              
                  }                                                    
               }

               if(stepDirection === 'forward' && elmForm && stepNumber == 1){
                  if($('#landholdings').val() == 1){
                     elmForm.validator('validate');                  
                     var elmErr = elmForm.children().children('.has-error');
                     var elmErr2 = elmForm.children().children().children('.has-error');
                     var elmErr3 = elmForm.children().children().children().children('.has-error');
                     var elmErr4 = elmForm.children().children().children().children().children('.has-error');

                     if(elmErr && elmErr.length > 0) {
                        //console.log('Test1:::'+elmErr.length);
                        return false;
                     } else if(elmErr2 && elmErr2.length > 0){
                        //console.log('Test2:::'+elmErr2.length);
                        return false;              
                     } else if(elmErr3 && elmErr3.length > 0){
                        //console.log('Test3:::'+elmErr3.length);
                        return false;              
                     } else if(elmErr4 && elmErr4.length > 0){
                        //console.log('Test4:::'+elmErr4.length);
                        return false; 
                     }   
                  }                      
               }

               if(stepDirection === 'forward' && elmForm && stepNumber == 2){
                  elmForm.validator('validate');
                  var elmErr = elmForm.children().children().children('.has-error');
                  if(elmErr && elmErr.length > 0){
                     // Form validation failed
                     if(stepNumber=='1'){							
                        console.log($('#form-step-1').find("select").val()+',,,'+$('#form-step-1').find("input").val());
                        if($('#form-step-1').find("select").val()==2){
                           return true;
                        }else if($('#form-step-1').find("select").val()==1){
                           return false;                  
                        }																			  
                     }              
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
				
            var ckbox = $("input[name='land_type']");
            var lease = $("input[name='land_ownership']");
            //wet land conditions
            var wetland_irrigation=$("input[name='wetland_source_irrigation[]']");
            var wet_irrigation_method=$("input[name='wetland_irrigation_method[]']");
            var wetland_sub_avail=$("input[name='wetland_subsidy_availed']");
            var wetland_farm_land=$("input[name='wetland_farm_pond']");
            var wetland_farm_address=$("input[name='wetland_farmer_address']");
            //dry land conditions
            var dryland_irrigation=$("input[name='dryland_source_irrigation[]']");
            var dry_irrigation_method=$("input[name='dryland_irrigation_method[]']");
            var dryland_sub_avail=$("input[name='dryland_subsidy_availed']");
            var dryland_farm_land=$("input[name='dryland_farm_pond']");
            var dryland_farm_address=$("input[name='dryland_farmer_address']");
            //both land condition
             var bothland_irrigation=$("input[name='both_source_irrigation[]']");
            var both_irrigation_method=$("input[name='both_irrigation_method[]']");
            var bothland_sub_avail=$("input[name='both_subsidy_availed']");
            var bothland_farm_land=$("input[name='both_farm_pond']");
            var bothland_farm_address=$("input[name='both_farmer_address']");
             //organic farmer
            var organic_certifiation=$("input[name='organic_certifiation']");
            //farm implements
            var farm_insurance_coverage=$("input[name='farm_implements_insurance_coverage']");
            var farm_purchase_loan=$("input[name='farm_implements_purchase_loan']");
             //live stocks
            var live_stocks_insurance_coverage=$("input[name='live_stocks_insurance_coverage']");
            var live_stocks_purchase_loan=$("input[name='live_stocks_purchase_loan']");
            var chkId = '';
            var chk_farm_coverage= '';
            var chk_farm_loan= '';
            var chk_dateof_lease = '';
            var chk_wet_irrigation='';
            var chk_wet_irrigation_method='';
            var chk_wet_farm_address='';
            var chk_wet_farm_pond='';
            var chk_dry_irrigation='';
            var chk_dry_irrigation_method='';
            var chk_dry_sub_avail='';
            var chk_dry_farm_pond='';
            var chk_dry_farm_address='';
            var organic_certification='';
            
			   $('input').on('click', function() {				
					if (ckbox.is(':checked')) {
					  $("input[name='land_type']:checked").each ( function() {
							chkId = $(this).val() + ",";
						  chkId = chkId.slice(0, -1);
					  });
                        
                        // return value of checkbox checked
					   if(chkId==1){                           
                     $('#Land_Identify_head').show();
                     $('#bothLand_Identify_head').hide();                           
                     $('#div3').show();
                     $('#div4').hide();
                     $('#div5').hide();
                     $('.btn_profile').hide();
                     //getAreaUOMInLand();

                     $("#land_identification").prop('required',true);
                     $("#wetland_land_measurement_unit").prop('required',true);
                     $("#wetland_farmer_address").prop('required',true); 
                     $("#dry_land_identification").prop('required',false);
                     $("#dryland_land_measurement_unit").prop('required',false);
                     $("#dryland_farmer_address").prop('required',false);
                     $("#both_land_identification").prop('required',false);
                     $("#both_land_measurement_unit").prop('required',false);
                     $("#identity_type").prop('required',false);
                     $("#both_farmer_address").prop('required',false);
					   } else if(chkId==2){
                     $('#Land_Identify_head').show();
                     $('#bothLand_Identify_head').hide(); 
                     $('#div4').show();					   
                     $('#div3').hide();
                     $('#div5').hide();
                     $('.btn_profile').hide();
                     //getAreaUOMInLand();

                     $("#dry_land_identification").prop('required',true);
                     $("#dryland_land_measurement_unit").prop('required',true);
                     $("#dryland_farmer_address").prop('required',true);
                     $("#both_land_identification").prop('required',false);
                     $("#both_land_measurement_unit").prop('required',false);
                     $("#identity_type").prop('required',false);
                     $("#both_farmer_address").prop('required',false);
                     $("#land_identification").prop('required',false);
                     $("#wetland_land_measurement_unit").prop('required',false);
                     $("#wetland_farmer_address").prop('required',false); 
					   } else if(chkId==3){
                     $('#bothLand_Identify_head').show(); 
                     $('#Land_Identify_head').hide();
                     $('#div5').show();
                     $('#div4').hide();
                     $('#div3').hide();
                     $('.btn_profile').hide();
                     $('#datatable_script').hide();
                     //getAreaUOMInLand();

                     $("#both_land_identification").prop('required',true);
                     $("#both_land_measurement_unit").prop('required',true);
                     $("#identity_type").prop('required',true);
                     $("#both_farmer_address").prop('required',true);
                     $("#dry_land_identification").prop('required',false);
                     $("#dryland_land_measurement_unit").prop('required',false);
                     $("#dryland_farmer_address").prop('required',false);
                     $("#land_identification").prop('required',false);
                     $("#wetland_land_measurement_unit").prop('required',false);
                     $("#wetland_farmer_address").prop('required',false); 
                     //LoadCertifiedProduct();
					   }		  
					} 
                    
					//land ownership condition
					if (lease.is(':checked')) {
                  $("input[name='land_ownership']:checked").each ( function() {
                     chk_dateof_lease = $(this).val() + ",";
                     chk_dateof_lease = chk_dateof_lease.slice(0, -1);
                  });
                  if(chk_dateof_lease==1 || chk_dateof_lease==2){
                     $("#land_owner").prop('required',true);
                     $('#landowner').show();						
                  }else{
                     $('#landowner').hide();	
                  }

                  if(chk_dateof_lease==1){
                     $('#date_of_lease').hide();				   
                     $("#land_year_lease").prop('required',false);
                     $("#land_date_lease").prop('required',false);
                  }else if(chk_dateof_lease==2){                           
                     $('#date_of_lease').show();	
                     $("#land_year_lease").prop('required',true);
                     $("#land_date_lease").prop('required',true);
                  }
					}
                    
					//wet land source of irrigation  condition
               if($(".wetland_source_irrigation1").prop('checked') == true){
                  $('#number_wells').show();
               } else {
                  $('#number_wells').hide();
               }
               if($(".wetland_source_irrigation3").prop('checked') == true){
                  $('#number_tube_wells').show();
               } else {
                  $('#number_tube_wells').hide();
               }

					//wet land irrigation method condition
					if (wet_irrigation_method.is(':checked')) {
                  $("input[name='wetland_irrigation_method[]']:checked").each ( function() {
							chk_wet_irrigation_method = $(this).val() + ",";
							chk_wet_irrigation_method = chk_wet_irrigation_method.slice(0, -1);
					   });					   
                        
					   if(chk_wet_irrigation_method==1){
                     $('#wet_subsidy_avail').hide();				   
					   }else if(chk_wet_irrigation_method==2){
                     $('#wet_subsidy_avail').show();	
					   }else if(chk_wet_irrigation_method==3){
                     $('#wet_subsidy_avail').show();	
					   }else if(chk_wet_irrigation_method==4){
					      $('#wet_subsidy_avail').show();						   
                  }
               } else {
                  $("input[name=wetland_subsidy_availed][value=2]").prop('checked', true);
                  $('#wet_year_subsidy_claim').hide();
                  $('#wet_subsidy_avail').css("display", "none");
               }
                    
					//wet land subsidy availed condition
					if (wetland_sub_avail.is(':checked')) {
                         $("input[name='wetland_subsidy_availed']:checked").each ( function() {
							chk_wet_sub_avail= $(this).val() + ",";
							chk_wet_sub_avail = chk_wet_sub_avail.slice(0, -1);
					   });
                        
					   if(chk_wet_sub_avail==1){
					   $('#wet_year_subsidy_claim').show();				   
					   }else {
					   $('#wet_year_subsidy_claim').hide();	
					   }
                    }
					//wet land farm pond condition
					if(wetland_farm_land.is(':checked')) {
                  $("input[name='wetland_farm_pond']:checked").each ( function() {
                     chk_wet_farm_pond= $(this).val() + ",";
                     chk_wet_farm_pond = chk_wet_farm_pond.slice(0, -1);
                  });

                  if(chk_wet_farm_pond==1){
                     $('#wet_farm_subsidy_availed').show();
                     $('#wet_farm_construct_farm').hide();
                  }else if(chk_wet_farm_pond==2) {					   
                     $('#wet_farm_construct_farm').show();
                     $('#wet_farm_subsidy_availed').hide();
                  }
               }
					//wet land farm address
					if(wetland_farm_address.is(':checked')) {
                  $("input[name='wetland_farmer_address']:checked").each ( function() {
							chk_wet_farm_address= $(this).val() + ",";
							chk_wet_farm_address = chk_wet_farm_address.slice(0, -1);
					   });
                        
					   if(chk_wet_farm_address==2){
                            $('#wet_farm_address').show();
                            $("#wetland_pincode").prop('required',true);
                            $("#wetland_state").prop('required',true);
                            $("#wetland_district").prop('required',true);
                            $("#wetland_block").prop('required',true);
                            $("#wetland_taluk").prop('required',true);
                            $("#wetland_gram_panchayat").prop('required',true);
                            $("#wetland_village").prop('required',false);
					   }else {					   
					        $('#wet_farm_address').hide();
                            $("#wetland_pincode").prop('required',false);
                            $("#wetland_state").prop('required',false);
                            $("#wetland_district").prop('required',false);
                            $("#wetland_block").prop('required',false);
                            $("#wetland_taluk").prop('required',false);
                            $("#wetland_gram_panchayat").prop('required',false);
                            $("#wetland_village").prop('required',false);
					   }
               }
                    
					//dry land source of irrigation condition
               if($("#dryland_source_irrigation1").prop('checked') == true){
                  $('#dry_number_wells').show();
               } else {
                  $('#dry_number_wells').hide();
               }
               if($("#dryland_source_irrigation3").prop('checked') == true){
                  $('#dry_tube_wells').show();
               } else {
                  $('#dry_tube_wells').hide();
               }
                    
					//dry land method irrigation condition
					if (dry_irrigation_method.is(':checked')) {
                  $("input[name='dryland_irrigation_method[]']:checked").each ( function() {
                     chk_dry_irrigation_method = $(this).val() + ",";
                     chk_dry_irrigation_method = chk_dry_irrigation_method.slice(0, -1);
                  });

                  if(chk_dry_irrigation_method==1){
                     $('#dry_subsidy_avail').hide();				   
                  }else if(chk_dry_irrigation_method==2){
                     $('#dry_subsidy_avail').show();	
                  }else if(chk_dry_irrigation_method==3){
                     $('#dry_subsidy_avail').show();	
                  }else if(chk_dry_irrigation_method==4){
                     $('#dry_subsidy_avail').show();	
                  }
               } else {
						$("input[name=dryland_subsidy_availed][value=2]").prop('checked', true);
                  $('#dry_subsidy_avail').hide();
                  $('#dry_year_subsidy_claim').hide();	
               }
                    
               //dry land subsidy availed condition
               if (dryland_sub_avail.is(':checked')) {
                  $("input[name='dryland_subsidy_availed']:checked").each ( function() {
                     chk_dry_sub_avail= $(this).val() + ",";
                     chk_dry_sub_avail = chk_dry_sub_avail.slice(0, -1);
                  });
                        
                  if(chk_dry_sub_avail==1){
                     $('#dry_year_subsidy_claim').show();				   
                  }else {
                     $('#dry_year_subsidy_claim').hide();	
                  }
               }
                    
					//dry land farm pond condition
					if(dryland_farm_land.is(':checked')) {
                  $("input[name='dryland_farm_pond']:checked").each ( function() {
                     chk_dry_farm_pond= $(this).val() + ",";
                     chk_dry_farm_pond = chk_dry_farm_pond.slice(0, -1);
					   });
                        
					   if(chk_dry_farm_pond==1){
                     $('#dry_farm_subsidy_availed').show();
                     $('#dry_farm_construct_farm').hide();
					   }else if(chk_dry_farm_pond==2) {					   
                     $('#dry_farm_construct_farm').show();
                     $('#dry_farm_subsidy_availed').hide();
					   }
               }
                    
					//dry land farm address
					if(dryland_farm_address.is(':checked')) {
                  $("input[name='dryland_farmer_address']:checked").each ( function() {
                     chk_dry_farm_address= $(this).val() + ",";
                     chk_dry_farm_address = chk_dry_farm_address.slice(0, -1);
					   });                        
					   if(chk_dry_farm_address==2){
                     $('#dry_farm_address').show();
                     $("#dryland_pincode").prop('required',true);
                     $("#dryland_state").prop('required',true);
                     $("#dryland_district").prop('required',true);
                     $("#dryland_block").prop('required',true);
                     $("#dryland_taluk").prop('required',true);
                     $("#dryland_gram_panchayat").prop('required',true);
                     $("#dryland_village").prop('required',false);
					   }else {					   
                     $('#dry_farm_address').hide();
                     $("#dryland_pincode").prop('required',false);
                     $("#dryland_state").prop('required',false);
                     $("#dryland_district").prop('required',false);
                     $("#dryland_block").prop('required',false);
                     $("#dryland_taluk").prop('required',false);
                     $("#dryland_gram_panchayat").prop('required',false);
                     $("#dryland_village").prop('required',false);
					   }
               }                    
               /** Land type both based fields functionalities **/
               //Both land source of irrigation condition
               if($("#both_source_irrigation1").prop('checked') == true){
                  $('#bothland_number_wells').show();
               } else {
                  $('#bothland_number_wells').hide();
               }
               if($("#both_source_irrigation3").prop('checked') == true){
                  $('#bothland_tube_wells').show();
               } else {
                  $('#bothland_tube_wells').hide();
               }
                    
					//Both land method irrigation condition
					if (both_irrigation_method.is(':checked')) {
                  $("input[name='both_irrigation_method[]']:checked").each ( function() {
							chk_both_irrigation_method = $(this).val() + ",";
							chk_both_irrigation_method = chk_both_irrigation_method.slice(0, -1);
					   });
					                           
					   if(chk_both_irrigation_method==1){
                     $('#bothland_subsidy_avail').hide();				   
					   }else if(chk_both_irrigation_method==2){
                     $('#bothland_subsidy_avail').show();	
					   }else if(chk_both_irrigation_method==3){
                     $('#bothland_subsidy_avail').show();	
					   }else if(chk_both_irrigation_method==4){
                     $('#bothland_subsidy_avail').show();	
					   }
               } else {
						$("input[name=both_subsidy_availed][value=2]").prop('checked', true);
                  $('#bothland_subsidy_avail').hide();
                  $('#bothland_year_subsidy_claim').hide();	
               }                    
					//Both land subsidy availed condition
					if (bothland_sub_avail.is(':checked')) {
                  $("input[name='both_subsidy_availed']:checked").each ( function() {
							chk_both_sub_avail= $(this).val() + ",";
							chk_both_sub_avail = chk_both_sub_avail.slice(0, -1);
					   });
                        
					   if(chk_both_sub_avail==1){
                     $('#bothland_year_subsidy_claim').show();				   
					   }else {
                     $('#bothland_year_subsidy_claim').hide();	
					   }
               }
                    
					//Both land farm pond condition
					if(bothland_farm_land.is(':checked')) {
                  $("input[name='both_farm_pond']:checked").each ( function() {
							chk_both_farm_pond= $(this).val() + ",";
							chk_both_farm_pond = chk_both_farm_pond.slice(0, -1);
					   });
                        
					   if(chk_both_farm_pond==1){
                     $('#bothland_farm_subsidy_availed').show();
                     $('#bothland_farm_construct_farm').hide();
					   }else if(chk_both_farm_pond==2) {					   
                     $('#bothland_farm_construct_farm').show();
                     $('#bothland_farm_subsidy_availed').hide();
					   }
               }
                    
					//Both land farm address
					if(bothland_farm_address.is(':checked')) {
                  $("input[name='both_farmer_address']:checked").each ( function() {
							chk_both_farm_address= $(this).val() + ",";
							chk_both_farm_address = chk_both_farm_address.slice(0, -1);
					   });
                        
					   if(chk_both_farm_address==2){
                     $('#both_farm_address').show();
                     $("#both_pincode").prop('required',true);
                     $("#both_state").prop('required',true);
                     $("#both_district").prop('required',true);
                     $("#both_block").prop('required',true);
                     $("#both_taluk").prop('required',true);
                     $("#both_gram_panchayat").prop('required',true);
                     $("#both_village").prop('required',false);
					 }else {					   
                     $('#both_farm_address').hide();
                     $("#both_pincode").prop('required',false);
                     $("#both_state").prop('required',false);
                     $("#both_district").prop('required',false);
                     $("#both_block").prop('required',false);
                     $("#both_taluk").prop('required',false);
                     $("#both_gram_panchayat").prop('required',false);
                     $("#both_village").prop('required',false);
					   }
               }
                    /** Both land End **/
					
					//both farm condition
					if(organic_certifiation.is(':checked')) {
                  $("input[name='organic_certifiation']:checked").each ( function() {
							farmer_organic_certification= $(this).val() + ",";
							farmer_organic_certification = farmer_organic_certification.slice(0, -1);
					   });
                        
					   if(farmer_organic_certification==1){
                     LoadCertifiedProduct();
                     $('#organic_with_certification').show();
                     $("#certifiation").prop('required',true);
                     $("#certifiation_agency_name").prop('required',true);
                     $("#intial_date_certifiation").prop('required',true);
                     $("#effective_period_certifiation_from").prop('required',true);
                     $("#effective_period_certifiation_to").prop('required',true);
                     $("#accreditation_type").prop('required',true);
					   }else {					   
                     $('#organic_with_certification').hide();
                     $("#certifiation").prop('required',false);
                     $("#certifiation_agency_name").prop('required',false);
                     $("#intial_date_certifiation").prop('required',false);
                     $("#effective_period_certifiation_from").prop('required',false);
                     $("#effective_period_certifiation_to").prop('required',false);
                     $("#accreditation_type").prop('required',false);
					   }
               }
					
					//farm implements
					if(farm_insurance_coverage.is(':checked')) {
                  $("input[name='farm_implements_insurance_coverage']:checked").each ( function() {
							chk_farm_coverage= $(this).val() + ",";
							chk_farm_coverage = chk_farm_coverage.slice(0, -1);
					   });
                        
					   if(chk_farm_coverage==1){
						 $('#insurance_coverage_from').show();
						 $('#insurance_coverage_to').show();
						 $("#farm_implements_insurance_validity_from").prop('required',true);
						 $("#farm_implements_insurance_validity_to").prop('required',true);
					   }else {					   
					     $('#insurance_coverage_from').hide();
						$('#insurance_coverage_to').hide();
						$("#farm_implements_insurance_validity_from").prop('required',false);
						$("#farm_implements_insurance_validity_to").prop('required',false);
					   }
               }
					if(farm_purchase_loan.is(':checked')) {
                  $("input[name='farm_implements_purchase_loan']:checked").each ( function() {
							chk_farm_loan= $(this).val() + ",";
							chk_farm_loan = chk_farm_loan.slice(0, -1);
					   });
                        
					   if(chk_farm_loan==1){
                     $('#purchase_loan').show();
                     $("#farm_implements_institution").prop('required',true);
					   }else {					   
                     $('#purchase_loan').hide();
					   }
               }   
               //Live Stocks conditions
					if(live_stocks_insurance_coverage.is(':checked')) {
                  $("input[name='live_stocks_insurance_coverage']:checked").each ( function() {
							chk_livestock_coverage= $(this).val() + ",";
							chk_livestock_coverage = chk_livestock_coverage.slice(0, -1);
					   });
                        
					   if(chk_livestock_coverage==1){
                     $('#live_insurance_coverage_from').show();
                     $('#live_insurance_coverage_to').show();
                     $("#live_stocks_insurance_validity_from").prop('required',true);
                     $("#live_stocks_insurance_validity_to").prop('required',true);
					   }else {					   
					      $('#live_insurance_coverage_from').hide();
							$('#live_insurance_coverage_to').hide();
							$("#live_stocks_insurance_validity_from").prop('required',false);
							$("#live_stocks_insurance_validity_to").prop('required',false);
					   }
               }
					if(live_stocks_purchase_loan.is(':checked')) {
                  $("input[name='live_stocks_purchase_loan']:checked").each ( function() {
							chk_livestock_loan= $(this).val() + ",";
							chk_livestock_loan = chk_livestock_loan.slice(0, -1);
					   });
                        
					   if(chk_livestock_loan==1){
                     $('#live_purchase_loan').show();
                     $("#live_stocks_institution").prop('required',true);
					   }else {					   
                     $('#live_purchase_loan').hide();
					   }
               }
			   });
		   $('.btnNext').click(function(){
				  $('.tablink > .active').next('tabcontent').find('tab').trigger('click');
         });

			$('.btnPrevious').click(function(){
			  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
			});
			$('select[name="farm_implements"]').on('change', function() {
				var farm_implements = $(this).val();
                if(farm_implements==1){
				  $('#farm_implements_form').show();
				  $("#farm_implements_name").prop('required',true);
                    loadFarmImplementsName();
				}else{
				  $('#farm_implements_form').hide();
                    $("#farm_implements_name").prop('required',false);
				}									
			});
			$('select[name="live_stocks"]').on('change', function() {
				var live_stocks = $(this).val();
            if(live_stocks==1){
               $('#live_stocks_form').show();				  
               $("#live_stocks_type").prop('required',true);
               $("#live_stocks_name").prop('required',true);
				}else{
               $('#live_stocks_form').hide();
               $("#live_stocks_type").prop('required',false);
               $("#live_stocks_name").prop('required',false);
				}									
			});
         $('select[name="organic_former"]').on('change', function() {
				var organic_form = $(this).val();
                if(organic_form != 2){
				  $('#organic_farm_details').show();
				  //$("#organic_certifiation").prop('required',true);
				  $('#land_identify').show();
                    getAreaUOM();
                    //LoadCertifiedProduct();
				} else {
				  $('#organic_farm_details').hide();
				  $('#land_identify').hide();
//				}else if(organic_form==3){
//				  $('#organic_farm_details').show();
//				  $('#land_identify').show();
//				  $("#both_organic_certifiation").prop('required',true);
//                    getAreaUOM();
//                    LoadCertifiedProduct();
				}									
			});
         $('select[name="farmer_land_holdings"]').on('change', function() {
				var farmer_land_holdings = $(this).val();
            if(farmer_land_holdings == 1){
               $("#land_ownership").prop('required',true);
               $("#land_type").prop('required',true);
               $('#land_holdings1').show(); 
               $('#organic_details').show();
               getAreaUOMInLand();
				} else if(farmer_land_holdings == 2){
				  $('#land_holdings1').hide();
                  $('#organic_details').hide(); 
                  $('#Land_Identify_head').hide(); 
                  $('#bothLand_Identify_head').hide(); 
				  $('#div3').hide();
				  $('#div4').hide();
				  $('#div5').hide();
				  $('#date_of_lease').hide();
                    
                    $("#land_ownership").prop('required',false);
                    $("#land_owner").prop('required',false);
                    $("#land_type").prop('required',false);
                    $("#land_identification").prop('required',false);
                    $("#wetland_land_measurement_unit").prop('required',false);
					$("#wetland_farmer_address").prop('required',false); 
                    $("#dry_land_identification").prop('required',false);
                    $("#dryland_land_measurement_unit").prop('required',false);
					$("#dryland_farmer_address").prop('required',false);
                    $("#both_land_identification").prop('required',false);
                    $("#both_land_measurement_unit").prop('required',false);
                    $("#identity_type").prop('required',false);
					$("#both_farmer_address").prop('required',false);
                    
                    var $land_type_hide = $('input:radio[name=land_type]');        
                    if($land_type_hide.is(':checked') === true) {
                        $land_type_hide.filter('[value=1]').prop('checked', false);
                        $land_type_hide.filter('[value=1]').prop('checked', false);
                        $land_type_hide.filter('[value=1]').prop('checked', false);
                    }							 
				}				
			});
			var abc = 0;
                 
			$('body').on('change', '#farmer_photo', function (e)
			{
				$(this).before($("<div/>",{id: 'filediv'}).fadeIn('slow').append($("<input/>",
				{
					name: 'photo[]',
					type: 'file',
					id: 'farmer_photo',
					class:'form-control'
				}),
				$("<br/><br/>")
				));
				var file = e.target.files[0];
				var filename = file.name;
				var filetype = file.type;
				var filesize = file.size;
				var data = {
				  "filename":filename,
				  "filetype":filetype,
				  "filesize":filesize,
				};
				if (this.files && this.files[0])
				{					
					if(filetype=='image/jpeg' || filetype=='image/jpg' ||filetype=='image/png'){
					abc += 1; //increementing global variable by 1
					var z = abc - 1;
					var x = $(this).parent().find('#previewimg' + z).remove();
					$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "'  height='200' width='200' src=''/><p></p></div>");
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
					$(this).hide();
					$("#abcd" + abc).append($("<button/>",{
						class:'btn-primary mt-3',
						text:'Delete',
						href:'assets/img/pdf_icon.png'
					}).click(function (){
						$(this).parent().remove();
					}));
				   }else if(filetype=='application/pdf'){
					
					abc += 1; //increementing global variable by 1
					var z = abc - 1;

					var x = $(this).parent().find('#previewimg' + z).remove();
					$(this).before("<div id='abcd" + abc + "' class='abcd'><p></p></div>");

					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
					$(this).hide();
					
					$("#abcd" + abc).append($("<a/>",{
							"href": "data:" + data.filetype + ";base64," + data.file_base64,
							"download": data.filename,
							"target": "_blank",
							"text": data.filename,                
							"id":"closedata",
					}) .click(function ()
					{
						$(this);
					}));
					$("#abcd" + abc).append($("<button/>",{
						class:'btn-primary',
						text:'Delete'
						
					}) .click(function ()
					{
						$(this)
						.parent()
						.remove();
					}));
				}
				}
			});
            
            //image preview
			function imageIsLoaded(e){
				$('#previewimg' + abc)
				.attr('src', e.target.result);
			}
			
});   
    
    
         $('form').submit(function(e){
            e.preventDefault(); 
            var elmForm = $("#form-step-3");
            elmForm.validator('validate');
            var elmErr = elmForm.children().children().children('.has-error');
            //alert(elmErr.length);
            if(elmErr && elmErr.length > 0){
               return false;              
            } else {
               const farmerData = $('#farmer_profileForm').serializeObject();
               //console.log(farmerData);
               $.ajax({
                  url:"<?php echo base_url();?>staff/farmer/postfarmer",
                  type:"POST",
                  data:farmerData,
                  dataType:"html",
                  cache:false,			
                  success:function(response){		  
                     response=response.trim();
                     responseArray=$.parseJSON(response);
                     //console.log(response);    						
                     if(responseArray.status == 1) {
                        swal("Good!", responseArray.message, "success");
                        setTimeout(function(){ 
                           window.location = "<?php echo base_url('staff/farmer/profilelist')?>"; 
                        }, 3000);        							
                     } else {
                        swal("", responseArray.message, "warning");
                     }
                  },
                  error:function(response){
                     swal("Sorry", 'Error!!! Try again', "warning");
                  } 					
               }); 
            }			    			 	
         });
            
            
            
        $.fn.serializeObject = function() {
				var o = {};
				var a = this.serializeArray();
				$.each(a, function() {
				if (o[this.name] !== undefined) {
				  if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				  }
				  o[this.name].push(this.value || '');
				} else {
				  o[this.name] = this.value || '';
				}
				});
				return o;
			};
		
    
$("#farmer_pin_code").focusout(function() {
    var farmer_pin_code = $(this).val();
    if(farmer_pin_code.length < 6) {
        $("#farmer_pin_code").val('');$("#farmer_pin_code").focus();
    }    
});      
function getfarmerPincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {                                   
                    var state = '';var district = '';
                    var block ='<option value="">Select Block</option>';
                    var taluk ='<option value="">Select Taluk</option>';                
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
                       block += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['cityInfo'],function(key, value){
                        district += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
                        state += '<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('#farmer_state').html(state);
                    $('#farmer_district').html(district);
                    $('#farmer_block').html(block);
                    $('#farmer_taluk').html(taluk);
                } else {
                    $("#farmer_pin_code").val('');$("#farmer_pin_code").focus();
                    $('#farmer_state').html('<option value="">Select State</option>');
                    $('#farmer_district').html('<option value="">Select District</option>');
                    $('#farmer_block').html('<option value="">Select Block</option>');
                    $('#farmer_taluk').html('<option value="">Select Taluk</option>');
                    $('#farmer_gram_panchayat').html('<option value="">Select Panchayat</option>');
                    $('#farmer_village').html('<option value="">Select Village</option>');
                    swal("Sorry", responseArray.message);
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}          
$('select[name="farmer_block"]').on('change', function() {
    var farmer_block = $(this).val();
    if(farmer_block > 0){
       document.getElementById("farmerNoMobile").disabled =false;
    }else{
       document.getElementById("farmerNoMobile").disabled =true;
    }
    getFarmerPanchayatByBlock(farmer_block);
});
function getFarmerPanchayatByBlock(farmer_block) {
    $.ajax({
        url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+farmer_block,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
         //console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
            var gram_panchayat = '<option value="">Select Panchayat</option>';     
            $.each(responseArray.panchayatInfo, function(key, value){
                gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
            });                                
            $('#farmer_gram_panchayat').html(gram_panchayat);                
        },error:function(response){
		  alert('Error!!! Try again');
		} 			
    });     
}        
$('select[name="farmer_gram_panchayat"]').on('change', function() {
    var farmer_gram_panchayat = $(this).val();
    getFarmerVillageByPanchayat(farmer_gram_panchayat);
}); 
function getFarmerVillageByPanchayat(farmer_gram_panchayat) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+farmer_gram_panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#farmer_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 	
}    
    
     
$("#wetland_pincode").focusout(function() {
    var wetland_pincode = $(this).val();
    if(wetland_pincode.length < 6) {
        $("#wetland_pincode").val('');
    }    
});    
function getwetPincode( wetland_pin_code ) {
			 if(wetland_pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+wetland_pin_code,
					type:"GET",
					data:"",
					dataType:"html",
						cache:false,			
					success:function(response) {
						//console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
						if(responseArray.status == 1) {	 
							 var state = '';var district = '';
							 var block ='';var taluk ='';							 
							 var block ='<option value="">Select Block</option>';
				             var taluk ='<option value="">Select Taluk</option>';       
							 $.each(responseArray.getlocation['talukInfo'],function(key, value){
								  taluk += '<option value='+value.id+'>'+value.name+'</option>'
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
							 $('#wetland_state').html(state);
							 $('#wetland_district').html(district);
							 $('#wetland_block').html(block);
							 $('#wetland_taluk').html(taluk);
                        } else {
                            $("#wetland_pincode").val('');$("#wetland_pincode").focus();
                            $('#wetland_state').html('<option value="">Select State</option>');
                            $('#wetland_district').html('<option value="">Select District</option>');
                            $('#wetland_block').html('<option value="">Select Block</option>');
                            $('#wetland_taluk').html('<option value="">Select Taluk</option>');
                            $('#wetland_gram_panchayat').html('<option value="">Select Panchayat</option>');
                            $('#wetland_village').html('<option value="">Select Village</option>');
                            swal("Sorry", responseArray.message);
                        }
				},
				error:function(response){
						alert('Error!!! Try again');
				} 			
            }); 
        }
}    
$('select[name="wetland_block"]').on('change', function() {
    var wetland_block = $(this).val();
    getWetPanchayatByBlock(wetland_block);
});
function getWetPanchayatByBlock(wetland_block) {
	   $.ajax({
            url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+wetland_block,
            type:"GET",
            data:"",
            dataType:"html",
            cache:false,			
            success:function(response) {
                //console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                var gram_panchayat = '<option value="">Select Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#wetland_gram_panchayat').html(gram_panchayat);                
            },error:function(response){
              alert('Error!!! Try again');
            } 			
        });         			  
}        
$('select[name="wetland_gram_panchayat"]').on('change', function() {
    var wetland_gram_panchayat = $(this).val();
    getWetVillageByPanchayat(wetland_gram_panchayat);
}); 
function getWetVillageByPanchayat(wetland_gram_panchayat) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+wetland_gram_panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#wetland_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 			
}    
    

$("#dryland_pincode").focusout(function() {
    var dryland_pincode = $(this).val();
    if(dryland_pincode.length < 6) {
        $("#dryland_pincode").val('');
    }    
});    
function getPincode( dryland_pin_code ) {
			 if(dryland_pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+dryland_pin_code,
					type:"GET",
					data:"",
					dataType:"html",
						cache:false,			
					success:function(response) {
						//console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
				        if(responseArray.status == 1) {
							 var state = '';var district = '';var block ='';var taluk ='';
                             var block ='<option value="">Select Block</option>';
				             var taluk ='<option value="">Select Taluk</option>';       
							 $.each(responseArray.getlocation['talukInfo'],function(key, value){
								  taluk += '<option value='+value.id+'>'+value.name+'</option>'
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
							 $('#dryland_state').html(state);
							 $('#dryland_district').html(district);
							 $('#dryland_block').html(block);
							 $('#dryland_taluk').html(taluk);
				        } else {
                            $("#dryland_pincode").val('');$("#wetland_pincode").focus();
                            $('#dryland_state').html('<option value="">Select State</option>');
                            $('#dryland_district').html('<option value="">Select District</option>');
                            $('#dryland_block').html('<option value="">Select Block</option>');
                            $('#dryland_taluk').html('<option value="">Select Taluk</option>');
                            $('#dryland_gram_panchayat').html('<option value="">Select Panchayat</option>');
                            $('#dryland_village').html('<option value="">Select Village</option>');
                            swal("Sorry", responseArray.message);
                        }                        
						},error:function(response){
                            alert('Error!!! Try again');
                        } 			
					}); 
			 }
		}
$('select[name="dryland_block"]').on('change', function() {
    var dryland_block = $(this).val();
    getDryPanchayatByBlock(dryland_block);
});
function getDryPanchayatByBlock(dryland_block) {
        $.ajax({
            url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+dryland_block,
            type:"GET",
            data:"",
            dataType:"html",
            cache:false,			
            success:function(response) {
                //console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                var gram_panchayat = '<option value="">Select Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#dryland_gram_panchayat').html(gram_panchayat);                
            },error:function(response){
              alert('Error!!! Try again');
            } 			
        });         
}            
$('select[name="dryland_gram_panchayat"]').on('change', function() {
    var dryland_gram_panchayat = $(this).val();
    getDryVillageByPanchayat(dryland_gram_panchayat);
}); 
function getDryVillageByPanchayat(dryland_gram_panchayat) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+dryland_gram_panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#dryland_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 		
}    
  
 
$("#both_pincode").focusout(function() {
    var both_pincode = $(this).val();
    if(both_pincode.length < 6) {
        $("#both_pincode").val('');
    }    
});      
function getBothLandPincode ( pin_code ) {
			 if(pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
					type:"GET",
					data:"",
					dataType:"html",
				    cache:false,			
					success:function(response) {
				        console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
				        if(responseArray.status == 1) {
							 var state = '';var district = '';var block ='';var taluk ='';	
                             var block ='<option value="">Select Block</option>';
				             var taluk ='<option value="">Select Taluk</option>';      
							 $.each(responseArray.getlocation['talukInfo'],function(key, value){
								  taluk += '<option value='+value.id+'>'+value.name+'</option>'
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
                        
							 $('#both_state').html(state);
							 $('#both_district').html(district);
							 $('#both_block').html(block);
							 $('#both_taluk').html(taluk);
                        } else {
                            $("#both_pincode").val('');$("#wetland_pincode").focus();
                            $('#both_state').html('<option value="">Select State</option>');
                            $('#both_district').html('<option value="">Select District</option>');
                            $('#both_block').html('<option value="">Select Block</option>');
                            $('#both_taluk').html('<option value="">Select Taluk</option>');
                            $('#both_gram_panchayat').html('<option value="">Select Panchayat</option>');
                            $('#both_village').html('<option value="">Select Village</option>');
                            swal("Sorry", responseArray.message);
                        }           
						},error:function(response){
						alert('Error!!! Try again');
					} 			
					}); 
			 }
		}    
$('select[name="both_block"]').on('change', function() {
    var both_block = $(this).val();
    getBothPanchayatByBlock(both_block);
});
function getBothPanchayatByBlock(both_block) {
    $.ajax({
        url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+both_block,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
         //console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
            var gram_panchayat = '<option value="">Select Panchayat</option>';
            $.each(responseArray.panchayatInfo, function(key, value){
                gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
            });                                
            $('#both_gram_panchayat').html(gram_panchayat);                
        },error:function(response){
		  alert('Error!!! Try again');
		} 			
    });     
}          
$('select[name="both_gram_panchayat"]').on('change', function() {
    var both_gram_panchayat = $(this).val();
    getBothVillageByPanchayat(both_gram_panchayat);
}); 
function getBothVillageByPanchayat(both_gram_panchayat) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+both_gram_panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#both_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    });     	
}    
      
    
		
function verifyMobileNumber(mobilenumber) {
    if(mobilenumber.length == 10 && (mobilenumber.charAt(0) == 6 || mobilenumber.charAt(0) == 7 || mobilenumber.charAt(0) == 8 || mobilenumber.charAt(0) == 9)) {
        $.ajax({
          url:"<?php echo base_url();?>administrator/Login/checkusername/"+mobilenumber,
          type:"GET",
          data:"",
          dataType:"html",
          cache:false,      
          success:function(response) {                
            response=response.trim();
            responseArray=$.parseJSON(response);
              //console.log(responseArray);mbl_validate
              if(responseArray.status == 1){
                  $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
                  $('#farmerNoMobile').attr('disabled', true);
              } else {                  
                  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                  $("#farmer_mobile_num").val("");
                  $("#farmer_mobile_num").focus();
                  $('#farmerNoMobile').attr('disabled', false);
              } 
            }
        });            
    }    
}
    
/** Land measurement update **/    
wetLandMeasure = 0;	
function GetMoreWetLandIdentify() {
    var original = document.getElementById('land_holdings2_' + wetLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement_unit").value != "") {
        clone.id = "land_holdings2_" + ++wetLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]); 
        document.querySelector("#"+clone.id).querySelector("#land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement").value = "";
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function removeWetLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
    if(reqID.charAt(reqID.length - 1) != 0) {
        e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode); 
        wetLandMeasure = (wetLandMeasure-1);
    } else {
        swal("", "You can't able to delete this row");
    }        
}
    
dryLandMeasure = 0;	
function GetMoreDryLandIdentify() {
    var original = document.getElementById('dryland_holdings2_' + dryLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#dry_land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement_unit").value != "") {
        clone.id = "dryland_holdings2_" + ++dryLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]);
        document.querySelector("#"+clone.id).querySelector("#dry_land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement").value = "";
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function removeDryLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
    if(reqID.charAt(reqID.length - 1) != 0) {
         e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode);   
         dryLandMeasure=(dryLandMeasure-1);
    } else {
        swal("", "You can't able to delete this row");
    }        
}    

/** Both Land Details update **/ 
bothLandMeasure = 0;	
function GetMoreBothLandIdentify() {
    var original = document.getElementById('bothland_holdings_' + bothLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#both_land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#both_land_measurement_unit").value != "" && document.querySelector("#"+clone.id).querySelector("#identity_type").value != "") {
        clone.id = "bothland_holdings_" + ++bothLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]);
        document.querySelector("#"+clone.id).querySelector("#both_land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#both_land_measurement").value = "";
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function removeBothLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
    if(reqID.charAt(reqID.length - 1) != 0) {
       e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode);  
        bothLandMeasure=(bothLandMeasure-1);
    } else {
        swal("", "You can't able to delete this row");
    }        
} 

    
function getLiveStockType(value) {
        $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getLiveStocks/"+value,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                //console.log(responseArray);
                if(responseArray.status == 1){
                    var livestock_name = '<option value="">Select Live Stock</option>';
					$.each(responseArray.livestock_name,function(key,value){
					   livestock_name += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					$('#live_stocks_name').html(livestock_name);
                    $('#live_stocks_variety').html(livestock_name);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
 
    
function LoadCertifiedProduct() {
        $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getProductList",
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
            if(responseArray.status == 1){
               var product_list = '<option value="">Select product</option>';
					$.each(responseArray.product_list,function(key,value){
					   product_list += '<option value='+value.id+'>'+value.product_name+'</option>';
				    });
					$('#certified_products').html(product_list);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
} 
    
    
$('select[id="live_stocks_type"]').on('change', function() {
    var live_stocks_type = $(this).val();
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getLiveStocks/"+live_stocks_type,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
            if(responseArray.status == 1){
            var livestock_name = '<option value="">Select Live Stock</option>';
					$.each(responseArray.livestock_name,function(key,value){
					   livestock_name += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					$('#live_stocks_name').html(livestock_name);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 
}); 
    
    
$('select[id="live_stocks_name"]').on('change', function() {
    var live_stocks_name = $(this).val();
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getLiveStockVariety/"+live_stocks_name,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
            if(responseArray.status == 1){
               var livestock_variety = '<option value="">Select Variety</option>';
					$.each(responseArray.livestock_variety,function(key,value){
					   livestock_variety += '<option value='+value.id+'>'+value.variety+'</option>';
				    });
                    $('#live_stocks_variety').html(livestock_variety);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 
});
    
    
function loadFarmImplementsName() {
    $.ajax({
      url:"<?php echo base_url();?>staff/farmer/getFarmImplements",
		type:"GET",
		data:"",
		dataType:"html",
      cache:false,			
		success:function(response) {
      //console.log(response);
      response=response.trim();                
      responseArray=$.parseJSON(response);
      //console.log(responseArray);
      if(responseArray.status == 1){
          var farm_implements_name = '<option value="">Select Farm Implements</option>';
				$.each(responseArray.farm_implement_namelist,function(key,value){
				   farm_implements_name += '<option value='+value.id+'>'+value.Name+'</option>';
			    });
				$('#farm_implements_name').html(farm_implements_name);
			}
        },
		error:function(response){
		  alert('Error!!! Try again');
		} 			
    }); 
}
    
    
$('select[id="farm_implements_name"]').on('change', function() {
    var name_value = $(this).val();
    loadFarmImplementsMakeAndModel(name_value);
});
    
    
function loadFarmImplementsMakeAndModel(name_value) {
    $.ajax({
        url:"<?php echo base_url();?>staff/farmer/getFarmImplementsMakeAndModel/"+name_value,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
         //console.log(response);
         response=response.trim();                
			responseArray=$.parseJSON(response);
         //console.log(responseArray);
            if(responseArray.status == 1){
                var farmImplement_makeandmodel1 = '<option value="">Select Make</option>';
                var farmImplement_makeandmodel2 = '<option value="">Select Model</option>';
				$.each(responseArray.farmImplement_makeandmodel,function(key,value){
				   farmImplement_makeandmodel1 += '<option value='+value.id+'>'+value.Make+'</option>';
                    farmImplement_makeandmodel2 += '<option value='+value.id+'>'+value.Model+'</option>';
			    });
				$('#farm_implements_make').html(farmImplement_makeandmodel1);
                $('#farm_implements_model').html(farmImplement_makeandmodel2);
			}
        },
		error:function(response){
		  alert('Error!!! Try again');
		} 			
    }); 
}    
      
    
function getAreaUOM() {
        $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getAreaUOM",
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
                if(responseArray.status == 1){
                    var area_uom = '<option value="">Select Area UOM</option>';
					$.each(responseArray.area_uom,function(key,value){
					   area_uom += '<option value='+value.id+'>'+value.full_name+'</option>';
				    });
					$('#cultivation_area_uom').html(area_uom);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
    
function getAreaUOMInLand() {
        $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getAreaUOM",
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
                if(responseArray.status == 1){
                    var area_uom = '<option value="">Select Area UOM</option>';
					$.each(responseArray.area_uom,function(key,value){
					   area_uom += '<option value='+value.id+'>'+value.full_name+'</option>';
				    });
					$('#wetland_land_measurement_unit').html(area_uom);
                    $('#dryland_land_measurement_unit').html(area_uom);
                    $('#both_land_measurement_unit').html(area_uom);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
      
    
    
document.getElementById('farmer_aadhaar_num').oninput = function () {
    var foo = this.value.split(" ").join("");
    if (foo.length > 0 && foo.length == 12) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    this.value = foo;
}; 
    
$("#farmer_aadhaar_num").focusout(function() {
   var this_length = $(this).val().length;
   if (this_length > 0 && this_length != 14) {
      $("#adhaar-err").html("<div class='alert alert-danger'>Invalid AADHAAR Number</div>"); 
      $("#farmer_aadhaar_num").val("");
      $("#farmer_aadhaar_num").focus();
   }else{
      $("#adhaar-err").html("");
   }
});   

$("#farm_implements_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#farm_implements_insurance_validity_to").attr("min", insurance_validity_from);
});  
    
$("#live_stocks_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#live_stocks_insurance_validity_to").attr("min", insurance_validity_from);
});  
    
$("#effective_period_certifiation_from").focusout(function() {
    var effective_period_certifiation_from = $(this).val();
    $("#effective_period_certifiation_to").attr("min", effective_period_certifiation_from);
});

$("#farmer_age").focusout(function() {
    var farmer_age = $(this).val();
    var today = new Date();
    var lastYear = (today.getFullYear() - farmer_age);    
    var date_of_birth = lastYear+'-01-01';
    var dob = $("#farmer_dob").val();
    if(dob == '')
      $("#farmer_dob").val(date_of_birth);
}); 

$("#farmerNoMobile").change(function(event){
    if(this.checked){
        var farmer_block = $("#farmer_block").val();
        var randomCode = Math.floor(1000 + Math.random() * 9000);
        var generatedCode = farmer_block+randomCode;
        var lastTen = generatedCode.substr(0,10); // => "Tabs1"
        $("#farmer_mobile_num").val(lastTen);
        $("#farmer_mobile_num" ).removeAttr( "pattern");
        $('#farmer_mobile_num').attr('readonly', true);        
    }else{
      $('#farmer_mobile_num').attr('readonly', false);
      $("#farmer_mobile_num").val('');
    }
});    
    
</script>