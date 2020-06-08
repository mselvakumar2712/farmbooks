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
                        <h1>Add Member</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/member');?>">Member Management</a></li>
                            <li class="active">Add Member</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('administrator/member/postMember')?>" method="post" id="addmemberform" name="sentMessage" novalidate="novalidate" >
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
                                                          <input type="radio" id="member_type1" name="member_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please select member type"  ><span class="ml-1">Person</span>
                                                        </label>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-8">
                                                      <div class="form-check-inline form-check">
                                                        <label for="member_type2" class="form-check-label">
                                                          <input type="radio" id="member_type2" name="member_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please select member type"><span class="ml-1">Producer Organization</span>
                                                        </label>
                                                       </div>
                                                    </div>			
                                                  </div>
                                                  <div class="help-block with-errors text-danger"></div>
                                              </div>
                                            <div class="col-md-6" id="member_search" style="display: none;">
												<input type="hidden" id="holder_id" name="holder_id" value="">
                                                <input type="hidden" id="fpo_id" name="fpo_id" value="">
                                                <label for="inputAddress2">Search share allotment with Mobile or Aadhaar <span class="text-danger">*</span></label>                                             
                                                <input type="text" class="form-control numberOnly" id="search_allotment" maxlength="10" minlength="10" name="search_allotment" placeholder="Search with Mobile or Aadhaar" required="required" data-validation-required-message="Provide the search text or choose the member">
                                                <div id="farmer_validate" class="help-block with-errors text-danger"></div>
                                            </div>
										 </div>
                                          
                                        <div class="share_alloted_farmer" id="share_alloted_farmer" style="display: none;">
                                        <hr style="border-bottom:1px solid black;">
                                            
                                            <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Interest Group <span class="text-danger">*</span></label>
													<select class="form-control" id="fig_name1" name="fig_name1" data-validation-required-message="Select any one FIG">
														<option value="">Select FIG</option>
                                                        <?php for($i=0; $i<count($farmers);$i++) { ?>
                                                        <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                                        <?php } ?>	
													</select>
													<div class="help-block with-errors text-danger"></div>
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
                                        
                                        <div class="show_FPO" id="show_FPO" style="display: none;">
                                            <hr style="border-bottom:1px solid black;">
                                            <div class="row row-space">
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress2">Producer Organization Name <span class="text-danger">*</span></label>
                                                <select class="form-control" id="show_fpo_id" name="show_fpo_id" data-validation-required-message="Select any one FPO">
                                                    <option value="">Select FPO</option>
                                                    <?php for($i=0; $i<count($fpo_list);$i++) { ?>
                                                    <option value="<?php echo $fpo_list[$i]->id; ?>"><?php echo $fpo_list[$i]->producer_organisation_name; ?></option>
                                                    <?php } ?>	
                                                </select>
                                                <div class="help-block with-errors text-danger"></div>
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
													<label for="inputAddress2">Share Applied <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio1" class="form-check-label">
                                                              <input type="radio" id="person_money_paid" name="person_money_paid" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                            </label>
                                                          </div> 
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="form-check-inline form-check">
                                                            <label for="inline-radio2" class="form-check-label">
                                                              <input type="radio" id="person_money_paid" name="person_money_paid" value="2" class="form-check-input"><span class="ml-1">No</span>
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
                                                    <label class=" form-control-label">Mobile Number </label>
                                                    <input type="text" class="form-control numberOnly" maxlength="10" name="person_mobile" id="person_mobile" placeholder="Mobile Number" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class=" form-control-label">AADHAAR Number </label>
                                                    <input type="text" class="form-control numberOnly" maxlength="14" name="person_aadhaar_no" id="person_aadhaar_no" placeholder="Aadhaar Number" readonly>
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
													<input type="text" class="form-control numberOnly this_pin_code" readonly maxlength="6" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code">
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
												<select class="form-control sel_taluk" readonly id="taluk" name="taluk" data-validation-required-message="Please select taluk">
												<option value="">Select Taluk</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">						    
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select class="form-control sel_block" readonly id="area_block" onchange="getPanchayatList(this.value);" name="area_block" data-validation-required-message="Please select block">
												<option value="">Select Block</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>							
											<div class="form-group col-md-4">
												<label for="inputAddress2">Gram Panchayat</label>
												<select class="form-control sel_panchayat" readonly id="gram_panchayat" name="gram_panchayat" data-validation-required-message="Please select gram panchayat" onchange="getVillageList(this.value);">
												<option value="">Select Gram Panchayat</option>
												</select>
											</div>						
										</div>
                                            
										<div class="row row-space">
								            <div class="form-group col-md-4">
												<label for="inputAddress2">Village</label>
												<select class="form-control sel_village" readonly id="village" name="village" data-validation-required-message="Please select village">
												
												</select>
								            </div>
											<div class="form-group col-md-2">
                                                <label for="inputAddress2">Door No</label>
                                                <input type="text" class="form-control" readonly maxlength="10" id="door_no" name="door_no" placeholder="Door No">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Street</label>
                                                <input type="text" class="form-control" readonly maxlength="75" id="street_name" name="street_name" placeholder="Street">
                                            </div>
								        </div>
                                            
								        <div class="row row-space">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" readonly minlength="10" maxlength="10" name="mobile_number" pattern="^[6-9]\d{9}$"  id="mobile_number" placeholder="Mobile Number" data-validation-required-message="Enter mobile number">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
								            <div class="form-group col-md-2">
                                                <label class="form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" maxlength="3" name="fpo_no_of_share" id="fpo_no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the shares">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
											<div class="form-group col-md-6">
                                                <label for="inputAddress2">Contact Person <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" readonly id="contact_person" name="contact_person" maxlength="25" placeholder="Contact Person" data-validation-required-message="Enter contact number">
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
								        </div>
                                            
                                        <div class="row row-space">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Permanent Account Number (PAN) </label>
												<input type="text" class="form-control text-uppercase" readonly maxlength="10" id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" data-validation-required-message="Enter the PAN Number">
								            </div>                                        
                                        </div>
                                        </div>
                                            
                                        <!-- Button creation for submit -->
										<div class="form-row mt-5">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
								                <button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Add as Member</button>
												<a href="<?php echo base_url('administrator/member');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
<!--<script src="<?php echo asset_url()?>js/select2.min.js"></script>      -->
      
<script>
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
		
});
$("#sendMessageButton").click(function() {
	var search_allotment=document.getElementById("search_allotment").value;
	var member_type=document.getElementById("member_type").value;

	if(search_allotment ==''){
		$("#farmer_validate").html("Please enter share allotment with Mobile or Aadhaar");
		return false;
	}
});
var member_type = $("input[name='member_type']");
var chk_member_type = "";
$('input').on('click', function() {
    var alloted_share_paid_value="";    
    
    //member type condition
    if (member_type.is(':checked')) {
        $("input[name='member_type']:checked").each ( function() {
            chk_member_type = $(this).val() + ",";
            chk_member_type = chk_member_type.slice(0, -1);
        });
        if(chk_member_type==1){                
            $('#member_search').show();
//            $('#farmer_to_member_form').show();
//            $('#fpo_to_member_form').hide();
//            $("#fig_name").prop('required',true);
//            $("#money_paid").prop('required',true);
//            $("#no_of_share").prop('required',true);
        }else{
            $('#member_search').show();
//            $('#fpo_to_member_form').show();	
//            $('#farmer_to_member_form').hide();
//            $("#fpo_name").prop('required',true);
//            $("#fpo_money_paid").prop('required',true);
//            $("#fpo_date").prop('required',true);
//            $("#pin_code").prop('required',true);
//            $("#state").prop('required',true);
//            $("#district").prop('required',true);
//            $("#area_block").prop('required',true);
//            $("#taluk").prop('required',true);
//            $("#mobile_number").prop('required',true);
//            $("#fpo_no_of_share").prop('required',true);
//            $("#contact_person").prop('required',true);
//            $("#pan_number").prop('required',true);
        }					  
    }
});
   
    
$('input[name=alloted_share_paid]').on('change', function() {
    var alloted_share_paid = $("input[name='alloted_share_paid']:checked").val();  
    if(alloted_share_paid == 1) {
    //alert("yes");
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
                         $('#share_alloted_farmer').hide();                         
                         $('#fpo_to_member_form').hide();
                         $('#farmer_to_member_form').show();
                      } else {
                         $('#share_alloted_farmer').hide();
                         $('#farmer_to_member_form').hide();
                         $('#fpo_to_member_form').show();
                      }                    
                  } else {
                    window.location = "<?php echo base_url('administrator/member')?>";
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
            text: "Share application details not processed in Share Allotment, Please enter and proceed or cancel to enter details",
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
                window.location = "<?php echo base_url('administrator/member')?>";
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
            text: "Share application details not processed in Share Allotment, Please enter and proceed or cancel to enter details",
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
                window.location = "<?php echo base_url('administrator/member')?>";
            }
        });
    }
});    

    
$("#search_allotment").focusout(function() {    
    var search_allotment_value = $(this).val();
    if(search_allotment_value.length == 10 && (search_allotment_value.charAt(0) == 6 || search_allotment_value.charAt(0) == 7 || search_allotment_value.charAt(0) == 8 || search_allotment_value.charAt(0) == 9)) {
		var search_allotment = {'mobilenumber':search_allotment_value, 'aadhaar_number':"", 'member_type':chk_member_type};
        console.log(search_allotment);
        searchShareAllotmentWithOption(search_allotment);
    } else if(search_allotment_value.length == 12) {
        var search_allotment = {'aadhaar_number':search_allotment_value, 'mobilenumber':"", 'member_type':member_type};
        searchShareAllotmentWithOption(search_allotment);    
    }            
});   
    
    
function searchShareAllotmentWithOption(search_allotment) {    
       $.ajax({
			url:"<?php echo base_url();?>administrator/member/searchShareAllotment",
			type:"POST",
			data:search_allotment,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1 && responseArray.member_data.length > 0) {                   
                    if(responseArray.member_data[0]['holder_id']) {
                        document.getElementById('holder_id').value = responseArray.member_data[0]['holder_id']; 
                    }                    
                    document.getElementById('fpo_id').value = responseArray.member_data[0]['fpo_id'];
                    getAllFIGByFPO(responseArray.member_data[0]['fpo_id']);   
                    if(responseArray.member_data[0].member_type == 1) {
                        $('#person_mobile').val(responseArray.member_data[0]['mobile']);  
						var person_aadhaar_no = responseArray.member_data[0]['aadhar_no'];
                        $("#farmer_validate").html("<div class='alert alert-success'>Farmer selected successfully</div>");                        
                    } else {
                        getFPODetails(responseArray.member_data[0]['fpo_id']);
                        $('#fpo_mobile').val(responseArray.member_data[0]['fpo_mobile']);

                        $("#farmer_validate").html("<div class='alert alert-success'>FPO selected successfully</div>");
                    }                     
                    $("input[name=alloted_share_paid][value=1]").attr('checked', true);
                    $('#share_alloted_farmer').show();
                    $('#farmer_to_member_form').hide();                        
                    $('#fpo_to_member_form').hide();
                    $('#show_FPO').hide(); 
                    $("#fig_name1").prop('required',true);
                    $("#alloted_share_paid").prop('required',true);
				} else {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
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
						//  alert(chk_member_type);
                          if(chk_member_type == 1) {
                              $('#farmer_to_member_form').show();
                              $('#show_FPO').show();      
                              $("#show_fpo_id").prop('required',true);
                              $('#fpo_to_member_form').hide(); 
                              $('#share_alloted_farmer').hide();
                              $("#show_fpo_id").prop('required',true);
                              $("#fig_name2").prop('required',true);
                              $("#person_money_paid").prop('required',true);
                              $("#person_no_of_share").prop('required',true);
                              $("#person_mobile").prop('required',true);
                              $("#person_aadhaar_no").prop('required',true);
                              $('#holder_id').val(responseArray.member_data[0]['id']); 
                              $('#person_mobile').val(responseArray.member_data[0]['mobile']); 	
								if (responseArray.member_data[0]['aadhar_no'].length > 0 && responseArray.member_data[0]['aadhar_no'].length == 12) {
									aadhaar_value = responseArray.member_data[0]['aadhar_no'].match(new RegExp('.{1,4}', 'g')).join(" ");
									$('#person_aadhaar_no').val('XXXX XXXX '+aadhaar_value.substring(10)); 
								}								
                               
                          } else {
                              $('#fpo_to_member_form').show();
                              $('#show_FPO').show();      
                              $("#show_fpo_id").prop('required',true);
                              $('#farmer_to_member_form').hide(); 
                              $('#share_alloted_farmer').hide();
                              
                              $("#show_fpo_id").prop('required',true);
                              $("#fig_name3").prop('required',true);
                              $("#fpo_date").prop('required',true);
                              $("#pin_code").prop('required',true);
                              $("#contact_person").prop('required',true);
                              $("#mobile_number").prop('required',true);
                              getFPODetails(responseArray.member_data[0]['id']);
                              $('#holder_id').val(responseArray.member_data[0]['id']); 
                              $('#mobile_number').val(responseArray.member_data[0]['mobile']);
                          }
                      } else {
                          window.location = "<?php echo base_url('administrator/member')?>";
                      }
                    });
                    
                } 
            }
         });            
} 
/* alignAadhaar(value.aadhar_no);     
document.getElementById('person_aadhaar_no').oninput = function () {
    var foo = this.value.split(" ").join("");
    alignAadhaar(foo);
};
function alignAadhaar(aadhaar_value){
    if (aadhaar_value.length > 0 && aadhaar_value.length == 12) {
        aadhaar_value = aadhaar_value.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    document.getElementById('person_aadhaar_no').value = aadhaar_value;
}  */

function getAllFIGByFPO(fpo_id) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/member/getAllFIGByFPO/"+fpo_id,
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
    
function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>administrator/share/getLocationByFpo/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               getPincode( responseArray.location_data[0]['pin_code'] );
               $('#pin_code').val(responseArray.location_data[0]['pin_code']);
               $('#door_no').val(responseArray.location_data[0]['door_no']);
               $('#street_name').val(responseArray.location_data[0]['street']);
               $('#mobile_number').val(responseArray.location_data[0]['mobile']);
               $('#contact_person').val(responseArray.location_data[0]['contact_person']);
               $('#pan_number').val(responseArray.location_data[0]['pan']);
               var panchayat = responseArray.location_data[0]['block'];
			   //alert(panchayat);
               var village = responseArray.location_data[0]['panchayat'];
			   var villagevalue = responseArray.location_data[0]['village'];
			   getPanchayatList( panchayat );
			   getVillageList(village);
               setTimeout(function() {
				   document.getElementById("gram_panchayat").value=village;
				   document.getElementById("village").value=villagevalue;
                  //$('#gram_panchayat').val(panchayat);
                  //$('#village').val(village); 
               }, 500);
               
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
            console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '';
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
$('#pan_number').change(function (event) { 
	var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
	var txtpan = $(this).val(); 
	if (txtpan.length == 10 ) { 
	if( txtpan.match(regExp) ){ 
	//alert('PAN match found');
	}
	else {
	$("#pan_number").val('');
	alert('Not a valid PAN number');
	$("#pan_number").focus();
	event.preventDefault(); 
	} 
	} 
	else { 
	$("#pan_number").val('');
	alert('Please enter 10 digits for a valid PAN number');
	$("#pan_number").focus();
	event.preventDefault(); 
	}  
});  
    
$('select[id="show_fpo_id"]').on('change', function() {
    var show_fpo_id = $(this).val();
    getAllFIGByFPO(show_fpo_id);    
});    
</script>
</body>
</html>