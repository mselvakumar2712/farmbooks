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
                        <h1>View Humidity</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/humiditylist');?>">Humidity</a></li>
                            <li class="active">View Humidity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatehumidity/'.$humidity_info['id'])?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
					 <input type="hidden" name="humidity_id" value="<?php echo $humidity_info['id']?>" id="humidity_id">
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
														if($humidity_info['product_id']==$product[$i]->id){	
														echo '<option value="'.$product[$i]->id.'" selected="selected">'.$product[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$product[$i]->id.'">'.$product[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Humidity <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly"  value="<?php echo $humidity_info['humidity'];?>" maxlength="3" id="humidity" name="humidity" placeholder="Humidity"  required="required" data-validation-required-message="Please enter humidity ."disabled>
												    <p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-3">
													<label for="inputAddress2">Date (From)</label>
													<input type="date" class="form-control"  value="<?php echo $humidity_info['from_date'];?>"id="humidity_from" name="humidity_from" placeholder="Humidity"disabled>
											<p class="help-block text-danger"id="validate_date"></p>
											</div>
											<div class="form-group col-md-3">
													<label for="inputAddress2">Date (To)</label>
													<input type="date" class="form-control"   value="<?php echo $humidity_info['to_date'];?>" id="humidity_to" name="humidity_to" placeholder="Humidity" disabled>
											</div>
										</div>										
										<div class="col-md-12 text-center">											  											  
											  <div id="success"></div>
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/masterdata/humiditylist');?>"><input id="ok" href="" value="Back" class="btn btn-outline-dark text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/masterdata/humiditylist');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
		var startDt=document.getElementById("humidity_from").value;
		var endDt=document.getElementById("humidity_to").value;
		if(startDt && endDt){
		if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
		{

			$("#validate_date").html("from date is not greater than to date");
			return false;
		}
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
				var humidity_id = <?php echo $humidity_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_humidity/"+humidity_id,
					  type: "POST",
					  data: {
						 this_delete: humidity_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/humiditylist')?>");
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
					swal("Cancelled", "You have cancelled the humidity information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>