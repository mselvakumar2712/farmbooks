<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//print_r($user_info);

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
                        <h1>Edit Upload Incorporation Documents</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/editincorporate');?>">Edit Upload Incorporation Documents</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('staff/operation/update_incorporate/'.$user_info['id'])?>"  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <input type="hidden" value="<?php echo $user_info['id'];?>" name="userid" id="userid">
					<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												
											<div class="table-responsive mt-3">  
												<table class="table table-bordered" id="dynamic_field">
													<thead>
														<tr>
															<th class="text-center">
																Document Name
															</th>
															<th class="text-center">
															  Document Type
															</th>
															<th class="text-center">
																View
															</th>
															
														</tr>
													</thead>
													<tbody>
								
													</tbody>
												</table>  
											</div>
												
										</div>										
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<!--<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update</button>-->
											<a href="<?php echo base_url('staff/operation/incorporatelist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>

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
$(document).ready(function () {
    $(".document_type_chng").change(function () {
        var val = $(this).val();
        if (val == "1" || val == "4" || val == "5" || val == "6" || val == "7" || val == "8") {
            $("#document_type0").html("<option value='1'>Pdf/jpeg</option>");
        } else if (val == "2" || val == "3" || val == "9" ){
		$("#document_type0").html("<option value='2'>Pdf</option>");
        } 
    });
});
function initfiletype(){
	$(".document_type_chng1").change(function () {
		var val = $(this).val();
		
		if (val == "1" || val == "4" || val == "5" || val == "6" || val == "7" || val == "8") {
			$(this).closest(".dynamic-added").find('.restrict_type').html("<option value='1'>Pdf/jpeg</option>");
		} else if (val == "2" || val == "3" || val == "9" ){
			$(this).closest(".dynamic-added").find('.restrict_type').html("<option value='2'>Pdf</option>");
		} 
	});
	$(".fl_upload").on('change', function(event) {
		fileCount = this.files.length;
		//var oFile = $(this).files[0];		
		var file = event.target.files[0];
		var FileSize = file.size / 1024;
		if(FileSize>512) {
		   swal('',"File size exceeds 512 KB");
				$(".fl_upload").val('');  //the tricky part is to "empty" the input file here I reset the form.
			return;
		}
		var type_id = $(this).closest(".dynamic-added").find('.document_type_chng1').val();
		if (type_id == "1" || type_id == "4" || type_id == "5" || type_id == "6" || type_id == "7" || type_id == "8") {
			if(!file.type.match('image/jp.*') && !file.type.match('application/pdf')) {                
				swal('',"only PDF/JPG file allowed to upload");
				$(".fl_upload").val(''); 
				return;
			}
		}else{
			if(!file.type.match('application/pdf')) {                
				swal('',"only PDF document allowed to upload");
				$(".fl_upload").val(''); 
				return;
			}
		}			
	});
}


$(document).ready(function() {	
		var i=0;  
		$('#add').click(function(){ 			
		//validate condition
		    var validate = true;
			//document.getElementById("sendMessageButton").disabled =false;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				
				validate = false;
			}
			});
	 	//select 
		$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');			
			$('select[id="document_name'+i+'"]', row).each(function() {
				document.getElementById('document_type'+i+'').value= $(this).val();
				
			});
		});	
		//validate check
		if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			document.getElementById('document_name'+i+'').setAttribute("readonly", "true");
			document.getElementById('document_type'+i+'').setAttribute("readonly", "true");
			document.getElementById('file_type'+i+'').setAttribute("disabled", "true");
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control document_type_chng1" id="document_name'+i+'" name="document_name[]" data-validation-required-message="Please select document."><option value="">Select Document Name</option><option value="1">Certificate of Incorporation</option><option value="2">Memorandum of Association</option><option value="3">Articles of Association</option><option value="4">Others</option><option value="5">PAN</option><option value="6">TAN</option><option value="7">GST</option><option value="8">DIN</option><option value="9">IE Code</option></select><p class="help-block text-danger"></p></td><td><select class="form-control restrict_type" id="document_type'+i+'" name="document_type[]" data-validation-required-message="Please select document."><option value="">Select Document Name</option></select><p class="help-block text-danger"></p></td><td><input type="file" name="file_path[]" id="file_type'+i+'" class="form-control fl_upload"> </td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button></td></tr>');  
            initnumberOnly();
			initfiletype();
			return true;// you can submit form or send ajax or whatever you want here
			}else{
			swal('',"Provide all the data");
			return false;
			}																																																											
		});
		
		$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
		});  
});
			
			var order_no='<?php echo $user_info['id']?>';
			var j=1;
			$.ajax({
			url: "<?php echo base_url();?>staff/operation/grnpoitems/"+order_no,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
			response=response.trim();
			responseArray=$.parseJSON(response);
			console.log(responseArray); //display response
			$.each(responseArray, function(key, value) {
			var strVale = value.document_type;
			var intValcode=strVale.split(',');	
			var strUpload = value.file_path;
			var arrUpload = strUpload.split(',');	
			console.log(intValcode);	//splitted values
			for(var i=0;i<intValcode.length;i++){				
				if(intValcode.length > 0 ){
					j++;
					
					var strOptions = '<option value="">Select Document Name</option>';
					if(intValcode[i] == 1) {
						strOptions += '		<option value="1" selected="selected">Certificate of Incorporation</option>';
					}
					else {
						strOptions += '		<option value="1">Certificate of Incorporation</option>';
					}
					if(intValcode[i] == 2) {
						strOptions += '		<option value="2" selected="selected">Memorandum of Association</option>';
					}
					else {
						strOptions += '		<option value="2">Memorandum of Association</option>';
					}	
					
					if(intValcode[i] == 3) {
						strOptions += '		<option value="3" selected="selected">Articles of Association</option>';
					}
					else {
						strOptions += '		<option value="3">Articles of Association</option>';
					}
					if(intValcode[i] == 4) {
						strOptions += '		<option value="4" selected="selected">Others</option>';
					}
					else {
						strOptions += '		<option value="4">Others</option>';
					}	
					if(intValcode[i] == 5) {
						strOptions += '		<option value="5" selected="selected">PAN</option>';
					}
					else {
						strOptions += '		<option value="5">PAN</option>';
					}
					if(intValcode[i] == 6) {
						strOptions += '		<option value="6" selected="selected">TAN</option>';
					}
					else {
						strOptions += '		<option value="6">TAN</option>';
					}					
					if(intValcode[i] == 7) {
						strOptions += '		<option value="7" selected="selected">GST</option>';
					}
					else {
						strOptions += '		<option value="7">GST</option>';
					}
					if(intValcode[i] == 8) {
						strOptions += '		<option value="8" selected="selected">DIN</option>';
					}
					else {
						strOptions += '		<option value="8">DIN</option>';
					}
					if(intValcode[i] == 9) {
						strOptions += '		<option value="9" selected="selected">IE Code</option>';
					}
					else {
						strOptions += '		<option value="9">IE Code</option>';
					}
					
					
					var strOptionsType = '<option value="">Select Document Type</option>';
					if(intValcode[i] == 1 || intValcode[i] == 4 || intValcode[i] == 5 || intValcode[i] == 6 || intValcode[i] == 7 || intValcode[i] == 8) {
						strOptionsType += '<option value="1" selected="selected">Pdf/jpeg</option>';
					}
					if(intValcode[i] == 2 || intValcode[i] == 3 || intValcode[i] == 9) {
						strOptionsType += '<option value="2" selected="selected">Pdf</option>';
					}	

					var strFiles = '';
					var fileName = arrUpload[i];
					var arrFileType = fileName.split('.');
					if(arrFileType[1] == 'jpg') {
						strFiles += '<a href="<?php echo base_url();?>assets/uploads/documents/'+ fileName +'" class="btn btn-success btn-sm mt-1" title="Image"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>';
					}
					else if(arrFileType[1] == 'pdf') {
						strFiles += '<a href="<?php echo base_url();?>assets/uploads/documents/'+ fileName +'" class="btn btn-success btn-sm mt-1" title="Download"><i class="fa fa-download" aria-hidden="true" title="Download"></i></a></a>';
					}
					//strFiles += '<input type="file" name="file_path[]" id="file_type'+i+'" class="form-control fl_upload"> ';	
					
					$('#dynamic_field').append('<tr id="row'+j+'" class="dynamic-added"><td><select class="form-control document_type_chng1" readonly id="document_name'+j+'" name="document_name[]" data-validation-required-message="Please select document.">'+ strOptions +'</select><p class="help-block text-danger"></p></td><td><select class="form-control restrict_type" readonly id="document_type'+j+'" name="document_type[]" data-validation-required-message="Please select document.">'+ strOptionsType +'</select><p class="help-block text-danger"></p></td><td>'+ strFiles +'</td></tr>');  
					initfiletype();
				}	
			}
			});	
			},
			error:function(){
			alert('There is no documents');
			} 
		});
		

		
</script>	 
</body>
</html>