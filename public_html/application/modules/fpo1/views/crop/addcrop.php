<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: red;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
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
                        <h1>New Crop Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li class="active">New Crop Entry</li>
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
						<form id="crop_standardForm" name="sentMessage" method="post" action="<?php echo base_url('fpo/crop/post_crop')?>" novalidate="novalidate" enctype='multipart/form-data'>
                            
                            <div class="row row-space">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
                                    <select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" data-search="true">
                                            <option value="">Select farmer</option>
                                            <?php for($i=0; $i<count($farmers);$i++) { ?>										
                                            <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                            <?php } ?>								
                                            </select>
                                    <p class="help-block text-danger"></p>
                                </div>
										  <div class="form-group col-md-6">
                                    <label for="inputAddress2">Land Identification</label>
                                    <select id="land_id" name="land_id" class="form-control"  data-search="true">
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            
									<div class="row row-space">							
												  <div class="form-group col-md-6">
														  <label class=" form-control-label">Type of Crop <span class="text-danger">*</span></label>
														  <div class="row-fluid">
															 <div class="col-md-4">
																<div class="form-check-inline form-check">
																  <label for="inline-radio1" class="form-check-label">                         
                                                  <input type="radio" id="crop_type" name="crop_type" value="1" class="form-check-input" checked="checked" required><span class="ml-1">Regular</span>                                              
																  </label>
																</div> 
															 </div>
															 <div class="col-md-4">
																<div class="form-check-inline form-check">
																  <label for="inline-radio2" class="form-check-label">                          
                                                  <input type="radio" id="crop_type" name="crop_type" value="2" class="form-check-input " required><span class="ml-1">Multi Crop</span>
																  </label>
																 </div>
															 </div>	
															 <div class="col-md-4">
																<div class="form-check-inline form-check">
																  <label for="inline-radio2" class="form-check-label">                        
                                                  <input type="radio" id="crop_type" name="crop_type" value="3" class="form-check-input " required><span class="ml-1">Intercrop</span>
																  </label>
																 </div>
															 </div>										
														  </div>
														  <p class="help-block text-danger"></p>
													 </div>
																								  
													 <div class="form-group col-md-6">
															 <label for="inputAddress2">Crop Category <span class="text-danger">*</span></label>
															 <select id="crop_category" name="crop_category" class="form-control" required="required" data-validation-required-message="Please select crop category" data-search="true" >
															 <option value="">Select Category</option>
															 <?php for($i=0; $i<count($category);$i++) { ?>										
															 <option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
															 <?php } ?>								
															 </select>
															 <p class="help-block text-danger"></p>
												  </div>
									  
									</div>
                            
                                                        
							<div class="row row-space">	
                                <div class="form-group col-md-6">
                                        <label for="inputAddress2">Crop Sub-Category <span class="text-danger">*</span></label>
                                        <select id="crop_subcategory" name="crop_subcategory" class="form-control" required="required" data-validation-required-message="Please select crop sub-category" data-search="true">
                                        
                                        						
                                        </select>
                                        <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="inputAddress2">Crop <span class="text-danger">*</span></label>
                                        <select id="crop_name" name="crop_name" class="form-control" required="required" data-validation-required-message="Please select crop name" data-search="true">
                                        
                                        </select>
                                        <p class="help-block text-danger"></p>
                                </div>                                                                
							</div>
                            
                            
                            <div class="row row-space">							                                         
                                <div class="form-group col-md-6">
                                        <label for="inputAddress2">Variety <span class="text-danger">*</span></label>
                                        <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select crop variety" data-search="true">
                                       
                                         
                                        </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                
                                <div class="form-group col-md-6">
                                        <label for="inputAddress2">Select Class</label>
                                        <select id="seed_class" name="seed_class" class="form-control">
                                        <option value="">Select Class</option>
                                        <?php for($i=0; $i<count($crop_class);$i++) { ?>										
                                        <option value="<?php echo $crop_class[$i]->id; ?>"><?php echo $crop_class[$i]->name; ?></option>
                                        <?php } ?>	
                                        </select>
                                </div>
							</div>
                            
                            
                            <div class="row row-space">							                                           
                            <div class="form-group col-md-6">
                                        <label for="inputAddress2">Season <span class="text-danger">*</span></label>
                                        <select id="season" name="season" class="form-control" required="required" data-validation-required-message="Please select season" data-search="true">
                                        <option value="">Select Season</option>
                                        <?php for($i=0; $i<count($season);$i++) { ?>										
                                        <option value="<?php echo $season[$i]->id; ?>"><?php echo $season[$i]->season; ?></option>
                                        <?php } ?>								
                                        </select>
                                        <p class="help-block text-danger"></p>
                                </div>
                                
                        <div class="form-group col-md-6">
                           <div class="form-check-inline form-check col-md-5 mt-3">
                           <label for="inline-radio1" class="form-check-label"></label>
                           <input type="checkbox" id="direct_seed" name="direct_seed" value="1" class="form-check-input" >Direct Seedling
                           </div>
                           <label for="inline-radio1" class="form-check-label">Date of Seedling  <span class="text-danger">*</span></label>
                           <input type="date" class="form-control col-md-5" name="seed_date"  id="seed_date" placeholder="Date of seed plant"  data-validation-required-message="Please enter date of seed plant" title="If need date picker, click the arrow" min="<?php echo $beforeMonth; ?>" max="<?php echo $afterMonth; ?>" onfocusout="calculateExpectedHarverst(this.value);">
                           <p class="help-block text-danger"></p>
                        </div>
							</div>
                            
                            
                            <div class="row row-space">
									 <div class="form-group col-md-3">
								    <label for="inputAddress2">Area <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly"  id="area" maxlength="3" minlength="" name="area" placeholder="Area" required data-validation-required-message="Please select area">
								    <p class="help-block text-danger"></p>
                            </div>
									 <div class="form-group col-md-3">
											<label for="inputAddress">Area UOM<span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
											<select id="area_uom" name="area_uom" class="form-control" required="required" data-validation-required-message="Please select area uom">
											<option value="" >Select</option>
											<?php for($i=0;$i<count($area_uom);$i++) { ?>
												<option value="<?php echo $area_uom[$i]->id; ?>"><?php echo $area_uom[$i]->short_name; ?></option>
											  <?php } ?> 						
										</select>
										<p class="help-block text-danger"></p>
									</div>
                                
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Date of Transplanting </label>
                                    <input type="date" class="form-control" name="transplant_date"  id="transplant_date" placeholder="Date of Transplanting"   title="If need date picker, click the arrow" min="<?php echo $beforeMonth; ?>" max="<?php echo $afterMonth; ?>" onfocusout="calculateExpectedHarverst(this.value);" >
									
                                </div>
							</div>
                            
                            
                            <div class="row row-space"><div class="form-group col-md-3">
								    <label for="inputAddress2">Quantity of Seed Used <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" maxlength="4"  id="used_seed_qty" name="used_seed_qty" placeholder="0000" required>
								    <p class="help-block text-danger"></p>
                                </div>
										   <div class="form-group col-md-3">
											<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
											<select id="quantity_uom" name="quantity_uom" class="form-control" required="required" data-validation-required-message="Please select area uom">
											<option value="" >Select </option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
													<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
												<?php } ?>  						
										</select>
										<p class="help-block text-danger"></p>
									</div>
                                
                                <div class="form-group col-md-6">
								    <label for="inputAddress2">Cost of Seed</label>
                                    <input type="text" class="form-control numberOnly" maxlength="6" minlength="2" step="0.01" name="seed_cost" placeholder="0.00">
								    <p class="help-block text-danger"></p>
                                </div>
							</div>
                            
                            
                            <div class="row row-space">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Expected Date of Harvest <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="exp_harvest_date" required id="exp_harvest_date" placeholder="Expected Date of Harvest"   title="If need date picker, click the arrow" readonly="true">
                               <p class="help-block text-danger"></p>
										 </div>
                                
                                <div class="form-group col-md-6" id="filediv">
                                    <label for="inputAddress2">Upload Photo</label>
                                    <input type="file" class="form-control" class="img-responsive" name="crop_photo" accept="image/jpeg,image/png,image/jpg" id="crop_photo">
                                </div>
							</div>
                            
											        
				            <div class="form-group col-md-12 text-center">
							      <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-floppy-o"></i>  &nbsp; Add New Crop Entry</button>
                                
                        <a href="<?php echo base_url('fpo/crop');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
       
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
          
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script type="text/javascript">
$(document).ready(function(){
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
    $('#seed_date').attr('max', maxDate);
});
});

$('#crop_category').change(function(){
		
		 var crop_category = $("#crop_category").val();
		  //alert(crop_category);
		  getCropDetail( crop_category );
	 });	
   $('#crop_subcategory').change(function(){
		
		 var crop_subcategory = $("#crop_subcategory").val();
		  //alert(crop_category);
		  getsubcategoryDetail( crop_subcategory );
	 });	
 $('#crop_name').change(function(){
		
		 var crop_name = $("#crop_name").val();
		  //alert(crop_category);
		  getCropnameDetail( crop_name );
	 });
  $('#variety').change(function(){
		
		 var variety = $("#variety").val();
		  //alert(crop_category);
		 // getvarietyDetail( variety );
	 });	
	 
	 $('#farmer_id').change(function(){
		
		 var farmer_id = $("#farmer_id").val();
		  //alert(crop_category);
		  getlandDetail( farmer_id );
	 });
	  $('#land_id').change(function(){
		
		 var farmer_id = $("#land_id").val();
		  //alert(crop_category);
		  getlandareaDetail( farmer_id );
	 });
	 
function getCropDetail( category_id ) {
   $("#crop_subcategory option").remove() ;
       if( category_id !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/subcategorybycategory/"+category_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                   if (Object.keys(responseArray).length > 0) {
                $("#crop_subcategory").append($('<option></option>').val(0).html('Select Sub-Category'));
             }
				 else {
                $("#crop_subcategory").append($('<option></option>').val(0).html(''));  
             }


						 //var subcategory_list = '<option value="">Select Subcategory</option>';
					$.each(responseArray.subcategory_list,function(key,value){
						$("#crop_subcategory").append($('<option></option>').val(value.id).html(value.name));
					   //subcategory_list += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					//$('#crop_subcategory').html(subcategory_list);
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
}
	
	
	
	function getsubcategoryDetail( subcategory_id ) {
		 $("#crop_name option").remove() ;
      if( subcategory_id !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/cropnamebycategory/"+subcategory_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
						 $("#crop_name option").remove();
                  /*  if (Object.keys(responseArray).length > 0) {
							 
                    $("#crop_name").append($('<option></option>').val(0).html('Select Crop Name'));
						 }
						 else {
						  $("#crop_name").append($('<option></option>').val(0).html(''));  
						 } */


						 var name_list = '<option value="">Select Crop Name</option>';
					$.each(responseArray.name_list,function(key,value){
						//$("#crop_name").append($('<option></option>').val(value.id).html(value.name));
					   name_list += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					$('#crop_name').html(name_list);
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
	}
			
			
	function getCropnameDetail( name_id ) {
       $("#variety option").remove() ;
		 if( name_id !='')
	{  	
        $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/varietybycategory/"+name_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
						 
						 if (Object.keys(responseArray).length > 0) {
                    $("#variety").append($('<option></option>').val(0).html('Select Variety'));
                   }
				       else {
                    $("#variety").append($('<option></option>').val(0).html(''));  
                   }
                    //var variety_list = '<option value="">Select variety</option>';
					$.each(responseArray.variety_list,function(key,value){
						$("#variety").append($('<option></option>').val(value.id).html(value.variety));
					   //variety_list += '<option value='+value.id+'>'+value.variety+'</option>';
				    });
					//$('#variety').html(variety_list);
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
	}
 
 /* function getvarietyDetail( variety_id ) {
			 $("#seed_class option").remove() ;
			 if( variety_id !='')
	  {  	
			 $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/seedByCategory/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
						 if (Object.keys(responseArray).length > 0) {
                     $("#seed_class").append($('<option></option>').val(0).html('Select Class'));
                    }
				       else {
                    $("#seed_class").append($('<option></option>').val(0).html(''));  
                     }
						 
                    //var class_list = '<option value="">Select Class</option>';
					$.each(responseArray.class_list,function(key,value){
						$("#seed_class").append($('<option></option>').val(value.id).html(value.class));
					   //class_list += '<option value='+value.id+'>'+value.class+'</option>';
				    });
					//$('#seed_class').html(class_list);
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
}                  
 */

var seed_date=document.getElementById("seed_date").value;
if(seed_date !='') {
   calculateExpectedHarverst (seed_date);
}
function pad(n){ return (n > 9 ? "" : "0") + n; }
function calculateExpectedHarverst (transplant_date) {
    var cropname_id = document.getElementById("crop_name").value;
	  if( cropname_id !='')
	{   
    $.ajax({
			url:"<?php echo base_url();?>fpo/crop/cropbyname/"+transplant_date+'/'+cropname_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.tenureDays != null){
                document.getElementById("exp_harvest_date").value = responseArray.exp_harverst_date;//alert(responseArray.exp_harverst_date);
                }else{
                 
                  var seeddate=document.getElementById("seed_date").value; 
                  var d = new Date( seeddate); 
                  d.setDate( d.getDate() + 90 ); // add 90 days
                  var seed_date = [d.getFullYear(), pad( d.getMonth()+1) , pad(d.getDate()) ].join("-");
                  document.getElementById('exp_harvest_date').value = seed_date;
            
               }
            },
			error:function(response){
            document.getElementById("seed_date").value='';
				alert('Error!!! Try again');
			} 			
         });
	}
  else
	{
      document.getElementById("seed_date").value='';
		alert('Please select crop fields');
      
	}			
}
    
    
$('#direct_seed').change(function () {
    if(this.checked != true){
        $('#transplant_date').prop("disabled", false);
    } else {
        $('#transplant_date').prop("disabled", true);
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

function getlandDetail( farmer_id ) {
    $("#land_id option").remove() ;
     if( farmer_id !='')
		{
	
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/land/"+farmer_id,
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
         $("#land_id").append($('<option></option>').val(0).html('Select Land Identification'));			
         $.each(responseArray.land_list,function(key,value){
            $("#land_id").append($('<option></option>').val(value.id).html(value.identification));
            
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
 }

  function getlandareaDetail( land_id ) {
   //  alert(land_id);
     
     if( land_id !='')
		{
	  $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/landarea/"+land_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                    var landarea_list = '';
					$.each(responseArray.landarea_list,function(key,value){
						console.log(landarea_list);
						document.getElementById("area").value = value.measurement;
					   landarea_list += '<option value='+value.measurement_unit+'>'+value.full_name+'</option>';
				    });
					$('#area_uom').html(landarea_list);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         });; 
		}
		else
		{
			alert('Please provide mandatory field');
		}
} 
var fileCount = 0;
var storedFiles = [];

   if (window.File && window.FileList && window.FileReader) {
      $("#crop_photo").on("change", function(e) {		 	
         var files = e.target.files,
         filesLength = files.length;
         fileCount = fileCount + filesLength;
         if(fileCount > 1){
               fileCount = fileCount - filesLength;
               $("#crop_photo").val('');
               swal('Sorry', "Maximum 1 images allowed to upload");		
               return false;
         }
         for (var i = 0; i < filesLength; i++) {
             var f = files[i];
             var FileSize = f.size / 1024;
             if(f.size > 20480) {
               fileCount = fileCount - filesLength;
               $("#crop_photo").val('');
               swal('', "File size exceeds 20 KB");					 
               return false;
             }
             var filetype = f.type;
             if(filetype =='image/jpeg' || filetype =='image/jpg' || filetype =='image/png'){
             }else {   
               fileCount = fileCount - filesLength;
               $("#crop_photo").val('');
               swal('',"Only image file allowed to upload");
               return false;
             }
         }
         var temp_length=files.length;
         for (var i = 0; i < temp_length; i++) {
            var file = files[i];
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
               $("<span class=\"pip\">" +
               "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
               "<br/><span id=\""+ file.name +"\" class=\"remove\">Remove image</span>" +
               "</span>").insertAfter("#crop_photo");
               
            });
            fileReader.readAsDataURL(file);
         }
         var filesArr = Array.prototype.slice.call(files);
         filesArr.forEach(function(f) {
            storedFiles.push(f);
         }); 
      
      });
  } else {
    alert("Your browser doesn't support to File API")
  }
  
  $(document).on('click', '.remove', function() {
      fileCount--;
      var filename = $(this).attr('id');
      for(var i=0; i<storedFiles.length; i++) {
         if(storedFiles[i].name == filename) {
            storedFiles.splice(i, 1);
            break;
         }
      }
      $("#crop_photo").val('');
      $(this).parent(".pip").remove();
  });

</script>
</body>
</html>