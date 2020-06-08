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
                        <h1>View Committee Meeting</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/viewcommitteemeeting');?>">View Committee Meeting</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/post_committeemeeting')?>" method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Meeting <span class="text-danger">*</span></label>
															<input type="date" class="form-control" readonly id="meeting_date" name="meeting_date" value="<?php echo $commiteemeeting[0]->meeting_date; ?>" required="required" data-validation-required-message="Please enter meeting date.">
															<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-3">
														  <label for="">Select the Committee  <span class="text-danger">*</span></label>
														  <select class="form-control" id="committee" readonly name="committee" required data-validation-required-message="Select committee">
															<?php foreach($commitee_director as $commitee_director){
																if($commitee_director->id == $commiteemeeting[0]->committee_id)
																   echo "<option value='".$commitee_director->id."' selected='selected'>".$commitee_director->commitee_name."</option>";
																else
																   echo "<option value='".$commitee_director->id."'>".$commitee_director->commitee_name."</option>";
															 }
															 ?>
														 </select>
														 <p class="help-block text-danger"></p>
													  </div>

													  <div class="form-group col-md-6">
														<label for="">Members Attendance  <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">
															<tbody id="blocklist">																													
															</tbody>															
														  </table>
														
													<!-- <div class="form-group col-md-3">
														  <label for="inputAddress2">Chair Man</label>
														  <input type="checkbox" id="member_attend"  name="member_attend" value="1" class="ml-2" >                        
														</div>
														<div class="form-group col-md-3">
														  <label for="inputAddress2">Chair Man</label>
														  <input type="checkbox" id="member_attend"  name="member_attend" value="1" class="ml-2" >                        
														</div> 
														<div class="form-group col-md-3">
														 <label for="inputAddress2">Chair Man</label>
														   <input type="checkbox" id="member_attend"  name="member_attend" value="1" class="ml-2" >                        
															</div> 
														<div class="form-group col-md-3">
														 <label for="inputAddress2">Chair Man</label>
														   <input type="checkbox" id="member_attend"  name="member_attend" value="1" class="ml-2" >                        
															</div> -->
														
														<div class="col-md-12 text-center" id="blockbutton">
													  </div>
														<div class="help-block with-errors text-danger"></div>
														</div>														  
												</div>											
												<div class="row row-space  mt-4">
														<div class="form-group col-md-4">
															  <label for="">Minutes of the Meeting <span class="text-danger">*</span></label>
																<textarea type="text" class="form-control" readonly id="meeting_minutes" maxlength="5000" name="meeting_minutes" required="required" data-validation-required-message="Please enter minutes of meeting."><?php echo $commiteemeeting[0]->mom; ?></textarea>
															 <p class="help-block text-danger"></p>
														</div>
														<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" disabled id="upload_meeting" name="upload_meeting" accept="image/jpeg,image/pdf" required="required" data-validation-required-message="Please upload.">
													</div>
													<div class="row ">
													<div class="col-md-12">
													<?php if($commiteemeeting[0]->mom_file !='')
													{
													 ?>
														<?php  if($commiteemeeting[0]->mom_file=='pdf'){?>
														<div class="col-md-12 text-center">
														  <object data="<?php echo asset_url();?>uploads/commiteemeeting/<?php echo $commiteemeeting[0]->mom_file;?>" type="application/pdf" width="100%" height="50%">                        
														  </object>                 
														</div>
														<?php } else{?>
                                        <?php if(!empty($commiteemeeting[0]->mom_file)){
                                             $mom_file= explode(',',$commiteemeeting[0]->mom_file);
                                             }else{
                                               $mom_file=0;
                                             }
                                           for($i=0;$i<count($mom_file);$i++){ ?>
														  <p><img class="img-fluid" src="<?php echo asset_url().'uploads/commiteemeeting/'.$mom_file[$i]; ?>" width="40%"></p>      
                                        <?php }}?>
													 <?php }?>
													
														</div>
														</div>
													<!--<div class="form-group col-md-4">
														<label for="">Upload <span class="text-danger">(Max upload file size is 5120KB)</span></label>
															<input type="file" class="form-control" readonly id="upload_img" name="upload_img" accept="image/jpeg,image/pdf" required="required" data-validation-required-message="Please upload.">
														 <p class="help-block text-danger"></p>												
													</div>-->													
												</div>
												<div class="row row-space  mt-4">
													<div class="col-md-12"	id="div1">
													<table id="example" class="table table-striped table-bordered">
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
															<input type="text" class="form-control numberOnly" maxlength="5" readonly id="allowance_fees" name="allowance_fees" required="required" data-validation-required-message="Please enter allowance.">
														 <p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label for="">Members Attendance <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="member_attend" name="member_attend"  placeholder="Member Attendance" required="required" data-validation-required-message="Please member attendance.">
													</div>
													<div class="form-group col-md-4">
														<label for="">Allowance to Directors</label>
														<input type="text" class="form-control" readonly id="director_allowance" maxlength="5" name="director_allowance"  placeholder="Allowance to Directors">
													</div>										
												</div>-->	
												<div class="col-md-12 text-center">
													<a href="<?php echo base_url('staff/operation/editcommitteemeeting/'.$commiteemeeting[0]->id);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
													<a href="<?php echo base_url('staff/operation/committeemeetinglist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
var attendee_id_DB_checked = <?php echo json_encode($commiteemeeting);?>;
console.log(attendee_id_DB_checked);
var attendee_id_DB=[];
for(var i=0;i<attendee_id_DB_checked.length;i++) {
	//console.log(attendee_id_DB_checked[i]['attendee_id']);
	attendee_id_DB.push(attendee_id_DB_checked[i]['attendee_id']);
	//console.log(attendee_id_DB);
}
console.log(attendee_id_DB);
getcommiteemember("<?php echo $commiteemeeting[0]->committee_id;?>");
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

var abc = 0;
$('body').on('change', '#upload_meeting', function (e){
	  fileCount = this.files.length;
	  var oFile = document.getElementById("upload_meeting").files[0];
	  var FileSize = oFile.size / 1024; // in MB
		 if (FileSize > 5120) {
			swal('',"File size exceeds 5 MB");
			$("#upload_meeting").val(''); 
		} else {
		$(this).before($("<div/>",{id: 'filediv'}).fadeIn('slow').append($("<input/>",
		{
			name: 'upload_meeting[]',
			type: 'file',
			id: 'upload_meeting',
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

$('#committee_id').change(function(){
    var committee = $("#committee_id").val();
    getcommiteemember( committee );
});
 function getcommiteemember( committee ) {
	 $('#blocklist').empty();
    if(committee != ''){    
	   $.ajax({
		  url:"<?php echo base_url();?>staff/operation/getcommiteememberdetail/"+committee,
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
			console.log(response['commitee_list']);
			var col_count = 0;
			var td_count = 0;
			var commitee_data = '';
			var totalCol = responseArray['commitee_list'].length;
			$.each(responseArray.commitee_list,function(key, value){
				col_count++;
				td_count++;
				//alert(value.id);
				var isInArray = attendee_id_DB.includes(value.director_id);
				
				if(col_count == 1) {
					commitee_data += '<tr class="col-md-12">';
					if(isInArray == true) {
						commitee_data += '<td><input type="checkbox" class="checkbox" id="commitee_name" disabled name="commitee_name[]" required data-validation-required-message="Please select block." value="'+value.id+'" checked><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></div>';
					} else {
						commitee_data += '<td><input type="checkbox" class="checkbox" id="commitee_name" disabled name="commitee_name[]" required data-validation-required-message="Please select block." value="'+value.id+'"><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></div>';
					}
				} else {
					if(isInArray == true) {
						commitee_data += '<td><input type="checkbox" class="checkbox" id="commitee_name" disabled name="commitee_name[]" required data-validation-required-message="Please select block." value="'+value.id+'" checked><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></div>';
					} else {
						commitee_data += '<td><input type="checkbox" class="checkbox" id="commitee_name" disabled name="commitee_name[]" required data-validation-required-message="Please select block." value="'+value.id+'"><label for='+value.member_name+' class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></div>';
					}
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
				commitee ='<div class="row row-space"><div class="col-md-12 text-center"><button type="button" disabled class="btn btnfs btn-success" id="save_value" name="save_value" value="Find Members">Find Members</button></div></div>'; 
            });
			 $("#blocklist").append(commitee_data);
			 $('#blockbutton').html(commitee);
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

function getmemberdetail(member_id){

		var output_list = "";
		for(var i=0;i<member_id.length;i++)
		{		
//console.log(member_id[0].length)	
			output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+member_id[i].values+' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control"  readonly id="director_member_attend" value='+member_id[i].selectedtext+' name="committee['+i+'][member_name]" readonly placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly id="sitting_fees" maxlength="5" name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text"  readonly class="form-control numberOnly" maxlength="5" id="sitting_fees" placeholder="Sitting Fees Paid" name="committee['+i+'][sitting_fees_paid]" required="required" readonly data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly"  readonly id="director_allowance" maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" readonly id="allowance_fees" readonly name="committee['+i+'][allowance_fees_paid]" required="required" placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
			$('#outputlist').html(output_list);
			initnumberOnly() ;
		    //$('#div2').append(sale_list);
			 
        }
		
		
}	
function getmembervalue(attendee_id){
var checkedValues= [];
    var chs = attendee_id;
	//console.log(chs.length);
	var attendee = chs.split(',');
    for(var i = 0; i<attendee.length; i++)
	{
		//console.log(attendee);
         if (attendee[i].checked)
    {
    var director='<div class="col-md-2"><input type="checkbox" class="checkbox" readonly id="commitee_name" name="commitee_name[]" required data-validation-required-message="Please select block." readonly value="'+value.id+'"><label for="'+value.member_name+'" class="ml-2">'+value.member_name+'</label><div class="help-block with-errors text-danger"></div></div>';
    }
	}
    // use checkedValues
		
}

$(function(){
	 $("#directorform").on('click', '#save_value', function () {
		 //alert("hi");
		 //$(this).parent().parent().remove();
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
$(document).ready(function(){
	var count = <?php echo json_encode($commiteemeeting); ?>;
	var attendee_id = <?php print_r(json_encode( $commiteemeeting[0]->attendee_id));?>;
	getmembervalue(attendee_id);
	getselectedvalue(count);
});
function getselectedvalue(count)
{
	var output_list = "";
	for(var i=0;i<count.length;i++)
		{
		console.log(count[i]['actual_sitting_fee']);
		//input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';
		 //output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" class="form-control" value='+ count[i]['id'] +' readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control" value='+ count[i]['id'] +' readonly id="director_member_attend" name="committee['+i+'][member_name]" placeholder="Member Name" required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" id="sitting_fees" maxlength="5" value='+count[i]['actual_sitting_fee']+' name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" maxlength="5" id="sitting_fees" value='+count[i]['paid_sitting_fee']+' name="committee['+i+'][sitting_fees_paid]" required="required"  placeholder="Sitting Fees Paid" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" value='+count[i]['actual_allowance']+' id="director_allowance" maxlength="5" name="committee['+i+'][director_allowance]" placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" value='+count[i]['paid_allowance']+' maxlength="5" id="allowance_fees" name="committee['+i+'][allowance_fees_paid]" placeholder="Allowance Paid" required="required" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
		 output_list += '<tr class="col-md-12"><td width="20.5%"><input type="hidden" readonly class="form-control" value="'+count[i]['attendee_id']+'" readonly id="member_id" name="committee['+i+'][member_id]"><input type="text" class="form-control"  readonly id="director_member_attend" value="'+count[i]['member_name']+'" name="committee['+i+'][member_name]" placeholder="Member Name" readonly required="required" data-validation-required-message="Please member attendance."></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly id="sitting_fees" maxlength="5" value='+count[i]['actual_sitting_fee']+' name="committee['+i+'][sitting_fees]" placeholder="Sitting Fees"></td><td width="20.5%"><input type="text" class="form-control numberOnly" readonly maxlength="5" id="sitting_fees"  value='+count[i]['paid_sitting_fee']+' placeholder="Sitting Fees Paid" name="committee['+i+'][sitting_fees_paid]" required="required" data-validation-required-message="Please enter sitting fees."><p class="help-block text-danger"></p></td><td width="20.5%"><input type="text" class="form-control numberOnly" value='+count[i]['actual_allowance']+' id="director_allowance" maxlength="5" name="committee['+i+'][director_allowance]" readonly placeholder="Allowance Amount"></td><td width="25%"><input type="text" class="form-control numberOnly" maxlength="5" value='+count[i]['paid_allowance']+' id="allowance_fees" readonly name="committee['+i+'][allowance_fees_paid]"  required="required"  placeholder="Allowance Paid" data-validation-required-message="Please enter allowance."><p class="help-block text-danger"></p></td></tr>';
	}
	$('#outputlist').append(output_list);
	initnumberOnly();
}
function clearBox(elementid)
{
    document.getElementById(elementid).innerHTML = "";
}
</script>	 
</body>
</html>