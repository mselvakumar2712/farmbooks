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
                        <h1>List Notice to Directors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Operation Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/operation/noticelist');?>">List Notice to Directors</a></li>
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
								<a href="<?php echo base_url('staff/operation/addnotice');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add Notice to Directors</span>
									</button>
								</a>
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Date of Meeting</th>
								<th>Time</th>
								<th>Address</th>
								<th>Agenda</th>
								<th>Reason for Short Notice</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="noticelist">
							<?php  foreach($notice_list as $row): ?>
								<tr> 
								<td><?php echo fpo_display_date($row->meeting_date);?></td>	
								<td><?php  $time=$row->meeting_time;echo date('h:i a', strtotime($time));?></td>
								<td><?php echo $row->place_of_meeting;?></td>
								<td><?php echo $row->agenda;?></td>
								<td><?php echo $row->short_notice_reason?></td>
								<td>
								<a href="<?php echo base_url('staff/operation/editnotice/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
								<a href="<?php echo base_url('staff/operation/viewnotice/' . $row->id); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
								<a href="#" class="btn send btn-danger btn-sm mt-1" title="E-Mail"><i class="fa fa-envelope" aria-hidden="true" title="E-Mail"></i></a>							
								<a href="<?php echo base_url('staff/operation/boardnoticepdf/' . $row->id); ?>" class="btn btn-primary btn-sm mt-1" title="Download"><i class="fa fa-download" aria-hidden="true" title="Download"></i></a></td>
								</tr>
							<?php endforeach; ?>
							
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
	$('#example').DataTable();
	$('a.send').click(function() {	
	 swal({
         title: 'Mail Send Successfully',
         text: "",
         type: '',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'OK'
		}).then((result) => {
         if (result.value) {          
            $(this).prop("disabled", true);
            $.ajax({
              url: "",
              type: "POST",
              data: {
                
              },
              cache: false,
              success: function() {        
                 setTimeout(function() {
                  window.location.replace("");
                 }, 1000);
              },
              error: function() {
                 
                 setTimeout(function() {
                  swal("Error in progress. Try again!!!");
                 }, 1000);
              },
              complete: function() {
                 setTimeout(function() {
                  $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                 }, 1000);
              }
            });
         }else {
            swal("Cancelled", "Sending Mail is cancelled", "error");
            return false;
         }
      })
});
});


</script>