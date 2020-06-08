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
                        <h1>View Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/categorylist');?>">Category</a></li>
                            <li class="active">View Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatecategory/'.$category_info['id'])?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
					<input type="hidden" name="category_id" value="<?php echo $category_info['id']?>" id="category_id">
					<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Stock Group <span class="text-danger">*</span></label>
													<select  class="form-control" id="stock_group" name="stock_group" required="required" data-validation-required-message="Please Select stock group ." readonly>
													<option value="">Select Stock Group </option>							
													<?php for($i=0; $i<count($stock_group);$i++) {
														if($category_info['stock_group_id']==$stock_group[$i]->id){	
														echo '<option value="'.$stock_group[$i]->id.'" selected="selected">'.$stock_group[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$stock_group[$i]->id.'">'.$stock_group[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Product Category (In English)  <span class="text-danger">*</span></label>
													<input type="text" class="form-control "  minlength="3" maxlength="75"  value="<?php echo $category_info['name']?>"   id="product_category" name="product_category" placeholder="Product Category In English" required="required" data-validation-required-message="Please enter product category in english."disabled>
												    <p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Product Category (In Local Language)  <span class="text-danger">*</span></label>
													<input type="text" class="form-control "  minlength="3" maxlength="75" value="<?php echo $category_info['name_local']?>"  id="product_category_local" name="product_category_local" placeholder="Product Category In Local Language" required="required" data-validation-required-message="Please enter category in local language."disabled>
												    <p class="help-block text-danger"></p>
											</div>
										</div>
											<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/categorylist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/categorylist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
			  //inp.attr('disabled', 'disabled');
			}
		 });
		  $('select').each(function(){
			var inp = $(this);
			if (inp.attr('disabled')) {
			  inp.removeAttr('disabled');
			  document.getElementById("sendMessageButton").disabled =false;
			  document.getElementById("cancel").disabled =false;
			  //document.getElementById("stock_group").disabled =false;
			}
			else {
			  inp.attr('readonly', 'readonly');
			}
		  });
		});
		
		$(document).ready(function() {

			//sweetalert
			$('a.del').click(function() {
				 var category_id = <?php echo $category_info['id']?>;
				 $.ajax({
					url: "<?php echo base_url();?>administrator/masterdata/getcategorybyid/"+category_id,
					type: "GET",
					 data: {
						 this_delete: category_id,
					  },
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					    if(responsearr.status==1){
							swal({
							 text: "You can't delete because sub category has created by using this category!",
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
									  url: "<?php echo base_url();?>administrator/masterdata/delete_category/"+category_id,
									  type: "POST",
									  data: {
										 this_delete: category_id,
									  },
									  cache: false,
									  success: function() {        
										 setTimeout(function() {
										  window.location.replace("<?php echo base_url('administrator/masterdata/categorylist')?>");
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
									swal("Cancelled", "You have cancelled the category information delete action", "info");
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
				/* swal({
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_category/"+category_id,
					  type: "POST",
					  data: {
						 this_delete: category_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/categorylist')?>");
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
					swal("Cancelled", "You have cancelled the category information delete action", "info");
					return false;
				 }
			  }); */
			});
		});


</script>
</body>
</html>