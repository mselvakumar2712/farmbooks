<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href='<?php echo asset_url()?>css/select2.min.css' rel='stylesheet' type='text/css' />
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
                        <h1>Add Crop Harvest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/cropharvest");?>">Crop Harvest</a></li>
                            <li class="active">Add Harvest Crop</li>
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
                        <form  name="sentMessage" method="post" action="" novalidate="novalidate" id="add_updatecrop">
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
											</div>
                                <div class="row row-space" id="fertilizer_form_details">
                                 <div class="form-group col-md-4">
                                  <label for="inputState">Select Crop Variety <span class="text-danger">*</span></label>
                                   <select id="crop_variety" name="crop_variety" class="form-control" required="required" data-validation-required-message="Please select crop variety" >
                                
                                   </select>
                                   <p class="help-block text-danger"></p>
                                 </div>
                                 <div class="form-group col-md-4">
                                  <label for="inputState">Date of Harvest<span class="text-danger">*</span></label>
                                  <input type="date" class="form-control" name="harvest_date" id="harvest_date" placeholder="Date of Harvest" required="required" data-validation-required-message="Please enter date of harvest." max="<?php echo $currentYear; ?>">
                                   <p class="help-block text-danger"></p>
                                 </div>
                                 <div class="form-group col-md-4">
                                      <label class=" form-control-label">Available for sales</label>
                                      <div class="row">
                                       <div class="col-md-6">
                                         <div class="form-check-inline form-check">
                                          <label for="inline-radio1" class="form-check-label">
                                            <input type="radio" id="yes" name="sales_available" value="1" class="form-check-input" >Yes
                                          </label>
                                         </div> 
                                       </div>
                                       <div class="col-md-6">
                                         <div class="form-check-inline form-check">
                                          <label for="inline-radio2" class="form-check-label">
                                            <input type="radio" id="no" name="sales_available" value="2" class="form-check-input" >No
                                             <div class="help-block with-errors text-danger"></div>
                                          </label>
                                          </div>
                                       </div>			
                                      </div>
                                     </div>
                                 </div>
                              <div class="row row-space" >
                                 <div class=" form-group col-md-8" id="div1">
                                  
                                 </div>
                                 <div class="col-md-4" id="div2" style="display:none;">
                                 </div>
                              </div>
                           <div class="row row-space">
                             <div class="form-group col-md-6">
                                 <label class=" form-control-label">Method of Harvest <span class="text-danger">*</span></label>
                                <div class="row">
                                 <div class="col-md-4">
                                   <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label">
                                      <input type="checkbox" id="harvest_method1" name="harvest_method[]" value="manual" class="bothcheck1 form-check-input" >Manual
                                    </label>
                                   </div> 
                                 </div>
                                 <div class="col-md-4">
                                   <div class="form-check-inline form-check">
                                    <label for="inline-radio2" class="form-check-label">
                                      <input type="checkbox" id="harvest_method2" name="harvest_method[]" value="machine" class="bothcheck1 form-check-input" >Machine 
                                    </label>
                                    </div>
                                 </div>	
                                 <div class="col-md-4">
                                   <div class="form-check-inline form-check">
                                    <label for="inline-radio2" class="form-check-label">
                                      <input type="checkbox" id="harvest_method3" name="harvest_method[]" value="both" class="bothcheck form-check-input"  >Both
                                     </label>
                                    </div>
                                 </div>			
                                </div>
                             <p class="help-block text-danger" id="validatecheck"></p>
                             </div>
                             <div class="form-group col-md-6 manual both" style="display:none;">
                              <label for="inputState">No. of Man days <span class="text-danger">*</span></label>
                              <input type="text" class="form-control numberOnly" name="man_days" id="man_days" maxlength="3" placeholder="Labour Working in Days" required="required" data-validation-required-message="Please enter Date of harvest.">
                              <p class="help-block text-danger"></p>
                             </div>
                             </div>
								  <div class="row row-space">
                               <div class="form-group col-md-6 machine both" style="display:none;">
                                 <label for="inputState">No. of Hours <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control numberOnly" name="no_of_hours" id="no_of_hours" maxlength="3" placeholder="No of Hours Machine Used" required="required" data-validation-required-message="Please enter Date of harvest.">
                                 <p class="help-block text-danger"></p>
                                </div>
                        
                                <div class="form-group col-md-3">
                                 <label for="inputState">Cost of Harvesting</label>
                                 <input type="text" class="form-control numberOnly" name="harvest_cost" id="harvest_cost" maxlength="6" placeholder="Cost of Harvesting" >
                                </div>
                                <div class="form-group col-md-3">
                               <label for="inputState">Quality of Output</label>
                                <select id="output_quality" name="output_quality" class="form-control" required="required" data-validation-required-message="Please select crop variety">
                                 <option value="">Select Quality of Output</option>
                                 <option value="1">Very Good</option>
                                 <option value="2">Good</option>
                                 <option value="3">Satisfactory</option>
                                 <option value="4">Poor</option>
                                </select>
                              </div>
								  </div>
								 <div class="row row-space">
								  <div class="form-group col-md-6" id="sales_visible" >
									
							</div>
						     </div>
                        <div class="form-group col-md-12 text-center">
                             <button id="sendMessageButton" class="btn btn-success mt-10 btn-fs" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"> Add Crop Harvest</i></button>
                              <a href="<?php echo base_url('fpo/updatecrop/cropharvest');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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

$("#sendMessageButton").click(function() {
  var count_checked = $("[name='harvest_method[]']:checked").length; // count the checked rows
  if(count_checked == 0) 
  {
    $("#validatecheck").html("Please check any one of the checkbox");
    return false;
  }
  });
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
    
    
// Available for sales
        var lease = $("input[name='sales_available']");
        var chk_sales='';
        $('input').on('click', function() {
          if (lease.is(':checked')) {
            $("input[name='sales_available']:checked").each ( function() {
              chk_sales = $(this).val() + ",";
              chk_sales = chk_sales.slice(0, -1);
           });
            if(chk_sales==1){
               $('#div2').show();  
               //$('#sales_visible1').show();  					
            }else{
              $('#div2').hide(); 
             // $('#sales_visible1').hide(); 				  
            }
      
          }    
        });    
    
    
$(document).ready(function(){
    $('input[type="checkbox"]').click(function () {
        $('.both').hide();
        if ($('#harvest_method1').is(':checked')) $('.manual.both').show();
       if ($('#harvest_method3').is(':checked')) $('.machine.both').show() && $('.manual.both').show();
       if ($('#harvest_method2').is(':checked')) $('.machine.both').show();
       /*  if ($('#harvest_method2').is(':checked') && !$('#red').is(':checked')) $('.green.box').show();
        if ($('#red').is(':checked') && $('#green').is(':checked')) $('.red.box').show(); */
    });
    $('input.bothcheck').on('change', function() {
        $('input.bothcheck1').not(this).prop('checked', false);  
    });
});

		
$('form').submit(function(e){
	
	e.preventDefault();
	const updateharvestdata = $('#add_updatecrop').serializeObject();
		if( updateharvestdata !='')
		{ 
	   console.log(updateharvestdata);
		 $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/crop_harvest",
			type:"POST",
			data:updateharvestdata,
			dataType:"html",
         cache:false,			
			success:function(response){	
         console.log(response);			
				response=response.trim();
				 console.log(response);	
				responseArray=$.parseJSON(response);
				console.log("gugug");
				if(responseArray.status == 1){
					//alert("hi");
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('fpo/updatecrop/cropharvest')?>";
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

$('#farmer_id').change(function(){
		
		 var farmer_id = $("#farmer_id").val();
		  //alert(crop_category);
		  getcropDetail( farmer_id );
	 });
	 $('#crop_variety').change(function(){
		
		 var crop_variety = $("#crop_variety").val();
		  //alert(crop_category);
		  getoutputDetail( crop_variety );
	 });


function getcropDetail( farmer_id ) {
	$("#crop_variety option").remove() ;
		if( farmer_id !='')
		{ 
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/harvestvarietymaster/"+farmer_id,
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
                $("#crop_variety").append($('<option></option>').val(0).html('Select Crop Variety'));
             }
				 else {
                    $("#crop_variety").append($('<option></option>').val(0).html(''));  
             }

		//var variety_list = '<option value="">Select Crop Variety</option>';
		$.each(responseArray.variety_list,function(key,value){
		//console.log(value.variety_list);
		$("#crop_variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
		//variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
		});
		//$('#crop_variety').html(variety_list);
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
function getoutputDetail( variety_id ) {	
	$("#output option").remove() ;	
		 if( variety_id !='')
			 
	{   
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/output/"+variety_id,
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
			console.log(value);
			var crop_output = value.crop_output.split(",");
		//console.log(crop_output[0]);
			for(var i=0;i<crop_output.length;i++)
			{
		 output_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product" name="output_product[]" class="form-control " value="'+value.output_name+'" readonly ></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty" name="output_qty[]"  class="form-control" required maxlength="6"><p class="help-block text-danger"></p></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM <span class="text-danger">*</span></label><select id="output_quantity_uom" name="output_quantity_uom[]"  required class="form-control" required="required" data-validation-required-message="Please select quantity uom"><option value="">Select Quantity UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?></select><p class="help-block text-danger"></p></td></tr>';
		 sale_list += '<tr class="row row-space"><td class="col-md-6 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" name="quantity_uom[]" onfocusout="myFunction(this.value)" class="form-control " maxlength="6"  ></td><td class="col-md-6 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom" name="sales_qty_uom[]" class="form-control"  ><option value="" >Select Quantity UOM</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option> <?php } ?></select></td></tr>';
		//$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="output" id="output" class="form-control  name_list" required="required"  /></td> <td><input type="text" name="output_qty" id="output_qty" class="form-control  name_list" required="required"  /></td> <td><input type="text" name="qty_uom" id="qty_uom" class="form-control  name_list" required="required"  /></td> <<p class="help-block text-danger"></p></td>       <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td><td></td></tr>');
			initnumberOnly();  
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
	}
}
	function myFunction( quantity_uom) {
      var input2 = quantity_uom;
      var input1 = Number(document.getElementById( "output_qty" ).value);
		if(input2 >= input1 ){
		alert('Sales Qty cannot be greater than Output Qty');
      $("#quantity_uom").val('');
		}
		else {
      
		document.getElementById("sendMessageButton").disabled =false;
		}
		}			
</script>
 
</body>
</html>
