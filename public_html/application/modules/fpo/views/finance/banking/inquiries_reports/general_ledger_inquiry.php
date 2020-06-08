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
                        <h1>General Reports</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/finance/glinquiry');?>">General Reports</a></li>
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
												<div class="form-group col-md-6">
													<label for="inputAddress2">Account</label>
													<select class="form-control" id="account_holder" name="account_holder" required data-validation-required-message="Select any account number">
														<option value="">Select an Account</option>
                                                        <option value="1065">Petty Cash Amount</option>
													    <?php for($i=0; $i<count($banks);$i++) { ?>
                                                        <option value="<?php echo $banks[$i]->id; ?>"><?php echo $banks[$i]->bank_account_name; ?></option>
                                                        <?php } ?>
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
												<div class="form-group col-md-4">
													<label for="inputAddress2">From</label>
													<input class="form-control" type="date" id="ledger_from" name="ledger_from" value="<?php echo date("Y-m-d"); ?>">	
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">To</label>
													<input class="form-control" type="date" id="ledger_to" name="ledger_to" value="<?php echo date("Y-m-d"); ?>">		
												</div>						
												<div class="form-group col-md-3 mt-4">
													<label for="inputAddress2"></label>
                                                    <button type="button" class="btn btn-success" id="search_ledger">Search</button>
												</div>
											 </div>
								        </div>
                                        
											<div class="table-responsive">  
												<table class="table table-bordered">
													<thead>
														<tr bgcolor="#afd66b">		
															<th class="text-center">Type</th>
															<th class="text-center">Voucher No.</th>
															<th class="text-center">Date</th>
															<th class="text-center">Account</th>
															<th class="text-center">Debit (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
															<th class="text-center">Credit (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
															<th class="text-center">Memo</th>
															<!--<th class="text-center">Action</th>-->
														</tr>
													</thead>
                                                    <tbody id="gl_inquiry"></tbody>
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
$(document).ready(function() {              
    $('#example').DataTable();
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
$("#ledger_from").focusout(function() {    
    var ledger_from = $('#ledger_from').val(); 
    var ledger_to = $('#ledger_to').val(); 
    if(ledger_to != "" && ledger_from != "" && ledger_from > ledger_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('ledger_from').valueAsDate = new Date();
    }
}); 
    
/** Amount validations **/    
$("#amount_min").focusout(function() {    
    var amount_min = $('#amount_min').val(); 
    var amount_max = $('#amount_max').val(); 
    if(amount_min != "" && amount_max != "" && amount_min > amount_max) {
        swal("Sorry!", "Minimum amount is not greater than the Maximum amount", "warning");
		document.getElementById('amount_min').value = '0.00';
    }
});
$("#amount_max").focusout(function() {    
    var amount_max = $('#amount_max').val(); 
    var amount_min = $('#amount_min').val(); 
    if(amount_min != "" && amount_max != "" && amount_min > amount_max) {
        swal("Sorry!", "Minimum amount is not greater than the Maximum amount", "warning");
		document.getElementById('amount_max').value = '0.00';
    }
});
    
$('#search_ledger').click(function() {
    var account_holder = $('#account_holder').val();
    var amount_min = $('#amount_min').val();
    var amount_max = $('#amount_max').val();
    var ledger_from = $('#ledger_from').val();
    var ledger_to = $('#ledger_to').val();
    var GLEntry = {'account_holder':account_holder, 'amount_min':amount_min, 'amount_max':amount_max, 'ledger_from':ledger_from, 'ledger_to':ledger_to};
    console.log(GLEntry);
    
    var balance="";
    $.ajax({
        url:"<?php echo base_url();?>fpo/finance/postGLInquiry",
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
    });
});     

</script>