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
							<li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("administrator/updatecrop");?>">Update Crop</a></li>
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
						<form  name="sentMessage" method="post" novalidate="novalidate" id="edit_updatecrop">
                     <input type="hidden"  name="updatevariety" id="updatevariety" >
                     <input type="hidden"  name="updatenutient" id="updatenutient" >
                     <input type="hidden"  name="updatebrandname" id="updatebrandname" > 
						   <div class="row row-space">
                               <div class="form-group col-md-6">
                                <label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
                                    <select id="farmer_id" name="farmer_id" class="form-control" readonly required="required" data-validation-required-message="Please select farmer" onchange="getVarietyDetail(this.value);" data-search="true">
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>										
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
												</select>
                                    <p class="help-block text-danger"></p>
                                </div>
                               
                                <div class="form-group col-md-6">
                                <input type="hidden" name="updatecrop_id" value="" id="updatecrop_id">
                                 <label for="inputState">Crop Update Type <span class="text-danger">*</span></label>
                                  <select id="update_type" name="update_type" class="form-control" required="required" data-validation-required-message="Please select update type" disabled>
                                    <option value="">Select Update Type</option>
                                    <option value="1">Nutrient</option>
                                    <option value="2">Fertilizer</option>
                                    <option value="3">Pesticides</option>
                                    <option value="4">Weeding</option>
                                  </select>
                                  <p class="help-block text-danger"></p>
                                </div>
						  </div>

						<div class="row row-space" style="display:none" id="nutrient_form_details">
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="nutrient_variety" name="nutrient_variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Nutrient Name <span class="text-danger">*</span></label>
							  <select id="nutrient_name" name="nutrient_name" class="form-control" disabled onchange="getnutrientDetail(this.value);" required="required" data-validation-required-message="Please select nutrient name">
								<option value="" >Select Nutrient</option>
								<?php for($i=0;$i<count($nutrient);$i++) { ?>
                           <option value="<?php echo $nutrient[$i]->id; ?>"><?php echo $nutrient[$i]->name; ?></option>
                        <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="nutrient_dosage_date" id="nutrient_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." disabled min="2018-01-01" max="2050-12-31">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<select id="nutrient_brand_name" name="nutrient_brand_name" class="form-control" disabled required="required" data-validation-required-message="Please select brand name">
									 </select>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="nutrient_dosage" name="nutrient_dosage" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
												<option value="">Select dosage</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
												<option value="32">32</option>
												<option value="33">33</option>
												<option value="34">34</option>
												<option value="35">35</option>
												<option value="36">36</option>
												<option value="37">37</option>
												<option value="38">38</option>
												<option value="39">39</option>
												<option value="40">40</option>
												<option value="41">41</option>
												<option value="42">42</option>
												<option value="43">43</option>
												<option value="44">44</option>
												<option value="45">45</option>
												<option value="46">46</option>
												<option value="47">47</option>
												<option value="48">48</option>
												<option value="49">49</option>
												<option value="50">50</option>
											</select>
									</div>
								   <div class="form-group col-md-3">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="nutrient_quantity" id="nutrient_quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity." disabled>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
										<select id="nutrient_quantity_uom" name="nutrient_quantity_uom" class="form-control" required="required" disabled data-validation-required-message="Please select quantity uom">
												 <option value="" >Select</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
												<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
											  </select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress">Cost of Nutrient (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="Cost of nutrient" required="required" data-validation-required-message="Please enter Cost of nutrient." disabled>
									</div>
							</div>
						  <div class="row row-space" style="display:none" id="fertilizer_form_details">
								<div class="form-group col-md-6">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <select id="fertilizer_variety" name="fertilizer_variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
								  </select>
								  <p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-6">
							<label for="inputState">Fertilizer Name <span class="text-danger">*</span></label>
							  <select id="fertilizer_name" name="fertilizer_name" disabled onchange="getfertilizerDetail(this.value);" class="form-control" required="required" data-validation-required-message="Please select fertilizer name" >
								<option value="" >Select Fertilizer</option>
								<?php for($i=0;$i<count($fertilizer);$i++) { ?>
                                  <option value="<?php echo $fertilizer[$i]->id; ?>"><?php echo $fertilizer[$i]->name; ?></option>
                        <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="fertilizer_dosage_date" id="fertilizer_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." min="2018-01-01" max="2050-12-31" disabled>
							   <p class="help-block text-danger"></p>
							  </div>
							   <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<select id="fertilizer_brand_name" name="fertilizer_brand_name" class="form-control" disabled required="required" data-validation-required-message="Please select brand name">
									  </select>
									  <p class="help-block text-danger"></p>
								  </div>
								<div class="form-group col-md-6">
									<label for="inputState">Dosage</label>
										<select id="fertilizer_dosage" name="fertilizer_dosage" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
											<option value="">Select Dosage</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
											<option value="32">32</option>
											<option value="33">33</option>
											<option value="34">34</option>
											<option value="35">35</option>
											<option value="36">36</option>
											<option value="37">37</option>
											<option value="38">38</option>
											<option value="39">39</option>
											<option value="40">40</option>
											<option value="41">41</option>
											<option value="42">42</option>
											<option value="43">43</option>
											<option value="44">44</option>
											<option value="45">45</option>
											<option value="46">46</option>
											<option value="47">47</option>
											<option value="48">48</option>
											<option value="49">49</option>
											<option value="50">50</option>
										</select>
									</div>
								    <div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="fertilizer_feed_type" value="1" class="form-check-input" required disabled>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="drip" name="fertilizer_feed_type" value="2" class="form-check-input" disabled>Drip
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>			
										  </div>
									</div>
								    <div class="form-group col-md-3">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="fertilizer_quantity" id="fertilizer_quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity." disabled>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
										<select id="fertilizer_quantity_uom" name="fertilizer_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom" disabled>
												 <option value="" >Select</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
												<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
											  </select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress">Cost of Fertilizer (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly" name="cost_of_fertilizer" maxlength="6" id="cost_of_fertilizer" placeholder="Cost of Fertilizer" required="required" data-validation-required-message="Please enter cost of fertilizer." disabled>
									</div>
						     </div>
							 <!--pesticide-->
						<div class="row row-space" style="display:none" id="pesticide_form_details">
							<div class="form-group col-md-6">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="pesticide_variety" name="pesticide_variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
							<label for="inputState">Pesticide Name <span class="text-danger">*</span></label>
							  <select id="pesticide_name" name="pesticide_name" class="form-control" disabled onchange="getpesticideDetail(this.value);" required="required" data-validation-required-message="Please select pesticide name">
								<option value="" >Select Pesticide</option>
								<?php for($i=0;$i<count($pesticide);$i++) { ?>
                                  <option value="<?php echo $pesticide[$i]->id; ?>"><?php echo $pesticide[$i]->name; ?></option>
                                <?php } ?>  								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-6">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="pesticide_dosage_date" id="pesticide_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." disabled min="2018-01-01" max="2050-12-31">
							   <p class="help-block text-danger"></p>
							  </div>
							 <div class="form-group col-md-6">
								 <label class=" form-control-label">Brand Name<span class="text-danger">*</span></label>
									<select id="pesticide_brand_name" name="pesticide_brand_name" class="form-control" disabled  required="required" data-validation-required-message="Please select brand name">
									  </select>
									  <p class="help-block text-danger"></p>
								  </div>
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="pesticide_dosage" name="pesticide_dosage" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
												<option value="">Select Dosage</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
												<option value="32">32</option>
												<option value="33">33</option>
												<option value="34">34</option>
												<option value="35">35</option>
												<option value="36">36</option>
												<option value="37">37</option>
												<option value="38">38</option>
												<option value="39">39</option>
												<option value="40">40</option>
												<option value="41">41</option>
												<option value="42">42</option>
												<option value="43">43</option>
												<option value="44">44</option>
												<option value="45">45</option>
												<option value="46">46</option>
												<option value="47">47</option>
												<option value="48">48</option>
												<option value="49">49</option>
												<option value="50">50</option>
											</select>
									</div>
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="pesticide_feed_type" value="1" class="form-check-input" required disabled>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="sprayer" name="pesticide_feed_type" value="2" class="form-check-input" disabled>Sprayer
												   
												</label>
											   </div>
											</div>			
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
								    <div class="form-group col-md-3">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="pesticide_quantity" id="pesticide_quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity." disabled>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
										<select id="pesticide_quantity_uom" name="pesticide_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select brand name" disabled>
												 <option value="" >Select </option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
												<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
											  </select>
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress">Cost of Pesticides (<i class="fa fa-rupee"></i>)</label>
										<input type="text" class="form-control numberOnly" name="cost_of_pesticide" maxlength="6" id="cost_of_pesticide" placeholder="Cost of Pesticides" required="required" data-validation-required-message="Please enter Cost of nutrient." disabled>
									</div>
						</div>
						<!--weeding-->
							<div class="row row-space" style="display:none" id="weeding_form_details">

								<div class="form-group col-md-6">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <select id="weeding_variety" name="weeding_variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled>
								  </select>
								  <p class="help-block text-danger"></p>
								</div>
								 <div class="form-group col-md-6">
									<label for="inputAddress">Date</label>
									<input type="date" class="form-control" name="weeding_dosage_date" id="weeding_dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage." disabled min="2018-01-01" max="2050-12-31">
								   <p class="help-block text-danger"></p>
								  </div>								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="weeding_dosage" name="weeding_dosage" class="form-control" required="required" data-validation-required-message="Please select dosage" disabled>
												<option value="">Select Dosage</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
												<option value="32">32</option>
												<option value="33">33</option>
												<option value="34">34</option>
												<option value="35">35</option>
												<option value="36">36</option>
												<option value="37">37</option>
												<option value="38">38</option>
												<option value="39">39</option>
												<option value="40">40</option>
												<option value="41">41</option>
												<option value="42">42</option>
												<option value="43">43</option>
												<option value="44">44</option>
												<option value="45">45</option>
												<option value="46">46</option>
												<option value="47">47</option>
												<option value="48">48</option>
												<option value="49">49</option>
												<option value="50">50</option>
											</select>
									</div>
									<div class="form-group col-md-6">
										  <label class=" form-control-label">Type of Weeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" onclick="show(0)" name="type_weeding" value="1" class="form-check-input" required disabled><span class="ml-1">Manual</span>
												  
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="machine" onclick="show(1)" name="type_weeding" value="2" class="form-check-input" disabled><span class="ml-1">Machine</span>
												   
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="chemicals" onclick="show(2)" name="type_weeding" value="3" class="form-check-input" disabled><span class="ml-1">Chemicals</span> 
												</label>
											   </div>
											</div>	
										  </div>
										  <div class="help-block with-errors text-danger"></div>
									  </div>
										<div class="form-group col-md-6" style="display:none;" id="d2">
											<label for="inputAddress">Brand Name</label>
											 <select id="weeding_brand_name" name="weeding_brand_name" class="form-control" disabled  required="required" data-validation-required-message="Please select brand name">
												 <option value="" >Select Brand Name</option>
												<?php for($i=0;$i<count($pesticide);$i++) { ?>
												<option value="<?php echo $pesticide[$i]->id; ?>"><?php echo $pesticide[$i]->name; ?></option>
														  <?php } ?> 						
											  </select>
											</div>
										<div class="form-group col-md-6 manual" style="display:none;" id="d0">
											<label for="inputAddress">No. of Man days</label>
											<input type="text" class="form-control numberOnly" name="weeding_no_of_man" id="weeding_no_of_man" maxlength="3" placeholder="No.of.Man" required="required" data-validation-required-message="Please enter no.of man." disabled>
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-6 machine" style="display:none;" id="d1">
											<label for="inputAddress">Machine Hours</label>
											<input type="text" class="form-control numberOnly" name="weeding_machine_hrs" id="weeding_machine_hrs" maxlength="4" placeholder="Machine Hours" required="required" data-validation-required-message="Please enter machine hours." disabled>
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-3">
											<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="weeding_quantity" id="weeding_quantity" disabled maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity." disabled>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-3">
											<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
											<select id="weeding_quantity_uom" name="weeding_quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom" disabled>
												 <option value="" >Select Quantity UOM</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
												<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
											  </select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress">Cost of Weeding (<i class="fa fa-rupee"></i>)</label>
											<input type="text" class="form-control numberOnly" name="cost_of_weeding" maxlength="6" id="cost_of_weeding" placeholder="Cost of Weeding" required="required" data-validation-required-message="Please enter Cost of weeding." disabled>
										</div>
                           </div>
                           <div class="col-md-12 text-center">
                                 <div id="success"></div>
                                 <a href="<?php echo base_url('administrator/updatecrop/edit_updatecrop?id=').$_REQUEST['id']?>" id="edit" class="btn-fs btn btn-success text-center"><i class="fa fa-edit"></i> Edit Update Crop<a>
								        <a href="<?php echo base_url('administrator/updatecrop');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
    //alert(maxDate);
    $('#nutrient_dosage_date').attr('max', maxDate);
	$('#pesticide_dosage_date').attr('max', maxDate);
	$('#fertilizer_dosage_date').attr('max', maxDate);
	$('#weeding_dosage_date').attr('max', maxDate);
});
	
	
	
	function show(number) {
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

$(document).ready(function(){
    $('input[type="radio"]').click(function(){
	   var inputValue = $(this).attr("value");
		$("." + inputValue).toggle();
    });
});
				
//sweet alert

        
  $(document).ready(function(){
	//edit Update crop API CALL
	var updatecrop_id = <?php echo $_REQUEST['id']?>;
	
	//jQuery method
	$.ajax({
	url: "<?php echo base_url();?>administrator/updatecrop/updatecrop_edit/"+updatecrop_id,	
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
                    ///var items=document.getElementsByName('weeding_brand_name[]');
                    //var weeding_brand_name = responseArray.updatecrop_list[0].brand_name.split(",");

                    /* var items=document.getElementsByName('weeding_brand_name[]');
                    for(var i=0; i<items.length; i++){
                        for(var j=0; j<weeding_brand_name.length; j++){
                            if(items[i].type=='checkbox' && items[i].value==weeding_brand_name[j])	{
                                items[i].checked=true;
                            }
                        }
                    } */
				
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


//update
$('form').submit(function(e){
	e.preventDefault();
	var updatecrop_id = <?php echo $_REQUEST['id']?>;
	const updatecropdata = $('#edit_updatecrop').serializeObject();
	if( updatecropdata !='')
		{
	var url="<?php echo base_url();?>administrator/updatecrop/update_crop/"+updatecrop_id;
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
					window.location = "<?php echo base_url('administrator/updatecrop')?>";
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


			
function getVarietyDetail( farmer_id ) {
    var variety_id=document.getElementById("updatevariety").value;
   if( farmer_id !='')
				{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/variety/"+farmer_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		console.log(response);
		responseArray=$.parseJSON(response);
		console.log(responseArray);
		if(responseArray.status==1){

		var variety_list = '';
		$.each(responseArray.variety_list,function(key,value){
		console.log(value.variety_id);
         if(variety_id == value.variety_id) {
            variety_list += '<option value='+value.id+' selected="selected">'+value.variety_name+'</option>';
         }
         else {
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
	}	
	else
	{
		alert('Please provide mandatory field');
	}
}  


function getnutrientDetail( nutrient_id ) {
    var brand_id=document.getElementById("updatebrandname").value;
    if( nutrient_id !='')
				{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/nutrient/"+nutrient_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		console.log(response);
		responseArray=$.parseJSON(response);
		console.log(responseArray);
		if(responseArray.status==1){	
		var nutrient_list = '';
		$.each(responseArray.nutrient_list,function(key,value){console.log(nutrient_list);
         if(brand_id == value.product) {
            nutrient_list += '<option value='+value.product+' selected="selected">'+value.name+'</option>';
         }
         else {
            nutrient_list += '<option value='+value.product+'>'+value.name+'</option>';
         }
		});
		$('#nutrient_brand_name').html(nutrient_list);
		//$('#fertilizer_variety').html(variety_list);
		//$('#pesticide_variety').html(variety_list);
		//$('#weeding_variety').html(variety_list);
		}

		},
		error:function(response){
		alert('Error!!! Try again');
		} 			
	}); 
	}
	else
		{
			alert('Please provide mandatory field');
		}
}  

function getfertilizerDetail( fertilizer_id ) {
	if( fertilizer_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/fertilizer/"+fertilizer_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		console.log(response);
		responseArray=$.parseJSON(response);
		console.log(responseArray);
		if(responseArray.status==1){

		var fertilizer_list = '';
		$.each(responseArray.fertilizer_list,function(key,value){
		//console.log(value.variety_name);
		fertilizer_list += '<option value='+value.product+'>'+value.name+'</option>';
		});
		$('#fertilizer_brand_name').html(fertilizer_list);
		//$('#fertilizer_variety').html(variety_list);
		//$('#pesticide_variety').html(variety_list);
		//$('#weeding_variety').html(variety_list);
		}

		},
		error:function(response){
		alert('Error!!! Try again');
		} 			
	}); 
		}
		else
			{
				alert('Please provide mandatory field');
			}
}  

function getpesticideDetail( pesticide_id ) {
	 if( pesticide_id !='')
		{
	//alert(pesticide_id);
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/pesticide/"+pesticide_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		console.log(response);
		responseArray=$.parseJSON(response);
		console.log(responseArray);
		if(responseArray.status==1){

		var pesticide_list = '';
		$.each(responseArray.pesticide_list,function(key,value){
		console.log(value.variety_name);
		pesticide_list += '<option value='+value.product+'>'+value.name+'</option>';
		});
		$('#pesticide_brand_name').html(pesticide_list);
		//$('#fertilizer_variety').html(variety_list);
		//$('#pesticide_variety').html(variety_list);
		//$('#weeding_variety').html(variety_list);
		}

		},
		error:function(response){
		alert('Error!!! Try again');
		} 			
	}); 
		}
	else
	{
		alert('Please provide mandatory field');
	}
} 	
</script>	  
</body>
</html>
