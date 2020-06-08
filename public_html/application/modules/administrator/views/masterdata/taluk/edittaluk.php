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
                        <h1>View Taluk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/taluklist');?>">Taluk</a></li>
                            <li class="active">View Taluk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form   action="<?php echo base_url('administrator/masterdata/updatetaluk/'.$taluk_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="taluk_id" value="<?php echo $taluk_info['id'];?>" id="taluk_id">
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
													 <option value="<?php echo $state[$i]->state_code; ?>"><?php echo $state[$i]->name; ?></option>
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
											<!-- <div class="form-group col-md-6">
													<label for="inputAddress2">Block Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="block_name" name="block_name" required="required" data-validation-required-message="Please Select block name ." disabled>
													<option value="">Select Block Name </option>
													</select>
													<p class="help-block text-danger"></p>
                                 </div>-->																				
										</div>
										<div class="row row-space">
                                 <div class="form-group col-md-2">
												<label for="inputAddress2">Taluk Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly"  value="<?php $talukid=$taluk_info['taluk_code']; $taluk_id = str_pad($talukid, 5, '0', STR_PAD_LEFT); echo $taluk_id; ?>" maxlength="10" id="taluk_code" name="taluk_code" readonly placeholder="Taluk Code" required="required" data-validation-required-message="Please enter taluk code."disabled>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-5">
												<label for="inputAddress2">Taluk Name (In English) <span class="text-danger">*</span></label>
												<input type="text" class="form-control " value="<?php echo $taluk_info['name'];?>"   id="taluk_name" name="taluk_name" placeholder="Taluk Name In English"  required="required" data-validation-required-message="Please enter taluk name."disabled>
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-5">						    
												<label for="inputAddress2">Taluk Name (In Local Language)  <span class="text-danger">*</span></label>
											<input type="text" class="form-control " value="<?php echo $taluk_info['name_local'];?>" id="taluk_name_local" name="taluk_name_local" placeholder="Taluk Name In Local Language"  required="required" data-validation-required-message="Please enter taluk name in local language."disabled>
												<p class="help-block text-danger"></p>
											</div>		
										</div>	
										<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<!-- <a href="#" id="" class="del btn btn-danger"> Delete</a> -->
												<a href="<?php echo base_url('administrator/masterdata/taluklist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/taluklist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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

         var district = <?php echo $taluk_info['district_code']?>;
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
							  var state_id=value.state_code;
							  document.getElementById("state_name").value =state_id;
							});
						}
					});
					/* $("#block_name option").remove() ;
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
							});
						}
					}); */
			}

			//sweetalert
			$('a.del').click(function() {
				var taluk_id = <?php echo $taluk_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_taluk/"+taluk_id,
					  type: "POST",
					  data: {
						 this_delete: taluk_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/taluklist')?>");
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
					swal("Cancelled", "You have cancelled the taluk information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>