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
                        <h1>View Bills of Material</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Production Management</a></li>
							<li><a href="#">Maintenance</a></li>
                            <li><a href="<?php echo base_url('fpo/production/billofMaterials');?>">Bills of Materials</a></li>
							<li><a class="active" href="#">View Bills of Material</a></li>
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
					<form action="<?php echo base_url('fpo/production/post_director')?>" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">														
												<div class="form-group col-md-4">
													<label for="">Select Item <span class="text-danger">*</span></label>
													  <select class="form-control" id="item_value" name="item_value" required="required" data-validation-required-message="Please Select any item" readonly>
														  <option value="">Select Item</option>
														  <option value="1">Paddy</option>
														  <option value="2">Sugarcane</option>
														  <option value="3">Vegitable</option>
														  <option value="4">Wheet</option>
														  <option value="5">Others</option>
													  </select>
													 <p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="">Selected Item Code <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="item_code" name="item_code" placeholder="Selected item Code" readonly >
												</div>
												<div class="form-group col-md-4">
													<label for="">Work Centre <span class="text-danger">*</span></label>
													  <select class="form-control" id="work_centre" name="work_centre" required="required" data-validation-required-message="Please Select any work centre" readonly>
														  <option value="">Select Work Centre</option>
														  <option value="1">Support</option>
														  <option value="2">Development</option>
													  </select>
													 <p class="help-block text-danger"></p>
												</div>
											</div>
											
											<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
														<input type="text" onkeyup="getPincode(this.value)" class="form-control numberOnly this_pin_code" id="pincode" pattern="[1-9][0-9]{5}" name="pincode" minlength="6" maxlength="6" placeholder="PINCODE" value="" required="required" data-validation-required-message="Please enter pincode." readonly>
														<p class="help-block text-danger" id="pincode_validate"></p>
													</div>	
													<div class="form-group col-md-4">
														<label for="inputAddress2">State <span class="text-danger">*</span></label>
														<select id="state" name="state" class="form-control" required="required" data-validation-required-message="Please Select state." readonly>
															<option value="">Select State</option>
														</select> 
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span> </label>
														<select id="district" name="district" class="form-control" required="required" data-validation-required-message="Please Select district." readonly>
															<option value="">Select District</option>
														</select> 
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
														<select id="taluk" name="taluk" class="form-control" required="required" data-validation-required-message="Please Select taluk." readonly>
															<option value="">Select Taluk </option>
														</select>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Block <span class="text-danger">*</span></label>
														<select id="block" name="block" class="form-control" required="required" data-validation-required-message="Please Select block." readonly>
															<option value="">Select Block </option>
														</select>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
														<select  name="gram_panchayat" id="gram_panchayat" class="form-control" required="required" data-validation-required-message="Please Select gram panchayat." readonly>
															<option value="">Select Gram Panchayat</option>
														</select>
														<p class="help-block text-danger"></p>								
													</div>
												</div>
												
												<div class="row row-space">	
													<div class="form-group col-md-4">
														<label for="inputAddress2">Village <span class="text-danger">*</span></label>
														<select id="village" name="village" class="form-control" required="required" data-validation-required-message="Please Select village." readonly>
															<option value="">Select Village</option>															
														</select>
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Quantity <span class="text-danger">*</span></label>
														<input type="text numberOnly" class="form-control" id="quantity" name="quantity" required="required" data-validation-required-message="Please enter quantity" placeholder="Quantity" readonly>
														<p class="help-block text-danger"></p>
													</div>
												</div>
											
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<a href="<?php echo base_url('fpo/production/editBillsofMaterial'); ?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Bills of Material<a>
											<a href="<?php echo base_url('fpo/production/billofMaterials');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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