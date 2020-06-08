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
                        <h1>Add Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/banklist');?>">Bank</a></li>
                            <li class="active">Add Bank</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_bank')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control" id="state" name="state" required="required" data-validation-required-message="Please Select state.">
													<option value="">Select State </option>
													<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->state_code; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District <span class="text-danger">*</span></label>
													<select  class="form-control" id="district" name="district" required="required" data-validation-required-message="Please Select district  .">
													<option value="">Select District </option>
													</select>
													<p class="help-block text-danger"></p>
												</div>	
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type .">
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) { ?>										
													 <option value="<?php echo $bank_type[$i]->id; ?>"><?php echo $bank_type[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_name" name="bank_name" required="required"  data-validation-required-message="Please Select bank name .">
													<option value="">Select Bank Name</option>
													<?php for($i=0; $i<count($bank_name);$i++) { ?>										
													 <option value="<?php echo $bank_name[$i]->id; ?>"><?php echo $bank_name[$i]->name; ?></option>
													<?php } ?>
													</select> 
													<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Branch Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  maxlength="45" id="branch_name" name="branch_name" placeholder="Branch Name "  required="required" data-validation-required-message="Please enter branch name .">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">IFSC Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control text-uppercase "  maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code"  required="required" data-validation-required-message="Please enter ifsc code .">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Address </label>
												<textarea type="text" class="form-control "  maxlength="150" id="address" name="address" placeholder="Address"></textarea>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">E-Mail Address</label>
												<input type="email" class="form-control "  maxlength="50" id="email_id" name="email_id" placeholder="E-Mail Address">
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Contact Number </label>
												<input type="text" class="form-control numberOnly"  pattern="^[6-9]\d{9}$" maxlength="11" id="contact_num" name="contact_num" placeholder="Contact Number">
											</div>
										</div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('administrator/masterdata/banklist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>
											 
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
			
	});
</script>
</body>
</html>