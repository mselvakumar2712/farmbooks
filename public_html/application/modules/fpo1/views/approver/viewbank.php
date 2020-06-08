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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="BankDetails" class="myModal">
  <div class="modal-header">
    <button type="button" class="close" id="page_reload" data-dismiss="modal">&times;</button>
  </div>        
<div class="modal-body">
             <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">  
										<div class="row">
                                            <div class="form-group col-md-4">
												<label for="inputAddress2">Account Number <span class="text-danger">*</span></label>
												<input class="form-control numberOnly" readonly type="text" placeholder="Account Number" id="account_no" name="account_no" required data-validation-required-message="Enter account number" minlength="9" maxlength="17" value="<?php echo $bank_info[0]->bank_account_number; ?>">
											</div>
                                            <div class="form-group col-md-4">
                                            <label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
                                                <select class="form-control" readonly id="bank_name" name="bank_name" required data-validation-required-message="Select bank name">
                                                    <option value="">Select Bank Name</option>
                                                    <?php for($i=0; $i<count($bank_name);$i++) { ?>	
                                                     <option value="<?php echo $bank_name[$i]->id; ?>" id="<?php echo $bank_name[$i]->name; ?>" <?php if($bank_name[$i]->id == $bank_info[0]->bank_name){?>selected<?php } ?>><?php echo $bank_name[$i]->name; ?></option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Branch <span class="text-danger">*</span></label>
                                                <select class="form-control" readonly id="bank_address" name="bank_address" required data-validation-required-message="Enter bank address">
												  <option value="">Select Bank Name</option>
												</select>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" readonly placeholder="Account Name" id="bank_account_name" name="bank_account_name" maxlength="100" value="<?php echo $bank_info[0]->bank_account_name; ?>">
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
									          <?php 
                                    if($bank_info[0]->account_type == '1'){
                                       $typeValue='Savings Account';
                                    }else if($bank_info[0]->account_type == '2'){
                                        $typeValue='Current Account';
                                   }else if($bank_info[0]->account_type == '3'){
                                        $typeValue='Over Draft/Cash Credit';
                                   }else{
                                      $typeValue='';
                                   }                                   
                                   ?>
                                 <input class="form-control" type="text" readonly value="<?php echo $typeValue; ?>">
								    		</div>
											<div class="form-group col-md-3">
											<label for="inputAddress2">Transaction Type</label>
                                 <?php 
                                 if($bank_info[0]->gl_code == '1'){
                                    $accountType = 'Credit Account';
                                 }else if($bank_info[0]->gl_code == '2'){
                                    $accountType = 'Debit Account';
                                 }else{
                                    $accountType = '';
                                 }
                                 ?>
                                 <input type="text" class="form-control" value="<?php echo $accountType?>" readonly>
										    </div>	
                                  <div class="form-group col-md-3">
												<label for="inputAddress2">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
												<input class="form-control inputfilter" placeholder="Opening Balance" readonly id="opening_balance" name="opening_balance" required data-validation-required-message="Enter the opening balance" minlength="2" maxlength="10" value="
                                    <?php echo ltrim($bank_info[0]->opening_balance, '-');(substr($bank_info[0]->opening_balance, 0, 1) == '-')?' Dr':' Cr' ?>">
											</div>                                            
								        </div>
                                   										
										</div>
								</div>
							</div>
						</div>
					</div>	
</div>
</div>
<script>
$("#page_reload").click(function(){
 location.reload();
});
$('#BankDetails').on('hidden.bs.modal', function () {
    location.reload();
});
$(document).ready(function(){
	var branch_name = "<?php echo $bank_info[0]->branch_name;?>";
	var bank_address = "<?php echo $bank_info[0]->bank_address;?>";
	$("#bank_address").html('<option value="'+bank_address+'" selected>'+branch_name+'</option>');
});

$(document).ready(function() {
    $('#sendMessageButton').click(function(){  	
        var validate = true;
        $('#addBankAccountForm').find('input, select').each(function(){      
            if($(this).val() != ""){
                validate = true;
            } else {
                validate = false;
            }
        });

        if(validate){		
            return true;// you can submit form or send ajax or whatever you want here
        }else{			
            swal('',"Provide all the data");
            return false;
        }
	});
	
	(function($) {
		$.fn.inputFilter = function(inputFilter) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
		  if (inputFilter(this.value)) {
		  this.oldValue = this.value;
		  this.oldSelectionStart = this.selectionStart;
		  this.oldSelectionEnd = this.selectionEnd;
		  } else if (this.hasOwnProperty("oldValue")) {
		  this.value = this.oldValue;
		  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		  }
		});
		};
	 }(jQuery));
  
	$(".inputfilter").inputFilter(function(value) {
	return /^-?\d*$/.test(value); });
});
    

$('#account_no').on('change', function() {
	var acc_name =  $(this).val();;
	 var bank_Name=$('#bank_name').children(":selected").attr("id");
	 if(bank_Name!==''){
	 var id = $('#bank_name').children(":selected").attr("id");
	 if(id !== ''){
     var getbank_Name = id.substring(0, 3);
	 var new_acc = acc_name+"-"+getbank_Name;
		$("#bank_account_name").val(new_acc);
	 }
	}else{
		 $("#bank_account_name").val(acc_name);
		 
	 } 

});
    

$("#bank_name").change(function() {
  var id = $(this).children(":selected").attr("id");
  var getbank_Name = id.substring(0, 3);
	 var acc = $('#account_no').val();
	 if(acc!==''){
		document.getElementById("bank_account_name").value = acc+"-"+getbank_Name ;
	 }else{	 
		 
	 }
});
    

$('#bank_name').change(function(){
    var get_bank_id = $("#bank_name").val();
    getBankAddressByBankName( get_bank_id );
});

    
function getBankAddressByBankName( bank_name_id ) {
    $("#bank_address option").remove();
    if(bank_name_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/finance/getBankAddressByBankName/"+bank_name_id,
		  type:"GET",
           data:"",
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
		  console.log(response);
              response=response.trim();                
              responseArray=$.parseJSON(response);
			  console.log(responseArray);
			 if(responseArray.status == 1){
			     if (Object.keys(responseArray).length > 0) {
			        $("#bank_address").append($('<option></option>').val(0).html('Select branch'));
			     }
			 $.each(responseArray.bankaddress_list,function(key,value){
			     $("#bank_address").append($('<option></option>').val(value.id).html(value.branch_name));
			 });
			}
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } /* else {
        swal("Sorry!", "Select the bank name");
    }  */
}
 
 
$('#account_type').on('change', function(e){ 
    var account_type = $(this).val();
    if(account_type == 4) {
        $("#bank_acc_gl_code").val("1"); 
        $("#account_no").prop('disabled',true);
        $("#bank_name").prop('disabled',true);
        $("#bank_address").prop('disabled',true);
        $("#account_no").prop('required',false);
        $("#bank_name").prop('required',false);
        $("#bank_address").prop('required',false);
    }
	else
	{
			$("#bank_acc_gl_code").val(""); 
			$("#account_no").prop('disabled',false);
			$("#bank_name").prop('disabled',false);
			$("#bank_address").prop('disabled',false);
			$("#account_no").prop('required',false);
			$("#bank_name").prop('required',false);
			$("#bank_address").prop('required',false);
	}	
});
</script>	
</body>
</html>