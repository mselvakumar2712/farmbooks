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
                        <h1>Post Harvest List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop/postharvest");?>">Post Harvest</a></li>
                            <li class="active">Post Harvest List</li>
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
											<a href="<?php echo base_url('fpo/updatecrop/addpostharvest');?>">
												<button type="button" class="btn btn-success btn-labeled">
													<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Post Harvest</span>
												</button>
											</a>
										</div>
									</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
							   <th>Farmer Name</th>
							   <th>Variety</th>
								<th>Date</th>
								<th>Type Of Work</th>
								<th>Input</th>
								<th>Input Qty</th>
								<th>Output</th>
								<th>OutPut Qty</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="postharvestlist">
							
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
						url:"<?php echo base_url();?>fpo/updatecrop/postharvestlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.post_harvest);
						 if(responseArray.status == 1){
							var postharvestlist = "";
							$.each(responseArray.post_harvest,function(key,value){
							 postharvestlist += '<tr><td>'+value.profile_name+'</td><td>'+value.variety_name+'</td><td>'+value.process_date+'</td><td>'+(value.work_type==1 ? 'Cleaning' : value.work_type==2 ? 'Polishing' : value.work_type==3 ? 'Boiling' : value.work_type==4 ? 'Drying' : value.work_type==5 ? 'De-Husking' : value.work_type==6 ? 'Seed Removing':'' )+'</td><td>'+value.crop_id+'</td><td>'+value.crop_input_id+'</td><td>'+value.output_name+'</td><td>'+value.output_qty+'</td><td><a href="<?php echo base_url("fpo/updatecrop/viewpostharvest?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("fpo/updatecrop/viewpostharvest?id='+value.id+'");?>" class="btn btn-warning btn-sm" title="view"><i class="fa fa-eye" aria-hidden="true" title="view"></i></a></td></tr>';
							});
							$('#postharvestlist').html(postharvestlist);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
});
</script>