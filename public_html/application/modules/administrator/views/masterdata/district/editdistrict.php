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
                        <h1>View District</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/districtlist');?>">District</a></li>
                            <li class="active">View District</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('success');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('danger')){?>
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('danger');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('info')){?>
			<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('info');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('warning')){?>
			<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('warning');?></strong> 
			</div>
			<?php }?>
            <div class="animated fadeIn">
				 <form   id="districtform" name="sentMessage" novalidate="novalidate" action="<?php echo base_url('administrator/masterdata/updatedistrict/'.$district_info['id'])?>" method="post">
				<input type="hidden" name="district_id" value="<?php echo $district_info['id']?>" id="district_id">
				<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
												   <input type="hidden" name="id" id="id"  value="<?php echo $district_info['id'] ;?>"  />	 				
													<label for="inputAddress2">State Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="state_name" name="state_name" required="required" data-validation-required-message="Please Select state name ." disabled>
													<option value="">Select State Name </option>								
													<?php  
													foreach($state as $row)
													{ 
                                          if($district_info['state_code']==$row->state_code){	
                                             echo '<option value="'.$row->state_code.'" selected="selected">'.$row->name.'</option>';													 
                                          }
													   echo '<option value="'.$row->state_code.'">'.$row->name.'</option>';						
													}
													?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District Code  <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" value="<?php $districtid=$district_info['district_code']; $district_id = str_pad($districtid, 4, '0', STR_PAD_LEFT); echo $district_id; ?>"   maxlength="4" id="district_code" name="district_code" placeholder="District Code" required="required" data-validation-required-message="Please enter district code."readonly>
													<p class="help-block text-danger"></p>
												</div>		
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District Name (In English) <span class="text-danger">*</span></label>
												<input type="text" class="form-control " value="<?php echo $district_info['name'] ;?>"  id="district_name" name="district_name" placeholder="District Name In English"  required="required" data-validation-required-message="Please enter district name."disabled>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">District Name (In Local Language)  <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  value="<?php echo $district_info['name_local'] ;?>" id="district_name_local" name="district_name_local" placeholder="District Name In Local Language"  required="required" data-validation-required-message="Please enter district name in local language."disabled>
												<p class="help-block text-danger"></p>
											</div>		
										</div>						  										
											  <div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<!--<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
												<a href="<?php echo base_url('administrator/masterdata/districtlist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/districtlist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
			}
			else {
			  inp.attr('disabled', 'disabled');
			}
		  });
		});
		//sweetalert
			$('a.del').click(function() {
				var district_id = <?php echo $district_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_district/"+district_id,
					  type: "POST",
					  data: {
						 this_delete: district_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/districtlist')?>");
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
					swal("Cancelled", "You have cancelled the state information delete action", "info");
					return false;
				 }
			  }); 
		});
	 


</script>
</body>
</html>