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
                        <h1>Generation of Baseline Information </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('fpo/operation/baselinelist');?>">Baseline Information</a></li>
                            <li><a class="active" href="#">Add Generation of Baseline Information</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/postAddBaselineInformation')?>" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									
									<?php if($this->session->flashdata('success')){ ?>
											<div class="alert alert-success alert-dismissible">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong><?php echo $this->session->flashdata('success');?></strong> 
											</div>
									<?php }elseif($this->session->flashdata('danger')){?>
											<div class="alert alert-danger alert-dismissible">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong><?php echo $this->session->flashdata('danger');?></strong> 
											</div>
									<?php }elseif($this->session->flashdata('info')){?>
											<div class="alert alert-info alert-dismissible">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong><?php echo $this->session->flashdata('info');?></strong> 
											</div>
									<?php }elseif($this->session->flashdata('warning')){?>
											<div class="alert alert-warning alert-dismissible">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong><?php echo $this->session->flashdata('warning');?></strong> 
											</div>
									<?php }?>
									
										<div class="container-fluid">
												<div class="row row-space"> 
													  <div class="form-group col-md-4">
														    <label for="">Date of Baseline Survey <span class="text-danger">*</span></label>
															<input type="date" class="form-control" id="baseline_date" name="baseline_date" required="required" value="<?php echo date("Y-m-d"); ?>" data-validation-required-message="Please enter date.">
														<p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Name of the Cluster <span class="text-danger">*</span></label>
														<select id="cluster_name" class="form-control" name="cluster_name" required data-validation-required-message="Please select the cluster name">
														<option value="">Select Cluster Name</option>
														<?php foreach($cluster_names as $cluster_name){ ?>
														   <option value="<?php echo $cluster_name->id; ?>"><?php echo $cluster_name->cluster_name; ?></option>
														<?php } ?>
														</select>
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">No. of Villages Covered <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="village_covered" name="village_covered" placeholder="No. of Villages Covered" required="required" data-validation-required-message="Please enter no. of villages covered.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
												</div>
												<div class="row row-space">
													  <div class="form-group col-md-2">
														<label for="">No. of Farmers <span class="text-danger">*</span></label>
														<input type="text" class="form-control" readonly id="farmer_covered" name="farmer_covered" placeholder="No. of Farmers" required="required" data-validation-required-message="Provide farmers count">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Crop Grown <span class="text-danger">*</span></label>
														<select id="crop_grown" class="form-control" name="crop_grown[]" required="required" data-validation-required-message="Please select village." multiple>
														<?php foreach($crop_grown as $crop_grown){ ?>
														   <option value="<?php echo $crop_grown->id; ?>"><?php echo $crop_grown->crop_name; ?></option>
														<?php } ?>
														</select>
													  </div>
													  <div class="form-group col-md-6">
														<div class="table-responsive">  
															<table class="table table-bordered" id="dynamic_field">
																<thead>
																<tr>
																  <th class="text-center" colspan="2">Land Holding</th>
																</tr>
																<tr>
																  <th class="text-center">Wet land</th>
																  <th class="text-center">Dry land</th>
																</tr>
															  </thead>
															  <tbody>
																 <tr> 
																  <td>
																	<input type="text" class="form-control" readonly id="wet_land" name="wet_land"  placeholder="No. of Wet Land">
																  </td> 
																  <td>
																	<input type="text" class="form-control" readonly id="dry_land" name="dry_land"  placeholder="No. of Dry Land">
																  </td>
																  </tr>
															  </tbody>
															</table>
													  	</div>
													</div>
													
												</div>
												<div class="row row-space"> 													  
													   <div class="form-group col-md-4">
														  <label for="">Availability of Water <span class="text-danger">*</span></label>
														  <select class="form-control" id="water_availability" name="water_availability" required="required" data-validation-required-message="Select water availability">
															  <option value="">Select Availability of water</option>
															  <option value="1">Satisfactory</option>
															  <option value="2">Poor</option>
															  <option value="3">Very Poor</option>
														  </select>
														 <p class="help-block text-danger"></p>
													  </div>
													  <div class="form-group col-md-4">
														<label for="">Availability of Market <span class="text-danger">*</span></label>
														<input type="text" class="form-control" maxlength="100" id="market_availability" name="market_availability"  placeholder="Availability of Market" required="required" data-validation-required-message="Please enter availability of market.">
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-4">
														    <label for="">Proximity to the Market </label>
															<input type="text" class="form-control" id="market_proximity" name="market_proximity" placeholder="Proximity to the Market" required="required" data-validation-required-message="Please enter proximity of market.">
													  </div>													   
												</div>
										<div class="row row-space">
										  <div class="form-group col-md-12 text-center">
										  <div id="success"></div>
											<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add Baseline Info</button>
											<a href="<?php echo base_url('fpo/operation/baselinelist');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
										  </div>											 
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
			</div>
		</div>					
</div><!-- .animated -->
</div><!-- .content -->
</div>

<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
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
      $('#baseline_date').attr('max', maxDate);		
}); 


$('#cluster_name').on('change', function() {
	var cluster_id = $(this).val();
	getClusterInformation(cluster_id);
});

function getClusterInformation(cluster_id) {
	$.ajax({
           url:"<?php echo base_url();?>fpo/operation/getClusterInformation/"+cluster_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               response=response.trim();
               responseArray=$.parseJSON(response);
			   console.log(responseArray.clusterInfo);
			   var villagesCoveredList = JSON.parse("[" + responseArray.clusterInfo.villages_covered + "]");
			   console.log(villagesCoveredList.length);
			   $("#village_covered").val(villagesCoveredList.length);
			   $("#farmer_covered").val(responseArray.clusterInfo.no_of_farmers);
			   getFarmersLandCount(Array(villagesCoveredList)); 	
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 	
}

function getFarmersLandCount(villagesCoveredList) {
	var villagesCovered = {'villagesCovered':villagesCoveredList};
		$.ajax({
			url:"<?php echo base_url();?>fpo/operation/getFarmersByVillage",
			type:"Post",
			data:villagesCovered,
			dataType:"html",
            cache:false,			
			success:function(response) {              
				response=response.trim();
				responseArray=$.parseJSON(response);                
				$("#wet_land").val(responseArray.wetland_count);
				$("#dry_land").val(responseArray.dryland_count);
				
				var crop_grown='';			
				$.each(responseArray.crop_grown,function(key, value){
					crop_grown += '<option value='+value.id+'>'+value.crop_name+'</option>'; 
				});
				$('#crop_grown').html(crop_grown);
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
        }); 
}
$(document).ready(function() {
$(document).on('click', '#sendMessageButton', function(){ 
		var validate = true;
		$('#directorform').find('input[type=text],select').each(function(){
			if($(this).val() == ""){
				validate = false;
			}
         var crop_grown=document.getElementById('crop_grown').value;
         if(crop_grown==""){
				validate = false;
			}
		});
		if(validate){
			return true;
		}
		else {
			swal('',"Provide all the data");
			return false;
		}
		
	});
});
</script>	 
</body>
</html>