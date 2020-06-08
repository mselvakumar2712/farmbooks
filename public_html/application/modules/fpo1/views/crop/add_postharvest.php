<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left:830px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
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
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none !important; 
    border-radius: 4px;
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
                        <h1>Add Post Harvest</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/postharvest");?>">Post Harvest</a></li>
                            <li class="active">Add Post Harvest</li>
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
										<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="add_postharvest">
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
												<div class="form-group col-md-6 ">
														<label for="inputAddress2">Date <span class="text-danger">*</span></label>
														<input type="date" class="form-control "  name="date"  id="date" placeholder="Date" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31">
														<div class="help-block with-errors text-danger"></div>
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-4">
														<label for="inputState">Select Variety <span class="text-danger">*</span></label>
														<select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select variety" >
																					
														</select>
														<p class="help-block text-danger"></p>
													</div>
													
													<div class="form-group col-md-4">	
														<label for="inputAddress2">Type of Work <span class="text-danger">*</span> </label>
														<select  class="form-control" id="type_of_work" name="type_of_work" required="required" data-validation-required-message="Please select type of work.">
                                                   <option value="">Select Type of Work</option>
																	<?php for($i=0;$i<count($worktype);$i++) { ?>
                                                    <option value="<?php echo $worktype[$i]->id; ?>"><?php echo $worktype[$i]->name; ?></option>
                                                    <?php } ?>
														</select>
														<p class="help-block with-errors text-danger"></p>
													</div>
													<div class="form-group col-md-4">
														<label class=" form-control-label">Available for Sale</label>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio1" class="form-check-label">
																			<input type="radio" id="available1" name="available" value="1" class="form-check-input" ><span class="ml-1">Yes</span>
																		</label>
																	</div> 
																</div>
																<div class="col-md-6">
																	<div class="form-check-inline form-check">
																		<label for="inline-radio2" class="form-check-label">
																			<input type="radio" id="available2" name="available" value="2" class="form-check-input" ><span class="ml-1">No</span>
																		</label>
																	</div>
																</div>			
															</div>
													
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-4" id="test">	
														<label for="inputAddress2">Input <span class="text-danger">*</span> </label>
														<select  class="form-control" id="input" name="input"  required="required" data-validation-required-message="Please select input." >
												      </select>
														<p class="help-block with-errors text-danger"></p>
													</div>
													<div class="form-group col-md-2 ">
														<label for="inputAddress2">Input(Qty) <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly"  maxlength="6" name="input_qty" required="required" id="input_qty" placeholder="Input(Qty)" required="required" data-validation-required-message="Please enter input(qty)" >
														<p class="help-block with-errors text-danger"></p>
													</div>
													<div class="form-group col-md-2">
														<label for="inputAddress">Input (Qty UOM) <span class="text-danger">*</span></label>
														<select id="input_qty_uom" name="input_qty_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom">
														<option value="" >Select</option>
														<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
															<option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option>
														  <?php } ?> 						
													</select>
													<p class="help-block text-danger"></p>
												</div>
												 <div class="form-group col-md-4">
														<label for="inputAddress2">Cost of Post Harvesting</label>
														<input type="text" class="form-control numberOnly"  maxlength="6" name="cost_post_harvesting" id="cost_post_harvesting" placeholder="Cost of Post Harvesting" >
														<div class="help-block with-errors text-danger"></div>
													</div>
											</div>
											<div class="row rowspace">
												<div class="col-md-8" id="div1">										
												</div>
												<div class="col-md-4" id="div2" style="display:none;">
											   </div>
											</div>
											<div class="row rowspace">		
											</div>
											<div class="row rowspace">												
											</div>
											<input type="button" class="btn_add" style="display:none;" value="Count Rows" />
                                  <div class="form-group col-md-12 text-center">
                                    <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-floppy-o"></i> &nbsp;Add Post Harvest</button>                                    
                                    <a href="<?php echo base_url('fpo/updatecrop/postharvest');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
                                </div>                                       
										</form>
									</div>
								</div>
							</div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
 </div>
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
     //  alert("jjj");
        $('#div2').show();
        $('#available2').val('');
       
    }
});
$('#available2').change(function() {
    if(this.checked) {
       //alert("kkkkkkk");
        $('#div2').hide();
        $('#available1').val('');
    }
}); 

$('#farmer_id').change(function(){
		 var farmer_id = $("#farmer_id").val();
		  getVarietyDetail( farmer_id );
	 });	
	 $('#variety').change(function(){
		 var variety = $("#variety").val();
		  getinputDetail( variety );
	 });
	 $('#input').change(function(){
		 var input = $("#input").val();
		  getoutputDetail( input );
	 });
   
function getVarietyDetail( farmer_id ) {
     if( farmer_id !='')
		{
      $("#variety option").remove() ;
      $.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/postharvestvariety/"+farmer_id,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		responseArray=$.parseJSON(response);
		if(responseArray.status==1){
			if (Object.keys(responseArray).length > 0) {
			  $("#variety").append($('<option></option>').val(0).html('Select Variety'));
			 }
			 else {
			  $("#variety").append($('<option></option>').val(0).html(''));  
			 }
		$.each(responseArray.variety_list,function(key,value){
			$("#variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
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
  function getinputDetail( crop_id ) {
	  $("#input option").remove() ;
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
		responseArray=$.parseJSON(response);
		if(responseArray.status==1){
		if (Object.keys(responseArray).length > 0) {
			$("#input").append($('<option></option>').val(0).html('Select Input'));
		  }
		 else {
		  $("#input").append($('<option></option>').val(0).html(''));  
			}	
		$.each(responseArray.input_list,function(key,value){
		var crop_output = value.crop_output.split(",");
		for(i=0;i<crop_output.length;i++)
		{
			$("#input").append($('<option></option>').val(value.variety_id).html(crop_output[i]));
		
		}});
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
	
function getoutputDetail( input ) {
	 if( input !='')
		{
      $.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/outputmaster/"+input,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
		response=response.trim();
		responseArray=$.parseJSON(response);
      var output_list = "";
		var sale_list = "";
		if(responseArray.output_list.length != 0){
         var test=0;
		$.each(responseArray.output_list,function(key,value){
        output_list += '<tbody id="dynamic_field"><tr id="row0" class="row row-space" ><td class="col-md-4 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product"  readonly value="'+value.output_name+'" name="output_product[]" class="form-control make" required></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty"  value="'+value.output_qty+'" name="output_qty[]"  class="form-control" required ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control" required ><option value="" >Select</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++){ ?>
							(value.qty_uom == <?php echo $quantity_uom[$i]->id?>) ? output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->short_name; ?></option>' : output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
							<?php } ?>
                     
                      sale_list += '<tbody id="output_field"><tr class="row_child row-space"><td  class="col-md-4 form-group"><input type="text" id="quantity_uom" onfocusout="myFunction(this.value)" value='+value.qty_sales+' name="quantity_uom[]" class="form-control "  ></td><td class="col-md-8 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom"  name="sales_qty_uom[]"  class="form-control"><option value="" >Select</option>';
							<?php for($i=0;$i<count($quantity_uom);$i++) { ?>
							(value.sales_qty_uom == <?php echo $quantity_uom[$i]->id?>) ? sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" selected="selected"><?php echo $quantity_uom[$i]->short_name; ?></option>' : sale_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
							<?php } ?>
							sale_list += '</select></td></tr></tbody>';	
                     
                     if(test == responseArray.output_list.length-1){
                           console.log(responseArray.output_list.length);
                          output_list += '</select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_'+test+'" style="display:none;" class="btn btn-danger btn_remove" style="display:block;">-</button>&nbsp;&nbsp;<button type="button" name="add" id="add_'+test+'" class="btn btn-success btn_add" style="display:block;">+</button></td> </tr></tbody>';
                        
                        
                     } else {
                        console.log(responseArray.output_list.length);
                       output_list += '</select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_'+test+'" style="display:block;" class="btn btn-danger btn_remove">-</button>&nbsp;&nbsp;<button type="button" name="add" id="add_'+test+'" class="btn btn-success btn_add" style="display:none;">+</button></td> </tr></tbody>';
                     }
                     test++;
                     
                      
         }); 
      
      } else {
               output_list += '<tbody id="dynamic_field"><tr id="row0" class="row row-space"><td class="col-md-4 form-group"><label for="inputAddress">Output <span class="text-danger">*</span></label> <input type="text" id="output_product" name="output_product[]" class="form-control make" required></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty" name="output_qty[]"  class="form-control" required ></td><td class="col-md-3 form-group"> <label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control" required ><option value="" >Select</option>';
               <?php for($i=0;$i<count($quantity_uom);$i++) { ?>
               output_list += '<option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option>'; 
               <?php } ?>
               output_list += '</select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_0" style="display:none;" class="btn btn-danger btn_remove">-</button>&nbsp;&nbsp;<button type="button" name="add" id="add_0" class="btn btn-success btn_add">+</button></td></tr></tbody>';
               sale_list += '<tbody id="output_field"><tr class="row_child row-space"><td class="col-md-4 form-group"><label for="inputAddress">Sales (Qty)</label> <input type="text" id="quantity_uom" onfocusout="myFunction(this.value)"  name="quantity_uom[]" class="form-control "  ></td><td class="col-md-4 form-group"> <label for="inputAddress">Quantity UOM</label><select id="sales_qty_uom"  name="sales_qty_uom[]"  class="form-control"><option value="" >Select</option>';
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

 $('form').submit(function(e){
	e.preventDefault();
	const postharvestdata = $('#add_postharvest').serializeObject();
   console.log(postharvestdata);
   
   if( postharvestdata !='')
		{	
		 $.ajax({
			url:"<?php echo base_url();?>fpo/updatecrop/post_harvest",
			type:"POST",
			data:postharvestdata,
			dataType:"html",
         cache:false,			
			success:function(response){	
            response=response.trim();
			   responseArray=$.parseJSON(response);
            
            console.log(responseArray.status);
			 if(responseArray.status == 2){
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

function myFunction( quantity_uom) {
    var input2 = quantity_uom;
    var input1 = Number(document.getElementById( "output_qty" ).value);
   if(input2 >= input1 ){
   alert('Sales Qty cannot be greater than Output Qty');
   document.getElementById("sendMessageButton").disabled = true;
   }
   else {
   document.getElementById("sendMessageButton").disabled =false;
   }
}
 
$(document).ready(function(){   
   
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
           var clickedID = $(this).attr("id"); 
           $("#"+clickedID).css("display", "none");
           $("#"+clickedID).siblings().css("display", "block");
           
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
         
        $('#dynamic_field').append('<tr id="row_child'+i+'" class="dynamic-added row row-space"><td class="col-md-4" id="test'+i+'"><label for="inputAddress">Output <span class="text-danger">*</span></label><select type="text" id="output_product'+i+'" name="output_product[]" class="form-control make"></select></td><td class="col-md-3 form-group"><label for="inputAddress2">Output(Qty) <span class="text-danger">*</span></label><input type="text" id="output_qty'+i+'" maxlength="6" name="output_qty[]" class="form-control numberOnly" required ></td><td class="col-md-3"><label for="inputAddress">Quantity UOM</label><select id="output_quantity_uom"  name="output_quantity_uom[]"  class="form-control" required ><option value="" >Select</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>"><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?> </select></td><td class="col-md-2 mt-4"><button type="button" name="remove" id="remove_'+i+'" class="btn btn-danger btn_remove" style="display: none;">-</button><button type="button" name="add" id="add_'+i+'" class="btn btn-success btn_add">+</button></td></tr>');  
        
        $('#output_field').append('<tr id="row_child'+i+'" class="dynamic-added row row-space mt-4"><td class="col-md-6"><input type="text" id="quantity_uom'+i+'" onfocusout="myFunction(this.value)"  name="quantity_uom[]" class="form-control"></td><td class="col-md-6"><select id="sales_qty_uom'+i+'"  name="sales_qty_uom[]"  class="form-control"><option value="" >Select</option><?php for($i=0;$i<count($quantity_uom);$i++) { ?><option value="<?php echo $quantity_uom[$i]->id; ?>" ><?php echo $quantity_uom[$i]->short_name; ?></option><?php } ?></select></td></tr>');  
   
        initnumberOnly();   
    
        $("#output_product"+i).select2({           
            placeholder: "Select output", //placeholder
            tags: true
         });

           $(".btn_add").click(function () { 
               var totalRowCount = $("#dynamic_field tr").length;
               var rowCount = $("#dynamic_field td").closest("tr").length;
               if(rowCount>=5){
                  swal('',"Maximum of 5 Output only");
                  return false;                 
               }
              // $( "#dynamic_field tr:last" ).css({ backgroundColor: "green", fontWeight: "bolder" });

               var message = "Total Row Count: " + totalRowCount;
               message += "\nRow Count: " + rowCount;
              // alert(message);
          });
          


       //  count(k);
         
         getCropByName("output_product"+i);          
         $('#add_'+j).hide();
         $('#remove_'+j).show();          
         
          return true;// you can submit form or send ajax or whatever you want here
         }else{
            swal('',"Provide the Data's");
            return false;
         }
		});
  $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");           
        var arr = $(this).attr("id").split("_"); 
         rowCount--;
         $('#add_'+j).show();
        $('#row'+arr[1]).remove();
        $('#row_child'+arr[1]).remove();
	});
    
function getCropByName(output_product) {
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
			         $("#"+output_product).append($('<option></option>').val(0).html('Select output'));
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
});
</script> 
</body>
</html>
