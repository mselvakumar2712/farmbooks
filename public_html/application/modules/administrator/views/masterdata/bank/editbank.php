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
                        <h1>View Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/banklist');?>">Bank</a></li>
                            <li class="active">View Bank</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('administrator/masterdata/updatebank/'.$bank_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="bank_id" value="<?php echo $bank_info['id']?>" id="bank_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control" id="state" name="state" required="required" data-validation-required-message="Please Select state."disabled>
													<option value="">Select State </option>
													<?php for($i=0; $i<count($state);$i++) {
														if($bank_info['state_id']==$state[$i]->state_code){	
														echo '<option value="'.$state[$i]->state_code.'" selected="selected">'.$state[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$state[$i]->state_code.'">'.$state[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select  class="form-control" id="district" name="district" required="required" data-validation-required-message="Please Select district."disabled>
													<option value="">Select District </option>
													 
													 
													</select>
													<p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type ."disabled>
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) {
														if($bank_info['type_id']==$bank_type[$i]->id){	
														echo '<option value="'.$bank_type[$i]->id.'" selected="selected">'.$bank_type[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$bank_type[$i]->id.'">'.$bank_type[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_name" name="bank_name" required="required"  data-validation-required-message="Please Select bank name ."disabled>
													<option value="">Select Bank Name</option>
													<?php for($i=0; $i<count($bank_name);$i++) {
														if($bank_info['bank_name_id']==$bank_name[$i]->id){	
														echo '<option value="'.$bank_name[$i]->id.'" selected="selected">'.$bank_name[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$bank_name[$i]->id.'">'.$bank_name[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select> 
													<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Branch Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  value="<?php echo $bank_info['branch_name']?>"  maxlength="45" id="branch_name" name="branch_name" placeholder="Branch Name "  required="required" data-validation-required-message="Please enter branch name ."disabled>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">IFSC Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control text-uppercase"  maxlength="11" value="<?php echo $bank_info['ifsc_code']?>" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code"  required="required" data-validation-required-message="Please enter ifsc code ."disabled>
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Address </label>
												<input type="text" class="form-control " value="<?php echo $bank_info['address_local']?>" maxlength="150" id="address" name="address" placeholder="Address"disabled>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">E-Mail Address</label>
												<input type="email" class="form-control " value="<?php echo $bank_info['email_id']?>"  maxlength="50" id="email_id" name="email_id" placeholder="E-Mail Address "disabled>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Contact Number </label>
												<input type="text" class="form-control numberOnly" value="<?php echo $bank_info['contact_no']?>"   maxlength="11" id="contact_num" name="contact_num" placeholder="Contact Number"disabled>
											</div>
										</div>
										<div class="col-md-12 text-center">
											<button id="edit" class="btn btn-success text-center btn-fs" type="button"> <i class="fa fa-edit"></i> Edit</button>
											<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit" style="display:none;"> <i class="fa fa-check-circle"></i> Update</button>
											<a href="#" id="" class="del btn btn-danger btn-fs"> <i class="fa fa-trash"></i> Delete</a>	
											<a href="<?php echo base_url('administrator/masterdata/banklist');?>" id="ok" class="btn btn-fs btn-outline-dark"> <i class="fa fa-arrow-circle-left"></i> Back</a>
											<a href="<?php echo base_url('administrator/masterdata/banklist');?>" id="cancel" class="btn btn-fs btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
	
	$('select[name="state"]').on('change', function(e) {
				e.preventDefault();
				var state = $(this).val();
			   $("#district option").remove() ;				
				if(state) { 
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
						type: "POST",
						data:{state:state},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
							console.log(value.district_code);						   
								var div_data="<option value="+value.district_code+">"+value.name+"</option>";
							  $(div_data).appendTo('#district');	                            							
							});
						}
					});
				}						
			});	
		    var state=<?php echo $bank_info['state_id']?>;;
			var district=<?php echo $bank_info['district_id']?>;
			if(state) { 
					$("#district option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
						type: "POST",
						data:{state:state},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
							
								if(district==value.district_code){
								var div_data="<option value="+value.district_code+" selected>"+value.name+"</option>";
							   
								}
								 $(div_data).appendTo('#district');
							});
						}
					});
				}
				
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
				var bank_id = <?php echo $bank_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_bank/"+bank_id,
					  type: "POST",
					  data: {
						 this_delete: bank_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/banklist')?>");
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
					swal("Cancelled", "You have cancelled the bank information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>