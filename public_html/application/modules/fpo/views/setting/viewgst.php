<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($gst_info);
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
                        <h1>View GST</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">GST</a></li>
                            <li><a href="#">GST</a></li>
                            <li class="active">	View GST</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/setting/update_gst/'.$gst_info[0]->id)?>" method="post"  id="gstform" name="sentMessage" novalidate="novalidate" >                   
				     <input type="hidden" name="pesticide_id" value="<?php echo $gst_info[0]->id?>" id="pesticide_id">
					<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										 <div class="row row-space  mt-4"> 
										  <div class="form-group col-md-4"></div>
										   <div class="form-group col-md-4">
										  <label class=" form-control-label">Alter GST details <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_enable1" class="form-check-label">
												  <input type="radio" id="gst_enable1" name="gst_enable" disabled value="1" <?php echo $fpo_list[0]->gst_enable == 1?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
												  <p class="help-block text-danger"></p>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="gst_enable2" class="form-check-label">
												  <input type="radio" id="gst_enable2" name="gst_enable" disabled value="0" <?php echo $fpo_list[0]->gst_enable == 2?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
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
									   <div class="form-group col-md-12 mt-4" id="gst_enable_yes">
										  <div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select id="state" class="form-control" name="state_code" disabled required="required"  data-validation-required-message="Please Select State .">
											<option value="">Select State </option>
											<?php foreach($state as $state){
                                                if($state->state_code == $gst_info[0]->state_code)
                                                   echo "<option value='".$state->state_code."' selected='selected' id='".$state->gst_code."'>".$state->name."</option>";
                                                else
                                                   echo "<option value='".$state->state_code."' id='".$state->gst_code."'>".$state->name."</option>";
                                             }
                                             ?> 
											</select>
											<div class="help-block with-errors text-danger"></div>
										  </div>
                                      
                                      <div class="form-group col-md-4">
										  <label class=" form-control-label">Registration Type <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="reg_type1" class="form-check-label">
												  <input type="radio" id="reg_type1" name="registration_type" disabled <?php echo $gst_info[0]->registration_type == 1?" checked='checked'":''?> value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Regular</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="reg_type2" class="form-check-label">
												  <input type="radio" id="reg_type2" name="registration_type" disabled <?php echo $gst_info[0]->registration_type == 2?" checked='checked'":''?> value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Composition</span>
												</label>
											   </div>
											</div>									
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
									  <div class="form-group col-md-4">
										<label for="inputAddress2">GSTIN <span class="text-danger">*</span></label>
										<input type="text" class="form-control text-uppercase" disabled value="<?php echo $fpo_list[0]->gst?>" name="gst_in" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" required="required" data-validation-required-message="Please enter GST.">
										<div class="help-block with-errors text-danger" id="demo"></div>
									  </div>
									</div>
									<div class="form-group col-md-12 mt-4" id="gst_enable_yes1" >
										<div class="form-group col-md-4">
											<label for="inputAddress2">GST Applicable from <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" disabled name="gst_applicable_from" max="01/01/2050" onfocusout="calculatedate(this.value);"  value="<?php echo $gst_applicable_from; ?>" id="gst_applicable" placeholder="Financial Year Begins" required="required" data-validation-required-message="Please enter GST Applicable from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											  <label class=" form-control-label">Periodicity of GSTR1 <span class="text-danger">*</span></label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="periodicity1" class="form-check-label">
													  <input type="radio" id="periodicity1" name="periodicity" disabled <?php echo $gst_info[0]->periodicity == 1?" checked='checked'":''?> value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Monthly</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="periodicity2" class="form-check-label">
													  <input type="radio" id="periodicity2" name="periodicity" disabled <?php echo $gst_info[0]->periodicity == 2?" checked='checked'":''?> value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Quarterly</span>
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
													  <input type="radio" id="e_bill_1" name="ewaybill_applicable" disabled <?php echo $gst_info[0]->ewaybill_applicable == 1?" checked='checked'":''?> value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="e_bill_2" class="form-check-label">
													  <input type="radio" id="e_bill_2" name="ewaybill_applicable" disabled <?php echo $gst_info[0]->ewaybill_applicable == 0?" checked='checked'":''?> value="0" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
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
											<input type="date" class="form-control" max="2050-12-31" disabled name="ewaybill_applicable_from" value="<?php echo $gst_info[0]->ewaybill_applicable_from; ?>" id="applicable_date" placeholder="Applicable from" required="required" data-validation-required-message="Please enter Applicable from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger" id="applicable_dates"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Threshold Limit for Inter State ( <i class="fa fa-rupee"></i> ) <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" disabled value="<?php echo $gst_info[0]->threshold_inter_state?>" maxlength="6" name="threshold_inter_state" id="threshold_inter" placeholder="Threshold Limit for Inter State">
											<div class="help-block with-errors text-danger"></div>
									    </div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Threshold Limit for Intra State ( <i class="fa fa-rupee"></i> ) <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" disabled value="<?php echo $gst_info[0]->threshold_intra_state?>" maxlength="6" name="threshold_intra_state" id="threshold_intra" placeholder="Threshold Limit for Intra State">
											<div class="help-block with-errors text-danger"></div>
									    </div>		
									</div>
									<div class="form-group col-md-12 mt-4" id="provide">
									   <div class="form-group col-md-4">
											  <label class=" form-control-label">Provide LUT / Bond Details <span class="text-danger">*</span></label>
											  <div class="row">
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="lut_bond1" class="form-check-label">
													  <input type="radio" id="lut_bond1" name="lut_bond_provided" value="1" disabled <?php echo $gst_info[0]->lut_bond_provided == 1?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-6">
												  <div class="form-check-inline form-check">
													<label for="lut_bond2" class="form-check-label">
													  <input type="radio" id="lut_bond2" name="lut_bond_provided" value="0" disabled <?php echo $gst_info[0]->lut_bond_provided == !1?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">No</span>
													</label>
												   </div>
												</div>									
											  </div>
											  <div class="help-block with-errors text-danger"></div>
										</div>
									</div>

									<div class="form-group col-md-12 mt-4" id="lut_bond_yes" style="display:none">
										<div class="form-group col-md-4">
											<label for="inputAddress2">LUT / Bond No. <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="lut_bond_no" maxlength="15" disabled value="<?php echo $gst_info[0]->lut_bond_no; ?>" id="lut" placeholder="LUT / Bond No" required="required" data-validation-required-message="Please enter LUT / Bond No">
											<div class="help-block with-errors text-danger"></div>
										</div>
									
										<div class="form-group col-md-4">
											<label for="inputAddress2">Validity From <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31"  name="lut_bond_valid_from" id="validity_from" disabled value="<?php echo $gst_info[0]->lut_bond_valid_from; ?>" placeholder="Validity From" required="required" data-validation-required-message="Please enter validity from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger" id="validate_date"></div>
									    </div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Validity To <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="2050-12-31" name="lut_bond_valid_to" id="validity_to" disabled value="<?php echo $gst_info[0]->lut_bond_valid_to; ?>" placeholder="Validity To" required="required" data-validation-required-message="Please enter validity from" title="If need date picker, click the arrow">
											<div class="help-block with-errors text-danger"></div>
									    </div>									
									</div>
									     <!-- <div class="form-group col-md-12 mt-4">	
											<div class="row row-space">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('fpo/setting');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>											 
											 </div>
											 </div>-->
											<div class="col-md-12 text-center">
												<div id="success"></div>
												<button id="edit" class="btn-fs btn btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
												<button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
												<!--<a href="#" id="" class="del btn btn-danger">Delete</a>	-->
												<a href="<?php echo base_url('fpo/setting');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
												<a href="<?php echo base_url('fpo/setting');?>" id="cancel" class="btn-fs btn btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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

//Enable Goods and Service Tax (GST)
$('[name="gst_enable"]').on('change', function() {
var gst_enable = $(this).val();			
	if(gst_enable == 1){
	   $('#gst_enable_yes').show(); 
	   $('#gst_enable_yes1').show();
	   $('#provide').show();	   
		} else if(gst_enable == 2){
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
$(document).ready(function(){
	
var gst_enable = '<?php echo $fpo_list[0]->gst_enable?>';	
gst_enablecall( gst_enable );	
$('[name="gst_enable"]').change(function(){
		var gst_enable = $(this).val();;
		gst_enablecall( gst_enable );
	});
	
var ewaybill_applicable = '<?php echo $gst_info[0]->ewaybill_applicable?>';	
getewaybill_applicable( ewaybill_applicable );	

$('[name="ewaybill_applicable"]').change(function(){
		var ewaybill_applicable = $(this).val();;
		getewaybill_applicable( ewaybill_applicable );
	});
var lut_bond_provided = '<?php echo $gst_info[0]->lut_bond_provided?>';	
getlut_bond_provided( lut_bond_provided );	
$('[name="lut_bond_provided"]').change(function(){
		var lut_bond_provided = $(this).val();;
		getlut_bond_provided( lut_bond_provided );
	});
	
});

function gst_enablecall (gst_enable)
 {
  
  if(gst_enable == 1){
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
  //var ewaybill_applicable = '<?php echo $gst_info[0]->ewaybill_applicable?>';
  /* if(ewaybill_applicable == 1){
	    $('#e_bill_yes').show(); 
		} else if(ewaybill_applicable == 0){
		  $('#e_bill_yes').hide();                							 
		} */
};	


 function getewaybill_applicable (ewaybill_applicable)
 {
  //var ewaybill_applicable = '<?php echo $gst_info[0]->ewaybill_applicable?>';
  if(ewaybill_applicable == 1){
	    $('#e_bill_yes').show(); 
		} else if(ewaybill_applicable == 0){
		  $('#e_bill_yes').hide();                							 
		}
};	

 function getlut_bond_provided (lut_bond_provided)
 {
  //var ewaybill_applicable = '<?php echo $gst_info[0]->ewaybill_applicable?>';
  if(lut_bond_provided == 1){
	    $('#lut_bond_yes').show(); 
		} else if(lut_bond_provided == 0){
		  $('#lut_bond_yes').hide();                							 
		}
};	

/* //Provide LUT / Bond Details 
$('[name="lut_bond_provided"]').on('change', function() {
var lut_bond_provided = $(this).val();
    if(lut_bond_provided == 1){
	    $('#lut_bond_yes').show(); 
		} else if(lut_bond_provided == 0){
		  $('#lut_bond_yes').hide();                							 
		}
}); 
 */

		
//validate GST			
$('#gst').change(function (event) { 
	var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/;	
	var txtgst = $(this).val(); 	
	if (txtgst.length == 15 ) { 
	if( txtgst.match(regExp) ){ 
	}
	else {
    $("#gst").val('');
	alert('Not a valid GST number');
	$("#gst").focus();
	event.preventDefault(); 
	} 
	} 
	else { 
	$("#gst").val('');
	alert('Please enter 15 digits for a valid GST number');
	$("#gst").focus();
	event.preventDefault(); 
	}  
});


/* function myFunction() {
    var get_state= $("#state").val();
     
	var get_GST= $("#gst").val();
    
	var getGST = get_GST.substring(0, 2);
   console.log(get_state);
   console.log(get_GST);
	if(get_state == getGST){
	}else{
		$("#gst").val('');
		//alert('Please enter 15 digits for a valid GST number');
		$("#gst").focus();
	}

} */


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
$('#state').change(function(){
	var get_state= $("#state").val();
 
	var get_GST= $("#gst").val();
	var getGST = get_GST.substring(0, 2);
	if(get_state == getGST){
	}else{
		$("#gst").val('');
		//alert('Please enter 15 digits for a valid GST number');
		$("#gst").focus();
	}

 });


	$('#edit').click(function(){
	$('#editfpo_Form').toggleClass('view');
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
});

</script>	 
</body>
</html>