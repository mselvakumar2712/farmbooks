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
                        <h1>View Crop Standards Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/cropstandard");?>">Crop Standard Master</a></li>
                            <li class="active">View Crop Standards Master </li>
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
						<form id="crop_standardForm"  name="crop_standardForm"  method="post" action="" novalidate="novalidate" >
							<div class="row row-space">
							<div class="form-group col-md-3">
								<label for="inputAddress2">Crop <span class="text-danger">*</span></label>
								<select id="crop" name="crop" class="form-control" required="required" data-validation-required-message="Please select crop name." disabled>
								<option value="">Choose Crop</option>
								<?php for($i=0; $i<count($name);$i++) { ?>										
								<option value="<?php echo $name[$i]->id; ?>"><?php echo $name[$i]->name; ?></option>
								<?php } ?>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-3">
								<label for="inputAddress2">Variety <span class="text-danger">*</span></label>
								<select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select crop variety." disabled >
								<option value="">Choose Crop</option>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
								  <label class=" form-control-label">Type Of Crop <span class="text-danger">*</span></label>
								  <div class="row-fluid">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="1" class="form-check-input" disabled>Intercrop
										  
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="2" class="form-check-input" disabled>Multi crop
										  
										</label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="3" class="form-check-input" disabled>Regular										  
										</label>
									   </div>
									</div>										
								  </div>
								  <p class="help-block text-danger" id="validatecheck"></p>
							  </div>							    
							 
							</div>
							<div class="row row-space">							
							<div class="form-group col-md-4">
								<label for="inputAddress2">Area <span class="text-danger">*</span></label>	
								<input type="text" class="form-control numberOnly" maxlength="3" id="area" name="area" placeholder="Area" required="required" data-validation-required-message="Please enter area." disabled>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Area UOM <span class="text-danger">*</span></label>
								<select id="area_uom" name="area_uom" class="form-control" required="required" data-validation-required-message="Please enter area uom." disabled>
								<option value="">Choose Crop</option>
								<?php for($i=0; $i<count($uom);$i++) { 
										if($uom[$i]->uom_type==1){?>										
								<option value="<?php echo $uom[$i]->id; ?>"><?php echo $uom[$i]->full_name; ?></option>
								<?php }
								} ?>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Standard Yield (Wet Land)</label>
								<input type="text" class="form-control numberOnly" minlength="1" maxlength="4"id="wet_land_yield" name="wet_land_yield" placeholder="Standard Yield(Wet Land)" required="required" data-validation-required-message="Please enter standard yield(Wet Land)." disabled>
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-4">
								<label for="inputAddress2">Standard Yield (Dry Land) <span class="text-danger">*</span></label>
								<input type="text" class="form-control numberOnly" minlength="1" maxlength="4" id="dry_land_yield" name="dry_land_yield" placeholder="Standard Yield(Dry Land)" required="required" data-validation-required-message="Please enter standard yield(Dry Land)." disabled>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Quantity UOM <span class="text-danger">*</span></label>
								<select id="quantity_uom" name="quantity_uom" class="form-control" required="required" data-validation-required-message="Please select quantity uom." disabled>
								<?php for($i=0; $i<count($uom);$i++) { 
										if($uom[$i]->uom_type==2){?>										
								<option value="<?php echo $uom[$i]->id; ?>"><?php echo $uom[$i]->full_name; ?></option>
								<?php }
								} ?>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">State <span class="text-danger">*</span></label>
								<select id="state" name="state" class="form-control" required="required" data-validation-required-message="Please select state." disabled>
								<option value="">Select State Name </option>
								<?php for($i=0; $i<count($state);$i++) { ?>										
								 <option value="<?php echo $state[$i]->state_code; ?>"><?php echo $state[$i]->name; ?></option>
								<?php } ?>													
								</select>
								<p class="help-block text-danger"></p>
							</div>							
							</div>
							
							<div class="row row-space">							
							<div class="form-group col-md-4">
								<label for="inputAddress2">District <span class="text-danger">*</span></label>
								<select id="district" name="district" class="form-control" required="required" data-validation-required-message="Please select district." disabled>
							    <option value="">Select District</option>
								</select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Season <span class="text-danger">*</span></label>
								<select id="season" name="season" class="form-control" required="required" data-validation-required-message="Please select season." disabled>
								<?php for($i=0; $i<count($season);$i++) { ?>										
								<option value="<?php echo $season[$i]->id; ?>"><?php echo $season[$i]->season; ?></option>
								<?php } ?>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							</div>
							<div class="row ">
							  <div class="col-md-12 text-center">
							   <div id="success"></div>
							    <input id="edit" value="Edit" class="btn btn-success text-center mt-10" type="button">								
								<input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-10" type="submit" style="display:none;">
								<a href="#" id="" class="del btn btn-danger mt-10">Delete</a>
							    <a href="<?php echo base_url('administrator/cropstandard');?>"><input id="ok" value="Back" class="btn btn-outline-dark text-center mt-10" type="button"></a>
								  <a href="<?php echo base_url('administrator/cropstandard');?>"><input id="cancel" value="Cancel" class="btn btn-outline-dark text-center mt-10" style="display:none;" type="button"></a>
			
						  	   </div>						  
							  </div>						  
							  </div>						  
							</div>
											 
						</form>
						
						</div>
                 
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
$("#sendMessageButton").click(function() {
	  var count_checked = $("[id='crop_type']:checked").length; // count the checked rows
	  if(count_checked == 0) 
	  {
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	  }else{
		  return true;
	  }
	  });
$(document).ready(function(){
			var crop_id =<?php echo $_REQUEST['id']?>;
			// jQuery method
			$.ajax({
			url: "<?php echo base_url();?>administrator/cropstandard/editcropstandardmaster/"+crop_id,
			type: "GET",
			dataType:"html",
			cache:false,			
			success:function(response){		  
			console.log(response);			
			response=response.trim();
			responseArray=$.parseJSON(response);
			 if(responseArray.status == 1){
			$.each(responseArray.cropstandard_list,function(key,value){
			 document.getElementById("crop").value=responseArray.cropstandard_list[0].crop_id;
			document.getElementById("variety").value=responseArray.cropstandard_list[0].variety_id;
			document.getElementById("area").value=responseArray.cropstandard_list[0].area;
			document.getElementById("area_uom").value=responseArray.cropstandard_list[0].uom_id;
			document.getElementById("wet_land_yield").value=responseArray.cropstandard_list[0].standard_yield_wet_land;
			document.getElementById("dry_land_yield").value=responseArray.cropstandard_list[0].standard_yield_dry_land;
			document.getElementById("quantity_uom").value=responseArray.cropstandard_list[0].quantity_uom;
			document.getElementById("state").value=responseArray.cropstandard_list[0].state_id;
			var state_id=responseArray.cropstandard_list[0].state_id;

				var cropname = responseArray.cropstandard_list[0].crop_id;
				var variety = responseArray.cropstandard_list[0].variety_id;				
				if(cropname) { 
				$("#variety option").remove() ;
				$.ajax({
					url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
					type: "POST",
					data:{crop_name:cropname},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);	
						  if(variety==value.id){
						  var div_data="<option value="+value.id+"selected>"+value.variety+"</option>";
						  }
						  var div_data="<option value="+value.id+"selected>"+value.variety+"</option>";
						  $(div_data).appendTo('#variety');	                            							
						});
					}
				});
				}						
			if(state_id) {
				 $("#district option").remove() ;	
				$.ajax({
					url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
					type: "POST",
					data:{state:state_id},
					success:function(response) {
						responsearr=$.parseJSON(response);
						console.log(response);
					   $.each(responsearr, function(key, value) {	
						console.log(value.id);						   
							var div_data="<option value="+value.id+">"+value.name+"</option>";
						  $(div_data).appendTo('#district');	                            							
						});
					}
				});
			}
			document.getElementById("district").value=responseArray.cropstandard_list[0].district_id;
			document.getElementById("season").value=responseArray.cropstandard_list[0].season_id;
                var crop_type = responseArray.cropstandard_list[0].crop_type.split(",");
                                    var croptype=document.getElementsByName('crop_type[]');
                                    for(var i=0; i<croptype.length; i++){
                                      for(var j=0; j<crop_type.length; j++){
                                        if(croptype[i].type=='checkbox' && croptype[i].value==crop_type[j])  {
                                          croptype[i].checked=true;
                                        }

                                      }
                                    }
				if(responseArray.cropstandard_list[0].crop_type == 1){
					 if(croptype.is(':checked') === false) {
							croptype.filter('[value=1]').prop('checked', true);						
					}
				}else if(responseArray.cropstandard_list[0].crop_type == 2){
					 if(croptype.is(':checked') === false) {
							croptype.filter('[value=1]').prop('checked', true);						
					}
				}else if(responseArray.cropstandard_list[0].crop_type == 3){
					 if(croptype.is(':checked') === false) {
							croptype.filter('[value=1]').prop('checked', true);						
					}
				}
			 });
			 }			 
			},
			error:function(){
			alert('Error!!! Try again');
			} 
	});
	$('#edit').click(function(){
	  $('#sentMessage').toggleClass('view');
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
	
	$('select[name="state"]').on('change', function(e) {
		e.preventDefault();
		 var state_name = document.getElementById("state").value;
		  console.log(state_name);
		var state = $(this).val();
	   $("#district option").remove() ;				
		if(state) { 
			$.ajax({
				url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
				type: "POST",
				data:{state:state},
				success:function(response) {
					responsearr=$.parseJSON(response);
					console.log(response);
				   $.each(responsearr, function(key, value) {	
					console.log(value.id);						   
						var div_data="<option value="+value.id+">"+value.name+"</option>";
					  $(div_data).appendTo('#district');	                            							
					});
				}
			});
		}						
	});

	$('select[name="crop"]').on('change', function(e) {
		e.preventDefault();
		var cropname = $(this).val();
		$("#variety option").remove() ;				
		if(cropname) { 
		$.ajax({
			url: '<?php echo base_url('administrator/cropmaster/getvarietyid')?>',
			type: "POST",
			data:{crop_name:cropname},
			success:function(response) {
				responsearr=$.parseJSON(response);
				console.log(response);
			   $.each(responsearr, function(key, value) {	
				console.log(value.id);						   
				  var div_data="<option value="+value.id+">"+value.variety+"</option>";
				  $(div_data).appendTo('#variety');	                            							
				});
			}
		});
		}						
	});	
	
	/*delete */
		
			$('a.del').click(function() {
		var crop_id = <?php echo $_REQUEST['id']?>;
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
              url: "<?php echo base_url();?>administrator/cropstandard/deletecropstandardmaster/"+crop_id,
              type: "POST",
              data: {
                 this_delete: crop_id,
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("<?php echo base_url('administrator/cropstandard')?>");
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
            swal("Cancelled", "You have cancelled the crop standard master delete action", "info");
            return false;
         }
      });
	});
	
	
	
	
	
	
	
	/* $('a.del').click(function() {
			var crop_id = <?php echo $_REQUEST['id']?>;;
			swal({
			 title: '',
			 text: 'Do you want to delete this crop standard master?',
			 icon: "",
			 buttons: [
			   'Cancel',
			   'Delete'
			 ],
			 dangerMode: false,
			}).then(function(isConfirm) {
			  if (isConfirm) {
			  $(this).prop("disabled", true);
			  $.ajax({
				url: "<?php echo base_url();?>administrator/cropstandard/deletecropstandardmaster/"+crop_id,
				type: "POST",
				data: {
				   this_delete: crop_id,
				},
				cache: false,
				success: function() {        
				   setTimeout(function() {
					window.location.replace("<?php echo base_url('administrator/cropstandard')?>");
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
			  } else {
			   swal("Cancelled", "You have cancelled the crop standard master information deleted", "error");
			  }
			}); */
		  });
		  $('form').submit(function(e){
				e.preventDefault();
				const cropnamedata = $('#crop_standardForm').serializeObject();
				var cropstandard_id =<?php echo $_REQUEST['id']?>;
				var url="<?php echo base_url();?>administrator/cropstandard/updatecropstandardmaster/"+cropstandard_id;
				console.log(cropnamedata);
					 $.ajax({
						url:url,
						type:"POST",
						data:cropnamedata,
						dataType:"html",
						cache:false,			
						success:function(response){		  
							response=response.trim();
							responseArray=$.parseJSON(response);
							console.log(response);
							 if(responseArray.status == 1){
								$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
								window.location = "<?php echo base_url('administrator/Cropstandard')?>";
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
</script>
</body>
</html>
