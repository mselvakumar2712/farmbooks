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
                        <h1>Add New Update Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Crop Management</a></li>
                            <li><a href="#">Crop Master</a></li>
                            <li class="active">Add Update Crop</u></li>
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
						<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="add_updatecrop">
						   <div class="row row-space">
						   <div class="form-group col-md-4"></div>
							<div class="form-group col-md-4">
							 <label for="inputState">Crop Update Type </label>
							  <select id="update_type" name="update_type" class="form-control" required="required" data-validation-required-message="Please select update type">
								<option value="1" >Select Update Type</option>
								<option value="1" >Nutrient</option>
								<option value="2">Fertilizer</option>
								<option value="3">Pesticides</option>
								<option value="4">Weeding</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4"></div>
						  </div>

						<div class="row row-space" style="display:none" id="nutrient_form_details">
						   <div class="form-group col-md-4">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="select_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="1" >Select Crop</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<option value="1" >Select Update Type</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-4">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage.">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name</label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 1
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 2
									   </label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option3" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 3
										 </label>
									   </div>
									</div>			
								  </div>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
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
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="quantity" id="quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-6">
										<label for="inputAddress">Cost of Nutrient</label>
										<input type="text" class="form-control numberOnly" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="Cost of nutrient" required="required" data-validation-required-message="Please enter Cost of nutrient.">
									</div>
						  </div>
						  <div class="row row-space" style="display:none" id="fertilizer_form_details">
						   <div class="form-group col-md-4">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="select_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="1" >Select Crop</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<option value="1" >Select Update Type</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-4">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage.">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name</label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 1
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 2
									   </label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option3" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 3
										 </label>
									   </div>
									</div>			
								  </div>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
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
								   <div class="form-group col-md-4">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="feeding" value="1" class="form-check-input" required>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="drip" name="feeding" value="2" class="form-check-input" required>Drip
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
								 <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="quantity" id="quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Fertilizer</label>
										<input type="text" class="form-control numberOnly" name="cost_of_fertilizer" maxlength="6" id="cost_of_fertilizer" placeholder="Cost of Fertilizer" required="required" data-validation-required-message="Please enter cost of fertilizer.">
									</div>
						     </div>
							 <!--pesticide-->
						<div class="row row-space" style="display:none" id="pesticide_form_details">
						   <div class="form-group col-md-4">
							 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
							  <select id="select_crop" name="select_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
								<option value="1" >Select Crop</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
							  <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
								<option value="1" >Select Update Type</option>
								
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							 <div class="form-group col-md-4">
								<label for="inputAddress">Date of Dosage <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage.">
							   <p class="help-block text-danger"></p>
							  </div>
							  
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Brand Name</label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option1" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 1
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option2" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 2
									   </label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="brand_name" name="brand_name[]" value="option3" class="form-check-input" required="required" data-validation-required-message="Please select.">Land 3
										 </label>
									   </div>
									</div>			
								  </div>
								  </div>
								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
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
									<div class="form-group col-md-4">
										  <label class=" form-control-label">Type of Feeding <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="manual" name="feeding" value="1" class="form-check-input" required>Manual
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="sprayer" name="sprayer" value="2" class="form-check-input" required>Sprayer
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>			
										  </div>
									  </div>
								    <div class="form-group col-md-4">
										<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly" name="quantity" id="quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity.">
										<p class="help-block text-danger"></p>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress">Cost of Nutrient</label>
										<input type="text" class="form-control numberOnly" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="Cost of nutrient" required="required" data-validation-required-message="Please enter Cost of nutrient.">
									</div>
						</div>
						<!--weeding-->
							<div class="row row-space" style="display:none" id="weeding_form_details">
							   <div class="form-group col-md-4">
								 <label for="inputState">Select Crop <span class="text-danger">*</span></label>
								  <select id="select_crop" name="select_crop" class="form-control" required="required" data-validation-required-message="Please select select crop">
									<option value="1" >Select Crop</option>
									
								  </select>
								  <p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-4">
								 <label for="inputState">Select Variety <span class="text-danger">*</span></label>
								  <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
									<option value="1" >Select Update Type</option>
									
								  </select>
								  <p class="help-block text-danger"></p>
								</div>
								 <div class="form-group col-md-4">
									<label for="inputAddress">Date</label>
									<input type="date" class="form-control" name="dosage_date" id="dosage_date" placeholder="Date of Dosage" required="required" data-validation-required-message="Please enter Date of Dosage.">
								   <p class="help-block text-danger"></p>
								  </div>								  
								  <div class="form-group col-md-6">
										<label for="inputState">Dosage</label>
										    <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
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
												  <input type="checkbox" id="manual" name="type_weeding" value="1" class="form-check-input" required>Manual
												  <div class="help-block with-errors text-danger"></div>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="machine" name="type_weeding" value="2" class="form-check-input" required>Machine
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="checkbox" id="chemicals" name="type_weeding" value="3" class="form-check-input" required>Chemicals
												   <div class="help-block with-errors text-danger"></div>
												</label>
											   </div>
											</div>	
										  </div>
									  </div>
										<div class="form-group col-md-4" style="display:none;" id="brandname">
											<label for="inputAddress">Brand Name</label>
											<input type="text" class="form-control" name="brand_name" id="brand_name"  placeholder="Brand Name" required="required" data-validation-required-message="Please enter Brand Name.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4" style="display:none;" id="num_of_man">
											<label for="inputAddress">No. of Man days</label>
											<input type="text" class="form-control numberOnly" name="no_of_man" id="no_of_man" maxlength="3" placeholder="No.of.Man" required="required" data-validation-required-message="Please enter no.of man.">
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-4" style="display:none;" id="mac_hrs">
											<label for="inputAddress">Machine Hours</label>
											<input type="text" class="form-control numberOnly" name="machine_hrs" id="machine_hrs" maxlength="4" placeholder="Machine Hours" required="required" data-validation-required-message="Please enter machine hours.">
											<p class="help-block text-danger"></p>
										</div> 
										<div class="form-group col-md-4">
											<label for="inputAddress">Quantity <span class="text-danger">*</span></label>
											<input type="text" class="form-control numberOnly" name="quantity" id="quantity" maxlength="4" placeholder="Quantity" required="required" data-validation-required-message="Please enter Quantity.">
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress">Cost of Nutrient</label>
											<input type="text" class="form-control numberOnly" name="cost_of_nutrient" maxlength="6" id="cost_of_nutrient" placeholder="Cost of nutrient" required="required" data-validation-required-message="Please enter Cost of nutrient.">
										</div>
							</div>
							<div class="row row-space">
								<div class="form-group col-md-5">&nbsp;</div>
								<div class="form-group col-md-2">
									<div class="form-group">
										<div id="success"></div>
										<input id="sendMessageButton" value="Save" class="btn btn-success text-center mt-10" type="submit">
										<input id="sendMessageButton" value="Cancel" class="btn swal-button-cancel text-center mt-10" type="button">	
									</div>						  
								</div>
								<div class="form-group col-md-5">&nbsp;</div>
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
	    $('select[name="update_type"]').on('change', function() {
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
			});
		
		/* 	var type_weeding=$("input[name='type_weeding']");
				 $('input').on('click', function() {
						if (type_weeding.is(':checked')) {
						  $("input[name='type_weeding']:checked").each ( function() {
								var chkId = $(this).val();
								alert(chkId);
								if(chkId == 1) {								
									$('#num_of_man').show();
									$('#mac_hrs').hide();
									$('#brandname').hide();							
								} else if(chkId == 2) {
									$('#num_of_man').show();
									$('#brandname').hide();
									$('#num_of_man').hide();
								} else {
									$('#brandname').show();
									$('#num_of_man').hide();
									$('#num_of_man').hide();
								}
						  });
						}
				}); 
				 */
			$("input[name='type_weeding']").change(function(){
			if ( $(this).is(':checked') ) {
				$("#num_of_man").show();
				} else {
				$("#num_of_man").hide();
				}
			if ($(this).is(':checked') ) {
				$("#brandname").show();
				} else {
				$("#brandname").hide();
				}
			if ( $(this).is(':checked') ) {
				$("#mac_hrs").show();
				} else {
				$("#mac_hrs").hide();
				}	
				
			});
				
				
				
			
			//api call
			
		/* 	$('form').submit(function(e){
				e.preventDefault(); 
				const updatecropData = $('#add_updatecrop').serializeObject();
				console.log(updatecropData);
			 	$.ajax({
					url:"<?php echo base_url();?>administrator/updatecrop/postupdate",
					type:"POST",
					data:updatecropData,
					dataType:"html",
					cache:false,			
					success:function(response){		  
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(response);
						
						if(responseArray.status == 1){
							$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
							window.location = "<?php echo base_url('administrator/farmer/profilelist')?>";
						}
					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
				}); 
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
			
        });  */
			
	</script>
	 
 
</body>
</html>
