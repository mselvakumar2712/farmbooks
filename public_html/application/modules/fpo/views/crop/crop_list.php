<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
      <div class="loading" id="pageloadingWait" style="display:none;"></div>

      <div class="breadcrumbs">
        <div class="col-sm-4">
          <div class="page-header float-left">
            <div class="page-title">
              <h1>List Crop</h1>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="page-header float-right">
            <div class="page-title">
              <ol class="breadcrumb text-right">
                <li><a href="<?php echo base_url("fpo/crop");?>">Crop Management</a></li>
                <li class="active">Crop List</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="content mt-3">
        <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo $this->session->flashdata('success');?></strong>
        </div>
        <?php } elseif ($this->session->flashdata('danger')) {?>
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo $this->session->flashdata('danger');?></strong>
        </div>
        <?php } elseif ($this->session->flashdata('info')) {?>
        <div class="alert alert-info alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo $this->session->flashdata('info');?></strong>
        </div>
        <?php } elseif ($this->session->flashdata('warning')) {?>
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
                  <div class="container">
                    <div class="" style="text-align:right;margin-bottom:20px;">
                      <a href="<?php echo base_url('fpo/crop/addcrop'); ?>">
                        <button type="button" class="btn btn-success btn-labeled">
                          <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Crop Entry</span>
                        </button>
                      </a>
                    </div>
                  </div>
                  <table id="example" class="table table-striped table-bordered">
                    <thead>
                      <tr class="">
                        <th>Farmer/Member Name</th>
                        <th>Village</th>
                        <th>Crop</th>
                        <th>Variety</th>
                        <th>Date of Seeding/Sowing</th>
                        <th>Expected Date of Harvest</th>
                        <th>Action</th>
                        <th width="16%">Post Action</th>
                      </tr>
                    </thead>
                    <tbody id="">
                      <?php for ($i=0;$i<count($crop_list);$i++) { ?>
                      <tr>
                        <td><?php echo $crop_list[$i]->profile_name; ?></td>
                        <td><?php echo ($crop_list[$i]->village_name)?$crop_list[$i]->village_name:""; ?></td>
                        <td><?php echo $crop_list[$i]->crop_name; ?></td>
                        <td><?php echo $crop_list[$i]->variety_name; ?></td>
                        <td><?php echo fpo_display_date($crop_list[$i]->seedling_date); ?></td>
                        <td><?php echo $crop_list[$i]->expected_harvest_date; ?></td>
                        <td class="text-center" width="10%"><a href="<?php echo base_url("fpo/crop/edit_crop/".$crop_list[$i]->id);?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a
                            href="<?php echo base_url("fpo/crop/viewcrop/".$crop_list[$i]->id);?>" class="btn btn-warning btn-sm ml-1" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td>
                        <td><a href="<?php echo base_url("fpo/updatecrop/index");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/fertilizer.png");?>" class="img-responsive center-block" title="Update Crop List"></a><a
                            href="<?php echo base_url("fpo/updatecrop/cropharvest");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/harvest.png");?>" class="img-responsive center-block" title="Crop Harvest List"></a><a
                            href="<?php echo base_url("fpo/updatecrop/postharvest");?>" class="btn btn-sm" title="Edit"><img src="<?php echo base_url("assets/img/post_harvest.png");?>" class="img-responsive center-block"
                              title="Post Harvest List"></a></td>
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
</body>

</html>
