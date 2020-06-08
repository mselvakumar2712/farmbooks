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
                        <h1>Tax Types</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							   <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/Finance/tax');?>">Tax Types</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
		         <form   id="" name="sentMessage"  action="" novalidate="novalidate" >
				<p class="text-danger text-center">To avoid problems with manual journal entry all tax types should have unique Sales/Purchasing GL accounts.</p>
			<div class="container">
				<div class="row ">
				 <div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">		
							<th class="text-center">Description</th>
							<th class="text-center">Default Rate (%)</th>
							<th class="text-center">Sales GL Account</th>
							<th class="text-center">Purchasing GL Account</th>	
							<th class="text-center"></th>
							<th class="text-center"></th>							
						</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="6" class="text-center" >No records.</td>
					</tr>													
					</tbody>
					<tbody>
					<tr>
						<td colspan="5" class="text-center" >  <input type="checkbox" id="in_active" name="in_active" class="form-check-input">Show also Inactive</td>
						<td colspan="1" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
					</tr>													
					</tbody>
				</table> 
				</div>
				</div>
					<div class="row">
					<div class="form-group col-md-6">
						<label for="inputAddress2">Description</label>
						<textarea type="text" class="form-control" rows="3" id="description" name="description" maxlength="100" placeholder="Description"></textarea>					
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddress2">Default Rate (%)</label>
						<input  class="form-control numberOnly" type="text"  placeholder="Default Rate" id="default_rate" maxlength="2" name="default_rate" required="required"  data-validation-required-message="Please enter area name.">
						<p class="help-block text-danger"></p>
					</div>
										
				</div>
				<div class="row">
				  <div class="form-group col-md-6">
						<label for="inputAddress2">Sales GL Account</label>
						<select id="sales_gl_account" name="sales_gl_account" class="form-control" >
						<option value="">Select Sales GL Account</option>
						<option value="1">Checking Account</option>
						<option value="2">Petty Cash</option>
						</select>							
					</div>
					<div class="form-group col-md-6">
						<label for="inputAddress2">Purchasing GL Account</label>
						<select id="purchasing_gl_account" name="purchasing_gl_account" class="form-control" >
						<option value="">Select Purchasing GL Account<</option>
						<option value="1">Checking Account</option>
						<option value="2">Petty Cash</option>
						</select>							
					</div>
				</div>
				 <div class="row">
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