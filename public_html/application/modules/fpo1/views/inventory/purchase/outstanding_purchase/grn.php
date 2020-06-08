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
                        <h1>GRN</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active">GRN</a></li>

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
			<form  action="<?php echo base_url('fpo/inventory/post_grn')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">                                           
										  <div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Delivery Date  <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  value="<?php echo $purchase_info['ord_date']?>" id="deliverydate" name="deliverydate" required="required"  data-validation-required-message="Please select delivery date.">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-2">
													<label for="inputAddress2">Day </label>
													<input class="form-control" type="text" id="delivery_day" name="delivery_day" readonly>
											   </div>
												<div class="form-group col-md-3">
													<input type="hidden" class="form-control" id="order_no" name="order_no" value="<?php echo $purchase_info['order_no'];  ?>">
													<input type="hidden" class="form-control" id="reference" name="reference" value="<?php echo $purchase_info['reference'];?>">												
													<label for="inputAddress2">Supplier <span class="text-danger">*</span></label>
													<select  class="form-control" id="supplier" name="supplier" required="required"  data-validation-required-message="Please select supplier.">
														<option value="">Select Supplier</option>
														<?php for($i=0; $i<count($supplier);$i++) { ?>										
														<option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?></option>
														<?php } ?>																		
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-3">
													<label for="inputAddress2">Supplier Quotation Reference</label>
													<input type="text" class="form-control" id="supplier_reference" maxlength="15" value="<?php echo $purchase_info['supp_quotation_ref']?>" name="supplier_reference" placeholder="Supplier Quotation Reference" >
												</div>												
											</div>
											<div class="row ">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Deliver to <span class="text-danger">*</span></label>
												<select  class="form-control" id="delivery_to"    name="delivery_to" required="required" data-validation-required-message="Please select delivery to.">
													<option value="">Select Deliver to</option>
													<?php for($i=0; $i<count($location);$i++) { ?>										
													<option value="<?php echo $location[$i]->id; ?>"><?php echo $location[$i]->name; ?></option>
													<?php } ?>	
												</select>
												<p class="help-block text-danger"></p>
											</div>
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
																Qty
															</th>
															<th class="text-center">
																Received
															</th>
															<th class="text-center">
															   UOM
															</th>
															<th class="text-center">
															 Delivery Date
															</th>
															<th class="text-center">
															Unit Price 
															</th>
															<th class="text-center">
															   Line Total
															</th>
															
														</tr>
													</thead>
													<tbody>
														
													</tbody>
													<tbody>
													<tr>
														<td colspan="7" class="text-right"> Sub Total</td>
														<td colspan="1"><input type="text" name="sub_total" id="sub_total" readonly class="form-control "  /></td>
													</tr>
													<tr class="total">
														<td colspan="7" class="text-right"> Amount Total</td>
														<td colspan="1"><input type="text" name="amount_total"  id="amount_total" readonly class="form-control "  /></td>
													</tr>
													</tbody>
												</table>  
											</div>
											<div class="row ">
												<div class="form-group col-md-3">
												</div>	
												<div class="form-group col-md-6">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control "  name="memo" id="memo"><?php echo $purchase_info['comments']?></textarea>
												</div>
												<div class="form-group col-md-3">
												</div>		
											</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
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
		history.pushState(null, null, location.href);
		window.onpopstate = function () {
			history.go(1);
		};
		
        $('#dynamic_field').on('keyup','input', function(){
            var qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
            var unit = +$(this).parents('tr').find('input[name="price[]"]').val();
			var received = +$(this).parents('tr').find('input[name="received[]"]').val();
			if(received > qty){
				swal('',"Received Quantity sholud not be greater than actual quantity");
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
				document.getElementById('sub_total').value=totamt;
                document.getElementById('amount_total').value=totamt;
				document.getElementById("sendMessageButton").disabled =false;
            }
        });
 
	$('#dynamic_field').on('change', 'select', function () {
    var row = $(this).val();

		document.getElementById('item_code0').value=row;
	});

	$(document).ready(function() {
			
			
			
		$('#sendMessageButton').click(function(){  

			
		var validate = true;
		$('#dynamic_field').find('tr input[type=text],tr input[type=date]').each(function(){
			var qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
		
		    var received = +$(this).parents('tr').find('input[name="received[]"]').val();
			
			if(received > qty){
				swal('',"Received Quantity sholud not be greater than entered quantity");
				$(this).parents('tr').find('input[name="received[]"]').val('');
				$(this).parents('tr').find('input[name="received[]"]').focus();
				validate = false;
			}
			
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
		
		document.getElementById('supplier').value='<?php echo $purchase_info['supplier_id']?>';

	
		document.getElementById('delivery_to').value='<?php echo $purchase_info['delivery_address'];?>';

		    var j=1;
			var order_no='<?php echo $purchase_info['order_no']?>';
			$.ajax({
			url: "<?php echo base_url();?>fpo/inventory/grnpoitems/"+order_no,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
			console.log(response);
			//alert(response);
			response=response.trim();
			//responseArray=$.parseJSON(response);
			console.log(response);
			responseArray=$.parseJSON(response);
			
			$.each(responseArray, function(key, value) {	

			var strVale = value.item_code;
			var strdesc = value.description;
			var strqty = value.quantity_ordered;
			var strprice = value.unit_price;
			var strdeliverydate= value.delivery_date;
			var intVal_desc=strdesc.split(',');
			var intVal_price=strprice.split(',');
			var intVal_qty=strqty.split(',');
			var intValcode=strVale.split(',');
			var intValdate=strdeliverydate.split(',');
			var str_receive=value.quantity_received;
			var str_unit=value.uom;
			var intValreceive=str_receive.split(',');
			var stritemid = value.po_detail_item;
			var intVal_id=stritemid.split(',');
			 for(var i=0;i<intValcode.length;i++){				
				if(intValcode.length > 0 ){
					j++;
				console.log();
				$('#dynamic_field').append('<tr id="row'+j+'" class="dynamic-added"><td width="10%"><input type="text" id="item_code'+j+'" value="'+intValcode[i]+'" name="item_code[]"  class="form-control  name_list numberOnly" readonly/></td>  <td><select  class="form-control" id="item_description'+j+'"  name="item_description[]"  data-validation-required-message="Please select item description." readonly></select><p class="help-block text-danger"></p></td>  <td width="10%"><input type="text" id="qty'+j+'" name="qty[]" value="'+intVal_qty[i]+'" class="form-control name_list numberOnly"  readonly/><p class="help-block text-danger"></p></td><td width="10%"><input type="text" name="received[]" value="'+intValreceive[i]+'" id="received'+j+'" class="form-control numberOnly name_list" required="required" /></td><td  width="10%"><select  class="form-control" id="unit'+j+'" name="unit[]" required="required" data-validation-required-message="Please select unit." readonly></select></td>  <td ><input type="date" id="delivery_date'+j+'" value="'+intValdate[i]+'" name="delivery_date[]"  style="width:160px" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" id="price'+i+'"name="price[]"  value="'+intVal_price[i]+'" class="form-control name_list numberOnly"readonly/><p class="help-block text-danger"></p></td>  <td><input type="text" id="line_total'+i+'" name="line_total[]"  class="form-control name_list numberOnly" readonly /></td></tr>');  						
				$('#dynamic_field tr td').find('input[name="line_total[]"]').val(intVal_qty*intVal_price);
				var totamt=0;
				
				$("#item_description"+i+" option").remove() ;
					$.ajax({
					url: '<?php echo base_url('fpo/inventory/getproducts')?>',
					type: "GET",
					success:function(response) {
						responsearr=$.parseJSON(response);
						//console.log(response);
						
						var div_data = '<option value="">Description</option>';	
						$.each(responsearr, function(key, value) {	
						if(intValcode==value.id){
						
						div_data +='<option value='+value.id+' selected>'+value.product_name+'</option>';
						
						}
						$(div_data).appendTo('#item_description'+i+'');	
					});
					
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
						if(str_unit==value.id){
						div_unit +="<option value="+value.id+" selected>"+value.full_name+"</option>";
						}
						div_unit +="<option value="+value.id+">"+value.full_name+"</option>";
						
					});
					$(div_unit).appendTo('#unit'+i+''); 	      
				}
				});
				var theTbl = $('#dynamic_field');
				var trs = theTbl.find("input[name='line_total[]']");
				console.log("table length : "+trs.length);
				for(var i=0;i<trs.length;i++)
				{
					console.log("amount from row "+i+" = "+trs[i].value);
					totamt +=parseFloat(trs[i].value);
					document.getElementById('sub_total').value=totamt;
					document.getElementById('amount_total').value=totamt;
					document.getElementById("sendMessageButton").disabled =false;
				}
                //document.getElementById('amount_total').value=intVal_qty[i] *intVal_price[i];
				}else{
				   $("#dynamic_field").val(strVale);
				}
			}
		
			});	

			},
			error:function(){
			alert('There is no order items');
			} 
			});
			
			$('#dynamic_field').on('click', '.del',function() {
			var po_id =  $(this).attr('id');

			swal({
			 title: 'Are you sure?',
			 text: "You won't be able to revert this!",
			 type: 'question',
			 showCancelButton: true,
			 confirmButtonColor: '#3085d6',
			 cancelButtonColor: '#d33',
			 confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			 if (result.value) {          
				$(this).prop("disabled", true);
				$.ajax({
				  url: "<?php echo base_url();?>fpo/inventory/deletegrn/"+po_id,
				  type: "POST",
				  data: {
					 this_delete: po_id,
				  },
				  cache: false,
				  success: function() {        
					 setTimeout(function() {
					  window.location.replace("<?php echo base_url('fpo/inventory/outstandingpurchase')?>");
					 }, 1000);
				  },
				  error: function() {
					 
					 setTimeout(function() {
					  swal("Error in progress. Try again!!!");
					 }, 1000);
				  },
				  complete: function() {
					 setTimeout(function() {
					  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
					 }, 1000);
				  }
				});
			 }else {
				swal("Cancelled", "You have cancelled the outstanding purchase grn  delete action", "info");
				return false;
			 }
		  });
		});
		var i=1;  
		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');
			
			$('select[id="item_description'+i+'"]', row).each(function() {
				document.getElementById('item_code'+i+'').value= $(this).val();
			});
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
		
		$('#item_description').on('change', function(e) {
			e.preventDefault();
			var item_description = $(this).val();				
			document.getElementById('item_code').value =item_description;
		});
		$('input[id="deliverydate"]').on('change', function(e){ 
			e.preventDefault();
			var dateval = "";
			if($(this).val()){
				dateval = $(this).val();
			} else {
				dateval = new Date().getDay();
			}            
			
			updatePaymentDay(dateval);      
		});
		var orderdate='<?php echo $purchase_info['ord_date']?>';
		
		if(orderdate){
			
			var day="";
			switch(new Date(orderdate).getDay()){
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
				  day = "Satureday";
				  break;
			}
			document.getElementById("delivery_day").value = day;
		}
		
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
				  day = "Satureday";
				  break;
			}
			document.getElementById("delivery_day").value = day;
		} 
	
	});

</script>

</body>
</html>