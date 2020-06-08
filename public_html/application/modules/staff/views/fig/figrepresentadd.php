<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.column {    
    width: 20%;
    padding:5px 30px;    
}
@media(max-width: 768px) {
    .column {
        width: 20%;
	   padding:5px 30px;    
    }
    .mob-10
    {
        margin-top:33px;
    }
}
</style>
   <body>
      <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <!-- Header-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add FIG Representative</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                      <ol class="breadcrumb text-right">
							 <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('staff/fig/figrepresentativelist');?>">FIG Representative</a></li>
                            <li class="active">Add FIG Representative </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    
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
                    
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
						<div class="container-fluid">
                            
						<form action="<?php echo base_url('staff/fig/postfigrepresent')?>" name="sentMessage" method="post" id="figrepresent" novalidate="novalidate" >				
						<div class="row row-space">							 
						 <div class="form-group col-md-6">
							  <label for="">Select FIG <span class="text-danger">*</span></label>
							  <select class="form-control" id="fig_list" name="fig_name" required data-validation-required-message="Select any FIG...">
                                    <option value="">Select FIG</option>
									<?php for($i=0; $i<count($fig);$i++) { ?>										
									 <option value="<?php echo $fig[$i]->id; ?>"><?php echo $fig[$i]->FIG_Name; ?></option>
									<?php } ?>
							  </select>
							 <p class="help-block text-danger"></p>
						 </div>
                            
						    <div class="form-group col-md-6">
								<label for="inputAddress2">Mobile or AADHAAR Number <span class="text-danger">*</span></label>	
								<input type="text" class="form-control numberOnly" minlength="10" maxlength="12" id="mobile_or_aadhaar" name="mobile_or_aadhaar" placeholder="Mobile/AADHAAR Number" required data-validation-required-message="Provide any Mobile or Aadhaar no.">
								<p class="help-block text-danger" id="mbl_validate"></p>
						    </div>
							<div class="form-group col-md-6">
								<label for="inputAddress2">Representative Type <span class="text-danger">*</span></label>
								<select class="form-control" id="representative_type" name="representative_type" required data-validation-required-message="Select any representative type">
									<option value="">Select Representative Type</option>
									<option value="1">President</option>
									<option value="2">Secretary</option>
									<option value="3">Treasurer</option>
									<option value="4">Director</option>										
								</select>
								<p class="help-block text-danger"></p>
						    </div>
							<div class="form-group col-md-6">
								<label for="inputAddress2">Date of Appointment <span class="text-danger">*</span></label>	
								<input type="date" class="form-control" id="appointment_date" name="appointment_date" placeholder="Date of Appointment" required data-validation-required-message="Enter the date of appointment" title="If need date picker, click the arrow" max="2050-12-31" value="<?php echo date("Y-m-d"); ?>">
								<p class="help-block text-danger"></p>
						    </div>
					     </div>                                                    
                            
							<div class="row">
							  <div class="column col-md-4">
								<div class="cards">
								<label for="inputAddress2">Farmer/FPO Name</label>	
									<input type="text" class="form-control"  maxlength="30" id="profile_name" name="profile_name" placeholder="Farmer/FPO Name" readonly>
									<p class="help-block text-danger"></p>
								</div>
                                  <input type="hidden" name="membership_id" id="membership_id" value="">
                                  <input type="hidden" name="member_id" id="member_id" value="">
							  </div>

							  <div class="column col-md-4">
								<div class="cards">
								<label for="inputAddress2">Mobile Number</label>	
								 <input type="number" class="form-control" maxlength="10" id="mobile" name="mobile" placeholder="Mobile Number" readonly>
								 <p class="help-block text-danger"></p>
								</div>
							  </div>
                                
							  <div class="column col-md-4">
								<div class="cards">
								<label for="inputAddress2">AADHAAR Number</label>	
								 <input type="text" class="form-control" maxlength="12" id="aadhar_no" name="aadhar_no" placeholder="Aadhaar Number" readonly>
								 <p class="help-block text-danger"></p>
								</div>
							  </div>
							</div>
                            
 
                            
							<div class="row mt-5">
							  <div class="col-md-12 text-center">
								<button id="sendMessageButton" value="Save" class="btn-fs btn btn-success " type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
								<a href="<?php echo base_url('staff/fig/figrepresentativelist');?>" class="btn-fs btn btn-outline-dark mt-10"><i class="fa fa-close" aria-hidden="true"></i>  Cancel</a>	
							  </div>
						    </div>
							
							<!--<div class="row mt-5">
							  <div class="column">
								<div class="cards">
								<label for="inputAddress2">Member Name</label>	
									<input type="text" class="form-control"  maxlength="30" id="area" name="area" placeholder="Member Name" required="required"  readonly>
								</div>
							  </div>

							  <div class="column ">
								<div class="cards">
								<label for="inputAddress2">Mobile Number</label>	
								 <input type="number" class="form-control"  maxlength="10" id="mob_number" name="mob_number" placeholder="Mobile Number" required="required" readonly>
								</div>
							  </div>
							  
							  <div class="column ">
								<div class="cards">
								<label for="inputAddress2">Aadhaar Number</label>	
								 <input type="text" class="form-control"  maxlength="12" id="aadhaar" name="aadhaar" placeholder="Aadhaar Number" required="required" readonly>
								</div>
							  </div>
                                
							  <div class="column">
								<div class="cards">
								<label for="inputAddress2">Representative Type</label>	
								   <input type="text" class="form-control"  maxlength="30" id="memberrepresentative_type" name="memberrepresentative_type" placeholder="Representative Type" required="required" readonly>
								</div>
							  </div>
                                
							  <div class="column">
								<div class="cards">
								<label for="inputAddress2">Actions</label>	
								  <div class="row">
								  <div class="col-md-10 text-left">
									<label for="inputAddress2"><i class="fa fa-trash fa-x ml-4 mob-10"></i></label>	
								  </div>
								</div>
							  </div>
							</div>
                                
							</div>-->  				
						</form>						
						               
                        </div>
                    </div>
                </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

   </div><!-- /#right-panel -->
</div><!-- .content -->
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
      $('#appointment_date').attr('max', maxDate);
		
});       
$("#mobile_or_aadhaar").focusout(function() {
    var mobile_or_aadhaar = $(this).val();
    if(mobile_or_aadhaar != "") {       
        if(mobile_or_aadhaar.length == 10 && (mobile_or_aadhaar.charAt(0) == 6 || mobile_or_aadhaar.charAt(0) == 7 || mobile_or_aadhaar.charAt(0) == 8 || mobile_or_aadhaar.charAt(0) == 9)) {
            var mobile_or_aadhaar_value = {'aadhaar_number':"", 'mobilenumber':mobile_or_aadhaar};
            verifyMember(mobile_or_aadhaar_value);
        } else if(mobile_or_aadhaar.length == 12) {
            var mobile_or_aadhaar_value = {'aadhaar_number':mobile_or_aadhaar, 'mobilenumber':""};
            verifyMember(mobile_or_aadhaar_value);    
        } else if(mobile_or_aadhaar.length == 11) {
           $("#mobile_or_aadhaar").val('');
		   $("#mobile_or_aadhaar").focus();
        }
    }
});
    
//verify farmer/FPO using mobile/Aadhaar number
function verifyMember(mobile_or_aadhaar_value) {
		$.ajax({
			url:"<?php echo base_url();?>staff/Fig/verifyMember/",
			type:"POST",
			data:mobile_or_aadhaar_value,
			dataType:"html",
			cache:false,      
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(responseArray);		
				if(responseArray.status == 1){				
					$("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
                    var profile_name = (responseArray.member_data[0].profile_name)?responseArray.member_data[0].profile_name:responseArray.member_data[0].producer_organisation_name;
                    var mobile = (responseArray.member_data[0].mobile)?responseArray.member_data[0].mobile:responseArray.member_data[0].fpo_mobile;
                    var aadhar_no = (responseArray.member_data[0].aadhar_no)?responseArray.member_data[0].aadhar_no:"";
                    document.getElementById("membership_id").value = responseArray.member_data[0].id;
                    document.getElementById("member_id").value = responseArray.member_data[0].member_id;
                    document.getElementById("profile_name").value = profile_name;
                    document.getElementById("mobile").value = mobile;
					getaadhar(aadhar_no);
                    //document.getElementById("aadhar_no").value = aadhar_no;	
				} else {				
                    $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
						  $("#mobile_or_aadhaar").val('');
						  $("#mobile_or_aadhaar").focus();
                    document.getElementById("profile_name").value = "";
                    document.getElementById("mobile").value = "";
                    document.getElementById("aadhar_no").value = "";
				}  
			},
		});            	 
}

function getaadhar(aadhar_no){
    if (aadhar_no.length > 0 && aadhar_no.length == 12) {


       var  aadhar = 'XXXX XXXX '+aadhar_no.substring(8); 

		
    }
    document.getElementById('aadhar_no').value = aadhar;
} 

////ajax call
//$('form').submit(function(e){
//	e.preventDefault();
//	const figrepresentdata = $('#figrepresent').serializeObject();
//    console.log(figrepresentdata);
//    
//	if(figrepresentdata !='') {		
//			$.ajax({
//				url:"<?php echo base_url();?>administrator/fig/postfigrepresent",
//				type:"POST",
//				data:figrepresentdata,
//				dataType:"html",
//				cache:false,			
//				success:function(response){		  
//				response=response.trim();
//				responseArray=$.parseJSON(response);
//				console.log(response);
//				if(responseArray.status == 1){
//				$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
//				window.location = "<?php echo base_url('administrator/fig/figrepresentativelist')?>";
//				}  
//				},
//				error:function(response){
//				alert('Error!!! Try again');
//				}
//			}); 
//	} else {
//	   alert('Please provide mandatory fields ');
//	}
//});
//    
//          
//$.fn.serializeObject = function() {
//  var o = {};
//  var a = this.serializeArray();
//  $.each(a, function() {
//    if (o[this.name] !== undefined) {
//      if (!o[this.name].push) {
//        o[this.name] = [o[this.name]];
//      }
//      o[this.name].push(this.value || '');
//    } else {
//      o[this.name] = this.value || '';
//    }
//  });
//  return o;
//};


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
    $('#date_of_appointment').attr('max', maxDate);
});
</script>
</body>
</html>