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
.select2 select2-container select2-container--default select2-container--focus{
   width:100% ! important;
   
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
    #debitValue, #creditValue {
        text-align: right;
    }
    #totalBalanceDisplay th {
        background: transparent;
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
                        <h1>Journal</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Finance</a></li>
                            <li><a href="#">Transaction</a></li>
                            <li><a href="<?php echo base_url('fpo/finance/journalentry');?>"class="active">Journal</a></li>
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
			<form action="<?php echo base_url('fpo/finance/postJournalEntry')?>" method="post" id="journalEntryForm" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">   
                                            
										   <div class="row">
								                <div class="form-group col-md-4">
													<label for="inputAddress2">Entry Date <span class="text-danger">*</span></label>
													<input class="form-control" type="date" autofocus min="<?php echo $formation_date;?>" id="journal_date" name="journal_date" required data-validation-required-message="Select the journal date" value="<?php echo date("Y-m-d"); ?>" >
													<p class="help-block text-danger"></p>
												</div>
                                                <div class="form-group col-md-4">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="journal_day" name="journal_day" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Voucher No. <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="journal_ref" name="journal_ref" placeholder="Reference" value="<?php echo $voucher_no; ?>" readonly>
													<p class="help-block text-danger"></p>
												</div>
                                                <!--<div class="form-group col-md-2">
													<label for="inputAddress2">Bank Balance</label>
													<input type="text" class="form-control" id="bank_balance" name="bank_balance" placeholder="Bank Balance" value="<?php //echo $current_cash[0]['current_amount']; ?>" readonly>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Cash Balance</label>
													<input type="text" class="form-control" id="cash_balance" name="cash_balance" placeholder="Cash Balance" value="<?php //echo $petty_cash[0]['petty_amount']; ?>" readonly>
												</div>-->
											</div>
                                            
											<div class="table-responsive mt-3">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
                                                                Ledger Entry
															</th>
															<!--<th class="text-center">
                                                                Cost Center
															</th>-->
															<th class="text-center">
															    Debit ( <span class="fa fa-inr" aria-hidden="true"></span> )
															</th>
															<th class="text-center">
															    Credit ( <span class="fa fa-inr" aria-hidden="true"></span> )
															</th>					
															<th class="text-center"></th>
														</tr>
													</thead>
													<tbody>
													<tr>   
														<!--<td width="30%">
                                                            <select class="form-control" id="account_name_0"  name="journal_entry[0][account_name]" required data-validation-required-message="Select any account name">
                                                            </select>
														    <p class="help-block text-danger"></p>
                                                        </td> --> 
                                          <td width="55%">
                                          <select class="form-control" style="width:550px;" id="cost_center_0"  name="journal_entry[0][cost_center]" required data-validation-required-message="Select any cost center">
                                          <option value="">Select Ledger Type</option>
                                          </select>
                                          </td> 
                                          <td width="15%">
                                          <input type="text" id="journal_entry_debit_0" name="journal_entry[0][debit]" class="form-control numberOnly text-right" maxlength="6" readonly/>
                                          </td>  
                                          <td width="15%">
                                          <input type="text" id="journal_entry_credit_0" name="journal_entry[0][credit]" class="form-control numberOnly text-right" maxlength="6" readonly/>
                                          </td>  													
                                          <td width="10%">
                                          <!--<button type="button" name="add" id="add" class="btn btn-success">+</button>-->
                                          </td>  
                                          </tr>                                                   	
                                              <tr>   
														<!--<td width="30%">
                                                            <select class="form-control" id="account_name_1"  name="journal_entry[1][account_name]" required data-validation-required-message="Select any account name">
                                                            </select>
														    <p class="help-block text-danger"></p>
                                                        </td>-->  
                                          <td width="28%">
                                          <select class="form-control" style="width:550px;"id="cost_center_1"  name="journal_entry[1][cost_center]" required data-validation-required-message="Select any cost center">
                                          <option value="">Select Ledger Type</option>
                                          </select>
                                          </td>  
                                          <td width="15%">
                                          <input type="text" id="journal_entry_debit_1" name="journal_entry[1][debit]" class="form-control numberOnly text-right" maxlength="6" readonly/>
                                          </td>  
                                          <td width="15%">
                                          <input type="text" id="journal_entry_credit_1" name="journal_entry[1][credit]" class="form-control numberOnly text-right" maxlength="6" readonly/>
                                          </td>  													
                                          <td width="10%">
                                          <!--<button type="button" name="add" id="add" class="btn btn-success">Add Item</button>-->
                                          </td>  
													</tr>
													</tbody>                                                    
                                     <thead id="totalBalanceDisplay">
                                         <tr>  
                                             <th></th>
                                             <th id="debitValue" class="text-danger"></th>
                                             <th id="creditValue" class="text-danger"></th>
                                             <th><button type="button" name="add" id="add" class="btn btn-success">+</button></th>
                                         </tr>
                                     </thead>
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
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="" class="btn btn-outline-dark">Back</a>	
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
var creditValue = 0;
var debitValue = 0;
    
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
      $('#journal_date').attr('max', maxDate);
});
    
$(document).ready(function() {
   $('#cost_center_0').select2();
   $('#cost_center_1').select2();
	var i=1;  
    $('#add').hide();
    $('#debitValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+debitValue+'</strong>');
    $('#creditValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+creditValue+'</strong>');
    
	$('#sendMessageButton').click(function(){  	
        var validate = true;
        $('#dynamic_field').find('tr select').each(function(){      
                if($('#account_name_'+i).val() != "" && $('#cost_center_'+i).val() != "" && ($('#journal_entry_debit_'+i).val() != "" || $('#journal_entry_credit_'+i).val() != "")){
                    validate = true;
                } else {
                    validate = false;
                }
          });

        if(validate){		
            return true;// you can submit form or send ajax or whatever you want here
        }else{			
            swal('',"Provide all the data's");
            return false;
        }
	});
    
    
	$('#add').click(function(){
        var validate = true;
        if(i>2){
            $('#dynamic_field').find('tr input[type=text], tr select').each(function(){      
                if($('#account_name_'+i).val() != "" && $('#cost_center_'+i).val() != "" && ($('#journal_entry_debit_'+i).val() != "" || $('#journal_entry_credit_'+i).val() != "")){
                    validate = true;
                } else {
                    validate = false;
                }
            });
        }

        if(validate == 1){
            $('#dynamic_field').find('tr input[type=text], tr input[type=number], tr select').each(function(){
                $(this).attr("readonly", true);
            });
            
            i++;        
            getAllBankByFPO("account_name_"+i);
            getAllGL("cost_center_"+i);
        
            var html=$(".total").html();
            $('#dynamic_field').find('tbody tr:last').after('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" style="width:550px;" id="cost_center_'+i+'" name="journal_entry['+i+'][cost_center]" required data-validation-required-message="Select any cost center"><option value="">Select Ledger Type</option></select></td><td><input type="text" name="journal_entry['+i+'][debit]" class="form-control numberOnly text-right" maxlength="6" id="journal_entry_debit_'+i+'" readonly/></td><td><input type="text" name="journal_entry['+i+'][credit]" class="form-control numberOnly text-right" id="journal_entry_credit_'+i+'" maxlength="6" readonly/></td><td></td></tr>');
            $("#cost_center_"+i).select2();
            initnumberOnly();
            $('#journal_entry_credit_'+i).on('keyup',function() {
                var this_length = $(this).val().length;
                journalEntry(this_length, "journal_entry_debit_"+i);
            });
            $("#journal_entry_debit_"+i).keyup(function (e){
                var this_length = $(this).val().length;
                journalEntry(this_length, "journal_entry_credit_"+i);
            });
            
            
            /** On Credit/Debit note focus out functionalities **/
            $('#journal_entry_credit_'+i).focusout(function(e) {        
                var creditText = $(this).val();
                verifyCreditTotalCost(creditText, i);
                $("#journal_entry_credit_"+i).prop('readonly',true);
            });
            $("#journal_entry_debit_"+i).focusout(function (e){
                var debitText = $(this).val();
                verifyDebitTotalCost(debitText, i);
                $("#journal_entry_debit_"+i).prop('readonly',true);
            });
            /** On Credit/Debit note focus out functionalities end **/
            
             $('#cost_center_'+i).on('change', function(e){
                var ledgerId = $(this).val();
                updateLedgerForWrong(ledgerId, 'cost_center_'+i);
                $(this).closest('tr').find('td input[type=text]').prop('readonly', false);
            });
            
            $('#add').hide();
        } else {
            swal('', "Provide all the data's");
        }
    });

    
	$(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
	});  
    
    
    $('#journal_entry_credit_0').on('keyup',function() {
        var this_length = $(this).val().length;
        journalEntry(this_length, "journal_entry_debit_0");
    });
    $("#journal_entry_debit_0").keyup(function (e){
        var this_length = $(this).val().length;
        journalEntry(this_length, "journal_entry_credit_0");
    });
    
    $('#journal_entry_credit_1').on('keyup',function() {
        var this_length = $(this).val().length;
        journalEntry(this_length, "journal_entry_debit_1");
    });
    $("#journal_entry_debit_1").keyup(function (e){
        var this_length = $(this).val().length;
        journalEntry(this_length, "journal_entry_credit_1");
    });
    
    
    /** On Credit/Debit note focus out functionalities **/
    $('#journal_entry_credit_0').focusout(function(e) {        
        var creditText = $(this).val();        
        verifyCreditTotalCost(creditText, 0);
        $("#journal_entry_credit_0").prop('readonly',true);
    });
    $("#journal_entry_debit_0").focusout(function (e){
        var debitText = $(this).val();
        verifyDebitTotalCost(debitText, 0);
        $("#journal_entry_debit_0").prop('readonly',true);
    });
    
    $('#journal_entry_credit_1').focusout(function(e) {        
        var creditText = $(this).val();        
        verifyCreditTotalCost(creditText, 1);
        $("#journal_entry_credit_1").prop('readonly',true);
    });
    $("#journal_entry_debit_1").focusout(function (e){
        var debitText = $(this).val();
        verifyDebitTotalCost(debitText, 1);
        $("#journal_entry_debit_1").prop('readonly',true);
    });
    /** On Credit/Debit note focus out functionalities end **/
    
    
    var dateval = new Date();
    updateJournalDay(dateval);
    
    getAllBankByFPO("account_name_0");
    getAllGL("cost_center_0");
    getAllGL("cost_center_1");
    
    $('#cost_center_0').on('change', function(e){
        var ledgerId = $(this).val();
        updateLedgerForWrong(ledgerId, 'cost_center_0');
        $(this).closest('tr').find('td input[type=text]').prop('readonly', false);
    });
    $('#cost_center_1').on('change', function(e){
        var ledgerId = $(this).val();
        updateLedgerForWrong(ledgerId, 'cost_center_1');
        $(this).closest('tr').find('td input[type=text]').prop('readonly', false);
    });
});
    
    
function journalEntry(amount_length, input_id) {
    if (amount_length > 0) {
        $("#"+input_id).prop('disabled',true);
    } else {
        $("#"+input_id).prop('disabled',false);
    }      
}    
    
    
$('input[id="journal_date"]').on('change', function(e){ 
    e.preventDefault();
    var dateval = "";
    if($(this).val()){
        dateval = $(this).val();
    } else {
        dateval = new Date().getDay();
    }            
	
	updateJournalDay(dateval);      
});
    
    
function updateJournalDay(dateval) {
    var day="";
    //alert(new Date(dateval).getDay());
    //new Date(dateval).getDay();
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
	document.getElementById("journal_day").value = day;
}  
   
    
function getAllGL(cost_center) { 
    $.ajax({
        url:"<?php echo base_url();?>fpo/finance/getAllGL",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
             var cost_value = '<option value="">Select Ledger Type</option>';   
            $.each(responseArray.gl_list,function(key, value){
               if(value.customer_list){
                    cost_value += '<optgroup label="Customers" value="customer">';
                    $.each(value.customer_list,function(keys, values){                
                        //cost_value += '<option value='+values.debtor_no+'>'+values.debtor_no+' - '+values.name+'</option>'
                        cost_value += '<option value='+values.debtor_no+'-'+values.gl_group+'>'+values.debtor_no+' - '+values.name+'</option>'
               
                    });
                    cost_value += '</optgroup>';
                }
               if(value.supplier_list){
                    cost_value += '<optgroup label="Suppliers" value="supplier">';
                    $.each(value.supplier_list,function(keys, values){                
                        //cost_value += '<option value='+values.supplier_id+'>'+values.supplier_id+' - '+values.supp_name+'</option>'
                        cost_value += '<option value='+values.supplier_id+'-'+values.gl_group_id+'>'+values.supplier_id+' - '+values.supp_name+'</option>'
                    });
                    cost_value += '</optgroup>';
                }
                
                
               if(value.gl_list){
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
            //alert('Error!!! Try again');
        } 			
    });     
}  
 
    
function getAllBankByFPO(account_name) { 
    $.ajax({
        url:"<?php echo base_url();?>fpo/finance/getAllBankByFPO",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var bank_value = '<option value="">Select An Account</option>';
            $.each(responseArray.bank_list,function(key, value){
                bank_value += '<option value='+value.id+'>'+value.bank_account_number+' - '+value.bank_account_name+'</option>'
            });
            $('#'+account_name).html(bank_value);
        },
        error:function(response){
            //alert('Error!!! Try again');
        } 			
    });     
}     
    
    
function verifyDebitTotalCost(debitText, incrementValue) {
    debitValue = (Number(debitValue)+Number(debitText));
    //console.log('TEST:'+creditValue + ':::' + debitValue);
    if(debitText != "" && (Number(debitValue) != Number(creditValue))) {
       if(incrementValue > 0) {
            $('#add').click();
        }
    } else if(debitText != "" && (Number(debitValue) == Number(creditValue))) {
       $('#add').show();
    } 
    $('#debitValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+debitValue+'</strong>');
    $('#creditValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+creditValue+'</strong>');
} 
    
    
function verifyCreditTotalCost(creditText, incrementValue) {
    creditValue = (Number(creditValue)+Number(creditText));
    //console.log('TEST:'+debitValue + ':::' + creditValue);
    if(creditText != "" && (Number(creditValue) != Number(debitValue))) {
        if(incrementValue > 0) {
            $('#add').click();
        }
    } else if(creditText != "" && (Number(creditValue) == Number(debitValue))) {
       $('#add').show();
    } 
    $('#creditValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+creditValue+'</strong>');
    $('#debitValue').html('<strong> Total: <i class="fa fa-inr" aria-hidden="true"></i>'+debitValue+'</strong>');   
}   
    
    
function updateLedgerForWrong(ledgerId, elementId) {  
    if(ledgerId == 'customer' || ledgerId == 'supplier' || ledgerId == 'gl_trans') {
        getAllGL(elementId);
    }
}
      
</script>
</body>
</html>