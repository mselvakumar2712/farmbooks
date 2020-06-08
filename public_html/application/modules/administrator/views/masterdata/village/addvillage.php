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
                        <h1>Add Village</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/villagelist');?>">Village</a></li>
                            <li class="active"> Add Village</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_village')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="state_name" name="state_name" required="required" data-validation-required-message="Please Select state name .">
													<option value="">Select State Name </option>
													<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="district_name" name="district_name" required="required" data-validation-required-message="Please Select district name .">
													<option value="">Select District Name </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Block Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="block_name" name="block_name" required="required" data-validation-required-message="Please Select block name .">
													<option value="">Select Block Name </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="taluk_name" name="taluk_name" required="required" data-validation-required-message="Please Select taluk name .">
													<option value="">Select Block Name </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
																						
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Gram Panchayat Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="gram_panchayat_name" name="gram_panchayat_name" required="required" data-validation-required-message="Please Select gram panchayat name .">
													<option value="">Select Gram Panchayat Name </option>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											
											<div class="form-group col-md-6">
												<label for="inputAddress2">Village Name (In English) <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  id="village_name" name="village_name" placeholder="Village Name In English"  required="required" data-validation-required-message="Please enter village name.">
												<p class="help-block text-danger"></p>
											</div>	
										</div>
										<div class="row row-space">												
											<div class="form-group col-md-6">
												<label for="inputAddress2">Village Name (In Local Language) <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  id="village_name_local" name="village_name_local" placeholder="Village Name In local Language"  required="required" data-validation-required-message="Please enter village name in local language.">
												<p class="help-block text-danger"></p>
											</div>		
										</div>	
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/villagelist');?>" class="btn btn-outline-dark">Cancel</a>	
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
$(document).ready(function() {
    $('select[name="state_name"]').on('change', function(e) {
			   e.preventDefault();
			   var state = $(this).val();
			   $("#district_name option").remove() ;				
				if(state) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
						type: "POST",
						data:{state:state},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select District Name</option>';
						   $.each(responsearr, function(key, value) {	
							console.log(value.id);						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                             							
							});
							 $(div_data).appendTo('#district_name');	
						}
					});
				}						
			});	

            
			$('select[name="district_name"]').on('change', function(e) {
				e.preventDefault();
				var district = $(this).val();
			   $("#block_name option").remove() ;				
				if(district) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getblock')?>',
						type: "POST",
						data:{district:district},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select Block Name</option>';
						   $.each(responsearr, function(key, value) {						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                              						
							});
							$(div_data).appendTo('#block_name');	
						}
					});
				}						
			});
    
    
        $('select[name="block_name"]').on('change', function(e) {
				e.preventDefault();
				var block = $(this).val();
			   $("#taluk_name option").remove() ;				
				if(block) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/gettaluk')?>',
						type: "POST",
						data:{block:block},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
								var div_data = '<option value="">Select Taluk Name</option>';
						   $.each(responsearr, function(key, value) {						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                            							
							});
							$(div_data).appendTo('#taluk_name');	  
						}
					});
				}						
			});
    
    
        $('select[name="taluk_name"]').on('change', function(e) {
				e.preventDefault();
				var taluk = $(this).val();
			   $("#gram_panchayat_name option").remove() ;				
				if(taluk) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getpanchayat')?>',
						type: "POST",
						data:{taluk:taluk},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   var div_data = '<option value="">Select Gram Panchayat Name</option>';
						   $.each(responsearr, function(key, value) {						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                            							
							});
							 $(div_data).appendTo('#gram_panchayat_name');	 
						}
					});
				}						
			});
});
          
    
</script>
</body>
</html>