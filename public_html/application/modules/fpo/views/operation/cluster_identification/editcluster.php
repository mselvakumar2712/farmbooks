<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: red;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
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
                        <h1>Edit Cluster Identification</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
							<li><a href="<?php echo base_url('fpo/operation/clusterlist');?>">Cluster Identification</a></li>
                            <li><a class="active" href="#">Edit Cluster Identification  </a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
					<form action="<?php echo base_url('fpo/operation/postUpdateClusterIdentification')?>" method="post" id="directorform" name="sentMessage" novalidate="novalidate" >                   
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
												<div class="row row-space  mt-4"> 
													  <div class="form-group col-md-6">
														<input type="hidden" name="cluster_id" value="<?php echo $cluster['id']; ?>">
														  <label for="">Date of Identification</label>
														  <input type="date" id="date_identification" name="date_identification" required value="<?php echo $cluster['identification_date']; ?>" class="form-control" >					
														   <p class="help-block text-danger"></p>
													  </div>
													   <div class="form-group col-md-6">
														<label for="">Name of the Cluster <span class="text-danger">*</span></label>
														<input type="text" id="cluster_name" maxlength="50" name="cluster_name" required="required" value="<?php echo $cluster['cluster_name']; ?>" data-validation-required-message="Please enter cluster name" class="form-control">					
														<div class="help-block with-errors text-danger"></div>
													  </div>
													  </div>
													  <div class="row row-space">
													  <div class="form-group col-md-12" id="block">
														<label for="">Block <span class="text-danger">*</span></label>
														<table id="example" class="table table-striped table-bordered">			
															<tbody id="blocklist">																													
															</tbody>															
														  </table>
														  <div class="col-md-12 text-center" id="blockbutton">
														 
														<!--<input type="checkbox" id="block_name" name="block_name[]" value="1" class="mycheckbox">					
														<div class="help-block with-errors text-danger"></div>-->
														
													  </div>													  
													  </div>
													 
													 <!--  <div class="row row-space">
														 <div class="form-group col-md-4">
															  <label for="">Program Photo <span class="text-danger">(Max upload file size is 500KB)</span></label>
															 <input type="file" class="form-control"   id="program_photo" accept="image/jpeg,image/png,image/jpg" name="program_photo" placeholder="Photo *" multiple>
															 <p class="help-block text-danger"></p>
															 <div  id="filediv"></div>
														  </div>
														   <div class="form-group col-md-3 ">
															<label for="inputAddress2">Cost Involved</label>
															<input type="checkbox" id="cost_involved" name="cost_involved[]" value="1" class="ml-2" >												
														</div> 
													  
													  </div> -->
																											  
										</div>	
												<div class="row row-space">
													  <div class="form-group col-md-4">                            
														<label for="inputAddress2">Villages Covered <span class="text-danger">*</span></label>
														<select id="village" class="form-control sel_village" id="village"  name="village[]" required data-validation-required-message="Please select village." multiple>
														<option value="">Select Village</option>
														</select>
														<div class="help-block with-errors text-danger"></div>
													</div>
												<div class="form-group col-md-4">                            
														<label for="inputAddress2">No. of Farmers <span class="text-danger">*</span></label>
														<input type="text" id="no_of_farmers" maxlength="5" name="no_of_farmers" required="required" value="<?php echo $cluster['no_of_farmers']; ?>" data-validation-required-message="Please enter No of farmer" class="form-control" readonly>				
														<div class="help-block with-errors text-danger"></div>
													</div>	
													<div class="form-group col-md-4">                            
														<label for="inputAddress2">Activities </label>
														<select id="activities" class="form-control" name="activities">
														<option value="">Select Activities</option>
														</select>
													</div>													
																											  
												</div>	
											</div>		
										<div class="col-md-12 text-center">
											<button id="sendMessageButton" class="btn btn-fs btn-success confirmation text-center" type="submit"> <i class="fa fa-check-circle"></i> Update Cluster</button>
											<a href="<?php echo base_url('fpo/operation/clusterlist');?>" id="cancel" class="btn btn-fs btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>
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
	//alert(fpo_id);
    $.ajax({
           url:"<?php echo base_url();?>fpo/operation/getdistrictByFpo/"+fpo_id,
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
			url:"<?php echo base_url();?>fpo/Operation/getBlocksByDistrict/"+districtCode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response); 
				var block = '';
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
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" required checked data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					}
				} else {
					if(isInArray == true) {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" required checked data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
					} else {
						block_data += '	<td><input type="checkbox" id="block_name" name="block_name[]" required data-validation-required-message="Please select block." value="'+value.block_code+'"> '+value.name+' <div class="help-block with-errors text-danger"></div></td>';
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
			url:"<?php echo base_url();?>fpo/operation/getvillagesbyblock",
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

      $('#no_of_farmers').val('');
    // document.getElementById("farmer_count").value ='';
		var village_name = {'village':village};
        $.ajax({
			url:"<?php echo base_url();?>fpo/operation/farmerlist",
			type:"Post",
			data:village_name,
			dataType:"html",
            cache:false,			
			success:function(response) { 
				response=response.trim();
				responseArray=$.parseJSON(response);                
				document.getElementById("no_of_farmers").value = responseArray.farmerInfo;					             
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