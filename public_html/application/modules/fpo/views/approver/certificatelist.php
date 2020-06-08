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
                        <h1>List of Share Certificate</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Approver</a></li>
							<li><a href="#">Share</a></li>
                            <li><a class="active" href="#">List of Share Certificate</a></li>
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
								<th>Folio Number</th>
								<th>No. of Shares</th>
								<th>Certificate No.</th>
								<th>Distinctive Number From</th>
								<th>Distinctive Number To</th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="certificatelist">
							<?php for($i=0;$i<count($share_history);$i++){ ?>
							<tr>
								<td><?php echo $share_history[$i]->folio_number; ?></td>
								<td><?php echo $share_history[$i]->total_share_value; ?></td>
								<td><?php echo $share_history[$i]->certificate_num; ?></td>
								<td><?php echo $share_history[$i]->distinctive_from; ?></td>
								<td><?php echo $share_history[$i]->distinctive_to; ?></td>
								<td><?php if($share_history[$i]->status == 0){ echo 'Waiting for approval'; } else if($share_history[$i]->status == 2){ echo 'Rejected'; } ?></td>
								<td class="text-center">
									<a href="<?php echo base_url('fpo/approver/shareHistoryView/'. $share_history[$i]->id);?>" id="<?php echo $share_history[$i]->id; ?>" data-toggle="modal" data-target="#ShareCertificateDetails" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									<a href="#" id="<?php echo $share_history[$i]->id; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
									<a href="#" id="<?php echo $share_history[$i]->id; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
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
   <div id="ShareCertificateDetails" class="modal text-center">
      <div class="modal-dialog modal-dialog1">
         <div class="modal-content">
         </div>
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
				url:"<?php echo base_url();?>fpo/approver/approveShareCertificate/"+sourceValue,
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
					swal.showValidationError('Provide the reason')
				  }
				  resolve()
				},100)
				})
			}
		}).then((result) => {
		if (result.value){  
			jQuery.ajax({
				url:"<?php echo base_url();?>fpo/approver/rejectShareCertificate/"+sourceValue,
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