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
                        <h1>Add Committee Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/addcommitteemeeting');?>">Add Committee Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_committeemeeting')?>"  method="post" enctype="multipart/form-data" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" id="meeting_date" value="<?php echo date("Y-m-d"); ?>" name="meeting_date" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-3">
														  <label for="">Select the Committee <span class="text-danger">*</span></label>
														  <select class="form-control" id="committee_id" name="committee_id" required data-validation-required-message="Select committee">
															 <option value="0">Select the Committee</option>
																<?php for($i=0; $i<count($commitee_director);$i++) { ?>	
																<option value="<?php echo $commitee_director[$i]->id; ?>"><?php echo $commitee_director[$i]->commitee_name; ?></option>
																<?php } ?>
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>

													  <div class="form-group col-md-6">
														<label for="">Members Attendance  <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">
															<tbody id="blocklist">																													
															</tbody>															
														  </table>
														<div class="col-md-12 text-center" id="blockbutton">
													  </div>
														<p class="help-block text-danger" id="validatecheck"></p>
														</div>													  
												</div>											
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4" id="filediv">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<!--<input type="file" class="form-control" id="upload_meeting" name="upload_meeting[]"  data-validation-required-message="Please upload.">-->
															<input type="file" class="form-control"  id="upload_meeting"   name="upload_meeting[]" placeholder="Photo *">
													</div>	
													<!--<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" id="upload_img" name="upload_img" required="required" data-validation-required-message="Please upload.">
														 <p class="help-block text-danger"></p>												
													</div>-->													
												</div>
												<div class="row row-space  mt-4">
													<div class="col-md-12"	id="div1">
													<table id="member_attendtbl" class="table table-striped table-bordered">
															<thead>
															<tr>
															<th width="20%">Members Attendance</th>
															<th width="20%">Sitting Fees</th>
															<th width="20%">Sitting Fees Paid</th>
															<th width="20%">Allowance Amount</th>
															<th width="20%">Allowance Paid</th>
															</tr>
															</thead>
															<tbody id="outputlist">
															</tbody>
														  </table>
												
													
													</div>										
												</div>	
												 <!--<div class="row row-space  mt-4">
													<div class="form-group col-md-4">
														  <label for="">Allowance paid to Director <span class="text-danger">*</span></label>
															<input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees" name="allowance_fees" required="required" data-validation-required-message="Please enter allowance.">
														 <p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Members Attendance <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="member_attend" name="member_attend"  placeholder="Member Attendance" required="required" data-validation-required-message="Please member attendance.">
													</div>
													<div class="form-group col-md-4">
														<label for="">Allowance to Directors</label>
														<input type="text" class="form-control" id="director_allowance" maxlength="5" name="director_allowance"  placeholder="Allowance to Directors">
													</div>										
												</div>	 -->
												<div class="row row-space">
												  <div class="form-group col-md-12 text-center">
												  <div id="success"></div>
													<button id="sendMessageButton"  class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Add Meeting</button>
													<a href="<?php echo base_url('fpo/operation/committeemeetinglist');?>" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
<script src="<?php echo asset_url()?>js/sweetalert2.js"></script>
<script>
//white spaces 
$("#sendMessageButton").click(function() {
	var count_checked = $("[name='director_id[]']:checked").length; // count the checked rows
	//var count_checked1 = $("[name='form[]']:checked").length;
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
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
function validate(){
var size=5120;
var file_size=document.getElementById('upload').files[0].size;
if(file_size>=size){
    alert('File too large');
    return false;
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
      $('#meeting_date').attr('max', maxDate);
			
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
	$('#previewimg' + abc)
	.attr('src', e.target.result);
}

$('#committee_id').change(function(){
    var committee = $("#committee_id").val();
    getcommiteemember( committee );
});
 function getcommiteemember( committee ) {
	 $('#blocklist').empty();
     $('#output_list').empty();
    //$("#branch_name option").remove();
    if(committee != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>fpo/operation/getcommiteememberdetail/"+committee,
		  type:"GET",
           data:"",
		  dataType:"html",
		  cache:false,			
		  success:function(response) {
		  console.log(response);
              response=response.trim();                
              responseArray=$.parseJSON(response);
			  console.log(responseArray);
			  
			  var commitee = '';
				//var i=0;
			console.log(response['commitee_list']);
			var col_count = 0;
			var td_count = 0;
			var commitee_data = '';
			var totalCol = responseArray['commitee_list'].length;
			console.log(responseArray.commitee_list);
			$.each(responseArray.commitee_list,function(key, value){
				col_count++;
				td_count++;
				if(col_count == 1) {
					commitee_data += '<tr class="col-md-12">';
					commitee_data += '<td><input type="checkbox" class="checkbox" onclick="addMember(this)" id="commitee_name" name="director_id[]" required data-validation-required-message="Please select block." value="'+value.id+'"><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></td>';
				}
				else {
					commitee_data += '<td><input type="checkbox" class="checkbox" onclick="addMember(this)" id="commitee_name" name="director_id[]" required data-validation-required-message="Please select block." value="'+value.id+'"><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></td>';
				}
				if(col_count % 6 ==0) {
					td_count = 0;
					commitee_data += '</tr>';
					
				}
				else if(totalCol == col_count) {
					var diff = 6 - td_count;
						
					commitee_data += '	<td colspan="'+diff+'"></td>';
					commitee_data += '</tr>';
				}
				commitee ='<div class="row row-space"><div class="col-md-12 text-center"><button type="button" class="btn btn-success btn-fs" id="save_value" name="save_value" value="Find Members">Find Members</button></div></div>'; 
            });
			 $("#blocklist").append(commitee_data);
			 //$('#blockbutton').html(commitee);
			 
			commitee_data += '</div>';
			},
		  error:function(response){
			alert('Error!!! Try again');
		  }  			
	  
    })
	}	else {
        swal("Sorry!", "Select Director");
    } 
}    
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

function getmemberdetail(member_id){
//console.log(member_id[0].values);
//console.log(member_id.length);
	//console.log(str);
  // var array = str.split();
    //alert(array);
		var output_list = "";
		for(var i=0;i<member_id.length;i++)
		{		
//console.log(member_id[0].length)	
			output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+member_id[i].values+' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control"  readonly id="director_member_attend" value='+member_id[i].selectedtext+' name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees['+i+']" maxlength="5" name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees_paid['+i+']" placeholder="Sitting Fees Paid" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance['+i+']" maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees['+i+']" name="committee['+i+'][allowance_fees_paid]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
			$('#outputlist').html(output_list);
			initnumberOnly() ;
		    //$('#div2').append(sale_list);
			 
        }
		
		
}	

$(function(){
	 $("#directorform").on('click', '#save_value', function () {
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
		getmemberdetail(val);
      });
});

var i=0;
function addMember(obj) {
	var id = obj.value;
	var label = $(obj).parent().find('label').html();
	if(obj.checked) {
		var str = "";
		$.ajax({
           url:"<?php echo base_url();?>fpo/operation/getconstitutiondetail/"+id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
			   console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               var output_list = "";
               if(responseArray =="")
               {
               $.each(responseArray.constitution_data,function(key,value){
                     
							output_list += '<tr class="col-md-12" id="'+id +'"><td width="20.5%"><input type="hidden" class="form-control" value='+ id  +' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control" value="'+ label +'" readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees['+i+']" maxlength="5" name="committee['+i+'][sitting_fees]" value="'+value.director_sitting_fee+'" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees_paid['+i+']" placeholder="Sitting Fees Paid" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance['+i+']" maxlength="5" value="'+value.director_allowance+'" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees['+i+']" name="committee['+i+'][allowance_fees_paid]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
							
                     });
               }
               else{
                  output_list += '<tr class="col-md-12" id="'+id +'"><td width="20.5%"><input type="hidden" class="form-control" value='+ id  +' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control" value="'+ label +'" readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees['+i+']" maxlength="5" name="committee['+i+'][sitting_fees]"  placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees_paid['+i+']" placeholder="Sitting Fees Paid" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="director_allowance['+i+']" maxlength="5"  name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" id="allowance_fees['+i+']" name="committee['+i+'][allowance_fees_paid]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
               }
                $('#outputlist').append(output_list);
			   //console.log(responseArray.notice_data[0]['meeting_date']);
               //$('#meeting_date').val(responseArray.notice_data[0]['meeting_date']);
           },
          
           error:function(response){
               alert('Error!!! Try again');
           } 			
       });
		//$('#outputlist').append(str);
	}
	
		else{
			
				$('[id="'+id + '"]').remove();
            //$('option[value*="' + selectedtext + '"]').remove();
			//$('#chairman option[value="' + selectedValue + '"]').remove();
        }
        i++;
	
}
</script>	 
</body>
</html>