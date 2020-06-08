<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.land_detail_button , .farm_implement_button, .live_stock_button {
    float: left;
    display: none;
    margin: 0px 10px 25px 10px;
}   
</style>
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
                        <h1>Edit Farmer Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('fpo/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">Edit Farmer Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
				            <div class="container">
							<br />                     
                            <?php if($this->session->flashdata('warning')){?>
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong><?php echo $this->session->flashdata('warning');?></strong> 
                            </div>
                            <?php }?>
							<form action="<?php echo base_url('fpo/farmer/updateFarmer/'.$farmer_list[0]->id); ?>" id="farmer_profileForm" name="farmer_profileForm" method="post" enctype="multipart/form-data" >

                    <div> 
						<div class="col-md-12" style="text-align:right;margin-bottom:20px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <div class="land_detail_button" style="">
                                    <a href="<?php echo base_url('fpo/farmer/addland?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Land Detail</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="farm_implement_button" style=";">
                                    <a href="<?php echo base_url('fpo/farmer/add_farmimplement?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Farm Implement</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="live_stock_button" style="">
                                    <a href="<?php echo base_url('fpo/farmer/addlivestock?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Live Stock</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
						
						
                        <div id="step-1">
                            <input type="hidden" name="id" value="<?php echo $farmer_list[0]->id; ?>" id="id">
                                <div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
                                <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-6">
                                        <label for="">Name of the Farmer <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="100" id="farmer_profile_name" name="farmer_profile_name" value="<?php echo $farmer_list[0]->profile_name; ?>" placeholder="Name of The Farmer" readonly>
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Alias Name</label>
                                        <input type="text" class="form-control" maxlength="100" id="farmer_alias_name" name="farmer_alias_name" value="<?php echo $farmer_list[0]->alias_name; ?>" placeholder="Alias Name">
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Father Name/Spouse Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="farmer_father_spouse_name" name="farmer_father_spouse_name" maxlength="100" value="<?php echo $farmer_list[0]->father_spouse_name; ?>" placeholder="Father Name/Spouse Name" readonly>						
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Number of Dependents</label>
                                        <select id="farmer_number_dependents" name="farmer_number_dependents" class="form-control" >
                                        <option value="">Select Number of Dependents</option>
                                        <?php for($i=1;$i<=14;$i++) { ?>
                                            <option value="<?php echo $i; ?>" <?php if($farmer_list[0]->no_of_dependents == $i){ ?>selected<?php } ?> ><?php echo $i; ?></option>
                                        <?php } ?>
                                        </select>							
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control numberOnly" minlength="10" maxlength="10" name="farmer_mobile_num" pattern="^[6-9]\d{9}$" id="farmer_mobile_num" value="<?php echo $farmer_list[0]->mobile; ?>" placeholder="Mobile Number" required data-validation-required-message="Please enter mobile number." readonly>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">AADHAAR Number </label>
                                        <input type="text" class="form-control numberOnly" minlength="12" maxlength="14" name="farmer_aadhaar_num" id="farmer_aadhaar_num" value="<?php echo $farmer_list[0]->aadhar_no; ?>" placeholder="Aadhaar Number">
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control numberOnly" onkeyup="getfarmerPincode(this.value)" minlength="6" maxlength="6"  pattern="[1-9][0-9]{5}" maxlength="6" id="farmer_pin_code" value="<?php echo $farmer_list[0]->pin_code; ?>" name="farmer_pin_code" placeholder="PIN Code" required="required" data-validation-required-message="Please enter pin code.">
                                        <div class="help-block with-errors text-danger"></div>								
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">State <span class="text-danger">*</span></label>
                                        <select  class="form-control" id="farmer_state" name="farmer_state" readonly placeholder="State" required>
                                            <option value="<?php echo $farmer_list[0]->state; ?>"><?php echo $farmer_list[0]->state_name; ?></option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">District <span class="text-danger">*</span></label>
                                        <select class="form-control" id="farmer_district" name="farmer_district" readonly placeholder="District" required>
                                            <option value="<?php echo $farmer_list[0]->district; ?>"><?php echo $farmer_list[0]->district_name; ?></option>
                                        </select>
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
                                        <select class="form-control" id="farmer_taluk" name="farmer_taluk" placeholder="Taluk" required data-validation-required-message="Select any taluk">
											<?php for($i=0; $i<count($talukInfo);$i++) { ?>
                                            <option value="<?php echo $talukInfo[$i]->taluk_code; ?>" <?php if($talukInfo[$i]->taluk_code == $farmer_list[0]->taluk){ ?>selected<?php } ?> ><?php echo $talukInfo[$i]->name; ?></option>
                                            <?php } ?>	
                                        </select>
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Block <span class="text-danger">*</span></label>
                                        <select class="form-control" id="farmer_block" name="farmer_block" placeholder="Block" required data-validation-required-message="Select any block">
											<?php for($i=0; $i<count($blockInfo);$i++) { ?>
                                            <option value="<?php echo $blockInfo[$i]->block_code; ?>" <?php if($blockInfo[$i]->block_code == $farmer_list[0]->block){ ?>selected<?php } ?> ><?php echo $blockInfo[$i]->name; ?></option>
                                            <?php } ?>	
                                        </select> 
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-4">						    
                                        <label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
                                        <select class="form-control" id="farmer_gram_panchayat" name="farmer_gram_panchayat" required="required" data-validation-required-message="Please select gram panchayat.">
                                            <option value="<?php echo $farmer_list[0]->panchayat; ?>"><?php echo $farmer_list[0]->panchayat_name; ?></option>
                                        </select>
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">								
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Village </label>
                                        <select class="form-control" id="farmer_village" name="farmer_village">
										<?php if($farmer_list[0]->village != null){ ?>
											<option value="<?php echo $farmer_list[0]->village; ?>"><?php echo $farmer_list[0]->village_name; ?></option>
										<?php } else { ?>
											<option value="">Select Village</option>
										<?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputAddress2">Door No </label>
                                        <input type="text" class="form-control" maxlength="10" id="farmer_door_no" name="farmer_door_no" value="<?php echo $farmer_list[0]->door_no; ?>" placeholder="Door No">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Street </label>
                                        <input type="text" class="form-control" maxlength="75" id="farmer_street" name="farmer_street" value="<?php echo $farmer_list[0]->street; ?>" placeholder="Street">
                                    </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">	
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="farmer_dob" name="farmer_dob" value="<?php echo $farmer_list[0]->dob; ?>" placeholder="Date of Birth" required="required" data-validation-required-message="Please enter date of birth." max="3000-12-31" readonly>
                                         <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputAddress2">Age <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control numberOnly" maxlength="3" id="farmer_age" name="farmer_age" value="<?php echo $farmer_list[0]->age; ?>" placeholder="Age" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputAddress2">Income Category </label>
                                        <select id="farmer_income_category" name="farmer_income_category" class="form-control">
                                        <option value="">Select Income Category</option>
                                        <option value="1" <?php if($farmer_list[0]->income_category == 1){ ?>selected<?php } ?>>Above Poverty Line (APL)</option>
									    <option value="2" <?php if($farmer_list[0]->income_category == 2){ ?>selected<?php } ?>>Below Poverty Line (BPL)</option>
                                        </select>							
                                    </div>
                                    </div>                                    
                                    
                                    <div class="form-group col-md-12">
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Land Holdings</label>
                                              <select class="form-control" id="farmer_land_holdings" name="farmer_land_holdings">
                                                <option value="">Select Land Holdings</option>
                                                <option value="1" <?php if($farmer_list[0]->land_holdings == 1){ ?>selected<?php } ?>>Yes</option>
                                                <option value="2" <?php if($farmer_list[0]->land_holdings == 2){ ?>selected<?php } ?>>No</option>
                                              </select>								  
                                        </div>
                                        <div class="col-md-4">
                                            <label class="text-center">Farm Implements</label>		
                                            <select id="farm_implements" name="farm_implements" class="form-control">
                                                <option value="">Select Farm Implements</option>
                                                <option value="1" <?php if($farmer_list[0]->farm_implements == 1){ ?>selected<?php } ?>>Yes</option>
                                                <option value="2" <?php if($farmer_list[0]->farm_implements == 2){ ?>selected<?php } ?>>No</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class=" form-control-label">Live Stocks</label>
                                            <select id="live_stocks" name="live_stocks" class="form-control">
                                                <option value="">Select Live Stocks</option>
                                                <option value="1" <?php if($farmer_list[0]->live_stocks == 1){ ?>selected<?php } ?>>Yes</option>
                                                <option value="2" <?php if($farmer_list[0]->live_stocks == 2){ ?>selected<?php } ?>>No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-3 mt-5">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="farmer_ispromotor" value="1" name="farmer_ispromotor" <?php if($farmer_list[0]->is_promotor == 1){ ?>checked<?php } ?> >
                                          <label class="form-check-label" for="farmer_ispromotor">Is Promoter</label>
                                          <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>	
                                    <div class="form-group col-md-3 mt-5">
                                        <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="farmer_istrader" value="1" name="farmer_istrader" <?php if($farmer_list[0]->is_trader == 1){ ?>checked<?php } ?>>
                                          <label class="form-check-label" for="farmer_istrader">Willing to be a trader?</label>
                                          <div class="help-block with-errors text-danger"></div>
                                        </div>
                                    </div>		
                                    <div class="form-group col-md-6" id="filediv">
                                        <label for="inputAddress2">Photo <span class="text-danger">(Max upload file size is 100KB)</span></label>
                                        <input class="form-control" type="file" id="farmer_photo" name="farmer_photo" accept="image/jpeg,image/png,image/jpg" placeholder="Photo *">
										<?php if($farmer_list[0]->photo != null){ ?>
										<div>
                                            <img id="farmer_photo" src="<?php echo base_url('assets/uploads/farmer/'.$farmer_list[0]->photo); ?>" class="img-responsive" alt="farmer_photo"/>
                                        </div>
										<?php } ?>
                                    </div>
                                    </div>
                                    
                                </div>
                        </div>


                    </div>
                                     
                                     
								<div class="form-group text-center col-md-12  mt-4 ">
								<div id="success"></div>
                                    <button class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-check-circle"></i> Update</button>
									<!--<a href="#" id="" class="del btn btn-danger">Delete</a>-->
									<a href="<?php echo base_url('fpo/farmer/profilelist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>	
								</div>
						       </form>
						     </div>
					      </div>
                       </div>
                     </div>
                  </div>
               </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
</body>
</html>
<script type="text/javascript">    
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
        $('#farmer_dob').attr('max', maxDate);
});

$(document).ready(function(){
			   $('input[name="profilesubmit"]').on('click', function(){
					if( !$(this).hasClass('disabled')){
						var elmForm = $("#farmer_profileForm");
						if(elmForm){
							elmForm.validator('validate');
							var elmErr = elmForm.find('.has-error');
							if(elmErr && elmErr.length > 0){
								//alert('Oops we still have error in the form');
								return true;
							}else{
								//alert('Great! we are ready to submit form');
								elmForm.submit();
								return false;
							}
						}
					}
				});				
});				
   
$('input[name="farmer_dob"]').on('change', function() {
      var dob =  $(this).val();
      var today = new Date(), 
      dob = new Date(dob), 
      age = new Date(today - dob).getFullYear() - 1970;
      document.getElementById("farmer_age").value=age;
});
    
	if('<?php echo $farmer_list[0]->land_holdings; ?>' == 1) {
		$('.land_detail_button').show();
	}

	if('<?php echo $farmer_list[0]->farm_implements; ?>' == 1) {
		$('.farm_implement_button').show();
	}  
		
	if('<?php echo $farmer_list[0]->live_stocks; ?>' == 1) {
		$('.live_stock_button').show();    
	}
	
	/* getfarmerPincode("<?php echo $farmer_list[0]->pin_code; ?>");
	getFarmerPanchayatByBlock("<?php echo $farmer_list[0]->block; ?>");
	getFarmerVillageByPanchayat("<?php echo $farmer_list[0]->panchayat; ?>");         
	alignAadhaar("<?php echo $farmer_list[0]->aadhar_no; ?>");
	setTimeout(function() {
		document.getElementById("farmer_taluk").value="<?php echo $farmer_list[0]->taluk; ?>";
		document.getElementById("farmer_block").value="<?php echo $farmer_list[0]->block; ?>";
		document.getElementById("farmer_gram_panchayat").value="<?php echo $farmer_list[0]->panchayat; ?>";
		if("<?php echo $farmer_list[0]->village; ?>" != null){
			document.getElementById("farmer_village").value="<?php echo $farmer_list[0]->village; ?>";
		}
    }, 500); */
				
            
			//delete function
			$('a.del').click(function(){
                var farmer_id = '<?php echo $farmer_list[0]->id; ?>';
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
                      url: "<?php echo base_url();?>fpo/farmer/deleteFarmer/"+farmer_id,
                      type: "POST",
                      data: {
                         this_delete: farmer_id,
                      },
                      cache: false,
                      success: function() {        
                         setTimeout(function() {
                          window.location.replace("<?php echo base_url('fpo/farmer/profilelist')?>");
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
                    swal("Cancelled", "You have cancelled the farmer profile information delete action", "info");
                    return false;
                 }
              });
            });
	
   
$("#farmer_pin_code").focusout(function() {
    var farmer_pin_code = $(this).val();
    if(farmer_pin_code.length < 6) {
        $("#farmer_pin_code").val('');$("#farmer_pin_code").focus();
    }    
});  
  
function getfarmerPincode( pin_code ) {
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
                if(responseArray.status == 1) {                                   
                    var state = '';var district = '';
                    var block ='<option value="">Select Block</option>';
                    var taluk ='<option value="">Select Taluk</option>';   
					var gram_panchayat = '<option value="">Select Panchayat</option>';
					var village = '<option value="">Select Village</option>';					
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
                       block += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['cityInfo'],function(key, value){
                        district += '<option value='+value.id+'>'+value.name+'</option>';
                    });

                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
                        state += '<option value='+value.id+'>'+value.name+'</option>';
                    });
                    $('#farmer_state').html(state);
                    $('#farmer_district').html(district);
                    $('#farmer_block').html(block);
                    $('#farmer_taluk').html(taluk);
					$('#farmer_gram_panchayat').html(gram_panchayat);
					$('#farmer_village').html(village);
                } else {
                    $("#farmer_pin_code").val('');$("#farmer_pin_code").focus();
                    $('#farmer_state').html('<option value="">Select State</option>');
                    $('#farmer_district').html('<option value="">Select District</option>');
                    $('#farmer_block').html('<option value="">Select Block</option>');
                    $('#farmer_taluk').html('<option value="">Select Taluk</option>');
                    $('#farmer_gram_panchayat').html('<option value="">Select Panchayat</option>');
                    $('#farmer_village').html('<option value="">Select Village</option>');
                    swal("Sorry", responseArray.message);
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}                 
$('select[name="farmer_block"]').on('change', function() {
    var farmer_block = $(this).val();
    getFarmerPanchayatByBlock(farmer_block);
});
function getFarmerPanchayatByBlock(farmer_block) {
    $.ajax({
        url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+farmer_block,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
            var gram_panchayat = "";
			gram_panchayat += '<option value="">Select Panchayat</option>';
            $.each(responseArray.panchayatInfo, function(key, value){
                gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
            });                                
            $('#farmer_gram_panchayat').html(gram_panchayat);   
			$('#farmer_village').html('<option value="">Select Village</option>');
        },error:function(response){
		  alert('Error!!! Try again');
		} 			
    });     
}        
$('select[name="farmer_gram_panchayat"]').on('change', function() {
    var farmer_gram_panchayat = $(this).val();
    getFarmerVillageByPanchayat(farmer_gram_panchayat);
}); 
function getFarmerVillageByPanchayat(farmer_gram_panchayat) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+farmer_gram_panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				village += '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#farmer_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 	
}    
        
    

    
document.getElementById('farmer_aadhaar_num').oninput = function () {
    var foo = this.value.split(" ").join("");
    alignAadhaar(foo);
};
function alignAadhaar(aadhaar_value){
    if (aadhaar_value.length > 0 && aadhaar_value.length == 12) {
        aadhaar_value = aadhaar_value.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    document.getElementById('farmer_aadhaar_num').value = aadhaar_value;
}    
</script>