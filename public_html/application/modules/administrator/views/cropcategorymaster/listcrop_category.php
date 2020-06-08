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
                            <h1>List Crop Category Master</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                                <li><a href="<?php echo base_url("administrator/category");?>">Crop Category Master</a></li>
                                <li class="active">List Crop Category </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="container">
                        <div class="" style="text-align:right;margin-bottom:20px;">
                            <a href="<?php echo base_url('administrator/category/addcategory');?>">
                                <button type="button" class="btn btn-success btn-labeled">
                                    <i class="fa fa-plus-square"></i><span class="ml-2"> Add Crop Category Master</span>
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
                                                <th>Crop category</th>
                                                <th>Local</th>
                                                <th>Status</th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="category_list">
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

            //POPI list API CALL
            $.ajax({
                url: "<?php echo base_url();?>administrator/category/categorylist",
                type: "POST",
                data: "",
                dataType: "html",
                cache: false,
                success: function(response) {
                    console.log(response);
                    //alert(response);
                    response = response.trim();
                    responseArray = $.parseJSON(response);
                    //console.log(responseArray.fpolist);
                    if (responseArray.status == 1) {
                        var category_list = "";
                        $.each(responseArray.category_list, function(key, value) {
                            category_list += '<tr><td>' + value.name + '</td><td>' + value.name_local + '</td><td>' + (value.status == 1 ? 'Active' : 'Inactive') + '<td><a href="<?php echo base_url("administrator/category/viewcategory?id=' + value.id +
                                '");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';

                            //console.log(value);
                        });
                        $('#category_list').html(category_list);
                        $('#example').DataTable();
                    }
                },
                error: function() {
                    $('#example').DataTable();
                }
            });
        });
    </script>

</body>

</html>
