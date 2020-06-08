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
                        <h1>Add Reappointment of Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/addreappointment');?>">Add Reappointment of Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_reappointment')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">Name of the Director <span class="text-danger">*</span></label>
														  <select class="form-control" id="director" name="director" required data-validation-required-message="Select director type">
															 <?php for($i=0; $i<count($director);$i++) { ?>	
															<option value="<?php echo $director[$i]->id; ?>"><?php echo $director[$i]->name; ?></option>
															<?php } ?>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													 <div class="form-group col-md-4">
														<label for="">Director Identification number (DIN) <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="10" id="din" name="din" placeholder="Director Identification number" required="required" data-validation-required-message="Please enter director identification number.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Tenure (in Years) <span class="text-danger">*</span></label>
														  <select class="form-control" id="tenure" name="tenure" required data-validation-required-message="Select tenure">
															  <option value="">Select Tenure</option>
															  <option value="1">1</option>
															  <option value="2">2</option>
															  <option value="3">3</option>
															  <option value="4">4</option>
															  <option value="5">5</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														<label for="">Date of Appointment <span class="text-danger">*</span></label>
														<input type="date" class="form-control" id="appointment_date" name="appointment_date" required="required" data-validation-required-message="Please enter date of appointment.">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Validity <span class="text-danger">*</span></label>
														<input type="date" class="form-control" id="validity" name="validity" readonly >
														<p class="help-block text-danger"></p>
													</div>												
												</div>
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Reappoint</button>
											<a href="<?php echo base_url('fpo/operation/reappointmentlist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
										  </div>											 
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
$(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      
      var maxDate = year + '-' + month + '-' + day;
      $('#appointment_date').attr('max', maxDate);
			
});

</script>	 
</body>
</html>