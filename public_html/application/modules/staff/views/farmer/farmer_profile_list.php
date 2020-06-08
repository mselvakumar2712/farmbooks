<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">

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
                        <h1>List Farmer Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/farmer/profilelist');?>">Farmer Profile </a></li>
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
                            
                            <div class="row">
								<div class="form-group col-md-3">
									<label for="">Select State <span class="text-danger">*</span></label>
									<select class="form-control" id="search_state" name="search_state" readonly>
										<option value="">Select State</option>
                                        <?php for($i=0; $i<count($state_list);$i++) { ?>	
                                        <option value="<?php echo $state_list[$i]->state_code; ?>"><?php echo $state_list[$i]->name; ?></option>
                                        <?php } ?>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label for="">Select District <span class="text-danger">*</span></label>
									<select class="form-control" id="search_district" name="search_district">
										<option value="">Select District</option>
									</select>
								</div>
                                
                                <div class="form-group col-md-3">
									<label for="">Select Block <span class="text-danger">*</span></label>
									<select class="form-control" id="search_block" name="search_block">
										<option value="">Select Block</option>
									</select>
								</div>
                               
                                <div class="form-group col-md-3">
                                    <label for="">Select Panchayat</label>
									<select class="form-control" id="search_panchayat" name="search_panchayat">
										<option value="">Select Panchayat</option>
									</select>
                                </div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-4">
                                        <label for="">Select Village</label>
                                        <select class="form-control" id="search_village" name="search_village">
                                            <option value="">Select Village</option>
                                        </select>
                                    </div>                                    

                                    <div class="form-group col-md-2 mt-4">
                                        <button align="center" name="searchSubmit" id="searchSubmit" class="btn btn-success btn-fs mt-1 text-center" type="button" style="padding: .375rem .25rem;"><i class="fa fa-search fa-1x" aria-hidden="true"></i> &nbsp;&nbsp;Search</button>
                                    </div>

                                    <div class="form-group col-md-6 mt-4" style="text-align:right;" >
                                        <a href="<?php echo base_url('staff/farmer/addfarmer');?>">
                                            <button type="button" class="btn btn-success btn-labeled">
                                                <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Farmer</span>
                                            </button>
                                        </a>
                                    </div>
                               </div>
                               
						   </div>							
							<table id="example" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>Farmer Name</th>
                              <th>Date of Birth / Age</th>
                              <th>Mobile Number</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody id="farmerlist">							
                        </tbody>
						  </table>
                        </div>
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>	   
</body>
</html>
<script type="text/javascript">
var districtCode = 0;
var stateCode = 0;
var blockCode = 0;  
var panchayatCode = 0;
var villageCode = 0;    
    
      $(document).ready(function() {
			$.ajax({
				url: "<?php echo base_url();?>staff/farmer",
				type: "POST",
				dataType:"html",
				cache:false,			
				success:function(response){		  
				console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){
               var farmer_list = "";
               var count=1;
               if(responseArray.farmer_list.length != 0) {
                  $.each(responseArray.farmer_list,function(key,value){
                     var sno=count++;
                     var dateFormat = dateFormatChange(value.dob);        
                     farmer_list += '<tr><td>'+value.profile_name+'</td><td>'+dateFormat+' / '+value.age+'</td><td>'+value.mobile+'</td><td><?php if('+value.aadhar_no+'){echo 'Active';}else{echo 'In Active';}?></td><td><a href="<?php echo base_url("staff/farmer/editfarmer/'+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("staff/farmer/viewfarmer/'+value.id+'");?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                  });
               } else {
                  //farmer_list += '<tr><td colspan=5 class="text-center">No records found</td></tr>';	    
               }
               $('#farmerlist').html(farmer_list);
               if(responseArray.fpo_location){       
                    stateCode = responseArray.fpo_location[0]['state'];
                    getDistrictByState(stateCode);
                    districtCode = responseArray.fpo_location[0]['district'];
                    getBlockByDistrict(districtCode);
                    blockCode = responseArray.fpo_location[0]['block'];
                    getPanchayatByBlock(blockCode);
                    panchayatCode = responseArray.fpo_location[0]['panchayat'];
                    getVillageByPanchayat(panchayatCode);
                    villageCode = responseArray.fpo_location[0]['village'];
                    setTimeout(function(){ 
                        var state_code = $('#search_state').val(stateCode);
                        var district_code = $('#search_district').val(districtCode);
                        var block_code = $('#search_block').val(blockCode);
                        var panchayat_code = $('#search_panchayat').val(panchayatCode);
                        var village_code = $('#search_village').val(villageCode);
                    }, 500);
                    
                }
                    
               $('#example').DataTable();
				}
				},
				error:function(){
				//alert('Error!!! Try again');
				//$('#example').DataTable();
				} 
			});
                    
          
          function dateFormatChange(dateFormat) {
            var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var dateFormats = new Date(dateFormat);
            return dateFormats.getDate() + '-' + monthShortNames[dateFormats.getMonth()] + '-' + dateFormats.getFullYear();
        }  
      });
      
      

$('#search_state').on('change', function(e){
    var stateCode = $(this).val();
    getDistrictByState(stateCode);
}); 
    
$('#search_district').on('change', function(e){
    var districtCode = $(this).val();
    getBlockByDistrict(districtCode);
    getPanchayatByBlock(blockCode);
    getVillageByPanchayat(panchayatCode);
});     
    
$('#search_block').on('change', function() {
    var blockCode = $(this).val();
    getPanchayatByBlock(blockCode);
    getVillageByPanchayat(panchayatCode);
}); 
    
$('#search_panchayat').on('change', function() {
    var panchayatCode = $(this).val();
    getVillageByPanchayat(panchayatCode);
});     
    
function getDistrictByState(stateCode){
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getDistrictByState/"+stateCode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
                    var search_district = '<option value="">Select District</option>';
					$.each(responseArray.district_list,function(key,value){
					   search_district += '<option value='+value.district_code+'>'+value.name+'</option>';
				    });
					$('#search_district').html(search_district);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
    
function getBlockByDistrict(districtCode){
    $.ajax({
			url:"<?php echo base_url();?>staff/farmer/getBlocksByDistrict/"+districtCode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();                
				responseArray=$.parseJSON(response);
                if(responseArray.status == 1){
                    var search_block = '<option value="">Select Block</option>';
					$.each(responseArray.block_list,function(key,value){
					   search_block += '<option value='+value.block_code+'>'+value.name+'</option>';
				    });
					$('#search_block').html(search_block);
				}
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
     
function getPanchayatByBlock(blockCode) {
    $.ajax({
        url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+blockCode,
		type:"GET",
		data:"",
		dataType:"html",
        cache:false,			
		success:function(response) {
         //console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
            var gram_panchayat = '<option value="">Select Panchayat</option>';
            $.each(responseArray.panchayatInfo, function(key, value){
                gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
            });                                
            $('#search_panchayat').html(gram_panchayat);                
        },error:function(response){
		  alert('Error!!! Try again');
		} 			
    });     
}              

function getVillageByPanchayat(panchayatCode) {
    $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayatCode,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#search_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
    });     	
}     
    
$("#searchSubmit").click(function(){
    var stateCode = $('#search_state').val();
    var districtCode = $('#search_district').val();
    var blockCode = $('#search_block').val();
    var panchayatCode = $('#search_panchayat').val();
    var villageCode = $('#search_village').val();
    loadFarmers(stateCode, districtCode, blockCode, panchayatCode, villageCode);
}); 
 
function loadFarmers(stateCode, districtCode, blockCode, panchayatCode, villageCode) {
    if(stateCode != "" && districtCode != "" && blockCode != "") {
        var formedCode = {'stateCode':stateCode, 'districtCode':districtCode, 'blockCode':blockCode, 'panchayatCode':panchayatCode, 'villageCode':villageCode};
    
        $.ajax({
				url:"<?php echo base_url();?>staff/farmer/farmersByLocation",
				type:"POST",
                data:formedCode,
				dataType:"html",
				cache:false,			
				success:function(response){		  
               console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               if(responseArray.status == 1){
               var farmer_list = "";
               var count=1;
                   if(responseArray.farmer_list.length != 0) {
                       $.each(responseArray.farmer_list,function(key,value){
                           var sno=count++;
                           var dateFormat = dateFormatChange(value.dob);        
                           farmer_list += '<tr><td>'+value.profile_name+'</td><td>'+dateFormat+' / '+value.age+'</td><td>'+value.mobile+'</td><td><?php if('+value.aadhar_no+'){echo 'Active';}else{echo 'In Active';}?></td><td><a href="<?php echo base_url("staff/farmer/editfarmer/'+value.id+'"); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("staff/farmer/viewfarmer/'+value.id+'");?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                       });
                       
                   } else {
                       farmer_list += '<tr><td colspan="5" class="text-center">No records found</td></tr>';
                   }
                   $('#example').DataTable().destroy();
                   $('#farmerlist').html(farmer_list);                   
                   $('#example').DataTable();				
               }
				},
				error:function(){
				//alert('Error!!! Try again');
				//$('#example').DataTable();
				} 
			});                    
    } else {
        swal("Sorry", "Provide the mandatory fields(State, District, Block)");
    }
}    

function dateFormatChange(dateFormat) {
    var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var dateFormats = new Date(dateFormat);
    return dateFormats.getDate() + '-' + monthShortNames[dateFormats.getMonth()] + '-' + dateFormats.getFullYear();
}      
</script>