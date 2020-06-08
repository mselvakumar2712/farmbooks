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
                        <h1>View Fertilizer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>">Fertilizer</a></li>
                            <li class="active">View Fertilizer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatefertilizer/'.$fertilizer_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                    <input type="hidden" name="fertilizer_id" value="<?php echo $fertilizer_info['id']?>" id="fertilizer_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Fertilizer <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="nutrient_type" name="fertilizer_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check type of fertilizer."disabled><span class="ml-1">Organic</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="nutrient_type" name="fertilizer_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check type of fertilizer."disabled><span class="ml-1">Inorganic</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Fertilizer <span class="text-danger">*</span></label>
													<input type="text" class="form-control"   value="<?php echo $fertilizer_info['name']?>"  maxlength="50" id="fertilizer_name" name="fertilizer_name" placeholder="Name of the Fertilizer "required="required" data-validation-required-message="Please Check name of the fertilizer."disabled>
													<p class="help-block text-danger"></p>
												</div>	
											
											</div>
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Form of Fertilizer <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="1" class="form-check-input" disabled>Liquid
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="2" class="form-check-input" disabled>Granular												
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_fertilizer" name="form_fertilizer[]" value="3" class="form-check-input" disabled>Powder														
														</label>
													   </div>
													</div>
													 <p class="help-block text-danger" id="validatecheck"></p>
												  </div>
													
											    </div>
												<!--<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer</label>
												 <select  class="form-control" id="manufacturer" name="manufacturer" disabled>
													<option value="">Select Manufacturer</option>								
													<?php  
													foreach($manufacture as $row)
													{ 
													  if($fertilizer_info['manufacturer_id']==$row->id){	
													//  echo '<option value="0" selected="selected">All</option>';											  
													  echo '<option value="'.$row->id.'" selected="selected">'.$row->name.'</option>';
													 
													  }
													   echo '<option value="'.$row->id.'">'.$row->name.'</option>';						
													}
													?>
													</select>
												</div>-->
											</div>
											<!--<div class="row row-space">
											
												<div class="form-group col-md-6">
													<label for="inputAddress2">Brand Name</label>
													<input type="text" class="form-control"  value="<?php echo $fertilizer_info['brand_name']?>"   id="brand_name" name="brand_name" placeholder="Brand Name"disabled>
												</div>
											</div>-->
										<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>" id="ok" class="btn btn-outline-dark">Back</a>
											<a href="<?php echo base_url('administrator/masterdata/fertilizerlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
    var count_checked = $("[name='form_fertilizer[]']:checked").length; // count the checked rows
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
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
					var $radios = $('input:radio[name=fertilizer_type]');
					var fertilizer_type='<?php echo $fertilizer_info['fertilizer_type']?>';
                    if(fertilizer_type == 1){
                         if($radios.is(':checked') === false) {
                                $radios.filter('[value=1]').prop('checked', true);              
                        }
                    }else{
                        if($radios.is(':checked') === false) {
                            $radios.filter('[value=2]').prop('checked', true);
                        }
                    }
					var fertilizer='<?php echo $fertilizer_info['fertilizer_form']?>';
					var items=document.getElementsByName('form_fertilizer[]');
					for(var i=0; i<items.length; i++){
					  for(var j=0; j<fertilizer.length; j++){
						if(items[i].type=='checkbox' && items[i].value==fertilizer[j])  {
						  items[i].checked=true;
						}
					  }
					}
				

	  		
				//sweetalert
				$('a.del').click(function() {
					var fertilizer_id = <?php echo $fertilizer_info['id']?>;
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
						  url: "<?php echo base_url();?>administrator/masterdata/delete_fertilizer/"+fertilizer_id,
						  type: "POST",
						  data: {
							 this_delete: fertilizer_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/masterdata/fertilizerlist')?>");
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
						swal("Cancelled", "You have cancelled the fertilizer information delete action", "info");
						return false;
					 }
				  }); 
			});
			});


</script>
</body>
</html>