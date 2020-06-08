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
                        <h1>Chart of Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/gl_accounts');?>">Chart of Accounts</a></li>
                            <!--<li class="active">List FIG </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="container-fluid">                                            
										<div class="row ">
											<div class="form-group col-md-3">						
											</div>
											<div class="form-group col-md-5 text-center">
												<select  class="form-control" id="accounts"  name="accounts" >
													<option value="1"selected>New Account</option>
												</select>		
											</div>
											<div class="form-group col-md-3 text-left">
												<label for="inputAddress2">Show inactive:</label>
											  <input type="checkbox" id="item" name="item" class="form-check-input ml-2" required="required" data-validation-required-message="Please Check form of fertilizer.">												
											</div>
										</div>
										<div class="row ">
												<div class="form-group col-md-3">						
												</div>
											
											<div class="form-group col-md-3">
											</div>
										</div>
										<div class="row ">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Account Code</label>
													<input  class="form-control" type="text"  placeholder="Account Code" id="account_code" name="account_code" required="required"  data-validation-required-message="Please enter account code.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Account Code 2</label>
													<input  class="form-control" type="text"  placeholder="Account Code 2" id="account_code2" name="account_code2">
												</div>
												<div class="form-group col-md-5">
													<label for="inputAddress2">Account Name</label>
													<input  class="form-control" type="text"  placeholder="Account Name" id="account_name" name="account_name">
												</div>						
										</div>
										<div class="row ">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Account Group</label>
												<select  class="form-control" id="account_group"  name="account_group">
													<option value="">Select Account Group </option>
												</select>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Account Status</label>
												<select  class="form-control" id="account_status"  name="account_status">
													<option value="">Select Account Status </option>
													<option value="1"selected>Active</option>
													<option value="2">Inactive</option>
												</select>
											</div>
											<div class="form-group col-md-5">
												<label for="inputAddress2">Account Tags</label>
												<select  class="form-control"  multiple id="account_tags"  name="account_tags">
													<option value=""selected>No active tags defined</option>
													
												</select>
											</div>
										</div>
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Add Account" class="btn btn-success text-center" type="submit">							
											  </div>											 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>						
				</form>
			</div>
		</div>
      </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>         
    <?php $this->load->view('templates/bottom.php');?> 
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
   </body>
</html>