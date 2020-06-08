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
                        <h1>List Shareholders</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Shareholders</a></li>
                            <li><a class="active" href="">Shareholders</a></li>
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
								<th>Folio Number</th>
								<th>Member Type</th>
                                <th>Member Name</th>
                                <th>Mobile Number</th>
								<th>Shares Held</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="memberlist">
                                <?php for($i=0;$i<count($shareholders_list);$i++){ ?>
                                <tr>
									<td class="text-left"><?php echo $shareholders_list[$i]->folio_number; ?></td>
									<td><?php 
										if($shareholders_list[$i]->member_type== 1) {
											echo "Person"; 
										}
										else if($shareholders_list[$i]->member_type == 2) { 
											echo "Producer Organisation"; 
										}
										?>
									</td>
									<td><?php echo $shareholders_list[$i]->shareholder_name; ?></td>
									<td><?php echo $shareholders_list[$i]->mobile_no; ?></td>
									<td><?php echo $shareholders_list[$i]->total_share_value; ?></td>
									<td><a href="<?php echo base_url('administrator/share/viewsharedetails/' . $shareholders_list[$i]->folio_number); ?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td>
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

<script type="text/javascript">
	$(document).ready(function() {          

		$('#example').DataTable({"order":[]});

	});
</script>
   
</body>
</html>