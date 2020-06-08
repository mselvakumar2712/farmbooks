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
                        <h1>View Board Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/viewboardmeeting');?>">View Board Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_boardmeeting')?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" id="meeting_date" value="<?php echo $boardmeeting[0]->meeting_date; ?>" disabled name="meeting_date" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>

													 <div class="form-group col-md-6">
														<label for="">Members Attendance  <span class="text-danger">*</span></label>
														<div class="row">
														<div class="col-md-12">
														<?php 
														$director_ids = $boardmeeting;
														$arrDirectors = array();
														foreach($director_ids as $obj) {
															$arrDirectors[] = $obj->attendee_id;
														}
														
														foreach ( $director as $key => $director ) { 
																if(in_array($director->id, $arrDirectors)) {	
														?>														
															<input type="checkbox" class="checkbox ml-2" name="director[]" disabled id="director<?php echo $key;?>" checked value="<?php echo $director->id;?>" >
															<label for="director<?php echo $key;?>" class="ml-2"><?php echo $director->name;?></label>   
														<?php } else { ?>
															<input type="checkbox" class="checkbox ml-2" name="director[]" disabled id="director<?php echo $key;?>" value="<?php echo $director->id;?>" >
															<label for="director<?php echo $key;?>" class="ml-2"><?php echo $director->name;?></label>   
														<?php }} ?>
														<p class="help-block text-danger" id="validatecheck"></p>
														</div>
														
														</div>
														<div class="help-block with-errors text-danger"></div>
														</div>
													  <div class="form-group col-md-3">
														  <label for="">Chairman of the Meeting  <span class="text-danger">*</span></label>
														  <select class="form-control" id="chairman" name="chairman" disabled required data-validation-required-message="Select chairman of the meeting">
															
															<option value="<?php echo $boardmeeting[0]->chairman_id;?>"><?php echo $boardmeeting[0]->name; ?></option>
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>
												</div>
												<div class="row row-space  mt-4">
													  <div class="form-group col-md-4">
														<label for="">Quorum for the Meeting <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" readonly maxlength="2" value="<?php echo $boardmeeting[0]->quorum; ?>" id="quorum" name="quorum" placeholder="Quorum for the Meeting" required="required" data-validation-required-message="Please enter quorum for the meeting.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														  <label class=" form-control-label">Quorum Available </label>
														  <div class="row">
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum1" class="form-check-label">
																  <input type="radio" id="quorum1" disabled name="quorum_available" <?php echo ($boardmeeting[0]->quorum_available ==1) ?  "checked" : "" ;  ?> value="1" class="form-check-input"><span class="ml-1">Yes</span>
																</label>
															  </div> 
															</div>
															<div class="col-md-6">
															  <div class="form-check-inline form-check">
																<label for="quorum2" class="form-check-label">
																  <input type="radio" id="quorum2" disabled name="quorum_available" value="2"  <?php echo ($boardmeeting[0]->quorum_available ==2) ?  "checked" : "" ;  ?>  class="form-check-input"><span class="ml-1">No</span>
																</label>
																</div>
															</div>			
														  </div>
													  </div>
													  <div class="form-group col-md-4">
														  <label for="">Date of Adjournment Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" disabled id="adjourment_date" name="adjourment_date" value="<?php echo $boardmeeting[0]->adjurnment_date; ?>" required="required" data-validation-required-message="Please select date of adjourment meeting.">
													  </div>
												</div>
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" readonly id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."><?php echo $boardmeeting[0]->mom; ?></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4" id="filedIV">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" readonly id="upload_meeting" name="upload_meeting" required="required" data-validation-required-message="Please upload.">
													</div>	
													<div class="row">
													<div class="col-md-4" id="elementid">
													<?php if($boardmeeting[0]->mom_file !='')
													{
													 ?>
														<?php  if($boardmeeting[0]->mom_file=='pdf'){?>
														<div class="col-lg-12 text-center">
														  <object data="<?php echo asset_url();?>uploads/meeting/<?php echo $boardmeeting[0]->mom_file;?>" type="application/pdf" width="100%" height="50%">                        
														  </object>                 
														</div>
														<?php } else{?>
														<div class="col-lg-12 text-center"> 
														  <p><img class="img-fluid" src="<?php echo asset_url().'uploads/meeting/'.$boardmeeting[0]->mom_file; ?>"></p>      
														</div>
														<?php }?>
													 <?php }?>
														</div>
														</div>
													<!--<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" readonly id="upload_img" name="upload_img" required="required" data-validation-required-message="Please upload.">
														 <p class="help-block text-danger"></p>												
													</div>-->													
												</div>
												<div class="row row-space  mt-4" >
												<div class="col-md-12"	id="div1">
													<table id="example" class="table table-striped table-bordered">
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
												<!--<div class="row row-space  mt-4">													
													<div class="form-group col-md-4">
														<label for="">Member Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="member_attend" name="member_attend"  placeholder="Member Name" required="required" data-validation-required-message="Please member attendance.">
													</div>
													<div class="form-group col-md-4">
														<label for="">Allowance Amount</label>
														<input type="text" class="form-control" readonly id="director_allowance" maxlength="5" name="director_allowance"  placeholder="Allowance Amount">
													</div>
													<div class="form-group col-md-4">
														  <label for="">Allowance Paid <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly" readonly maxlength="5" id="allowance_fees" name="allowance_fees" required="required" data-validation-required-message="Please enter allowance.">
														 <p class="help-block text-danger"></p>
													</div>													
												</div>-->	
												<div class="col-md-12 text-center">
													<a href="<?php echo base_url('fpo/operation/editboardmeeting/'.$boardmeeting[0]->meeting_id);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
													<a href="<?php echo base_url('fpo/operation/boardmeetinglist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
//white spaces 
$("#sendMessageButton").click(function() {
	var count_checked = $("[name='director[]']:checked").length; // count the checked rows
	//var count_checked1 = $("[name='form[]']:checked").length;
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
	/* if(count_checked1 == 0) 
	{
		$("#validatecheck1").html("Please check any one of the checkbox");
		return false;
	} */
	
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

$("input[name=quorum_available]").click(function(e) {  
	if($("input[name=quorum_available]:checked").val() == "2") {  
		 $("#adjourment_date").removeAttr("readonly");  
		 // do your removeClass  
	} else {  
		$("#adjourment_date").attr("readonly", "readonly");  
		// do your addClass  
	}  
}); 



var abc = 0;
var fileCount = 0;
$('body').on('change', '#upload_meeting', function (e){
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
          fileCount = fileCount - filesLength;
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
		console.log(count[i]['actual_sitting_fee'])
		//input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';
		 output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+ count[i]['id'] +' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control" value='+ count[i]['name'] +' readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees" readonly maxlength="5" value='+count[i]['actual_sitting_fee']+' name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" readonly id="sitting_fees" value='+count[i]['paid_sitting_fee']+' name="committee['+i+'][sitting_fees_paid]"  placeholder="Sitting Fees Paid" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly value='+count[i]['actual_allowance']+' id="director_allowance" maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" value='+count[i]['paid_allowance']+' maxlength="5" id="allowance_fees" name="committee['+i+'][allowance_fees_paid]" readonly required="required" data-validation-required-message="Please enter allowance." placeholder="Allowance Paid"><p class="help-block text-danger"></p></td></tr>';
	}
	$('#blocklist').append(output_list);
	initnumberOnly();
	
	   /* var selectedtext = ($(this).next().text());
		var selectedValue = $(this).val();
		//alert(selectedValue);
		var output_list = "";
		var sale_list = "";
        if($(this).is(':checked'))
        {   
		
            $("#chairman").append('<option value="' + selectedValue + '">' + selectedtext +'</option>');
			var checked_count=document.querySelectorAll('input[type="checkbox"]:checked').length;
			
				
			 output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+ selectedValue +' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control" value='+ selectedtext +' readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees" maxlength="5" name="committee['+i+'][sitting_fees]" placeholder="Director Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance" maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees" name="committee['+i+'][allowance_fees_paid]" required="required" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
		    
			
			$('#div1').append(output_list);
			initnumberOnly();
		    
			 
        }else{
            $('option[value*="' + selectedtext + '"]').remove();
        }
		
		
	i++;
	 */
		
}

function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>fpo/operation/getnoticedetail/"+fpo_id,
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
           url:"<?php echo base_url();?>fpo/operation/alldirector",
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
				document.getElementById("quorum").value=checked_values;
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
				
			 output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+ selectedValue +' readonly id="member_id" name="committee['+i+'][member_id]"   ><input type="text" class="form-control" value='+ selectedtext +' readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly id="sitting_fees" maxlength="5" name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly maxlength="5" id="sitting_fees" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees." placeholder="Sitting Fees Paid"><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance" readonly maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees" readonly name="committee['+i+'][allowance_fees_paid]" required="required" data-validation-required-message="Please enter allowance." placeholder="Allowance Paid"><p class="help-block text-danger"></p></td></tr>';
		     //sale_list += '<tr class="row row-space"><td class="form-group col-md-4"><input type="text" class="form-control" readonly value='+ selectedtext +' id="allwance_member_attend" name="member_attend[]"  placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td></tr>';
			//}
			
			$('#div1').append(output_list);
			initnumberOnly();
		    //$('#div2').append(sale_list);
			 
        }else{
            $('option[value*="' + selectedtext + '"]').remove();
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