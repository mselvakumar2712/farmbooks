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
                        <h1>View Update Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Crop</a></li>
                            <li class="active">View Update Crop</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-body">
					<div class="container-fluid">
					<form name="sentMessage" method="post" novalidate="novalidate" id="edit_updatecrop">
                     <input type="hidden" name="updatevariety" id="updatevariety">
                     <input type="hidden" name="updatenutient" id="updatenutient">
                     <input type="hidden" name="updatebrandname" id="updatebrandname"> 
						   <div class="row row-space">
                               <div class="form-group col-md-6">
                                <label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->profile_name; ?>">     
									<!--<select id="farmer_id" name="farmer_id" class="form-control" readonly required="required" data-validation-required-message="Please select farmer" onchange="getVarietyDetail(this.value);" data-search="true">
										<option value="">Select farmer</option>
										<?php for($i=0; $i<count($farmers);$i++) { ?>										
										<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
										<?php } ?>								
									</select>-->
                                </div>
                               
                                <div class="form-group col-md-6">
                                <input type="hidden" name="updatecrop_id" value="" id="updatecrop_id">
                                 <label for="inputState">Crop Update Type <span class="text-danger">*</span></label>
                                  <select id="update_type" name="update_type" class="form-control" required="required" data-validation-required-message="Please select update type" disabled>
                                    <option value="">Select Update Type</option>
                                    <option value="1" <?php if($updatecrop_list->update_type == 1){echo "selected";}?> >Nutrient</option>
                                    <option value="2" <?php if($updatecrop_list->update_type == 2){echo "selected";}?> >Fertilizer</option>
                                    <option value="3" <?php if($updatecrop_list->update_type == 3){echo "selected";}?> >Pesticides</option>
                                    <option value="4" <?php if($updatecrop_list->update_type == 4){echo "selected";}?> >Weeding</option>
                                  </select>
                                </div>
						  </div>

						<div class="row row-space" style="display:none" id="nutrient_form_details">
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							 <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->variety_name; ?>">
							  <!--<select id="nutrient_variety" name="nutrient_variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
							  </select>-->
							</div>
							<div class="form-group col-md-6">
								<label for="inputState">Nutrient Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo ($updatecrop_list->nutrient_name!= null)?$updatecrop_list->nutrient_name:""; ?>">
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="nutrient_dosage_date" id="nutrient_dosage_date" placeholder="Date of Dosage" value="<?php echo $updatecrop_list->process_date; ?>" disabled>
							  </div>
							  
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->brandname; ?>">
								</div>
								  
								  <div class="form-group col-md-3">
										<label for="inputState">Dosage</label>
										<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->dosage; ?>">
									</div>
								   <div class="form-group col-md-3">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="nutrient_quantity" id="nutrient_quantity" maxlength="4" placeholder="000" value="<?php echo $updatecrop_list->qty; ?>" disabled>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<select id="nutrient_quantity_uom" name="nutrient_quantity_uom" class="form-control" required="required" disabled data-validation-required-message="Please select quantity uom">
											<option value="" >Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { 
											if($quantity_uom[$i]->id == $updatecrop_list->qty_uom){
										?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php } else { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php }} ?> 						
										</select>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Cost of Nutrient (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly text-right" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="0.00" value="<?php echo number_format($updatecrop_list->process_cost, 2); ?>" disabled>
									</div>
							</div>
						  
						  <div class="row row-space" style="display:none" id="fertilizer_form_details">
							<div class="form-group col-md-6">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->variety_name; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputState">Fertilizer Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo ($updatecrop_list->fertilizer_name!= null)?$updatecrop_list->fertilizer_name:""; ?>">
							</div>
							<div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="fertilizer_dosage_date" id="fertilizer_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." value="<?php echo $updatecrop_list->process_date; ?>" min="2018-01-01" max="2050-12-31" disabled>
							  </div>
							   <div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->brandname; ?>">
								</div>
								<div class="form-group col-md-6">
									<label for="inputState">Dosage</label>
									<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->dosage; ?>">
								</div>
								    <div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="fertilizer_feed_type" value="1" class="form-check-input" <?php if($updatecrop_list->feed_type == 1){echo "checked";} ?> disabled>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="drip" name="fertilizer_feed_type" value="2" class="form-check-input" <?php if($updatecrop_list->feed_type == 2){echo "checked";} ?> disabled>Drip
												</label>
											   </div>
											</div>			
										  </div>
									</div>
								    <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="fertilizer_quantity" id="fertilizer_quantity" maxlength="4" placeholder="000" value="<?php echo $updatecrop_list->qty; ?>" disabled>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
										<select id="nutrient_quantity_uom" name="nutrient_quantity_uom" class="form-control" required="required" disabled data-validation-required-message="Please select quantity uom">
											<option value="" >Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { 
											if($quantity_uom[$i]->id == $updatecrop_list->qty_uom){
										?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php } else { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php }} ?> 						
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Fertilizer (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly text-right" name="cost_of_fertilizer" maxlength="6" id="cost_of_fertilizer" placeholder="Cost of Fertilizer" value="<?php echo number_format($updatecrop_list->process_cost, 2); ?>" disabled>
									</div>
						     </div>
							 
							 <!--pesticide-->
						<div class="row row-space" style="display:none" id="pesticide_form_details">
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->variety_name; ?>">
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Pesticide Name <span class="text-danger">*</span></label>
							 <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo ($updatecrop_list->pesticide_name!= null)?$updatecrop_list->pesticide_name:""; ?>">
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="pesticide_dosage_date" id="pesticide_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." value="<?php echo $updatecrop_list->process_date; ?>" disabled min="2018-01-01" max="2050-12-31">
							</div>
								<div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->brandname; ?>">
								</div>
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->dosage; ?>">
									</div>
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="pesticide_feed_type" value="1" class="form-check-input" <?php if($updatecrop_list->feed_type == 1){echo "checked";} ?> disabled>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="sprayer" name="pesticide_feed_type" value="2" class="form-check-input" <?php if($updatecrop_list->feed_type == 2){echo "checked";} ?> disabled>Sprayer												   
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
								    <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="pesticide_quantity" id="pesticide_quantity" maxlength="4" placeholder="000" required="required" data-validation-required-message="Please enter Quantity." value="<?php echo $updatecrop_list->qty; ?>" disabled>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<select id="nutrient_quantity_uom" name="nutrient_quantity_uom" class="form-control" required="required" disabled data-validation-required-message="Please select quantity uom">
											<option value="" >Select UOM</option>
											<?php for($i=0;$i<count($quantity_uom);$i++) { 
											if($quantity_uom[$i]->id == $updatecrop_list->qty_uom){
										?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php } else { ?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php }} ?> 						
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Pesticides (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly" name="cost_of_pesticide" maxlength="6" id="cost_of_pesticide" placeholder="Cost of Pesticides" value="<?php echo number_format($updatecrop_list->process_cost, 2); ?>" disabled>
									</div>
						</div>
						
						<!--weeding-->
							<div class="row row-space" style="display:none" id="weeding_form_details">

								<div class="form-group col-md-6">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->variety_name; ?>">
								</div>
								 <div class="form-group col-md-6">
									<label for="inputAddress">Dosage Date</label>
									<input type="date" class="form-control" name="weeding_dosage_date" id="weeding_dosage_date" placeholder="Date of Dosage" value="<?php echo $updatecrop_list->process_date; ?>" disabled min="2018-01-01" max="2050-12-31">
								  </div>								  
								  <div class="form-group col-md-3">
										<label for="inputState">Dosage</label>
										<input type="text" class="form-control" readonly name="farmer_id" id="farmer_id" value="<?php echo $updatecrop_list->dosage; ?>">
									</div>
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Weeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" <?php if($updatecrop_list->weed_type == 1){echo "checked";} ?> class="form-check-input" disabled><span class="ml-1">Manual</span>												  
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="machine" <?php if($updatecrop_list->weed_type == 2){echo "checked";} ?> class="form-check-input" disabled><span class="ml-1">Machine</span>												   
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="chemicals" <?php if($updatecrop_list->weed_type == 3){echo "checked";} ?> class="form-check-input" disabled><span class="ml-1">Chemicals</span> 
												</label>
											   </div>
											</div>	
										  </div>
									  </div>
										<div class="form-group col-md-3" style="display:none;" id="d3">
											<label for="inputAddress">Brand Name</label>
											 <select id="weeding_brand_name" name="weeding_brand_name" class="form-control" disabled required="required" data-validation-required-message="Please select brand name">
												<option value="" >Select Brand Name</option>
												<?php for($i=0;$i<count($pesticide);$i++){
												if($pesticide[$i]->id == $updatecrop_list->brand_name){
												?>
												<option value="<?php echo $pesticide[$i]->id; ?>" selected><?php echo $pesticide[$i]->name; ?></option>
												<?php } else { ?>
												<option value="<?php echo $pesticide[$i]->id; ?>"><?php echo $pesticide[$i]->name; ?></option>
												<?php }} ?>
											  </select>
											</div>
										<div class="form-group col-md-3 manual" style="display:none;" id="d1">
											<label for="inputAddress">No. of Man days</label>
											<input type="text" class="form-control numberOnly" name="weeding_no_of_man" id="weeding_no_of_man" maxlength="3" placeholder="No.of.Man" value="<?php echo $updatecrop_list->man_days; ?>" disabled>
										</div> 
										<div class="form-group col-md-3 machine" style="display:none;" id="d2">
											<label for="inputAddress">Machine Hours</label>
											<input type="text" class="form-control numberOnly" name="weeding_machine_hrs" id="weeding_machine_hrs" maxlength="4" placeholder="Machine Hours" value="<?php echo $updatecrop_list->machine_hours; ?>" disabled>
										</div> 
										<div class="form-group col-md-3">
											<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="weeding_quantity" id="weeding_quantity" disabled maxlength="4" placeholder="000" value="<?php echo $updatecrop_list->qty; ?>" data-validation-required-message="Please enter Quantity." disabled>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
											<select id="weeding_quantity_uom" name="weeding_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom" disabled>
												<option value="" >Select UOM</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { 
												if($quantity_uom[$i]->id == $updatecrop_list->qty_uom){
												?>
													<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
												<?php } else { ?>
													<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
												<?php }} ?> 						
											  </select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress">Cost of Weeding (<i class="fa fa-rupee"></i>)</label>
											<input type="text" class="form-control numberOnly text-right" name="cost_of_weeding" maxlength="6" id="cost_of_weeding" placeholder="Cost of Weeding" value="<?php echo number_format($updatecrop_list->process_cost, 2); ?>" data-validation-required-message="Please enter Cost of weeding." disabled>
										</div>
                           </div>
                           
							<div class="col-md-12 text-center">
                                 <div id="success"></div>
                                 <a href="<?php echo base_url('fpo/updatecrop/edit_updatecrop/'.$updatecrop_list->id); ?>" id="edit" class="btn-fs btn btn-success text-center"><i class="fa fa-edit"></i> Edit Update Crop<a>
								 <a href="<?php echo base_url('fpo/updatecrop');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
/*//date validation
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
	$('#weeding_dosage_date').attr('max', maxDate);
});
		
	
function show(number){
    "use strict";
    var el, i = 0;
    while (el = document.getElementById("d" + (i++))) {
        el.style.display = "none";
    }
    document.getElementById('d' + number).style.display = "block";
}


$('select[name="update_type"]').on('change', function() {
    var nutrient_form = $(this).val();
    if(nutrient_form==1){
        $('#nutrient_form_details').show();
	   $('#fertilizer_form_details').hide();
	   $('#pesticide_form_details').hide();
	   $('#weeding_form_details').hide();
    } else if(nutrient_form==2){
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
});
*/

$(document).ready(function(){
	var nutrient_form = "<?php echo $updatecrop_list->update_type; ?>";
    if(nutrient_form==1){
        $('#nutrient_form_details').show();
		$('#fertilizer_form_details').hide();
		$('#pesticide_form_details').hide();
		$('#weeding_form_details').hide();
    } else if(nutrient_form==2){
        $('#nutrient_form_details').hide();
        $('#pesticide_form_details').hide();
		$('#fertilizer_form_details').show();
		$('#weeding_form_details').hide();
    } else if(nutrient_form==3){
	   $('#pesticide_form_details').show();
		$('#nutrient_form_details').hide();
		$('#fertilizer_form_details').hide();
		$('#weeding_form_details').hide();
    } else if(nutrient_form==4){
	   $('#weeding_form_details').show();
		$('#nutrient_form_details').hide();
		$('#fertilizer_form_details').hide();
		$('#pesticide_form_details').hide();
    }	

	
	var farmer_id = "<?php echo $updatecrop_list->farmer_id; ?>";
	var variety_id = "<?php echo $updatecrop_list->variety_id; ?>";
	getVarietyDetail(farmer_id, variety_id);
	
	var weed_type = "<?php echo $updatecrop_list->weed_type; ?>";
	if(weed_type != 0){
		show(weed_type);
	}
	
    /*$('input[type="radio"]').click(function(){
	   var inputValue = $(this).attr("value");
		$("." + inputValue).toggle();
    });*/
});

function show(number){
    "use strict";
    var el, i = 0;
    while (el = document.getElementById("d" + (i++))) {
        el.style.display = "none";
    }
    document.getElementById('d' + number).style.display = "block";
}				

/*        
$(document).ready(function(){
	//edit Update crop API CALL
	var updatecrop_id = "<?php //echo $updatecrop_list->id; ?>";
	
	//jQuery method
	$.ajax({
	url: "<?php echo base_url();?>fpo/updatecrop/updatecrop_edit/"+updatecrop_id,	
	type: "GET",
	dataType:"html",
	cache:false,			
	success:function(response){		  
	console.log(response);
	response=response.trim();
	responseArray=$.parseJSON(response);
		if(responseArray.status == 1){
			
			if(responseArray.updatecrop_list[0].update_type == 1){
				//nutrient
			    $('#nutrient_form_details').show();
			    $('#fertilizer_form_details').hide();
			    $('#pesticide_form_details').hide();
				$('#weeding_form_details').hide();
				document.getElementById("farmer_id").value=responseArray.updatecrop_list[0].farmer_id;
            document.getElementById("update_type").value=responseArray.updatecrop_list[0].update_type;
				document.getElementById("nutrient_name").value=responseArray.updatecrop_list[0].name;
				document.getElementById("nutrient_brand_name").value=responseArray.updatecrop_list[0].brand_name;
				document.getElementById("nutrient_quantity_uom").value=responseArray.updatecrop_list[0].qty_uom;
				//document.getElementById("nutrient_crop").value=responseArray.updatecrop_list[0].crop_id;
				//document.getElementById("nutrient_variety").value=responseArray.updatecrop_list[0].variety;
            document.getElementById("updatevariety").value=responseArray.updatecrop_list[0].variety_id;console.log(responseArray.updatecrop_list[0].variety_id);
            document.getElementById("updatebrandname").value=responseArray.updatecrop_list[0].brand_name;console.log(responseArray.updatecrop_list[0].variety_id);
				
				document.getElementById("nutrient_dosage_date").value=responseArray.updatecrop_list[0].process_date;
				document.getElementById("nutrient_dosage").value=responseArray.updatecrop_list[0].dosage;
				document.getElementById("nutrient_quantity").value=responseArray.updatecrop_list[0].qty;
				document.getElementById("cost_of_nutrient").value=responseArray.updatecrop_list[0].process_cost;
				var variety=responseArray.updatecrop_list[0].farmer_id;
				getVarietyDetail( variety );
				var nutrient_brand=responseArray.updatecrop_list[0].name;
				getnutrientDetail( nutrient_brand );						
				//var nutrient_brand_name = responseArray.updatecrop_list[0].brand_name.split(",");
				//var items=document.getElementsByName('nutrient_brand_name[]');
				//for(var i=0; i<items.length; i++){
					//for(var j=0; j<nutrient_brand_name.length; j++){
						//if(items[i].type=='checkbox' && items[i].value==nutrient_brand_name[j])	{
							//items[i].checked=true;
						//}
					//}
				//}
                
			} else if(responseArray.updatecrop_list[0].update_type == 2){
				  $('#nutrient_form_details').hide();
				  $('#pesticide_form_details').hide();
				  $('#fertilizer_form_details').show();
				  $('#weeding_form_details').hide();
                
				//fertilizer
				document.getElementById("farmer_id").value=responseArray.updatecrop_list[0].farmer_id;
				document.getElementById("fertilizer_name").value=responseArray.updatecrop_list[0].name;
				document.getElementById("fertilizer_quantity_uom").value=responseArray.updatecrop_list[0].qty_uom;
				document.getElementById("update_type").value=responseArray.updatecrop_list[0].update_type;
            document.getElementById("updatevariety").value=responseArray.updatecrop_list[0].variety_id;
          
				//document.getElementById("fertilizer_crop").value=responseArray.updatecrop_list[0].crop_id;
				document.getElementById("fertilizer_variety").value=responseArray.updatecrop_list[0].variety;
				document.getElementById("fertilizer_dosage_date").value=responseArray.updatecrop_list[0].process_date;
				document.getElementById("fertilizer_dosage").value=responseArray.updatecrop_list[0].dosage;
				document.getElementById("fertilizer_quantity").value=responseArray.updatecrop_list[0].qty;
				document.getElementById("cost_of_fertilizer").value=responseArray.updatecrop_list[0].process_cost;
				$('input[type=radio][name="fertilizer_feed_type"][value='+responseArray.updatecrop_list[0].status+']').prop('checked', true);
				//var items=document.getElementsByName('fertilizer_brand_name[]');
				//var fertilizer_brand_name = responseArray.updatecrop_list[0].brand_name.split(",");
				//var items=document.getElementsByName('fertilizer_brand_name[]');
				//for(var i=0; i<items.length; i++){
					//for(var j=0; j<fertilizer_brand_name.length; j++){
						//if(items[i].type=='checkbox' && items[i].value==fertilizer_brand_name[j])	{
							//items[i].checked=true;
						//}
					//}
				//}								
				var variety=responseArray.updatecrop_list[0].farmer_id;
				getVarietyDetail( variety );
				var fertilizer_brand=responseArray.updatecrop_list[0].name;
				getfertilizerDetail( fertilizer_brand );
			} else if(responseArray.updatecrop_list[0].update_type == 3) {				
				$('#pesticide_form_details').show();
				$('#nutrient_form_details').hide();
				$('#fertilizer_form_details').hide();
				$('#weeding_form_details').hide();  
				//Pesticide
				document.getElementById("farmer_id").value=responseArray.updatecrop_list[0].farmer_id;
				document.getElementById("update_type").value=responseArray.updatecrop_list[0].update_type;			
				document.getElementById("pesticide_name").value=responseArray.updatecrop_list[0].name;
				document.getElementById("pesticide_quantity_uom").value=responseArray.updatecrop_list[0].qty_uom;
				//document.getElementById("pesticide_crop").value=responseArray.updatecrop_list[0].crop_id;
				document.getElementById("updatevariety").value=responseArray.updatecrop_list[0].variety_id;console.log(responseArray.updatecrop_list[0].variety_id);
				document.getElementById("pesticide_dosage_date").value=responseArray.updatecrop_list[0].process_date;
				document.getElementById("pesticide_dosage").value=responseArray.updatecrop_list[0].dosage;
				document.getElementById("pesticide_quantity").value=responseArray.updatecrop_list[0].qty;
				document.getElementById("cost_of_pesticide").value=responseArray.updatecrop_list[0].process_cost;
				$('input[type=radio][name="pesticide_feed_type"][value='+responseArray.updatecrop_list[0].status+']').prop('checked', true);
				//var pesticide_brand_name = responseArray.updatecrop_list[0].brand_name.split(",");
				//var items=document.getElementsByName('pesticide_brand_name[]');
				//for(var i=0; i<items.length; i++){
					//for(var j=0; j<pesticide_brand_name.length; j++){
						//i/f(items[i].type=='checkbox' && items[i].value==pesticide_brand_name[j])	{
							//items[i].checked=true;
						//}
					//}
				//}
           
				var variety=responseArray.updatecrop_list[0].farmer_id;
				getVarietyDetail( variety );
           
				var pesticide_brand=responseArray.updatecrop_list[0].name;
				getpesticideDetail( pesticide_brand );
								
			} else if(responseArray.updatecrop_list[0].update_type == 4) {
            $('#weeding_form_details').show();
				$('#nutrient_form_details').hide();
				$('#fertilizer_form_details').hide();
				$('#pesticide_form_details').hide();
				
                //Weeding
				document.getElementById("farmer_id").value=responseArray.updatecrop_list[0].farmer_id;
				document.getElementById("update_type").value=responseArray.updatecrop_list[0].update_type;
				//document.getElementById("weeding_crop").value=responseArray.updatecrop_list[0].crop_id;
				document.getElementById("weeding_variety").value=responseArray.updatecrop_list[0].variety;
				document.getElementById("weeding_dosage_date").value=responseArray.updatecrop_list[0].process_date;
				document.getElementById("weeding_dosage").value=responseArray.updatecrop_list[0].dosage;
				document.getElementById("weeding_quantity").value=responseArray.updatecrop_list[0].qty;
				document.getElementById("weeding_quantity_uom").value=responseArray.updatecrop_list[0].qty_uom;
				document.getElementById("cost_of_weeding").value=responseArray.updatecrop_list[0].process_cost;	
            document.getElementById("updatevariety").value=responseArray.updatecrop_list[0].variety_id;console.log(responseArray.updatecrop_list[0].variety_id);
			            
				//console.log(responseArray.updatecrop_list[0].weed_type);
				var variety=responseArray.updatecrop_list[0].farmer_id;
				getVarietyDetail( variety );
				if(responseArray.updatecrop_list[0].weed_type == 1) {					
                  $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);
				      $('#d0').show();
					document.getElementById("weeding_no_of_man").value=responseArray.updatecrop_list[0].man_days;
                } else {
                  $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);
				      $('#d0').hide();
                }
				if(responseArray.updatecrop_list[0].weed_type == 2) {
                  $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);
				      $('#d1').show();
				    document.getElementById("weeding_machine_hrs").value=responseArray.updatecrop_list[0].machine_hours;
                } else {
                  $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);
				      $('#d1').hide();
                }
                
                
				if(responseArray.updatecrop_list[0].weed_type == 3) {
                    $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);	
                    $('#d2').show();
						  document.getElementById("weeding_brand_name").value=responseArray.updatecrop_list[0].brand_name;
                    
                } else {
                  $('input[type=radio][name="type_weeding"][value='+responseArray.updatecrop_list[0].weed_type+']').prop('checked', true);
				    $('#d2').hide();
                }

				
			}
		} 
	},
	error:function(){
	alert('Error!!! Try again');
	} 
	});
	//$('[id^=door_no]').keypress(validateNumber);
});



$('form').submit(function(e){
	e.preventDefault();
	var updatecrop_id = "<?php //echo $_REQUEST['id']; ?>";
	const updatecropdata = $('#edit_updatecrop').serializeObject();
	if( updatecropdata !='') {
	var url="<?php echo base_url();?>fpo/updatecrop/update_crop/"+updatecrop_id;
		$.ajax({
			url:url,
			type:"POST",
			data:updatecropdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('fpo/updatecrop'); ?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	} else {
		alert('Please provide mandatory fields');
	}
}); 
        
        
$.fn.serializeObject = function(){
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

			
function getVarietyDetail(farmer_id, variety_id=null){
	if(farmer_id!=''){
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/variety/"+farmer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					var variety_list = '';
					$.each(responseArray.variety_list,function(key,value){
						 if(variety_id == value.id) {
							variety_list += '<option value='+value.id+' selected>'+value.variety_name+'</option>';
						 } else {
							variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
						 }
					});
					$('#nutrient_variety').html(variety_list);
					$('#fertilizer_variety').html(variety_list);
					$('#pesticide_variety').html(variety_list);
					$('#weeding_variety').html(variety_list);
				}
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		});
	} else {
		alert('Please provide mandatory field');
	}
}  


function getnutrientDetail(nutrient_id){
    var brand_id=document.getElementById("updatebrandname").value;
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
					var nutrient_list = '';
					$.each(responseArray.nutrient_list,function(key,value){console.log(nutrient_list);
						 if(brand_id == value.product) {
							nutrient_list += '<option value='+value.product+' selected="selected">'+value.name+'</option>';
						 } else {
							nutrient_list += '<option value='+value.product+'>'+value.name+'</option>';
						 }
					});
					$('#nutrient_brand_name').html(nutrient_list);
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
	if(fertilizer_id!=''){
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/fertilizer/"+fertilizer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
			response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					var fertilizer_list = '';
					$.each(responseArray.fertilizer_list,function(key,value){
						fertilizer_list += '<option value='+value.product+'>'+value.name+'</option>';
					});
					$('#fertilizer_brand_name').html(fertilizer_list);
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
					var pesticide_list = '';
					$.each(responseArray.pesticide_list,function(key,value){
						pesticide_list += '<option value='+value.product+'>'+value.name+'</option>';
					});
					$('#pesticide_brand_name').html(pesticide_list);
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

</script>	  
</body>
</html>
