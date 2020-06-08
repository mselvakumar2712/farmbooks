<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($boardmeeting);
//echo $meeting_attendence[0]->meeting_date;
//echo count($meeting_attendence);

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
                        <h1>Edit Board Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/editboardmeeting');?>">Edit Board Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_updateboardmeeting/'.$boardmeeting[0]->meeting_id);?>"  method="post" enctype="multipart/form-data" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control"  min="<?php echo $appoint_date;?>"  value="<?php echo $boardmeeting[0]->meeting_date; ?>" id="meeting_date" name="meeting_date" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>

													<div class="form-group col-md-6" id="all">
														<label for="">Members Attendance <span class="text-danger">*</span></label>
														<div class="row">
														<div class="col-md-12">
														<?php 														
														$director_ids = $boardmeeting;
														$arrDirectors = array();
														foreach($director_ids as $obj) {
															$arrDirectors[] = $obj->attendee_id;
														}
														//print_r($director_ids-);
														foreach ( $director as $key => $directors ) { 
																if(in_array($directors->id, $arrDirectors)) {	
														?>														
															<input type="checkbox" class="checkbox ml-2" name="director[]"   id="director<?php echo $key;?>" checked="checked" value="<?php echo $directors->id;?>" >
															<label for="director<?php echo $key;?>" class="ml-2"><?php echo $directors->name;?></label>   
														<?php } else { ?>
															<input type="checkbox" class="checkbox ml-2" name="director[]"  id="director<?php echo $key;?>" value="<?php echo $directors->id;?>" >
															<label for="director<?php echo $key;?>" class="ml-2"><?php echo $directors->name;?></label>   
														<?php }} ?>
														<p class="help-block text-danger" id="validatecheck"></p>
														</div>
														
														</div>
														</div>
													  <div class="form-group col-md-3">
														  <label for="">Chairman of the Meeting  <span class="text-danger">*</span></label>
														  <select class="form-control" id="chairman" name="chairman"  required data-validation-required-message="Select chairman of the meeting">
															<option value="<?php echo $boardmeeting[0]->chairman_id;?>"><?php echo $boardmeeting[0]->name; ?></option>
															
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="">Quorum for the Meeting <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" maxlength="2" id="quorum" value="<?php echo $boardmeeting[0]->quorum; ?>" name="quorum" placeholder="Quorum for the Meeting" required="required" data-validation-required-message="Please enter quorum for the meeting.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label class=" form-control-label">Quorum Available </label>
														  <div class="row">
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum1" class="form-check-label">
																  <input type="radio" id="quorum1" name="quorum_available" <?php echo ($boardmeeting[0]->quorum_available ==1) ?  "checked" : "" ;  ?> value="1" class="form-check-input"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum2" class="form-check-label">
																  <input type="radio" id="quorum2" name="quorum_available" value="2"   <?php echo ($boardmeeting[0]->quorum_available ==2) ?  "checked" : "" ;  ?> class="form-check-input"><span class="ml-1">No</span>
																</label>
																</div>
															</div>			
														  </div>
													  </div>
													  <div class="form-group col-md-4" id="dam1">
														  <label for="">Date of Adjournment Meeting </label>
															<input type="date" class="form-control"  <?php echo ($boardmeeting[0]->quorum_available ==1) ?  "readonly" : "" ;  ?>  id="adjourment_date1" name="adjourment_date" value="<?php echo $boardmeeting[0]->adjurnment_date; ?>" >
													  <p class="help-block text-danger" ></p>
                                         </div>
													   <div class="form-group col-md-4" id="dam2">
														  <label for="">Date of Adjournment Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" <?php echo ($boardmeeting[0]->quorum_available ==1) ?  "readonly" : "" ;  ?>   id="adjourment_date2" name="adjourment_date" value="<?php echo $boardmeeting[0]->adjurnment_date; ?>" required="required" data-validation-required-message="Please enter minutes of meeting.">
													 <p class="help-block text-danger" ></p>
                                        </div>
												</div>
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."><?php echo $boardmeeting[0]->mom; ?></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4" >
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" id="upload_meeting" name="upload_meeting[]" onclick="clearBox('elementid')" placeholder="Photo *">   
														
													</div>				
                                      <div class="row " >
													<div class="col-md-12" id="elementid">
													<?php if($boardmeeting[0]->mom_file !='')
													{
                                          $filetype=$boardmeeting[0]->mom_file;
													 ?>
                                        <?php if(!empty($boardmeeting[0]->mom_file)){
                                             $mom_file= explode(',',$boardmeeting[0]->mom_file);
                                             }else{
                                               $mom_file=0;
                                             }
                                           for($i=0;$i<count($mom_file);$i++){ 
                                           $filetype=explode (".",$mom_file[$i]);?>
                                            <div >
                                           <?php if($filetype[1] == 'pdf' ){?>
                                          
														 	<p><a href="<?php echo asset_url().'uploads/meeting/'.$mom_file[$i]; ?>" target="_blank">Download</a></p>
                                           <?php }else{?>
														  <p><img class="img-fluid" src="<?php echo asset_url().'uploads/meeting/'.$mom_file[$i]; ?>" width="30%"></p>      
                                           <?php }?>
                                          </div>
													 <?php }}?>
                                          
													
													
														</div>
														</div>
													<!--<div class="form-group col-md-4" id="filediv1">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" id="upload_img" name="upload_img" required="required" data-validation-required-message="Please upload.">
														 <p class="help-block text-danger"></p>												
													</div>-->													
												</div>
												<div class="row row-space  mt-4" >
												<div class="col-md-12"	id="div1">
													<table id="member_attendtbl" class="table table-striped table-bordered">
															<thead>
															<tr>
															<th width="20%">Member Name</th>
															<th width="20%">Sitting Fees</th>
															<th width="20%">Sitting Fees Paid</th>
															<th width="20%">Allowance Amount</th>
															<th width="20%">Allowance Paid</th>
															</tr>
															</thead>
															<tbody id="blocklist">
															</tbody>
															
														  </table>
												
													
													</div>												
													<!--<div class="form-group col-md-4">
														<label for="">Member Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="member_attend" name="member_attend"  placeholder="Member Name" required="required" data-validation-required-message="Please member attendance.">
													</div>
													<div class="form-group col-md-4">
														<label for="">Director Sitting Fees</label>
														<input type="text" class="form-control" id="sitting_fees" maxlength="5" name="sitting_fees"  placeholder="Director Sitting Fees">
													</div>
													<div class="form-group col-md-4">
														  <label for="">Sitting Fees Paid <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees" name="sitting_fees" required="required" data-validation-required-message="Please enter sitting fees.">
														 <p class="help-block text-danger"></p>
													</div>	 -->											
												</div>	
												<!-- <div class="row row-space  mt-4">													
													<div class="form-group col-md-4">
														<label for="">Member Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="member_attend" name="member_attend"  placeholder="Member Name" required="required" data-validation-required-message="Please member attendance.">
													</div>
													<div class="form-group col-md-4">
														<label for="">Allowance Amount</label>
														<input type="text" class="form-control" id="director_allowance" maxlength="5" name="director_allowance"  placeholder="Allowance Amount">
													</div>
													<div class="form-group col-md-4">
														  <label for="">Allowance Paid <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees" name="allowance_fees" required="required" data-validation-required-message="Please enter allowance.">
														 <p class="help-block text-danger"></p>
													</div>													
												</div> -->
												<div class="col-md-12 text-center">
													<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
													<a href="<?php echo base_url('staff/operation/boardmeetinglist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
$('#member_attendtbl').on('change', 'tbody tr input', function () {
        //alert($(this).attr('id'));
         var val = [];
         $(':checkbox:checked').each(function(i){
			var valueTemp={};
			var selectedtext = ($(this).next().text());
			var values = $(this).val();			
			//console.log(selectedtext);            
			valueTemp['values'] = values;
			valueTemp['selectedtext'] = selectedtext;
			val.push(valueTemp);
			valueTemp={}; 	
		  //console.log(val);
         });
         var memberid= val;
        
         for(var i=1;i <= memberid.length;i++)
         {
         var sitting_fees= parseInt($('#member_attendtbl').find('input[id="sitting_fees['+i+']"]').val()); 
			var sitting_fees_paid= parseInt($('#member_attendtbl').find('input[id="sitting_fees_paid['+i+']"]').val()); 
          
          if( sitting_fees_paid && sitting_fees != ""){
             if( sitting_fees_paid > sitting_fees){
              $('#member_attendtbl').find('input[id="sitting_fees_paid['+i+']"]').val('');
             $('#member_attendtbl').find('input[id="sitting_fees_paid['+i+']"]').focus();
              swal("","Sitting fees must be lesser or equal to sitting fees paid");
              return false;
            }
          }
          
         var director_allowance= parseInt($('#member_attendtbl').find('input[id="director_allowance['+i+']"]').val()); 
			var allowance_fees= parseInt($('#member_attendtbl').find('input[id="allowance_fees['+i+']"]').val()); 
   
          if( allowance_fees && director_allowance != ""){
             if( allowance_fees > director_allowance){
              $('#member_attendtbl').find('input[id="allowance_fees['+i+']"]').val('');
              $('#member_attendtbl').find('input[id="allowance_fees['+i+']"]').focus();
              swal("","Allowance amount must be lesser or equal to allowance paid");
              return false;
            }
          }
          
         }
		
	});
//white spaces 
$("#sendMessageButton").click(function() {
	var count_checked = $("[name='director[]']:checked").length; // count the checked rows
	//var count_checked1 = $("[name='form[]']:checked").length;
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
	var validate = true;
		$('#div1').find('input[type=text]').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Provide all the data");
			return false;
		}	
	
	}); 

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
      $('#meeting_date').attr('max', maxDate);
			
}); 
$('#dam2').hide();
$("input[name=quorum_available]").click(function(e) {  
	if($("input[name=quorum_available]:checked").val() == "2") {  
		 $("#adjourment_date2").removeAttr("readonly");  
		 // do your removeClass  
		  $('#dam2').show();	
		  $('#dam1').hide();		
	} else {  
		$("#adjourment_date1").attr("readonly", "readonly"); 
		$('#dam2').hide();	
		$('#dam1').show();		
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

$(document).on('click', '.remove', function() {
   fileCount--;
   var filename = $(this).attr('id');
   for(var i=0; i<storedFiles.length; i++) {
      if(storedFiles[i].name == filename) {
         storedFiles.splice(i, 1);
         break;
      }
   }
   $("#upload_meeting").val('');
   $(this).parent(".pip").remove();
});
function imageIsLoaded(e){
	$('#previewimg' + abc).attr('src', e.target.result);
}

$(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";
	getFPODetails( fpo_id );
	var count = <?php echo json_encode($boardmeeting); ?>;
	//console.log(count.length);
	 getselectedvalue(count);

});

function getselectedvalue(count)
{
	var output_list = "";
	//alert(count.length);
	for(var i=0;i<count.length;i++)
		{
			//console.log(count);
		console.log(count[i]['actual_sitting_fee'])
		//input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';
		 output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" value='+ count[i]['id'] +' name="member_id[]" id="fpo_attendence_id"><input type="hidden" class="form-control" value='+ count[i]['attendee_id'] +' readonly id="member_id" name="member_attendee_id[]"><input type="text" class="form-control" value='+ count[i]['name'] +' readonly id="director_member_attend" name="member_name[]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees['+i+']" name="member_sitting_fees[]" maxlength="5" value='+count[i]['actual_sitting_fee']+'  placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees_paid['+i+']" value='+count[i]['paid_sitting_fee']+' name="member_sitting_fees_paid[]" required="required"  placeholder="Sitting Fees Paid" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" value='+count[i]['actual_allowance']+' id="director_allowance['+i+']" maxlength="5" name="member_director_allowance[]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" value='+count[i]['paid_allowance']+' maxlength="5" id="allowance_fees['+i+']" name="member_allowance_fees_paid[]" placeholder="Allowance Paid" required="required" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
	}
	$('#blocklist').append(output_list);
	initnumberOnly(); 
		
}
/* function addMember(obj) {
	
	var id = obj.value;
	alert(id);
	var label = $(obj).parent().find('label').html();
	//alert(label);
	var selectedtext = obj.text;
	//alert(selectedtext);
	console.log(selectedtext);
	if(obj.checked) {
		var str = '<tr id="member'+id+'" class="col-md-12"><td width="20.5%"><input type="hidden" value='+id+' name="member_id[]"><input type="text" class="form-control"  value='+label+' readonly id="director_member_attend" name="member_attendee_id[]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees" maxlength="5" name="member_sitting_fees[]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees"  placeholder="Sitting Fees Paid" name="member_sitting_fees_paid[]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance" maxlength="5" name="member_director_allowance[]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees" name="member_allowance_fees_paid[]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
		$('#blocklist').append(str);
	}
	else {
		$('#member'+id).remove();
	}
} */
function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>staff/operation/getnoticedetail/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
			   console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
				if(responseArray.status == 1 && responseArray.notice_data.length != 0){
					$('#meeting_date').val(responseArray.notice_data[0]['meeting_date']);
				}
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
}

function gettotaldirectordetail() {
    $.ajax({
           url:"<?php echo base_url();?>staff/operation/alldirector",
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
			   //console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
			   var directorcount=responseArray['director_data'].length;
			   var director_value=(directorcount/3);
			   //console.log(director_value);
			   var checked_values=document.querySelectorAll('input[type="checkbox"]:checked').length;
			  // console.log(checked_values);
			   if(checked_values >= director_value)
			   {
				document.getElementById("quorum").value=Math.round(director_value,1);
				//$("#quorum_1").attr('checked', 'checked');
				$("input[name=quorum_available][value='1']").prop("checked",true);
			   }
			   else
			   {
				   document.getElementById("quorum").value='';
				   $("input[name=quorum_available][value='2']").prop("checked",true);
				 // $("#quorum_2").attr('checked', 'checked');
				 // swal('',"Please Select Minimum One third of the Director");
			   }
			  
			  //console.log(responseArray['director_data'].length);
			   //console.log(responseArray.notice_data[0]['meeting_date']);
               //$('#meeting_date').val(responseArray.notice_data[0]['meeting_date']);
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
}

 var i = 0;
 $("input[type=checkbox]").change(function(e) {
	 
	   /* $('.checkbox :checked').each(function () {
		   alert("hi");
        checkedVals.push($(this).val());
    }); */
        var selectedtext = ($(this).next().text());
		var selectedValue = $(this).val();
		//alert(selectedValue);
		var output_list = "";
		var sale_list = "";
        if($(this).is(':checked'))
        {   
		/* $(selectedtext).each(function(index,value) {
        if ($.inArray(value, allVals) == -1) {
            confirmedOtherEmails.push(value);
        }
       });	 */
            $("#chairman").append('<option value="' + selectedValue + '">' + selectedtext +'</option>');
			var checked_count=document.querySelectorAll('input[type="checkbox"]:checked').length;
			//var split=checked_count.split(",");
			//alert(split);
		/* for(var i=0;i< checked_count.length;i++)
			{ */
				//alert("hi");
				
			 output_list += '<tr class="col-md-12" id="'+selectedValue+'"><td width="20.5%"><input type="hidden" class="form-control"  readonly id="member_id" name="member_id[]"><input type="hidden" class="form-control" value='+ selectedValue +' readonly id="member_id" name="member_attendee_id[]"   ><input type="text" class="form-control" value='+ selectedtext +' readonly id="director_member_attend" name="member_name[]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees['+i+']" maxlength="5" name="member_sitting_fees[]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees_paid['+i+']" name="member_sitting_fees_paid[]" required="required" placeholder="Sitting Fees Paid" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance['+i+']" maxlength="5" name="member_director_allowance[]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees['+i+']" name="member_allowance_fees_paid[]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
		     //sale_list += '<tr class="row row-space"><td class="form-group col-md-4"><input type="text" class="form-control" readonly value='+ selectedtext +' id="allwance_member_attend" name="member_attend[]"  placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td></tr>';
			//}
			
			$('#blocklist').append(output_list);
			initnumberOnly();
		    //$('#div2').append(sale_list);
			 
        }else{
			$('[id="'+selectedValue + '"]').remove();
            //$('option[value*="' + selectedtext + '"]').remove();
			$('#chairman option[value="' + selectedValue + '"]').remove();
        }
		
		
	i++;	
//alert(document.querySelectorAll('input[type="checkbox"]:checked').length);
    }); 

function clearBox(elementid)
{
    document.getElementById(elementid).innerHTML = "";
}

</script>	 
</body>
</html>