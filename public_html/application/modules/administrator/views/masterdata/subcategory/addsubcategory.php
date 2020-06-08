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
                        <h1>Add Sub Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/subcategorylist');?>">Sub Category</a></li>
                            <li class="active">Add Sub Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_subcategory')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select stock group .">
													<option value="">Select Stock Group </option>
													<?php for($i=0; $i<count($stock_group);$i++) { ?>										
													 <option value="<?php echo $stock_group[$i]->id; ?>"><?php echo $stock_group[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="category" name="category" required="required" data-validation-required-message="Please Select category.">
													<option value="">Select Category </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>											
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Sub Product Category (In English)  <span class="text-danger">*</span></label>
												<input type="text" class="form-control "   minlength="3" maxlength="75"  id="sub_product_category" name="sub_product_category" placeholder="Sub Product Category In English" required="required" data-validation-required-message="Please enter sub product category in english.">
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-6">
													<label for="inputAddress2">Sub Product Category (In Local Language)  <span class="text-danger">*</span></label>
													<input type="text" class="form-control "   minlength="3" maxlength="75"  id="sub_product_category_local" name="sub_product_category_local" placeholder="Sub Product Category In Local Language" required="required" data-validation-required-message="Please enter sub product category in local language.">
												    <p class="help-block text-danger"></p>
											</div>
										</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/subcategorylist');?>" class="btn btn-outline-dark">Cancel</a>	
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
	  $(document).ready(function(){
		 $('select[name="stock_group"]').on('change', function(e) {
				e.preventDefault();
				 var stock_group = document.getElementById("stock_group").value;
				  console.log(stock_group);
				 if(stock_group==0){
					 var div_data="<option value='0'>All</option>";
					 $(div_data).appendTo('#category');	    
				 }
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
						   $.each(responsearr, function(key, value) {						   
								var div_data="<option value="+value.id+">"+value.name+"</option>";
							  $(div_data).appendTo('#category');	                            							
							});
						}
					});
				}						
			});			
	  });
	  </script>
</body>
</html>