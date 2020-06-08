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
                        <h1>Add Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/banknamelist');?>">Bank</a></li>
                            <li class="active">Add Bank Name</li>
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
					<form  action="<?php echo base_url('administrator/masterdata/post_bankname')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type .">
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) { ?>										
													 <option value="<?php echo $bank_type[$i]->id; ?>"><?php echo $bank_type[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name <span class="text-danger">*</span></label>
													 <input type="text" class="form-control "  maxlength="45" id="bank_name" name="bank_name" placeholder="Bank Name "  required="required" data-validation-required-message="Please enter branch name .">
													<p class="help-block text-danger"></p>
											</div>
										</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/masterdata/banknamelist');?>" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
	  <script>
	
</script>
</body>
</html>