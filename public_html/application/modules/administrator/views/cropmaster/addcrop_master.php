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
                        <h1>Add Crop Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Master</a></li>
                            <li class="active">Add Crop Master </li>
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
						<form name="sentMessage"  id="addCropMasterForm" novalidate="novalidate" >
						   <div class="row row-space">
							<div class="form-group col-md-4">
							 <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" required="required" data-validation-required-message="Please enter crop category.">
								<option value="">Crop Category</option>
								<?php for($i=0; $i<count($category);$i++) { ?>										
                                 <option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
                                <?php } ?>
							  </select>
							   <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Sub Category <span class="text-danger">*</span></label>
							  <select id="cropsubcategory" name="cropsubcategory" class="form-control" required="required" data-validation-required-message="Please enter crop sub category.">
								<option value="">Crop Sub Category.</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
							 <label for="inputState">Crop Name <span class="text-danger">*</span></label>
							  <select id="cropname" name="cropname" class="form-control" required="required" data-validation-required-message="Please enter crop name.">
								<option value="">Crop Name</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
						  </div>
						   <div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Variety <span class="text-danger">*</span></label>
							  <select id="cropvariety" name="cropvariety" class="form-control" required="required" data-validation-required-message="Please enter crop variety.">
								<option value="">Crop Variety</option>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-2">
								<label for="inputAddress">Tenure <span class="text-danger">*</span></label>
								<input type="text" class="form-control numberOnly" name="tenure" id="tenure" placeholder="Tenure" maxlength="3" required="required" data-validation-required-message="Please enter tenure.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-2 mt-1">
							   <label for="inputAddress"></label>
								<select id="tenure_unit" name="tenure_unit" class="form-control mt-1" required="required" data-validation-required-message="Please select tensure unit.">
								<option value="">select tensure unit</option>
								<option value="1"selected>Month</option>
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
										  <input type="radio" id="harvesting_type" name="harvesting_type" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Single</span>
										  
										</label>
									  </div> 
									</div>
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="radio" id="harvesting_type" name="harvesting_type" value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Multiple</span>										  
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
										  <input type="radio" id="yield_measurement" name="yield_measurement" value="1" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Area</span>
										  
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
							   
							  </div>   							              							                                
						  </div>
                        <h4 class="text-center text-success">Output</h4>
							<table class="table table-bordered text-center mt-4" id="crop_output" >
							   <tbody>
							   <tr>
							   <td><input type="text" class="form-control" name="cropoutput[]" id="cropoutput0" placeholder="Output" ></td>
							   <td><button type="button" name="add" id="add" class="btn btn-success">Add Item</button></td>
							   </tr>
							</tbody>
							</table>							                                                                            
                        <div class="row row-space">
							<div class=" col-md-12 text-center">
							 
								<input id="sendMessageButton" value="Save" class="btn btn-success text-center mt-10" type="submit">
						  	 	 <a href="<?php echo base_url('administrator/cropmaster');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button"></a>				  
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
//white spaces 
$(function() {
     $('#crop_output').on('keypress', function(e) {
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


	var i=0;  
    var j=1;
	$('#sendMessageButton').click(function(){  
		
		var validate = true;
			$('#crop_output').find('tr input[id="cropoutput'+j+'"]').each(function(){
			
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
	$('select[name="cropcategory"]').on('change', function() {
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
					div_data +="<option value="+value.id+">"+value.name+"</option>";
				                        							
				});
				$(div_data).appendTo('#cropsubcategory');	      
			}
		});
		}						
	});			
	$('select[name="cropsubcategory"]').on('change', function() {
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
					div_data+="<option value="+value.id+">"+value.name+"</option>";
				                          							
				});
				$(div_data).appendTo('#cropname');	  
			}
		});
		}						
	});
	$('select[name="cropname"]').on('change', function() {
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
	$(document).ready(function() {
		$('form').submit(function(e){
		e.preventDefault();
		const cropmasterdata = $('#addCropMasterForm').serializeObject();	
		if(cropmasterdata != '')
		{
		     console.log(cropmasterdata);
			 $.ajax({
				url:"<?php echo base_url();?>administrator/cropmaster/postcrop",
				type:"POST",
				data:cropmasterdata,
				dataType:"html",
				cache:false,			
				success:function(response){	
					responseArray=$.parseJSON(response);
					 if(responseArray.status == 1){
						$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
						window.location = "<?php echo base_url('administrator/cropmaster')?>";
					} 
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			}); 
		}else
		{
		alert('Please provide mandatory fields ');
		}
	});
			  
			  
	$.fn.serializeObject = function() {
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
	});
       
</script> 
</body>
</html>
