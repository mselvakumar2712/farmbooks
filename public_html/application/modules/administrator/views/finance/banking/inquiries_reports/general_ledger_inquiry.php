<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
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
                        <h1>General Ledger Inquiry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/glinquiry');?>">General Ledger Inquiry</a></li>
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
													<label for="inputAddress2">Account</label>
													<select  class="form-control" id="acccount"  name="account" required="required" data-validation-required-message="Please select receive into.">
														<option value="">All Accounts</option>
														<option value="1">Default</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">From</label>
													<input  class="form-control" type="date"   id="from" name="from">		
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">To</label>
													<input  class="form-control" type="date"   id="to" name="to">		
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Amount Min</label>
													<input  class="form-control" type="text" value="0.00" id="amount_min" name="amount_min" >
													<p class="help-block text-danger"></p>
												</div>	
											</div>				
											<div class="row ">
												<div class="form-group col-md-3">	
												</div>											
												<div class="form-group col-md-2">
													<label for="inputAddress2">Amount Max</label>
													<input  class="form-control" type="text" value="0.00" id="amount_max" name="amount_max" >
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Dimension</label>
													<select  class="form-control" id="dimension"  name="dimension" required="required" data-validation-required-message="Please Select dimension.">
														<option value="">Select Dimension </option>
														<option value="1">1 Support</option>
														<option value="2">2 Development</option>															
													</select>
													<p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-3 mt-3">
													<label for="inputAddress2" ></label>
													<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
												</div>
											 </div>
											</div>
											<div class="table-responsive">  
												<table class="table table-bordered">
													<thead>
														<tr bgcolor="#afd66b">		
															<th class="text-center">Type</th>
															<th class="text-center">#</th>
															<th class="text-center">Date</th>
															<th class="text-center">Account</th>
															<th class="text-center">Dimension</th>
															<th class="text-center">Person/Item</th>
															<th class="text-center">Debit</th>
															<th class="text-center">Credit</th>
															<th class="text-center">Memo</th>
															<th class="text-center">Action</th>		
														</tr>
													</thead>
													<tbody>
													<tr>
														<td colspan="12" class="text-center" >No general ledger transactions have been created for the specified criteria..</td>
													</tr>													
													</tbody>													
												</table> 
											</div>
										</div>
									</div>
								</div>
							</div>						
						</form>
					</div>
				</div>
			</div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	 <?php $this->load->view('templates/datatable.php');?>	   
   </body>
</html>
<script type="text/javascript">
	$(document).ready(function() {          
        
        $('#example').DataTable();


	});
</script>