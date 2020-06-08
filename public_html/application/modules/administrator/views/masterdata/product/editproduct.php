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
                        <h1>View Product</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/productlist');?>">Product</a></li>
                            <li class="active">View Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updateproduct/'.$product_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="product_id" value="<?php echo $product_info['id']?>" id="product_id">
				 <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select stock group ."readonly>
													<option value="">Select Stock Group </option>
													<?php for($i=0; $i<count($stock_group);$i++) {
														if($product_info['stock_group_id']==$stock_group[$i]->id){	
														echo '<option value="'.$stock_group[$i]->id.'" selected="selected">'.$stock_group[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$stock_group[$i]->id.'">'.$stock_group[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="category" name="category" required="required" data-validation-required-message="Please Select category ."disabled>
													<option value="">Select Category</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Sub Category <span class="text-danger">*</span></label>
													<select  class="form-control" id="sub_category" name="sub_category" required="required" data-validation-required-message="Please Select sub category ."disabled>
													<option value="">Select Sub Category</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Product (In English)  <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  value="<?php echo $product_info['name']?>" maxlength="75" id="product" name="product" placeholder="Product In English" required="required" data-validation-required-message="Please enter product in english."disabled>
												    <p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Product (In Local Language)  <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  value="<?php echo $product_info['name_local']?>" maxlength="75" id="product_category_local" name="product_category_local" placeholder="Product In Local Language" required="required" data-validation-required-message="Please enter product in local language."disabled>
												    <p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">HSN Code <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" value="<?php echo $product_info['hsn_code']?>"  maxlength="8" id="hsn_code" name="hsn_code" placeholder="Hsn Code" required="required" data-validation-required-message="Please enter hsn code."disabled>
												    <p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/productlist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark  text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/productlist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
	  	$('#edit').click(function(){
		  $('#editfig').toggleClass('view');
		  $("#sendMessageButton").show();
		  $("#cancel").show();
		  $("#edit").hide();
		   $("#ok").hide();
		  $('input').each(function(){
			var inp = $(this);
			 //var button = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			  inp.attr('disabled', 'disabled');
			}
		 });
		  $('select').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			 inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			}
			else {
			    inp.attr('readonly', 'readonly');
			}
		  });
		});
	  $(document).ready(function() {
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
								var div_data = '<option value="">Select Category</option>';
						   $.each(responsearr, function(key, value) {							   
								
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
			var group='<?php echo $product_info['stock_group_id'];?>';
			var category='<?php echo $product_info['category_id'];?>';
			if(group){
				$("#category option").remove() ;	
				$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getcategory')?>',
						type: "POST",
						data:{group:group},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
							console.log(value.id);	
								if(value.id==category){
								var div_data="<option value="+value.id+"selected>"+value.name+"</option>";
								}
								
							   var div_data="<option value="+value.id+">"+value.name+"</option>";
							   $(div_data).appendTo('#category');	                            							
							});
						}
					});
			}
			
			var sub_category_id='<?php echo $product_info['sub_category_id'];?>';
			var sub_category='<?php echo $product_info['category_id'];?>';
			if(sub_category){
				$("#sub_category option").remove() ;		
				$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getsubcategory')?>',
						type: "POST",
						data:{subcategory:sub_category},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
							console.log(value.id);
							  if(value.id==sub_category_id ){
							  var div_data="<option value="+value.id+"selected >"+value.name+"</option>";
							  }  
							  
							  div_data="<option value="+value.id+">"+value.name+"</option>";
							  $(div_data).appendTo('#sub_category');	                            							
							});
						}
				});
			}
			//sweetalert
			$('a.del').click(function() {
				var product_id = <?php echo $product_info['id']?>;
				$.ajax({
				url: "<?php echo base_url();?>administrator/masterdata/getproductbyid/"+product_id,
				type: "GET",
				data: {
				 this_delete: product_id,
				},
				success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				if(responsearr.status==1){
					swal({
					 text: "You can't delete because product fpo has created by using this product!",
					 type: 'warning',
					 confirmButtonColor: '#3085d6',
					 cancelButtonColor: '#d33',
					 confirmButtonText: 'OK'
					});
				}else{
					
					swal({
					 title: 'Are you sure?',
					 text: "You won't be able to revert this!",
					 type: 'question',
					 showCancelButton: true,
					 confirmButtonColor: '#3085d6',
					 cancelButtonColor: '#d33',
					 confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					 if (result.value) {          
						$(this).prop("disabled", true);
						$.ajax({
						  url: "<?php echo base_url();?>administrator/masterdata/delete_product/"+product_id,
						  type: "POST",
						  data: {
							 this_delete: product_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/masterdata/productlist')?>");
							 }, 1000);
						  },
						  error: function() {
							 
							 setTimeout(function() {
							  swal("Error in progress. Try again!!!");
							 }, 1000);
						  },
						  complete: function() {
							 setTimeout(function() {
							  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
							 }, 1000);
						  }
						});
					 }else {
						swal("Cancelled", "You have cancelled the product information delete action", "info");
						return false;
					 }
				  }); 								
				}    
				},error: function() {
				 
				 setTimeout(function() {
				  swal("Error in progress. Try again!!!");
				 }, 1000);
				},
				complete: function() {
				 setTimeout(function() {
				  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
				 }, 1000);
				}
				});
			 });
			});


</script>
</body>
</html>