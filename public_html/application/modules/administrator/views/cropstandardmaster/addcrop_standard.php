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
                        <h1>Add Crop Standards Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                            <li><a href="<?php echo base_url("administrator/cropstandard");?>">Crop Standard Master</a></li>
                            <li class="active">Add Crop Standards Master </li>
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
						<form  id="crop_standardForm" name="sentMessage" method="post" action="" novalidate="novalidate" >
							<div class="row row-space">
							<div class="form-group col-md-3">
								<label for="inputAddress2">Crop <span class="text-danger">*</span></label>
								<select id="crop" name="crop" class="form-control" required="required" data-validation-required-message="Please select crop name." >
								<option value="">Crop</option>
								<?php for($i=0; $i<count($name);$i++) { ?>										
								<option value="<?php echo $name[$i]->id; ?>"><?php echo $name[$i]->name; ?></option>
								<?php } ?>								
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-3">
								<label for="inputAddress2">Variety <span class="text-danger">*</span></label>
								<select id="variety" name="variety" class="form-control" required="required" data-validation-required-message="Please select crop variety." >
								<option value="">Variety</option>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-6">
								  <label class=" form-control-label">Type Of Crop <span class="text-danger">*</span></label>
								  <div class="row-fluid">
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio1" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="1" class="form-check-input">Intercrop
										  
										</label>
									  </div> 
									</div>
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="2" class="form-check-input">Multi crop
										  
										</label>
									   </div>
									</div>	
									<div class="col-md-4">
									  <div class="form-check-inline form-check">
										<label for="inline-radio2" class="form-check-label">
										  <input type="checkbox" id="crop_type" name="crop_type[]" value="3" class="form-check-input">Regular
										  
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
								<input type="text" class="form-control numberOnly" maxlength="3" id="area" name="area" placeholder="Area" required="required" data-validation-required-message="Please enter area.">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Area UOM <span class="text-danger">*</span></label>
								<select id="area_uom" name="area_uom" class="form-control" required="required" data-validation-required-message="Please enter area uom." >
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
								<input type="text" class="form-control numberOnly" minlength="1" maxlength="4" id="wet_land_yield" name="wet_land_yield" placeholder="Standard Yield(Wet Land)" required="required" data-validation-required-message="Please enter standard yield(Wet Land).">
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-4">
								<label for="inputAddress2">Standard Yield (Dry Land) <span class="text-danger">*</span></label>
								<input type="text" class="form-control numberOnly" minlength="1" maxlength="4" id="dry_land_yield" name="dry_land_yield" placeholder="Standard Yield(Dry Land)" required="required" data-validation-required-message="Please enter standard yield(Dry Land).">
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Quantity UOM <span class="text-danger">*</span></label>
								<select  class="form-control" required="required" id="quantity_uom" name="quantity_uom" data-validation-required-message="Please select quantity uom." >
								<option value="">Choose Quantity</option>
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
								<select id="state" name="state" class="form-control" required="required"   data-validation-required-message="Please select state.">
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
								<select id="district" name="district" class="form-control" required="required"  data-search="true" data-validation-required-message="Please select district.">
								<option value="">Select District</option>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							<div class="form-group col-md-4">
								<label for="inputAddress2">Season <span class="text-danger">*</span></label>
								<select id="season" name="season" class="form-control" required="required" data-validation-required-message="Please select season.">
								<option value="">Choose Season</option>
								<?php for($i=0; $i<count($season);$i++) { ?>										
								<option value="<?php echo $season[$i]->id; ?>"><?php echo $season[$i]->season; ?></option>
								<?php } ?>
							    </select>
								<p class="help-block text-danger"></p>
							</div>
							</div>
							<div class="row row-space">
							<div class="form-group col-md-12 text-center">
							<input id="sendMessageButton" value="Save" class="btn btn-success " type="submit">
							<a href="<?php echo base_url('administrator/cropstandard');?>"><input id="back" value="Cancel" class="btn btn-outline-dark text-center " type="button"></a>
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
<script type="text/javascript">
	
$(document).ready(function(){
	$("#sendMessageButton").click(function() {
	  var count_checked = $("[name='crop_type[]']:checked").length; // count the checked rows
	  if(count_checked == 0) 
	  {
		$("#validatecheck").html("Please check any one of the checkbox");
		return false;
	  }

	});
	
    $('#state').change(function(){
		
		  var state = $("#state").val();
		  //alert(crop_category);
		  getState(state);
	 });
	 
	function  getState(state){
		
		$("#district option").remove() ;
		 
		if(state !='') { 
			$.ajax({
				url: '<?php echo base_url('administrator/masterdata/getdistrict')?>',
				type: "POST",
				data:{state:state},
				success:function(response) {
					responsearr=$.parseJSON(response);
					console.log(response);
					var div_data = '<option value="">Select District</option>';
				   $.each(responsearr, function(key, value) {	
					console.log(value.id);						   
						div_data +="<option value="+value.id+">"+value.name+"</option>";
					                              							
					});
					 $(div_data).appendTo('#district');	
				}
			});
		}else{
			
		alert('Please provide mandatory field');
		
		}
		
	}
	
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
				var div_data = '<option value="">Select Crop Variety</option>';
			    $.each(responsearr, function(key, value) {	
				  
				  div_data +="<option value="+value.id+">"+value.variety+"</option>";
				                            							
				});
				$(div_data).appendTo('#variety');	  
			}
		});
		}						
	});		
	$('form').submit(function(e){
		e.preventDefault(); 
		const cropData = $('#crop_standardForm').serializeObject();
		console.log(cropData);	
		
		 $.ajax({
			url:"<?php echo base_url();?>administrator/cropstandard/postcropstandardmaster",
			type:"POST",
			data:cropData,
			dataType:"html",
			cache:false,			
			success:function(response){		  
				response=response.trim();
				responseArray=$.parseJSON(response);
				console.log(response);
				
				if(responseArray.status == 1){
					$("#result").html("<div class='alert alert-success'>"+responseArray.message+"</div>");
					window.location = "<?php echo base_url('administrator/cropstandard')?>";
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
			
    });
    </script>
</body>
</html>