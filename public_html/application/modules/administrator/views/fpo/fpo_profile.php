<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($fpo_list);
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
<body class="">
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

footer {
  background-color:#afd66b ! important;
}
</style> 
      <section id="">      
         <!-- Contents -->
         <div class="container-fluid"> 
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-uppercase">FPO Profile</h2>
               </div>
            </div>

            <div class="container-fluid mt-1">         
               <div class="col-md-10 offset-md-1">
                  <div class=" px-3 py-4" style="height:100%">
                     <div class="">
					<form  name="sentMessage" method="post" action="" novalidate="novalidate" id="editpopi_Form">
						<input type="hidden" name="fpo_id" value="<?php echo $fpo_list[0]->id;?>" id="fpo_id">
						  <div class="row row-space">
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">POPI Name</label>
                                <input class="form-control" id="popi_list" name="popi_name" required="required" disabled value="<?php echo $fpo_list[0]->popi_name;?>" data-validation-required-message="Select POPI...">
                                <div class="help-block with-errors text-danger"></div>
                            </div>
                              
                              <div class="form-group col-md-6">
								<label for="inputAddress2">Name of the Producers Organisation</label>
								<input type="text" class="form-control" maxlength="100"  name="producer_organisation_name" value="<?php echo $fpo_list[0]->producer_organisation_name;?>" id="producer_organisation_name" placeholder="Name of the Promoting Institution " required="required" data-validation-required-message="Please enter promoting institution name." disabled>
								<div class="help-block with-errors text-danger"></div>
							</div>
							</div>
                        
							<div class="row row-space">
							<div class="form-group col-md-6 ">
							<label for="inputAddress2">Address </label>
							<table style="width:100%">
							  <tr>
							  <th>Door NO</th>
							  <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->door_no;?>" id="door_no" disabled name="door_no" placeholder="Door No"></td>
							  </tr>
							   <tr>
							  <th>Street</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->street;?>" id="street" disabled name="street" placeholder="Street"></td>
							  </tr>
							  <tr>
							  <th>Village</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->village_name;?>" id="village" disabled name="village" placeholder="Village"></td>
							  </tr>
							  <tr>
							  <th>Gram Panchayat</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->panchayat_name;?>" id="panchayat" disabled name="panchayat" placeholder="Panchayat"></td>
							  </tr>
							  <tr>
							  <th>Taluk</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->block_name;?>" id="taluk" disabled name="taluk" placeholder="Door No"></td>
							  </tr>
							  <tr>
							  <th>Block</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->block_name;?>" id="block" disabled name="block" placeholder="Block"></td>
							  </tr>
							  <tr>
							  <th>District</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->district_name;?>" id="district" disabled name="district" placeholder="District"></td>
							  </tr>
							  <tr>
							  <th>State</th>
							   <td><input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_list[0]->state_name;?>" id="state" disabled name="state" placeholder="State"></td>
							  </tr>
							  <tr>
							  <th>Pincode</th>
							   <td><input type="text" class="form-control" maxlength="6" value="<?php echo $fpo_list[0]->pin_code;?>" id="pin_code" disabled name="pin_code" placeholder="Pincode"></td>
							  </tr>
							</table>
							 </div>
							 <div class="form-group col-md-6 mt-3 ">
							<label for="inputAddress2">Contact Information</label>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Land Line Number – STD Code  </label>
								<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" value="<?php echo $fpo_list[0]->std_code;?>" maxlength="8"  id="std_code" name="std_code" placeholder="STD Code" >
							<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Land Line Number </label>
								<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="8" minlength="6" id="land_line" name="land_line"  value="<?php echo $fpo_list[0]->land_line;?>" placeholder="LandLine Number" required="required" data-validation-required-message="Please enter mobile number.">
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Mobile Number </label>
								<input type="text" class="form-control numberonly" pattern="^[6-9]\d{9}$" maxlength="10"  id="mobile" name="mobile"  value="<?php echo $fpo_list[0]->mobile;?>" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
								<div class="help-block with-errors text-danger"></div>
							</div>
							<div class="form-group col-md-12">
								<label for="inputAddress2">Email Address </label>
								<input type="email" class="form-control"  id="email" name="email"  placeholder="Email Address " required="required" value="<?php echo $fpo_list[0]->email;?>" data-validation-required-message="Please enter email address.">
								<div class="help-block with-errors text-danger"></div>
							</div>								
							 </div>
						     </div>
							<div class="row row-space">
							<div class="form-group col-md-6 ">
								<label for="inputAddress2">Constitution Information</label>
								<div class="row">
									<div class="col-md-6">
										<div class="form-check-inline form-check">
											<label for="inline-radio1" class="form-check-label">
											<input type="radio" id="constitution" name="constitution" value="1" <?php if($fpo_list[0]->constitution == 1){?>checked<?php } ?> class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled><span class="ml-1">Trust</span>
											<div class="help-block with-errors text-danger"></div>
											</label>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="form-check-inline form-check">
											<label for="inline-radio2" class="form-check-label">
											<input type="radio" id="constitution" name="constitution" value="2" <?php if($fpo_list[0]->constitution == 2){?>checked<?php } ?> class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled><span class="ml-1">Society</span>
											<div class="help-block with-errors text-danger"></div>
											</label>
										</div>
										</div>			
									</div>
									<div class="form-group col-md-12 mt-4">
										<label for="inputAddress2">Registration Number(CIN)/Society </label>
										<input type="text" class="form-control" maxlength="21"  name="reg_no" value="<?php echo $fpo_list[0]->reg_no?>" id="reg_no" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
								    <div class="form-group col-md-12">
										<label for="inputAddress2">Tax Deduction Account(TAN)</label>
										<input type="text" class="form-control text-uppercase" value="<?php echo $fpo_list[0]->tax_deduction ?>" id="tax_deduction" maxlength="10" name="tax_deduction" placeholder="Tax Deduction Account(TAN)" required="required" data-validation-required-message="Please enter tax deduction account."disabled>
									</div>
									<div class="form-group col-md-12">
										<label for="inputAddress2">IE Code Number</label>
										<input type="text" class="form-control" value="<?php echo $fpo_list[0]->ie_code?>" name="ie_code" maxlength="10" id="ie_code" placeholder="IE Code Number" required="required" data-validation-required-message="Please enter GST"disabled>
									</div>
									 <div class="form-group col-md-12">
									<label for="inputAddress2">Financial Year Begins</label>
									<input type="date" class="form-control"  name="financial_year" value="<?php echo $fpo_list[0]->financial_year?>" id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31"disabled>
									<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-12">
									<label for="inputAddress2">Financial Year Closing</label>
									<input type="date" class="form-control"  name="financial_year_to" disabled value="<?php echo $fpo_list[0]->financial_year_to?>"  id="financial_year_to"  placeholder="Financial Year Begins To" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow" min="2018-01-01" max="2050-12-31">
									<div class="help-block with-errors text-danger"></div>
								   </div>
									<div class="form-group col-md-12">
									<label for="inputAddress2">Business Commence From </label>
									<input type="date" class="form-control" value="<?php echo $fpo_list[0]->business_commence?>" name="business_commence" maxlength="10" id="business_commence" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow " min="2018-01-01" max="2050-12-31"disabled>
									<div class="help-block with-errors text-danger"></div>
								    </div>
										
							</div>
							
							<div class="form-group col-md-6 ">
								<div class="form-group col-md-12">
									<label for="inputAddress2">Formation Date</label>
									<input type="date" class="form-control"  name="date_formation" value="<?php echo $fpo_list[0]->date_formation;?>" id="date_formation" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow "disabled >
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-12">
									<label for="inputAddress2">Permanent Account Number(PAN) </label>
									<input type="text" class="form-control text-uppercase"  maxlength="10" value="<?php echo $fpo_list[0]->pan?>" id="pan" name="pan" placeholder="Permanent Account Number" required="required" data-validation-required-message="Please enter pan."disabled>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-12">
									<label for="inputAddress2">Goods & Service Tax Number(GST)</label>
									<input type="text" class="form-control text-uppercase"  name="gst" value="<?php echo $fpo_list[0]->gst?>" maxlength="15" id="gst" placeholder="Goods & Service Tax Number (GST)" required="required" data-validation-required-message="Please enter GST"disabled>
								</div>								
							<table style="width:100%">
							  <tr>
							  <th>Name of the Contact Person</th>
							  <td><input type="text" class="form-control" value="<?php echo $fpo_list[0]->contact_person?>" name="contact_person"  id="contact_person" placeholder="Name of the Contact Person" required="required" data-validation-required-message="Please enter contact person name."disabled></td>
							  </tr>
							   <tr>
							  <th>Type of Business</th>
							   <td><input type="text" class="form-control" id="business_type" name="business_type" value="<?php  $keywords = preg_split( "/[,]+/", $fpo_list[0]->business_type);
								$i=0;
								foreach($keywords as $key => $value) {
									if($i > 0){
										echo ', ';
									}
									if( $value == 1){
									   echo 'Manufacturing';
									}else if($value == 2){
									  echo 'Trading';
									}else if($value == 3){
									  echo 'Service';
									}
									$i++;
								}
								?>" class="form-check-input" required="required" data-validation-required-message="Please select."disabled></td>
							  </tr>
							  <tr>
							  <th>Nature of Business </th>
							   <td><input type="text" class="form-control" id="business_nature" name="business_nature" value="<?php echo $nature_business;?>" class="form-check-input" required="required" data-validation-required-message="Please select."disabled></td>
							  </tr>
							  <tr>
							  <th>Inventory Subscribed</th>
							   <td>
							  <input type="text" class="form-control" id="inventory_required"  name="inventory_required" value="<?php if($fpo_list[0]->inventory_required == 1){ echo "Yes"; } else { echo "No"; }?>"  required="required" data-validation-required-message="Please select constitution." disabled>
							   </td>
							  </tr> 
							</table> 
							</div> 
								
							</div>
							<div class="form-group col-md-12 text-center mt-2">
								<div class="form-group">
									<div id="success"></div>
									<input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">
									<a href="<?php echo base_url('administrator/dashboard');?>"><input id="back" value="Cancel" class="btn btn-outline-dark" type="button"></a>
								</div>	
							</div>	
							</div>							
						</form>
						</div> 
                     </div>
                  </div>
               </div>
     
         </div> 
		</section>
<?php $this->load->view('templates/footer1.php');?>      
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
			url:"<?php echo base_url();?>administrator/fpo/profile_update",
			type:"POST",
			data:popidata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/dashboard')?>";
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

/* <?php  $keywords = preg_split( "/[,]+/", $row->business_type);
								
$i=0;
foreach($keywords as $key => $value) {
	if($i > 0){
		echo ', ';
	}
	if( $value == 1){
	   echo 'Manufacturing';
	}else if($value == 2){
	  echo 'Trading';
	}else if($value == 3){
	  echo 'Service';
	}
	$i++;
}

?> */

</script>     
</body>
</html>