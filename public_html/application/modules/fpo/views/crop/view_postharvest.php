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
            <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Post Harvest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/postharvest");?>">Post Harvest</a></li>
                            <li class="active">View Post Harvest</li>
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
										<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="view_postharvest">
											
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
														<!--<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer"  onchange="getVarietyDetail(this.value);" readonly data-search="true">
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>										
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
														</select>-->
													<input type="text" name="farmer_id" id="farmer_id" class="form-control" value="<?php echo $postharvest_list->profile_name; ?>" disabled>
												</div>
												<div class="form-group col-md-6 ">
													<label for="inputAddress2">Date<span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="date" id="date" placeholder="Date" disabled value="<?php echo $postharvest_list->process_date; ?>">
												</div>
											</div>
											<div class="row rowspace">
												<div class="form-group col-md-4">
													<label for="inputState">Select Variety<span class="text-danger">*</span></label>
													<input type="text" name="variety" id="variety" class="form-control" value="<?php echo $postharvest_list->variety_name; ?>" disabled>
												</div>
												<div class="form-group col-md-4">	
													<label for="inputAddress2">Type of Work <span class="text-danger">*</span> </label>
													<select  class="form-control" id="type_of_work" name="type_of_work" disabled>
														<option value="">Select Type of Work</option>
														<?php for($i=0;$i<count($worktype);$i++){ 
														if($worktype[$i]->id == $postharvest_list->work_type){
														?>
														<option value="<?php echo $worktype[$i]->id; ?>" selected><?php echo $worktype[$i]->name; ?></option>
														<?php }} ?>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label class=" form-control-label">Available for Sale</label>
													<div class="row">
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="inline-radio1" class="form-check-label">
																	<input type="radio" id="available1" name="available" disabled value="1" class="form-check-input" <?php if($postharvest_list->sale_available == 1){echo "checked";} ?>><span class="ml-1">Yes</span>
																</label>
															</div> 
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="inline-radio2" class="form-check-label">
																	<input type="radio" id="available2" name="available" disabled value="2" class="form-check-input" <?php if($postharvest_list->sale_available != 1){echo "checked";} ?>><span class="ml-1">No</span>
																</label>
															</div>
														</div>			
													</div>
												</div>												
											</div>
											<div class="row rowspace mt-2 mb-4">													
													<div class="form-group col-md-4">	
														<label for="inputAddress2">Input<span class="text-danger">*</span> </label>
														<select  class="form-control" id="input" name="input" disabled>
															<option value="">Select Input </option>
															<?php for($i=0; $i<count($cropname);$i++){
																if($cropname[$i]->id == $postharvest_list->crop_input_id){
															?>
															<option value="<?php echo $cropname[$i]->id; ?>" selected><?php echo $cropname[$i]->name; ?></option>
															<?php } else { ?>
															<option value="<?php echo $cropname[$i]->id; ?>"><?php echo $cropname[$i]->name; ?></option>
															<?php }} ?>
														</select>
													</div>
													<div class="form-group col-md-2 ">
														<label for="inputAddress2">Input(Qty)<span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" disabled maxlength="6" name="input_qty" id="input_qty" placeholder="Input(Qty)" value="<?php echo $postharvest_list->input_qty; ?>" >
													</div>
													<div class="form-group col-md-2">
														<label for="inputAddress">Input (Qty UOM)<span class="text-danger">*</span></label>
														<select id="input_qty_uom" name="input_qty_uom" class="form-control" disabled>
														<option value="" >Select Quantity UOM</option>
														<?php for($i=0;$i<count($quantity_uom);$i++){
														if($quantity_uom[$i]->id == $postharvest_list->input_qty_uom){
														?>
															<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
														<?php }} ?> 						
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Cost of Post Harvesting </label>
													<input type="text" class="form-control numberOnly text-right" disabled maxlength="6" name="cost_post_harvesting" id="cost_post_harvesting" placeholder="Cost of Post Harvesting" value="<?php echo number_format($postharvest_list->post_harvesting_cost, 2); ?>">
												</div>
											</div>
											
										<!--<div class="col-md-12" id="div1">
										<table>
										<tbody id="dynamic_field">-->
										<?php for($i=0;$i<count($post_harvest_output);$i++){ ?>
											<div class="row rowspace mt-3">
												<div class="form-group col-md-4">
													<label for="inputAddress">Output Product <span class="text-danger">*</span></label> 
													<input type="text" id="output_product" value="<?php echo $post_harvest_output[$i]->output_product; ?>" name="output_product[]" class="form-control" disabled>
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label>
													<input type="text" id="output_qty" value="<?php echo $post_harvest_output[$i]->output_qty; ?>" name="output_qty[]" disabled class="form-control" >
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
													<select id="output_quantity_uom" name="output_quantity_uom[]" disabled class="form-control">
														<option value="" >Select UOM</option>
														<?php for($j=0;$j<count($quantity_uom);$j++){ 
														if($quantity_uom[$j]->id == $post_harvest_output[$i]->output_qty_uom){
														?>
														<option value="<?php echo $quantity_uom[$j]->id; ?>" selected><?php echo $quantity_uom[$j]->short_name; ?></option> 
														<?php }} ?>
													</select>
												</div>
												<?php if($post_harvest_output[$i]->sale_available == 1){ ?>
												<div class="form-group col-md-2">
													<label for="inputAddress">Sales Quantity </label> 
													<input type="text" id="quantity_uom" disabled value="<?php echo $post_harvest_output[$i]->qty_for_sale; ?>" name="quantity_uom[]" class="form-control" >
												</div>
												<div class="form-group col-md-2">
													<label for="inputAddress">Quantity UOM </label>
													<select id="sales_qty_uom" disabled name="sales_qty_uom[]" disabled class="form-control" >
														<option value="" >Select Quantity UOM</option>
														<?php for($k=0;$k<count($quantity_uom);$k++){ 
														if($quantity_uom[$k]->id == $post_harvest_output[$i]->sales_qty_uom){
														?>
														<option value="<?php echo $quantity_uom[$k]->id; ?>" selected><?php echo $quantity_uom[$k]->short_name; ?></option> 
														<?php }} ?>
													</select>
												</div>
												<?php } ?>
											</div>
										<?php } ?>
										<!--</tbody>
										</table>
										</div>-->
									
									<div class="row rowspace"></div>
									<div class="row rowspace">													
										<div class="form-group col-md-6" id="uom" style="display:none;"></div>
									</div>
											
                                   <div class="col-md-12 text-center">
                                       <div id="success"></div>                                       
										<a href="<?php echo base_url('fpo/updatecrop/editpostharvest/').$postharvest_list->id?>" id="edit" class="btn-fs btn btn-success text-center"><i class="fa fa-edit"></i> Edit </a>
										<a href="<?php echo base_url('fpo/updatecrop/postharvest');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>                                       
                                  </div> 
                                                                 
										</form>
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
	 
<script>
/*
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
    //alert(maxDate);
    $('#date').attr('max', maxDate);
});
	
$('#available1').change(function() {
    if(this.checked) {
        $('#div2').show();
        //$('#internetpayment').hide();
    }
});
$('#available2').change(function() {
    if(this.checked) {
        $('#div2').hide();
        //$('#internetpayment').hide();
    }
}); 
	
$('#edit').click(function(){
	  $('#sentMessage').toggleClass('view');
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



$(document).ready(function(){
      var postharvest_id = "<?php //echo $postharvest_list->id;?>";
      // jQuery method
	   $.ajax({
			url: "<?php echo base_url();?>fpo/updatecrop/editpostharvest/"+postharvest_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		
         //console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
                
			if(responseArray.status == 1){
                document.getElementById("date").value=responseArray.postharvest_list[0].process_date;
					 //alert(responseArray.postharvest_list[0].farmer_id);
					
                document.getElementById("farmer_id").value=responseArray.postharvest_list[0].farmer_id;
					 var farmer_id=responseArray.postharvest_list[0].farmer_id; 
					 getVarietyDetail(farmer_id);
				    var input=responseArray.postharvest_list[0].crop_id;
				    getinputDetail( input );
					 var output=responseArray.postharvest_list[0].crop_input_id;
               //  alert(responseArray.postharvest_list[0].crop_input_id);
                
				    getoutputDetail( output );
                
             //   console.log(getCropByName);
                
                document.getElementById("variety").value=responseArray.postharvest_list[0].crop_id;
                document.getElementById("type_of_work").value=responseArray.postharvest_list[0].work_type;
                document.getElementById("input").value=responseArray.postharvest_list[0].crop_input_id;
                document.getElementById("input_qty").value=responseArray.postharvest_list[0].input_qty;
                
                //alert(responseArray.postharvest_list[0].input_qty);
                
                
                
                
                
					 //document.getElementById("type_of_work").value=responseArray.postharvest_list[0].work_type;
					 document.getElementById("cost_post_harvesting").value=responseArray.postharvest_list[0].post_harvesting_cost;
					 document.getElementById("input_qty_uom").value=responseArray.postharvest_list[0].input_qty_uom;
					 document.getElementById("harvest_id").value=responseArray.postharvest_list[0].harvestid;
					
                if(responseArray.postharvest_list[0].sale_available == 1) {
                  $('input[type=radio][name="available"][value='+responseArray.postharvest_list[0].sale_available+']').prop('checked', true);
						$('#div').show();
						document.getElementById("uom").value=responseArray.postharvest_list[0].qty_for_sale;
                  
                } else {
                  $('input[type=radio][name="available"][value='+responseArray.postharvest_list[0].sale_available+']').prop('checked', true);
						$('#div').hide();
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
	var postharvest_id = "<?php //echo $postharvest_list->id;?>";
   //alert(postharvest_id);
  
	const viewharvestdata = $('#view_postharvest').serializeObject();
   
    console.log(viewharvestdata);
   
	if( viewharvestdata !='')
		{
     console.log(viewharvestdata);
	var url="<?php echo base_url();?>fpo/updatecrop/updatepostharvest/"+postharvest_id;
		 $.ajax({
			url:url,
			type:"POST",
			data:viewharvestdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('fpo/updatecrop/postharvest')?>";
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


/*	
function getVarietyDetail(farmer_id){
	if(farmer_id!=''){
	 $.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/postharvestvariety/"+farmer_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		//console.log(response);
		responseArray=$.parseJSON(response);
		if(responseArray.status==1){

		var variety_list = '';
		$.each(responseArray.variety_list,function(key,value){
		variety_list += '<option value='+value.variety_id+'>'+value.variety_name+'</option>';
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
	
	
function getinputDetail(crop_id){
	 if( crop_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/inputmaster/"+crop_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		//console.log(response);
		responseArray=$.parseJSON(response);
		if(responseArray.status==1){
		var input_list = '';
		$.each(responseArray.input_list,function(key,value){
		//console.log(value.input_list);
		var crop_output = value.crop_output.split(",");
		for(i=0;i<crop_output.length;i++)
		{
		input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';
		
		}});
		$('#input').html(input_list);
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


function getoutputDetail(input_id){
	 if( input_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/outputmaster/"+input_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		//console.log(response);
		responseArray=$.parseJSON(response);
      	var output_list = "";
		var sale_list = "";
		if(responseArray.output_list.length != 0){
           var test=0;
	
		$.each(responseArray.output_list,function(key,value){

			output_list += '<tbody id="dynamic_field"><tr class="row row-space"><td class="col-md-4 form-group"><label for="inputAddress">Output</label> <input type="text" id="output_product" value="'+value.output_name+'" name="output_product[]" class="form-control"></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty" value='+value.output_qty+' name="output_qty[]" disabled class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
			<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
			(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->short_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
			<?php } ?>
			output_list += '</select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_0" class="btn btn-danger btn_remove">-</button>&nbsp;&nbsp;<button type="button" name="add" id="add_0" class="btn btn-success btn_add">+</button></td> </tr></tbody>';
			
			sale_list += '<tbody id="output_field"><tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales Quantity</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)" disabled value='+value.qty_sales+' name="quantity_uom[]" class="form-control" ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" disabled name="sales_qty_uom[]" disabled class="form-control" ><option value="" >Select Quantity UOM</option>';
			<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
			(value.sales_qty_uom == <?php echo $quantity_uom[$i]->id?>) ? sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->short_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
			<?php } ?>
			sale_list += '</select></td></tr></tbody>';							
            test++;   
		});
      
      } else {
		   output_list += '<tbody id="dynamic_field"><tr id="row0" class="row row-space" ><td class="col-md-4 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product" name="output_product[]" class="form-control make" required></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty" name="output_qty[]"  class="form-control" required ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control" required ><option value="" >Select</option>';
		   <?php for($i=0;$i<count($quantity_uom);$i++) { ?>
		   output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
		   <?php } ?>
		   output_list += '</select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_0" style="display:none;" class="btn btn-danger btn_remove">-</button>&nbsp;&nbsp;<button type="button" name="add" id="add_0" class="btn btn-success btn_add">+</button></td> </tr></tbody>';
		   sale_list += '<tbody id="output_field"><tr class="row_child row-space"><td class="col-md-4 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)"  name="quantity_uom[]" class="form-control"></td><td class="col-md-4 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom"  name="sales_qty_uom[]"  class="form-control"><option value="" >Select</option>';
		   <?php for($i=0;$i<count($quantity_uom);$i++) { ?>
			sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
		   <?php } ?>
		   sale_list += '</select></td></tr></tbody>'; 
      }
      
     $('#div1').html(output_list);
		$('#div2').html(sale_list);
	
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
 
 
/* 
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

function myFunction( quantity_uom) {
		 var input2 = quantity_uom;
       var input1 = Number(document.getElementById( "output_qty" ).value);
		 console.log(input1);
		
		
		if(input2 >= input1 ){
		swal('','Sales Qty cannot be greater than Output Qty');
		document.getElementById("sendMessageButton").disabled = true;
		}
		else {
		document.getElementById("sendMessageButton").disabled =false;
		}
}*/


$(document).ready(function(){
	//var cropInputId = "<?php echo $postharvest_list->crop_id; ?>";
	//getoutputDetail(cropInputId);
	
   /*
   	$(document).on('click', '#sendMessageButton', function(){ 
		var validate = true;
		$('#dynamic_field').find('input[type=text],select').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Provide all the data");
			return false;
		}
		
	});
   
 
		var i=0;
		var j=0;	
		var rowCount=0;    
		$(document).on('click', '.btn_add', function(){ 		
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
			});

		if(validate){
			document.getElementById("sendMessageButton").disabled =false;
		
			j=i;
			i++;
         rowCount++;
       
      
			$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added row row-space"><td class="col-md-4"><label for="inputAddress">Output <span class="text-danger">*</span></label><select type="text" id="output_product'+i+'" name="output_product[]" class="form-control make"></select></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty'+i+'" maxlength="6" name="output_qty[]" class="form-control numberOnly" required ></td><td class="col-md-3"><label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control" required ><option value="" >Select</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?> </select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display: none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
           $("#output_product"+i).select2({           
            placeholder: "Select output", //placeholder
            tags: true
         });

       $('#output_field').append('<tr id="row_child'+i+'" class="dynamic-added row row-space"><td class="col-md-3"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom'+i+'" onfocusout="myFunction(this.value)"  name="quantity_uom[]" class="form-control"></td><td class="col-md-3"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom'+i+'"  name="sales_qty_uom[]"  class="form-control"><option value="" >Select</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?></select></td></tr>');  
         
           $(".btn_add").click(function () { 
               var totalRowCount = $("#dynamic_field tr").length;
               var rowCount = $("#dynamic_field td").closest("tr").length;
               if(rowCount>=5){
                  swal('',"Maximum of 5 Output only");
                  return false;                 
               }
              var message = "Total Row Count: " + totalRowCount;
               message += "\nRow Count: " + rowCount;
          });
          
         getCropByName("output_product"+i);          
         $('#add_'+j).hide();
         $('#remove_'+j).show();          
         initnumberOnly();   
			
			return true;
		}else{
			swal('',"Provide the Data's");
			return false;
		}
		});
	
	
	$(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");           
        var arr = $(this).attr("id").split("_"); 
         rowCount--;
        // console.log(k);
             
        $('#row'+arr[1]).remove();
        $('#row_child'+arr[1]).remove();
	});
       */    
});

/*
function getCropByName(output_product){
	$.ajax({
	  url:"<?php echo base_url();?>fpo/updatecrop/getCropByName",
	  type:"GET",
	  data:"",
	  dataType:"html",
	  cache:false,			
	  success:function(response) {
	 response=response.trim();                
	 responseArray=$.parseJSON(response);
		if(responseArray.status == 1){
			if (Object.keys(responseArray).length > 0) {
				$("#"+output_product).append($('<option></option>').val('').html('Select output'));
			}
			$.each(responseArray.crop_name,function(key,value){
				$("#"+output_product).append($('<option></option>').val(value.id).html(value.output_product));
			});
		}     
	  },
	  error:function(response){
		alert('Error!!! Try again');
	  }  			
	}); 
} 
*/

</script>
</body>
</html>
