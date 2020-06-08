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
                        <h1>View FPG</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
									<li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('administrator/fpg');?>">FPG</a></li>
                            <li class="active">View FPG</li>
                       </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  name="sentMessage" novalidate="novalidate" id="editfpgform" method="post" >
					<input type="hidden" name="fpg_id" value="<?php echo $_REQUEST['id']?>" id="fpg_id">
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											 <div class="row row-space">
                                    <div class="form-group col-md-6">
                                       <label for="">FPO <span class="text-danger">*</span></label>	 
                                       <select class="form-control" id="fpo_list" name="fpo_name"  required="required" readonly data-validation-required-message="Select FPO...">
                                          <option value="">Select fpo </option>
                                          <?php for($i=0; $i<count($fpo);$i++) {
                                          if($fpg_info->fpo_id == $fpo[$i]->user_id){
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
												<label for="inputAddress2">PINCODE <span class="text-danger">*</span> </label>
													<input type="text" class="form-control numberOnly this_pin_code" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" maxlength="6" disabled readonly name="pin_code" placeholder="PINCODE" value="<?php echo $fpg_info->PIN_Code;?>" required="required" data-validation-required-message="Please enter pin code.">
												<p class="help-block text-danger" id="pincode_validate"></p>
												</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">State <span class="text-danger">*</span></label>
												<select  class="form-control sel_state" id="state" name="state" readonly placeholder="State" required>
													<option  value="<?php echo $fpg_info->state?>"><?php echo $fpg_info->state_name?></option>
												</select>
												<!--<input class="form-control" id="state" name="state"   placeholder="State" required="required" readonly data-validation-required-message="Please enter state.">-->				
												<p class="help-block text-danger"></p>
												</div>		
										 </div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District <span class="text-danger">*</span></label>
												<select  class="form-control sel_district" id="district" name="district" readonly placeholder="District" required>
													<option  value="<?php echo $fpg_info->district?>"><?php echo $fpg_info->district_name?></option>
												</select>
												<!--<input type="text" class="form-control numberOnly"  id="district" name="district" placeholder="District" readonly required="required" data-validation-required-message="Please enter district.">-->
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select  class="form-control sel_taluk" id="taluk" disabled name="taluk" required="required"  data-validation-required-message="Please select block.">
												<option value="">Select Taluk </option>
                                    <?php foreach($taluk_info as $taluk){
                                       if($taluk->taluk_code == $fpg_info->taluk)
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
												<select  class="form-control sel_block" id="block" disabled name="block" required="required" data-validation-required-message="Please select block.">
												<option value="">Select Block </option>
                                    <?php foreach($block_info as $block){
                                       if($block->block_code == $fpg_info->block)
                                          echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                       else
                                          echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                    }
                                    ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>	
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span> </label>
												<select  class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" disabled required="required" data-validation-required-message="Please select gram panchayat.">
												<option value="">Select Gram Panchayat </option>
                                    <?php foreach($panchayat_info as $panchayat){
                                       if($panchayat->panchayat_code == $fpg_info->Gram_PanchayatID)
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
												<select  class="form-control sel_village" id="village" name="village" required="required" disabled data-validation-required-message="Please select village.">
												<option value="">Select Village </option>
                                    <?php foreach($village_info as $village){
                                       if($village->id == $fpg_info->VillageID)
                                          echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                       else
                                          echo "<option value='".$village->id."'>".$village->name."</option>";
                                    }
                                    ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>		
											<div class="form-group col-md-6">
												<label for="inputAddress2">Name of the Farmer Producer Group <span class="text-danger">*</span> </label>
												<input type="text" class="form-control" maxlength="50" id="interest_group" name="interest_group" disabled placeholder="Name of the Farmer Producer Group" required="required" data-validation-required-message="Please enter name of the farmer interest group." value="<?php echo $fpg_info->FPG_Name?>">
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
														  <input type="radio" id="inline-radio1" name="status" value="1" class="form-check-input" disabled required="required" data-validation-required-message="Please select."<?php echo $fpg_info->status == 1?" checked='checked'":''?>>Active
														  <p class="help-block text-danger"></p>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="inline-radio2" name="status" value="2" class="form-check-input" disabled required="required" data-validation-required-message="Please select."<?php echo $fpg_info->status != 1?" checked='checked'":''?>>Inactive
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
												<button id="edit" class="btn btn-fs btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
												<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
												<!--<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
												<a href="<?php echo base_url('administrator/fpg');?>" id="back" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
												<a href="<?php echo base_url('administrator/fpg');?>" id="cancel" class="btn-fs btn btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
		</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
	  
<script>
$('#gram_panchayat').change(function(){
     var gram_panchayat = $("#gram_panchayat").val();
      getVillageList( gram_panchayat );
   });  
   $('#block').change(function(){
    
     var block = $("#block").val();
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
	  
	  
	  
 $('#edit').click(function(){
  $('#editfpg').toggleClass('view');
  $("#sendMessageButton").show();
  $("#cancel").show();
  $("#edit").hide();$("#back").hide();
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

$('a.del').click(function() {
		var fpg_id = <?php echo $_REQUEST['id']?>;
		swal({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         type: 'question',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
         if (result.value) {          
            $(this).prop("disabled", true);
            $.ajax({
              url: "<?php echo base_url();?>administrator/fpg/deletefpg/"+fpg_id,
              type: "POST",
              data: {
                 this_delete: fpg_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('administrator/fpg')?>");
                 }, 1000);
              },
              error: function() {
                 
                 setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 1000);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "You have cancelled the fpg information delete action", "info");
            return false;
         }
      });
	});
			
	$('form').submit(function(e){
	e.preventDefault();
	var fpg_id =<?php echo $_REQUEST['id']?>;
	const fpgdata = $('#editfpgform').serializeObject();
	if(fpgdata !='')
	{
	//var popi_id =<?php echo $_REQUEST['id']?>;
	//var url=";
	console.log(fpgdata);
		 $.ajax({
			url:"<?php echo base_url();?>administrator/fpg/updatefpg/"+fpg_id,
			type:"POST",
			data:fpgdata,
			dataType:"html",
            cache:false,			
			success:function(response){
console.log(response);				
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				  if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/fpg')?>";
				}  
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			}); 
	}
	else{
		alert('Please provide mandatory fields ');
	}
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
		

function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
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
</script>
</body>
</html>