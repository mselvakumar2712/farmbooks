<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<?php
$creditValue = 0;
$debitValue = 0;
?>
<style>
    .table td,
    .table th {
        padding: 0.5rem;
    }

    #ledgerShowDiv {
        position: absolute;
        width: 100%;
        /* Full width (cover the whole page) */
        height: 100%;
        /* Full height (cover the whole page) */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        /* Black background with opacity */
        z-index: 2;
        /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer;
        /* Add a pointer on hover */
        padding: 25px 15px 15px 15px;
    }

    .ledgerShowTableBody {
        background-color: #fff;
    }
</style>

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
                            <h1>Trial Balance</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Finance</a></li>
                                <li><a class="active" href="<?php echo base_url('fpo/finance/trialbalance'); ?>">Trial Balance </a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/finance/postTrialBalance'); ?>" method="post" id="profit_loss_form" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="form-group col-md-5">
                                                    <label for="inputAddress2">From</label>
                                                    <input class="form-control" autofocus type="date" id="trial_from" name="trial_from" value="<?php echo $fromValue; ?>">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputAddress2">To</label>
                                                    <input class="form-control" type="date" id="trial_to" name="trial_to" value="<?php echo $toValue; ?>">
                                                </div>
                                                <div class="form-group col-md-2 mt-4">
                                                    <label for="inputAddress2"></label>
                                                    <button type="submit" class="btn btn-success" id="search_trail_ledger">Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive mt-3" id="trial_account_balance">

                                            <?php //if((isset($liablityGLData) && $liablityGLData!=0) || isset($netProfit)){ ?>
                                            <table class="table table-bordered">
                                                <tr bgcolor="#afd66b">
                                                    <th class="text-center">Ledger</th>
                                                    <th class="text-center">Credit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                                                    <th class="text-center">Debit ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                                                </tr>

                                                <tbody>
                                                    <?php
                            												if(isset($liablityGLData) && $liablityGLData!=0){
                            												foreach($liablityGLData As $glData){
                            												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1)" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <?php if(substr($glData->amount, 0, 1) != '-'){ ?>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2); //echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <td></td>
                                                        <?php $creditValue = $creditValue+$glData->amount; } else { ?>
                                                        <td></td>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2); //echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <?php $debitValue = ($debitValue) + ($glData->amount); } ?>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <!--<tr>
												<td width="60%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
												<td align="right" class="text-danger"><strong><?php //echo number_format(($liablityCost)?ltrim($liablityCost, '-'):0, 2);echo (substr($liablityCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
                                    <td align="right" class="text-danger"><strong><?php //echo number_format(($liablityCost)?ltrim($liablityCost, '-'):0, 2);echo (substr($liablityCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
                                 </tr>-->
                                                </tbody>

                                                <tbody>
                                                  <?php
                            											if(isset($assetGLData) && $assetGLData!=0){
                            												foreach($assetGLData As $glData){
                            												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1)" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <?php if(substr($glData->amount, 0, 1) != '-'){ ?>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <td></td>
                                                        <?php $creditValue = $creditValue+$glData->amount; } else { ?>
                                                        <td></td>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <?php $debitValue = ($debitValue) + ($glData->amount); } ?>
                                                    </tr>
                                                  <?php }} ?>
                                                </tbody>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <!--<tr>
												<td width="60%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
												<td align="right" class="text-danger"><strong><?php //echo number_format(($assetCost)?ltrim($assetCost, '-'):0, 2);echo (substr($assetCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
									         <td align="right" class="text-danger"><strong><?php //echo number_format(($assetCost)?ltrim($assetCost, '-'):0, 2);echo (substr($assetCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>-->
                                                </tbody>


                                                <tbody>
                                                    <?php
                            												if(isset($incomeGLData) && count($incomeGLData)!=0){
                            												foreach($incomeGLData As $glData){
                            												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1, 0, '')" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <?php if(substr($glData->amount, 0, 1) != '-'){ ?>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <td></td>
                                                        <?php $creditValue = $creditValue+$glData->amount; } else { ?>
                                                        <td></td>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <?php $debitValue = ($debitValue) + ($glData->amount); } ?>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <!--<tr>
												<td width="60%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
												<td align="right" class="text-danger"><strong><?php //echo number_format(($incomeCost)?ltrim($incomeCost, '-'):0,2);echo (substr($incomeCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
												<td align="right" class="text-danger"><strong><?php //echo number_format(($incomeCost)?ltrim($incomeCost, '-'):0,2);echo (substr($incomeCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
											</tr>-->
                                                </tbody>
                                                <tbody>                                                    
                                                    <?php
                            												if(isset($expenseGLData) && count($expenseGLData)!=0){
                            												foreach($expenseGLData As $glData){
                            												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1, 0, '')" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <?php if(substr($glData->amount, 0, 1) != '-'){ ?>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <td></td>
                                                        <?php $creditValue = $creditValue+$glData->amount; } else { ?>
                                                        <td></td>
                                                        <td align="right"><?php echo number_format(ltrim($glData->amount, '-'), 2);//echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                        <?php $debitValue = ($debitValue) + ($glData->amount); } ?>
                                                    </tr>
                                                    <?php }} ?>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="60%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
                                                        <td align="right" class="text-danger"><strong><?php echo number_format(($creditValue)?ltrim($creditValue, '-'):0, 2); echo (substr($creditValue, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
                                                        <td align="right" class="text-danger"><strong><?php echo number_format(($debitValue)?ltrim($debitValue, '-'):0, 2); echo (substr($debitValue, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php //} ?>

                                        </div>

                                        <div class='' id='ledgerShowDiv'>
                                            <div class='container'>
                                                <div class="table-responsive" id="ledgerShows">
                                                    <table class="table table-bordered" id='ledgerShowTable'>
                                                        <tbody>
                                                            <tr bgcolor="#afd66b">
                                                                <td colspan='3' align='right' onclick='closePopupTable()'><i class="fa fa-close" style="font-size:25px;color:red"></i></td>
                                                            </tr>
                                                        </tbody>

                                                        <tbody class=''>
                                                            <tr bgcolor="#afd66b">
                                                                <th width="40%" class="text-center"><strong>Account Name</strong></th>
                                                                <th width="40%" class="text-center"><strong>To Whom</strong></th>
                                                                <th class="text-center"><strong>Amount ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></th>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class='ledgerShowTableBody'>
                                                            <tr id='test'>
                                                                <td colspan='3'></td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr bgcolor="#afd66b">
                                                                <td colspan='3'></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
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
    if ('<?php echo $showPage; ?>' == 1) {
        $("#trial_account_balance").show();
    } else {
        $("#trial_account_balance").hide();
    }
    closePopupTable();


    $(document).ready(function() {
        $('#example').DataTable();
    });

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#trial_from').attr('max', maxDate);
    });

    /** Future date validations **/
    $("#trial_to").focusout(function() {
        var trial_to = $('#trial_to').val();
        var trial_from = $('#trial_from').val();
        if (trial_to != "" && trial_from != "" && trial_from > trial_to) {
            swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
        }
    });
    $("#trial_from").focusout(function() {
        var trial_from = $('#trial_from').val();
        var trial_to = $('#trial_to').val();
        if (trial_to != "" && trial_from != "" && trial_from > trial_to) {
            swal("Sorry!", "'From' date is not greater than the 'To' date", "warning");
        }
    });

    function getChildrenNodeByAccountCode(selectedCode, value, has_child, toggleID, person_type_id, person_id) {
        if (toggleID == 1) {
            if (value == 1) {
                var bgColor = '#DCDCDC';
                var forceStyle = 'text-indent: 100px;';
                var values = 2;
            } else if (value == 2) {
                var bgColor = '#e9e9e9';
                var forceStyle = 'text-align: center;';
                var values = 3;
            } else if (value == 3) {
                var bgColor = '';
                var forceStyle = 'text-align: center;';
                var values = 4;
            } else {
                var bgColor = '';
                var forceStyle = 'text-align: right;';
                var values = 5;
            }
            //var childNode = {'selectedCode':selectedCode, 'codeLength':value};
            if (has_child == 1) {
                var profit_loss_from = $("#trial_from").val();
                var profit_loss_to = $("#trial_to").val();
                var childList = {
                    "profit_loss_from": profit_loss_from,
                    "profit_loss_to": profit_loss_to,
                    "accountCode": selectedCode
                };
                //console.log(childList);
                $.ajax({
                    url: "<?php echo base_url();?>fpo/finance/getChildNodeByCode",
                    type: "POST",
                    data: childList,
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        //console.log(response);
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        if (responseArray.status == 1) {
                            var childNodeAppend = '';
                            $.each(responseArray.glCategory, function(key, value) {
                                if (value.has_child != 0) {
                                    childNodeAppend += '<tr class="row_' + value.account_code2 + '" id="' + value.account_code + '" onclick="getChildrenNodeByAccountCode(this.id, ' + values + ', ' + value.has_child + ', 1, ' +
                                        value.person_type_id + ')" bgcolor="' + bgColor + '">';
                                    childNodeAppend += '<td style="' + forceStyle + '"><span><strong>' + value.account_name + '</strong></span></td>';
                                    if (value.amount.charAt(0) != '-') {
                                        childNodeAppend += '<td><span style="float:right">' + parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</span>';
                                        childNodeAppend += '</td><td></td>';
                                    } else {
                                        childNodeAppend += '<td></td><td><span style="float:right">' + parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</span>';
                                        childNodeAppend += '</td>';
                                    }
                                    childNodeAppend += '</tr>';
                                } else {
                                    childNodeAppend += '<tr class="row_' + value.account_code2 + '" id="' + value.account_code + '" onclick="getChildrenNodeByAccountCode(this.id, ' + values + ', ' + value.has_child + ', 1, ' +
                                        value.person_type_id + ')" bgcolor="' + bgColor + '">';
                                    childNodeAppend += '<td style="' + forceStyle + '"><span><strong>' + value.account_name + '</strong></span></td>';
                                    if (value.amount.charAt(0) != '-') {
                                        childNodeAppend += '<td><span style="float:right">' + parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</span>';
                                        childNodeAppend += '</td><td></td>';
                                    } else {
                                        childNodeAppend += '<td></td><td><span style="float:right">' + parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</span>';
                                        childNodeAppend += '</td>';
                                    }
                                    childNodeAppend += '</tr>';
                                }
                            });
                            $(childNodeAppend).insertAfter("#" + selectedCode);
                            $("#" + selectedCode).attr('onclick', 'getChildrenNodeByAccountCode(' + selectedCode + ', ' + value + ', ' + has_child + ', 0)');
                        }
                    },
                    error: function(response) {
                        alert('Error!!! Try again');
                    }
                });
            } else {
                childNodeAppendLists(selectedCode.slice(0, -2), person_type_id);
            }
        } else {
            $('.row_' + selectedCode).toggle();
        }
    }

    function childNodeAppendLists(parentAccountCode, person_type_id, person_id) {
        $(".ledgerShowTableBody tr").remove();
        var profit_loss_from = $("#trial_from").val();
        var profit_loss_to = $("#trial_to").val();
        var childList = {
            "profit_loss_from": profit_loss_from,
            "profit_loss_to": profit_loss_to,
            "accountCode": parentAccountCode,
            "person_type_id": person_type_id,
            "person_id": person_id
        };
        $.ajax({
            url: "<?php echo base_url();?>fpo/finance/getAllChildNodeByCode",
            type: "POST",
            data: childList,
            dataType: "html",
            cache: false,
            success: function(response) {
                //console.log(response);
                response = response.trim();
                responseArray = $.parseJSON(response);
                var childNodeAppend = '';
                if (responseArray.glCategory != 0) {
                    $.each(responseArray.glCategory, function(key, value) {
                        if (value.has_child == 0) {
                            childNodeAppend += '<tr class="row_' + value.selectedCode + '" id="' + value.account_code + '">';
                            childNodeAppend += '<td width="45%" class="text-center"><strong>' + value.account_name + '</strong></td>';
                            if (value.debtor_name && value.debtor_name != undefined) {
                                childNodeAppend += '<td width="40%" class="text-center"><strong>' + value.debtor_name + '</strong></td>';
                            } else if (value.supplier_name && value.supplier_name != undefined) {
                                childNodeAppend += '<td width="40%" class="text-center"><strong>' + value.supplier_name + '</strong></td>';
                            } else {
                                childNodeAppend += '<td width="40%"></td>';
                            }
                            if (value.total_amount.charAt(0) != '-') {
                                childNodeAppend += '<td align="right" width="15%">' + parseFloat(value.total_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</td>';
                            } else {
                                childNodeAppend += '<td align="right" width="15%">' + parseFloat(value.total_amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + '</td>';
                            }
                            childNodeAppend += '</tr>';
                        }
                    });
                }
                $('#ledgerShowDiv').show();
                $(".ledgerShowTableBody").append(childNodeAppend);
            },
            error: function(response) {
                alert('Error!!! Try again');
            }
        });
    }

    function getDefaultByAccountCode(selectedCode, value, has_child, targetElemntId) {
        $('#' + targetElemntId).toggle();
    }

    function closePopupTable() {
        $('#ledgerShowDiv').hide();
    }
</script>
