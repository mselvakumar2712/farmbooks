
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.has-error{
    
border-style: solid;
    border-color: #ff0000;
}
</style>
<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />-->

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
                        <h1>Purchase Order Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active">Purchase Order Entry</a></li>

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
			<form  action="<?php echo base_url('fpo/inventory/post_purchaseorder')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">                                            
										<div class="row ">
											<div class="form-group col-md-3">
												<label for="inputAddress2">Order Date <span class="text-danger">*</span></label>
												<input  class="form-control" type="date"  id="order_date" name="order_date" required="required"  data-validation-required-message="Please select order date.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-2">
												<label for="inputAddress2">Day </label>
												<input class="form-control" type="text" id="order_day" name="order_day" readonly>
											</div>
											<div class="form-group col-md-3">
												<input type="hidden" class="form-control" id="reference" name="reference" value="<?php echo uniqid('PO_REF_'.rand(0,1000)); ?>">												
												<label for="inputAddress2">Supplier <span class="text-danger">*</span></label>
												<select  class="form-control" id="supplier" name="supplier" required="required"  data-validation-required-message="Please select supplier.">
													<option value="">Select Supplier</option>
													<?php for($i=0; $i<count($supplier);$i++) { ?>										
													<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
													<?php } ?>																		
												</select>
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-4">
												<label for="inputAddress2">Supplier Quotation Reference</label>
												<input type="text" class="form-control" maxlength="15"  id="supplier_reference" name="supplier_reference" placeholder="Supplier Quotation Reference" required="required" data-validation-required-message="Please enter supplier reference.">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Deliver to<span class="text-danger">*</span></label>
												<select  class="form-control" id="delivery_to"  name="delivery_to" required="required" data-validation-required-message="Please select delivery to.">
													<option value="">Select Deliver to </option>
													<?php for($i=0; $i<count($location);$i++) { ?>										
													<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
													<?php } ?>	
												</select>
												<p class="help-block text-danger"></p>
											</div>		
										</div>	
										<div class="row ">
												
										</div>
										<h5 class="text-success text-center">Order Items</h5>
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
															Quantity
														</th>
														<th class="text-center">
														   UOM
														</th>
														<th class="text-center">
														 Exp Date.
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
												<tr >  
													<td width="10%"><input type="text" name="item_code[]"  id="item_code0" class="form-control  name_list numberOnly" readonly /><div class="help-block text-danger"></div></td>  
													<td width="30%"><select  class="form-control" id="item_description0"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
														<option value="">Description </option>
														<?php for($i=0; $i<count($product_fpo);$i++) { ?>										
														<option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name; ?></option>
														<?php } ?>
														<option value="new_item">New Item</option>
													</select>
													<div class="help-block text-danger"></div></td>  
													<td width="10%"><input type="text" name="qty[]" id="qty0" maxlength="6" class="form-control name_list numberOnly"  required="required" /><p class="help-block text-danger"></p></td>  
													<td width="20%"><select  class="form-control" id="unit0"  name="unit[]" required="required" maxlength="6" data-validation-required-message="Please select unit.">
														<option value="">Select Unit </option>
														<?php for($i=0; $i<count($unit);$i++) { ?>										
														<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->full_name; ?></option>
														<?php } ?>	
													</select>
													<div class="help-block text-danger"></div></td>  
													<td width="5%"><input type="date" name="delivery_date[]" id="delivery_date0" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  
													<td width="10%"><input type="text" name="price[]" id="price0" maxlength="6" class="form-control name_list numberOnly"  /><p class="help-block text-danger"></p></td>  
													<td width="20%"><input type="text" name="line_total[]" id="line_total0"  class="form-control name_list" readonly /></td>  
													<td width="10%"><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
												</tr>													
												</tbody>
												<tbody>
												<tr>
													<td colspan="6" class="text-right"> Sub Total</td>
													<td colspan="1"><input type="text" name="sub_total" id="sub_total" readonly class="form-control "  /></td>
													<td ></td>
												</tr>
												<tr class="total">
													<td colspan="6" class="text-right"> Amount Total</td>
													<td colspan="1"><input type="text" name="amount_total" id="amount_total" readonly class="form-control "  /></td>
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
											<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i>  Save</button>
											<a href="<?php echo base_url('fpo/inventory/outstandingpurchase');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>	
										  </div>
										 
										  </div>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>				
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
		$(this).parents('tr').find('input[name="line_total[]"]').val(qty*unit);
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
			document.getElementById("sendMessageButton").disabled =false;
		}
	});
	/* $('#dynamic_field').on('change','input', function () {
    var row = $(this).closest('tr');
    var total = [];
    $('input[id="qty0"]', row).each(function() {
       total.push(Number($(this).val()));
    });
	 $('input[id="price0"]', row).each(function() {
       total.push(Number($(this).val()));
    });

	if(total[0] & total[1]){
		document.getElementById('line_total0').value=total[0] *total[1];
	}
	}); */

	
	$('#dynamic_field').on('change', 'select[id="item_description0"]', function () {
    var row = $(this).val();
	if(row =="new_item"){
		window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
	}else{
	document.getElementById('item_code0').value=row;
	}
	});

	$(document).ready(function() {
		
		
		var i=0;  
		$('#sendMessageButton').click(function(){  
		
		var validate = true;
		$('#dynamic_field').find('tr input[type=text],tr select').each(function(){
			
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
			
			//validate condition
			//var tt=$('#dynamic_field').find('tbody tr:first input[id="unit"]');
			//alert(tt);
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text],tr select').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
			});
		//line total
		 /*  $('#dynamic_field').on('change','input', function () {
			
			var row = $(this).closest('tr');
			var total1 = [];var sum_total = [];
			$('input[id="line_total'+i+'"]', row).each(function() {
			   sum_total.push(Number($(this).val()));
			 
			});
			$('input[id="qty'+i+'"]', row).each(function() {
			   total1.push(Number($(this).val()));
			});
			 $('input[id="price'+i+'"]', row).each(function() {
			   total1.push(Number($(this).val()));
			});

			if(total1[0] & total1[1]){
				 document.getElementById('line_total'+i+'').value=total1[0] *total1[1];
			}
		}); */
		//select 
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
		
		$('#dynamic_field').on('change','input', function () {
			var row = $(this).closest('tr');
			
			$('#delivery_date'+i+'').each(function() {
				
			var dtToday = new Date();    
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
				month = '0' + month.toString();
			if(day < 10)
				day = '0' + day.toString();
				
			var maxDate = year + '-' + month + '-' + day;
			$('#delivery_date'+i+'').attr('min', maxDate);
		
			});
		});
		//load select box values
		
		//validate check
		if(validate){
		document.getElementById('item_description'+i+'').setAttribute("readonly", "true");
		document.getElementById('qty'+i+'').setAttribute("readonly", "true");
		document.getElementById('delivery_date'+i+'').setAttribute("readonly", "true");
		document.getElementById('line_total'+i+'').setAttribute("readonly", "true");
		document.getElementById('unit'+i+'').setAttribute("readonly", "true");
		document.getElementById('price'+i+'').setAttribute("readonly", "true");
	    i++;
        $('#dynamic_field').find('tbody tr:first').before('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="item_code'+i+'" name="item_code[]"  class="form-control  name_list numberOnly" readonly/></td>  <td><select  class="form-control" id="item_description'+i+'"  name="item_description[]" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text" id="qty'+i+'" name="qty[]" maxlength="6" class="form-control name_list numberOnly"  /><p class="help-block text-danger"></p></td><td><select  class="form-control" id="unit'+i+'" name="unit[]" required="required" maxlength="6" data-validation-required-message="Please select unit."><option value="">Select Unit </option><option value="1"selected>each</option><option value="2">kgs</option><option value="2">ton</option></select></td>  <td><input type="date" id="delivery_date'+i+'" name="delivery_date[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" id="price'+i+'"name="price[]"  maxlength="6" class="form-control name_list numberOnly" /><p class="help-block text-danger"></p></td>  <td><input type="text" id="line_total'+i+'" name="line_total[]"  class="form-control name_list numberOnly" readonly /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  		
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
			$('#delivery_date0').attr('min', maxDate);
		});
		
		$('#item_description').on('change', function(e) {
			e.preventDefault();
			var item_description = $(this).val();				
			document.getElementById('item_code').value =item_description;
		});
		

		$('input[id="order_date"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			updatePaymentDay(dateval);      
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
			document.getElementById("order_day").value = day;
		} 
	});

</script>

</body>




</html>