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
                        <h1>View Colour</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/colourlist');?>">Colour</a></li>
                            <li class="active">View Colour</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatecolour/'.$colour_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="colour_id" value="<?php echo $colour_info['id']?>" id="colour_id">
				 <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product" name="product" required="required" data-validation-required-message="Please Select product."disabled>
													<option value="">Select Product </option>
													<?php for($i=0; $i<count($product);$i++) {
														if($colour_info['product_id']==$product[$i]->id){	
														echo '<option value="'.$product[$i]->id.'" selected="selected">'.$product[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$product[$i]->id.'">'.$product[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Colour <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" value="<?php echo $colour_info['name']?>" maxlength="12" id="colour" name="colour" placeholder="Colour"  required="required" data-validation-required-message="Please enter colour ."disabled>
												    <p class="help-block text-danger"></p>
												</div>											
										 </div>									
										<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/colourlist');?>" id="ok" class="btn btn-outline-dark">Back</a>
											<a href="<?php echo base_url('administrator/masterdata/colourlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
				var color_id = <?php echo $colour_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_colour/"+color_id,
					  type: "POST",
					  data: {
						 this_delete: color_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/colourlist')?>");
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
					swal("Cancelled", "You have cancelled the colour information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>