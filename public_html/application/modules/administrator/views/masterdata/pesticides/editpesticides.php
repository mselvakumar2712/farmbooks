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
                        <h1>View Pesticides</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/pesticideslist');?>">Pesticides</a></li>
                            <li class="active">View Pesticides</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatepesticides/'.$pesticide_info['id'])?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                    <input type="hidden" name="pesticide_id" value="<?php echo $pesticide_info['id']?>" id="pesticide_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Pesticide <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="pesticide_type" name="pesticide_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check type of pesticide."disabled><span class="ml-1">Organic</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="pesticide_type" name="pesticide_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check type of pesticide."disabled><span class="ml-1">Inorganic</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Pesticide <span class="text-danger">*</span></label>
													<input type="text" class="form-control"   value="<?php echo $pesticide_info['name']?>" maxlength="50" id="pesticide_name" name="pesticide_name" placeholder="Name of the Pesticides "required="required" data-validation-required-message="Please Check name of the pesticide."disabled>
													<p class="help-block text-danger"></p>
												</div>	
											
											</div>
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Form of Pesticide <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="checkbox" id="form_pesticide" name="form_pesticide[]" value="1" class="form-check-input" disabled><span class="ml-1">Liquid</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_pesticide" name="form_pesticide[]" value="2" class="form-check-input" disabled><span class="ml-1">Repellent</span>														
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="checkbox" id="form_pesticide" name="form_pesticide[]" value="3" class="form-check-input" disabled><span class="ml-1">Powder</span>														
														</label>
													   </div>
													</div>
													 <p class="help-block text-danger" id="validatecheck"></p>
												  </div>
													
											    </div>
												<!--<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer</label>
												<select  class="form-control" id="manufacturer" name="manufacturer" disabled>
													<option value="">Select State Name </option>								
													<?php  
													foreach($manufacture as $row)
													{ 
													  if($pesticide_info['manufacturer_id']==$row->id){	
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
													<input type="text" class="form-control"    value="<?php echo $pesticide_info['brand_name']?>" maxlength="50" id="brand_name" name="brand_name" placeholder="Brand Name"disabled>
												</div>
											</div>-->
											<div class="col-md-12 text-center">
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger">Delete</a>	
												<a href="<?php echo base_url('administrator/masterdata/pesticideslist');?>" id="ok" class="btn btn-outline-dark">Back</a>
												<a href="<?php echo base_url('administrator/masterdata/pesticideslist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
	var count_checked = $("[name='form_pesticide[]']:checked").length; // count the checked rows
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
					var $radios = $('input:radio[name=pesticide_type]');
					var pesticide_type='<?php echo $pesticide_info['pesticide_type']?>';
                    if(pesticide_type == 1){
                         if($radios.is(':checked') === false) {
                                $radios.filter('[value=1]').prop('checked', true);              
                        }
                    }else{
                        if($radios.is(':checked') === false) {
                            $radios.filter('[value=2]').prop('checked', true);
                        }
                    }
					 var pesticide='<?php echo $pesticide_info['pesticide_form']?>';
						var items=document.getElementsByName('form_pesticide[]');
						for(var i=0; i<items.length; i++){
						  for(var j=0; j<pesticide.length; j++){
							if(items[i].type=='checkbox' && items[i].value==pesticide[j])  {
							  items[i].checked=true;
							}
						  }
						}

	  		
				//sweetalert
				$('a.del').click(function() {
					var pesticide_id= <?php echo $pesticide_info['id']?>;
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
						  url: "<?php echo base_url();?>administrator/masterdata/delete_pesticides/"+pesticide_id,
						  type: "POST",
						  data: {
							 this_delete: pesticide_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/masterdata/pesticideslist')?>");
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
						swal("Cancelled", "You have cancelled the pesticide information delete action", "info");
						return false;
					 }
				  }); 
			});
			});


</script>
</body>
</html>