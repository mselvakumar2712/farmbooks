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
                        <h1>Journal Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a href="<?php echo base_url('administrator/finance/journalentry');?>"class="active">Journal Entry</a></li>
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
													<label for="inputAddress2">Date <span class="text-danger">*</span></label>
													<input  class="form-control" type="date"  id="journal_date" name="journal_date" required="required"  data-validation-required-message="Please select date.">
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Reference</label>
													<input  class="form-control"   id="ref" name="ref" placeholder="Reference" >
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4 text-center mt-4">
													<label for="inputAddress2">Reverse Transaction</label>
												  <input type="checkbox" id="reverse_transaction" name="reverse_transaction" class="form-check-input ml-2">												
												</div>													
											</div>
											<h4 class="text-center text-success">Rows</h4>
											<div class="table-responsive mt-3">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Ledger Entry
															</th>
															<th class="text-center">
															   Debit
															</th>
															<th class="text-center">
															   Credit
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
														<td width="30%"><input type="text" name="ledger_entry[]"  class="form-control  name_list" required="required"  /></td>  
														<td width="10%"><input type="text" name="debit[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  
														<td width="10%"><input type="text" name="credit[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  													
														<td width="20%"><input type="text" name="memo[]" class="form-control name_list"  /></td>  
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="ledger_entry[]"  class="form-control  name_list" required="required"  /></td><td><input type="text" name="debit[]"  class="form-control numberOnly  name_list" required="" /><p class="help-block text-danger"></p></td><td><input type="text" name="credit[]"  class="form-control numberOnly  name_list" /><p class="help-block text-danger"></p></td>  <td><input type="text" name="memo[]"  class="form-control name_list" required="" /></td>  <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		});


		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  


	});

</script>

</body>
</html>