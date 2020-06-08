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
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View FIG</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('popi/fig');?>">FIG</a></li>
                            <li class="active">View FIG </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				<form  action="<?php echo base_url('popi/fig/updatefig/'.$fig_info->id)?>" method="post" name="sentMessage" id="editfigform" novalidate="novalidate" >
				
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
                                             <div class="form-group col-md-6">
											  <input type="hidden" name="fig_id" value="<?php echo $fig_info->id?>" id="fig_id">
										          <label for="">Select FPO <span class="text-danger">*</span></label>
								                  <select class="form-control" readonly id="fpo_list"  name="fpo_name" required="required"  data-validation-required-message="Select FPO.">
                                                  <option value="">Select Fpo</option>
													 <?php for($i=0; $i<count($fpo);$i++) { 
													  if($fig_info->fpo_id == $fpo[$i]->user_id){
													  ?>
														 <option selected="selected" value="<?php echo $fpo[$i]->user_id; ?>"><?php echo $fpo[$i]->producer_organisation_name; ?></option>
													  <?php
													  }else{ 
													  ?>									
														 <option value="<?php echo $fpo[$i]->user_id; ?>"><?php echo $fpo[$i]->producer_organisation_name; ?></option>
												   <?php }} ?>
												  </select>
												 <p class="help-block text-danger"></p>
                                             </div>
										 </div>
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" readonly maxlength="6" value="<?php echo $fig_info->PIN_Code?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" name="pin_code" disabled placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
													<p class="help-block text-danger" id="pincode_validate"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control sel_state" id="state" name="state" readonly placeholder="State" required>
													  <option  value="<?php echo $fig_info->state?>"><?php echo $fig_info->state_name?></option>
												   </select>
													<!--<input class="form-control" id="state" name="state" readonly  placeholder="State" required="required" data-validation-required-message="Please enter state.">-->				
													<p class="help-block text-danger"></p>
												</div>		
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District <span class="text-danger">*</span></label>
												<select  class="form-control sel_district" id="district" name="district" readonly placeholder="District" required>
													<option  value="<?php echo $fig_info->district?>"><?php echo $fig_info->district_name?></option>
												</select>
												<!--<input type="text" class="form-control numberOnly"  id="district" readonly name="district" placeholder="District" required="required" data-validation-required-message="Please enter district.">-->
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select  class="form-control sel_taluk" id="taluk" name="taluk" disabled required="required" data-validation-required-message="Please select taluk.">
												<option value="">Select Taluk </option>
													<?php foreach($taluk_info as $taluk){
													   if($taluk->taluk_code == $fig_info->taluk)
														  echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
													   else
														  echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
													}
													?>             									
												</select>
												<p class="help-block text-danger"></p>
											</div>
												
										</div>						  
										<div class="row row-space">
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select  class="form-control sel_block" id="block" name="block" disabled required="required" data-validation-required-message="Please select block.">
												<option value="">Select Block </option>
													<?php foreach($block_info as $block){
													   if($block->block_code == $fig_info->block)
														  echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
													   else
														  echo "<option value='".$block->block_code."'>".$block->name."</option>";
													}
													?>                    									
												</select>
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
												<select  class="form-control sel_panchayat" id="gram_panchayat" disabled name="gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat." >
												<option value="">Select Gram Panchayat </option>
													<?php foreach($panchayat_info as $panchayat){
													   if($panchayat->panchayat_code == $fig_info->Gram_PanchayatID)
														  echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
													   else
														  echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
													}
													?>
												</select>
												<p class="help-block text-danger"></p>
											</div>				
										</div>
										 <div class="row row-space">
										 <div class="form-group col-md-6">						    
												<label for="inputAddress2">Village <span class="text-danger">*</span></label>
												<select  class="form-control sel_village" id="village" name="village" disabled required="required" data-validation-required-message="Please select village.">
												<option value="">Select Village </option>
													<?php foreach($village_info as $village){
													   if($village->id == $fig_info->VillageID)
														  echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
													   else
														  echo "<option value='".$village->id."'>".$village->name."</option>";
													}
													?>
												</select>
												<p class="help-block text-danger"></p>
											</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Farmer Interest Group <span class="text-danger">*</span> </label>
													<input type="text" class="form-control" maxlength="50" value="<?php echo $fig_info->FIG_Name?>" id="interest_group" name="interest_group" disabled placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
													<p class="help-block text-danger"></p>
												</div>
										 </div>
										 <div class="row row-space">
											<div class="form-group col-md-6">
												  <label class=" form-control-label">Status <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio1" class="form-check-label">
														  <input type="radio" id="inline-radio1" name="status" value="1" class="form-check-input"  disabled required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
														  <p class="help-block text-danger"></p>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="inline-radio2" name="status" value="2" class="form-check-input" disabled required="required" data-validation-required-message="Please select."><span class="ml-1">Inactive</span>
														  <p class="help-block text-danger"></p>
														</label>
														</div>
													</div>			
												  </div>
											  </div>
										 </div>
										 <div class="col-md-12 text-center">
											  <div id="success"></div>
												<button id="edit" class="btn btn-success btn-fs text-center" type="button"> <i class="fa fa-edit"></i> Edit</button>
												<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
											<!--	<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
												<a href="<?php echo base_url('popi/fig');?>"><button id="ok" href="" class="btn btn-fs btn-outline-dark text-center" type="button"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
												<a href="<?php echo base_url('popi/fig');?>"><button id="cancel" href="" style="display:none" class="btn btn-fs btn-outline-dark text-center" type="button"><i class="fa fa-close" aria-hidden="true"></i> Cancel</button></a>
												
											  </div>
											  
										  </div>
										</div>
									</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		</div>
     <?php $this->load->view('templates/footer.php');?>         
     <?php $this->load->view('templates/bottom.php');?>
		<?php $this->load->view('templates/datatable.php');?>	  
     <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	  <script src="<?php echo asset_url()?>js/register.js"></script>
	 
   </body>
</html>
  <script>
//white spaces 
$(function() {
     $('.form-control').on('keypress', function(e) {
         if (e.which == 32){
			 var newStr = $(this).val().length;
			if(newStr){
				 return true;
			}
			  return false;
		 }else{
			 return true;
		 }
            
     });
 });
	$('#edit').click(function(){
  $('#editfig').toggleClass('view');
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

//sweetalert
	
   $(document).ready(function(){
	  
	  document.getElementById("fpo_list").value='<?php echo $fig_info->fpo_id?>'; 
	   
		  var fig_status = $('input:radio[name=status]');
			var sts=<?php echo $fig_info->status?>;
                        //live stocks purchase by loan
			if(sts == 1){                
					fig_status.filter('[value=1]').prop('checked', true);
			}else if(sts  == 2){                
					fig_status.filter('[value=2]').prop('checked', true);
			}
	       //edit FIG API CALL
			

});

 $('#gram_panchayat').change(function(){
		
		 var gram_panchayat = $("#gram_panchayat").val();
		  //alert(crop_category);
		  getVillageList( gram_panchayat );
	 });  
	 $('#block').change(function(){
		
		 var block = $("#block").val();
		  //alert(crop_category);
		  getPanchayatList( block );
	 });
        

	
	$.fn.serializeObject = function()
			{
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
function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>popi/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				var village = "";
                var village = '<option value="">Select Village </option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
} 
    
function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>popi/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";var gram_panchayat = "";
                gram_panchayat = '<option value="">Select Gram Panchayat </option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat);
               $('#village').html('<option value="">Select Village </option>');
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}       
  
</script>