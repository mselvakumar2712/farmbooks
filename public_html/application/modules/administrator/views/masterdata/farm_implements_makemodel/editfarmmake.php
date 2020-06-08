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
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Farm Implements Make and Model</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">Farm Implements Make and Model</a></li>
                            <li class="active"> View Farm Implements Make and Model</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				<form  action="<?php echo base_url('administrator/masterdata/update_farmimplements_make/'.$farmimplements_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                 <input type="hidden" name="farmimplements_id" value="<?php echo $farmimplements_info['id']?>" id="farmimplements_id" readonly>				
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Implement  <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="implement_type" name="implement_type" <?php if($farmimplements_info['Primary_Yes']==1){ echo "checked" ;}?> value="1" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."disabled><span class="ml-1">Primary</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="implement_type" name="implement_type" <?php if($farmimplements_info['Primary_Yes']==2){ echo "checked" ;}?> value="2" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."disabled><span class="ml-1">Attachment</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Implement Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="implement_name" name="implement_name" required="required" data-validation-required-message="Please Select implement name ."disabled>
													<option value="">Select Implement Name </option>
													<?php for($i=0; $i<count($farm_implements);$i++) {
														if($farmimplements_info['Implements_id']==$farm_implements[$i]->id){	
														echo '<option value="'.$farm_implements[$i]->id.'" selected="selected">'.$farm_implements[$i]->Name.'</option>';
														}else{
													   echo '<option value="'.$farm_implements[$i]->id.'">'.$farm_implements[$i]->Name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											</div>
		
											<div class="row row-space">												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Make</label>
													<input type="text" class="form-control "   maxlength="50" value="<?php echo $farmimplements_info['Make']?>"id="make" name="make" placeholder="Make" required="required" data-validation-required-message="Please enter make ."disabled>
													<p class="help-block text-danger"></p>
												</div>									
												<div class="form-group col-md-6">
													<label for="inputAddress2">Model</label>
													<input type="text" class="form-control "  maxlength="50" value="<?php echo $farmimplements_info['Model']?>" id="model" name="model" placeholder="Model"  required="required" data-validation-required-message="Please enter model ."disabled>
													<p class="help-block text-danger"></p>
												</div>
											</div>																   										
											<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>"><input id="ok" href="" value="OK" class="btn btn-success text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn swal-button--cancel text-center" type="button"></a>												
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
			//sweetalert
			$('a.del').click(function() {
				var farm_id = <?php echo $farmimplements_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_farmimplementsmake/"+farm_id,
					  type: "POST",
					  data: {
						 this_delete: farm_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/farmimplementsmakelist')?>");
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
					swal("Cancelled", "You have cancelled the farm implements make and model information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>