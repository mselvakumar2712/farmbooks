<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
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
                        <h1>View Harvest Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("administrator/updatecrop/cropharvest");?>">Crop Harvest</a></li>
                            <li class="active">View Harvest Crop</li>
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
						<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="view_harvestcrop">				
											<input type="hidden" name="cropharvest_id"  id="cropharvest_id">
											<div class="" id="harvest"></div>
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
														<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" readonly data-search="true" onchange="getcropDetail(this.value);">
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>										
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
														</select>
														<p class="help-block text-danger"></p>
												</div>
											</div>
						  <div class="row row-space" id="fertilizer_form_details">
						   <div class="form-group col-md-4">
							 <label for="inputState">Select Variety<span class="text-danger">*</span></label>
							  <select id="crop_variety" name="crop_variety" class="form-control" required="required" data-validation-required-message="Please select crop variety" disabled onchange="getoutputDetail(this.value);">
								<!--<option value="">Select Variety</option>
                                <?php for($i=0;$i<count($cropEntry_variety);$i++) { ?>
                                  <option value="<?php echo $cropEntry_variety[$i]->id; ?>"><?php echo $cropEntry_variety[$i]->variety_name; ?></option>
                                <?php } ?> -->
							  </select>
							  <p class="help-block text-danger"></p>
							</div> 
							<div class="form-group col-md-4">
							 <label for="inputState">Date of Harvest<span class="text-danger">*</span></label>
							 <input type="date" class="form-control" name="harvest_date" id="harvest_date" placeholder="Date of Harvest" required="required" data-validation-required-message="Please enter date of harvest." disabled>
							  <p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								  <label class=" form-control-label">Available for sales</label>
								  <div class="row">
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="radio" id="yes" name="sales_available" value="1" class="form-check-input" disabled>Yes
										</label>
									  </div> 
									</div>
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="radio" id="no" name="sales_available" value="2" class="form-check-input" disabled>No
										   <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>	
									<p class="help-block text-danger"></p>									
								  </div>
							    </div>
							</div>
							<div class="row row-space">
								<div class="col-md-8" id="div1">
								</div>
								<div class="col-md-4" id="div2">
								</div>
							</div>
							<div class="row row-space">
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Method of Harvest<span class="text-danger">*</span></label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="harverst_method1" name="harvest_method[]" value="manual" class="form-check-input bothcheck1" required="required" data-validation-required-message="Please select." disabled>Manual
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="harverst_method2" name="harvest_method[]" value="machine" class="form-check-input bothcheck1"  data-validation-required-message="Please select." disabled>Machine 
									   </label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="harverst_method3" name="harvest_method[]" value="both" class="form-check-input bothcheck"  data-validation-required-message="Please select." disabled>Both
										 </label>
									   </div>
									</div>			
								  </div>
								  </div>
								  <div class="form-group col-md-6 manual both" style="display:none;" id="harverst_method1">
									<label for="inputState">No. of Man days<span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" name="man_days" id="man_days" maxlength="3" placeholder="Labour Working in Days" required="required" data-validation-required-message="Please enter no. of man days." disabled>
									<p class="help-block text-danger"></p>
								  </div>
								  </div>
								  <div class="row row-space">
								 <div class="form-group col-md-6 machine both" style="display:none;" id="harverst_method2">
									<label for="inputState">No. of Hours<span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" name="no_of_hours" id="no_of_hours" maxlength="3" placeholder="No of Hours Machine Used" required="required" data-validation-required-message="Please enter no. of hours." disabled>
									<p class="help-block text-danger"></p>
								  </div>
						
								  <div class="form-group col-md-3">
									<label for="inputState">Cost of Harvesting</label>
									<input type="text" class="form-control numberOnly" name="harvest_cost" id="harvest_cost" maxlength="6" placeholder="Cost of Harvesting"   disabled>
									<p class="help-block text-danger"></p>
								  </div>
								  <div class="form-group col-md-3">
								 <label for="inputState">Quality of Output</label>
								  <select id="output_quality" name="output_quality" class="form-control"   disabled>
									<option value="">Select Quality of output</option>
									<option value="1">Very Good</option>
									<option value="2">Good</option>
									<option value="3">Satisfactory</option>
									<option value="4">Poor</option>
								  </select>
								</div>
								  </div>
								  <div class="row row-space">
									
								
								 </div>
								 <div class="row row-space">
								  <div class="form-group col-md-6" style="display:none;" id="sales_visible">
									
									</div>							  
						     </div>
							<div class="row row-space mt-3">
								<div class="form-group col-md-12 text-center">
									<div class="form-group">
										<div id="success"></div>
										<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
								        <input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
								        <!--<a href="#" id="" class="del btn btn-danger">Delete</a>	-->
								        <a href="<?php echo base_url('administrator/updatecrop/cropharvest');?>" id="ok" class="btn btn-primary">Back</a>
								        <a href="<?php echo base_url('administrator/updatecrop/cropharvest');?>" id="cancel" class="btn btn-outline-dark" style="display:none;">Cancel</a>
									</div>	
								</div>		
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
    $('#harvest_date').attr('max', maxDate);
});
    
    
$('#edit').click(function(){
	$('#view_harvestcrop').toggleClass('view');
	$("#sendMessageButton").show();
	$("#cancel").show();
	$("#edit").hide();
	$("#ok").hide();	
	$('input').each(function(){
		var inp = $(this);
		if (inp.attr('disabled')) {
		 inp.removeAttr('disabled');
		 document.getElementById("sendMessageButton").disabled =false;
		 document.getElementById("cancel").disabled =false;
		}
		else {
		 // inp.attr('disabled', 'disabled');
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
		 $('input[type="checkbox"]').click(function () {
			 
		 $('.both').hide();
		 if ($('#harverst_method1').is(':checked')) $('.manual.both').show();
		 if ($('#harverst_method3').is(':checked')) $('.machine.both').show() && $('.manual.both').show();
		 if ($('#harverst_method2').is(':checked')) $('.machine.both').show();
		/*  if ($('#harvest_method2').is(':checked') && !$('#red').is(':checked')) $('.green.box').show();
		 if ($('#red').is(':checked') && $('#green').is(':checked')) $('.red.box').show(); */
		});
		$('input.bothcheck').on('change', function() {
			 $('input.bothcheck1').not(this).prop('checked', false);  
		});

		});
	  	
// available sales
	var lease = $("input[name='sales_available']");
	var chk_dateof_lease='';
	$('input').on('click', function() {
		if (lease.is(':checked')) {
		  $("input[name='sales_available']:checked").each ( function() {
				chk_dateof_lease = $(this).val() + ",";
				chk_dateof_lease = chk_dateof_lease.slice(0, -1);
		 });
		  if(chk_dateof_lease==1){
			   $('#div2').show();
            //$('#sales_visible1').show();				
		  }else{
			  $('#div2').hide();
          // $('#sales_visible1').hide();			  
		  }

		}		
	});
	
	$(document).ready(function(){
        var cropharvest_id =<?php echo $_REQUEST['id']?>;
      // jQuery method
	   $.ajax({
			url: "<?php echo base_url();?>administrator/updatecrop/editcropharvest/"+cropharvest_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		
            console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				var farmer_id=responseArray.cropharvest_list[0].farmer_id;
				var harvest_method = responseArray.cropharvest_list[0].harvest_method.split(",");
                var items=document.getElementsByName('harvest_method[]');
                for(var i=0; i<items.length; i++){
                  for(var j=0; j<harvest_method.length; j++){
                    if(items[i].type=='checkbox' && items[i].value==harvest_method[j]){
                        items[i].checked=true;
                              $('.both').hide();
                        if ($('#harverst_method1').is(':checked')) $('.manual.both').show();
                         if ($('#harverst_method3').is(':checked')) $('.machine.both').show() && $('.manual.both').show();
                         if ($('#harverst_method2').is(':checked')) $('.machine.both').show();
                    }
                  }
                }
					 document.getElementById("farmer_id").value=farmer_id;
					getcropDetail( farmer_id );
                document.getElementById("crop_variety").value=responseArray.cropharvest_list[0].variety_id;
					 var arrayArea = responseArray.cropharvest_list[0].output.split(',');
					 $("#output").val(arrayArea);	
                document.getElementById("harvest_date").value=responseArray.cropharvest_list[0].date_of_harvest;
                //document.getElementById("output").value=responseArray.cropharvest_list[0].output;
                document.getElementById("man_days").value=responseArray.cropharvest_list[0].man_days;
                document.getElementById("no_of_hours").value=responseArray.cropharvest_list[0].no_of_hours;
				    document.getElementById("harvest_cost").value=responseArray.cropharvest_list[0].harvest_cost+".00";
				    document.getElementById("output_quality").value=responseArray.cropharvest_list[0].output_quality;
					 
					setTimeout(function(){  
                        document.getElementById("crop_variety").value=farmer_id;
                        
                    }, 500);
					 //getcropDetail( variety );
				    //var output=responseArray.cropharvest_list[0].variety_id;
				    //getoutputDetail( output );
                if(responseArray.cropharvest_list[0].sales_available == 1) {
                  $('input[type=radio][name="sales_available"][value='+responseArray.cropharvest_list[0].sales_available+']').prop('checked', true);
						$('#sales_visible').show();
                 } else {
                  $('input[type=radio][name="sales_available"][value='+responseArray.cropharvest_list[0].sales_available+']').prop('checked', true);
						$('#sales_visible').hide();
						//$('#sales_visible1').hide();
                 }
					  
					      var output_list = "";
		               var sales_list = "";
							var harvest_id = "";
							
					  $.each(responseArray.cropharvest_list,function(key,value){
						   //document.getElementById("harvestid").value=value.harvestid;
							harvest_id += '<tr><td><input type="hidden" id="harvestid" name="harvestid[]" value='+value.harvestid+'></td></tr>';
						  //alert(value.qty_uom);
							//output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output</label> <input type="text" id="output_product" name="output_product[]" class="form-control " value='+value.output+' readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty" disabled value='+value.output_qty+' name="output_qty[]"  class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">OutPut (Qty UOM)<span class="text-danger">*</span></label><select id="output_quantity_uom" disabled name="output_quantity_uom[]" class="form-control" required="required" data-validation-required-message="Please select quantity uom"><option value="" >Select Quantity UOM</option>';<?php for($i=0;$i<count($quantity_uom);$i++) { ?>(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->full_name; ?></option>'; <?php } ?>output_list += '</select></td></tr>';
							output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output<span class="text-danger">*</span></label> <input type="text" id="output_product"  disabled value='+value.output+' name="output_product[]" class="form-control " readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty" disabled value='+value.output_qty+' name="output_qty[]"  class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label><select id="output_quantity_uom" disabled name="output_quantity_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->full_name; ?></option>'; 
							<?php } ?>
							output_list += '</select></td></tr>';
							sales_list  += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales Quantity</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)" disabled value='+value.qty_sales+' name="quantity_uom[]" class="form-control "  ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" disabled name="sales_qty_uom[]" disabled class="form-control"  ><option value="" >Select Quantity UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.sales_qty_uom == <?php echo $quantity_uom[$i]->id?>) ? sales_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : sales_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->full_name; ?></option>'; 
							<?php } ?>
							sales_list += '</select></td></tr>';
							//sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"></tr>';
							//sale_list += '<?php for($i=0;$i<count($quantity_uom);$i++) { ?>'+alert('<?php echo $quantity_uom[$i]->id?>'+'-A-'+'<?php echo $i?>');+' <?php } ?></select></td></tr>';
							});
							$('#div1').html(output_list);
		               $('#div2').html(sales_list);
							$('#harvest').html(harvest_id);
			}    
			
			},
			error:function(){
			alert('Error!!! Try again');
			} 
       });
  });
			
 $('form').submit(function(e){
	e.preventDefault();
	var cropharvest_id =<?php echo $_REQUEST['id']?>;
	const viewharvestdata = $('#view_harvestcrop').serializeObject();
	console.log(viewharvestdata);
	if( viewharvestdata !='')
	{ 
	var url="<?php echo base_url();?>administrator/updatecrop/updatecropharvest/"+cropharvest_id;
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
					window.location = "<?php echo base_url('administrator/updatecrop/cropharvest')?>";
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

function getcropDetail( farmer_id ) {
	if( farmer_id !='')
	{ 
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/variety/"+farmer_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		console.log(response);
		responseArray=$.parseJSON(response);
		//console.log(responseArray);
		if(responseArray.status==1){

		var variety_list = '';
		$.each(responseArray.variety_list,function(key,value){
		//console.log(value.variety_list);
		variety_list += '<option value='+value.variety_id+'>'+value.variety_name+'</option>';
		});
		$('#crop_variety').html(variety_list);
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


 function myFunction( qty_sales) {
		//alert(sales_qty);
		 var input2 = qty_sales;
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
function getoutputDetail( variety_id ) {	

	/* $("#output option").remove() ;	
		 if( variety_id !='')
			 
	{   
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/output/"+variety_id,
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
			console.log(value.output);
			var crop_output = value.crop_output.split(",");
		console.log(crop_output[0]);
			for(var i=0;i<crop_output.length;i++)
			{
		 output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output<span class="text-danger">*</span></label> <input type="text" id="output_product" name="output_product[]" class="form-control " value='+value.output_name+' readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty)<span class="text-danger">*</span></label><input type="text" id="output_qty" name="output_qty[]"  class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM<span class="text-danger">*</span></label><select id="output_quantity_uom" name="output_quantity_uom[]" class="form-control" required="required" data-validation-required-message="Please select quantity uom"><option value="" >Select Quantity UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->full_name; ?></option><?php } ?></select></td></tr>';
		 sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" name="quantity_uom[]" class="form-control "   ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" name="sales_qty_uom[]" class="form-control"  ><option value="" >Select Quantity UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->full_name; ?></option> <?php } ?></select></td></tr>';
		//$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="output" id="output" class="form-control  name_list" required="required"  /></td> <td><input type="text" name="output_qty" id="output_qty" class="form-control  name_list" required="required"  /></td> <td><input type="text" name="qty_uom" id="qty_uom" class="form-control  name_list" required="required"  /></td> <<p class="help-block text-danger"></p></td>       <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td><td></td></tr>');
			}
		$('#div1').html(output_list);
		$('#div2').html(sale_list);
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
	} */
}
		
</script> 
</body>
</html>
