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
                        <h1>Search Not Invoiced Deliveries</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/invoicesalesdelivery');?>">Search Not Invoiced Deliveries</a></li>
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
						<label for="inputAddress2">From <span class="text-danger">*</span></label>
						<input  class="form-control" type="date"    id="from_date" name="from_date" required="required"  data-validation-required-message="Please select date.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">To <span class="text-danger">*</span></label>
						<input  class="form-control" type="date"  id="to_date" name="to_date" required="required"  data-validation-required-message="Please select due date.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Location</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Location</option>
							<option value="1">Default</option>
						</select>
					</div>
				</div>
				
				<div class="row ">
					<div class="form-group col-md-1">
					</div>					
					<div class="form-group col-md-2">
						<label for="inputAddress2">Item</label>
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
						<label for="inputAddress2">Select a Customers</label>
						<select  class="form-control" id="receive_into"  name="receive_into" required="required" data-validation-required-message="Please select receive into.">
							<option value="">All Customers</option>
						</select>		
					</div>
					<div class="form-group col-md-1 ">
						<label for="inputAddress2" ></label>
						<input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
					</div>
				</div>
				</div>
			<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">
							<th class="text-center">Delivery #</th>			
							<th class="text-center">Customer</th>
							<th class="text-center">Branch</th>
							<th class="text-center">Contact</th>
							<th class="text-center">Reference</th>
							<th class="text-center">Cust Ref</th>
							<th class="text-center">Delivery Date</th>
							<th class="text-center">Due By</th>
							<th class="text-center">Delivery Total</th>
							<th class="text-center">Currency</th>
							<th class="text-center">Batch</th>	
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