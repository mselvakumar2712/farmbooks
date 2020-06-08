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
                        <h1>Add Fertilizer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>">Fertilizer</a></li>
                            <li class="active">Add Fertilizer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_fertilizer')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Fertilizer <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="fertilizer_type" name="fertilizer_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check type of fertilizer."><span class="ml-1">Organic</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="fertilizer_type" name="fertilizer_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check type of fertilizer."><span class="ml-1">Inorganic</span>
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Fertilizer <span class="text-danger">*</span></label>
													<input type="text" class="form-control"   maxlength="50" id="fertilizer_name" name="fertilizer_name" placeholder="Name of the Fertilizer "required="required" data-validation-required-message="Please Check name of the fertilizer.">
													<p class="help-block text-danger"></p>
												</div>	
											</div>
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Form of Fertilizer <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="1" class="form-check-input">Liquid
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="2" class="form-check-input">Granular													
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="3" class="form-check-input">Powder													
														</label>
													   </div>
													</div>
												</div>
													<p class="help-block text-danger" id="validatecheck"></p>
											    </div>
												<!--<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer</label>
												 <select  class="form-control" id="manufacturer" name="manufacturer">
													<option value="">Select Manufacturer </option>
													<?php for($i=0; $i<count($manufacture);$i++) { ?>										
													 <option value="<?php echo $manufacture[$i]->id; ?>"><?php echo $manufacture[$i]->name; ?></option>
													<?php } ?>
													</select>
												</div>-->
											</div>
											<!--<div class="row row-space">
											
												<div class="form-group col-md-6">
													<label for="inputAddress2">Brand Name</label>
													<input type="text" class="form-control"   id="brand_name" name="brand_name" placeholder="Brand Name">
												</div>
											</div>-->
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>" class="btn btn-outline-dark">Cancel</a>	
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
$("#sendMessageButton").click(function() {
    var count_checked = $("[name='form_fertilizer[]']:checked").length; // count the checked rows
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
});
</script>
</body>
</html>