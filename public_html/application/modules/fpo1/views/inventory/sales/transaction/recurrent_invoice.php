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
                        <h1>Create and Print Recurrent Invoices</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/printrecurrentinvoice');?>">Create and Print Recurrent Invoices</a></li>
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
					<div class="form-group col-md-4">
					</div>
					<div class="form-group col-md-3 text-center">
						<label for="inputAddress2">Invoice Date </label>
						<input  class="form-control" type="date"  value="<?php echo date('Y-m-j'); ?>"  id="from_date" name="from_date" required="required"  data-validation-required-message="Please select date.">
						<p class="help-block text-danger"></p>
					</div>							
					<div class="form-group col-md-4 ">
						
					</div>
				</div>
				</div>
			<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">
							<th class="text-center">Description</th>			
							<th class="text-center">Template No</th>
							<th class="text-center">Customer</th>
							<th class="text-center">Branch/Group</th>								
							<th class="text-center">Days</th>
							<th class="text-center">Monthly</th>
							<th class="text-center">Begin</th>
							<th class="text-center">End</th>
							<th class="text-center">Last Created</th>		
						</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="11" class="text-center" >No recurrent invoices are due.</td>
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
        


	});
</script>