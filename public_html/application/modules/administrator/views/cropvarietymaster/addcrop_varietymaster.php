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
                        <h1>Add Crop Variety Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/variety");?>">Crop Variety Master</a></li>
                            <li class="active">Add Crop Variety Master </li>
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
										<form  name="sentMessage" method="post" action="" id="addcropvarietyform" novalidate="novalidate" >
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
													<label for="inputAddress2">Crop Sub Category <span class="text-danger">*</span></label>
													<select id="cropsubcategory" name="cropsubcategory" class="form-control" required="required" data-validation-required-message="Please enter crop sub category.">
													<option value="">Crop Sub Category</option>
													</select>
												  <p class="help-block text-danger"></p>
												</div>	
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Name <span class="text-danger">*</span></label>
													<select id="cropname" name="cropname" class="form-control" required="required" data-validation-required-message="Please enter crop name.">
														<option value="">Crop Name</option>
													 </select>
													<p class="help-block text-danger"></p>								
												 </div>
											 </div>
											<div class="row row-space"> 
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Variety <span class="text-danger">*</span></label>	
													<input type="text" class="form-control"  maxlength="30" id="cropvariety0" name="cropvariety[]" placeholder="Crop Variety" required="required" data-validation-required-message="Please enter crop variety.">
													<p class="help-block text-danger"></p>
												 </div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Crop Variety in Regional Language </label>	
													<input type="text" class="form-control"  maxlength="30" id="cropregional" name="cropregional[]" placeholder="Crop Variety in Regional Language" >
												 </div>
												 <div class="form-group col-md-4 mt-3">
												 <label for="inputAddress2"></label>
												 <button type="button" name="add" id="add" class="btn btn-success mt-3">Add Crop Variety</button>
												 </div>
											</div>
											<table class="table table-bordered text-center mt-4" id="crop_variety">
											   <tbody>
												<tr>
											    </tr>
											</tbody>
											</table>
											<div class="row">													
												<div class="form-group col-md-12 text-center">
												  <div id="success"></div>
													<input id="sendMessageButton" value="Save " class="btn btn-success mt-10" type="submit">
													 <a href="<?php echo base_url('administrator/variety');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button"></a>
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
</body>
</html>
<script>
$(document).ready(function() {
	var i=1;  
	
	$('#sendMessageButton').click(function(){ 
		$('#crop_variety0').each(function(){
			
			if($(this).val() == ""){
				return true;
			}else{
				return false;
			}
		});
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
	   
		$('#crop_variety').append('<tr id="row'+i+'" class="dynamic-added mt-3"><td><input type="text" class="form-control"  maxlength="30" id="cropvariety'+i+'" name="cropvariety[]" placeholder="Crop Variety" required="required" data-validation-required-message="Please enter crop variety."></td><td><input type="text" class="form-control"  maxlength="30" id="cropregional'+i+'" name="cropregional[]" placeholder="Crop Variety in Regional Language" required="required" data-validation-required-message="Please enter crop category in regional language."></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
		}else{			
			swal('',"Provide crop variety");
			return false;
		}	
	
	});
	
	$(document).on('click', '.btn_remove', function(){  
	   var button_id = $(this).attr("id");   
	   $('#row'+button_id+'').remove();  
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
				var div_data = '<option value="">Select Subcategory</option>';
				$.each(responsearr, function(key, value) {						   
					
					div_data +="<option value="+value.id+">"+value.name+"</option>";
				                          							
				});
				$(div_data).appendTo('#cropsubcategory');	    
			}
		});
		}						
	});	


	$('select[name="cropsubcategory"]').change(function() {
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
    $('form').submit(function(e){
	e.preventDefault();
	const addcropvarietydata = $('#addcropvarietyform').serializeObject();
	console.log(addcropvarietydata);
		 $.ajax({
			url:"<?php echo base_url();?>administrator/variety/postvariety",
			type:"POST",
			data:addcropvarietydata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				//response=response.trim();
				responseArray=$.parseJSON(response);
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