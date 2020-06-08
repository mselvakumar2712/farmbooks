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
                        <h1>View Farmer's Farm Implements</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('staff/farmer/profilelist');?>">Farmer Profile</a></li>
				            <li class="active">View farmer's farm implements</li>
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
							 <form action="#" id="farmer_farm_implement" name="farmer_farm_implement" method="post"  enctype="multipart/form-data" >

                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']?>" id="id">
     
                        <div id="step-3" >
						   <div id="form-step-2" role="form" data-toggle="validator">
								<div class="form-group row col-md-12 mt-4">
								    <div class="form-group col-md-5">
                                        <label class=" form-control-label">Select Farmer<span class="text-danger">*</span> </label>
                                        <select class="form-control" name="farm_implement_farmer" id="farm_implement_farmer" data-validation-required-message="Select farmer" required readonly="true">
                                            <option value="">Select Farmer</option>
                                        </select>
                                        <div class="help-block with-errors text-danger"></div>
                                    </div>                                      							
									<div class="col-md-5">
                                        <label class="text-center">Farm Implements</label>		
                                        <select id="farm_implements" name="farm_implements" class="form-control" disabled readonly>
                                            <option value="">Select Farm Implements</option>
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
									</div>
                                    
                                    <div class="form-group col-md-2 mt-4" style="">
                                        <a href="#" id="addFarmHref">
                                            <button type="button" class="btn btn-success btn-labeled">
                                                 <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Farm Implement</span>
                                            </button>
                                        </a>
                                    </div>
								</div>
								
								<div id="farm_implements_form" style="display:none;">
								
								<div class="form-group col-md-12 mt-3">
								    <hr style="border-bottom:1px solid black;">
									<div class="form-group col-md-6 mt-2">
										<label class="form-control-label">Name of The Implements <span class="text-danger">*</span></label>
										<select id="farm_implements_name" name="farm_implements_name" class="form-control" data-validation-required-message="Please selectname of the implements" disabled>
										<option value="">Select Name of The Implements</option>
										</select>
										 <div class="help-block with-errors text-danger"></div>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Make</label>
										<select id="farm_implements_make" name="farm_implements_make" class="form-control" disabled>
										<option value="">Select Make</option>
										</select>
									</div>										
								</div>
								<div class="form-group col-md-12 mt-2">
                                    <div class="form-group col-md-6">
										<label class=" form-control-label">Model</label>
										<select id="farm_implements_model" name="farm_implements_model" class="form-control" disabled>
										<option value="">Select Model</option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label class=" form-control-label">Year</label>
	                                    <select id="farm_implements_year" name="farm_implements_year" class="form-control" disabled>
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
                                                      <input type="radio" id="farm_implements_available_hire" name="farm_implements_available_hire" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_available_hire" name="farm_implements_available_hire" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
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
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
                                                    </label>
                                                  </div> 
                                                </div>
                                                <div class="col-md-4">
                                                  <div class="form-check-inline form-check">
                                                    <label for="inline-radio2" class="form-check-label">
                                                      <input type="radio" id="farm_implements_purchase_loan" name="farm_implements_purchase_loan" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
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
												  <input type="radio" id="farm_implements_institution" name="farm_implements_institution" value="1" class="form-check-input" disabled><span class="ml-1">Bank</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-6">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio"  id="farm_implements_institution" name="farm_implements_institution" value="2" class="form-check-input" disabled><span class="ml-1">Finance</span>
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
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="1" class="form-check-input" disabled><span class="ml-1">Yes</span>
												</label>
											  </div> 
											</div>
											<div class="col-md-4">
											  <div class="form-check-inline form-check">
												<label for="inline-radio2" class="form-check-label">
												  <input type="radio" id="farm_implements_insurance_coverage" name="farm_implements_insurance_coverage" value="2" class="form-check-input" disabled><span class="ml-1">No</span>
												</label>
											   </div>
											</div>			
										  </div>
									</div>																		
									<div class="form-group col-md-4" id="insurance_coverage_from" style="display:none">
										<label class=" form-control-label">Insurance Validity From <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  id="farm_implements_insurance_validity_from" name="farm_implements_insurance_validity_from" placeholder="Insurance Validity from" max="9999-12-31" disabled>
                                        <div class="help-block with-errors text-danger"></div>
									</div>
                                    <div class="form-group col-md-4" id="insurance_coverage_to" style="display:none">
										<label class=" form-control-label">Insurance Validity To <span class="text-danger">*</span></label>
										<input type="date" class="form-control"  id="farm_implements_insurance_validity_to" name="farm_implements_insurance_validity_to" placeholder="Insurance Validity to" max="9999-12-31" disabled>
                                        <div class="help-block with-errors text-danger"></div>
									</div>
								</div>						
							</div>
							</div>
						</div>
                                     
                                     
								<div class="form-group text-center col-md-12  mt-4 ">								             <div id="success"></div>
                                    <button id="edit" class="btn btn-fs btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
                                    <button id="sendMessageButton" name="profilesubmit" class="btn btn-fs btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
<!--									<a href="#" id="" class="del btn btn-danger">Delete</a>-->
									<a href="<?php echo base_url('staff/farmer/farmimplementlist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>	
									<a href="<?php echo base_url('staff/farmer/farmimplementlist');?>" id="cancel" class="btn btn-fs btn-outline-dark" style="display:none;"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>								
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
		  $('#farmer_farm_implement').toggleClass('view');
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
                var farmimplement_id = <?php echo $_REQUEST['id']?>;
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
                      url: "<?php echo base_url();?>staff/farmer/deleteFarmImplement/"+farmimplement_id,
                      type: "POST",
                      data: {
                         this_delete: farmimplement_id,
                      },
                      cache: false,
                      success: function() {        
                         setTimeout(function() {
                          window.location.replace("<?php echo base_url('staff/farmer/farmimplementlist')?>");
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
		$("#farm_implements_insurance_validity_to").prop('readonly',true);
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
                    $("input[name='farm_implements_purchase_loan']:checked").each ( function() {
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
       
       
            var farmimplement_id =<?php echo $_REQUEST['id']?>;
            // jQuery method
			$.ajax({
			url:"<?php echo base_url();?>staff/farmer/editfarmimplement/"+farmimplement_id,
			type:"GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
                console.log(response);
                response=response.trim();
                responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
                    console.log(responseArray.farmimplement_list);                                        

                    /** Update the farmer values for drop down **/
                    farm_implement_farmer += '<option value='+responseArray.farmimplement_list[0].farmer_id+'>'+responseArray.farmimplement_list[0].profile_name+'</option>';
                    $('#farm_implement_farmer').html(farm_implement_farmer);
                    
                    if(responseArray.farmimplement_list[0].farm_implements == 1) {
                        /** Setting href link to add more land buttons **/
                        var href_value="<?php echo base_url('staff/farmer/add_farmimplement?id=');?>"+responseArray.farmimplement_list[0].farmer_id;
                        $("#addFarmHref").attr("href", href_value);
                       
                        document.getElementById("farm_implements").value=responseArray.farmimplement_list[0].farm_implements;
                        $('#farm_implements_form').show();
                        loadFarmImplementsName();
                        loadFarmImplementsMakeAndModel(responseArray.farmimplement_list[0].name);
                    
                    
                    var farm_implements_name = responseArray.farmimplement_list[0].name;
                    var farm_implements_make = responseArray.farmimplement_list[0].make;
                    var farm_implements_model = responseArray.farmimplement_list[0].model;
                    document.getElementById("farm_implements_year").value=responseArray.farmimplement_list[0].year;;
                    setTimeout(function(){                                                 
                        document.getElementById("farm_implements_name").value=farm_implements_name;
                        document.getElementById("farm_implements_make").value=farm_implements_make;
                        document.getElementById("farm_implements_model").value=farm_implements_model;
                    }, 300);
                    
                    //Farm implements available for hire
                        var available_for_hire = $('input:radio[name=farm_implements_available_hire]');
                        if(responseArray.farmimplement_list[0].available_for_hire == 1){                
                            if(available_for_hire.is(':checked') === false) {
                                available_for_hire.filter('[value=1]').prop('checked', true);
                            }
                        }else if(responseArray.farmimplement_list[0].available_for_hire == 2){                
                            if(available_for_hire.is(':checked') === false) {
                                available_for_hire.filter('[value=2]').prop('checked', true);
                            }
                        }
                    
                        
                        //Farm implements purchase by loan
                        var purchase_plan = $('input:radio[name=farm_implements_purchase_loan]');
                        if(responseArray.farmimplement_list[0].purchase_by_loan == 1){                
                            if(purchase_plan.is(':checked') === false) {
                                purchase_plan.filter('[value=1]').prop('checked', true);
                                $('#purchase_loan').show();
                                
                                var institution_plan = $('input:radio[name=farm_implements_institution]');
                                if(responseArray.farmimplement_list[0].institution==1){
                                      institution_plan.filter('[value=1]').prop('checked', true);
                                } else {
                                      institution_plan.filter('[value=2]').prop('checked', true);
                                }
                            }
                        }else if(responseArray.farmimplement_list[0].purchase_by_loan == 2){                
                            if(purchase_plan.is(':checked') === false) {
                                purchase_plan.filter('[value=2]').prop('checked', true);
                                $('#purchase_loan').hide();
                            }
                        }
                    
                    
                        //Farm implements insurance coverage
                        var insurance_coverage = $('input:radio[name=farm_implements_insurance_coverage]');               if(responseArray.farmimplement_list[0].insurance_coverage == 1){                
                            if(insurance_coverage.is(':checked') === false) {
                                insurance_coverage.filter('[value=1]').prop('checked', true);
                                $('#insurance_coverage_from').show();
                                $('#insurance_coverage_to').show();
                                document.getElementById("farm_implements_insurance_validity_from").value=responseArray.farmimplement_list[0].ins_validity_from;
                                $("#farm_implements_insurance_validity_to").attr("min", responseArray.farmimplement_list[0].ins_validity_from); document.getElementById("farm_implements_insurance_validity_to").value=responseArray.farmimplement_list[0].ins_validity_to;
                            }
                        }else if(responseArray.farmimplement_list[0].insurance_coverage == 2){                
                            if(insurance_coverage.is(':checked') === false) {
                                insurance_coverage.filter('[value=2]').prop('checked', true);
                                $('#insurance_coverage_from').hide();
                                $('#insurance_coverage_to').hide();
                            }
                        }
                    } else {
                       $('#farm_implements_form').hide();
                        swal("Sorry!", "You are not enabled the farm implements. If you want to add farm implement, update the farmer and try again");
                    }  
                } 
			},
			error:function(){
			 alert('Error!!! Try again');
			} 
			});
       });
    
    
    
function loadFarmImplementsName() {
    $.ajax({
        url:"<?php echo base_url();?>staff/farmer/getFarmImplements",
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
        url:"<?php echo base_url();?>staff/farmer/getFarmImplementsMakeAndModel/"+name_value,
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
        var farm_implement_id = <?php echo $_REQUEST['id']?>;
        const farmerdata = $('#farmer_farm_implement').serializeObject();        
        console.log(farmerdata);
    
        $.ajax({
            url:"<?php echo base_url();?>staff/farmer/updatefarmimplement/"+farm_implement_id,
            type:"POST",
            data:farmerdata,
            dataType:"html",
            cache:false,      
            success:function(response){      
              response=response.trim();
              responseArray=$.parseJSON(response);
              console.log(response);
               if(responseArray.status == 1){
                $("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
                window.location = "<?php echo base_url('staff/farmer/farmimplementlist')?>";
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
    

$("#farm_implements_insurance_validity_from").focusout(function() {
    var insurance_validity_from = $(this).val();
    $("#farm_implements_insurance_validity_to").attr("min", insurance_validity_from);
	$("#farm_implements_insurance_validity_to").prop('readonly',false);
});
    
</script>