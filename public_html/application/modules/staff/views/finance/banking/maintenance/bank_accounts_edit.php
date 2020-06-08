<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($bank_info);
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
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
                        <h1>Bank Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/finance/bank_accounts');?>">Bank Accounts</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="<?php echo base_url('staff/finance/updatebankaccount/'.$bank_info[0]->id)?>" id="viewBankAccountForm" name="sentMessage" method="post" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<!--<div class="container-fluid">    
									<input type="hidden" name="bank_name_id" value="<?php echo $bank_info[0]->id;?>" id="bank_name_id">									
		
								        <div class="row ">										
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" disabled value="<?php echo $bank_info[0]->bank_account_name;?>" placeholder="Account Name" id="bank_account_name" name="bank_account_name" required data-validation-required-message="Enter bank account name.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
												<select class="form-control" id="account_type" disabled name="account_type" required data-validation-required-message="Select account type">
													<option value="1" <?php if($bank_info[0]->account_type == '1') {?> selected <?php } ?>><?php echo "Savings Account" ?></option>
													<option value="2" <?php if($bank_info[0]->account_type == '2') {?> selected <?php } ?>><?php echo "Chequing Account" ?></option>
													<option value="3" <?php if($bank_info[0]->account_type == '3') {?> selected <?php } ?>><?php echo "Credit Account" ?></option>
													<option value="4" <?php if($bank_info[0]->account_type == '4') {?> selected <?php } ?>><?php echo "Cash Account" ?></option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<!--<div class="form-group col-md-3">
                                                <label for="inputAddress2">Account GL Code</label>
                                                <select class="form-control" id="bank_acc_gl_code" disabled name="bank_acc_gl_code">
                                                   <option value="">Select GL Code</option>
                                                    <?php //for($i=0; $i<count($chart_master);$i++) { ?>	
                                                    <option value="<?php //echo $chart_master[$i]->account_code2; ?>" <?php if($chart_master[0]->account_code2 == $bank_info[0]->gl_code) {?>selected<?php } ?>><?php echo $chart_master[$i]->account_name; ?></option>
                                                    <?php //} ?>
                                                </select>
										    </div>-->
                                            
									<!--	</div>
                                        
										<div class="row">
										<div class="form-group col-md-4">
                                            <label for="inputAddress2">Account Number <span class="text-danger">*</span></label>
											<input class="form-control" type="text" placeholder="Account Number" id="account_no" name="account_no" required disabled data-validation-required-message="Enter account number" value="<?php echo $bank_info[0]->bank_account_number; ?>">
											<p class="help-block text-danger"></p>
								        </div>
										<div class="form-group col-md-4">
										<label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_name" disabled name="bank_name" required="required"  data-validation-required-message="Please Select bank name .">
												<?php for($i=0; $i<count($bank_name);$i++) { ?>	
												 <option value="<?php echo $bank_name[$i]->id; ?>" <?php if($bank_name[$i]->id == $bank_info[0]->bank_name) {?> selected <?php } ?>><?php echo $bank_name[$i]->name; ?></option>
												<?php } ?>												
											</select> 
										<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Bank Address <span class="text-danger">*</span></label>
											<select  class="form-control" id="bank_address" disabled name="bank_address" required="required"  data-validation-required-message="Please enter bank address.">
											</select>
											<p class="help-block text-danger"></p>
										</div>
										</div>
										<div class="row row-space mt-3">
												<div class="form-group col-md-12 text-center">
													<div class="form-group">
														<div id="success"></div>
														<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
														  <input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
														  <!--<a class="del btn btn-danger">Delete</a>-->
														  <!--<a href="<?php echo base_url('staff/finance/bank_accounts');?>" id="ok" class="btn btn-outline-dark">Back</a>
														  <a href="<?php echo base_url('staff/finance/bank_accounts');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
													</div>
												</div>
											</div>
									</div>-->




									<div class="container-fluid">  
										<div class="row">
                                            <div class="form-group col-md-4">
												<label for="inputAddress2">Account Number <span class="text-danger">*</span></label>
												<input class="form-control numberOnly" readonly type="text" placeholder="Account Number" id="account_no" name="account_no" required data-validation-required-message="Enter account number" minlength="9" maxlength="17" value="<?php echo $bank_info[0]->bank_account_number; ?>">
												<p class="help-block text-danger"></p>
											</div>
                                            <div class="form-group col-md-4">
                                            <label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
                                                <select class="form-control" readonly id="bank_name" name="bank_name" required data-validation-required-message="Select bank name">
                                                    <option value="">Select Bank Name</option>
                                                    <?php for($i=0; $i<count($bank_name);$i++) { ?>	
                                                     <option value="<?php echo $bank_name[$i]->id; ?>" id="<?php echo $bank_name[$i]->name; ?>" <?php if($bank_name[$i]->id == $bank_info[0]->bank_name){?>selected<?php } ?>><?php echo $bank_name[$i]->name; ?></option>
                                                    <?php } ?>
                                                </select> 
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Branch <span class="text-danger">*</span></label>
                                                <select class="form-control" readonly id="bank_address" name="bank_address" required data-validation-required-message="Enter bank address">
												  <option value="">Select Bank Name</option>
												</select>
                                                <p class="help-block with-errors text-danger"></p>
                                            </div>
                                        </div>
                                            
                                        <div class="row">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text" readonly placeholder="Account Name" id="bank_account_name" name="bank_account_name" maxlength="100" value="<?php echo $bank_info[0]->bank_account_name; ?>">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Type <span class="text-danger">*</span></label>
												<select class="form-control" id="account_type" readonly name="account_type" required data-validation-required-message="Select account type">
													<option value="">Select Account Type </option>
													<option value="1" <?php if($bank_info[0]->account_type == '1') {?> selected <?php } ?>>Savings Account</option>
													<option value="2" <?php if($bank_info[0]->account_type == '2') {?> selected <?php } ?>>Current Account</option>
													<option value="3" <?php if($bank_info[0]->account_type == '3') {?> selected <?php } ?>>Over Draft/Cash Credit</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
											<label for="inputAddress2">Transaction Type</label>
											<select class="form-control" id="bank_acc_gl_code" readonly name="bank_acc_gl_code">
												<option value="">Select Transaction Type</option>
                                                <option value="1" <?php if($bank_info[0]->gl_code == '1') {?> selected <?php } ?>>Credit Account</option>
												<option value="2" <?php if($bank_info[0]->gl_code == '2') {?> selected <?php } ?>>Debit Account</option>
											</select>
										    </div>	
                                            <div class="form-group col-md-3">
												<label for="inputAddress2">Opening Balance (<i class="fa fa-inr" aria-hidden="true"></i>) <span class="text-danger">*</span></label>
												<input class="form-control inputfilter" placeholder="Opening Balance" readonly id="opening_balance" name="opening_balance" required data-validation-required-message="Enter the opening balance" minlength="2" maxlength="10" value="<?php echo $bank_info[0]->opening_balance; ?>">
												<p class="help-block text-danger"></p>
											</div>                                            
								        </div>
                                	<div class="col-md-12 text-center">
											<a href="<?php echo base_url('staff/finance/bank_accounts');?>" id="back" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
										  </div>      										
										</div>
								</div>
							</div>
						</div>
					</div>						
				</form>
			</div>
		</div>
    </div><!-- /#right-panel -->
	</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>

$(document).ready(function(){
	var branch_name = "<?php echo $bank_info[0]->branch_name;?>";
	var bank_address = "<?php echo $bank_info[0]->bank_address;?>";
	$("#bank_address").html('<option value="'+bank_address+'" selected>'+branch_name+'</option>');
});

/*$(document).ready(function(){
		$('#edit').click(function(){
        $('#viewBankAccountForm').toggleClass('view');
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
              inp.attr('disabled', 'disabled');
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

    
    var bank_name = "<?php echo $bank_info[0]->bank_name;?>";
	getBankAddressByBankName( bank_name );	
});

$('#bank_name').change(function(){
	 var get_bank_id = $("#bank_name").val();
	 getBankAddressByBankName( get_bank_id );
 });

function getBankAddressByBankName( bank_name_id  ) {
    $("#bank_address option").remove();
    if( bank_name_id != ''){    
	 $.ajax({
		url:"<?php echo base_url();?>staff/finance/getBankAddressByBankName/"+bank_name_id,
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
                //$("#bank_name").append($('<option></option>').val(0).html('Select branch'));
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
    } else {
        swal("Sorry!", "Select the bank name");
    } 
}

//delete
$('a.del').click(function() {
		var bank_name_id = '<?php echo $bank_info[0]->id;?>';
		swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
         if (result.value) {          
            $(this).prop("disabled", true);
            $.ajax({
              url: "<?php echo base_url();?>staff/finance/deletebankaccount/"+bank_name_id,
              type: "POST",
              data: {
                 this_delete: bank_name_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('staff/finance/bank_accounts')?>");
                 }, 1000);
              },
              error: function() {
                  setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 1000);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "You have cancelled the Bank account delete action", "info");
            return false;
         }
      });
});*/

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
		  url:"<?php echo base_url();?>staff/finance/getBankAddressByBankName/"+bank_name_id,
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