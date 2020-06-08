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
                        <h1>Customer Credit Note</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="<?php echo base_url('administrator/inventory/customercreditnotes');?>"class="active">Customer Credit Note</a></li>
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
												<div class="form-group col-md-3">
													<label for="inputAddress2">Customer</label>
													<select  class="form-control" id="customer" name="customer"required="required"  data-validation-required-message="Please select customer.">
														<option value="">Select Customers </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Sales Type</label>
													<select  class="form-control" id="sales_type"  name="sales_type">
														<option value="">Select Sales Type </option>
														<option value="1">Retail</option>
														<option value="2" selected>Wholesale</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Date </label>
													<input  class="form-control" type="date"   id="date" name="date"required="required"  data-validation-required-message="Please select date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Branch</label>
													<select  class="form-control" id="branch"  name="branch" required="required"  data-validation-required-message="Please select branch.">
														<option value="">Select Branch </option>
														<option value="1">Default</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											
												
											</div>	
											<div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Exchange Rate</label>
													<input  type="text" class="form-control numberOnly"   id="exchange_rate" name="exchange_rate" placeholder="Exchange Rate" required="required"  data-validation-required-message="Please enter exchange rate.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Shipping Company</label>
													<select  class="form-control" id="shipping_company"  name="shipping_company"required="required"  data-validation-required-message="Please select shipping company.">
														<option value="">Select Shipping Company </option>
														<option value="1"selected>Default</option>	
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Dimension</label>
													<select  class="form-control" id="dimension"  name="dimension"required="required"  data-validation-required-message="Please select dimension.">
														<option value="">Select Dimension</option>
														<option value="1">1 Software</option>
													    <option value="2">2 Development</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference</label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" required="required"  data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>	
												
												<div class="form-group col-md-2">
													<label for="inputAddress2">Customer Discount</label><br>
													<a href="#">0%</a>
												</div>													
											</div>
											<h4 class="text-center text-success">Credit Note Items</h4>
											<div class="table-responsive mt-3">  
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
															   Unit
															</th>
															<th class="text-center">
																Price Before Tax
															</th>
															<th class="text-center">
																Discount %
															</th>
															<th class="text-center">
															   Total
															</th>
															<th class="text-center">
															  
															</th>
															
														</tr>
													</thead>
													<tbody>
													<tr>  
														<td width="20%"><input type="text" name="item_code[]"  class="form-control  name_list" required="required"  /></td>  
														<td width="30%"><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Item Description </option>
														</select>
														<p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text numberOnly" name="qty[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
													    <td width="10%"class="text-center"><select  class="form-control" id="unit"  name="unit[]" required="required" data-validation-required-message="Please select unit.">
															<option value="">Select Unit</option>
															<option value="1" selected>each</option>
															<option value="1">kgs</option>
															<option value="1">ton</option>
														</select></td>  
														<td width="10%"><input type="text" name="price[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="discount[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  							
														<td width="20%"><input type="text" name="line_total[]" class="form-control name_list" required="" /></td>  
														<td width="20%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
													</tr>													
													</tbody>
													<tbody>
													<tr>
														<td colspan="6" class="text-right"> Shipping  Charge</td>
														<td colspan="1"><input type="text numberOnly" name="shipping_charge"  readonly class="form-control " value="0.00" /></td>
														<td></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> Shipping</td>
														<td colspan="1"><input type="text numberOnly" name="shipping"   class="form-control " value="0.00" /></td>
														<td></td>
													</tr>
													<tr class="total">
														<td colspan="6" class="text-right">Credit Note Total	</td>
														<td colspan="1"><input type="text numberOnly" name="credit_total" readonly class="form-control " value="0.00" /></td>
														<td align="text-center"></td>
													</tr>
													</tbody>
												</table>  
											</div>
											<div class="row mt-2">												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Credit Note Type</label>
													<select  class="form-control" id="credit_note_type"  name="credit_note_type">
														<option value="">Select Credit Note Type</option>
														<option value="1"selected>Items Retured to Inventory Location</option>
														<option value="2">Items Written Off</option>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Items Returned to Location	</label>
													<select  class="form-control"  id="return_item_location"  name="return_item_location">
														<option value="">Select Items Returned to Location</option>
														<option value="1"selected>Default</option>
													</select>
												</div>															
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
												<input id="sendMessageButton" value="Process Credit Note" class="btn btn-success text-center" type="submit">							
												<a href="" class="btn btn-outline-dark">Back</a>	
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="item_code[]"  class="form-control  name_list" required="required"  /></td>  <td><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text numberOnly" name="qty[]" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td><td class="text-center"><select  class="form-control" id="unit"  name="unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Select Unit</option><option value="1" selected>each</option><option value="1">kgs</option><option value="1">ton</option></select></td><td><input type="text" name="price[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td><td><input type="text" name="discount[]"  class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="line_total[]"  class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>