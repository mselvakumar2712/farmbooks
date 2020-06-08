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
                        <h1>View Brand</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
									 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/brandlist');?>">Brands</a></li>
                            <li class="active">View Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/updatebrand/'.$brand_info['id'])?>" method="post"  id="editfig" name="sentMessage" novalidate="novalidate" >
                    <input type="hidden" name="brand_id" value="<?php echo $brand_info['id']?>" id="brand_id">
				        <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-6">
												  <label class=" form-control-label">Type <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="type1" name="type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check "disabled><span class="ml-1">Fertilizer</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="type2" name="type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check  "disabled><span class="ml-1">Nutrient</span>
														
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="type3" name="type" value="3" class="form-check-input" required="required" data-validation-required-message="Please Check "disabled><span class="ml-1">Pesticide</span>
														
														</label>
													   </div>
													</div>													
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product" name="product" disabled required>
													<!--<option value="">Select Product </option>-->
													<!--<?php for($i=0; $i<count($manufacture);$i++) { ?>										
													 <option value="<?php echo $manufacture[$i]->id; ?>"><?php echo $manufacture[$i]->name; ?></option>
													<?php } ?>-->
													</select>
													<p class="help-block text-danger"></p>
												</div>	
											
											</div>
											<div class="row row-space">
												
												<div class="form-group col-md-6">
													<label for="inputAddress2">Manufacturer <span class="text-danger">*</span></label>
												<select  class="form-control" id="manufacturer" name="manufacturer" disabled required>
													<option value="">Select Manufacturer</option>								
													<?php  
													foreach($manufacture as $row)
													{ 
													  if($brand_info['manufacture_id']==$row->id){	
													//  echo '<option value="0" selected="selected">All</option>';											  
													  echo '<option value="'.$row->id.'" selected="selected">'.$row->name.'</option>';
													 
													  }
													   echo '<option value="'.$row->id.'">'.$row->name.'</option>';						
													}
													?>
													</select>
													<p class="help-block text-danger"></p>													
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Brand Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control"    value="<?php echo $brand_info['name']?>" maxlength="50" id="brand_name" name="brand_name" placeholder="Brand Name"disabled required>
												<p class="help-block text-danger"></p>
												</div>
												
											</div>
											
											<div class="col-md-12 text-center">
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger">Delete</a>	
												<a href="<?php echo base_url('administrator/masterdata/brandlist');?>" id="ok" class="btn btn-outline-dark">Back</a>
												<a href="<?php echo base_url('administrator/masterdata/brandlist');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
											</div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>	
	
	   
	  	$('#edit').click(function(){
		  $('#editfig').toggleClass('view');
		  $("#sendMessageButton").show();
		  $("#cancel").show();
		  $("#edit").hide();
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
	  $(document).ready(function() {
					var $radios = $('input:radio[name=type]');
					var brand_type='<?php echo $brand_info['type_id']?>';
                    if(brand_type == 1){
                         if($radios.is(':checked') === false) {
                                $radios.filter('[value=1]').prop('checked', true); 
										  getfertilizerdetail();
										  
                        }
                    }else if(brand_type == 2){
                        if($radios.is(':checked') === false) {
                            $radios.filter('[value=2]').prop('checked', true);
									 getnutrientdetail();
                        }
                    }
						  else{
							  if($radios.is(':checked') === false) {
                            $radios.filter('[value=3]').prop('checked', true);
									 getpesticidedetail();
									 
                        }
						  }
						 setTimeout(function(){  
                        document.getElementById("product").value ='<?php echo $brand_info['product']?>';
                    }, 500);
					

	  		
				//sweetalert
			$('a.del').click(function() {
					var brand_id= <?php echo $brand_info['id']?>;
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
						  url: "<?php echo base_url();?>administrator/masterdata/delete_brand/"+brand_id,
						  type: "POST",
						  data: {
							 this_delete: brand_id,
						  },
						  cache: false,
						  success: function() {        
							 setTimeout(function() {
							  window.location.replace("<?php echo base_url('administrator/masterdata/brandlist')?>");
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
						swal("Cancelled", "You have cancelled the pesticide information delete action", "info");
						return false;
					 }
				  }); 
			}); 
			});
			
	$('#type1').change(function() {
	var fertilizer_id = $("#type1").val();
	
	//var brand_type='<?php echo $brand_info['type_id']?>';
     $("#product option").remove() ;
       if( fertilizer_id !='')
			{	
				getnutrientdetail(); 
         } 
		else
			{
				alert('Please provide mandatory field');
			}			
});
function getnutrientdetail()
{
	$.ajax({
					url:"<?php echo base_url();?>administrator/masterdata/fertilizer",
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
					response=response.trim();
					console.log(response);
					responseArray=$.parseJSON(response);
					console.log(responseArray);
					if(responseArray.status==1){	
					if (Object.keys(responseArray).length > 0) {
                 
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					$.each(responseArray.fertilizer_list,function(key,value){
					console.log(value.dosage);
					$("#product").append($('<option></option>').val(value.id).html(value.name));
					
					});
					}

					},
					error:function(response){
					alert('Error!!! Try again');
					} 			
				});
}
function getfertilizerdetail()
{
	$.ajax({
					type:"GET",
					url:"<?php echo base_url();?>administrator/masterdata/nutrient",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
					response=response.trim();
					console.log(response);
					responseArray=$.parseJSON(response);
					console.log(responseArray);
					if(responseArray.status==1){	
					
					if (Object.keys(responseArray).length > 0) {
                 
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }

					$.each(responseArray.nutrient_list,function(key,value){
					console.log(value.dosage);
					$("#product").append($('<option></option>').val(value.id).html(value.name));
					
					});
					}

					},
					error:function(response){
					alert('Error!!! Try again');
					} 			
				}); 
}
 function getpesticidedetail()
 {
	         $.ajax({
					url:"<?php echo base_url();?>administrator/masterdata/pesticide",
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
					response=response.trim();
					console.log(response);
					responseArray=$.parseJSON(response);
					console.log(responseArray);
					if(responseArray.status==1){	
					
					if (Object.keys(responseArray).length > 0) {
                
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					
					$.each(responseArray.pesticide_list,function(key,value){
					
					console.log(value.dosage);
					$("#product").append($('<option></option>').val(value.id).html(value.name));
					
					});
					
					}

					},
					error:function(response){
					alert('Error!!! Try again');
					} 			
				});
 }
$('#type2').change(function() {
	var fertilizer_id = $("#type2").val();
     $("#product option").remove() ;
       if( fertilizer_id !='')
				{	
					
				$.ajax({
					type:"GET",
					url:"<?php echo base_url();?>administrator/masterdata/nutrient",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
					response=response.trim();
					console.log(response);
					responseArray=$.parseJSON(response);
					console.log(responseArray);
					if(responseArray.status==1){	
					
					if (Object.keys(responseArray).length > 0) {
                
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					
					$.each(responseArray.nutrient_list,function(key,value){
					
					console.log(value.dosage);
					$("#product").append($('<option></option>').val(value.id).html(value.name));
					
					});
					
					}

					},
					error:function(response){
					alert('Error!!! Try again');
					} 			
				}); 
         } 
		else
			{
				alert('Please provide mandatory field');
			}			
});

$('#type3').change(function() {
	var fertilizer_id = $("#type3").val();
     $("#product option").remove() ;
       if( fertilizer_id !='')
				{	
				$.ajax({
					url:"<?php echo base_url();?>administrator/masterdata/pesticide",
					type:"GET",
					data:"",
					dataType:"html",
					cache:false,			
					success:function(response) {
					response=response.trim();
					console.log(response);
					responseArray=$.parseJSON(response);
					console.log(responseArray);
					if(responseArray.status==1){	
					
					if (Object.keys(responseArray).length > 0) {
               
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					
					$.each(responseArray.pesticide_list,function(key,value){
					//console.log(value.variety_name);
					console.log(value.dosage);
					$("#product").append($('<option></option>').val(value.id).html(value.name));
					//nutrient_list += '<option value='+value.product+'>'+value.name+'</option>';
					});
					//$('#nutrient_brand_name').html(nutrient_list);
					//$('#fertilizer_variety').html(variety_list);
					//$('#pesticide_variety').html(variety_list);
					//$('#weeding_variety').html(variety_list);
					}

					},
					error:function(response){
					alert('Error!!! Try again');
					} 			
				}); 
         } 
		else
			{
				alert('Please provide mandatory field');
			}			
});


</script>
</body>
</html>