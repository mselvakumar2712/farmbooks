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
                        <h1>Add Product FPO Mapping</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/productfpolist');?>">Product FPO Mapping</a></li>
                            <li class="active">Add Product FPO Mapping</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_productfpo')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the FPO <span class="text-danger">*</span></label>
													<select class="form-control" id="fpo" name="fpo" required="required" data-validation-required-message="Please Select name of the fpo.">
														<option value="">Select Name of the FPO </option>
														<?php for($i=0; $i<count($fpo);$i++) { ?>										
														 <option value="<?php echo $fpo[$i]->id; ?>"><?php echo $fpo[$i]->producer_organisation_name; ?></option>
														<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select stock group .">
														<option value="">Select Stock Group </option>
														<?php for($i=0; $i<count($stock_group);$i++) { ?>										
														 <option value="<?php echo $stock_group[$i]->id; ?>"><?php echo $stock_group[$i]->name; ?></option>
														<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Category <span class="text-danger">*</span></label>
												<select class="form-control" id="category" name="category" required="required"  data-validation-required-message="Please Select category .">
													<option value="">Select Category</option>
												</select> 
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Sub Category <span class="text-danger">*</span></label>
												<select class="form-control" id="sub_category" name="sub_category" required="required"  data-validation-required-message="Please Select sub category .">
													<option value="">Select Sub Category</option>
												</select> <p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Product <span class="text-danger">*</span></label>
												<select class="form-control" id="product" name="product" required="required" data-validation-required-message="Please Select product  .">
													<option value="">Select Product</option>
												</select>
												<p class="help-block text-danger"></p>
											</div>	
										</div>
										<div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/productfpolist');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
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
/* 	$(document).ready(function() {
		$('select[name="product"]').on('change', function(e) {
				e.preventDefault();
				var product = $(this).val();
			  			
				if(product) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getgroupbyproduct')?>',
						type: "POST",
						data:{product:product},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							 $.each(responsearr, function(key, value) {	
							    var group_id=value.stock_group_id;
								if(group_id){
									 $("#stock_group option").remove() ;	
								$.ajax({
										url: '<?php echo base_url('administrator/masterdata/getstockbyid')?>',
										type: "POST",
										data:{stock:group_id},
										success:function(response) {
											responsearr=$.parseJSON(response);
											console.log(response);
											var div_data = '<option value="">Select Stock Group</option>';
											$.each(responsearr, function(key, value) {	
													 
												 div_data +="<option value="+value.id+">"+value.name+"</option>";
							 	                            																					
											});
											  $(div_data).appendTo('#stock_group');
										}
									});
								 }
								 
							 	                            							
							});
							
						}
					});
				}						
			});	
		$('select[name="stock_group"]').on('change', function(e) {
				e.preventDefault();
				var group = $(this).val();
			   $("#category option").remove() ;				
				if(group) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getcategory')?>',
						type: "POST",
						data:{group:group},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select Crop Category</option>';
						    $.each(responsearr, function(key, value) {	
							console.log(value.id);						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							 	                            							
							});
							 $(div_data).appendTo('#category');
						}
					});
				}						
			});	
			$('select[name="category"]').on('change', function(e) {
				e.preventDefault();
				var sub_category = $(this).val();
			   $("#sub_category option").remove() ;				
				if(category) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getsubcategory')?>',
						type: "POST",
						data:{subcategory:sub_category},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select Crop Sub Category</option>';
						    $.each(responsearr, function(key, value) {	
							console.log(value.id);						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                      							
							});
							$(div_data).appendTo('#sub_category');	        
						}
					});
				}						
			});	
	  	
	});
	 */
	
	//new
		$(document).ready(function() {
		$('#stock_group').on('change', function(e) {
				e.preventDefault();
				var group = $(this).val();
			   $("#category option").remove() ;				
				if(group) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getcategory')?>',
						type: "POST",
						data:{group:group},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						    var div_data = '<option value="">Select Category</option>';
						    $.each(responsearr, function(key, value) {	
							console.log(value.id);						   
								 div_data +="<option value="+value.id+">"+value.name+"</option>";
							                           							
							});
							 $(div_data).appendTo('#category');	  
						}
					});
				}						
			});	
			
			$('#category').on('click', function(e) {
				e.preventDefault();
				var sub_category = $(this).val();
			   $("#sub_category option").remove() ;				
				if(category) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getsubcategory')?>',
						type: "POST",
						data:{subcategory:sub_category},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select Subcategory</option>';
						    $.each(responsearr, function(key, value) {	
							console.log(value.id);						   
								div_data +="<option value="+value.id+">"+value.name+"</option>";
							                              							
							});
							$(div_data).appendTo('#sub_category');	
						}
					});
				}						
			});	
			
			$('#sub_category').on('click', function(e) {
			   e.preventDefault();
			   var product = $(this).val();
			   $("#product option").remove();	
				if(product) { 
						$.ajax({
							url: '<?php echo base_url('administrator/masterdata/getproduct')?>',
							type: "POST",
							data:{product:product},
							success:function(response) {
								responsearr=$.parseJSON(response);
								console.log(response);
								var div_data = '<option value="">Select product</option>';
								$.each(responsearr, function(key, value) {	
								console.log(value.id);						   
									div_data +="<option value="+value.id+">"+value.name+"</option>";
																						
								});
								$(div_data).appendTo('#product');	
							}
						});
					}						
				});
	  	
		});
	
	
  
</script>
</body>
</html>