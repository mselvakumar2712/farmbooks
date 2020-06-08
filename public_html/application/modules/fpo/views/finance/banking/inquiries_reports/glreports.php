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
.text-right {
   font-style: normal ! important;
}
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

#ledgerShowDiv {	
    position: absolute;
    width: 100%; /* Full width (cover the whole page) */
	height: 100%; /* Full height (cover the whole page) */
	top: 0; 
	left: 0;
	right: 0;
	bottom: 0;
	background-color: rgba(0,0,0,0.5); /* Black background with opacity */
	z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
	cursor: pointer; /* Add a pointer on hover */
	padding: 25px 15px 15px 15px;  
}

.ledgerShowTableBody{
	background-color: #fff;
}
.modal-open{
   padding-right: 10px ! important;
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
                            <li><a class="active" href="<?php echo base_url('fpo/finance/glinquiry');?>">GL Reports</a></li>
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
													<select class="form-control" autofocus id="account_holder" name="account_holder" required data-validation-required-message="Select any account number">
													</select>
												</div>												
												<div class="form-group col-md-3">
													<label for="inputAddress2">Amount Min</label>
													<input class="form-control numberOnly text-right" type="text" value="" id="amount_min" name="amount_min" placeholder="0.00">
												</div>	
												<div class="form-group col-md-3">
													<label for="inputAddress2">Amount Max</label>
													<input  class="form-control numberOnly text-right" type="text" value="" id="amount_max" name="amount_max" placeholder="0.00">
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
													<label for="inputAddress2">Opening Balance </label>
												   <p class="help-block text-danger"><span class="fa fa-inr" aria-hidden="true"></span> <span id='closing_balance'>0.00 Cr</span></p>
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
															<th class="text-center">Debit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
															<th class="text-center">Credit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
															<th class="text-center">Closing Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
														</tr>
													</thead>
                                                    <tbody id="gl_inquiry"></tbody>
                                                    <tfoot id="total"></tfoot>

												</table> 
											</div>
										
											<div class='' id='ledgerShowDiv'>
												<div class='container'>								
												<div class="table-responsive" id="ledgerShows">
													<table class="table table-bordered" id='ledgerShowTable'>
														<tbody>
															<tr bgcolor="#afd66b">	
																<td colspan='5' align='center' style='font-size: 1.5rem;'><strong>View Ledgers</strong></td>
																<td colspan='1' align='right' onclick='closePopupTable()'><i class="fa fa-close" style="font-size:25px;color:red"></i></td>
															</tr>
														</tbody>
														
														<tbody class=''>
															<tr bgcolor="#afd66b">		
																<th class="text-center">Date</th>
																<th class="text-center">Account</th>
																<th class="text-center">Voucher No.</th>
																<th class="text-center">Type</th>															
																<th class="text-center">Debit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
																<th class="text-center">Credit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
															</tr>												
														</tbody>
														<tbody class='ledgerShowTableBody'>
															<tr id='test'><td colspan='6'></td></tr>	
														</tbody>
														<tbody>
															<tr bgcolor="#afd66b"><td colspan='6'></td></tr>	
														</tbody>
													</table>
												</div>
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
   
   closePopupTable();
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
   
    if(arr[0] == 'ledger' || arr[0] == 'bank'){
		var id = arr[1];
		var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		if(arr[0] == 'ledger'){
			var type = 'ledger';
			var ledger_from = $('#ledger_from').val();
		} else {
			var type = 'bank';
			var ledger_from = '2019-04-01';
		}
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to, 'type':type};
		var balance="";	
		$.ajax({
			url:"<?php echo base_url();?>fpo/finance/postGLcashreports",
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
				   glInquiry += '<tr><td colspan="6" class="text-center dataTables_empty">No general ledger transactions have been created for the specified criteria</td></tr>';
				}
				
				if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance >= 0) {
				   balance = responseArray.closing_balance.balance;
				   var type = " Dr";
				}else if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance < 0) {
					var amount = responseArray.closing_balance.balance.toString();
					balance = amount.substr(1);
					var type = " Cr";
				} else if(responseArray.closing_balance.balance == null) {
				   balance = 0;
				   var type = " Cr";
				}
				document.getElementById('closing_balance').innerHTML=parseFloat(balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+type;
				$.each(responseArray.gl_Inquiry, function(key, value){
					var amountFirstLetter = value.amount.charAt(0);
					var credit = 0;var debit = 0;                
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
					
					/*var type = "";
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
					}*/
					
					if(value.amount > 0) {
						debit = value.amount;
					} else  {
						debit = 0;
					} 
					if(value.amount < 0) {
						credit = -(value.amount);
					} else  {
						credit = 0;
					}

					if(value.balance >= 0) {
						balance = " Dr";
					}else if(value.balance < 0) {
						var amount = value.balance.toString();
						value.balance = amount.substr(1);
						balance = " Cr";
					} else {
						value.balance = 0;
						balance = "";
					}
					var dateFormat = dateFormatChange(value.tran_date);
					glInquiry += '<tr><td>'+dateFormat+'</td><td style="color: blue;" onclick="getPopupContent(\''+value.voucher_no+'\')">'+value.account_name+'</td><td>'+value.voucher_no+'</td><td class="text-right">'+parseFloat(debit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(credit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(value.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</td></tr>';

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
				if(responseArray.balance != null && responseArray.balance >= 0) {
					balance = " Dr";
				}else if(responseArray.balance != null && responseArray.balance < 0) {
					balance = " Cr";
					var amount = responseArray.balance.toString();
					responseArray.balance = amount.substr(1);
				} else if(responseArray.balance == null){
					responseArray.balance = 0;
					balance = " Cr";
				}
				 counttotal +='<tr class="text-right text-danger"><td colspan="5" class=""><strong>Closing Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td><td><strong>'+parseFloat(responseArray.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</strong></td></tr>';
				 $('#total').append(counttotal); 
			},error:function(response){
				alert('Error!!! Try again');
			} 			
		});
    } else if(arr[0] == 'Cust'){
		glInquiry ="";
		var id = arr[1];
		var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
		var balance="";
		$.ajax({
			url:"<?php echo base_url();?>fpo/finance/postGLcustomerreports",
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
				   glInquiry += '<tr><td colspan="6" class="text-center dataTables_empty">No general ledger transactions have been created for the specified criteria</td></tr>';
				}
				if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance >= 0) {
				   balance = responseArray.closing_balance.balance;
				   var type = " Dr";
				}else if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance < 0) {
					var amount = responseArray.closing_balance.balance.toString();
					balance = amount.substr(1);
					var type = " Cr";
				} else if(responseArray.closing_balance.balance == null) {
				   balance = 0;
				   var type = " Dr";
				}
				document.getElementById('closing_balance').innerHTML=parseFloat(balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+type;
				$.each(responseArray.gl_Inquiry, function(key, value){
					var amountFirstLetter = value.amount.charAt(0);
					var credit = 0;var debit = 0;
					if(amountFirstLetter && amountFirstLetter == '-') {
						//balance = (Number(balance)+Number(value.gl_amount));
						var amount = value.amount;					
							while(amount && amount.charAt(0) == '-'){
								amount = amount.substr(1);
							}						
							credit = amount                   
					} else {
						//balance = (Number(balance)+Number(value.gl_amount));
						debit = value.amount;
					} 
					/*
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
					}*/
					
					if(value.balance >= 0) {
						balance = " Dr";
					}else if(value.balance < 0) {
						var amount = value.balance.toString();
						value.balance = amount.substr(1);
						balance = " Cr";
					} else {
						value.balance = 0;
						balance = "";
					}
					
					var account_name = (value.customerName?value.customerName:value.account_name)
					var dateFormat = dateFormatChange(value.tran_date);
				   glInquiry += '<tr><td>'+dateFormat+'</td><td style="color: blue;" onclick="getPopupContent(\''+value.voucher_no+'\')">'+account_name+'</td><td>'+value.voucher_no+'</td><td class="text-right">'+parseFloat(debit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(credit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(value.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</td></tr>';
				});                                
				$('#gl_inquiry').html(glInquiry); 
				var counttotal='';
				if(responseArray.balance != null && responseArray.balance >= 0) {
					balance = " Dr";
				}else if(responseArray.balance != null && responseArray.balance < 0) {
					balance = " Cr";
					var amount = responseArray.balance.toString();
					responseArray.balance = amount.substr(1);
				} else if(responseArray.balance == null){
					responseArray.balance = 0;
					balance = " Cr";
				}
				var counttotal = '<tr class="text-right text-danger"><td colspan="5" class=""><strong>Closing Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td><td><strong>'+parseFloat(responseArray.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</strong></td></tr>';
				$('#total').append(counttotal); 
			},error:function(response){
				alert('Error!!! Try again');
			} 			
		});    
    } else if(arr[0] == 'Supp'){
        glInquiry ="";
		var id = arr[1];
        var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
		var balance="";
		 $.ajax({
			url:"<?php echo base_url();?>fpo/finance/postGLsupplierreports",
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
				   glInquiry += '<tr><td colspan="6" class="text-center dataTables_empty">No general ledger transactions have been created for the specified criteria</td></tr>';
				}
				if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance >= 0) {
				   balance = responseArray.closing_balance.balance;
				   var type = " Dr";
				}else if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance < 0) {
					var amount = responseArray.closing_balance.balance.toString();
					balance = amount.substr(1);
					var type = " Cr";
				} else if(responseArray.closing_balance.balance == null) {
				   balance = 0;
				   var type = " Dr";
				}
				document.getElementById('closing_balance').innerHTML=parseFloat(balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+type;
				$.each(responseArray.gl_Inquiry, function(key, value){
					var amountFirstLetter = value.amount.charAt(0);var credit = 0;var debit = 0;                
					if(amountFirstLetter == '-') {
						balance = (Number(balance)+Number(value.amount));
						var amount = value.amount;
							while(amount.charAt(0) == '-'){
							 amount = amount.substr(1);
							}
						credit = amount;
					} else {
						balance = (Number(balance)+Number(value.amount));
						debit = value.amount;
					}
					
					/*var type = "";
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
					}*/
					
					if(value.balance >= 0) {
						balance = " Dr";
					}else if(value.balance < 0) {
						var amount = value.balance.toString();
						value.balance = amount.substr(1);
						balance = " Cr";
					} else {
						value.balance = 0;
						balance = "";
					}

					var account_name = (value.supplierName?value.supplierName:value.account_name)
					var dateFormat = dateFormatChange(value.tran_date);
					glInquiry += '<tr><td>'+dateFormat+'</td><td style="color: blue;" onclick="getPopupContent(\''+value.voucher_no+'\')">'+account_name+'</td><td>'+value.voucher_no+'</td><td class="text-right">'+parseFloat(debit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(credit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(value.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</td></tr>';
				});                                
				$('#gl_inquiry').html(glInquiry); 
				var counttotal='';
				if(responseArray.balance != null && responseArray.balance >= 0) {
					balance = " Dr";
				}else if(responseArray.balance != null && responseArray.balance < 0) {
					balance = " Cr";
					var amount = responseArray.balance.toString();
					responseArray.balance = amount.substr(1);
				} else if(responseArray.balance == null){
					responseArray.balance = 0;
					balance = " Cr";
				}
				var counttotal = '<tr class="text-right text-danger"><td colspan="5" class=""><strong>Closing Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td><td><strong>'+parseFloat(responseArray.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</strong></td></tr>';
				$('#total').append(counttotal); 
			},error:function(response){
				alert('Error!!! Try again');
			} 			
		});
    } else {//if(arr[0] == 'GL' )
		var id = arr[1];
        var account_hoder = id;
		var amount_min = $('#amount_min').val();
		var amount_max = $('#amount_max').val();
		var ledger_from = $('#ledger_from').val();
		var ledger_to = $('#ledger_to').val();
		var GLEntry = {'account_holder':id, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
		var balance="";
		
		$.ajax({
			url:"<?php echo base_url();?>fpo/finance/postGLreports",
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
				   glInquiry += '<tr><td colspan="6" class="text-center dataTables_empty">No general ledger transactions have been created for the specified criteria</td></tr>';
				}
				
				if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance >= 0) {
				   balance = responseArray.closing_balance.balance;
				   var type = " Dr";
				}else if(responseArray.closing_balance.balance != null && responseArray.closing_balance.balance < 0) {
					var amount = responseArray.closing_balance.balance.toString();
					balance = amount.substr(1);
					var type = " Cr";
				} else if(responseArray.closing_balance.balance == null) {
				   balance = Number(0);
				   var type = " Dr";
				}
				document.getElementById('closing_balance').innerHTML=parseFloat(balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+type;
				$.each(responseArray.gl_Inquiry, function(key, value){
					var amountFirstLetter = value.amount.charAt(0);var credit = 0;var debit = 0;                
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
					
					/*var type = "";
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
					}*/
					
					if(value.balance >= 0) {
						balance = " Dr";
					}else if(value.balance < 0) {
						var amount = value.balance.toString();
						value.balance = amount.substr(1);
						balance = " Cr";
					} else {
						value.balance = 0;
						balance = "";
					}
					
					var dateFormat = dateFormatChange(value.tran_date);
					glInquiry += '<tr><td>'+dateFormat+'</td><td style="color: blue;" onclick="getPopupContent(\''+value.voucher_no+'\')">'+value.account_name+'</td><td>'+value.voucher_no+'</td><td class="text-right">'+parseFloat(debit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(credit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td><td class="text-right">'+parseFloat(value.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</td></tr>';
				});                                
				$('#gl_inquiry').html(glInquiry);
				var counttotal='';
				if(responseArray.balance != null && responseArray.balance >= 0) {
					balance = " Dr";
				}else if(responseArray.balance != null && responseArray.balance < 0) {
					balance = " Cr";
					var amount = responseArray.balance.toString();
					responseArray.balance = amount.substr(1);
				} else if(responseArray.balance == null) {
					responseArray.balance = 0;
					balance = " Cr";
				}
				var counttotal = '<tr class="text-right text-danger"><td colspan="5" class=""><strong>Closing Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td><td><strong>'+parseFloat(responseArray.balance).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+balance+'</strong></td></tr>';
				$('#total').append(counttotal); 
			},error:function(response){
				alert('Error!!! Try again');
			} 			
		});
    }      
});

$(document).ready(function(){
	getAllGLPayment();

	$('#account_holder').on('change', function(e){
		var ledgerId = $(this).val();
		updateLedgerForWrong(ledgerId, 'account_holder');
	});
	   
	getAllGLPayment("account_holder"); 

	function updateLedgerForWrong(ledgerId, elementId){  
		if(ledgerId == 'customer' || ledgerId == 'supplier' || ledgerId == 'gl_trans') {
			getAllGLPayment(elementId);
		}
	} 
});


function getAllGLPayment() {
    $.ajax({
        url:"<?php echo base_url();?>fpo/finance/getglinfo",
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
                if(value.ledger_type || value.bank_list) {
                    cost_value += '<optgroup label="Cash Book" value="cashbook">';
					$.each(value.ledger_type,function(keys, values){      
						cost_value += '<option value=ledger-'+values.account_code+'>'+values.account_code+' - '+values.account_name+'</option>';
					});
					$.each(value.bank_list,function(keys, values){      
						cost_value += '<option value=bank-'+values.id+'>'+values.bank_account_name+'</option>';
					});
					cost_value += '</optgroup>';
                }
                if(value.customer_list) {
                    cost_value += '<optgroup label="customer" value="customer">';
                    $.each(value.customer_list,function(keys, values){                
                        cost_value += '<option value=Cust-'+values.debtor_no+'>'+values.debtor_no+' - '+values.name+'</option>';
                    });
                    cost_value += '</optgroup>';
                }
                if(value.supplier_list) {
                    cost_value += '<optgroup label="supplier" value="supplier">';
                    $.each(value.supplier_list,function(keys, values){                
                        cost_value += '<option value=Supp-'+values.supplier_id+'>'+values.supplier_id+' - '+values.supp_name+'</option>';
                    });
                    cost_value += '</optgroup>';
                }
                if(value.gl_list) {
                    cost_value += '<optgroup label="GL List" value="gl_trans">';
                    $.each(value.gl_list,function(keys, values){      
                        if(values.has_child == 1){
                           cost_value += '<optgroup label="'+values.account_name+'" value="gl_trans"></optgroup>';
                        } else {
                           cost_value += '<option value='+values.account_code+'-'+values.account_code+'>'+values.account_code+' - '+values.account_name+'</option>';
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


$('.dw_bg').select2({});

function getPopupContent(voucher_no){
	$(".ledgerShowTableBody tr").remove();
	$.ajax({
        url:"<?php echo base_url();?>fpo/finance/getAllTransactionByVoucherNumber/"+voucher_no,
        type:"GET",
        data:"",
        dataType:"html",
        cache:false,			
        success:function(response) {
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);  
			if(responseArray.status==1){
				var childNodeAppend='';
				$.each(responseArray.transactionList, function(key, value){
					var dateFormat = dateFormatChange(value.tran_date);
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
					
					var amountFirstLetter = value.amount.charAt(0);var credit = 0;var debit = 0;                
					if(amountFirstLetter == '-') {
						var amount = value.amount;
							while(amount.charAt(0) == '-'){
							 amount = amount.substr(1);
							}
						debit = amount;
					} else {
						credit = value.amount;
					}
					
					/* if(value.balance > 0) {
						balance = " Cr";
					}else if(value.balance < 0) {
						balance = " Dr";
						var amount = value.balance.toString();
						value.balance = amount.substr(1);
					} else {
						balance = 0;
					}  */
				   
					childNodeAppend += '<tr class="row_'+value.counter+'" id="'+value.counter+'">';
					childNodeAppend += '<td class="text-center">'+dateFormat+'</td>';
					if(value.account_code == '3030201' || value.account_code == '3030202' || value.account_code == '3030203'){
						childNodeAppend += '<td class="text-center" style="font-weight:bold">'+value.supplierName+'</td>';
					} else if(value.account_code == '4020201' || value.account_code == '4020202'){
						childNodeAppend += '<td class="text-center" style="font-weight:bold">'+value.customerName+'</td>';
					} else if(value.account_code == '40204'){
						childNodeAppend += '<td class="text-center">'+value.accountName+'</td>';
					} else {
						childNodeAppend += '<td class="text-center">'+value.account_name+'</td>';
					}
					childNodeAppend += '<td class="text-center">'+value.voucher_no+'</td>';
					childNodeAppend += '<td class="text-center">'+type+'</td>';
					childNodeAppend += '<td class="text-right">'+parseFloat(debit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td>';
					childNodeAppend += '<td class="text-right">'+parseFloat(credit).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'</td>';
					childNodeAppend += '</tr>';
				});
				$('#ledgerShowDiv').show();
				$(".ledgerShowTableBody").append(childNodeAppend);
			}			
        },
        error:function(response){
            alert('Error!!! Try again');
        } 			
    });    
} 

function closePopupTable(){
	$('#ledgerShowDiv').hide();
}  

function dateFormatChange(dateFormat){
	var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var dateFormats = new Date(dateFormat);
    return dateFormats.getDate() + '-' + monthShortNames[dateFormats.getMonth()] + '-' + dateFormats.getFullYear();
} 
</script>