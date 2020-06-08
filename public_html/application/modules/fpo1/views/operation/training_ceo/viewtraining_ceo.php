<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 
$directory = 'assets/uploads/training_CEO/training_'.$ceo['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
?>
<style>
.text-right{
   font-style: inherit ! important;
}
</style>
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
                        <h1>View Training to CEO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('fpo/operation/training_ceolist');?>">Training to CEO</a></li>
                            <li><a class="active" href="#">View Training to CEO</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									
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
									
									<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">Name of the CEO <span class="text-danger">*</span></label>
														   <input type="text" class="form-control" disabled id="ceo_name" name="ceo_name" required="required" data-validation-required-message="Please enter name of the ceo" value="<?php echo $ceo['ceo_name']; ?>">
														   <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Commencement of Training <span class="text-danger">*</span></label>
														<input type="date" id="date_training" disabled name="date_training" class="form-control" required="required" data-validation-required-message="Please select date of commencement of training" value="<?php echo $ceo['training_start_date']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Date of Completion of Training <span class="text-danger">*</span></label>
														<input type="date" id="date_completeion" disabled name="date_completeion" class="form-control" required="required" data-validation-required-message="Please select date of completion of training" value="<?php echo $ceo['training_end_date']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													   <div class="row row-space">
													  <div class="form-group col-md-4">
														<label for="">No. of Days of Training <span class="text-danger">*</span></label>
														<input type="text" id="total_days" disabled name="total_days" class="form-control" required="required" data-validation-required-message="Please enter number of days" value="<?php echo $ceo['no_of_days']; ?>">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Trainer Name <span class="text-danger">*</span></label>
														<input type="text" id="trainer_name" disabled maxlength="50" name="trainer_name" class="form-control" required="required" data-validation-required-message="Please enter trainer name" value="<?php echo $ceo['trainer_name']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Training Institute’s Name </label>
														<input type="text" id="institutes_name" disabled maxlength="75" name="institutes_name" class="form-control" required="required" value="<?php echo $ceo['institute_name']; ?>">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													  <div class="row row-space">
													   <div class="form-group col-md-4">
														<label for="">Date of Exposure Visit</label>
														<input type="date" id="exposure_date" disabled name="exposure_date" class="form-control" value="<?php echo $ceo['exposure_date']; ?>">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Place of Visit </label>
														<input type="text" id="place_visit" disabled maxlength="50" name="place_visit" class="form-control" value="<?php echo $ceo['place_to_visit']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>	
														<div class="form-group col-md-4 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($ceo['cost_involved']==1)?'checked':''; ?> disabled>
														</div>
													</div>
													
													<div class="row row-space">
														<div class="form-group col-md-8">
															<label for="">Program Photo </label>
															<div class="">
															<?php 
																if($uploadedImages){
																	for($i=0;$i<count($uploadedImages);$i++){?>
																	<div class="col-md-3">
																		<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
																	</div>
															<?php }} ?>
															</div>
														</div>
														<div class="form-group col-md-4" id="costHolder">
															<label for="inputAddress2">Total Cost ( <span class="fa fa-inr"></span> )<span class="text-danger">*</span></label>
															<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2 text-right" placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost" value="<?php echo $ceo['involved_cost']; ?>" disabled>	
															<div class="help-block with-errors text-danger"></div>
														</div>  
													</div>													  										
												
										</div>												
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('fpo/operation/edittraining_ceo/'.$ceo['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Training<a>
											<a href="<?php echo base_url('fpo/operation/training_ceolist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
var cost_involved = "<?php echo $ceo['cost_involved']; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}
</script>	 
</body>
</html>