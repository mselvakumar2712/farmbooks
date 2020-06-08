<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.text-right{
   font-style: inherit ! important;
}
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: red;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
  <body>
      <div class="container-fluid pl-0 pr-0">
         <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <div class="loading" id="pageloadingWait" style="display:none;"></div>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Training to CEO </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('fpo/operation/training_ceolist');?>">Training to CEO</a></li>
                            <li><a class="active" href="#">Add Training to CEO</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php //echo base_url('fpo/operation/postAddTrainingOfCEO')?>"  method="post" id="trainginToCEOAddForm" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									
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
									
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-4">
														  <label for="">Name of the CEO <span class="text-danger">*</span></label>
															<select id="ceo_name" class="form-control" name="ceo_name" required data-validation-required-message="Please select the CEO name">
															<option value="">Select CEO Name</option>
															<?php foreach($ceos as $ceo){ ?>
															   <option value="<?php echo $ceo->id; ?>"><?php echo $ceo->name; ?></option>
															<?php } ?>
															</select>
														   <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Commencement of Training <span class="text-danger">*</span></label>
														<input type="date" id="date_training" max="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" name="date_training" class="form-control" required="required" data-validation-required-message="Please select date of commencement of training">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Date of Completion of Training <span class="text-danger">*</span></label>
														<input type="date" id="date_completeion" name="date_completeion" class="form-control" required="required" data-validation-required-message="Please select date of completion of training">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													   <div class="row row-space">
													  <div class="form-group col-md-4">
														<label for="">No. of Days of Training <span class="text-danger">*</span></label>
														<input type="text" id="total_days" name="total_days" class="form-control" required="required" data-validation-required-message="Please enter number of days" placeholder="No. of Days of Training" readonly>
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Trainer Name <span class="text-danger">*</span></label>
														<input type="text" id="trainer_name" maxlength="50" name="trainer_name" class="form-control" required="required" data-validation-required-message="Please enter trainer name" placeholder="Trainer Name">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Training Institute’s Name </label>
														<input type="text" id="institutes_name" maxlength="75" name="institutes_name" class="form-control" placeholder="Training Institute’s Name">
													  </div>
													  </div>
													  <div class="row row-space mt-4">
													   <div class="form-group col-md-4">
														<label for="">Date of Exposure Visit</label>
														<input type="date" id="exposure_date" name="exposure_date" value="<?php echo date("Y-m-d"); ?>" class="form-control">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Place of Visit </label>
														<input type="text" id="place_visit" maxlength="50" name="place_visit" class="form-control" placeholder="Place of Visit">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													 	<div class="form-group col-md-4 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2">
														</div> 										 
												</div>
													  
												<div class="row row-space">
													<div class="form-group col-md-4">
														 <label for="">Program Photo <span class="text-danger">(Max upload file size is 500KB)</span></label>
														 <input type="file" class="form-control" id="program_photo" multiple accept="image/jpeg,image/png,image/jpg" name="program_photo[]" placeholder="Photo *">
														 <p class="help-block text-danger"></p>
													</div>	
													<div class="form-group col-md-4">													
													</div>
													<div class="form-group col-md-4" id="costHolder">
														<label for="inputAddress2">Total Cost ( <span class="fa fa-inr"></span> )<span class="text-danger">*</span></label>
														<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control text-right numberOnly ml-2" maxlength="6" placeholder="Total Cost" data-validation-required-message="Please provide the total cost">												
														<div class="help-block with-errors text-danger"></div>
													</div>  
												</div>													  										
												
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Training</button>
											<a href="<?php echo base_url('fpo/operation/training_ceolist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$("#costHolder").hide();
$('#involved_cost').on('change', function() {
    var cost_inv = $("#involved_cost:checked").val();
	if(cost_inv == 1) {
		$("#costHolder").show();
		$("#costHolder input").prop('required', true);
	} else {
		$("#costHolder").hide();
		$("#costHolder input").prop('required', false);
	}
});

$("#date_completeion").attr("min", "<?php echo date("Y-m-d"); ?>");

var fileCount = 0;
var storedFiles = [];
$(document).ready(function() {
   if (window.File && window.FileList && window.FileReader) {
      $("#program_photo").on("change", function(e) {		 	
         var files = e.target.files,
         filesLength = files.length;
         fileCount = fileCount + filesLength;
         if(fileCount > 5){
               fileCount = fileCount - filesLength;
               $("#program_photo").val('');
               swal('Sorry', "Maximum 5 images allowed to upload");		
               return false;
         }
         for (var i = 0; i < filesLength; i++) {
             var f = files[i];
             var FileSize = f.size / 1024;
             if(FileSize > 512) {
               fileCount = fileCount - filesLength;
               $("#program_photo").val('');
               swal('', "File size exceeds 512 KB");					 
               return false;
             }
             var filetype = f.type;
             if(filetype =='image/jpeg' || filetype =='image/jpg' || filetype =='image/png'){
             }else {   
               fileCount = fileCount - filesLength;
               $("#program_photo").val('');
               swal('',"Only image file allowed to upload");
               return false;
             }
         }
         var temp_length=files.length;
         for (var i = 0; i < temp_length; i++) {
            var file = files[i];
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
               $("<span class=\"pip\">" +
               "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
               "<br/><span id=\""+ file.name +"\" class=\"remove\">Remove image</span>" +
               "</span>").insertAfter("#program_photo");
               
            });
            fileReader.readAsDataURL(file);
         }
         var filesArr = Array.prototype.slice.call(files);
         filesArr.forEach(function(f) {
            storedFiles.push(f);
         }); 
      
      });
  } else {
    alert("Your browser doesn't support to File API")
  }
  
  $(document).on('click', '.remove', function() {
      fileCount--;
      var filename = $(this).attr('id');
      for(var i=0; i<storedFiles.length; i++) {
         if(storedFiles[i].name == filename) {
            storedFiles.splice(i, 1);
            break;
         }
      }
      $("#program_photo").val('');
      $(this).parent(".pip").remove();
  });
  
  $('#sendMessageButton').click(function(event) {
      var validate = true;
      if($('#ceo_name').val() == '') {
         swal('Sorry!',"Please select CEO name");
         validate = false;
         return false;
      }
      if($('#date_completeion').val() == '') {
         swal('Sorry!',"Please select date of completion of training");
         validate = false;
         return false;
      }
      if($('#trainer_name').val() == '') {
         swal('Sorry!',"Please enter trainer name");
         validate = false;
         return false;
      }
      var checked = true;
      checked = $("input[name=involved_cost]:checked").length;
      if(checked) {
         if($('#involved_cost_value').val() == ""){
            swal('Sorry!',"You must enter total cost");
            return false;
         }
      }
      if(validate){
         $('#pageloadingWait').show();
         $(this).prop('disabled', true);
         event.preventDefault();
         var form = $('#trainginToCEOAddForm')[0];
         var data = new FormData(form);
         for(var i=0, len=storedFiles.length; i<len; i++) {
            data.append('program_photo[]', storedFiles[i]);	
         }
         $.ajax({
             url: "<?php echo base_url();?>fpo/operation/postAddTrainingOfCEO",
             method: 'post',
             data: data,
             cache: false,
             contentType: false,
             processData: false,
             success: function (response) {
                  window.location = '<?php echo base_url();?>fpo/operation/training_ceolist';
             },
             error: function (err) {
                 console.log(err);
             }
         });
      }
  });
  
}); 


$("#date_training").focusout(function() {
	var date_completeion = $(this).val();
    $("#date_completeion").attr("min", date_completeion);
});

$("#date_completeion").focusout(function() {
	var date_training = $(this).val();
    $("#date_training").attr("max", date_training);
});

$("#date_completeion").focusout(function() {
	var startdateValue = $("#date_training").val();
	var startDate = Date.parse(startdateValue);
	var endDate = Date.parse($(this).val());
	var timeDiff = endDate - startDate;
	daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
	$("#total_days").val((Number(daysDiff)+1));
});



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
    $('#date_training').attr('min', maxDate);
});


</script>	 
</body>
</html>