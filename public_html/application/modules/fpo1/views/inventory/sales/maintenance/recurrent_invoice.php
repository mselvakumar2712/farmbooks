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
                        <h1>Recurrent Invoices</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/recurrentinvoice');?>">Recurrent Invoices</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
		        <form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
				<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">		
							<th class="text-center">Description</th>
							<th class="text-center">Template No</th>
							<th class="text-center">Customer</th>
							<th class="text-center">Sales Groups</th>
							<th class="text-center">Days</th>
							<th class="text-center">Monthly</th>
							<th class="text-center">Begin</th>
							<th class="text-center">End</th>
							<th class="text-center">Last Created</th>
							<th class="text-center"></th>
							<th class="text-center"></th>	
						</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="11" class="text-center" >No records.</td>
					</tr>													
					</tbody>
				</table> 
				</div>
			<div class="container">
				<div class="row ">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Description<span class="text-danger">*</span></label>
						<input  class="form-control" type="text"  placeholder="Description" id="description" name="description" required="required"  data-validation-required-message="Please enter description.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Template<span class="text-danger">*</span></label>
						<select  class="form-control" id="template"  name="template"required="required"  data-validation-required-message="Please select template.">
							<option value="">Select Template </option>
							<option value="1">Default</option>	
						</select> 
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Customer<span class="text-danger">*</span></label>
						<select  class="form-control" id="customer"  name="customer"required="required"  data-validation-required-message="Please select customer.">
							<option value="">Select Customer </option>
							<option value="1">Default</option>
						</select>  
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Branch<span class="text-danger">*</span></label>
						<select  class="form-control" id="branch"  name="branch" required="required"  data-validation-required-message="Please select branch.">
							<option value="">Select Branch </option>
							<option value="1">Default</option>
						</select>   
						<p class="help-block text-danger"></p>
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="inputAddress2">Days</label>
						<input type="text" class="form-control numberOnly"  value="0" maxlength="10" id="days" name="days"  placeholder="Days">				
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Monthly</label>
						<input type="text" class="form-control numberOnly" maxlength="10" value="0" id="monthly" name="monthly" placeholder="Monthly">
						<div class="help-block with-errors text-danger"></div>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Begin<span class="text-danger">*</span></label>
						<input type="date" class="form-control"  id="begin" name="begin"required="required"  data-validation-required-message="Please select begin date.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">End<span class="text-danger">*</span></label>
						<input type="date" class="form-control"  id="end" name="end"required="required"  data-validation-required-message="Please select end date." >
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
            	</form>			
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
   </body>
</html>