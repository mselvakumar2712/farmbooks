<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
            <div class="loading" id="pageloadingWait" style="display:block;"></div>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>List Bank</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Master Data</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/masterdata/banklist');?>">List Bank</a></li>
                                <!--<li class="active">List FIG </li>-->
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="container">
                        <div class="" style="text-align:right;margin-bottom:20px;">

                        </div>
                    </div>
                    <form  action="<?php echo base_url('administrator/masterdata/banklist')?>" method="post" >
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="search_state">Select State <span class="text-danger">*</span></label>
                            <select class="form-control" id="search_state" name="search_state" required>
                                <option value="">Select State</option>
                                <?php for($i=0; $i<count($state_list);$i++) { ?>
                                <option value="<?php echo $state_list[$i]->state_code; ?>"<?php echo ($state_sel == $state_list[$i]->state_code?' selected="selected"':'');?>><?php echo $state_list[$i]->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="search_district">Select District <span class="text-danger">*</span></label>
                            <select class="form-control" id="search_district" name="search_district" required>
                                <option value="">Select District</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="search_bank_type">Bank Type<span class="text-danger">*</span></label>
                            <select class="form-control" id="search_bank_type" name="search_bank_type">
                              <?php for($i=0; $i<count($bank_type);$i++) { ?>
                                <option value="<?php echo $bank_type[$i]->id;?>"<?php echo ($bank_type_sel == $bank_type[$i]->id?' selected="selected"':'');?>><?php echo $bank_type[$i]->name;?></option>
                              <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-2 mt-4">
                            <button align="center" name="searchSubmit" id="searchSubmit" class="btn mt-1 btn-fs btn-success text-center" type="submit" style="padding: .375rem .25rem;"><i class="fa fa-search fa-1x" aria-hidden="true"></i> &nbsp;&nbsp;Search</button>
                        </div>

                        <div class="form-group col-md-2 mt-4">
                          <a href="<?php echo base_url('administrator/masterdata/addbank');?>" class="btn btn-success btn-labeled">
                              <i class="fa fa-plus-square"></i><span class="ml-2"> Add Bank</span>
                          </a>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Bank Name</th>
                                                <th>Branch Name</th>
                                                <th>IFSC Code</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="banklist">
                                            <?php $i=1; foreach($bank_info as $row): ?>
                                            <tr>
                                                <td><?php echo $row->name;?></td>
                                                <td><?php echo $row->branch_name; ?></td>
                                                <td class="text-uppercase"><?php echo $row->ifsc_code; ?></td>
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
                                                    <a href="<?php echo base_url('administrator/masterdata/viewbank/' . $row->id); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
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
        $('#example').DataTable();
        var district = '<?php echo $dist_sel;?>';
        var state = '<?php echo $state_sel;?>';
        getDistrictByState(state,district);
        $('#search_state').on('change', function(e){
            var stateCode = $(this).val();
            getDistrictByState(stateCode);
        });
        function getDistrictByState(stateCode,district=null) {
          $.ajax({
            url: "<?php echo base_url();?>administrator/farmer/getDistrictByState/" + stateCode,
            type: "GET",
            data: "",
            dataType: "html",
            cache: false,
            success: function(response) {
              response = response.trim();
              responseArray = $.parseJSON(response);
              if (responseArray.status == 1) {
                var search_district = '<option value="">Select District</option>';
                $.each(responseArray.district_list, function(key, value) {
                  if(district == value.district_code)
                    search_district += '<option value=' + value.district_code + ' selected="selected">' + value.name + '</option>';
                  else
                    search_district += '<option value=' + value.district_code + '>' + value.name + '</option>';
                });
                $('#search_district').html(search_district);
              }
            },
            error: function(response) {
              alert('Error!!! Try again');
            }
          });
        }
    });
</script>
