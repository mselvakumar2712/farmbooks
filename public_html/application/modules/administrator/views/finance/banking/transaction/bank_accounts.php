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
                        <h1>Transfer between Bank Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Finance</a></li>
                            <li><a href="<?php echo base_url('administrator/finance/bankaccounts');?>"class="active">Transfer between Bank Accounts</a></li>
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
													<label for="inputAddress2">From Account<span class="text-danger">*</span></label>
													<select  class="form-control" id="from_acc" name="from_acc" required="required" data-validation-required-message="Please select from account.">
														<option value="">Select  Account </option>
														<option value="1"selected>Current Account</option>
														<option value="2">Petty Cash Amount</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Amount<span class="text-danger">*</span></label>
													<input  class="form-control numberOnly" type="text"  placeholder="Amount"  id="amount" name="amount" required="required"  data-validation-required-message="Please enter amount.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Bank Balance </label>
													<input  class="form-control" type="text"  placeholder="Bank Balance"  id="bank_balance" name="bank_balance" readonly  data-validation-required-message="Please enter bank balance.">
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Bank Charge<span class="text-danger">*</span></label>
													<input type="text numberOnly" class="form-control" id="bank_charge" name="bank_charge" placeholder="Bank Charge" required="required" data-validation-required-message="Please enter bank charge.">
													<p class="help-block text-danger"></p>
												</div>																																				
											</div>	
											<div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">To Account<span class="text-danger">*</span></label>
													<select  class="form-control" id="to_account" name="to_account" required="required"  data-validation-required-message="Please select to account.">
														<option value="">Select To Account </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Transfer Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"   id="transfer_date" name="transfer_date" required="required"  data-validation-required-message="Please select transfer date .">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Reference<span class="text-danger">*</span></label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" required="required"  data-validation-required-message="Please enter reference.">
													<p class="help-block text-danger"></p>
												</div>	
											</div>
											<div class="row ">
											<div class="form-group col-md-3">
											</div>
											<div class="form-group col-md-6 text-center">
													<label for="inputAddress2">Memo</label>
													<textarea class="form-control " name="memo" rows="3" placeholder="Memo" id="memo"></textarea>
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="item_code[]" placeholder="Item Code" class="form-control  name_list" required="required"  /></td>  <td><select  class="form-control" id="item_description"  name="item_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Item Description </option></select><p class="help-block text-danger"></p></td>  <td><input type="text numberOnly" name="qty[]" placeholder="Qty" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="received[]" placeholder="Received" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="unit[]" placeholder="Unit" class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="date" name="delivery_date[]"  class="form-control name_list" required="required" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="price[]" placeholder="Price" class="form-control name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="line_total[]" placeholder="Line Total" class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>