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
                        <h1>Add Farmer's Live Stocks</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('popi/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">Add farmer's live stocks</li>
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
                            <div class="" id="result"></div>
							 <form action="#" id="farmer_farmimplement" name="farmer_farmimplement" method="post"  enctype="multipart/form-data" >

     
                        <div id="step-3" >
						   <div id="form-step-2" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="col-md-6">
                                        <label for="inputAddress2">Name of the Farmer </label>
                                        <input type="hidden" id="farm_implement_farmer" name="farm_implement_farmer"> 
                                        <input type="text" class="form-control" maxlength="50" name="farmer_name"  id="farmer_name" placeholder="Name of the farmer" readonly>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div> 
                                    <div class="col-md-6">
                                        <label class="text-center">Farm Implements</label>
                                        <select id="farm_implements" name="farm_implements" class="form-control" readonly>
                                            <option value="">Select Farm Implements</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        </select>
									</div>
								</div>	
                               
								<div id="farm_implements_form" style="display:none;">
								
								<div class="form-group col-md-12 mt-3">
								    <hr style="border-bottom:1px solid black;">
									<div class="form-group col-md-6 mt-2">
										<label class="form-control-label">Name of The Implements <span class="text-danger">*</span></label>
										<select id="farm_implements_name" name="farm_implements_name" class="form-control" data-validation-required-message="Please selectname of the implements">
										<option value="">Select Name of The Implements</option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Make</label>
										<select id="farm_implements_make" name="farm_implements_make" class="form-control">
										<option value="">Select Make</option>
										</select>
									</div>										
								</div>
								<div class="form-group col-md-12 mt-2">
                                    <div class="form-group col-md-6">
										<label class=" form-control-label">Model</label>
										<select id="farm_implements_model" name="farm_implements_model" class="form-control">
										<option value="">Select Model</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Year</label>
	                                    <select id="farm_implements_year" name="farm_implements_year" class="form-control">
										<option value="">Select Year</option>
										<?php 
										   for($i = 1950 ; $i < date('Y'); $i++){
											  echo "<option>$i</option>";
										   }?>
										</select>	
									</div>
								</div>
                                    
                                <div class="form-group col-md-12 mt-2">
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Available for Hire </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="farm_implements_available_hire" name="farm_implements_available_hire" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_available_hire" name="farm_implements_available_hire" value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class=" form-control-label">Purchase through Loan </label>
                                              <div class="row">
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label">
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan"  value="2" class="form-check-input"><span class="ml-1">No</span>
                                                    </label>
                                                   </div>
                                                </div>			
                                              </div>
                                        </div>
                                        <div class="form-group col-md-4" id="purchase_loan" style="display:none">
										  <label class=" form-control-label">Institution <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="farm_implements_institution" name="farm_implements_institution" value="1" class="form-check-input"><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"  id="farm_implements_institution" name="farm_implements_institution" value="2" class="form-check-input"><span class="ml-1">Finance</span>
												</label>
											   </div>
											</div>			
										  </div>
                                        <div class="help-block with-errors text-danger"></div>
									   </div>
                                </div>
                                    
								<div class="form-group col-md-12 mt-2">
									<div class="form-group col-md-4">
										<label class=" form-control-label">Insurance Coverage </label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="1" class="form-check-input"><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="2" class="form-check-input"><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>																		
									<div class="form-group col-md-4" id="insurance_coverage_from" style="display:none">
										<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
										<input type="date" class="form-control" id="farm_implements_insurance_validity_from" name="farm_implements_insurance_validity_from" placeholder="Insurance Validity from" max="9999-12-31">
                                        <div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4" id="insurance_coverage_to" style="display:none">
										<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
										<input type="date" class="form-control" id="farm_implements_insurance_validity_to" name="farm_implements_insurance_validity_to" placeholder="Insurance Validity to" max="9999-12-31">
                                        <div class="help-block with-errors text-danger"></div>
									</div>
								</div>						
							</div>
							</div>
						</div>
                        
                                                                          
                                 <div class="form-group col-md-12 text-center">											         <button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
									<a href="<?php echo base_url('popi/farmer/farmimplementlist');?>" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
$(document).ready(function() {
    var farmer_id =<?php echo $_REQUEST['id']?>;
    $('#farm_implement_farmer').val(farmer_id);
    updateFarmerByFarmerID(farmer_id);
    document.getElementById("farm_implements").value=1;            
    $('#farm_implements_form').show();
    $("#farm_implements_name").prop('required',true);
	$("#farm_implements_insurance_validity_to").prop('readonly',true);
    loadFarmImplementsName();
});
    
$('select[name="farm_implements"]').on('change', function() {
    var farm_implements = $(this).val();
    if(farm_implements==1){
	    $('#farm_implements_form').show();
        $("#farm_implements_name").prop('required',true);
    }else{
	   $('#farm_implements_form').hide();
        $("#farm_implements_name").prop('required',false);
    }									
});

var farm_implements_insurance_coverage=$("input[name='farm_implements_insurance_coverage']");
var farm_implements_purchase_loan=$("input[name='farm_implements_purchase_loan']");
$('input').on('click', function() {
      //Insurance Coverage show and hide functionality
      if(farm_implements_insurance_coverage.is(':checked')) {
            $("input[id='farm_implements_insurance_coverage']:checked").each ( function() {
               chk_farmimplement_coverage= $(this).val() + ",";
               chk_farmimplement_coverage = chk_farmimplement_coverage.slice(0, -1);
            });

            if(chk_farmimplement_coverage==1){
               $('#insurance_coverage_from').show();
               $('#insurance_coverage_to').show();
                $("#farm_implements_insurance_validity_from").prop('required',true);
                $("#farm_implements_insurance_validity_to").prop('required',true);
            }else {					   
                $('#insurance_coverage_from').hide();
                $('#insurance_coverage_to').hide();
                $("#farm_implements_insurance_validity_from").prop('required',false);
                $("#farm_implements_insurance_validity_to").prop('required',false);
            }
        }
    
    
        //Purchase loan show and hide functionality
        if(farm_implements_purchase_loan.is(':checked')) {
            $("input[id='farm_implements_purchase_loan']:checked").each ( function() {
            chk_farmimplement_loan= $(this).val() + ",";
            chk_farmimplement_loan = chk_farmimplement_loan.slice(0, -1);
        });

            if(chk_farmimplement_loan==1){
                $('#purchase_loan').show();
                $("#farm_implements_institution").prop('required',true);                
            }else {					   
                $('#purchase_loan').hide();
                $("#farm_implements_institution").prop('required',false); 
            }
        }
 });        
    

function loadFarmImplementsName() {
    $.ajax({
        url:"<?php echo base_url();?>popi/farmer/getFarmImplements",
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
            //console.log(response);
            response=response.trim();                
            responseArray=$.parseJSON(response);
            //console.log(responseArray);
            if(responseArray.status == 1){
                var farm_implements_name = '<option value="">Select Farm Implements</option>';
				$.each(responseArray.farm_implement_namelist,function(key,value){
				   farm_implements_name += '<option value='+value.id+'>'+value.Name+'</option>';
			    });
				$('#farm_implements_name').html(farm_implements_name);
			}
        },
		error:function(response){
		  alert('Error!!! Try again');
		} 			
    }); 
}
    
    
$('select[id="farm_implements_name"]').on('change', function() {
    var name_value = $(this).val();
    loadFarmImplementsMakeAndModel(name_value);
});
    
    
function loadFarmImplementsMakeAndModel(name_value) {
    $.ajax({
        url:"<?php echo base_url();?>popi/farmer/getFarmImplementsMakeAndModel/"+name_value,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
      //console.log(response);
      response=response.trim();                
      responseArray=$.parseJSON(response);
      //console.log(responseArray);
      if(responseArray.status == 1){
         var farmImplement_makeandmodel1 = '<option value="">Select Make</option>';
         var farmImplement_makeandmodel2 = '<option value="">Select Model</option>';
				$.each(responseArray.farmImplement_makeandmodel,function(key,value){
				   farmImplement_makeandmodel1 += '<option value='+value.id+'>'+value.Make+'</option>';
                    farmImplement_makeandmodel2 += '<option value='+value.id+'>'+value.Model+'</option>';
			    });
				$('#farm_implements_make').html(farmImplement_makeandmodel1);
                $('#farm_implements_model').html(farmImplement_makeandmodel2);
			}
        },
		error:function(response){
		  alert('Error!!! Try again');
		} 			
    }); 
}    
        
    
$('form').submit(function(e){
        e.preventDefault();
        const farmerdata = $('#farmer_farmimplement').serializeObject();        
        //console.log(farmerdata);
    
        $.ajax({
			url:"<?php echo base_url();?>popi/farmer/postFarmImplement",
			type:"POST",
			data:farmerdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				//console.log(response);
				 if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('popi/farmer/farmimplementlist')?>";
				} 
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
        });
});
            
    $.fn.serializeObject = function() {
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
    
   
function updateFarmerByFarmerID(farmer_id) {
    $.ajax({
	   url:"<?php echo base_url();?>popi/farmer/existedFarmerName/"+farmer_id,
      type:"GET",
		data:"",
		dataType:"html",
      cache:false,			
		success:function(response) {
            //console.log(response);
            response=response.trim();responseArray=$.parseJSON(response);
            if(responseArray.status == 1){
                $('#farmer_name').val(responseArray.farmer_name[0]['profile_name']);                
			}
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });    
}      
 
    
$("#farm_implements_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#farm_implements_insurance_validity_to").attr("min", insurance_validity_from);
	$("#farm_implements_insurance_validity_to").prop('readonly',false);
});  
   
</script>