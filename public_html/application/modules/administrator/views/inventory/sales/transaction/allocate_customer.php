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
                        <h1>Customer Allocations</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/customerallocation');?>">Customer Allocations</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
			  <form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="container">
				<div class="row ">
						<div class="form-group col-md-3">						
						</div>
					<div class="form-group col-md-5 text-center">
						<label for="inputAddress2">Select a Customer</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Customers</option>
						</select>		
					</div>
					<div class="form-group col-md-3">
					</div>
				</div>
				<div class="row ">
						<div class="form-group col-md-3">						
						</div>
					<div class="form-group col-md-5 text-center">
						<label for="inputAddress2">Show Settled Items:</label>
					  <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">												
					</div>
					<div class="form-group col-md-3">
					</div>
				</div>
				</div>
			<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">		
							<th class="text-center">Transaction Type</th>
							<th class="text-center">#</th>
							<th class="text-center">Reference</th>
							<th class="text-center">Date</th>
							<th>Total</th>
							<th>Left to Allocate</th>
							<th>Status</th>
							<th width="20%">Action</th>		
						</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="11" class="text-center" >No record.</td>
					</tr>													
					</tbody>													
				</table> 
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