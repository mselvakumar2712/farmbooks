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
                        <h1>Receipt Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a href="<?php echo base_url('administrator/finance/deposits');?>"class="active">Receipt Entry</a></li>
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
													<label for="inputAddress2">Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  id="receipt_date" name="receipt_date" required="required"  data-validation-required-message="Please select date.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Day </label>
													<input  class="form-control" type="text"  id="day" name="day" readonly>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Voucher No.<span class="text-danger">*</span></label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Voucher No" required="required" data-validation-required-message="Please enter voucher no.">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-3">
													<label for="inputAddress2">Name<span class="text-danger">*</span></label>
													<input  class="form-control"   id="name" name="name" placeholder="Name" required="required" data-validation-required-message="Please enter name.">
												    <p class="help-block text-danger"></p>
												</div>											
											</div>	
											<h4 class="text-center text-success">Receipt  Items</h4>
											<div class="table-responsive mt-3">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Received From
															</th>
															<th class="text-center">
																Deposit Into
															</th>
															<th class="text-center">
															   Amount
															</th>
															<th class="text-center">
															   Memo
															</th>					
															<th class="text-center">
															  
															</th>															
														</tr>
													</thead>
													<tbody>
													<tr>  
														<td width="30%"><select  class="form-control" id="received_from"  name="received_from[]" required="required" data-validation-required-message="Please select received from.">
															<option value="">Select Received From </option>
														</select>
														<p class="help-block text-danger"></p><span>10,000</span></td>  
														<td width="20%"><select  class="form-control" id="deposit_into"  name="deposit_into[]" required="required" data-validation-required-message="Please Select deposit into.">
															<option value="">Select Deposit Into </option>
															<option value="1">Current account</option>
															<option value="2">Petty Cash account</option>															
														</select>
														<p class="help-block text-danger"></p><span>10,000</span></td>  
														<td width="20%"><input type="text" name="amount[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  
														<td width="20%"><input type="text" name="memo[]" class="form-control name_list"  /></td>  
														<td width="20%"><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>  
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select  class="form-control" id="received_from"  name="received_from[]" required="required" data-validation-required-message="Please select received from."><option value="">Select Received From </option></select><p class="help-block text-danger"></p></td><td><select  class="form-control" id="deposit_into"  name="deposit_into[]" required="required" data-validation-required-message="Please Select Deposit Into."><option value="">Select Deposit Into </option><option value="1">Current account</option><option value="2">Petty Cash account</option></select></td><td><input type="text" name="amount[]"  class="form-control numberOnly  name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="memo[]"  class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		}); 
		
		
		
		$('input[id="receipt_date"]').on('change', function(e){ 
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
			document.getElementById("day").value =day;
      
		});


	});

</script>

</body>
</html>