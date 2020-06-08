<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($share_application[0]);
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
                        <h1>View Share Application</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/share');?>">Share Management</a></li>
                            <li class="active">View Share Application</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('administrator/share/updateShareApplication/'.$share_application[0]->id)?>" method="post" id="editshare_application" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">                                                                         
                                        <div class="farmer_to_member_form" id="farmer_to_member_form" style="">                                            
                                            <div class="row row-space mt-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Producer Organization Name <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="fpo_name" name="fpo_name" data-validation-required-message="Select any one FPO" readonly>
                                                        <option value="">Select FPO</option>
                                                        <?php for($i=0; $i<count($fpo_list);$i++) { ?>
                                                        <option value="<?php echo $fpo_list[$i]->id; ?>" <?php if($fpo_list[$i]->id == $share_application[0]->fpo_id) {?> selected <?php } ?>><?php echo $fpo_list[$i]->producer_organisation_name; ?></option>
                                                        <?php } ?>	
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <!--<div class="form-group col-md-4">
                                                    <label for="inputAddress2">Search Farmer with Mobile or Aadhaar <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" id="search_farmer" maxlength="12" minlength="10" name="search_farmer" placeholder="Search with Mobile or Aadhaar" data-validation-required-message="Provide the search text or choose the farmer" value="">
                                                    <div id="farmer_validate" class="help-block with-errors text-danger"></div>
                                                </div>-->
												 <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="hidden" name="mobile_number" id="mobile_number" value="">
													<input type="hidden" name="aadhaar" id="aadhaar">
                                                    <input type="text" class="form-control numberOnly" name="aadhaar_number" id="aadhaar_number" placeholder="AADHAAR Number" value="<?php echo $share_application[0]->mobile_number;?>" required data-validation-required-message="Provide the aadhaar number" value="" readonly>
                                                     <div class="help-block with-errors text-danger"></div>
                                                </div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Farmer Name </label>
													<select class="form-control" id="farmer_name" name="farmer_name" readonly>
														<option value="">Select Farmer</option>
                                                        <?php for($i=0; $i<count($farmers);$i++) { ?>
                                                        <option value="<?php echo $farmers[$i]->id; ?>" <?php if($farmers[$i]->id == $share_application[0]->holder_id) {?> selected <?php } ?>><?php echo $farmers[$i]->profile_name; ?></option>
                                                        <?php } ?>
													</select>
													<div class="help-block with-errors text-danger"></div>
												</div>
                                            </div>   
                                            
                                            
                                            <div class="row row-space mt-4">
												<div class="form-group col-md-4">
                                                    <label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="share_date" disabled name="share_date" placeholder="Date" max="2050-12-31" data-validation-required-message="Provide the share date" value="<?php echo $share_application[0]->apply_date; ?>">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class=" form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" disabled maxlength="3" name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Provide the share count" value="<?php echo $share_application[0]->no_of_share; ?>">
                                                    <div class="help-block with-errors text-danger"></div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">AADHAAR Number <span class="text-danger">*</span></label>
                                                    <input type="hidden" name="mobile_number" id="mobile_number" value="">
													<input type="hidden" name="aadhaar" id="aadhaar" value="<?php echo $share_application[0]->aadhaar_number;?>">
                                                    <input type="text" class="form-control numberOnly" minlength="12" maxlength="14" name="aadhaar_number" readonly id="aadhaar_number" placeholder="AADHAAR Number" required data-validation-required-message="Provide the aadhaar number" value="<?php $str=substr_replace($share_application[0]->aadhaar_number, str_repeat("X", 8),0, 8);echo wordwrap($str , 4 , ' ' , true ); ?>">
                                                     <div class="help-block with-errors text-danger"></div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row row-space mt-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Permanent Account Number (PAN) </label>
                                                    <input type="text" class="form-control text-uppercase" disabled maxlength="10" id="pan_number" name="pan_number"  value="<?php echo $share_application[0]->pan_number; ?>" placeholder="Ex:AAAAA0000A">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Nominee Name </label>
                                                    <input type="text" class="form-control" disabled id="nominee_name" name="nominee_name" maxlength="50" placeholder="Nominee Name" value="<?php echo $share_application[0]->nominee_name; ?>">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Nominee’s Father Name </label>
                                                    <input type="text" class="form-control" disabled id="nominee_father_name" name="nominee_father_name" maxlength="50" placeholder="Nominee’s Father Name" value="<?php echo $share_application[0]->nominee_father_name; ?>">
                                                </div> 
                                            </div>
                                                
                                        </div>
										
                                        <!-- Button creation for submit -->
										<div class="form-row">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
											    <button id="edit" class="btn-fs btn btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
											    <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
												<a href="<?php echo base_url('administrator/share');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
												<a href="<?php echo base_url('administrator/share');?>" id="cancel" class="btn-fs btn btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
<script>
$("#search_farmer").focusout(function() {
    var search_farmer_value = $(this).val();
    if(search_farmer_value.length == 10 && (search_farmer_value.charAt(0) == 6 || search_farmer_value.charAt(0) == 7 || search_farmer_value.charAt(0) == 8 || search_farmer_value.charAt(0) == 9)) {
		var search_farmer = {'mobilenumber':search_farmer_value, 'aadhaar_number':""};
        searchFarmerWithOption(search_farmer);
    } else if(search_farmer_value.length == 12) {
        var search_farmer = {'aadhaar_number':search_farmer_value, 'mobilenumber':""};
        searchFarmerWithOption(search_farmer);    
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
      $('#share_date').attr('max', maxDate);
				
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
$('#pan_number').change(function (event) { 
		
 var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
 var txtpan = $(this).val(); 
 if (txtpan.length == 10 ) { 
  if( txtpan.match(regExp) ){ 
  // alert('PAN match found');
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
   
function searchFarmerWithOption(search_farmer) {    
       $.ajax({
			url:"<?php echo base_url();?>administrator/share/searchFarmer",
			type:"POST",
			data:search_farmer,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1) {
                    $('#farmer_name').val(responseArray.farmer_data[0]['id']);  
                    $('#mobile_number').val(responseArray.farmer_data[0]['mobile']);
					$('#aadhaar').val(responseArray.farmer_data[0]['aadhar_no']);
					var aadhar=responseArray.farmer_data[0]['aadhar_no'];
					getaadhar(aadhar);
                    $("#farmer_validate").html("<div class='alert alert-success'>Farmer selected successfully</div>");
				} else {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                } 
            }
         });            
}

function getaadhar(aadhar_no){
    if (aadhar_no.length > 0 && aadhar_no.length == 12) {


       var  aadhar = 'XXXX XXXX '+aadhar_no.substring(8); 

		
    }
    document.getElementById('aadhaar_number').value = aadhar;
}   
    
document.getElementById('aadhaar_number').oninput = function () {
    var foo = this.value.split(" ").join("");
    if (foo.length > 0 && foo.length == 12) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    this.value = foo;
};                
</script>
</body>
</html>