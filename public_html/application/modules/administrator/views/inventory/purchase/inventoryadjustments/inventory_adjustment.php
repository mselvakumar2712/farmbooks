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
                        <h1>Inventory Adjustments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a href="#"class="active">Inventory Adjustments</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="" id="figform" method="post" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid"> 
											<div class="container-fluid">                                            
											<div class="row ">
											<div class="form-group col-md-4">
													<label for="inputAddress2">From Location</label>
													<input  class="form-control" type="date"   id="from" name="from">		
												</div>
												
												<div class="form-group col-md-4">
													<label for="inputAddress2">Date</label>
													<input  class="form-control" type="date"   id="adjustdate" name="adjustdate" >
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Detail</label>
													<select  class="form-control" id="detail"  name="detail" required="required" data-validation-required-message="Please select detail.">
														<option value="1">Adjustment</option>
													</select>
												</div>	
																	
											</div>
											<div class="row ">
											<div class="form-group col-md-4">
													<label for="inputAddress2">Reference</label>
													<input  class="form-control" type="text"   id="ref" name="ref">		
												</div>
													<div class="form-group col-md-4">
													<label for="inputAddress2">Type</label>
													<select  class="form-control" id="type"  name="type" required="required" data-validation-required-message="Please select detail.">
														<option value="1">Positive Adjustment</option>
														<option value="2">Negative Adjustment</option>
													</select>		
													</div>
											</div>
											</div>
											<h4 class="text-center text-success">Adjustment Items</h4>
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
															   Unit
															</th>
															<th class="text-center">
															   Unit Cash
															</th>
															<th class="text-center">
															   Total
															</th>
															<th class="text-center">
															   Edit
															</th>															
															<th class="text-center">
															  
															</th>															
														</tr>
													</thead>
													<tbody>
													<tr>  
														<td width="20%"><input type="text" name="item_code" class="form-control name_list"  /></td> 
														<td width="20%"><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description.">
															<option value="">Item Description </option>
															<option value="1">Pesticide</option>
															<option value="2">Nutrients</option>														
														</select></td>
														<td width="20%"><input type="text" name="quantity[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><p class=" text-center" >each</p></td> 
														<td width="20%"><input type="text" name="unit_cash[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text" name="total[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><p class=" text-center" ><i class="fa fa-edit"></i></p></td> 
														<td width="10%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
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
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">
												<input id="sendMessageButton" value="Process Transfer" class="btn btn-success text-center" type="submit">
											  </div>
											   <div class="form-group col-md-12 text-center">
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="item_code" class="form-control name_list"  /><p class="help-block text-danger"></p></td><td><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Item Description </option><option value="1">Pesticide</option><option value="2">Nutrients</option></select></td><td><input type="text" name="quantity[]"  class="form-control numberOnly  name_list" required="" /><p class="help-block text-danger"></p></td><td><p class="text-center">each</p></td><td><input type="text" name="unit_cash[]"  class="form-control name_list" required="" /></td><td><input type="text" name="total[]"  class="form-control name_list" required="" /></td><td><p class="text-center"><i class="fa fa-edit"></i></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  

		
		$('input[id="payment_date"]').on('change', function(e){ 
            e.preventDefault();
            var dateval = $(this).val();
			var day ;
			switch(new Date(dateval).getDay()){
				case 0:
				day="Sunday";
				break;
				case 1:
				day="Monday";
				break;
				case 2:
				day="Tuesday";
				break;
				case 3:
				day="Wednesday";
				break;
				case 4:
				day ="Thursday"
				break;
				case 5:
				day ="Friday";
				break;
				case 6:
				day ="Satureday";
				break;

			}
			document.getElementById("pay_day").value =day;
      
		});
	});

</script>

</body>
</html>