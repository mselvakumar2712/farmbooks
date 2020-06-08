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
                        <h1>View Nutrient</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/nutrientlist');?>">Nutrient</a></li>
                            <li class="active">View Nutrient</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatenutrient/'.$nutrient_info['id'])?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="nutrient_id" value="<?php echo $nutrient_info['id']?>" id="nutrient_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Nutrient <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="nutrient_type" name="nutrient_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check nutrient type."disabled><span class="ml-1">Organic</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="nutrient_type" name="nutrient_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check nutrient type."disabled><span class="ml-1">Inorganic</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Nutrient <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  value="<?php echo $nutrient_info['name']?>"   maxlength="50" id="nutrient_name" name="nutrient_name" placeholder="Name of the Nutrient "required="required" data-validation-required-message="Please Check name of the nutrient."disabled>
													<p class="help-block text-danger"></p>
												</div>	
											
											</div>
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Nutrient Variety <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="checkbox" id="nutrient_variety" name="nutrient_variety[]" value="1" class="form-check-input" disabled><span class="ml-1">Micro</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="nutrient_variety" name="nutrient_variety[]" value="2" class="form-check-input" disabled><span class="ml-1">Macro</span>														
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="nutrient_variety" name="nutrient_variety[]" value="3" class="form-check-input" disabled><span class="ml-1">Trace Minerals</span>														
														</label>
													   </div>
													</div>
												  </div>
													 <p class="help-block text-danger" id="validatecheck"></p>
											    </div>
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Form <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="checkbox" id="form" name="form[]" value="1" class="form-check-input" disabled><span class="ml-1">Liquid</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form" name="form[]" value="2" class="form-check-input" disabled><span class="ml-1">Granular</span>														
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form" name="form[]" value="3" class="form-check-input" disabled><span class="ml-1">Powder</span>														
														</label>
													   </div>
													</div>
												  </div>
													 <p class="help-block text-danger" id="validatecheck1"></p>
											    </div>												
											</div>
											<!--<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer</label>
													<select  class="form-control" id="manufacturer" name="manufacturer" disabled>
													<option value="">Select Manufacturer</option>								
													<?php  
													foreach($manufacture as $row)
													{ 
													  if($nutrient_info['manufacturer_id']==$row->id){	
													//  echo '<option value="0" selected="selected">All</option>';											  
													  echo '<option value="'.$row->id.'" selected="selected">'.$row->name.'</option>';
													 
													  }
													   echo '<option value="'.$row->id.'">'.$row->name.'</option>';						
													}
													?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Brand Name</label>
													<input type="text" class="form-control"   value="<?php echo $nutrient_info['brand_name']?>"  id="brand_name" name="brand_name" placeholder="Brand Name  "disabled>
												</div>
											</div>-->
											<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/nutrientlist');?>" id="ok" class="btn btn-outline-dark">Back</a>
											<a href="<?php echo base_url('administrator/masterdata/nutrientlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
	$("#sendMessageButton").click(function() {
	var count_checked = $("[name='nutrient_variety[]']:checked").length; // count the checked rows
	var count_checked1 = $("[name='form[]']:checked").length;
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
	if(count_checked1 == 0) 
	{
		$("#validatecheck1").html("Please check any one of the checkbox");
		return false;
	}
	}); 

	 
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
			}
			else {
			  inp.attr('disabled', 'disabled');
			}
		  });
		});
	  $(document).ready(function() {
					var $radios = $('input:radio[name=nutrient_type]');
					var nutrient_type=<?php echo $nutrient_info['nutrient_type']?>;
                    if(nutrient_type == 1){
                         if($radios.is(':checked') === false) {
                                $radios.filter('[value=1]').prop('checked', true);              
                        }
                    }else{
                        if($radios.is(':checked') === false) {
                            $radios.filter('[value=2]').prop('checked', true);
                        }
                    }
					
					var nutrient = '<?php echo $nutrient_info['nutrient_form'];?>';
					var items=document.getElementsByName('form[]');
					 for(var i=0; i<items.length; i++){
					   for(var j=0; j<nutrient.length; j++){
						 if(items[i].type=='checkbox' && items[i].value==nutrient[j])  {
							 items[i].checked=true;
						  }
						}
					  }
					var nutrient_variety = '<?php echo $nutrient_info['nutrient_variety'];?>';
					var items_nutrient=document.getElementsByName('nutrient_variety[]');
					 for(var i=0; i<items_nutrient.length; i++){
					   for(var j=0; j<nutrient_variety.length; j++){
						 if(items_nutrient[i].type=='checkbox' && items_nutrient[i].value==nutrient_variety[j])  {
							 items_nutrient[i].checked=true;
						  }
						}
					  }
	  		
				//sweetalert
				$('a.del').click(function() {
					var nutrient_id = <?php echo $nutrient_info['id']?>;
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
						  url: "<?php echo base_url();?>administrator/masterdata/delete_nutrient/"+nutrient_id,
						  type: "POST",
						  data: {
							 this_delete: nutrient_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/masterdata/nutrientlist')?>");
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
						swal("Cancelled", "You have cancelled the nutrient information delete action", "info");
						return false;
					 }
				  }); 
			});
			});


</script>
</body>
</html>