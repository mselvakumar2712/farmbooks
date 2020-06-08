<style>
.text-right{
   font-style: inherit ! important;
}
.text-success{
   text-align:center ! important;
}
.text-center {
    text-align: left!important; 
}
</style>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="CustomerDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
        <div class="modal-body">
            <input type="hidden" class="form-control" id="debtor_no" name="debtor_no" value="<?php echo $customer_info[0]->debtor_no; ?>">                                    
               <div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
               <div class="form-group col-md-12 mt-4">
                  <div class="form-group col-md-4 ">
                     <label for="">Customer Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" readonly maxlength="50" value="<?php echo $customer_info[0]->name; ?>" id="customer_name" name="customer_name" placeholder="Customer Name" required="required" data-validation-required-message="Please enter customer name.">
                  </div>
                  <div class="form-group col-md-4 ">
                     <label for="">Customer Short Name</label>
                     <input type="text" class="form-control"  readonly maxlength="20" id="customer_short_name" value="<?php echo $customer_info[0]->debtor_ref; ?>" name="customer_short_name" placeholder="Customer Short Name" data-validation-required-message="Please enter customer short name.">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" value="<?php echo $customer_info[0]->account_name; ?>" readonly>
                  </div>
               </div>
               <div class="form-group col-md-12 mt-1">
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">PINCODE <span class="text-danger">*</span> </label>
                     <input type="text" onkeyup="getPincode(this.value)" readonly class="form-control numberOnly this_pin_code" required="required" id="pincode" pattern="[1-9][0-9]{5}" readonly value="<?php echo $customer_info[0]->pincode; ?>" name="pincode" minlength="6" maxlength="6" placeholder="PINCODE"  data-validation-required-message="Please enter pincode.">						
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">State <span class="text-danger">*</span> </label>
                     <input type="text" class="form-control" value="<?php echo $customer_info[0]->state_name; ?>" readonly>
                 </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">District <span class="text-danger">*</span> </label>
                     <input type="text" class="form-control" value="<?php echo $customer_info[0]->district_name; ?>" readonly>
                  </div>
               </div>
               <div class="form-group col-md-12">
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Taluk </label>
                     <input type="text" class="form-control" value="<?php echo $customer_info[0]->taluk_name; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Block</label>
                       <input type="text" class="form-control" value="<?php echo $customer_info[0]->block_name; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Gram Panchayat </label>
                     <input type="text" class="form-control" value="<?php echo $customer_info[0]->panchayat_name; ?>" readonly>
                </div>
               </div>
               <div class="form-group col-md-12">
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Village / City </label>
                        <input type="text" class="form-control" value="<?php echo $customer_info[0]->village_name; ?>" readonly>
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Door No / Street</label>
                     <textarea id="street" maxlength="50" name="street" readonly class="form-control"><?php echo $customer_info[0]->address; ?></textarea>
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Name of the Contact Person </label>
                     <input type="text" class="form-control" id="contact_person" readonly name="contact_person" value="<?php echo $customer_info[0]->contact_person; ?>" maxlength="100" placeholder="Contact Person">
                  </div>
                </div>
                  <div class="form-group col-md-12 mt-2">
                     <div class="form-group col-md-2">
                        <label for="">STD Code</label>
                        <input type="text" class="form-control numberOnly" readonly pattern="^[0][0-9]{2,8}$" data-validation-required-message="Please enter mobile number." value="<?php echo $customer_info[0]->std_code; ?>" id="std_code" maxlength="8" name="std_code" title="Std Code starts with '0'" placeholder="Ex:012">
                     </div>
                     <div class="form-group col-md-2">
                        <label for="inputAddress2">Phone Number </label>
                        <input type="text" class="form-control numberOnly" readonly minlength="6" maxlength="8" id="phone_number" name="phone_number" value="<?php echo $customer_info[0]->phone_number; ?>" placeholder="Phone Number">				
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Mobile Number </label>
                        <input type="text" class="form-control numberOnly" readonly maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" value="<?php echo $customer_info[0]->mobile_number; ?>" placeholder="Mobile Number" data-validation-required-message="Please enter mobile number.">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">E-Mail Address </label>
                        <input type="email" class="form-control" readonly id="email_billing_address" name="email_billing_address" placeholder="E-Mail Address" value="<?php echo $customer_info[0]->email; ?>" data-validation-required-message="Please enter email address.">
                     </div>
                     <div class="col-md-12">
                        <input type="checkbox" name="sameaddress" readonly id="same_address" value="1" class="" <?php echo ($customer_info[0]->sameaddress==1 ? 'checked' : '');?> >&nbsp; &nbsp; Billing address same as Supply address
                     </div>
                  </div>
               <h4 class="text-success">Supply Address</h4>
                  <div class="form-group col-md-12 mt-4">	
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">PINCODE </label>
                        <input type="text" onkeyup="getphysical_Pincode(this.value)" readonly class="form-control numberOnly this_physical_pincode" id="physical_pincode" pattern="[1-9][0-9]{5}" name="physical_pincode" minlength="6" maxlength="6" placeholder="PINCODE" value="<?php echo $customer_info[0]->physical_pincode; ?>" data-validation-required-message="Please enter pincode.">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">State </label>
                        <input type="text" class="form-control" value="<?php echo $customer_info[0]->state_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">District </label>
                       <input type="text" class="form-control" value="<?php echo $customer_info[0]->district_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Taluk </label>            
                        <input type="text" class="form-control" value="<?php echo $customer_info[0]->taluk_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Block </label>
                          <input type="text" class="form-control" value="<?php echo $customer_info[0]->block_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Gram Panchayat </label>
                          <input type="text" class="form-control" value="<?php echo $customer_info[0]->panchayat_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                     <label for="inputAddress2">Village / City </label>
                           <input type="text" class="form-control" value="<?php echo $customer_info[0]->village_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Door No / Street</label>
                        <textarea id="physical_street" maxlength="50" name="physical_street" class="form-control" readonly><?php echo $customer_info[0]->physical_street; ?></textarea>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Name of the Contact Person </label>
                        <input type="text" class="form-control" id="physical_contact_person" name="physical_contact_person" readonly value="<?php echo $customer_info[0]->physical_contact_person; ?>" maxlength="100" placeholder="Contact Person" >																
                     </div>
                  </div>
               <div class="form-group col-md-12 mt-2">
                  <div class="form-group col-md-2">
                     <label for="">STD Code</label>
                     <input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" readonly data-validation-required-message="Please enter mobile number." value="<?php echo $customer_info[0]->physical_std_code; ?>" id="physical_std_code" maxlength="8" name="physical_std_code" title="Std Code starts with '0'" placeholder="Ex:012">
                  </div>
                  <div class="form-group col-md-2">
                     <label for="inputAddress2">Phone Number </label>
                     <input type="text" class="form-control numberOnly" minlength="6" readonly value="<?php echo $customer_info[0]->physical_phone_number; ?>" maxlength="8" id="physical_phone_number" name="physical_phone_number" placeholder="Phone Number">				
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Mobile Number  </label>
                     <input type="text" class="form-control numberOnly" maxlength="10" readonly id="physical_mobile_num" pattern="^[6-9]\d{9}$" name="physical_mobile_num" value="<?php echo $customer_info[0]->physical_mobile_num; ?>" placeholder="Mobile Number" data-validation-required-message="Please enter mobile number.">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">E-Mail Address </label>
                     <input type="email" class="form-control" id="physical_email" readonly name="physical_email" placeholder="E-Mail Address" value="<?php echo $customer_info[0]->physical_email; ?>" data-validation-required-message="Please enter email address.">
                  </div>
               </div>
               <h4 class="text-success">Tax Details</h4>
                  <div class="form-group col-md-12 mt-4">
                     <div class="form-group col-md-3">
                     <label for="inputAddress2">Place of Customer</label>
                     <select id="place_of_customer" name="place_of_customer" readonly class="form-control">
                     <option value="">Select Place of Customer</option>
                     <?php for($i=0; $i<count($state);$i++) {
                     if($customer_info[0]->place_of_customer==$state[$i]->id){	
                     echo '<option value="'.$state[$i]->id.'" selected="selected">'.$state[$i]->name.'</option>';
                     }else{
                     echo '<option value="'.$state[$i]->id.'">'.$state[$i]->name.'</option>';
                     }?>										
                     <?php }?>	
                     </select>	 
                     </div>										
                     <div class="form-group col-md-3">
                        <label for="inputAddress2">PAN </label>
                        <input type="text" class="form-control text-uppercase" readonly id="pan_promoting_institution" value="<?php echo $customer_info[0]->pan_no; ?>" maxlength="10" name="pan_promoting_institution" placeholder="EX:AAAPL1234C" data-validation-required-message="Please enter pan of promoting institution.">
                     </div>
                     <div class="form-group col-md-3">
                        <label for="inputAddress2">GST No</label>
                        <input type="text" class="form-control text-uppercase" readonly name="gst" value="<?php echo $customer_info[0]->gst_no; ?>" maxlength="15" id="gst" placeholder="Ex:33AAAAA0000A1Z1" >
                     </div>
                     <div class="form-group col-md-3">
                        <label for="inputAddress2">Registration Type</label>                       
                           <?php
                           if($customer_info[0]->registration_type == 1){
                              $typeValue = 'Regular';
                           } else if($customer_info[0]->registration_type == 2){
                              $typeValue = 'Composition';
                           } else if($customer_info[0]->registration_type == 3){
                              $typeValue = 'Consumer';
                           } else if($customer_info[0]->registration_type == 4){
                              $typeValue = 'Unregistered';
                           } else if($customer_info[0]->registration_type == 5){
                              $typeValue = 'Overseas';
                           } else if($customer_info[0]->registration_type == 6){
                              $typeValue = 'Special Economic Zone';
                           }else{
                              $typeValue ='';
                           }
                           ?>
                          <input type="text" class="form-control" readonly name="" value="<?php echo $typeValue; ?>" id="" >
                     </div>
                  </div>
               <h4 class="text-success">Bank Details </h1>
                  <div class="form-group col-md-12 mt-3">	
                     <div class="form-group col-md-4">
                        <label class=" form-control-label">Provide Bank A/c details</label>
                         <?php
                           if($customer_info[0]->bank_details == 1){
                              $bankValue = 'Yes';
                            }else if($customer_info[0]->bank_details == 2){
                              $bankValue = 'No';
                            }  
                           ?> 
                     <input type="text" class="form-control" readonly name="" value="<?php echo $bankValue; ?>" id="" >
                     </div>
                     <div class="form-group col-md-4" id="bank_details1">
                        <label for="inputAddress2">Bank Name</label>
                        <select class="form-control"  id="bank_name" name="bank_name" readonly>
                        <option value="">Select Bank Name</option>
                        <?php foreach($bank_name as $bank_name_info){
                        if($bank_name_info->id == $customer_info[0]->bank_name)
                        echo "<option value='".$bank_name_info->id."' selected='selected'>".$bank_name_info->name."</option>";
                        else
                        echo "<option value='".$bank_name_info->id."'>".$bank_name_info->name."</option>";
                        }
                        ?>
                        </select> 
                     </div>
                     <div class="form-group col-md-4" id="bank_details2">
                        <label for="inputAddress2">Branch Name</label>
                        <select id="branch_name" name="branch_name"  class="form-control" readonly>
                        <option value="0">Select Branch Name</option>		
                        </select>	 
                     </div>
                  </div>
                  <div class="form-group col-md-12 mt-4" id="bank_details3">	
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Enter Account Number</label>
                        <input type="text" readonly class="form-control text-uppercase"  value="<?php echo $customer_info[0]->account_number ;  ?>" maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
                     </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">IFSC Code</label>
                     <input type="text" class="form-control text-uppercase"   value="<?php echo $customer_info[0]->ifsc_code;  ?>" maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
                  </div>
                  </div>
               <h4 class="text-success">Sales</h4>
                  <div class="form-group col-md-12 mt-4">										
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Discount Percent (%)</label>
                        <input type="text" class="form-control numberOnly" readonly value="<?php echo $customer_info[0]->discount; ?>" maxlength="2" name="discount_percent" id="discount_percent" placeholder="Discount Percent">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Credit Limit (Rupees)</label>
                        <input type="text" class="form-control numberOnly" readonly value="<?php echo $customer_info[0]->credit_limit; ?>" minlength="2" maxlength="6" name="credit_limit" id="credit_limit" placeholder="Credit Limit">
                        <div class="help-block with-errors text-danger"></div>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputAddress2">Prompt Payment Discount Percent (%)</label>
                        <input type="text" class="form-control numberOnly" value="<?php echo $customer_info[0]->pymt_discount; ?>" maxlength="2" name="prompt_discount_percent" id="prompt_discount_percent" placeholder="Prompt Payment Discount Percent" readonly>
                     </div>                 
                  </div>
                   <div class="form-group col-md-12">										
                     <div class="form-group col-md-4">
                     <label for="inputAddress2">Payment Terms (Days)</label>
                     <select id="payment_terms" name="payment_terms" class="form-control" readonly>
                     <option value="">Select Payment Terms</option>
                     <?php foreach($payment_terms as $payment_terms){
                     if($payment_terms->terms_indicator == $customer_info[0]->payment_terms)
                     echo "<option value='".$payment_terms->terms_indicator."' selected='selected'>".$payment_terms->terms."</option>";
                     else
                     echo "<option value='".$payment_terms->terms_indicator."'>".$payment_terms->terms."</option>";
                     }
                     ?>	
                     </select>	 
                  </div>
                  </div>
               <h4 class="text-success">Others</h4>
                  <div class="form-group col-md-12 mt-4">	
                     <div class="form-group col-md-3">
                        <label for="inputAddress2">Credit Status</label>
                        <select id="credit_status" readonly name="credit_status" class="form-control">
                        <option value="">Select Credit Status</option>
                        <option value="1" <?php if($customer_info[0]->credit_status == 1){ ?>selected<?php } ?>>Active</option>
                        <option value="2" <?php if($customer_info[0]->credit_status == 2){ ?>selected<?php } ?>>In Active</option>
                        </select>		 
                     </div>
                     <div class="form-group col-md-3" id="credit_period1" style="display:none;">
                        <label for="inputAddress2">Credit Period (Days)</label>
                        <input type="text" class="form-control numberOnly" readonly value="<?php echo $customer_info[0]->credit_period; ?>" maxlength="3" name="credit_period" id="credit_period" placeholder="Credit Period">
                     </div>
                     <div class="col-md-6">
                        <div class="form-group col-md-6">
                           <label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
                           <input type="text" readonly class="form-control numberOnly text-right" maxlength="6" name="opening_balance" value="<?php echo $customer_info[0]->opening_balance; ?>" id="opening_balance" placeholder="Opening Balance" required data-validation-required-message="Provide the opening balance">
                        </div>
                        <div class="form-group col-md-6">
                           <label class=" form-control-label">Balance Type <span class="text-danger">*</span></label>
                               <?php if($customer_info[0]->transaction_type == 1){
                             $statusValue = 'Cr';
                           }
                           else if($customer_info[0]->transaction_type == 2){
                             $statusValue = 'Dr';
                           }
                           ?>  
                            <input type="text" class="form-control" readonly name="" value="<?php echo $statusValue; ?>" id="" >
                        </div>											
                     </div>
                  </div>
                  <div class="form-group col-md-12">	
                     <div class="form-group col-md-6">	
                        <label for="inputAddress2">General Notes</label>
                        <textarea id="general_notes" maxlength="50" readonly name="general_notes" class="form-control"><?php echo $customer_info[0]->notes; ?></textarea>
                     </div>														
                  </div>		
         </div>
	</div>                                 
</div>
				

<script>
$("#page_reload").click(function(){
 location.reload();
});
$('#CustomerDetails').on('hidden.bs.modal', function () {
    location.reload();
});
var credit_status = "<?php echo $customer_info[0]->credit_status; ?>";
creditStatus(credit_status);
	
$('#credit_status').change(function(){
    var credit_status = $(this).val();  
    creditStatus(credit_status);
});	

function creditStatus(credit_status) {
	if(credit_status == 1){
		$('#credit_period1').show();
    }else{
		$('#credit_period1').hide();
	}
}
	 
   $("#same_address").click(CopyAdd);

	function CopyAdd() {
		if (this.checked==true) {
	            var sameaddress = $("#sameaddress").html();
                var pin_code = $("#pin_code").html();
                var state = $("#state").html();
                var district = $("#district").html();
				var taluk_id = $("#taluk").html();
                var block = $("#block").html();
                var gram_panchayat= $("#gram_panchayat").html();
                var village = $("#village").html();
                var street = $("#street").html();
				var contact_person = $("#contact_person").html();
				var std_code = $("#std_code").html();
				var phone_number = $("#phone_number").html();
				var mobile_num = $("#mobile_num").html();
				var email = $("#email_billing_address").html();
				$("#physical_pin_code").html(pin_code);
				document.getElementById('physical_contact_person').innerHTML = contact_person;
				document.getElementById('physical_std_code').innerHTML = std_code;
				document.getElementById('physical_phone_number').innerHTML = phone_number;
				document.getElementById('physical_mobile_num').innerHTML = mobile_num;
				document.getElementById('physical_email').innerHTML = email;
				document.getElementById('physical_pincode').innerHTML = pin_code;
				document.getElementById('physical_state').innerHTML = state;
				document.getElementById('physical_district').innerHTML = district;
				document.getElementById('physical_taluk_id').innerHTML = taluk_id;
				document.getElementById('physical_block').innerHTML = block;
				document.getElementById('physical_gram_panchayat').innerHTML = gram_panchayat;
				document.getElementById('physical_village').innerHTML = village;
				document.getElementById('physical_street').innerHTML =street; 
				document.getElementById('physical_pincode').value = $("#pin_code").val();
				document.getElementById('physical_state').value = $("#state").val();
				document.getElementById('physical_district').value = $("#district").val();
				document.getElementById('physical_taluk_id').value = $("#taluk").val();
				document.getElementById('physical_block').value = $("#block").val();
				document.getElementById('physical_gram_panchayat').value = $("#gram_panchayat").val();
				document.getElementById('physical_village').value = $("#village").val();
				document.getElementById('physical_contact_person').value = $("#contact_person").val();
				document.getElementById('physical_std_code').value = $("#std_code").val();
				document.getElementById('physical_phone_number').value = $("#phone_number").val();
				document.getElementById('physical_mobile_num').value = $("#mobile_num").val();
				document.getElementById('physical_email').value = $("#email_billing_address").val();
				document.getElementById('physical_street').value = $("#street").val();
		}
	} 

			
function validateEmail(emailField){
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if (reg.test(emailField.value) == false) {
		return false;
	}
		return true;
} 

		$('#gst').change(function (event) { 
			var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/; 
			var txtgst = $(this).val(); 
			if (txtgst.length == 15 ) { 
				if( txtgst.match(regExp) ){ 
				//alert('GST match found');
				} else {
					$("#gst").val('');
					//alert('Not a valid GST number');
					$("#gst").focus();
					swal("Sorry!", "Not a valid GST number");
					event.preventDefault(); 
				} 
			} else { 
				$("#gst").val('');
				//alert('Please enter 15 digits for a valid GST number');
				swal("Sorry!", "Please enter 15 digits for a valid GST number");
				$("#gst").focus();
				event.preventDefault(); 
			}  
		});	
		
		
	function activeClick(customerval) {
				if(customerval.checked == true) { 
					$("#customer option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('fpo/market/getallcustomer')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {	
								div_data +="<option value="+value.debtor_no+">"+value.name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#customer');
						}
					});
				}else{
					 $("#customer option").remove() ;		
					$.ajax({
						url: '<?php echo base_url('fpo/market/getactivecustomer')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							var div_data = '<option value="0">New Customer</option>';
						   $.each(responsearr, function(key, value) {
								div_data +="<option value="+value.debtor_no+">"+value.name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#customer');
						}
					});
				}		  
		}

$('#gram_panchayat').change(function(){	
	var gram_panchayat = $("#gram_panchayat").val();
	getVillageList( gram_panchayat );
});  
$('#block').change(function(){	
	var block = $("#block").val();	
	getPanchayatList( block );
}); 
$('#physical_gram_panchayat').change(function(){	
	var gram_panchayat = $("#physical_gram_panchayat").val();
	getphysical_VillageList( gram_panchayat );
});  
$('#physical_block').change(function(){	
	var block = $("#physical_block").val();	
	getphysical_PanchayatList( block );
}); 
function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
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
function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
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

function getphysical_Pincode( pin_code ) {
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
                if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
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
                    $('#physical_village').html(village);
                    $('#physical_gram_panchayat').html(gram_panchayat);
					$('#physical_state').html(state);
					$('#physical_district').html(district);
					$('#physical_block').html(block);
					$('#physical_taluk_id').html(taluk_id);
                } else {
					$(".this_physical_pincode").val('');
					$(".this_physical_pincode").focus();
					$("#physical_pincode_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$("#physical_state").html('<option value="">Select State</option>');
					$("#physical_district").html('<option value="">Select District</option>');
					$("#physical_taluk").html('<option value="">Select Taluk</option>');
					$("#physical_block").html('<option value="">Select Block</option>');
					$("#physical_panchayat").html('<option value="">Select Gram Panchayat</option>');
					$("#physical_village").html('<option value="">Select Village</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}

function getphysical_PanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
         	response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#physical_gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getphysical_VillageList( panchayat_code ) {	
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#physical_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}  
  $( document ).ready(function() {
    var state_id='<?php echo $customer_info[0]->state;?>';
    ///alert(state_id);
     getbanklist(state_id);
    var place_customer='<?php echo $customer_info[0]->place_of_customer;?>';
    getplaceofsupplier(place_customer);
    var bank_id='<?php echo $customer_info[0]->bank_name;?>';
     getBankAddressByBankName(bank_id);
});
function getbanklist(state_id) {
   var bank_name='<?php echo $customer_info[0]->bank_name;?>';
   //alert(bank_name);
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getbanklist/"+state_id,
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
               //console.log(response);
					response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Bank Name</option>';
					var gram_panchayat = "";
					$.each(responseArray, function(key, value){
						if(bank_name == value.id) {
							village += '<option value='+value.id+' selected="selected">'+value.bank_name+'</option>';
						}
						else {
							village += '<option value='+value.id+'>'+value.bank_name+'</option>';
						}
					});                                
					$('#bank_name').html(village);           
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}	
   function getBankAddressByBankName(bank_name_id) { 
   //alert(bank_name_id);
   $("#branch_name option").remove();
   var branch_name='<?php echo $customer_info[0]->branch_name;?>';
   var state_id = $("#state").val();
			$.ajax({
				 url:"<?php echo base_url();?>fpo/inventory/getBankAddressByBankName",
				type:"POST",
				data:{bank_name:bank_name_id,state:state_id},
				dataType:"html",
				cache:false,			
				success:function(response) {
        			response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Bank Name</option>';
					var gram_panchayat = "";
					$.each(responseArray.bankaddress_list, function(key, value){
                 
						if(branch_name == value.id) {
							village += '<option value='+value.id+' selected="selected">'+value.branch_name+'-'+value.ifsc_code+'</option>';
						}
						else {
							village += '<option value='+value.id+'>'+value.branch_name+'-'+value.ifsc_code+'</option>';
						}
					});                                
					$('#branch_name').html(village);           
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	}
$('#bank_name').change(function(){
	var branch_info = $("#bank_name").val();
	//alert(crop_category);
	getBankAddressByBankName( branch_info );
	});  
      $('#bank_info').change(function(){
  
	var bank_info = $("#bank_info").val();
	//alert(crop_category);
	showDiv( bank_info );
	}); 
function showDiv(bank_detail){
  
   if(bank_detail == 1){
   $('#bank_details1').show();
	$('#bank_details2').show();
	$('#bank_details3').show();
   }
   else{
      $('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
   }
}
		
	var bank_detail = '<?php echo $customer_info[0]->bank_details;?>';  
    if(bank_detail == 1) {
		$('#bank_details1').show();
		$('#bank_details2').show();
		$('#bank_details3').show();
    }else{
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	}
   function getplaceofsupplier(id) {
     //alert(id);
        $("#place_of_customer option").remove();
       var state_id = id;
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getplacesupply/",
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
        			response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Place of Supply</option>';
					var gram_panchayat = "";
					$.each(responseArray.supplyplace, function(key, value){
						if(state_id == value.state_code) {
							village += '<option value='+value.state_code+' selected="selected">'+value.name+'</option>';
						}
						else {
							village += '<option value='+value.state_code+'>'+value.name+'</option>';
						}
					});                                
					$('#place_of_customer').html(village);    
        
			     /* if (Object.keys(responseArray).length > 0) {
			         $("#supply_place").append($('<option></option>').val(0).html('Select Bank Name'));
			     }
			 $.each(responseArray,function(key,value){
			     $("#supply_place").append($('<option></option>').val(value.id).html(value.bank_name));
			 }); */
			               
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	} 	
</script>
</body>
</html>