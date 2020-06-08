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
                     <h1><?php echo $page;?></h1>
                     </div>
                  </div>
               </div>
               <div class="col-sm-8">
                  <div class="page-header float-right">
                     <div class="page-title">
                     <ol class="breadcrumb text-right">
                     <li class="active"></li>
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
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="cropmasterlist"></tbody>
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