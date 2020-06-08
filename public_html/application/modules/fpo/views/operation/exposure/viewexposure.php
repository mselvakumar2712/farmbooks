<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 
$directory = 'assets/uploads/exposure/exposure_visit_'.$exposure['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
?>
<style>
.text-right{
   font-style: inherit ! important;
}
</style>
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
                        <h1>View Exposure Visit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/viewtraining_ceo');?>">View Exposure Visit</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action=""  method="post"  id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space  mt-4"> 
											<div class="form-group col-md-4">
											  <label for="">Date of Visit <span class="text-danger">*</span></label>
											  <input type="date" id="date_training"   value="<?php echo $exposure['program_date']; ?>"   name="date_visit" disabled class="form-control"  required="required" data-validation-required-message="Please select date of visit ">					
											   <p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
											<label for="">Place of Visit </label>
											<input type="text" id="place_visit" value="<?php echo $exposure['conducting_place']; ?>" placeholder="Place of Visit" maxlength="50" name="place_visit" disabled class="form-control" >					
											<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-4">
											<label for="">No. of Participants </label>
											<input type="text" id="no_participants" value="<?php echo $exposure['no_of_participants']; ?>" placeholder="No. of Participants" name="no_participants" disabled maxlength="3" class="form-control numberOnly">					
											<div class="help-block with-errors text-danger"></div>
											</div>

											</div>
											<div class="row row-space">
											<div class="form-group col-md-4">
											<label for="">No. of Villages Covered </label>
											<input type="text" id="no_villages" maxlength="3"  value="<?php echo $exposure['no_of_villages']; ?>" placeholder="No. of Villages Covered" name="no_villages" disabled class="form-control numberOnly">					
											<div class="help-block with-errors text-danger"></div>
											</div>

											   <div class="form-group text-center mt-3 col-md-4">
												<label for="inputAddress2">Cost Involved</label>
												<input type="checkbox" id="cost_involved" <?php echo ($exposure['cost_involved']==1)? "checked":""; ?>  disabled name="cost_involved" value="1" class="ml-2" >												
											  </div> 
												<div class="form-group col-md-4 mt-4" id="cost_inv_amt">
                                   <label for="">Total Cost ( <span class="fa fa-inr"></span> )</label>
                                 <input type="text" id="amount" maxlength="6" name="amount" placeholder="Amount" <?php echo ($exposure['cost_involved']==1)? "":"hidden"; ?> disabled value="<?php echo $exposure['amount']; ?>" class="form-control numberOnly mt-1 text-right">					
											</div>
											</div>
											<div class="row row-space">
											<div class="form-group col-md-12 ">
											<label for="inputAddress2">Program Photo</label>
												<div class="">
												<?php 
													if($uploadedImages){
														for($i=0;$i<count($uploadedImages);$i++){?>
														<div class="col-md-2">
															<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
														</div>
												<?php }} ?>
												</div>
												</div>
											</div>
										</div>											
										<div class="col-md-12 text-center mt-4">
											<a href="<?php echo base_url('fpo/operation/editexposure/'.$exposure['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit<a>
											<a href="<?php echo base_url('fpo/operation/exposurelist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
      $('#date_training').attr('max', maxDate);
			
});

$('input[name=cost_involved]').on('change', function() {
    var cost_inv = $("input[name='cost_involved']:checked").val();  
    if(cost_inv == 1) {
		$('#cost_inv_amt').show();

    }else{
		$('#cost_inv_amt').hide();
	}
});
$(document).ready(function() {
			var i=0; 
		$('#sendMessageButton').click(function(){  

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

		});		 
		$('#add').click(function(){ 			
		//validate condition
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
			if($(this).val() > 5 ){
				alert("allow only 5 rows");
			}
			});
	 	//select 
		
		//validate check
		if(validate){
			document.getElementById("sendMessageButton").disabled =false;
			//document.getElementById(''+i+'').setAttribute("readonly", "true");
			document.getElementById('program_speakers'+i).setAttribute("readonly", "true");
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" id="program_speakers'+i+'" name="program_speakers[]" disabled class="form-control " maxlength="50" /><p class="help-block text-danger"></p></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">-</button></td></tr>');  
            initnumberOnly();
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
	
	var abc = 0;
                 
			$('body').on('change', '#trainie_photo', function (e){
				$(this).before($("<div/>",{id: 'filediv'}).fadeIn('slow').append($("<input/>",
				{
					name: 'trainie_photo',
					type: 'file',
					id: 'trainie_photo',
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
					
					if(filetype=='image/jpeg' || filetype=='image/jpg' ||filetype=='image/png'){
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
		if($("#trainie_photo")[0].files.length > 2) {
			alert("hi");
                   alert("You can select only 2 images");
         } else {
               $("#imageUploadForm").submit();
         }
			});
function fileuploadValidateSize(file) {
				var FileSize = file.files[0].size / 1024; // in MB
				if (FileSize > 500) {
					alert('File size exceeds 500 kB');
				   // $(file).val(''); //for clearing with Jquery
				} else {

				}
    }  
				
            //image preview
			function imageIsLoaded(e){
				$('#previewimg' + abc)
				.attr('src', e.target.result);
			}
</script>	 
</body>
</html>