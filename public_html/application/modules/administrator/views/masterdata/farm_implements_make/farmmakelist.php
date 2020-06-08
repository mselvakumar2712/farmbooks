<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('templates/top.php');?>
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
                <div class="col-sm-5">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>List Farm Implements Make </h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Master Data</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/masterdata/farmimplementsmakelist');?>">List Farm Implements Make</a></li>
                                <!--<li class="active">List FIG </li>-->
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
                                    <table id="example" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Type of Implement</th>
                                                <th>Implement Name</th>
                                                <th>Make</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="farmmakelist">
                                            <?php  foreach($farm as $row): ?>
                                            <tr>
                                                <td><?php if ($row->Primary_Yes==1)
                                          				{
                                          				 echo "Primary";
                                          				}else if($row->Primary_Yes==2)
                                          				{
                                          				echo "Attachment";
                                          				}
                                          				?>
                                                </td>
                                                <td><?php echo $row->name;?></td>
                                                <td><?php echo $row->Make; ?></td>
                                                <td>
                                                    <?php if ($row->status==1)
                                            				{
                                            				 echo "Active";
                                            				}
                                            				else
                                            				{
                                            				echo "In Active";
                                            				}
                                            				?>
                                                </td>
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
        $('#example').DataTable({
            "aaSorting": []
        });

    });
</script>
