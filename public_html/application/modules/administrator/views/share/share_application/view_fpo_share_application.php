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
                        <h1>View Share Application (FPO)</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('administrator/share');?>">Share Management</a></li>
                            <li class="active">View Share Application (FPO)</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content mt-3">
            <div class="animated fadeIn">
                    <form action="<?php echo base_url('administrator/share/updateShareApplicationByFPO/'.$share_application['id'])?>" method="post" id="editshare_application" name="sentMessage" novalidate="novalidate" >
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
								    <div class="container-fluid">
                                                                         
                                        <div class="fpo_to_member_form" id="fpo_to_member_form" style="">
                                            
                                        <div class="row row-space">
								            <div class="form-group col-md-4">
												<label for="inputAddress2">Select Producer Organization <span class="text-danger">*</span></label>
												<select class="form-control" id="fpo_name_all" readonly name="fpo_name_all" data-validation-required-message="Please select any FPO">
													<option value="">Select FPO</option>
                                                    <?php for($i=0; $i<count($fpo_list);$i++) { ?>
                                                    <option value="<?php echo $fpo_list[$i]->id; ?>" <?php if($fpo_list[$i]->id == $share_application['fpo_id']) {?> selected <?php } ?>><?php echo $fpo_list[$i]->producer_organisation_name; ?></option>
                                                    <?php } ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>
											<div class="form-group col-md-4">
                                                <label for="inputAddress2">Applicant Number<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" id="search_fpo" readonly maxlength="10" minlength="10" name="search_fpo" placeholder="Search with Mobile or Aadhaar" data-validation-required-message="Provide the search text or choose the FPO" value="<?php echo $share_application['mobile_number']; ?>">
                                                <div id="fpo_validate" class="help-block with-errors text-danger"></div>
                                            </div> 
                                            <div class="form-group col-md-4">
												<label for="inputAddress2">Applicant Name </label>
												<select class="form-control" id="fpo_name" name="fpo_name" readonly data-validation-required-message="Please select FPO">
													<option value="">Select FPO</option>
                                                    <?php for($i=0; $i<count($fpo_list);$i++) { ?>
                                                    <option value="<?php echo $fpo_list[$i]->id; ?>" <?php if($fpo_list[$i]->id == $share_application['holder_id']) {?> selected <?php } ?>><?php echo $fpo_list[$i]->producer_organisation_name; ?></option>
                                                    <?php } ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>     
                                        </div>  
                                            
                                        <div class="row row-space">								            
											<div class="form-group col-md-4">
												<label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="share_date" name="share_date" disabled value="<?php echo $share_application['apply_date']?>" placeholder="Date" max="2050-12-31" data-validation-required-message="provide the date" value="<?php echo $share_application['apply_date']; ?>" required>
                                                <div class="help-block with-errors text-danger"></div>
											</div>
                                            <div class="form-group col-md-4">
                                                <label class="form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" maxlength="3" disabled name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the shares" value="<?php echo $share_application['no_of_share']; ?>" required>
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
											<div class="form-group col-md-4">
													<label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
													<input type="text" class="form-control numberOnly"  value="<?php echo $share_application['pin_code']?>" readonly onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code" value="">
													<p class="help-block text-danger"></p>
												</div>
                                        </div> 
                                            
										<div class="row row-space">
												
												<div class="form-group col-md-4">
													<label for="inputAddress2">State <span class="text-danger">*</span></label>
													<select class="form-control" id="state" name="state" readonly data-validation-required-message="Please select state">
														 <option  value="<?php echo $share_application['state']?>"><?php echo $share_application['state_name']?></option>
													</select>
													<p class="help-block text-danger"></p>
												</div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputAddress2">District <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="district" name="district" readonly data-validation-required-message="Please select district">
                                                       <option  value="<?php echo $share_application['district']?>"><?php echo $share_application['district_name']?></option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
												<div class="form-group col-md-4">
												<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
												<select class="form-control" id="taluk" readonly name="taluk"  data-validation-required-message="Please select taluk">
												<?php foreach($taluk_info as $taluk){
													if($taluk->taluk_code == $share_application['taluk'])
													   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
													else
													   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
												 }
												 ?></select>
												<p class="help-block text-danger"></p>
											</div>
										 </div>
                                            
										<div class="row row-space">	
													
											<div class="form-group col-md-4">						    
												<label for="inputAddress2">Block <span class="text-danger">*</span></label>
												<select class="form-control" id="area_block" name="area_block"  readonly  data-validation-required-message="Please select block">
													<?php foreach($block_info as $block){
													if($block->block_code == $share_application['block'])
													   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
													else
													   echo "<option value='".$block->block_code."'>".$block->name."</option>";
												 }
												 ?>
												</select>
												<p class="help-block text-danger"></p>
											</div>																			
											<div class="form-group col-md-4">
												<label for="inputAddress2">Gram Panchayat</label>
												<select class="form-control" id="gram_panchayat" name="gram_panchayat"  readonly >
												<?php foreach($panchayat_info as $panchayat){
													if($panchayat->panchayat_code == $share_application['gram_panchayat'])
													   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
													else
													   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
												 }
												 ?>	
												</select>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Village</label>
												<select class="form-control" id="village" name="village" readonly >
												<option value="">Select Village</option>
												<?php foreach($village_info as $village){
													if($village->id == $share_application['village'])
													   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
														else
														   echo "<option value='".$village->id."'>".$village->name."</option>";
													 }
												?>
												</select>
								            </div>											
										</div>
                                            
										<div class="row row-space">
								           
											<div class="form-group col-md-2">
                                                <label for="inputAddress2">Door No</label>
                                                <input type="text" class="form-control" readonly  value="<?php echo $share_application['door_no']?>"  maxlength="10" id="door_no" name="door_no" placeholder="Door No" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputAddress2">Street</label>
                                                <input type="text" class="form-control"  readonly value="<?php echo $share_application['street']?>" maxlength="75" id="street_name" name="street_name" placeholder="Street" >
                                            </div>
											<div class="form-group col-md-4">
                                                <label for="inputAddress2">Contact Person <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="contact_person" readonly  value="<?php echo $share_application['contact_person']?>" name="contact_person" maxlength="25" placeholder="Contact Person" data-validation-required-message="Enter contact number" >
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>
								        </div>
                                            
								        <div class="row row-space mt-3">
                                            <!--<div class="form-group col-md-4">
                                                <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control numberOnly" minlength="10" maxlength="10" readonly  value="<?php echo $share_application['mobile_number']?>" name="mobile_number" pattern="^[6-9]\d{9}$"  id="mobile_number" placeholder="Mobile Number" data-validation-required-message="Enter mobile number" >
                                                <div class="help-block with-errors text-danger"></div>
                                            </div>-->							            
											
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Permanent Account Number (PAN) </label>
												<input type="text" class="form-control text-uppercase" readonly value="<?php echo $share_application['pan_number']?>"  maxlength="10" id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" >
								            </div>                                        
                                        </div>
                                            
                                        </div>

                                        <!-- Button creation for submit -->
										<div class="form-row">
								            <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
											   <button id="edit" class="btn btn-success btn-fs text-center" type="button"> <i class="fa fa-edit"></i> Edit</button>
												<button id="sendMessageButton" value="Update" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
												<!--	<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
												<a href="<?php echo base_url('administrator/share/fpo_shareapplication_list');?>"><button id="ok" href="" class="btn btn-fs btn-outline-dark text-center" type="button"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
												<a href="<?php echo base_url('administrator/share/fpo_shareapplication_list');?>"><button id="cancel" href="" style="display:none" class="btn btn-fs btn-outline-dark text-center" type="button"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</button></a>
								                <!--<button id="sendMessageButton"  class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Save</button>-->
												<!--<a href="<?php echo base_url('administrator/share/fpo_shareapplication_list');?>" class="btn-fs btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	-->
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
$(document).ready(function(){
   // var fpo_id =<?php echo $share_application['fpo_id'];?>;
   // getlocationByFPO(fpo_id);
});
 
 //edit button function
 
 	
$('#edit').click(function(){
  $('#crop_standardForm').toggleClass('view');
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
   


 
$('select[id="fpo_name"]').on('change', function() {
    var fpo_name = $(this).val();
    //getlocationByFPO(fpo_name);
});
$('select[id="fpo_name_all"]').on('change', function() {
    var name_value = $(this).val();
});    

      
    
 function getlocationByFPO(fpo_name) {
    $.ajax({
           url:"<?php echo base_url();?>administrator/share/getLocationByFpo/"+fpo_name,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
			   getPincode( responseArray.location_data[0]['pin_code'] );
               $('#pin_code').val(responseArray.location_data[0]['pin_code']);
               $('#door_no').val(responseArray.location_data[0]['door_no']);
               $('#street_name').val(responseArray.location_data[0]['street']);
               $('#mobile_number').val(responseArray.location_data[0]['mobile']);
               $('#contact_person').val(responseArray.location_data[0]['contact_person']);
               $('#pan_number').val(responseArray.location_data[0]['pan']);
               var panchayat = responseArray.location_data[0]['panchayat'];
               var village = responseArray.location_data[0]['village'];
			   getPanchayatList( panchayat );
			   getVillageList(village);
               setTimeout(function() {
               // $('#gram_panchayat').val(panchayat);
                //   $('#village').val(village); 
               }, 500);
               
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
}    
     
    
 
function getPincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);                
				response=response.trim();
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    //var village = '<option value="">Select Village</option>';
                    //var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                   
    				/* $.each(responseArray.getlocation['villageInfo'],function(key, value){
                        village += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                        gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                    });
 */
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk_id += '<option value='+value.id+'>'+value.name+'</option>'
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
                   // $('#village').html(village);
                  //  $('#gram_panchayat').html(gram_panchayat);
					$('#state').html(state);
					$('#district').html(district);
					$('#area_block').html(block);
					$('#taluk').html(taluk_id);
                } else {
                    alert(responseArray.message);
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
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
$("#search_fpo").focusout(function() {
    var search_fpo_value = $(this).val();
    if(search_fpo_value.length == 10 && (search_fpo_value.charAt(0) == 6 || search_fpo_value.charAt(0) == 7 || search_fpo_value.charAt(0) == 8 || search_fpo_value.charAt(0) == 9)) {
		var search_fpo = {'mobilenumber':search_fpo_value, 'aadhaar_number':""};
        searchFPOWithOption(search_fpo);
    } else if(search_fpo_value.length == 12) {
        var search_fpo = {'aadhaar_number':search_fpo_value, 'mobilenumber':""};
        searchFPOWithOption(search_fpo);    
    }            
});   
    
function searchFPOWithOption(search_fpo) {    
       $.ajax({
			url:"<?php echo base_url();?>administrator/share/searchFPO",
			type:"POST",
			data:search_fpo,
			dataType:"html",
            cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1) {
                    $('#fpo_name').val(responseArray.fpo_data[0]['id']); 
                    getlocationByFPO(responseArray.fpo_data[0]['id']);
                    $("#fpo_validate").html("<div class='alert alert-success'>FPO selected successfully</div>");
				} else {
					$("#search_fpo").val('');
					$("#search_fpo").focus();
                    $("#fpo_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
                } 
            }
         });            
}  

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
      $('#share_date').attr('max', maxDate);
		
});
  
</script>
</body>
</html>