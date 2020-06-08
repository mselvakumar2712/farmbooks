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
                            <li><a href="<?php echo base_url('fpo/fig');?>">FIG</a></li>
                            <li class="active">View FIG </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('fpo/fig/updatefig/'.$fig_info['id'])?>" method="post" name="sentMessage" id="editfigform" novalidate="novalidate" >
					<input type="hidden" name="fig_id" value="<?php echo $fig_info['id']?>" id="fig_id">
					<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly this_pin_code" readonly value="<?php echo $fig_info['PIN_Code']?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="please enter only 6 numbers" id="pin_code" name="pin_code" disabled placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code.">
													<p class="help-block text-danger" id="pincode_validate"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select  class="form-control sel_state" id="state" name="state" readonly placeholder="State" required>
													  <option  value="<?php echo $fig_info['state']?>"><?php echo $fig_info['state_name']?></option>
												   </select>
													<!--<input class="form-control" id="state" name="state" readonly  placeholder="State" required="required" data-validation-required-message="Please enter state.">-->				
													<p class="help-block text-danger"></p>
												</div>		
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">District <span class="text-danger">*</span></label>
												<select  class="form-control sel_district" id="district" name="district" readonly placeholder="District" required>
													<option  value="<?php echo $fig_info['district']?>"><?php echo $fig_info['district_name']?></option>
												</select>
												<!--<input type="text" class="form-control numberOnly"  id="district" readonly name="district" placeholder="District" required="required" data-validation-required-message="Please enter district.">-->
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select  class="form-control sel_taluk" id="taluk" name="taluk" disabled required="required" data-validation-required-message="Please select taluk.">
												<option value="">Select Taluk </option>	
												<?php foreach($taluk_info as $taluk){
												   if($taluk->taluk_code == $fig_info['taluk'])
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
												   if($block->block_code == $fig_info['block'])
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
												<select  class="form-control sel_panchayat" id="gram_panchayat" disabled name="gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat.">
												<option value="">Select Gram Panchayat </option>
												<?php foreach($panchayat_info as $panchayat){
												   if($panchayat->panchayat_code == $fig_info['Gram_PanchayatID'])
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
													   if($village->id == $fig_info['VillageID'])
														  echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
													   else
														  echo "<option value='".$village->id."'>".$village->name."</option>";
													}
													?>
												</select>
												</select>
												<p class="help-block text-danger"></p>
											</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">Name of the Farmer Interest Group <span class="text-danger">*</span> </label>
													<input type="text" class="form-control" value="<?php echo $fig_info['FIG_Name']?>" id="interest_group" name="interest_group" disabled placeholder="Name of the Farmer Interest Group" required="required" data-validation-required-message="Please enter name of the farmer interest group.">
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
														  <input type="radio" id="inline-radio1" name="status" value="1" <?php echo $fig_info['status'] == 1?" checked='checked'":''?> class="form-check-input"  readonly required="required" data-validation-required-message="Please select."><span class="ml-1">Active</span>
														</label>
													  </div> 
													</div>
													<div class="col-md-6">
													  <div class="form-check-inline form-check">
														<label for="inline-radio2" class="form-check-label">
														  <input type="radio" id="inline-radio2" name="status" value="2" <?php echo $fig_info['status'] != 1?" checked='checked'":''?> class="form-check-input" readonly required="required" data-validation-required-message="Please select."><span class="ml-1">Inactive</span>
														
														</label>
														</div>
													</div>
													<p class="help-block text-danger"></p>
												  </div>
											  </div>
										 </div>
										 <div class="col-md-12 text-center">
											  
											  
											  <div id="success"></div>
												<button id="edit" value="Edit" class="btn-fs btn btn-success text-center" type="button"><i class="fa fa-edit"></i>  Edit</button>
												<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit" style="display:none;"> <i class="fa fa-check-circle"></i> Update</button>
												<!--<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
												<a href="<?php echo base_url('fpo/fig');?>" id="ok"  class="btn-fs btn btn-outline-dark text-center"><i class="fa fa-arrow-circle-left"></i>  Back</a>
												<a href="<?php echo base_url('fpo/fig');?>" id="cancel" value="Cancel" style="display:none" class="btn-fs btn btn-outline-dark text-center"><i class="fa fa-close" aria-hidden="true"></i>  Cancel</a>
												
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
	 
   </body>
</html>
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
	$('a.del').click(function() {
		var fig_id = '<?php echo $fig_info['id']?>';
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
              url: "<?php echo base_url();?>fpo/fig/deletefig/"+fig_id,
              type: "POST",
              data: {
                 this_delete: fig_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('fpo/fig')?>");
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
            swal("Cancelled", "You have cancelled the fig information delete action", "info");
            return false;
         }
      });
	});




			
/* $('form').submit(function(e){
	e.preventDefault();
	var fig_id =<?php echo $_REQUEST['id']?>;
	const figdata = $('#editfigform').serializeObject();
	if(figdata != '')
	{
	//var popi_id =<?php echo $_REQUEST['id']?>;
	var url="<?php echo base_url();?>administrator/fig/updatefig/"+fig_id;
	console.log(figdata);
		 $.ajax({
			url:url,
			type:"POST",
			data:figdata,
			dataType:"html",
         cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/fig')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
			
			}); 
	}
	else
	{
		alert('Please provide mandatory fields ');
	}
		});
	 */
	
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
                //console.log(response);
			   response=response.trim();
			   responseArray=$.parseJSON(response);
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