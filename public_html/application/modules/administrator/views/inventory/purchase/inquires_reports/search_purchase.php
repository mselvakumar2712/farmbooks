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
                        <h1>Search Purchase Orders</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/searchpurchaseorder');?>">Search Purchase Orders</a></li>
                            <!--<li class="active">List FIG </li>-->
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
						<label for="inputAddress2">#</label>
						<input  class="form-control" type="text"  placeholder="" id="id" name="id" >
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
					<div class="form-group col-md-3">
						<label for="inputAddress2">Into Location</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Location</option>
							<option value="1">Default</option>
						</select>
					</div>		
				</div>
				
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">For Item</label>
						<input  class="form-control" type="text"  placeholder="" id="id" name="id" >
						<p class="help-block text-danger"></p>
					</div>	
					<div class="form-group col-md-3 mt-2">
						<label for="inputAddress2"></label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Items</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Select Supplier</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Suppliers</option>
						</select>		
					</div>
					<div class="form-group col-md-3 mt-4">
						<label for="inputAddress2" ></label>
						<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
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
								<th>#</th>
								<th>Reference</th>
								<th>Supplier</th>
								<th>Location</th>								
								<th>Supplier's Reference</th>
								<th>Order Date</th>
								<th>Currency</th>
								<th>Order Total</th>
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