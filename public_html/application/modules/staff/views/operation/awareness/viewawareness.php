<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<?php 
$directory = 'assets/uploads/awareness/program_'.$awareness['id'].'/';
$filecount = 0;
$uploadedImages = glob($directory . "*");
?>
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
                        <h1>View Awareness Program</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('staff/operation/awarenesslist');?>">Awareness Program</a></li>
                            <li><a class="active" href="#">View Awareness Program</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="#" method="post" id="awarenessviewform" name="sentMessage" novalidate="novalidate">                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
												<div class="row row-space mt-4"> 
													  <div class="form-group col-md-3">
														  <label for="">Date of Program <span class="text-danger">*</span></label>
														  <input type="date" id="date_training" disabled max="" name="date_visit" value="<?php echo $awareness['program_date']; ?>" class="form-control" required="required" data-validation-required-message="Please select date of program ">					
														   <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-4">
														<label for="">Place of Conducting Program </label>
														<input type="text" id="place_program" maxlength="50" value="<?php echo $awareness['conducting_place']; ?>" disabled name="place_program" class="form-control" >					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-2">
														<label for="">No. of Participants </label>
														<input type="text" id="no_participants" name="no_participants" value="<?php echo $awareness['no_of_participants']; ?>" disabled maxlength="3" class="form-control numberOnly">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  <div class="form-group col-md-3 mt-4">
														<label for="inputAddress2">Cost Involved</label>
														<input type="checkbox" id="involved_cost" name="show_inactive" <?php echo ($awareness['cost_involved']==1)?'checked':''; ?> disabled value="1" class="ml-2" >												
													  </div> 													  
													  </div>
													   <div class="row row-space">
														 <div class="form-group col-md-8">
															<label for="">Program Photo </label>
															<div class="">
															<?php 
																if($uploadedImages){
																	for($i=0;$i<count($uploadedImages);$i++){?>
																	<div class="col-md-2">
																		<img src="<?php echo base_url().$uploadedImages[$i]; ?>" class="img-responsive" width="" height="" alt=""/>
																	</div>
															<?php }} ?>
															</div>
														  </div>
															<div class="form-group col-md-4" id="costHolder">
																<label for="inputAddress2">Total Cost <span class="text-danger">*</span></label>
																<input type="text" id="involved_cost_value" name="involved_cost_value" class="form-control numberOnly ml-2" value="<?php echo $awareness['involved_cost']; ?>" placeholder="Cost Involved" data-validation-required-message="Please provide the involved cost" disabled>
																<div class="help-block with-errors text-danger"></div>
															</div>  
													  </div>													  												
													  
													<div class="row row-space">
													  <div class="form-group col-md-12" id="Village">
														<label for="">Villages <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">
															<tbody id="villagelist">
															</tbody>
														</table>
													</div>													 
											</div>														  
										</div>											
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('staff/operation/editawareness/'.$awareness['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Awareness<a>
											<a href="<?php echo base_url('staff/operation/awarenesslist/'.$awareness['id']);?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
var villageList_DB = "<?php echo $awareness['villages'];?>";
var villageList_DB_temp = JSON.parse("[" + villageList_DB + "]");

var cost_involved = "<?php echo $awareness['cost_involved']; ?>";
costHolder(cost_involved);

function costHolder(cost_involved) {
	if(cost_involved == 1) {
		$("#costHolder").show();
	} else {
		$("#costHolder").hide();
	}
}

//total days calculation
function GetDays(){
                var dropdt = new Date(document.getElementById("date_completeion").value);
                var pickdt = new Date(document.getElementById("date_training").value);
                return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("date_training")){
            document.getElementById("total_days").value=GetDays();
        }  
    }
	
	
		$("#date_training").focusout(function() {
			var date_training = $(this).val();
			$("#date_completeion").attr("min", date_training);
		});


 $(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";	
	getFPODetails( fpo_id );	
}); 

function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>staff/operation/getblockByFpo/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               response=response.trim();
               responseArray=$.parseJSON(response);
               var panchayat = responseArray.location_data[0]['panchayat'];
               getVillageList(panchayat);
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
}
function getVillageList( panchayat ) {
		$.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				
				var village = '';
				//var i=0;
				console.log(responseArray['villageInfo']);
            
			var col_count = 0;
			var td_count = 0;
			var village_data = '';			
			var totalCol = responseArray['villageInfo'].length;
			
			$.each(responseArray.villageInfo,function(key, value){				
				col_count++;
				td_count++;
				var isInArray = villageList_DB.includes(value.id);
				if(col_count == 1) {
					village_data += '<tr class="col-md-12">';
					if(isInArray == true) {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required checked data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}					
				} else {
					if(isInArray == true) {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required checked data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						village_data += '<td><input type="checkbox" id="village_name" disabled name="village_name[]" required data-validation-required-message="Please select village." value="'+value.id+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}
				}
				if(col_count % 6 ==0) {
					td_count = 0;
					village_data += '</tr>';									
				}
				else if(totalCol == col_count) {
					var diff = 6 - td_count;
						
					village_data += '	<td colspan="'+diff+'"></td>';
					village_data += '</tr>';
				}
				//return false;
            });
			$("#villagelist").append(village_data);
			
			/*village_data += '</div>';

                var village = '<label for="">Name of the Villages Covered</label><div>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
					 village += '<input type="checkbox" class="ml-2" value='+value.id+'>'+value.name;
					 console.log(value.name);
                }); 
				village += '</div>';
                $('#villages_info').html(village); */               
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
</script>	 
</body>
</html>