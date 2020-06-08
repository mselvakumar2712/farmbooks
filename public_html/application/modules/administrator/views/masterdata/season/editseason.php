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
                        <h1>View Season</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/seasonlist');?>">Season</a></li>
                            <li class="active">View Season</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				<form  action="<?php echo base_url('administrator/masterdata/updateseason/'.$season_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
				<input type="hidden" name="seasonid" value="<?php echo $season_info['id']?>" id="seasonid">
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
											<div class="container-fluid">
											<div class="row row-space  mt-4">                                 							
												<div class="form-group  col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control" id="state" name="state" required="required" data-validation-required-message="Please Select state."disabled>
													<option value="0">All</option>
													<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->id; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>
													</select>
													<div class="help-block text-danger"></div>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Season Name <span class="text-danger">*</span></label>
													<input class="form-control" id="season_name" value="<?php echo $season_info['season']?>" name="season_name"   placeholder="Season Name" required="required"  data-validation-required-message="Please enter season name ."disabled>				
													<p class="help-block text-danger"></p>
											    </div>
											</div>											
											<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/seasonlist');?>" id="ok" class="btn btn-outline-dark">OK</a>
											<a href="<?php echo base_url('administrator/masterdata/seasonlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
			 //inp.attr('disabled', 'disabled');
			}
		  });
		});
	  $(document).ready(function() {	
			document.getElementById("state").value =<?php echo $season_info['state_id']?>;
			//sweetalert
			$('a.del').click(function() {
				var seasonid = <?php echo $season_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_season/"+seasonid,
					  type: "POST",
					  data: {
						 this_delete: seasonid,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/seasonlist')?>");
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
					swal("Cancelled", "You have cancelled the season information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>