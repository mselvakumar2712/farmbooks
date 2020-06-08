<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
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
                        <h1>Add Member</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('fpo/member');?>">Member Management</a></li>
                            <li class="active">Add Member</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/member/postMember')?>" method="post" id="addmemberform" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">

                                        <div class="row row-space">
                                            <div class="form-group col-md-6">
                                                  <label class=" form-control-label">Member Type <span class="text-danger">*</span></label>
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-check-inline form-check">
                                                        <label for="member_type1" class="form-check-label">
                                                          <input type="radio" id="member_type1" name="member_type" value="1" class="form-check-input member_type" required="required" data-validation-required-message="Please select member type" ><span class="ml-1">Person</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-check-inline form-check">
                                                        <label for="member_type2" class="form-check-label">
                                                          <input type="radio" id="member_type2" name="member_type" value="2" class="form-check-input member_type" required="required" data-validation-required-message="Please select member type"><span class="ml-1">Producer Organization</span>
                                                        </label>
                                                       </div>
                                                    </div>
                                                  </div>
												  <input type="hidden" class="form-control numberOnly" name="member_type" id="member_type">
                                                  <div class="help-block with-errors text-danger"></div>
                                              </div>
                                            <div class="col-md-6" id="member_search" style="display: none;">
                                                <label for="inputAddress2">Search share allotment with Mobile <span class="text-danger">*</span></label>
                                                <input type="hidden" id="holder_id" name="holder_id" value="" required data-validation-required-message="Provide the search text">
                                                <input type="hidden" id="fpo_id" name="fpo_id" value="" required data-validation-required-message="Provide the search text">
                                                <input type="text" class="form-control numberOnly" id="search_allotment" maxlength="10" minlength="10" name="search_allotment" placeholder="Search with Mobile" data-validation-required-message="Provide the search text" value="">
                                                <div id="farmer_validate" class="help-block with-errors text-danger"></div>
                                            </div>
										 </div>

                                        <div class="share_alloted_farmer" id="share_alloted_farmer" style="display: none;">
											<hr style="border-bottom:1px solid black;">

                                            <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Interest Group <span class="text-danger">*</span></label>
													<select class="form-control" id="fig_name1" name="fig_name1" data-validation-required-message="Please select FIG">
														<option value="">Select FIG</option>
                                                        <?php for($i=0; $i<count($farmers);$i++) { ?>
                                                        <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                                        <?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Share Applied <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio1" class="form-check-label">
                                                              <input type="radio" id="alloted_share_paid" name="alloted_share_paid" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                            </label>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio2" class="form-check-label">
                                                              <input type="radio" id="alloted_share_paid" name="alloted_share_paid" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                            </label>
                                                           </div>
                                                        </div>
                                                    </div>
													<p id="share_allot_info" class="help-block text-danger"></p>
												</div>
                                            </div>
                                        </div>

                                        <div class="farmer_to_member_form" id="farmer_to_member_form" style="display: none;">
                                            <div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Farmer Interest Group (FIG) <span class="text-danger">*</span></label>
													<select class="form-control" id="fig_name2" name="fig_name2" required="required" data-validation-required-message="Please select FIG">
														<option value="">Select FIG </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Share Application Money Paid <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio1" class="form-check-label">
                                                              <input type="radio" id="person_money_paid" required name="person_money_paid" data-validation-required-message="Please select share application money paid" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                            </label>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio2" class="form-check-label">
                                                              <input type="radio" id="person_money_paid" required  name="person_money_paid" data-validation-required-message="Please select share application money paid" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                            </label>
                                                           </div>
                                                        </div>
                                                    </div>
													<p class="help-block text-danger"></p>
												</div>
                                                <div class="form-group col-md-4">
                                                    <label class=" form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" maxlength="3" name="person_no_of_share" id="person_no_of_share" placeholder="No. of Shares" data-validation-required-message="Provide the share value">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>

                                            <div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
													<input type="date" class="form-control" id="farmer_application_date" name="farmer_application_date" placeholder="Date" value="<?php echo date("Y-m-d"); ?>" max="2050-12-31" data-validation-required-message="provide the date">
													<div class="help-block with-errors text-danger"></div>
												</div>
                                                <div class="form-group col-md-4">
                                                    <label class=" form-control-label">Farmer Name </label>
                                                    <input type="text" class="form-control numberOnly" maxlength="50" name="person_aadhaar_no" id="person_aadhaar_no" placeholder="Aadhaar Number" readonly>
                                                </div>
												<div class="form-group col-md-4">
                                                    <label class=" form-control-label">Mobile Number </label>
                                                    <input type="text" class="form-control numberOnly" maxlength="10" name="person_mobile" id="person_mobile" placeholder="Mobile Number" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="fpo_to_member_form" id="fpo_to_member_form" style="display: none;">

                                        <div class="row row-space">
								            <div class="form-group col-md-4">
													<label for="inputAddress2">Farmer Interest Group (FIG) <span class="text-danger">*</span></label>
													<select class="form-control" id="fig_name3" name="fig_name3" required="required" data-validation-required-message="Please select FIG">
														<option value="">Select FIG </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Share Applied <span class="text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label">
                                                          <input type="radio" id="fpo_money_paid" name="fpo_money_paid" value="1" class="form-check-input" data-validation-required-message="Select any one of the field"><span class="ml-1">Yes</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-check-inline form-check">
                                                        <label for="inline-radio2" class="form-check-label">
                                                          <input type="radio" id="fpo_money_paid" name="fpo_money_paid" value="2" class="form-check-input" data-validation-required-message="Select any one of the field"><span class="ml-1">No</span>
                                                        </label>
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
												<div class="help-block with-errors text-danger"></div>
											</div>
                                            <div class="form-group col-md-4">
												<label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="fpo_date" name="fpo_date" placeholder="Date" value="<?php echo date("Y-m-d");?>" max="2050-12-31" data-validation-required-message="provide the date">
                                                <div class="help-block with-errors text-danger"></div>
											</div>
                                        </div>

										<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" readonly onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code">
													<p class="help-block text-danger" id="pincode_validate"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select class="form-control sel_state" id="state" name="state" readonly data-validation-required-message="Please select state">
														<option value="">Select State </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">District <span class="text-danger">*</span></label>
                                                    <select class="form-control sel_district" id="district" name="district" readonly data-validation-required-message="Please select district">
                                                        <option value="">Select District </option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
										 </div>

										<div class="row row-space">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select class="form-control sel_taluk" id="taluk" name="taluk" readonly data-validation-required-message="Please select taluk">
												<option value="">Select Taluk</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select class="form-control sel_block" id="area_block"  name="area_block" readonly data-validation-required-message="Please select block">
												<option value="">Select Block</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>

											<div class="form-group col-md-4">
												<label for="inputAddress2">Gram Panchayat</label>
												<select class="form-control sel_panchayat" id="gram_panchayat" readonly name="gram_panchayat" data-validation-required-message="Please select gram panchayat" onchange="getVillageList(this.value);">
												<option value="">Select Gram Panchayat</option>
												</select>
											</div>
										</div>

										<div class="row row-space">
								            <div class="form-group col-md-4">
												<label for="inputAddress2">Village</label>
												<select class="form-control sel_village" id="village" readonly name="village" data-validation-required-message="Please select village">
												<option value="">Select Village</option>
												</select>
								            </div>
											<div class="form-group col-md-2">
                                                <label for="inputAddress2">Door No</label>
                                                <input type="text" class="form-control"  readonly maxlength="10" id="door_no" name="door_no" placeholder="Door No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Street</label>
                                                <input type="text" class="form-control" readonly maxlength="75" id="street_name" name="street_name" placeholder="Street">
                                            </div>
								        </div>

								        <div class="row row-space">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" minlength="10" readonly maxlength="10" name="mobile_number" pattern="^[6-9]\d{9}$" onfocusout="verifyMobileNumber(this.value)" id="mobile_number" placeholder="Mobile Number" data-validation-required-message="Enter mobile number">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
								            <div class="form-group col-md-2">
                                                <label class="form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" maxlength="3" name="fpo_no_of_share" id="fpo_no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the shares">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
											<div class="form-group col-md-6">
                                                <label for="inputAddress2">Contact Person <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="contact_person" readonly name="contact_person" maxlength="25" placeholder="Contact Person" data-validation-required-message="Enter contact number">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
								        </div>

                                        <div class="row row-space">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Permanent Account Number (PAN) </label>
												<input type="text" class="form-control text-uppercase" maxlength="10" readonly id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" data-validation-required-message="Enter the PAN Number">
								            </div>
                                        </div>
                                        </div>

										<div class="fpo_register" id="fpo_register" style="display: none;">
											<hr style="border-bottom:1px solid black;">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Select POPI <span class="text-danger">*</span></label>
													<select class="form-control" id="popi_name" name="popi_name" required="required"  data-validation-required-message="Select POPI...">
														<?php for($i=0;$i<count($popi_list);$i++){ ?>
														<option value="">Select POPI</option>
														<option value="<?php echo $popi_list[$i]->user_id; ?>"><?php echo $popi_list[$i]->institution_name; ?></option>
														<?php } ?>
													</select>
													<div class="help-block with-errors text-danger mt-3"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Name of the Producers Organisation <span class="text-danger">*</span></label>
													<input type="hidden" class="form-control" name="fpo_register_name" id="fpo_register_name" value='yes'>
													<input type="text" class="form-control" maxlength="100" name="producer_organisation_name" id="producer_organisation_name" placeholder="Name of the Producers Organisation " required="required" data-validation-required-message="Please enter promoting institution name.">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">E-Mail Address <span class="text-danger">*</span></label>
													<input type="email" class="form-control" id="email" name="email" placeholder="E-Mail Address" required="required" data-validation-required-message="Please enter email address.">
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="row row-space">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
													<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" maxlength="10" id="mobile_num" name="mobile_num" onfocusout="verifyMobileNumber(this.value)" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
													<div id="mbl_validate" class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" onkeyup="registerFPOPincode(this.value)" maxlength="6" pattern="[1-9][0-9]{5}" id="postcode" name="postcode" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
													<div class="help-block with-errors text-danger" id="postcode_validate"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select id="stateCode" class="form-control" readonly name="stateCode" required="required" data-validation-required-message="Please Select State .">
														<option value="">Select State </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select id="districtCode" class="form-control" readonly name="districtCode" required="required" data-validation-required-message="Please Select District .">
														<option value="">Select District </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
													<select class="form-control" name="talukCode" id="talukCode" required="required" data-validation-required-message="Please Select Taluk .">
														<option value="">Select Taluk </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Block <span class="text-danger">*</span></label>
													<select id="blockCode" class="form-control" name="blockCode" onchange="getPanchayatList(this.value);" required="required" data-validation-required-message="Please Select Block .">
														<option value="">Select Block </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
													<select id="panchayatCode" class="form-control" name="panchayatCode" required="required" onchange="getVillageList(this.value);" data-validation-required-message="Please Select gram panchayat .">
														<option value="">Select Gram Panchayat </option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Village <span class="text-danger">*</span></label>
													<select id="villageCode" class="form-control" name="villageCode" required="required" data-validation-required-message="Please enter village.">
														<option value="">Select Village</option>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-2">
													<label for="inputAddress2">Door No</label>
													<input type="text" class="form-control" maxlength="10" id="doorNo" name="doorNo" placeholder="Door No">
												</div>
												<div class="form-group col-md-5">
													<label for="inputAddress2">Street</label>
													<input type="text" class="form-control" maxlength="75" id="streetName" name="streetName" placeholder="Street">
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">STD Code</label>
													<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" id="stdCode" maxlength="8" minlength="3" name="stdCode" title="Landline number starts with '0'" placeholder="Ex:012">
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Land Line Number </label>
													<input class="form-control numberOnly" maxlength="8" minlength="6" id="landLineNo" name="landLineNo" placeholder="Land Line Number">
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-4">
													<label class=" form-control-label">Constitution <span class="text-danger">*</span></label>
													<div class="row">
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="constitution1" class="form-check-label">
																	<input type="radio" id="constitution1" name="constitution" value="1" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Company</span>
																</label>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="constitution2" class="form-check-label">
																	<input type="radio" id="constitution2" name="constitution" value="2" class="form-check-input" required="required" data-validation-required-message="Please select constitution."><span class="ml-1">Society</span>
																</label>
															</div>
														</div>
													</div>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Permanent Account Number(PAN) <span class="text-danger">*</span> </label>
													<input type="text" class="form-control text-uppercase" maxlength="10" id="pan" name="pan" placeholder="Ex:AAAPL1234C" required="required" data-validation-required-message="Please enter pan.">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Registration Number(CIN)/Society <span class="text-danger">*</span></label>
													<input type="text" class="form-control text-uppercase" maxlength="21"  name="reg_no"  id="reg_no" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." >
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Formation Date <span class="text-danger">*</span></label>
													<input type="date" class="form-control" value="<?php echo $date_formation;?>" name="date_formation" onfocusout="calculateformdate(this.value);" id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Business Commence From <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="business_commence" onfocusout="calculateformdate(this.value);" maxlength="10" id="business_commence" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow">
													<div class="help-block with-errors text-danger" id="validate_date"></div>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">IE Code Number</label>
													<input type="text" class="form-control text-uppercase" name="ie_code" maxlength="10" id="ie_code" placeholder="IE Code">
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Goods & Service Tax Number(GST)</label>
													<input type="text" class="form-control text-uppercase" name="gst" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1">
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Tax Deduction Account(TAN)</label>
													<input type="text" class="form-control text-uppercase" id="tax_deduction" maxlength="10" name="tax_deduction" placeholder="Ex:AAAA00000A">
												</div>
												<div class="form-group col-md-5">
													<label class=" form-control-label">Type of Business <span class="text-danger">*</span></label>
													<div class="row">
														<div class="col-md-5 pr-0">
															<div class="form-check-inline form-check">
																<label for="business_type1" class="form-check-label">
																	<input type="checkbox" id="business_type1" name="business_type[]" value="1" class="form-check-input business_type" >Manufacturing
																	<p id="demo"></p>
																</label>
															</div>
														</div>
														<div class="col-md-4 pl-0 pr-0">
															<div class="form-check-inline form-check">
																<label for="business_type2" class="form-check-label">
																	<input type="checkbox" id="business_type2" name="business_type[]" value="2" class="form-check-input business_type" >Trading
																</label>
															</div>
														</div>
														<div class="col-md-3 pl-0 pr-0">
															<div class="form-check-inline form-check">
																<label for="business_type3" class="form-check-label">
																	<input type="checkbox" id="business_type3" name="business_type[]" value="3" class="form-check-input business_type" >Service
																</label>
															</div>
														</div>
													</div>
													<div class="help-block with-errors text-danger" id="validatecheck"></div>
												</div>
												<div class="form-group col-md-4" id="">
													<label for="inputAddress">Nature of Business <span class="text-danger">*</span></label>
													<div class="row" >
														<label for="" class="form-check-label"></label>
														<select id="business_nature"
														name="business_nature[]" multiple class="form-control" required="required" data-validation-required-message="Please select.">
														</select>
													 </div>
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="row row-space mt-3">
												<div class="form-group col-md-3">
													<label class=" form-control-label">Inventory Required <span class="text-danger">*</span></label>
													<div class="row">
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="inventory_required1" class="form-check-label">
																	<input type="radio" id="inventory_required1" name="inventory_required" value="1" class="form-check-input" required="required" data-validation-required-message="Please select inventory.">Yes
																</label>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="inventory_required2" class="form-check-label">
																	<input type="radio" id="inventory_required2" name="inventory_required" value="2" class="form-check-input" required="required" data-validation-required-message="Please select inventory.">No
																</label>
															</div>
														</div>
													</div>
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlength="50" name="contact_person_name"  id="contact_person_name" placeholder="Contact Person" required="required" data-validation-required-message="Please enter contact person name.">
													<div class="help-block with-errors text-danger"></div>
												</div>

												<div class="form-group col-md-3">
													<label for="inputAddress2">Financial Year Begins <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="financial_year" id="financial_year" value="<?php echo $financial_year_from; ?>" onfocusout="calculatedate(this.value);" placeholder="Financial Year Begins" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow">
													<div class="help-block with-errors text-danger"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Financial Year Closing <span class="text-danger">*</span></label>
													<input type="date" class="form-control" readonly name="financial_year_to" value="<?php echo $financial_year_to; ?>" id="financial_year_to" onfocusout="calculatedate(this.value);" placeholder="Financial Year Closing" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow">
													<div class="help-block with-errors text-danger"></div>
												</div>
											</div>

											<div class="col-md-12 text-center">
												<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save FPO</button>
												<a href="<?php echo base_url('fpo/member');?>" id="" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
											</div>
										</div>

                                        <!-- Button creation for submit -->
										<div class="form-row mt-5" id="buttonContent">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
								                <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add as Member</button>
												<a href="<?php echo base_url('fpo/member');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
											 </div>
								        </div>

								    </div>
								    </div>
								</div>
				            </div>
				    </div>
				</form>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
</div>

<?php $this->load->view('templates/footer.php');?>
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script>
$("#sendMessageButton").click(function(){
	//event.preventDefault();
	$('#member_type1').prop("disabled", "false");
	$('#member_type2').prop("disabled", 'false');
	var search_allotment=document.getElementById("search_allotment").value;
	var member_type=document.querySelector(".member_type").value;
	var popi_name=document.getElementById("popi_name").value;
	var fpoNameRegister=document.getElementById("producer_organisation_name").value;

	if(member_type == 2 && popi_name && fpoNameRegister){
		var startDt=document.getElementById("date_formation").value;
		var endDt=document.getElementById("business_commence").value;
		if(startDt && endDt){
			if((new Date(startDt).getTime() > new Date(endDt).getTime())){
				$("#validate_date").html("Selected date should be LATER than Formation date");
				return false;
			}
		}
		var count_checked = $("[name='business_type[]']:checked").length; // count the checked rows
		if(count_checked == 0){
			$("#validatecheck").html("Please choose type of business");
			return false;
		}
	} else {
		if(search_allotment == ''){
			$("#farmer_validate").html("Please enter the share allotment with Mobile");
			return false;
		}
	}
});

$('#pan_number').change(function (event) {
    var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/;
    var txtpan = $(this).val();
    if (txtpan.length == 10 ) {
        if( txtpan.match(regExp) ){
            // alert('PAN match found');
        } else {
            $("#pan_number").val('');
            //alert('Not a valid PAN number');
            swal('Sorry!',"Not a valid PAN number", "danger");
            $("#pan_number").focus();
            event.preventDefault();
        }
    } else {
       $("#pan_number").val('');
       swal('Sorry!',"Please enter 10 digits for a valid PAN number", "warning");
       //alert('Please enter 10 digits for a valid PAN number');
       $("#pan_number").focus();
       event.preventDefault();
    }
});

//pincode
function getPincode( pin_code ) {
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
					var block ='';
					var taluk_id ='';
                    var village = '';
                    var gram_panchayat = '';
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
                    $('.sel_village').html(village);
                    $('.sel_panchayat').html(gram_panchayat);
					$('.sel_state').html(state);
					$('.sel_district').html(district);
					$('.sel_block').html(block);
					$('.sel_taluk').html(taluk_id);
                } else {
					$(".this_pin_code").val('');
					$(".this_pin_code").focus();
					$("#pincode_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$(".sel_state").html('<option value="">Select State</option>');
					$(".sel_district").html('<option value="">Select District</option>');
					$(".sel_taluk").html('<option value="">Select Taluk</option>');
					$(".sel_block").html('<option value="">Select Block</option>');
					$(".sel_panchayat").html('<option value="">Select Gram Panchayat</option>');
					$(".sel_village").html('<option value="">Select Village</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			}
         });
    }
}

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
      $('#fpo_date').attr('max', maxDate);

		$('#date_formation').attr('max', maxDate);
		$('#business_commence').attr('max', maxDate);
		$('#financial_year').attr('max', maxDate);
});

var member_type = $("input[name='member_type']");
var chk_member_type = "";
var mobileState=0;
$('input').on('click', function() {
    var alloted_share_paid_value="";

    //member type condition
    if (member_type.is(':checked')) {
        $("input[name='member_type']:checked").each (function(){
            chk_member_type = $(this).val() + ",";
            chk_member_type = chk_member_type.slice(0, -1);
        });

        if(chk_member_type==1){
            $('#member_search').show();
			$('#share_alloted_farmer').hide();
			$('#fpo_to_member_form').hide();
			$('#fpo_register').hide();
			$("#member_type").val('1');
        }else{
            $('#member_search').show();
			$('#share_alloted_farmer').hide();
			$('#farmer_to_member_form').hide();
			$("#member_type").val('2');
        }
		//if(mobileState == 0){
			//$("#search_allotment").val('');
			//mobileState=1;;
		//}
		//$("#search_allotment").val('');
		//$("#holder_id").val('');
    }
});


$('input[name=alloted_share_paid]').on('change', function() {
    var alloted_share_paid = $("input[name='alloted_share_paid']:checked").val();
    if(alloted_share_paid == 1) {
		$('#share_alloted_farmer').show();
    } else {
        swal({
                  title: "Are you sure?",
                  text: "Share application details not entered in Share Management Module, Please enter and proceed or cancel to enter details manually",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes",
                  cancelButtonText: "No need",
                  closeOnConfirm: false,
                  closeOnCancel: false
                }).then((result) => {
                  if(result.value) {
                      if(chk_member_type==1){
                         $('#share_alloted_farmer').show();
                         $('#fpo_to_member_form').hide();
                         $('#farmer_to_member_form').hide();
                      } else {
                         $('#share_alloted_farmer').show();
                         $('#farmer_to_member_form').hide();
                         $('#fpo_to_member_form').hide();
                      }
                  } else {
                    window.location = "<?php echo base_url('fpo/member')?>";
                  }
                });
    }
});


$('input[name=person_money_paid]').on('change', function() {
    var person_money_paid = $("input[name='person_money_paid']:checked").val();
    if(person_money_paid == 1) {
    //alert("yes");
    } else {
        swal({
            title: "Are you sure?",
            text: "You are not share holder, Please enter and proceed or cancel to enter details",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            cancelButtonText: "No need",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if(result.value) {
                $("input[name=person_money_paid][value=2]").attr('checked', false);
            } else {
                window.location = "<?php echo base_url('fpo/member'); ?>";
            }
        });
    }
});


$('input[name=fpo_money_paid]').on('change', function() {
    var fpo_money_paid = $("input[name='fpo_money_paid']:checked").val();
    if(fpo_money_paid == 1) {
    //alert("yes");
    } else {
        swal({
            title: "Are you sure?",
            text: "You are not share holder, Please enter and proceed or cancel to enter details",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes",
            cancelButtonText: "No need",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(isConfirm) {
            if(isConfirm) {
                $("input[name=fpo_money_paid][value=2]").attr('checked', false);
            } else {
                window.location = "<?php echo base_url('fpo/member')?>";
            }
        });
    }
});


$("#search_allotment").focusout(function(){
    var search_allotment_value = $(this).val();
    if(search_allotment_value.length == 10 && (search_allotment_value.charAt(0) == 2 || search_allotment_value.charAt(0) == 6 || search_allotment_value.charAt(0) == 7 || search_allotment_value.charAt(0) == 8 || search_allotment_value.charAt(0) == 9)) {
		var search_allotment = {'mobilenumber':search_allotment_value, 'aadhaar_number':"", 'member_type':chk_member_type};
        $('#member_type1').prop("disabled", "true");
		$('#member_type2').prop("disabled", "true");
		searchShareAllotmentWithOption(search_allotment);
    } else {
        $("#farmer_validate").html("<div class='alert alert-danger'>Mobile number should starts with 6/7/8/9</div>");
        $(this).val('');
    }
});


function searchShareAllotmentWithOption(search_allotment){
       $.ajax({
			url:"<?php echo base_url();?>fpo/member/searchShareAllotment",
			type:"POST",
			data:search_allotment,
			dataType:"html",
            cache:false,
			success:function(response) {
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1 && responseArray.member_data.length > 0){
                    if(responseArray.member_data[0]['holder_id']) {
                        document.getElementById('holder_id').value = responseArray.member_data[0]['holder_id'];
                    }
                    document.getElementById('fpo_id').value = responseArray.member_data[0]['fpo_id'];
                    //getAllFIGByFPO(responseArray.member_data[0]['fpo_id']);
                    if(responseArray.member_data[0].member_type == 1) {
                        $('#person_mobile').val(responseArray.member_data[0]['mobile']);
                        $('#person_aadhaar_no').val(responseArray.member_data[0]['aadhar_no']);
                        $("#farmer_validate").html("<div class='alert alert-success'>Farmer selected successfully</div>");
                    } else {
                        //getFPODetails(responseArray.member_data[0]['fpo_id']);
                        $('#fpo_mobile').val(responseArray.member_data[0]['fpo_mobile']);
                        $("#farmer_validate").html("<div class='alert alert-success'>FPO selected successfully</div>");
                    }
                    $("input[name=alloted_share_paid][value=1]").attr('checked', true);
                    $('#share_alloted_farmer').show();
                    $('#farmer_to_member_form').hide();
                    $('#fpo_to_member_form').hide();

                    $("#fig_name1").prop('required',true);
                    $("#alloted_share_paid").prop('required',true);
                    $('#buttonContent').show();
                } else if(responseArray.status == 2) {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					swal({
                      title: responseArray.message,
                      text: "Are you sure, you want to register?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes",
                      cancelButtonText: "No need",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    }).then((result) => {
						if(result.value && chk_member_type == 2){
							$('#member_search').show();
							$('#fpo_register').show();
							$('#farmer_to_member_form').hide();
                            $('#fpo_to_member_form').hide();
                            $('#share_alloted_farmer').hide();
							$('#buttonContent').hide();
							$('#mobile_num').val(search_allotment['mobilenumber']);
							$("#mobile_num").prop('readonly', true);
							$("#search_allotment").val(search_allotment['mobilenumber']);
						} else {
							$('#fpo_register').hide();
							location.reload();
						}
                    });
				} else {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
                    $('#buttonContent').hide();
					swal({
                      title: "You are not a Shareholder",
                      text: "Are you sure you want to became a member?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonClass: "btn-danger",
                      confirmButtonText: "Yes",
                      cancelButtonText: "No need",
                      closeOnConfirm: false,
                      closeOnCancel: false
                    }).then((result) => {
                      if(result.value) {
                          if(chk_member_type == 1){
                              $('#farmer_to_member_form').show();
                              $('#fpo_to_member_form').hide();
                              $('#share_alloted_farmer').hide();
							  $('#fpo_register').hide();

                              $("#fig_name2").prop('required',true);
                              $("#person_money_paid").prop('required',true);
                              $("#person_no_of_share").prop('required',true);
                              $("#person_mobile").prop('required',true);

                              if(responseArray.member_data[0]) {
                                $('#holder_id').val(responseArray.member_data[0]['id']);
								$('#person_mobile').val(responseArray.member_data[0]['mobile']);
								$('#person_aadhaar_no').val(responseArray.member_data[0]['profile_name']);
								/*if(responseArray.member_data[0]['aadhar_no'].length > 0 && responseArray.member_data[0]['aadhar_no'].length == 12) {
									aadhaar_value = responseArray.member_data[0]['aadhar_no'].match(new RegExp('.{1,4}', 'g')).join(" ");
									$('#person_aadhaar_no').val('XXXX XXXX '+aadhaar_value.substring(10));
								}*/
								$('#buttonContent').show();
							  } else {
								$('#farmer_to_member_form').hide();
								$("#search_allotment").val('');
							  }
                          } else {
                              $('#fpo_to_member_form').show();
                              $('#farmer_to_member_form').hide();
                              $('#share_alloted_farmer').hide();
							  $('#fpo_register').hide();

                              $("#fig_name3").prop('required',true);
                              $("#fpo_date").prop('required',true);
                              $("#pin_code").prop('required',true);
                              $("#contact_person").prop('required',true);
                              $("#mobile_number").prop('required',true);

                              if(responseArray.member_data[0]){
                                  $('#holder_id').val(responseArray.member_data[0]['id']);
                                  getFPODetails(responseArray.member_data[0]['id']);
								  $('#mobile_number').val(responseArray.member_data[0]['mobile']);
								  $('#buttonContent').show();
                              } else {
								$('#fpo_to_member_form').hide();
								$("#search_allotment").val('');
							  }
                          }
                      } else {
                          window.location = "<?php echo base_url('fpo/member')?>";
                      }
                    });
                    //$('#buttonContent').show();
                }
            }
         });
}


function getAllFIGByFPO(fpo_id) {
        $.ajax({
			url:"<?php echo base_url();?>fpo/member/getAllFIGByFPO/"+fpo_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var fig_names = '<option value="">Select FIG</option>';
                $.each(responseArray.fig_list, function(key, value){
                    fig_names += '<option value='+value.id+'>'+value.FIG_Name+'</option>';
                });
                $('#fig_name1').html(fig_names);
                $('#fig_name2').html(fig_names);
                $('#fig_name3').html(fig_names);
            },
			error:function(response){
				alert('Error!!! Try again');
			}
         });
}


function getFPODetails(fpo_id){
    $.ajax({
	   url:"<?php echo base_url();?>fpo/share/getLocationFpo/"+fpo_id,
	   type:"GET",
	   data:"",
	   dataType:"html",
	   cache:false,
	   success:function(response) {
		   console.log(response);
		   response=response.trim();
		   responseArray=$.parseJSON(response);
		   //getPincode( responseArray.location_data[0]['pin_code'] );
		   $('#pin_code').val(responseArray.location_data[0]['pin_code']);
		   $('#door_no').val(responseArray.location_data[0]['door_no']);
		   $('#street_name').val(responseArray.location_data[0]['street']);
		   $('#mobile_number').val(responseArray.location_data[0]['mobile']);
		   $('#contact_person').val(responseArray.location_data[0]['contact_person']);
		   $('#pan_number').val(responseArray.location_data[0]['pan']);
			$('.sel_state').html('<option value='+responseArray.location_data[0]['state']+'>'+responseArray.location_data[0]['state_name']+'</option>');
			$('.sel_district').html('<option value='+responseArray.location_data[0]['district']+'>'+responseArray.location_data[0]['district_name']+'</option>');
			$('.sel_block').html('<option value='+responseArray.location_data[0]['block']+'>'+responseArray.location_data[0]['block_name']+'</option>');
			$('.sel_taluk').html('<option value='+responseArray.location_data[0]['taluk_id']+'>'+responseArray.location_data[0]['taluk_name']+'</option>');
			$('.sel_village').html('<option value='+responseArray.location_data[0]['village']+'>'+responseArray.location_data[0]['village_name']+'</option>');
			$('.sel_panchayat').html('<option value='+responseArray.location_data[0]['panchayat']+'>'+responseArray.location_data[0]['panchayat_name']+'</option>');
	   },
	   error:function(response){
		   alert('Error!!! Try again');
	   }
   });
}



$(document).ready(function(){
    $('#buttonContent').hide();
	$('#fpo_register').hide();
    var fpo_id = "<?php echo $_SESSION['user_id']; ?>";
    getAllFIGByFPO(fpo_id);

	/* New FPO Content -> business nature*/
	$('#business_nature').select2();
	var businessinfo = [];
		Array.prototype.remove = function() {
		var what, a = arguments, L = a.length, ax;
		while (L && this.length) {
			what = a[--L];
			while ((ax = this.indexOf(what)) !== -1) {
				this.splice(ax, 1);
			}
		}
		return this;
	};
	$('input[class="business_type"]').on('change',function(){
		var inputValue = $(this).attr("value");
		if($(this).is(':checked')){
			businessinfo.push(inputValue);
		}else{
			businessinfo.remove(inputValue);
		}
		if(businessinfo.length > 0) {
			getbusinesstype(businessinfo);
		} else {
			$('#business_nature').html('');
		}

	});
});

function calculateformdate(date_formation){
	document.getElementById("business_commence").value = date_formation;
}

//business type
function getbusinesstype( business_type ){
	$('#business_nature').select2();
	var businessinfo = [];
	//console.log(business_type);
	$.ajax({
		url:"<?php echo base_url();?>administrator/fpo/getbusiness_type",
		type:"POST",
		data: {business_type:business_type},
		dataType:"html",
		cache:false,
		success:function(response) {
			console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1) {
				var business = '<option class="text-uppercase" value="">Select Business Nature</option>';
				$.each(responseArray.businessInfo,function(key, value){
					business += '<option  value='+value.id+'>'+value.name+'</option>'
				});
				$('#business_nature').html(business);
			}
		},
		error:function(response){
			alert('Error!!! Try again');
		}
	});
}
//ends//


$('#pan').change(function (event){
	var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/;
	var txtpan = $(this).val();
	if (txtpan.length == 10 ) {
		if( txtpan.match(regExp) ){
		//alert('PAN match found');
		} else {
			$("#pan").val('');
			alert('Not a valid PAN number');
			$("#pan").focus();
			event.preventDefault();
		}
	} else {
		$("#pan").val('');
		alert('Please enter 10 digits for a valid PAN number');
		$("#pan").focus();
		event.preventDefault();
	}
});

$('#tax_deduction').change(function (event){
	var regExp = /[a-zA-z]{4}\d{5}[a-zA-Z0-9]{1}/;
	var txtpan = $(this).val();
	if (txtpan.length == 10 ) {
		if( txtpan.match(regExp) ){
		//alert('TAN match found');
		} else {
			$("#tax_deduction").val('');
			alert('Not a valid TAN number');
			$("#tax_deduction").focus();
			event.preventDefault();
		}
	} else {
		$("#tax_deduction").val('');
		alert('Please enter 10 digits for a valid TAN number');
		$("#tax_deduction").focus();
		event.preventDefault();
	}
});

$('#gst').change(function (event){
	var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/;
	var txtgst = $(this).val();
	if (txtgst.length == 15 ) {
		if( txtgst.match(regExp) ){
			//alert('GST match found');
		} else {
			$("#gst").val('');
			alert('Not a valid GST number');
			$("#gst").focus();
			event.preventDefault();
		}
	} else {
		$("#gst").val('');
		alert('Please enter 15 digits for a valid GST number');
		$("#gst").focus();
		event.preventDefault();
	}
});

$("#producer_organisation_name").focusout(function(){
    var mobile_number = $('#search_allotment').val();
	$('#mobile_num').val(mobile_number);
});

function verifyMobileNumber(mobilenumber){
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
			    $("#mobile_num").val('');
				$("#mobile_num").focus();
				$("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
			}
		}
		});
	}
}

function calculatedate(financial_year_from){
	var financial_year = new Date(financial_year_from);
	if(financial_year.getMonth() < 3){
		var yyyy = financial_year.getFullYear();
	} else {
		var yyyy = financial_year.getFullYear()+1;
	}
	var financial_year_to = yyyy+'-03-31';
   document.getElementById("financial_year_to").value = financial_year_to;
}

//pincode
function registerFPOPincode(pin_code){
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
                    var state = '';
					var district = '';
					var block = '<option value="">Select Block</option>';
					var taluk_id = '<option value="">Select Taluk</option>';
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk_id += '<option value='+value.id+'>'+value.name+'</option>';
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
					$('#stateCode').html(state);
					$('#districtCode').html(district);
					$('#blockCode').html(block);
					$('#talukCode').html(taluk_id);
                } else {
					$("#postcode").val('');
					$("#postcode").focus();
					$("#stateCode").html('<option value="">Select State</option>');
					$("#districtCode").html('<option value="">Select District</option>');
					$("#talukCode").html('<option value="">Select Taluk</option>');
					$("#blockCode").html('<option value="">Select Block</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			}
         });
    }
}

function getPanchayatList(block_code){
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
			$('#panchayatCode').html(gram_panchayat);
		},
		error:function(response){
			alert('Error!!! Try again');
		}
	});
}

function getVillageList(panchayat_code){
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
			$('#villageCode').html(village);
		},
		error:function(response){
			alert('Error!!! Try again');
		}
	 });
}

</script>
</body>
</html>
