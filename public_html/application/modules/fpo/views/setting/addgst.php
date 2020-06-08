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
                        <h1>Add GST</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">GST</a></li>
                            <li><a href="<?php echo base_url('fpo/setting/addgst');?>">GST</a></li>
                            <li class="active">Add GST</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/setting/post_gst')?>" method="post"  id="gstform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										 <div class="row row-space  mt-4"> 
										  <div class="form-group col-md-4"></div>
										   <div class="form-group col-md-4">
										  <label class=" form-control-label">Enable Goods and Service Tax (GST)  <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_enable1" class="form-check-label">
												  <input type="radio" id="gst_enable1" name="gst_enable" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
												  <p class="help-block text-danger"></p>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_enable2" class="form-check-label">
												  <input type="radio" id="gst_enable2" name="gst_enable" value="0" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
												  <p class="help-block text-danger"></p>
												</label>
												</div>
											</div>			
										  </div>
									  </div>
									  <div class="form-group col-md-4"></div>
									  </div>
									  <div class="row row-space  mt-4" style="display:none;"> 
										  <div class="form-group col-md-4"></div>
										   <div class="form-group col-md-4">
										  <label class=" form-control-label">Alter GST Details<span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_details1" class="form-check-label">
												  <input type="radio" id="gst_details1" name="gst_details" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
												  <p class="help-block text-danger"></p>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_details2" class="form-check-label">
												  <input type="radio" id="gst_details2" name="gst_details" value="2" checked class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
												  <p class="help-block text-danger"></p>
												</label>
												</div>
											</div>			
										  </div>
									  </div>
									  <div class="form-group col-md-4"></div>
									  </div>
									  
									<div class="form-group col-md-12 mt-4" id="gst_enable_yes" style="display: none;">
										  <div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select id="state" class="form-control" name="state_code" required="required"  data-validation-required-message="Please Select State .">
											<option value="">Select State </option>
											 <?php for($i=0; $i<count($state);$i++) { ?>										
											    <option value="<?php echo $state[$i]->state_code; ?>" id="<?php echo $state[$i]->gst_code; ?>"><?php echo $state[$i]->name; ?></option>
											  <?php } ?>
											</select>
											<div class="help-block with-errors text-danger"></div>
										  </div>
                                      
                                      <div class="form-group col-md-4">
										  <label class=" form-control-label">Registration Type <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="reg_type1" class="form-check-label">
												  <input type="radio" id="reg_type1" name="registration_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Regular</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="reg_type2" class="form-check-label">
												  <input type="radio" id="reg_type2" name="registration_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Composition</span>
												</label>
											   </div>
											</div>									
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									  <div class="form-group col-md-4">
										<label for="inputAddress2">GSTIN <span class="text-danger">*</span></label>
										<input type="text" class="form-control text-uppercase" value="<?php echo $fpo_list[0]->gst?>" name="gst_in" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" required="required" data-validation-required-message="Please enter GST.">
										<div class="help-block with-errors text-danger" id="demo"></div>
									  </div>
									</div>
									<div class="form-group col-md-12 mt-4" id="gst_enable_yes1" style="display: none;">
										<div class="form-group col-md-4">
											<label for="inputAddress2">GST Applicable from <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="gst_applicable_from" onfocusout="calculatedate(this.value);" value="<?php echo $gst_applicable_from; ?>" id="gst_applicable" placeholder="Financial Year Begins" required="required" data-validation-required-message="Please enter GST Applicable from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											  <label class=" form-control-label">Periodicity of GSTR1 <span class="text-danger">*</span></label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="periodicity1" class="form-check-label">
													  <input type="radio" id="periodicity1" name="periodicity" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Monthly</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="periodicity2" class="form-check-label">
													  <input type="radio" id="periodicity2" name="periodicity" value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Quarterly</span>
													</label>
												   </div>
												</div>									
											  </div>
											  <div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											  <label class=" form-control-label">e-Way Bill applicable <span class="text-danger">*</span></label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="e_bill_1" class="form-check-label">
													  <input type="radio" id="e_bill_1" name="ewaybill_applicable" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="e_bill_2" class="form-check-label">
													  <input type="radio" id="e_bill_2" name="ewaybill_applicable" value="0" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
													</label>
												   </div>
												</div>									
											  </div>
											  <div class="help-block with-errors text-danger"></div>
										</div>
										
									</div>
									<div class="form-group col-md-12 mt-4" id="e_bill_yes" style="display: none;">
										<div class="form-group col-md-4">
											<label for="inputAddress2">Applicable from <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="ewaybill_applicable_from" id="applicable_date" placeholder="Applicable from" required="required" data-validation-required-message="Please enter Applicable from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger" id="applicable_dates"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Threshold Limit for Inter State ( <i class="fa fa-rupee"></i> ) <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" value="50000" maxlength="6" name="threshold_inter_state" id="threshold_inter" placeholder="Threshold Limit for Inter State">
											<div class="help-block with-errors text-danger"></div>
									    </div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Threshold Limit for Intra State ( <i class="fa fa-rupee"></i> ) <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" value="50000" maxlength="6" name="threshold_intra_state" id="threshold_intra" placeholder="Threshold Limit for Intra State">
											<div class="help-block with-errors text-danger"></div>
									    </div>		
									</div>
									<div class="form-group col-md-12 mt-4" id="provide" style="display:none">
									   <div class="form-group col-md-4">
											  <label class=" form-control-label">Provide LUT / Bond Details <span class="text-danger">*</span></label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="lut_bond1" class="form-check-label">
													  <input type="radio" id="lut_bond1" name="lut_bond_provided" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="lut_bond2" class="form-check-label">
													  <input type="radio" id="lut_bond2" name="lut_bond_provided" value="0" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
													</label>
												   </div>
												</div>									
											  </div>
											  <div class="help-block with-errors text-danger"></div>
										</div>
									</div>

									<div class="form-group col-md-12 mt-4" id="lut_bond_yes" style="display: none;">
										<div class="form-group col-md-4">
											<label for="inputAddress2">LUT / Bond No. <span class="text-danger">*</span></label>
											<input type="text" class="form-control" maxlength="15" name="lut_bond_no" id="lut" placeholder="LUT / Bond No" required="required" data-validation-required-message="Please enter LUT / Bond No">
											<div class="help-block with-errors text-danger"></div>
										</div>
									
										<div class="form-group col-md-4">
											<label for="inputAddress2">Validity From <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="lut_bond_valid_from" id="validity_from" placeholder="Validity From" required="required" data-validation-required-message="Please enter validity from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger" id="validate_date"></div>
									    </div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Validity To <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="lut_bond_valid_to" id="validity_to" placeholder="Validity To" required="required" data-validation-required-message="Please enter validity from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger"></div>
									    </div>									
									</div>
									<div class="form-group col-md-12 mt-4">	
											<div class="row row-space">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('fpo/setting');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>											 
											 </div>
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
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
//validate dates
$("#sendMessageButton").click(function() {
  var startDt=document.getElementById("validity_from").value;
  var endDt=document.getElementById("validity_to").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#validate_date").html("Selected date should be LATER than Validity To");
    return false;
  }
  }
  var startDt=document.getElementById("gst_applicable").value;
  var endDt=document.getElementById("applicable_date").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#applicable_dates").html("Selected date should be LATER than GST Applicable from");
    return false;
  }
  }
  
 });
//alter gst details

//Enable Goods and Service Tax (GST)
$('[name="gst_enable"]').on('change', function() {
var gst_enable = $(this).val();			
	if(gst_enable == 1){
	   $('[name="reg_type"]').prop('required',true);
	   $('#gst_enable_yes').show(); 
	   $('#gst_enable_yes1').show();
	   $('#provide').show();	   
		} else if(gst_enable == 0){
		  $('#gst_enable_yes').hide();
		  $('#gst_enable_yes1').hide(); 
		  $('#Land_Identify_head').hide(); 
		  $('#bothLand_Identify_head').hide(); 
		  $('#provide').hide();
		  $('#e_bill_yes').hide();
		  $('#lut_bond_yes').hide();
		}
});
//e-Way Bill applicable				
$('[name="ewaybill_applicable"]').on('change', function() {
var ewaybill_applicable = $(this).val();
    if(ewaybill_applicable == 1){
	    $('#e_bill_yes').show(); 
		} else if(ewaybill_applicable == 0){
		  $('#e_bill_yes').hide();                							 
		}
});	

//Provide LUT / Bond Details 
$('[name="lut_bond_provided"]').on('change', function() {
var lut_bond_provided = $(this).val();
    if(lut_bond_provided == 1){
	    $('#lut_bond_yes').show(); 
		} else if(lut_bond_provided == 0){
		  $('#lut_bond_yes').hide();                							 
		}
});			
//validate GST			
$('#gst').change(function (event) { 
	var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/;	
	var txtgst = $(this).val(); 	
	if (txtgst.length == 15 ) { 
	if( txtgst.match(regExp) ){ 
	}
	else {
    $("#gst").val('');
   swal('','Not a valid GST number');
	$("#gst").focus();
	event.preventDefault(); 
	} 
	} 
	else { 
	$("#gst").val('');
	swal('','Please enter 15 digits for a valid GST number');
	$("#gst").focus();
	event.preventDefault(); 
	}  
});




$('#state').change(function(){
	var get_state= $(this).children("option:selected").attr('id');
	var get_GST= $("#gst").val();
	var getGST = get_GST.substring(0, 2);
	if(get_state == getGST){
	}else{
		$("#gst").val('');
		//alert('Please enter 15 digits for a valid GST number');
		$("#gst").focus();
	}

 });


$('#gst').change(function(){
 //  alert("yyyyyy");
   var get_state= $('#state').children("option:selected").attr('id');
	var get_GST= $(this).val();
	var getGST = get_GST.substring(0, 2);
	if(get_state == getGST){
	}else{
		$("#gst").val('');
		//alert('Please enter 15 digits for a valid GST number');
		$("#gst").focus();
	}

});

//validity from & to
$("#validity_from").focusout(function() {
    var validity_from = $(this).val();
    $("#validity_to").attr("min", validity_from);
});

//
$("#gst_applicable").focusout(function() {
    var gst_applicable = $(this).val();
    $("#applicable_date").attr("min", gst_applicable);
});


function calculatedate(gst_applicable_from) {
    $('#gst_applicable').attr('max', gst_applicable_from);
}

//state code & gst validation

/* $(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();       
      var maxDate = year + '-' + month + '-' + day;
      $('#applicable_date').attr('max', maxDate);
		$('#gst_applicable').attr('max', maxDate);
	$('#validity_from').attr('max', maxDate);
		$('#validity_to').attr('max', maxDate);
		
}); */

</script>	 
</body>
</html>