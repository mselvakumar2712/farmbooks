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
                        <h1>Add Seed</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/seedlist');?>">Seed</a></li>
                            <li class="active">Add UOM</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_seed')?>"  method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_category" name="crop_category" required="required" data-validation-required-message="Please Select crop category.">
													<option value="">Select Crop Category</option>
													<?php for($i=0; $i<count($category);$i++) { ?>										
													<option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
													<?php } ?>	
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Sub Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_subcategory" name="crop_subcategory" required="required" data-validation-required-message="Please Select crop sub category.">
													<option value="">Select Crop Sub Category</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_name" name="crop_name" required="required" data-validation-required-message="Please Select crop name.">
													<option value="">Select Crop Name</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											</div>
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Variety <span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_variety" name="crop_variety" required="required" data-validation-required-message="Please Select crop variety.">
													<option value="">Select Crop Variety</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>							
												<div class="form-group col-md-4">
													<label for="inputAddress2">Class</label>
													<input type="text" class="form-control"   maxlength="50" id="class" name="class" placeholder="Class">
												</div>	
											</div>	
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/seedlist');?>" class="btn btn-outline-dark">Cancel</a>	
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
	$('select[name="crop_category"]').on('change', function(e) {
		e.preventDefault();
		var crop_category = $(this).val();
		$("#crop_subcategory option").remove() ;				
		if(crop_category) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
			type: "POST",
			data:{crop_category:crop_category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Sub Category</option>';
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
				 div_data +="<option value="+value.id+">"+value.name+"</option>";
				                         							
				});
				 $(div_data).appendTo('#crop_subcategory');	    
			}
		});
		}						
	});			
	$('select[name="crop_subcategory"]').on('change', function(e) {
		e.preventDefault();
		var crop_sub_category = $(this).val();
		$("#crop_name option").remove() ;				
		if(crop_sub_category) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getnameid')?>',
			type: "POST",
			data:{crop_sub_category:crop_sub_category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Crop Name</option>';
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
				    div_data +="<option value="+value.id+">"+value.name+"</option>";
				  	                            							
				});
				$(div_data).appendTo('#crop_name');
			}
		});
		}						
	});
	$('select[name="crop_name"]').on('change', function(e) {
		e.preventDefault();
		var cropname = $(this).val();
		$("#crop_variety option").remove() ;				
		if(cropname) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
			type: "POST",
			data:{crop_name:cropname},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
					var div_data = '<option value="">Select Crop Variety</option>';
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
				 div_data +="<option value="+value.id+">"+value.variety+"</option>";
				 	                            							
				});
				 $(div_data).appendTo('#crop_variety');
			}
		});
		}						
	});	
	</script>
</body>
</html>