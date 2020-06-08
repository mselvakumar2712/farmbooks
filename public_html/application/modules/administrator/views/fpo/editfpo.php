<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>dist/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>dist/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.sw-theme-circles .sw-toolbar-bottom {
    border-top-color: #ddd !important;
    border-bottom-color: #ddd !important;
    padding-left: 830px;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
     border: none !important; 
    border-radius: 4px;
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
                        <h1>View FPO </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('administrator/fpo');?>">FPO </a></li>
                            <li class="active">View FPO</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<div class="content mt-3">
            <div class="animated fadeIn">
			<div class="card">
			<div class="card-body">
			    <form action="<?php echo base_url('administrator/fpo/updatefpo/'.$fpo_info['id'])?>" id="editfpo_Form" role="form" novalidate="novalidate" data-toggle="validator" method="post" accept-charset="utf-8">
			    <div id="smartwizard">
					<ul>
					 <li><a style="width:80px;" href="#step-1">Step <br>1<br><small>FPO Details</small></a></li>
                <li><a style="width:80px;" href="#step-2">Step <br>2<br><small>Persuing</small></a></li>
					</ul>
				<div>
				 <div  id="step-1">
					    <div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
								<div class="form-group col-md-12 mt-1">
									<div class="form-group col-md-4">
									<?php if($_SESSION['user_type']=='1' || $_SESSION['user_type']=='2'){																	
									}else {?>
									<label for="inputAddress2">POPI <span class="text-danger">*</span></label>									
									<!--<select class="form-control" id="popi_id" name="popi_name" required="required" readonly data-validation-required-message="Select POPI...">
									</select>-->
									<input type="text" id="popi_id" class="form-control" name="popi_name" readonly  value="<?php echo $fpo_info['popi_name']?>">
									<?php } ?>
									<div class="help-block with-errors text-danger mt-3"></div>
									</div>												
								</div>
							<div class="form-group col-md-12 mt-1">
									<div class="form-group col-md-4">
									<input type="hidden" name="fpo_id" value="<?php echo $fpo_info['id']?>" id="fpo_id">
								<input type="hidden" name="popi_id" disabled value="<?php echo $fpo_info['popi_id']?>" id="popi_id">
										<label for="inputAddress2">Name of the Producers Organisation <span class="text-danger">*</span></label>
										<input type="text" class="form-control" maxlength="100" value="<?php echo $fpo_info['producer_organisation_name']?>" name="producer_organisation_name"  id="producer_organisation_name" placeholder="Name of the Producers Organisation " required="required" data-validation-required-message="Please enter promoting institution name." disabled>
										<div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="inputAddress2">PINCODE  <span class="text-danger">*</span></label>
										<input type="text" class="form-control numberOnly this_pin_code" readonly  value="<?php echo $fpo_info['pin_code']?>" onkeyup="getPincode(this.value)" pattern="[1-9][0-9]{5}" id="pin_code" name="pin_code" placeholder="PINCODE" required="required" data-validation-required-message="Please enter pin code." disabled>
										<div class="help-block with-errors text-danger" id="pincode_validate"></div>
									</div>
									<div class="form-group col-md-4">                                    
									<label for="inputAddress2">State <span class="text-danger">*</span></label>
									<select  class="form-control sel_state" id="state" name="state" disabled readonly  placeholder="State" required>
									 <option  value="<?php echo $fpo_info['state']?>"><?php echo $fpo_info['state_name']?></option>
									</select>
									<!--<input class="form-control" id="state" name="state"   placeholder="State"readonly>-->
									<div class="help-block with-errors text-danger"></div>
								</div>
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">District <span class="text-danger">*</span></label>
									<select  class="form-control sel_district" id="district" name="district" disabled readonly  placeholder="District" required>
										<option  value="<?php echo $fpo_info['district']?>"><?php echo $fpo_info['district_name']?></option>
									</select>
									<!--<input type="text" class="form-control numberOnly"  id="district" name="district" placeholder="District" required="required" data-validation-required-message="Please enter district."readonly>-->
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Taluk <span class="text-danger">*</span></label>
									<select  class="form-control sel_taluk" id="taluk" name="taluk"  disabled placeholder="Taluk" required>
									<?php foreach($taluk_info as $taluk){
                                                if($taluk->taluk_code == $fpo_info['taluk_id'])
                                                   echo "<option value='".$taluk->taluk_code."' selected='selected'>".$taluk->name."</option>";
                                                else
                                                   echo "<option value='".$taluk->taluk_code."'>".$taluk->name."</option>";
                                             }
                                             ?></select>
									<!--<input class="form-control" id="taluk" name="taluk"   placeholder="Taluk" required="required" data-validation-required-message="Please enter taluk."readonly>-->	
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Block <span class="text-danger">*</span></label>
									<select  class="form-control sel_block" id="block" name="block" onchange="getPanchayatList(this.value);"  disabled placeholder="Block" required>
										<?php foreach($block_info as $block){
                                                if($block->block_code == $fpo_info['block'])
                                                   echo "<option value='".$block->block_code."' selected='selected'>".$block->name."</option>";
                                                else
                                                   echo "<option value='".$block->block_code."'>".$block->name."</option>";
                                             }
                                             ?>
									</select>
									<!--<input class="form-control" id="block" name="block"   placeholder="Block" required="required" data-validation-required-message="Please enter block."readonly>-->	
									<div class="help-block with-errors text-danger"></div>
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">						    
									<label for="inputAddress2">Gram Panchayat <span class="text-danger">*</span></label>
									<select  class="form-control sel_panchayat" id="gram_panchayat" name="gram_panchayat" disabled required="required" data-validation-required-message="Please select gram panchayat." onchange="getVillageList(this.value);">
									<option value="">Select Gram Panchayat </option>
									<?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $fpo_info['panchayat'])
                                                   echo "<option value='".$panchayat->panchayat_code."' selected='selected'>".$panchayat->name."</option>";
                                                else
                                                   echo "<option value='".$panchayat->panchayat_code."'>".$panchayat->name."</option>";
                                             }
                                             ?>									
									</select>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">						    
									<label for="inputAddress2">Village <span class="text-danger">*</span></label>
									<select class="form-control sel_village" id="village" name="village" disabled required="required" data-validation-required-message="Please select village."> 
										<option value="">Select Village </option>
                                             <?php foreach($village_info as $village){
                                                if($village->id == $fpo_info['village'])
                                                   echo "<option value='".$village->id."' selected='selected'>".$village->name."</option>";
                                                else
                                                   echo "<option value='".$village->id."'>".$village->name."</option>";
                                             }
                                             ?>
									</select>
									<div class="help-block with-errors text-danger"></div>
								</div>	
								<div class="form-group col-md-4">
									<label for="inputAddress2">Street</label>
									<input type="text" class="form-control" value="<?php echo $fpo_info['street']?>" maxlength="75" id="street" name="street" placeholder="Street" disabled>
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Door No</label>
									<input type="text" class="form-control" maxlength="10" value="<?php echo $fpo_info['door_no']?>" id="door_no" name="door_no" placeholder="Door No"disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Land Line Number – STD Code</label>
									<input type="text" class="form-control numberOnly" pattern="^[0][0-9]{2,8}$" title="Landline number starts with '0'" value="<?php echo $fpo_info['std_code']?>" id="std_code" maxlength="8" minlength="3" name="std_code" placeholder="Ex:012"disabled>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Land Line Number  </label>
									<input class="form-control numberOnly"  maxlength="8" id="land_line" value="<?php echo $fpo_info['land_line']?>" name="land_line"  placeholder="Land Line Number "disabled>				
								</div>
								
							</div>
							<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Mobile Number <span class="text-danger">*</span> </label>
									<input type="text" class="form-control numberOnly" pattern="^[6-9]\d{9}$" readonly value="<?php echo $fpo_info['mobile']?>" id="mobile" maxlength="10" name="mobile_num" placeholder="Mobile Number" required="required" data-validation-required-message="Please enter mobile number.">
									<div id="mbl_validate" class=" help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">E-Mail Address <span class="text-danger">*</span> </label>
									<input type="email" class="form-control"  id="email" name="email" value="<?php echo $fpo_info['email']?>" placeholder="E-Mail Address" required="required" data-validation-required-message="Please enter email address."disabled>
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
										<label class=" form-control-label">Constitution <span class="text-danger">*</span></label>
										<div class="row">
										<div class="col-md-6">
										<div class="form-check-inline form-check">
										<label for="constitution1" class="form-check-label">
										<input type="radio" id="constitution1" name="constitution" value="1" <?php echo $fpo_info['constitution'] == 1?" checked='checked'":''?>class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>
										Company
										</label>
										</div> 
										</div>
										<div class="col-md-6">
										<div class="form-check-inline form-check">
										<label for="constitution2" class="form-check-label">
										<input type="radio" id="constitution2" name="constitution" value="2" <?php echo $fpo_info['constitution'] == 2?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select constitution."disabled>
										Society
										</label>
										</div>
										</div>			
										</div>
										<div class="help-block with-errors text-danger"></div>
									</div>
									
								</div>
							</div>
						</div>	
							<div  id="step-2">
							    <div id="form-step-1" class="form-horizontal" role="form" data-toggle="validator">								
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-4">
										<label for="inputAddress2">Formation Date <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  name="date_formation"  onfocusout="calculateformdate(this.value);"  id="date_formation" value="<?php echo $fpo_info['date_formation']?>" placeholder="Date of Formation" required="required" data-validation-required-message="Please enter date of formation." title="If need date picker, click the arrow "disabled >
										<div class="help-block with-errors text-danger"></div>
									</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Registration Number(CIN)/Society <span class="text-danger">*</span></label>
											<input type="text" class="form-control text-uppercase" maxlength="21"  name="reg_no"  id="reg_no" value="<?php echo $fpo_info['reg_no']?>" placeholder="Registration Number(CIN)/Society" required="required" data-validation-required-message="Please enter registration number(CIN)/society." disabled>
											<div class="help-block with-errors text-danger"></div>
										</div>
										<div class="form-group col-md-4">
											<label for="inputAddress2">Permanent Account Number(PAN) <span class="text-danger">*</span></label>
											<input type="text" class="form-control text-uppercase"  maxlength="10" id="pan" name="pan" value="<?php echo $fpo_info['pan']?>" placeholder="Ex:AAAPL1234C" required="required" data-validation-required-message="Please enter pan."disabled>
											<div class="help-block with-errors text-danger"></div>
										</div>
									</div>
									<div class="form-group col-md-12 mt-1">
											<div class="form-group col-md-4">
												<label for="inputAddress2">Tax Deduction Account(TAN)</label>
												<input type="text" class="form-control text-uppercase" id="tax_deduction" maxlength="10" value="<?php echo $fpo_info['tax_deduction']?>" name="tax_deduction" placeholder="Ex:AAAA11111A" disabled>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">Goods & Service Tax Number(GST)</label>
												<input type="text" class="form-control text-uppercase"  name="gst" maxlength="15" id="gst" value="<?php echo $fpo_info['gst']?>" placeholder="Ex:33AAAAA0000A1Z1" disabled>
											</div>
											<div class="form-group col-md-4">
												<label for="inputAddress2">IE Code Number</label>
												<input type="text" class="form-control text-uppercase"  name="ie_code" maxlength="10" value="<?php echo $fpo_info['ie_code']?>" id="ie_code" placeholder="IE Code Number" disabled>
											</div>
										</div>
										
									</div>
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-6">
											<label class=" form-control-label">Type of Business <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-5">
											  <div class="form-check-inline form-check">
												<label for="business_type1" class="form-check-label">
												  <input type="checkbox" id="business_type1" name="business_type[]" value="1" class="form-check-input" disabled>Manufacturing
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="business_type2" class="form-check-label">
												  <input type="checkbox" id="business_type2" name="business_type[]" value="2" class="form-check-input" disabled>Trading
												</label>
												</div>
											</div>	
											<div class="col-md-3">
											  <div class="form-check-inline form-check">
												<label for="business_type3" class="form-check-label">
												  <input type="checkbox" id="business_type3" name="business_type[]" value="3" class="form-check-input"  disabled>Service
												</label>
												</div>
											</div>										
										  </div>
										  <div class="help-block with-errors text-danger" id="validatecheck"></div>
										  </div>
										<div class="form-group col-md-6">
											<label for="inputAddress">Nature of Business <span class="text-danger">*</span></label>
												<div class="row">												
													<select  id="business_nature"  name="business_nature[]" disabled multiple  class="form-control" required="required" data-validation-required-message="Please select.">
													
													</select>
												 </div>
											<div class="help-block with-errors text-danger"></div>		
										</div>
										
									</div>
									<div class="form-group col-md-12 mt-1">
										<div class="form-group col-md-4">
												<label for="inputAddress2">Name of the Contact Person <span class="text-danger">*</span></label>
												<input type="text" maxlength="50" class="form-control"  name="contact_person" value="<?php echo $fpo_info['contact_person']?>"  id="contact_person" placeholder="Name of the Contact Person" required="required" data-validation-required-message="Please enter contact person name."disabled>
												<div class="help-block with-errors text-danger"></div>
											</div>
									  <div class="form-group col-md-4">
									  <label class=" form-control-label">Inventory Required <span class="text-danger">*</span></label>
									  <div class="row">
										<div class="col-md-6">
										  <div class="form-check-inline form-check">
											<label for="inventory_required1" class="form-check-label">
											  <input type="radio" id="inventory_required1" name="inventory_required" value="1" <?php echo $fpo_info['inventory_required'] == 1?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select constitution." disabled>Yes
											</label>
										  </div> 
										</div>
										<div class="col-md-6">
										  <div class="form-check-inline form-check">
											<label for="inventory_required2" class="form-check-label">
											  <input type="radio" id="inventory_required2" name="inventory_required" value="2"<?php echo $fpo_info['inventory_required'] == 2?" checked='checked'":''?> class="form-check-input" required="required" data-validation-required-message="Please select constitution." disabled>No
											</label>
											</div>
										</div>					
									  </div>
									  <div class="help-block with-errors text-danger"></div>
									 </div>
									 <div class="form-group col-md-4">
									<label for="inputAddress2">Financial Year Begins <span class="text-danger">*</span></label>
									<input type="date" class="form-control"  name="financial_year" value="<?php echo $fpo_info['financial_year']?>" onfocusout="calculatedate(this.value);" id="financial_year" placeholder="Financial Year Begins From" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow" disabled>
									<div class="help-block with-errors text-danger"></div>
									</div>
									
								</div>
								<div class="form-group col-md-12 mt-1">
								<div class="form-group col-md-4">
									<label for="inputAddress2">Financial Year Closing <span class="text-danger">*</span></label>
									<input type="date" class="form-control" readonly name="financial_year_to" disabled value="<?php echo $fpo_info['financial_year_to']?>" onfocusout="calculatedate(this.value);" id="financial_year_to"  placeholder="Financial Year Begins To" required="required" data-validation-required-message="Please enter financial year" title="If need date picker, click the arrow" >
									<div class="help-block with-errors text-danger"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress2">Business Commence From <span class="text-danger">*</span></label>
									<input type="date" class="form-control"  name="business_commence"  onfocusout="calculateformdate(this.value);" disabled value="<?php echo $fpo_info['business_commence']?>" maxlength="10" id="business_commence" placeholder="Business Commence From" required="required" data-validation-required-message="Please enter business commence from" title="If need date picker, click the arrow " >
									<div class="help-block with-errors text-danger" id="validate_date"></div>
									</div>
								</div>
                     </div>													           
						</div>	
					  </div>
					 <div class="col-md-12 text-center">
						<div id="success"></div>
						<button id="edit" class="btn-fs btn btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
						<button id="sendMessageButton" class="btn-fs btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
						<!--<a href="#" id="" class="del btn btn-danger">Delete</a>	-->
						<a href="<?php echo base_url('administrator/fpo');?>" id="ok" class="btn-fs btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
						<a href="<?php echo base_url('administrator/fpo');?>" id="cancel" class="btn-fs btn btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
					</div>
				   </form>					
				  </div>
				</div>
			</div>
        </div>
	</div>
</div>

	

	<!-- .animated -->
    </div><!-- .content -->
    </div>   
<?php $nature_business= $business_nature;?> 	  	
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
<script type="text/javascript" src="<?php echo asset_url();?>dist/js/jquery.smartWizard.min.js"></script>
<script src="<?php echo asset_url()?>js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>js/select2.min.js"></script>	
<script>
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
 
$("#sendMessageButton").click(function() {
  var startDt=document.getElementById("date_formation").value;
  var endDt=document.getElementById("business_commence").value;
  if(startDt && endDt){
  if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
  {
    $("#validate_date").html("Selected date should be LATER than Formation date");
    return false;
  }
  }
  var count_checked = $("[name='business_type[]']:checked").length; // count the checked rows
	if(count_checked == 0) 
	{
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	}
});
function calculateformdate (date_formation) {
	
	document.getElementById("business_commence").value = date_formation;	
	
}

$(document).ready(function(){
	
//returning the values based on checkbox select and unselect
	$('#business_nature').select2();
	var businessinfo = [];
		Array.prototype.remove = function() {
		var what, a = arguments, L = a.length, ax;
		while (L && this.length) {
			what = a[--L];
			while ((ax = this.indexOf(what)) !== -1) {
				this.splice(ax, 1);
			}
		}
		return this;
	};
	$('input[type="checkbox"]').on('change',function(){
		var inputValue = $(this).attr("value");
		if($(this).is(':checked')){
			businessinfo.push(inputValue);
		}else{
			businessinfo.remove(inputValue);
		}
		if(businessinfo.length > 0) {				
			getbusinesstype(businessinfo);
		} else {
			$('#business_nature').html('');
		}
		
	});
	
	
	
	
//show multiselect values
	var business_select='<?php echo $fpo_info['business_type']; ?>';
	var business_select = business_select.split(",");
	getbusinesstype(business_select);
	
	//console.log(business_select);
	
		
	

});

// for checkbox beign checked
var business_type = '<?php echo $fpo_info['business_type'];?>';
var items=document.getElementsByName('business_type[]');
 for(var i=0; i<items.length; i++){
	 for(var j=0; j<business_type.length; j++){
		 if(items[i].type=='checkbox' && items[i].value==business_type[j])	{
				 items[i].checked=true;
			}
		}
	} 
	
	
//business type ajax call

function getbusinesstype( business_type ) {
	$('#business_nature').select2();
	var businessinfo = [];
	 //console.log(business_type);
         $.ajax({
			url:"<?php echo base_url();?>administrator/fpo/getbusiness_type",
			type:"POST",
			data: {business_type:business_type},
			dataType:"html",
            cache:false,			
			success:function(response) {
				//console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1) {
					var selected_nature = '<?php echo $fpo_info['business_nature']; ?>';
					var nature_array = selected_nature.split(',');
                    var business = '<option value="">Select Business Nature</option>';
                    $.each(responseArray.businessInfo,function(key, value){
						var selected_var = '';						
						$.each(nature_array,function(key1, value1){
							if(value1 == value.id)
								selected_var = " selected='selected'";
						});
						business += "<option value='"+value.id+"'"+selected_var+ ">"+value.name+"</option>";
					});
					$('#business_nature').html(business);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}  

function setbusinesstype() {
$('#business_nature').html(<?php echo $fpo_info['business_nature']; ?>);
}

 $(document).ready(function(){
	var btnFinish = $('<button></button>').text('Finish')
	.addClass('btn btn-info')
	.on('click', function(){
		if( !$(this).hasClass('disabled')){
			var elmForm = $("#fpo_addForm");
			if(elmForm){
				elmForm.validator('validate');
				var elmErr = elmForm.find('.has-error');
				if(elmErr && elmErr.length > 0){
					alert('Oops we still have error in the form');
					return false;
				}else{
					alert('Great! we are ready to submit form');
					elmForm.submit();
					return false;
				}
			}
		}
	});

	
	var btnCancel = $('<button></button>').text('Cancel').addClass('btn btn-danger')
	.on('click', function(){
		$('#smartwizard').smartWizard("reset");
		$('#fpo_addForm').find("input, textarea").val("");
	});
	// Smart Wizard
	$('#smartwizard').smartWizard({
		selected: 0,
		theme: 'circles',
		transitionEffect:'fade',
		toolbarSettings: {toolbarPosition: 'bottom'
						//  toolbarExtraButtons: [btnFinish, btnCancel]
						},
		anchorSettings: {
					markDoneStep: true, // add done css
					markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
					removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
					enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
				}
	});

	$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
		var elmForm = $("#form-step-" + stepNumber);
		// stepDirection === 'forward' :- this condition allows to do the form validation
		// only on forward navigation, that makes easy navigation on backwards still do the validation when going next
		if(stepDirection === 'forward' && elmForm){
			elmForm.validator('validate');
			var elmErr = elmForm.children().children('.has-error');
			if(elmErr && elmErr.length > 0){
				// Form validation failed
				return false;
			}
		}
		return true;
	});

	$("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
		// Enable finish button only on last step
		if(stepNumber == 3){
			$('.btn-finish').removeClass('disabled');
		}else{
			$('.btn-finish').addClass('disabled');
		}
	});
	$('#edit').click(function(){
	$('#editfpo_Form').toggleClass('view');
	$("#sendMessageButton").show();
	$("#cancel").show();
	$("#edit").hide();
	$("#ok").hide();	
	$('input').each(function(){
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

	$('a.del').click(function() {
		var fpo_id = '<?php echo $fpo_info['id']?>';
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
              url: "<?php echo base_url();?>administrator/fpo/deletefpo/"+fpo_id,
              type: "GET",
              data: "",
              cache: false,
              success: function(response) { 
                  console.log(response);
                  response=response.trim();responseArray=$.parseJSON(response);
                  if(responseArray.status == 1) {
                      setTimeout(function() {
                          window.location.replace("<?php echo base_url('administrator/fpo')?>");
                      }, 1000);
                  } else {
                     swal("Sorry!", responseArray.message);
                  }                
              },
              error: function() {
                  setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 500);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "You have cancelled the FPO delete action", "info");
            return false;
         }
      });
	});
	
});

 
        

/* function getPincode( pin_code ) {
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
                

					 var state = '';
					 var district = '';
					var block ='<option value="">Select Block</option>';
					 var taluk ='<option value="">Select Taluk</option>';
					// var village = '';
					// var panchayat = '';
                /* $.each(responseArray.getlocation['villageInfo'],function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>'
                });
                
                $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                    panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                }); 
                
                $.each(responseArray.getlocation['talukInfo'],function(key, value){
                    taluk += '<option value='+value.id+'>'+value.name+'</option>'
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
               // $('#panchayat').html(panchayat);
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
}  */
			function validateNumber(event) {
			 var key = window.event ? event.keyCode : event.which;
			 if (event.keyCode === 8 || event.keyCode === 46) {
				  return true;
			 } else if ( key < 48 || key > 57 ) {
				  return false;
			 } else {
				return true;
			 }
		};
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
			$('#pan').change(function (event) { 
				var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
				var txtpan = $(this).val(); 
				if (txtpan.length == 10 ) { 
				if( txtpan.match(regExp) ){ 
				//alert('PAN match found');
				}
				else {
				$("#pan").val('');
				alert('Not a valid PAN number');
				$("#pan").focus();
				event.preventDefault(); 
				} 
				} 
				else { 
				$("#pan").val('');
				alert('Please enter 10 digits for a valid PAN number');
				$("#pan").focus();
				event.preventDefault(); 
				}  
			});
			
			$('#tax_deduction').change(function (event) { 
				var regExp = /[a-zA-z]{4}\d{5}[a-zA-Z0-9]{1}/; 
				var txtpan = $(this).val(); 
				if (txtpan.length == 10 ) { 
				if( txtpan.match(regExp) ){ 
				//alert('TAN match found');
				}
				else {
				$("#tax_deduction").val('');
				alert('Not a valid TAN number');
				$("#tax_deduction").focus();
				event.preventDefault(); 
				} 
				} 
				else { 
				$("#tax_deduction").val('');
				alert('Please enter 10 digits for a valid TAN number');
				$("#tax_deduction").focus();
				event.preventDefault(); 
				}  
			});
			$('#gst').change(function (event) { 
				var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/;
				var txtgst = $(this).val(); 
				if (txtgst.length == 15 ) { 
				if( txtgst.match(regExp) ){ 
				//alert('GST match found');
				}
				else {
				$("#gst").val('');
				alert('Not a valid GST number');
				$("#gst").focus();
				event.preventDefault(); 
				} 
				} 
				else { 
				$("#gst").val('');
				alert('Please enter 15 digits for a valid GST number');
				$("#gst").focus();
				event.preventDefault(); 
				}  
			});
		//	 $('#popi_list').select2();
		
        //POPI list API CALL
		
		$.ajax({
						url: "<?php echo base_url();?>administrator/popi/popi_list",
						type: "GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						//console.log(response);
						response=response.trim();
						responseArray=$.parseJSON(response);
						//console.log(responseArray.popi_list);
						 if(responseArray.status == 1){
							var popilist = '<option value="">Select POPI</option>';
							$.each(responseArray.popi_list,function(key,value){
							 popilist += '<option value='+value.id+'>'+value.institution_name+'</option>';
							});
							$('#popi_list').html(popilist);
							} 
						},
						error:function(){
						
						$('#example').DataTable();
						} 
						});
		
				function verifyMobileNumber(mobilenumber) {
						 if(mobilenumber.length == 10 && (mobilenumber.charAt(0) == 6 || mobilenumber.charAt(0) == 7 || mobilenumber.charAt(0) == 8 || mobilenumber.charAt(0) == 9)) {
							 $.ajax({
							url:"<?php echo base_url();?>administrator/Login/checkusername/"+mobilenumber,
							type:"GET",
							data:"",
							dataType:"html",
									cache:false,      
							success:function(response) {                
							  response=response.trim();
							  responseArray=$.parseJSON(response);
										 //console.log(responseArray);mbl_validate
										 if(responseArray.status == 1){
											  $("#mbl_validate").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
							  } else {
								           $("#mobile").val('');
											  $("#mobile").focus();
											  $("#mbl_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>"); 
										 } 
									}
								});            
						 }
						 
					}
function calculatedate (financial_year_from) {
	var financial_year = new Date(financial_year_from);
	if(financial_year.getMonth() < 3){
		var yyyy = financial_year.getFullYear();		
	} else {
		var yyyy = financial_year.getFullYear()+1;
	}
	var financial_year_to = yyyy+'-03-31';	
   document.getElementById("financial_year_to").value = financial_year_to;	
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
      $('#date_formation').attr('max', maxDate);
		$('#business_commence').attr('max', maxDate);
		$('#financial_year').attr('max', maxDate);
		
  });
 
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
                //console.log(response);
			   response=response.trim();
			   responseArray=$.parseJSON(response);
               var village = '<option value="">Select Village </option>';
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
</script>
</body>
</html>