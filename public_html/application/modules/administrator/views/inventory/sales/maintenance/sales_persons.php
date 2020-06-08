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
                        <h1>Sales Persons</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Inventory</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/inventory/salestypes');?>">Sales Persons</a></li>
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
							<th class="text-center">Name</th>
							<th class="text-center">Phone</th>
							<th class="text-center">Fax</th>
							<th class="text-center">Email</th>
							<th class="text-center">Provision</th>
							<th class="text-center">Break Pt.</th>
							<th class="text-center">Provision 2</th>
							<th class="text-center"></th>
							<th class="text-center"></th>	
						</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="9" class="text-center" >No records.</td>
					</tr>													
					</tbody>
					<tbody>
					<tr>
						<td colspan="8" class="text-center" >  <input type="checkbox" id="in_active" name="in_active" class="form-check-input">show also Inactive</td>
						<td colspan="1" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
					</tr>													
					</tbody>
				</table> 
				</div>
			<div class="container">
				<div class="row ">
					<div class="form-group col-md-4">
						<label for="inputAddress2">Sales Person Name<span class="text-danger">*</span></label>
						<input  class="form-control" type="text"  placeholder="Sales Person Name" id="sales_person_name" name="sales_person_name" required="required"  data-validation-required-message="Please enter sales person name.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Mobile Number<span class="text-danger">*</span></label>
						<input type="text" class="form-control numberOnly" maxlength="10" id="mobile_num" pattern="^[6-9]\d{9}$" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
					    <p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Fax Number<span class="text-danger">*</span></label>
						<input type="text" class="form-control numberOnly" maxlength="30" id="fax_num" name="fax_num" placeholder="Fax Number" required="required" data-validation-required-message="Please enter fax number.">
					    <p class="help-block text-danger"></p>
					</div>					
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="inputAddress2">Email <span class="text-danger">*</span></label>
						<input type="email" class="form-control"  id="email" name="email" placeholder="Email " required="required" data-validation-required-message="Please enter email.">
						<div class="help-block with-errors text-danger"></div>
					</div>
					<div class="form-group col-md-2">
						<label for="inputAddress2">Provision(%)</label>
						<input type="text" class="form-control numberOnly"  value="0.0" maxlength="10" id="provision" name="provision"  placeholder="Provision Number ">				
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Break Pt</label>
						<input type="text" class="form-control numberOnly" maxlength="10" value="0.0" id="break_pt" name="break_pt" placeholder="Break Pt">
						<div id="mbl_validate" class="help-block with-errors text-danger"></div>
					</div>
					<div class="form-group col-md-3">
						<label for="inputAddress2">Provision 2(%)</label>
						<input type="text" class="form-control numberOnly" maxlength="10" value="0.0" id="provision_2" name="provision_2" placeholder="Provision 2">
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