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
                        <h1>View Crop Name Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/name");?>">Crop Name Master</a></li>
                            <li class="active">View Crop Name Master </li>
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
						<form  name="sentMessage" id="cropnameForm" method="post" action="" novalidate="novalidate" >
						<input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" id="id">
						<div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please enter crop category." disabled>
								<option value="">Crop Category</option>
								 <?php
									for($i=0; $i<count($category);$i++) {
								?>										
								<option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
								<?php } ?>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
						    <div class="form-group col-md-4">
								<label for="inputAddress2">Crop Sub Category <span class="text-danger">*</span></label>
							 <select id="crop_sub_category" name="crop_sub_category" class="form-control" required="required" data-validation-required-message="Please enter crop sub category." disabled>
								<option value="">Crop Sub Category</option>
								 <?php
									for($i=0; $i<count($subcategory);$i++) {
								?>										
								<option value="<?php echo $subcategory[$i]->id; ?>"><?php echo $subcategory[$i]->name; ?></option>
								<?php } ?>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>	
							 <div class="form-group col-md-4">
								<label for="inputAddress2">Crop Name <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30" id="crop_name"  name="crop_name" placeholder="Crop Name" required="required" data-validation-required-message="Please enter crop name." disabled>
								<p class="help-block text-danger"></p>
						    </div>
					    </div>
						<div class="row row-space">
							<div class="form-group col-md-4">
								<label for="inputAddress2">Crop Category in Regional Language <span class="text-danger">*</span></label>	
								<input type="text" class="form-control"  maxlength="30"id="crop_regional_language" name="crop_regional_language"placeholder="Crop Category in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language" disabled>
								<p class="help-block text-danger"></p>
						    </div>
							 </div>
							 <div class="row">
							<div class="form-group col-md-12 text-center">
							   <div id="success"></div>
							    <input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
									<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
									<a href="#" id="" class="del btn btn-danger mt-10">Delete</a>
									<a href="<?php echo base_url('administrator/name');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
									<a href="<?php echo base_url('administrator/name');?>"><input id="cancel" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button" style="display:none;" ></a>
						  	   </div>
								</div>
					    </div>
							
						</form>						
						</div>                 
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
    $(document).ready(function(){
		$('select[name="cropcategory"]').on('change', function(e) {
				e.preventDefault();
				var crop_category = $(this).val();
				$("#crop_sub_category option").remove() ;				
				if(crop_category) { 
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
					type: "POST",
					data:{crop_category:crop_category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
						var div_data = '<option value="">Select Subcategory</option>';
					   $.each(responsearr, function(key, value) {					   
						  div_data +="<option value="+value.id+">"+value.name+"</option>";                            							
						});
					   $(div_data).appendTo('#crop_sub_category');	 
					}
				});
				}						
			});
		var crop_id =<?php echo $_REQUEST['id']?>;
			// jQuery method
			$.ajax({
			url: "<?php echo base_url();?>administrator/name/editname/"+crop_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
			console.log(response);
			
			response=response.trim();
			responseArray=$.parseJSON(response);
			 if(responseArray.status == 1){
			$.each(responseArray.name_list,function(key,value){
			document.getElementById("cropcategory").value=responseArray.name_list[0].category_id;
			var category=responseArray.name_list[0].category_id;
			$("#crop_sub_category option").remove(); 
			if(category){		
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
					type: "POST",
					data:{crop_category:category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
						  var div_data="<option value="+value.id+">"+value.name+"</option>";
						  $(div_data).appendTo('#crop_sub_category');	                            							
						});
					}
				});
			}
			document.getElementById("crop_name").value=responseArray.name_list[0].name;
			document.getElementById("crop_regional_language").value=responseArray.name_list[0].name_local;
			 });
			 }			 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
			});
			  $('#edit').click(function(){
			  $('#sentMessage').toggleClass('view');
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
			$('form').submit(function(e){
				e.preventDefault();
				const cropnamedata = $('#cropnameForm').serializeObject();
				var name_id =<?php echo $_REQUEST['id']?>;
				var url="<?php echo base_url();?>administrator/name/updatename/"+name_id;
				console.log(cropnamedata);
					 $.ajax({
						url:url,
						type:"POST",
						data:cropnamedata,
						dataType:"html",
						cache:false,			
						success:function(response){		  
							response=response.trim();
							responseArray=$.parseJSON(response);
							console.log(response);
							 if(responseArray.status == 1){
								$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
								window.location = "<?php echo base_url('administrator/name')?>";
							} 
						},
						error:function(response){
							alert('Error!!! Try again');
						} 
						
						}); 
			});
			
			function validateNumber(event) {
			 var key = window.event ? event.keyCode : event.which;
			 if (event.keyCode === 8 || event.keyCode === 46) {
				  return true;
			 } else if ( key < 48 || key > 57 ) {
				  return false;
			 } else {
				return true;
			 }
		    };
			$.fn.serializeObject = function()
			{
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
			
			/*delete */
			
			$('a.del').click(function() {
				var name_id = <?php echo $_REQUEST['id']?>;
				$.ajax({
				url: "<?php echo base_url();?>administrator/category/getcropnamebyid/"+name_id,
				type: "GET",
				data: {
				 this_delete: name_id,
				},
				success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				if(responsearr.status==1){
					swal({
					 text: "You can't delete because crop variety has created by using this crop name!",
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
						  url: "<?php echo base_url();?>administrator/name/deletename/"+name_id,
						  type: "POST",
						  data: {
							 this_delete: name_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/name')?>");
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
						swal("Cancelled", "You have cancelled the crop name master delete action", "info");
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
/* 			swal({
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
				  url: "<?php echo base_url();?>administrator/name/deletename/"+name_id,
				  type: "POST",
				  data: {
					 this_delete: name_id,
				  },
				  cache: false,
				  success: function() {        
					 setTimeout(function() {
					  window.location.replace("<?php echo base_url('administrator/name')?>");
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
				swal("Cancelled", "You have cancelled the crop name master delete action", "info");
				return false;
			 }
		  });*/	
		}); 			
	});
	</script>	 
</body>
</html>