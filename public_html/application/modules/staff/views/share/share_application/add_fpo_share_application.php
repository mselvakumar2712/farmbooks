<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

<?php
	$min_threshold = '';
	$max_threshold = '';
	if($share_setting) {
		$min_threshold = $share_setting->minimum_threshold;
		$max_threshold = $share_setting->maximum_threshold;
	}
	$fpo_mobile = '';
	if($fpo_info) {
		$fpo_mobile = $fpo_info->mobile;
	}
?>

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
                        <h1>Add Share Application (FPO)</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('staff/share');?>">Share Management</a></li>
                            <li class="active">Add Share Application (FPO)</li>
                        </ol>
                    </div>
                </div>
            </div>
         </div>
        
         <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('success');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('danger')){?>
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('danger');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('info')){?>
			<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('info');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('warning')){?>
			<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('warning');?></strong> 
			</div>
			<?php }?>
            <div class="animated fadeIn">
               <form action="<?php echo base_url('staff/share/postShareApplicationByFPO')?>" method="post" id="addshare_application" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
                              <div class="container-fluid">                                                                         
                                 <div class="fpo_to_member_form" id="fpo_to_member_form" style="">                                            
                                    <div class="row row-space">	
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Search FPO with Mobile <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" id="search_fpo" maxlength="10" minlength="10" name="search_fpo" placeholder="Search with Mobile" required data-validation-required-message="Provide the search text or choose the FPO">
                                          <div id="fpo_validate" class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Share Application Date <span class="text-danger">*</span></label>
                                          <input type="date" class="form-control" id="share_date" name="share_date" placeholder="Date" value="<?php echo date("Y-m-d");?>" max="2050-12-31" data-validation-required-message="provide the date" required>
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label class="form-control-label">No. of Shares <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" maxlength="3" name="no_of_share" id="no_of_share" placeholder="No. of Shares" data-validation-required-message="Enter the share's" required="required">
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>                                       
                                    </div>                                            
                                    <div class="row row-space">
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Producer Organization Name </label>
                                          <select class="form-control" id="fpo_name" name="fpo_name" readonly>
                                             <option value="">Select FPO</option>
                                             <?php for($i=0; $i<count($fpo_list);$i++) { ?>
                                             <option value="<?php echo $fpo_list[$i]->id; ?>"><?php echo $fpo_list[$i]->producer_organisation_name; ?></option>
                                             <?php } ?>	
                                          </select>
                                          <p class="help-block text-danger"></p>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Mobile Number <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" minlength="10" readonly maxlength="10" name="mobile_number" pattern="^[6-9]\d{9}$" id="mobile_number" placeholder="Mobile Number" data-validation-required-message="Enter mobile number" >
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">PINCODE <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control numberOnly" readonly onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" title="Enter only 6 digits" id="pin_code" name="pin_code" placeholder="PINCODE" data-validation-required-message="Please enter pin code">
                                          <p class="help-block text-danger"></p>
                                       </div>
                                    </div>                                            
                                    <div class="row row-space">												
                                       <div class="form-group col-md-4">
                                          <label for="state">State <span class="text-danger">*</span></label>
                                          <select class="form-control" id="state" name="state" readonly data-validation-required-message="Please select state">
                                          <option value="">Select State </option>
                                          </select>
                                          <p class="help-block text-danger"></p>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">District <span class="text-danger">*</span></label>
                                          <select class="form-control" id="district" name="district" readonly data-validation-required-message="Please select district">
                                          <option value="">Select District </option>
                                          </select>
                                          <p class="help-block text-danger"></p>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
                                          <select class="form-control" id="taluk" name="taluk" readonly data-validation-required-message="Please select taluk">
                                          <option value="">Select Taluk</option>
                                          </select>
                                          <p class="help-block text-danger"></p>
                                       </div>	                                         	
                                    </div>                                            
                                    <div class="row row-space">		
                                       <div class="form-group col-md-4">						    
                                          <label for="inputAddress2">Block <span class="text-danger">*</span></label>
                                          <select class="form-control" id="area_block" name="area_block" readonly onchange="getPanchayatList(this.value);"  data-validation-required-message="Please select block">
                                             <option value="">Select Block</option>
                                          </select>
                                          <p class="help-block text-danger"></p>
                                       </div>								
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Gram Panchayat</label>
                                          <select class="form-control" id="gram_panchayat" name="gram_panchayat" readonly onchange="getVillageList(this.value);">
                                             <option value="">Select Gram Panchayat</option>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Village</label>
                                          <select class="form-control" id="village" name="village" readonly>
                                             <option value="">Select Village</option>
                                          </select>
                                       </div>
                                    </div>                                            
                                    <div class="row row-space">								            
                                       <div class="form-group col-md-12">
                                          <label for="inputAddress2">Street</label>
                                          <input type="text" class="form-control" maxlength="75" readonly id="street_name" name="street_name" placeholder="Street" value="">
                                       </div>
                                    </div>
                                            
                                    <div class="row row-space mt-3">
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Door No</label>
                                          <input type="text" class="form-control" maxlength="10" readonly id="door_no" name="door_no" placeholder="Door No." value="">
                                       </div>
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Contact Person <span class="text-danger">*</span></label>
                                          <input type="text" class="form-control" id="contact_person" readonly name="contact_person" maxlength="25" placeholder="Contact Person" data-validation-required-message="Enter contact number" value="">
                                          <div class="help-block with-errors text-danger"></div>
                                       </div>                                            
                                       <div class="form-group col-md-4">
                                          <label for="inputAddress2">Permanent Account Number (PAN) </label>
                                          <input type="text" class="form-control text-uppercase" readonly maxlength="10" id="pan_number" name="pan_number" placeholder="Ex:AAAAA0000A" data-validation-required-message="Enter the PAN Number" value="">
                                       </div>                                        
                                    </div>                                            
                                 </div>
                                 <!-- Button creation for submit -->
                                 <div class="form-row">
								            <div class="form-group col-md-12 text-center">
                                       <div id="success"></div>
                                       <button id="sendMessageButton" value="Save" class="btn-fs btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                       <a href="<?php echo base_url('staff/share/fpo_shareapplication_list');?>" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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

	var min_threshold = '<?php echo $min_threshold; ?>';
	var max_threshold = '<?php echo $max_threshold; ?>';
	var fpo_mobile = '<?php echo $fpo_mobile; ?>';
   
    $(function() {
	   $('#no_of_share').bind('change', function() {
		    var shares = parseInt(this.value || 0);
			if(shares == 0) {
				var str = 'Number of shares should be greater than zero';
				swal('', str);
				$(this).val(''); 
				return;
			}
			if(min_threshold >0 && max_threshold >0) {
			   if(shares >= min_threshold && shares <= max_threshold) {
			   }
			   else {
				   var str = 'Minimum allowed number of shares: '+min_threshold;
				   str += '<br/ >Maximum allowed number of shares: '+max_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
		   else if(min_threshold >0) {
			   if(shares >= min_threshold) {
			   }
			   else {
				   var str = 'Minimum allowed number of shares: '+min_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
		   else if(max_threshold >0) {
			   if(shares <= max_threshold) {
			   }
			   else {
				   var str = 'Maximum allowed number of shares: '+max_threshold;
				   swal('', str);
				   $(this).val(''); 
			   }
		   }
	   });
	   
   });

$('#pan_number').change(function (event) { 		
    var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
    var txtpan = $(this).val(); 
    if (txtpan.length == 10 ) { 
        if( txtpan.match(regExp) ){ 
            // alert('PAN match found');
        } else {
            $("#pan_number").val('');
            //alert('Not a valid PAN number');
            swal("Sorry!", "Not a valid PAN number");
            $("#pan_number").focus();
            event.preventDefault();
        } 
    } else { 
        $("#pan_number").val('');
        //alert('Please enter 10 digits for a valid PAN number');
        swal("Sorry!", "Please enter 10 digits for a valid PAN number");
        $("#pan_number").focus();
        event.preventDefault();      
    }  
}); 
function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>staff/share/getLocationByFpo/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               //console.log(response);
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
               $('#street_name').val(responseArray.location_data[0]['street']);
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
   
function getPincode( pin_code,block_id,taluk_id,panchayat_id,village_id ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            //console.log(response);
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
            $('#area_block').html(block);
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
$("#search_fpo").change(function() {
   var search_fpo_value = $(this).val();
   var fpo_value = $("#fpo_name_all").val();
   if(search_fpo_value == fpo_mobile) {
	   var str = 'Logged in FPO mobile number not allowed';
	   swal('', str);
	   $(this).val(''); 
   }
   else {
	   if(search_fpo_value.length == 10 && (search_fpo_value.charAt(0) == 6 || search_fpo_value.charAt(0) == 7 || search_fpo_value.charAt(0) == 8 || search_fpo_value.charAt(0) == 9)) {
		  var search_fpo = {'mobilenumber':search_fpo_value, 'aadhaar_number':"", 'fpo_id':fpo_value};
		  searchFPOWithOption(search_fpo); 
	   }else{      
		  $("#search_fpo").val('');
		  $("#search_fpo").focus();
		  //$("#fpo_validate").html("<div class='alert alert-danger'>Invalid Mobile No. Selection!!!</div>");
		  //$("#fpo_validate").css("display", "block");
	   }
   }   
});   
    
    
function searchFPOWithOption(search_fpo) {    
       $.ajax({
			url:"<?php echo base_url();?>staff/share/searchFPO",
			type:"POST",
			data:search_fpo,
			dataType:"html",
         cache:false,			
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
            //console.log(responseArray);
            if(responseArray.status == 1) {
               $('#fpo_name').val(responseArray.fpo_data[0]['id']); 
               getFPODetails(responseArray.fpo_data[0]['id']);
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