<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 

if(!empty($croplist['image'])){
$directory = 'assets/uploads/newcrop_entry/'.$croplist['image'];
$filecount = 0;
$uploadedImages = glob($directory . "*");
}else{
   $uploadedImages = '';
}
?>
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
                        <h1>Update Crop Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li class="active">Update Crop Entry</li>
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
                     <form  id="crop_standardForm" action="<?php echo base_url('administrator/crop/updatecrop/').$croplist['id']?>" name="sentMessage" method="post" novalidate="novalidate" enctype="multipart/form-data">
                            <div class="row row-space">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
                                    <select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" data-search="true" >
                                            <option value="">Select farmer</option>
                                            <?php for($i=0; $i<count($farmers);$i++) { ?>										
                                            <option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                            <?php } ?>								
                                            </select>
                                    <p class="help-block text-danger"></p>
                                </div>
										  <div class="form-group col-md-6">
                                    <label for="inputAddress2">Land Identification</label>
                                    <select id="land_id" name="land_id" class="form-control"  data-search="true" >
                                            <!-- <option value="">Select Land Identification</option>
                                            <?php for($i=0; $i<count($land);$i++) { ?>										
                                            <option value="<?php echo $land[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
                                            <?php } ?>-->						
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
                                            <input type="radio" id="crop_type" name="crop_type" value="1" class="form-check-input" required><span class="ml-1">Regular</span>                                              
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
                                     <select id="crop_category" name="crop_category" class="form-control" required="required" data-validation-required-message="Please select crop category"  onchange="getCropDetail(this.value);" >
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
                                  <label for="inputAddress2">Crop Sub-category <span class="text-danger">*</span></label>
                                  <select id="crop_subcategory" name="crop_subcategory" class="form-control" required="required" data-validation-required-message="Please select crop subcategory" >
                                  <option value="">Select Sub-category</option>
                                  </select>
                                  <p class="help-block text-danger"></p>
                             </div>
                             <div class="form-group col-md-6">
                                  <label for="inputAddress2">Select Crop Name <span class="text-danger">*</span></label>
                                  <select id="crop_name" name="crop_name" class="form-control" required="required" data-validation-required-message="Please select crop name" >
                                  <option value="">Select Cropname</option>                                      	</select>
                                  <p class="help-block text-danger"></p>
                             </div>
                           </div>
                            <div class="row row-space">
                                 <div class="form-group col-md-6">
                                     <label for="inputAddress2">Select Variety <span class="text-danger">*</span></label>
                                     <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select crop variety" data-search="true" >
                                     <option value="">Select Variety</option>                                       
                                     </select>
                                     <p class="help-block text-danger"></p>
                                    </div>
                                <div class="form-group col-md-6">
                                     <label for="inputAddress2">Select Class</label>
                                     <select id="seed_class" name="seed_class" class="form-control"  >
                                     <option value="0">Select Class</option> 
                                     <?php for($i=0; $i<count($crop_class);$i++) { ?>										
                                     <option value="<?php echo $crop_class[$i]->id; ?>"><?php echo $crop_class[$i]->name; ?></option>
                                     <?php } ?>	
                                     </select>
                                </div>
                           </div>
                            <div class="row row-space">							                                          
                              <div class="form-group col-md-6">
                                        <label for="inputAddress2">Season <span class="text-danger">*</span></label>
                                        <select id="season" name="season" class="form-control" required="required" data-validation-required-message="Please select season" >
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
                                    <input type="checkbox" id="direct_seed" name="direct_seed" value="1" class="form-check-input"  >Direct Seedling
                                    </div>
                                    <label for="inline-radio1" class="form-check-label" >Date of Seedling <span class="text-danger">*</span></label>
									             <input type="date" class="form-control col-md-5" name="seed_date"  id="seed_date" placeholder="Date of seed plant"  data-validation-required-message="Please enter date of seed plant" title="If need date picker, click the arrow" min="<?php echo $beforeMonth; ?>" max="<?php echo $afterMonth; ?>" onfocusout="calculateExpectedHarverst(this.value);" >
                                    <p class="help-block text-danger"></p>
                                 </div>
                           </div>
                            <div class="row row-space"><div class="form-group col-md-3">
												<label for="inputAddress2">Area <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberonly"  id="area" maxlength="3" minlength="" name="area" placeholder="Area" required >
												<p class="help-block text-danger"></p>
                                </div>
										  <div class="form-group col-md-3"  >
                                    <label for="inputAddress">Area UOM <span class="text-danger">*</span></label>
                                 <!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
                                    <select id="area_uom" name="area_uom" class="form-control" required="required" data-validation-required-message="Please select area uom" >
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
									         <p class="help-block text-danger"></p>
                                </div>
                           </div>
                            <div class="row row-space"> 
									 <div class="form-group col-md-3">
								    <label for="inputAddress2">Quantity of Seed Used <span class="text-danger">*</span></label>
									 <input type="text" class="form-control numberonly" maxlength="4" id="used_seed_qty" name="used_seed_qty" placeholder="Quantity of Seed Used" data-validation-required-message="Please enter seed quantity" required >
								    <p class="help-block text-danger"></p>
                                </div>
										  <div class="form-group col-md-3">
											<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
										<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
											<select id="quantity_uom" name="quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom" >
											<option value="" >Select Quantity UOM</option>
												<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
													<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
												<?php } ?>  						
										</select>
										<p class="help-block text-danger"></p>
									</div>                                
                           <div class="form-group col-md-6">
                              <label for="inputAddress2">Cost of Seed</label>
                              <input type="text" class="form-control numberonly" id="seed_cost" step="0.01" name="seed_cost" placeholder="0.00" >
                              <p class="help-block text-danger"></p>
                              </div>
                           </div>
                            <div class="row row-space">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Expected Date of Harvest <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="exp_harvest_date"  id="exp_harvest_date" placeholder="Expected Date of Harvest" required="required" data-validation-required-message="Please enter expected date of harvest" title="If need date picker, click the arrow"readonly="true">
                                 <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-md-6">
														<label for="">Upload Photo <span class="text-danger">(Max upload file size is 20KB)</span></label>
														<input type="file" class="form-control" id="crop_photo" multiple accept="image/jpeg,image/png,image/jpg" name="crop_photo" placeholder="Photo *">
														<p class="help-block text-danger"></p>
										</div>     
                           </div>
                           <div class="row row-space">
                           <div class="form-group col-md-6"></div>
                           <div class="form-group col-md-6"  >
                                       <div class="">
														<?php 
															if($uploadedImages){
																for($i=0;$i<count($uploadedImages);$i++){?>
																<div class="col-md-6" id="<?php echo $croplist['id'].'_'.$i; ?>" onclick="removeImageFromClick(this.id, '<?php echo $uploadedImages[$i]; ?>')">
																	<img src="<?php echo base_url().$uploadedImages[$i]; ?>" id="crop_img" class="img-responsive" width="" height="" alt=""/>
																</div>
														<?php }} ?>
														</div>
                             </div>
                             </div>
                        <div class="col-md-12 text-center">
                           <div id="success"></div>
                              <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"> <i class="fa fa-check-circle"></i> Update New Crop Entry</button>
										<a href="<?php echo base_url('administrator/crop');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
<script src="<?php echo asset_url()?>js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
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
    $('#seed_date').attr('max', maxDate);
});

  
//sweetalert
$('a.del').click(function() {
    var popi_id = <?php echo $croplist['id']?>;
    swal({
     title: '',
     text: 'Do you want to delete this POPI?',
     icon: "",
     buttons: [
       'Cancel',
       'Delete'
     ],
     dangerMode: false,
    }).then(function(isConfirm) {
      if (isConfirm) {
      $(this).prop("disabled", true);
      $.ajax({
        url: "<?php echo base_url();?>administrator/crop/deletecrop/"+popi_id,
        type: "POST",
        data: {
           this_delete: popi_id,
        },
        cache: false,
        success: function() {        
           setTimeout(function() {
            window.location.replace("<?php echo base_url('administrator/crop')?>");
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
      } else {
       swal("Cancelled", "You have cancelled the popi information deleted", "error");
      }
    });
  });
 

  $('#direct_seed').change(function () {
   if(this.checked != true){
        $('#transplant_date').prop('readonly', false);
		 // $('#seed_date').prop('readonly', true);
    } else {
        $('#transplant_date').prop('readonly', true);
		  //$('#seed_date').prop('readonly', false);
    }    
});
  
  $(document).ready(function(){
	       //edit crop API CALL
			var crop_id =<?php echo $croplist['id']; ?>;
            // jQuery method
			$.ajax({
			url: "<?php echo base_url();?>administrator/crop/editcrop/"+crop_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
                console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                if(responseArray.status == 1 && responseArray.crop_list.length > 0){
                    $('input[type=radio][name="crop_type"][value='+responseArray.crop_list[0].crop_type+']').prop('checked', true);                    
                  document.getElementById("crop_category").value=responseArray.crop_list[0].category_id;
                  var category_id=responseArray.crop_list[0].category_id;
						getCropDetail( category_id ); 
                  var sub_category_id=responseArray.crop_list[0].subcategory_id;
						getsubcategoryDetail(sub_category_id);  
                  var crop_id=responseArray.crop_list[0].crop_id;
						getCropnameDetail( crop_id );  
                  var variety_id=responseArray.crop_list[0].variety_id;
						//getvarietyDetail( variety_id ); 					
                    $('input[type=checkbox][name="direct_seed"][value='+responseArray.crop_list[0].is_direct_seeding+']').prop('checked', true);
                    if(responseArray.crop_list[0].is_direct_seeding ==1){
                       $('#transplant_date').prop('readonly', true);
                    }else{
                       $('#transplant_date').prop('readonly', false);
                    }
                    document.getElementById("exp_harvest_date").value=responseArray.crop_list[0].expected_harvest_date;
                    console.log(responseArray.crop_list[0].expected_harvest_date);
                    document.getElementById("area").value=responseArray.crop_list[0].area;                    
                    document.getElementById("used_seed_qty").value=responseArray.crop_list[0].seed_qty;
						  document.getElementById("quantity_uom").value=responseArray.crop_list[0].quantity_uom;
						  document.getElementById("area_uom").value=responseArray.crop_list[0].area_uom;
						  document.getElementById("seed_cost").value=responseArray.crop_list[0].seed_cost;
						  document.getElementById("seed_class").value=responseArray.crop_list[0].class_id;
                    document.getElementById("season").value=responseArray.crop_list[0].season_id;          
                    document.getElementById("farmer_id").value=responseArray.crop_list[0].farmer_id;
                          
						  var farmer_id=responseArray.crop_list[0].farmer_id;
						  getlandDetail( farmer_id );
						  var land_id=responseArray.crop_list[0].land_id;
						  getlandareaDetail( land_id );
						  if(responseArray.crop_list[0].direct_seed==1)
						  {
							  document.getElementById("transplant_date").value=responseArray.crop_list[0].transplant_date;                   
							  //document.getElementById("seed_date").value=responseArray.crop_list[0].transplant_date; 
						  }
						  else
						  {
							   document.getElementById("seed_date").value=responseArray.crop_list[0].transplant_date; 
								//document.getElementById("transplant_date").value=responseArray.crop_list[0].transplant_date;                   
						  }
						  var crop_subcategory = responseArray.crop_list[0].subcategory_id;
                          var crop_name = responseArray.crop_list[0].crop_id;
                          var variety = responseArray.crop_list[0].variety_id;
						  var seed_class = responseArray.crop_list[0].class_id;
						  var land_id = responseArray.crop_list[0].land_id;
                    setTimeout(function(){  
                        document.getElementById("crop_subcategory").value=crop_subcategory;
						document.getElementById("land_id").value=land_id;						
                    }, 500);
					setTimeout(function(){  
                        document.getElementById("crop_name").value=crop_name;  						
                    }, 500);
					setTimeout(function(){  
                        document.getElementById("variety").value=variety; 					
                    }, 500);
					setTimeout(function(){  
						document.getElementById("seed_class").value=seed_class;						
                    }, 500);
                } 
			},
			error:function(){
			 alert('Error!!! Try again');
			} 
        });			
});
	
    
    
/* $('form').submit(function(e){
	e.preventDefault();
	const cropdata = $('#crop_standardForm').serializeObject();
	var crop_id =<?php echo $croplist['id']?>;
	if( cropdata !='')
	{   
	var url="<?php echo base_url();?>fpo/crop/updatecrop/"+crop_id;
	console.log(cropdata);
		 $.ajax({
			url:url,
			type:"POST",
			data:cropdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('fpo/crop')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
        }); 
	}
	else
	{
		alert('Please provide mandatory fields');
	}
});
 */
    
function getCropDetail( category_id ) {
       if( category_id !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/subcategorybycategory/"+category_id,
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
		
      if( subcategory_id !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/cropnamebycategory/"+subcategory_id,
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
      
		 if( name_id !='')
	{  	
        $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/varietybycategory/"+name_id,
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
		/* 	function getvarietyDetail( variety_id ) {
			 
			 if( variety_id !='')
	  {  	
			 $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/seedByCategory/"+variety_id,
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
  
function pad(n){ return (n > 9 ? "" : "0") + n; }
function calculateExpectedHarverst (transplant_date) {
    var cropname_id = document.getElementById("crop_name").value;
   // alert(cropname_id);
	 if( cropname_id !='')
	{   
    $.ajax({
			url:"<?php echo base_url();?>administrator/crop/cropbyname/"+transplant_date+'/'+cropname_id,
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
                 
                  var seeddate=document.getElementById("seed_date").value; console.log(seeddate); 
                  var d = new Date( seeddate); 
                  d.setDate( d.getDate() + 90 ); // add 90 days
                  var seed_date = [d.getFullYear(), pad( d.getMonth()+1) , pad(d.getDate()) ].join("-");
                  document.getElementById('exp_harvest_date').value = seed_date;
            
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
	//alert(farmer_id);
     if( farmer_id !='')
		{
	
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/land/"+farmer_id,
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
			console.log(responseArray.land_holding_id);
			var land_list = '';
			var area_list = '';
		$.each(responseArray.land_list,function(key,value){
			 land_list += '<option value='+value.id+'>'+value.identification+'</option>';
			 document.getElementById("area").value = value.measurement;
			 area_list += '<option value='+value.measurement+'>'+value.full_name+'</option>';
			 //$("#area_uom").append($('<option></option>').val(value.measurement).html(value.full_name));
			//$("#land_id").append($('<option></option>').val(value.id).html(value.identification));
			
		//console.log(value.variety_name);
		//variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
		});
		$('#land_id').html(land_list);
		$('#area_uom').html(area_list);
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
     if( land_id !='')
		{
	  $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/landarea/"+land_id,
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
						console.log(value);
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

   $('#crop_photo').on('change',function() {
   var crop_photo=$(this).val();
   if(crop_photo !=''){
      
     $('#crop_img').hide();
   }
   });
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
  
function removeImageFromClick(image_id, image_url) {
	swal({
      title: "Are you sure?",
      text: "You want to remove the uploaded image?",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) { 
         fileCount--;      
         $.ajax({
              url:"<?php echo base_url();?>fpo/operation/removeImageFromClick",
              type:"POST",
              data:{"image_url":image_url},
              dataType:"html",
              cache:false,			
              success:function(response) {
                  response=response.trim();
                  responseArray=$.parseJSON(response);
                  if(responseArray.status == 1) {
                  location.reload();
               }
              },
              error:function(response){
                  alert('Error!!! Try again');
              } 			
          }); 
      } else {
        swal("Cancelled", "You have cancelled this remove action");
      }
    })	
}	
</script>
</body>
</html>