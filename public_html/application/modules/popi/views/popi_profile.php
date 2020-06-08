<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($popi_list);
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
table {
    width:100%;

}
table, th, td {
   font-weight:normal ! important;
    border-collapse: collapse;
		padding:5px;
}
th, td {
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
.menutoggle {
    display: none ! important;
}
.section-heading{
	color:green ! important;
	
}
</style> 
<body class="open"> 
 <div class="container-fluid pl-0 pr-0">   	   
		<div id="right-panel" class="right-panel">
         <?php $this->load->view('templates/menu-inner.php');?>
         <!-- Contents -->
         <div class="container-fluid"> 
            <div class="row mt-3">
               <div class="col-lg-12 text-center">
                  <h1 class="section-heading text-uppercase">Popi Profile</h1>
               </div>
            </div>

            <div class="container-fluid mt-1">         
               <div class="col-md-10 offset-md-1">
                  <div class=" px-3 py-4" style="height:100%">
                     <div class="">
					<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="editpopi_Form">
						<input type="hidden" name="popi_id" value="<?php echo $popi_list[0]->id;?>" id="popi_id">
						  <div class="row row-space">
						  <div class="form-group col-md-6 ">
								<label class=" form-control-label">Type of Promoting Institution </label>
								    <input type="text" class="form-control " min="3" max="100" name="institution_name" value="<?php if($popi_list[0]->institution_type == 1){ echo 'POPI'; } else { echo 'Federation'; } ?>" disabled id="institution_name" placeholder="Name of the Promoting Institution " required>												
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-6 ">
								<label for="inputAddress2">Name of the Promoting Institution </label>
								<input type="text" class="form-control " min="3" max="100" name="institution_name" value="<?php echo $popi_list[0]->institution_name;?>" disabled id="institution_name" placeholder="Name of the Promoting Institution " required>
								<div class="help-block with-errors text-danger"></div>
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-6 ">
							<label for="inputAddress2">Address </label>
							<table style="width:100%">
							  <tr>
							  <th>Door No</th>
							  <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->door_no;?>" id="door_no" disabled name="door_no" placeholder="Door No"></td>
							  </tr>
							   <tr>
							  <th>Street</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->street;?>" id="street" disabled name="street" placeholder="Street"></td>
							  </tr>
							  <tr>
							  <th>Village</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->village_name;?>" id="village" disabled name="village" placeholder="Village"></td>
							  </tr>
							  <tr>
							  <th>Gram Panchayat</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->panchayat_name;?>" id="panchayat" disabled name="panchayat" placeholder="Panchayat"></td>
							  </tr>
							  <tr>
							  <th>Taluk</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->block_name;?>" id="door_no" disabled name="door_no" placeholder="Door No"></td>
							  </tr>
							  <tr>
							  <th>Block</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->block_name;?>" id="door_no" disabled name="block" placeholder="Block"></td>
							  </tr>
							  <tr>
							  <th>District</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->district_name;?>" id="district" disabled name="district" placeholder="District"></td>
							  </tr>
							  <tr>
							  <th>State</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->state_name;?>" id="state" disabled name="state" placeholder="State"></td>
							  </tr>
							  <tr>
							  <th>PINCODE</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $popi_list[0]->pin_code;?>" id="pin_code" disabled name="pin_code" placeholder="PINCODE"></td>
							  </tr>
							</table>
							 </div>
							 <div class="form-group col-md-6 mt-3 ">
							<label for="inputAddress2">Contact Information</label>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Land Line Number – STD Code  </label>
								<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" title="Landline number starts with '0'" value="<?php echo $popi_list[0]->std_code;?>" maxlength="8" disabled id="std_code" name="std_code" placeholder="STD Code" >
							<div class="help-block with-errors text-danger"></div>
							</div>
							<!--<div class="form-group col-md-12">
								<label for="inputAddress2">Land Line Number  </label>
								<input type="text" class="form-control numberonly" maxlength="8" minlength="6"id="land_line" value="<?php //echo $popi_list[0]->land_line;?>"  name="land_line" disabled  placeholder="Land Line Number " style="width:250px;">				
							<div class="help-block with-errors text-danger"></div>
							</div>-->
							<div class="form-group col-md-12">
								<label for="inputAddress2">Land Line Number </label>
								<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="8" minlength="6" id="land_line" name="land_line" disabled value="<?php echo $popi_list[0]->land_line;?>" placeholder="LandLine Number" required="required" data-validation-required-message="Please enter mobile number.">
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Mobile Number </label>
								<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="10"  readonly id="mobile" name="mobile_num"  value="<?php echo $popi_list[0]->mobile;?>" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">E-Mail Address </label>
								<input type="email" class="form-control"  id="email" name="email"  placeholder="E-Mail Address" required="required" value="<?php echo $popi_list[0]->email;?>" data-validation-required-message="Please enter email address.">
								<div class="help-block with-errors text-danger"></div>
							</div>								
							 </div>
						     </div>
							<div class="row row-space">
							<div class="form-group col-md-6 ">
								
								<div class="col-md-12">
                                    <label for="inputAddress2">Constitution Information</label>
								    <input type="text" class="form-control" id="constitution" name="constitution" value="<?php if($popi_list[0]->constitution == 1){ echo 'Trust'; } else { echo 'Society'; } ?>" disabled>
								</div>
						
								<div class="form-group col-md-12 mt-3">
									<label for="inputAddress2">Date of Formation </label>
									<input type="date" class="form-control" onfocusout="calculatedate(this.value);" readonly  value="<?php echo $popi_list[0]->date_formation;?>"  name="date_formation"   id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." >
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-12">
									<label for="inputAddress2">PAN of the Promoting Institution   </label>
									<input type="text" class="form-control text-uppercase"  disabled id="pan_promoting_inst" value="<?php echo $popi_list[0]->pan_promoting_inst;?>" name="pan_promoting_institution" placeholder="PAN of the Promoting Institution" required="required" data-validation-required-message="Please enter pan of promoting institution.">
									<p class="help-block text-danger"></p>
								</div>
								<div class="form-group col-md-12">
									<label for="inputAddress2">Name of the Contact Person  </label>
									<input type="text" class="form-control"  id="contact_person" value="<?php echo $popi_list[0]->contact_person;?>" readonly name="contact_person" placeholder="Name of the Contact Person  " required="required" data-validation-required-message="Please enter name of the contact person.">
									<p class="help-block text-danger"></p>
								</div>
							</div>
							
							<div class="form-group col-md-6 ">
							<div class="form-group col-md-12">
								<label for="inputAddress2">Nature of Activity </label>
								<select class="form-control" id="nature_activity" value="<?php echo $popi_list[0]->nature_activity;?>" name="nature_activity"   required="required" data-validation-required-message="Please select nature of activity.">
									<option value="1" <?php if($popi_list[0]->nature_activity == 1){?>selected<?php } ?>>Charitable</option>
									<option value="2" <?php if($popi_list[0]->nature_activity == 2){?>selected<?php } ?>>Agri</option>
									<option value="3" <?php if($popi_list[0]->nature_activity == 3){?>selected<?php } ?>>Social</option>
									<option value="4" <?php if($popi_list[0]->nature_activity == 4){?>selected<?php } ?>>Education</option>										
								</select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Financial Year Begins From </label>
								<input type="date" class="form-control"  name="financial_year" readonly value="<?php echo $popi_list[0]->financial_year;?>" id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year begins from." title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Business Commence From  </label>
								<input type="date" class="form-control" readonly  name="business_commence" onfocusout="calculatedate(this.value);"  value="<?php echo $popi_list[0]->business_commence;?>"  id="business_commence" placeholder="Business Commence From " required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31">
								<p class="help-block text-danger"></p>
							</div>
							</div>
							<div class="form-group col-md-12 text-center mt-2">
								<div class="form-group">
									<div id="success"></div>
									<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"> <i class="fa fa-check-circle"></i> Update</button>
									<a href="<?php echo base_url('popi/dashboard');?>"><button id="back" class="btn-fs btn btn-outline-dark" type="button"> <i class="fa fa-close" aria-hidden="true"></i> Cancel</button></a>
								</div>	
							</div>	
							</div>							
						</form>
						</div> 
                     </div>
                  </div>
               </div>
     
         </div> 
		</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>   
<?php $this->load->view('templates/datatable.php');?> 
<script src="<?php echo asset_url()?>js/login.js"></script>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script>
	$('form').submit(function(e){
	e.preventDefault();
	const popidata = $('#editpopi_Form').serializeObject();
	console.log(popidata);
		 $.ajax({
			url:"<?php echo base_url();?>popi/popi/profile_update",
			type:"POST",
			data:popidata,
			dataType:"html",
            cache:false,			
			success:function(response){		
                console.log(response);			
				 response=response.trim();
				responseArray=$.parseJSON(response);
				
				if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('popi/dashboard')?>";
				}  
			},
			error:function(response){
				alert('Error!!! Try again');
			} 
		}); 
	});

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

function calculatedate (date_formation) {
	
	document.getElementById("business_commence").value = date_formation;	
	
}
//white spaces 
$(function() {
     $('.form-control').on('keypress', function(e) {
         if (e.which == 32){
			 var newStr = $(this).val().length;
			if(newStr){
				 return true;
			}
			  return false;
		 }else{
			 return true;
		 }
            
     });
 }); 

		</script>
     
   </body>
</html>