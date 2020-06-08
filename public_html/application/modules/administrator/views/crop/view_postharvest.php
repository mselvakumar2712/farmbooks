<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>

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
							<li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("administrator/updatecrop/postharvest");?>">Post Harvest</a></li>
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
											<input type="hidden" name="postharvest_id" value="3" id="postharvest_id">
												<input type="hidden" name="harvest_id"  id="harvest_id">
											
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
														<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer"  onchange="getVarietyDetail(this.value);" readonly data-search="true">
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>										
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
														</select>
														<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6 ">
														<label for="inputAddress2">Date<span class="text-danger">*</span></label>
														<input type="date" class="form-control "  name="date"  id="date" placeholder="Date" disabled required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow">
														<div class="help-block with-errors text-danger"></div>
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-4">
													 <label for="inputState">Select Variety<span class="text-danger">*</span></label>
													  <select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety" disabled onchange="getinputDetail(this.value);">
														<!--<option value="">Select Variety</option>
																  <?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
																	 <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
																  <?php } ?> -->
													  </select>
													  <p class="help-block text-danger"></p>
													</div>
													<div class="form-group col-md-4">	
														<label for="inputAddress2">Type of Work <span class="text-danger">*</span> </label>
														<select  class="form-control" id="type_of_work" name="type_of_work" required="required" data-validation-required-message="Please select type of work." disabled>
                                                   <option value="">Select Type of Work</option>
																	<?php for($i=0;$i<count($worktype);$i++) { ?>
                                                    <option value="<?php echo $worktype[$i]->id; ?>"><?php echo $worktype[$i]->name; ?></option>
                                                    <?php } ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-4 ">
														<label class=" form-control-label">Available for Sale</label>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio1" class="form-check-label">
																			<input type="radio" id="available1" name="available" disabled value="1" class="form-check-input" ><span class="ml-1">Yes</span>
																		</label>
																	</div> 
																</div>
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio2" class="form-check-label">
																			<input type="radio" id="available2" name="available" disabled value="2" class="form-check-input" ><span class="ml-1">No</span>
																		</label>
																	</div>
																</div>			
															</div>
													<div class="help-block with-errors text-danger"></div>
													</div>
												<!--<div class="form-group col-md-6">	
														<label for="inputAddress2">Select Crop <span class="text-danger">*</span> </label>
														<select  class="form-control" id="crop" name="crop" disabled required="required" data-validation-required-message="Please select crop.">
												            <option value="">Select Crop</option>
												            <?php for($i=0;$i<count($cropEntry);$i++) { ?>
                                                            <option value="<?php echo $cropEntry[$i]->id; ?>"><?php echo $cropEntry[$i]->crop_name; ?></option>
                                                            <?php } ?>  
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div> -->
											</div>
											<div class="row rowspace">
													
													<div class="form-group col-md-4">	
														<label for="inputAddress2">Input<span class="text-danger">*</span> </label>
														<select  class="form-control" id="input" disabled name="input" required="required" data-validation-required-message="Please select input.">
                                             <option value="">Select Input </option>
															<?php for($i=0; $i<count($cropname);$i++) { ?><option value="<?php echo $cropname[$i]->id; ?>"><?php echo $cropname[$i]->name; ?></option>
															<?php } ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-2 ">
														<label for="inputAddress2">Input(Qty)<span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" disabled maxlength="6" name="input_qty"  id="input_qty" placeholder="Input(Qty)" required="required" data-validation-required-message="Please enter input(qty)" >
														<div class="help-block with-errors text-danger"></div>
													</div>
													<div class="form-group col-md-2">
														<label for="inputAddress">Input (Qty UOM)<span class="text-danger">*</span></label>
													<!--<input type="text" class="form-control numberOnly" name="fertilizer_quantity_uom" id="fertilizer_quantity_uom" maxlength="4" placeholder="Quantity UOM" required="required" data-validation-required-message="Please enter Quantity UOM.">-->
														<select id="input_qty_uom" name="input_qty_uom" class="form-control" required="required" data-validation-required-message="Please select brand name" disabled>
														<option value="" >Select Quantity UOM</option>
														<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
															<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->full_name; ?></option>
														  <?php } ?> 						
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4 ">
														<label for="inputAddress2">Cost of Post Harvesting</label>
														<input type="text" class="form-control numberOnly" disabled maxlength="6" name="cost_post_harvesting" id="cost_post_harvesting" placeholder="Cost of Post Harvesting" >
														<div class="help-block with-errors text-danger"></div>
													</div>
											</div>
											<div class="row rowspace">
													<div class="col-md-8" id="div1" >
													</div>
													<div class="col-md-4" id="div2" >
													</div>
													<!-- <div class="form-group col-md-6">
														<label for="inputAddress">Output</label>
														  <select id="cropoutput" name="cropoutput[]" disabled multiple class="form-control select2"  data-validation-required-message="Please select output">
															<option value="Turmeric–Virali">Turmeric – Virali</option>
															<option value="Kundu-Banana">Kundu, Banana</option>
															<option value="Banana-leaf">Banana, leaf</option>
														  </select>							  
													 </div> -->
											</div>
											<div class="row rowspace">
													<!-- <div class="form-group col-md-6 ">
														<label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" disabled maxlength="6" name="output_qty" id="output_qty" placeholder="Output(Qty)" required="required" data-validation-required-message="Please enter input(qty)" >
														<div class="help-block with-errors text-danger"></div>
													</div> -->
													 
											</div>
											<div class="row rowspace">
													
													 <div class="form-group col-md-6 " id="uom" style="display:none;"  >
														<!--<label for="inputAddress2">Quantity for sales with UOM</label>
														<input type="text" class="form-control numberOnly"  disabled maxlength="6" name="uom" id="uom" placeholder="Quantity for sales with UOM" >
														<div class="help-block with-errors text-danger"></div>-->
													</div>
											</div>
											<div class="row row-space">
												<div class="form-group col-md-12 text-center">
													<input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
													<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
													<!--<a href="#" id="" class="del btn btn-danger mt-10">  Delete</a>-->
													 <a href="<?php echo base_url('administrator/updatecrop/postharvest');?>"><input id="ok" value="Back" class="btn btn-primary text-center mt-10" type="button"></a>
													 <a href="<?php echo base_url('administrator/updatecrop/postharvest');?>"><input id="cancel" value="Cancel" class="btn btn-outline-dark text-center mt-10" type="button" style="display:none;"></a>					  
												</div>
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
      var postharvest_id =<?php echo $_REQUEST['id']?>;
      // jQuery method
	   $.ajax({
			url: "<?php echo base_url();?>administrator/updatecrop/editpostharvest/"+postharvest_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		
            console.log(response);
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
                document.getElementById("variety").value=responseArray.postharvest_list[0].crop_id;
                document.getElementById("type_of_work").value=responseArray.postharvest_list[0].work_type;
                document.getElementById("input").value=responseArray.postharvest_list[0].crop_input_id;
                document.getElementById("input_qty").value=responseArray.postharvest_list[0].input_qty;
					 document.getElementById("type_of_work").value=responseArray.postharvest_list[0].work_type;
					 document.getElementById("cost_post_harvesting").value=responseArray.postharvest_list[0].post_harvesting_cost;
					 document.getElementById("input_qty_uom").value=responseArray.postharvest_list[0].input_qty_uom;
					 document.getElementById("harvest_id").value=responseArray.postharvest_list[0].harvestid;
					 //
					 
                if(responseArray.postharvest_list[0].sale_available == 1) {
                  $('input[type=radio][name="available"][value='+responseArray.postharvest_list[0].sale_available+']').prop('checked', true);
						$('#uom').show();
						document.getElementById("uom").value=responseArray.postharvest_list[0].qty_for_sale;
                } else {
                  $('input[type=radio][name="available"][value='+responseArray.postharvest_list[0].sale_available+']').prop('checked', true);
						$('#uom').hide();
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
	var postharvest_id =<?php echo $_REQUEST['id']?>;
	const viewharvestdata = $('#view_postharvest').serializeObject();
	if( viewharvestdata !='')
		{
     console.log(viewharvestdata);
	var url="<?php echo base_url();?>administrator/updatecrop/updatepostharvest/"+postharvest_id;
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
					window.location = "<?php echo base_url('administrator/updatecrop/postharvest')?>";
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
	 
function getVarietyDetail( farmer_id ) {
		 if( farmer_id !='')
		{
	 $.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/postharvestvariety/"+farmer_id,
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

		var variety_list = '';
		$.each(responseArray.variety_list,function(key,value){
		console.log(value.variety_name);
		variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
		});
		$('#variety').html(variety_list);
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
		
}
	
function getinputDetail( crop_id ) {
	 if( crop_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/inputmaster/"+crop_id,
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
		var input_list = '';
		$.each(responseArray.input_list,function(key,value){
			
		console.log(value.input_list);
		var crop_output = value.crop_output.split(",");
		for(i=0;i<crop_output.length;i++)
		{
		input_list += '<option value='+value.variety_id+'>'+crop_output[i]+'</option>';
		
		}});
		$('#input').html(input_list);
		/* $('#fertilizer_variety').html(variety_list);
		$('#pesticide_variety').html(variety_list);
		$('#weeding_variety').html(variety_list);*/
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

function getoutputDetail( input_id ) {
	 if( input_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/outputmaster/"+input_id,
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
		var output_list = "";
		var sale_list = "";
		$.each(responseArray.output_list,function(key,value){
			//document.getElementById("output_quantity_uom").value=value.output_qty_uom;
		 output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output</label> <input type="text" id="output_product"   value='+value.output+' name="output_product[]" class="form-control " readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty"  value='+value.output_qty+' name="output_qty[]" disabled class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->full_name; ?></option>'; 
							<?php } ?>
							output_list += '</select></td></tr>';
							sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales Quantity</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)" disabled value='+value.qty_sales+' name="quantity_uom[]" class="form-control "  ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" disabled name="sales_qty_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.sales_qty_uom == <?php echo $quantity_uom[$i]->id?>) ? sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->full_name; ?></option>'; 
							<?php } ?>
							output_list += '</select></td></tr>';
							//sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"></tr>';
							//sale_list += '<?php for($i=0;$i<count($quantity_uom);$i++) { ?>'+alert('<?php echo $quantity_uom[$i]->id?>'+'-A-'+'<?php echo $i?>');+' <?php } ?></select></td></tr>';
							
		});
     $('#div1').html(output_list);
		$('#div2').html(sale_list);
		//$('#uom').html(sale_list);
		setTimeout(function(){ 
              //document.getElementById("sales_qty_uom").value=value.sales_qty_uom;                            
            }, 400);
		
		}

		/* $('#fertilizer_variety').html(variety_list);
		$('#pesticide_variety').html(variety_list);
		$('#weeding_variety').html(variety_list);*/
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
		//alert(sales_qty);
		 var input2 = quantity_uom;
       var input1 = Number(document.getElementById( "output_qty" ).value);
		 console.log(input1);
		
		
		if(input2 >= input1 ){
		alert('Sales Qty cannot be greater than Output Qty');
		document.getElementById("sendMessageButton").disabled = true;
		}
		else {
		document.getElementById("sendMessageButton").disabled =false;
		}
		}

</script>
</body>
</html>
