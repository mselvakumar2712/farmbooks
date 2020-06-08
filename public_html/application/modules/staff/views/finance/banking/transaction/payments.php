<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
/*
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
*/
    .accountBalance {
        text-align: center;
    }
    
    #remove_0 {
        display: none;
    }
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left:830px;
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
                        <h1>Payment</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
				            <li><a href="#">Finance</a></li>
                            <li><a href="#">Transaction</a></li> 
                            <li><a href="<?php echo base_url('staff/finance/payments');?>"class="active">Payment</a></li>
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
               <form action="<?php echo base_url('staff/finance/postPayment')?>" method="post" id="paymentform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">                                            
										  <div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Payment Date <span class="text-danger">*</span></label>
													<input class="form-control" type="date" id="payment_date" name="payment_date" required data-validation-required-message="Select payment date" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="pay_day" name="pay_day" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Voucher No. <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="voucher_no" name="voucher_no" placeholder="Voucher No" required data-validation-required-message="Enter the voucher no" value="<?php echo 'trv_PT_'.mt_rand(0,10000); ?>" readonly>
													<p class="help-block text-danger"></p>
												</div>							
												<!--<div class="form-group col-md-2">
													<label for="inputAddress2">Bank Balance</label>
													<input type="text" class="form-control" id="bank_balance" name="bank_balance" placeholder="Bank Balance" value="<?php //echo $current_cash; ?>" readonly>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Cash Balance</label>
													<input type="text" class="form-control" id="cash_balance" name="cash_balance" placeholder="Cash Balance" value="<?php //echo $petty_cash[0]['petty_amount']; ?>" readonly>
												</div>-->
											</div>	
											<div class="table-responsive mt-3">  
												<table class="table table-bordered low-padded" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Pay To
															</th>
															<th class="text-center">
																Paid From
															</th>
                                                            <!--<th class="text-center">
															   Cost Center 
															</th>-->	
															<th class="text-center">
															   Amount (<i class="fa fa-inr" aria-hidden="true"></i>)
															</th>					
															<th class="text-center">  
															</th>
														</tr>
													</thead>
													<tbody>
                                          <tr id="row0">  
                                             <!--<td width="25%">
                                             <select class="form-control" id="payment_to_0" name="payment[0][payment_to]" required data-validation-required-message="Select any payment to value">
                                             <option value="">Select Pay To</option>
                                             </select>
                                             <p class="help-block text-danger"></p>
                                             </td>-->
                                             <td width="25%">
                                                <select class="form-control" id="cost_center_0" name="payment[0][cost_center]" required data-validation-required-message="Select any paid from">
                                                </select>
                                                <span class="help-block text-danger"></span>
                                             </td>
                                             <td width="25%">
                                                <select class="form-control" id="payment_from_0" name="payment[0][payment_from]" required data-validation-required-message="Select any paid from">
                                                </select>
                                                <p id="accountBalance_0" class="text-danger accountBalance mt-2 mb-0 pb-0 pt-0"></p>
                                                <span class="help-block text-danger"></span>
                                             </td>
                                             <td width="15%">
                                                <input type="text" name="payment[0][amount]" class="form-control numberOnly" id="amount_0" maxlength="6" readonly/>
                                                <span class="help-block text-danger"></span>
                                             </td>  
                                             <td width="10%">
                                                <button type="button" name="remove" id="remove_0" class="btn btn-danger btn_remove">-</button>
                                                <button type="button" name="add" id="add_0" class="btn btn-success btn_add">+</button>
                                             </td>  
                                          </tr>													
													</tbody>
												</table>  
											</div>
											<div class="row">
												<div class="form-group col-md-3"></div>	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control" name="memo" id="memo"></textarea>
												</div>
												<div class="form-group col-md-3"></div>		
											</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
                                    <button id="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>				
												<!--<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">-->
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
var temp_totalBalance=[];
$(document).ready(function() {
    $(document).on('click', '#sendMessageButton', function(){ 
		var validate = true;
		$('#dynamic_field').find('input[type=text],select').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Provide all the data");
			return false;
		}
		
	});
   $('#cost_center_0').select2();
   $('#payment_from_0').select2();
	var i=0; 
    var j=0;
    
	//$('#sendMessageButton').hide();	
//	$('#sendMessageButton').click(function(){  		
//            var validate = true;
//            $('#dynamic_field > tbody').not('tr:last').find('tr input[type=text],tr select').each(function(){			
//                if($(this).val() == ""){
//                    validate = false;
//                }
//            });
//
//            if(validate){		
//                return true;//you can submit form or send ajax or whatever you want here
//            }else{			
//                swal('',"Provide all the data's");
//                return false;
//            }
//    });
    
    var dateval = new Date();
    updatePaymentDay(dateval);       
    
	//$('#add').click(function(){  
    $(document).on('click', '.btn_add', function(){ 
        var validate = true;
        //$('#dynamic_field tr:last').attr('id');
        $('#dynamic_field').find('tr input[type=text], tr select').each(function(){      
            if($(this).val() == ""){
                validate = false;
            }
        });
    
        if(validate){
            $('#dynamic_field').find('tr input[type=text], tr input[type=number], tr select').each(function(){
                $(this).attr("readonly", true);
            });
            j=i;    
            i++; 
            //getAllSupplierByFPO("payment_to_"+i);
            getAllPayment("payment_from_"+i);
            getAllGLReceipt("cost_center_"+i);
            
            
            var html=$(".total").html();			
            $('#dynamic_field').find('tbody tr:last').after('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" id="cost_center_'+i+'" name="payment['+i+'][cost_center]" required data-validation-required-message="Select any cost center"><option value="">Select Cost Center</option></select></td><td><select class="form-control" id="payment_from_'+i+'" name="payment['+i+'][payment_from]" required data-validation-required-message="Select any Paid From value"><option value="">Select Paid From </option></select><p id="accountBalance_'+i+'" class="text-danger accountBalance mt-2 pb-0 pt-0"></p></td><td><input type="text" id="amount_'+i+'" name="payment['+i+'][amount]" class="form-control numberOnly" required maxlength="6" readonly/></td><td><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display:none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>'); 
            $("#cost_center_"+i).select2();
            $("#payment_from_"+i).select2();
            $('#add_'+j).hide();
            $('#remove_'+j).show();
            //$('#sendMessageButton').show();
            // document.getElementById("sendMessageButton").disabled = false;
            initnumberOnly();    
            
            $('#cost_center_'+i).on('change', function(e){
                var ledgerId = $(this).val();
                updateLedgerForWrong(ledgerId, 'cost_center_'+i);
            });
            
            $("#payment_from_"+i).on('change', function(e){
                var accountId = $(this).val();
                updateAccountBalance(accountId, 'accountBalance_'+i);
                $('#amount_'+i).attr("readonly", false);
            }); 
            
            $('#amount_'+i).focusout(function (e){
                var amountValue = $(this).val();
                var accountId = $('#payment_from_'+i).val();
                verifyBalanceAmount(amountValue, 'amount_'+i, accountId, 'accountBalance_'+i);
            });
		} else {
            swal('', "Provide all the data's");
        }
    });

    
	$(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");           
        var arr = $(this).attr("id").split("_");        
        var removedElementFromTable = '<input style="display:none;" value="" name="payment['+arr[1]+']">';
        $('#row'+i+' td:first').prepend(removedElementFromTable);
        var accountId = $(this).parents('tr').find('#payment_from_'+arr[1]).val();
        var amountValue = $(this).parents('tr').find('#amount_'+arr[1]).val();
        temp_totalBalance[accountId] = (Number(temp_totalBalance[accountId])+Number(amountValue));
        $('#row'+arr[1]).remove();
	});  
              
});

/*document.onreadystatechange = function () {
	if(document.readyState === "complete"){		
		getAllGLReceipt("cost_center_0");  
		getAllPayment("payment_from_0");
	}
}*/

getAllGLReceipt("cost_center_0");  
getAllPayment("payment_from_0");

	
$('#cost_center_0').on('change', function(e){
    var ledgerId = $(this).val();
    updateLedgerForWrong(ledgerId, 'cost_center_0');
});
    
$('#payment_from_0').on('change', function(e){
    var accountId = $(this).val();
    updateAccountBalance(accountId, 'accountBalance_0');
    $('#amount_0').attr("readonly", false);
});
    
$('#amount_0').focusout(function (e){
    var amountValue = $(this).val();
    var accountId = $('#payment_from_0').val();
    verifyBalanceAmount(amountValue, 'amount_0', accountId, 'accountBalance_0');
}); 


$('input[id="payment_date"]').on('change', function(e){ 
    e.preventDefault();
    var dateval = "";
    if($(this).val()){
        dateval = $(this).val();
    } else {
        dateval = new Date().getDay();
    }            	
	updatePaymentDay(dateval);      
});

function updatePaymentDay(dateval) {
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
    
function getAllSupplierByFPO(payment_to) { 
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/getAllSupplierByFPO",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var payment_to_value = '<option value="">Select Pay To</option>';
            $.each(responseArray.supplier_list,function(key, value){
                payment_to_value += '<option value='+value.supplier_id+'>'+value.supp_name+'</option>'
            });
            $('#'+payment_to).html(payment_to_value);
        },
        error:function(response){
            console.log(response);
            //alert('Error!!! Try again');
        } 			
    });     
}
    
function getAllPayment(payment_from) { 
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/getAllBankByFPO",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var payment_from_value = '<option value="">Select Paid From</option>';
            $.each(responseArray.bank_list,function(key, value){
               if(value.gl_list_code) {
                    //payment_from_value += '<option class="text-danger" value="gl_trans_code">'+value.gl_trans_code+'</option>';
                    $.each(value.gl_list_code,function(keys, values){                
                        payment_from_value += '<option value="'+values.account_code+'-'+values.account_code+'"> '+values.account_name+'</option>'
                    });
                }
                if(value.bank_list) {
                    //payment_from_value += '<option class="text-danger" value="bank">'+value.bank+'</option>';
                    $.each(value.bank_list,function(keys, values){                
                        payment_from_value += '<option value="'+values.id+'-40204">'+values.bank_account_name+'</option>'
                    });
                }
                //payment_from_value += '<option value='+value.id+'>'+value.bank_account_name+'</option>'
            });
            $('#'+payment_from).html(payment_from_value);
        },
        error:function(response){
            console.log(response);
            //alert('Error!!! Try again');
        } 			
    });     
}  

function getAllGLReceipt(cost_center) {
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/getAllGL",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var cost_value = '<option value="">Select Ledger Type</option>';   
            $.each(responseArray.gl_list,function(key, value){
                if(value.customer_list) {
                    cost_value += '<optgroup label="Customers" value="customer">';
                    $.each(value.customer_list,function(keys, values){                
                        cost_value += '<option value='+values.debtor_no+'-'+values.gl_group+'>'+values.debtor_no+' - '+values.name+'</option>'
                    });
                    cost_value += '</optgroup>';
                }
                
                
                if(value.supplier_list) {
                    cost_value += '<optgroup label="Suppliers" value="supplier">';
                    $.each(value.supplier_list,function(keys, values){                
                        cost_value += '<option value='+values.supplier_id+'-'+values.gl_group_id+'>'+values.supplier_id+' - '+values.supp_name+'</option>'
                    });
                     cost_value += '</optgroup>';
                }
                
                
                if(value.gl_list) {
                    cost_value += '<optgroup label="GL List" value="gl_trans">';
                    $.each(value.gl_list,function(keys, values){      
                        if(values.has_child == 1){
                           cost_value += '<optgroup label="'+values.account_name+'" value="gl_trans"></optgroup>';
                        } else {
                           cost_value += '<option value='+values.account_code+'-'+values.account_code+'>'+values.account_code+' - '+values.account_name+'</option>'
                        }
                    });
                    cost_value += '</optgroup>';
                }
            });
            $('#'+cost_center).html(cost_value);
        },
        error:function(response){
            console.log(response);
            //alert('Error!!! Try again');
        } 			
    });     
}  
   
function updateAccountBalance(accountId, accountBalance){
	accountId = accountId.split("-");
	var accId = accountId[0];
   var accCode = accountId[1];
   $.ajax({
      url:"<?php echo base_url();?>staff/finance/getAccountBalance",
      type:"POST",
      data:{"account_code":accCode,"account_id":accId},
      dataType:"html",        
      cache:false,			
      success:function(response) {
         //console.log(response);
         response=response.trim();
         responseArray=$.parseJSON(response);  
         if(responseArray.account_balance != null) {
            if(temp_totalBalance[accId]) {
               temp_totalBalance[accId] = temp_totalBalance[accId];
            } else {
               temp_totalBalance[accId] = responseArray.account_balance;
            }                
            $('#'+accountBalance).html('<strong> Balance: <i class="fa fa-inr" aria-hidden="true"></i>'+temp_totalBalance[accId]+'</strong>');
         } else {
            $('#'+accountBalance).html('<strong> Balance: <i class="fa fa-inr" aria-hidden="true"></i>0</strong>');
         }            
      },
      error:function(response){
      console.log(response);
      //alert('Error!!! Try again');
      } 			
   });         
}
  
function updateLedgerForWrong(ledgerId, elementId) {  
    if(ledgerId == 'customer' || ledgerId == 'supplier' || ledgerId == 'gl_trans') {
        getAllGLReceipt(elementId);
    }
}
      
function verifyBalanceAmount(amountValue, amountInputId, accountId, updateBalanceId){    
    //console.log(temp_totalBalance[accountId]);
	accountId = accountId.split("-");
    if(Number(amountValue) > Number(temp_totalBalance[accountId[0]])) {
        swal('Sorry',"Given amount should be less than the balance");
        $('#'+amountInputId).val('');
    } else{
        temp_totalBalance[accountId[0]] = (Number(temp_totalBalance[accountId[0]])-Number(amountValue));
        $('#'+updateBalanceId).html('<strong> Balance: <i class="fa fa-inr" aria-hidden="true"></i>'+temp_totalBalance[accountId[0]]+'</strong>');
    }        
}   
    
</script>
</body>
</html>