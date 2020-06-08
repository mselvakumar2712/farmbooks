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
                        <h1>View Live Stocks </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/livestockslist');?>">Live Stocks</a></li>
                            <li class="active"> View Live Stocks </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				<form   action="<?php echo base_url('administrator/masterdata/updatelive_stocks')?>"  method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="live_stock_id" value="<?php echo $livestock_info['id']?>" id="live_stock_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												 <div class="form-group col-md-6">
												  <label class=" form-control-label">Type of Live Stock <span class="text-danger">*</span></label>
												  <select  class="form-control" id="livestock_type" name="livestock_type" required="required" data-validation-required-message="Please Select type of live stock ." disabled>
													<option value="">Select Live Stock  </option>
													<option <?php if($livestock_info['type']==1){echo "selected";}?> value="1">Birds</option>
													<option <?php if($livestock_info['type']==2){echo "selected";}?> value="2">Animals </option>
													<option <?php if($livestock_info['type']==3){echo "selected";}?> value="3">Others</option>
												  </select>
												  <p class="help-block text-danger"></p>
											    </div>
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the live stock <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  value="<?php echo $livestock_info['name']?>"  maxlength="50" id="livestock_name" name="livestock_name" placeholder="Name of the live stock" required="required" data-validation-required-message="Please enter name of the live stock ."disabled>
													<p class="help-block text-danger"></p>
												</div>
											</div>															   										
											<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/livestockslist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/livestockslist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
		
		$(document).ready(function() {
		  
			
			//sweetalert
			$('a.del').click(function() {
				var livestock_id = <?php echo $livestock_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_livestocks/"+livestock_id,
					  type: "POST",
					  data: {
						 this_delete: livestock_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/livestockslist')?>");
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
					swal("Cancelled", "You have cancelled the Live Stocks information delete action", "info");
					return false;
				 }
			  }); 
		});
	});
</script>
</body>
</html>