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
                        <h1>Direct Purchase Invoice Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="<?php echo base_url('administrator/inventory/directinvoicelist');?>">Direct Invoice</a></li>
                            <li class="active">Direct Purchase Invoice Entry</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                                            
										  <div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Supplier <span class="text-danger">*</span></label>
													<select  class="form-control" id="supplier" name="supplier" required="required"  data-validation-required-message="Please select supplier.">
														<option value="">Select Supplier </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Due Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  value="<?php echo date('Y-m-j'); ?>"  id="due_date" name="due_date" required="required"  data-validation-required-message="Please select order date.">
													<p class="help-block text-danger"></p>
												</div>											
												<div class="form-group col-md-4">
													<label for="inputAddress2">Deliver to<span class="text-danger">*</span></label>
													<select  class="form-control" id="delivery_to"  multiple="multiple" name="delivery_to" required="required" data-validation-required-message="Please select delivery to.">
														<option value="">Select Deliver to </option>
														<option value="1"selected>Delivery 1</option>
														<option value="2">Delivery 2</option>
														<option value="3">Delivery 3</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>		
											</div>	
											<div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  value="<?php echo date('Y-m-j'); ?>"  id="invoice_date" name="invoice_date" required="required"  data-validation-required-message="Please select order date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Supplier's Reference</label>
													<input type="text" class="form-control" id="supplier_reference" name="supplier_reference" placeholder="Supplier Reference" required="required" data-validation-required-message="Please enter supplier reference.">
													<p class="help-block text-danger"></p>
												</div>
													
												<div class="form-group col-md-3">
													<label for="inputAddress2">Receive Into</label>
													<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
														<option value="">Select Receive Into </option>
														<option value="1" selected>Default</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference</label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" required="required"  data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>		
											</div>
											<div class="table-responsive">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Item Code
															</th>
															<th class="text-center">
																Item Description
															</th>
															<th class="text-center">
																Qty
															</th>
															<th class="text-center">
															   Received
															</th>
															<th class="text-center">
															   Unit
															</th>
															<th class="text-center">
																Price Before Tax
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
														<td width="20%"><input type="text" name="item_code[]" placeholder="Item Code" class="form-control  name_list" required="required"  /></td>  
														<td width="30%"><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Item Description </option>
														</select>
														<p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text numberOnly" name="qty[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="received[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><select  class="form-control" id="unit"  name="unit[]" required="required" data-validation-required-message="Please select unit.">
															<option value="">Select unit </option>
															<option value="1"selected>each</option>
															<option value="2">kgs</option>
															<option value="2">ton</option>
														</select><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="price[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text" name="line_total[]" class="form-control name_list" required="" /></td>  
														<td width="10%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
													</tr>													
													</tbody>
													<tbody>
													<tr>
														<td colspan="5" class="text-right"> Sub Total</td>
														<td colspan="2"><input type="text numberOnly" name="sub_total"  readonly class="form-control " value="0.00" /></td>
														<td ></td>
													</tr>
													<tr class="total">
														<td colspan="5" class="text-right"> Amount Total</td>
														<td colspan="2"><input type="text numberOnly" name="amount_total" readonly class="form-control " value="0.00" /></td>
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
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/inventory/directinvoicelist');?>" class="btn btn-outline-dark">back</a>	
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

	$(document).ready(function() {
		var i=1;  


		$('#add').click(function(){  
           i++;
		   var html=$(".total").html();
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="item_code[]"  class="form-control  name_list" required="required"  /></td>  <td><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text numberOnly" name="qty[]" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="received[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><select  class="form-control" id="unit"  name="unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Select unit </option><option value="1"selected>each</option><option value="2">kgs</option><option value="2">ton</option></select><p class="help-block text-danger"></p></td> <td><input type="text" name="price[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="line_total[]" class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>