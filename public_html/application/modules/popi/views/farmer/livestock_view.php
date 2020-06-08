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
                        <h1>View Farmer's Live Stocks</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('popi/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">View farmer's live stocks</li>
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
							 <form action="#" id="farmer_livestock"  name="farmer_livestock" method="post"  enctype="multipart/form-data" >

                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" id="id">
     
                        <div id="step-4">
							 <div id="form-step-3" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="form-group col-md-5">
								        <label class=" form-control-label">Select Farmer <span class="text-danger">*</span></label>
										<select class="form-control" name="live_stocks_farmer" id="live_stocks_farmer" data-validation-required-message="Select farmer" required readonly="true">
                                            <option value="">Select Farmer</option>
								        </select>
										<div class="help-block with-errors text-danger"></div>
								    </div>                           							
									<div class="col-md-5">
                                        <label class=" form-control-label">Live Stocks</label>
                                        <select id="live_stocks" name="live_stocks" class="form-control" readonly>
                                            <option value="">Select Live Stocks</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
									</div>
                                    
                                    <div class="form-group col-md-2 mt-4" style="">
                                        <a href="#" id="addLiveStockHref">
                                            <button type="button" class="btn btn-success btn-labeled">
                                                 <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Live Stock</span>
                                            </button>
                                        </a>
                                    </div>
								</div>
				            </div>
                            
								<div id="live_stocks_form" style="display:none;">
										<div class="form-group col-md-12 mt-2">
										<hr style="border-bottom:1px solid black;">
										</div>
										<div class="form-group col-md-12 mt-3">
                                            <div class="form-group col-md-3">
												<label class=" form-control-label">Type of Live Stock <span class="text-danger">*</span> </label>
												<select class="form-control" name="live_stocks_type" id="live_stocks_type" data-validation-required-message="Select live stock type" disabled>
                                                    <option value="">Select Live Stock Type</option>
                                                    <option value="1">Cattle</option>
                                                    <option value="2">Animals</option>
                                                    <option value="3">Birds</option>
                                                    <option value="4">Other</option>
												</select>
												 <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Name of the Live Stock <span class="text-danger">*</span> </label>
												<select id="live_stocks_name" class="form-control" name="live_stocks_name" id="live_stocks_name" data-validation-required-message="Please select name of the live stock." disabled>
												<option value="">Select Name the Live Stock</option>
												</select>
												 <div class="help-block with-errors text-danger"></div>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Variety </label>
												<select id="live_stocks_variety" class="form-control" name="live_stocks_variety" placeholder="Variety" disabled>
												<option value="">Select Variety </option>
												</select>
											</div>
											<div class="form-group col-md-3">
												<label class=" form-control-label">Numbers </label>
												<input type="text" class="form-control numberOnly" maxlength="4" name="live_stocks_numbers" id="live_stocks_numbers" placeholder="Numbers" disabled>
											</div>
											</div>
									<div class="form-group col-md-12 mt-2">															
										<div class="form-group col-md-4">
											<label class="form-control-label">Purchase through Loan  </label>
											  <div class="row">
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio1" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan " name="live_stocks_purchase_loan" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_purchase_loan"  name="live_stocks_purchase_loan" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>											
										</div>
                                        <div class="form-group col-md-4" id="live_purchase_loan" style="display:none">
										  <label class=" form-control-label">Institution <span class="text-danger">*</span></label>
										  <div class="row">
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio1" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" disabled name="live_stocks_institution" value="1" class="form-check-input"><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="live_stocks_institution" disabled name="live_stocks_institution" value="2" class="form-check-input"><span class="ml-1">Finance</span>
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
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage"  value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
													</label>
												  </div> 
												</div>
												<div class="col-md-4">
												  <div class="form-check-inline form-check">
													<label for="inline-radio2" class="form-check-label">
													  <input type="radio" id="live_stocks_insurance_coverage"  name="live_stocks_insurance_coverage" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
													</label>
												   </div>
												</div>			
											 </div>
										</div>
										<div class="form-group col-md-4" id="live_insurance_coverage_from" style="display:none">
											<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="3000-12-31" id="live_stocks_insurance_validity_from" disabled name="live_stocks_insurance_validity_from" placeholder="Insurance Validity from" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
                                        <div class="form-group col-md-4" id="live_insurance_coverage_to" style="display:none">
											<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
											<input type="date" class="form-control" max="3000-12-31" name="live_stocks_insurance_validity_to" disabled id="live_stocks_insurance_validity_to" placeholder="Insurance Validity to" >
                                            <div class="help-block with-errors text-danger"></div>
										</div>
								    </div>
								 </div>
								 
				        </div>
                        
                                     
                                     
								<div class="form-group text-center col-md-12 mt-4">								       <div id="success"></div>
                                    <button id="edit" class="btn btn-fs btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
                                    <button id="sendMessageButton" name="profilesubmit" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
<!--									<a href="#" id="" class="del btn btn-danger">Delete</a>-->
									<a href="<?php echo base_url('popi/farmer/livestocklist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>	
									<a href="<?php echo base_url('popi/farmer/livestocklist');?>" id="cancel" class="btn btn-fs btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
$('#edit').click(function(){
		  $('#farmer_livestock').toggleClass('view');
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
});

//sweetalert with delete function
			$('a.del').click(function() {
                var livestock_id = <?php echo $_REQUEST['id']?>;
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
                      url: "<?php echo base_url();?>popi/farmer/deleteLiveStock/"+livestock_id,
                      type: "POST",
                      data: {
                         this_delete: livestock_id,
                      },
                      cache: false,
                      success: function() {        
                         setTimeout(function() {
                          window.location.replace("<?php echo base_url('popi/farmer/livestocklist')?>");
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

    
   $(document).ready(function(){
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
                    $("input[name='live_stocks_purchase_loan']:checked").each ( function() {
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
       
       
            var livestock_id =<?php echo $_REQUEST['id']?>;
            // jQuery method
			$.ajax({
			url:  "<?php echo base_url();?>popi/farmer/editlivestock/"+livestock_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
                console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
                    console.log(responseArray.livestock_list);
                    
                    /** Setting href link to add more land buttons **/
                    var href_value="<?php echo base_url('popi/farmer/addlivestock?id=');?>"+responseArray.livestock_list[0].farmer_id;
                    $("#addLiveStockHref").attr("href", href_value);


                    /** Update the farmer values for drop down **/
                    live_stocks_farmer += '<option value='+responseArray.livestock_list[0].farmer_id+'>'+responseArray.livestock_list[0].profile_name+'</option>';
                    $('#live_stocks_farmer').html(live_stocks_farmer);
                    
                    document.getElementById("live_stocks").value=responseArray.livestock_list[0].live_stocks;
                    if(responseArray.livestock_list[0].live_stocks == 1) {
                       $('#live_stocks_form').show();
                        getLiveStockType(responseArray.livestock_list[0].live_stock_type);
                        getLiveStockvariety(responseArray.livestock_list[0].name);                        
                    
                    
                    document.getElementById("live_stocks_type").value=responseArray.livestock_list[0].live_stock_type;       
                    
                    if(responseArray.livestock_list[0].live_stock_count != 0) {
                        document.getElementById("live_stocks_numbers").value=responseArray.livestock_list[0].live_stock_count;
                    }
                    
                    var live_stocks_name = responseArray.livestock_list[0].name;
                    var live_stocks_variety = responseArray.livestock_list[0].variety;
                    setTimeout(function(){                                                 
                        document.getElementById("live_stocks_name").value=live_stocks_name;
                        document.getElementById("live_stocks_variety").value=live_stocks_variety;
                    }, 300);
                    
                    //live stocks purchase by loan
                        var purchase_plan = $('input:radio[name=live_stocks_purchase_loan]');
                        if(responseArray.livestock_list[0].purchase_by_loan == 1){                
                            if(purchase_plan.is(':checked') === false) {
                                purchase_plan.filter('[value=1]').prop('checked', true);
                                $('#live_purchase_loan').show();
                                
                                var institution_plan = $('input:radio[name=live_stocks_institution]');
                                if(responseArray.livestock_list[0].institution==1){
                                      institution_plan.filter('[value=1]').prop('checked', true);
                                } else {
                                      institution_plan.filter('[value=2]').prop('checked', true);
                                }
                            }
                        }else if(responseArray.livestock_list[0].purchase_by_loan == 2){                
                            if(purchase_plan.is(':checked') === false) {
                                purchase_plan.filter('[value=2]').prop('checked', true);
                                $('#live_purchase_loan').hide();
                            }
                        }
                        
                        //live stocks insurance coverage
                        var insurance_coverage = $('input:radio[name=live_stocks_insurance_coverage]');               if(responseArray.livestock_list[0].insurance_coverage == 1){                
                            if(insurance_coverage.is(':checked') === false) {
                                insurance_coverage.filter('[value=1]').prop('checked', true);
                                $('#live_insurance_coverage_from').show();
                                $('#live_insurance_coverage_to').show();
                                document.getElementById("live_stocks_insurance_validity_from").value=responseArray.livestock_list[0].ins_validity_from;
                                $("#live_stocks_insurance_validity_to").attr("min", responseArray.livestock_list[0].ins_validity_from); document.getElementById("live_stocks_insurance_validity_to").value=responseArray.livestock_list[0].ins_validity_to;
                            }
                        }else if(responseArray.livestock_list[0].insurance_coverage == 2){                
                            if(insurance_coverage.is(':checked') === false) {
                                insurance_coverage.filter('[value=2]').prop('checked', true);
                                $('#live_insurance_coverage_from').hide();
                                $('#live_insurance_coverage_to').hide();
                            }
                        }
                    } else {
                       $('#live_stocks_form').hide();
                    }
                } 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
			});
       });
    
    
    
$('select[id="live_stocks_type"]').on('change', function() {
    var live_stocks_type = $(this).val();
    getLiveStockType(live_stocks_type);
}); 
    
$('select[id="live_stocks_name"]').on('change', function() {
    var live_stocks_name = $(this).val();
    getLiveStockvariety(live_stocks_name);
});
    
    
function getLiveStockType(value) {
        $.ajax({
			url:"<?php echo base_url();?>popi/farmer/getLiveStocks/"+value,
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
}
    
    
function getLiveStockvariety(live_stocks_name) {
        $.ajax({
			url:"<?php echo base_url();?>popi/farmer/getLiveStockVariety/"+live_stocks_name,
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
}    


    
$('form').submit(function(e){
        e.preventDefault();
        var livestock_id =<?php echo $_REQUEST['id']?>;
        const farmerdata = $('#farmer_livestock').serializeObject();        
        console.log(farmerdata);
    
        $.ajax({
            url:"<?php echo base_url();?>popi/farmer/updatelivestock/"+livestock_id,
            type:"POST",
            data:farmerdata,
            dataType:"html",
            cache:false,      
            success:function(response){      
              response=response.trim();
              responseArray=$.parseJSON(response);
              console.log(response);
               if(responseArray.status == 1){
                   swal("Good!", responseArray.message, "success");
                   setTimeout(function(){ 
                       window.location = "<?php echo base_url('popi/farmer/livestocklist')?>"; 
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
    

$("#live_stocks_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#live_stocks_insurance_validity_to").attr("min", insurance_validity_from);
});     
</script>