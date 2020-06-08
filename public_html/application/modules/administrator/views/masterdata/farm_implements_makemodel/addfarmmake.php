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
                        <h1>Add Farm Implements Make and Model</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">Farm Implements Make and Model</a></li>
                            <li class="active"> Add Farm Implements Make and Model</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('administrator/masterdata/post_farmimplementsmake')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Implement  <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="implement_type" name="implement_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check type of implemet."><span class="ml-1">Primary</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="implement_type" name="implement_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check type of implemet."><span class="ml-1">Attachment</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Implement Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="implement_name" name="implement_name" required="required" data-validation-required-message="Please Select implement name .">
													<option value="">Select Implement Name </option>
													<?php for($i=0; $i<count($farm_implements);$i++) { ?>										
													 <option value="<?php echo $farm_implements[$i]->id; ?>"><?php echo $farm_implements[$i]->Name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											</div>
		
											<div class="row row-space">												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Make</label>
													<input type="text" class="form-control "   maxlength="50" id="make" name="make" placeholder="Make" required="required" data-validation-required-message="Please enter make .">
													<p class="help-block text-danger"></p>
												</div>									
												<div class="form-group col-md-6">
													<label for="inputAddress2">Model</label>
													<input type="text" class="form-control "  maxlength="50" id="model" name="model" placeholder="Model"  required="required" data-validation-required-message="Please enter model .">
													<p class="help-block text-danger"></p>
												</div>
											</div>																   										
										<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>" class="btn btn-outline-dark">Cancel</a>	
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