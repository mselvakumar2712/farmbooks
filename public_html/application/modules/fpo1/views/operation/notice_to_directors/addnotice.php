<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($fpo_list);
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
                        <h1>Add Notice to Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/addnotice'); ?>">Add Notice to Directors</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/post_notice'); ?>" method="post" id="noticeform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Notice <span class="text-danger">*</span></label>
															 <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" id="notice_date" name="notice_date" required="required" data-validation-required-message="Please enter notice date.">
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Date of Meetings <span class="text-danger">*</span></label>
														<input type="date" class="form-control" value="<?php echo date("Y-m-d",strtotime("+7 days")); ?>" max="<?php echo date("Y-m-d",strtotime("+7 days")); ?>" id="meeting_date" name="meeting_date" required="required" data-validation-required-message="Please enter date of meeting.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Time <span class="text-danger">*</span></label>
														<input type="time" class="form-control" id="meeting_time" name="meeting_time" required="required" data-validation-required-message="Please enter meeting time.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-3">
														<label for="">Place of Meeting <span class="text-danger">*</span></label>
														<input type="text" maxlength="50" class="form-control" id="meeting_place" placeholder=" Place of Meeting" name="meeting_place" required="required" data-validation-required-message="Please enter meeting place.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
												</div>
												<div class="row row-space mt-4"> 
													<div class="form-group col-md-4">
														<label for="inputAddress2">PINCODE  <span class="text-danger">*</span></label>
														<input type="text" class="form-control numberOnly this_pin_code" readonly pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code." >
														<div class="help-block with-errors text-danger" id="pincode_validate"></div>
													</div>
													<div class="form-group col-md-4">                                    
														<label for="inputAddress2">State <span class="text-danger">*</span></label>
														<select class="form-control sel_state" id="state" name="state" readonly placeholder="State" required>
														</select>
													</div>
													<div class="form-group col-md-4">
														<label for="inputAddress2">District <span class="text-danger">*</span></label>
														<select class="form-control sel_district" id="district" name="district" readonly placeholder="District" required>
														</select>
													</div>
												</div>
												<div class="row row-space mt-4"> 
													<div class="form-group col-md-4">
														<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
														<select class="form-control sel_taluk" id="taluk" name="taluk" readonly placeholder="Taluk" required>
														</select>
													</div>
												<div class="form-group col-md-4">
													<label for="inputAddress2">Block <span class="text-danger">*</span></label>
													<select class="form-control sel_block" id="block" name="block" onchange="getPanchayatList(this.value);" readonly placeholder="Block" required>
													</select>
												</div>
												<div class="form-group col-md-4">						    
													<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
													<select class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat." readonly onchange="getVillageList(this.value);">
													<option value="">Select Gram Panchayat </option>																				
													</select>
												</div>
											</div>
										<div class="row row-space mt-4"> 	
											<div class="form-group col-md-4">						    
												<label for="inputAddress2">Village <span class="text-danger">*</span></label>
												<select class="form-control sel_village" id="village" name="village" required="required" data-validation-required-message="Please select village." readonly> 
													<option value="">Select Village </option>													
												</select>
											</div>	
											<div class="form-group col-md-4">
												<label for="inputAddress2">Street</label>
												<input type="text" class="form-control" value="<?php echo $fpo_list[0]->street; ?>" maxlength="75" id="street" name="street" placeholder="Street" readonly >
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Door No</label>
												<input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->door_no; ?>" id="door_no" name="door_no" placeholder="Door No" readonly>
											</div>
										</div>
										<div class="row row-space mt-4"> 
											<div class="form-group col-md-6">
												<label for="inputAddress2">Agenda <span class="text-danger">*</span></label>
												<textarea class="form-control" maxlength="1000" id="agenda" name="agenda" placeholder="Agenda" required="required" data-validation-required-message="Please select agenda."></textarea>
												<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-6" id="reason1">
												<label for="inputAddress2">Reason for Short Notice <span class="text-danger">*</span></label>
												<textarea class="form-control" maxlength="1000" disabled id="reason_notice" name="reason_notice" placeholder="Reason for Short Notice"></textarea>
												<div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-6" id="reason2">
												<label for="inputAddress2">Reason for Short Notice <span class="text-danger">*</span></label>
												<textarea class="form-control" maxlength="1000" id="reason_notice" name="reason_notice" placeholder="Reason for Short Notice" required="required" data-validation-required-message="Please select reason for short notice."></textarea>
												<div class="help-block with-errors text-danger"></div>
											</div>
										</div>
										</div>										
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
											<a href="<?php echo base_url('fpo/operation/noticelist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
	</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
$(function(){
      var dtToday = new Date();    
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
        month = '0' + month.toString();
      if(day < 10)
        day = '0' + day.toString();
      
      var maxDate = year + '-' + month + '-' + day;
      $('#notice_date').attr('max', maxDate);
	 // $('#meeting_date').attr('max', maxDate);		
}); 

$('#reason2').hide();
$('#meeting_date').on('change', function() {
  var directorseat = this.value;
  $("#reason_notice").prop('disabled',false);
  $('#reason2').show();
  $('#reason1').hide();
});

function getFPODetails(fpo_id) {
    $.ajax({
	   url:"<?php echo base_url();?>fpo/operation/getLocationByFpo/"+fpo_id,
	   type:"GET",
	   data:"",
	   dataType:"html",
	   cache:false,			
	   success:function(response) {
		   response=response.trim();
		   responseArray=$.parseJSON(response);
		   var pincode = responseArray.location_data[0]['pin_code'];
		   var block = responseArray.location_data[0]['block'];
		   var taluk = responseArray.location_data[0]['taluk_id'];
		   var panchayat = responseArray.location_data[0]['panchayat'];
		   var village = responseArray.location_data[0]['village'];
		   getPincode( pincode,block,taluk,panchayat,village);
		   $('#pin_code').val(responseArray.location_data[0]['pin_code']);
		   $('#door_no').val(responseArray.location_data[0]['door_no']);
		   $('#street').val(responseArray.location_data[0]['street']);
		   $('#mobile_number').val(responseArray.location_data[0]['mobile']);
		   $('#contact_person').val(responseArray.location_data[0]['contact_person']);
		   $('#pan_number').val(responseArray.location_data[0]['pan']);
		   
		   getPanchayatList( block,panchayat);
		   getVillageList(panchayat,village);
	   },
	   error:function(response){
		   alert('Error!!! Try again');
	   } 			
   }); 
}
   
function getPincode( pin_code, block_id, taluk_id, panchayat_id, village_id ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
		    response=response.trim();responseArray=$.parseJSON(response);                
            var village = '';
            var state = '';
            var district = '';
            var block ='';
            var taluk ='';
            var village = '';
            var gram_panchayat = '';
            $.each(responseArray.getlocation['talukInfo'],function(key, value){
               if(taluk_id == value.id)
                  taluk = '<option value='+value.id+'>'+value.name+'</option>';
            });

            $.each(responseArray.getlocation['blockInfo'],function(key, value){
               if(block_id == value.id)
                  block = '<option value='+value.id+'>'+value.name+'</option>';
            });

            $.each(responseArray.getlocation['cityInfo'],function(key, value){
              district = '<option value='+value.id+'>'+value.name+'</option>';
            });

            $.each(responseArray.getlocation['stateInfo'],function(key, value){
              state = '<option value='+value.id+'>'+value.name+'</option>';
            });
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
        
function getPanchayatList( block_code, panchayath_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayatByCode/"+block_code+"/"+panchayath_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
            var gram_panchayat = "";
            if(responseArray.status == 1) {
               var value = responseArray.panchayatInfo;
               gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
				} else {
					gram_panchayat += '<option value="">Select Panchayat</option>';
            }
            //console.log(gram_panchayat);                
            $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
function getVillageList( panchayat_code,village ) {
        $.ajax({
            url:"<?php echo base_url();?>administrator/Login/getvillageById/"+panchayat_code+"/"+village,
            type:"GET",
            data:"",
            dataType:"html",
            cache:false,			
            success:function(response) {
               //console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               var village = "";
               if(responseArray.status == 1) {
                  var value = responseArray.villageInfo;
                  village += '<option value='+value.id+'>'+value.name+'</option>';
               }else{
                  village += '<option value="">Select Village</option>';
               }                             
               $('#village').html(village);                
            },
            error:function(response){
               alert('Error!!! Try again');
            } 			
         }); 
}
 $(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";
	getFPODetails( fpo_id );
	
}); 

</script>	 
</body>
</html>