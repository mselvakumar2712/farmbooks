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
                        <h1>Edit Harvest Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/cropharvest");?>">Crop Harvest</a></li>
                            <li class="active">Edit Harvest Crop</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
			
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('info')){?>
						<div class="alert alert-info alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><?php echo $this->session->flashdata('info');?></strong> 
						</div>
				<?php }elseif($this->session->flashdata('warning')){?>
						<div class="alert alert-warning alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong><?php echo $this->session->flashdata('warning');?></strong> 
						</div>
				<?php }?>
			
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
						<div class="container-fluid">
						<form name="sentMessage" method="post" action="<?php echo base_url('fpo/updatecrop/updatecropharvest/').$cropharvest_list->id; ?>" id="view_harvestcrop">
							<input type="hidden" name="cropharvest_id" id="cropharvest_id"> 
                            <input type="hidden" name="updatevariety_id" id="updatevariety_id">
							<div class="" id="harvest"></div>
							<div class="row row-space">
								<div class="form-group col-md-6">
									<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
										<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" readonly>
										<option value="">Select farmer</option>
										<?php for($i=0; $i<count($farmers);$i++){
											if($farmers[$i]->id == $cropharvest_list->farmer_id){
										?>										
										<option value="<?php echo $farmers[$i]->id; ?>" selected><?php echo $farmers[$i]->profile_name; ?></option>
										<?php } else { ?>	
										<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
										<?php }} ?>	
										</select>
										<p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-6">
								 <label for="inputState">Date of Harvest <span class="text-danger">*</span></label>
								<input type="date" class="form-control" name="harvest_date" id="harvest_date" placeholder="Date of Harvest" required="required" data-validation-required-message="Please enter date of harvest." value="<?php echo $cropharvest_list->date_of_harvest; ?>">
								  <p class="help-block text-danger"></p>
								</div>
							</div>
						  <div class="row row-space" id="fertilizer_form_details">
						   <div class="form-group col-md-4">
								<label for="inputState">Select Variety <span class="text-danger">*</span></label>
								<input type="hidden" class="" name="crop_variety" id="crop_variety" value="<?php echo $cropharvest_list->variety_id; ?>" required="required" data-validation-required-message="Please provide the variety">
								<input type="text" class="form-control" name="" id="" value="<?php echo $cropharvest_list->variety_name; ?>" readonly>
								<p class="help-block text-danger"></p>
							</div> 
							
							<div class="form-group col-md-4">
								  <label class=" form-control-label">Available for sales</label>
								  <div class="row">
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="radio" id="yes" name="sales_available" value="1" class="form-check-input" <?php if($cropharvest_list->sales_available == 1){echo "checked";} ?>>Yes
										</label>
									  </div> 
									</div>
									<div class="col-md-6">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="radio" id="no" name="sales_available" value="2" class="form-check-input" <?php if($cropharvest_list->sales_available == 0){echo "checked";} ?>>No
										   <div class="help-block with-errors text-danger"></div>
										</label>
									   </div>
									</div>	
									<p class="help-block text-danger"></p>									
								  </div>
							    </div>
							</div>
							<div class="row row-space">
								<div class="col-md-8" id="div1"></div>
								<div class="col-md-4" id="div2"></div>
							</div>
							<div class="row row-space">
							  <div class="form-group col-md-6">
									<label class=" form-control-label">Method of Harvest <span class="text-danger">*</span></label>
								  <div class="row">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="harverst_method1" name="harvest_method[]" value="manual" class="form-check-input bothcheck1" <?php if($cropharvest_list->harvest_method == 'manual'){echo "checked";} ?>>Manual
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="harverst_method2" name="harvest_method[]" value="machine" class="form-check-input bothcheck1" <?php if($cropharvest_list->harvest_method == 'machine'){echo "checked";} ?>>Machine 
									   </label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="harverst_method3" name="harvest_method[]" value="both" class="form-check-input bothcheck" <?php if($cropharvest_list->harvest_method == 'both'){echo "checked";} ?>>Both
										 </label>
									   </div>
									</div>
									<p class="help-block text-danger" id="validatecheck"></p>
								  </div>
								  </div>
								  <div class="form-group col-md-3 manual both" style="display:none;" id="harverst_method1">
									<label for="inputState">No. of Man days <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" name="man_days" id="man_days" maxlength="3" placeholder="Labour Working in Days" required="required" data-validation-required-message="Please enter no. of man days." value="<?php echo $cropharvest_list->man_days; ?>">
									<p class="help-block text-danger"></p>
								  </div>
								  <div class="form-group col-md-3 machine both" style="display:none;" id="harverst_method2">
									<label for="inputState">No. of Hours <span class="text-danger">*</span></label>
									<input type="text" class="form-control numberOnly" name="no_of_hours" id="no_of_hours" maxlength="3" placeholder="No of Hours Machine Used" required="required" data-validation-required-message="Please enter no. of hours." value="<?php echo $cropharvest_list->no_of_hours; ?>">
									<p class="help-block text-danger"></p>
								  </div>
								  </div>
								  <div class="row row-space">								 					
								  <div class="form-group col-md-3">
									<label for="inputState">Cost of Harvesting</label>
									<input type="text" class="form-control numberOnly text-right" name="harvest_cost" id="harvest_cost" maxlength="10" placeholder="Cost of Harvesting" value="<?php echo number_format($cropharvest_list->harvest_cost, 2, '.', ''); ?>">
									<p class="help-block text-danger"></p>
								  </div>
								  <div class="form-group col-md-4">
								 <label for="inputState">Quality of Output</label>
								  <select id="output_quality" name="output_quality" class="form-control" >
									<option value="">Select Quality of output</option>
									<option value="1" <?php if($cropharvest_list->output_quality == 1){ echo "selected";} ?> >Very Good</option>
									<option value="2" <?php if($cropharvest_list->output_quality == 2){ echo "selected";} ?> >Good</option>
									<option value="3" <?php if($cropharvest_list->output_quality == 3){ echo "selected";} ?> >Satisfactory</option>
									<option value="4" <?php if($cropharvest_list->output_quality == 4){ echo "selected";} ?> >Poor</option>
								  </select>
								</div>
								  </div>
								<div class="row row-space">
								</div>
								<div class="row row-space">
									<div class="form-group col-md-6" style="display:none;" id="sales_visible"></div>							  
								</div>          
						<div class="col-md-12 text-center">
                           <div id="success"></div>
                           <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-check-circle"></i> Update</button>
                           <a href="<?php echo base_url('fpo/updatecrop/cropharvest');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
    $('#harvest_date').attr('max', maxDate);
});
   
   
$("#sendMessageButton").click(function() {
	var count_checked = $("[name='harvest_method[]']:checked").length; // count the checked rows
	if(count_checked == 0){
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
	//return true;
});  
  
  
/* $('#edit').click(function(){
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
}); */
	
$(document).ready(function(){
	var harvest_method = "<?php echo $cropharvest_list->harvest_method; ?>";
	if(harvest_method == "manual"){
		$('.manual.both').show();
		$('.machine.both').hide();
	} else if(harvest_method == "machine"){
		$('.machine.both').show();
		$('.manual.both').hide();
	} else if(harvest_method == "both"){
		$('.machine.both').show();
		$('.manual.both').show();
	}
	
	
	var sales_available = "<?php echo $cropharvest_list->sales_available; ?>";
	if(sales_available == 1){
		$('#div2').show();
	} else {
		$('#div2').hide();
	}
	
	
	
	var farmer_id = "<?php echo $cropharvest_list->farmer_id; ?>";
	var variety_id = "<?php echo $cropharvest_list->variety_id; ?>";	
	getcropDetail(farmer_id, variety_id);	
	getoutputDetail(variety_id);
	
		
	
	$('input[type="checkbox"]').click(function () { 
		$('.both').hide();
		if ($('#harverst_method1').is(':checked')) $('.manual.both').show();
		if ($('#harverst_method3').is(':checked')) $('.machine.both').show() && $('.manual.both').show();
		if ($('#harverst_method2').is(':checked')) $('.machine.both').show();
	});
	
	$('input.bothcheck').on('change', function() {
		$('input.bothcheck1').not(this).prop('checked', false);  
	});
});
	 
	 
//available sales
var lease = $("input[name='sales_available']");
var chk_dateof_lease='';
$('input').on('click', function(){
	if(lease.is(':checked')){
		$("input[name='sales_available']:checked").each(function(){
			chk_dateof_lease = $(this).val() + ",";
			chk_dateof_lease = chk_dateof_lease.slice(0, -1);
		});
		if(chk_dateof_lease==1){
		   $('#div2').show();
		}else{
		  $('#div2').hide();
		}
	}		
});

/*	   
var variety_id = 0;   
	$(document).ready(function(){
        var cropharvest_id =<?php //echo $_REQUEST['id']?>;
       
      // jQuery method
	   $.ajax({
			url: "<?php echo base_url();?>fpo/updatecrop/editcropharvest/"+cropharvest_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		
         //console.log(response);
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
					
                //document.getElementById("crop_variety").value=responseArray.cropharvest_list[0].variety_id;
                document.getElementById("updatevariety_id").value = responseArray.cropharvest_list[0].variety_id;
                console.log(document.getElementById("updatevariety_id").value);
                variety_id = responseArray.cropharvest_list[0].variety_id;
					 var arrayArea = responseArray.cropharvest_list[0].output.split(',');
					 $("#output").val(arrayArea);	
                document.getElementById("harvest_date").value=responseArray.cropharvest_list[0].date_of_harvest;
                //document.getElementById("output").value=responseArray.cropharvest_list[0].output;
                document.getElementById("man_days").value=responseArray.cropharvest_list[0].man_days;
                document.getElementById("no_of_hours").value=responseArray.cropharvest_list[0].no_of_hours;
				    document.getElementById("harvest_cost").value=responseArray.cropharvest_list[0].harvest_cost+".00";
				    document.getElementById("output_quality").value=responseArray.cropharvest_list[0].output_quality;
					  getcropDetail( farmer_id );
                //alert(':::'+responseArray.cropharvest_list[0].sales_available);
                if(responseArray.cropharvest_list[0].sales_available == 1) {
                  $('input[type=radio][name="sales_available"][value=1]').prop('checked', true);
						$('#div2').show();
                 } else {
                  $('input[type=radio][name="sales_available"][value=2]').prop('checked', true);
						$('#div2').hide();
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
							output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product" maxlength="6"  value="'+value.output+'" name="output_product[]" class="form-control " readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty"  value='+value.output_qty+' name="output_qty[]"  class="form-control" ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control"  ><option value="" >Select</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
							<?php } ?>
							output_list += '</select></td></tr>';
							sales_list  += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales Quantity</label> <input type="text" id="quantity_uom" maxlength="6" onfocusout="myFunction(this.value)"  value="'+value.qty_sales+'" name="quantity_uom[]" class="form-control "  ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom"  name="sales_qty_uom[]"  class="form-control"  ><option value="" >Select Quantity UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.sales_qty_uom == <?php echo $quantity_uom[$i]->id?>) ? sales_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->full_name; ?></option>' : sales_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
							<?php } ?>
							sales_list += '</select></td></tr>';
							//sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"></tr>';
							//sale_list += '<?php for($i=0;$i<count($quantity_uom);$i++) { ?>'+alert('<?php echo $quantity_uom[$i]->id?>'+'-A-'+'<?php echo $i?>');+' <?php } ?></select></td></tr>';
							initnumberOnly();  
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
	var cropharvest_id = "<?php echo $cropharvest_list->id; ?>";    
	const viewharvestdata = $('#view_harvestcrop').serializeObject();
	if( viewharvestdata !='')
	{ 
	var url="<?php echo base_url();?>fpo/updatecrop/updatecropharvest/"+cropharvest_id;
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
					window.location = "<?php echo base_url('fpo/updatecrop/cropharvest'); ?>";
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
*/


function getcropDetail(farmer_id, variety_id=null){
	if(farmer_id!=''){ 
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/variety_dropdown_value/"+farmer_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					var variety_list = '<option value="">Select Variety</option>';
					$.each(responseArray.variety_list,function(key,value){
						if(variety_id == value.variety_id){    
							variety_list += '<option value="'+value.variety_id+'" selected>'+value.variety_name+'</option>';				   
						} else {
							variety_list += '<option value="'+value.variety_id+'">'+value.variety_name+'</option>';
						}
					});
					$('#crop_variety').html(variety_list);
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
		}); 
	} else {
		swal('Sorry', 'Please provide the farmer field');
	}
}	


function myFunction(quantity_uom){
	var input2 = Number(quantity_uom);
	var input1 = Number(document.getElementById("output_qty").value);
	if(input2 >= input1){
		swal('Sorry', 'Sales qty cannot be greater than output qty');
		$("#quantity_uom").val('');
	} else {
		document.getElementById("sendMessageButton").disabled = false;
	}
}


function getoutputDetail(variety_id){	
	if(variety_id!=''){   
		$.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/output/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response){
				response=response.trim();
				responseArray=$.parseJSON(response);
				if(responseArray.status==1){
					var output_list = "";
					var sale_list = "";
					$.each(responseArray.output_list,function(key,value){
						var crop_output = value.crop_output.split(",");
						for(var i=0;i<crop_output.length;i++){
							output_list += '<tr class="row row-space">';
							output_list += '<td class="col-md-6 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product" name="output_product[]" class="form-control" value="<?php echo $cropharvest_list->output; ?>" readonly ></td>';
							output_list += '<td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty" name="output_qty[]" class="form-control" maxlength="6" placeholder="000" value="<?php echo $cropharvest_list->output_qty; ?>"></td>';
							output_list += '<td class="col-md-3 form-group"><label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label><select id="output_quantity_uom" name="output_quantity_uom[]" class="form-control"><option value="">Select UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++){ 
							if($quantity_uom[$i]->id == $cropharvest_list->qty_uom){ ?>
							output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>';
							<?php } else { ?>
							output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>';
							<?php }} ?>
							output_list += '</select></td></tr>';
														
							sale_list += '<tr class="row row-space">';
							sale_list += '<td class="col-md-6 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" name="quantity_uom[]" onfocusout="myFunction(this.value)" class="form-control" maxlength="6" placeholder="000" value="<?php echo $cropharvest_list->qty_sales; ?>"></td>';
							sale_list += '<td class="col-md-6 form-group"><label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" name="sales_qty_uom[]" class="form-control"><option value="">Select UOM</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++){ 
							if($quantity_uom[$i]->id == $cropharvest_list->sales_qty_uom){ ?>
							sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected><?php echo $quantity_uom[$i]->short_name; ?></option>';
							<?php } else { ?>
							sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
							<?php }} ?>
							sale_list += '</select></td></tr>';
							
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
	} else {
		swal('Sorry!', 'Please select the variety field');
	}
}		

</script> 
</body>
</html>
