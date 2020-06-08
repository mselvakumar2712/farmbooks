<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>Add Expenses Updation</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
				            <li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("administrator/updatecrop");?>">Update Expenses</a></li>
                            <li class="active">Add Expenses Updation</li>
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
											<form id="" name="sentMessage" action="<?php echo base_url('administrator/updatecrop/postexpenses_update')?>" method="post"  novalidate="novalidate" >              
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
														<select id="farmer_id" name="farmer_id" class="form-control" required="required" data-validation-required-message="Please select farmer" data-search="true"   >
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>										
														<option value="<?php echo $farmers[$i]->id; ?>"><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
														</select>
														<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
														<label for="inputState">Select Variety </label>
														<select id="variety" name="variety" class="form-control"  >
														<option value="">Select Variety</option>								
														</select>
											   </div>
											</div>
											<div class="row rowspace">
											    <div class="form-group col-md-6">
														<label for="inputState">Cost of Seed </label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_of_seed"  id="cost_of_seed"  placeholder="Cost of Seed" >
														
											   </div>
												<div class="form-group col-md-6 ">
													<label for="inputAddress2">Cost of Land Preparation</label>
													<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="land_preparation"  id="land_preparation" placeholder="Cost of Land Preparation"  >
												</div>
													
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-6 ">
																<label for="inputAddress2">Cost of Planting</label>
																<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_planting"  id="cost_planting" placeholder="Cost of Land Preparation"  >
													</div>
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Fertilizer  </label>
														<input type="text" class="form-control numberOnly expenses" maxlength="6" name="cost_of_fertilizer" id="cost_of_fertilizer" placeholder="Cost of Fertilizer" >
															
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Pesticides  </label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_of_pesticides"  id="cost_of_pesticides" placeholder="Cost of Pesticides"  >
														
													</div>
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Weeding  </label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_of_weeding"  id="cost_of_weeding" placeholder="Cost of Weeding"   >
															
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Harvesting  </label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_of_harvesting"  id="cost_of_harvesting" placeholder="Cost of Weeding"   >
														
													</div>
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Post Harvesting  </label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="cost_of_postharvesting"  id="cost_of_postharvesting" placeholder="Cost of Post Harvesting"  >
														
													</div>
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-6 ">
														<label for="inputAddress2">Other Expenses</label>
														<input type="text" class="form-control numberOnly expenses"  maxlength="6" name="other_expenses"  id="other_expenses" placeholder="Other Expenses" >
													</div>
													<div class="form-group col-md-6 ">
														<label for="inputAddress2">Total <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly" onfocusin="focusFunction(event)" name="total"  id="total" placeholder="Total" required="required" >
													   <p class="help-block text-danger"></p>
													</div>
											</div>
											
                                  <div class="form-group col-md-12 text-center">
                                   <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-floppy-o"></i> &nbsp;Add Expenses Updation</i></button>
                                    <a href="<?php echo base_url('administrator/updatecrop/expenseslist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
//date validation	
function focusFunction(e){
		var val1=document.getElementById("cost_of_seed").value;
      var val2=document.getElementById("cost_of_fertilizer").value;
		var val3=document.getElementById("cost_of_pesticides").value;
		var val3=document.getElementById("cost_of_weeding").value;
		var val4=document.getElementById("land_preparation").value;
		var val5=document.getElementById("cost_planting").value;
		var val6=document.getElementById("cost_of_harvesting").value;
		var val7=document.getElementById("cost_of_postharvesting").value;
		var val8=document.getElementById("other_expenses").value;
		var total=parseInt(val1) + parseInt(val2) + parseInt(val3) + parseInt(val4) + parseInt(val5) + parseInt(val6) + parseInt( val7) + parseInt (val8);
		//var val7=document.getElementById("cost_of_postharvesting").value;
		document.getElementById('total').value = total;
  } 



   $("#farmer_id").change(function() {
     var farmer_id= $('select[name=farmer_id]').val();
	  //alert(farmer_id);
	if( farmer_id !='')
		{
	$.ajax({
		url:"<?php echo base_url();?>administrator/updatecrop/cropvarietymastersDropdown/"+farmer_id,
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
		var variety_list = '<option value="">Select Variety</option>';
		$.each(responseArray.variety_list,function(key,value){
			//$("#variety").append($('<option></option>').val(value.variety_id).html(value.variety_name));
          variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
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
});

  $("#variety").change(function(){  
 
	 var variety_id= $('select[name=variety]').val();
	 if( variety_id != '' )
	 {
         $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/costseed/"+variety_id,
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
					$.each(responseArray.cost_list,function(key,value){
                  var str = value.total;
						var strn1 = str.split('.');
						document.getElementById("cost_of_seed").value==strn1[0];
				    });
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         });
	
         $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/updatecost/"+variety_id,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) { 	
				response=response.trim();                
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
						 console.log(responseArray);
					$.each(responseArray.updatecost_list,function(key,value){
						var str = value.process_total;
						var str1 = str.split('.');
						//console.log(str1);
						 if(value.update_type==2)
						{
							console.log(value.process_total);
							document.getElementById("cost_of_fertilizer").value=str1[0];
						}
						else if(value.update_type==3)
						{
							document.getElementById("cost_of_pesticides").value=str1[0];
						}
						else if(value.update_type==1)
						{
							
						}
  						else
						{
							document.getElementById("cost_of_weeding").value=str1[0];
						} 
				    });
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         });
    
       $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/costharvest/"+variety_id,
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
                    //var variety_list = '<option value="">Select variety</option>';
					$.each(responseArray.costharvest_list,function(key,value){
						document.getElementById("cost_of_harvesting").value=value.harvestcost;
					   //variety_list += '<option value='+value.id+'>'+value.variety+'</option>';
				    });
					//$('#variety').html(variety_list);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
			
			  $.ajax({
			url:"<?php echo base_url();?>administrator/updatecrop/postharvestdetail/"+variety_id,
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
                    //var variety_list = '<option value="">Select variety</option>';
					$.each(responseArray.postharvest_list,function(key,value){
						document.getElementById("cost_of_postharvesting").value=value.postharvest;
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
		 {
				alert('Please provide mandatory field');
		 }	
	 } 
});     


	</script>

	 
 
</body>
</html>
