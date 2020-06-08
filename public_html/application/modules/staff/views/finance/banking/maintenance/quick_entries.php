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
                        <h1>Bank Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/bank_accounts');?>">Bank Accounts</a></li>
                            <!--<li class="active">List FIG </li>-->
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
										<div class="table-responsive">  
											<table class="table table-bordered">
												<thead>
													<tr bgcolor="#afd66b">		
														<th class="text-center">Description</th>
														<th class="text-center">Type</th>
														<th class="text-center"></th>
													</tr>
												</thead>
												<tbody>
												<tr>
													<td colspan="3" class="text-center" >No records.</td>
												</tr>													
												</tbody>
											</table> 
										</div>
										<div class="container-fluid">                                            
											<div class="row ">
												<div class="form-group col-md-4">
												<label for="inputAddress2">Description</label>
												<textarea  class="form-control" placeholder="Description" id="description"  name="description" rows="3"></textarea>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Entry Type</label>
													<select  class="form-control" id="entry_type"  name="entry_type">
														<option value="">Select Entry Type </option>
														<option value="1"selected>Bank Deposit</option>
														<option value="2">Bank Payment</option>
														<option value="3">Journal Entry</option>
														<option value="4">Supplier Invoice/Credit</option>
													</select>
												</div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">Base Amount Description</label>
												<textarea  class="form-control" placeholder="Base Amount Description" id="bank_amount_desc"  name="bank_amount_desc" rows="3"></textarea>
												</div>				
											</div>
											<div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Default Base Amount</label>
													<input  class="form-control" type="text"  placeholder="Default Base Amount" value="0.00" id="base_amount" name="base_amount" required="required"  data-validation-required-message="Please enter base amount.">				
													<p class="help-block text-danger"></p>
												</div>				
											</div>
											<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Add New" class="btn btn-success text-center" type="submit">							
											  </div>										 
											 </div>
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
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
   </body>
</html>