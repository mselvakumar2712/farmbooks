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
            <div class="loading" id="pageloadingWait" style="display:none;"></div>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>List Crop</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("staff/crop");?>">Crop Management</a></li>
                            <li class="active">Crop List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
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
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                        <div class="card-body">	
                           <div class="container">
										<div class="" style="text-align:right;margin-bottom:20px;" >
											<a href="<?php echo base_url('staff/crop/addcrop');?>">
												<button type="button" class="btn btn-success btn-labeled">
													 <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Crop Entry</span>
												</button>
											</a>
										</div>
									</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr class="">
								<th>Farmer/Member Name</th>
								<th>Village</th>
								<th>Crop</th>
								<th>Variety</th>
								<th>Date of Seeding/Sowing</th>
								<th>Expected Date of Harvest</th>
								<th>Action</th>
                        <th width="100%" class="text-center">Post Action</th>  
							  </tr>
							</thead>
							<tbody id="croplist">
							
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
						url:"<?php echo base_url();?>staff/crop/croplist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.crop_list);
						 if(responseArray.status == 1){
							var croplist = "";
							$.each(responseArray.crop_list,function(key,value){
							 croplist += '<tr><td>'+value.profile_name+'</td><td>'+value.village_name+'</td><td>'+value.crop_name+'</td><td>'+value.variety_name+'</td><td>'+value.transplant_date+'</td><td>'+value.expected_harvest_date+'</td><td class="text-center" width="10%"><a href="<?php echo base_url("staff/crop/edit_crop/'+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("staff/crop/viewcrop?id='+value.id+'");?>" class="btn btn-warning btn-sm ml-1" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td><td class="row row-space text-center" width="130px;"><a href="<?php echo base_url("staff/updatecrop/index");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/fertilizer.png");?>" class="img-responsive center-block" title="Update Crop List"></a><a href="<?php echo base_url("staff/updatecrop/cropharvest");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/harvest.png");?>" class="img-responsive center-block" title="Crop Harvest List"></a><a href="<?php echo base_url("staff/updatecrop/postharvest");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/post_harvest.png");?>" class="img-responsive center-block" title="Post Harvest List"></a></td></tr>';
							});
							$('#croplist').html(croplist);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
});
</script>