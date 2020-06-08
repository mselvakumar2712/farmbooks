<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
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
                        <h1>Purchase Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active">Purchase Entry</a></li>
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
               <form   method="post" id="figform" name="sentMessage" novalidate="novalidate" >
               <!--<form  action="<?php echo base_url('fpo/inventory/post_directinvoice')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" > -->            
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                                            
										  <div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Entry Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  value="<?php echo date('Y-m-d'); ?>"  id="entry_date" name="entry_date" required="required"  data-validation-required-message="Please select invoice date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
												   <label for="inputAddress2">Day </label>
												   <input class="form-control" type="text" id="entry_day" name="entry_day" readonly>
											    </div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"   value="<?php echo date('Y-m-d'); ?>" id="invoice_date" name="invoice_date" required="required"  data-validation-required-message="Please select invoice date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
												   <label for="inputAddress2">Day </label>
												   <input class="form-control" type="text" id="invoice_day" name="invoice_day" readonly>
											    </div>
											</div>
											 <div class="row ">
												<div class="form-group col-md-3">
												    <label for="inputAddress2">Invoice No.<span class="text-danger">*</span></label>
												    <input type="text" class="form-control" maxlength="15" id="invoice_no" name="invoice_no" placeholder="Invoice No" required="required" data-validation-required-message="Please enter invoice no.">
													<p class="help-block text-danger"></p>
											    </div>
												<div class="form-group col-md-3">
												    <label for="inputAddress2">Voucher No.<span class="text-danger">*</span></label>
												    <input type="text" class="form-control" maxlength="15" id="voucher_no" name="voucher_no" readonly placeholder="Voucher No" required="required" data-validation-required-message="Please enter voucher no.">
													<p class="help-block text-danger"></p>
											    </div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Voucher Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"   value="<?php echo date('Y-m-d'); ?>" id="voucher_date" name="voucher_date" required="required"  data-validation-required-message="Please select voucher date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
												   <label for="inputAddress2">Day </label>
												   <input class="form-control" type="text" id="voucher_day" name="voucher_day" readonly>
											    </div>								
											</div>
											<div class="row ">																																			
												<div class="form-group col-md-3">
													<label for="inputAddress2">Supplier <span class="text-danger">*</span></label>
													<select  class="form-control" id="supplier" name="supplier" required="required"  data-validation-required-message="Please select supplier.">
														<option value="">Select Supplier </option>
														<?php for($i=0; $i<count($supplier);$i++) { ?>										
														<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
														<?php } ?>	
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-3">
													<label for="inputAddress2">Deliver At <span class="text-danger">*</span></label>
													<select  class="form-control" id="delivery_to"   name="delivery_to" required="required" data-validation-required-message="Please select delivery at.">
														<option value="">Select Deliver At </option>
														<?php for($i=0; $i<count($location);$i++) { ?>										
														<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
														<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<!--	<div class="form-group col-md-3">
													<label for="inputAddress2">Receive Into</label>
													<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
														<option value="">Select Receive Into </option>
														<option value="1" selected>Default</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference <span class="text-danger">*</span></label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" required="required"  data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>	-->	
											</div>
											<div class="table-responsive">  
												<table class="table table-bordered low-padded" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Item Description
															</th>
															<th class="text-center">
																Qty Received
															</th>
															<th class="text-center">
															    Qty Invoiced
															</th>
															<th class="text-center">
															   Uom
															</th>
															<th class="text-center">
																Each Qty
															</th>
															<th class="text-center">
																Each Uom
															</th>
															<th class="text-center">
																Unit Price
															</th>
															<th class="text-center">
															   Line Total
															</th>
															<th class="text-center">															  
															</th>															
														</tr>
													</thead>
													<tbody>
													<tr>  
														<!--<td width="12%"><input type="text" id="item_code0" name="item_code[]"  class="form-control  name_list numberOnly" required="required" readonly /></td> --> 
														<td width="24%"><select  class="form-control" id="item_description0"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Description </option>
															<?php for($i=0; $i<count($product_fpo);$i++) { ?>										
															<option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name; ?></option>
															<?php } ?>
															<option value="new_item">New Item</option>															
														</select>
														<p class="help-block text-danger"></p></td>  
														<td width="11%"><input type="text" id="qty0" name="qty[]"  maxlength="6" class="form-control name_list numberOnly text-right" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="11%"><input type="text" id="received0"  name="received[]"  maxlength="6" class="form-control name_list textOnly text-right" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="12%"><select  class="form-control " id="unit0"  name="unit[]" required="required" data-validation-required-message="Please select unit.">
															<option value="">Unit </option>
															<?php for($i=0; $i<count($unit);$i++) { ?>										
															<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->full_name; ?></option>
															<?php } ?>	
														</select><p class="help-block text-danger"></p></td>
														<td width="11%"><input type="text" id="package_qty0" name="package_qty[]"  maxlength="6" class="form-control name_list numberOnly text-right" required="required" /><p class="help-block text-danger"></p></td>  														
														<td width="12%"><select  class="form-control " id="package_unit0"  name="package_unit[]" required="required" data-validation-required-message="Please select unit.">
															<option value="">Unit </option>
															<?php for($i=0; $i<count($unit);$i++) { ?>										
															<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->full_name; ?></option>
															<?php } ?>	
														</select><p class="help-block text-danger"></p></td> 
														<td width="13%"><input type="text" id="price0" name="price[]" maxlength="6" class="form-control name_list numberOnly text-right" required="" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text" id="line_total0"  name="line_total[]" class="form-control name_list numberOnly text-right" readonly /><!--<span align="left">Cgst @</span><br><span>Utgst/Sgst @</span>--></td>  
														<td width="1%"><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  														
													</tr>
													</tbody>
													<tbody>
													<tr>
														<td colspan="6" class="text-right"> Sub Total</td>
														<td colspan="2"><input type="text" id="sub_total"  name="sub_total"  readonly class="form-control text-right" value="0.00" /></td>
														<td ></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right">Shipping or Delivery Charge</td>
														<td colspan="2" ><input type="text" id="shipping_charge"  name="shipping_charge"   class="form-control numberOnly text-right" placeholder="Shipping or Delivery Charge" /></td>
														<td align="center"><label for="include_gst">GST Included</label><input type="checkbox" id="include_gst" name="include_gst" value="1" class="text-center"></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> IGST (%)</td>
														<td colspan="2" ><input type="text" id="gst"  name="gst"  maxlength="2"  readonly class="form-control text-right"  placeholder="IGST" /></td>
														<td ></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> CGST (%)</td>
														<td colspan="2" ><input type="text" id="cgst"  maxlength="2" name="cgst"  readonly class="form-control text-right"  placeholder="CGST" /></td>
														<td ></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> SGST / UPSGST (%)</td>
														<td colspan="2" ><input type="text" id="sgst"  name="sgst" maxlength="2" readonly class="form-control text-right"  placeholder="SGST/UPSGST" /></td>
														<td ></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> Discount (%)</td>
														<td colspan="2" ><input type="text" id="discount"  name="discount" maxlength="2"  class="form-control text-right"  placeholder="Discount" /></td>
														<td ></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> Adjusment</td>
														<td colspan="2" ><input type="text" id="adjusment"  name="adjusment"  maxlength="6"  class="form-control text-right"  placeholder="Adjusment" /></td>
														<td ></td>
													</tr>
													<tr class="total">
														<td colspan="6" class="text-right"> Total</td>
														<td colspan="2"><input type="text" id="amount_total" name="amount_total" readonly class="form-control text-right" value="0.00" /></td>
														<td ></td>
													</tr>
													</tbody>
												</table>  
											</div>
											<div class="row ">
												<div class="form-group col-md-3">
												</div>	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control " name="memo" id="memo"></textarea>
												</div>
												<div class="form-group col-md-3">
												</div>		
											</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit" disabled>
												<a href="<?php echo base_url('fpo/inventory/directinvoice');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>
											 
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
    <script type="text/javascript">
	$('#dynamic_field').on('keyup','input', function(){
            var qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
            var unit = +$(this).parents('tr').find('input[name="price[]"]').val();
			var received = +$(this).parents('tr').find('input[name="received[]"]').val();
			if(received > qty){
				swal('',"Received Quantity sholud not be greater than entered quantity");
				$(this).parents('tr').find('input[name="received[]"]').val('');
				$(this).parents('tr').find('input[name="received[]"]').focus();
			}
			
            $(this).parents('tr').find('input[name="line_total[]"]').val(qty*unit);
            var totamt = 0 ;
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            console.log("table length : "+trs.length);
            for(var i=0;i<trs.length;i++)
            {
                console.log("amount from row "+i+" = "+trs[i].value);
				totamt+=parseFloat(trs[i].value);
				if(totamt){
				document.getElementById('sub_total').value=totamt;
				document.getElementById('amount_total').value=totamt;
				}else{
				}
				//document.getElementById('sub_total').value=totamt;
               // document.getElementById('amount_total').value=totamt;
				document.getElementById("sendMessageButton").disabled =false;
            }
    });
	$('#due_date').on('change', function () {
    var selectedDate = $(this).val();
	var invoice_date = document.getElementById('invoice_date').value;
    if (selectedDate < invoice_date) {
        alert("The Date must be Bigger or Equal to invoice date")
        return false;
    }
    return true;
	});
	$('#dynamic_field').on('change', 'select[id="item_description0"]', function () {
		var row = $(this).val();
		if(row =="new_item"){
		window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
		}else{
		document.getElementById('item_code0').value=row;
		}
	});

	$('#invoice_date').on('change', function () {
		var dep_dt = $(this).val();
    $('#eff_input').val(dep_dt);
    var eff_dt = new Date(dep_dt);
    // dt_cl is being set to a string here:
    var dt_cl = (eff_dt.getMonth()) + '-' + eff_dt.getDate() + '-' +  eff_dt.getFullYear();
    
    // So, you need to take that string and make a new Date from it and then
    // you can call .getDate() on that new date.
    var exp_dt = new Date().setDate(new Date(dt_cl).getDate() + 15);console.log(new Date(exp_dt));
	//document.getElementById('due_date').value=new Date(exp_dt);
    // The result can be seen by making yet another date using the previous one

		
	});
	$(document).ready(function() {
		var i=0;
		$('#sendMessageButton').click(function(){  
		
		var validate = true;
		$('#dynamic_field').find('tr input[id=item_description'+i+'],tr input[id=qty'+i+'],tr input[id=received'+i+'],tr input[id=package_qty'+i+'],tr select[id=package_unit'+i+'],tr input[id=price'+i+'],tr select[id=unit'+i+']').each(function(){
			
		if($(this).val() == ""){
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
		$('#dynamic_field').find('tr input[id=item_description'+i+'],tr input[id=qty'+i+'],tr input[id=received'+i+'],tr input[id=package_qty'+i+'],tr select[id=package_unit'+i+']tr input[id=price'+i+'],tr select[id=unit'+i+'],tr input[id=line_total'+i+']').each(function(){
			
		if($(this).val() == ""){
				validate = false;
			}
		});
		
		if(validate){
		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');
			
			$('select[id="item_description'+i+'"]', row).each(function() {
				if($(this).val()=='new_item'){
					window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
				}else{
				document.getElementById('item_code'+i+'').value= $(this).val();
				}
			});
		});
		document.getElementById('item_description'+i+'').setAttribute("readonly", "true");
		document.getElementById('qty'+i+'').setAttribute("readonly", "true");
		document.getElementById('received'+i+'').setAttribute("readonly", "true");
		document.getElementById('line_total'+i+'').setAttribute("readonly", "true");
		document.getElementById('unit'+i+'').setAttribute("readonly", "true");
		document.getElementById('price'+i+'').setAttribute("readonly", "true"); 
         i++;
        $('#dynamic_field').find('tbody tr:first').before('<tr id="row'+i+'" class="dynamic-added"><td><select  class="form-control" id="item_description'+i+'"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text" name="qty[]"  id="qty'+i+'" maxlength="6" class="form-control numberOnly name_list text-right" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text"  name="received[]" id="received'+i+'"  maxlength="6" class="form-control name_list numberOnly text-right" required="required" /><p class="help-block text-danger"></p></td>  <td><select  class="form-control" id="unit'+i+'"  name="unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Unit </option></select><p class="help-block text-danger"></p></td><td><input type="text" id="package_qty'+i+'" name="package_qty[]"  maxlength="6" class="form-control name_list numberOnly text-right" required="required" /></td><td><select  class="form-control" id="package_unit'+i+'"  name="package_unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Unit </option></select><p class="help-block text-danger"></p></td></td> <td><input type="text" name="price[]"  id="price'+i+'" maxlength="6"  class="form-control name_list numberOnly text-right" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="line_total[]" id="line_total'+i+'"class="form-control name_list text-right" readonly required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		initnumberOnly();
		$("#item_description"+i+" option").remove() ;		
		$.ajax({
			url: '<?php echo base_url('fpo/inventory/getproducts')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Description</option>';	
				$.each(responsearr, function(key, value) {					
					div_data +="<option value="+value.id+">"+value.product_name+"</option>";
				});
				div_data +="<option value='new_item'>New Item</option>";
				$(div_data).appendTo('#item_description'+i+''); 	      
			}
		});
		
		$("#unit"+i+" option").remove() ;	
		$.ajax({
			url: '<?php echo base_url('fpo/inventory/getquantityunit')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_unit = '<option value="">Select Unit</option>';	
				$.each(responsearr, function(key, value) {					
					div_unit +="<option value="+value.id+">"+value.full_name+"</option>";
				});
				$(div_unit).appendTo('#unit'+i+''); 	      
			}
		});	

		$("#package_unit"+i+" option").remove() ;	
		$.ajax({
			url: '<?php echo base_url('fpo/inventory/getquantityunit')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_unit1 = '<option value="">Select Unit</option>';	
				$.each(responsearr, function(key, value) {					
					div_unit1 +="<option value="+value.id+">"+value.full_name+"</option>";
				});
				$(div_unit1).appendTo('#package_unit'+i+''); 	      
			}
		});
			return true;// you can submit form or send ajax or whatever you want here
		}else{			
			swal('',"Provide all the data's");
			return false;
		}

		});
		

		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
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
			$('#order_date').attr('max', maxDate);
		});
		
		var invoice_date=document.getElementById("invoice_date").value;
		var entry_date=document.getElementById("entry_date").value;
		var voucher_date=document.getElementById("voucher_date").value;
		
		if(invoice_date !=''){
			var invoice=updatePaymentDay(invoice_date);  
			if(invoice !==''){
				document.getElementById("invoice_day").value=invoice;
			}
		}
		
		if(entry_date !=''){
			var entry=updatePaymentDay(entry_date);  
			if(invoice !==''){
				document.getElementById("entry_day").value=entry;
			}
		}
		
		if(voucher_date !=''){
			var voucher=updatePaymentDay(voucher_date);  
			if(invoice !==''){
				document.getElementById("voucher_day").value=voucher;
			}
		}
		 

		$('input[id="entry_date"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();console.log('hi');
			} else {
				dateval = new Date().getDay();
			}            
			
			var entry_day = updatePaymentDay(dateval);   
			
			if(entry_day !==''){
				document.getElementById("entry_day").value = entry_day;
			}
		});
	
		$('input[id="invoice_date"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			var invoice_day=updatePaymentDay(dateval);  
			if(invoice_day !==''){
				document.getElementById("invoice_day").value = invoice_day;
			}
		});
		
		$('input[id="voucher_date"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			var voucher_day=updatePaymentDay(dateval);  
			if(voucher_day !==''){
				document.getElementById("voucher_day").value = voucher_day;
			}
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
			return day;
		} 

		
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
			$('#entry_date').attr('max', maxDate);
			$('#invoice_date').attr('max', maxDate);
			$('#voucher_date').attr('max', maxDate);
			
		});

	});

</script>

</body>
</html>