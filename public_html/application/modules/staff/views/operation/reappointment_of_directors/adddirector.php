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
                        <h1>Add Reappointment of Director</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/addreappointment');?>">Add Reappointment of Director</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_reappointment')?>"  method="post"  id="directorform" name="sentMessage" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<input type="hidden" id="id" name="id" >
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														<label for="inputAddress2">Name of the Director <span class="text-danger">*</span></label>
														<select class="form-control" id="director"  name="director" required="required" data-validation-required-message="Please select director name.">
														  <option value="">Select Director </option>
														  <?php for($i=0; $i<count($director);$i++) { ?>                    
														  <option value="<?php echo $director[$i]->id; ?>"><?php echo $director[$i]->name; ?></option>
														  <?php } ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													  </div>

													<!--  <div class="form-group col-md-4">
														  <label for="">Name of the Director <span class="text-danger">*</span></label>
														  <select class="form-control" id="director" name="director" required data-validation-required-message="Select director type">
														 <option value="0"> Select Director</option>
															<?php for($i=0; $i<count($director);$i++) { ?>	
															<option value="<?php echo $director[$i]->id; ?>"><?php echo $director[$i]->name; ?></option>
															<?php } ?>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div> -->
													 <div class="form-group col-md-4">
														<label for="">Director Identification Number (DIN) <span class="text-danger">*</span></label>
														<input type="text" class="form-control text-uppercase" maxlength="10" id="din" name="din" placeholder="Director Identification Number" required="required" data-validation-required-message="Please enter director identification number.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Tenure (Years) <span class="text-danger">*</span></label>
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
														<input type="date" class="form-control" onfocusout="calculatedate(this.value);" id="appointment_date" name="appointment_date" required="required" data-validation-required-message="Please enter date of appointment." data-date-open-on-focus="true">
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
											<a href="<?php echo base_url('staff/operation');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$("#sendMessageButton").click(function() {
  var startDt=document.getElementById("date_formation").value;
  var endDt=document.getElementById("business_commence").value;
  if(startDt && endDt){
     if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
     {
       $("#validate_date").html("Selected date should be LATER than Formation date");
       return false;
     }
  }
  
});


$(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
	  {
        month = '0' + month.toString();
	  }
	else
	{
		 month = month.toString();
	}
      if(day < 10)
	  {
        day = '0' + day.toString();
	  }
	  else
	  {
		 day = day.toString(); 
	  }
      
      var maxDate = year + '-' + month + '-' + day;
      $('#appointment_date').attr('max', maxDate);
			
}); 

function calculatedate (appointment_date) {
  var tenure_year = $('#tenure').val();
  var appointment = new Date(appointment_date);
  //console.log(appointment);
  var month = appointment.getMonth()+1;
 // console.log(month);
  var date = appointment.getDate()-1;
  //console.log(date);
  
  if(month < 10)
	  {
        month = '0' + month.toString();
	  }
	else
	{
		 month = month.toString();
	}
      if(date < 10)
	  {
        date = '0' + date.toString();
	  }
	  else
	  {
		 date = date.toString(); 
	  }
      
  
  var yyyy = (appointment.getFullYear()+parseInt(tenure_year));
  var appointment_validity = yyyy+'-'+(month)+'-'+(date);
    document.getElementById("validity").value = appointment_validity;  
}

$('#director').change(function(){
    var director_id = $("#director").val();
    getdirectordetail( director_id );
});
     
function getdirectordetail( director_id ) {
    $("#din").val();
    if(director_id != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>staff/operation/getdirectordetail/"+director_id,
		  type:"GET",
           data:"",
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
		  console.log(response);
              response=response.trim();                
              responseArray=$.parseJSON(response);
			  console.log(responseArray.director_list[0].din);
			 if(responseArray.status == 1){
			     document.getElementById("din").value = responseArray.director_list[0].din;
				  document.getElementById("id").value = responseArray.director_list[0].id;
			     var date_of_appoinment = responseArray.director_list[0].date_of_appointment;
               $("#appointment_date").attr("min", date_of_appoinment);
			}
		  },
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	   }); 
    } else {
        swal("Sorry!", "Select the bank name");
    } 
}

</script>	 
</body>
</html>