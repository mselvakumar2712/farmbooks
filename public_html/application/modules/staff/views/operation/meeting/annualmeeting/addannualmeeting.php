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
                        <h1>Add Annual Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/addannualmeeting');?>">Add Annual Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_annualmeeting')?>"  method="post" enctype="multipart/form-data"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														  <label for="">Nature of Meeting  <span class="text-danger">*</span></label>
														  <select class="form-control" id="meeting_nature" name="meeting_nature" required data-validation-required-message="Select nature of meeting">
															<option value="">Select Nature of Meeting</option>
															<option value="1">Ordinary General Meeting</option>
															<option value="2">Extraordinary General Meeting</option>
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Date of Notice to Shareholders <span class="text-danger">*</span></label>
															<input type="date" class="form-control"  id="notice_date"  value="<?php echo date("Y-m-d"); ?>" max="2050/01/01" name="notice_date" required="required" data-validation-required-message="Please enter notice date.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label for=""> Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" id="meeting_date"  value="<?php echo date("Y-m-d",strtotime("+14 days")); ?>" max="2050/01/01" name="meeting_date" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>

													 										  
												</div>											
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Time <span class="text-danger">*</span></label>
																<input type="time" class="form-control" id="time" name="time" required="required" data-validation-required-message="Please enter time.">
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4">
														<label for="">Place of Meeting </label>
															<input type="text" class="form-control" id="place" name="place" maxlength="20" placeholder="Place of Meeting" >
													</div>	
													 <div class="form-group col-md-4">
														<label for="">Quorum for the Meeting <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" maxlength="2" id="quorum" name="quorum" placeholder="Quorum for the Meeting" required="required" data-validation-required-message="Please enter quorum for the meeting.">
														<p class="help-block text-danger"></p>
													  </div>													
												</div>
												<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														<label for="">No. of Members Present  <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" maxlength="4" id="number_present" name="number_present" placeholder="No. of members present" required="required" data-validation-required-message="Please enter no. of members.">
														<p class="help-block text-danger"></p>
													  </div>
													<div class="form-group col-md-4">
														  <label class=" form-control-label">Quorum Available </label>
														  <div class="row">
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum1" class="form-check-label">
																  <input type="radio" id="quorum1" name="quorum_available" value="1" class="form-check-input"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum2" class="form-check-label">
																  <input type="radio" id="quorum2" name="quorum_available" value="2" checked class="form-check-input"><span class="ml-1">No</span>
																</label>
																</div>
															</div>			
														  </div>
													  </div>
													  <div class="form-group col-md-4" id="dam1">
														  <label for="">Date of Adjournment Meeting </label>
															<input type="date" class="form-control" readonly  id="adjourment_date1" name="adjourment_date">
													  </div>
													<div class="form-group col-md-4" id="dam2">
														  <label for="">Date of Adjournment Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control"   id="adjourment_date2" name="adjourment_date"  required="required" data-validation-required-message="Please select date of adjourment meeting.">
													  </div>													  
												</div>	
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														
													<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" id="upload_meeting" name="upload_meeting[]">
													</div>													
												</div>	
												<div class="row row-space">
												  <div class="form-group col-md-12 text-center">
												  <div id="success"></div>
													<button id="sendMessageButton"  class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Add Meeting</button>
													<a href="<?php echo base_url('staff/operation/annualmeetinglist');?>" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
$('#adjourment_date1').focusout(function () {
   var date_meeting=document.getElementById("meeting_date").value;  
   var adjourment_date= document.getElementById("adjourment_date1").value;
   if( new Date(date_meeting).getTime() >  new Date(adjourment_date).getTime())	{
      $('#adjourment_date1').val('');
     swal("",'Date of meeting is not greater than date of adjournment meeting');
		return false;
   }
 });
 $('#adjourment_date2').focusout(function () {
   var date_meeting=document.getElementById("meeting_date").value;  
   var adjourment_date= document.getElementById("adjourment_date2").value;
   if( new Date(date_meeting).getTime() >  new Date(adjourment_date).getTime())	{
      $('#adjourment_date2').val('');
      swal("",'Date of meeting is not greater than date of adjournment meeting');
		return false;
   }
 });
$(document).ready(function(){
	getsharehoderscount();
});
function getsharehoderscount()
{
	 $.ajax({
		  url:"<?php echo base_url();?>staff/operation/getsharecount",
		  type:"GET",
           data:"",
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
		  console.log(response);
		  response=response.trim();
               responseArray=$.parseJSON(response);
			   var membercount=responseArray['share_data'];
			   //alert(membercount);
			    var share_value=parseInt(membercount/4);
				//alert(share_value);
				document.getElementById("quorum").value=share_value;
				var presentvalue=document.getElementById("number_present").value;
				if(presentvalue >= share_value)
				{
					$("input[name=quorum_available][value='1']").prop("checked",true);
				}
				else{
					 $("input[name=quorum_available][value='2']").prop("checked",true);
				 $("#quorum_2").attr('checked', 'checked');
				}
              //response=response.trim();                
              //responseArray=$.parseJSON(response);
			  //console.log(responseArray);
			//var totalCol = responseArray['commitee_list'].length;
			//$.each(responseArray.commitee_list,function(key, value){
			
			},
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	  
    
	 });
}

$('#dam2').hide();
$("input[name=quorum_available]").click(function(e) {  
	if($("input[name=quorum_available]:checked").val() == "2") {  
		 $("#adjourment_date2").removeAttr("readonly");
		$('#dam2').show();	
		 $('#dam1').hide();		 
		 // do your removeClass  
	} else {  
		$("#adjourment_date1").attr("readonly", "readonly"); 
		$('#dam2').hide();	
		 $('#dam1').show();			
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
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#notice_date').attr('min', minDate);
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
var fileCount = 0;
$('body').on('change', '#upload_meeting', function (e){
   console.log(e.target.files);
     var files = e.target.files,
         filesLength = files.length;
         fileCount = fileCount + filesLength;
	  var oFile = document.getElementById("upload_meeting").files[0];
	  var FileSize = oFile.size / 1024; // in MB
    
      if(fileCount > 1){
               fileCount = fileCount - filesLength;
               $("#upload_meeting").val('');
               swal('Sorry', "Maximum 1 images or pdf allowed to upload");		
               return false;
         }
		 if (FileSize > 5120) {
			swal('',"File size exceeds 5 MB");
			$("#upload_meeting").val(''); 
		} else {
		/* $(this).before($("<div/>",{id: 'filediv1'}).fadeIn('slow').append($("<input/>",
		{
			name: 'upload_meeting[]',
			type: 'file',
			id: 'upload_meeting',
			class:'form-control'
		}),
		$("<br/><br/>")
	)); */
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
       if(filetype != "" && filetype=='image/jpeg' || filetype=='application/pdf'){
         $(this).before($("<div/>",{id: 'filediv1'}).fadeIn('slow').append($("<input/>",
            {
               name: 'upload_meeting[]',
               type: 'file',
               id: 'upload_meeting',
               class:'form-control'
            }),
            $("<br/><br/>")
         ));
      }
      
		if(filetype=='image/jpeg' ||  filetype=='pdf'){
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
				$(this).parent().remove();
            fileCount = fileCount - filesLength;
            e.target.files[0]="";
            console.log(this.files);
            $("#upload_meeting").val('');
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
			
		}).click(function (){
			$(this).parent().remove();
         fileCount = fileCount - filesLength;
         $("#upload_meeting").val('');
		}));
	}else{
         fileCount = fileCount - filesLength;
         $("#upload_meeting").val('');
         swal('',"Only jpeg image or pdf file allowed to upload");
         filetype="";
         return false;
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