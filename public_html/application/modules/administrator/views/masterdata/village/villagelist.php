<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">

<body>
    <div class="container-fluid pl-0 pr-0"> <?php $this->load->view('templates/side-bar.php');?>
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
          <?php $this->load->view('templates/menu-inner.php');?>
          <div class="loading" id="pageloadingWait" style="display:block;"></div>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>List Village </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Master Data</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/masterdata/villagelist');?>">List Village</a></li>
                                <!--<li class="active">List FIG </li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="container">
                        <div class="" style="text-align:right;margin-bottom:20px;"> <a href="<?php echo base_url('administrator/masterdata/addvillage');?>"> <button type="button" class="btn btn-success btn-labeled"> <i
                                      class="fa fa-plus-square"></i><span class="ml-2"> Add Village</span> </button> </a> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Village Code</th>
                                                <th>Village Name</th>
                                                <th>Village Name (In Local Language)</th> <!-- <th>Taluk Name</th> -->
                                                <th>Gram Panchayat</th>
                                                <th>Block</th>
                                                <th>District</th>
                                                <th>State</th> <!-- <th>Status</th>                                 <th>Action</th>	-->
                                            </tr>
                                        </thead>
                                        <tbody id="villagelist"> <?php $i=1; foreach($village_list as $row): ?> <tr>
                                                <td><?php $villageid = $row->id;                                    $village_id = str_pad($villageid, 7, '0', STR_PAD_LEFT);                                    echo $village_id;?></td>
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->name_local; ?></td> <!-- <td><?php echo $row->taluk_name; ?></td>-->
                                                <td><?php echo $row->panchayat_name; ?></td>
                                                <td><?php echo $row->block_name; ?></td>
                                                <td><?php echo $row->district_name; ?></td>
                                                <td><?php echo $row->state_name; ?></td>
                                                <!-- <td>                                    <?php if ($row->status==1)                                    {                                     echo "Active";                                                                }	                                    else                                    {                                    echo "In Active";                                    }                                    ?></td>																			                                     <td>                                    <a href="<?php echo base_url('administrator/masterdata/viewvillage/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>                                    </td>	-->
                                            </tr> <?php endforeach; ?> </tbody>
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
        $('#example').DataTable({
            "scrollX": true
        });
    });
</script>
