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
                            <h1>List Crop Name Master</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo base_url("administrator/cropmaster");?>">Crop Masters</a></li>
                                <li><a href="<?php echo base_url("administrator/name");?>">Crop Name Master</a></li>
                                <li class="active">List Crop Name Master </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="container">
                        <div class="" style="text-align:right;margin-bottom:20px;">
                            <a href="<?php echo base_url('administrator/name/addname');?>">
                                <button type="button" class="btn btn-success btn-labeled">
                                    <i class="fa fa-plus-square"></i><span class="ml-2"> Add Crop Name Master</span>
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
                                                <th width="20%">Crop Category</th>
                                                <th width="20%">Crop Sub Category</th>
                                                <th width="25%">Crop Name</th>
                                                <th width="25%">Crop Local</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="namemaster_list">

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
            $.ajax({
                url: "<?php echo base_url();?>administrator/name/namelist",
                type: "POST",
                dataType: "html",
                cache: false,
                success: function(response) {
                    console.log(response);
                    response = response.trim();
                    responseArray = $.parseJSON(response);
                    if (responseArray.status == 1) {
                        var namemaster_list = "";
                        var count = 1;
                        $.each(responseArray.name_list, function(key, value) {
                            var sno = count++;
                            namemaster_list += '<tr><td>' + value.category_name + '</td><td>' + value.subcategory_name + '</td><td>' + value.name + '</td><td>' + value.name_local + '</td><td><a href="<?php echo base_url("administrator/name/viewname?id=' +
                                value.id + '");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
                        });
                        $('#namemaster_list').html(namemaster_list);
                        $('#example').DataTable({"aaSorting": []});
                    }
                },
                error: function() {
                    //alert('Error!!! Try again');
                    $('#example').DataTable({"aaSorting": []});
                }

            });
        });
    </script>
</body>

</html>
