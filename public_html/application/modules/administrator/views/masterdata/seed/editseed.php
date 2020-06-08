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
                        <h1>View Seed</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/seedlist');?>">Seed</a></li>
                            <li class="active">View UOM</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updateseed/'.$seed_info['id'])?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  	<input type="hidden" name="seed_id" value="<?php echo $seed_info['id']?>" id="seed_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Category<span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_category" name="crop_category" required="required" data-validation-required-message="Please Select crop category."disabled>
													<option value="">Select Crop Category</option>
													<?php for($i=0; $i<count($category);$i++) {
														if($seed_info['category_id']==$category[$i]->id){	
														echo '<option value="'.$category[$i]->id.'" selected="selected">'.$category[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$category[$i]->id.'">'.$category[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Sub Category<span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_subcategory" name="crop_subcategory" required="required" data-validation-required-message="Please Select crop sub category."disabled>
													<option value="">Select Crop Sub Category</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Name<span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_name" name="crop_name" required="required" data-validation-required-message="Please Select crop name."disabled>
													<option value="">Select Crop Name</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											</div>
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Variety<span class="text-danger">*</span></label>
													<select  class="form-control" id="crop_variety" name="crop_variety" required="required" data-validation-required-message="Please Select crop variety."disabled>
													<option value="">Select Crop Variety</option>
													</select>
													<p class="help-block text-danger"></p>
												</div>							
												<div class="form-group col-md-4">
													<label for="inputAddress2">Class</label>
													<input type="text" class="form-control numberOnly"  value="<?php echo $seed_info['class']?>" maxlength="50" id="class" name="class" placeholder="Class"disabled>
												</div>	
											</div>	
										<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/seedlist');?>" id="ok" class="btn btn-outline-dark">Back</a>
											<a href="<?php echo base_url('administrator/masterdata/seedlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
			  inp.attr('disabled', 'disabled');
			}
		  });
		});
		
	  $(document).ready(function() {
		var category='<?php echo $seed_info['category_id'];?>';
		var sub_category='<?php echo $seed_info['sub_category_id'];?>';
		var name='<?php echo $seed_info['name_id'];?>';
		var variety='<?php echo $seed_info['variety_id'];?>';
		
		if(category){
			$("#crop_subcategory option").remove() ;	
			$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
			type: "POST",
			data:{crop_category:category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);
				
					if(value.id==sub_category){
						var div_data="<option value="+value.id+"selected>"+value.name+"</option>";
						
					}
					
					var div_data="<option value="+value.id+">"+value.name+"</option>";
				    $(div_data).appendTo('#crop_subcategory');	                            							
				});
			}
			});
		}
		
		if(sub_category) { 
		$("#crop_name option").remove() ;	
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getnameid')?>',
			type: "POST",
			data:{crop_sub_category:sub_category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);	
				if(value.id==name){
					var div_data="<option value="+value.id+"selected>"+value.name+"</option>";
				}
				
				var div_data="<option value="+value.id+">"+value.name+"</option>";
				  $(div_data).appendTo('#crop_name');	                            							
				});
			}
		});
		}	
		if(name) { 
		$("#crop_variety option").remove() ;	
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
			type: "POST",
			data:{crop_name:name},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);	
				 if(value.id==variety){
					var div_data="<option value="+value.id+"selected>"+value.name+"</option>";
				  }
				  var div_data="<option value="+value.id+">"+value.variety+"</option>";
				  $(div_data).appendTo('#crop_variety');	                            							
				});
			}
		});
		}
		
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
			//sweetalert
	$('a.del').click(function() {
		 var seed_id = <?php echo $seed_info['id']?>;
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
			  url: "<?php echo base_url();?>administrator/masterdata/delete_seed/"+seed_id,
			  type: "POST",
			  data: {
				 this_delete: seed_id,
			  },
			  cache: false,
			  success: function() {        
				 setTimeout(function() {
				  window.location.replace("<?php echo base_url('administrator/masterdata/seedlist')?>");
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
			swal("Cancelled", "You have cancelled the seed information delete action", "info");
			return false;
		 }
	  }); 
	});
	});


</script>
</body>
</html>