<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;  
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
.seLineTotal {
	width: 100%;
}
.seAddBtn {
	float: left;
	margin-left: 10px;
}
.lblIncludeGST {
	float: left;
	margin-top: 5px;
}
.includeGST {
	float: left;
	margin-left: 10px;
	margin-top: 5px;
}
.seLineCGST, .seLineSGST, .seLineIGST {
	float: right;
   margin-right: 5%;
}
#remove_0 {
	display: none;
}

</style>

<?php 
	/*$fpoName = $fpo_data->producer_organisation_name;
	$fpoName = strtoupper(substr($fpoName, 0, 3));
	if(isset($debtor_trans_last_record->trans_no)) {
		$lastTransNo = $debtor_trans_last_record->trans_no;
		$lastTransNo = $lastTransNo + 1;
		$lastTransNo = str_pad($lastTransNo, 4, "0", STR_PAD_LEFT);
		$voucherNo = "SL".$lastTransNo;
	}
	else {
		$lastTransNo = 1;
		$lastTransNo = str_pad($lastTransNo, 4, "0", STR_PAD_LEFT);
		$voucherNo = "SL".$lastTransNo;
	}*/
?>

	<body <?php  if($page_title == 'Sales Entry' ){echo 'class="open"';}else{}?>>
      <div class="container-fluid pl-0 pr-0">
         <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Sales</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#"><?php if($page_module == 'market') { echo 'Market'; } else if($page_module == 'finance') { echo 'Finance'; } ?></a> / <a href="#">Transaction </a></li>
                             <li><a href="<?php if($page_module == 'market') { echo base_url('fpo/market/salesentry'); } else if($page_module == 'finance') { echo base_url('fpo/finance/salesentry'); } ?>"class="active">Sales</a></li>
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
			    <form method="POST" action="<?php if($page_module == 'market') { echo base_url('fpo/market/postsales_entry'); } else if($page_module == 'finance') { echo base_url('fpo/finance/postsales_entry'); } ?>" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
 										    <div class="row">															
												<div class="form-group col-md-3">
													<label for="invoiceDate">Invoice Date <span class="text-danger">*</span></label>
													<input class="form-control" type="date" id="invoiceDate" min="<?php echo $formation_date;?>" name="invoiceDate" required="required" data-validation-required-message="Please select invoice date." value="<?php echo date("Y-m-d");?>">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-3">
													<label for="invoiceDay">Day</label>
													<input class="form-control" type="text" id="invoiceDay" name="invoiceDay" value="<?php echo date("l") ?>" readonly>
												</div>
												<div class="form-group col-md-3">
													<label for="invoiceNo">Invoice No. <span class="text-danger">*</span></label>
													<input type="text" class="form-control" maxlengh="15" readonly value="<?php echo $invoice_no; ?>"  id="invoiceNo" name="invoiceNo" placeholder="Invoice No." required="required" data-validation-required-message="Please enter invoice no.">
													<?php if($invoice_prefix =='no'){?>
														<a href="<?php echo base_url('fpo/setting/invoiceprefix');?>" class="text-success">Click here to add invoice prefix</a>
													<?php }?>
													<!--<div id="invoice_validate" class="help-block with-errors text-danger"></div>-->
												</div>	
												<div class="form-group col-md-3">
													<label for="voucherNo">Voucher No. <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="voucherNo" name="voucherNo" value="<?php echo $last_voucher_no; ?>" readonly placeholder="Voucher No." required="required" data-validation-required-message="Please enter voucher no.">
												</div>
											</div>	
											<div class="row">												
												<div class="form-group col-md-4">
													<label for="customerId">Customer <span class="text-danger">*</span></label>
													<select class="form-control" id="customerId" name="customerId" style="width:100%" required="required" data-validation-required-message="Please select customer.">
												      <option value="0">Select Customer</option>
														<?php 
															if(!empty($ledger_type)) {
															   for($i=0; $i<count($ledger_type);$i++) { 
																  ?>
																	 <option value="<?php echo $ledger_type[$i]->account_code; ?>"><?php echo $ledger_type[$i]->account_name; ?></option>
																  <?php 
															   }
															}   
														 ?>
													   <optgroup label="Customers" value="customers"></optgroup>	
															<?php for($i=0; $i<count($customer);$i++) { ?>
													   <option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
															 <?php } ?>
													   <option value="new_customer">Add New Customer</option>
													</select>
													<input type="hidden" name="sub_customer" id="sub_customer">
													<!--<input type="hidden" name="sub_customer1" id="sub_customer1">-->
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="supplyLocation">Supply Location <span class="text-danger">*</span></label>
													<select class="form-control" id="supplyLocation" name="supplyLocation" style="width:100%" required="required" data-validation-required-message="Please select supply location.">
														<option value="">Select Supply Location</option>
														<?php for($i=0; $i<count($supply_location);$i++) { ?>				
														  <option value="<?php echo $supply_location[$i]->id; ?>" <?php if($i == 0) { echo 'selected="selected"'; } ?> ><?php echo $supply_location[$i]->name; ?></option>
														<?php } ?>
													</select>
													<input type="hidden" name="sub_location" id="sub_location">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="deliveryTo">Delivery To <span class="text-danger">*</span></label>
													<select class="form-control" id="deliveryTo" name="deliveryTo" style="width:100%" required="required" data-validation-required-message="Please select deliver to.">
														<option value="">Select Delivery To</option>
													</select>
													<input type="hidden" name="sub_delivery" id="sub_delivery">
													<p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="table-responsive mt-3">  
												<table class="table table-bordered low-padded" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center" rowspan="2">Item Description</th>
															<th class="text-center" rowspan="2">Qty</th>
															<th class="text-center" rowspan="2">UOM</th>
															<th class="text-center" colspan="2">Each <br/>( Eg. Packs / Bottles )</th>
															<th class="text-center" rowspan="2">MRP <br />( <span class="fa fa-inr"></span> )</th>
															<th class="text-center" rowspan="2">Selling Unit Price <br />( <span class="fa fa-inr"></span> )</th>
															<th class="text-center" rowspan="2">Discount <br />( <span class="fa fa-inr"></span> )</th>
															<th class="text-center" rowspan="2">Total <br />( <span class="fa fa-inr"></span> )</th>
															<th class="text-center" rowspan="2"></th>
														</tr>
														<tr>
															<th class="text-center">Qty</th>
															<th class="text-center">UOM</th>
														</tr>
													</thead>
													<tbody>
														<tr id="row0">
															<td width="25%" class="text-center">
																<!--<input type="hidden" name="item_code[]" id="item_code0" readonly class="form-control numberOnly" />-->
																<select class="form-control" id="item_description0" name="item_description[]">
																	<option value="">Select Item Description</option>
																	<?php for($i=0; $i<count($product);$i++) { ?>	
																	<option value="<?php echo $product[$i]->id; ?>"><?php echo $product[$i]->product_name.' - '.$product[$i]->classification; ?></option>
																	<?php } ?>
																	<option value="new_item">Add New Item</option>
																</select>
																<p id="itemCount0" class="text-danger itemCount mt-2 mb-0 pb-0 pt-0"></p>
															</td>
															<td width="10%" class="text-center">
																<input type="text" name="qty[]" id="qty0" class="form-control text-right numberOnly" maxlength="6" required="required" />
															</td>
															<td width="10%" class="text-center">
																<select class="form-control" id="unit0" name="unit[]">
																	<option value="">Select UOM</option>
																	<?php for($i=0; $i<count($unit);$i++) { ?>				
																	<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
																	<?php } ?>
																</select>
															</td>                                
															<td width="10%" class="text-center">
																<input type="text" name="each_qty[]" id="each_qty0" class="form-control text-right numberOnly" maxlength="6" />
															</td>
															<td width="10%" class="text-center">
																<select class="form-control" id="each_unit0" name="each_unit[]">
																	<option value="">Select UOM</option>
																	<?php for($i=0; $i<count($unit);$i++) { ?>				
																	<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
																	<?php } ?>
																</select>
															</td>
															<td width="10%" class="text-center">
																<select class="form-control mrp" id="mrp0" name="mrp[]">
																	<option value="">Select MRP</option>
                                                 
																</select>
															</td>
															<td width="10%" class="text-center">
																<input type="text" name="price[]" id="price0" class="form-control text-right price numberOnly" maxlength="6" />
															</td>
															<td width="5%" class="text-center">
																<input type="text" name="line_discount[]" id="line_discount0" class="form-control text-right numberOnly" maxlength="6" />
															</td>
															<td width="15%" class="text-center">
																<div class="seLineTotal"><input type="text" name="line_total[]" id="line_total0" class="form-control text-right numberOnly" readonly /></div>
															</td>
															<td width="5%" class="text-center">
																<div class="seAddBtn">
																	<button type="button" id="add_0" class="btn btn-success btn_add">+</button>
																	<button type="button" id="remove_0" class="btn btn-danger btn_remove">-</button>
																</div>
															</td>
														</tr>
														<?php 
															if($fpo_data->gst_enable == 1) {
															?>
																<tr id="gst_row0">
																	<td colspan="10" class="text-right">
																		<div id="div_igst_0" class="seLineIGST">IGST @ <span id="percent_igst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_igst_0">0</span></div>
																		<div id="div_sgst_0" class="seLineSGST">UTGST/SGST @ <span id="percent_sgst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_sgst_0">0</span></div>
																		<div id="div_cgst_0" class="seLineCGST">CGST @ <span id="percent_cgst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_cgst_0">0</span></div>

																		<input type="hidden" name="line_percent_cgst[]" id="line_percent_cgst0" value="" />
																		<input type="hidden" name="line_percent_sgst[]" id="line_percent_sgst0" value="" />
																		<input type="hidden" name="line_percent_igst[]" id="line_percent_igst0" value="" />
																		
																		<input type="hidden" name="line_cgst[]" id="line_cgst0" value="" />
																		<input type="hidden" name="line_sgst[]" id="line_sgst0" value="" />
																		<input type="hidden" name="line_igst[]" id="line_igst0" value="" />
																	</td>
																</tr>
															<?php
															}
														?>	
													</tbody>
													<tbody>
													<tr>
														<?php 
															if($fpo_data->gst_enable == 1) {
															?>
																<td class="text-right"><span id="labelCGST">CGST ( <span class="fa fa-inr"></span> )</span></td>
																<td colspan="2" ><div id="divCGSTTotal"><input type="text" id="cgstTotal" name="cgstTotal" readonly class="form-control text-right"/></div></td>
																<td colspan="4" class="text-right">Sub Total ( <span class="fa fa-inr"></span> )</td>
																<td colspan="3"><input type="text" id="subTotal"  name="subTotal"  readonly class="form-control text-right" /></td>
															<?php
															} 
															else {
															?>	
																<td colspan="7" class="text-right">Sub Total ( <span class="fa fa-inr"></span> )</td>
																<td colspan="2"><input type="text" id="subTotal"  name="subTotal"  readonly class="form-control text-right" /></td>
															<?php
															}	
														?>	
													</tr>
													<tr>
														<?php 
															if($fpo_data->gst_enable == 1) {
															?>
																<td class="text-right"><span id="labelSGST">UTGST/SGST ( <span class="fa fa-inr"></span> )</span></td>
																<td colspan="2"><div id="divSGSTTotal"><input type="text" id="sgstTotal" name="sgstTotal" readonly class="form-control text-right" /></div></td>
																<td colspan="4" class="text-right">Delivery Charge ( <span class="fa fa-inr"></span> )</td>
																<td colspan="3">
																	<input type="text" id="shippingCharge"  name="shippingCharge" maxlength="6" class="form-control text-right numberOnly" placeholder="Delivery Charge"/>
																	<div class="lblIncludeGST"><label for="includeGst">GST Included</label></div>
																	<div class="includeGST"><input type="checkbox" id="includeGst" name="includeGst" value="1" checked="checked" class="text-center"></div>
																</td>
															<?php
															} 
															else {
															?>	
																<td colspan="7" class="text-right">Delivery Charge ( <span class="fa fa-inr"></span> )</td>
																<td colspan="2"><input type="text" id="shippingCharge"  maxlength="6" name="shippingCharge" class="form-control text-right numberOnly" placeholder="Delivery Charge" /></td>
															<?php
															}	
														?>	
													</tr>
													<tr>
														<?php 
															if($fpo_data->gst_enable == 1) {
															?>
																<td class="text-right"><span id="labelIGST">IGST ( <span class="fa fa-inr"></span> )</span></td>
																<td colspan="2"><div id="divIGSTTotal"><input type="text" id="igstTotal"  name="igstTotal" readonly class="form-control text-right" /></div></td>
																<td colspan="4" class="text-right">Discount ( <span class="fa fa-inr"></span> )</td>
																<td colspan="3" ><input type="text" id="discount" name="discount" maxlength="6"  class="form-control text-right numberOnly" placeholder="Discount"/></td>
															<?php
															} 
															else {
															?>	
																<td colspan="7" class="text-right">Discount ( <span class="fa fa-inr"></span> )</td>
																<td colspan="2" ><input type="text" id="discount" name="discount" maxlength="6"  class="form-control text-right numberOnly" placeholder="Discount" /></td>
															<?php
															}	
														?>
													</tr>
													<tr>
														<td colspan="7" class="text-right">Adjustment ( <span class="fa fa-inr"></span> )</td>
														<td colspan="3" ><input type="text" id="adjustment" name="adjustment"  maxlength="9" class="form-control text-right" placeholder="Adjustment" pattern="^\-?\d*(\.\d{0,2})?$" /></td>
													</tr>
													<tr class="total">
														<td colspan="7" class="text-right"> Total ( <span class="fa fa-inr"></span> )</td>
														<td colspan="3"><input type="text" id="grandTotal" name="grandTotal" readonly class="form-control text-right" /></td>
													</tr>
													</tbody>
												</table>  
											</div>
											<div class="row">
												<div class="form-group col-md-3"></div>	
												<div class="form-group col-md-6">
													<label for="memo">Memo</label>
													<textarea class="form-control" name="memo" id="memo" maxlength="150"></textarea>
												</div>
												<div class="form-group col-md-3"></div>		
											</div>
										    <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>							
												<a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>											 
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="gst_enable" value="<?php echo $fpo_data->gst_enable ?>" />
						<input type="hidden" name="gst_delivery_charge" id="gst_delivery_charge" value="0" />
                  <input type="hidden" id="gst_type" name="gst_type" value="0" />
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
   var temp_totalCount=[];
   var arrSupplyLocation = new Array();
	var arrDeliveryTo = new Array();
	var gstType = '';
	var gstEnable = <?php echo $fpo_data->gst_enable; ?>;
	var lastLineIndex = 0;
	
	<?php for($i=0; $i<count($supply_location);$i++) { ?>
		arrSupplyLocation[<?php echo $supply_location[$i]->id; ?>] = <?php echo $supply_location[$i]->state_id; ?>;
	<?php } ?>
	
$(document).ready(function(){
	document.getElementById("invoiceDate").focus();      
	$('#customerId').on('change', function(e){
		var ledgerId = $(this).val();
		if(ledgerId == 'Customers') {
		   $('#customerId').val('0');
		}
		
	});
  
  //$('#supplyLocation').select2();
  //$('#deliveryTo').select2();
  $('#customerId').select2();
  $('#item_description0').select2();

  $('#customerId').val('');
  $('#select2-customerId-container').html('Select Customer');

  $('#item_description0').val('');
  $('#select2-item_description0-container').html('Select Item Description');
  $('#inv-parent').removeClass('show open');
  $('#inv-parent .sub-menu').removeClass('show');
  
	$('#item_description0').on('change', function(e){
		var selectedItem = $(this).val();			
		var customerId = $('#customerId').val();
		var deliveryTo = $('#deliveryTo').val();
		if(deliveryTo != "" && customerId != ""){
			//updateItemCount(selectedItem, 'itemCount0', 'unit0', 0, 0);
			updateMRPByProduct(selectedItem, 'mrp0','price0');
		}
	});
	
	$('#qty0').focusout(function (e){
		var qtyValue = $(this).val();
		var itemCount = $('#itemCount0 strong span').html();
		itemCount = itemCount.split(' ');
		var selectedItem = $('#item_description0').val();
		temp_totalCount[selectedItem+'_qty'] = qtyValue;
		if(qtyValue > Number(itemCount[0])){
			swal('Sorry',"Given quantity should be less than or equal to the available 'Stock'!", 'warning');
			$(this).val('');
		}
	});
  
  $('#mrp0').on('change', function(e){
		var mrpValue = $(this).val();
		updateSellingPrice(mrpValue, 'price0');
	});
  
  $('#price0').focusout(function (e){
		var unitPrice = $(this).val();
		var mrpValue = $('#mrp0').find(":selected").text();
		var mrp = $('#mrp0').val();
		if(Number(mrpValue) > 0 && Number(unitPrice) > Number(mrpValue)){
			swal('Sorry',"Unit price should be less than or equal to the 'MRP'", 'warning');
			updateSellingPrice(mrp, 'price0');
		$(this).focus();
		}
	});         
});
	 
	$(document).ready(function() {
		$('#dynamic_field').on('change', 'input, select', function () {
         validateLocation(this);   
 		});
		
		$('#supplyLocation').on('change', function () {			
			document.getElementById("sub_location").value = $(this).val();
			if($('#customerId').val() == '4020501' || $('#customerId').val() == '4020502'){
				var selectedtext = ($(this).next().text());
				$("#deliveryTo").append($('<option></option>').val($(this).val()).html(selectedtext));
				document.getElementById("deliveryTo").value = $(this).val();
				document.getElementById("sub_delivery").value =$(this).val();
			}
		});
      
		$('#deliveryTo').on('change', function () {			
			document.getElementById("sub_delivery").value =$(this).val();			
		});
		
		$('#dynamic_field').on('keyup', 'input, select', function () {
         validateLocation(this);
         var item=$(this).parents('tr').find('select[name="item_description[]"]').val();
         if(item == ""){
				$(this).val('');
				swal('',"Please select item description");
			}
         if(item == "new_item") {
				window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
			}
		});
		
		$('#dynamic_field').on('click', 'input, select', function () {
			validateLocation(this);
		});
		
		function validateLocation(obj) {
         if($(obj).attr('name') == 'item_description[]' && $(obj).val() == 'new_item') {
           window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
         }
         else {
            var supplyLocation = $('#supplyLocation').val();
            var deliveryTo = $('#deliveryTo').val();
            var customerId = $('#customerId').val();
            
            if(customerId == "" || customerId == null || customerId == "new_customer") {
               $(obj).val('');
               if($(obj).attr('name') == 'item_description[]') {
                  var str = $(obj).attr('id');
                  var ind = str.replace('item_description','');
                  $('#select2-item_description'+ind+'-container').html('Select Item Description');
				  $('#customerId').focus();
               }
               swal('',"Please select customer");
            }
            else if(supplyLocation == "") {
               $(obj).val('');
               if($(obj).attr('name') == 'item_description[]') {
                  var str = $(obj).attr('id');
                  var ind = str.replace('item_description','');
                  $('#select2-item_description'+ind+'-container').html('Select Item Description');
               }
               swal('',"Please select supply location");
            }
            else if(deliveryTo == "" && (customerId != '4020501' || customerId != '4020502')) {
               $(obj).val('');
               if($(obj).attr('name') == 'item_description[]') {
                  var str = $(obj).attr('id');
                  var ind = str.replace('item_description','');
                  $('#select2-item_description'+ind+'-container').html('Select Item Description');
               }
               swal('',"Please select delivery to");
            } else if(deliveryTo == "" && customerId == ""){
				if($(obj).attr('name') == 'item_description[]') {
                  var str = $(obj).attr('id');
                  var ind = str.replace('item_description','');
                  $('#select2-item_description'+ind+'-container').html('Select Item Description');
               }
               swal('',"Please select customer");
			}
         }   
  		}
		var dtToday = new Date();    
		var month = dtToday.getMonth() + 1;
		var day = dtToday.getDate();
		var year = dtToday.getFullYear();
		if(month < 10)
			month = '0' + month.toString();
		if(day < 10)
			day = '0' + day.toString();		
		var maxDate = year + '-' + month + '-' + day;
		$('#invoiceDate').attr('max', maxDate);	
		
		function calculateGrandTotal(){
			var subTotal = 0;
			var grandTotal = 0;
			var theTbl = $('#dynamic_field');
			var trs = theTbl.find("input[name='line_total[]']");
			for(var i=0; i<trs.length; i++) {
				subTotal += parseFloat(trs[i].value || 0);
			}
			subTotal = subTotal.toFixed(2);
			$('#subTotal').val(subTotal);
			grandTotal += parseFloat(subTotal || 0);
			var shippingCharge = $('#shippingCharge').val();
			var gstShipping = 0;
			if(gstEnable == 1 && $('#includeGst').is(':checked')) {				
				gstShipping = parseFloat(shippingCharge || 0) * ( 5/100 );
				//shippingCharge = parseFloat(shippingCharge || 0) + parseFloat(gstShipping || 0);
				$('#gst_delivery_charge').val(gstShipping);
			}
			else {
				$('#gst_delivery_charge').val('0');
			}
			grandTotal = parseFloat(grandTotal || 0) + parseFloat(shippingCharge || 0);
			var discount = $('#discount').val();
			grandTotal -= parseFloat(discount || 0);
			var adjustment = $('#adjustment').val();
			if(adjustment != '-' && adjustment != '+' && adjustment != '.' && adjustment != '-.') {
				grandTotal = grandTotal + parseFloat(adjustment || 0);
			}
			
			var cgstTotal = 0;
			var sgstTotal = 0;
			var igstTotal = 0;
			if(gstType == 1) {
				gstShipping = parseFloat(gstShipping || 0) / 2;
				var trs = theTbl.find("input[name='line_cgst[]']");
				for(var i=0; i<trs.length; i++) {
					cgstTotal += parseFloat(trs[i].value || 0);
				}
				cgstTotal = cgstTotal.toFixed(2);
				cgstTotal = parseFloat(cgstTotal || 0) + parseFloat(gstShipping || 0);
				$('#cgstTotal').val(cgstTotal);
				grandTotal = grandTotal + parseFloat(cgstTotal || 0);
				var trs = theTbl.find("input[name='line_sgst[]']");
				for(var i=0; i<trs.length; i++) {
					sgstTotal += parseFloat(trs[i].value || 0);
				}
				sgstTotal = sgstTotal.toFixed(2);
				sgstTotal = parseFloat(sgstTotal || 0) + parseFloat(gstShipping || 0);
				$('#sgstTotal').val(sgstTotal);
				grandTotal = grandTotal + parseFloat(sgstTotal || 0);
			}
			else if(gstType == 2) {
				var trs = theTbl.find("input[name='line_igst[]']");
				for(var i=0; i<trs.length; i++) {
					igstTotal += parseFloat(trs[i].value || 0);
				}
				igstTotal = igstTotal.toFixed(2);
				igstTotal = parseFloat(igstTotal || 0) + parseFloat(gstShipping || 0);
				$('#igstTotal').val(igstTotal);
				grandTotal = grandTotal + parseFloat(igstTotal || 0);
			}
			grandTotal = grandTotal.toFixed(2);
			$('#grandTotal').val(grandTotal);
		}
		
		function getLineTaxCalculation(gstType, itemId, ind){
			$.ajax({
				url: "<?php echo base_url();?>fpo/inventory/getHsncode",
				type: "POST",
				data: {item_id: itemId},
				dataType: "html",
				cache: false,      
				success:function(response) {                
					response = response.trim();
					responseArray = $.parseJSON(response);
					if(responseArray.status == 1) {
						if(gstType == 1) {
							var tax_cgst = responseArray.items[0].tax_cgst; 
							var tax_sgst = responseArray.items[0].tax_sgst;
							$("#percent_cgst_"+ind).html(tax_cgst);
							$("#percent_sgst_"+ind).html(tax_sgst);
							$("#line_percent_cgst"+ind).val(tax_cgst);
							$("#line_percent_sgst"+ind).val(tax_sgst);
						}
						else if(gstType == 2) {
							var tax_igst = responseArray.items[0].tax_igst;
							$("#percent_igst_"+ind).html(tax_igst);
							$("#line_percent_igst"+ind).val(tax_igst);
						}
					} 
				},
			});  
		}
		
		$('#dynamic_field').on('keyup focusout', 'tr input[name="qty[]"], tr input[name="price[]"],tr input[name="mrp[]"], tr input[name="line_discount[]"]', function () {
			var qty = $(this).parents('tr').find('input[name="qty[]"]').val();
			var unit_price = $(this).parents('tr').find('input[name="price[]"]').val();
			var line_discount = $(this).parents('tr').find('input[name="line_discount[]"]').val(); 
			var line_total = parseFloat(qty || 0) * parseFloat(unit_price || 0) - parseFloat(line_discount || 0); 
			line_total = line_total.toFixed(2);
			$(this).parents('tr').find('input[name="line_total[]"]').val(line_total);			
			var strId = $(this).attr('id');
			var strName = $(this).attr('name');
			strName = strName.replace('[]', '');
			var ind = strId.replace(strName, '');
				
			if(gstType == 1) {
				var percent_cgst = $('#line_percent_cgst'+ind).val();
				var percent_sgst = $('#line_percent_sgst'+ind).val();
				var line_cgst = parseFloat(line_total || 0) * ( parseFloat(percent_cgst || 0)/100 );
				var line_sgst = parseFloat(line_total || 0) * ( parseFloat(percent_sgst || 0)/100 );
				line_cgst = line_cgst.toFixed(2);
				line_sgst = line_sgst.toFixed(2);
				$('#line_cgst'+ind).val(line_cgst);
				$('#line_sgst'+ind).val(line_sgst);
				$('#value_cgst_'+ind).html(line_cgst);
				$('#value_sgst_'+ind).html(line_sgst);
			}
			else if(gstType == 2) {
				var percent_igst = $('#line_percent_igst'+ind).val();
				var line_igst = parseFloat(line_total || 0) * ( parseFloat(percent_igst || 0)/100 );
				line_igst = line_igst.toFixed(2);
				$('#line_igst'+ind).val(line_igst);
				$('#value_igst_'+ind).html(line_igst);
			}	
			
			calculateGrandTotal();
		 });
		
		$('#dynamic_field').on('keyup', '#shippingCharge, #discount, #adjustment', function () {
			calculateGrandTotal();
		});
		
		$(document).on('click', '#includeGst', function(){ 
			calculateGrandTotal();
		});
		
		$('#dynamic_field').on('change', 'tr select[name="item_description[]"]', function () {
         if($(this).val() == "new_item") {
            window.location = "<?php echo base_url('fpo/masterdata/addproductfpo'); ?>";
         }   
         var str = $(this).attr('id');
         var ind = str.replace('item_description','');
         if($(this).val() != '') {
            var supply= $('#supplyLocation').val();
            var delivery= $('#deliveryTo').val();
            var customerId= $('#customerId').val();
            if(supply && delivery  !== ''){
               document.getElementById('supplyLocation').setAttribute("disabled", "true");
               document.getElementById('deliveryTo').setAttribute("disabled", "true");
               document.getElementById('customerId').setAttribute("disabled", "true");
            }            
            var supplyLocationId = $('#supplyLocation').val();
            var deliveryToBranchCode = $('#deliveryTo').val();
            var supplyLocationState = arrSupplyLocation[supplyLocationId];
            
            if(customerId == '4020501' || customerId == '4020502')
               var deliveryToState = deliveryToBranchCode;	
            else
               var deliveryToState = arrDeliveryTo[deliveryToBranchCode];
            if(supplyLocationState == deliveryToState){
               $('#gst_type').val('1');
            }
            else {
               $('#gst_type').val('2');
            }
            
            if(gstEnable == 1) {
               var itemId = $(this).val();
               if(supplyLocationState == deliveryToState){
                  gstType = 1;
                  getLineTaxCalculation(gstType, itemId, ind);
                  $('#div_igst_'+ind).hide();
                  $('#div_cgst_'+ind).show();
                  $('#div_sgst_'+ind).show();
                  
                  $('#labelCGST').show();
                  $('#divCGSTTotal').show();
                  $('#labelSGST').show();
                  $('#divSGSTTotal').show();
                  $('#labelIGST').hide();
                  $('#divIGSTTotal').hide();
               }
               else {
                  gstType = 2;
                  getLineTaxCalculation(gstType, itemId, ind);
                  $('#div_igst_'+ind).show();
                  $('#div_cgst_'+ind).hide();
                  $('#div_sgst_'+ind).hide();
                  
                  $('#labelIGST').show();
                  $('#divIGSTTotal').show();
                  $('#labelCGST').hide();
                  $('#divCGSTTotal').hide();
                  $('#labelSGST').hide();
                  $('#divSGSTTotal').hide();
               }
            }	
         }
         else {
            $(this).parents('tr').find('input[type=text], select').each(function(){
               $(this).val('');
            });
            if(gstEnable == 1) {
               $('#gst_row'+ind).find('input[type=hidden]').each(function(){
                  $(this).val('');
               });
               $('#gst_row'+ind).find("span[class!='fa fa-inr']").each(function(){
                  $(this).html('0');
               });
            }	
            calculateGrandTotal();
         }
		});
			
		var i=0;  
		var j=0;
		
		$(document).on('click', '.btn_add', function(){ 
			var item_description = $('#item_description'+i).val();
			var qty_Value = $('#qty'+i).val();
			var uom_Value = $('#unit'+i).val();
			updateItemCount(item_description, 'itemCount'+i, 'unit'+i, qty_Value, uom_Value);
		
			var validate = true;
			$(this).parents('tr').find('input[type=text], select').each(function(){
				if($(this).attr('name') == "each_qty[]" || $(this).attr('name') == "each_unit[]" || $(this).attr('name') == "line_discount[]" || $(this).attr('name') == "mrp[]"){
				}
				else {
					if($(this).val() == ""){
						validate = false;
					}
				}	
			});
			if(validate){
				if(document.getElementById('item_description'+i+'')) {
					document.getElementById('item_description'+i+'').setAttribute("readonly", "true");
					document.getElementById('qty'+i+'').setAttribute("readonly", "true");
					document.getElementById('each_qty'+i+'').setAttribute("readonly", "true");
					document.getElementById('line_discount'+i+'').setAttribute("readonly", "true");
					document.getElementById('line_total'+i+'').setAttribute("readonly", "true");
					document.getElementById('unit'+i+'').setAttribute("readonly", "true");
					document.getElementById('each_unit'+i+'').setAttribute("readonly", "true");
					document.getElementById('price'+i+'').setAttribute("readonly", "true");
					document.getElementById('mrp'+i+'').setAttribute("readonly", "true");               
				}
				j=i;	
				i++;
				lastLineIndex = i;
				
				var str_add = '<tr id="row'+i+'" class="dynamic-added">';
				str_add += '	<td width="25%" class="text-center">';
				//str_add += '		<input type="hidden" id="item_code'+i+'" name="item_code[]" class="form-control numberOnly" readonly />';
				str_add += '		<select class="form-control" id="item_description'+i+'" name="item_description[]">';
				str_add += '			<option value="">Select Item Description</option>';
				str_add += '		</select><p id="itemCount'+i+'" class="text-danger itemCount mt-2 mb-0 pb-0 pt-0"></p>';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<input type="text" id="qty'+i+'" name="qty[]" class="form-control text-right numberOnly" maxlengh="6" required="required"/>';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<select class="form-control" id="unit'+i+'" name="unit[]">';
				str_add += '			<option value="">Select UOM</option>';
				str_add += '		</select>';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<input type="text" id="each_qty'+i+'" name="each_qty[]" class="form-control text-right numberOnly" maxlengh="6" />';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<select class="form-control" id="each_unit'+i+'" name="each_unit[]">';
				str_add += '			<option value="">Select UOM</option>';                        
				str_add += '		</select>';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<select class="form-control mrp" id="mrp'+i+'" name="mrp[]">';
				str_add += '			<option value="">Select MRP</option>';
				str_add += '		</select>';
				str_add += '	</td>';
				str_add += '	<td width="10%" class="text-center">';
				str_add += '		<input type="text" id="price'+i+'" name="price[]" class="form-control  price text-right numberOnly" maxlength="6" />';
				str_add += '	</td>';
				str_add += '	<td width="5%" class="text-center">';
				str_add += '		<input type="text" id="line_discount'+i+'" name="line_discount[]" maxlength="6" class="form-control text-right numberOnly" />';
				str_add += '	</td>';
				str_add += '	<td width="15%" class="text-center">';
				str_add += '		<div class="seLineTotal"><input type="text" id="line_total'+i+'" name="line_total[]" class="form-control text-right numberOnly" readonly /></div>';
				str_add += '	</td>';
				str_add += '	<td width="5%" class="text-center">';
				str_add += '		<div class="seAddBtn"><button type="button" id="add_'+i+'" class="btn btn-success btn_add">+</button><button type="button" id="remove_'+i+'" style="display:none" class="btn btn-danger btn_remove">-</button></div>';
				str_add += '	</td>';
				str_add += '</tr>';
				if(gstEnable == 1) {
					str_add += '<tr id="gst_row'+i+'">';
					str_add += '	<td colspan="9" class="text-right">';
					
					if(gstType == 2) {
						str_add += '		<div id="div_igst_'+i+'" class="seLineIGST">IGST @ <span id="percent_igst_'+i+'">0</span> %: <span class="fa fa-inr"></span> <span id="value_igst_'+i+'">0</span></div>';
					}
					if(gstType == 1) {
						str_add += '		<div id="div_sgst_'+i+'" class="seLineSGST">UTGST/SGST @ <span id="percent_sgst_'+i+'">0</span> %: <span class="fa fa-inr"></span> <span id="value_sgst_'+i+'">0</span></div>';
						str_add += '		<div id="div_cgst_'+i+'" class="seLineCGST">CGST @ <span id="percent_cgst_'+i+'">0</span> %: <span class="fa fa-inr"></span> <span id="value_cgst_'+i+'">0</span></div>';
					}
					str_add += '		<input type="hidden" name="line_percent_cgst[]" id="line_percent_cgst'+i+'" value="" />';
					str_add += '		<input type="hidden" name="line_percent_sgst[]" id="line_percent_sgst'+i+'" value="" />';
					str_add += '		<input type="hidden" name="line_percent_igst[]" id="line_percent_igst'+i+'" value="" />';
					str_add += '		<input type="hidden" name="line_cgst[]" id="line_cgst'+i+'" value="" />';
					str_add += '		<input type="hidden" name="line_sgst[]" id="line_sgst'+i+'" value="" />';
					str_add += '		<input type="hidden" name="line_igst[]" id="line_igst'+i+'" value="" />';
					str_add += '	</td>';
					str_add += '</tr>';
				}	
				if(gstEnable == 1) {
					$('#dynamic_field').find('tbody tr[id="gst_row'+j+'"]').after(str_add);
				}
				else {
					$('#dynamic_field').find('tbody tr[id="row'+j+'"]').after(str_add);
				}		

				$('#add_'+j).hide();
				$('#remove_'+j).show();				
				initnumberOnly();
				
				$("#item_description"+i+" option").remove() ;		
				$.ajax({
					url: '<?php echo base_url('fpo/market/getproducts'); ?>',
					type: "GET",
					success:function(response) {
						responsearr=$.parseJSON(response);
						var div_data = '<option value="">Select Item Description</option>';	
						$.each(responsearr, function(key, value) {					
							div_data +="<option value="+value.id+">"+value.product_name+" - "+value.classification+"</option>";
						});
						div_data +="<option value='new_item'>Add New Item</option>";
 						$(div_data).appendTo('#item_description'+i+''); 	      
					}
				});
				
				$("#unit"+i+" option").remove();
				$("#each_unit"+i+" option").remove();
           
				$.ajax({
					url: '<?php echo base_url('fpo/inventory/getquantityunit'); ?>',
					type: "GET",
					success:function(response) {
						responsearr=$.parseJSON(response);
						var div_unit = '<option value="">Select UOM</option>';	
						$.each(responsearr, function(key, value) {					
							div_unit +="<option value="+value.id+">"+value.short_name+"</option>";
						});
						$(div_unit).appendTo('#unit'+i+''); 
						$(div_unit).appendTo('#each_unit'+i+''); 	
					}
				});
           
         
				//$("#mrp"+i+" option").remove();               
				$("#item_description"+i).select2();
				$('#item_description'+i).on('change', function(e){
					var selectedItem = $(this).val();
					var qtyIndex = (i-1);
					var qty_Value = $('#qty'+qtyIndex).val();
					var uom_Value = $('#unit'+qtyIndex).val();
					//var uom_Value = $('#mrp'+qtyIndex).val();
					var price_Value = $('#price'+qtyIndex).val();
					//updateItemCount(selectedItem, 'itemCount'+i, 'unit'+i, qty_Value, uom_Value);
					updateMRPByProduct(selectedItem, 'mrp'+i, 'price'+i, price_Value);
				});
		
				$('#qty'+i).focusout(function (e){
					var qtyValue = $(this).val();
					var itemCount = $('#itemCount'+i+' strong span').html();
					itemCount = itemCount.split(' ');
					var selectedItem = $('#item_description'+i).val();
					temp_totalCount[selectedItem+'_qty'] = qtyValue;
					if(qtyValue > Number(itemCount)){
						swal('Sorry',"Given quantity should be less than or equal to the available 'Stock'!", 'warning');
						$(this).val('');
					}
				});
				
            $('#mrp'+i).on('change', function(e){
               var mrpValue = $(this).val();
               updateSellingPrice(mrpValue, 'price'+i);
               $('#price'+i).focus();
            });
            
            $('#price'+i).focusout(function (e){
               var unitPrice = $(this).val();
               var mrpValue = $('#mrp'+i).find(":selected").text();
               var mrp = $('#mrp'+i).val();
               if(Number(mrpValue) > 0 && Number(unitPrice) > Number(mrpValue)){
                  swal('Sorry',"Unit price should be less than or equal to the 'MRP'", 'warning');
                  updateSellingPrice(mrp, 'price'+i);
                  $(this).focus();
               }
            });
				return true;// you can submit form or send ajax or whatever you want here
			} else {
				swal('',"Provide all the data");
				return false;
			}																																																											
		});
			
			
		$(document).on('click', '.btn_remove', function(){ 
  			$(this).parents('tr').find('input[name="line_total[]"]').val(0); 
			var arr = $(this).attr("id").split("_");
			
			/* Increase item count while delete the added item */
			var item_description = $('#item_description'+arr[1]).val();
			var qty_Value = $('#qty'+arr[1]).val();
			var uom_Value = $('#unit'+arr[1]).val();
			if(temp_totalCount[item_description]){
				temp_totalCount[item_description] = (Number(temp_totalCount[item_description])+Number(qty_Value));
			}  
			
			$('#row'+arr[1]+'').remove();
			if(gstEnable == 1) {
				$('#gst_row'+arr[1]+'').remove(); 
			}
			calculateGrandTotal();
		});  
		
		
		$(document).on('click', '#sendMessageButton', function() {
 			var itemRows = $('#dynamic_field').find('select[name="item_description[]"]').length;   
			var formValidate = true;
			if($('#invoiceNo').val() == '' || $('#customerId').val() == '' || $('#supplyLocation').val() == '' || $('#deliveryTo').val() == '') {
				formValidate = false;
			}
			else if(lastLineIndex == 0) {
				if($('#item_description'+lastLineIndex).val() == '' || $('#qty'+lastLineIndex).val() == '' || $('#unit'+lastLineIndex).val() == '' || $('#price'+lastLineIndex).val() == '') {
					formValidate = false;
				}
			}
			else if(lastLineIndex >0) {
            if(itemRows >1) { 
               if($('#item_description'+lastLineIndex).val() == '' && $('#qty'+lastLineIndex).val() == '' && $('#unit'+lastLineIndex).val() == '' && $('#price'+lastLineIndex).val() == '') {
               }
               else {
                  if($('#item_description'+lastLineIndex).val() == '' || $('#qty'+lastLineIndex).val() == '' || $('#unit'+lastLineIndex).val() == '' || $('#price'+lastLineIndex).val() == '') {
                     formValidate = false;
                  }
               }
            }
            else {
               if($('#item_description'+lastLineIndex).val() == '' || $('#qty'+lastLineIndex).val() == '' || $('#unit'+lastLineIndex).val() == '' || $('#price'+lastLineIndex).val() == '') {
                  formValidate = false;
               }
            }
 			}
			if(!formValidate) {
				swal('',"Provide all the data");
				return false;
			}
  		});
		
		
		$('#customerId').change(function(){
			var debtor_no = $("#customerId").val();
			if(debtor_no == 'new_customer') {
				window.location = "<?php echo base_url('fpo/market/customers'); ?>";
			}
			document.getElementById("sub_customer").value = debtor_no;
			if(debtor_no != '4020501' && debtor_no != '4020502' ){
				getcustomerDetail(debtor_no);
			}else{
				getlocationDetail(debtor_no);  
			}
		});
		 
		 
		function getcustomerDetail( debtor_no ){         
		   $("#deliveryTo option").remove();
				if( debtor_no !='')
				{   
					$.ajax({
						url:"<?php echo base_url();?>fpo/market/branchdetail/"+debtor_no,
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response) {
							response=response.trim();                
							responseArray=$.parseJSON(response);                     
							if(responseArray.status == 1){
								$("#deliveryTo").append($('<option></option>').val('').html('Select Delivery To'));  
								$.each(responseArray.branch_list,function(key,value){
                           if(key == 0) {
                              $("#deliveryTo").append($('<option selected="selected"></option>').val(value.branch_code).html(value.mailing_pincode+','+value.state_name+','+value.district_name+'-'+value.br_name));
                           }
                           else{
                              $("#deliveryTo").append($('<option></option>').val(value.branch_code).html(value.mailing_pincode+','+value.state_name+','+value.district_name+'-'+value.br_name));
                           }
									arrDeliveryTo[value.branch_code] = value.physical_state;
								});
							}
						},
						error:function(response){
							alert('Error!!! Try again');
						} 			
					 });
				} 
				else {
					alert('Please provide mandatory field');
				}
		}
      
      
      //dropdown for cash to delievery location
     function getlocationDetail( debtor_no ) { 
		   $("#deliveryTo option").remove();
				if( debtor_no !='')
				{   
					$.ajax({
						url:"<?php echo base_url();?>fpo/market/locationdetail/"+debtor_no,
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response) {
							response=response.trim();                
							responseArray=$.parseJSON(response);
							this_fpo = responseArray.fpo_location;
							if(responseArray.status == 1){
								//$("#deliveryTo").append($('<option></option>').val('').html('Select Delivery To'));  
								$.each(responseArray.location_list,function(key,value){
								if(value.state_id == this_fpo.state_id)
								$("#deliveryTo").append($('<option value="'+value.state_id+'" selected="selected"></option>').html(value.state_name));  
                           else
                              $("#deliveryTo").append($('<option value="'+value.state_id+'"></option>').html(value.state_name));  
                        
                        });
							}
						},
						error:function(response){
							alert('Error!!! Try again');
						} 			
					 });
				} 
				else {
					alert('Please provide mandatory field');
				}
		} 
      
		
		
		$('input[id="invoiceDate"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			var invoice_day = updateSalesDay(dateval);   
			
			if(invoice_day !==''){
				document.getElementById("invoiceDay").value = invoice_day;
			}
		});
		
		function updateSalesDay(dateval) {
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
		
		$(document).on('keydown', '#adjustment', function(e){
		  var input = $(this);
		  var oldVal = input.val();
		  var regex = new RegExp(input.attr('pattern'), 'g');

		  setTimeout(function(){
			var newVal = input.val();
			if(!regex.test(newVal)){
			  input.val(oldVal); 
			}
		  }, 0);
		});

	});

	
function updateItemCount(selectedItem, itemCount, UOM_Value, qty_value, uom_id){
	if(selectedItem != ''){
		$.ajax({
		  url:"<?php echo base_url();?>fpo/finance/getProductCountByID/"+selectedItem,
		  type:"GET",
		  data:'',
		  dataType:"html",        
			cache:false,			
			success:function(response) {
				console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response); 
				if(responseArray.productCount.qty != null){
					if(temp_totalCount[selectedItem]){// && temp_totalCount[selectedItem+'_qty']){
						//temp_totalCount[selectedItem] = (Number(temp_totalCount[selectedItem])-Number(temp_totalCount[selectedItem+'_qty']));
						temp_totalCount[selectedItem] = (Number(temp_totalCount[selectedItem])-Number(qty_value));
						//temp_totalCount[selectedItem+'_qty'] = Number(qty_value);
					} else {
						temp_totalCount[selectedItem] = (Number(responseArray.productCount.qty)-Number(qty_value));
						//temp_totalCount[selectedItem+'_qty'] = Number(qty_value);
					}    
					
					$('#'+itemCount).html('<strong> Stock: <span>'+temp_totalCount[selectedItem]+' '+responseArray.productCount.uom_name+'</span></strong>');
					if(responseArray.productCount.uom != 0){
						$('#'+UOM_Value).val(responseArray.productCount.uom);
					} else {
						$('#'+UOM_Value).val('');
					}
				} else {
					if(temp_totalCount[selectedItem] != undefined){
						temp_totalCount[selectedItem] = (Number(temp_totalCount[selectedItem])-Number(qty_value));
					} else if(temp_totalCount[selectedItem] == undefined){
						temp_totalCount[selectedItem] = 0;
					}   
					$('#'+itemCount).html('<strong> Stock: <span>'+temp_totalCount[selectedItem]+'</span></strong>');
				}   			
			},
			error:function(response){
				//alert('Error!!! Try again');
			} 			
		});
	} else {
		$('#'+itemCount).html('');
	}
}	


//selling price mar 28
function updateSellingPrice(selectedItem, sellingPrice){
   $.ajax({
         url:"<?php echo base_url(); ?>fpo/inventory/getsellingPrice/"+selectedItem,
         type:"GET",
         data:'',
         dataType:"html",        
         cache:false,			
         success:function(response){
         //console.log(response);
         responsearr=$.parseJSON(response);
            //console.log(responsearr.result);
            if(responsearr.selling_price > 0)
               $('#'+sellingPrice).val(responsearr.selling_price);
            else
               $('#'+sellingPrice).val('');
         }
      });            
}


function updateMRPByProduct(productId, mrpId, price_Value){
	if(productId != ''){
		$.ajax({
		url: '<?php echo base_url();?>fpo/inventory/getmrp/'+productId,
		type: "GET",
		success:function(response) {
			responsearr=$.parseJSON(response);
			//console.log(responsearr);
			var div_unit = '<option value="">Select MRP</option>';
			$('#'+price_Value).val('');
			if(responsearr.length == 1){            
				if(responsearr[0].mrp == 0){
					div_unit +="<option value="+responsearr[0].po_detail_item+" selected>NA</option>";
					updateSellingPrice(responsearr[0].po_detail_item, 'price0');
				}else{        
					div_unit +="<option value="+responsearr[0].po_detail_item+" selected>"+responsearr[0].mrp+"</option>";
					$('#'+price_Value).val(responsearr[0].mrp);
				}            
            }else{      
                $.each(responsearr, function(key,value){          
                    if(value.mrp == 0){
						div_unit +="<option value="+value.po_detail_item+">NA</option>";
                    } else{        
                        div_unit +="<option value="+value.po_detail_item+">"+value.mrp+"</option>";                      
                     }
                });
            }
			$('#'+mrpId).html(div_unit);  
		}
		});
	}
}

</script>
</body>
</html>