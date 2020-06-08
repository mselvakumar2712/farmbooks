<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>Add State</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/statelist');?>">State</a></li>
                            <li class="active">Add State</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form   id="stateform" name="sentMessage" action="<?php echo base_url('administrator/masterdata/post_state')?>" method="post" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State Name (In English) <span class="text-danger">*</span></label>
													<input class="form-control" id="state_name" name="state_name"   placeholder="State Name In English" required="required"  data-validation-required-message="Please enter state name.">				
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State Name (In Local Language) <span class="text-danger">*</span></label>
													<input type="text" class="form-control "  id="state_name_local" name="state_name_local" placeholder="State Name In Local Language"  required="required" data-validation-required-message="Please enter state name in local language.">
													<p class="help-block text-danger"></p>
												</div>
											 </div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/statelist');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>
											 
											  </div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		
     <?php $this->load->view('templates/footer.php');?>         
     <?php $this->load->view('templates/bottom.php');?>
		<?php $this->load->view('templates/datatable.php');?>	  
     <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	  <script src="<?php echo asset_url()?>js/register.js"></script>
	 
</body>
</html>