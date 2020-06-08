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
                        <h1>Add FIG</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('fpo/fig');?>">FIG</a></li>
                            <li class="active">Add FIG</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('fpo/fig/postfig')?>" method="post"  id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                                            
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" maxlength="6" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" name="pin_code" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
													<p class="help-block text-danger" id="pincode_validate"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control sel_state" id="state" name="state" required="required" readonly data-validation-required-message="Please select state.">
														<option value="">Select State </option>
													</select>
													<!--<input class="form-control" id="state" name="state"   placeholder="State" required="required" readonly data-validation-required-message="Please enter state.">-->				
													<p class="help-block text-danger"></p>
												</div>		
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District <span class="text-danger">*</span></label>
												<select  class="form-control sel_district" id="district" name="district" required="required" readonly data-validation-required-message="Please select state.">
														<option value="">Select District </option>
													</select>
												<!--<input type="text" class="form-control "  id="district" name="district" placeholder="District" readonly required="required" data-validation-required-message="Please enter district.">-->
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select  class="form-control sel_taluk" id="taluk" name="taluk" required="required"  data-validation-required-message="Please select taluk.">
												<option value="">Select Taluk </option>
												</select>
												<p class="help-block text-danger"></p>
											</div>	
										</div>						  
										<div class="row row-space">
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select  class="form-control sel_block" id="block" name="block" required="required"   data-validation-required-message="Please select block.">
												<option value="">Select Block </option>
												</select>
												<p class="help-block text-danger"></p>
											</div>											
											<div class="form-group col-md-6">
												<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
												<select  class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat.">
												<option value="">Select Gram Panchayat </option>
												</select>
												<p class="help-block text-danger"></p>												
											</div>						
										</div>
										 <div class="row row-space">
												<div class="form-group col-md-6">
												<label for="inputAddress2">Village <span class="text-danger">*</span></label>
												<select  class="form-control sel_village" id="village" name="village" required="required" data-validation-required-message="Please select village.">
												<option value="">Select Village </option>
												</select>
												<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
												<label for="inputAddress2">Name of the Farmer Interest Group <span class="text-danger">*</span> </label>
													<input type="text" class="form-control" id="interest_group" minlength="3" maxlength="50" name="interest_group" placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
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
														  <input type="radio" id="inline-radio1" name="status" value="1" class="form-check-input" checked required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
														  <p class="help-block text-danger"></p>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="inline-radio2" name="status" value="2" class="form-check-input" required="required" data-validation-required-message="Please select."><span class="ml-1">Inactive</span>
														  <p class="help-block text-danger"></p>
														</label>
														</div>
													</div>			
												  </div>
											  </div>
										 </div>
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" value="Save" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('fpo/fig');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i>  Cancel</a>	
											  </div>
											 
											  </div>
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
		
     <?php $this->load->view('templates/footer.php');?>         
     <?php $this->load->view('templates/bottom.php');?>
		<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>      
      
<script>
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
 
        
function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
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
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}                
</script>
</body>
</html>