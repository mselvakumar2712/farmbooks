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
                        <h1>List Farmer's Live Stocks</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a class="" href="<?php echo base_url('fpo/farmer/profilelist');?>">Farmer Profile </a></li>
                            <li><a class="active" href="#">Live Stocks</a></li>
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
								<div class="form-group col-md-4">
									<label for="">Select State <span class="text-danger">*</span></label>
									<select class="form-control" id="search_state" name="search_state" readonly>
										<option value="">Select State</option>
                                        <?php for($i=0; $i<count($state_list);$i++) { ?>	
                                        <option value="<?php echo $state_list[$i]->state_code; ?>"><?php echo $state_list[$i]->name; ?></option>
                                        <?php } ?>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="">Select District <span class="text-danger">*</span></label>
									<select class="form-control" id="search_district" name="search_district">
										<option value="">Select District</option>
									</select>
								</div>
                                
                                <div class="form-group col-md-4">
									<label for="">Select Block <span class="text-danger">*</span></label>
									<select class="form-control" id="search_block" name="search_block">
										<option value="">Select Block</option>
									</select>
								</div>                                                              
                            </div>
                            <div class="row">
								<div class="form-group col-md-4">
                                    <label for="">Select Panchayat</label>
									<select class="form-control" id="search_panchayat" name="search_panchayat">
										<option value="">Select Panchayat</option>
									</select>
                                </div>
								
                                <div class="form-group col-md-4">
                                    <label for="">Select Village</label>
                                    <select class="form-control" id="search_village" name="search_village">
                                        <option value="">Select Village</option>
                                    </select>
                                </div>                                    

                                <div class="form-group col-md-2 mt-4">
                                    <button align="center" name="searchSubmit" id="searchSubmit" class="btn btn-success btn-fs mt-1 text-center" type="button" style="padding: .375rem .25rem;"><i class="fa fa-search fa-1x" aria-hidden="true"></i> &nbsp;&nbsp;Search</button>
                                </div>                               
                            </div>
                              
						   </div>	
						   
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Farmer Name</th>
								<th>Type</th>
								<th>Name</th>
								<th>Variety</th>
								<th>Total Count</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="livestockslist">							
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
$(document).ready(function() {
    $.ajax({
        url: "<?php echo base_url();?>fpo/farmer/livestock_list",
        type: "GET",
        dataType:"html",
        cache:false,			
        success:function(response){		  
            //console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            if(responseArray.status == 1){
              var livestock_list = "";
              var count=1;
                $.each(responseArray.livestock_list,function(key,value){
                    var sno=count++;
                    if(value.live_stock_type == 1) {
                        var type = "Cattle";
                    } else if(value.live_stock_type == 2) {
                        var type = "Animals";
                    } else if(value.live_stock_type == 3) {
                        var type = "Birds";
                    } else {
                       var type = "Other";
                    }
                    if(value.variety_name != null) {
                        var variety_name = value.variety_name;
                    } else {
                         var variety_name="";
                    }
                    
                    if(value.live_stock_count != 0) {
                        var live_stock_count = value.live_stock_count;  
                    } else {
                        var live_stock_count = "";
                    }
                    
                    if(value.live_stocks == 1) {            
                        livestock_list += '<tr><td>'+value.profile_name+'</td><td>'+type+'</td><td>'+value.live_stock_name+'</td><td>'+variety_name+'</td><td>'+live_stock_count+'</td><td><a href="<?php echo base_url("fpo/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("fpo/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-warning ml-1 btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                    }
                });
                $('#livestockslist').html(livestock_list);
				
				if(responseArray.fpo_location){       
                    stateCode = responseArray.fpo_location[0]['state'];                    
					districtCode = responseArray.fpo_location[0]['district'];                    
					blockCode = responseArray.fpo_location[0]['block'];                    
					panchayatCode = responseArray.fpo_location[0]['panchayat'];                    
					villageCode = responseArray.fpo_location[0]['village'];
					getDistrictByState(stateCode, districtCode);
					getBlockByDistrict(districtCode, blockCode);
					getPanchayatByBlock(blockCode, panchayatCode);
					getVillageByPanchayat(panchayatCode, villageCode);
					var state_code = $('#search_state').val(stateCode);
                    /*setTimeout(function(){ 
                        var state_code = $('#search_state').val(stateCode);
                        var district_code = $('#search_district').val(districtCode);
                        var block_code = $('#search_block').val(blockCode);
                        var panchayat_code = $('#search_panchayat').val(panchayatCode);
                        var village_code = $('#search_village').val(villageCode);
                    }, 500);  */                 
                }
				
                $('#example').DataTable();
            }
        },
        error:function(){	   
            $('#example').DataTable();
        } 
    });
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
		url:"<?php echo base_url();?>fpo/farmer/getDistrictByState/"+stateCode,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
			//console.log(response);
			response=response.trim();                
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				var search_district = '<option value="">Select District</option>';
				$.each(responseArray.district_list,function(key,value){
					if(districtCode != null && value.district_code == districtCode){
						search_district += '<option value='+value.district_code+' selected>'+value.name+'</option>';
					} else {
						search_district += '<option value='+value.district_code+'>'+value.name+'</option>';
					}
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
		url:"<?php echo base_url();?>fpo/farmer/getBlocksByDistrict/"+districtCode,
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,			
		success:function(response) {
			//console.log(response);
			response=response.trim();                
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				var search_block = '<option value="">Select Block</option>';
				$.each(responseArray.block_list,function(key,value){
					if(blockCode != null && value.block_code == blockCode){
						search_block += '<option value='+value.block_code+' selected>'+value.name+'</option>';
					} else {
						search_block += '<option value='+value.block_code+'>'+value.name+'</option>';
					}
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
				if(panchayatCode != null && value.panchayat_code == panchayatCode){
					gram_panchayat += '<option value='+value.panchayat_code+' selected>'+value.name+'</option>';
				} else {
					gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
				}
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
				if(villageCode != null && value.id == villageCode){
					village += '<option value='+value.id+' selected>'+value.name+'</option>';
				} else {
					village += '<option value='+value.id+'>'+value.name+'</option>';
				}
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

 
function loadFarmers(stateCode, districtCode, blockCode, panchayatCode, villageCode){
    if(stateCode != "" && districtCode != "" && blockCode != "") {
        var formedCode = {'stateCode':stateCode, 'districtCode':districtCode, 'blockCode':blockCode, 'panchayatCode':panchayatCode, 'villageCode':villageCode};
    
        $.ajax({
			url:"<?php echo base_url();?>fpo/farmer/liveStocksByLocation",
			type:"POST",
			data:formedCode,
			dataType:"html",
			cache:false,			
			success:function(response){		  
			//console.log(response);
			response=response.trim();
			responseArray=$.parseJSON(response);
			if(responseArray.status == 1){
				var livestock_list = "";
				if(responseArray.livestock_list.length != 0) {					
					$.each(responseArray.livestock_list,function(key,value){
						if(value.live_stock_type == 1) {
							var type = "Cattle";
						} else if(value.live_stock_type == 2) {
							var type = "Animals";
						} else if(value.live_stock_type == 3) {
							var type = "Birds";
						} else {
						   var type = "Other";
						}
						if(value.variety_name != null) {
							var variety_name = value.variety_name;
						} else {
							 var variety_name="";
						}
						
						if(value.live_stock_count != 0) {
							var live_stock_count = value.live_stock_count;  
						} else {
							var live_stock_count = "";
						}
						
						if(value.live_stocks == 1) {            
							livestock_list += '<tr><td>'+value.profile_name+'</td><td>'+type+'</td><td>'+value.live_stock_name+'</td><td>'+variety_name+'</td><td>'+live_stock_count+'</td><td><a href="<?php echo base_url("fpo/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("fpo/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-warning ml-1 btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
						}
					});					
				   
			   } else {
				   livestock_list += '<tr><td colspan="6" class="text-center">No records found</td></tr>';
			   }
			   //$('#example').DataTable().destroy();
			   $('#livestockslist').html(livestock_list);              
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

</script>