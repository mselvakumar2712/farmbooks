<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<?php 
$directory = 'assets/uploads/exposure/exposure_visit_'.$exposure['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
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
                        <h1>Edit Exposure Visit </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/editexposure/'.$exposure['id']);?>">Edit Exposure Visit </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php //echo base_url('staff/operation/postUpdateExposure')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space  mt-4"> 
											<input type="hidden" id="" name="exposure_id" class="form-control" value="<?php echo $exposure['id']; ?>">														
											<div class="form-group col-md-4">
											  <label for="">Date of Visit <span class="text-danger">*</span></label>
											  <input type="date" id="date_training" value="<?php echo $exposure['program_date']; ?>"    name="date_visit"  class="form-control"  required="required" data-validation-required-message="Please select date of visit ">					
											   <p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
											<label for="">Place of Visit </label>
											<input type="text" id="place_visit" value="<?php echo $exposure['conducting_place']; ?>" placeholder="Place of Visit" maxlength="50" name="place_visit"  class="form-control" >					
											<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-4">
											<label for="">No. of Participants </label>
											<input type="text" id="no_participants" value="<?php echo $exposure['no_of_participants']; ?>" placeholder="No. of Participants" name="no_participants" maxlength="3" class="form-control numberOnly">					
											<div class="help-block with-errors text-danger"></div>
											</div>
											</div>
											<div class="row row-space">

											<div class="form-group col-md-4">
											<label for="">No. of Villages Covered </label>
											<input type="text" id="no_villages" maxlength="3" name="no_villages" placeholder="No. of Villages Covered" value="<?php echo $exposure['no_of_villages']; ?>" class="form-control numberOnly">					
											<div class="help-block with-errors text-danger"></div>
											</div>
											 <div class="form-group col-md-4">
												  <label for="">Program Photo </label>
												 <input type="file" class="form-control"  maxlength="50" id="program_photo" accept="image/jpeg,image/png,image/jpg" name="program_photo[]" placeholder="Photo *" multiple>
												 <p class="help-block text-danger">Maximum 5 photos, each photo maximum upload file size- 500 KB</p>												
												 <div  id="filediv"></div>
											  </div>
											   <div class="form-group col-md-2 mt-4">
												<label for="inputAddress2">Cost Involved</label>
												<input type="checkbox" id="cost_involved" <?php echo ($exposure['cost_involved']==1)? "checked":""; ?> name="cost_involved" value="1" class="ml-2" >												
											</div> 
											<div class="form-group col-md-2 mt-2"  id="cost_inv_amt">
                                    <label for="">Total Cost </label>
                                    <input type="text" id="amount" maxlength="6" name="amount"  placeholder="Amount" value="<?php echo $exposure['amount']; ?>" class="form-control numberOnly mt-1 text-right">					
                                    <p id="validate_amount" class="help-block text-danger"></p>
											</div>
											</div>
											<div class="row row-space">
											<?php 
												if($uploadedImages){
												for($i=0;$i<count($uploadedImages);$i++){?>
													<div class="col-md-2" id="<?php echo $exposure['id'].'_'.$i; ?>" onclick="removeImageFromClick(this.id, '<?php echo $uploadedImages[$i]; ?>')">
														<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" id="<?php echo $exposure['id'].'_'.$i; ?>" width="" height="" alt="" />
													</div>
													
												<?php }} ?>
											</div> 
										</div>	
										<div class="col-md-12 text-center mt-4">
											<button id="sendMessageButton" class="btn btn-fs btn-success confirmation text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
											<a href="<?php echo base_url('staff/operation/exposurelist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
$("#sendMessageButton").click(function() {
	var costinv = $("input[name='cost_involved']:checked").val();  
    if(costinv == 1) {
		var amount=document.getElementById("amount").value;
		if(amount ==''){			
		$("#validate_amount").html("Please enter amount");
		return false;
		}else{
			return true;
		}
		
    }else{
		return true;
	}
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
      $('#date_training').attr('max', maxDate);
			
}); 
var check_cost_inv = $("input[name='cost_involved']:checked").val();  
if(check_cost_inv == 1) {
		$('#cost_inv_amt').show();

}else{
	$('#cost_inv_amt').hide();
}
$('input[name=cost_involved]').on('change', function() {
    var cost_inv = $("input[name='cost_involved']:checked").val();  
    if(cost_inv == 1) {
		$('#cost_inv_amt').show();

    }else{
		$('#cost_inv_amt').hide();
	}
});	
//total days calculation
function GetDays(){
                var dropdt = new Date(document.getElementById("date_completeion").value);
                var pickdt = new Date(document.getElementById("date_training").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("date_training")){
            document.getElementById("total_days").value=GetDays();
        }  
    }

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
      if($('#date_training').val() == '') {
         swal('Sorry!',"Please select date of visit");
         validate = false;
         return false;
      }
      var checked = true;
      checked = $("input[name=cost_involved]:checked").length;
      if(checked) {
         if($('#amount').val() == ""){
            swal('Sorry!',"You must enter total cost");
            return false;
         }
      }
      if(validate){
         $('#pageloadingWait').show();
         $(this).prop('disabled', true);
         event.preventDefault();
         var form = $('#directorform')[0];
         var data = new FormData(form);
         for(var i=0, len=storedFiles.length; i<len; i++) {
            data.append('program_photo[]', storedFiles[i]);	
         }
         $.ajax({
             url: "<?php echo base_url();?>staff/operation/postUpdateExposure",
             method: 'post',
             data: data,
             cache: false,
             contentType: false,
             processData: false,
             success: function (response) {
                  window.location = '<?php echo base_url();?>staff/operation/exposurelist';
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
	var date_training = $(this).val();
	$("#date_completeion").attr("min", date_training);
});
</script>	 
</body>
</html>