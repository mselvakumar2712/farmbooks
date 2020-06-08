<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
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
                        <h1>Add Awareness Program</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('staff/operation/awarenesslist');?>">Awareness Program</a></li>
                            <li><a class="active" href="#">Add Awareness Program</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php //echo base_url('staff/operation/postAddAwareness')?>" method="post" id="awarenessform" name="sentMessage" novalidate="novalidate" enctype="multipart/form-data">                   
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
														  <label for="">Date of Program <span class="text-danger">*</span></label>
														  <input type="date" id="date_training" max="" name="date_visit" value="<?php echo date("Y-m-d"); ?>" class="form-control" required="required" data-validation-required-message="Please select date of program">					
														   <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Place of Conducting Program </label>
														<input type="text" id="place_program" maxlength="50" name="place_program" placeholder="Place of Conducting Program" class="form-control">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">No. of Participants </label>
														<input type="text" id="no_participants" name="no_participants" maxlength="3" placeholder="No. of Participants" class="form-control numberOnly">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													   <div class="row row-space">
														<div class="form-group col-md-4">
															 <label for="">Program Photo <span class="text-danger">(Max upload file size is 500KB)</span></label>
															 <input type="file" class="form-control" id="program_photo" accept="image/jpeg,image/png,image/jpg" name="program_photo[]" placeholder="Photo *" multiple>
														</div>
														<div class="form-group col-md-3 mt-4">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="involved_cost" name="show_inactive" value="1" class="ml-2" >												
														</div> 
														<div class="form-group col-md-4" id="costHolder">
															<label for="inputAddress2">Total Cost <span class="text-danger">*</span></label>
															<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2" maxlength="6" placeholder="Total Cost" data-validation-required-message="Please provide the involved cost">												
															<div class="help-block with-errors text-danger"></div>
														</div>  
													  </div>
														<div class="row row-space">
													  <div class="form-group col-md-12" id="Village">
														<label for="">Villages <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">							
															<tbody id="villagelist">																														
															</tbody>															
														  </table>
													  </div>
													 					  
										</div>														  
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Awareness</button>
											<a href="<?php echo base_url('staff/operation/awarenesslist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
      $('#committee_date').attr('max', maxDate);		
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
      var checked = false;
      $('input[name="village_name[]"]').each(function(){
         if($(this).prop('checked')){
            checked = true;
         }
      });
      if(!checked) {
         swal('Sorry!',"You must select villages");
         return false;
      }
      checked = true;
      checked = $("input[name=show_inactive]:checked").length;
      if(checked) {
         if($('#involved_cost_value').val() == ""){
            swal('Sorry!',"You must enter total cost");
            return false;
         }
      }
      $('#pageloadingWait').show();
      $(this).prop('disabled', true);
      event.preventDefault();
      var form = $('#awarenessform')[0];
      var data = new FormData(form);
      for(var i=0, len=storedFiles.length; i<len; i++) {
         data.append('program_photo[]', storedFiles[i]);	
      }
      $.ajax({
          url: "<?php echo base_url();?>staff/operation/postAddAwareness",
          method: 'post',
          data: data,
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
               window.location = '<?php echo base_url();?>staff/operation/awarenesslist';
          },
          error: function (err) {
              console.log(err);
          }
      });
    });
  
}); 

$(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";	
	getFPODetails( fpo_id );	
}); 

function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>staff/operation/getblockByFpo/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               response=response.trim();
               responseArray=$.parseJSON(response);
               var panchayat = responseArray.location_data[0]['panchayat'];
               getVillageList(panchayat);
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
}

function getVillageList( panchayat ) {
		$.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				
				var village = '';
			var col_count = 0;
			var td_count = 0;
			var village_data = '';			
			var totalCol = responseArray['villageInfo'].length;			
			$.each(responseArray.villageInfo,function(key, value){
				
				col_count++;
				td_count++;
				if(col_count == 1) {
					village_data += '<tr class="col-md-12">';
					village_data += '	<td><input type="checkbox" id="village_name" name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				}
				else {
					village_data += '	<td><input type="checkbox" id="village_name" name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
				}
				if(col_count % 6 ==0) {
					td_count = 0;
					village_data += '</tr>';									
				}
				else if(totalCol == col_count) {
					var diff = 6 - td_count;
						
					village_data += '	<td colspan="'+diff+'"></td>';
					village_data += '</tr>';
				}
				//village ='<tr class="row row-space"><td class="col-md-12 text-center"><button type="button" id="save_value" name="save_value" value="Find Villages">Find Villages</button></td></tr>'; 
            });
			 $("#villagelist").append(village_data);
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

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

</script>	 
</body>
</html>