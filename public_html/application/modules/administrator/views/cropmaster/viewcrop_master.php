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
            <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Crop Master </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Master</a></li>
                            <li class="active">View Crop Master</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
						<div class="container-fluid">
						<form  name="sentMessage" method="post" action="" id="editCropMasterForm" novalidate="novalidate" >
						   <div class="row row-space">
							<div class="form-group col-md-4">
							 <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please enter crop category." disabled>
								<option value="">Crop Category</option>
								<?php for($i=0; $i<count($category);$i++) { ?>										
                                 <option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
                                <?php } ?>
							  </select>
							   <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Sub Category <span class="text-danger">*</span></label>
							  <select id="cropsubcategory" name="cropsubcategory" class="form-control" required="required" data-validation-required-message="Please enter crop sub category." disabled>
								<option value="">Crop Sub Category.</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							 <label for="inputState">Crop Name <span class="text-danger">*</span></label>
							  <select id="cropname" name="cropname" class="form-control" required="required" data-validation-required-message="Please enter crop name." disabled>
								<option value="">Crop Name</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
						  </div>
						   <div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Variety <span class="text-danger">*</span></label>
							  <select id="cropvariety" name="cropvariety" class="form-control" required="required" data-validation-required-message="Please enter crop variety." disabled>
								<option value="">Crop Variety</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-2">
								<label for="inputAddress">Tenure <span class="text-danger">*</span></label>
								<input type="text" class="form-control numberOnly" name="tenure" id="tenure" placeholder="Tenure" maxlength="3" required="required" data-validation-required-message="Please enter tenure."disabled>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-2 mt-1">
							   <label for="inputAddress"></label>
								<select id="tenure_unit" name="tenure_unit" class="form-control mt-1" required="required" data-validation-required-message="Please select tensure unit."disabled>
								<option value="">select tensure unit</option>
								<option value="1">Month</option>
								<option value="2">Days</option>
								<option value="3">Year</option>
								</select>
							   <p class="help-block text-danger"></p>
							</div>
							  <div class="form-group col-md-4">
								  <label class=" form-control-label">Harvesting Type <span class="text-danger">*</span></label>
								  <div class="row">
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="radio" id="harvesting_type" name="harvesting_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please select." disabled><span class="ml-1">Single</span>
										  
										</label>
									  </div> 
									</div>
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="radio" id="harvesting_type" name="harvesting_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please select." disabled><span class="ml-1">Multiple</span>
										  
										</label>
									   </div>
									</div>			
								  </div>
								  <p class="help-block text-danger"></p>
							  </div>
						  </div>
                            
						  <div class="row row-space">
							  <div class="form-group col-md-4">
								  <label class=" form-control-label">Yield Measurements <span class="text-danger">*</span></label>
								  <div class="row">
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="radio" id="yield_measurement" name="yield_measurement" value="1" class="form-check-input" required="required" data-validation-required-message="Please select." disabled><span class="ml-1">Area</span>
										  
										</label>
									  </div> 
									</div>
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="radio" id="yield_measurement" name="yield_measurement" value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Numbers</span>
										 
										</label>
									   </div>
									</div>			
								  </div>
								  <p class="help-block text-danger"></p>
							  </div>
							    <div class="form-group col-md-4" id="harvesting_commence_from" style="display: none;">
                                  <label for="inputAddress">Harvesting Commence From</label>
								<input type="text" class="form-control numberOnly" name="harvesting_commence" id="harvesting_commence" placeholder="Harvesting commence from" maxlength="3"  data-validation-required-message="Please enter harvesting commence.">
							   <p class="help-block text-danger"></p>
							  </div>
							<table class="table table-bordered text-center mt-4" id="crop_output" >
							  <tbody>
							   <tr>
							   <td>Output</td>
							   <td><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>
							   </tr>
							  </tbody>
							</table>	
							
						  </div>
                            
                        <div class="row row-space">							  
							  <div class="form-group col-md-12 text-center">
							  
							  
							    <input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
								<a href="#" id="" class="del btn btn-danger mt-10">  Delete</a>
							    <a href="<?php echo base_url('administrator/cropmaster');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
								<a href="<?php echo base_url('administrator/cropmaster');?>"><input id="cancel" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button" style="display:none;"></a>
							
						  	   						  
							  </div>
						  </div>
						
						</form>
						</div>
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
 </div><!-- .content -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
	var i=0; 
	$('#sendMessageButton').click(function(){  
		
		var validate = true;
			$('#crop_output').find('tr input[id="cropoutput'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
	   
    	return true;
		
		}else{			
			swal('',"Provide output");
			return false;
		} 
	});
	$('#add').click(function(){
		var validate = true;
		$('#crop_output').find('tr input[id="cropoutput'+i+'"]').each(function(){
			
		if($(this).val() == ""){
				validate = false;
		}
		});
		if(validate){		   
		   i++;
		   $('#crop_output').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input width="" type="text" class="form-control" name="cropoutput[]" id="cropoutput'+i+'" placeholder="Output" ></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		}else{			
			swal('',"Provide output");
			return false;
		} 
	});


	$(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();  
	});  
	var harvesting_type=$("input[name='harvesting_type']");
	var harvesting_commence_from= '';
	$('input').on('click', function() {
		  if(harvesting_type.is(':checked')) {
			  $("input[name='harvesting_type']:checked").each ( function() {
				  harvesting_commence_from= $(this).val() + ",";
				  harvesting_commence_from = harvesting_commence_from.slice(0, -1);
			  });
							
				 if(harvesting_commence_from==2){
				  $('#harvesting_commence_from').show();
				 }else {             
				 $('#harvesting_commence_from').hide();
				 }
		}
	 });    
    $('select[name="cropcategory"]').on('change', function(e) {
		e.preventDefault();
		var crop_category = $(this).val();
		$("#cropsubcategory option").remove() ;				
		if(crop_category) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
			type: "POST",
			data:{crop_category:crop_category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Crop Sub category</option>';
			    $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
					div_data+="<option value="+value.id+">"+value.name+"</option>";

				});
				$(div_data).appendTo('#cropsubcategory');	                            							
			}
		});
		}						
	});			
	$('select[name="cropsubcategory"]').on('change', function(e) {
		e.preventDefault();
		var crop_sub_category = $(this).val();
		$("#cropname option").remove() ;				
		if(crop_sub_category) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getnameid')?>',
			type: "POST",
			data:{crop_sub_category:crop_sub_category},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Crop Name</option>';
			    $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
					 div_data +="<option value="+value.id+">"+value.name+"</option>";
				 	                            							
				});
				$(div_data).appendTo('#cropname');
			}
		});
		}						
	});
	$('select[name="cropname"]').on('change', function(e) {
		e.preventDefault();
		var cropname = $(this).val();
		$("#cropvariety option").remove() ;				
		if(cropname) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
			type: "POST",
			data:{crop_name:cropname},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				var div_data = '<option value="">Select Crop Variety</option>';
			    $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
				   div_data +="<option value="+value.id+">"+value.variety+"</option>";
				 	                            							
				});
				 $(div_data).appendTo('#cropvariety');
			}
		});
		}						
	});	
     $("#add").hide();
	  $('#edit').click(function(){
	  $('#sentMessage').toggleClass('view');
	  $("#sendMessageButton").show();
	   $("#cancel").show();
	  $("#edit").hide();
	  $("#add").show();
	  $("#ok").hide();
	  $('input').each(function(){
		var inp = $(this);
	   //var button = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		document.getElementById("sendMessageButton").disabled =false;
		document.getElementById("cancel").disabled =false;
		
		}
		else {
		  //inp.attr('disabled', 'disabled');
		}
	  });
	  $('select').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		document.getElementById("sendMessageButton").disabled =false;
		document.getElementById("cancel").disabled =false;
		}
		else {
		  inp.attr('disabled', 'disabled');
		}
	  });
	});
	
	/*delete */
		$('a.del').click(function() {
			var cropmaster_id = <?php echo $_REQUEST['id']?>;
			$.ajax({
			url: "<?php echo base_url();?>administrator/category/getcropmasterbyid/"+cropmaster_id,
			type: "GET",
			data: {
			 this_delete: cropmaster_id,
			},
			success:function(response) {
			responsearr=$.parseJSON(response);
			console.log(response);
			if(responsearr.status==1){
				swal({
				 text: "You can't delete because crop standard has created by using this crop master!",
				 type: 'warning',
				 confirmButtonColor: '#3085d6',
				 cancelButtonColor: '#d33',
				 confirmButtonText: 'OK'
				});
			}else{					
				swal({
				 title: 'Are you sure?',
				 text: "You won't be able to revert this!",
				 type: 'question',
				 showCancelButton: true,
				 confirmButtonColor: '#3085d6',
				 cancelButtonColor: '#d33',
				 confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				 if (result.value) {          
					$(this).prop("disabled", true);
					$.ajax({
					  url: "<?php echo base_url();?>administrator/cropmaster/deletecrop/"+cropmaster_id,
					  type: "POST",
					  data: {
						 this_delete: cropmaster_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/cropmaster')?>");
						 }, 1000);
					  },
					  error: function() {
						 
						 setTimeout(function() {
						  swal("Error in progress. Try again!!!");
						 }, 1000);
					  },
					  complete: function() {
						 setTimeout(function() {
						  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
						 }, 1000);
					  }
					});
				 }else {
					swal("Cancelled", "You have cancelled the crop master details delete action", "info");
					return false;
				 }
			  });							
			}    
			},error: function() {
			 
			 setTimeout(function() {
			  swal("Error in progress. Try again!!!");
			 }, 1000);
			},
			complete: function() {
			 setTimeout(function() {
			  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
			 }, 1000);
			}
		});
	});
	
	
	$(document).ready(function(){
      var cropmaster_id =<?php echo $_REQUEST['id']?>;
      // jQuery method
	   $.ajax({
			url: "<?php echo base_url();?>administrator/cropmaster/editcrop/"+cropmaster_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		
            console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
                
			if(responseArray.status == 1){
					//var arrayArea = responseArray.crop_list[0].crop_output.split(',');
					$("#cropoutput").val(arrayArea);
				  var arrayArea=[];
				var strVale = responseArray.crop_list[0].crop_output;
				var intValArray=strVale.split(',');
				 for(var i=0;i<intValArray.length;i++){
					 if(intValArray.length > 0){
					  $('#crop_output').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input value="'+intValArray[i]+'" type="text" class="form-control" name="cropoutput[]" id="cropoutput" placeholder="Output" disabled></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
					 }else{
						 $("#cropoutput").val(strVale);
					 }
				}				
                document.getElementById("cropcategory").value=responseArray.crop_list[0].category_id;
				document.getElementById("tenure_unit").value=responseArray.crop_list[0].tenure_unit;
				var crop_category=responseArray.crop_list[0].category_id;
				$("#cropsubcategory option").remove() ;				
				if(crop_category) { 
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
					type: "POST",
					data:{crop_category:crop_category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
							var div_data="<option value="+value.id+">"+value.name+"</option>";
						  $(div_data).appendTo('#cropsubcategory');	                            							
						});
					}
				});
				}		
                crop_sub_category=responseArray.crop_list[0].subcategory_id;
				$("#cropname option").remove() ;				
				if(crop_sub_category) { 
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getnameid')?>',
					type: "POST",
					data:{crop_sub_category:crop_sub_category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
							var div_data="<option value="+value.id+">"+value.name+"</option>";
						  $(div_data).appendTo('#cropname');	                            							
						});
					}
				});
				}
                var cropname=responseArray.crop_list[0].name_id;
				if(cropname) {
				$("#cropvariety option").remove() ;
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
					type: "POST",
					data:{crop_name:cropname},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
						  var div_data="<option value="+value.id+">"+value.variety+"</option>";
						  $(div_data).appendTo('#cropvariety');	                            							
						});
					}
				});
				}
                document.getElementById("cropvariety").value=responseArray.crop_list[0].variety_id;
                document.getElementById("tenure").value=responseArray.crop_list[0].tenure;
                if(responseArray.crop_list[0].yield_measurement == 1) {
                   $('input[type=radio][name="yield_measurement"][value='+responseArray.crop_list[0].yield_measurement+']').prop('checked', true);
                } else {
                   $('input[type=radio][name="yield_measurement"][value='+responseArray.crop_list[0].yield_measurement+']').prop('checked', false);
                }
                if(responseArray.crop_list[0].harvesting_type == 1) {
                    $('input[type=radio][name="harvesting_type"][value='+responseArray.crop_list[0].harvesting_type+']').prop('checked', true);
                } else {
                    $('input[type=radio][name="harvesting_type"][value='+responseArray.crop_list[0].harvesting_type+']').prop('checked', true);
                    $('#harvesting_commence_from').show();
                }
			} 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
       });
	});
			
	$('form').submit(function(e){
	e.preventDefault();
	var cropmaster_id =<?php echo $_REQUEST['id']?>;
	const cropmasterdata = $('#editCropMasterForm').serializeObject();
	var url="<?php echo base_url();?>administrator/cropmaster/updatecrop/"+cropmaster_id;
		 $.ajax({
			url:url,
			type:"POST",
			data:cropmasterdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/cropmaster')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
    }); 
	});
	
	
	$.fn.serializeObject = function(){
    var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
	if (o[this.name] !== undefined) {
	if (!o[this.name].push) {
	o[this.name] = [o[this.name]];
	}
	o[this.name].push(this.value || '');
	} else {
	o[this.name] = this.value || '';
    }
	});
	return o;
	};
</script>
</body>
</html>
