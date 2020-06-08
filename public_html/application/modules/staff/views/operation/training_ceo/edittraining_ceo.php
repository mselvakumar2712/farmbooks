<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<?php 
$directory = 'assets/uploads/training_CEO/training_'.$ceo['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
//print_r($directory);
?>
<style>
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
                        <h1>Edit Training to CEO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/edittraining_ceo/'.$ceo['id']);?>">Edit Training to CEO</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php //echo base_url('staff/operation/postUpdateTrainingOfCEO/'.$ceo['id'])?>"  method="post" id="trainginToCEOEditForm" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">
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
												<div class="row row-space"> 
													  <div class="form-group col-md-4">
														  <label for="">Name of the CEO <span class="text-danger">*</span></label>
                                             <select id="ceo_name" class="form-control" name="ceo_name" required data-validation-required-message="Please select the CEO name">
															<option value="">Select CEO Name</option>
															<?php foreach($ceos as $ceos){ ?>
															   <option value="<?php echo $ceos->id; ?>" <?php if($ceos->id == $ceo['ceo_id']) { ?>selected<?php } ?> ><?php echo $ceos->name; ?></option>
															<?php } ?>
                                   
															</select>
														   <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Date of Commencement of Training  <span class="text-danger">*</span></label>
														<input type="date" id="date_training" name="date_training" class="form-control" required="required" data-validation-required-message="Please select date of commencement of training" value="<?php echo $ceo['training_start_date']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Date of Completion of Training <span class="text-danger">*</span></label>
														<input type="date" id="date_completeion" name="date_completeion" class="form-control" required="required" data-validation-required-message="Please select date of completion of training" value="<?php echo $ceo['training_end_date']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													   <div class="row row-space">
													  <div class="form-group col-md-4">
														<label for="">No. of Days of Training <span class="text-danger">*</span></label>
														<input type="text" id="total_days" name="total_days" class="form-control" required="required" data-validation-required-message="Please enter number of days" value="<?php echo $ceo['no_of_days']; ?>" readonly>
														<div class="help-block with-errors text-danger"></div>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Trainer Name <span class="text-danger">*</span></label>
														<input type="text" id="trainer_name" maxlength="50" name="trainer_name" class="form-control" required="required" data-validation-required-message="Please enter trainer name" value="<?php echo $ceo['trainer_name']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Training Institute’s Name </label>
														<input type="text" id="institutes_name" maxlength="75" name="institutes_name" class="form-control" value="<?php echo $ceo['institute_name']; ?>">					
													  </div>
													  </div>
													  <div class="row row-space">
													   <div class="form-group col-md-4">
														<label for="">Date of Exposure Visit</label>
														<input type="date" id="exposure_date" name="exposure_date" class="form-control" value="<?php echo $ceo['exposure_date']; ?>">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Place of Visit </label>
														<input type="text" id="place_visit" maxlength="50" name="place_visit" class="form-control" value="<?php echo $ceo['place_to_visit']; ?>">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
														<div class="form-group col-md-4 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($ceo['cost_involved']==1)?'checked':''; ?>>
														</div>													  
													</div>
												<div class="row row-space">
													<div class="form-group col-md-4">
														<label for="">Program Photo <span class="text-danger">(Max upload file size is 500KB)</span></label>
														<input type="file" class="form-control" id="program_photo" multiple accept="image/jpeg,image/png,image/jpg" name="program_photo[]" placeholder="Photo *">
														<p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4"></div>
													<div class="form-group col-md-4" id="costHolder">
														<label for="inputAddress2">Total Cost <span class="text-danger">*</span></label>
														<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2" maxlength="6" placeholder="Total Cost" data-validation-required-message="Please provide the involved cost" value="<?php echo $ceo['involved_cost']; ?>">	
														<div class="help-block with-errors text-danger"></div>
													</div>  
												</div>
													  
												<div class="row row-space">
													<div class="form-group col-md-12">
														<label for="">Program Photo </label>
														<div class="">
														<?php 
															if($uploadedImages){
																for($i=0;$i<count($uploadedImages);$i++){?>
																<div class="col-md-2" id="<?php echo $ceo['id'].'_'.$i; ?>" onclick="removeImageFromClick(this.id, '<?php echo $uploadedImages[$i]; ?>')">
																	<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
																</div>
														<?php }} ?>
														</div>
													</div>														   
												</div>		
												
										</div>		
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success confirmation text-center" type="submit"> <i class="fa fa-check-circle"></i> Update Training</button>
											<a href="<?php echo base_url('staff/operation/training_ceolist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
var cost_involved = "<?php echo $ceo['cost_involved']; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}

$("#date_training").attr("max", "<?php echo $ceo['training_end_date']; ?>");
$("#date_completeion").attr("min", "<?php echo $ceo['training_start_date']; ?>");

var fileCount = 0;
var storedFiles = [];
$(document).ready(function() {
	var uploadedImageCount = "<?php echo count($uploadedImages)?>";
   fileCount = Number(uploadedImageCount);
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
   }
   else {
    alert("Your browser doesn't support to File API")
   }
   
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
         var form = $('#trainginToCEOEditForm')[0];
         var data = new FormData(form);
         for(var i=0, len=storedFiles.length; i<len; i++) {
            data.append('program_photo[]', storedFiles[i]);	
         }
         $.ajax({
             url: "<?php echo base_url();?>staff/operation/postUpdateTrainingOfCEO/<?php echo $ceo['id']; ?>",
             method: 'post',
             data: data,
             cache: false,
             contentType: false,
             processData: false,
             success: function (response) {
                  window.location = '<?php echo base_url();?>staff/operation/training_ceolist';
             },
             error: function (err) {
                 console.log(err);
             }
         });
      }
   }); 
   
});

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

function removeImageFromClick(image_id, image_url) {
	swal({
      title: "Are you sure?",
      text: "You want to remove the uploaded image?",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) { 
         fileCount--;      
         $.ajax({
              url:"<?php echo base_url();?>staff/operation/removeImageFromClick",
              type:"POST",
              data:{"image_url":image_url},
              dataType:"html",
              cache:false,			
              success:function(response) {
                  response=response.trim();
                  responseArray=$.parseJSON(response);
                  if(responseArray.status == 1) {
                  location.reload();
               }
              },
              error:function(response){
                  alert('Error!!! Try again');
              } 			
          }); 
      } else {
        swal("Cancelled", "You have cancelled this remove action");
      }
    })	
}	

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

$('#involved_cost').on('change', function() {
    var cost_inv = $("#involved_cost:checked").val();
	costHolder(cost_inv);
});

</script>		 
</body>
</html>