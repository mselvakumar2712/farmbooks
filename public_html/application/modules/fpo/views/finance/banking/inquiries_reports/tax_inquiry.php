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
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Tax Inquiry</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Finance</a></li>
                                <li><a class="active" href="<?php echo base_url('administrator/finance/taxinquiry');?>">Tax Inquiry</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/finance/taxinquiry')?>" method="post" id="taxFrm" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row ">
                                                <div class="form-group col-md-2"></div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputAddress2">From</label>
                                                    <input class="form-control" type="date" id="tax_from" name="tax_from" value="<?php echo $fromValue; ?>" max="<?php echo date("Y-m-d"); ?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="inputAddress2">To</label>
                                                    <input class="form-control" type="date" id="tax_to" name="tax_to" value="<?php echo $toValue; ?>" max="<?php echo date("Y-m-d"); ?>">
                                                </div>
                                                <div class="form-group col-md-3 mt-4">
                                                    <label for="inputAddress2"></label>
                                                    <input id="sendMessageButton" value="Search" class="btn btn-success  text-center mt-1" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr bgcolor="#afd66b">
                                                        <th class="text-center">Output GST</th>
                                                        <th class="text-center">SGST</th>
                                                        <th class="text-center">CGST</th>
                                                        <th class="text-center">IGST</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                  if($outputGST){
                                                    foreach ($outputGST as $key => $value) {
                                                  ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $key.'%';?></td>
                                                        <td class="text-right"><?php echo $sgst = isset($value['sgst'])?$value['sgst']:0;?></td>
                                                        <td class="text-right"><?php echo $cgst = isset($value['cgst'])?$value['cgst']:0;?></td>
                                                        <td class="text-right"><?php echo $igst = isset($value['igst'])?$value['igst']:0;?></td>
                                                        <td class="text-right"><?php echo $sgst+$cgst+$igst;?></td>
                                                    </tr>
                                                  <?php
                                                    }
                                                  }
                                                  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr bgcolor="#afd66b">
                                                        <th class="text-center">Input GST</th>
                                                        <th class="text-center">SGST</th>
                                                        <th class="text-center">CGST</th>
                                                        <th class="text-center">IGST</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                  if($inputGST){
                                                    foreach ($inputGST as $key => $value) {
                                                  ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $key.'%';?></td>
                                                        <td class="text-right"><?php echo $sgst = isset($value['sgst'])?$value['sgst']:0;?></td>
                                                        <td class="text-right"><?php echo $cgst = isset($value['cgst'])?$value['cgst']:0;?></td>
                                                        <td class="text-right"><?php echo $igst = isset($value['igst'])?$value['igst']:0;?></td>
                                                        <td class="text-right"><?php echo $sgst+$cgst+$igst;?></td>
                                                    </tr>
                                                  <?php
                                                    }
                                                  }
                                                  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr bgcolor="#afd66b">
                                                        <th class="text-center">Output GST</th>
                                                        <th class="text-center">Input GST</th>
                                                        <th class="text-center">Difference</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-right"><?php echo isset($GSTout)?$GSTout:'';?></td>
                                                        <td class="text-right"><?php echo isset($GSTin)?$GSTin:'';?></td>
                                                        <td class="text-right"><?php $diff = $GSTout-$GSTin;echo ($diff > 0)?abs($diff).' Dr':abs($diff).' Cr';?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
