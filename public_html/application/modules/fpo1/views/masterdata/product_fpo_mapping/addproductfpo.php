<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.select2{
    border-color: #007901 ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    text-transform: capitalize;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none;
    border-radius: 4px;
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
                        <h1>Add Product FPO Mapping</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('fpo/masterdata/productfpolist');?>">Product FPO Mapping</a></li>
                            <li class="active">Add Product FPO Mapping</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/masterdata/post_productfpo')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select stock group .">
														<option value="">Select Stock Group </option>
														<?php for($i=0; $i<count($stock_group);$i++) { ?>										
														 <option value="<?php echo $stock_group[$i]->id; ?>"><?php echo $stock_group[$i]->name; ?></option>
														<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Category<span class="text-danger">*</span></label>
													<select class="form-control" id="category" name="category" required="required" data-validation-required-message="Please Select category .">
													<option value="">Select Category</option>
													</select> 
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Sub Category<span class="text-danger">*</span></label>
													<select class="form-control" id="sub_category" name="sub_category" required="required" data-validation-required-message="Please Select sub category .">
													<option value="">Select Sub Category</option>
													</select> 
													<p class="help-block text-danger"></p>
												</div>
										 </div>
										 
										<div class="row row-space">																						
											<div class="form-group col-md-4">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select class="form-control" id="product" name="product" required="required" data-validation-required-message="Please Select product.">
													<option value="">Select Product </option>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
													<label for="inputAddress2">Classification <span class="text-danger">*</span></label>
													<select class="form-control classification" id="classification" name="classification" required="required" data-validation-required-message="Please Select classification.">
														<option value="">Select Classification</option>
														<?php for($i=0; $i<count($classificationInfo);$i++) { ?>										
														 <option value="<?php echo $classificationInfo[$i]->classification; ?>"><?php echo $classificationInfo[$i]->classification; ?></option>
														<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">HSN Code <span class="text-danger">*</span></label>
												<input type="hidden" name="hsn_id" class="form-control" id="hsn_id" required="required">
												<input type="text" name="hsn_code" class="form-control" id="hsn_code" required="required" placeholder="HSN Code" readonly data-validation-required-message="Please enter hsn code">
											</div>                                 
										</div>
										
										<div class="row row-space">											
											<div class="form-group col-md-12">
													<label for="inputAddress2">GST Category</label>
													<select class="form-control new_gst" id="gst_category" name="gst_category">
														<option value="">Select GST Category</option>
														<?php for($i=0; $i<count($taxvalue);$i++) { ?>										
														 <option value="<?php echo $taxvalue[$i]->hsn_code; ?>"><?php echo $taxvalue[$i]->hsn_category.'  -  ('.round($taxvalue[$i]->igst).' %)  -  '.$taxvalue[$i]->item_description; ?></option>
														<?php } ?>
													</select>
											<a href="<?php echo base_url('fpo/masterdata/gstdetail');?>" class="text-success ml-1">Refer Current GST Rates</a>
											<p class="help-block text-danger"></p>
											</div>											
										</div>
										<div class="form-row">
											<div class="form-group col-md-12 text-center">
												<div id="success"></div>
													<button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
													<a href="<?php echo base_url('fpo/masterdata/productfpolist');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script>	
	$(document).ready(function(){
		$('#stock_group').select2();
		$('#category').select2();
		$('#sub_category').select2();
		$('#product').select2();
		$('.new_gst').select2();
		
		$('.classification').select2({
			placeholder: "Select classification", //placeholder
			tags: true
		});
	
		$('#stock_group').on('change', function(e) {
				e.preventDefault();
				var group = $(this).val();
				$("#category option").remove();
				$("#sub_category option").remove();
				$('<option value="">Select Subcategory</option>').appendTo('#sub_category');
				$("#product option").remove();	
				$('<option value="">Select product</option>').appendTo('#product');
				if(group) { 
					$.ajax({
						url: '<?php echo base_url('fpo/masterdata/getcategory')?>',
						type: "POST",
						data:{group:group},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						    var div_data = '<option value="">Select Category</option>';
						    $.each(responsearr, function(key, value) {	
								div_data +="<option value="+value.id+">"+value.name+"</option>";							                           						
							});
							$(div_data).appendTo('#category');	  
						}
					});
				}						
			});	
			
			$('#category').on('change', function(e) {
				e.preventDefault();
				var category_id = $(this).val();
				var stock_group_id = $('#stock_group').val();
				$("#sub_category option").remove();	
				$("#product option").remove();					
				$('<option value="">Select product</option>').appendTo('#product');
				if(category) { 
					$.ajax({
						url: '<?php echo base_url('fpo/masterdata/getsubcategory')?>',
						type: "POST",
						data:{'category_id':category_id, 'stock_group_id':stock_group_id},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="">Select Subcategory</option>';
						    $.each(responsearr, function(key, value) {	
								div_data +="<option value="+value.id+">"+value.name+"</option>";							                              						
							});
							$(div_data).appendTo('#sub_category');	
						}
					});
				}						
			});	
			
			$('#sub_category').on('change', function(e) {
				e.preventDefault();
				var subcategory_id = $(this).val();
				var stock_group_id = $('#stock_group').val();
				var category_id = $('#category').val();
				$("#product option").remove();	
				if(product) { 
						$.ajax({
							url: '<?php echo base_url('fpo/masterdata/getproduct')?>',
							type: "POST",
							data:{'subcategory_id':subcategory_id, 'stock_group_id':stock_group_id, 'category_id':category_id},
							success:function(response){
								console.log(response);
								responsearr=$.parseJSON(response);								
								var div_data = '<option value="">Select product</option>';
								$.each(responsearr, function(key, value) {	
									div_data +="<option value="+value.id+">"+value.name+"</option>";																						
								});
								$(div_data).appendTo('#product');	
							}
						});
					}						
				});		  	
	});
	
	$('#gst_category').on('change', function(e) {
		e.preventDefault();
        $('#hsn_code').val("");
		var product = $(this).val();
		var product_code = product.split(" ");
        document.getElementById("hsn_code").value = product_code[0];
		document.getElementById("hsn_id").value = product;
	});	
</script>
</body>
</html>