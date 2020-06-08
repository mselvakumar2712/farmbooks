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
                            <h1>Reconcile Bank Account</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Finance</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/finance/reconcilebankaccount');?>">Reconcile Bank Account </a></li>
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
                                    <form action="<?php echo base_url();?>fpo/finance/searchreconsile" method="post" id="frmSelectBank" name="frmSelectBank">
                                        <div class="row ">
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress2">Account<span class="text-danger">*</span></label>
                                                <select class="form-control" id="account" name="account" required="required" data-validation-required-message="Please select account.">
                                                    <option value="">Select Account </option>
                                                    <?php foreach($banks as $key=>$bank) { ?>
                        														<option value="<?php echo $bank->id; ?>"<?php echo $account == $bank->id?" selected='selected'":'';?>><?php echo $bank->bank_account_name; ?></option>
                        														<?php } ?>
                                                </select>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress2">From</label>
                                                <input class="form-control" type="date" id="tax_from" name="tax_from" value="<?php echo $fromValue; ?>" max="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputAddress2">To</label>
                                                <input class="form-control" type="date" id="tax_to" name="tax_to" value="<?php echo $toValue; ?>" max="<?php echo date("Y-m-d"); ?>">
                                            </div>
                                            <div class="form-group col-md-2 mt-4">
                                                <label for="inputAddress2"></label>
                                                <input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-1" type="submit">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr bgcolor="#afd66b">
                                                    <th class="text-center">Entry Date</th>
                                                    <th class="text-center">Particular</th>
                                                    <th class="text-center">Vochure Type</th>
                                                    <th class="text-center">Transaction Type</th>
                                                    <th class="text-center">Instrument Date</th>
                                                    <th class="text-center">Bank Date</th>
                                                    <th class="text-center">Credit</th>
                                                    <th class="text-center">Debit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><input class="form-control" type="date" id="reconcile_date" name="reconcile_date"></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h5 class="text-center text-success">Summary</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr bgcolor="#afd66b">
                                                    <th class="text-center">Balance As Per Bank Books</th>
                                                    <th class="text-center">Balance As Per Company</th>
                                                    <th class="text-center">Amount not reflected in Bank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="form-group col-md-12 text-center">
                                            <div id="success"></div>
                                            <input id="sendMessageButton" value="Reconcile" class="btn btn-success text-center" type="submit">
                                            <a href="<?php echo base_url();?>fpo/finance/reconcilebankaccount" class="btn btn-outline-dark">Reset</a>
                                        </div>
                                    </div>
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


    });
</script>
