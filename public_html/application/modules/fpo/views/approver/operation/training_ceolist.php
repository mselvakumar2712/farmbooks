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
    max-width: 950px !important;
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
                        <h1>List Training to CEO</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Approver</a></li>
							<li><a href="#">Operation</a></li>
                            <li><a class="active" href="#">List Training to CEO</a></li>
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
                           						
							<table id="example" class="table table-striped table-bordered">
							<thead>
							<tr>
                              <th>Commencement Date</th>
                              <th>No. of Days</th>
                              <th>Trainer Name</th>
                              <th>Training Institutes's Name</th>                             
                              <th>Cost Involved</th>
                              <th>Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody id="boardlist">						
								<?php for($i=0;$i<count($training_ceo);$i++){ ?>
								<tr> 
									<td><?php echo fpo_display_date($training_ceo[$i]->training_start_date); ?></td>
									<td><?php echo $training_ceo[$i]->no_of_days; ?></td>
									<td><?php echo $training_ceo[$i]->trainer_name; ?></td> 
									<td><?php echo $training_ceo[$i]->institute_name; ?></td>
									<td><?php echo ($training_ceo[$i]->cost_involved == 1)?'<i class="fa fa-rupee"></i> '.$training_ceo[$i]->cost_involved:'No';?></td>
									<td><?php if($training_ceo[$i]->status == 0){ echo 'Waiting for approval'; } else if($training_ceo[$i]->status == 2){ echo 'Rejected'; } ?></td>
									<td class="text-center">
										<a href="<?php echo base_url('fpo/approver/viewTrainingToCEO/'. $training_ceo[$i]->id); ?>" data-toggle="modal" data-target="#trainingToCEO" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
										<a href="#" id="<?php echo $training_ceo[$i]->id; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
										<a href="#" id="<?php echo $training_ceo[$i]->id; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
									</td>
								</tr>
								<?php } ?>		
							</tbody>
							</table>
							</div>
                        </div>
                    </div>
                  </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>

<div id="trainingToCEO" class="modal text-center">
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
				url:"<?php echo base_url();?>fpo/approver/approveTrainingtoCEO/"+sourceValue,
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
				url:"<?php echo base_url();?>fpo/approver/rejectTrainingtoCEO/"+sourceValue,
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
