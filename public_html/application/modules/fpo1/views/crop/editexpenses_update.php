<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($expenses_info);
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
                        <h1>Update Expenses Updation</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
				            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Expenses</a></li>
                            <li class="active">Update Expenses Updation</li>
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
										<form  name="sentMessage" method="post" action="<?php echo base_url('fpo/updatecrop/updateexpenses/'.$expenses_info[0]->id)?>" novalidate="novalidate" id="add_postharvest">
											<input type="hidden" name="expenses_id" value="<?php echo $expenses_info[0]->id; ?>" id="expenses_id">
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>
														<select id="farmer_id" name="farmer_id" class="form-control" required="required" readonly data-validation-required-message="Please select farmer" data-search="true"  >
														<option value="">Select farmer</option>
														<?php for($i=0; $i<count($farmers);$i++) { ?>
														<option value="<?php echo $farmers[$i]->id; ?>" <?php echo ($expenses_info[0]->farmer_id == $farmers[$i]->id) ? 'selected' : '' ?>><?php echo $farmers[$i]->profile_name; ?></option>
														<?php } ?>								
														</select>
														<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
														<label for="inputState">Select Variety </label>
														<select id="variety" name="variety" class="form-control" >																			
														</select>
														
											   </div>
											</div>
											<div class="row rowspace">
											    <div class="form-group col-md-6">
														<label for="inputState">Cost of Seed </label>
														<input type="text" class="form-control numberOnly expense"  onfocusout="focusFunction(event)" value="<?php echo $expenses_info[0]->seed_total;?>" maxlength="6" name="cost_of_seed"  id="cost_of_seed"  placeholder="Cost of Seed"    >
														
														
											   </div>
												<div class="form-group col-md-6 ">
													<label for="inputAddress2">Cost of Land Preparation</label>
													<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" value="<?php echo $expenses_info[0]->land_preparation_total;?>" name="land_preparation"  id="land_preparation" placeholder="Cost of Land Preparation" >
												</div>
													
											</div>
											<div class="row rowspace">
													<div class="form-group col-md-6 ">
																<label for="inputAddress2">Cost of Planting</label>
																<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" value="<?php echo $expenses_info[0]->planting_cost_total;?>" name="cost_planting"  id="cost_planting" placeholder="Cost of Land Preparation"  data-validation-required-message="Please enter input(qty)"  >
													</div>
                                       <div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Nutrient  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_nutrient" value="<?php echo $expenses_info[0]->nutrient_total;?>"  id="cost_of_nutrient" placeholder="Cost of Nutrient"  data-validation-required-message="Please enter input(qty)"  >	
													</div>
											</div>
											<div class="row rowspace">
                                       <div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Fertilizer  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_fertilizer" value="<?php echo $expenses_info[0]->fertilizer_total;?>"  id="cost_of_fertilizer" placeholder="Cost of Fertilizer"  data-validation-required-message="Please enter input(qty)"  >	
													</div>
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Pesticides  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_pesticides"  id="cost_of_pesticides" value="<?php echo $expenses_info[0]->pesticide_total;?>" placeholder="Cost of Pesticides"  data-validation-required-message="Please enter input(qty)"  >
													
													</div>
											</div>
											<div class="row rowspace">
                                       <div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Weeding  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_weeding"  id="cost_of_weeding" placeholder="Cost of Weeding" value="<?php echo $expenses_info[0]->weeding_total;?>"  data-validation-required-message="Please enter input(qty)" >													
													</div>
													<div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Harvesting  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_harvesting"  id="cost_of_harvesting" placeholder="Cost of Harvesting" value="<?php echo $expenses_info[0]->harvesting_total;?>"  data-validation-required-message="Please enter input(qty)"  >
														
													</div>
											</div>
											<div class="row rowspace">
                                       <div class="form-group col-md-6">	
														<label for="inputAddress2">Cost of Post Harvesting  </label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="cost_of_postharvesting"  id="cost_of_postharvesting" placeholder="Cost of Post Harvesting"  value="<?php echo $expenses_info[0]->post_harvesting_total;?>" data-validation-required-message="Please enter input(qty)"  >													
													</div>
													<div class="form-group col-md-6 ">
														<label for="inputAddress2">Other Expenses</label>
														<input type="text" class="form-control numberOnly expense" onfocusout="focusFunction(event)" maxlength="6" name="other_expenses"  id="other_expenses" placeholder="Other Expenses" value="<?php echo $expenses_info[0]->other_expenses_total?>"   >
													</div>
											</div>
                                 <div class="row rowspace">
                                 <div class="form-group col-md-6 ">
                                    <label for="inputAddress2">Total</label>
                                    <input type="text" class="form-control numberOnly"   name="total" id="total" placeholder="Total" required="required" data-validation-required-message="Please enter input(qty)" value="<?php echo $expenses_info[0]->cost_total?>" >
                                    <div class="help-block with-errors text-danger"></div>
                                 </div>
                                 </div>
                                 <div class="col-md-12 text-center">
                                    <div id="success"></div>
                                    <button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" ><i class="fa fa-check-circle"></i> Update Expenses Updation</button>
                                    <a href="<?php echo base_url('fpo/updatecrop/expenseslist');?>" id="cancel" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
      function focusFunction(e){
            sum=0;
            var x = document.getElementsByClassName("expense");
            for(var i = 0; i<x.length; i++){
               sum += parseFloat(x[i].value || 0);
            }
            document.getElementById('total').value = sum;
      }
      sum=0;
      var x = document.getElementsByClassName("expense");
      for(var i = 0; i<x.length; i++){
         sum += parseFloat(x[i].value || 0);
      }
      document.getElementById('total').value = sum;
  $(document).ready(function(){

	 var farmer_id =<?php echo $expenses_info[0]->farmer_id;?>; 
    var variety_id =<?php echo $expenses_info[0]->crop_id;?>;	 console.log(variety_id);
    getVarietyDetail( farmer_id );
   
   function getVarietyDetail( farmer_id ) {
	var variety_id =<?php echo $expenses_info[0]->farmer_id;?>;
	console.log(variety_id);
	$.ajax({
		url:"<?php echo base_url();?>fpo/updatecrop/varietymaster/"+farmer_id,
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

		var variety_list = '';console.log(responseArray.variety_list);
		$.each(responseArray.variety_list,function(key,value){
			if(variety_id == value.crop_id){
				variety_list += '<option value='+value.crop_id+ ' selected>'+value.variety_name+'</option>';
			}else{
				variety_list += '<option value='+value.crop_id+ '>'+value.variety_name+'</option>';
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

});
</script>
</body>
</html>
