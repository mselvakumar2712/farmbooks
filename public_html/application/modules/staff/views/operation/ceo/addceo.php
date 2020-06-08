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
                        <h1>Add Chief Executive Officer</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/addceo');?>">Add Chief Executive Officer</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_ceo') ?>"  method="post"  id="ceoform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														    <label for="">Name of the Chief Executive Officer <span class="text-danger">*</span></label>
															<input type="text" class="form-control" maxlength="50" id="ceo_name" name="ceo_name"  placeholder="Name of the Chief Executive Officer" required="required" data-validation-required-message="Please enter chief executive officer name.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Father Name / Spouse Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="50" id="father_name" name="father_name"  placeholder="Father Name / Spouse Name" required="required" data-validation-required-message="Please enter father / spouse name.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Birth <span class="text-danger">*</span></label>
														<input type="date" class="form-control"  id="dob" name="dob"  data-validation-required-message="Please enter date of birth." min="1900-01-01" max="<?php echo date("Y-m-d");?>" >
													    <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  ">
													  <div class="col-md-4 form-group">
															<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" required maxlength="6" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code"   placeholder="PINCODE"  data-validation-required-message="Please enter pincode.">
															<div class="help-block with-errors text-danger" id="pincode_validate"></div>
														</div>
													 <div class="form-group col-md-4">
														<label for="inputAddress2">State <span class="text-danger">*</span></label>
														<select id="state" class="form-control sel_state" readonly name="state" required  data-validation-required-message="Please select state." >
														<option value="">Select State </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												   <div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span></label>
														<select id="district" class="form-control sel_district" readonly name="district" required  data-validation-required-message="Please select district.">
														<option value="">Select District </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Taluk</label>
														<select class="form-control sel_taluk" name="taluk_id"  id="taluk_id"  >
														<option value="">Select Taluk </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												   <div class="form-group col-md-4">
														<label for="inputAddress2">Block </label>
														<select id="block" class="form-control sel_block" name="block"  >
														<option value="">Select Block </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												     <div class="form-group col-md-4">						    
														<label for="inputAddress2">Gram Panchayat</label>
														<select id="gram_panchayat" class="form-control sel_panchayat"  id="gram_panchayat" name="gram_panchayat" >
														<option value="">Select Gram Panchayat </option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												</div>
												<div class="row row-space">
													 <div class="form-group col-md-4">                            
														<label for="inputAddress2">Village </label>
														<select id="village" class="form-control sel_village" id="village"  name="village">
														<option value="">Select Village</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													 <div class="form-group col-md-8">
														<label for="inputAddress2">Street</label>
														<input type="text" class="form-control"  maxlength="75"  id="street_name" name="street_name" placeholder="Street" value="">
													</div>
												</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Door No</label>
														<input type="text" class="form-control" maxlength="10"  id="door_no" name="door_no" placeholder="Door No" value="">
													</div>
													<div class="form-group col-md-4">
														  <label for="">Qualification <span class="text-danger">*</span></label>
														  <select class="form-control" id="qualification" name="qualification" required="required" data-validation-required-message="Please select qualification." >
															  <option value="">Select Qualification</option>
															  <option value="1">Post Graduate</option>
															  <option value="2">Graduate</option>
															  <option value="3">Class 9-12</option>
															  <option value="4">Class 6- 8</option>
															  <option value="5">Class 0-5</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="inputAddress2">Experience <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="500" id="experience" name="experience" required="required" data-validation-required-message="Please enter experience." placeholder="Experience" >
														<p class="help-block text-danger"></p>
													</div>
												</div>
												<div class="row row-space">
												<div class="form-group col-md-4">
														<label for="">Date of Appointment <span class="text-danger">*</span></label>
														<input type="date" class="form-control"  min="<?php echo $appoint_date;?>" max="2050-12-31"  id="appointment_date" name="appointment_date" required="required" data-validation-required-message="Please enter date of appointment.">
														<p class="help-block text-danger"></p>
													</div>
												</div>
												</div>
												
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('staff/operation/ceolist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
/* $(document).ready(function() {
var appoinment_date='<?php echo $fpo_list[0]->date_formation;?>';
console.log(appoinment_date);
 $("#appointment_date").attr("min", appoinment_date);
}); */
//Appoinment date greater than certificate date
$('#appointment_date').focusout(function(){
   var date_certificate='<?php echo $fpo_list[0]->date_formation;?>';  
   var date_of_appointment= document.getElementById("appointment_date").value;
   if( new Date(date_certificate).getTime() >=  new Date(date_of_appointment).getTime())  {
      $('#appointment_date').val('');
      swal("",'Date of appoinment should be greater than date of formation');
    return false;
   }
 });
/* $("#appointment_date").focusout(function() {
	var date_training = $(this).val();
    $("#date_training").attr("max", date_training);
}); */
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
	  $('#dob').attr('max', maxDate);
			
});
$('#gram_panchayat').change(function(){

	var gram_panchayat = $("#gram_panchayat").val();
	getVillageList( gram_panchayat );
	});  
	 $('#block').change(function(){
		
		 var block = $("#block").val();
		  getPanchayatList( block );
	 });
	 function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
 				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
 				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
</script>	 
</body>
</html>