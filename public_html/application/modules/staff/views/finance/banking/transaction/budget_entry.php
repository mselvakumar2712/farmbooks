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
                        <h1>Budget</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a href="<?php echo base_url('administrator/finance/budgetentry');?>"class="active">Budget</a></li>
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
													<label for="inputAddress2">Fiscal Year<span class="text-danger">*</span></label>
													<select  class="form-control" id="fiscal_year"   name="fiscal_year" required="required" data-validation-required-message="Please select fiscal year.">
														<option value="">Select Fiscal Year </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Account Code<span class="text-danger">*</span></label>
													<select  class="form-control" id="account_code"   name="account_code" required="required" data-validation-required-message="Please select account code.">
														<option value="">Select Account Code </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Dimension<span class="text-danger">*</span></label>
													<select  class="form-control" id="dimension"   name="dimension" required="required" data-validation-required-message="Please select dimension.">
														<option value="">Select Dimension </option>
														<option value="1">1 Software</option>
														<option value="2">2 Development</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
													
											</div>												
											<div class="table-responsive">  
											<table class="table table-bordered">
												<thead>
													<tr bgcolor="#afd66b">		
														<th class="text-center">Period</th>
														<th class="text-center">Amount</th>
														<th class="text-center">Dim.uncl.</th>
														<th class="text-center">Last Year</th>
													</tr>
												</thead>
												<tbody>
												<tr>
													<td colspan="4" class="text-center" >No records.</td>
												</tr>													
												</tbody>
												<tbody>
												<tr>
													<td  class="text-left" >Total</td>
													<td  class="text-right" >0</td>
													<td  class="text-right" >0</td>
													<td  class="text-right" >0</td>
												</tr>													
												</tbody>
											</table> 
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="account_code[]"  class="form-control  name_list" required="required"  /></td>  <td><select  class="form-control" id="account_description"  name="account_description[]" required="required" data-validation-required-message="Please select item description."><option value="">Select Account Description </option></select><p class="help-block text-danger"></p></td><td><select  class="form-control" id="dimension"  name="dimension[]" required="required" data-validation-required-message="Please Select Dimension."><option value="">Select Dimension </option><option value="1">1 Support</option><option value="2">2 Development</option></select></td><td><input type="text" name="amount[]"  class="form-control numberOnly  name_list" required="" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="memo[]"  class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>