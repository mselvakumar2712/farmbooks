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
                        <h1>Supplier Allocations</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/supplierallocation');?>">Supplier Allocations</a></li>
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
						<label for="inputAddress2">Select Supplier</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Supplier</option>
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
			 <div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
						  <table id="example" class="table table-striped table-bordered" width="100%">
							<thead>
								<tr>
								<th>Transaction Type</th>
								<th>#</th>
								<th>Reference</th>
								<th>Date</th>
								<th>Supplier</th>							
								<th>Currency</th>
								<th>Total</th>
								<th>Left to Allocate</th>
								<th>Status</th>
								<th width="20%">Action</th>																
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