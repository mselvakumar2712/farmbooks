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
                        <h1>Crop Harvest List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("administrator/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("administrator/updatecrop/cropharvest");?>">Crop Harvest</a></li>
                            <li class="active">Crop Harvest List</li>
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
										<div class="" style="text-align:right;margin-bottom:20px;" >
											<a href="<?php echo base_url('administrator/updatecrop/addharvest');?>">
												<button type="button" class="btn btn-success btn-labeled">
													 <i class="fa fa-plus-square"></i><span class="ml-2"> Add Crop Harvest</span>
												</button>
											</a>
										</div>
									</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
							   <th>Farmer Name</th>
								<th>Variety</th>
								<th>Date of Harvest</th>
								<th>Method of Harvest</th>
								<th>Cost Of Harvesting</th>
								<th>Quality of Output</th>
								<th>Sales Quantity</th>
								<th>Action</th>                         
							  </tr>
							</thead>
							<tbody id="cropharvestlist">
							
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
            //CROP list API CALL
				$.ajax({
						url:"<?php echo base_url();?>administrator/updatecrop/cropharvestlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.crop_harvest);
						 if(responseArray.status == 1){
							 var cropharvest_list = "";
                             $.each(responseArray.crop_harvest,function(key,value){
                                 if(value.output_quality == 1) {
                                     var output_quality = "Very Good";
                                 } else if(value.output_quality == 2) {
                                     var output_quality = "Good";
                                 } else if(value.output_quality == 3) {
                                    var output_quality = "Satisfactory";
                                 } else {
                                    var output_quality = "Poor";                               
                                 }
							     cropharvest_list += '<tr><td>'+value.profile_name+'</td><td>'+value.variety_name+'</td><td>'+value.date_of_harvest+'</td><td>'+value.harvest_method+'</td><td>'+value.harvest_cost+'</td><td>'+output_quality+'</td><td>'+value.qty_sales+'</td><td><a href="<?php echo base_url("administrator/updatecrop/viewharvest?id='+value.variety_id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
							 });
							$('#cropharvestlist').html(cropharvest_list);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
});
</script>