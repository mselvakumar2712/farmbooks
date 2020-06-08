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
                        <h1>View Director</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewdirector');?>">View Director</a></li>
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
					<form action="<?php echo base_url('staff/operation/update_director')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">Type of Director <span class="text-danger">*</span></label>
														  <select class="form-control" id="director_type" readonly name="director_type" required data-validation-required-message="Select director type">
															  <option value="">Select Director Type</option>
															  <option value="1" <?php echo (($director_info['type_id'] == 1)?"selected":"") ?>>Regular Director</option>
															  <option value="2" <?php echo (($director_info['type_id'] == 2)?"selected":"") ?>>Expert Director</option>
															  <option value="3" <?php echo (($director_info['type_id'] == 3)?"selected":"") ?>>Additional Director</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Name of the Director <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly maxlength="50" value="<?php echo $director_info['name']?>" id="director_name" name="director_name"  placeholder="Name of the Director" required="required" data-validation-required-message="Please enter director name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Father's Name</label>
														<input type="text" class="form-control" readonly maxlength="50" value="<?php echo $director_info['father_name']?>" id="f_name" name="f_name" placeholder="Father's Name">
													  </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="">Director Identification Number (DIN) <span class="text-danger">*</span></label>
														<input type="text" class="form-control text-uppercase" readonly maxlength="10" value="<?php echo $director_info['din']?>" id="din" name="din" placeholder="Director Identification Number" required="required" data-validation-required-message="Please enter director identification number.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Tenure(Years) <span class="text-danger">*</span></label>
														  <select class="form-control" id="tenure" readonly name="tenure" required data-validation-required-message="Select tenure">
															  <option value="">Select Tenure</option>
															  <option value="1" <?php echo (($director_info['tenure'] ==1)?"selected":"") ?>>1</option>
															  <option value="2" <?php echo (($director_info['tenure'] ==2)?"selected":"") ?>>2</option>
															  <option value="3" <?php echo (($director_info['tenure'] ==3)?"selected":"") ?>>3</option>
															  <option value="4" <?php echo (($director_info['tenure'] ==4)?"selected":"") ?>>4</option>
															  <option value="5" <?php echo (($director_info['tenure'] ==5)?"selected":"") ?>>5</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label class=" form-control-label">Retire by Rotation</label>
														  <div class="row">
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="retire1" class="form-check-label">
																  <input type="radio" id="retire1" name="retire" <?php echo ($director_info['retire_by_rotation'] ==1) ?  "checked" : "" ;  ?> disabled value="1" class="form-check-input"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="retire2" class="form-check-label">
																  <input type="radio" id="retire2" name="retire" disabled <?php echo ($director_info['retire_by_rotation'] ==0) ?  "checked" : "" ;  ?> value="0" class="form-check-input"><span class="ml-1">No</span>
																</label>
																</div>
															</div>			
														  </div>
													</div>
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														  <label for="">Qualification</label>
														  <select class="form-control" id="qualification" readonly name="qualification">
															  <option value="">Select Qualification</option>
															  <option value="1" <?php echo (($director_info['qualification']==1)?"selected":"") ?>>Post Graduate</option>
															  <option value="2" <?php echo (($director_info['qualification'] ==2)?"selected":"") ?>>Graduate</option>
															  <option value="3" <?php echo (($director_info['qualification'] ==3)?"selected":"") ?>>Class 9-12</option>
															  <option value="4" <?php echo (($director_info['qualification'] ==4)?"selected":"") ?>>Class 6- 8</option>
															  <option value="5" <?php echo (($director_info['qualification'] ==5)?"selected":"") ?>>Class 0-5</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													<div class="form-group col-md-4">
														<label for="">Date of Appointment <span class="text-danger">*</span></label>
														<input type="date" class="form-control" onfocusout="calculatedate(this.value);" value="<?php echo $director_info['date_of_appointment']?>" readonly id="appointment_date" name="appointment_date" required="required" data-validation-required-message="Please enter date of appointment.">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Validity <span class="text-danger">*</span></label>
														<input type="date" class="form-control" readonly id="validity" name="validity" value="<?php echo $director_info['validity']?>" readonly required="required">
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="row row-space  mt-4">
												  <div class="form-group col-md-4">
														  <label class=" form-control-label">Gender <span class="text-danger">*</span></label>
														  <div class="row">
															<div class="col-md-4">
															  <div class="form-check-inline form-check">
																<label for="gender1" class="form-check-label">
																  <input type="radio" id="gender1" name="gender" value="1" disabled <?php echo ($director_info['gender'] ==1) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">Male</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-4">
															  <div class="form-check-inline form-check">
																<label for="gender2" class="form-check-label">
																  <input type="radio" id="gender2" name="gender" disabled value="2" <?php echo ($director_info['gender'] ==2) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">Female</span>
																</label>
																</div>
															</div>
															<div class="col-md-4">
															  <div class="form-check-inline form-check">
																<label for="gender3" class="form-check-label">
																  <input type="radio" id="gender3" name="gender" disabled value="3" <?php echo ($director_info['gender'] ==3) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">Others</span>
																</label>
																</div>
															</div>
														  </div>
													</div>
												</div>
										</div>										
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('staff/operation/editdirector/' . $director_info['id']); ?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
											<a href="<?php echo base_url('staff/operation');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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

function calculatedate (appointment_date) {
	var tenure_year = $('#tenure').val();
	var appointment = new Date(appointment_date);
	var month = appointment.getMonth();
	var date = appointment.getDate();
	var yyyy = (appointment.getFullYear()+parseInt(tenure_year));
	var appointment_validity = yyyy+'-'+0+(month+1)+'-'+date;
    document.getElementById("validity").value = appointment_validity;	
}

</script>	 
</body>
</html>