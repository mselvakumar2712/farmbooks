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
        <div id="right-panel" class="right-panel"> <?php $this->load->view('templates/menu-inner.php');?> <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>List Product FPO Mapping</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Master Data</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/masterdata/productfpolist');?>">List Product FPO Mapping</a></li>
                                <!--<li class="active">List FIG </li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="container">
                        <div class="" style="text-align:right;margin-bottom:20px;"> <a href="<?php echo base_url('administrator/masterdata/addproductfpo');?>"> <button type="button" class="btn btn-success btn-labeled"> <i
                                      class="fa fa-plus-square"></i><span class="ml-2"> Add Product FPO Mapping</span> </button> </a> </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name of the FPO</th>
                                                <th>Product</th>
                                                <th>Product Category</th>
                                                <th>Product Sub Category</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productfpolist">
                                            <?php $i=1; foreach($product as $row): ?>
                                            <tr>
                                                <td>
                                                  <?php $get_fpo=$row->fpo_id;
                              										for($i=0; $i<count($fpo);$i++) {
                              											if($fpo[$i]->user_id==$get_fpo){
                              												echo $fpo[$i]->producer_organisation_name;
                              											}
                              										}?>
                                                </td>
                                                <td><?php echo $row->product_name;?>
                                                </td>
                                                <td><?php echo $row->category_name;?></td>
                                                <td><?php echo $row->subcategory_name;?></td>
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
                                                <td>
                                                    <a href="<?php echo base_url('administrator/masterdata/viewproductfpo/' . $row->id); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
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
