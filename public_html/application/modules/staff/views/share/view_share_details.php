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
                        <h1>View Share Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?php echo base_url('staff/share/shareholders');?>">Shareholders</a></li>
                            <li><a class="active" href="">View Share Details</a></li>
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
									<th>Member Name</th>
									<th>Date of Allotment</th>
									<th>Certificate #</th>
									<th>Distinctive # (From and To Dates)</th>
									<th>Shares Held</th>
									<th>Nature of Allotment</th>
								  </tr>
								</thead>
								<tbody id="memberlist">
									<?php for($i=0;$i<count($share_details);$i++){ ?>
									<tr>
										<td class="text-left"><?php echo $share_details[$i]->shareholder_name; ?></td>
										<td><?php echo fpo_display_date($share_details[$i]->allotted_date); ?></td>
										<td><?php echo $share_details[$i]->certificate_num; ?></td>
										<td><?php echo $share_details[$i]->distinctive_from.' - '.$share_details[$i]->distinctive_to; ?></td>
										<td><?php echo $share_details[$i]->total_share_value; ?></td>
										<td>
											<?php 
												if($share_details[$i]->allotment_nature == 1) {
													echo "Original";
												}
												else if($share_details[$i]->allotment_nature == 2) {
													echo "Bonus";
												}
												else if($share_details[$i]->allotment_nature == 3) {
													echo "Right";
												}
											?>
										</td>
								   </tr>
								   <?php } ?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<div class="row">		
					<div class="col-md-12 text-center">
						<a href="<?php echo base_url('staff/share/shareholders');?>" id="ok" class="btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
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