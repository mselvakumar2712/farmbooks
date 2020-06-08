<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.select2-container--default .select2-results__option[value="customer"] {
        background-color: red ! important;
        color: lightgray;
    }
.select2-results .dw_bg{ 
    background-color: green !important;
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
                        <h1>GL Reports</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/finance/glinquiry');?>">GL Reports</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="#" id="ledger_entry_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">                                            
											<div class="row ">
												<div class="form-group col-md-6" id="div1">
													<label for="inputAddress2">GL<span class="text-danger">*</span></label>
													<select class="form-control" id="account_holder" name="account_holder" required data-validation-required-message="Select any account number">
													<!-- <option value="">Select an Account</option>
                                            <option value="1">Cash Book</option>
                                            <option value="2">Supplier</option>
                                            <option value="3">Customer</option>
                                            <option value="4">GL</option>
													    <?php for($i=0; $i<count($gldata);$i++) { ?>
                                                        <option value="<?php echo $gldata[$i]->account_code; ?>"><?php echo $gldata[$i]->account_name; ?></option>
                                                        <?php } ?> -->
													</select>
													<p class="help-block text-danger"></p>
												</div>												
												<div class="form-group col-md-3">
													<label for="inputAddress2">Amount Min</label>
													<input class="form-control numberOnly" type="text" value="" id="amount_min" name="amount_min" placeholder="0.00">
													<p class="help-block text-danger"></p>
												</div>	
                                    <div class="form-group col-md-3">
													<label for="inputAddress2">Amount Max</label>
													<input  class="form-control numberOnly" type="text" value="" id="amount_max" name="amount_max" placeholder="0.00">
													<p class="help-block text-danger"></p>
												</div>	
											</div>				
											<div class="row">
												<div class="form-group col-md-3">
													<label for="inputAddress2">From</label>
													<input class="form-control" type="date" id="ledger_from" name="ledger_from" value="<?php echo date("Y-m-d"); ?>">	
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">To</label>
													<input class="form-control" type="date" id="ledger_to" name="ledger_to" value="<?php echo date("Y-m-d"); ?>">		
												</div>						
												<div class="form-group col-md-3 mt-4 text-center">
													<label for="inputAddress2"></label>
                                        <button type="button" class="btn btn-success" id="search_ledger"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
												</div>
                                    <div class="form-group col-md-3">
										<label for="inputAddress2">Opening Balance: </label>
                                       <p class="help-block text-danger"><i class="fa fa-rupee" aria-hidden="true"></i> <span id='closing_balance'>0.00</span></p>
                                    </div>
											 </div>
								        </div>
                                        
											<div class="table-responsive">  
												<table class="table table-bordered">
													<thead>
														<tr bgcolor="#afd66b">
                                             <th class="text-center">Date</th>
                                             <th class="text-center">Account</th>
															<th class="text-center">Voucher No.</th>
															<th class="text-center">Type</th>															
															<th class="text-center">Debit (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
															<th class="text-center">Credit (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
															<th class="text-center">Closing Balance</th>
                                             <th class="text-center">Memo</th>
															<!--<th class="text-center">Action</th>-->
														</tr>
													</thead>
                                                    <tbody id="gl_inquiry"></tbody>
                                                    <tfoot id="total"></tfoot>
<!--
													<tbody>
													<tr>
														<td colspan="12" class="text-center" >No general ledger transactions have been created for the specified criteria..</td>
													</tr>													
													</tbody>													
-->
												</table> 
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
<script src="<?php echo asset_url()?>js/select2.min.js"></script>

</body>
</html>
<script type="text/javascript">
$(document).ready(function(){

           
    $('#example').DataTable(); 
      var grandTotal = 0;
    	$(document).on('click', '#search_ledger', function(){ 
		var validate = true;
		$('#div1').find('select').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Please Select GL");
			return false;
		}
		
	});
   $('#account_holder').select2(); 
   
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
      $('#ledger_from').attr('max', maxDate);
});    
    
/** Future date validations **/    
//$("#ledger_to").focusout(function() {
//    var ledger_to = $('#ledger_to').val(); 
//    var ledger_from = $('#ledger_from').val(); 
//    if(ledger_to != "" && ledger_from != "" && ledger_from > ledger_to) {
//        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
//		document.getElementById('ledger_to').valueAsDate = new Date();
//    }
//});

$("#ledger_from").focusout(function(){    
    var ledger_from = $('#ledger_from').val(); 
    var ledger_to = $('#ledger_to').val(); 
    if(ledger_to != "" && ledger_from != "" && ledger_from > ledger_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('ledger_from').valueAsDate = new Date();
    }
}); 
    
/** Amount validations **/    
$("#amount_min").focusout(function(){    
    var amount_min = $('#amount_min').val(); 
    var amount_max = $('#amount_max').val(); 
    if(amount_min != "" && amount_max != "" && amount_min > amount_max) {
        swal("Sorry!", "Minimum amount is not greater than the Maximum amount", "warning");
		document.getElementById('amount_min').value = '0.00';
    }
});
$("#amount_max").focusout(function(){   
    var amount_max = $('#amount_max').val(); 
    var amount_min = $('#amount_min').val(); 
    if(amount_min != "" && amount_max != "" && amount_min > amount_max) {
        swal("Sorry!", "Minimum amount is not greater than the Maximum amount", "warning");
		document.getElementById('amount_max').value = '0.00';
    }
});


$('#cost_center_').on('change', function(e){
    var ledgerId = $(this).val();
    updateLedgerForWrong(ledgerId, 'cost_center_');
});



$('#search_ledger').click(function(){
    $('#total').empty(); 
    var str = $('#account_holder').val();
    var arr = str.split('-');
   
    if(arr[0] == 'cashbook'){
		var id = arr[1];
		var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
		console.log(GLEntry);
		var balance="";
	
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/postGLcashreports",
		type:"POST",
		data:GLEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var glInquiry = '';
            if(responseArray.gl_Inquiry.length < 1) {
               glInquiry += '<tr><td colspan="8" class="text-center">No general ledger transactions have been created for the specified criteria</td></tr>';
            }
            if(responseArray.closing_balance.balance > 0) {
               balance = (responseArray.closing_balance.balance)+" Cr";
            }else if(responseArray.closing_balance.balance < 0) {
               balance = -(responseArray.closing_balance.balance)+" Dr";
            } else  {
               balance = " 0";
            }
            document.getElementById('closing_balance').innerHTML=balance;
            $.each(responseArray.gl_Inquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);
				var credit = "";var debit = "";                
                if(amountFirstLetter && amountFirstLetter == '-') {
                    //balance = (Number(balance)+Number(value.amount));
                    var amount = value.amount;
                        while(amount.charAt(0) == '-'){
                         amount = amount.substr(1);
                        }
                    debit = amount;
                } else {
                    //balance = (Number(balance)+Number(value.amount));
                    credit = value.amount;
                }
                var type = "";
                if(value.type == 1) {
                    type = "Payment";
                } else if(value.type == 2) {
                    type = "Receipt";
                } else if(value.type == 3) {
                    type = "Bank Transfer";
                }  else if(value.type == 4) {
                    type = "Contra";
                } else if(value.type == 5) {
                    type = "Purchase";
                } else if(value.type == 6) {
                    type = "Sales";
                } else {
                    type = "Ledger Entry";
                }
                
                if(value.amount > 0) {
                    credit = value.amount;
                } else  {
                    credit = "";
                } 
                if(value.amount < 0) {
                    debit = -(value.amount);
                } else  {
                    debit = "";
                }

               if(value.balance > 0) {
                  balance = (value.balance)+" Cr";
               }else if(value.balance < 0) {
                  balance = -(value.balance)+" Dr";
               } else  {
                  balance = "0";
               }
				glInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.account_name+'</td><td>'+value.voucher_no+'</td><td>'+type+'</td><td class="text-right">'+debit+'</td><td class="text-right">'+credit+'</td><td class="text-right">'+balance+'</td><td>'+value.memo+'</td></tr>';

            });

            var grandTotal = 0;
             var grandcreditTotal = 0;
            $('#gl_inquiry').html(glInquiry); 
            var counttotal='';
               $(".debitvalue").each(function (){ 
                 var stval = parseFloat($(this).html());
                 grandTotal += isNaN(stval) ? 0 : stval;  
             });
             $(".creditvalue").each(function (){ 
                 var stval = parseFloat($(this).html());
                 grandcreditTotal += isNaN(stval) ? 0 : stval;
             });
            if(responseArray.balance > 0) {
               balance = (responseArray.balance)+" Cr";
            }else if(responseArray.balance < 0) {
               balance = -(responseArray.balance)+" Dr";
            } else  {
               balance = "0";
            }
             counttotal +='<tr class="text-right text-danger"><td colspan="6" class=""><strong>Closing Balance <i class="fa fa-rupee" aria-hidden="true"></i></strong></td><td><strong>'+balance+'</strong></td><td></td></tr>';
             $('#total').append(counttotal); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
       //console.log(id);
    }
    else if(arr[0] == 'Cust') {
       glInquiry ="";
       var id = arr[1];
       var account_hoder = id;
    var amount_min = $('#amount_min').val();
    var amount_max = $('#amount_max').val();
    var ledger_from = $('#ledger_from').val();
    var ledger_to = $('#ledger_to').val();
    var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
    //console.log(GLEntry);
    var balance="";
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/postGLcustomerreports",
		type:"POST",
		data:GLEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var glInquiry = '';
            if(responseArray.gl_Inquiry.length < 1) {
               glInquiry += '<tr><td colspan="8" class="text-center">No general ledger transactions have been created for the specified criteria</td></tr>';
            }
            if(responseArray.closing_balance.balance > 0) {
               balance = (responseArray.closing_balance.balance)+" Cr";
            }else if(responseArray.closing_balance.balance < 0) {
               balance = -(responseArray.closing_balance.balance)+" Dr";
            } else  {
               balance = "0";
            }
            document.getElementById('closing_balance').innerHTML=balance;
            $.each(responseArray.gl_Inquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);
				var credit = "";var debit = "";                
                if(amountFirstLetter && amountFirstLetter == '-') {
                    //balance = (Number(balance)+Number(value.gl_amount));
                    var amount = value.amount;					
                        while(amount && amount.charAt(0) == '-'){
							amount = amount.substr(1);
                        }						
						debit = amount                   
                } else {
                    //balance = (Number(balance)+Number(value.gl_amount));
                    credit = value.amount;
                } 
                var type = "";
                if(value.type == 1) {
                    type = "Payment";
                } else if(value.type == 2) {
                    type = "Receipt";
                } else if(value.type == 3) {
                    type = "Bank Transfer";
                }  else if(value.type == 4) {
                    type = "Contra";
                } else if(value.type == 5) {
                    type = "Purchase";
                } else if(value.type == 6) {
                    type = "Sales";
                } else {
                    type = "Ledger Entry";
                }
               if(value.balance > 0) {
                  balance = (value.balance)+" Cr";
               }else if(value.balance < 0) {
                  balance = -(value.balance)+" Dr";
               } else  {
                  balance = "0";
               }
               glInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.account_name+'</td><td>'+value.voucher_no+'</td><td>'+type+'</td><td class="text-right">'+debit+'</td><td class="text-right">'+credit+'</td><td class="text-right">'+balance+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#gl_inquiry').html(glInquiry); 
            if(responseArray.balance > 0) {
               balance = (responseArray.balance)+" Cr";
            }else if(responseArray.balance < 0) {
               balance = -(responseArray.balance)+" Dr";
            } else  {
               balance = "0";
            }
            var counttotal ='<tr class="text-right text-danger"><td colspan="6" class=""><strong>Closing Balance </strong></td><td><strong>'+balance+'</strong></td><td></td></tr>';
            $('#total').append(counttotal); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
    
       //console.log(id);
    }
    else if(arr[0] == 'Supp' )
    {
        glInquiry ="";
       var id = arr[1];
        var account_hoder = id;
    var amount_min = $('#amount_min').val();
    var amount_max = $('#amount_max').val();
    var ledger_from = $('#ledger_from').val();
    var ledger_to = $('#ledger_to').val();
    var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
    console.log(GLEntry);
    var balance="";
     $.ajax({
        url:"<?php echo base_url();?>staff/finance/postGLsupplierreports",
		type:"POST",
		data:GLEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var glInquiry = '';
            if(responseArray.gl_Inquiry.length < 1) {
               glInquiry += '<tr><td colspan="10" class="text-center">No general ledger transactions have been created for the specified criteria</td></tr>';
            }
            if(responseArray.closing_balance.balance > 0) {
               balance = (responseArray.closing_balance.balance)+" Cr";
            }else if(responseArray.closing_balance.balance < 0) {
               balance = -(responseArray.closing_balance.balance)+" Dr";
            } else  {
               balance = "0";
            }
            document.getElementById('closing_balance').innerHTML=balance;
            $.each(responseArray.gl_Inquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);var credit = "";var debit = "";                
                if(amountFirstLetter == '-') {
                    balance = (Number(balance)+Number(value.amount));
                    var amount = value.amount;
                        while(amount.charAt(0) == '-'){
                         amount = amount.substr(1);
                        }
                    debit = amount;
                } else {
                    balance = (Number(balance)+Number(value.amount));
                    credit = value.amount;
                }
                var type = "";
                if(value.type == 1) {
                    type = "Payment";
                } else if(value.type == 2) {
                    type = "Receipt";
                } else if(value.type == 3) {
                    type = "Bank Transfer";
                }  else if(value.type == 4) {
                    type = "Contra";
                } else if(value.type == 5) {
                    type = "Purchase";
                } else if(value.type == 6) {
                    type = "Sales";
                } else {
                    type = "Ledger Entry";
                }
               if(value.balance > 0) {
                  balance = (value.balance)+" Cr";
               }else if(value.balance < 0) {
                  balance = -(value.balance)+" Dr";
               } else  {
                  balance = "0";
               } 
               glInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.account_name+'</td><td>'+value.voucher_no+'</td><td class="text-right">'+type+'</td><td class="text-right">'+debit+'</td><td class="text-right">'+credit+'</td><td class="text-right">'+balance+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#gl_inquiry').html(glInquiry); 
            if(responseArray.balance > 0) {
               balance = (responseArray.balance)+" Cr";
            }else if(responseArray.balance < 0) {
               balance = -(responseArray.balance)+" Dr";
            } else  {
               balance = "0";
            }
            var counttotal ='<tr class="text-right text-danger"><td colspan="6" class=""><strong>Closing Balance </strong></td><td><strong>'+balance+'</strong></td><td></td></tr>';
            $('#total').append(counttotal); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
       //console.log(id);
    } 
   else //if(arr[0] == 'GL' )
    {		
		var id = arr[1];
        var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
		console.log(GLEntry);
		var balance="";
		
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/postGLreports",
		type:"POST",
		data:GLEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var glInquiry = '';
            if(responseArray.gl_Inquiry.length < 1) {
               glInquiry += '<tr><td colspan="10" class="text-center">No general ledger transactions have been created for the specified criteria</td></tr>';
            }
            if(responseArray.closing_balance.balance > 0) {
               balance = (responseArray.closing_balance.balance)+" Cr";
            }else if(responseArray.closing_balance.balance < 0) {
               balance = -(responseArray.closing_balance.balance)+" Dr";
            } else  {
               balance = "0";
            }
            document.getElementById('closing_balance').innerHTML=balance;
            $.each(responseArray.gl_Inquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);var credit = "";var debit = "";                
                if(amountFirstLetter == '-') {
                    balance = (Number(balance)+Number(value.amount));
                    var amount = value.amount;
                        while(amount.charAt(0) == '-'){
                         amount = amount.substr(1);
                        }
                    debit = amount;
                } else {
                    balance = (Number(balance)+Number(value.amount));
                    credit = value.amount;
                }
                
                var type = "";
                 if(value.type == 1) {
                    type = "Payment";
                } else if(value.type == 2) {
                    type = "Receipt";
                } else if(value.type == 3) {
                    type = "Bank Transfer";
                }  else if(value.type == 4) {
                    type = "Contra";
                } else if(value.type == 5) {
                    type = "Purchase";
                } else if(value.type == 6) {
                    type = "Sales";
                } else {
                    type = "Ledger Entry";
                }
               if(value.balance > 0) {
                  balance = (value.balance)+" Cr";
               }else if(value.balance < 0) {
                  balance = -(value.balance)+" Dr";
               } else  {
                  balance = "0";
               } 
               glInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.account_name+'</td><td>'+value.voucher_no+'</td><td>'+type+'</td><td class="text-right">'+debit+'</td><td class="text-right">'+credit+'</td><td class="text-right">'+balance+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#gl_inquiry').html(glInquiry);
            if(responseArray.balance > 0) {
               balance = (responseArray.balance)+" Cr";
            }else if(responseArray.balance < 0) {
               balance = -(responseArray.balance)+" Dr";
            } else  {
               balance = "0";
            }
            var counttotal ='<tr class="text-right text-danger"><td colspan="6" class=""><strong>Closing Balance </strong></td><td><strong>'+balance+'</strong></td><td></td></tr>';
            $('#total').append(counttotal); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
       //console.log(id);
    } 
   /*  var account_hoder = id;
    var amount_min = $('#amount_min').val();
    var amount_max = $('#amount_max').val();
    var ledger_from = $('#ledger_from').val();
    var ledger_to = $('#ledger_to').val();
    var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
    console.log(GLEntry);
    var balance="";
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/postGLreports",
		type:"POST",
		data:GLEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var glInquiry = '';
            if(responseArray.gl_Inquiry.length < 1) {
               glInquiry += '<tr><td colspan="10" class="text-center">No general ledger transactions have been created for the specified criteria</td></tr>';
            }
            $.each(responseArray.gl_Inquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);var credit = "";var debit = "";                
                if(amountFirstLetter == '-') {
                    balance = (Number(balance)+Number(value.amount));
                    var amount = value.amount;
                        while(amount.charAt(0) == '-'){
                         amount = amount.substr(1);
                        }
                    debit = amount;
                } else {
                    balance = (Number(balance)+Number(value.amount));
                    credit = value.amount;
                }
                
                var type = "";
                if(value.type == 1) {
                    type = "Payment";
                } else if(value.type == 2) {
                    type = "Deposit";
                } else if(value.type == 3) {
                    type = "Bank Transfer";
                } else {
                    type = "Ledger Entry";
                }
                
                
                glInquiry += '<tr><td>'+type+'</td><td>'+value.counter+'</td><td>'+value.tran_date+'</td><td>'+value.tran_date+'</td><td>'+debit+'</td><td>'+credit+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#gl_inquiry').html(glInquiry); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });  */ 
});
$( document ).ready(function() {
  getAllGLPayment();


$('#account_holder').on('change', function(e){
    var ledgerId = $(this).val();
    updateLedgerForWrong(ledgerId, 'account_holder');
});
   
getAllGLPayment("account_holder"); 

function updateLedgerForWrong(ledgerId, elementId) {  
    if(ledgerId == 'customer' || ledgerId == 'supplier' || ledgerId == 'gl_trans') {
        getAllGLPayment(elementId);
    }
} 

});
function getAllGLPayment() {
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/getglinfo",
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
             var cost_value = '<option value="">Select GL</option>';  
            $.each(responseArray.gl_list,function(key, value){
                if(value.cashbook_list) {
                    cost_value += '<option class="text-danger dw_bg" value="cashbook-1">Cash Book</option>';
                  /*  $.each(value.customer_list,function(keys, values){                
                        cost_value += '<option value='1'>'+values.debtor_no+' - '+values.name+'</option>'
                    }); */ 
                }
                if(value.customer_list) {
                    cost_value += '<optgroup label="customer" value="customer">';
                    $.each(value.customer_list,function(keys, values){                
                        cost_value += '<option value=Cust-'+values.debtor_no+'>'+values.debtor_no+' - '+values.name+'</option>'
                    });
                    cost_value += '</optgroup>';
                }
                if(value.supplier_list) {
                    cost_value += '<optgroup label="supplier" value="supplier">';
                    $.each(value.supplier_list,function(keys, values){                
                        cost_value += '<option value=Supp-'+values.supplier_id+'>'+values.supplier_id+' - '+values.supp_name+'</option>'
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
            $('#account_holder').html(cost_value);
        },
        error:function(response){
            //alert('Error!!! Try again');
        } 			
    });     
}    
       
/* $('#account_holder').on('change', function(e){
       var id = $(this).val();
       
    }); */

$('.dw_bg').select2({
  
  
 });
 
  
</script>