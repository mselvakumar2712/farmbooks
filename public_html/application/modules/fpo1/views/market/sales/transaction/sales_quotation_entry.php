<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />-->
<!--
<style>
input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>
-->
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
                        <h1>Sales Quotation Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Market</a></li>
                            <li><a href="<?php echo base_url('fpo/Market/salesquotationentry');?>"class="active">Sales Quotation Entry</a></li>
 
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
			   <form  id="figform" method="POST" action="<?php echo base_url('fpo/Market/postsales_quotation')?>" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">  											
										  <div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Customer <span class="text-danger">*</span></label>
													<select class="form-control" id="customer" name="customer" required="required" data-validation-required-message="Please select customer.">
												      <option value="0">Select Customer</option>
											          <?php for($i=0; $i<count($customer);$i++) { ?>				
											          <option value="<?php echo $customer[$i]->debtor_no; ?>"><?php echo $customer[$i]->name; ?></option>
											          <?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-2">
													<label for="inputAddress2">Current Credit</label><br>
													<a href="#">1,000.00</a>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Payment <span class="text-danger">*</span></label>
													<select class="form-control" id="payment" name="payment" required="required" data-validation-required-message="Please select payment.">
														<option value="">Select Payment </option>
														<?php for($i=0; $i<count($paymentterms);$i++) { ?>					
											             <option value="<?php echo $paymentterms[$i]->terms_indicator; ?>"><?php echo $paymentterms[$i]->terms; ?></option>
											             <?php } ?>	
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Quotation Date </label>
													<input class="form-control" type="date" id="quotation_date" name="quotation_date"required="required" data-validation-required-message="Please select quotation date." value="<?php echo date("Y-m-d");?>">
													<p class="help-block text-danger"></p>
												</div>	
											</div>	
											<div class="row ">
												<div class="form-group col-md-3">
													<label for="inputAddress2">Branch <span class="text-danger">*</span></label>
													<select class="form-control" id="branch" name="branch"  required="required" data-validation-required-message="Please select branch.">>
														<option value="">Select Branch </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Customer Discount</label><br>
													<a href="#">0%</a>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Price List</label>
													<select class="form-control" id="price_list" name="price_list">
														<option value="">Select Price List </option>
											          <?php for($i=0; $i<count($salestype);$i++) { ?>				
											          <option value="<?php echo $salestype[$i]->id; ?>"><?php echo $salestype[$i]->sales_type; ?></option>
											          <?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Reference</label>
													<input class="form-control" value="<?php echo uniqid('trv_SQ_'.rand(0,10000)); ?>" id="ref" name="ref" placeholder="Reference" required="required" data-validation-required-message="Please enter reference." readonly>
													<p class="help-block text-danger"></p>
												</div>		
											</div>
											<h4 class="text-center text-success">Sales Quotation Items</h4>
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
															  UOM
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
														<td width="20%">
                                                            <input type="text" name="item_code[]" id="item_code0" class="form-control numberOnly" required="required" readonly />
                                                        </td>  
														<td width="30%">
                                                            <select class="form-control" id="item_description0"   name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Select Item Description </option>
															 <?php for($i=0; $i<count($product);$i++) { ?>					
                                                             <option value="<?php echo $product[$i]->id; ?>"><?php echo $product[$i]->product_name; ?></option>
                                                            <?php } ?>
														   </select>
														   <p class="help-block text-danger"></p>
                                                        </td>  
														   <td width="10%">
                                                               <input type="text" id="qty0" name="qty[]" maxlength="6" class="form-control numberOnly" required="required" /><p class="help-block text-danger"></p>
                                                            </td>  
													      <td width="10%"class="text-center">
															 <select class="form-control" id="unit0" name="unit[]" required="required" data-validation-required-message="Please select unit.">
																<option value="">Select Unit</option>
																<?php for($i=0; $i<count($unit);$i++) { ?>					
																<option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->full_name; ?></option>
																<?php } ?>
															</select>
														</td>  
														<td width="10%">
                                                            <input type="text" name="price[]" id="price0" maxlength="6" class="form-control numberOnly" required="" /><p class="help-block text-danger"></p>
                                                        </td>  
														<td width="10%">
                                                            <input type="text" name="discount[]" id="discount0" class="form-control numberOnly" required="" maxlength="2" /><p class="help-block text-danger"></p>
                                                        </td>  							
														<td width="20%">
                                                            <input type="text" name="line_total[]" id="line_total0" class="form-control numberOnly" required="" readonly />
                                                        </td>  
														<td width="20%">
                                                            <button type="button" name="add" id="add" class="btn btn-success">Add Item</button>
                                                        </td>  
													</tr>										
													</tbody>
													<tbody>
													<tr>
														<td colspan="6" class="text-right">Shipping Charge</td>
														<td colspan="1"><input type="text" name="shipping_charge" id="shipping_charge" readonly class="form-control" value="0.00" /></td>
														<td></td>
													</tr>
													<tr>
														<td colspan="6" class="text-right">Sub Total</td>
														<td colspan="1"><input type="text" name="sub_total" id="sub_total" readonly class="form-control" value="0.00" /></td>
														<td></td>
													</tr>
													<tr class="total">
														<td colspan="6" class="text-right">Amount Total</td>
														<td colspan="1"><input type="text" name="amount_total" id="amount_total" readonly class="form-control" value="0.00" /></td>
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
														<option value="1" selected>Default</option>
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
												<button id="sendMessageButton"  class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>							
												<a href="" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>Cancel</a>	
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
	/*  $('#dynamic_field').on('change','input', function () {
    var row = $(this).closest('tr');
    var total = [];
	 var discount = [];

    $('input[id="qty0"]', row).each(function() {
       total.push(Number($(this).val()));
    });
	 $('input[id="price0"]', row).each(function() {
       total.push(Number($(this).val()));
    });
	 $('input[id="discount0"]', row).each(function() {
       discount.push(Number($(this).val()));
    });

	if(total[0] & total[1]){
		document.getElementById('line_total0').value=total[0] * total[1] ;
		
	}
	if(discount[0])
	{
		totalvalue = total[0] * total[1];
		document.getElementById('line_total0').value=(totalvalue * discount[0]/100) ;
	}
	
	}); */
	
	/*$('#dynamic_field').on('keyup','input', function(){
            var qty = +$(this).val();
            var unit = +$(this).parents('tr').find('input[name="price[]"]').val();
            var discount = +$(this).parents('tr').find('input[name="discount[]"]').val(); 
            $(this).parents('tr').find('input[name="line_total[]"]').val((qty*unit)*(discount/100));
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
        });*/
    
	$('#dynamic_field').on('keyup', 'input[name="price[]"]', function () {
            var actual_qty = +$(this).val();
            var actual_unit_price = +$(this).parents('tr').find('input[name="price[]"]').val();
            var actual_discount = +$(this).parents('tr').find('input[name="discount[]"]').val(); 
            var discount_total = ((actual_qty*actual_unit_price)*actual_discount/100);
            var item_total = ((actual_qty*actual_unit_price) - discount_total); 
            $(this).parents('tr').find('input[name="line_total[]"]').val(item_total); 
        
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            var currentTotalAmount = 0;
            for(var i=0;i<trs.length;i++) {
                //console.log("amount from row "+i+" = "+trs[i].value);
                currentTotalAmount+=parseFloat(trs[i].value);
                document.getElementById('shipping_charge').value=10;
                document.getElementById('sub_total').value=(currentTotalAmount-10);
                document.getElementById('amount_total').value=document.getElementById('sub_total').value;
				
            }
    });
		
    $('#dynamic_field').on('keyup', 'tr input[name="discount[]"]', function () {
        var line_total = +$(this).parents('tr').find('input[name="line_total[]"]').val(); 
        var actual_discount = +$(this).parents('tr').find('input[name="discount[]"]').val(); 
        var discount_total = (line_total*actual_discount/100);
        var totalAmount = (line_total-discount_total);         
        $(this).parents('tr').find('input[name="line_total[]"]').val(totalAmount);
        
            var total_amount = 0 ;
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            console.log("table length : "+trs.length);
            var currentTotalAmount = 0;
            for(var i=0;i<trs.length;i++) {
                console.log("amount from row "+i+" = "+trs[i].value);
                currentTotalAmount+=parseFloat(trs[i].value);
                document.getElementById('shipping_charge').value=10;
                document.getElementById('sub_total').value=(currentTotalAmount-10);
                document.getElementById('amount_total').value=document.getElementById('sub_total').value;
            }
    });
	
	$('#dynamic_field').on('change', 'select[id="item_description0"]', function () {
			
				var row = $(this).val();

				document.getElementById('item_code0').value=row;
	});
		
	 
	$(document).ready(function() {
		var i=0;  


        $('#sendMessageButton').click(function(){      
            var page_validate = true;
            $('#dynamic_field').find('tr input[type=text],tr select').each(function(){

            if($(this).val() == ""){
                page_validate = false;
              }
            });

            if(page_validate){    
              return true;// you can submit form or send ajax or whatever you want here
            }else{      
              swal('', "Provide all the data's");
              return false;
            }
        });
        
		$('#add').click(function(e){ 
			e.preventDefault();
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
		//load select box values
		
		//validate check
		if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			document.getElementById('item_description'+i+'').setAttribute("readonly", "true");
			document.getElementById('qty'+i+'').setAttribute("readonly", "true");
			document.getElementById('discount'+i+'').setAttribute("readonly", "true");
			document.getElementById('line_total'+i+'').setAttribute("readonly", "true");
			document.getElementById('unit'+i+'').setAttribute("readonly", "true");
			document.getElementById('price'+i+'').setAttribute("readonly", "true");

		   i++;
           $('#dynamic_field').find('tbody tr:first').before('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="item_code'+i+'" name="item_code[]" class="form-control numberOnly" readonly /></td><td><select class="form-control" id="item_description'+i+'" name="item_description[]" data-validation-required-message="Please select item description."><option value="">Select Item Description</option></select><p class="help-block text-danger"></p></td><td><input type="text" id="qty'+i+'" name="qty[]" class="form-control numberOnly" maxlength="6" /><p class="help-block text-danger"></p></td><td><select class="form-control" id="unit'+i+'" name="unit[]" required="required" data-validation-required-message="Please select unit."><option value="">Select unit</option></select></td><td><input type="text" id="price'+i+'" name="price[]" class="form-control numberOnly" required="required" maxlength="6" /><p class="help-block text-danger"></p></td><td><input type="text" id="discount'+i+'" name="discount[]" pattern="\d{2}" class="form-control numberOnly" /><p class="help-block text-danger"></p></td><td><input type="number" id="line_total'+i+'" name="line_total[]" class="form-control numberOnly" readonly /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  		
            initnumberOnly();
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
		
		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});
			return true;// you can submit form or send ajax or whatever you want here
		

		
		}else{
			swal('',"Provide all the data's");
			return false;

		}

																																																											
		});
		
		
		
		function check(){
			obj=$('table tr').find('span');
			$.each( obj, function( key, value ) {
			id=value.id;
			alert(id);
			$('#'+id).html(key+1);
			});
		}


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});
	
	//date validation
	  
	
	
	
	$('#customer').change(function(){
		
		 var debtor_no = $("#customer").val();
		  //alert(crop_category);
		  getcustomerDetail( debtor_no );
	 });
function getcustomerDetail( debtor_no ) {
   $("#branch option").remove() ;
       if( debtor_no !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>fpo/market/branchdetail/"+debtor_no,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                   if (Object.keys(responseArray).length > 0) {
                $("#branch").append($('<option></option>').val(0).html('Select Branch'));
             }
				 else {
                $("#branch").append($('<option></option>').val(0).html(''));  
             }


						 //var subcategory_list = '<option value="">Select Subcategory</option>';
					$.each(responseArray.branch_list,function(key,value){
						$("#branch").append($('<option></option>').val(value.branch_code).html(value.br_name));
					   //subcategory_list += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					//$('#crop_subcategory').html(subcategory_list);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         });
			}
		else
		{
			alert('Please provide mandatory field');
		}
}
	$('#item_description').on('change', function(e) {
			e.preventDefault();
			var item_description = $(this).val();				
			document.getElementById('item_code').value =item_description;
		});


</script>
</body>
</html>