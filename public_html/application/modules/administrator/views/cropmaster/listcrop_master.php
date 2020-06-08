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
              <h1>List Crop Master</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="page-header float-right">
            <div class="page-title">
              <ol class="breadcrumb text-right">
                <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Master</a></li>
                <li class="active">List Crop Master </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="content mt-3">
        <div class="animated fadeIn">
          <div class="container">
            <div class="" style="text-align:right;margin-bottom:20px;">
              <a href="<?php echo base_url('administrator/cropmaster/addcrop');?>">
                <button type="button" class="btn btn-success btn-labeled">
                  <i class="fa fa-plus-square"></i><span class="ml-2">Add Crop Master</span>
                </button>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <table id="example" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="18%">Crop Category</th>
                        <th>Crop Sub Category</th>
                        <th>Crop Name</th>
                        <th>Crop Variety</th>
                        <th width="18%">Tenure</th>
                        <th width="15%">Harvesting Commence</th>
                        <!--<th>Output</th>-->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($crop_list as $key => $crop) {?>
                      <tr>
                        <td width="18%"><?php echo $crop->category_name;?></td>
                        <td><?php echo $crop->subcategory_name;?></td>
                        <td><?php echo $crop->crop_name;?></td>
                        <td><?php echo $crop->variety_name;?></td>
                        <td width="18%"><?php echo round($crop->tenure,1). ' to '. round($crop->tenure_to,1); echo ($crop->tenure_unit == 1 ? ' Years' : ' Days');?></td>
                        <td><?php echo $crop->harvesting_commence; echo ($crop->tenure_unit == 1 ? $crop->harvesting_commence > 90 ?'Days':'Years' : 'Days');?></td>
                        <!--<td><?php echo $crop->crop_output;?></td>-->
                        <td><a href="<?php echo base_url("administrator/cropmaster/viewcrop?id=".$crop->id);?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td>
                      </tr>
                    <?php }?>
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
  <script>
    $(document).ready(function() {
      $('#example').DataTable({"aaSorting": []});
    });
  </script>
</body>

</html>
