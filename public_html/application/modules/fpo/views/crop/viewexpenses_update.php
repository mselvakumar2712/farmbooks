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
                        <h1>View Expenses Updation</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
				            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Expenses</a></li>
                            <li class="active">View Expenses Updation</li>
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
										<form name="sentMessage" method="post" action="#" novalidate="novalidate" id="view_postharvest">
											<input type="hidden" name="expenses_id" value="<?php echo number_format($expenses_info[0]->id, 2); ?>" id="expenses_id">
											<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Farmer Name <span class="text-danger">*</span></label>													
													<input type="text" class="form-control numberOnly" value="<?php echo $expenses_info[0]->profile_name;?>" name="farmer_id" id="farmer_id" placeholder="farmer_id" disabled>
												</div>
												<div class="form-group col-md-6">
													<label for="inputState">Select Variety <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" value="<?php echo $expenses_info[0]->variety_name;?>" name="variety" id="variety" placeholder="variety" disabled>
											   </div>
											</div>
											<div class="row rowspace">
											    <div class="form-group col-md-4">
													<label for="inputState">Cost of Seed </label>
													<input type="text" class="form-control numberOnly text-right expense" value="<?php echo number_format($expenses_info[0]->seed_cost, 2, '.', '');?>" name="cost_of_seed" id="cost_of_seed" placeholder="Cost of Seed" disabled>
											   </div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Cost of Land Preparation</label>
													<input type="text" class="form-control numberOnly text-right expense" value="<?php echo number_format($expenses_info[0]->land_preparation_total, 2, '.', '');?>" name="land_preparation" id="land_preparation" placeholder="Cost of Land Preparation" disabled>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Cost of Planting</label>
													<input type="text" class="form-control numberOnly text-right expense" value="<?php echo number_format($expenses_info[0]->planting_cost_total, 2, '.', '');?>" name="cost_planting" id="cost_planting" placeholder="Cost of Land Preparation" disabled >
												</div>	
											</div>
											<div class="row rowspace">												
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Nutrient  </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_nutrient" value="<?php echo number_format($expenses_info[0]->nutrient_total, 2, '.', '');?>" id="cost_of_nutrient" placeholder="Cost of Nutrient" disabled >	
												</div>											
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Fertilizer  </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_fertilizer" value="<?php echo number_format($expenses_info[0]->fertilizer_total, 2, '.', '');?>" id="cost_of_fertilizer" placeholder="Cost of Fertilizer" disabled >	
												</div>
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Pesticides  </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_pesticides" id="cost_of_pesticides" value="<?php echo number_format($expenses_info[0]->pesticide_total, 2, '.', '');?>" placeholder="Cost of Pesticides" disabled >													
												</div>
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Weeding </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_weeding" id="cost_of_weeding" placeholder="Cost of Weeding" value="<?php echo number_format($expenses_info[0]->weeding_total, 2, '.', '');?>" disabled >													
												</div>
											</div>
											<div class="row rowspace">												
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Harvesting </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_harvesting" id="cost_of_harvesting" placeholder="Cost of Harvesting" value="<?php echo number_format($expenses_info[0]->harvesting_total, 2, '.', '');?>" disabled >													
												</div>
												<div class="form-group col-md-3">	
													<label for="inputAddress2">Cost of Post Harvesting </label>
													<input type="text" class="form-control numberOnly text-right expense" name="cost_of_postharvesting" id="cost_of_postharvesting" placeholder="Cost of Post Harvesting" value="<?php echo number_format($expenses_info[0]->post_harvesting_total, 2, '.', '');?>"  disabled >													
												</div>
												<div class="form-group col-md-3">
													<label for="inputAddress2">Other Expenses </label>
													<input type="text" class="form-control numberOnly text-right expense" name="other_expenses" id="other_expenses" placeholder="Other Expenses" value="<?php echo number_format($expenses_info[0]->other_expenses_total, 2, '.', ''); ?>" disabled >
												</div>
												<div class="form-group col-md-3">
												   <label for="inputAddress2">Total</label>
													<input type="text" class="form-control numberOnly text-right" name="total" id="total" placeholder="Total" value="<?php //echo number_format($expenses_info[0]->cost_total, 2); ?>" disabled>
													 <div class="help-block with-errors text-danger"></div>
												</div>
											</div>
											
										 <div class="col-md-12 text-center">
											<div id="success"></div>
											<a href="<?php echo base_url('fpo/updatecrop/editexpenses_update/').$expenses_info[0]->id?>" id="edit" class="btn-fs btn btn-success text-center"><i class="fa fa-edit"></i> Edit Expenses Updation<a>
											<a href="<?php echo base_url('fpo/updatecrop/expenseslist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>									
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
//date validation	
sum=0;
var x = document.getElementsByClassName("expense");
for(var i = 0; i<x.length; i++){
   sum += parseFloat(x[i].value || 0);
}
document.getElementById('total').value = sum+'.00';
/*     
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
	/*$('#edit').click(function(){
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
		  inp.attr('disabled', 'disabled');
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
	var farmer_id =<?php echo $expenses_info[0]->farmer_id;?>; 
    var variety_id =<?php echo $expenses_info[0]->crop_id;?>;	 
    getVarietyDetail(farmer_id);     
});
function getVarietyDetail(farmer_id) {
	var variety_id = "<?php echo $expenses_info[0]->crop_id;?>";
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
			if(responseArray.status==1){
				var variety_list = '';
				$.each(responseArray.variety_list,function(key,value){
					if(variety_id==value.id){
						variety_list += '<option value='+value.id+' selected>'+value.variety_name+'</option>';
					}else{
						variety_list += '<option value='+value.id+'>'+value.variety_name+'</option>';
					}
				});
				$('#variety').html(variety_list);
			}
		},
		error:function(response){
			alert('Error!!! Try again');
		} 			
	}); 
} */ 
</script>
</body>
</html>
