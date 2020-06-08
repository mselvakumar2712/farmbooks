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
                        <h1>View Village</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/villagelist');?>">Village</a></li>
                            <li class="active"> View Village</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatevillage'.$village_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                   <input type="hidden" name="village_id" value="<?php echo $village_info['id'];?>" id="village_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="state_name" name="state_name" required="required" data-validation-required-message="Please Select state name ."disabled>
													<option value="">Select State Name </option>
													<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="district_name" name="district_name" required="required" data-validation-required-message="Please Select district name ."disabled>
													<option value="">Select District Name </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Block Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="block_name" name="block_name" required="required" data-validation-required-message="Please Select block name ."disabled>
													<option value="">Select Block Name </option>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Taluk Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="taluk_name" name="taluk_name" required="required" data-validation-required-message="Please Select taluk name ."disabled>
													<option value="">Select Block Name </option>
													</select>
													<p class="help-block text-danger"></p>
											</div>
														
																						
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Gram Panchayat Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="gram_panchayat_name" name="gram_panchayat_name" required="required" data-validation-required-message="Please Select gram panchayat name ."disabled>
													<option value="">Select Gram Panchayat Name </option>
													</select>
													<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-6">
												<label for="inputAddress2">Village Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly"  value="<?php $villageid=$village_info['id']; $village_id = str_pad($villageid,7, '0', STR_PAD_LEFT); echo $village_id; ?>" maxlength="13" id="village_code" name="village_code" placeholder="village Code" required="required" data-validation-required-message="Please enter village code."readonly>
												<p class="help-block text-danger"></p>
											</div>
											
												
										</div>
										<div class="row row-space">	
											<div class="form-group col-md-6">
												<label for="inputAddress2">Village Name (In English) <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  value="<?php echo $village_info['name'];?>"  id="village_name" name="village_name" placeholder="Village Name In English"  required="required" data-validation-required-message="Please enter village name."disabled>
												<p class="help-block text-danger"></p>
											</div>	
											
											<div class="form-group col-md-6">
												<label for="inputAddress2">Village Name (In Local Language) <span class="text-danger">*</span></label>
												<input type="text" class="form-control " value="<?php echo $village_info['name_local'];?>" id="village_name_local" name="village_name_local" placeholder="Village Name In local Language"  required="required" data-validation-required-message="Please enter village name in local language."disabled>
												<p class="help-block text-danger"></p>
											</div>		
										</div>	
										<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/villagelist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/villagelist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
		 var panchayat=<?php echo $village_info['panchayat_id']?>;
         if(panchayat){
			 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/get_village')?>',
						type: "POST",
						data:{panchayat:panchayat},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							//alert(responsearr.district_id);
							 var taluk = responsearr.taluk_id;
							 if(taluk){			 
									$.ajax({
										url: '<?php echo base_url('administrator/masterdata/get_taluk')?>',
										type: "POST",
										data:{taluk:taluk},
										success:function(response) {
											responsearr=$.parseJSON(response);
											console.log(response);
											//alert(responsearr.district_id);
											 var district = responsearr.district_id;
											 if(district){
												 
														$.ajax({
															url: '<?php echo base_url('administrator/masterdata/getstate')?>',
															type: "POST",
															data:{district:district},
															success:function(response) {
																responsearr=$.parseJSON(response);
																console.log(response);
																
															   $.each(responsearr, function(key, value) {
																  var div_data="<option value="+value.id+" selected>"+value.name+"</option>";
																  $(div_data).appendTo('#district_name');
																  var state_id=value.state_id;
																  document.getElementById("state_name").value =state_id;
																});
															}
														});
														$("#block_name option").remove() ;
														$.ajax({
															url: '<?php echo base_url('administrator/masterdata/getblock')?>',
															type: "POST",
															data:{district:district},
															success:function(response) {
																responsearr=$.parseJSON(response);
																console.log(response);
															   $.each(responsearr, function(key, value) {						   
																	var div_data="<option value="+value.id+">"+value.name+"</option>";
																	$(div_data).appendTo('#block_name');
																  var block=value.id;
																	$("#taluk_name option").remove() ;				
																		if(block) { 
																			$.ajax({
																				url: '<?php echo base_url('administrator/masterdata/gettaluk')?>',
																				type: "POST",
																				data:{block:block},
																				success:function(response) {
																					responsearr=$.parseJSON(response);
																					console.log(response);
																				   $.each(responsearr, function(key, value) {						   
																						var div_data="<option value="+value.id+">"+value.name+"</option>";
																					  $(div_data).appendTo('#taluk_name');	                            							
																					});
																				}
																			});
																		}	
																});
															}
														});
														 $("#gram_panchayat_name option").remove() ;				
															$.ajax({
																url: '<?php echo base_url('administrator/masterdata/getpanchayat')?>',
																type: "POST",
																data:{taluk:taluk},
																success:function(response) {
																	responsearr=$.parseJSON(response);
																	console.log(response);
																   $.each(responsearr, function(key, value) {						   
																		var div_data="<option value="+value.id+">"+value.name+"</option>";
																	   $(div_data).appendTo('#gram_panchayat_name');	                            							
																	});
																}
															});	
												}
										}
									});
								}
						    }
					});
			}
			//sweetalert
			$('a.del').click(function() {
				var village_id = <?php echo $village_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_village/"+village_id,
					  type: "POST",
					  data: {
						 this_delete: village_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/villagelist')?>");
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
					swal("Cancelled", "You have cancelled the village information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>