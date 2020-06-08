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
                        <h1>Customer Allocation Inquiry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/customerallocationinquiry');?>">Customer Allocation Inquiry</a></li>
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
							<option value="">All Customers</option>
						</select>		
					</div>	
					<div class="form-group col-md-3">
						<label for="inputAddress2">From</label>
						<input  class="form-control" type="date"   id="from_date" name="from_date">		
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">To</label>
						<input  class="form-control" type="date"   id="to_date" name="to_date">		
					</div>
					<div class="form-group col-md-3">
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
				</div>
				<div class="row ">
					<div class="form-group col-md-4">						
					</div>
					<div class="form-group col-md-3 text-center mt-2">
					    <label for="inputAddress2">Show Settled:</label>
					   <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">																	 
					</div>					
					<div class="form-group col-md-2">
					 <input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-2" type="submit">
					</div>
					<div class="form-group col-md-2">						
					</div>
				</div>
				</div>				
				<div class="table-responsive mt-4">  
					<table class="table table-bordered">
						<thead>
							<tr bgcolor="#afd66b">
								<th class="text-center">
									Type
								</th>
								<th class="text-center">
									#
								</th>
								<th class="text-center">
									Reference
								</th>
								<th class="text-center">
								    Order
								</th>
								<th class="text-center">
								    Date
								</th>
								<th class="text-center">
								  Due Date
								</th>
								<th class="text-center">
								 Debit
								</th>
								<th class="text-center">
								 Credit
								</th>
								<th class="text-center">
								 Allocated
								</th>
								<th class="text-center">
								 Balance
								</th>
							</tr>
						</thead>
						<tbody>
						<tr>
						   <td colspan="11" class="text-center">No records</td>
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

		$(function(){
		 
			var dtToday = new Date();    
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if(month < 10)
			month = '0' + month.toString();
			if(day < 10)
			day = '0' + day.toString();
		  
			var maxDate = year + '-' + month + '-' + day;
			$('#from_date').attr('max', maxDate);
			$('#to_date').attr('max', maxDate);
		
		});

	});
</script>