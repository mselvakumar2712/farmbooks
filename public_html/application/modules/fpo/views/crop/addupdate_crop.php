<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.text-right {
	font-style: inherit !important;
}
</style>
   <body>
      <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Update Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
				            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Crop</a></li>
                            <li class="active">Add Update Crop</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
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
			
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
						<div class="container-fluid">
						<form name="sentMessage" method="post" action="<?php echo base_url('fpo/updatecrop/updatecrop_add'); ?>" novalidate="novalidate" id="add_updatecrop">   
                        <div class="row row-space">
							 <div class="form-group col-md-6">
								<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
								<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer"  data-search="true">
									  <option value="">Select farmer</option>
									  <?php for($i=0; $i<count($farmers);$i++) { ?>										
									  <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
									  <?php } ?>								
								</select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
								<label for="inputState">Crop Update Type <span class="text-danger">*</span></label> 
								<select id="update_type" name="update_type" class="form-control" required="required" data-validation-required-message="Please select update type">
									<option value="">Select Update Type</option>
									<option value="1" >Nutrient</option>
									<option value="2">Fertilizer</option>
									<option value="3">Pesticides</option>
									<option value="4">Weeding</option>
								</select>
								<p class="help-block text-danger"></p>
							</div>
						  </div>
						  
						<div class="row row-space" style="display:none" id="nutrient_form_details">
						   <!-- <div class="form-group col-md-6">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="nutrient_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="" >Select Crop</option>
                                  
                                <?php for($i=0;$i<count($cropEntry_name);$i++) { ?>
                                  <option value="<?php echo $cropEntry_name[$i]->id; ?>"><?php echo $cropEntry_name[$i]->crop_name; ?></option>
                                <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div> -->
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="nutrient_variety" name="nutrient_variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<!--<option value="" >Select variety</option>
								<?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
                                  <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
                                <?php } ?>-->  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Nutrient Name <span class="text-danger">*</span></label>
							  <select id="nutrient_name" name="nutrient_name" class="form-control"  required="required" data-validation-required-message="Please select nutrient name">
								<option value="" >Select Nutrient</option>
								<?php for($i=0;$i<count($nutrient);$i++) { ?>
                           <option value="<?php echo $nutrient[$i]->id; ?>"><?php echo $nutrient[$i]->name; ?></option>
                        <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="nutrient_dosage_date" id="nutrient_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter date of dosage." value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2050-12-31">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name <span class="text-danger">*</span></label>
									<select id="nutrient_brand_name" name="nutrient_brand_name" class="form-control" required="required" data-validation-required-message="Please select brand name">
										<option value="">Select Brand Name</option>
										<!--<option value="" >Select Brand Name</option>
										<?php for($i=0;$i<count($nutrient);$i++) { ?>
										<option value="<?php echo $nutrient[$i]->id; ?>"><?php echo $nutrient[$i]->name; ?></option>
										<?php } ?>-->  								
									  </select>
									  <p class="help-block text-danger"></p>
								  </div>
								  
								  <div class="form-group col-md-3">
										<label for="inputState">Dosage</label>
										    <select id="nutrient_dosage" name="nutrient_dosage" class="form-control">
												<option value="">Select Dosage</option>
												<?php for($i=1;$i<=50;$i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
									</div>
								   <div class="form-group col-md-3">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="nutrient_quantity" id="nutrient_quantity" maxlength="4" placeholder="000" required="required" data-validation-required-message="Please enter quantity.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="nutrient_quantity_uom" id="nutrient_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity.">-->
										<select id="nutrient_quantity_uom" name="nutrient_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom">
											 <option value="" >Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
											<?php } ?> 						
										 </select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Cost of Nutrient (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly text-right" step="0.01" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="0.00" >
									</div>
						  </div>
						  
						  <div class="row row-space" style="display:none" id="fertilizer_form_details">
						  <!--  <div class="form-group col-md-6">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="fertilizer_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="" >Select Crop</option>
								<?php for($i=0;$i<count($cropEntry_name);$i++) { ?>
                                  <option value="<?php echo $cropEntry_name[$i]->id; ?>"><?php echo $cropEntry_name[$i]->crop_name; ?></option>
                                <?php } ?>  	
							  </select>
							  <p class="help-block text-danger"></p>
							</div> -->
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="fertilizer_variety" name="fertilizer_variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<!--<option value="" >Select Variety</option>
								<?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
                                  <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
                                <?php } ?>-->
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Fertilizer Name <span class="text-danger">*</span></label>
							  <select id="fertilizer_name" name="fertilizer_name"  class="form-control" required="required" data-validation-required-message="Please select nutrient name">
								<option value="" >Select Fertilizer</option>
								<?php for($i=0;$i<count($fertilizer);$i++) { ?>
                                  <option value="<?php echo $fertilizer[$i]->id; ?>"><?php echo $fertilizer[$i]->name; ?></option>
								<?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="fertilizer_dosage_date" id="fertilizer_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter date of dosage." value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2050-12-31">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							 <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name <span class="text-danger">*</span></label>
									<select id="fertilizer_brand_name" name="fertilizer_brand_name" class="form-control" required="required" data-validation-required-message="Please select brand name">
										<option value="">Select Brand Name</option>
										<!--<option value="" >Select Nutrient</option>
										<?php for($i=0;$i<count($nutrient);$i++) { ?>
										<option value="<?php echo $nutrient[$i]->id; ?>"><?php echo $nutrient[$i]->name; ?></option>
										<?php } ?> --> 								
									  </select>
									  <p class="help-block text-danger"></p>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="fertilizer_dosage" name="fertilizer_dosage" class="form-control">
												<option value="">Select Dosage</option>
												<?php for($i=1;$i<=50;$i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
									</div>
								   <div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="fertilizer_feed_type" value="1" class="form-check-input" required>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="drip" name="fertilizer_feed_type" value="2" class="form-check-input" required>Drip												   
												</label>
											   </div>
											</div>												
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
								 <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="fertilizer_quantity" id="fertilizer_quantity" maxlength="4" placeholder="000" required="required" data-validation-required-message="Please enter quantity.">
										<p class="help-block text-danger"></p>
									</div>
									 <div class="form-group col-md-4">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
										<select id="fertilizer_quantity_uom" name="fertilizer_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select brand name">
											<option value="">Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
											<?php } ?> 						
											</select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Fertilizer (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly text-right" name="cost_of_fertilizer" step="0.01" maxlength="6" id="cost_of_fertilizer" placeholder="0.00" >
									</div>
						     </div>
							 
							 <!--pesticide-->
						<div class="row row-space" style="display:none" id="pesticide_form_details">
						   <!--<div class="form-group col-md-6">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="pesticide_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="" >Select Crop</option>
								<?php for($i=0;$i<count($cropEntry_name);$i++) { ?>
                                  <option value="<?php echo $cropEntry_name[$i]->id; ?>"><?php echo $cropEntry_name[$i]->crop_name; ?></option>
                                <?php } ?>  	
							  </select>
							  <p class="help-block text-danger"></p>
							</div>-->
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="pesticide_variety" name="pesticide_variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<!--<option value="" >Select Variety</option>
								<?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
                                  <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
                                <?php } ?>-->							
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Pesticide Name <span class="text-danger">*</span></label>
							  <select id="pesticide_name" name="pesticide_name" class="form-control" required="required" data-validation-required-message="Please select nutrient name">
								<option value="">Select Pesticide</option>
								<?php for($i=0;$i<count($pesticide);$i++) { ?>
                                  <option value="<?php echo $pesticide[$i]->id; ?>"><?php echo $pesticide[$i]->name; ?></option>
                                <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="pesticide_dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter date of dosage." value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2050-12-31">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name <span class="text-danger">*</span></label>
									<select id="pesticide_brand_name" name="pesticide_brand_name" class="form-control" required="required" data-validation-required-message="Please select brand name">
										<option value="">Select Brand Name</option>
										<!--<option value="" >Select Nutrient</option>
										<?php for($i=0;$i<count($nutrient);$i++) { ?>
										 <option value="<?php echo $nutrient[$i]->id; ?>"><?php echo $nutrient[$i]->name; ?></option>
										<?php } ?> --> 								
									  </select>
									 <p class="help-block text-danger"></p>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="pesticide_dosage" name="pesticide_dosage" class="form-control">
												<option value="">Select Dosage</option>
												<?php for($i=1;$i<=50;$i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
									</div>
									<div class="form-group col-md-6">
										  <label class="form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="pesticide_feed_type" value="1" class="form-check-input" required>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="sprayer" name="pesticide_feed_type" value="2" class="form-check-input" >Sprayer												   
												</label>
											   </div>
											</div>												
										  </div>	
										<p class="help-block text-danger"></p>
									  </div>
								    <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="pesticide_quantity" id="quantity" maxlength="4" placeholder="000" required="required" data-validation-required-message="Please enter quantity.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="pesticide_quantity_uom" id="quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
										<select id="pesticide_quantity_uom" name="pesticide_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select brand name">
											<option value="" >Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
											<?php } ?> 						
										</select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Pesticides (<i class="fa fa-rupee">)</i></label>
										<input type="text" class="form-control numberOnly text-right" step="0.01" name="cost_of_pesticide" maxlength="6" id="cost_of_nutrient" placeholder="0.00">
									</div>
						</div>
						
						<!--weeding-->
							<div class="row row-space" style="display:none" id="weeding_form_details">
							  <!-- <div class="form-group col-md-6">
								 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
								  <select id="select_crop" name="weeding_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
									<option value="">Select Crop</option>
									<?php for($i=0;$i<count($cropEntry_name);$i++) { ?>
                                      <option value="<?php echo $cropEntry_name[$i]->id; ?>"><?php echo $cropEntry_name[$i]->crop_name; ?></option>
                                    <?php } ?>  	
								  </select>
								  <p class="help-block text-danger"></p>
								</div> -->
								<div class="form-group col-md-6">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <select id="weeding_variety" name="weeding_variety" class="form-control" required="required" data-validation-required-message="Please select variety">
									<!--<option value="">Select Variety</option>
									<?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
                                      <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
                                    <?php } ?>-->		
								  </select>
								  <div class="help-block with-errors text-danger"></div>
								</div>
								 <div class="form-group col-md-6">
									<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
									<input type="date" class="form-control" name="weeding_dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter date of dosage." value="<?php echo date('Y-m-d'); ?>" min="2018-01-01" max="2050-12-31">
								   <p class="help-block text-danger"></p>
								  </div>								  
								  <div class="form-group col-md-3">
										<label for="inputState">Dosage</label>
										    <select id="weeding_dosage" name="weeding_dosage" class="form-control" >
												<option value="">Select Dosage</option>
												<?php for($i=1;$i<=50;$i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php } ?>
											</select>
									</div>
									<div class="form-group col-md-6">
										  <label class="form-control-label">Type of Weeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check my-div">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" class="radioBtn" id="1" onclick="show(0)" name="type_weeding" value="1" class="form-check-input" required><span class="ml-1">Manual</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check my-div">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" class="radioBtn" id="2" onclick="show(1)" name="type_weeding" value="2" class="form-check-input" ><span class="ml-1">Machine</span>
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check my-div">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" class="radioBtn" id="3" onclick="show(2)" name="type_weeding" value="3" class="form-check-input" ><span class="ml-1">Chemicals</span>												   
												</label>
											   </div>
											</div>	
										  </div>
										  <p class="help-block text-danger"></p>
									  </div>
										<div class="form-group col-md-3" style="display:none;" id="d2">
											<label for="inputAddress">Brand Name</label>
											 <select id="weeding_brand_name" name="weeding_brand_name" class="form-control" required="required" data-validation-required-message="Please select brand name">
												<option value="" >Select Brand Name</option>
												<?php for($i=0;$i<count($pesticide);$i++){ ?>
												<option value="<?php echo $pesticide[$i]->id; ?>"><?php echo $pesticide[$i]->name; ?></option>
												<?php } ?> 						
											  </select>
											
											<p class="help-block text-danger"></p>
										</div>
																				
										<div class="form-group col-md-3" style="display:none;" id="d0">
											<label for="inputAddress">No. of Man days <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="weeding_no_of_man" id="no_of_man" maxlength="3" placeholder="No.of Man" required="required" data-validation-required-message="Please enter no.of man.">
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-3" style="display:none;" id="d1">
											<label for="inputAddress">Machine Hours <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="weeding_machine_hrs" id="machine_hrs" maxlength="4" placeholder="Machine Hours" required="required" data-validation-required-message="Please enter machine hours.">
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-4">
											<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="weeding_quantity" id="quantity" maxlength="4" placeholder="000" required="required" data-validation-required-message="Please enter quantity.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
											<!--<input type="text" class="form-control numberOnly" name="weeding_quantity_uom" id="quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
											<select id="weeding_quantity_uom" name="weeding_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select brand name">
												 <option value="" >Select UOM</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
												<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
											  </select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress">Cost of Weeding (<i class="fa fa-rupee"></i>)</label>
											<input type="text" class="form-control numberOnly text-right" name="cost_of_weeding" step="0.01" maxlength="6" id="cost_of_nutrient" placeholder="0.00">
										</div>
									</div>
                           
						   <div class="form-group col-md-12 text-center">
                                <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-floppy-o"></i>  &nbsp; Add Update Crop</button>                     
								<a href="<?php echo base_url('fpo/updatecrop');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                          </div>
						</form>					
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div><!-- .content -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
//date validation
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
  $('#nutrient_dosage_date').attr('max', maxDate);
  $('#pesticide_dosage_date').attr('max', maxDate);
  $('#fertilizer_dosage_date').attr('max', maxDate);
  $('#dosage_date').attr('max', maxDate);
});
    
	
function show(number) {
    "use strict";
    var el, i = 0;
    while (el = document.getElementById("d" + (i++))) {
        el.style.display = "none";
    }
    document.getElementById('d' + number).style.display = "block";
}

$('select[name="update_type"]').on('change', function(){
	var farmerID = $("#farmer_id").val();
	if(farmerID){
		var nutrient_form = $(this).val();				
		if(nutrient_form==1){
			$('#nutrient_form_details').show();
			$('#fertilizer_form_details').hide();
			$('#pesticide_form_details').hide();
			$('#weeding_form_details').hide();
		}else if(nutrient_form==2){
			$('#nutrient_form_details').hide();
			$('#pesticide_form_details').hide();
			$('#fertilizer_form_details').show();
			$('#weeding_form_details').hide();
		}else if(nutrient_form==3){
			$('#pesticide_form_details').show();
			$('#nutrient_form_details').hide();
			$('#fertilizer_form_details').hide();
			$('#weeding_form_details').hide();
		}else if(nutrient_form==4){
			$('#weeding_form_details').show();
			$('#nutrient_form_details').hide();
			$('#fertilizer_form_details').hide();
			$('#pesticide_form_details').hide();
		}
	} else {
		$(this).val('');					
		swal("Sorry!", "Please select the farmer and proceed");	
	}
});

		
//Farmer ID onchange master
$('#farmer_id').change(function(){		
	var farmer_id = $(this).val();
	if(farmer_id){
		getVarietyDetail(farmer_id);
	} else {
		$("#update_type").val('');			
		$('#nutrient_form_details').hide();
		$('#fertilizer_form_details').hide();
		$('#pesticide_form_details').hide();
		$('#weeding_form_details').hide();
	}
});	


$('#nutrient_name').change(function(){		
	var farmer_id = $("#nutrient_name").val();
	getnutrientDetail(farmer_id);
});	
$('#fertilizer_name').change(function(){		
 var farmer_id = $("#fertilizer_name").val();
  getfertilizerDetail( farmer_id );
});	
$('#pesticide_name').change(function(){		
 var farmer_id = $("#pesticide_name").val();
  getpesticideDetail( farmer_id );
});	
$('#nutrient_variety').change(function(){		
 var variety_id = $("#nutrient_variety").val();
  getvarietydosageDetail( variety_id );
});
$('#fertilizer_variety').change(function(){		
 var variety_id = $("#fertilizer_variety").val();
  getfertilizerdosageDetail( variety_id );
});
$('#pesticide_variety').change(function(){		
 var variety_id = $("#pesticide_variety").val();
  getpesticidedosageDetail( variety_id );
});
$('#weeding_variety').change(function(){		
 var variety_id = $("#weeding_variety").val();
  getweedingdosageDetail( variety_id );
});
	 
function getVarietyDetail(farmer_id){
	$("#nutrient_variety option").remove();
	$("#fertilizer_variety option").remove();
	$("#pesticide_variety option").remove();
	$("#weeding_variety option").remove();
	
	if(farmer_id!=''){  
		var selected_item = $('farmer_id').val();
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/variety/"+farmer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					if(Object.keys(responseArray).length > 0){
						$("#nutrient_variety").append($('<option></option>').val('').html('Select Variety'));
						$("#fertilizer_variety").append($('<option></option>').val('').html('Select Variety'));
						$("#pesticide_variety").append($('<option></option>').val('').html('Select Variety'));
						$("#weeding_variety").append($('<option></option>').val('').html('Select Variety'));
					} else {
						$("#nutrient_variety").append($('<option></option>').val('').html(''));
						$("#fertilizer_variety").append($('<option></option>').val('').html(''));
						$("#pesticide_variety").append($('<option></option>').val('').html(''));
						$("#weeding_variety").append($('<option></option>').val('').html(''));
					}
								
					$.each(responseArray.variety_list,function(key,value){
						$("#nutrient_variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
						$("#fertilizer_variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
						$("#pesticide_variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
						$("#weeding_variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
					});			
				}
			},
			error:function(response){
			alert('Error!!! Try again');
			} 			
		}); 
	} else {
		swal('Sorry!', 'Please provide farmer field');
	}
}  
		
		
function getnutrientDetail(nutrient_id){
    $("#nutrient_brand_name option").remove();
    if(nutrient_id!=''){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/nutrient/"+nutrient_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){					
					if (Object.keys(responseArray).length > 0){
						$("#nutrient_brand_name").append($('<option></option>').val('').html('Select Brandname'));
					} else {
						$("#nutrient_brand_name").append($('<option></option>').val('').html(''));  
					}
				
					$.each(responseArray.nutrient_list,function(key,value){
					$("#nutrient_brand_name").append($('<option></option>').val(value.id).html(value.name));
					});
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
    } else {
		swal('Sorry!', 'Please provide nutrient field');
	}			
}


function getfertilizerDetail(fertilizer_id){
	$("#fertilizer_brand_name option").remove();
	if(fertilizer_id!=''){
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/fertilizer/"+fertilizer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){					
					if (Object.keys(responseArray).length > 0) {
						$("#fertilizer_brand_name").append($('<option></option>').val('').html('Select Brandname'));
					} else {
						$("#fertilizer_brand_name").append($('<option></option>').val('').html(''));  
					}
					$.each(responseArray.fertilizer_list,function(key,value){
						$("#fertilizer_brand_name").append($('<option></option>').val(value.id).html(value.name));
					});
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		});
	} else {
		swal('Sorry!', 'Please provide fertilizer field');
	}			
}  

	
function getpesticideDetail(pesticide_id){
	$("#pesticide_brand_name option").remove();
    if(pesticide_id!=''){
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/pesticide/"+pesticide_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					if (Object.keys(responseArray).length > 0){
						$("#pesticide_brand_name").append($('<option></option>').val('').html('Select Brandname'));
					} else {
						$("#pesticide_brand_name").append($('<option></option>').val('').html(''));  
					}
					$.each(responseArray.pesticide_list,function(key,value){
						$("#pesticide_brand_name").append($('<option></option>').val(value.id).html(value.name));
					});
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	} else {
		swal('Sorry!', 'Please provide pesticide field');
	}
}


function getvarietydosageDetail(variety_id){	
    if(variety_id!=''){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/varietydosage/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){	
					$.each(responseArray.dosage_list,function(key,value){
						var selectIndex = (value.dosage);
						var a=++selectIndex;
						document.getElementById("nutrient_dosage").value=a;
					});		
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
    } else {
		swal('Sorry!', 'Please provide variety field');
	}			
}	
   
   
function getfertilizerdosageDetail(variety_id){	
    if( variety_id !=''){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/fertilizerdosage/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){	
					$.each(responseArray.dosage_list,function(key,value){
						var selectIndex = (value.dosage);
						var a=++selectIndex;
						document.getElementById("fertilizer_dosage").value=a;
					});		
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
    } else {
		swal('Sorry!', 'Please provide variety field');
	}			
}		 
  
  
function getpesticidedosageDetail(variety_id){	
    if(variety_id!=''){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/fertilizerdosage/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){	
					$.each(responseArray.dosage_list,function(key,value){
						var selectIndex = (value.dosage);
						var a=++selectIndex;
						document.getElementById("pesticide_dosage").value=a;
					});		
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
    } else {
		swal('Sorry!', 'Please provide variety field');
	}			
}
	
	
function getweedingdosageDetail(variety_id){	
    if(variety_id!=''){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/fertilizerdosage/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){	
					$.each(responseArray.dosage_list,function(key,value){
						var selectIndex = (value.dosage);
						var a=++selectIndex;
						document.getElementById("weeding_dosage").value=a;
					});		
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
    } else {
		swal('Sorry!', 'Please provide variety field');
	}			
}

	
	
/*	
		$('form').submit(function(e){
			e.preventDefault(); 
			const updatecropData = $('#add_updatecrop').serializeObject();
			if( updatecropData !='')
			{   
			console.log(updatecropData);
			$.ajax({
				url:"<?php echo base_url();?>fpo/updatecrop/updatecrop_add",
				type:"POST",
				data:updatecropData,
				dataType:"html",
				cache:false,			
				success:function(response){	
					console.log(response);					
					response=response.trim();
					responseArray=$.parseJSON(response);
					console.log(response);
					if(responseArray.status == 1){
						$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
						window.location = "<?php echo base_url('fpo/updatecrop/')?>";
					} 
				},
				error:function(response){
					alert('Error!!! Try again');
				} 					
			}); 
			}
			else
			{
				alert('Please provide mandatory fields');
			}
		});
			
			$.fn.serializeObject = function() {
				var o = {};
				var a = this.serializeArray();
				$.each(a, function() {
				if (o[this.name] !== undefined) {
				  if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				  }
				  o[this.name].push(this.value || '');
				} else {
				  o[this.name] = this.value || '';
				}
				});
				return o;
			};	
*/
</script>
</body>
</html>
