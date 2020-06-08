<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.column {    
    width: 20%;
	 padding:5px 28px;    
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
                        <h1>View FIG Representative</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                      <ol class="breadcrumb text-right">
							 <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('staff/fig/figrepresentativelist');?>">FIG Representative</a></li>
                            <li class="active">View FIG Representative </li>
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
						<div class="container-fluid">
						<form action="<?php echo base_url('staff/fig/updatefigrepresent/'.$figrepresent_list[0]->id)?>" name="sentMessage" method="post" id="editfigrepresent" novalidate="novalidate" >				
						<input type="hidden" name="figrepresent_id" value="<?php echo $figrepresent_list[0]->id; ?>" id="figrepresent_id">
                        <input type="hidden" name="membership_id" id="membership_id" value="">
                        <input type="hidden" name="member_id" id="member_id" value="">  
						<div class="row row-space">
						 <div class="form-group col-md-4">
							  <label for="">FIG </label>
							  <select class="form-control" id="fig_list" name="fig_name" readonly required  data-validation-required-message="Select any FIG...">
                                  <option value="">Select FIG</option>
								  <?php for($i=0; $i<count($fig);$i++) { ?>										
									 <option value="<?php echo $fig[$i]->id; ?>"><?php echo $fig[$i]->FIG_Name; ?></option>
									<?php } ?>
							  </select>
							 <p class="help-block text-danger"></p>
						 </div>
                         <div class="form-group col-md-4">
                             <label for="inputAddress2">Date of Change </label><input type="date" class="form-control" disabled maxlength="30" id="appointment_date" name="appointment_date" placeholder="Crop Name" required data-validation-required-message="Enter the date of appointment." title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31" value="<?php echo $figrepresent_list[0]->appointment_date; ?>">
						     <p class="help-block text-danger"></p>
				        </div>
                        <div class="form-group col-md-4">
								<label for="inputAddress2">Representative Type </label>
								<select class="form-control" id="representative_type" disabled name="representative_type" required data-validation-required-message="Select the representative type">
									<option value="">Select Representative Type</option>
									<option value="1">President</option>
									<option value="2">Secretary</option>
									<option value="3">Treasurer</option>
									<option value="4">Director</option>										
								</select>
								<p class="help-block text-danger"></p>
						    </div>
						</div>
						<div class="row" id="farmer" style="display:none">						    
							  <div class="form-group col-md-4">
								<div class="cards">
								<label for="inputAddress2">Farmer Name</label>	
									<input type="text" class="form-control" maxlength="30" id="profile_name" name="profile_name" placeholder="Farmer/FPO Name" data-validation-required-message="Please select Farmer Name."  readonly>
									<p class="help-block text-danger"></p>
								</div>
							  </div>														
							  <div class="form-group col-md-4">
								<div class="cards">
								<label for="inputAddress2">Aadhaar Number</label>	
								 <input type="text" class="form-control"  maxlength="15" id="aadhar_no" name="aadhar_no" placeholder="Aadhaar Number" readonly>
								 <p class="help-block text-danger"></p>
								</div>
							  </div>
							  
							  <div class="form-group col-md-4">
								<div class="cards">
								<label for="inputAddress2">Mobile Number</label>	
								 <input type="number" class="form-control" maxlength="10" id="mobile" name="mobile" placeholder="Mobile Number" readonly>
								 <p class="help-block text-danger"></p>
								</div>
							  </div>                            
				        </div> 	
						<div class="row" id="fpo" style="display:none">						    
							  <div class="form-group col-md-4">
								<div class="cards">
								<label for="inputAddress2">FPO Name</label>	
									<input type="text" class="form-control" maxlength="30" id="fpo_name" name="fpo_name" placeholder="FPO Name"  readonly>
								</div>
							  </div>
							  <div class="form-group col-md-4">
								<div class="cards">
								<label for="inputAddress2">Mobile Number</label>	
								 <input type="number" class="form-control" maxlength="10" id="fpo_mobile" name="fpo_mobile" placeholder="Mobile Number" readonly>
								 <p class="help-block text-danger"></p>
								</div>
							  </div>                            
				        </div> 			
						<div class="row row-space mt-3">		
							 <div class="form-group col-md-6">
								<label for="inputAddress2">Reason <span class="text-danger">*</span></label>	
								<textarea class="form-control" id="reason" name="reason" required data-validation-required-message="Please enter reason" ></textarea>
								<p class="help-block text-danger" id="reason_validate"></p>
						    </div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Date of Terminate <span class="text-danger">*</span></label>	
								<input type="date" class="form-control" id="terminate_date" name="terminate_date" placeholder="Date of Terminate " required data-validation-required-message="Enter the date of terminate" title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31" value="<?php echo date("Y-m-d"); ?>">
								<p class="help-block text-danger"></p>
						    </div>
				        </div>
                            
							<div class="row">								
							  <div class="form-group col-md-12 text-center">
								<div id="success"></div>
								    <!--<input id="edit" value="Edit" class="btn btn-success text-center mt-3" type="button">-->
									<button id="sendMessageButton" value="Update" class="btn-fs btn btn-success text-center mt-3" type="submit" ><i class="fa fa-check-circle"></i> Update</button>
									<!--<a href="#" id="" class="del btn btn-danger mt-3"> Delete</a>-->
									<a href="<?php echo base_url('staff/fig/figrepresentativelist');?>" id="ok"  class="btn-fs btn btn-outline-dark text-center mt-3"><i class="fa fa-arrow-circle-left"></i>  Back</a>
									<a href="<?php echo base_url('staff/fig/figrepresentativelist');?>"><input id="cancel" href="" value="Cancel" class="btn-fs btn btn-outline-dark text-center mt-3" type="button" style="display:none"></a>
							  </div>
						    </div>
					 
							<!--<div class="row">							
							  <div class="column">
								<div class="cards">
								<label for="inputAddress2">Member Name</label>	
									<input type="text" class="form-control"  maxlength="30" id="area" name="area" placeholder="Member Name" required="required"  readonly>
								</div>
							  </div>

							  <div class="column ">
								<div class="cards">
								<label for="inputAddress2">Mobile Number</label>	
								 <input type="text" class="form-control"  maxlength="10" id="mob_number" name="mob_number" placeholder="Mobile Number" required="required" readonly>
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
 </div><!-- /#right-panel -->
 <!-- .content -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>	 
</body>
</html>
 <script>
	$(document).ready(function() {
		var fig_id = '<?php echo $figrepresent_list[0]->fig_id;?>';
		var representative_type = '<?php echo $figrepresent_list[0]->representative_type;?>';
		var reason ='<?php echo $figrepresent_list[0]->reason;?>';
		setTimeout(function(){ 
			document.getElementById("fig_list").value=fig_id;
			document.getElementById("representative_type").value=representative_type;
			document.getElementById("reason").value=reason;
		}, 500);
		
	});
          
	$("#sendMessageButton").click(function() {
	var reason=document.getElementById("reason").value;

	
	if( reason =='' )
	{

		$("#reason_validate").html("Please enter reason");
		return false;
	}else{
		return true;
	}

	});
		
	$("#mobile_or_aadhaar").focusout(function() {
		var mobile_or_aadhaar = $(this).val();
		alert(mobile_or_aadhaar);
		if(mobile_or_aadhaar != "") {       
			if(mobile_or_aadhaar.length == 10 && (mobile_or_aadhaar.charAt(0) == 6 || mobile_or_aadhaar.charAt(0) == 7 || mobile_or_aadhaar.charAt(0) == 8 || mobile_or_aadhaar.charAt(0) == 9)) {
				var mobile_or_aadhaar_value = {'aadhaar_number':"", 'mobilenumber':mobile_or_aadhaar};
				verifyMember(mobile_or_aadhaar_value);
			} else if(mobile_or_aadhaar.length == 12) {
				var mobile_or_aadhaar_value = {'aadhaar_number':mobile_or_aadhaar, 'mobilenumber':""};
				verifyMember(mobile_or_aadhaar_value);    
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
						document.getElementById("aadhar_no").value = aadhar_no;	
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
 
 
	$('#edit').click(function(){
			  $('#editfigrepresent').toggleClass('view');
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
					inp.attr('disabled', 'disabled');
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
					inp.attr('disabled', 'disabled');
				 }
			  });
				$('textarea').each(function(){
				 var inp = $(this);
				 //var button = $(this);
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
	var memeber_ship='<?php echo $figrepresent_list[0]->membership_id;?>';
	if(memeber_ship) {
		$.ajax({
			url:"<?php echo base_url();?>staff/Fig/getmember/"+memeber_ship,
			type:"POST",
			data:memeber_ship,
			dataType:"html",
			cache:false,      
			success:function(response) {                
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(responseArray);		
				if(responseArray.status == 1){	
					var member_type=responseArray.member_list[0].member_type;
					if(member_type==1){
						$('#farmer').show();$('#fpo').hide();
						var profile_name = responseArray.member_list[0].profile_name;
						var mobile =responseArray.member_list[0].mobile
						var aadhar_no = responseArray.member_list[0].aadhar_no;
						document.getElementById("profile_name").value = profile_name;
						document.getElementById("mobile").value = mobile;
						document.getElementById("aadhar_no").value = aadhar_no;
						alignAadhaar(aadhar_no);
					}else if(member_type==2){
						$('#fpo').show();$('#farmer').hide();
						var profile_name = responseArray.member_list[0].producer_organisation_name;
						var mobile = responseArray.member_list[0].fpo_mobile;
						document.getElementById("fpo_name").value = profile_name;
						document.getElementById("fpo_mobile").value = mobile;
					}
					/* $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
                    var profile_name = (responseArray.member_data[0].profile_name)?responseArray.member_data[0].profile_name:responseArray.member_data[0].producer_organisation_name;
                    var mobile = (responseArray.member_data[0].mobile)?responseArray.member_data[0].mobile:responseArray.member_data[0].fpo_mobile;
                    var aadhar_no = (responseArray.member_data[0].aadhar_no)?responseArray.member_data[0].aadhar_no:"";
                    document.getElementById("membership_id").value = responseArray.member_data[0].id;
                    document.getElementById("member_id").value = responseArray.member_data[0].member_id;
                    document.getElementById("profile_name").value = profile_name;
                    document.getElementById("mobile").value = mobile;
                    document.getElementById("aadhar_no").value = aadhar_no;	 */
				} else {				
                   /*  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
                    document.getElementById("profile_name").value = "";
						   $("#mobile_or_aadhaar").val('');
						   $("#mobile_or_aadhaar").focus();
                    document.getElementById("mobile").value = "";
                    document.getElementById("aadhar_no").value = ""; */
				}  
			},
		});            	 
	}
	function alignAadhaar(aadhar_no){
		if (aadhar_no.length > 0 && aadhar_no.length == 12) {


		   var  aadhar = 'XXXX XXXX '+aadhar_no.substring(8); 
			
		}
		document.getElementById('aadhar_no').value = aadhar;
	}  
	//sweetalert
	$('a.del').click(function() {
		var figrepresent_id = <?php echo $figrepresent_list[0]->id; ?>;
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
              url: "<?php echo base_url();?>staff/fig/deletefigrepresent/"+figrepresent_id,
              type: "POST",
              data: {
                 this_delete: figrepresent_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('staff/fig/figrepresentativelist')?>");
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
            swal("Cancelled", "You have cancelled the fig representative information delete action", "info");
            return false;
         }
      });
	});

	  </script>