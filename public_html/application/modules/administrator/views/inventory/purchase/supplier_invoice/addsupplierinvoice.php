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
                        <h1>Supplier Invoice Entry </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="<?php echo base_url('administrator/inventory/supplierinvoicelist');?>">Supplier Invoices</a></li>
                            <li class="active">Supplier Invoice Entry</li>
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
													<label for="inputAddress2">Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"    id="order_date" name="order_date" required="required"  data-validation-required-message="Please select date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Due Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  id="order_date" name="order_date" required="required"  data-validation-required-message="Please select due date.">
													<p class="help-block text-danger"></p>
												</div>
													
											</div>	
											<div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Supplier's Reference<span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="supplier_reference" name="supplier_reference" placeholder="Supplier Reference" required="required" data-validation-required-message="Please enter supplier reference.">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Reference<span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="reference" name="reference" placeholder="Reference" required="required" data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4 mt-3">
													<label for="inputAddress2">Terms</label>
													<p >Payment due within 10 days</p>
												</div>		
											</div>
												<p class="text-center"><b>Items Received Yet to be Invoiced</b></p>
												<div class="row">
												<div class="form-group col-md-10 ">
												<p class="text-right text-danger ">WARNING! Be careful with removal. The operation is executed immediately and cannot be undone !!!</p>
												</div>
												<div class="form-group col-md-2 ">
												<input id="sendMessageButton" value="All Items" class="btn btn-success text-center" type="submit">
												</div>
												</div>
											<div class="table-responsive">  
												<table class="table table-bordered">
													<thead>
														<tr bgcolor="#afd66b">
															<th class="text-center">
																Delivery
															</th>
															<th class="text-center">
																P.O.
															</th>
															<th class="text-center">
																Item
															</th>
															<th class="text-center">
															   Description
															</th>
															<th class="text-center">
															   Received On
															</th>
															<th class="text-center">
															   Quantity Received	
															</th>
															<th class="text-center">
															  Quantity Invoiced
															</th>
															<th class="text-center">
															 Qty Yet To Invoice
															</th>
															<th class="text-center">
															 Price before Tax
															</th>
															<th class="text-center">
															Total
															</th>
															<th >
															</th>
														</tr>
													</thead>
													<tbody>
													<tr >
														<td colspan="10" class="text-right">Total</td>
														<td colspan="2" ><input type="text numberOnly" name="sub_total"  readonly   class="form-control" value="0.00" /></td>
									
													</tr>
													</tbody>
													<tbody>
													<tr>
														<td colspan="11" class="text-center" >There are no outstanding items received from this supplier that have not been invoiced by them.</td>
													</tr>													
													</tbody>													
												</table>
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
														<td colspan="4" class="text-center"><strong>GL Items for this Invoice</strong></td>
														<td colspan="1"><p>Quick Entry</p><select  class="form-control" id="name"  name="name[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Name </option>
															<option value="1" selected>Phone</option>
														</select></td>
														<td ><p>Amount</p><input type="text" name="account[]"  class="form-control  name_list" required="required"  /><p class="help-block text-danger"></p></td>  
														<td ><p></p><button type="button" name="go" id="go" class="btn btn-success mt-4">Go</button></td>  																									
														</tr>
														<tr bgcolor="#afd66b">
															<th class="text-center">
																Account
															</th>
															<th class="text-center">
																Name
															</th>
															<th class="text-center">
																Dimension
															</th>
															<th class="text-center">
															   Amount
															</th>
															<th class="text-center">
															   Memo
															</th>
															<th class="text-center">
															  
															</th>
															<th class="text-center">
															  
															</th>
														</tr>
													</thead>
													<tbody>
													<tr>  
														<td width="20%"><input type="text" name="account[]"  class="form-control  name_list" required="required"  /><p class="help-block text-danger"></p></td>  
														<td width="30%"><select  class="form-control" id="name"  name="name[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Name </option>
														</select>
														<p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text numberOnly" name="dimension[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="amount[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text numberOnly" name="memo[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
														<td width="10%"><button type="button" name="edit" id="edit" class="btn btn-warning">Reset</button></td>  													
													</tr>													
													</tbody>
													<tbody>
													<tr>
														<td colspan="5" class="text-right"> Sub Total</td>
														<td colspan="2" ><input type="text numberOnly" name="sub_total"  readonly   class="form-control" value="0.00" /></td>
									
													</tr>
													<tr class="total">
														<td colspan="5" class="text-right"><strong> Invoice Total</strong></td>
														<td colspan="2"><input type="text numberOnly" name="amount_total" readonly class="form-control " value="0.00" /></td>

													</tr>
													</tbody>
												</table>  
											</div>
											<div class="row ">
												<div class="form-group col-md-3">
												</div>	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control " name="supplier_memo" id="supplier_memo"></textarea>
												</div>
												<div class="form-group col-md-3">
												</div>		
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="account[]"  class="form-control  name_list" required="required"  /></td>  <td><select  class="form-control" id="name"  name="name[]" required="required" data-validation-required-message="Please select name."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text numberOnly" name="dimension[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="amount[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="memo[]" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td> <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td><td></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>