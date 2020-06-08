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
                        <h1>View Cluster Identification </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('staff/operation/clusterlist');?>">Cluster Identification</a></li>
                            <li><a class="active" href="#">View Cluster Identification </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="#" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									<div class="container-fluid">
												<div class="row row-space mt-4"> 
													  <div class="form-group col-md-6">
														  <label for="">Date of Identification</label>
														  <input type="date" id="date_identification" disabled max="" name="date_identification" value="<?php echo $cluster['identification_date']; ?>" class="form-control">					
														   <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-6">
														<label for="">Name of the Cluster <span class="text-danger">*</span></label>
														<input type="text" id="place_program" disabled maxlength="50" name="place_program" required="required" value="<?php echo $cluster['cluster_name']; ?>" data-validation-required-message="Please enter cluster name" class="form-control" >					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													<div class="row row-space">
													  <div class="form-group col-md-12" id="block">
														<label for="">Blocks <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">							
															<tbody id="blocklist">																													
															</tbody>															
														  </table>
														  <div class="col-md-12 text-center" id="blockbutton">														 
													  </div>													  
													  </div>
													</div>	
												<div class="row row-space">
													  <div class="form-group col-md-4">                            
														<label for="inputAddress2">Villages Covered <span class="text-danger">*</span></label>
														<select id="village" class="form-control sel_village" disabled id="village" name="village[]" required data-validation-required-message="Please select village." multiple>
														<option value="">Select Village</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												<div class="form-group col-md-4">                            
														<label for="inputAddress2">No. of Farmers <span class="text-danger">*</span></label>
														<input type="text" id="place_program" maxlength="50" disabled name="place_program" required="required" value="<?php echo $cluster['no_of_farmers']; ?>" data-validation-required-message="Please enter No of farmer " class="form-control" >				
														<div class="help-block with-errors text-danger"></div>
													</div>	
													<div class="form-group col-md-4">                            
														<label for="inputAddress2">Activities </label>
														<select id="activities" class="form-control sel_village" disabled id="activities"  name="activities[]"  data-validation-required-message="Please select village." >
														<option value="">Select Activities</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>													
																											  
												</div>	
											</div>												
										<div class="col-md-12 text-center">
											<a href="<?php echo base_url('staff/operation/editcluster/'.$cluster['id']);?>" id="edit" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit Cluster<a>
											<a href="<?php echo base_url('staff/operation/clusterlist');?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
var blockList_DB = "<?php echo $cluster['blocks'];?>";
var blockList_DB_temp = JSON.parse("[" + blockList_DB + "]");
console.log(blockList_DB_temp);
var villageList_DB = "<?php echo $cluster['villages_covered'];?>";
var villageList_DB_temp = JSON.parse("[" + villageList_DB + "]");
getVillageList( blockList_DB_temp );

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
      $('#committee_date').attr('max', maxDate);
			
}); 


 $(document).ready(function(){
    var fpo_id = "<?php echo $this->session->userdata('user_id');?>";
	getFPODetails(fpo_id);
}); 

function getFPODetails(fpo_id) {
    $.ajax({
           url:"<?php echo base_url();?>staff/operation/getdistrictByFpo/"+fpo_id,
           type:"GET",
           data:"",
           dataType:"html",
           cache:false,			
           success:function(response) {
               response=response.trim();
               responseArray=$.parseJSON(response);
               var pincode = responseArray.location_data[0]['pin_code'];
			   var district = responseArray.location_data[0]['district'];
               getBlockByDistrict( district );
               
           },
           error:function(response){
               alert('Error!!! Try again');
           } 			
       }); 
} 

function getBlockByDistrict(districtCode){
    $.ajax({
			url:"<?php echo base_url();?>staff/Operation/getBlocksByDistrict/"+districtCode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response); 
				var block = '';
			console.log(response['blockInfo']);
			var col_count = 0;
			var td_count = 0;
			var block_data = '';
			var totalCol = responseArray['blockInfo'].length;
			
			$.each(responseArray.blockInfo,function(key, value){
				col_count++;
				td_count++;
				var isInArray = blockList_DB.includes(value.block_code);
				if(col_count == 1) {
					block_data += '<tr class="col-md-12">';
					if(isInArray == true) {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled checked required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}
				} else {
					if(isInArray == true) {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled checked required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" disabled required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}
				}
				
				if(col_count % 6 ==0) {
					td_count = 0;
					block_data += '</tr>';
					
				} else if(totalCol == col_count) {
					var diff = 6 - td_count;
						
					block_data += '	<td colspan="'+diff+'"></td>';
					block_data += '</tr>';
				}
				block ='<tr class="row row-space"><td class="col-md-12 text-center"><button type="button" id="save_value" name="save_value" class="btn btn-success btn-fs text-center">Find Villages</button></td></tr>'; 
            });
			 $("#blocklist").append(block_data);
			 $('#blockbutton').html(block);
			 
			block_data += '</div>';
			},
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

	 function getVillageList( block ) {		
		var block_name = {'block':block};
        $.ajax({
			url:"<?php echo base_url();?>staff/operation/getvillagesbyblock",
			type:"Post",
			data:block_name,
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);                
				var block = '';            
			var village='<option value="">Select Village</option>';			
			var totalCol = responseArray.villageInfo.length;
			$.each(responseArray.villageInfo,function(key, value){
				var isInArray = villageList_DB.includes(value.id);
				if(isInArray == true) {
					village += '<option value='+value.id+' selected>'+value.name+'</option>'; 
				} else {
					village += '<option value='+value.id+'>'+value.name+'</option>'; 
				}
            });
			 $('#village').html(village);
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

$("#village").focusout(function(){
	var $el=$("#village").val();
	getfarmerList(Array($el)); 	
});

  function getfarmerList( village ) {
	  //alert(village);
	  //$("#village option").remove() ;
		var village_name = {'village':village};
        $.ajax({
			url:"<?php echo base_url();?>staff/operation/farmerlist",
			type:"Post",
			data:village_name,
			dataType:"html",
            cache:false,			
			success:function(response) {
              
				 response=response.trim();
				responseArray=$.parseJSON(response);                
				
				console.log(responseArray.farmerInfo); 
            document.getElementById("farmer_count").value = responseArray.farmerInfo;
			
			              
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

 $(function(){
	 $("#directorform").on('click', '#save_value', function () {
        var val = [];
        $(':checkbox:checked').each(function(i){
          val.push($(this).val());
		  console.log(val);
        }); 
		getVillageList(Array(val));
      });
    });

</script>	 
</body>
</html>