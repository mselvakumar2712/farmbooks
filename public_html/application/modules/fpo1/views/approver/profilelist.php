<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.modal-dialog1 {
    max-width: 750px ! important;
    margin: 1.75rem auto;
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
                        <h1>List of Profiles</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Approver</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/approver'); ?>">List of Profiles</a></li>
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
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Profile Type</th>
								<th>Name</th>
								<th>Date of Creation</th>
								<th>Address</th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="profilelist">
							<?php for($i=0;$i<count($fpg_list);$i++){ ?>
							<tr>
								<td>FPG</td>
								<td><?php echo $fpg_list[$i]->FPG_Name; ?></td>
								<td><?php echo $fpg_list[$i]->updated_on; ?></td>
								<td><?php echo $fpg_list[$i]->village_name.' , '.$fpg_list[$i]->panchayat_name.',<br>'.$fpg_list[$i]->block_name.' , '.$fpg_list[$i]->taluk_name.' Taluk,<br>'.$fpg_list[$i]->district_name.' District , '.$fpg_list[$i]->state_name; ?></td>
								<td><?php if($fpg_list[$i]->status == 0){ echo 'Waiting for approval'; } else if($fpg_list[$i]->status == 2){ echo 'Rejected'; } ?></td>
								<td class="text-center">
									<a href="<?php echo base_url('fpo/approver/viewProfile/'.$fpg_list[$i]->id.'_1'); ?>" data-toggle="modal" data-target="#profileDetails" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									<?php if($fpg_list[$i]->status != 2){ ?>
									<a href="#" id="<?php echo $fpg_list[$i]->id.'_1'; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
									<a href="#" id="<?php echo $fpg_list[$i]->id.'_1'; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
									<?php } ?>
								</td>
							</tr>
							<?php } ?>
							<?php for($j=0;$j<count($fig_list);$j++){ ?>
							<tr>
								<td>FIG</td>
								<td><?php echo $fig_list[$j]->FIG_Name; ?></td>
								<td><?php echo $fig_list[$j]->updated_on; ?></td>
								<td><?php echo $fig_list[$j]->village_name.' , '.$fig_list[$j]->panchayat_name.',<br>'.$fig_list[$j]->block_name.' , '.$fig_list[$j]->taluk_name.' Taluk,<br>'.$fig_list[$j]->district_name.' District , '.$fig_list[$j]->state_name; ?></td>
								<td><?php if($fig_list[$j]->status == 0){ echo 'Waiting for approval'; } else if($fig_list[$j]->status == 2){ echo 'Rejected'; } ?></td>
								<td class="text-center">
									<a href="<?php echo base_url('fpo/approver/viewProfile/'.$fig_list[$j]->id.'_2'); ?>" data-toggle="modal" data-target="#profileDetails" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									<?php if($fig_list[$j]->status != 2){ ?>
									<a href="#" id="<?php echo $fig_list[$j]->id.'_2'; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
									<a href="#" id="<?php echo $fig_list[$j]->id.'_2'; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
									<?php } ?>
								</td>
							</tr>
							<?php } ?>
							<?php //for($k=0;$k<count($fpg_representative);$k++){ ?>
							<!--<tr>
								<td><?php //echo ($fpg_representative[$k]->member_type == 1)?'Farmer':'FPO';?></td>
								<td><?php //echo $fpg_representative[$k]->FPG_Name; ?></td>
								<td><?php //echo $fpg_representative[$k]->appointment_date; ?></td>
								<td><?php //echo $fpg_representative[$k]->FPG_Name; ?></td>
								<td><?php //if($fpg_representative[$k]->status == 0){ echo 'Waiting for approval'; } else if($fpg_representative[$k]->status == 2){ echo 'Rejected'; } ?></td>
								<td class="text-center">
								 <a href="#" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
								 <a href="#" class="btn btn-success btn-sm" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
								 <a href="#" class="btn btn-danger btn-sm" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
								</td>
							</tr>-->
							<?php //} ?>
							<?php for($l=0;$l<count($fig_representative);$l++){ ?>
							<tr>
								<td><?php echo ($fig_representative[$l]->member_type == 1)?'Farmer':'FPO'; ?></td>
								<td><?php echo $fig_representative[$l]->FIG_Name; ?></td>
								<td><?php echo $fig_representative[$l]->appointment_date; ?></td>
								<td><?php //echo $fig_representative[$l]->FIG_Name; ?></td>
								<td><?php if($fig_representative[$l]->status == 0){ echo 'Waiting for approval'; } else if($fig_representative[$l]->status == 2){ echo 'Rejected'; } ?></td>
								<td class="text-center">
									<a href="<?php echo base_url('fpo/approver/viewProfile/'.$fig_representative[$l]->id.'_3'); ?>" data-toggle="modal" data-target="#profileDetails" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									<?php if($fig_representative[$l]->status != 2){ ?>
									<a href="#" id="<?php echo $fig_representative[$l]->id.'_3'; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
									<a href="#" id="<?php echo $fig_representative[$l]->id.'_3'; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
									<?php } ?>
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

<div id="profileDetails" class="modal text-center">
	<div class="modal-dialog modal-dialog1">
		<div class="modal-content"></div>
	</div>
</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>	   
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#example').DataTable();
	$('a.approve').click(function(){
		var sourceValue = $(this).attr("id");
		var source_id = sourceValue.split("_");        
		//alert(source_id[0]+':'+source_id[1]);
		swal({
			title: 'Are you sure?',
			text: "Do you want to approve!",
			type: 'info',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
		if(result.value){  
			jQuery.ajax({
				url:"<?php echo base_url();?>fpo/approver/approveProfile/"+source_id[0]+"/"+source_id[1],
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response){
					//console.log(response);                
					response=response.trim();
					responseArray=$.parseJSON(response);				
					if(responseArray.status == 1){ 
						window.location.reload(); 
					}
				},
				error:function(response){
				swal('Sorry!', 'Error, While fetching records from table');
				} 			
			});
		}else {
		//swal("Cancelled", "You have cancelled the logout action", "info");
		return false;
		}
		});      
	});
	
	
	
	$('a.reject').click(function(){
		var sourceValue = $(this).attr("id");
		var source_id = sourceValue.split("_");        
		//alert(source_id[0]+':'+source_id[1]);
		swal({
			title: 'Do you want to reject!',
			input: 'textarea',
			inputPlaceholder: "Enter the reason",
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!',
         preConfirm: function (text) {
          return new Promise(function (resolve, reject) {
            setTimeout(function() {
              if (text == '') {
                swal.showValidationError('Please enter the reason.')
              }
              resolve()
            },100)
          })
          }
		}).then((result) => {
		if (result.value){  
			jQuery.ajax({
				url:"<?php echo base_url();?>fpo/approver/rejectProfile/"+source_id[0]+"/"+source_id[1],
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response){
					//console.log(response);                
					response=response.trim();
					responseArray=$.parseJSON(response);				
					if(responseArray.status == 1){ 
						window.location.reload();
					}
				},
				error:function(response){
					swal('Sorry!', 'Error, While fetching records from table');
				} 			
			});
		} else {
			return false;
		}
		});      
	});
});
</script>