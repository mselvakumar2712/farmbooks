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
                        <h1>Add  Exposure Visit </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/addexposure');?>">Add  Exposure Visit </a></li>
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
					<form action="<?php //echo base_url('fpo/operation/post_exposure_visit')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">									
										<div class="container-fluid">
											<div class="row row-space  mt-4"> 
											<div class="form-group col-md-4">
											  <label for="">Date of Visit <span class="text-danger">*</span></label>
											  <input type="date" id="date_training" name="date_visit"  class="form-control"  required="required" data-validation-required-message="Please select date of visit ">					
											   <p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
											<label for="">Place of Visit </label>
											<input type="text" id="place_visit" maxlength="50" name="place_visit" placeholder="Place of Visit" class="form-control" >					
											</div>
											<div class="form-group col-md-4">
											<label for="">No. of Participants </label>
											<input type="text" id="no_participants" name="no_participants"  placeholder="No. of Participants" maxlength="3" class="form-control numberOnly">					
											</div>
											</div>
											<div class="row row-space">

											<div class="form-group col-md-4">
                                    <label for="">No. of Villages Covered </label>
                                    <input type="text" id="no_villages" maxlength="3" placeholder="No. of Villages Covered"  name="no_villages"  class="form-control numberOnly">					
											</div>
											 <div class="form-group col-md-4">
												  <label for="">Program Photo <span class="text-danger"></span></label>
												 <input type="file" class="form-control"   id="program_photo" accept="image/jpeg,image/png,image/jpg" name="program_photo[]" placeholder="Photo *" multiple>
												 <p class="help-block text-danger">Maximum 5 photos, each photo maximum upload file size- 500 KB</p>
												 <div  id="filediv"></div>
											  </div>
											<div class="form-group col-md-2 mt-4">
												<label for="inputAddress2">Cost Involved</label>
												<input type="checkbox" id="cost_involved" name="cost_involved" value="1" class="ml-2" >												
											</div> 
											<div class="form-group col-md-2 mt-2" id="cost_inv_amt">
                                    <label for="">Total Cost ( <span class="fa fa-inr"></span> )</label>
                                    <input type="text" id="amount" maxlength="6" name="amount" placeholder="Total Cost"  class="form-control numberOnly mt-1 text-right">					
                                    <p id="validate_amount" class="help-block text-danger"></p>
											</div>
											</div>	
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center mt-3">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('fpo/operation/exposurelist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
/*$("#sendMessageButton").click(function() {
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
});*/
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
$('#cost_inv_amt').hide(); 
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
	
	
		$("#date_training").focusout(function() {
    var date_training = $(this).val();
    $("#date_completeion").attr("min", date_training);
});

/* $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
	  var temp_file=[];
  $("#program_photo").on("change", function(e) {
		 
		
      var files = e.target.files,
	  
        filesLength = files.length;

		console.log(files);
		if(filesLength > 5){
				$("#filediv").val('');
				$("#program_photo").val('');
				swal('Sorry', "Maximum 5 images can able to upload");		
				return false;
		} else {
			//$('.pip').remove();
			var temp_length=files.length;
			for (var i = 0; i < temp_length; i++) {

					 var f = files[i]
					 var FileSize = f.size / 1024;
					 if(FileSize > 512) {
						swal('', "File size exceeds 512 KB");					 
						$("#program_photo").val(''); 
						return false;
					 } else {
					var fileReader = new FileReader();
					fileReader.onload = (function(e) {
					  var file = e.target;
					  $("<span class=\"pip\">" +
						"<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
						"<br/><span class=\"remove\">Remove image</span>" +
						"</span>").insertAfter("#program_photo");
					  $(".remove").click(function(){
						$(this).parent(".pip").remove();
					  });
					  
					});
					fileReader.readAsDataURL(f);
				  }
				//}
					
				}       	
		}
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
}); */

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
             url: "<?php echo base_url();?>fpo/operation/post_exposure_visit",
             method: 'post',
             data: data,
             cache: false,
             contentType: false,
             processData: false,
             success: function (response) {
                  window.location = '<?php echo base_url();?>fpo/operation/exposurelist';
             },
             error: function (err) {
                 console.log(err);
             }
         });
      }
   });
  
}); 

</script>	 
</body>
</html>