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
                        <h1>Share Application By FPO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('fpo/share');?>">Share Management</a></li>
                            <li class="active">View Share Application (FPO)</li>
                        </ol>
                    </div>
                </div>
            </div>
         </div>
        
         <div class="content mt-3">
            <div class="animated fadeIn">
               <form action="<?php echo base_url('fpo/share/updateShareApplicationByFPO/'.$share_application['id'])?>" method="post" id="editshare_application" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
                              <div class="container-fluid">                                                                         
                                 <div class="fpo_to_member_form" id="fpo_to_member_form" style="">                                            
                                    <div class="row row-space">
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Applicant Name <span class="text-danger">*</span></label>
                                          <select class="form-control" id="fpo_name" name="fpo_name" data-validation-required-message="Please select FPO" readonly>
                                             <option value="<?php echo $fpo_info['id']; ?>" ><?php echo $fpo_info['producer_organisation_name']; ?></option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Application Date <span class="text-danger">*</span></label>
                                          <input type="date" class="form-control" id="share_date" disabled value="<?php echo $share_application['apply_date']?>" name="share_date" placeholder="Date" max="2050-12-31" data-validation-required-message="provide the date" value="<?php echo $share_application['apply_date']; ?>" required>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="form-control-label">Shares Applied<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" disabled value="<?php echo $share_application['no_of_share']?>" maxlength="3" name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the shares" value="<?php echo $share_application['no_of_share']; ?>" required>
                                       </div>
                                       <!--<div class="form-group col-md-3">
                                          <label class="form-control-label">Shares Alloted<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" disabled value="<?php echo $share_application['no_share_approved'] > 0?$share_application['no_share_approved']:"Processing"?>" maxlength="3" name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the shares" value="<?php echo $share_application['no_of_share']; ?>" required>
                                       </div>-->
                                    </div>                                            
                                    <div class="row row-space">								            
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Mobile Number<span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" id="search_fpo" readonly maxlength="10" minlength="10" name="search_fpo" placeholder="Search with Mobile or Aadhaar" data-validation-required-message="Provide the search text or choose the FPO" value="<?php echo $share_application['mobile_number']; ?>">
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Email</label>
                                          <input type="email" class="form-control " readonly value="<?php echo $fpo_info['email']?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code" value="">
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" readonly value="<?php echo $fpo_info['pin_code']?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code" value="">
                                       </div>
                                    </div> 
                                            
                                    <div class="row row-space">												
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">State</label>
                                          <select class="form-control" id="state" name="state" readonly data-validation-required-message="Please select state">
                                             <option  value="<?php echo $fpo_info['state']?>"><?php echo $fpo_info['state_name']?></option>				
                                          </select>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">District</label>
                                          <select class="form-control" id="district" name="district" readonly data-validation-required-message="Please select district">
                                          <option  value="<?php echo $fpo_info['district']?>"><?php echo $fpo_info['district_name']?></option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Taluk </label>
                                          <select class="form-control" id="taluk" name="taluk" readonly data-validation-required-message="Please select taluk">
                                             <option  value="<?php echo $fpo_info['taluk_id']?>"><?php echo $fpo_info['taluk_name']?></option>
                                          </select>
                                       </div>                                
                                    </div>
                                            
                                    <div class="row row-space">											
                                       <div class="form-group col-md-4">						    
                                          <label for="inputAddress2">Block </label>
                                          <select class="form-control" id="area_block" name="area_block" readonly onchange="getPanchayatList(this.value);"  data-validation-required-message="Please select block">
                                             <option  value="<?php echo $fpo_info['block']?>"><?php echo $fpo_info['block_name']?></option>
                                          </select>
                                       </div>								
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Gram Panchayat</label>
                                          <select class="form-control" id="gram_panchayat" name="gram_panchayat" readonly onchange="getVillageList(this.value);">
                                             <option  value="<?php echo $fpo_info['panchayat']?>"><?php echo $fpo_info['panchayat_name']?></option>
                                          </select>
                                       </div>	
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Village</label>
                                          <select class="form-control" id="village" name="village" readonly >
                                             <option  value="<?php echo $fpo_info['village']?>"><?php echo $fpo_info['village_name']?></option>
                                          </select>
                                       </div>
                                    </div>                                            
                                    <div class="row row-space">
										<div class="form-group col-md-3">
                                          <label for="inputAddress2">Door No</label>
                                          <input type="text" class="form-control" readonly value="<?php echo $fpo_info['door_no']?>" maxlength="10" id="door_no" name="door_no" placeholder="Door No" value="">
                                       </div>		
                                       <div class="form-group col-md-9">
                                          <label for="inputAddress2">Street</label>
                                          <input type="text" class="form-control" maxlength="75" readonly value="<?php echo $fpo_info['street']?>" id="street_name" name="street_name" placeholder="Street" value="">
                                       </div>
                                    </div>
                                            
                                    <div class="row row-space mt-3">                                       							           
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Contact Person</label>
                                          <input type="text" class="form-control" readonly value="<?php echo $fpo_info['contact_person']?>" id="contact_person" name="contact_person" maxlength="25" placeholder="Contact Person" >
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Permanent Account Number (PAN) </label>
                                          <input type="text" class="form-control text-uppercase" readonly value="<?php echo $share_application['pan_number']?>"  maxlength="10" id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" >
                                       </div>  
										<div class="form-group col-md-4">
											<label class=" form-control-label">Application Status </label>
											<?php 
											if($share_application['status'] == 1){
												$status = "Processing";
											} else if($share_application['status'] == 2){
												$status = "Approved";
											} else if($share_application['status'] == 3){
												$status = "Transferred";
											} else if($share_application['status'] == 4){
												$status = "Surrendered";
											}
											?>
											<input type="text" class="form-control numberOnly" maxlength="3" disabled name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Provide the share count" value="<?php echo $status; ?>">
                                        </div>
                                    </div>                                            
                                 </div>
                                 <!-- Button creation for submit -->
                                 <div class="form-row">
                                    <div class="form-group col-md-12 text-center">
                                    <div id="success"></div>
                                    <!--<button id="edit" class="btn btn-success btn-fs text-center" type="button"> <i class="fa fa-edit"></i> Edit</button>
                                    <button id="sendMessageButton" value="Update" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>-->
                                    <!--	<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
                                    <a href="<?php echo base_url('fpo/share/fpo_shareapplication_list');?>"><button id="ok" href="" class="btn btn-fs btn-outline-dark text-center" type="button"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
                                    <a href="<?php echo base_url('fpo/share/fpo_shareapplication_list');?>"><button id="cancel" href="" style="display:none" class="btn btn-fs btn-outline-dark text-center" type="button"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</button></a>
                                        <!--<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Save</button>-->
                                    <!--<a href="<?php //echo base_url('fpo/share/fpo_shareapplication_list');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	-->
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
<?php //$this->load->view('templates/datatable.php');?>	  
<!--<script src="<?php //echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php //echo asset_url()?>js/register.js"></script>-->
<script>
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
      $('#share_date').attr('max', maxDate);
		
});   */ 
</script>
</body>
</html>