<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($bank_info['state_id']);
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
                        <h1>View Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('fpo/masterdata/banklist');?>">Bank</a></li>
                            <li class="active">View Bank</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
				  <form  action="<?php echo base_url('fpo/masterdata/updatebank/'.$bank_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <input type="hidden" name="bank_id" value="<?php echo $bank_info['id']?>" id="bank_id">
				  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type<span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type ."disabled>
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) {
														if($bank_info['type_id']==$bank_type[$i]->id){	
														echo '<option value="'.$bank_type[$i]->id.'" selected="selected">'.$bank_type[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$bank_type[$i]->id.'">'.$bank_type[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name<span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_name" name="bank_name" required="required"  data-validation-required-message="Please Select bank name ."disabled>
													<option value="">Select Bank Name</option>
													<?php for($i=0; $i<count($bank_name);$i++) {
														if($bank_info['bank_name_id']==$bank_name[$i]->id){	
														echo '<option value="'.$bank_name[$i]->id.'" selected="selected">'.$bank_name[$i]->name.'</option>';
														}else{
													   echo '<option value="'.$bank_name[$i]->id.'">'.$bank_name[$i]->name.'</option>';
														}?>										
													<?php }?>
													</select> 
													<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Branch Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  value="<?php echo $bank_info['branch_name']?>"  maxlength="45" id="branch_name" name="branch_name" placeholder="Branch Name "  required="required" data-validation-required-message="Please enter branch name ."disabled>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">IFSC Code<span class="text-danger">*</span></label>
												<input type="text" class="form-control text-uppercase"  maxlength="11" value="<?php echo $bank_info['ifsc_code']?>" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code"  required="required" data-validation-required-message="Please enter ifsc code ."disabled>
												<p class="help-block text-danger"></p>
											</div>
										</div>
										
										
										<div class="row row-space">
										
										<div class="form-group col-md-4">
												<label for="inputAddress2">E-Mail Address </label>
												<input type="email" class="form-control " value="<?php echo $bank_info['email_id']?>"  maxlength="50" id="email_id" name="email_id" placeholder="Email Id"disabled>
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Contact Number </label>
												<input type="text" class="form-control numberOnly" value="<?php echo $bank_info['contact_no']?>"   maxlength="11" id="contact_num" name="contact_num" placeholder="Contact Number"disabled>
											</div>
											<div class="form-group col-md-5">
												<label for="inputAddress2">Door No , Street / Building No </label>
												<textarea id="address" maxlength="50" name="bank_street" class="form-control" disabled><?php echo $bank_info['address_local']?></textarea>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
											<input type="text" disabled readonly value="<?php echo $bank_info['pincode']?>" onkeyup="getPincode(this.value)"  class="form-control numberOnly this_pin_code" id="pincode" pattern="[1-9][0-9]{5}" name="bank_pincode" minlength="6" maxlength="6" placeholder="PIN Code" required="required" data-validation-required-message="Please enter pincode."disabled>						
											 <p class="help-block text-danger" id="pincode_validate"></p>
										</div>	
										<div class="form-group col-md-6">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select   id="state" name="bank_state" disabled  readonly class="form-control sel_state" required="required" data-validation-required-message="Please Select state.">
												<option  value="<?php echo $bank_info['bank_state']?>"><?php echo $bank_info['state_name']?></option>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">District <span class="text-danger">*</span></label>
											<select   id="state" name="bank_district" disabled  readonly class="form-control sel_state" required="required" data-validation-required-message="Please Select state.">
												<option  value="<?php echo $bank_info['bank_district']?>"><?php echo $bank_info['district_name']?></option>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>	
											<select   id="taluk" name="bank_taluk" class="form-control sel_taluk" required="required" data-validation-required-message="Please Select taluk." disabled>
											<option value="">Select Taluk </option>
											<?php foreach($taluk_info as $taluk){
                                                if($taluk->taluk_code == $bank_info['bank_taluk_id'])
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?>
											</select>
											<p class="help-block text-danger"></p>	
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Block <span class="text-danger">*</span></label>											
											<select  id="block" name="bank_block" class="form-control sel_block" required="required" data-validation-required-message="Please Select block." disabled>
											<option value="">Select Block </option>
											<?php foreach($block_info as $block){
                                                if($block->block_code == $bank_info['bank_block'])
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
											<select  name="bank_panchayat" id="gram_panchayat" class="form-control sel_panchayat"  required="required" data-validation-required-message="Please Select gram panchayat." disabled>
											<option value="">Select Gram Panchayat </option>
											<?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $bank_info['bank_panchayat'])
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>
											</select>
											 <p class="help-block text-danger"></p>								
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Village / City<span class="text-danger">*</span></label>
											<select id="village" name="bank_village" class="form-control sel_village"  required="required" data-validation-required-message="Please Select village."disabled>
											 <option value="">Select Village</option>
											 <?php foreach($village_info as $village){
                                                if($village->id == $bank_info['bank_village'])
                                                   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                                else
                                                   echo "<option value='".$village->id."'>".$village->name."</option>";
                                             }
                                             ?>
											</select>
											 <p class="help-block text-danger"></p>
										</div>
										</div>
									
										
										<div class="col-md-12 text-center">
											<button id="edit" class="btn btn-success text-center btn-fs" type="button"><i class="fa fa-edit"></i> Edit</button>
											<button id="sendMessageButton" class="btn btn-success text-center btn-fs" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
											<!--<a href="#" id="" class="del btn btn-danger btn-fs"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>-->	
											<a href="<?php echo base_url('fpo/masterdata/banklist');?>" id="ok" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-arrow-circle-left"></i> Back</a>
											<a href="<?php echo base_url('fpo/masterdata/banklist');?>" id="cancel" class="btn btn-outline-dark btn-fs ml-2" style="display:none;"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
	  $(document).ready(function() {
		  $('select[name="state"]').on('change', function(e) {
				e.preventDefault();
				var state = $(this).val();
			   $("#district option").remove() ;				
				if(state) { 
					$.ajax({
						url: '<?php echo base_url('fpo/masterdata/getdistrict')?>',
						type: "POST",
						data:{state:state},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
							console.log(value.district_code);						   
								var div_data="<option value="+value.district_code+">"+value.name+"</option>";
							  $(div_data).appendTo('#district');	                            							
							});
						}
					});
				}						
			});
			  });
		  /*   var state='<?php echo $bank_info['state_id']?>';
			
			var district='<?php echo $bank_info['district_id']?>';
			//alert(state + ','+district);
			if(state) { 
					$("#district option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('fpo/masterdata/getdistrict')?>',
						type: "POST",
						data:{state:state},
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
						   $.each(responsearr, function(key, value) {	
									console.log(value.district_code);
								if(district==value.district_code){
								var div_data="<option value="+value.district_code+" selected>"+value.name+"</option>";
							    $(div_data).appendTo('#district');
								}
							});
						}
					});
				} */
					
/* 	  		$('form').submit(function(e){
				e.preventDefault();
				const figdata = $('#figform').serializeObject();
				if(figdata != '')
				{
				console.log(figdata);
					 $.ajax({
						url:"<?php echo base_url();?>administrator/fig/postfig",
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
								window.location = "<?php echo base_url('fpo/fig')?>";
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
			
			 */
			//sweetalert
			/* $('a.del').click(function() {
				var bank_id = <?php echo $bank_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_bank/"+bank_id,
					  type: "POST",
					  data: {
						 this_delete: bank_id,
					  },
					  cache: false,
					  success: function() {        
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('fpo/masterdata/banklist')?>");
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
					swal("Cancelled", "You have cancelled the bank information delete action", "info");
					return false;
				 }
			  }); 
			});
			}); */
			
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
 $('#bank_type').change(function(){
		
		 var type_id = $("#bank_type").val();
		  //alert(crop_category);
		  getbankdetail( type_id );
	 });
	 		
function getbankdetail(type_id) {
     $("#bank_name option").remove() ;
       if( type_id !='')
				{	
				$.ajax({
					url:"<?php echo base_url();?>fpo/masterdata/bankname/"+type_id,
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
					
					if (Object.keys(responseArray).length > 0) {
                $("#bank_name").append($('<option></option>').val(0).html('Select Bank Name'));
             }
				 else {
                    $("#bank_name").append($('<option></option>').val(0).html(''));  
             }
					
					//var nutrient_list = '<option value="">Select Brandname</option>';
					$.each(responseArray.bankname_list,function(key,value){
					//console.log(value.variety_name);
					console.log(value.dosage);
					$("#bank_name").append($('<option></option>').val(value.type_id).html(value.name));
					//nutrient_list += '<option value='+value.product+'>'+value.name+'</option>';
					});
					//$('#nutrient_brand_name').html(nutrient_list);
					//$('#fertilizer_variety').html(variety_list);
					//$('#pesticide_variety').html(variety_list);
					//$('#weeding_variety').html(variety_list);
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

</script>
</body>
</html>