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
                        <h1>Bank Accounts</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Finance</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/finance/bank_accounts');?>">Bank Accounts</a></li>
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
									<div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">		
													<th class="text-center">Tag Name</th>
													<th class="text-center">Tag Description</th>
													<th class="text-center"></th>
												</tr>
											</thead>
											<tbody>
											<tr>
												<td colspan="3" class="text-center" >No records.</td>
											</tr>													
											</tbody>
											<tbody>
											<tr>
												<td colspan="2" class="text-left" ><input type="checkbox" id="in_active" name="in_active">  show also Inactive</td>
												<td colspan="1" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">	</td>
											</tr>													
											</tbody>
										</table> 
									</div>
									<div class="container-fluid">                                            
										<div class="row ">
											<div class="form-group col-md-4">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Tag Name</label>
												<input  class="form-control" type="text"  placeholder="Tag Name" id="tag_name" name="tag_name" required="required"  data-validation-required-message="Please enter tag name.">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row ">
											<div class="form-group col-md-4">
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Tag Description</label>
												<textarea  class="form-control" id="tag_description" placeholder="Tag Description" name="tag_description" rows="3"></textarea>
											</div>	
										</div>
										<div class="form-row">
											<div class="form-group col-md-12 text-center">
											<div id="success"></div>
											<input id="sendMessageButton" value="Add New" class="btn btn-success text-center" type="submit">							
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