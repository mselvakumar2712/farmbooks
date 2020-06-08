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
            <div class="col-md-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Constitution of Committee of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/masterdata/godownlist');?>">Constitution of Committee of Directors</a></li>
                            <li class="active">View Constitution of Committee of Directors</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Name of the Committee <span class="text-danger">*</span></label>
													<input type="text" class="form-control"  maxlength="50" id="commitee_name" name="commitee_name" placeholder="Name of the Committee "  required="required" data-validation-required-message="Please enter name of the committee ."disabled>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Number of Members</label>
													<input type="text" class="form-control numberOnly" id="members_num"  name="members_num"  maxlength="2" placeholder="Number of Members" required="required" data-validation-required-message="Please enter number of members."disabled>						
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Duration (In Yrs)<span class="text-danger">*</span></label>
													<select  class="form-control" id="duration" name="duration"required="required" data-validation-required-message="Please Select duration."disabled>
													<option value="">Select Duration (In Yrs) </option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													</select>
													 <p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="row row-space">
												<div class="form-group col-md-12">
												  <label class=" form-control-label">Objects of the committee <span class="text-danger">*</span></label>
												  <textarea  class="form-control" id="committe_obj" rows="3"  name="committe_obj"  maxlength="300" placeholder="Objects of the committee " required="required" data-validation-required-message="Please enter objects of the committee ."disabled></textarea>						
												  <p class="help-block text-danger"></p>
											    </div>
											</div>
											<div class="row row-space">																								
												<div class="form-group col-md-4">
													<label for="inputAddress2">Fees to Members</label>
													<input type="text" class="form-control numberOnly"  maxlength="5" onkeyup="getfeemembers(this.value)"  id="member_fees" name="member_fees" placeholder="Fees to Members" disabled>
												</div>
												<div class="form-group col-md-4" id="fees_member1"style="display:none">
												<label for="inputAddress2">Date (from)</label>
												<input type="date" class="form-control"  id="member_from" name="member_from" required="required" data-validation-required-message="Please enter fees to members date from ."disabled>											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4"  id="fees_member2" style="display:none">
												<label for="inputAddress2">Date (To)</label>
												<input type="date" class="form-control"  id="member_from" name="member_from" required="required" data-validation-required-message="Please enter fees to members date from ."disabled>											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Allowance to Members </label>
													<input type="text" class="form-control numberOnly"  maxlength="5" onkeyup="getallowance(this.value)" id="member_allowance" name="member_allowance" placeholder="Allowance to Members" disabled>
												</div>
												<div class="form-group col-md-4" id="member_allowance1"style="display:none">
												<label for="inputAddress2">Date (from)</label>
												<input type="date" class="form-control"  id="allowance_member_from" name="allowance_member_from" required="required" data-validation-required-message="Please enter allowance to members date from ."disabled>											
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4"  id="member_allowance2" style="display:none">
												<label for="inputAddress2">Date (To)</label>
												<input type="date" class="form-control"  id="allowance_member_from" name="allowance_member_to" required="required" data-validation-required-message="Please enter allowance to members date from ."disabled>
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Resolution Number</label>
													<input type="text" class="form-control numberOnly"  maxlength="3" id="resolution_number" name="resolution_number" placeholder="Resolution Number"disabled>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Resolution Date </label>
													<input type="date" class="form-control"  id="resolution_date" name="resolution_date" disabled>
												</div>												
											</div>
									<div class="col-md-12 text-center">
											<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
											<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
											<a href="#" id="" class="del btn btn-danger">Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/committeedirectorslist');?>" id="ok" class="btn btn-success">OK</a>
											<a href="<?php echo base_url('administrator/masterdata/committeedirectorslist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
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
	    
	    function getfeemembers(member_fees) {
				if(member_fees.length > 0) {
				$('#fees_member1').show();
				$('#fees_member2').show();
			}else{
				$('#fees_member1').hide();
				$('#fees_member2').hide();
			}
		}
		function getallowance(member_allowance) {
				if(member_allowance.length > 0) {
				$('#member_allowance1').show();
				$('#member_allowance2').show();
			}else{
				$('#member_allowance1').hide();
				$('#member_allowance2').hide();
			}
		}
	    function getPincode( pincode ) {
				if(pincode.length == 6) {
				$.ajax({
					url:"<?php echo base_url();?>administrator/Login/getlocation/"+pincode,
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
						response=response.trim();
						responseArray=$.parseJSON(response);
					    $('#state').html('<option value='+responseArray.getlocation['state_name']+'>'+responseArray.getlocation['state_name']+'</option>');
						$('#district').html('<option value='+responseArray.getlocation['district_name']+'>'+responseArray.getlocation['district_name']+'</option>');                            
					    $('#block').html('<option value='+responseArray.getlocation['division_name']+'>'+responseArray.getlocation['division_name']+'</option>');
						$('#taluk').html('<option value='+responseArray.getlocation['taluk']+'>'+responseArray.getlocation['taluk']+'</option>');                                          
						$('#gram_panchayat').html('<option value="0">Select Gram Panchayat </option>');
						$('#village').html('<option value="0">Select Village </option>');
						var pancahayatArray = responseArray.panchayat;
						$.each(pancahayatArray,function(key,value){ 
						
						  var panch_name = value.office_name;					
							$('#gram_panchayat').append('<option value='+value.id+'>'+panch_name+'</option>');
							 $('#village').append('<option value='+value.id+'>'+panch_name+'</option>');
						});
					},
					error:function(response){
						alert('Error!!! Try again');
					} 			
				 }); 
			}
		}	
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
/* 	  		$('form').submit(function(e){
				e.preventDefault();
				const figdata = $('#figform').serializeObject();
				if(figdata != '')
				{
				console.log(figdata);
					 $.ajax({
						url:"<?php echo base_url();?>administrator/fig/postfig",
						type:"POST",
						data:figdata,
						dataType:"html",
						cache:false,			
						success:function(response){		  
							response=response.trim();
							responseArray=$.parseJSON(response);
							console.log(response);
							 if(responseArray.status == 1){
								$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
								window.location = "<?php echo base_url('administrator/fig')?>";
							} 
						},
						error:function(response){
							alert('Error!!! Try again');
						} 
						
						}); 
				}
				else
				{
					alert('Please provide mandatory fields ');
				}
			});
			$.fn.serializeObject = function() {
			  var o = {};
			  var a = this.serializeArray();
			  $.each(a, function() {
				if (o[this.name] !== undefined) {
				  if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				  }
				  o[this.name].push(this.value || '');
				} else {
				  o[this.name] = this.value || '';
				}
			  });
			  return o;
			};
			
			 */
			//sweetalert
			$('a.del').click(function() {
				/* var fig_id = <?php echo $_REQUEST['id']?>;
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
					  url: "<?php echo base_url();?>administrator/fig/deletefig/"+fig_id,
					  type: "POST",
					  data: {
						 this_delete: fig_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/fig')?>");
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
					swal("Cancelled", "You have cancelled the fig information delete action", "info");
					return false;
				 }
			  }); */
			});
			});


</script>
</body>
</html>