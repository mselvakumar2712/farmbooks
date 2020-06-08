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
                        <h1>View Crop Variety Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/variety");?>">Crop Variety Master</a></li>
                            <li class="active">View Crop Variety Master </li>
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
						<form  name="sentMessage" id="editcropvarietyform" method="post" action="" novalidate="novalidate" >
						<input type="hidden" name="cropvariety_id" value="<?php echo $_REQUEST['id']?>" id="cropvariety_id">
						<div class="row row-space">
							<div class="form-group col-md-4">
							  <label for="inputState">Crop Category <span class="text-danger">*</span></label>
							  <select id="cropcategory" name="cropcategory" class="form-control" disabled required="required" data-validation-required-message="Please enter crop category." disabled>
								<option value="">Crop Category</option>
								<?php for($i=0; $i<count($category);$i++) { ?>									
                                <option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
								<?php } ?>
							  </select>
							  <p class="help-block text-danger"></p>
							</div>
						    <div class="form-group col-md-4">
								<label for="inputAddress2">Crop Sub Category <span class="text-danger">*</span></label>
							   <select id="cropsubcategory" name="cropsubcategory" class="form-control" disabled required="required" data-validation-required-message="Please enter crop sub category." disabled>
								<option value="">Crop Sub Category</option>
							   </select>
							  <p class="help-block text-danger"></p>
							</div>	
							<div class="form-group col-md-4">
								<label for="inputAddress2">Crop Name <span class="text-danger">*</span></label>
								<select id="cropname" name="cropname" class="form-control" required="required" disabled data-validation-required-message="Please enter crop name." disabled>
									<option value="">Crop Name</option>
							    </select>
								<p class="help-block text-danger"></p>								
						    </div>
					    </div>
							<table class="table table-bordered text-center mt-4" id="crop_variety">
							   <thead>
							      <tr>
								  <td>Crop Variety</td>
								  <td>Crop Category in Variety Language</td>
								  <td><button type="button" name="add" id="add" class="btn btn-success">Add Variety</button></td>
								  </tr>
							   </thead>
							   <tbody>
								  <tr>
								  </tr>
							   </tbody>
							</table>
							 <div class="row">
							<div class="form-group col-md-12 text-center">
							   
							    <input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
								 <a href="<?php echo base_url('administrator/variety');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
								 <a href="<?php echo base_url('administrator/variety');?>"><input id="cancel" value="Cancel" style="display:none;" class="btn btn-outline-dark text-center mt-10" type="button"></a>
						  	   </div>
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
	var i=1;  
	$('#sendMessageButton').click(function(){ 
		
	    var validate = true;
			$('#crop_variety').find('tr input[id="cropvariety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){				
		  return true;	
		}else{			
			swal('',"Provide crop variety");
			return false;
		}	
	
	});
	$('#add').click(function(){ 

	    var validate = true;
			$('#crop_variety').find('tr input[id="cropvariety'+i+'"]').each(function(){
			
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
		
	    i++;

	    $('#crop_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="text" class="form-control"  maxlength="30" id="cropvariety'+i+'" name="cropvariety[]" placeholder="Crop Variety" required="required" data-validation-required-message="Please enter crop variety."></td><td><input type="text" class="form-control"  maxlength="30" id="cropregional'+i+'" name="cropregional[]" placeholder="Crop Variety in Regional Language" ></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		
		}else{			
			swal('',"Provide crop variety");
			return false;
		}	
	
	});
	
	
	
	$("#add").hide();
	$('#edit').click(function(){
	  $('#sentMessage').toggleClass('view');
	  $("#sendMessageButton").show();
	  $("#cancel").show();
	  $("#add").show();
	  $("#edit").hide();
		$('#crop_variety').on('click', '.del',function() {
			var cropvariety_id =  $(this).attr('id');
			$.ajax({
				url: "<?php echo base_url();?>administrator/category/getcropvarietybyid/"+cropvariety_id,
				type: "GET",
				data: {
				 this_delete: cropvariety_id,
				},
				success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
				if(responsearr.status==1){
					swal({
					 text: "You can't delete because crop master has created by using this crop variety!",
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
						  url: "<?php echo base_url();?>administrator/variety/deletevariety/"+cropvariety_id,
						  type: "POST",
						  data: {
							 this_delete: cropvariety_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/variety')?>");
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
						swal("Cancelled", "You have cancelled the crop variety master delete action", "info");
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
	  $(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();  
	  }); 
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
		  inp.attr('disabled', 'disabled');
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
				var div_data = '<option value="">Select Subcategory</option>';
			    $.each(responsearr, function(key, value) {	
					console.log(value.id);						   
					div_data +="<option value="+value.id+">"+value.name+"</option>";                            							
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
						
				  div_data +="<option value="+value.id+">"+value.name+"</option>";
				                             							
				});
				$(div_data).appendTo('#cropname');	 
			}
		});
		}						
	});
	
	$(document).ready(function(){
			var cropvariety_id =<?php echo $_REQUEST['id']?>;
            // jQuery method
			$.ajax({
			url: "<?php echo base_url();?>administrator/variety/editvariety/"+cropvariety_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
			console.log(response);
			//alert(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
			document.getElementById("cropcategory").value=responseArray.variety_list[0].category_id;
			var category=responseArray.variety_list[0].category_id;
			var sub_category_id=responseArray.variety_list[0].sub_category_id;
			$("#cropsubcategory option").remove(); 
			if(category){		
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getsubcategory')?>',
					type: "POST",
					data:{crop_category:category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);	
                            if(sub_category_id==value.id){						
							var div_data="<option value="+value.id+" selected>"+value.name+"</option>";
							}
						    $(div_data).appendTo('#cropsubcategory');	                            							
						});
					}
				});
			}
			var name_id=responseArray.variety_list[0].name_id;
			var sub_category=responseArray.variety_list[0].sub_category_id;
			if(sub_category){	
				$("#cropname option").remove() ;	
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getnameid')?>',
					type: "POST",
					data:{crop_sub_category:sub_category},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					    $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
							if(name_id==value.id){						
							var div_data="<option value="+value.id+" selected>"+value.name+"</option>";
							}
						   $(div_data).appendTo('#cropname');	                           							
						});
						  
					}
				});
			}
			

			var strVale = responseArray.variety_list[0].varity_name;
			var reg = responseArray.variety_list[0].varietylocal;
			var rowid = responseArray.variety_list[0].varietyid;
			var intVal_id=rowid.split(',');
			var intValArray=strVale.split(',');
			var intValreg=reg.split(',');
			 for(var i=0;i<intValArray.length;i++){
				if(intValArray.length > 0 ){
				 $('#crop_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="hidden"  value="'+intVal_id[i]+'" id="cropvarietyid"  name="cropvarietyid[]" disabled><input type="text" value="'+intValArray[i]+'" class="form-control"  maxlength="30" id="cropvariety" name="cropvariety[]" placeholder="Crop Variety" required="required" data-validation-required-message="Please enter crop variety."disabled></td><td><input type="text" class="form-control" value="'+intValreg[i]+'"   maxlength="30" id="cropregional" name="cropregional[]" placeholder="Crop Category in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language."disabled></td><td><a  href="javascript:void(0); " id="'+intVal_id[i]+'" class="del btn btn-danger mt-10">Delete</i></a></td></tr>');  
				}else{
				   $("#crop_variety").val(strVale);
				}
			}	
			
			//document.getElementById("cropregional").value=responseArray.variety_list[0].variety_local;
			} 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
			});
			});
			
	$('form').submit(function(e){
	e.preventDefault();
	var cropvariety_id =<?php echo $_REQUEST['id']?>;
	const cropvarietydata = $('#editcropvarietyform').serializeObject();
	var url="<?php echo base_url();?>administrator/variety/updatevariety/"+cropvariety_id;
	console.log(cropvarietydata);
		 $.ajax({
			url:url,
			type:"POST",
			data:cropvarietydata,
			dataType:"html",
         cache:false,			
			success:function(response){		  
				response=response.trim();
				//responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/variety')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
			}); 
		});
	
	
	$.fn.serializeObject = function()
			{
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