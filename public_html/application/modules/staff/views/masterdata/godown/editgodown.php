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
                        <h1>Add Godown</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('staff/masterdata/godownlist');?>">Godown</a></li>
                            <li class="active">Add Godown</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('staff/masterdata/updategodown/'.$godown_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                   <input type="hidden" name="pesticide_id" value="<?php echo $godown_info['id']?>" id="pesticide_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
											<div class="row row-space">
												<div class="form-group col-md-4">
													<label for="inputAddress2">Name<span class="text-danger">*</span></label>
													<input type="text" class="form-control"  value="<?php echo $godown_info['name']?>"  maxlength="50" id="name" name="name" placeholder="Name"  required="required" data-validation-required-message="Please enter name ."disabled>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Alias</label>
													<input type="text" class="form-control"  maxlength="50" value="<?php echo $godown_info['alias-name']?>" id="alias" name="alias" placeholder="Alias"disabled>
												</div>
												<div class="form-group col-md-4">
												  <label class=" form-control-label">Ownership <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="ownership1" class="form-check-label">
														  <input type="radio" id="ownership1" name="ownership" value="1" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."disabled><span class="ml-1">Owned</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="ownership2" class="form-check-label">
														  <input type="radio" id="ownership2" name="ownership" value="2" class="form-check-input" required="required" data-validation-required-message="Please Check ownership."disabled><span class="ml-1">Hired</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											    </div>
											</div>
											<div class="row row-space">												
												<div class="form-group col-md-4">
													<label for="inputAddress2">Type<span class="text-danger">*</span></label>
													<select  class="form-control" id="type" name="type"disabled>
													<option value="">Select Type </option>
													<option <?php if($godown_info['godown_type']==1){echo "selected";} ?> value="1">Cold Storage</option>
													<option <?php if($godown_info['godown_type']==2){echo "selected";}?> value="2">Normal Godown</option>
													<option <?php if($godown_info['godown_type']==3){echo "selected";} ?> value="3">Others</option>
													</select>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Capacity</label>
													<input type="text" class="form-control numberOnly"  value="<?php echo $godown_info['capacity']?>"  maxlength="10" id="capacity" name="capacity" placeholder="Capacity" disabled>
												</div>
												<div class="form-group col-md-4" id="capacity_uom" style="display:none">
													<label for="inputAddress2">UOM<span class="text-danger">*</span></label>
													<select  class="form-control" id="uom" name="uom" required="required" data-validation-required-message="Please Select uom."disabled>
													<option value="">Select UOM </option>
													<?php for($i=0; $i<count($uom);$i++) {
														if($godown_info['uom_id']==$uom[$i]->id){	
														echo '<option value="'.$uom[$i]->id.'" selected="selected">'.$uom[$i]->short_name.'</option>';
														}else{
													   echo '<option value="'.$uom[$i]->id.'">'.$uom[$i]->short_name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Number of Compartments </label>
													<input type="text" class="form-control numberOnly" value="<?php echo $godown_info['no_of_compartments']?>" maxlength="3" id="compartments_no" name="compartments_no" placeholder="Number of Compartments "  required="required"disabled>
												</div>
												<div class="form-group col-md-5">
												  <label class=" form-control-label">Location <span class="text-danger">*</span></label>
												  <div class="row">
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="location1" class="form-check-label">
														  <input type="radio" id="location1" name="location" value="1" class="form-check-input" required data-validation-required-message="Please Check location."disabled><span class="ml-1">Inside Premises</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="location2" class="form-check-label">
														  <input type="radio" id="location2" name="location" value="2" class="form-check-input" required data-validation-required-message="Please Check location."disabled><span class="ml-1">Outside Premises</span>
														
														</label>
													   </div>
													</div>			
												  </div>
													 <p class="help-block text-danger"></p>
											  </div>
											</div>
											<div class="row row-space">
											<div class="col-md-12">
											<h4 class="text-center text-success">Address</h4>
											</div>
											</div>																   
										<div class="row row-space mt-2">
										<div class="form-group col-md-4">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
											<input type="text" disabled readonly value="<?php echo $godown_info['pincode']?>" onkeyup="getPincode(this.value)"  class="form-control numberOnly this_pin_code" id="pincode" pattern="[1-9][0-9]{5}" name="pincode" minlength="6" maxlength="6" placeholder="PIN Code" required="required" data-validation-required-message="Please enter pincode."disabled>						
											 <p class="help-block text-danger" id="pincode_validate"></p>
										</div>	
										<div class="form-group col-md-4">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select   id="state" name="state" disabled  readonly class="form-control sel_state" required="required" data-validation-required-message="Please Select state.">
												<option  value="<?php echo $godown_info['state_id']?>"><?php echo $godown_info['state_name']?></option>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">District <span class="text-danger">*</span> </label>
											<select   id="district" disabled  readonly  name="district" class="form-control sel_district" required="required" data-validation-required-message="Please Select district.">
											<option  value="<?php echo $godown_info['district_id']?>"><?php echo $godown_info['district_name']?></option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										</div>
										 <div class="row row-space">											
										<div class="form-group col-md-4">
											<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>	
											<select   id="taluk" name="taluk" class="form-control sel_taluk" required="required" data-validation-required-message="Please Select taluk." disabled>
											<option value="">Select Taluk </option>
											<?php foreach($taluk_info as $taluk){
                                                if($taluk->taluk_code == $godown_info['taluk_id'])
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
											</select>
											<p class="help-block text-danger"></p>	
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Block <span class="text-danger">*</span></label>											
											<select  id="block" name="block" class="form-control sel_block" required="required" data-validation-required-message="Please Select block." disabled>
											<option value="">Select Block </option>
											<?php foreach($block_info as $block){
                                                if($block->block_code == $godown_info['block_id'])
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
											</select>
											<p class="help-block text-danger"></p>	
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
											<select  name="gram_panchayat" id="gram_panchayat" class="form-control sel_panchayat"  required="required" data-validation-required-message="Please Select gram panchayat." disabled>
											<option value="">Select Gram Panchayat </option>
											<?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $godown_info['panchayat_id'])
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
										<div class="form-group col-md-4">
											<label for="inputAddress2">Village <span class="text-danger">*</span></label>
											<select id="village" name="village" class="form-control sel_village"  required="required" data-validation-required-message="Please Select village."disabled>
											 <option value="">Select Village</option>
											 <?php foreach($village_info as $village){
                                                if($village->id == $godown_info['village_id'])
                                                   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                                else
                                                   echo "<option value='".$village->id."'>".$village->name."</option>";
                                             }
                                             ?>
											</select>
											 <p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Door No / Street </label>
											<textarea id="address" maxlength="50" name="address" class="form-control" disabled><?php echo $godown_info['street']?></textarea>
											<!--/* <input type="text" id="street" name="street" value="<?php echo $godown_info['street']?>" maxlength="75" class="form-control" maxlength="75" id="street" placeholder="Street"disabled>	
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Door No </label>
											<input type="text" class="form-control" name="door_no" value="<?php echo $godown_info['door_no']?>" maxlength="10" id="door_no" placeholder="Door No"disabled> */-->
										</div>
										</div>
										<div class="col-md-12 text-center">
											<button id="edit" class="btn-fs btn btn-success text-center" type="button">  <i class="fa fa-edit"></i>Edit </button>
											<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
											<!--<a href="#" id="" class="del btn btn-danger btn-fs"><i class="fa fa-trash"></i> Delete</a>-->	
											<a href="<?php echo base_url('staff/masterdata/godownlist');?>" id="ok" class="btn-fs btn btn-outline-dark ml-2"><i class="fa fa-arrow-circle-left"></i> Back</a>
											<a href="<?php echo base_url('staff/masterdata/godownlist');?>" id="cancel" class="btn-fs btn btn-outline-dark ml-2" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
		  $('textarea').each(function(){
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
		});
	   /*  function getCapacity(capacity) {
				if(capacity.length > 0) {
				$('#capacity_uom').show();
			}else{
				$('#capacity_uom').hide();
			}
		} */

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
	  $(document).ready(function() {
	
			var $radios = $('input:radio[name=ownership]');
			var ownership='<?php echo $godown_info['ownership']?>';
			if(ownership == 1){
				 if($radios.is(':checked') === false) {
						$radios.filter('[value=1]').prop('checked', true);              
				}
			}else{
				if($radios.is(':checked') === false) {
					$radios.filter('[value=2]').prop('checked', true);
				}
			}
			
			var $locatetype = $('input:radio[name=location]');
			var locate='<?php echo $godown_info['location_type']?>';
			if(locate == 1){
				 if($locatetype.is(':checked') === false) {
						$locatetype.filter('[value=1]').prop('checked', true);              
				}
			}else{
				if($locatetype.is(':checked') === false) {
					$locatetype.filter('[value=2]').prop('checked', true);
				}
			}
						          
    
			$('a.del').click(function() {
				var godown_id = <?php echo $godown_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_godown/"+godown_id,
					  type: "POST",
					  data: {
						 this_delete: godown_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('staff/masterdata/godownlist')?>");
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
					swal("Cancelled", "You have cancelled the godown information delete action", "info");
					return false;
				 }
			  }); 
			});
			});


</script>
</body>
</html>