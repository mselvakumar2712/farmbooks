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
                        <h1>Add Brand</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
									<li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/brandlist');?>">Brands</a></li>
                            <li class="active">Add Brand</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('administrator/masterdata/post_brand')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
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
														  <input type="radio" id="type1" name="type" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check"><span class="ml-1">Fertilizer</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="type2" name="type" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check"><span class="ml-1">Nutrient</span>
														
														</label>
													   </div>
													</div>
													<div class="col-md-4">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="type3" name="type" value="3" class="form-check-input" required="required" data-validation-required-message="Please Check"><span class="ml-1">Pesticide</span>
														
														</label>
													   </div>
													</div>	
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>										
												<div class="form-group col-md-6">
													<label for="inputAddress2">Product <span class="text-danger">*</span></label>
													<select  class="form-control" id="product" name="product" required>
													<option value="">Select Product </option>
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
													 <select  class="form-control" id="manufacturer" name="manufacturer" required>
													<option value="">Select Manufacturer </option>
													<?php for($i=0; $i<count($manufacture);$i++) { ?>										
													 <option value="<?php echo $manufacture[$i]->id; ?>"><?php echo $manufacture[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Brand Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control"   id="brand_name" name="brand_name" placeholder="Brand Name  " required>
												   <p class="help-block text-danger"></p>
												</div>
												
											</div> 
											<div class="form-row mt-2">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/brandlist');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>											 
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
	/* ('#type1').change(function(){
		alert("hi");
		
		 var fertilizer_id = $("#type1").val();
		  //alert(crop_category);
		  getfertilizerdetail( fertilizer_id );
	 });	
	 $('#type2').change(function(){
		
		 var nutrient_id = $("#type2").val();
		  //alert(crop_category);
		  getnutrientDetail( nutrient_id );
	 });	
	  $('#type3').change(function(){
		
		 var pesticide_id = $("#type3").val();
		  //alert(crop_category);
		  getpesticideDetail( pesticide_id );
	 });	 */
	 
	 		
$('#type1').change(function() {
	var fertilizer_id = $("#type1").val();
     $("#product option").remove() ;
       if( fertilizer_id !='')
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
                 $("#product").append($('<option></option>').val(0).html('Select Product'));
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					//var nutrient_list = '<option value="">Select Brandname</option>';
					$.each(responseArray.fertilizer_list,function(key,value){
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
                 $("#product").append($('<option></option>').val(0).html('Select Product'));
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					//var nutrient_list = '<option value="">Select Brandname</option>';
					$.each(responseArray.nutrient_list,function(key,value){
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
                 $("#product").append($('<option></option>').val(0).html('Select Product'));
             }
				 else {
                    $("product").append($('<option></option>').val(0).html(''));  
             }
					
					//var nutrient_list = '<option value="">Select Brandname</option>';
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