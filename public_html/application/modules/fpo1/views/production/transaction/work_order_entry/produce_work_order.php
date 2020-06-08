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
                        <h1>Produce or Unassemble Items</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Production Management</a></li>
							<li><a href="#">Transactions</a></li>
							<li><a href="<?php echo base_url('fpo/production'); ?>">Work Orders</a></li>
                            <li><a class="active" href="#">Edit Work Order</a></li>
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
														<input type="text" class="form-control" maxlength="18" id="reference_no" name="reference_no" placeholder="Reference Number" readonly>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Type </label>
														<select class="form-control" id="type" name="type">
															<option value="">Select Type</option>
															<option value="1">Return Items to Work Order</option>
															<option value="2">Produce Finished Items</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4">
														<label for="">Quantity <span class="text-danger">*</span></label>
														<input type="text numberOnly" class="form-control" id="quantity" name="quantity" required="required" data-validation-required-message="Please enter quantity" placeholder="Quantity">
														<p class="help-block text-danger"></p>
													</div>
												</div>
																								
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="">Date</label>
														<input type="date" class="form-control" id="issue_date" name="issue_date" placeholder="">
													</div>
													<div class="form-group col-md-6">
														<label for="memo">Memo</label>
														<textarea id="memo" maxlength="150" name="memo" class="form-control"></textarea>
													</div>
												</div>
										</div>										
										<div class="row row-space mt-5">
											<div class="form-group col-md-12 text-center">
											<div id="success"></div>
											<a href="<?php echo base_url('fpo/production/editWorkOrder/'); ?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Work Order<a>
											<a href="<?php echo base_url('fpo/production');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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