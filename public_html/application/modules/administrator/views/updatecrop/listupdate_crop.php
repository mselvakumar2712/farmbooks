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
                        <h1>Crop Master</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Crop Management</a></li>
                            <li><a href="#">Crop Master</a></li>
                            <li class="active">List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
			


        <div class="content mt-3">
            <div class="animated fadeIn">
               <div class="container">
					<div class="" style="text-align:right;margin-bottom:20px;" >
						<a href="<?php echo base_url('administrator/crop/addcropmaster');?>">
							<button type="button" class="btn btn-success btn-labeled">
								 <span class=""><i class="fa fa-plus-square"></i> Add Crop Master</span>
							</button>
						</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
							   <table id="bootstrap-data-table" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th>Crop Name</th>
										<th>Crop Category</th>
										<th>Crop Sub Category</th>
										<th>Crop Variety</th>
										<th>Tenure</th>
										<th>Harvesting Type</th>
										<th>Yield Measurement</th> 
										<th>Output</th> 
										<th>Action</th>
									  </tr>
									</thead>
									<tbody>
																	  
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