<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
    .table td,
    .table th {
        padding: 0.5rem;
    }

    #ledgerShowDiv, #salePurchaseShowDiv {
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

    .ledgerShowTableBody, .salepurShowTableBody {
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
                            <h1>Balance Sheet</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Finance</a></li>
                                <li><a class="active" href="<?php echo base_url('fpo/finance/balancesheetdrilldown');?>">Balance Sheet Drilldown</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/finance/balanceSheetReports')?>" method="post" id="balance_sheet_report" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <form action="<?php echo base_url('fpo/finance/balanceSheetReports')?>" method="post" id="balance_sheet" name="sentMessage" novalidate="novalidate">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <h3 class="text-capitalize"><b><?php echo $fpoData[0]->producer_organisation_name; ?></b></h3>
                                                        <h5><?php echo $fpoData[0]->village_name.' , '.$fpoData[0]->panchayat_name; ?></h5>
                                                        <h5><?php echo $fpoData[0]->block_name.' , '.$fpoData[0]->taluk_name.' , '. $fpoData[0]->district_name; ?></h5>
                                                        <h5><?php echo $fpoData[0]->state_name.' , '.$fpoData[0]->pin_code; ?></h5>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="form-group col-md-8">
                                                            <label for="inputAddress2">As at</label>
                                                            <input class="form-control" type="date" autofocus id="as_at" name="as_at" value="<?php echo $toValue; ?>" min="<?php echo $fromValue; ?>">
                                                        </div>
                                                        <div class="form-group col-md-4"></div>
                                                        <div class="form-group col-md-12">
                                                            <label for="inputAddress2"></label>
                                                            <button id="sendMessageButton" class="btn btn-success text-center mt-1" type="submit">Show</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>


                                        <div class="table-responsive mt-3" id="bal_sheet_account_balance">
                                            <table class="table table-bordered">
                                                <tr bgcolor="#afd66b">
                                                    <th class="text-center">Liability</th>
                                                    <th class="text-center">Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                                                </tr>

                                                <tbody>
                                                    <?php
                                    $cur_liab = 0;
                                    $debts = 0;
												if(isset($liablityGLData) && $liablityGLData!=0){
												foreach($liablityGLData As $glData){
                                       if($glData->account_code == '303')
                                          $cur_liab = $glData->amount;
                                       if($glData->account_code == '302')
                                          $debts = $glData->amount;
												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1)" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <td align="right"><?php echo money_format("%!n",ltrim($glData->amount, '-'));echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                    </tr>
                                                    <?php }} ?>

                                                    <?php if(isset($netProfit) && $netProfit!=0){ ?>
                                                    <tr id="row_p_and_l" bgcolor="#A9A9A9" onclick="getDefaultByAccountCode(this.id, 1, 1, 'row_p_and_l_1')">
                                                        <td><strong>Reserves & Surplus</strong></td>
                                                        <td align="right"><?php echo money_format("%!n",ltrim($netProfit, '-'));echo (substr($netProfit, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                    </tr>
                                                    <tr id="row_p_and_l_1" bgcolor="#DCDCDC" style="display: none;">
                                                        <td align="center"><strong>Profit & Loss Account</strong></td>
                                                        <td align="right"><?php echo money_format("%!n",ltrim($netProfit, '-'));echo (substr($netProfit, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
                                                        <td align="right" class="text-danger"><strong><?php echo ($liablityCost)?money_format("%!n",ltrim($liablityCost, '-')):"0.00";echo (substr($liablityCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <table class="table table-bordered">
                                                <tr bgcolor="#afd66b">
                                                    <th class="text-center">Assets</th>
                                                    <th class="text-center">Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                                                </tr>

                                                <tbody>
                                                    <?php
                                    $cur_asst = 0;
												if(isset($assetGLData) && $assetGLData!=0){
												foreach($assetGLData As $glData){
                                       if($glData->account_code == '402')
                                          $cur_asst = $glData->amount;
												?>
                                                    <tr id="<?php echo $glData->account_code; ?>" onclick="getChildrenNodeByAccountCode(this.id, 1, <?php echo $glData->has_child; ?>, 1)" bgcolor="#A9A9A9">
                                                        <td><strong><?php echo $glData->account_name; ?></strong></td>
                                                        <td align="right"><?php echo money_format("%!n",ltrim($glData->amount, '-'));echo (substr($glData->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                    </tr>
                                                    <?php }} ?>
                                                    <?php if(isset($closingStock) && $closingStock!=0){ ?>
                                                    <tr id="row_closing" bgcolor="#A9A9A9">
                                                        <td><strong>Closing Stock</strong></td>
                                                        <td align="right"><?php echo money_format("%!n",ltrim($closingStock, '-'));echo (substr($closingStock, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>

                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80%" class="text-right text-danger"><strong>Total ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></td>
                                                        <td align="right" class="text-danger"><strong><?php echo ($assetCost)? money_format("%!n",ltrim($assetCost, '-')):"0.00";echo (substr($assetCost, 0, 1) == '-')?' Dr':' Cr'; ?></strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <table class="table table-bordered">
                                                <tbody>
                                                    <?php if($ledgerBalance!=0){ ?>
                                                    <tr id="row_closing">
                                                        <td width="80%" class="text-right text-danger font-weight-bold">Opening Balance Difference ( <span class="fa fa-inr" aria-hidden="true"></span> )</td>
                                                        <td align="right" class="text-right text-danger font-weight-bold"><?php echo money_format("%!n",ltrim($ledgerBalance, '-'));echo (substr($ledgerBalance, 0, 1) == '-')?' Cr':' Dr'; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td width="80%" class="text-right text-danger font-weight-bold">Current Ratio</td>
                                                        <td align="right" class="text-right text-danger font-weight-bold">
                                                            <?php
                                       $cur_liab1 = $cur_liab+(isset($netProfit)?$netProfit:0);
                                       $cur_liab = abs($cur_liab+(isset($netProfit)?$netProfit:0));
                                       $cur_asst = abs($cur_asst+(isset($closingStock)?$closingStock:0));
                                       $asset_rto = number_format(($cur_asst>0?$cur_asst:1)/($cur_liab>0?$cur_liab:1),2,'.',',');
                                       echo $asset_rto." : 1";
                                    ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody>
                                                    <tr>
                                                        <td width="80%" class="text-right text-danger font-weight-bold">Debt / Equity Ratio</td>
                                                        <td align="right" class="text-right text-danger font-weight-bold">
                                                            <?php
                                          $liabilities = abs($liablityCost-$debts);
                                          $eqty_rto = number_format(abs(abs($debts) > 0?$debts:1)/($liabilities > 0?$liabilities:1),2);
                                          echo "1 : ".$eqty_rto;
                                       ?>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
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
                                        <div class='' id='salePurchaseShowDiv'>
                                            <div class='container'>
                                                <div class="table-responsive" id="ledgerShows">
                                                    <table class="table table-bordered" id='ledgerShowTable'>
                                                        <tbody>
                                                            <tr bgcolor="#afd66b">
                                                                <td colspan='5' align='right' onclick='closePopupTable()'><i class="fa fa-close" style="font-size:25px;color:red"></i></td>
                                                            </tr>
                                                        </tbody>

                                                        <tbody class=''>
                                                            <tr bgcolor="#afd66b">
                                                                <th width="20%" class="text-center"><strong>Account Name</strong></th>
                                                                <th width="15%" class="text-center"><strong>Vochure No</strong></th>
                                                                <th width="15%" class="text-center"><strong>Date</strong></th>
                                                                <th width="30%" class="text-center"><strong>To Whom</strong></th>
                                                                <th class="text-center"><strong>Amount ( <span class="fa fa-inr" aria-hidden="true"></span> )</strong></th>
                                                            </tr>
                                                        </tbody>
                                                        <tbody class='salepurShowTableBody'>
                                                            <tr id='test'>
                                                                <td colspan='3'></td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr bgcolor="#afd66b">
                                                                <td colspan='5'></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
    if ( <?php echo $showPage; ?> == 1) {
        $("#bal_sheet_account_balance").show();
    } else {
        $("#bal_sheet_account_balance").hide();
    }

    closePopupTable();

    $(document).ready(function() {
        var today = new Date();
        var passedDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        //balanceSheetValue(passedDate);
    });


    function getChildrenNodeByAccountCode(selectedCode, value, has_child, toggleID, person_type_id) {
        //alert(selectedCode);
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
            selectedValue = value;
            //var childNode = {'selectedCode':selectedCode, 'codeLength':value};
            if (has_child == 1) {
                var profit_loss_to = $("#as_at").val();
                var childList = {
                    "profit_loss_from": "",
                    "profit_loss_to": profit_loss_to,
                    "accountCode": selectedCode
                };

                $.ajax({
                    url: "<?php echo base_url();?>fpo/finance/getChildNodeByCode",
                    type: "POST",
                    data: childList,
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        if (responseArray.status == 1) {
                            var childNodeAppend = '';
                            $.each(responseArray.glCategory, function(key, value) {
                                if (value.has_child != 0) {
                                    childNodeAppend += '<tr class="row_' + value.account_code2 + '" id="' + value.account_code + '" onclick="getChildrenNodeByAccountCode(this.id, ' + values + ', ' + value.has_child + ', 1, ' +
                                        value.person_type_id + ')" bgcolor="' + bgColor + '">';
                                    childNodeAppend += '<td style="' + forceStyle + '"><span><strong>' + value.account_name + '</strong></span>';
                                    if (value.amount.charAt(0) != '-') {
                                        childNodeAppend += '<span style="float:right">' + parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Cr</span>';
                                    } else {
                                        childNodeAppend += '<span style="float:right">' + parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Dr</span>';
                                    }
                                    //if(value.amount.charAt(0) != '-'){
                                    //childNodeAppend += '<td align="left">'+parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</td>';
                                    //} else {
                                    //childNodeAppend += '<td align="left">'+parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</td>';
                                    //}
                                    childNodeAppend += '</td><td></td></tr>';
                                } else {
                                    childNodeAppend += '<tr class="row_' + value.account_code2 + '" id="' + value.account_code + '" onclick="getChildrenNodeByAccountCode(this.id, ' + values + ', ' + value.has_child + ', 1, ' +
                                        value.person_type_id + ')" bgcolor="' + bgColor + '">';
                                    childNodeAppend += '<td style="' + forceStyle + '"><span><strong>' + value.account_name + '</strong></span>';
                                    if (value.amount.charAt(0) != '-') {
                                        childNodeAppend += '<span style="float:right">' + parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Cr</span>';
                                    } else {
                                        childNodeAppend += '<span style="float:right">' + parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Dr</span>';
                                    }
                                    //if(value.amount.charAt(0) != '-'){
                                    //childNodeAppend += '<td align="left">'+parseFloat(value.amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Cr</td>';
                                    //} else {
                                    //childNodeAppend += '<td align="left">'+parseFloat(value.amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+' Dr</td>';
                                    //}
                                    childNodeAppend += '</td><td></td></tr>';
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
                //swal("", "Don't have the child group", 'warning');
                childNodeAppendLists(selectedCode.slice(0, -2), person_type_id);
            }
        } else {
            $('.row_' + selectedCode).toggle();
        }
    }


    function getDefaultByAccountCode(selectedCode, value, has_child, targetElemntId) {
        $('#' + targetElemntId).toggle();
    }

    function childNodeAppendLists(parentAccountCode, person_type_id) {
        $(".ledgerShowTableBody tr").remove();
        $(".salepurShowTableBody tr").remove();
        var profit_loss_to = $("#as_at").val();
        var childList = {
            "profit_loss_from": "",
            "profit_loss_to": profit_loss_to,
            "accountCode": parentAccountCode,
            "person_type_id": person_type_id
        };
        //console.log(childList);
        $.ajax({
            url: "<?php echo base_url();?>fpo/finance/getAllChildNodeByCode",
            type: "POST",
            data: childList,
            dataType: "html",
            cache: false,
            success: function(response) {
                console.log(response);
                response = response.trim();
                responseArray = $.parseJSON(response);
                var childNodeAppend = '';
                if (responseArray.glCategory != 0) {
                    $.each(responseArray.glCategory, function(key, value) {
                        if (value.has_child == 0) {
                            childNodeAppend += '<tr class="row_' + value.selectedCode + '" id="' + value.account_code + '">';
                            childNodeAppend += '<td class="text-center"><strong>' + value.account_name + '</strong></td>';
                            if (value.voucher_no) {
                                childNodeAppend += '<td align="left">' + value.voucher_no + '</td>';
                            }
                            if (value.tran_date) {
                                childNodeAppend += '<td align="left">' + value.tran_date + '</td>';
                            }
                            if (value.debtor_name && value.debtor_name != undefined) {
                                childNodeAppend += '<td class="text-center"><strong>' + value.debtor_name + '</strong></td>';
                            } else if (value.supplier_name && value.supplier_name != undefined) {
                                childNodeAppend += '<td class="text-center"><strong>' + value.supplier_name + '</strong></td>';
                            } else {
                                childNodeAppend += '<td></td>';
                            }
                            if (value.total_amount.charAt(0) != '-') {
                                childNodeAppend += '<td align="right" width="15%">' + parseFloat(value.total_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Cr</td>';
                            } else {
                                childNodeAppend += '<td align="right" width="15%">' + parseFloat(value.total_amount.substr(1)).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' Dr</td>';
                            }
                            childNodeAppend += '</tr>';
                        }
                    });
                }
                if(parentAccountCode == '30302' || parentAccountCode == '40202'){
                  $('#salePurchaseShowDiv').show();
                  $(".salepurShowTableBody").append(childNodeAppend);
                }else{
                  $('#ledgerShowDiv').show();
                  $(".ledgerShowTableBody").append(childNodeAppend);
                }
            },
            error: function(response) {
                alert('Error!!! Try again');
            }
        });
    }

    function closePopupTable() {
        $('#ledgerShowDiv').hide();
        $('#salePurchaseShowDiv').hide();
    }
</script>
