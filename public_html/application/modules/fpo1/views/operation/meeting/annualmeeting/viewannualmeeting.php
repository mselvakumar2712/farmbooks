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
                        <h1>View Annual Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/viewannualmeeting');?>">View Annual Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_annualmeeting')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														  <label for="">Nature of Meeting  <span class="text-danger">*</span></label>
														  <select class="form-control" id="meeting_nature" readonly name="meeting_nature" required data-validation-required-message="Select nature of meeting">
															<option value="">Select Nature of Meeting</option>
															<option value="1" <?php echo (($annualmeeting[0]->meeting_type ==1)?"selected":"") ?>>Ordinary General Meeting</option>
															<option value="2" <?php echo (($annualmeeting[0]->meeting_type ==2)?"selected":"") ?>>Extraordinary General Meeting</option>
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Date of Notice to Shareholders <span class="text-danger">*</span></label>
															<input type="date" class="form-control" readonly id="notice_date" value="<?php echo $annualmeeting[0]->notice_date; ?>" value="<?php echo date("Y-m-d"); ?>" max="2050/01/01" name="notice_date" required="required" data-validation-required-message="Please enter notice date.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for=""> Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" readonly id="meeting_date"  value="<?php echo $annualmeeting[0]->meeting_date ?>"  max="2050/01/01" name="meeting_date" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>

													 										  
												</div>											
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Time <span class="text-danger">*</span></label>
																<input type="time" readonly class="form-control" id="time" name="time" required="required" value="<?php echo $annualmeeting[0]->meeting_time ?>"  data-validation-required-message="Please enter time.">
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4">
														<label for="">Place of Meeting </label>
															<input type="text" class="form-control" readonly id="place" name="place" maxlength="20" value="<?php echo $annualmeeting[0]->place ?>" placeholder="Place of Meeting" required="required" data-validation-required-message="Please place.">
													</div>	
													 <div class="form-group col-md-4">
														<label for="">Quorum for the Meeting <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" readonly maxlength="2" id="quorum" name="quorum"  value="<?php echo $annualmeeting[0]->quorum ?>" placeholder="Quorum for the Meeting" required="required" data-validation-required-message="Please enter quorum for the meeting.">
														<p class="help-block text-danger"></p>
													  </div>													
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														<label for="">No. of Members Present  <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" readonly maxlength="4" id="number_present" value="<?php echo $annualmeeting[0]->attendee_count ?>" name="number_present" placeholder="No. of members present" required="required" data-validation-required-message="Please enter no. of members.">
														<p class="help-block text-danger"></p>
													  </div>
													<div class="form-group col-md-4">
														  <label class=" form-control-label">Quorum Available </label>
														  <div class="row">
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum1" class="form-check-label">
																  <input type="radio" id="quorum1" disabled name="quorum_available" value="1" <?php echo ($annualmeeting[0]->quorum_available == 1) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum2" class="form-check-label">
																  <input type="radio" id="quorum2" disabled name="quorum_available" value="2"  <?php echo ($annualmeeting[0]->quorum_available == 2) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">No</span>
																</label>
																</div>
															</div>			
														  </div>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Date of Adjournment Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" disabled id="adjourment_date" name="adjourment_date" value="<?php echo $annualmeeting[0]->adjurnment_date ?>" required="required" data-validation-required-message="Please select date of adjourment meeting.">
													  </div>										
												</div>	
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" readonly id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."><?php echo $annualmeeting[0]->mom ?></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														
													<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" id="upload_img" readonly name="upload_img" required="required" data-validation-required-message="Please upload.">
													</div>	
													<div class="row">
													<div class="col-md-4" id="elementid">
													<?php if($annualmeeting[0]->mom_file !='')
													{
													 ?>
														<?php  if($annualmeeting[0]->mom_file=='pdf'){?>
														<div class="col-lg-12 text-center">
														  <object data="<?php echo asset_url();?>uploads/annualmeeting/<?php echo $annualmeeting[0]->mom_file;?>" type="application/pdf" width="100%" height="50%">                        
														  </object>                 
														</div>
														<?php } else{?>
														<div class="col-lg-12 text-center"> 
														  <p><img class="img-fluid" src="<?php echo asset_url().'uploads/annualmeeting/'.$annualmeeting[0]->mom_file; ?>"></p>      
														</div>
														<?php }?>
													 <?php }?>
														</div>
														</div>													
												</div>	
												<div class="col-md-12 text-center">
													<a href="<?php echo base_url('fpo/operation/editannualmeeting/'.$annualmeeting[0]->id);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
													<a href="<?php echo base_url('fpo/operation/annualmeetinglist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
$("input[name=quorum_available]").click(function(e) {  
	if($("input[name=quorum_available]:checked").val() == "2") {  
		 $("#adjourment_date").removeAttr("disabled");  
		 // do your removeClass  
	} else {  
		$("#adjourment_date").attr("disabled", "disbled");  
		// do your addClass  
	}  
}); 
//white spaces 
$(function() {
     $('.form-control').on('keypress', function(e) {
         if (e.which == 32){
       var newStr = $(this).val().length;
      if(newStr){
         return true;
      }
        return false;
     }else{
       return true;
     }
            
     });
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
     $('#notice_date').attr('max', maxDate);
			
}); 

$("input[name=quorum_available]").click(function(e) {  
	if($("input[name=quorum_available]:checked").val() == "2") {  
		 $("#adjourment_date").removeAttr("disabled");  
		 // do your removeClass  
	} else {  
		$("#adjourment_date").attr("disabled", "disbled");  
		// do your addClass  
	}  
});  

var abc = 0;
$('body').on('change', '#upload_img', function (e){
	  fileCount = this.files.length;
	  var oFile = document.getElementById("upload_img").files[0];
	  var FileSize = oFile.size / 1024; // in MB
		 if (FileSize > 5120) {
			swal('',"File size exceeds 5 MB");
			$("#upload_img").val(''); 
		} else {
		$(this).before($("<div/>",{id: 'filediv'}).fadeIn('slow').append($("<input/>",
		{
			name: 'upload_img',
			type: 'file',
			id: 'upload_img',
			class:'form-control'
		}),
		$("<br/><br/>")
	));
	
	var file = e.target.files[0];
	var filename = file.name;
	var filetype = file.type;
	var filesize = file.size;
	var data = {
	  "filename":filename,
	  "filetype":filetype,
	  "filesize":filesize,
	  };

	if (this.files && this.files[0]){					
		if(filetype=='image/jpeg' || filetype=='image/jpg' ||filetype=='image/png' || filetype=='pdf'){
			abc += 1; //increementing global variable by 1
			var z = abc - 1;
			var x = $(this).parent().find('#previewimg' + z).remove();
			$(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "'  height='200' width='200' src=''/><p></p></div>");
			var reader = new FileReader();
			reader.onload = imageIsLoaded;
			reader.readAsDataURL(this.files[0]);
			$(this).hide();
			$("#abcd" + abc).append($("<button/>",{
				class:'btn-primary mt-3',
				text:'Delete',
				href:'assets/img/pdf_icon.png'
			}) .click(function (){
				$(this)
				.parent()
				.remove();
			}));
	   }else if(filetype=='application/pdf'){					
		abc += 1; //increementing global variable by 1
		var z = abc - 1;
		var x = $(this).parent().find('#previewimg' + z).remove();
		$(this).before("<div id='abcd" + abc + "' class='abcd'><p></p></div>");

		var reader = new FileReader();
		reader.onload = imageIsLoaded;
		reader.readAsDataURL(this.files[0]);
		$(this).hide();
		
		$("#abcd" + abc).append($("<a/>",{
				"href": "data:" + data.filetype + ";base64," + data.file_base64,
				"download": data.filename,
				"target": "_blank",
				"text": data.filename,                
				"id":"closedata",
		}) .click(function (){
			$(this);
		}));
		$("#abcd" + abc).append($("<button/>",{
			class:'btn-primary',
			text:'Delete'
			
		}) .click(function (){
			$(this)
			.parent()
			.remove();
		}));
	}
	}

	} 
	
});
function imageIsLoaded(e){
	$('#previewimg' + abc)
	.attr('src', e.target.result);
}
</script>	 
</body>
</html>