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
                        <h1>Add Bank</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('fpo/masterdata/banklist');?>">Bank</a></li>
                            <li class="active">Add Bank</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form  action="<?php echo base_url('fpo/masterdata/post_bank')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										<div class="row row-space">
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Type <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_type" name="bank_type" required="required"  data-validation-required-message="Please Select bank type .">
													<option value="">Select Bank Type</option>
													<?php for($i=0; $i<count($bank_type);$i++) { ?>										
													 <option value="<?php echo $bank_type[$i]->id; ?>"><?php echo $bank_type[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
											<div class="form-group col-md-6">
													<label for="inputAddress2">Bank Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="bank_name" name="bank_name" required="required"  data-validation-required-message="Please Select bank name .">
													<!--<option value="">Select Bank Name</option>
													<?php for($i=0; $i<count($bank_name);$i++) { ?>										
													 <option value="<?php echo $bank_name[$i]->id; ?>"><?php echo $bank_name[$i]->name; ?></option>
													<?php } ?>-->
													</select> 
													<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
											<div class="form-group col-md-6">
												<label for="inputAddress2">Branch Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  maxlength="45" id="branch_name" name="branch_name" placeholder="Branch Name "  required="required" data-validation-required-message="Please enter branch name .">
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-6">
												<label for="inputAddress2">IFSC Code <span class="text-danger">*</span></label>
												<input type="text" class="form-control text-uppercase"  maxlength="11" id="ifsc_code" name="ifsc_code" placeholder="IFSC Code"  required="required" data-validation-required-message="Please enter ifsc code .">
												<p class="help-block text-danger"></p>
											</div>
										</div>
										<div class="row row-space">
										    <div class="form-group col-md-4">
												<label for="inputAddress2">E-Mail Address </label>
												<input type="email" class="form-control "  maxlength="50" id="email_id" name="email_id" placeholder="E-Mail Address">
											</div>
											<div class="form-group col-md-3">
												<label for="inputAddress2">Contact Number </label>
												<input type="text" class="form-control numberOnly"  pattern="^[6-9]\d{9}$" maxlength="11" id="contact_num" name="contact_num" placeholder="Contact Number">
											</div>
											<div class="form-group col-md-5">
												<label for="inputAddress2">Door No , Street / Building No</label>
												<textarea id="address" maxlength="50" name="bank_street" class="form-control"></textarea>
											</div>
										</div>
										  <div class="row row-space">
										  <div class="form-group col-md-6">
											<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
											<input type="text" onkeyup="getPincode(this.value)" class="form-control numberOnly this_pin_code" id="pincode" pattern="[1-9][0-9]{5}" name="bank_pincode" minlength="6" maxlength="6" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pincode.">						
											 <p class="help-block text-danger" id="pincode_validate"></p>
												<!--<label for="inputAddress2">Address </label>
												<textarea type="text" class="form-control "  maxlength="150" id="address" name="address" placeholder="Address"></textarea>-->
											</div>
											<div class="form-group col-md-6">
											<label for="inputAddress2">State <span class="text-danger">*</span></label>
											<select id="state" name="bank_state" class="form-control sel_state" required="required" data-validation-required-message="Please Select state." readonly>
											 <option value="">Select State </option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">District <span class="text-danger">*</span> </label>
											<select id="district" name="bank_district" class="form-control sel_district" required="required" data-validation-required-message="Please Select district."readonly>
											 <option value="">Select District </option>
											</select> 
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
											<select id="taluk" name="bank_taluk" class="form-control sel_taluk" required="required" data-validation-required-message="Please Select taluk.">
											 <option value="">Select Taluk </option>
											 </select>
											 <p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Block <span class="text-danger">*</span></label>
											<select id="block" name="bank_block" class="form-control sel_block" required="required" data-validation-required-message="Please Select block.">
											 <option value="">Select Block </option>
											</select>
											<p class="help-block text-danger"></p>
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
											<select  name="bank_panchayat" id="gram_panchayat" class="form-control sel_panchayat" required="required" data-validation-required-message="Please Select gram panchayat.">
											<option value="">Select Gram Panchayat </option>
											</select>
											 <p class="help-block text-danger"></p>								
										</div>
										<div class="form-group col-md-6">
											<label for="inputAddress2">Village / City <span class="text-danger">*</span></label>
											<select id="village" name="bank_village" class="form-control sel_village" required="required" data-validation-required-message="Please Select village.">
											 <option value="">Select Village </option>
											</select>
											 <p class="help-block text-danger"></p>
										</div>
										 </div>
										
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('fpo/masterdata/banklist');?>" class="btn btn-outline-dark btn-fs ml-2"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
	  <script>
		$(document).ready(function() {
		
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
					//console.log(value.dosage);
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
	});
	  $('#block').change(function(){
	
	 var block = $("#block").val();
	  //alert(crop_category);
	  getPanchayatList( block );
 }); 
 $('#gram_panchayat').change(function(){
	
	 var panchayat_code = $("#gram_panchayat").val();
	  //alert(crop_category);
	  getVillageList( panchayat_code );
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
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
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