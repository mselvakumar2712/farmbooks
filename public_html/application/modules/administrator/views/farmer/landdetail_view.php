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
                        <h1>View Farmer's Land Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('administrator/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">View Farmer's Land Details</li>
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
							 <form action="#" id="farmer_profileForm"  name="farmer_profileForm" method="post"  enctype="multipart/form-data" >

                        <div id="step-2" >
                                    <div id="form-step-1" role="form" data-toggle="validator">
                                      <div class="form-group col-md-12 mt-2">
                                        <div class="form-group col-md-5">
                                            <label class="form-control-label">Select Farmer <span class="text-danger">*</span></label>
                                            <select class="form-control" name="land_detail_farmer" id="land_detail_farmer" data-validation-required-message="Select farmer" required readonly="true">
                                                <option value="">Select Farmer</option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>  
                                        <div class="form-group col-md-5">
                                          <label for="inputState">Land Holdings</label>
                                            <input type="hidden" name="land_holding_id" id="land_holding_id" value="">
                                          <select  class="form-control" id="farmer_land_holdings" disabled name="farmer_land_holdings" required data-validation-required-message="Please select land holdings." readonly>
                                            <option value="">Select Land Holdings</option>
                                            <option value="1" selected>Yes</option>
                                            <option value="2">No</option>
                                          </select>
                                          <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-2 mt-4" style="">
                                            <a href="#" id="addLandHref">
                                                <button type="button" class="btn btn-success btn-labeled">
                                                     <i class="fa fa-plus-square"></i> <span class="ml-2"> Add More Land</span>
                                                </button>
                                            </a>
                                        </div>
                                      </div>
                                        
                                      <div class="form-group col-md-12 mt-4" id="land_holdings1">
                                        <div class="form-group col-md-4">
                                              <label class=" form-control-label">Land Ownership <span class="text-danger">*</span></label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="land_ownership" name="land_ownership" disabled value="1" class="form-check-input"><span class="ml-1">Own</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="land_ownership" name="land_ownership" disabled value="2" class="form-check-input"><span class="ml-1">Lease</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        
                                        <div class="form-group col-md-4" id="landowner" style="display:none">
                                            <label for="inputAddress2">Name of the Land Owner </label>
                                            <input type="text" class="form-control" maxlength="50" name="land_owner"  id="land_owner" disabled placeholder="Name of the Land Owner ">
                                        </div>
                                          
                                        <div class="form-group col-md-4 mt-2">
                                              <label class=" form-control-label">Type of Land <span class="text-danger">*</span></label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="land_type" name="land_type" value="1" class="form-check-input" disabled><span class="ml-1">Wet</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" name="land_type" id="land_type"  value="2" class="form-check-input" disabled><span class="ml-1"> Dry</span>
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="land_type" name="land_type" value="3" class="form-check-input" disabled><span class="ml-1"> Both</span>											  
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
                                                    <label for="inputAddress2">Number of Years of Lease </label>
                                                    <input type="text" class="form-control numberOnly" name="land_year_lease" id="land_year_lease" disabled maxlength="3" placeholder="Number of Years of Lease">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Date of Lease </label>
                                                    <input type="date" class="form-control" name="land_date_lease" disabled id="land_date_lease" placeholder="Date of Lease" max="2050-12-31">
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
                                        <div class="form-group col-md-12" id="wetland_holdings2_0">
                                            <div class="form-group col-md-6">
                                                <input type="hidden" name="wet_land_id[]" id="wet_land_id" value="">
                                                <input type="text" class="form-control" name="wet_land_identification[]" id="wet_land_identification" maxlength="50" placeholder="Land Identification" readonly>
                                            </div>	
                                            <div class="form-group col-md-6">
                                                <div class="form-group col-md-5">
                                                    <input type="text" class="form-control numberOnly" maxlength="3" id="wetland_land_measurement" readonly name="wetland_land_measurement[]" placeholder="Measurement">						
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="form-control" id="wetland_land_measurement_unit" name="wetland_land_measurement_unit[]" readonly>
                                                    <option value="">Select Measurement Unit</option>
													<?php for($i=0;$i<count($area_uom);$i++){ ?>
													<option value="<?php echo $area_uom[$i]->id; ?>"><?php echo $area_uom[$i]->full_name; ?></option>
													<?php } ?>
                                                    </select>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-1" title="Delete this entire row by click" id="removeCreatedElement" style="display: none;">
                                                    <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeWetLandMeasure(this)"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreWetLandIdentify();" style="background-color: #afd66b;color: black;display: none;" id="wet_add_more">Add More</button>
                                    </div>
                                        
                                        <div class="form-group col-md-12 mt-4">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Survey Number</label>
                                            <input type="text" class="form-control text-uppercase" id="wetland_survey_number" name="wetland_survey_number" disabled maxlength="50" placeholder="Survey Number">						
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Source of Irrigation </label>
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation1" name="wetland_source_irrigation[]" disabled value="1" class="form-check-input">Well
                                                    </label>
                                                  </div> 
                                                </div>

                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" disabled value="2" class="form-check-input" >Canal
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation3" name="wetland_source_irrigation[]" disabled value="3" class="form-check-input" >Tube-well
                                                    </label>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" disabled value="4" class="form-check-input" >Rainfed
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" disabled value="5" class="form-check-input" >River
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_source_irrigation" name="wetland_source_irrigation[]" disabled value="6" class="form-check-input" >Tanks
                                                    </label>
                                                   </div>
                                                </div>           
                                              </div>
                                          </div>

                                         </div>
                                        
                                        <div class="form-group col-md-12 mt-2">
                                            <div class="form-group col-md-6" id="number_wells" style="display:none">
                                                <label for="inputAddress2">Number of Wells</label>
                                                <input type="text" class="form-control numberOnly" maxlength="1" id="wetland_number_wells" name="wetland_number_wells" disabled placeholder="Number of Wells" >
                                            </div>
                                            <div class="form-group col-md-6" id="number_tube_wells" style="display:none">
                                                <label for="inputAddress2">Number of Tube-wells  </label>
                                                <input type="text" class="form-control numberOnly" maxlength="1" id="wetland_number_tubewells" name="wetland_number_tubewells" disabled placeholder="Number of Tube-wells " >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 mt-2">									
                                            <div class="form-group col-md-4" id="wet_method_irrigation" style="display:block;">
                                              <label class=" form-control-label">Method of Irrigation </label>
                                              <div class="row">                      
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                     <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="2" disabled class="form-check-input"> Drip irrigation
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="3" disabled class="form-check-input"> Micro irrigation
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="wetland_irrigation_method" name="wetland_irrigation_method[]" value="4" disabled class="form-check-input">Sprinkler irrigation
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
                                                          <input type="radio" id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="1" disabled class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio"id="wetland_subsidy_availed" name="wetland_subsidy_availed" value="2" disabled class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                            </div>
                                            <div class="form-group col-md-4" style="display:none;" id="wet_year_subsidy_claim">
                                                <label for="inputAddress2">Year of Subsidy Claimed</label>
                                                <select id="wetland_year_subsidy_Claimed" name="wetland_year_subsidy_Claimed" class="form-control" disabled>
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
                                                      <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" value="1" disabled class="form-check-input"><span class="ml-1">Yes</span>

                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="wetland_farm_pond" name="wetland_farm_pond" disabled value="2" class="form-check-input"><span class="ml-1">No</span>

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
                                                          <input type="radio"  id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed" disabled value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio" id="wetland_farm_subsidy_availed" name="wetland_farm_subsidy_availed"  disabled value="2" class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                                </div>
                                                <div class="form-group col-md-12" id="wet_farm_construct_farm"style="display:none">
                                                  <label class=" form-control-label">Interested to construct Farm Pond  </label>
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label">
                                                          <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="1" disabled class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio" id="wetland_construct_form_pond" name="wetland_construct_form_pond" value="2" disabled class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                              <label class=" form-control-label">Address Same as Farmer's address <span class="text-danger">*</span> </label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address" value="1" disabled class="form-check-input"><span class="ml-1">Yes</span>												 
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="wetland_farmer_address" name="wetland_farmer_address"  value="2" disabled class="form-check-input"><span class="ml-1">No</span>
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
                                            <input type="text" onkeyup="getwetPincode(this.value)" class="form-control numberOnly" id="wetland_pincode" disabled pattern="[1-9][0-9]{5}" name="wetland_pincode" minlength="6" maxlength="6" placeholder="PIN Code" >
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>	
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">State <span class="text-danger">*</span></label>
                                            <select class="form-control" id="wetland_state" name="wetland_state" readonly placeholder="District" required>
                                                <option value="<?php echo $landInfo[0]->state; ?>"><?php echo $landInfo[0]->state_name; ?></option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">District <span class="text-danger">*</span> </label>
                                            <select class="form-control" id="wetland_district" name="wetland_district" readonly required>
                                                <option value="<?php echo $landInfo[0]->district; ?>"><?php echo $landInfo[0]->district_name; ?></option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">	
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
                                            <select class="form-control" id="wetland_taluk" name="wetland_taluk" disabled>
                                                <?php for($i=0; $i<count($talukInfo);$i++) { ?>
												<option value="<?php echo $talukInfo[$i]->taluk_code; ?>" <?php if($talukInfo[$i]->taluk_code == $landInfo[0]->taluk){ ?>selected<?php } ?> ><?php echo $talukInfo[$i]->name; ?></option>
												<?php } ?>	
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Block <span class="text-danger">*</span></label>
                                            <select  class="form-control" id="wetland_block" name="wetland_block" disabled>
                                                <?php for($i=0; $i<count($blockInfo);$i++) { ?>
												<option value="<?php echo $blockInfo[$i]->block_code; ?>" <?php if($blockInfo[$i]->block_code == $landInfo[0]->block){ ?>selected<?php } ?> ><?php echo $blockInfo[$i]->name; ?></option>
												<?php } ?>
                                            </select> 
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Gram Panchayat<span class="text-danger">*</span></label>
                                            <select id="wetland_gram_panchayat" name="wetland_gram_panchayat" id="wetland_gram_panchayat" class="form-control" disabled>
                                            <option value="<?php echo $landInfo[0]->panchayat; ?>"><?php echo $landInfo[0]->panchayat_name; ?></option>
                                            </select>
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">	
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Village </label>
                                            <select id="wetland_village" name="wetland_village" disabled class="form-control">
                                            <option value="<?php echo $landInfo[0]->village; ?>"><?php echo $landInfo[0]->village_name; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Street </label>
                                            <input type="text" id="wetland_street" disabled name="wetland_street" maxlength="75" class="form-control" id="street" placeholder="Street">	
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputAddress2">Door No </label>
                                            <input type="text" class="form-control" disabled name="wetland_door_no" maxlength="10" id="wetland_door_no" placeholder="Door No">
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                        
                                    <div id="div4" style="display:none;">
                                        <div class="form-group col-md-12" id="dryland_holdings2_0">	
                                            <div class="form-group col-md-6">
                                                <input type="hidden" name="dry_land_id[]" id="dry_land_id" value="">
                                                <input type="text" class="form-control" name="dry_land_identification[]" readonly id="dry_land_identification" maxlength="50" placeholder="Land Identification">
                                            </div>	
                                            <div class="form-group col-md-6">
                                                <div class="form-group col-md-5">
                                                    <input type="text" class="form-control numberOnly" maxlength="3" readonly id="dryland_land_measurement" name="dryland_land_measurement[]" placeholder="Measurement">				
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <select class="form-control" id="dryland_land_measurement_unit" name="dryland_land_measurement_unit[]" readonly>
                                                        <option value="">Select Measurement Unit</option>
														<?php for($i=0;$i<count($area_uom);$i++){ ?>
														<option value="<?php echo $area_uom[$i]->id; ?>"><?php echo $area_uom[$i]->full_name; ?></option>
														<?php } ?>
                                                    </select>
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-1" title="Delete this entire row by click" id="removeCreatedElement" style="display: none;">
                                                    <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeDryLandMeasure(this)"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreDryLandIdentify();" style="background-color: #afd66b;color: black;display: none;" id="dry_add_more">Add More</button>
                                    </div>
                                        
                                    <div class="form-group col-md-12 mt-4">	
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Survey Number</label>
                                            <input type="text" class="form-control text-uppercase" id="dryland_survey_number" name="dryland_survey_number" disabled maxlength="50" placeholder="Survey Number">						
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Source of Irrigation </label>
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation1" name="dryland_source_irrigation[]" disabled value="1" class="form-check-input">Well
                                                    </label>
                                                  </div> 
                                                </div>

                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation2" name="dryland_source_irrigation[]" disabled value="2" class="form-check-input">Canal
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation3" disabled name="dryland_source_irrigation[]" value="3" class="form-check-input">Tube-well
                                                    </label>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation4" disabled name="dryland_source_irrigation[]" value="4" class="form-check-input">Rainfed
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation5" disabled name="dryland_source_irrigation[]" value="5" class="form-check-input">River
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_source_irrigation6" disabled name="dryland_source_irrigation[]" value="6" class="form-check-input">Tanks
                                                    </label>
                                                   </div>
                                                </div>              
                                              </div>

                                          </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 mt-2">	
                                            <div class="form-group col-md-6" id="dry_number_wells" style="display:none">
                                                <label for="inputAddress2">Number of wells</label>
                                                <input type="text" class="form-control numberOnly" maxlength="1" id="dryland_number_wells" disabled name="dryland_number_wells" placeholder="Number of wells" >
                                            </div>
                                            <div class="form-group col-md-6" id="dry_tube_wells" style="display:none">
                                                <label for="inputAddress2">Number of tube-wells  </label>
                                                <input type="text" class="form-control numberOnly" maxlength="1" id="dryland_number_tubewells" disabled name="dryland_number_tubewells" placeholder="Number of tube-wells" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-12 mt-2">										
                                            <div class="form-group col-md-4" id="dry_method_irrigation" style="display:block;">
                                              <label class=" form-control-label">Method of Irrigation </label>
                                              <div class="row">                        
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                     <input type="checkbox" id="dryland_irrigation_method" disabled name="dryland_irrigation_method[]" value="2" class="form-check-input"> Drip irrigation
                                                    </label>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_irrigation_method" disabled name="dryland_irrigation_method[]" value="3" class="form-check-input"> Micro irrigation
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="dryland_irrigation_method" disabled name="dryland_irrigation_method[]" value="4" class="form-check-input">Sprinkler irrigation										
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
                                                          <input type="radio" id="dryland_subsidy_availed" disabled name="dryland_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio"id="dryland_subsidy_availed" disabled name="dryland_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                            </div>
                                            <div class="form-group col-md-4" id="dry_year_subsidy_claim" style="display:none">
                                                <label for="inputAddress2">Year of Subsidy Claimed</label>
                                                <select id="dryland_year_subsidy_claimed" name="dryland_year_subsidy_claimed" class="form-control" disabled>
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
                                                      <input type="radio" id="dryland_farm_pond"  disabled name="dryland_farm_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="dryland_farm_pond"  disabled name="dryland_farm_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
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
                                                          <input type="radio"  id="dryland_farm_subsidy_availed" disabled name="dryland_farm_subsidy_availed" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio" id="dryland_farm_subsidy_availed" disabled name="dryland_farm_subsidy_availed" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group col-md-12" id="dry_farm_construct_farm" style="display:none">
                                                  <label class=" form-control-label">Interested to construct Farm Pond  </label>
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label">
                                                          <input type="radio" id="dryland_construct_form_pond" disabled name="dryland_construct_form_pond" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio" id="dryland_construct_form_pond" disabled name="dryland_construct_form_pond" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                              </div>
                                          </div>
                                            
                                          <div class="form-group col-md-4">
                                              <label class=" form-control-label">Address Same as Farmer's address <span class="text-danger">*</span></label>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="dryland_farmer_address" disabled name="dryland_farmer_address" value="1" class="form-check-input">Yes
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="dryland_farmer_address" disabled name="dryland_farmer_address" value="2" class="form-check-input">No
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
                                            <input type="text" class="form-control numberOnly" disabled onkeyup="getPincode(this.value)" id="dryland_pincode" pattern="[1-9][0-9]{5}"  name="dryland_pincode" minlength="6" maxlength="6" placeholder="PIN Code">
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">State <span class="text-danger">*</span></label>
                                            <select class="form-control" id="dryland_state" name="dryland_state" readonly>
                                                <option value="<?php echo $landInfo[0]->state; ?>"><?php echo $landInfo[0]->state_name; ?></option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">District <span class="text-danger">*</span></label>
                                            <select class="form-control" id="dryland_district" name="dryland_district" readonly>
                                                <option value="<?php echo $landInfo[0]->district; ?>"><?php echo $landInfo[0]->district_name; ?></option>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">	
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
                                            <select class="form-control" id="dryland_taluk" name="dryland_taluk" disabled>
                                                <?php for($i=0; $i<count($talukInfo);$i++) { ?>
												<option value="<?php echo $talukInfo[$i]->taluk_code; ?>" <?php if($talukInfo[$i]->taluk_code == $landInfo[0]->taluk){ ?>selected<?php } ?> ><?php echo $talukInfo[$i]->name; ?></option>
												<?php } ?>	
                                            </select> 
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>	
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Block <span class="text-danger">*</span></label>
                                            <select class="form-control" id="dryland_block" name="dryland_block" disabled>
                                                <?php for($i=0; $i<count($blockInfo);$i++) { ?>
												<option value="<?php echo $blockInfo[$i]->block_code; ?>" <?php if($blockInfo[$i]->block_code == $landInfo[0]->block){ ?>selected<?php } ?> ><?php echo $blockInfo[$i]->name; ?></option>
												<?php } ?>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
                                            <select id="dryland_gram_panchayat" name="dryland_gram_panchayat" disabled class="form-control">
                                                <option value="<?php echo $landInfo[0]->panchayat; ?>"><?php echo $landInfo[0]->panchayat_name; ?></option>
                                            </select>		
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">		
                                        <div class="form-group col-md-4">
                                            <label for="inputAddress2">Village </label>
                                            <select id="dryland_village" name="dryland_village" disabled class="form-control">
                                            <option value="<?php echo $landInfo[0]->village; ?>"><?php echo $landInfo[0]->village_name; ?></option>
                                            </select>
                                        </div>						
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Street </label>
                                            <input type="text" id="dryland_street" name="dryland_street" disabled maxlength="75" class="form-control" id="street" placeholder="Street">	
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputAddress2">Door No </label>
                                            <input type="text" class="form-control" name="dryland_door_no" disabled maxlength="10" id="dryland_door_no" placeholder="Door No">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                        
                                    <div id="div5" style="display:none;">
								    <div class="form-group col-md-12" id="bothland_holdings_0">
                                        <div class="form-group col-md-3">
                                            <input type="hidden" name="both_land_id[]" id="both_land_id" value="">
                                            <input type="text" class="form-control" name="both_land_identification[]"  id="both_land_identification" maxlength="50" placeholder="Land Identification" readonly>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control numberOnly" maxlength="3" id="both_land_measurement" name="both_land_measurement[]" placeholder="Measurement" readonly>					
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" id="both_land_measurement_unit" name="both_land_measurement_unit[]" readonly>
                                                <option value="">Select Measurement</option>
												<?php for($i=0;$i<count($area_uom);$i++){ ?>
												<option value="<?php echo $area_uom[$i]->id; ?>"><?php echo $area_uom[$i]->full_name; ?></option>
												<?php } ?>
                                            </select>
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <select class="form-control" id="identity_type" name="identity_type[]" readonly>
                                                <option value="">Select Land Type</option>
                                                <option value="1">Wet Land</option>
                                                <option value="2">Dry Land</option>
                                            </select>                      
                                            <div class="help-block with-errors text-danger"></div>
                                        </div> 
                                        <div class="form-group col-md-1">
                                            <label title="Delete this entire row by click" id="removeBothCreatedElement" class="" style="float: right;display: none;">
                                                <i class="fa fa-times text-danger" aria-hidden="true" onclick="removeBothLandMeasure(this);" style="padding: 5px 7px 5px 7px;"></i>
                                            </label>
                                        </div>    
									</div>
                                    
                                    <div class="form-group col-md-12 pl-5 mb-0" id="">
                                        <button type="button" class="btn btn-default" onclick="GetMoreBothLandIdentify();" style="background-color: #afd66b;color: black;display: none;" id="both_add_more">Add More</button>
                                    </div>
                                    
									<div class="form-group col-md-12 mt-4">	
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Survey Number</label>
                                            <input type="text" class="form-control text-uppercase" id="both_survey_number" name="both_survey_number" maxlength="50" placeholder="Survey Number" disabled>	
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Source of Irrigation </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation1" name="both_source_irrigation[]" value="1" class="form-check-input both_source_irrigation" disabled>Well
                                                    </label>
                                                  </div> 
                                                </div>

                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="2" class="form-check-input both_source_irrigation" disabled>Canal
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation3" name="both_source_irrigation[]" value="3" class="form-check-input both_source_irrigation" disabled>Tube-well
                                                    </label>
                                                   </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="4" class="form-check-input both_source_irrigation" disabled>Rainfed
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="5" class="form-check-input both_source_irrigation" disabled>River
                                                    </label>
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="checkbox" id="both_source_irrigation" name="both_source_irrigation[]" value="6" class="form-check-input both_source_irrigation" disabled>Tanks
                                                    </label>
                                                   </div>
                                                </div>							
                                              </div>
                                          </div>
                                    </div>
                                    
									<div class="form-group col-md-12">	
                                        <div class="form-group col-md-6" id="bothland_number_wells" style="display:none">
                                            <label for="inputAddress2">Number of Wells</label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="both_number_wells" name="both_number_wells" placeholder="Number of wells" disabled>
                                        </div>
                                        <div class="form-group col-md-6" id="bothland_tube_wells" style="display:none">
                                            <label for="inputAddress2">Number of Tube-wells  </label>
                                            <input type="text" class="form-control numberOnly" maxlength="1" id="both_number_tubewells" name="both_number_tubewells" placeholder="Number of tube-wells" disabled>
                                        </div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">										
									<div class="form-group col-md-4" id="both_method_irrigation" style="">
										  <label class=" form-control-label">Method of Irrigation</label>
										  <div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												 <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="2" class="form-check-input" disabled> Drip Irrigation
												</label>
											   </div>
											</div>
											</div>
											<div class="row">
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="3" class="form-check-input" disabled> Micro Irrigation
												</label>
											   </div>
											</div>
											<div class="col-md-12">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="both_irrigation_method" name="both_irrigation_method[]" value="4" class="form-check-input" disabled>Sprinkler Irrigation										
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
												  <input type="radio" id="both_subsidy_availed" name="both_subsidy_availed" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"id="both_subsidy_availed" name="both_subsidy_availed" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
                                    <div class="form-group col-md-4" id="bothland_year_subsidy_claim" style="display:none">
								        <label for="inputAddress2">Year of Subsidy Claimed</label>
	                                    <select id="both_year_subsidy_claimed" name="both_year_subsidy_claimed" class="form-control" disabled>
                                            <option value="">Select Subsidy Claimed Year</option>
                                            <?php for($i = 0; $i <= 10; $i++) { ?>
                                                <option value="<?php echo  date("Y",strtotime("-".$i." year"));?>"><?php echo date("Y",strtotime("-".$i." year"));?></option>
                                            <?php } ?>  
                                        </select>					
									</div>
									</div>
                                    
									<div class="form-group col-md-12 mt-2">	
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Farm Pond</label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_farm_pond" name="both_farm_pond" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_farm_pond" name="both_farm_pond" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
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
                                                      <input type="radio" id="both_farm_subsidy_availed" name="both_farm_subsidy_availed" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="both_farm_subsidy_availed" name="both_farm_subsidy_availed" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                          </div>
                                          
                                          <div class="form-group col-md-12" id="bothland_farm_construct_farm" style="display:none">
										  <label class="form-control-label">Interested to construct Farm Pond  </label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_construct_form_pond" name="both_construct_form_pond" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_construct_form_pond" name="both_construct_form_pond" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
                                      </div>
									  <div class="form-group col-md-4">
										  <label class=" form-control-label">Address Same as Farmer's address <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="both_farmer_address" name="both_farmer_address" value="1" class="form-check-input" disabled>Yes
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="both_farmer_address" name="both_farmer_address" value="2" class="form-check-input" disabled>No
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
										<input type="text" class="form-control numberOnly" onkeyup="getBothLandPincode(this.value)" id="both_pincode" pattern="[1-9][0-9]{5}" name="both_pincode" minlength="6" maxlength="6" placeholder="PIN Code" disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">State <span class="text-danger">*</span></label>
										<select class="form-control" id="both_state" name="both_state" readonly required>
											<option value="<?php echo $landInfo[0]->state; ?>"><?php echo $landInfo[0]->state_name; ?></option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4">
										<label for="inputAddress2">District <span class="text-danger">*</span></label>
										<select class="form-control" id="both_district" name="both_district" readonly required>
											<option value="<?php echo $landInfo[0]->district; ?>"><?php echo $landInfo[0]->district_name; ?></option>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">																											
									<div class="form-group col-md-4">
										<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
										<select class="form-control" id="both_taluk" name="both_taluk" disabled>
											<?php for($i=0; $i<count($talukInfo);$i++) { ?>
												<option value="<?php echo $talukInfo[$i]->taluk_code; ?>" <?php if($talukInfo[$i]->taluk_code == $landInfo[0]->taluk){ ?>selected<?php } ?> ><?php echo $talukInfo[$i]->name; ?></option>
												<?php } ?>	
										</select> 
										<div class="help-block with-errors text-danger"></div>
									</div>	
									<div class="form-group col-md-4">
										<label for="inputAddress2">Block <span class="text-danger">*</span></label>
								        <select class="form-control" id="both_block" name="both_block" disabled>
											<?php for($i=0; $i<count($blockInfo);$i++) { ?>
												<option value="<?php echo $blockInfo[$i]->block_code; ?>" <?php if($blockInfo[$i]->block_code == $landInfo[0]->block){ ?>selected<?php } ?> ><?php echo $blockInfo[$i]->name; ?></option>
												<?php } ?>
										</select>
										<div class="help-block with-errors text-danger"></div>
									</div>	
									<div class="form-group col-md-4">
										<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
										<select id="both_gram_panchayat" name="both_gram_panchayat" class="form-control" disabled>
											<option value="<?php echo $landInfo[0]->panchayat; ?>"><?php echo $landInfo[0]->panchayat_name; ?></option>				
                                        </select>		
								        <div class="help-block with-errors text-danger"></div>						
									</div>
									</div>
									<div class="form-group col-md-12 mt-2">		
									<div class="form-group col-md-4">
										<label for="inputAddress2">Village </label>
										<select id="both_village" name="both_village" class="form-control" disabled>
										<option value="<?php echo $landInfo[0]->village; ?>"><?php echo $landInfo[0]->village_name; ?></option>
										</select>
									</div>						
									<div class="form-group col-md-6">
										<label for="inputAddress2">Street </label>
										<input type="text" id="both_street" name="both_street" class="form-control" maxlength="75" id="street" placeholder="Street" disabled>	
									</div>
									<div class="form-group col-md-2">
										<label for="inputAddress2">Door No </label>
										<input type="text" class="form-control" name="both_door_no" maxlength="10" id="both_door_no" placeholder="Door No" disabled>
									</div>
									</div>
							    </div>
                                    <!--    
                                    <div class="form-group col-md-12">
                                        <hr style="border-bottom:1px solid black;">     
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Organic Farmer</label>
                                            <select id="both_organic_former" name="both_organic_former" class="form-control" disabled>
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
                                            <select id="both__identification" name="both__identification" class="form-control" disabled>
                                                <option value="">Select Land Identification</option>
                                                <option value="1">1</option>										
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area</label>
                                              <input type="text" class="form-control numberOnly" maxlength="3" minlength="3" id="both_organic_cultivation_area" disabled name="both_organic_cultivation_area" placeholder="Cultivation Area">
                                            </div>
                                            <div class="form-group col-md-6">
                                              <label class=" form-control-label">Cultivation Area UOM</label>
                                              <select id="both_cultivation_area_uom" name="both_cultivation_area_uom" class="form-control" data-validation-required-message="Please select area uom" disabled>
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
                                                      <input type="radio" id="both_organic_certifiation" name="both_organic_certifiation" value="1" class="form-check-input" data-validation-required-message="Please select land ownership" disabled><span class="ml-1">Yes</span>
                                                       <div class="help-block with-errors text-danger"></div>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" checked id="both_organic_certifiation" name="both_organic_certifiation" value="2" class="form-check-input" data-validation-required-message="Please select land ownership" disabled><span class="ml-1">No</span>
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
                                            <input type="text" class="form-control numberOnly" maxlength="10" id="both_certifiation" name="both_certifiation" placeholder="Certification Number" disabled>
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>												
                                        <div class="form-group col-md-6">
                                            <label class=" form-control-label">Certification Agency Name <span class="text-danger">*</span></label>
                                             <input type="text" class="form-control" maxlength="100" id="both_certifiation_agency_name" name="both_certifiation_agency_name" placeholder="Certification Agency Name" disabled>
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Initial Date of Certification <span class="text-danger">*</span></label>
                                             <input type="date" class="form-control" disabled id="both_intial_date_certifiation" name="both_intial_date_certifiation" placeholder="Initial date of certification" max="2050-12-31" >
                                             <div class="help-block with-errors text-danger"></div>
                                        </div>	
                                        <div class="form-group col-md-4">
                                            <label class="form-control-label">Effective Period of Certification From</label>
                                           <input type="date" class="form-control" disabled id="both_effective_period_certifiation_from" name="both_effective_period_certifiation_from" placeholder="Effective period of certification From" >
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="form-control-label">Effective Period of Certification To</label>
                                           <input type="date" class="form-control" disabled id="both_effective_period_certifiation_to" name="both_effective_period_certifiation_to" placeholder="Effective period of certification To" >
                                            <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-12">								     		
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Accreditation Type <span class="text-danger">*</span></label>
                                                <select id="both_accreditation_type" name="both_accreditation_type" class="form-control" data-validation-required-message="Please select accreditation type" disabled>
                                                <option value="">Select Accreditation Type</option>
                                                <option value="1">NPOP</option>
                                                <option value="2">NOP</option>
                                                <option value="3">Others</option>								
                                                </select>
                                                 <div class="help-block with-errors text-danger"></div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Certified Products</label>
                                                <select id="both_certified_products" name="both_certified_products"  class="form-control" disabled>
                                                <option value="">Select Products</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class=" form-control-label">Jurisdiction <span class="text-danger">*</span></label>
                                                <select id="both_jurisdiction" name="both_jurisdiction"  class="form-control" disabled>
                                                <option value="">Select Jurisdiction</option>
                                                <option value="1">India</option>
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
                                    </div>
								
				                    </div>
				                    </div>-->
							     </div>
                                        
                                    
                                    <div class="organic_details" id="organic_details" style="display:none;">
                                        <div class="form-group col-md-12">
                                            <hr style="border-bottom:1px solid black;">     
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Organic Farmer</label>
                                                <select id="organic_former" name="organic_former" class="form-control" disabled>
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
                                                    <label class=" form-control-label">Land Identification</label>
                                                    <input type="text" class="form-control" id="both__identification" name="both__identification" maxlength="50" placeholder="Land Identification">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-6">
                                                      <label class=" form-control-label">Cultivation Area</label>
                                                      <input type="text" class="form-control numberOnly" maxlength="3" minlength="3" id="organic_cultivation_area" disabled name="organic_cultivation_area" placeholder="Cultivation Area">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                      <label class=" form-control-label">Cultivation Area UOM</label>
                                                      <select id="cultivation_area_uom" name="cultivation_area_uom" class="form-control" data-validation-required-message="Select area uom" disabled>
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
                                                              <input type="radio" id="organic_certifiation" disabled name="organic_certifiation" value="1" class="form-check-input" data-validation-required-message="Select certification mode"><span class="ml-1">Yes</span>
                                                            </label>
                                                          </div> 
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio2" class="form-check-label">
                                                              <input type="radio" checked id="organic_certifiation" disabled name="organic_certifiation" value="2" class="form-check-input" data-validation-required-message="Please select land ownership."><span class="ml-1">No</span>
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
                                                        <input type="text" class="form-control numberOnly" maxlength="10" id="certifiation" name="certifiation" placeholder="Certification Number" disabled>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>												
                                                    <div class="form-group col-md-6">
                                                        <label class=" form-control-label">Certification Agency Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="100" id="certifiation_agency_name" name="certifiation_agency_name" placeholder="Certification Agency Name" disabled>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-4">
                                                        <label class=" form-control-label">Initial Date of Certification <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="intial_date_certifiation" name="intial_date_certifiation" placeholder="Initial date of certification" max="2050-12-31" disabled>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>	
                                                    <div class="form-group col-md-4">
                                                       <label class="form-control-label">Effective Period of Certification From <span class="text-danger">*</span></label>
                                                       <input type="date" class="form-control" disabled id="effective_period_certifiation_from" name="effective_period_certifiation_from" placeholder="Effective period of certification From" >
                                                       <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                       <label class="form-control-label">Effective Period of Certification To <span class="text-danger">*</span></label>
                                                       <input type="date" class="form-control" disabled id="effective_period_certifiation_to" name="effective_period_certifiation_to" placeholder="Effective period of certification To" >
                                                       <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">								     		
                                                    <div class="form-group col-md-4">
                                                        <label class=" form-control-label">Accreditation Type <span class="text-danger">*</span></label>
                                                        <select id="accreditation_type" name="accreditation_type" class="form-control" data-validation-required-message="Select accreditation type" disabled>
                                                        <option value="">Select Accreditation Type</option>
                                                        <option value="1">NPOP</option>
                                                        <option value="2">NOP</option>
                                                        <option value="3">Others</option>								
                                                        </select>
                                                        <div class="help-block with-errors text-danger"></div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class=" form-control-label">Certified Products</label>
                                                        <select id="certified_products" name="certified_products" class="form-control" disabled>
                                                            <option value="">Select Products</option>
															<?php for($i=0;$i<count($product_list);$i++){ ?>
															<option value="<?php echo $product_list[$i]->id; ?>"><?php echo $product_list[$i]->product_name; ?></option>
															<?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class=" form-control-label">Jurisdiction <span class="text-danger">*</span></label>
                                                        <select id="jurisdiction" name="jurisdiction" class="form-control" disabled>
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
    
								<div class="form-group text-center col-md-12 mt-4">								       
                                    <div id="success"></div>
                                    <button id="edit" class="btn btn-fs btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
                                    <button id="sendMessageButton" name="profilesubmit" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
<!--									<a href="#" id="" class="del btn btn-danger">Delete</a>-->
									<a href="<?php echo base_url('administrator/farmer/landlist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>	
									<a href="<?php echo base_url('administrator/farmer/landlist');?>" id="cancel" class="btn btn-fs btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>							
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
</body>
</html>
<script type="text/javascript">

        $(document).ready(function(){
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
            
            //LoadCertifiedProduct();
            //getAreaUOMInLand();
            $('select[name="farmer_land_holdings"]').on('change', function() {
                var farmer_land_holdings = $(this).val();
                if(farmer_land_holdings==1){
                    $('#land_holdings1').show();
                    $("#land_ownership").prop('required',true);
                    $("#land_type").prop('required',true);
                }else{
                    $('#land_holdings1').hide();
                    $("#land_ownership").prop('required',false);
                    $("#land_type").prop('required',false);
                }									
            });

            var lease = $("input[name='land_ownership']");
            var ckbox = $("input[name='land_type']");

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
            
            //Organic farming inputs
			var organic_certifiation=$("input[name='organic_certifiation']");

            var live_stocks_insurance_coverage=$("input[name='live_stocks_insurance_coverage']");
            var live_stocks_purchase_loan=$("input[name='live_stocks_purchase_loan']");
			
            $('input').on('click', function() {
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
                        
                        $("#land_identification").prop('required',true);
                        $("#wetland_land_measurement_unit").prop('required',true);
					    //$(".wetland_source_irrigation").prop('required',true);
					    $("#wetland_farmer_address").prop('required',true);
                    } else if(chkId==2){
                        $('#Land_Identify_head').show();
                        $('#bothLand_Identify_head').hide();
                               $('#div4').show();                               
                               $('#div3').hide();
                               $('#div5').hide();
                               $('.btn_profile').hide();
                        
                        $("#dry_land_identification").prop('required',true);
                        $("#dryland_land_measurement_unit").prop('required',true);
					    //$(".dryland_source_irrigation").prop('required',true);
					    $("#dryland_farmer_address").prop('required',true);
                    } else if(chkId==3){
                        $('#bothLand_Identify_head').show();
                        $('#Land_Identify_head').hide();                
                               $('#div5').show();
                               $('#div4').hide();
                               $('#div3').hide();
                               $('.btn_profile').hide();
                               $('#datatable_script').hide();
                        
                        $("#both_land_identification").prop('required',true);
                        $("#both_land_measurement_unit").prop('required',true);
                        $("#identity_type").prop('required',true);
					    //$(".both_source_irrigation").prop('required',true);
					    $("#both_farmer_address").prop('required',true);
                       }		  
                }


                            //wet land source of irrigation  condition
                            if($("#wetland_source_irrigation1").prop('checked') == true){
                                $('#number_wells').show();
                            } else {
                                $('#number_wells').hide();
                            }
                            if($("#wetland_source_irrigation3").prop('checked') == true){
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
                                $('#wet_subsidy_avail').hide();     
                                $('#wet_year_subsidy_claim').hide();
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
								getFarmerProfileLocation(0);                                								
                               }else {					   
								$('#wet_farm_address').show();
								getFarmerProfileLocation(1);
                               }
							    $("#wetland_pincode").prop('required',true);
                                $("#wetland_state").prop('required',true);
                                $("#wetland_district").prop('required',true);
                                $("#wetland_block").prop('required',true);
                                $("#wetland_taluk").prop('required',true);
                                $("#wetland_gram_panchayat").prop('required',true);
                                $("#wetland_village").prop('required',true);
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
								getFarmerProfileLocation(0);                                
                               }else {					   
								$('#dry_farm_address').show();
								getFarmerProfileLocation(1);
                               }
							    $("#dryland_pincode").prop('required',true);
                                $("#dryland_state").prop('required',true);
                                $("#dryland_district").prop('required',true);
                                $("#dryland_block").prop('required',true);
                                $("#dryland_taluk").prop('required',true);
                                $("#dryland_gram_panchayat").prop('required',true);
                                $("#dryland_village").prop('required',true);
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
						getFarmerProfileLocation(0);						
					   }else {					   
						$('#both_farm_address').show();
						getFarmerProfileLocation(1);
					   }
					    $("#both_pincode").prop('required',true);
						$("#both_state").prop('required',true);
						$("#both_district").prop('required',true);
						$("#both_block").prop('required',true);
						$("#both_taluk").prop('required',true);
						$("#both_gram_panchayat").prop('required',true);
						$("#both_village").prop('required',true);
                    }
                    /** Both land End **/

//                        //both farm condition
//                            $('select[name="both_organic_former"]').on('change', function() {
//                                var organic_form = $(this).val();
//                                if(organic_form !=2){
//                                  $('#organic_farm_details').show();
//                                  $("#both_organic_certifiation").prop('required',true);
//                                  $('#land_identify').show();   
//                                }else if(organic_form==2){
//                                  $('#organic_farm_details').hide();
//                                  $('#land_identify').hide();
////                                }else if(organic_form==3){
////                                  $('#organic_farm_details').show();
////                                  $('#land_identify').show();
////                                  $("#both_organic_certifiation").prop('required',true);
//                                }									
//                            });

                            if(organic_certifiation.is(':checked')) {
                                 $("input[name='organic_certifiation']:checked").each ( function() {
                                    farmer_organic_certification= $(this).val() + ",";
                                    farmer_organic_certification = farmer_organic_certification.slice(0, -1);
                               });

                               if(farmer_organic_certification==1){
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
             });  
  
            //both farm condition
            $('select[name="organic_former"]').on('change', function() {
                var organic_form = $(this).val();
                if(organic_form != 2){
                    $('#organic_farm_details').show();
                    //$("#organic_certifiation").prop('required',true);
                    $('#land_identify').show();   
                    //getAreaUOM();
                }else if(organic_form==2){
                    $('#organic_farm_details').hide();
                    $('#land_identify').hide();
//              }else if(organic_form==3){
//                  $('#organic_farm_details').show();
//                  $('#land_identify').show();
//                  $("#both_organic_certifiation").prop('required',true);
                }									
            });
    
    
			//sweetalert with delete function
			$('a.del').click(function() {
                var land_id = <?php echo $land_id; ?>;
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
                      url: "<?php echo base_url();?>administrator/farmer/deleteLandDetail/"+land_id,
                      type: "POST",
                      data: {
                         this_delete: land_id,
                      },
                      cache: false,
                      success: function() {        
                         setTimeout(function() {
                          window.location.replace("<?php echo base_url('administrator/farmer/landlist')?>");
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
                    swal("Cancelled", "You have cancelled the farmer profile information delete action", "info");
                    return false;
                 }
              });
            });
	
	
	$('#edit').click(function(){
		$('#farmer_profileForm').toggleClass('view');
		$("#sendMessageButton").show();
		$("#cancel").show();
	    $("#edit").hide();
		$("#ok").hide();		 
		$('input').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			 document.getElementById("sendMessageButton").disabled =false;
			 document.getElementById("cancel").disabled =false;
                $("#wet_add_more").show();
                $("#dry_add_more").show();
                $("#both_add_more").show();
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
        
        $("input[name='land_type']").prop('disabled', 'disabled');
	});
            
            
    //getAreaUOMInLand();        
	//edit function for getting land profile
    var land_id =<?php echo $land_id; ?>;
    //jQuery method
      $.ajax({
        url:"<?php echo base_url();?>administrator/farmer/editland/"+land_id,
        type:"GET",
        dataType:"html",
        cache:false,      
        success:function(response){      
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            if(responseArray.status == 1){                                                
                
                /** Update the farmer values for drop down **/
                land_detail_farmer += '<option value='+responseArray.land_list[0].farmer_id+'>'+responseArray.land_list[0].profile_name+'</option>';
                $('#land_detail_farmer').html(land_detail_farmer);
                
                document.getElementById("farmer_land_holdings").value=responseArray.land_list[0].land_holdings;
                //enable if land holdings==1
                if(responseArray.land_list[0].land_holdings==1){
                    /** Setting href link to add more land buttons **/
                    var href_value="<?php echo base_url('administrator/farmer/addland?id=');?>"+responseArray.land_list[0].farmer_id;
                    $("#addLandHref").attr("href", href_value);
                    
                    document.getElementById("land_holding_id").value=responseArray.land_list[0].id;
                    $('#landowner').show();
                    $('#organic_details').show();                    

                            //land ownership
                            var $radios = $('input:radio[name=land_ownership]');        
                            if(responseArray.land_list[0].ownership_type == 1){
                                 if($radios.is(':checked') === false) {
                                    $radios.filter('[value=1]').prop('checked', true);
                                    document.getElementById("land_owner").value=responseArray.land_list[0].name; 

                                }
                            }else{
                                if($radios.is(':checked') === false) {
                                    $radios.filter('[value=2]').prop('checked', true);
                                    $('#date_of_lease').show();  
                                    document.getElementById("land_owner").value=responseArray.land_list[0].name;
                                    document.getElementById("land_year_lease").value=responseArray.land_list[0].no_of_lease_years;
                                    document.getElementById("land_date_lease").value=responseArray.land_list[0].lease_date;
                                }
                            }

                            //type of land                            
                            var radios1 = $('input:radio[name=land_type]');        
                            if(responseArray.land_list[0].land_type == 1){
                                 if(radios1.is(':checked') === false) {
                                        $('#Land_Identify_head').show();
                                        $('#div3').show();
                                        radios1.filter('[value=1]').prop('checked', true);
                                        document.getElementById("wetland_land_measurement").value=responseArray.land_list[0].land_measurement;
                                        document.getElementById("wetland_survey_number").value=responseArray.land_list[0].survey_number;

                                        //Land identificate details
                                        var land_identification = responseArray.land_list[0].land_identification;
                                        var land_identify=document.getElementsByName('wet_land_identification[]');
                                        var land_id=document.getElementsByName('wet_land_id[]');
                                        var land_measure=document.getElementsByName('wetland_land_measurement[]');
                                        var land_measure_unit=document.getElementsByName('wetland_land_measurement_unit[]');
                                        for(var j=0; j<land_identification.length; j++){
                                            if(land_identification.length != 1) {
                                               GetMoreWetLand(j);
                                            }
                                            //if(j!=0) { GetMoreWetLand(j); }

                                            if(land_identify[j].id == 'wet_land_identification') {
                                            land_identify[j].value = land_identification[j].identification;   
                                            document.getElementById('wet_land_id').value = land_identification[j].id;   
                                            }                                          
                                            if(land_measure[j].id == 'wetland_land_measurement') {
                                            land_measure[j].value = land_identification[j].measurement;                      
                                            }     
                                            if(land_measure_unit[j].id == 'wetland_land_measurement_unit') {
                                                document.getElementById(land_measure_unit[j].id).value=land_identification[j].measurement_unit;
//                                            land_measure_unit[j].value = land_identification[j].measurement_unit;          
                                            }
                                            

                                            if(j!=0 && j == land_identification.length-1) {
                                                var myNode = document.getElementById("wetland_holdings2_0");
                                                while (myNode.firstChild) {
                                                    myNode.removeChild(myNode.firstChild);
                                                }
                                                myNode.remove();
                                            }
                                        }

                                        if(responseArray.land_list[0].source_irrigation != null){
                                        var irrigation = responseArray.land_list[0].source_irrigation.split(",");
                                        var items=document.getElementsByName('wetland_source_irrigation[]');
                                            for(var i=0; i<items.length; i++){
                                              for(var j=0; j<irrigation.length; j++){
                                                if(items[i].type=='checkbox' && items[i].value==irrigation[j])  {
                                                  items[i].checked=true;
                                                    if(items[i].value == 1){                
                                                      $('#number_wells').show();
                                                      document.getElementById("wetland_number_wells").value=responseArray.land_list[0].no_of_wells;                  
                                                    }
                                                    if(items[i].value == 3){                
                                                        $('#number_tube_wells').show();
                                                        document.getElementById("wetland_number_tubewells").value=responseArray.land_list[0].no_of_tubewells;
                                                    }
                                                }
                                              }
                                            }
                                        }

                                    if( responseArray.land_list[0].irrigation_method){
                                        var irrigation_method = responseArray.land_list[0].irrigation_method.split(",");
                                            var items1=document.getElementsByName('wetland_irrigation_method[]');
                                            for(var i=0; i<items1.length; i++){
                                              for(var j=0; j<irrigation_method.length; j++){
                                                if(items1[i].type=='checkbox' && items1[i].value==irrigation_method[j])  {
                                                  items1[i].checked=true;
                                                    if(items1[i].value == 2 || items1[i].value == 3 || items1[i].value == 4){                
                                                       $('#wet_subsidy_avail').show();
                                                       var wet_subsidy_avail = $('input:radio[name=wetland_subsidy_availed]'); 
                                                       if(responseArray.land_list[0].subsidy_availed == 1){                
                                                            if(wet_subsidy_avail.is(':checked') === false) {
                                                                wet_subsidy_avail.filter('[value=1]').prop('checked', true);
                                                                $('#wet_year_subsidy_claim').show();
                                                                document.getElementById("wetland_year_subsidy_Claimed").value=responseArray.land_list[0].subsidy_claimed_year;
                                                            }
                                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                                            if(wet_subsidy_avail.is(':checked') === false) {
                                                                wet_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                            }
                                                        } 
                                                    }
                                                    /*if(items1[i].value == 3){                
                                                       $('#wet_subsidy_avail').show();
                                                       document.getElementById("wetland_subsidy_availed").value=responseArray.land_list[0].subsidy_availed;  
                                                    }
                                                    if(items1[i].value == 4){                
                                                       $('#wet_subsidy_avail').show();
                                                       document.getElementById("wetland_subsidy_availed").value=responseArray.land_list[0].subsidy_availed;  
                                                    }*/
                                                }

                                              }
                                            }
                                        }


                                        //farm pond
                                        var farmpond = $('input:radio[name=wetland_farm_pond]'); 
                                        if(responseArray.land_list[0].farm_pond == 1){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=1]').prop('checked', true);
                                                $('#wet_farm_subsidy_availed').show();

                                                //farm subsidy avail
                                                var farm_subsidy_avail = $('input:radio[name=wetland_farm_subsidy_availed]');
                                                if(responseArray.land_list[0].farm_subsidy_availed == 1){
                                                    if(farm_subsidy_avail.is(':checked') === false) {
                                                        farm_subsidy_avail.filter('[value=1]').prop('checked', true);        
                                                    }
                                                } else if(farm_subsidy_avail.is(':checked') === false) {
                                                    farm_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                }
                                            }
                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=2]').prop('checked', true);
                                                $('#wet_farm_construct_farm').show();
                                            }
                                        }


                                        //farmer address
                                        var farm_address = $('input:radio[name=wetland_farmer_address]');
                                        if(responseArray.land_list[0].address == 1){                
                                            if(farm_address.is(':checked') === false){
                                                farm_address.filter('[value=1]').prop('checked', true);
												$('#wet_farm_address').show();
                                                //getwetPincode(responseArray.land_list[0].pin_code);
                                                document.getElementById("wetland_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("wetland_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("wetland_door_no").value=responseArray.land_list[0].door_no;                                       
                                                /*var wetland_taluk=responseArray.land_list[0].taluk;
                                                var wetland_block=responseArray.land_list[0].block;
                                                var wetland_panchayat=responseArray.land_list[0].panchayat;
                                                var wetland_village=responseArray.land_list[0].village;
                                                getWetPanchayatByBlock(responseArray.land_list[0].block);
                                                getWetVillageByPanchayat(responseArray.land_list[0].panchayat);
                                                setTimeout(function(){ 
                                                document.getElementById("wetland_taluk").value=wetland_taluk;
                                                document.getElementById("wetland_block").value=wetland_block;
                                                document.getElementById("wetland_gram_panchayat").value=wetland_panchayat;
												if(wetland_village != null){
													document.getElementById("wetland_village").value=wetland_village;
												}
                                               }, 300);*/  
                                            }
                                        }else if(responseArray.land_list[0].address == 2){                
                                            if(farm_address.is(':checked') === false) {
                                                farm_address.filter('[value=2]').prop('checked', true);
                                                $('#wet_farm_address').show();
                                                //getwetPincode(responseArray.land_list[0].pin_code);
                                                document.getElementById("wetland_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("wetland_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("wetland_door_no").value=responseArray.land_list[0].door_no;                                       
                                                /*var wetland_taluk=responseArray.land_list[0].taluk;
                                                var wetland_block=responseArray.land_list[0].block;
                                                var wetland_panchayat=responseArray.land_list[0].panchayat;
                                                var wetland_village=responseArray.land_list[0].village;
                                                getWetPanchayatByBlock(responseArray.land_list[0].block);
                                                getWetVillageByPanchayat(responseArray.land_list[0].panchayat);
                                                setTimeout(function(){ 
                                                document.getElementById("wetland_taluk").value=wetland_taluk;
                                                document.getElementById("wetland_block").value=wetland_block;
                                                document.getElementById("wetland_gram_panchayat").value=wetland_panchayat;
												if(wetland_village != null){
													document.getElementById("wetland_village").value=wetland_village;
												}
                                               }, 300);*/  
                                            }
                                        }
                                     
                                     
                                    /** If Organic farmer means have the following data updation **/ 
                                    if(responseArray.land_list[0].organic_former != null) {                                        document.getElementById("organic_former").value=responseArray.land_list[0].organic_former;    
                                    }

                                        //organic farmer
                                        if(responseArray.land_list[0].organic_former==1 || responseArray.land_list[0].organic_former==3 ){
                                             $('#organic_farm_details').show();
                                             $('#land_identify').show();
                                            //getAreaUOM();
                                            //organic certification
                                            var organic_certification = $('input:radio[name=organic_certifiation]');
                                            if(responseArray.land_list[0]['organic_certifiation'] == 1){                
                                                //if(organic_certification.is(':checked') === false) {
                                                    organic_certification.filter('[value=1]').prop('checked', true);
                                                    //LoadCertifiedProduct();
                                                    $('#organic_with_certification').show();
                                                //}
                                            }else if(responseArray.land_list[0]['organic_certifiation'] == 2){                
                                                if(organic_certification.is(':checked') === false) {
                                                    organic_certification.filter('[value=2]').prop('checked', true);
                                                }
                                            }

                                            //document.getElementById("organic_cultivation_area").value=responseArray.land_list[0].cultivation_area;
                                            document.getElementById("certifiation").value=responseArray.land_list[0].certifiation; 
                                            document.getElementById("certifiation_agency_name").value=responseArray.land_list[0].certification_agency;              

                                            document.getElementById("accreditation_type").value=responseArray.land_list[0].accreditation_type;   
                                             document.getElementById("jurisdiction").value=responseArray.land_list[0].jurisdiction;                                                      
                                            document.getElementById("intial_date_certifiation").value=responseArray.land_list[0].certifiation_date;  
                                            document.getElementById("effective_period_certifiation_from").value=responseArray.land_list[0].certifiation_period_from; 
                                            document.getElementById("effective_period_certifiation_to").value=responseArray.land_list[0].certifiation_period_to; 
                                            var area_uom = responseArray.land_list[0].area_uom;
                                            var product = responseArray.land_list[0].certified_products
                                            setTimeout(function(){  
                                                document.getElementById("certified_products").value = product;        
                                                //document.getElementById("cultivation_area_uom").value = area_uom;  
                                            }, 500);                                                 
                                        }
                                }

                            }else if(responseArray.land_list[0].land_type == 2){
                                if(radios1.is(':checked') === false) {
                                    radios1.filter('[value=2]').prop('checked', true);
                                        $('#Land_Identify_head').show();
                                        $('#div4').show();
                                        document.getElementById("dryland_land_measurement").value=responseArray.land_list[0].land_measurement;
                                        document.getElementById("dryland_survey_number").value=responseArray.land_list[0].survey_number;
                                        //farm pond
                                        var farmpond = $('input:radio[name=dryland_farm_pond]');              
                                        if(responseArray.land_list[0].farm_pond == 1){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=1]').prop('checked', true);
                                                $('#dry_farm_subsidy_availed').show();

                                                //farm subsidy avail
                                                var farm_subsidy_avail = $('input:radio[name=dryland_farm_subsidy_availed]');
                                                if(responseArray.land_list[0].farm_subsidy_availed == 1){
                                                if(farm_subsidy_avail.is(':checked') === false) {
                                                farm_subsidy_avail.filter('[value=1]').prop('checked', true);
                                                }
                                                }else if(farm_subsidy_avail.is(':checked') === false) {
                                                farm_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                }
                                            }
                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=2]').prop('checked', true);
                                                $('#dry_farm_construct_farm').show();

                                                //farm subsidy avail
                                                var farm_construct_farm = $('input:radio[name=dryland_construct_form_pond]');
                                                if(responseArray.land_list[0].construct_form_pond == 1){
                                                    if(farm_construct_farm.is(':checked') === false) {
                                                        farm_construct_farm.filter('[value=1]').prop('checked', true);
                                                    }
                                                } else if(farm_construct_farm.is(':checked') === false) {
                                                    farm_construct_farm.filter('[value=2]').prop('checked', true);
                                                }
                                            }
                                        }


                                        //farmer address
                                        var farm_address = $('input:radio[name=dryland_farmer_address]');
                                        if(responseArray.land_list[0].address == 1){                
                                            if(farm_address.is(':checked') === false) {
                                                farm_address.filter('[value=1]').prop('checked', true);
												$('#dry_farm_address').show();
                                                //getPincode(responseArray.land_list[0].pin_code); 
                                                document.getElementById("dryland_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("dryland_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("dryland_door_no").value=responseArray.land_list[0].door_no;

                                                /*var dryland_taluk=responseArray.land_list[0].taluk;
                                                var dryland_block=responseArray.land_list[0].block;
                                                var dryland_panchayat=responseArray.land_list[0].panchayat;
                                                var dryland_village=responseArray.land_list[0].village;
                                                getDryPanchayatByBlock(responseArray.land_list[0].block);
                                                getDryVillageByPanchayat(responseArray.land_list[0].panchayat);
                                                setTimeout(function(){                                                 
                                                document.getElementById("dryland_taluk").value=dryland_taluk;
                                                document.getElementById("dryland_block").value=dryland_block;                                                
                                                document.getElementById("dryland_gram_panchayat").value=dryland_panchayat;
												if(dryland_village != null){
													document.getElementById("dryland_village").value=dryland_village;
												}
                                               }, 500);*/
                                            }
                                        }else if(responseArray.land_list[0].address == 2){                
                                            if(farm_address.is(':checked') === false) {
                                                farm_address.filter('[value=2]').prop('checked', true);
                                                $('#dry_farm_address').show();
                                                //getPincode(responseArray.land_list[0].pin_code); 
                                                document.getElementById("dryland_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("dryland_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("dryland_door_no").value=responseArray.land_list[0].door_no;

                                                /*var dryland_taluk=responseArray.land_list[0].taluk;
                                                var dryland_block=responseArray.land_list[0].block;
                                                var dryland_panchayat=responseArray.land_list[0].panchayat;
                                                var dryland_village=responseArray.land_list[0].village;
                                                getDryPanchayatByBlock(responseArray.land_list[0].block);
                                                getDryVillageByPanchayat(responseArray.land_list[0].panchayat);
                                               setTimeout(function(){                                                 
                                                document.getElementById("dryland_taluk").value=dryland_taluk;
                                                document.getElementById("dryland_block").value=dryland_block;
                                                document.getElementById("dryland_gram_panchayat").value=dryland_panchayat;
												if(dryland_village != null){
													document.getElementById("dryland_village").value=dryland_village;
												}
                                               }, 500); */
                                            }
                                        }

                                        //Land identificate details
                                        var land_identification = responseArray.land_list[0].land_identification;
                                        var land_identify=document.getElementsByName('dry_land_identification[]');
                                        var land_id=document.getElementsByName('dry_land_id[]');
                                        var land_measure=document.getElementsByName('dryland_land_measurement[]');
                                        var land_measure_unit=document.getElementsByName('dryland_land_measurement_unit[]');
                                        for(var j=0; j<land_identification.length; j++){
                                            if(land_identification.length != 1) {
                                               GetMoreDryLand(j);
                                            }
                                            //if(j!=0) { GetMoreDryLand(j); }                                            

                                            if(land_identify[j].id == 'dry_land_identification') {
                                                document.getElementById('dry_land_identification').value = land_identification[j].identification; 
                                                document.getElementById('dry_land_id').value = land_identification[j].id;                                                                            
                                            }                                          
                                            if(land_measure[j].id == 'dryland_land_measurement') {
                                                document.getElementById('dryland_land_measurement').value = land_identification[j].measurement;                      
                                            }                                          
                                            if(land_measure_unit[j].id == 'dryland_land_measurement_unit') {
                                                document.getElementById(land_measure_unit[j].id).value = land_identification[j].measurement_unit;             
                                            }


                                            if(j!=0 && j == land_identification.length-1) {
                                                var myNode = document.getElementById("dryland_holdings2_0");
                                                while (myNode.firstChild) {
                                                    myNode.removeChild(myNode.firstChild);
                                                }
                                                myNode.remove();
                                            }
                                        }


                                        //source of irrigation
                                        if(responseArray.land_list[0].source_irrigation != null){
                                        var irrigation = responseArray.land_list[0].source_irrigation.split(",");
                                        var items=document.getElementsByName('dryland_source_irrigation[]');
                                            for(var i=0; i<items.length; i++){
                                              for(var j=0; j<irrigation.length; j++){
                                                if(items[i].type=='checkbox' && items[i].value==irrigation[j])  {
                                                  items[i].checked=true;
                                                    if(items[i].value == 1){                
                                                      $('#dry_number_wells').show();
                                                      document.getElementById("dryland_number_wells").value=responseArray.land_list[0].no_of_wells;                  
                                                    }
                                                    if(items[i].value == 3){                
                                                        $('#dry_tube_wells').show();
                                                        document.getElementById("dryland_number_tubewells").value=responseArray.land_list[0].no_of_tubewells;
                                                    }
                                                    //if(items[i].value == 7){                
                                                    //        $('#wet_method_irrigation').show();
                                                    //}
                                                }


                                              }
                                            }
                                        }

                                        if( responseArray.land_list[0].irrigation_method){
                                        var irrigation_method = responseArray.land_list[0].irrigation_method.split(",");
                                            var items1=document.getElementsByName('dryland_irrigation_method[]');
                                            for(var i=0; i<items1.length; i++){
                                              for(var j=0; j<irrigation_method.length; j++){
                                                if(items1[i].type=='checkbox' && items1[i].value==irrigation_method[j])  {
                                                  items1[i].checked=true;
                                                    if(items1[i].value == 2 || items1[i].value == 3 || items1[i].value == 4){                
                                                       $('#dry_subsidy_avail').show();
                                                       var dry_subsidy_avail = $('input:radio[name=dryland_subsidy_availed]'); 
                                                       if(responseArray.land_list[0].subsidy_availed == 1){                
                                                            if(dry_subsidy_avail.is(':checked') === false) {
                                                                dry_subsidy_avail.filter('[value=1]').prop('checked', true);
                                                                $('#dry_year_subsidy_claim').show();
                                                                document.getElementById("dryland_year_subsidy_claimed").value=responseArray.land_list[0].subsidy_claimed_year;
                                                            }
                                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                                            if(dry_subsidy_avail.is(':checked') === false) {
                                                                dry_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                            }
                                                        } 
                                                    }
                                                }

                                              }
                                            }
                                        }
                                    
                                    /** If Organic farmer means have the following data updation **/ if(responseArray.land_list[0].organic_former != null) {                                        document.getElementById("organic_former").value=responseArray.land_list[0].organic_former;    
                                    }

                                    //organic farmer
                                    if(responseArray.land_list[0].organic_former==1 || responseArray.land_list[0].organic_former==3 ){
                                         $('#organic_farm_details').show();
                                         $('#land_identify').show();
                                        //getAreaUOM();
                                        //organic certification
                                        var organic_certification = $('input:radio[name=organic_certifiation]');
                                        if(responseArray.land_list[0]['organic_certifiation'] == 1){                
                                            //if(organic_certification.is(':checked') === false) {
                                                organic_certification.filter('[value=1]').prop('checked', true);
                                                //LoadCertifiedProduct();
                                                $('#organic_with_certification').show();
                                            //}
                                        }else if(responseArray.land_list[0]['organic_certifiation'] == 2){                
                                            if(organic_certification.is(':checked') === false) {
                                                organic_certification.filter('[value=2]').prop('checked', true);
                                            }
                                        }
                                         //document.getElementById("organic_cultivation_area").value=responseArray.land_list[0].cultivation_area;
                                         document.getElementById("certifiation").value=responseArray.land_list[0].certifiation; 
                                        document.getElementById("certifiation_agency_name").value=responseArray.land_list[0].certification_agency;              

                                        document.getElementById("accreditation_type").value=responseArray.land_list[0].accreditation_type;   
                                        document.getElementById("certified_products").value=responseArray.land_list[0].certified_products;                                                                     document.getElementById("jurisdiction").value=responseArray.land_list[0].jurisdiction;                                                      
                                         document.getElementById("intial_date_certifiation").value=responseArray.land_list[0].certifiation_date;  
                                        document.getElementById("effective_period_certifiation_from").value=responseArray.land_list[0].certifiation_period_from; 
                                         document.getElementById("effective_period_certifiation_to").value=responseArray.land_list[0].certifiation_period_to; 
                                         var area_uom = responseArray.land_list[0].area_uom;
                                         setTimeout(function(){                                                                 
										 //document.getElementById("cultivation_area_uom").value = area_uom;  
                                         }, 500);                                                 
                                        }
                                    
                                }

                            }else if(responseArray.land_list[0].land_type == 3){
                                if(radios1.is(':checked') === false) {
                                    radios1.filter('[value=3]').prop('checked', true);
                                    $('#bothLand_Identify_head').show();
                                    $('#div5').show();
                                    document.getElementById("both_survey_number").value=responseArray.land_list[0].survey_number;
                                    
                                        //farm pond
                                        var farmpond = $('input:radio[name=both_farm_pond]');              
                                        if(responseArray.land_list[0].farm_pond == 1){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=1]').prop('checked', true);
                                                $('#bothland_farm_subsidy_availed').show();

                                                //farm subsidy avail
                                                var farm_subsidy_avail = $('input:radio[name=both_farm_subsidy_availed]');
                                                if(responseArray.land_list[0].farm_subsidy_availed == 1){
                                                    if(farm_subsidy_avail.is(':checked') === false) {
                                                        farm_subsidy_avail.filter('[value=1]').prop('checked', true);
                                                    }
                                                }else if(farm_subsidy_avail.is(':checked') === false) {
                                                    farm_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                }
                                            }
                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                            if(farmpond.is(':checked') === false) {
                                                farmpond.filter('[value=2]').prop('checked', true);
                                                $('#bothland_farm_construct_farm').show();

                                                //farm subsidy avail
                                                var farm_construct_farm = $('input:radio[name=both_construct_form_pond]');
                                                if(responseArray.land_list[0].construct_form_pond == 1){
                                                    if(farm_construct_farm.is(':checked') === false) {
                                                        farm_construct_farm.filter('[value=1]').prop('checked', true);
                                                    }
                                                } else if(farm_construct_farm.is(':checked') === false) {
                                                    farm_construct_farm.filter('[value=2]').prop('checked', true);
                                                }
                                            }
                                        }


                                        //farmer address
                                        var farm_address = $('input:radio[name=both_farmer_address]');
                                        if(responseArray.land_list[0].address == 1){                
                                            if(farm_address.is(':checked') === false) {
                                                farm_address.filter('[value=1]').prop('checked', true);
												$('#both_farm_address').show();
                                                //getBothLandPincode(responseArray.land_list[0].pin_code); 
												document.getElementById("both_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("both_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("both_door_no").value=responseArray.land_list[0].door_no;

                                                /*var both_taluk=responseArray.land_list[0].taluk;
                                                var both_block=responseArray.land_list[0].block;
                                                var both_panchayat=responseArray.land_list[0].panchayat;
                                                var both_village=responseArray.land_list[0].village;
                                                getBothPanchayatByBlock(responseArray.land_list[0].block);
                                                getBothVillageByPanchayat(responseArray.land_list[0].panchayat);
                                                setTimeout(function(){ 
                                                    document.getElementById("both_taluk").value=both_taluk;
                                                    document.getElementById("both_block").value=both_block;                                                    
                                                    document.getElementById("both_gram_panchayat").value=both_panchayat;
													if(both_village != null){
														document.getElementById("both_village").value=both_village;
													}
                                               }, 500); */
                                            }
                                        }else if(responseArray.land_list[0].address == 2){                
                                            if(farm_address.is(':checked') === false) {
                                                farm_address.filter('[value=2]').prop('checked', true);
                                                $('#both_farm_address').show();
                                                //getBothLandPincode(responseArray.land_list[0].pin_code); 
												document.getElementById("both_pincode").value=responseArray.land_list[0].pin_code;
                                                document.getElementById("both_street").value=responseArray.land_list[0].street;   
                                                document.getElementById("both_door_no").value=responseArray.land_list[0].door_no;

                                                /*var both_taluk=responseArray.land_list[0].taluk;
                                                var both_block=responseArray.land_list[0].block;
                                                var both_panchayat=responseArray.land_list[0].panchayat;
                                                var both_village=responseArray.land_list[0].village;
                                                getBothPanchayatByBlock(responseArray.land_list[0].block);
                                                getBothVillageByPanchayat(responseArray.land_list[0].panchayat);
                                                setTimeout(function(){ 
                                                    document.getElementById("both_taluk").value=both_taluk;
                                                    document.getElementById("both_block").value=both_block;
                                                    document.getElementById("both_gram_panchayat").value=both_panchayat;
													if(both_village != null){
														document.getElementById("both_village").value=both_village;
													}
                                               }, 500); */
                                            }
                                        }

                                        //Land identificate details
                                        var land_identification = responseArray.land_list[0].land_identification;
                                        var land_identify=document.getElementsByName('both_land_identification[]');
                                        var land_id=document.getElementsByName('both_land_id[]');
                                        var land_measure=document.getElementsByName('both_land_measurement[]');
                                        var land_measure_unit=document.getElementsByName('both_land_measurement_unit[]');
                                        var identity_type=document.getElementsByName('identity_type[]');
                                        for(var j=0; j<land_identification.length; j++){
                                            //GetMoreBothLand(j);
                                            if(land_identification.length != 1) {
                                               GetMoreBothLand(j);
                                            }

                                            if(land_identify[j].id == 'both_land_identification') {
                                                document.getElementById('both_land_identification').value = land_identification[j].identification; 
                                                document.getElementById('both_land_id').value = land_identification[j].id;                                                                           
                                            }                                          
                                            if(land_measure[j].id == 'both_land_measurement') {
                                                document.getElementById('both_land_measurement').value = land_identification[j].measurement;                      
                                            }                                          
                                            if(land_measure_unit[j].id == 'both_land_measurement_unit') {
                                                document.getElementById(land_measure_unit[j].id).value = land_identification[j].measurement_unit;             
                                            }
                                            if(identity_type[j].id == 'identity_type') {
                                                document.getElementById('identity_type').value = land_identification[j].land_type;             
                                            }

                                            if(j!=0 && j == land_identification.length-1) {
                                                var myNode = document.getElementById("bothland_holdings_0");
                                                while (myNode.firstChild) {
                                                    myNode.removeChild(myNode.firstChild);
                                                }
                                                myNode.remove();
                                            }
                                        }


                                        //source of irrigation
                                        if(responseArray.land_list[0].source_irrigation != null){
                                        var irrigation = responseArray.land_list[0].source_irrigation.split(",");
                                        var items=document.getElementsByName('both_source_irrigation[]');
                                            for(var i=0; i<items.length; i++){
                                              for(var j=0; j<irrigation.length; j++){
                                                if(items[i].type=='checkbox' && items[i].value==irrigation[j])  {
                                                  items[i].checked=true;
                                                    if(items[i].value == 1){                
                                                      $('#bothland_number_wells').show();
                                                      document.getElementById("both_number_wells").value=responseArray.land_list[0].no_of_wells;                  
                                                    }
                                                    if(items[i].value == 3){                
                                                        $('#bothland_tube_wells').show();
                                                         document.getElementById("both_number_tubewells").value=responseArray.land_list[0].no_of_tubewells;
                                                    }
                                                }
                                              }
                                            }
                                        }

                                        if( responseArray.land_list[0].irrigation_method){
                                        var irrigation_method = responseArray.land_list[0].irrigation_method.split(",");
                                            var items1=document.getElementsByName('both_irrigation_method[]');
                                            for(var i=0; i<items1.length; i++){
                                              for(var j=0; j<irrigation_method.length; j++){
                                                if(items1[i].type=='checkbox' && items1[i].value==irrigation_method[j])  {
                                                  items1[i].checked=true;
                                                    if(items1[i].value == 2 || items1[i].value == 3 || items1[i].value == 4){                
                                                       $('#bothland_subsidy_avail').show();
                                                       var both_subsidy_avail = $('input:radio[name=both_subsidy_availed]'); 
                                                       if(responseArray.land_list[0].subsidy_availed == 1){                
                                                            if(both_subsidy_avail.is(':checked') === false) {
                                                                both_subsidy_avail.filter('[value=1]').prop('checked', true);
                                                                $('#bothland_year_subsidy_claim').show();
                                                                document.getElementById("both_year_subsidy_claimed").value=responseArray.land_list[0].subsidy_claimed_year;
                                                            }
                                                        }else if(responseArray.land_list[0].farm_pond == 2){                
                                                            if(both_subsidy_avail.is(':checked') === false) {
                                                                both_subsidy_avail.filter('[value=2]').prop('checked', true);
                                                            }
                                                        } 
                                                    }
                                                }

                                              }
                                            }
                                        }
                                       
                                        /** If Organic farmer means have the following data updation **/ 
										if(responseArray.land_list[0].organic_former != null) {                                        document.getElementById("organic_former").value=responseArray.land_list[0].organic_former;    
                                        }

                                        //organic farmer
                                        if(responseArray.land_list[0].organic_former==1 || responseArray.land_list[0].organic_former==3 ){
                                             $('#organic_farm_details').show();
                                             $('#land_identify').show();
                                            //getAreaUOM();
                                            //organic certification
                                            var organic_certification = $('input:radio[name=organic_certifiation]');
                                            if(responseArray.land_list[0]['organic_certifiation'] == 1){                
                                                //if(organic_certification.is(':checked') === false) {
                                                    organic_certification.filter('[value=1]').prop('checked', true);
                                                    //LoadCertifiedProduct();
                                                    $('#organic_with_certification').show();
                                                //}
                                            }else if(responseArray.land_list[0]['organic_certifiation'] == 2){                
                                                if(organic_certification.is(':checked') === false) {
                                                    organic_certification.filter('[value=2]').prop('checked', true);
                                                }
                                            }

                                            //document.getElementById("organic_cultivation_area").value=responseArray.land_list[0].cultivation_area;
                                            document.getElementById("certifiation").value=responseArray.land_list[0].certifiation; 
                                            document.getElementById("certifiation_agency_name").value=responseArray.land_list[0].certification_agency;              

                                            document.getElementById("accreditation_type").value=responseArray.land_list[0].accreditation_type;   
                                            document.getElementById("certified_products").value=responseArray.land_list[0].certified_products;                                                                     document.getElementById("jurisdiction").value=responseArray.land_list[0].jurisdiction;                                                      
                                            document.getElementById("intial_date_certifiation").value=responseArray.land_list[0].certifiation_date;  
                                            document.getElementById("effective_period_certifiation_from").value=responseArray.land_list[0].certifiation_period_from; 
                                            document.getElementById("effective_period_certifiation_to").value=responseArray.land_list[0].certifiation_period_to; 
                                            var area_uom = responseArray.land_list[0].area_uom;
                                            setTimeout(function(){                                              
											//document.getElementById("cultivation_area_uom").value = area_uom;  
                                            }, 500);                                                 
                                        }
                                }

                            }
                } else {
                    $('#land_holdings1').hide();
                    swal("Sorry!", "You are not enabled the land holdings. If you want to add land holding, update the farmer and try again");
                }
        
            }
      },
      error:function(){
        alert('Error!!! Try again');
      } 
      });
            
});

$('form').submit(function(e){
        e.preventDefault();
        $("input[name='land_type']").prop('disabled', false);
        var land_id =<?php echo $land_id; ?>;
        const farmerdata = $('#farmer_profileForm').serializeObject();        
        //console.log(farmerdata);
    
        $.ajax({
            url:"<?php echo base_url();?>administrator/farmer/updateland/"+land_id,
            type:"POST",
            data:farmerdata,
            dataType:"html",
            cache:false,      
            success:function(response){      
              response=response.trim();
              responseArray=$.parseJSON(response);
              //console.log(response);
                if(responseArray.status == 1) {
                     swal("Good!", responseArray.message, "success");
                     setTimeout(function(){ 
                       window.location = "<?php echo base_url('administrator/farmer/landlist')?>";
                     }, 500);					
				} else {
                    swal("", responseArray.message, "warning");
                } 
            },
            error:function(response){
              alert('Error!!! Try again');
            }             
        });  
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
							 var state ='';var district ='';
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
                            $("#dryland_pincode").val('');
							$("#wetland_pincode").focus();
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
                //console.log(response);
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
      
       

    
/** Land measurement update **/    
wetLandMeasure = 0;	
function GetMoreWetLandIdentify() {
    var original = document.getElementById('wetland_holdings2_' + wetLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#wet_land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement_unit").value != "") {
        clone.id = "wetland_holdings2_" + ++wetLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]); 
        document.querySelector("#"+clone.id).querySelector("#wet_land_id").value = "";
        document.querySelector("#"+clone.id).querySelector("#wet_land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement").value = "";
        document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement_unit").value = "";
        
        document.querySelector("#"+clone.id).querySelector("#wet_land_identification").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#wetland_land_measurement_unit").removeAttribute("readonly");
        
        document.querySelector("#"+clone.id).querySelector("#removeCreatedElement").style.display = "block";  
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function GetMoreWetLand(wetland) {
    var original = document.getElementById('wetland_holdings2_' + wetland);
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "wetland_holdings2_" + ++wetland; // there can only be one element with an ID
    original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]);    
    document.querySelector("#"+clone.id).querySelector("#removeCreatedElement").style.display = "none";    
    wetLandMeasure = wetland;
}    
function removeWetLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
    //if(wetLandMeasure != reqID.charAt(reqID.length - 1)) {
       e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode);
        wetLandMeasure = (wetLandMeasure-1);
//    } else {
//        swal("", "You can't able to delete this row");
//    }        
}
    
dryLandMeasure = 0;	
function GetMoreDryLandIdentify() {
    var original = document.getElementById('dryland_holdings2_' + dryLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#dry_land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement_unit").value != "") {
        clone.id = "dryland_holdings2_" + ++dryLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]);
        document.querySelector("#"+clone.id).querySelector("#dry_land_id").value = "";
        document.querySelector("#"+clone.id).querySelector("#dry_land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement").value = "";
        
        document.querySelector("#"+clone.id).querySelector("#dry_land_identification").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#dryland_land_measurement_unit").removeAttribute("readonly");
        
        document.querySelector("#"+clone.id).querySelector("#removeCreatedElement").style.display = "block";   
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function GetMoreDryLand(dryland) {
    var original = document.getElementById('dryland_holdings2_' + dryland);
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "dryland_holdings2_" + ++dryland; // there can only be one element with an ID
    original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]); 
    document.querySelector("#"+clone.id).querySelector("#removeCreatedElement").style.display = "none";   
    dryLandMeasure = dryland;
}    
function removeDryLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
//     if(dryLandMeasure != reqID.charAt(reqID.length - 1)) {
       e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode); 
         dryLandMeasure = (dryLandMeasure-1);
//    } else {
//        swal("", "You can't able to delete this row");
//    }        
}    


/** Both Land Details update **/ 
bothLandMeasure = 0;	
function GetMoreBothLandIdentify() {   
    var original = document.getElementById('bothland_holdings_' + bothLandMeasure);
    var clone = original.cloneNode(true); // "deep" clone
    if(document.querySelector("#"+clone.id).querySelector("#both_land_identification").value != "" && document.querySelector("#"+clone.id).querySelector("#both_land_measurement_unit").value != "" && document.querySelector("#"+clone.id).querySelector("#identity_type").value != "") {
        clone.id = "bothland_holdings_" + ++bothLandMeasure; // there can only be one element with an ID
        original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]); 
        document.querySelector("#"+clone.id).querySelector("#both_land_id").value = "";
        document.querySelector("#"+clone.id).querySelector("#both_land_identification").value = "";
        document.querySelector("#"+clone.id).querySelector("#both_land_measurement").value = "";
        
        document.querySelector("#"+clone.id).querySelector("#both_land_identification").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#both_land_measurement").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#both_land_measurement_unit").removeAttribute("readonly");
        document.querySelector("#"+clone.id).querySelector("#identity_type").removeAttribute("readonly");
        
        document.querySelector("#"+clone.id).querySelector("#removeBothCreatedElement").style.display = "block";   
    } else {
       swal("", "Provide the mandatory information in above row and try again!");
    }
}
function GetMoreBothLand(bothland_count) {
    var original = document.getElementById('bothland_holdings_' + bothland_count);
    var clone = original.cloneNode(true); // "deep" clone
    clone.id = "bothland_holdings_" + ++bothland_count; // there can only be one element with an ID
    original.parentNode.insertBefore(clone, original.parentNode.childNodes[0]);
    document.querySelector("#"+clone.id).querySelector("#removeBothCreatedElement").style.display = "none";   
    bothLandMeasure = bothland_count;
}
function removeBothLandMeasure(e) { 
    var reqID = e.parentNode.parentNode.parentNode.id;
    //if(bothLandMeasure != reqID.charAt(reqID.length - 1)) {
       e.parentNode.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode.parentNode);  
        bothLandMeasure = (bothLandMeasure-1)
    //} else {
      //  swal("", "You can't able to delete this row");
    //}        
}
   
/*   
function LoadCertifiedProduct() {
        $.ajax({
			url:"<?php echo base_url();?>administrator/farmer/getProductList",
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
    
    
function getAreaUOM() {
        $.ajax({
			url:"<?php echo base_url();?>administrator/farmer/getAreaUOM",
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
			url:"<?php echo base_url();?>administrator/farmer/getAreaUOM",
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
 
*/
  
$("#effective_period_certifiation_from").focusout(function() {
    var effective_period_certifiation_from = $(this).val();
    $("#effective_period_certifiation_to").attr("min", effective_period_certifiation_from);
});  


function getFarmerProfileLocation(type){
	var pincode = '';var street='';var door_no='';
	var state = '';var district = '';var taluk ='';var block ='';var panchayat ='';var village ='';
	if(type == 1){
		var farmer_id = document.getElementById("land_detail_farmer").value;
		var url = "<?php echo base_url();?>administrator/farmer/edit_Farmer/"+farmer_id;
	} else {
		var land_id = '<?php echo $land_id; ?>';
		var url = "<?php echo base_url();?>administrator/farmer/editland/"+land_id;
	}
	
		$.ajax({
			url:url,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
				//console.log(response);			
				response=response.trim();responseArray=$.parseJSON(response);
				if(responseArray.status == 1){
					if(responseArray.farmer_list && responseArray.farmer_list.length != 0){
						locationData = responseArray.farmer_list[0];
					} else {
						locationData = responseArray.land_list[0];
					}
					var pincode = '';var street='';var door_no='';
					var state = '';var district = '';var taluk ='';var block ='';var panchayat ='';var village ='';
					state += '<option value='+locationData['state']+'>'+locationData['state_name']+'</option>';
					
					district += '<option value='+locationData['district']+'>'+locationData['district_name']+'</option>';
					
					$.each(responseArray.talukInfo,function(key,value){
						if(value.taluk_code == locationData['taluk']){
							taluk += '<option value='+value.taluk_code+' selected>'+value.name+'</option>';
						} else {
							taluk += '<option value='+value.taluk_code+'>'+value.name+'</option>';
						}
				    });
					//taluk += '<option value='+locationData['taluk']+'>'+locationData['taluk_name']+'</option>';
					$.each(responseArray.blockInfo,function(key,value){
						if(value.block_code == locationData['block']){
							block += '<option value='+value.block_code+' selected>'+value.name+'</option>';
						} else {
							block += '<option value='+value.block_code+'>'+value.name+'</option>';
						}
				    });
					//block += '<option value='+locationData['block']+'>'+locationData['block_name']+'</option>';
					
					panchayat += '<option value='+locationData['panchayat']+'>'+locationData['panchayat_name']+'</option>';
					
					village += '<option value='+locationData['village']+'>'+locationData['village_name']+'</option>';
					
					pincode = locationData['pin_code'];
					street = locationData['street'];
					door_no = locationData['door_no']; 
					if(chkId == 1){
						$('#wetland_pincode').val(pincode);
						$('#wetland_street').val(street);
						$('#wetland_door_no').val(door_no);
						$('#wetland_state').html(state);
						$('#wetland_district').html(district);
						$('#wetland_taluk').html(taluk);
						$('#wetland_block').html(block);
						$('#wetland_gram_panchayat').html(panchayat);
						$('#wetland_village').html(village);
					} else if(chkId == 2){
						$('#dryland_pincode').val(pincode);
						$('#dryland_street').val(street);
						$('#dryland_door_no').val(door_no);
						$('#dryland_state').html(state);
						$('#dryland_district').html(district);
						$('#dryland_block').html(block);
						$('#dryland_taluk').html(taluk);
						$('#dryland_gram_panchayat').html(panchayat);
						$('#dryland_village').html(village);
					} else {
						$('#both_pincode').val(pincode);
						$('#both_street').val(street);
						$('#both_door_no').val(door_no);
						$('#both_state').html(state);
						$('#both_district').html(district);
						$('#both_taluk').html(taluk);
						$('#both_block').html(block);
						$('#both_gram_panchayat').html(panchayat);
						$('#both_village').html(village);
					} 
				}
			},error:function(response){
				alert('Error!!! Try again');
			} 			
		});			
}   
</script>