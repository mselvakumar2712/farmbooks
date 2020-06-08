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
                        <h1>Reconcile Bank Account</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/reconcilebankaccount');?>">Reconcile Bank Account </a></li>
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
						  <div class="row ">
								<div class="form-group col-md-2">
							</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Account<span class="text-danger">*</span></label>
									<select  class="form-control" id="account"   name="account" required="required" data-validation-required-message="Please select account.">
										<option value="">Select Account </option>
										<option value="1" selected>Current account</option>
										<option value="2">Petty Cash account </option>
									</select>
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">	Bank Statement<span class="text-danger">*</span></label>
									<select  class="form-control" id="bank_statement"   name="bank_statement" required="required" data-validation-required-message="Please select bank statement.">
										<option value="">Select Bank Statement </option>
										<option value="1"selected>New</option>
									</select>
									<p class="help-block text-danger"></p>
								</div>
							</div>
							<div class="table-responsive">  
								<table class="table table-bordered">
									<thead>
										<tr bgcolor="#afd66b">		
											<th class="text-center">Reconcile Date</th>
											<th class="text-center">Beginning Balance</th>
											<th class="text-center">Ending Balance</th>
											<th class="text-center">Account Total</th>
											<th class="text-center">Reconciled Amount</th>
											<th class="text-center">Difference</th>
										</tr>
									</thead>
									<tbody>
									<tr>
										<td><input  class="form-control" type="date"  id="reconcile_date" name="reconcile_date" ></td>
										<td><input  class="form-control numberOnly" value="0.00" type="text"  id="beginning_balance" name="beginning_balance" ></td>
										<td><input  class="form-control numberOnly" value="0.00" type="text"  id="ending_balance" name="ending_balance" ></td>
										<td><input  class="form-control numberOnly" value="0.00"  readonly type="text"  id="account_total" name="account_total" ></td>
										<td><input  class="form-control numberOnly" value="0.00"  readonly type="text"  id="reconciled_total" name="reconciled_total" ></td>
										<td><input  class="form-control numberOnly" value="0.00"  readonly type="text"  id="difference" name="difference" ></td>
									</tr>													
									</tbody>
								</table> 
							</div>
							<h5 class="text-center text-success">Current account - USD</h5>
						  <table id="example" class="table table-striped table-bordered mt-3" width="100%">
							<thead>
								<tr>
								<th>Type</th>
								<th>#</th>
								<th>Reference</th>
								<th>Date</th>								
								<th>Debit</th>
								<th>Credit</th>
								<th>Person/Item</th>
								<th></th>
								<th>Action</th>																
								</tr>
							</thead>
							<tbody id="ledgerlist">
							</tbody>
						  </table>
						   <div class="form-row">
							  <div class="form-group col-md-12 text-center">
							  <div id="success"></div>
								<input id="sendMessageButton" value="Reconcile" class="btn btn-success text-center" type="submit">
								<a href="" class="btn btn-outline-dark">Back</a>	
							  </div>							 
						   </div>
						 </div>
                    </div>
                </div>
				</form>
              </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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