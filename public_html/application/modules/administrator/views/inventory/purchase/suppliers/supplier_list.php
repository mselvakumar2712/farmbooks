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
                        <h1>List Suppliers  </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							<li><a href="#"> Inventory </a></li>
                            <li><a class="active" href="#">List Suppliers </a></li>
                            <!--<li class="active">List FPO Profile Management </li>-->
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
								<!--<div class="" style="text-align:right;margin-bottom:20px;" >
									<a href="<?php echo base_url('administrator/fpo/addfpo');?>">
										<button type="button" class="btn btn-success btn-labeled">
											<i class="fa fa-plus-square"></i><span class="ml-2"> Add FPO </span>
										</button>
									</a>
								</div> -->
							</div>
						  <table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Supplier Name</th>
								<th>State</th>
								<th>District</th>
								<th>Address</th>
								<th>Status</th> 
							 </tr>
							</thead>
							<tbody id="fpolist">
							<?php foreach($supplier_info as $row): ?>
									<tr> 							
										<td><a href="<?php echo base_url('administrator/Inventory/viewsupplier/' . $row->supplier_id)?>"><?php echo $row->supp_name; ?></a></td>
										<td><?php echo $row->state_name; ?></td>
										<td><?php echo $row->district_name; ?></td>
										<td><?php echo $row->mailing_street?>,<?php echo $row->mailing_pincode?></td>
										<td>
										<?php if ($row->status==1)
										{
										 echo "Active";                            
										}	
										else
										{
										echo "In Active";
										}
										?></td>																			 							
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

<script type="text/javascript">
$(document).ready(function() {
	$('#example').DataTable();		
});
</script>

</body>
</html>