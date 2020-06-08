<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.text-right {
	font-style: inherit !important;
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
                        <h1>View Crop Entry</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("fpo/crop"); ?>">Crop Management</a></li>
                            <li class="active">View Crop Entry</li>
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
                     <form id="crop_standardForm" action="<?php //echo base_url('fpo/crop/updatecrop/').$_REQUEST['id']?>" name="sentMessage" method="post" novalidate="novalidate" enctype="multipart/form-data">
                           <input type="hidden" name="category_value" id="category_value" >
                           <input type="hidden" name="sub_category_value" id="sub_category_value" >
                           <input type="hidden" name="crop_value" id="crop_value" > 
                            <input type="hidden" name="variety_value" id="variety_value" > 
                            <input type="hidden" name="class_value" id="class_value" > 

                           <div class="row row-space">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="farmer_id" id="farmer_id" value="<?php echo $croplist->profile_name; ?>" readonly> 
									<!--<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" data-search="true" readonly>
										<option value="">Select farmer</option>
										<?php for($i=0; $i<count($farmers);$i++) { ?>										
										<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
										<?php } ?>								
									</select>-->
                                </div>
								
								<div class="form-group col-md-6">
                                    <label for="inputAddress2">Land Identification</label>
                                    <select id="land_id" name="land_id" class="form-control" data-search="true" disabled>
										<!-- <option value="">Select Land Identification</option>
										<?php for($i=0; $i<count($land);$i++) { ?>										
										<option value="<?php echo $land[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
										<?php } ?>-->						
                                    </select>
                                </div>
                            </div>
                           <div class="row row-space">							
                                <div class="form-group col-md-6">
                                      <label class=" form-control-label">Type of Crop <span class="text-danger">*</span></label>
                                      <div class="row-fluid">
                                        <div class="col-md-4">
                                          <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label">                         
                                            <input type="radio" id="crop_type" name="crop_type" value="1" class="form-check-input" <?php if($croplist->crop_type == 1){echo "checked";} ?> disabled><span class="ml-1">Regular</span>
                                            </label>
                                          </div> 
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-check-inline form-check">
                                            <label for="inline-radio2" class="form-check-label">                         
                                            <input type="radio" id="crop_type" name="crop_type" value="2" class="form-check-input" <?php if($croplist->crop_type == 2){echo "checked";} ?> disabled><span class="ml-1">Multi Crop</span>
                                            </label>
                                           </div>
                                        </div>	
                                        <div class="col-md-4">
                                          <div class="form-check-inline form-check">
                                            <label for="inline-radio2" class="form-check-label">                         
                                            <input type="radio" id="crop_type" name="crop_type" value="3" class="form-check-input" <?php if($croplist->crop_type == 3){echo "checked";} ?> disabled><span class="ml-1">Intercrop</span>
                                            </label>
                                           </div>
                                        </div>										
                                      </div>
                                  </div>                                                               
                                 <div class="form-group col-md-6">
                                     <label for="inputAddress2">Crop Category <span class="text-danger">*</span></label>
									 <input type="text" class="form-control" name="crop_category" id="crop_category" value="<?php echo $croplist->category_name; ?>" readonly> 
                                     <!--<select id="crop_category" name="crop_category" class="form-control" required="required" data-validation-required-message="Please select crop category" readonly onchange="getCropDetail(this.value);" disabled>
                                     <option value="">Select Category</option>
                                     <?php for($i=0; $i<count($category);$i++) { ?>										
                                     <option value="<?php echo $category[$i]->id; ?>"><?php echo $category[$i]->name; ?></option>
                                     <?php } ?>								
                                     </select>-->
                                </div>
                           </div>                          
                           <div class="row row-space">
                             <div class="form-group col-md-6">
                                  <label for="inputAddress2">Crop Sub-category <span class="text-danger">*</span></label>
								  <input type="text" class="form-control" name="crop_subcategory" id="crop_subcategory" value="<?php echo $croplist->subcategory_name; ?>" readonly> 
                                  <!--<select id="crop_subcategory" name="crop_subcategory" class="form-control" required="required" data-validation-required-message="Please select crop subcategory" readonly="true">
                                  <option value="">Select Sub-category</option>
                                  </select>-->
                             </div>
                             <div class="form-group col-md-6">
                                  <label for="inputAddress2">Select Crop Name <span class="text-danger">*</span></label>
                                  <input type="text" class="form-control" name="crop_name" id="crop_name" value="<?php echo $croplist->crop_name; ?>" readonly> 
								  <!--<select id="crop_name" name="crop_name" class="form-control" required="required" data-validation-required-message="Please select crop name" readonly="true">
                                  <option value="">Select Cropname</option>                                      	
								  </select>-->
                             </div>
                           </div>
                            <div class="row row-space">
                                 <div class="form-group col-md-6">
                                     <label for="inputAddress2">Select Variety <span class="text-danger">*</span></label>
									 <input type="text" class="form-control" name="variety" id="variety" value="<?php echo $croplist->variety_name; ?>" readonly> 
                                     <!--<select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select crop variety" data-search="true" readonly="true">
                                     <option value="">Select Variety</option>                                       
                                     </select>-->
                                 </div>
                                <div class="form-group col-md-6">
                                     <label for="inputAddress2">Select Class</label>
                                     <select id="seed_class" name="seed_class" class="form-control" disabled>
                                     <option value="0">Select Class</option> 
                                     <?php for($i=0; $i<count($crop_class);$i++) { 
									 if($crop_class[$i]->id == $croplist->class_id){
									 ?>										
                                     <option value="<?php echo $crop_class[$i]->id; ?>" selected><?php echo $crop_class[$i]->name; ?></option>
                                     <?php }} ?>		
                                     </select>
                                </div>
                           </div>
                            <div class="row row-space">							                                          
                              <div class="form-group col-md-3">
									<label for="inputAddress2">Season <span class="text-danger">*</span></label>
									<select id="season" name="season" class="form-control" required="required" data-validation-required-message="Please select season" disabled>
									<option value="">Select Season</option>
									<?php for($i=0; $i<count($season);$i++){ 
										if($season[$i]->id == $croplist->season_id){
									?>										
										<option value="<?php echo $season[$i]->id; ?>" selected><?php echo $season[$i]->season; ?></option>
									<?php } else { ?>								
										<option value="<?php echo $season[$i]->id; ?>"><?php echo $season[$i]->season; ?></option>
									<?php }} ?>
									</select>
                                </div>
								<div class="form-group col-md-3">                               
                                    <label for="inline-radio1" class="">Date of Seedling <span class="text-danger">*</span></label>
									<input type="date" class="form-control" name="seed_date" id="seed_date" placeholder="Date of seed plant" data-validation-required-message="Please enter date of seed plant" title="If need date picker, click the arrow" value="<?php echo $croplist->seedling_date; ?>" min="<?php echo $beforeMonth; ?>" max="<?php echo $afterMonth; ?>" disabled>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group col-md-2">
                                    <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label"></label>
                                    <input type="checkbox" id="direct_seed" name="direct_seed" value="1" class="form-check-input" <?php if($croplist->is_direct_seeding == 1){echo "checked";} ?> disabled>Direct Seedling
                                    </div>
                                </div>
								<div class="form-group col-md-4">
                                    <label for="inputAddress2">Date of Transplanting </label>
                                    <input type="date" class="form-control" name="transplant_date" id="transplant_date" placeholder="Date of Transplanting" title="If need date picker, click the arrow" value="<?php if($croplist->is_direct_seeding == 0){echo $croplist->transplant_date;} ?>" min="<?php echo $beforeMonth; ?>" max="<?php echo $afterMonth; ?>" onfocusout="calculateExpectedHarverst(this.value);" readonly>
                                </div>
                           </div>
                            <div class="row row-space">
								<div class="form-group col-md-3">
									<label for="inputAddress2">Area <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberonly" id="area" maxlength="3" value="<?php echo $croplist->area; ?>" name="area" placeholder="Area" disabled>
                                </div>
								<div class="form-group col-md-3"  >
                                    <label for="inputAddress">Area UOM <span class="text-danger">*</span></label>
                                 <!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
                                    <select id="area_uom" name="area_uom" class="form-control" required="required" data-validation-required-message="Please select area uom" disabled>
                                    <option value="" >Select</option>
                                    <?php for($i=0;$i<count($area_uom);$i++) { 
										if($area_uom[$i]->id == $croplist->area_uom){
									?>
                                       <option value="<?php echo $area_uom[$i]->id; ?>" selected><?php echo $area_uom[$i]->short_name; ?></option>
									<?php }} ?> 						
                                 </select>
								</div>  
								<div class="form-group col-md-3">
								    <label for="inputAddress2">Quantity of Seed Used <span class="text-danger">*</span></label>
									 <input type="text" class="form-control numberonly" maxlength="4" id="used_seed_qty" name="used_seed_qty" placeholder="Quantity of Seed Used" data-validation-required-message="Please enter seed quantity" value="<?php echo $croplist->seed_qty; ?>" disabled>
                                </div>
								<div class="form-group col-md-3">
										<label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label>
									<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
										<select id="quantity_uom" name="quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom" disabled>
										<option value="" >Select Quantity UOM</option>
										<?php for($i=0;$i<count($quantity_uom);$i++) { 
											if($quantity_uom[$i]->id == $croplist->quantity_uom){
										?>
											<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
										<?php }} ?>  						
									</select>
								</div>        
                           </div>
                            <div class="row row-space"> 								                       
								<div class="form-group col-md-2">
								  <label for="inputAddress2">Cost of Seed</label>
								  <input type="text" class="form-control numberonly text-right" id="seed_cost" value="<?php echo number_format($croplist->seed_cost, 2); ?>" name="seed_cost" placeholder="0.00" disabled>
								</div>
								<div class="form-group col-md-4">
                                    <label for="inputAddress2">Expected Date of Harvest <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="exp_harvest_date" id="exp_harvest_date" placeholder="Expected Date of Harvest" value="<?php echo $croplist->expected_harvest_date; ?>" disabled>
                                </div> 
									
								<?php if($croplist->image){ ?>
                                <div class="form-group col-md-6" id="">
                                    <label for="inputAddress2">Uploaded Photo</label>
									<div><img id="cropImage" class="img-responsive" src="<?php echo asset_url().'uploads/newcrop_entry/'.$croplist->image; ?>" alt="crop image" width="100" height="100" /></div>
                                </div>
								<?php } ?>
							</div>
							
						<div class="col-md-12 text-center">
							<div id="success"></div>
                            <a href="<?php echo base_url('fpo/crop/edit_crop/').$croplist->id; ?>" id="edit" class="btn-fs btn btn-success text-center"><i class="fa fa-edit"></i> Edit New Crop Entry<a>
							<a href="<?php echo base_url('fpo/crop');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>							
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
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<!--<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  -->
<!--<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>-->
<script>
/*$(function(){
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
	$('#transplant_date').attr('max', maxDate);
});



$('#edit').click(function(){
  $('#crop_standardForm').toggleClass('view');
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
      //inp.attr('disabled', 'disabled');
    }
  });
});
     

    
    
//sweetalert
$('a.del').click(function() {
    var popi_id = "<?php //echo $croplist->id; ?>";
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
        url: "<?php echo base_url();?>fpo/crop/deletecrop/"+popi_id,
        type: "POST",
        data: {
           this_delete: popi_id,
        },
        cache: false,
        success: function() {        
           setTimeout(function() {
            window.location.replace("<?php echo base_url('fpo/crop'); ?>");
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
			var crop_id =<?php //echo $_REQUEST['id']; ?>;
			console.log(crop_id);
            // jQuery method
			$.ajax({
			url: "<?php echo base_url();?>fpo/crop/editcrop/"+crop_id,
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
						 
                  var sub_category_id=responseArray.crop_list[0].subcategory_id;
						 
                  var crop_id=responseArray.crop_list[0].crop_id;
						  
                  var variety_id=responseArray.crop_list[0].variety_id;
                  if(responseArray.crop_list[0].image != null) {
                     var imgurl ="<?php echo base_url();?>assets/uploads/newcrop_entry/"+responseArray.crop_list[0].image;
                       document.getElementById("cropImage").src=imgurl;
                       document.getElementById("imgurl").value=imgurl;
                  }else{
                     $('#cropImage').hide();
                  }
										
                    $('input[type=checkbox][name="direct_seed"][value='+responseArray.crop_list[0].is_direct_seeding+']').prop('checked', true);
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
                     document.getElementById("category_value").value=responseArray.crop_list[0].category_id;
                    document.getElementById("sub_category_value").value=sub_category_id;
                    //alert(sub_category_id);
                    document.getElementById("crop_value").value=responseArray.crop_list[0].crop_id;
                     document.getElementById("class_value").value=responseArray.crop_list[0].class_id;
                    document.getElementById("variety_value").value=responseArray.crop_list[0].variety_id;
                      getCropDetail( category_id );
                      getsubcategoryDetail(sub_category_id);
                      //getvarietyDetail( variety_id );
                      getCropnameDetail( crop_id ); 	                      
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
                } 
			},
			error:function(){
			 alert('Error!!! Try again');
			} 
        });			
});*/
	
    
    
/* $('form').submit(function(e){
	e.preventDefault();
	const cropdata = $('#crop_standardForm').serializeObject();
	var crop_id =<?php echo $_REQUEST['id']?>;
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
 
 
$(document).ready(function(){
	var farmer_id = "<?php echo $croplist->farmer_id; ?>";
	var land_id = "<?php echo $croplist->land_id; ?>";
	getlandDetail(farmer_id, land_id);
});	

 
/* 
function getCropDetail( category_id ) {
   var category =document.getElementById("sub_category_value").value;
   //alert(category);
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
                    $("#crop_subcategory option").remove();
						 var subcategory_list = '<option value="">Select Subcategory</option>';
					$.each(responseArray.subcategory_list,function(key,value){
						//$("#crop_subcategory").append($('<option></option>').val(value.id).html(value.name));
					   //subcategory_list += '<option value='+value.id+'>'+value.name+'</option>';
                  if(category == value.id) {
            subcategory_list += '<option value='+value.id+' selected="selected">'+value.name+'</option>';
         }
         else {
            subcategory_list += '<option value='+value.id+'>'+value.name+'</option>';
         }
                  
				    });
					$('#crop_subcategory').html(subcategory_list);
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
      
      var crop_id =document.getElementById("crop_value").value;
      if( subcategory_id !='')
	{   
        $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/cropnamebycategory/"+subcategory_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
						 $("#crop_name option").remove();
                       
                       

						 var name_list = '<option value="">Select Crop Name</option>';
					$.each(responseArray.name_list,function(key,value){
						//$("#crop_name").append($('<option></option>').val(value.id).html(value.name));
                  
					  // name_list += '<option value='+value.id+'>'+value.name+'</option>';
                  if(crop_id == value.id) {
                  name_list += '<option value='+value.id+' selected="selected">'+value.name+'</option>';
                  }
                  else {
                  name_list += '<option value='+value.id+'>'+value.name+'</option>';
                  }
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
			
			
		function getCropnameDetail( name_id ){
 
        variety_id = document.getElementById("variety_value").value;
       // alert(variety_id);
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
						  $("#variety option").remove();
                    var variety_list = '<option value="">Select variety</option>';
					$.each(responseArray.variety_list,function(key,value){
						//$("#variety").append($('<option></option>').val(value.id).html(value.variety));
					   //variety_list += '<option value='+value.id+'>'+value.variety+'</option>';
                     if(variety_id == value.id) {
                     variety_list += '<option value='+value.id+' selected="selected">'+value.variety+'</option>';
                     }
                     else {
                     variety_list += '<option value='+value.id+'>'+value.variety+'</option>';
                     }
				    });
					$('#variety').html(variety_list);
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
		
		
		 	function getvarietyDetail( variety_id ) {
			 var  class_id = document.getElementById("class_value").value;
			 if( variety_id !='')
	  {  	
			 $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/seedByCategory/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                //console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                //console.log(responseArray);
                if(responseArray.status == 1){
                   $("#seed_class option").remove();
                    var class_list = '<option value="">Select Class</option>';
					$.each(responseArray.class_list,function(key,value){

                     if(class_id == value.id) {
                     class_list += '<option value='+value.id+' selected="selected">'+value.class+'</option>';
                     }
                     else {
                     class_list += '<option value='+value.id+'>'+value.class+'</option>';
                     }

				    });
					$('#seed_class').html(class_list);
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
                   
  
  
function pad(n){ return (n > 9 ? "" : "0") + n; }
function calculateExpectedHarverst (transplant_date) {
    var cropname_id = document.getElementById("crop_name").value;
   // alert(cropname_id);
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
                document.getElementById("exp_harvest_date").value = responseArray.exp_harverst_date;
                }else{
                 
                  var seeddate=document.getElementById("seed_date").value; 
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
*/


function getlandDetail(farmer_id, land_id){
    if(farmer_id){	
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/land/"+farmer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				//console.log(response);
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					console.log(responseArray.land_holding_id);
					var land_list = '';
					$.each(responseArray.land_list,function(key,value){
						if(value.id == land_id){
						land_list += '<option value='+value.id+' selected>'+value.identification+'</option>';						
						}
					});
					$('#land_id').html(land_list);
				}
			}, error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	} else {
		swal('Sorry!', 'Please provide mandatory field');
	}
} 

/*
function getlandareaDetail( land_id ) {
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


function readURL(input) {
   var img_url=document.getElementById("imgurl").value;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
            
        reader.onload = function (e) {
            $('#cropImage').remove();
        }
            
        reader.readAsDataURL(input.files[0]);
    }else{
        $('#cropImage').attr('src', e.target.result);
        $('#cropImage').css('display', 'block');
    }
}

  
$("#crop_photo").change(function(){
    readURL(this); 
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
  
function removeImageFromClick(image_url) {
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
}	*/
</script>
</body>
</html>