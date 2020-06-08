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
                            <li><a href="<?php echo base_url('fpo/farmer/profilelist');?>">Farmer Profile</a></li>
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
						<form  action="<?php echo base_url('fpo/farmer/postfarmer')?>" method="post" id="farmer_profileForm"  name="farmer_profileForm"  enctype="multipart/form-data" >
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
								<div class="form-group col-md-6 ">
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
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									</select>							
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6">
									<label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" minlength="10" maxlength="10" name="farmer_mobile_num" onfocusout="verifyMobileNumber(this.value)"  pattern="^[6-9]\d{9}$"  id="farmer_mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
									<div id="mbl_validate" class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Aadhaar Number <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" minlength="12" maxlength="12" name="farmer_aadhaar_num"  id="farmer_aadhaar_num" placeholder="Aadhaar Number" required="required" data-validation-required-message="Please enter aadhaar number.">
									 <div class="help-block with-errors text-danger"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6">
									<label for="inputAddress2">PIN Code <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" onkeyup="getfarmerPincode(this.value)" minlength="6" maxlength="6"  pattern="[1-9][0-9]{5}"  maxlength="6" id="farmer_pin_code" name="farmer_pin_code" placeholder="PIN Code" required="required" data-validation-required-message="Please enter pin code.">
									<div class="help-block with-errors text-danger"></div>								
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">State <span class="text-danger">*</span></label>
									<!--<input type="text" class="form-control" id="farmer_state" name="farmer_state" placeholder="State" readonly required="required" data-validation-required-message="Please enter state.">-->
									<select  class="form-control" id="farmer_state" name="farmer_state" readonly placeholder="State" required>
										<option value="">Select State </option>
									</select>
									<div class="help-block with-errors text-danger"></div> 
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6">
									<label for="inputAddress2">District <span class="text-danger">*</span></label>
									<!--<input type="text" class="form-control" id="farmer_district" name="farmer_district" placeholder="District" readonly required="required" data-validation-required-message="Please enter district.">-->
									<select  class="form-control" id="farmer_district" name="farmer_district" readonly placeholder="District" required>
										<option value="">Select District </option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Block <span class="text-danger">*</span></label>
									<!--<input type="text" class="form-control" id="farmer_block" name="farmer_block" placeholder="Block" readonly required="required" data-validation-required-message="Please enter block.">-->
									<select  class="form-control" id="farmer_block" name="farmer_block" readonly placeholder="Block">
										<option value="">Select Block </option>
									</select> 
									 <div class="help-block with-errors text-danger"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6">
									<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
									<!--<input type="text" class="form-control" id="farmer_taluk" name="farmer_taluk" placeholder="Taluk" readonly required="required" data-validation-required-message="Please enter taluk.">-->
									<select  class="form-control" id="farmer_taluk" name="farmer_taluk" readonly placeholder="Taluk">
										<option value="">Select Taluk </option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">						    
									<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
									<select class="form-control" id="farmer_gram_panchayat" name="farmer_gram_panchayat" onchange="getVillageList(this.value);" required="required" data-validation-required-message="Please select gram panchayat.">
											<option value="">Select Gram Panchayat </option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">								
								<div class="form-group col-md-6">
									<label for="inputAddress2">Village <span class="text-danger">*</span></label>
									<select  class="form-control" id="farmer_village" name="farmer_village" required="required" data-validation-required-message="Please select village.">
                              <option value="">Select Village </option>
									</select>
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Door No  </label>
									<input type="text" class="form-control" maxlength="10" id="farmer_door_no" name="farmer_door_no" placeholder="Door No">
								</div>
								</div>
								<div class="form-group col-md-12 mt-1">								
								<div class="form-group col-md-12">
									<label for="inputAddress2">Street</label>
									<input type="text" class="form-control" maxlength="75" id="farmer_street" name="farmer_street" placeholder="Street">
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
									<input type="text" class="form-control numberOnly" maxlength="3" id="farmer_age" name="farmer_age" placeholder="Age" required="required" data-validation-required-message="Please enter age.">
									 <div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-6">
									<label for="inputAddress2">Income Category </label>
									<select id="farmer_income_category" name="farmer_income_category" class="form-control" >
									<option value="">Select Income Category</option>
									<option value="1" selected>APL</option>
									<option value="2">BPL</option>
									</select>							
								</div>
								</div>
							    <div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-6 mt-5">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" id="farmer_ispromotor" value="1" name="farmer_ispromotor" required>
									  <label class="form-check-label" for="gridCheck">
										Is Promoter <span class="text-danger">*</span>
									  </label>
									  <div class="help-block with-errors text-danger"></div>
									</div>
								</div>		
								<div class="form-group col-md-6 " id="filediv">
									<label for="inputAddress2">Photo </label>
										<input class="form-control" type="file" id="farmer_photo" name="farmer_photo" name="photo[]" accept="image/jpeg,image/png,image/jpg"  placeholder="Photo *">				
								</div>
																						
								</div>
							</div>
                            </div>
							<div id="step-2" >
							    <div id="form-step-1" role="form" data-toggle="validator">
								  <div class="form-group col-md-12 mt-2">
									<div class="col-md-3">&nbsp;</div>
									<div class="form-group col-md-6">
									  <label for="inputState">Land Holdings</label>
									  <select id="inputState" class="form-control" id="farmer_land_holdings" name="farmer_land_holdings" required="required" data-validation-required-message="Please select land holdings.">
										<option value="">Select Land Holdings</option>
										<option value="1" selected>Yes</option>
										<option value="2">No</option>
									  </select>								  
									</div>
									<div class="help-block with-errors text-danger"></div>
									<div class="col-md-3">&nbsp;</div>
								  </div>
								  <div class="form-group col-md-12 mt-4" id="land_holdings1">
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Land Ownership <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="land_ownership" name="land_ownership" value="1" class="form-check-input" required><span class="ml-1">Own</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="land_ownership" name="land_ownership" value="2" class="form-check-input" required><span class="ml-1">Lease</span>
												
												</label>
											   </div>
											</div>			
										  </div>
										     <div class="help-block with-errors text-danger"></div>
									  </div>
									 <div class="form-group col-md-6">
										<label for="inputAddress2">Land Identification </label>
										<input type="text" class="form-control" name="land_identification"  id="land_identification"  maxlength="50" placeholder="Land Identification " >
									</div>									 
									</div>
									<div class="form-group col-md-12 mt-2" id="land_holdings2">								
									   <div class="form-group col-md-6 mt-2">
										  <label class=" form-control-label">Type of Land <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="land_type" name="land_type" value="1" class="form-check-input " required><span class="ml-1">Wet land</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" name="land_type"  id="land_type"  value="2" class="form-check-input" required><span class="ml-1"> Dry Land</span>

												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="land_type" name="land_type" value="3" class="form-check-input" required><span class="ml-1"> Both	</span>											  
												</label>
											   </div>
											</div>											
										  </div>
										   <div class="help-block with-errors text-danger"></div>
									  </div>
									   <div class="form-group col-md-6" id="landowner" style="display:none">
										<label for="inputAddress2">Name of the Land Owner </label>
										<input type="text" class="form-control" maxlength="50" name="land_owner"  id="land_owner" placeholder="Name of the Land Owner ">
									  </div>
								    </div>	
									<div  id="date_of_lease" style="display:none">
										<div class="form-group col-md-12 mt-2">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Number of Years of Lease </label>
												<input type="text" class="form-control numberOnly" name="land_year_lease"  id="land_year_lease" maxlength="3" placeholder="Number of Years of Lease " >
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">Date of Lease </label>
												<input type="date" class="form-control"  name="land_date_lease"  id="land_date_lease" placeholder="Date of Lease" max="2050-12-31">
											</div>
										</div>
									</div>																	  
								<div id="div3" style="display:none;">
								<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-6">
										<label for="inputAddress2">Land Measurement</label>
										<input type="text" class="form-control numberOnly" id="wetland_land_measurement" name="wetland_land_measurement" placeholder="Land Measurement">						
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Land Measurement Unit <span class="text-danger">*</span></label>
										<select class="form-control" id="wetland_land_measurement_unit" name="wetland_land_measurement_unit" required>
										<option value="">Select Land Measurement Unit</option>
										<option value="1">hectare</option>
										<option value="2">square feet</option>
										<option value="3">square arpents</option>			
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-6">
										<label for="inputAddress2">Survey Number</label>
										<input type="text" class="form-control" id="wetland_survey_number" name="wetland_survey_number" maxlength="50" placeholder="Survey Number">						
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Source of Irrigation <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="1" class="form-check-input" required>Well
												</label>
											  </div> 
											</div>

											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="2" class="form-check-input" >Canal
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="3" class="form-check-input" >Tube-well
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="4" class="form-check-input" >Rainfed
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="5" class="form-check-input" >River
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="6" class="form-check-input" >Tanks
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]"  value="7" class="form-check-input">NA
												</label>
											   </div>
											</div>
											 <div class="help-block with-errors text-danger"></div> 
										  </div>
										
									  </div>
									  
									 </div>
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-6" id="number_wells" style="display:none">
										<label for="inputAddress2">Number of Wells</label>
										<input type="text" class="form-control numberOnly" min="1" id="wetland_number_wells" name="wetland_number_wells" placeholder="Number of Wells" >
									</div>
									<div class="form-group col-md-6" id="number_tube_wells" style="display:none">
										<label for="inputAddress2">Number of Tube-wells  </label>
										<input type="text" class="form-control numberOnly" min="1" id="wetland_number_tubewells" name="wetland_number_tubewells" placeholder="Number of Tube-wells " >
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">									
									<div class="form-group col-md-6"  id="wet_method_irrigation" style="display:none">
										  <label class=" form-control-label">Method of Irrigation </label>
										  <div class="row">
											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="1" class="form-check-input"> Open irrigation
												   <div class="help-block with-errors text-danger"></div>
												</label>
											  </div> 
											</div>

											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="2" class="form-check-input"> Drip irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="3" class="form-check-input"> Micro irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="4" class="form-check-input">Sprinkler irrigation
												</label>
											   </div>
											</div>							
										  </div>
									  </div>
									  <div class="form-group col-md-6" id="wet_subsidy_avail" style="display:none">
										<label for="inputAddress2">Subsidy Availed</label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Farm Pond </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												  
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												   
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Address Same as Farmer’s address <span class="text-danger">*</span> </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address"  value="1" class="form-check-input" required><span class="ml-1">Yes</span>												 
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address"  value="2" class="form-check-input" required><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>									
									</div>									
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6" id="wet_farm_subsidy_availed" style="display:none">
										  <label class=" form-control-label">Subsidy Availed </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio"  id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
									<div class="form-group col-md-6" id="wet_farm_construct_farm"style="display:none">
										  <label class=" form-control-label">Interested to construct Farm Pond  </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
									 </div>									
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6" style="display:none;" id="wet_year_subsidy_claim">
										<label for="inputAddress2">Year of Subsidy Claimed</label>
										<input type="text" class="form-control" id="wetland_year_subsidy_Claimed" name="wetland_year_subsidy_Claimed" placeholder="Year of Subsidy Claimed">						
									</div>									
									</div>																	   
									<div id="wet_farm_address" style="display:none">
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-6">
										<label for="inputAddress2">PIN Code <span class="text-danger">*</span></label>
										<input type="text" onkeyup="getwetPincode(this.value)" class="form-control numberOnly" id="wetland_pincode" pattern="[1-9][0-9]{5}" name="wetland_pincode" minlength="6" maxlength="6" placeholder="PIN Code" >						
										 <div class="help-block with-errors text-danger"></div>
									</div>	
									<div class="form-group col-md-6">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_state" name="wetland_state" readonly placeholder="District" required>
											<option value="">Select State </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									 <div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">District <span class="text-danger">*</span> </label>
										<select  class="form-control" id="wetland_district" name="wetland_district" readonly required>
											<option value="">Select District </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_block" name="wetland_block" readonly  required>
											<option value="">Select Block </option>
										</select> 
										 <div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select  class="form-control" id="wetland_taluk" name="wetland_taluk" readonly  required>
											<option value="">Select District </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
										<select id="wetland_gram_panchayat" name="wetland_gram_panchayat" id="wetland_gram_panchayat" class="form-control"  onchange="getwetVillageList(this.value);">
										<option value="">Select Gram Panchayat </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>								
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Village <span class="text-danger">*</span></label>
										<select id="wetland_village" name="wetland_village" class="form-control" >
										 <option value="">Select Village </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street </label>
										<input type="text" id="wetland_street" name="wetland_street" maxlength="75" class="form-control" maxlength="75" id="street" placeholder="Street">	
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Door No </label>
										<input type="text" class="form-control" name="wetland_door_no" maxlength="10" id="wetland_door_no" placeholder="Door No">
									</div>
									</div>
								  </div>
								</div>
								<div id="div4"   style="display:none;">
								    <div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Land Measurement</label>
										<input type="text" class="form-control numberOnly" minlength="3" maxlength="3" id="dryland_land_measurement" name="dryland_land_measurement" placeholder="Land Measurement">						
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Land Measurement Unit <span class="text-danger">*</span></label>
										<select class="form-control" id="dryland_land_measurement_unit" name="dryland_land_measurement_unit"  required>
										<option value="1">hectare</option>
										<option value="2">square feet</option>
										<option value="3">square arpents</option>								
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Survey Number</label>
										<input type="text" class="form-control" id="dryland_survey_number" name="dryland_survey_number" maxlength="50" placeholder="Survey Number">						
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Source of Irrigation <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation1" name="dryland_source_irrigation[]" value="1" class="form-check-input" >Well
												</label>
											  </div> 
											</div>

											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation2" name="dryland_source_irrigation[]" value="2" class="form-check-input" >Canal
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation3" name="dryland_source_irrigation[]" value="3" class="form-check-input" >Tube-well
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation4" name="dryland_source_irrigation[]" value="4" class="form-check-input" >Rainfed
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation5" name="dryland_source_irrigation[]" value="5" class="form-check-input" >River
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation6" name="dryland_source_irrigation[]" value="6" class="form-check-input" >Tanks
												</label>
											   </div>
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_source_irrigation7" name="dryland_source_irrigation[]" value="7" class="form-check-input" required>NA								   
												</label>
											   </div>
											</div>
                                              <div class="help-block with-errors text-danger"></div>											
										  </div>
										 
									  </div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6" id="dry_number_wells" style="display:none">
										<label for="inputAddress2">Number of wells</label>
										<input type="text" class="form-control numberOnly" min="1" max="10" id="dryland_number_wells" name="dryland_number_wells" placeholder="Number of wells" >
									</div>
									<div class="form-group col-md-6" id="dry_tube_wells" style="display:none">
										<label for="inputAddress2">Number of tube-wells  </label>
										<input type="text" class="form-control numberOnly" min="1" max="10" id="dryland_number_tubewells" name="dryland_number_tubewells" placeholder="Number of tube-wells " >
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">										
									<div class="form-group col-md-6" id="dry_method_irrigation" style="display:none">
										  <label class=" form-control-label">Method of Irrigation </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="1" class="form-check-input" > Open irrigation
												</label>
											  </div> 
											</div>

											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="2" class="form-check-input"> Drip irrigation
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="3" class="form-check-input"> Micro irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="dryland_irrigation_method" name="dryland_irrigation_method[]" value="4" class="form-check-input">Sprinkler irrigation										
												</label>
											   </div>
											</div>							
										  </div>
										  	   <div class="help-block with-errors text-danger"></div>
									  </div>
									<div class="form-group col-md-6" id="dry_subsidy_avail" style="display:none">
										<label for="inputAddress2">Subsidy Availed</label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_subsidy_availed" name="dryland_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="dryland_subsidy_availed" name="dryland_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Farm Pond </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_farm_pond" name="dryland_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_farm_pond" name="dryland_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
									  <div class="form-group col-md-6">
										  <label class=" form-control-label">Address Same as Farmer’s address </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_farmer_address" name="dryland_farmer_address" value="1" class="form-check-input"required >Yes
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_farmer_address" name="dryland_farmer_address" value="2" class="form-check-input" required>No
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									 </div>									
									
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6" id="dry_year_subsidy_claim" style="display:none">
										<label for="inputAddress2">Year of Subsidy Claimed</label>
										<input type="text" class="form-control" id="dryland_year_subsidy_claimed" name="dryland_year_subsidy_claimed" placeholder="Year of Subsidy Claimed">						
									</div>
									
									<div class="form-group col-md-6" id="dry_farm_subsidy_availed" style="display:none">
										  <label class=" form-control-label">Subsidy Availed </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio"  id="dryland_farm_subsidy_availed" name="dryland_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_farm_subsidy_availed" name="dryland_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6" id="dry_farm_construct_farm" style="display:none">
										  <label class=" form-control-label">Interested to construct Farm Pond  </label>
										  <div class="row">
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="dryland_construct_form_pond" name="dryland_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="dryland_construct_form_pond" name="dryland_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
								     </div>
									<div id="dry_farm_address" style="display:none;">
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6">
										<label for="inputAddress2">PIN Code <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" id="dryland_pincode" pattern="[1-9][0-9]{5}"  name="dryland_pincode" minlength="6" maxlength="6" placeholder="PIN Code" >						
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select  class="form-control" id="dryland_state" name="dryland_state" readonly required>
											<option value="">Select District </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6">
										<label for="inputAddress2">District <span class="text-danger">*</span></label>
										<select  class="form-control" id="dryland_district" name="dryland_district" readonly required>
											<option value="">Select District </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
											<select  class="form-control" id="dryland_block" name="dryland_block" readonly required>
											<option value="">Select Block </option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select  class="form-control" id="dryland_taluk" name="dryland_taluk" readonly required>
											<option value="">Select District </option>
										</select> 
										<div class="help-block with-errors text-danger"></div>
									</div>					
									<div class="form-group col-md-6">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
										<select id="dryland_gram_panchayat" name="dryland_gram_panchayat" class="form-control"onchange="getdryVillageList(this.value);" >
											<option value="">Select Gram Panchayat </option>													
										</select>		
										 <div class="help-block with-errors text-danger"></div>								
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-6">
										<label for="inputAddress2">Village <span class="text-danger">*</span></label>
										<select id="dryland_village" name="dryland_village" class="form-control"  data-validation-required-message="Please select village.">
										<option value="">Select Village </option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>						
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street</label>
										<input type="text" id="dryland_street" name="dryland_street"  maxlength="75" class="form-control" maxlength="75" id="street" placeholder="Street">	
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-6">
										<label for="inputAddress2">Door No </label>
										<input type="text" class="form-control" name="dryland_door_no" maxlength="10" id="dryland_door_no" placeholder="Door No">
									</div>
									</div>
							    </div>
							</div>
								<div id="div5"  style="display:none;">
								<div class="form-group col-md-12">
									<div class="form-group col-md-6">
										<label for="inputAddress2">Organic Farmer</label>
										<select id="both_organic_former"  name="both_organic_former" class="form-control">
										<option value="">Select Organic Farmer</option>
										<option value="1">Yes</option>
										<option value="2" selected>No</option>
										<option value="3">Both</option>								
										</select>
									</div>
									<div class="form-group col-md-6" id="land_identify" style="display:none">
										<label class=" form-control-label">Land Identification</label>
										<select id="both_land_identification" name="both_land_identification" class="form-control">
										<option value="">Select Land Identification</option>
										<option value="1">1</option>										
										</select>
									</div>
									</div>									
								<div id="organic_farm_details" style="display:none;">
								<!--<h4 class="text-success text-center col-md-12">Organic Farmer Details</h4>-->
								<div class="form-group col-md-12">
									<div class="form-group col-md-4">
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
									<div class="form-group col-md-4">
										<label for="inputAddress2">Certification <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" maxlength="10" id="both_certifiation" name="both_certifiation" placeholder="Certification"  >
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label class=" form-control-label">Initial Date of Certification <span class="text-danger">*</span></label>
										 <input type="date" class="form-control" id="both_intial_date_certifiation" name="both_intial_date_certifiation" placeholder="Initial date of certification" max="2050-12-31" >
										 <div class="help-block with-errors text-danger"></div>
									</div>				
									<div class="form-group col-md-4">
										<label class=" form-control-label">Certification Agency Name <span class="text-danger">*</span></label>
										 <input type="text" class="form-control" maxlength="100" id="both_certifiation_agency_name" name="both_certifiation_agency_name" placeholder="Certification Agency Name"  >
										 <div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12">
								     <div class="form-group col-md-4">
										<label class=" form-control-label">Organic Cultivation Area</label>
										 <input type="text" class="form-control numberOnly" maxlength="3" minlength="3" id="both_organic_cultivation_area" name="both_organic_cultivation_area" placeholder="Organic Cultivation Area">
									</div>
									
									<div class="form-group col-md-4">
										<label class=" form-control-label">Accreditation Type <span class="text-danger">*</span></label>
										<select id="both_accreditation_type " name="both_accreditation_type" class="form-control"  data-validation-required-message="Please select accreditation type.">
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
										<option value="">Select Certified Products</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3"> 3</option>								
										</select>
									</div>
									</div>
									<div class="form-group col-md-12">
									<div class="form-group col-md-4">
										<label class=" form-control-label">Jurisdiction <span class="text-danger">*</span></label>
										<select id="both_jurisdiction" name="both_jurisdiction"  class="form-control" required>
										<option value="">Select Jurisdiction</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>	
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
								    <div class="form-group col-md-5">
										<label class=" form-control-label">Effective Period of Certification(From- To)</label>
										 <input type="date" class="form-control" id="both_effective_period_certifiation" name="both_effective_period_certifiation" placeholder="Effective period of certification (From - To)" >
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
									<div class="form-group col-md-4 mt-2">
										<label class="form-control-label">Name of The Implements <span class="text-danger">*</span></label>
										<select id="farm_implements_name" name="farm_implements_name" class="form-control"   data-validation-required-message="Please selectname of the implements.">
										<option value="">Select Name of The Implements</option>
										<option value="1">test1</option>
										<option value="2">test2</option>										
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label class=" form-control-label">Make</label>
										<select id="farm_implements_make" name="farm_implements_make" class="form-control">
										<option value="">Select Make</option>
										<option value="1">Mahindra</option>
										<option value="2">Indiamart</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label class=" form-control-label">Model</label>
										<select id="farm_implements_model" name="farm_implements_model" class="form-control">
										<option value="">Select Model</option>
										<option value="1">Tractor</option>
										<option value="2">ATV/UTV</option>
										<option value="3">Farm Truck</option>
										<option value="4">Wagon</option>
										</select>
									</div>	
									</div>
									<div class="form-group col-md-12 mt-2">				
									<div class="form-group col-md-4">
										<label class=" form-control-label">Year</label>
										<!--<input type="date" class="form-control"  id="farm_implements_year" name="farm_implements_year" placeholder="Year">-->
	                                    <select id="farm_implements_year" name="farm_implements_year" class="form-control">
										<option value="">Select Year</option>
										<?php 
										   for($i = 1950 ; $i < date('Y'); $i++){
											  echo "<option>$i</option>";
										   }?>
										</select>	
									</div>
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
										<label class=" form-control-label">Purchase through Loan  </label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												   <div class="help-block with-errors text-danger"></div>
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
									</div>
									<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-4">
										<label class=" form-control-label">Insurance Coverage  </label>
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
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>			
										  </div>
									</div>									
									<div class="form-group col-md-4"id="insurance_coverage" style="display:none">
										<label class=" form-control-label">Insurance Validity (from – to) </label>
										<input type="date" class="form-control"  id="farm_implements_insurance_valitity" name="farm_implements_insurance_valitity" placeholder="Insurance Validity (from–to)" max="2050-12-31">
									</div>
								</div>						
							</div>
							</div>
							</div>
							<div id="step-4">
							  <div id="form-step-3" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="col-md-3">&nbsp;</div>                                    							
									 <div class="col-md-6">
									<label class=" form-control-label">Live Stocks</label>
									<select id="live_stocks" name="live_stocks" class="form-control">
									<option value="">Select Live Stocks</option>
									<option value="1">Yes</option>
									<option value="2" selected>No</option>
									</select>
									</div>
									<div class="col-md-3">&nbsp;</div>
									</div>
								</div>
								<div id="live_stocks_form" style="display:none;">
										<div class="form-group col-md-12 mt-2">
										<hr style="border-bottom:1px solid black;">
										</div>
										<div class="form-group col-md-12 mt-3">
											<div class="form-group col-md-4">
												<label class=" form-control-label">Name of the Live Stock <span class="text-danger">*</span> </label>
												<select id="inputState" class="form-control" name="live_stocks_name" id="live_stocks_name" data-validation-required-message="Please select name of the live stock.">
												<option value="">Select Name of the Live Stock </option>
												<option value="1">test1 </option>
												<option value="2">test2 </option>
												</select>
												 <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-4">
												<label class=" form-control-label">Variety</label>
												<select id="inputState" class="form-control" name="live_stocks_variety"  placeholder="Variety">
												<option value="">Select Variety </option>
												<option value="">Crop Variety</option>
												<?php for($i=0; $i<count($variety);$i++) { ?>										
												 <option value="<?php echo $variety[$i]->id; ?>"><?php echo $variety[$i]->variety; ?></option>
												<?php } ?>
												</select>
											</div>
											<div class="form-group col-md-4">
												<label class=" form-control-label">Numbers </label>
												<input type="text" class="form-control numberOnly" maxlength="4" minlength="4" name="live_stocks_numbers"  id="live_stocks_numbers" placeholder="Numbers">
												 <div class="help-block with-errors text-danger"></div>
											</div>
											</div>
									<div class="form-group col-md-12 mt-2">															
										<div class="form-group col-md-4">
											<label class="form-control-label">Purchase through Loan  </label>
											  <div class="row">
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio1" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan " name="live_stocks_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
													   
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan"  name="live_stocks_purchase_loan" value="2" class="form-check-input"><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>
											
										</div>
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
										<div class="form-group col-md-4">
											<label class=" form-control-label">Insurance Validity (from – to)</label>
											<input type="date" class="form-control"  id="live_stocks_insurance_validity" placeholder="Insurance Validity (from –to)" max="2050-12-31">
										</div>
										</div>
								 </div>
								 <div class="form-group col-md-12 text-center">
									<input  value="Submit" align="center" name="profilesubmit" class="btn btn-success text-center" type="submit">
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
			<?php $this->load->view('templates/datatable.php');?> 
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
						var inp = $(this);
						if(elmForm){
							elmForm.validator('validate');
							var elmErr = elmForm.find('.has-error');
							if(elmErr && elmErr.length > 0){
								alert('Oops we still have error in the form');
								return true;
							}else{
								alert('Great! we are ready to submit form');
								elmForm.submit();
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
					  if(stepDirection === 'forward' && elmForm){
						elmForm.validator('validate');
			  
						var elmErr = elmForm.children().children('.has-error');

						if($("#land_holdings2").find('input').val()==1){
							  var elmErr2 = elmForm.children().children().children('.has-error');  
						}
							
						//console.log($("#land_holdings2").find('input').val());
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
				var both_organic_certifiation=$("input[name='both_organic_certifiation']");
				//farm implements
				var farm_insurance_couverage=$("input[name='farm_implements_insurance_coverage']");
				var farm_purchase_loan=$("input[name='farm_implements_purchase_loan']");
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
					   $('#div3').show();
					   //$("input[id='wetland_source_irrigation']").prop('required',true);
					  
					   $('#div4').hide();
					   $('#div5').hide();
					   $('.btn_profile').hide();
					   } else if(chkId==2){
					   $('#div4').show();
					   $("#wetland_land_measurement_unit").prop('required',false);
					   $("#wetland_source_irrigation").prop('required',false);
					   $("#wetland_farmer_address").prop('required',false);
					   $('#div3').hide();
					   $('#div5').hide();
					   $('.btn_profile').hide();
					   } else if(chkId==3){
					   $('#div5').show();
					   $('#div4').hide();
					   $('#div3').hide();
					   $('.btn_profile').hide();
					   $('#datatable_script').hide();
					   }		  
					} 
					// land ownership condition
					if (lease.is(':checked')) {
					  $("input[name='land_ownership']:checked").each ( function() {
							chk_dateof_lease = $(this).val() + ",";
							chk_dateof_lease = chk_dateof_lease.slice(0, -1);
					 });
					  if(chk_dateof_lease==1 || chk_dateof_lease==2){
						   $('#landowner').show();						
					  }else{
						  $('#landowner').hide();	
					  }
					  
					  if(chk_dateof_lease==1){
					   $('#date_of_lease').hide();				   
					   }else if(chk_dateof_lease==2){
					   $('#date_of_lease').show();	
					   }
					}
					//wet land source of irrigation  condition
                    if (wetland_irrigation.is(':checked')) {
                         $("input[name='wetland_source_irrigation[]']:checked").each ( function() {
							chk_wet_irrigation = $(this).val() + ",";
							chk_wet_irrigation = chk_wet_irrigation.slice(0, -1);
					   });
                        
					   if(chk_wet_irrigation==1){
						$('#number_wells').show();
					   }else if(chk_wet_irrigation==3){
						$('#number_tube_wells').show();	
					   }else if(chk_wet_irrigation==7){
					   $('#wet_method_irrigation').show();					   
					   }
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
						$("#wetland_village").prop('required',true);
					   }else {					   
					   $('#wet_farm_address').hide();
					   }
                    }
					//dry land source of irrigation condition
					 if (dryland_irrigation.is(':checked')) {
                         $("input[name='dryland_source_irrigation[]']:checked").each ( function() {
							chk_dry_irrigation = $(this).val() + ",";
							chk_dry_irrigation = chk_dry_irrigation.slice(0, -1);
					   });
                        
					   if(chk_dry_irrigation==1){
						$('#dry_number_wells').show();
					   }else if(chk_dry_irrigation==3){
						$('#dry_tube_wells').show();	
					   }else if(chk_dry_irrigation==7){
					   $('#dry_method_irrigation').show();
					   $("#dryland_irrigation_method").prop('required',true);
					   }
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
						$("#dryland_village").prop('required',true);
					   }else {					   
					   $('#dry_farm_address').hide();
					   }
                    }
					
					//both farm condition
					if(both_organic_certifiation.is(':checked')) {
                         $("input[name='both_organic_certifiation']:checked").each ( function() {
							organic_certification= $(this).val() + ",";
							organic_certification = organic_certification.slice(0, -1);
					   });
                        
					   if(organic_certification==1){
					  	$('#organic_with_certification').show();
						$("#both_certifiation").prop('required',true);
						$("#both_intial_date_certifiation").prop('required',true);
						$("#both_effective_period_certifiation").prop('required',true);
						$("#both_certifiation_agency_name").prop('required',true);
					   }else {					   
					   $('#organic_with_certification').hide();
					   }
                    }
					
					//farm implements

					if(farm_insurance_couverage.is(':checked')) {
                         $("input[name='farm_implements_insurance_coverage']:checked").each ( function() {
							chk_farm_coverage= $(this).val() + ",";
							chk_farm_coverage = chk_farm_coverage.slice(0, -1);
					   });
                        
					   if(chk_farm_coverage==1){
					  	$('#insurance_coverage').show();
					   }else {					   
					   $('#insurance_coverage').hide();
					   }
                    }
					if(farm_purchase_loan.is(':checked')) {
                         $("input[name='farm_implements_purchase_loan']:checked").each ( function() {
							chk_farm_loan= $(this).val() + ",";
							chk_farm_loan = chk_farm_loan.slice(0, -1);
					   });
                        
					   if(chk_farm_loan==1){
					  	$('#purchase_loan').show();
					   }else {					   
					   $('#purchase_loan').hide();
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
				}else{
				  $('#farm_implements_form').hide();
				}									
			});
			$('select[name="live_stocks"]').on('change', function() {
				var live_stocks = $(this).val();
                if(live_stocks==1){
				  $('#live_stocks_form').show();
				  $("#live_stocks_name").prop('required',true);
				}else{
				  $('#live_stocks_form').hide();
				}									
			});
            $('select[name="both_organic_former"]').on('change', function() {
				var organic_form = $(this).val();
                if(organic_form==1){
				  $('#organic_farm_details').show();
				  $("#both_organic_certifiation").prop('required',true);
				  $('#land_identify').show();
				}else if(organic_form==2){
				  $('#organic_farm_details').hide();
				  $('#land_identify').hide();
				}else if(organic_form==3){
				  $('#organic_farm_details').show();
				  $('#land_identify').show();
				  $("#both_organic_certifiation").prop('required',true);
				}									
			});
            $('select[name="farmer_land_holdings"]').on('change', function() {
				var farmer_land_holdings = $(this).val();
                if(farmer_land_holdings == 1){
				  $('#land_holdings1').show();
				  $('#land_holdings2').show();
				} else if(farmer_land_holdings == 2){
				  $('#land_holdings1').hide();
				  $('#land_holdings2').hide();
				  $('#div3').hide();
				  $('#div4').hide();
				  $('#div5').hide();
				  $('#date_of_lease').hide();
				} else{
				  $('#land_holdings1').show();
				  $('#land_holdings2').show();				 
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
					$(this)
					.hide();
					$("#abcd" + abc).append($("<button/>",{
						class:'btn-primary mt-3',
						text:'Delete',
						href:'assets/img/pdf_icon.png'
					}) .click(function ()
					{
						$(this)
						.parent()
						.remove();
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
			function imageIsLoaded(e)
			{
				$('#previewimg' + abc)
				.attr('src', e.target.result);
			}
			
			/* $('form').submit(function(e){
				e.preventDefault(); 
				const farmerData = $('#farmer_profileForm').serializeObject();
				console.log(farmerData);
				
			 	$.ajax({
					url:"<?php echo base_url();?>administrator/farmer/postfarmer",
					type:"POST",
					data:farmerData,
					dataType:"html",
					cache:false,			
					success:function(response){		  
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(response);
						
						if(responseArray.status == 1){
							$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
							window.location = "<?php echo base_url('fpo/farmer/profilelist')?>";
						}
					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
				}); 
            }); */
		/* 	$.fn.serializeObject = function() {
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
			}; */
		
        });
		  
		  	function getfarmerPincode( farmer_pin_code ) {
		  if(farmer_pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+farmer_pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
				response=response.trim();
				responseArray=$.parseJSON(response);
                document.getElementById("farmer_state").value = responseArray.getlocation['state_name'];
                document.getElementById("farmer_district").value = responseArray.getlocation['district_name'];
                document.getElementById("farmer_block").value = responseArray.getlocation['division_name'];
					 document.getElementById("farmer_taluk").value = responseArray.getlocation['taluk'];
                document.getElementById("farmer_gram_panchayat").value = responseArray.getlocation['office_name'];
                document.getElementById("farmer_village").value = responseArray.getlocation['office_name'];
                $('#farmer_gram_panchayat').html('<option value="0">Select Gram Panchayat </option>');
                $('#farmer_village').html('<option value="0">Select Village </option>');
                var pancahayatArray = responseArray.panchayat;
                $.each(pancahayatArray,function(key,value){ 
                  var panch_name = value.office_name;					
							$('#farmer_gram_panchayat').append('<option value='+panch_name+'>'+panch_name+'</option>');
                     $('#farmer_village').append('<option value='+panch_name+'>'+panch_name+'</option>');
                });
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}
		function getfarmerPincode( farmer_pin_code ) {
			 if(farmer_pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+farmer_pin_code,
					type:"GET",
					data:"",
					dataType:"html",
						cache:false,			
					success:function(response) {
							 console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
							 
							 var village = '<option value="">Select Village</option>';
							 var state = '';
							 var district = '';
							 var block ='';
							 var taluk ='';
							 var village = '<option value="">Select Village</option>';
							 var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
							 $.each(responseArray.getlocation['villageInfo'],function(key, value){
								  village += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
							 $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
								  gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
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
							 $('#farmer_village').html(village);
							 $('#farmer_gram_panchayat').html(gram_panchayat);
							 $('#farmer_state').html(state);
							 $('#farmer_district').html(district);
							 $('#farmer_block').html(block);
							 $('#farmer_taluk').html(taluk);
							 
						},
					error:function(response){
						alert('Error!!! Try again');
					} 			
					}); 
			 }
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
							 var village = "";var gram_panchayat = "";
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
		function getwetVillageList( panchayat_code ) {
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
							 var village = "";var gram_panchayat = "";
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
		function getdryVillageList( panchayat_code ) {
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
							 var village = "";var gram_panchayat = "";
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
		function getwetPincode( wetland_pin_code ) {
			 if(wetland_pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+wetland_pin_code,
					type:"GET",
					data:"",
					dataType:"html",
						cache:false,			
					success:function(response) {
							 console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
							 
							 var village = '<option value="">Select Village</option>';
							 var state = '';
							 var district = '';
							 var block ='';
							 var taluk ='';
							 var village = '<option value="">Select Village</option>';
							 var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
							 $.each(responseArray.getlocation['villageInfo'],function(key, value){
								  village += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
							 $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
								  gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
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
							 $('#wetland_village').html(village);
							 $('#wetland_gram_panchayat').html(gram_panchayat);
							 $('#wetland_state').html(state);
							 $('#wetland_district').html(district);
							 $('#wetland_block').html(block);
							 $('#wetland_taluk').html(taluk);
							 
						},
					error:function(response){
						alert('Error!!! Try again');
					} 			
					}); 
			 }
		}    
		
		function getPincode( dryland_pin_code ) {
			 if(dryland_pin_code.length == 6) {
				  $.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+dryland_pin_code,
					type:"GET",
					data:"",
					dataType:"html",
						cache:false,			
					success:function(response) {
							 console.log(response);
						response=response.trim();responseArray=$.parseJSON(response);
							 
							 var village = '<option value="">Select Village</option>';
							 var state = '';
							 var district = '';
							 var block ='';
							 var taluk ='';
							 var village = '<option value="">Select Village</option>';
							 var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
							 $.each(responseArray.getlocation['villageInfo'],function(key, value){
								  village += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
							 $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
								  gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
							 });
							 
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
							 $('#dryland_village').html(village);
							 $('#dryland_gram_panchayat').html(gram_panchayat);
							 $('#dryland_state').html(state);
							 $('#dryland_district').html(district);
							 $('#dryland_block').html(block);
							 $('#dryland_taluk').html(taluk);
							 
						},
					error:function(response){
						alert('Error!!! Try again');
					} 			
					}); 
			 }
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
                console.log(responseArray);mbl_validate
                if(responseArray.status == 1){
                    $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
        } else {
                    $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                } 
            }
         });            
    }
    
}
	
	
    </script>