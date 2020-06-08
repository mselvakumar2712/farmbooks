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
                        <h1>Credit Note</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Finance</a></li>
                            <li><a href="#">Transaction</a></li>
                            <li><a href="<?php echo base_url('fpo/finance/creditnote');?>"class="active">Credit Note</a></li>
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
			<form action="<?php echo base_url('fpo/finance/postCreditnote'); ?>" method="post" id="debit_note_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                                            
										  <div class="row">
												<div class="form-group col-md-4">
													<label for="inputAddress">Entry Date <span class="text-danger">*</span></label>
													<input class="form-control" autofocus min="<?php echo $formation_date;?>" type="date" id="entry_date" name="entry_date" required data-validation-required-message="provide the entry date" value="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d"); ?>">
													<p id="validate_date" class="help-block text-danger"></p>
												</div>
                                                <div class="form-group col-md-4">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="entry_day" name="entry_day" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Voucher No. <span class="text-danger">*</span></label>
													<input class="form-control" id="voucher_no" name="voucher_no" placeholder="Voucher No." required data-validation-required-message="Enter the voucher no." value="<?php echo $last_voucher_no; ?>" readonly>
													<p id="validate_voucher_no" class="help-block text-danger"></p>
												</div>					
											</div>
											<div class="row">
											    <input type="hidden" id="supplier_id" name="supplier_id"><input  type="hidden" class="form-control" id="customer_id" name="customer_id">
												<div class="form-group col-md-6 ">
												<label for="inputAddress2">Invoice No. <span class="text-danger">*</span></label>
												<select  class="form-control invoice_no"  id="invoice_no" name="invoice_no[]" ></select>
												<p id="validate_invoice_no" class="text-danger"></p>
												</div>
												<div class="form-group col-md-3 mt-1" id ="invoice_div" style="display:none">
													<input class="form-control mt-4" type="date" readonly id="invoice_date" name="invoice_date">
												</div>
												<div class="form-group col-md-3 mt-1" id ="invoice_div_day" style="display:none">
													<input class="form-control mt-4" type="text" readonly id="invoice_day" name="invoice_day">
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Customer/Supplier Name <span class="text-danger">*</span></label>
													<input class="form-control" id="customer_name" name="customer_name" placeholder="Customer/Supplier Name"  required="required" data-validation-required-message="Please select ledger entry" readonly>
													<p id="validate_customer_name" class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress">Invoice Amount ( <span class="fa fa-inr" aria-hidden="true"></span> )<span class="text-danger">*</span></label>
													<input class="form-control text-right" id="invoice_amt" name="invoice_amt" placeholder="Invoice Amount"  required="required" data-validation-required-message="Please select ledger entry" readonly>
													<p id="validate_amount" class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row">											
												<div class="form-group col-md-6">
													<label for="inputAddress2"> Ledger Entry <span class="text-danger">*</span></label>
													<select class="form-control" id="ledger_entry" name="ledger_entry" style="width:100%" required="required" data-validation-required-message="Please select ledger entry">
														<option value="0">Select  Ledger Entry</option>
														<?php 
														$customers = $ledger_entry[0];
														$customer_list = $customers['customer_list'];
														$suppliers = $ledger_entry[1];
														$supplier_list = $suppliers['supplier_list'];
														$gl_trans = $ledger_entry[2];
														$gl_trans_list = $gl_trans['gl_list'];                                        
														if(!empty($customer_list)){
														?>
														<optgroup label="Customers" value="<?php echo $customers['customer']; ?>"></optgroup>
														<?php 
														for($i=0; $i<count($customer_list);$i++) { ?>										
														<option  value="<?php echo $customer_list[$i]->debtor_no.'-'.$customer_list[$i]->gl_group; ?>"><?php echo $customer_list[$i]->debtor_no.'-'.$customer_list[$i]->name; ?></option>
														<?php } } if(!empty($supplier_list)){?>
														<optgroup label="Suppliers" value="<?php echo $suppliers['supplier']; ?>"></optgroup>
														<?php 
														for($i=0; $i<count($supplier_list);$i++) { ?>										
														<option value="<?php echo $supplier_list[$i]->supplier_id.'-'.$supplier_list[$i]->gl_group_id; ?>"><?php echo $supplier_list[$i]->supplier_id.'-'.$supplier_list[$i]->supp_name; ?></option>
														<?php } }if(!empty($gl_trans_list)){?>
														<optgroup label="GL List" value="<?php echo $gl_trans['gl_trans']; ?>"></optgroup>
														<?php                                            
														for($i=0; $i<count($gl_trans_list);$i++) {                                           
														  if($gl_trans_list[$i]->has_child == 1 ){?>
														   <optgroup label="<?php echo $gl_trans_list[$i]->account_name; ?>" value="gl_trans"></optgroup>		
														 <?php }else{?>
														  <option value="<?php echo $gl_trans_list[$i]->account_code.'-'.$gl_trans_list[$i]->account_code; ?>"><?php echo $gl_trans_list[$i]->account_code.'-'.$gl_trans_list[$i]->account_name; ?></option>			                                         
																	<?php } 
														  }}?>
														</select>
														<p id="validate_ledger_entry" class="mt-2 help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress">Credit Note ( <span class="fa fa-inr" aria-hidden="true"></span> ) <span class="text-danger">*</span></label>
													<input class="form-control inputfilter text-right" maxlength="6" id="credit_note" name="credit_note" placeholder="Credit Note " required="required" data-validation-required-message="Please enter crdit note">
													<p id="validate_credit_note" class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row">
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
$(document).ready(function() {
  $('#ledger_entry').select2();
}); 


$("#sendMessageButton").click(function() {
	var entry_date = document.getElementById("entry_date").value;
	var voucher_no = document.getElementById("voucher_no").value;
	var ledger_entry = document.getElementById("ledger_entry").value;
	var credit_note = document.getElementById("credit_note").value;
	var invoice_no = document.getElementById("invoice_no").value;
	var customer_name = document.getElementById("customer_name").value;
	var amount = document.getElementById("invoice_amt").value;
	if(entry_date == ''){
		$("#validate_date").html("Please select entry date.");
		return false;
	}else if(voucher_no==''){
		$("#validate_voucher_no").html("Please select voucher no.");
		return false;
	}else if(invoice_no==''){
		$("#validate_invoice_no").html("Please select invoice no.");
		return false;
	}else if(ledger_entry==0){
		$("#validate_ledger_entry").html("Please select ledger entry.");
		return false;
	}else if(credit_note==''){
		$("#validate_credit_note").html("Please enter credit note.");
		return false;
	}else if(customer_name==''){
		$("#validate_customer_name").html("Please enter customer name.");
		return false;
	}else if(amount==''){
		$("#validate_amount").html("Please enter amount.");
		return false;
	}else {
		return true;
	}
});


var gSelectedInv = '';
$('#invoice_no').on('change', function () {
    var invoice= $(this).val();
	if(invoice == null){
		document.getElementById('customer_name').value = "";
		document.getElementById('invoice_date').value = "";
		document.getElementById("invoice_day").value = "";	
		document.getElementById("supplier_id").value = "";
		document.getElementById("customer_id").value = "";
		document.getElementById("invoice_amt").value = "";
	}
	
	if(invoice != null){
		if(invoice && invoice.length > 1){
			var results = [];
			for (var i = 0; i < invoice.length; i++) {
				var result=invoice[i].split("&");
				results.push(result[1]);
			}
			
			function allEqual(arr) {
			  return new Set(arr).size == 1;
			}
			var result_invoice=allEqual(results);
			if(result_invoice==true){
				gSelectedInv = invoice;
				get_customername(gSelectedInv);
			}else{
				swal("Please select same customer or supplier name");
			}
		}else{
			gSelectedInv = invoice;
			get_customername(gSelectedInv);
		}
	}
});


$('#ledger_entry').on('change', function(e){
    var ledgerId = $(this).val();
    if(ledgerId == 'Customers' || ledgerId == 'Suppliers' || ledgerId == 'GL List') {
       $('#ledger_entry').val('0');
    }   
});
   

function get_customername(gSelectedInv){	    
	if(gSelectedInv.length==1){
		$('#invoice_div').show();
		$('#invoice_div_day').show();
	}else{
		$('#invoice_date').val('');
		$('#invoice_div').hide();
		$('#invoice_div_day').hide();
	}
	var invoice_name=gSelectedInv[0].split("&");
		
	$.ajax({
		url: "<?php echo base_url();?>fpo/finance/getCustomername",
		type: "POST",
		data: {invoice_no: invoice_name[0]},
		dataType: "html",
		cache: false,      
		success:function(response) { 		
			response = response.trim();
			responseArray = $.parseJSON(response);
			
			if(responseArray.type == 'supplier'){					
				$.each(responseArray.supplier_name, function(key, value,index) {
					if(value.supplier_id == "4020501"){
						var suppName = "Main Cash";
					} else if(value.supplier_id == "4020502"){
						var suppName = "Petty Cash";
					} else {
						var suppName = value.supp_name;
					}
					document.getElementById('customer_name').value = suppName;
					document.getElementById('invoice_date').value = value.tran_date;
					var day=updateContraDay(value.tran_date);
					document.getElementById("invoice_day").value = day;	
					document.getElementById("supplier_id").value = value.supplier_id;
				});
			} else if(responseArray.type == 'customer'){
				$.each(responseArray.customer_name, function(key, value) {	
				  if(value.debtor_no == "4020501"){
					 var customerName = "Main Cash";
				  } else if(value.debtor_no == "4020502"){
					 var customerName = "Petty Cash";
				  } else {
					 var customerName = value.name;
				  }
				  document.getElementById('customer_name').value = customerName;
				  document.getElementById('invoice_date').value = value.tran_date;
				  var day=updateContraDay(value.tran_date);					
				  document.getElementById("invoice_day").value = day;
				});
			}		
		} 
	});
	getinvoiceamount(gSelectedInv);
}	


function getinvoiceamount(invoice){			
			var results = [];
			for (var i = 0; i < invoice.length; i++) {
				var result=invoice[i].split("&");
				results.push(result[0]);
			}
			$.ajax({
			url: "<?php echo base_url();?>fpo/finance/getInvoiceAmount",
			type: "POST",
			data: {invoice: results},
			dataType: "html",
			cache: false,      
			success:function(response) { 
			
				response = response.trim();
				responseArray = $.parseJSON(response);
				console.log(responseArray);
				if(responseArray.type == 'sales'){					
					$.each(responseArray.sales_amount, function(key, value) {					
						document.getElementById('invoice_amt').value = value.total;					
					});
				}else if(responseArray.type == 'purchase'){
					$.each(responseArray.purchase_amount, function(key, value) {			
						document.getElementById('invoice_amt').value = value.total;
					});
				}	
			} 
		});
}	


$('.invoice_no').select2({
	placeholder: '--- Select Invoice No ---',
	//minimumInputLength: 2,
	multiple:true,
	delay: 250,
	ajax: {
		url: '<?php echo base_url('fpo/finance/getInvoiceno')?>',
		dataType: 'json',
		delay: 250,
	    processResults: function(data){
			var results = [];
			$.each(data, function(index, item){
				if(gSelectedInv != '') {
				//console.log(gSelectedInv);
				if(gSelectedInv[0] != null){
					var split_name=gSelectedInv[0].split("&");
					var split_id=split_name[1].split("_");
					var getitem_id=item.title.split("&");
					if(getitem_id[1]==split_name[1]){
						results.push({
							id: item.title,
							text: item.text,
						});
					}
				}
				} else {
					results.push({
						id: (item.title?item.title:item.text),
						text: item.text,
					});
				}							
			});
			return{
				results: results
			};
		},
		cache: true
	}
});

 
$('input[id="entry_date"]').on('change', function(e){ 
    e.preventDefault();
    var dateval = "";
    if($(this).val()){
        dateval = $(this).val();
    } else {
        dateval = new Date().getDay();
    }            
	
	updateContraDay(dateval);      
});


var entry_date=document.getElementById("entry_date").value;
if(entry_date!==''){
	var day=updateContraDay(entry_date);
	document.getElementById("entry_day").value = day;	 
}


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
	return day;
}  


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

</script>
</body>
</html>