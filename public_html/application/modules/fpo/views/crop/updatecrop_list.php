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
                        <h1>Update Crop List</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                            <li><a href="<?php echo base_url("fpo/updatecrop");?>">Update Crop</a></li>
                            <li class="active">Update Crop List</li>
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
									<a href="<?php echo base_url('fpo/Updatecrop/add_updatecrop');?>">
										<button type="button" class="btn btn-success btn-labeled">
											<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Update Crop</span>
										</button>
									</a>
								</div>
							</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
							   <th>Farmer Name</th>
							   <th>Variety</th>
								<th>Update Type</th>
								<th>Brand Name</th>
								<th>Date Of Dosage</th>
								<th>Dosage</th>
								<th>Quantity</th>
								<th>Cost</th>
								<th>Action</th>       
							  </tr>
							</thead>
							<tbody id="">
								<?php for($i=0;$i<count($update_crop);$i++){ 
								if($update_crop[$i]->update_type == 1){
                                    $update_type = "Nutrient";
                                } else if($update_crop[$i]->update_type == 2){
                                    $update_type = "Fertilizer";   
                                } else if($update_crop[$i]->update_type == 3){
                                    $update_type = "Pesticide";
                                } else {
                                    $update_type = "Weeding";
                                }  
								
								$brand_name = ($update_crop[$i]->brandname != null)?$update_crop[$i]->brandname:"";
								?>
								<tr>
									<td><?php echo $update_crop[$i]->profile_name; ?></td>
									<td><?php echo $update_crop[$i]->variety_name; ?></td>
									<td><?php echo $update_type; ?></td>
									<td><?php echo ($update_crop[$i]->update_type != 4)?$brand_name:""; ?></td>
									<td><?php echo fpo_display_date($update_crop[$i]->process_date); ?></td>
									<td><?php echo $update_crop[$i]->dosage; ?></td>
									<td><?php echo $update_crop[$i]->qty. "/" .$update_crop[$i]->fullname; ?></td>
									<td><?php echo $update_crop[$i]->process_cost; ?></td>
									<td>
										<a href="<?php echo base_url("fpo/updatecrop/edit_updatecrop/".$update_crop[$i]->id);?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
										<a href="<?php echo base_url("fpo/updatecrop/view_updatecrop/".$update_crop[$i]->id);?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>
								</tr>
								<?php } ?>
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
/*
$(document).ready(function() {
    //var crop_id =<?php //echo $_REQUEST['crop_id']?>;
            //CROP list API CALL
				$.ajax({
						url:"<?php echo base_url();?>fpo/updatecrop/updatecroplist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
							console.log(response);
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray);
						console.log(responseArray.update_crop);
						 if(responseArray.status == 1){
							var updatecrop_list = "";
							$.each(responseArray.update_crop,function(key,value){
                                if(value.update_type == 1) {
                                    var update_type = "Nutrient";
                                } else if(value.update_type == 2) {
                                    var update_type = "Fertilizer";   
                                } else if(value.update_type == 3) {
                                    var update_type = "Pesticide";
                                } else {
                                    var update_type = "Weeding";
                                }  
                                     if(value.brandname == null)  
									 {
										var brandname ="";
									 }	
                                    else 
									{
										var brandname=value.brandname;
									}										
                              
							 updatecrop_list += '<tr><td>'+value.profile_name+'</td><td>'+value.variety_name+'</td><td>'+update_type+'</td><td>'+brandname+'</td><td>'+value.process_date+'</td><td>'+value.dosage+'</td><td>'+value.qty+'/'+value.fullname+'</td><td class="text-right">'+value.process_cost+'</td><td class="text-center" ><a href="<?php echo base_url("fpo/updatecrop/edit_updatecrop?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("fpo/updatecrop/view_updatecrop?id='+value.id+'");?>" class="btn btn-warning btn-sm mt-2" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
							});
							$('#updatecrop_list').html(updatecrop_list);
							$('#example').DataTable();
							} 
						},
						error:function(){						
						  $('#example').DataTable();
						} 
                });
});*/
</script>
