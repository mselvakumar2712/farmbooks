<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
                        <h1>Direct Sales Invoice</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="<?php echo base_url('administrator/inventory/directsalesinvoice');?>"class="active">Direct Sales Invoice</a></li>
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
													<select  class="form-control" id="customer" name="customer" required="required"  data-validation-required-message="Please select customer.">
														<option value="">Select Customers </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>													
												<div class="form-group col-md-3">
													<label for="inputAddress2">Payment</label>
													<select  class="form-control" id="payment"  name="payment" required="required"  data-validation-required-message="Please select payment.">
														<option value="">Select payment </option>
														<option value="1">Cash Only</option>
														<option value="2">Due 15th Of the Following Month</option>
														<option value="3">Due By End Of the Following Month</option>
														<option value="4">Payment due Within 10 days</option>	
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Invoice Date </label>
													<input  class="form-control" type="date"   id="delivery_date" name="delivery_date" required="required"  data-validation-required-message="Please select invoice date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Branch</label>
													<select  class="form-control" id="branch"  name="branch"required="required" data-validation-required-message="Please select branch.">
														<option value="">Select Branch </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												
											</div>	
											<div class="row ">																								
												<div class="form-group col-md-2">
													<label for="inputAddress2">Price List</label>
													<select  class="form-control" id="Price List"  name="Price List">
														<option value="">Select Price List </option>
														<option value="1">Retail</option>
														<option value="2"selected>Wholesale</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference</label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" required="required"  data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Dimension</label>
													<select  class="form-control" id="dimension"  name="dimension" required="required"  data-validation-required-message="Please select dimension.">
														<option value="">Select Dimension </option>
														<option value="1">1 Support</option>
														<option value="2">2 Development</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Current Credit</label><br>
													<a href="#">1,000.00</a>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Customer Discount</label><br>
													<a href="#">0%</a>
											</div>													
											</div>
											</div>
											<h4 class="text-center text-success">Sales Invoice Items</h4>
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
																Unit Price
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
														<td width="20%"><input type="text" name="item_code[]" id="item_code0" class="form-control  name_list" required="required"  readonly /></td>  
														<td width="30%"><select  class="form-control"  id="item_description0" name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Item Description </option>
															 <?php for($i=0; $i<count($product);$i++) { ?>										
															 <option value="<?php echo $product[$i]->id; ?>"><?php echo $product[$i]->product_name; ?></option>
															<?php } ?>
														</select>
														<p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text numberOnly" name="qty[]"   id="qty0"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
													    <td width="10%"class="text-center"><select  class="form-control" id="unit0"  name="unit[]" required="required" data-validation-required-message="Please select unit.">
															<option value="">Select Unit</option>
															<?php for($i=0; $i<count($unit);$i++) { ?>										
															<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->full_name; ?></option>
															<?php } ?>
														</select></td>  
														<td width="10%"><input type="text" name="price[]"  id="price0" class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="discount[]"  id="discount0" class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  							
														<td width="20%"><input type="text" name="line_total[]" id="line_total0"  class="form-control name_list" required="" /></td>  
														<td width="20%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
													</tr>													
													</tbody>
													<tbody>
													<tr>
														<td colspan="6" class="text-right"> Shipping  Charge</td>
														<td colspan="1"><input type="text numberOnly" name="shipping_charge"  id="shipping_charge" readonly class="form-control " value="0.00" /></td>
														<td></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right"> Sub Total</td>
														<td colspan="1"><input type="text numberOnly" name="sub_total" id="sub_total" readonly class="form-control " value="0.00" /></td>
														<td></td>
													</tr>
													<tr class="total">
														<td colspan="6" class="text-right"> Amount Total</td>
														<td colspan="1"><input type="text numberOnly" name="amount_total" id="amount_total" readonly class="form-control " value="0.00" /></td>
														<td align="text-center"><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
													</tr>
													</tbody>
												</table>  
											</div>
											<h4 class="text-center text-success">Cash payment</h4>
											<div class="row mt-4">												
												<div class="form-group col-md-3">
													<label for="inputAddress2">Deliver from Location</label>
													<select  class="form-control" id="delivery_from"  name="delivery_from">
														<option value="">Select Delivery From </option>
														<option value="1"selected>Default</option>
													</select>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Cash account</label>
													<label>Petty Cash account</label>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Comments</label>
													<textarea  class="form-control"   id="comments" name="comments" placeholder=""></textarea>
												</div>														
											</div>
											<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Place Invoice" class="btn btn-success text-center" type="submit">							
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
	$('#dynamic_field').on('keyup','input', function(){
            var qty = +$(this).val();
            var unit = +$(this).parents('tr').find('input[name="price[]"]').val();
            var discount = +$(this).parents('tr').find('input[name="discount[]"]').val(); 
            $(this).parents('tr').find('input[name="line_total[]"]').val((qty*unit)*discount/100);
            var totamt = 0 ;
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            console.log("table length : "+trs.length);
            for(var i=0;i<trs.length;i++)
            {
                console.log("amount from row "+i+" = "+trs[i].value);
                totamt+=parseFloat(trs[i].value);
                document.getElementById('sub_total').value=totamt;
                document.getElementById('amount_total').value=totamt;
			    document.getElementById('shipping_charge').value=totamt;
            }
        });
	
		
	$('#dynamic_field').on('change', 'select[id="item_description0"]', function () {
		
			var row = $(this).val();

			document.getElementById('item_code0').value=row;
	});
	
	$(document).ready(function() {		
		var i=0;  


		$('#add').click(function(){  
			//validate condition
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
			});
			//line total
			 
			//select 
			$('#dynamic_field').on('change','select', function () {
				var row = $(this).closest('tr');
				
				$('select[id="item_description'+i+'"]', row).each(function() {
					document.getElementById('item_code'+i+'').value= $(this).val();
				});
			});
			if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			document.getElementById('item_description'+i+'').disabled=true;
			document.getElementById('qty'+i+'').disabled=true;
			document.getElementById('discount'+i+'').disabled=true;
			document.getElementById('line_total'+i+'').disabled=true;
			document.getElementById('unit'+i+'').disabled=true;
			document.getElementById('price'+i+'').disabled=true;
           
		   i++;
		   var html=$(".total").html();
           $('#dynamic_field').find('tbody tr:first').before('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="item_code'+i+'" name="item_code[]"  class="form-control  name_list" required="required"  readonly /></td>  <td><select  class="form-control" id="item_description'+i+'"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text numberOnly" id="qty'+i+'" name="qty[]" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td><td class="text-center"><select  class="form-control" id="unit'+i+'"  name="unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Select Unit</option><option value="1" selected>each</option><option value="1">kgs</option><option value="1">ton</option></select></td><td><input type="text" name="price[]"  id="price'+i+'" class="form-control name_list" required="" /><p class="help-block text-danger"></p></td><td><input type="text" name="discount[]" id="discount'+i+'" class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="line_total[]"  id="line_total'+i+'" class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		   $("#item_description"+i+" option").remove() ;		
			$.ajax({
			url: '<?php echo base_url('fpo/market/getproducts')?>',
			type: "GET",
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Description</option>';	
				$.each(responsearr, function(key, value) {					
					div_data +="<option value="+value.id+">"+value.product_name+"</option>";
				});
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


	});

</script>

</body>
</html>