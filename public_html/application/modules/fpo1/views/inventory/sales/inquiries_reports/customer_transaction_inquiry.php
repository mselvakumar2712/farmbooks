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
                        <h1>Customer Transactions</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/customertransactioninquiry');?>">Customer Transactions</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
			  <form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container-fluid">
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Select a Customer</label>
						<select  class="form-control" id="customers"  name="customers" required="required" data-validation-required-message="Please select customers.">
							<option value="">Select Customers</option>
							<option value="1">All Customers</option>
						</select>		
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
						<label for="inputAddress2">Types</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Types</option>
							<option value="1">Sales Invoice</option>
							<option value="2">Overdue Invoice</option>
							<option value="3">Payments</option>
							<option value="4">Credit Invoice</option>
							<option value="5">Delivery Notes</option>
						</select>
					</div>
					<div class="form-group col-md-1 " >
						<label for="inputAddress2" ></label>
						<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
					</div>					
				</div>
				</div>
				<div class="table-responsive">  
					<table class="table table-bordered">
						<thead>
							<tr bgcolor="#afd66b">
								<th class="text-center">
									Currency
								</th>
								<th class="text-center">
									Terms
								</th>
								<th class="text-center">
									Current
								</th>
								<th class="text-center">
								  1-30 Days
								</th>
								<th class="text-center">
								 31-60 Days
								</th>
								<th class="text-center">
								  Over 60 Days	
								</th>
								<th class="text-center">
								 Total Balance
								</th>
							</tr>
						</thead>
						<tbody>
						<tr>
						   <td>GBP</td>
						   <td>Payment due within 10 days</td>
						   <td>0.00</td>
						   <td>0.00</td>
						   <td>0.00</td>
						   <td>0.00</td>
						   <td>0.00</td>
						</tr>
						</tbody>													
					</table>
				 </div>
				 <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							  <table id="example" class="table table-striped table-bordered" width="100%">
								<thead>
									<tr>
									<th>Type</th>
									<th>#</th>
									<th>Reference</th>
									<th>Order</th>
									<th>Reference</th>
									<th>Date</th>
									<th>Branch</th>
									<th>Due Date</th>
									<th>Debit</th>
									<th>Credit</th>
									</tr>
								</thead>
								<tbody id="figlist">
								</tbody>
							  </table>
							 </div>
						</div>
					</div>
				  </div>
				</form>
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