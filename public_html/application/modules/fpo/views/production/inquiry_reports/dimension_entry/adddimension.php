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
                        <h1>Add Dimension Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Production Management</a></li>
							<li><a href="#">Transactions</a></li>
                            <li><a href="<?php echo base_url('fpo/production/dimensionEntry'); ?>">Dimension Entry</a></li>
							<li><a class="active" href="#">Add Dimension Entry</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('info')){?>
					<div class="alert alert-info alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('info');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('warning')){?>
					<div class="alert alert-warning alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('warning');?></strong> 
					</div>
            <?php }?>
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/production/postWorkOrder'); ?>" method="post" id="add_work_order_form" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space"> 
													<div class="form-group col-md-4">
														<label for="">Reference No.</label>
														<input type="text" class="form-control" maxlength="18" id="reference_no" name="reference_no" placeholder="Reference Number">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Type </label>
														<select class="form-control" id="type" name="type" >
															<option value="">Select Type</option>
															<option value="1">Assemble</option>
															<option value="2">Unassemble</option>
															<option value="3">Advanced Manufacture</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="">Start Date</label>
														<input type="date" class="form-control" id="start_date" name="start_date" placeholder="">
													</div>
												</div>
																								
												<div class="row row-space">													
													<div class="form-group col-md-4">
														<label for="">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" id="name" name="name" required="required" data-validation-required-message="Please enter the name" placeholder="Name">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Tags <span class="text-danger">*</span></label>
														<select class="form-control" id="tag_value" name="tag_value">
															<option value="">Select tags</option>
															<option value="1">Support</option>
															<option value="2">Development</option>
															<option value="3">Analize</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="">Date Required By</label>
														<input type="date" class="form-control" id="date_required" name="date_required" placeholder="">
													</div>
												</div>
												
												<div class="row row-space">
													<div class="form-group col-md-6">
														<label for="memo">Memo</label>
														<textarea id="memo" maxlength="150" name="memo" class="form-control"></textarea>
													</div>
												</div>
										</div>										
										<div class="row row-space">
											<div class="form-group col-md-12 text-center">
											<div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Dimension Entry</button>
											<a href="<?php echo base_url('fpo/production/dimensionEntry');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>

</script>	 
</body>
</html>