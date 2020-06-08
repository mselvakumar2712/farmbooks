<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.select2-container .select2-selection--single .select2-selection__rendered{
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single{
    background-color: #fff;
    border: none !important; 
    border-radius: 4px;
}
.select2-selection__arrow{
    top: 5px !important;
}
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
                        <h1>Edit Post Harvest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/postharvest");?>">Post Harvest</a></li>
                            <li class="active">Edit Post Harvest</li>
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
										<form  name="sentMessage" method="post" action="<?php echo base_url('fpo/updatecrop/updatepostharvest/').$postharvest_list->id; ?>" novalidate="novalidate" id="view_postharvest">										
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
													<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" readonly >
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++){ 
														if($farmers[$i]->id == $postharvest_list->farmer_id){
														?>										
														<option value="<?php echo $farmers[$i]->id; ?>" selected><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } else { ?>
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php }} ?>
													</select>
												</div>
												<div class="form-group col-md-6 ">
													<label for="inputAddress2">Date <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $postharvest_list->process_date; ?>">
												</div>
											</div>
											<div class="row rowspace">
												<div class="form-group col-md-4">
													<label for="inputState">Select Variety <span class="text-danger">*</span></label>
													<select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety">
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">	
													<label for="inputAddress2">Type of Work <span class="text-danger">*</span> </label>
													<select  class="form-control" id="type_of_work" name="type_of_work">
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
																	<input type="radio" id="available1" name="available" value="1" class="form-check-input" <?php if($postharvest_list->sale_available == 1){echo "checked";} ?>><span class="ml-1">Yes</span>
																</label>
															</div> 
														</div>
														<div class="col-md-6">
															<div class="form-check-inline form-check">
																<label for="inline-radio2" class="form-check-label">
																	<input type="radio" id="available2" name="available" value="2" class="form-check-input" <?php if($postharvest_list->sale_available != 1){echo "checked";} ?>><span class="ml-1">No</span>
																</label>
															</div>
														</div>			
													</div>
												</div>													
											</div>
											<div class="row rowspace">													
													<div class="form-group col-md-4">	
														<label for="inputAddress2">Input <span class="text-danger">*</span> </label>
														<select class="form-control" id="input" name="input">
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
													<div class="form-group col-md-2">
														<label for="inputAddress2">Input(Qty) <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" maxlength="6" name="input_qty" id="input_qty" placeholder="Input(Qty)" value="<?php echo $postharvest_list->input_qty; ?>" >
													</div>
													<div class="form-group col-md-3">
														<label for="inputAddress">Input (Qty UOM) <span class="text-danger">*</span></label>
														<select id="input_qty_uom" name="input_qty_uom" class="form-control">
														<option value="" >Select Quantity UOM</option>
														<?php for($i=0;$i<count($quantity_uom);$i++){
														if($quantity_uom[$i]->id == $postharvest_list->input_qty_uom){
														?>
														<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>
														<?php } else { ?> 
														<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														<?php }} ?> 	
													</select>
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Cost of Post Harvesting </label>
													<input type="text" class="form-control numberOnly text-right" maxlength="10" name="cost_post_harvesting" id="cost_post_harvesting" placeholder="0.00" value="<?php echo number_format($postharvest_list->post_harvesting_cost, 2, '.', ''); ?>">
												</div>
											</div>
											
									<div class="row rowspace">
										<div class="col-md-8" id="div1">
											<table>
											<tbody id="dynamic_field">
											<?php for($i=0;$i<count($post_harvest_output);$i++){ ?>										
											<tr id="<?php echo 'row_child'.$i; ?>" class="row row-space">
												<td class="col-md-4 form-group">
													<input type="hidden" id="output_product_id" name="output_id[]" class="form-control" value="<?php echo $post_harvest_output[$i]->id; ?>" >
													<label for="inputAddress">Output Product <span class="text-danger">*</span></label> 
													<input type="text" id="output_product" name="output_product[]" class="form-control make" value="<?php echo $post_harvest_output[$i]->output_product; ?>" required readonly>
												</td>
												<td class="col-md-3 form-group">
													<label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label>
													<input type="text" id="output_qty" name="output_qty[]" class="form-control" required value="<?php echo $post_harvest_output[$i]->output_qty; ?>" placeholder="000">
												</td>
												<td class="col-md-3 form-group"> 
													<label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label>
													<select id="output_quantity_uom" name="output_quantity_uom[]" class="form-control" required >
														<option value="" >Select UOM</option>
														<?php for($j=0;$j<count($quantity_uom);$j++){ 
														if($quantity_uom[$j]->id == $post_harvest_output[$i]->output_qty_uom){
														?>
														<option value="<?php echo $quantity_uom[$j]->id; ?>" selected><?php echo $quantity_uom[$j]->short_name; ?></option>
														<?php } else { ?>
														<option value="<?php echo $quantity_uom[$j]->id; ?>" ><?php echo $quantity_uom[$j]->short_name; ?></option>
														<?php }} ?>
													<select>
												</td>
												<td class="col-md-2 mt-4">
													<button type="button" name="remove" id="<?php echo 'remove_'.$i; ?>" data-count="2" <?php if($i == (count($post_harvest_output)-1)){ ?>style="display:none;"<?php } ?> class="btn btn-danger btn_remove js-showhide">-</button>&nbsp;&nbsp;<button type="button" name="add" id="<?php echo 'add_'.$i; ?>" class="btn btn-success btn_add" <?php if($i != (count($post_harvest_output)-1)){ ?>style="display:none;"<?php } ?>>+</button>
												</td>
												</tr>
											<?php } ?>
											</tbody>
											</table>
										</div>
										<div class="col-md-4" id="div2">
											<table>
											<tbody id="output_field">
											<?php for($i=0;$i<count($post_harvest_output);$i++){ ?>
											<tr id="<?php echo 'row_child_'.$i; ?>" class="row row-space">
												<td class="form-group col-md-6">
													<label for="inputAddress">Sales (Qty)</label> 
													<input type="text" id="quantity_uom" name="quantity_uom[]" class="form-control" value="<?php echo $post_harvest_output[$i]->qty_for_sale; ?>" placeholder="000">
												</td>
												<td class="form-group col-md-6"> 
													<label for="inputAddress">Quantity UOM</label>
													<select id="sales_qty_uom" name="sales_qty_uom[]" class="form-control">
														<option value="" >Select UOM</option>
														<?php for($k=0;$k<count($quantity_uom);$k++){ 
														if($quantity_uom[$k]->id == $post_harvest_output[$i]->sales_qty_uom){
														?>
														<option value="<?php echo $quantity_uom[$k]->id; ?>" selected><?php echo $quantity_uom[$k]->short_name; ?></option> 
														<?php } else { ?>
														<option value="<?php echo $quantity_uom[$k]->id; ?>" ><?php echo $quantity_uom[$k]->short_name; ?></option> 
														<?php }} ?>
													</select>
												</td>
											</tr>
											<?php } ?>
											</tbody>
											</table>
										</div>												
									</div>
									
									<div class="row rowspace"></div>
									<div class="row rowspace">													
										<div class="form-group col-md-6" id="uom" style="display:none;"></div>
									</div>
											
                                   <div class="col-md-12 text-center">
                                       <div id="success"></div>
                                       <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-check-circle"></i> Update</button>
                                       <a href="<?php echo base_url('fpo/updatecrop/postharvest');?>" id="cancel" class="btn-fs btn btn-outline-dark" ><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>	 
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
    $('#date').attr('max', maxDate);
});
	
$('#available1').change(function() {
    if(this.checked) {
        $('#div2').show();
    }
});
$('#available2').change(function() {
    if(this.checked) {
        $('#div2').hide();
    }
}); 
	
/*	
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
                
				    getoutputDetail( output );
                
             //   console.log(getCropByName);
                
                document.getElementById("variety").value=responseArray.postharvest_list[0].crop_id;
                document.getElementById("type_of_work").value=responseArray.postharvest_list[0].work_type;
                document.getElementById("input").value=responseArray.postharvest_list[0].crop_input_id;
                document.getElementById("input_qty").value=responseArray.postharvest_list[0].input_qty;
                
                
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
	} else {
		swal('Sorry!', 'Please provide farmer field');
	}	
}
	
	
function getinputDetail(crop_id){
	if(crop_id!=''){
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
						var crop_output = value.crop_output.split(",");
						for(i=0;i<crop_output.length;i++){
							input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';			
						}
					});
					$('#input').html(input_list);
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	} else {
		swal('Sorry!', 'Please provide variety field');
	}
}	


/*
function getoutputDetail(input_id){
	if(input_id !=''){
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/outputmaster/"+input_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				console.log(response);
				responseArray=$.parseJSON(response);
				var output_list = "";
				var sale_list = "";
				if(responseArray.output_list.length != 0){
				   var test=0;		
					$.each(responseArray.output_list,function(key,value){	
						output_list += '<tbody id="dynamic_field"><tr class="row row-space"><td class="col-md-4 form-group"><label for="inputAddress">Output</label> <input type="text" id="output_product" value="'+value.output_name+'" name="output_product[]" class="form-control" readonly></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty" value='+value.output_qty+' name="output_qty[]" disabled class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
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
				   
				   sale_list += '<tbody id="output_field"><tr class="row_child row-space"><td class="col-md-4 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)" name="quantity_uom[]" class="form-control"></td><td class="col-md-4 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" name="sales_qty_uom[]" class="form-control"><option value="" >Select</option>';
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
	} else {
		swal('Sorry!', 'Please provide input crop field');
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
};*/

function myFunction( quantity_uom) {
	var input2 = Number(quantity_uom);
    var input1 = Number(document.getElementById("output_qty").value);	
	if(input2 >= input1){
		swal('', 'Sales qty cannot be greater than output qty');
		document.getElementById("sendMessageButton").disabled = true;
	} else {
		document.getElementById("sendMessageButton").disabled =false;
	}
}


$(document).ready(function(){
	var farmer_id = "<?php echo $postharvest_list->farmer_id; ?>";
	getVarietyDetail(farmer_id);
	
   
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
			var lastInsertedCount = $(this).attr("id").split("_"); 
		    var validate = true;
			$('#dynamic_field').find('tr input[type=text], tr select').each(function(){			
			if($(this).val() == ""){
				validate = false;
			}
			});

		if(validate){
			document.getElementById("sendMessageButton").disabled = false;
		
			j=lastInsertedCount[1];
			rowCount = lastInsertedCount[1];
			i = (1+Number(lastInsertedCount[1]));
			rowCount++;
       
			$('#dynamic_field').append('<tr id="row_child'+i+'" class="dynamic-added row row-space"><td class="col-md-4"><label for="inputAddress">Output <span class="text-danger">*</span></label><select type="text" id="output_product'+i+'" name="output_product[]" class="form-control make"></select></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty'+i+'" maxlength="6" name="output_qty[]" class="form-control numberOnly" required placeholder="000"></td><td class="col-md-3"><label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom" name="output_quantity_uom[]" class="form-control" required ><option value="" >Select UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?> </select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display: none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
			$("#output_product"+i).select2({           
				placeholder: "Select output", //placeholder
				tags: true
			});

			$('#output_field').append('<tr id="row_child_'+i+'" class="dynamic-added row row-space"><td class="form-group col-md-6"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom'+i+'" name="quantity_uom[]" class="form-control" placeholder="000"></td><td class="form-group col-md-6"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom'+i+'" name="sales_qty_uom[]" class="form-control"><option value="" >Select UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?></select></td></tr>');  
         
			$(".btn_add").click(function(){ 
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
        //var button_id = $(this).attr("id");           
        var arr = $(this).attr("id").split("_"); 
        //rowCount--;
        // console.log(k);
             
        $('#row_child'+arr[1]).remove();
        $('#row_child_'+arr[1]).remove();
	});
           
});


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

</script>
</body>
</html>
