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
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Live Stocks </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/livestockslist');?>">Live Stocks</a></li>
                            <li class="active"> Add Live Stocks </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form   action="<?php echo base_url('administrator/masterdata/post_live_stocks')?>"  method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Live Stock <span class="text-danger">*</span></label>
												  <select  class="form-control" id="livestock_type" name="livestock_type" required="required" data-validation-required-message="Please Select type of live stock .">
													<option value="">Select Live Stock</option>
													<option value="1">Animals</option>
													<option value="2">Birds</option>
													<option value="3">Others</option>
												  </select>
												  <p class="help-block text-danger"></p>
											    </div>
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the live stock <span class="text-danger">*</span></label>
													<input type="text" class="form-control"   maxlength="50" id="livestock_name" name="livestock_name" placeholder="Name of the live stock" required="required" data-validation-required-message="Please enter name of the live stock .">
													<p class="help-block text-danger"></p>
												</div>
											</div>															   										
											<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/livestockslist');?>" class="btn btn-outline-dark">Cancel</a>	
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