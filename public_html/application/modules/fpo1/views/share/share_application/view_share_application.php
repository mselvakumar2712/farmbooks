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
                        <h1>View Share Application</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('fpo/share');?>">Share Management</a></li>
                            <li class="active">View Share Application</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/share/updateShareApplication/'.$share_application[0]->id)?>" method="post" id="editshare_application" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">
                                                                         
                                        <div class="farmer_to_member_form" id="farmer_to_member_form" style="">
                                            
                                            <div class="row row-space mt-4">                          
												<div class="form-group col-md-4">
													<label for="inputAddress2">Farmer Name </label>
													<input type="text" class="form-control numberOnly" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="<?php echo $share_application[0]->profile_name;?>" required data-validation-required-message="Provide the mobile number" value="" readonly>
												</div>                                                
												<div class="form-group col-md-4">
                                                    <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="<?php echo $share_application[0]->mobile_number;?>" required data-validation-required-message="Provide the mobile number" value="" readonly>
                                                </div>												
                                                <div class="form-group col-md-4">
                                                    <label class=" form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control numberOnly" maxlength="3" disabled name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Provide the share count" value="<?php echo $share_application[0]->no_of_share; ?>">
                                                </div>
                                            </div>   
                                            
                                            
                                            <div class="row row-space mt-4">
												<div class="form-group col-md-6">
                                                    <label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="share_date" name="share_date" disabled placeholder="Date"  data-validation-required-message="Provide the share date" value="<?php echo $share_application[0]->apply_date; ?>">
                                                </div>                                                
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Permanent Account Number (PAN) </label>
                                                    <input type="text" class="form-control text-uppercase" disabled maxlength="10" id="pan_number" name="pan_number"  value="<?php echo $share_application[0]->pan_number; ?>" placeholder="Ex:AAAAA0000A">
                                                </div> 
                                            </div>
                                            
                                            
                                            <div class="row row-space mt-4">
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Nominee Name </label>
                                                    <input type="text" class="form-control" disabled id="nominee_name" name="nominee_name" maxlength="50" placeholder="Nominee Name" value="<?php echo $share_application[0]->nominee_name; ?>">
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">Nominee’s Father Name </label>
                                                    <input type="text" class="form-control" disabled id="nominee_father_name" name="nominee_father_name" maxlength="50" placeholder="Nominee’s Father Name" value="<?php echo $share_application[0]->nominee_father_name; ?>">
                                                </div> 
												<div class="form-group col-md-4">
                                                    <label class=" form-control-label">Application Status </label>
													<?php 
													if($share_application[0]->status == 1){
														$status = "Processing";
													} else if($share_application[0]->status == 2){
														$status = "Approved";
													} else if($share_application[0]->status == 3){
														$status = "Transferred";
													} else if($share_application[0]->status == 4){
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
											    <!--<button id="edit" class="btn-fs btn btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
											    <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>-->
												<a href="<?php echo base_url('fpo/share');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
												<a href="<?php echo base_url('fpo/share');?>" id="cancel" class="btn-fs btn btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
<!--<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>-->
<script>
/*$('#pan_number').change(function (event) { 		
    var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
    var txtpan = $(this).val(); 
    if (txtpan.length == 10 ) { 
        if( txtpan.match(regExp) ){ 
            // alert('PAN match found');
        } else {
            $("#pan_number").val('');
            //alert('Not a valid PAN number');
            swal("Sorry!", "Not a valid PAN number");
            $("#pan_number").focus();
            event.preventDefault();
        } 
    } else { 
       $("#pan_number").val('');
       //alert('Please enter 10 digits for a valid PAN number');
        swal("Sorry!", "Please enter 10 digits for a valid PAN number");
       $("#pan_number").focus();
       event.preventDefault();      
    }  
}); */
    
/*$('#edit').click(function(){
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
	});*/

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
    
function searchFarmerWithOption(search_farmer) {    
       $.ajax({
			url:"<?php echo base_url();?>fpo/share/searchFarmer",
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
                    //$('#aadhaar').val(responseArray.farmer_data[0]['aadhar_no']);
					//var aadhar=responseArray.farmer_data[0]['aadhar_no'];
					//getaadhar(aadhar);
                    $("#farmer_validate").html("<div class='alert alert-success'>Farmer selected successfully</div>");
				} else {
                    $("#farmer_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                } 
            }
         });            
}
 
/*function getaadhar(aadhar_no){
    if (aadhar_no.length > 0 && aadhar_no.length == 12){
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
}; */               
</script>
</body>
</html>