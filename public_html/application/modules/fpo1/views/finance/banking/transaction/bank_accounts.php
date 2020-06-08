<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.text-right {
   font-style: normal ! important;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none !important; 
    border-radius: 4px;
}
</style>
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
                        <h1>Contra</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Finance</a></li>
                            <li><a href="#">Transaction</a></li>
                            <li><a href="<?php echo base_url('fpo/finance/bankaccounts');?>"class="active">Contra</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
             
        <div class="content mt-3">
            
            <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('success');?></strong> 
            </div>
            <?php }elseif($this->session->flashdata('danger')){?>
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('danger');?></strong> 
            </div>
            <?php }elseif($this->session->flashdata('info')){?>
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('info');?></strong> 
            </div>
            <?php }elseif($this->session->flashdata('warning')){?>
            <div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo $this->session->flashdata('warning');?></strong> 
            </div>
            <?php }?>
            
            <div class="animated fadeIn">
               <form action="<?php echo base_url('fpo/finance/postBankAccountTransfer')?>" method="post" id="bank_transfer_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">                                            
											<div class="row">
												<div class="form-group col-md-4">
													<label for="inputAddress">Transfer Date <span class="text-danger">*</span></label>
													<input class="form-control" type="date" autofocus min="<?php echo $formation_date;?>" id="transfer_date" name="transfer_date" required data-validation-required-message="provide the transfer date" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="pay_day" name="pay_day" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Voucher No. <span class="text-danger">*</span></label>
													<input class="form-control" id="transfer_ref" name="transfer_ref" placeholder="Reference" required data-validation-required-message="Enter the reference" value="<?php echo $voucher_no; ?>" readonly>
													<p class="help-block text-danger"></p>
												</div>	
												<!--<div class="form-group col-md-2">
													<label for="inputAddress">Bank Balance </label>
													<input class="form-control" type="text" placeholder="Bank Balance" id="bank_balance" name="bank_balance" value="<?php //echo $current_cash[0]['current_amount']; ?>" readonly>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress">Cash Balance <span class="text-danger">*</span></label>
													<input type="text numberOnly" class="form-control" id="cash_balance" name="cash_balance" placeholder="Petty cash balance" value="<?php //echo $petty_cash[0]['petty_amount']; ?>" readonly>
													<p class="help-block text-danger"></p>
												</div>	-->						
											</div>
                                            
											<div class="row">
												<div class="form-group col-md-4">
													<label for="inputAddress">Transfer From <span class="text-danger">*</span></label>
													<select class="form-control" id="account_from" name="account_from" required data-validation-required-message="Select an account to send">
														<option value="">Select an Account</option>
														<?php for($i=0; $i<count($ledger_type);$i++) { ?>
														<option value="<?php echo $ledger_type[$i]->account_code; ?>-<?php echo $ledger_type[$i]->account_code; ?>"><?php echo $ledger_type[$i]->account_name; ?></option>
														<?php } ?>
														<?php for($i=0; $i<count($banks);$i++) { ?>
														<option value="<?php echo $banks[$i]->id; ?>-40204"><?php echo $banks[$i]->bank_account_name; ?></option>
														<?php } ?>
													</select>
													<p id="accountBalance_from" class="text-danger accountBalance mt-4"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Transfer To <span class="text-danger">*</span></label>
													<select class="form-control" id="account_to" name="account_to" required data-validation-required-message="Select an account to receive">
													  <option value="">Select an Account</option>
													  <?php for($i=0; $i<count($ledger_type);$i++) { ?>
													  <option value="<?php echo $ledger_type[$i]->account_code; ?>-<?php echo $ledger_type[$i]->account_code; ?>"><?php echo $ledger_type[$i]->account_name; ?></option>
													  <?php } ?>
													  <?php for($i=0; $i<count($banks);$i++) { ?>
													  <option value="<?php echo $banks[$i]->id; ?>-40204"><?php echo $banks[$i]->bank_account_name; ?></option>
													  <?php } ?>
													</select>
													<p id="accountBalance_to" class="text-danger accountBalance mt-4"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Amount ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
													<input class="form-control numberOnly text-right" type="text" placeholder="Amount" id="amount" maxlength="6" name="amount" required data-validation-required-message="Enter the amount to transfer">
												</div>
											</div>
                                            
											<div class="row ">
                                                <div class="form-group col-md-3"></div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress">Memo</label>
                                                    <textarea class="form-control" name="memo" rows="3" placeholder="Memo" id="memo"></textarea>
                                                </div>	
                                                <div class="form-group col-md-3"></div>
											</div>
                                            
										 <div class="form-row">
											<div class="form-group col-md-12 text-center">
											<div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>				
												<a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Back</a>	
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
<script src="<?php echo asset_url()?>js/select2.min.js"></script>

<script type="text/javascript">
var from_AccountBalance = 0; 
var temp_from_AccountBalance = 0;    
var to_AccountBalance = 0;     
var temp_to_AccountBalance = 0;        
$(document).ready(function() {
  $("select").change(function() {   
    $("select").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
  }); 
  
   $('#account_from').select2();
   $('#account_to').select2();
    var dateval = new Date();
    updateContraDay(dateval);
});
    
    
$('input[id="transfer_date"]').on('change', function(e){ 
    e.preventDefault();
    var dateval = "";
    if($(this).val()){
        dateval = $(this).val();
    } else {
        dateval = new Date().getDay();
    }            
	
	updateContraDay(dateval);      
});

    
function updateContraDay(dateval) {
    var day="";
    switch(new Date(dateval).getDay()){
        case 0:
		  day = "Sunday";
		  break;
		case 1:
		  day = "Monday";
		  break;
		case 2:
		  day = "Tuesday";
		  break;
		case 3:
		  day = "Wednesday";
		  break;
		case 4:
		  day = "Thursday"
		  break;
		case 5:
		  day = "Friday";
		  break;
		case 6:
		  day = "Saturday";
		  break;
    }
	document.getElementById("pay_day").value = day;
} 
      
    
$("#account_to").focusout(function() {    
    var account_to = $(this).val();
    var account_from = $("#account_from").val();
    if(account_from != "" && account_to == account_from) {
        swal("Sorry!", "Please change the receiving account, You are selected the Send/Receive accounts are same", "warning");
        $(this).val('');
        $("#account_from").val('');
    }
});
    
    
$("#amount").focusout(function() {    
    var actual_amount = $(this).val();
    var bank_amount = $("#bank_balance").val();
    var petty_cash = $("#cash_balance").val();
    var account_from = $("#account_from").val();
    var temp_from_AccountBalance = from_AccountBalance
    var temp_to_AccountBalance = to_AccountBalance
    
    if(account_from == "") {
        swal("Sorry!", "Select an account to sent", "warning");
        $("#account_from").focus();
    } else {
        if(Number(from_AccountBalance) < Number(actual_amount)) {
            swal("Sorry!", "Given amount is greater than the current balance", "warning"); 
            //$(this).val('');
            //$(this).focus();
            return false;      
        } else {
            temp_from_AccountBalance = (Number(temp_from_AccountBalance) - Number(actual_amount));
            temp_to_AccountBalance = (Number(temp_to_AccountBalance)+Number(actual_amount));
			if(temp_from_AccountBalance >= 0){
				$('#accountBalance_from').html('<strong> Balance: '+parseFloat(temp_from_AccountBalance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</strong>');
			} else {
				var amount = temp_from_AccountBalance.toString();
				temp_from_AccountBalance = amount.substr(1);
				$('#accountBalance_from').html('<strong> Balance: '+parseFloat(temp_from_AccountBalance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</strong>');
			}
			if(temp_to_AccountBalance >= 0){
				$('#accountBalance_to').html('<strong> Balance: '+parseFloat(temp_to_AccountBalance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</strong>');
			} else {
				var amount = temp_to_AccountBalance.toString();
				temp_to_AccountBalance = amount.substr(1);
				$('#accountBalance_to').html('<strong> Balance: '+parseFloat(temp_to_AccountBalance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</strong>');
			}
			
            //$('#accountBalance_from').html('<strong> Balance: '+temp_from_AccountBalance+' Cr</strong>');
            //$('#accountBalance_to').html('<strong> Balance: '+temp_to_AccountBalance+'</strong>');
            //$("#amount").attr('readonly','true');
        }
        
//        $.ajax({
//            url:"<?php echo base_url();?>fpo/finance/getPettyCashAccuntByFPO/"+account_from,
//            type:"GET",
//            data:"",
//            dataType:"html",
//            cache:false,			
//            success:function(response) {
//                console.log(response);
//                response=response.trim();
//                responseArray=$.parseJSON(response);
//                if(responseArray.account_type[0].account_type == 4 && Number(petty_cash) < Number(actual_amount)) {
//                    swal("Sorry!", "Given amount is greater than the cash balance", "warning"); 
//                    $(this).val('');
//					$("#amount").val('');
//					$(this).focus();
//					return false;
//                } else if(responseArray.account_type[0].account_type != 4 && Number(bank_amount) < Number(actual_amount)){
//                    swal("Sorry!", "Given amount is greater than the bank balance", "warning");
//                    $(this).val('');
//					$("#amount").val('');
//					$(this).focus();
//					return false;
//                }     
//            },
//            error:function(response){
//                alert('Error!!! Try again');
//            } 			
//        });                
    }
});    
    

$('#account_from').on('change', function(e){
    var accountId = $(this).val();
    updateAccountBalance(accountId, 'accountBalance_from');    
    var actual_amount = $("#amount").val();
    if(actual_amount != "") {
        $("#amount").prop('readonly',false);   
    } else {
        $("#amount").prop('readonly',false);   
    }
    
});
    
$('#account_to').on('change', function(e){ 
    var accountId = $(this).val();
    updateAccountBalance(accountId, 'accountBalance_to');
});
    
function updateAccountBalance(accountId, accountBalance) {
   accountId = accountId.split("-");
   var accId = accountId[0];
   var accCode = accountId[1];
   $.ajax({
      url:"<?php echo base_url();?>fpo/finance/getAccountBalance",
      type:"POST",
      data:{"account_code":accCode,"account_id":accId},
      dataType:"html",        
        cache:false,			
        success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);    
            if(responseArray.account_balance != null) {
               $('#'+accountBalance).html('<strong> Balance: <i class="fa fa-inr" aria-hidden="true"></i>'+(responseArray.account_balance >=0 ? responseArray.account_balance+' Cr':-(responseArray.account_balance)+' Dr')+'</strong>');
            } else {
               $('#'+accountBalance).html('<strong> Balance: <i class="fa fa-inr" aria-hidden="true"></i>0.00 Cr</strong>');
            }   
            if(accountBalance == 'accountBalance_from') {
               from_AccountBalance = responseArray.account_balance;
            } else {
               to_AccountBalance = responseArray.account_balance;
            }
        },
        error:function(response){
            console.log(response);
            //alert('Error!!! Try again');
        } 			
    });         
} 
</script>

</body>
</html>