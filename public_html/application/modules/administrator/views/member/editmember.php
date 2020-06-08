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
                            <li><a href="<?php echo base_url('administrator/fig');?>">FIG</a></li>
                            <li class="active">View FIG </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="#" name="sentMessage" id="editfigform" novalidate="novalidate" >
					<input type="hidden" name="fig_id" value="<?php echo $_REQUEST['id']?>" id="fig_id">
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
                                            
										<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">Pin Code <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" name="pin_code" disabled placeholder="Pin Code" required="required" data-validation-required-message="Please enter pin code.">
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control" id="state" name="state" readonly placeholder="State" required>
													  <option value="">Select State </option>
												   </select>
													<p class="help-block text-danger"></p>
												</div>		
										 </div>
                                            
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District <span class="text-danger">*</span></label>
												<select  class="form-control" id="district" name="district" readonly placeholder="District" required>
													<option value="">Select State </option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select  class="form-control" id="block" name="block" readonly required="required" data-validation-required-message="Please select block.">
												<option value="">Select Block </option>											
												</select>
												<p class="help-block text-danger"></p>
											</div>		
										</div>
                                            
										<div class="row row-space">
										<div class="form-group col-md-6">						    
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select  class="form-control" id="taluk" name="taluk" readonly required="required" data-validation-required-message="Please select taluk.">
												<option value="">Select Taluk </option>											
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
												<select  class="form-control" id="gram_panchayat" disabled name="gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat." onchange="getVillageList(this.value);">
												<option value="">Select Gram Panchayat </option>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											
																	
										</div>
                                            
										 <div class="row row-space">
										 <div class="form-group col-md-6">						    
												<label for="inputAddress2">Village <span class="text-danger">*</span></label>
												<select  class="form-control" id="village" name="village" disabled required="required" data-validation-required-message="Please select village.">
												<option value="">Select Village </option>
												</select>
												</select>
												<p class="help-block text-danger"></p>
											</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Farmer Interest Group <span class="text-danger">*</span> </label>
													<input type="text" class="form-control" id="interest_group" name="interest_group" disabled placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
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
												<input id="edit" value="Edit" class="btn btn-success text-center" type="button">
												<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit" style="display:none;">
												<a href="#" id="" class="del btn btn-danger"> Delete</a>
												<a href="<?php echo base_url('administrator/fig');?>"><input id="ok" href="" value="OK" class="btn btn-success text-center" type="button"></a>
												<a href="<?php echo base_url('administrator/fig');?>"><input id="cancel" href="" value="Cancel" style="display:none" class="btn btn-outline-dark text-center" type="button"></a>
												
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
        } else {
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

function getPincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();responseArray=$.parseJSON(response);
                
                var village = '';
					 var state = '';
					 var district = '';
					 var block ='';
					 var taluk ='';
					 var village = '';
					 var gram_panchayat = '';
                $.each(responseArray.getlocation['villageInfo'],function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                    gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['talukInfo'],function(key, value){
                    taluk += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['blockInfo'],function(key, value){
                   block += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['cityInfo'],function(key, value){
                    district += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['stateInfo'],function(key, value){
                    state += '<option value='+value.id+'>'+value.name+'</option>'
                });
                $('#village').html(village);
                $('#gram_panchayat').html(gram_panchayat);
				$('#state').html(state);
				$('#district').html(district);
				$('#block').html(block);
				$('#taluk').html(taluk);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
} 
      
        
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
                var village = "";
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
</script>