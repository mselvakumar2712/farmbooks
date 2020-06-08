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
                        <h1>Journal Inquiry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/finance/journalinquiry');?>">Journal Inquiry</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form action="#" id="journalEntryForm" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">                                            
											<div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Voucher No.</label>
													<input class="form-control" type="text" id="journal_ref" name="journal_ref">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Type</label>
													<select class="form-control" id="type" name="type">
														<option value="">Select Type</option>
														<option value="1">Credit</option>
                                                        <option value="2">Debit</option>
													</select>
												</div>	
												<div class="form-group col-md-3">
													<label for="inputAddress2">From</label>
													<input class="form-control" type="date" id="journal_entry_from" name="journal_entry_from" value="<?php echo date("Y-m-d"); ?>">		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">To</label>
													<input class="form-control" type="date" id="journal_entry_to" name="journal_entry_to" value="<?php echo date("Y-m-d"); ?>">		
												</div>					
											</div>
											<div class="row ">												
												<div class="form-group col-md-2 mt-4 text-center">
													<label for="inputAddress2">Show All:</label>
												  <input type="checkbox" id="show_all" name="show_all" value="1" class="form-check-input ml-2">												
												</div>
												<div class="form-group col-md-3 mt-4">
                                                    <button type="button" class="btn btn-success" id="search_journal">Search</button>
												</div>
											</div>
											</div>
                                        
											<div class="table-responsive">  
											<table class="table table-bordered">
												<thead>
													<tr bgcolor="#afd66b">		
														<th class="text-center">Date</th>
														<th class="text-center">Voucher Number</th>
														<th class="text-center">Account Code</th>
														<th class="text-center">Amount (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
														<th class="text-center">Memo</th>
														<!--<th class="text-center">User</th>
														<th class="text-center">View</th>-->
													</tr>
												</thead>
												<tbody id="journal_inquiry"></tbody>
											</table> 
											</div>
                                        
										</div>
									</div>
								</div>
							</div>						
						</form>
					</div>
				</div>
            </div><!-- .animated -->
		</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
 
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  $('#type').select2();
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
      $('#journal_entry_from').attr('max', maxDate);
});
    
$("#journal_entry_to").focusout(function() {    
    var journal_entry_to = $('#journal_entry_to').val(); 
    var journal_entry_from = $('#journal_entry_from').val(); 
    if(journal_entry_to != "" && journal_entry_from != "" && journal_entry_from > journal_entry_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('journal_entry_to').valueAsDate = new Date();
    }
});   
$("#journal_entry_from").focusout(function() {        
    var journal_entry_from = $('#journal_entry_from').val(); 
    var journal_entry_to = $('#journal_entry_to').val(); 
    if(journal_entry_to != "" && journal_entry_from != "" && journal_entry_from > journal_entry_to) {
        swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
		document.getElementById('journal_entry_from').valueAsDate = new Date();
    }
});    
    
$(document).ready(function() {          
    //$('#example').DataTable();
});
    
$('#search_journal').click(function() {
    var showAll = $('#show_all:checked').val();
    var voucher_no = $('#journal_ref').val();
    var type = $('#type').val();
    var journal_entry_from = $('#journal_entry_from').val();
    var journal_entry_to = $('#journal_entry_to').val();
    if(showAll == 1) {
        var journalEntry = {'show_all':showAll};
    } else {
        var journalEntry = {'voucher_no':voucher_no, 'journal_entry_from':journal_entry_from, 'journal_entry_to':journal_entry_to, 'type':type};
    }
    console.log(journalEntry);
    
    $.ajax({
        url:"<?php echo base_url();?>staff/finance/postJournalInquiry",
		type:"POST",
		data:journalEntry,
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            var journalInquiry = '';
            if(responseArray.journalInquiry.length < 1) {
               journalInquiry += '<tr><td colspan="8" class="text-center">No records found</td></tr>';
            }
            
            $.each(responseArray.journalInquiry, function(key, value){
                var amount = value.amount;
                if(amount.charAt(0) == "-") {
                    while(amount.charAt(0) == '-'){
                     amount = amount.substr(1);
                    }
                } else {
                    amount = value.amount;
                }
                journalInquiry += '<tr><td>'+value.tran_date+'</td><td>'+value.voucher_no+'</td><td>'+value.account_code+'</td><td>'+amount+'</td><td>'+value.memo+'</td></tr>';
            });                                
            $('#journal_inquiry').html(journalInquiry); 
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });
}); 
</script>