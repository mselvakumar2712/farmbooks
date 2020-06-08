<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<?php 
$directory = 'assets/uploads/training_director/training_'.$director['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
//print_r($uploadedImages);
$activeDirectors = explode(',', $director['attended_director']);
$program_speakers = explode(',', $director['program_speaker']);
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
                        <h1>Edit Training to Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('staff/operation/training_directorslist');?>">Training of Directors</a></li>
                            <li><a class="active" href="#">Edit Training to Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php //echo base_url('staff/operation/postUpdateTrainingOfDirector/'.$director['id']);?>" method="post" id="directorTrainingForm" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">
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
														  <label for="">Date of Training <span class="text-danger">*</span></label>
														   <input type="date" class="form-control" id="date_of_training" name="date_of_training" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required="required" data-validation-required-message="Please select date of training">
														   <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-8">
														<label for="">Directors Attended <span class="text-danger">*</span></label>
														<div class="row">
														<?php foreach($directors as $directors){ ?>														
														<div class="form-group col-md-3">
															<label for="director_<?php echo $directors->id; ?>" style="text-transform: capitalize;"><?php echo $directors->name; ?></label>
															<input type="checkbox" id="director_<?php echo $directors->id; ?>" name="directors_attended[]" value="<?php echo $directors->id; ?>" class="ml-2" <?php if(in_array($directors->id, $activeDirectors)){?> checked <?php } ?> >                        
														</div>
														<?php } ?>
														</div>
														<div class="help-block with-errors text-danger"></div>
													  </div>
													</div>
													  <div class="row row-space">
													  <div class="form-group col-md-6">
														<div class="table-responsive">  
															<table class="table table-bordered" id="dynamic_field">
																<thead>
																	<tr>
																		<th class="text-center">
																			Program Speaker <span class="text-danger">*</span>
																		</th>	
																		<th class="text-center"></th>
																	</tr>
																</thead>
																<tbody>
																<?php for($i=0;$i<count($program_speakers);$i++): ?>
																<tr id="<?php echo 'program_speakerRow_'.$i; ?>">  
																	<td width="50%">													
																	<input type="text" class="form-control" maxlength="50" value="<?php echo $program_speakers[$i]; ?>" id="program_speakers<?php echo $i; ?>" name="program_speakers[]" placeholder="Program Speaker" readonly>
																	</td>
																	<td width="10%">																																																	
																		<button type="button" name="remove" id="remove_<?php echo $i; ?>" class="btn btn-danger btn_remove" <?php if($i == count($program_speakers)-1) { ?> style="display:none;"<?php } ?>>-</button>
																		<button type="button" name="add" id="add_<?php echo $i; ?>" class="btn btn-success btn_add" <?php if($i != count($program_speakers)-1) { ?> style="display:none;"<?php } ?>>+</button>
																	</td>  
																</tr>	
																<?php endfor; ?>	
																</tbody>
															</table>  
														</div>
													  </div>
														<div class="form-group col-md-3 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="involved_cost" value="1" class="ml-2" <?php echo ($director['cost_involved']==1)?'checked':''; ?>>												
														</div> 
														<div class="form-group col-md-3" id="costHolder">
															<label for="inputAddress2">Total Cost <span class="text-danger">*</span></label>
															<input type="text" id="involved_cost_value" name="involved_cost_value" maxlength="6" value="<?php echo $director['involved_cost']; ?>" class="form-control numberOnly ml-2" placeholder="Total Cost" required="required" data-validation-required-message="Please provide the total cost">												
															<div class="help-block with-errors text-danger"></div>
														</div> 
												</div>
												
												<div class="row row-space">
													  <div class="form-group col-md-4">
														 <label for="">Upload Photo <span class="text-danger">(Max upload file size is 500KB)</span></label>
														 <input type="file" class="form-control" id="trainie_photo" accept="image/jpeg,image/png,image/jpg" name="trainie_photo[]" placeholder="Photo *" multiple>
														 <p class="help-block text-danger"></p>
													  </div>
												</div>
												
												<div class="row row-space">
													<div class="form-group col-md-12">
														<label for="">Program Photo </label>
														<div class="">
														<?php 
															if($uploadedImages){
																for($i=0;$i<count($uploadedImages);$i++){?>
																<div class="col-md-2" id="<?php echo $director['id'].'_'.$i; ?>" onclick="removeImageFromClick(this.id, '<?php echo $uploadedImages[$i]; ?>')">
																	<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
																</div>
														<?php }} ?>
														</div>
													</div>														   
												</div>			
																								
										</div>										
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success confirmation text-center" type="submit"> <i class="fa fa-check-circle"></i> Update Training</button>
											<a href="<?php echo base_url('staff/operation/training_directorslist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
var cost_involved = "<?php echo $director['cost_involved']; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}

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
    // $('#date_of_training').attr('min', maxDate);
});


$(document).ready(function(){
		var i="<?php echo count($program_speakers)-1;?>";
		var j=0;
		/*$('#sendMessageButton').click(function(){  

         var validate = true;
         $('#dynamic_field').find('tr input[id=program_speakers'+i+']').each(function(){
			
            if($(this).val() == ""){
               validate = false;
            }
         });
		
         if(validate){		
            return true;// you can submit form or send ajax or whatever you want here
         }else{			
            swal('',"Provide all the data");
            return false;
         }

		});*/	
		
		$(document).on('click', '.btn_add', function(){ 		
		//validate condition
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
			});
		
		//validate check
		if(validate){
			document.getElementById("sendMessageButton").disabled = false;
			document.getElementById('program_speakers'+i).setAttribute("readonly", "true");
			j=i;
			i++;			
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="program_speakers'+i+'" name="program_speakers[]" class="form-control" maxlength="50" /></td><td><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display: none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
            $('#add_'+j).hide();
            $('#remove_'+j).show();
			
			return true;// you can submit form or send ajax or whatever you want here
			}else{
			swal('',"Provide all the data");
			return false;
			}																																																											
		});
		
		$(document).on('click', '.btn_remove', function(){
           //var button_id = $(this).attr("id");   
           var arr = $(this).parents('tr').attr("id"); //$(this).attr("id").split("_"); 
		   $('#'+arr).remove();
		}); 

      $('#sendMessageButton').click(function(event) {
         var checked = false;
         $('input[name="directors_attended[]"]').each(function(){
            if($(this).prop('checked')){
               checked = true;
            }
         });
         if(!checked) {
            swal('Sorry!',"You must check at least any one of the director");
            return false;
         }
         checked = $("input[name=involved_cost]:checked").length;
         if(checked) {
            if($('#involved_cost_value').val() == ""){
               swal('Sorry!',"You must enter total cost");
               return false;
            }
         }
         var validate = true;
         $('#dynamic_field').find('tr input[name="program_speakers[]"]').each(function(){
            if($(this).val() == ""){
               validate = false;
            }
         });
         if(validate){
            $('#pageloadingWait').show();
            $(this).prop('disabled', true);
            event.preventDefault();
            var form = $('#directorTrainingForm')[0];
            var data = new FormData(form);
            for(var i=0, len=storedFiles.length; i<len; i++) {
               data.append('trainie_photo[]', storedFiles[i]);	
            }
            $.ajax({
                url: "<?php echo base_url();?>staff/operation/postUpdateTrainingOfDirector/<?php echo $director['id']; ?>",
                method: 'post',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                     window.location = '<?php echo base_url();?>staff/operation/training_directorslist';
                },
                error: function (err) {
                    console.log(err);
                }
            });
         }else{			
            swal('',"Provide the program speakers name");
            return false;
         }
      });   
     
});


$('#involved_cost').on('change', function() {
    var cost_inv = $("#involved_cost:checked").val();
	costHolder(cost_inv);
});

var fileCount = 0;
var storedFiles = [];
$(document).ready(function() {
   var uploadedImageCount = "<?php echo count($uploadedImages)?>";
   fileCount = Number(uploadedImageCount);
   if (window.File && window.FileList && window.FileReader) {
      $("#trainie_photo").on("change", function(e) {		 	
         var files = e.target.files,
         filesLength = files.length;		
         fileCount = fileCount + filesLength;
         if(fileCount > 5){
               fileCount = fileCount - filesLength;
               $("#trainie_photo").val('');
               swal('Sorry', "Maximum 5 images allowed to upload");		
               return false;
         }
         for (var i = 0; i < filesLength; i++) {
             var f = files[i];
             var FileSize = f.size / 1024;
             if(FileSize > 512) {
               fileCount = fileCount - filesLength;
               $("#trainie_photo").val('');
               swal('', "File size exceeds 512 KB");					 
               return false;
             }
             var filetype = f.type;
             if(filetype =='image/jpeg' || filetype =='image/jpg' || filetype =='image/png'){
             }else {   
               fileCount = fileCount - filesLength;
               $("#trainie_photo").val('');
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
               "</span>").insertAfter("#trainie_photo");
               
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
   $("#trainie_photo").val('');
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
</script>	 
</body>
</html>