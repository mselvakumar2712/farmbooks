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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="SupplierDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
        <div class="modal-body">
         <h4 class="text-success">Basic Data</h1>
               <div class="form-group col-md-12 mt-4">
                  <div class="form-group col-md-4 ">
                     <label for="" class="text-left">Supplier Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" maxlength="50" readonly id="supplier_name" value="<?php echo $supplier_info[0]->supp_name ?>" name="supplier_name" placeholder="Supplier Name" required="required" data-validation-required-message="Please enter supplier name.">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="">Supplier Short Name</label>
                     <input type="text" class="form-control" maxlength="20" readonly id="supp_short_name" value="<?php echo $supplier_info[0]->supp_ref ?>" name="supp_short_name" placeholder="Supplier Short Name">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Our Customer No</label>
                     <input type="text" class="form-control text-uppercase" maxlength="30" name="our_customer_no" value="<?php echo $supplier_info[0]->supp_account_no ?>" id="our_customer_no" placeholder="Our Customer No" readonly>
                  </div>
               </div>
               <h4 class="text-success">Accounts</h1>
               <div class="form-group col-md-12 mt-4">
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">GL Group <span class="text-danger">*</span></label>
                     <select class="form-control" id="account_group" readonly name="account_group" required="required" data-validation-required-message="Please select gl group.">
                        <option value="">Select GL Group </option>
                        <?php foreach($gl_group_info as $gl_group){
                           if($gl_group->account_code == $supplier_info[0]->gl_group_id)
                              echo "<option value='".$gl_group->account_code."' selected='selected'>".$gl_group->account_name."</option>";
                           else
                              echo "<option value='".$gl_group->account_code."'>".$gl_group->account_name."</option>";
                         }
                         ?>
                     </select>
                    </div>
                  <div class="form-group col-md-3">
                        <label for="inputAddress2">Group Code</label>
                        <input class="form-control" type="text" readonly placeholder="Group Code" value="<?php echo $supplier_info[0]->gl_group_id; ?>" id="group_code" name="group_code" >
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">Account Status</label>
                     <select class="form-control" id="account_status" readonly name="account_status">
                        <option value="">Select Account Status </option>
                        <option <?php echo ($supplier_info[0]->gl_acc_status == '1') ?  "selected" : "selected" ;  ?> value="1">Active</option>
                        <option <?php echo ($supplier_info[0]->gl_acc_status == '2') ?  "selected" : "" ;  ?> value="2">Inactive</option>
                     </select>
                   </div>
                  <div class="form-group col-md-3">
                    <label for="inputAddress2">Payment Terms </label>
                    <select id="payment_terms"  name="payment_terms" readonly class="form-control" >
                    <option value="">Select Payment Terms</option>
                     <?php foreach($payment_terms as $payment_term){
                        if($payment_term->terms_indicator == $supplier_info[0]->payment_terms)
                           echo "<option value='".$payment_term->terms_indicator."' selected='selected'>".$payment_term->terms."</option>";
                        else
                           echo "<option value='".$payment_term->terms_indicator."'>".$payment_term->terms."</option>";
                      }
                      ?>
                    </select>   
                  </div>
               </div>
               <h4 class="text-success">Address</h1>
               <div class="form-group col-md-12">
               <div class="form-group col-md-6">	
                  <label for="inputAddress2" class="text-success">Billing Address</label>
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
                        <input type="text" class="form-control numberOnly this_pin_code" readonly onkeyup="getPincode(this.value)" value="<?php echo $supplier_info[0]->mailing_pincode ?>" maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE" required  data-validation-required-message="Please enter pin code.">
                     </div>
                     <div class="col-md-6">&nbsp;</div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->state_name?>" readonly>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">District <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->district_name?>" readonly>
                      </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Taluk</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->taluk_name?>" readonly>
                      </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Block </label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->block_name?>" readonly>
                      </div>
                     <div class="form-group col-md-6">						    
                        <label for="inputAddress2">Gram Panchayat</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->panchayat_name?>" readonly>
                      </div>
                     <div class="form-group col-md-6">                            
                        <label for="inputAddress2">Village </label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->village_name?>" readonly>
                      </div>
                     <div class="form-group col-md-12">
                        <label for="inputAddress2">Door No / Street</label>
                        <input type="text" class="form-control" maxlength="75" readonly id="street" name="street" value="<?php echo $supplier_info[0]->mailing_street?>" placeholder="Street">
                     </div>
                        <div class="form-group col-md-6">
                        <label for="inputAddress2">Contact Person</label>
                        <input type="text" class="form-control" minlength="3" readonly maxlength="50" value="<?php echo $supplier_info[0]->mailing_contact_person?>"  name="billing_contact_person"  id="billing_contact_person" placeholder="Contact Person" >											 
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Mobile Number </label>
                        <input type="text" class="form-control numberOnly" readonly pattern="^[6-9]\d{9}$" value="<?php echo $supplier_info[0]->mailing_mobile_no?>" maxlength="10" id="billing_mobile_num" name="billing_mobile_num">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">STD Code</label>
                        <input type="text" class="form-control numberOnly" readonly  title="std code starts with '0'" value="<?php echo $supplier_info[0]->mailing_std_code?>" pattern="^[0][0-9]{2,8}$" id="billing_std_code" maxlength="8" minlength="3" name="billing_std_code" placeholder="Ex:012">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Phone Number</label>
                        <input type="text" class="form-control numberOnly" readonly maxlength="8" minlength="6" value="<?php echo $supplier_info[0]->mailing_phone_no?>" id="billing_phone_num" name="billing_phone_num"  placeholder="Phone Number">																
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputAddress2">E-Mail Address </label>
                        <input type="email" class="form-control" readonly id="billing_email" name="billing_email" value="<?php echo $supplier_info[0]->mailing_email_id?>" placeholder="E-Mail Address">
                     </div>
                  </div>
               </div>
               <div class="form-group col-md-6">
                  <label for="inputAddress2" class="text-success">Supply Address</label>
                  <div class="row">
                     <div class="col-md-6 form-group">
                        <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
                        <input type="text" class="form-control numberOnly this_physical_pincode" onkeyup="getphysical_Pincode(this.value)"  <?php echo ($supplier_info[0]->physical_pincode =='') ?  "disabled" : "readonly" ;  ?>   value="<?php echo $supplier_info[0]->physical_pincode ?>" maxlength="6" pattern="[1-9][0-9]{5}" id="physical_pin_code" name="physical_pin_code" placeholder="PINCODE" required data-validation-required-message="Please enter pin code.">
                     </div>
                     <div class="form-group col-md-6">&nbsp;</div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">State <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_state_name; ?>" readonly>
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">District <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_district_name; ?>" readonly>
                      </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Taluk</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_taluk_name; ?>" readonly>
                      </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Block</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_block_name; ?>" readonly>
                      </div>
                     <div class="form-group col-md-6">						    
                        <label for="inputAddress2">Gram Panchayat</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_panchayat_name; ?>" readonly>
                      </div>
                     <div class="form-group col-md-6">                            
                        <label for="inputAddress2">Village</label>
                        <input type="text" class="form-control" value="<?php echo $supplier_info[0]->physical_village_name; ?>" readonly>
                      </div>
                     <div class="form-group col-md-12">
                        <label for="inputAddress2">Door No / Street</label>
                        <input type="text" class="form-control" maxlength="75" readonly value="<?php echo $supplier_info[0]->physical_street?>" id="physical_street" name="physical_street" placeholder="Street">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Contact Person</label>
                        <input type="text" class="form-control" minlength="3" readonly maxlength="50" name="shipping_contact_person" value="<?php echo $supplier_info[0]->physical_contact_person?>" id="shipping_contact_person" placeholder="Contact Person" >											 
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Mobile Number  </label>
                        <input type="text" class="form-control numberOnly" readonly pattern="^[6-9]\d{9}$" maxlength="10" value="<?php echo $supplier_info[0]->physical_mobile_no?>"  id="shipping_mobile_num" name="shipping_mobile_num">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">STD Code</label>
                        <input type="text" class="form-control numberOnly" readonly title="Std code starts with '0'" value="<?php echo $supplier_info[0]->physical_std_code?>"  pattern="^[0][0-9]{2,8}$" id="shipping_std_code" maxlength="8" minlength="3" name="shipping_std_code" placeholder="Ex:012">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="inputAddress2">Phone Number</label>
                        <input type="text" class="form-control numberOnly" readonly maxlength="8" minlength="6" value="<?php echo $supplier_info[0]->physical_phone_no?>"  id="shipping_phone_num" name="shipping_phone_num"  placeholder="Phone Number">																
                     </div>
                     <div class="form-group col-md-12">
                        <label for="inputAddress2">E-Mail Address </label>
                        <input type="email" class="form-control" readonly id="shipping_email" value="<?php echo $supplier_info[0]->physical_email_id?>" name="shipping_email" placeholder="E-Mail Address">
                     </div>
                  </div>
                  </div>
                  </div>
               <div class="form-group col-md-12">
                  <div class="col-md-12">
                  <input type="checkbox" name="sameaddress" id="same_address" readonly value="1" class="" <?php echo ($supplier_info[0]->same_address==1 ? 'checked' : '');?> >&nbsp; &nbsp; Billing address same as Supply address
                  </div>
               </div>
               <h4 class="text-success">TAX Details </h1>
               <div class="form-group col-md-12 mt-3">
               <div class="form-group col-md-3">
                        <label for="inputAddress2">Place of Supply </label>
                        <select id="supply_place" class="form-control" readonly name="supply_place">
                        <option value="">Select Place of Supply </option>
                        </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">PAN</label>
                     <input type="text" class="form-control text-uppercase" readonly maxlength="10" id="pan" value="<?php echo $supplier_info[0]->pan_no?>" name="pan" placeholder="Ex:AAAPL1234C">
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">Goods & Service Tax (GST) </label>
                     <input type="text" class="form-control text-uppercase" readonly id="gst" name="gst" maxlength="15" value="<?php echo $supplier_info[0]->gst_no?>"  id="gst" placeholder="Ex:33AAAAA0000A1Z1">
                  </div>
                  <div class="col-md-3">                              
                  <label class=" form-control-label ml-3">Registration Type </label>
                   <?php
                     if($supplier_info[0]->regist_type == 1){
                        $typeValue = 'Regular';
                     } else if($supplier_info[0]->regist_type == 2){
                        $typeValue = 'Composition';
                     } else if($supplier_info[0]->regist_type == 3){
                        $typeValue = 'Consumer';
                     } else if($supplier_info[0]->regist_type == 4){
                        $typeValue = 'Unregistered';
                     } else if($supplier_info[0]->regist_type == 5){
                        $typeValue = 'Overseas';
                     } else if($supplier_info[0]->regist_type == 6){
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
                  <select id="bank_info" name="bank_info" class="form-control" readonly>
                        <option value="">Select Bank A/c Details</option>
                        <option value="1" <?php if($supplier_info[0]->bank_detail == 1){ ?>selected<?php } ?>>Yes</option>
                        <option value="2" <?php if($supplier_info[0]->bank_detail == 2){ ?>selected<?php } ?>>No</option>
                     </select>
                  </div>
					<div class="form-group col-md-4" id="bank_details1" readonly>
						<label for="inputAddress2">Bank Name</label>
						<input type="text" class="form-control" readonly value="<?php echo $supplier_info[0]->bankName; ?>" maxlength="20" id="account_number" name="account_number">
                    </div>
                  <div class="form-group col-md-4" id="bank_details2" readonly>
                     <label for="inputAddress2">Branch Name</label>
                     <select id="branch_name" name="branch_name" class="form-control" >
                     <option value="0">Select Branch Name</option>		
                     </select>	 
                  </div>
               </div>
                <div class="form-group col-md-12 mt-4" id="bank_details3">
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">Enter Account Number</label>
                     <input type="text" class="form-control text-uppercase" readonly value="<?php echo $supplier_info[0]->bank_account ;  ?>" maxlength="20" id="account_number" name="account_number" placeholder="Account Number">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="inputAddress2">IFSC Code</label>
                     <input type="text" class="form-control text-uppercase" readonly value="<?php echo $supplier_info[0]->ifsc_code;  ?>" maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code">
                  </div>
               </div>
               <h4 class="text-success">Others</h1>
               <div class="form-group col-md-12 mt-4">										
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">Default Credit Period (Days)</label>
                     <input type="text" class="form-control numberOnly" readonly maxlength="3"  value="<?php echo $supplier_info[0]->credit_period;  ?>" id="credit_period" name="credit_period" placeholder="Credit Period">														 
                  </div>
                  <div class="form-group col-md-3">
                  <label class=" form-control-label">Maintain Bill by Bill</label>
                     <select id="maintain_bill" name="maintain_bill" class="form-control" readonly>
                        <option value="">Select Maintain Bill by Bill</option>
                        <option value="1" <?php if($supplier_info[0]->maintain_bill == 1){ ?>selected<?php } ?>>Yes</option>
                        <option value="2" <?php if($supplier_info[0]->maintain_bill == 2){ ?>selected<?php } ?>>No</option>
                     </select>
                  </div>
                  <div class="form-group col-md-3">
                     <label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</label>
                     <input type="text" class="form-control numberOnly text-right" readonly maxlength="15"  value="<?php echo $supplier_info[0]->opening_balance; ?>" id="opening_balance" name="opening_balance" placeholder="Opening Balance">														 
                     </div>
                  <div class="col-md-3">												
                     <label class=" form-control-label">Balance Type<span class="text-danger">*</span></label>
                      <select id="transaction_type" name="transaction_type" class="form-control" required readonly>
                        <option value="">Select Balance Type</option>
                        <option value="1" <?php if($supplier_info[0]->transaction_type == 1){ ?>selected<?php } ?>>Cr</option>
                        <option value="2" <?php if($supplier_info[0]->transaction_type == 2){ ?>selected<?php } ?>>Dr</option>
                     </select>
                 </div>
               </div>
               <div class="form-group col-md-12 mt-1">
               <div class="form-group col-md-3">	
               </div>
               <div class="form-group col-md-6">	
               <h4 class="text-success">General</h1>
                  <label for="inputAddress2">General Notes</label>
                  <textarea id="general_notes" maxlength="50" readonly name="general_notes" class="form-control"><?php echo $supplier_info[0]->notes?></textarea>
               </div>
               </div>
                           
		</div>                                 
</div>
<script>
$("#page_reload").click(function(){
	location.reload();
});
$('#SupplierDetails').on('hidden.bs.modal', function () {
    location.reload();
});

</script>