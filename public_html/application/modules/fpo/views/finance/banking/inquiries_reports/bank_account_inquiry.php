<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                        <h1>Bank Statement</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/finance/bankaccountinquiry');?>">Bank Statement</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="#" id="account_transfer_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">                                            
										<div class="row ">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account</label>
												<select class="form-control" id="account_holder" name="account_holder" data-validation-required-message="Select any account">
													<option value="">Select an Account</option>
													<?php for($i=0; $i<count($banks);$i++) { ?>
                                                    <option value="<?php echo $banks[$i]->id; ?>"><?php echo $banks[$i]->bank_account_number.' - '.$banks[$i]->bank_account_name; ?></option>
                                                    <?php } ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">From</label>
												<input class="form-control" type="date" id="inquiry_from" name="inquiry_from" value="<?php echo date("Y-m-d"); ?>">	
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">To</label>
												<input class="form-control" type="date" id="inquiry_to" name="inquiry_to" value="<?php echo date("Y-m-d"); ?>">		
											</div>
											<div class="form-group col-md-2 mt-3">
												<button type="button" class="btn btn-success" id="search_transfer">Search</button>
											</div>
										</div>	
									</div>
									
									<div class="table-responsive mt-3">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">		
													<th class="text-center">Date</th>
													<th class="text-center">Voucher Number</th>	
													<th class="text-center">Account Name</th>
													<th class="text-center">Account Number</th>
                                                    <th class="text-center">Debit</th>
													<th class="text-center">Credit</th>
													<th class="text-center">Balance</th>
													<th class="text-center">Memo</th>
												</tr>
											</thead>
											<tbody id="account_inquiry"></tbody>
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
</body>
</html>
<script type="text/javascript">
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
      $('#inquiry_from').attr('max', maxDate);
});
    
$("#inquiry_to").focusout(function() {    
    var inquiry_to = $('#inquiry_to').val(); 
    var inquiry_from = $('#inquiry_from').val(); 
    if(inquiry_to != "" && inquiry_from != "" && inquiry_from > inquiry_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('inquiry_to').valueAsDate = new Date();
    }
});
$("#inquiry_from").focusout(function() {    
    var inquiry_from = $('#inquiry_from').val(); 
    var inquiry_to = $('#inquiry_to').val(); 
    if(inquiry_to != "" && inquiry_from != "" && inquiry_from > inquiry_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('inquiry_from').valueAsDate = new Date();
    }
});
    
$(document).ready(function() {          
    $('#example').DataTable();
});
    
$('#search_transfer').click(function() {
    var account_holder = $('#account_holder').val();
    var inquiry_from = $('#inquiry_from').val();
    var inquiry_to = $('#inquiry_to').val();
    var accountInquiry = {'account_holder':account_holder, 'inquiry_from':inquiry_from, 'inquiry_to':inquiry_to};
    console.log(accountInquiry);
    
    var balance="";
    $.ajax({
        url:"<?php echo base_url();?>fpo/finance/postBankAccountInquiry",
		type:"POST",
		data:accountInquiry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var accountInquiry = '';
            if(responseArray.accountInquiry.length < 1) {
               accountInquiry += '<tr><td colspan="10" class="text-center">No records found</td></tr>';
            }
            $.each(responseArray.accountInquiry, function(key, value){
                var amountFirstLetter = value.amount.charAt(0);
                var credit = "";
                var debit = "";
                
                if(amountFirstLetter == '-') {
                    balance = (Number(balance)+Number(value.amount));
                    debit = value.amount;
                } else {
                    balance = (Number(balance)+Number(value.amount));
                    credit = value.amount;
                }
                
                accountInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.voucher_no+'</td><td>'+value.bank_account_name+'</td><td>'+value.bank_account_number+'</td><td>'+credit+'</td><td>'+debit+'</td><td>'+balance+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#account_inquiry').html(accountInquiry); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
});        
</script>