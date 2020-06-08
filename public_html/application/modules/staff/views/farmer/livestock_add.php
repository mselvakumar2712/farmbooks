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
                            <li><a href="<?php echo base_url('staff/farmer/profilelist');?>">Farmer Profile</a></li>
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
							 <form action="#" id="farmer_livestock"  name="farmer_livestock" method="post"  enctype="multipart/form-data" >

     
                        <div id="step-4">
							 <div id="form-step-3" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
                                    <div class="col-md-6">
                                        <label for="inputAddress2">Name of the Farmer </label>
                                        <input type="hidden" name="live_stocks_farmer" id="live_stocks_farmer">
                                        <input type="text" class="form-control" maxlength="50" name="farmer_name"  id="farmer_name" placeholder="Name of the farmer" readonly>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>  
									<div class="col-md-6">                                        
                                        <label class=" form-control-label">Live Stocks</label>
                                        <select id="live_stocks" name="live_stocks" class="form-control" readonly>
                                            <option value="">Select Live Stocks</option>
                                            <option value="1">Yes</option>
                                            <option value="2" selected>No</option>
                                        </select>
									</div>
								</div>
				                
                            
								<div id="live_stocks_form_0" style="display:none;">
									<div class="form-group col-md-12 mt-3">
											<div class="form-group col-md-3">
												<label class=" form-control-label">Type of Live Stock <span class="text-danger">*</span> </label>
												<select class="form-control" name="live_stocks_type" id="live_stocks_type" data-validation-required-message="Select live stock type">
                                                    <option value="">Select Live Stock Type</option>
                                                    <option value="1">Cattle</option>
                                                    <option value="2">Animals</option>
                                                    <option value="3">Birds</option>
                                                    <option value="4">Other</option>
												</select>
												 <div class="help-block with-errors text-danger"></div>
											</div>
                                            <div class="form-group col-md-3">
												<label class=" form-control-label">Name of the Live Stock <span class="text-danger">*</span></label>
												<select class="form-control" name="live_stocks_name" id="live_stocks_name" data-validation-required-message="Select name of the live stock">
												<option value="">Select Live Stock</option>
												</select>
												 <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Select Variety</label>
												<select id="live_stocks_variety" class="form-control" name="live_stocks_variety" placeholder="">
												<option value="">Select Variety</option>
												</select>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Numbers </label>
												<input type="text" class="form-control numberOnly" maxlength="7" name="live_stocks_numbers" id="live_stocks_numbers" placeholder="Numbers">												 
											</div>
								    </div>
                                    
                                    <div class="form-group col-md-12 mt-3">                                        
                                        <div class="form-group col-md-6">
											<label class="form-control-label">Purchase through Loan </label>
											  <div class="row">
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio1" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan" name="live_stocks_purchase_loan" value="1" class="form-check-input"><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan"  name="live_stocks_purchase_loan" value="2" class="form-check-input"><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>											
										</div>
                                        <div class="form-group col-md-6" id="live_purchase_loan" style="display:none">
										  <label class=" form-control-label">Institution <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" name="live_stocks_institution" value="1" class="form-check-input"><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" name="live_stocks_institution" value="2" class="form-check-input"><span class="ml-1">Finance</span>
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
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage" value="1" class="form-check-input"><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage" value="2" class="form-check-input"><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>
										</div>
										<div class="form-group col-md-4" id="live_insurance_coverage_from" style="display:none">
											<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="9999-12-31" id="live_stocks_insurance_validity_from" name="live_stocks_insurance_validity_from" placeholder="Insurance Validity from" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
                                        <div class="form-group col-md-4" id="live_insurance_coverage_to" style="display:none">
											<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="9999-12-31" name="live_stocks_insurance_validity_to" id="live_stocks_insurance_validity_to" placeholder="Insurance Validity to" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
								    </div>
								 </div>
                            </div>
				        </div>
                        
                                                                          
                                 <div class="form-group col-md-12 text-center">											         <button id="sendMessageButton" class="btn btn-fs btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
									<a href="<?php echo base_url('staff/farmer/livestocklist');?>" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
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
    $('#live_stocks_farmer').val(farmer_id);
    updateFarmerByFarmerID(farmer_id);
    document.getElementById("live_stocks").value=1;            
    $('#live_stocks_form_0').show();
    $("#live_stocks_type").prop('required',true);
    $("#live_stocks_name").prop('required',true);
});
    
$('select[name="live_stocks"]').on('change', function() {
    var live_stocks = $(this).val();
    if(live_stocks==1){
	   $('#live_stocks_form_0').show();
        $("#live_stocks_type").prop('required',true);
		$("#live_stocks_name").prop('required',true);
    }else{
	   $('#live_stocks_form_0').hide();
        $("#live_stocks_type").prop('required',false);
        $("#live_stocks_name").prop('required',false);
    }									
});

var live_stocks_insurance_coverage=$("input[name='live_stocks_insurance_coverage']");
var live_stocks_purchase_loan=$("input[name='live_stocks_purchase_loan']");
$('input').on('click', function() {
      //Insurance Coverage show and hide functionality
      if(live_stocks_insurance_coverage.is(':checked')) {
            $("input[id='live_stocks_insurance_coverage']:checked").each ( function() {
               chk_livestock_coverage= $(this).val() + ",";
               chk_livestock_coverage = chk_livestock_coverage.slice(0, -1);
            });

            if(chk_livestock_coverage==1){
               $('#live_insurance_coverage_from').show();
               $('#live_insurance_coverage_to').show();
                $("#live_stocks_insurance_validity_from").prop('required',true);
                $("#live_stocks_insurance_validity_to").prop('required',true);
            }else {					   
                $('#live_insurance_coverage_from').hide();
                $('#live_insurance_coverage_to').hide();
                $("#live_stocks_insurance_validity_from").prop('required',false);
                $("#live_stocks_insurance_validity_to").prop('required',false);
            }
        }
    
    
        //Purchase loan show and hide functionality
        if(live_stocks_purchase_loan.is(':checked')) {
            $("input[id='live_stocks_purchase_loan']:checked").each ( function() {
            chk_livestock_loan= $(this).val() + ",";
            chk_livestock_loan = chk_livestock_loan.slice(0, -1);
        });

            if(chk_livestock_loan==1){
                $('#live_purchase_loan').show();
                $("#live_stocks_institution").prop('required',true);
            }else {					   
                $('#live_purchase_loan').hide();
                $("#live_stocks_institution").prop('required',false);
            }
        }
 });        
    

$('select[id="live_stocks_type"]').on('change', function() {
    var live_stocks_type = $(this).val();
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getLiveStocks/"+live_stocks_type,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                    var livestock_name = '<option value="">Select Live Stock</option>';
					$.each(responseArray.livestock_name,function(key,value){
					   livestock_name += '<option value='+value.id+'>'+value.name+'</option>';
				    });
					$('#live_stocks_name').html(livestock_name);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 
}); 
    
    
$('select[id="live_stocks_name"]').on('change', function() {
    var live_stocks_name = $(this).val();
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getLiveStockVariety/"+live_stocks_name,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                console.log(responseArray);
                if(responseArray.status == 1){
                    var livestock_variety = '<option value="">Select Variety</option>';
					$.each(responseArray.livestock_variety,function(key,value){
					   livestock_variety += '<option value='+value.id+'>'+value.variety+'</option>';
				    });
                    $('#live_stocks_variety').html(livestock_variety);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    }); 
});    
  
    
$('form').submit(function(e){
    e.preventDefault();

        const farmerdata = $('#farmer_livestock').serializeObject();        
        console.log(farmerdata);
    
        $.ajax({
			url:"<?php echo base_url();?>staff/farmer/postLiveStock",
			type:"POST",
			data:farmerdata,
			dataType:"html",
            cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
                if(responseArray.status == 1) {
                     swal("Good!", responseArray.message, "success");
                     setTimeout(function(){ 
                       window.location = "<?php echo base_url('staff/farmer/livestocklist')?>";
                     }, 500);					
				} else {
                    swal("", responseArray.message, "warning");
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
	    url:"<?php echo base_url();?>staff/farmer/existedFarmerName/"+farmer_id,
        type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
            console.log(response);
            response=response.trim();responseArray=$.parseJSON(response);
            if(responseArray.status == 1){
                $('#farmer_name').val(responseArray.farmer_name[0]['profile_name']);                
			}
        },error:function(response){
            alert('Error!!! Try again');
        } 			
    });    
}  
 
    
$("#live_stocks_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#live_stocks_insurance_validity_to").attr("min", insurance_validity_from);
});     
</script>