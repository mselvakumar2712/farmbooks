<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
    .select2-container .select2-selection--single .select2-selection__rendered {
        border-color: green ! important;
        display: block;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        font-style: italic ! important;
        overflow: hidden ! important;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s;
    }

    .select2-container {
        box-sizing: border-box;
        display: inline-block;
        margin: 0;
        width: 272px ! important;
        position: relative;
        vertical-align: middle;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: none !important;
        border-radius: 4px;
    }

    .tax_detail {
        border: none;
        border-color: transparent;
        width: 100px;
    }

    .seLineTotal {
        width: 70%;
        float: left;
    }

    .seAddBtn {
        float: left;
        margin-left: 10px;
    }

    .lblIncludeGST {
        float: left;
        margin-top: 5px;
    }

    .includeGST {
        float: left;
        margin-left: 10px;
        margin-top: 5px;
    }

    .seLineCGST {
        float: right;
        margin-left: 10px;
    }

    .seLineSGST {
        float: right;
        margin-left: 10px;
    }

    .seLineIGST {
        float: right;
        margin-left: 10px;
    }

    #remove_0 {
        display: none;
    }

    .low-padded tbody td {
        padding: .3rem .1rem;
        text-align: center;
    }
</style>

<body <?php  if ($page_title == 'Purchase Entry' and $page_module == 'inventory') {
    echo 'class="open"';
} elseif ($page_title == 'Purchase Entry'  and $page_module == 'finance') {
    echo 'class="open"';
}?>>
    <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Purchase</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Inventory</a></li>
                                <li><a class="active">Purchase</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('success');?></strong>
                </div>
                <?php } elseif ($this->session->flashdata('danger')) {?>
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('danger');?></strong>
                </div>
                <?php } elseif ($this->session->flashdata('info')) {?>
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('info');?></strong>
                </div>
                <?php } elseif ($this->session->flashdata('warning')) {?>
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo $this->session->flashdata('warning');?></strong>
                </div>
                <?php }?>
                <div class="animated fadeIn">
                    <?php if ($page_module == 'inventory') {?>
                        <form action="<?php echo base_url('fpo/inventory/post_purchase_entry')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate">
                    <?php  } elseif ($page_module == 'finance') { ?>
                        <form action="<?php echo base_url('fpo/finance/post_purchase_entry')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate">
                    <?php } else { ?>
                        <form action="<?php echo base_url('fpo/inventory/post_purchase_entry')?>" method="post" id="figform" name="sentMessage" novalidate="novalidate">
                    <?php }?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container-fluid">

                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress2">Entry Date <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo $formation_date;?>" id="entry_date" name="entry_date" required="required" data-validation-required-message="Please select invoice date.">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress2">Day </label>
                                                            <input class="form-control" type="text" id="entry_day" name="entry_day" readonly>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="inputAddress2">Voucher No.<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="15" id="voucher_no" name="voucher_no" value="<?php echo ucwords($last_voucher_no); ?>" readonly placeholder="Voucher No"
                                                              required="required" data-validation-required-message="Please enter voucher no.">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress2">Invoice Date <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" min="<?php echo $formation_date;?>" id="invoice_date" name="invoice_date" required="required" data-validation-required-message="Please select invoice date.">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress2">Day </label>
                                                            <input class="form-control" type="text" id="invoice_day" name="invoice_day" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress2">Supplier <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="supplier" name="supplier" required="required" style="width:100%" data-validation-required-message="Please select supplier." autofocus>
                                                                <option value="">Select Supplier </option>
                                                                <?php for ($i=0; $i<count($ledger_type);$i++) { ?>
                                                                <option value="<?php echo $ledger_type[$i]->account_code; ?>"><?php echo $ledger_type[$i]->account_name; ?></option>
                                                                <?php } ?>
                                                                <optgroup label="Suppliers" value="Suppliers"></optgroup>
                                                                <?php for ($i=0; $i<count($supplier);$i++) { ?>
                                                                <option value="<?php echo $supplier[$i]->supplier_id; ?>"><?php echo $supplier[$i]->supp_name; ?><?php echo !empty($supplier[$i]->mailing_mobile_no)?" ( ".$supplier[$i]->mailing_mobile_no." )":''; ?></option>
                                                                <?php } ?>
                                                                <option value="new_supplier">Add New Supplier </option>
                                                            </select>
                                                            <input type="hidden" name="sub_supplier" id="sub_supplier">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label for="inputAddress2">Supplier Invoice No.<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" maxlength="15" id="invoice_no" name="invoice_no" placeholder="Supplier Invoice No" onfocusout="checkSupplierInvoiceNo()" required="required"
                                                              data-validation-required-message="Please enter supplier invoice no.">
                                                            <div id="invoice_validate" class="help-block with-errors text-danger"></div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="inputAddress2">Delivery <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="delivery_to" name="delivery_to" style="width:100%" required="required" data-validation-required-message="Please select delivery">
                                                                <option value="">Select Delivery</option>
                                                                <?php for ($i=0; $i<count($location);$i++) { ?>
                                                                    <option value="<?php echo $location[$i]->id; ?>" <?php if ($i == 0) {echo 'selected="selected"'; } ?>><?php echo $location[$i]->name.'-'.$location[$i]->pincode; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <input type="hidden" name="sub_delivery_to" id="sub_delivery_to">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="payment_type">Transaction Type <span class="text-danger">*</span></label>
                                                            <select class="form-control" id="payment_type" name="payment_type" style="width:100%" required="required" data-validation-required-message="Please select delivery">
                                                                <option value="4020501">Cash</option>
                                                                <option value="2">Credit</option>
                                                            </select>
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered low-padded" id="dynamic_field">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" rowspan="2">Item Description</th>
                                                                    <th class="text-center" rowspan="2">Qty Received</th>
                                                                    <th class="text-center" rowspan="2">Qty Invoiced</th>
                                                                    <th class="text-center" rowspan="2">UOM</th>
                                                                    <th class="text-center" colspan="2">Each (Eg. Packs / Bottles)</th>
                                                                    <th class="text-center" rowspan="2">Purchase Unit Price<br>( <span class="fa fa-inr"></span> )</th>
                                                                    <th class="text-center" rowspan="2">MRP<br>( <span class="fa fa-inr"></span> )</th>
                                                                    <th class="text-center" rowspan="2">Discount<br>( <span class="fa fa-inr"></span> )</th>
                                                                    <th class="text-center" rowspan="2">Total <br>( <span class="fa fa-inr"></span> )</th>
                                                                    <th class="text-center" rowspan="2"></th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="text-center">Qty</th>
                                                                    <th class="text-center">UOM</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr id="row0">
                                                                    <!--<td width="12%"><input type="text" id="item_code0" name="item_code[]"  class="form-control  name_list numberOnly" required="required" readonly /></td> -->
                                                                    <td width="20%">
                                                                        <select class="form-control text-center" id="item_description0" name="item_description[]" required="required" data-validation-required-message="Please select item description.">
                                                                            <?php for ($i=0; $i<count($product_fpo);$i++) { ?>
                                                                            <option value="<?php echo $product_fpo[$i]->id; ?>"><?php echo $product_fpo[$i]->product_name.' - '.$product_fpo[$i]->classification; ?></option>
                                                                            <?php } ?>
                                                                            <option value="new_item">Add New Item</option>
                                                                        </select>
                                                                        <p id="itemCount0" class="text-danger itemCount mt-2 mb-0 pb-0 pt-0"></p>
                                                                    </td>
                                                                    <td width="8%"><input type="text" id="qty0" name="qty[]" maxlength="6" class="form-control name_list numberOnly text-right" required="required" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="8%"><input type="text" id="invoiced0" name="invoiced[]" maxlength="6" class="form-control name_list textOnly text-right" required="required" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="9%"><select class="form-control" id="unit0" name="unit[]" required="required" data-validation-required-message="Please select unit.">
                                                                            <option value="">UOM </option>
                                                                            <?php for ($i=0; $i<count($unit);$i++) { ?>
                                                                            <option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="8%"><input type="text" id="package_qty0" name="package_qty[]" maxlength="6" class="form-control name_list numberOnly text-right" required="required" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="9%"><select class="form-control " id="package_unit0" name="package_unit[]" required="required" data-validation-required-message="Please select unit.">
                                                                            <option value="">UOM </option>
                                                                            <?php for ($i=0; $i<count($unit);$i++) { ?>
                                                                            <option value="<?php echo $unit[$i]->id; ?>"><?php echo $unit[$i]->short_name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="10%"><input type="text" id="price0" name="price[]" maxlength="6" class="form-control name_list numberOnly text-right" required="" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="10%"><input type="text" id="mrp0" name="mrp[]" maxlength="6" class="form-control name_list numberOnly text-right" required="" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="9%"><input type="text" id="line_discount0" name="line_discount[]" maxlength="6" class="form-control name_list numberOnly text-right" required="" />
                                                                        <p class="help-block text-danger"></p>
                                                                    </td>
                                                                    <td width="14%"><input type="text" id="line_total0" name="line_total[]" class="form-control name_list numberOnly text-right " readonly /></td>
                                                                    <td width="5%"><button type="button" id="add_0" class="btn btn-success btn_add">+</button>
                                                                        <button type="button" id="remove_0" class="btn btn-danger btn_remove">-</button>
                                                                    </td>
                                                                </tr>
                                                                <?php if ($fpo_data->gst_enable == 1) { ?>
                                                                <tr id="row0child">
                                                                    <td colspan="9" class="text-right">
                                                                        <div id="div_igst_0" class="seLineIGST">IGST @ <span id="percent_igst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_igst_0">0</span></div>
                                                                        <div id="div_sgst_0" class="seLineSGST">UTGST/SGST @ <span id="percent_sgst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_sgst_0">0</span></div>
                                                                        <div id="div_cgst_0" class="seLineCGST">CGST @ <span id="percent_cgst_0">0</span> %: <span class="fa fa-inr"></span> <span id="value_cgst_0">0</span></div>

                                                                        <input type="hidden" name="line_percent_cgst[]" id="line_percent_cgst0" value="" />
                                                                        <input type="hidden" name="line_percent_sgst[]" id="line_percent_sgst0" value="" />
                                                                        <input type="hidden" name="line_percent_igst[]" id="line_percent_igst0" value="" />

                                                                        <input type="hidden" name="line_cgst[]" id="line_cgst0" value="" />
                                                                        <input type="hidden" name="line_sgst[]" id="line_sgst0" value="" />
                                                                        <input type="hidden" name="line_igst[]" id="line_igst0" value="" />
                                                                    </td>
                                                                    <td colspan="2"></td>
                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <?php
                                                            if ($fpo_data->gst_enable == 1) {
                                                                ?>
                                                                    <td colspan="2" class="text-right"> IGST ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="igst" name="igst" readonly class="form-control text-right" placeholder="IGST" /></td>
                                                                    <td colspan="4" class="text-right"> Sub Total ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="sub_total" name="sub_total" readonly class="form-control text-right" /></td>

                                                                    <?php
                                                            } else {
                                                                ?>
                                                                    <td colspan="8" class="text-right"> Sub Total ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="sub_total" name="sub_total" readonly class="form-control text-right" /></td>
                                                                    <?php
                                                            }
                                                        ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php
                                                            if ($fpo_data->gst_enable == 1) {
                                                                ?>
                                                                    <td colspan="2" class="text-right"><span id="labelCGST"> CGST ( <span class="fa fa-inr"></span> )</span></td>
                                                                    <td colspan="2">
                                                                        <div id="divCGSTTotal"><input type="text" id="cgst" name="cgst" readonly class="form-control text-right" placeholder="CGST" /></div>
                                                                    </td>
                                                                    <td colspan="4" class="text-right">Delivery Charge( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="delivery_charge" name="delivery_charge" maxlength="6" class="form-control numberOnly text-right" placeholder="Delivery Charge" />
                                                                        <div class="lblIncludeGST"><label for="includeGst">GST Included</label> </div>&nbsp;<div class="includeGST"><input type="checkbox" id="includeGst" checked name="includeGst"
                                                                              value="1" class="text-center mt-2"></div>
                                                                    </td>
                                                                    <?php
                                                            } else {
                                                                ?>
                                                                    <td colspan="8" class="text-right">Delivery Charge( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="delivery_charge" name="delivery_charge" maxlength="6" class="form-control numberOnly text-right" placeholder="Delivery Charge" /></td>
                                                                    <?php
                                                            }
                                                        ?>
                                                                </tr>
                                                                <tr>
                                                                    <?php
                                                            if ($fpo_data->gst_enable == 1) {
                                                                ?>
                                                                    <td colspan="2" class="text-right"><span id="labelSGST"> SGST / UTGST ( <span class="fa fa-inr"></span> )</span></td>
                                                                    <td colspan="2">
                                                                        <div id="divSGSTTotal">
                                                                            <div id="divSGSTTotal"><input type="text" id="sgst" name="sgst" readonly class="form-control text-right" placeholder="SGST/UTGST" /></div>
                                                                    </td>
                                                                    <td colspan="4" class="text-right"> Discount ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="discount" name="discount" maxlength="6" class="form-control text-right numberOnly" placeholder="Discount" /></td>
                                                                    <?php
                                                            } else {
                                                                ?>
                                                                    <td colspan="8" class="text-right"> Discount ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="discount" name="discount" maxlength="6" class="form-control text-right numberOnly" placeholder="Discount" /></td>
                                                                    <?php
                                                            }
                                                        ?>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="8" class="text-right"> Adjustment ( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input id="adjustment" name="adjustment" maxlength="6" class="form-control text-right" placeholder="Adjustment" /></td>
                                                                </tr>
                                                                <!--<tr  id="cess_applicable">
														<td colspan="8" class="text-right"> Cess( <span class="fa fa-inr"></span> )</td>
														<td colspan="2" ><input type="text" id="cess_available"  name="cess_available"  maxlength="6"  class="form-control text-right numberOnly"  placeholder="Chess Available" /></td>
													</tr>-->
                                                                <tr class="total">
                                                                    <td colspan="8" class="text-right"> Total( <span class="fa fa-inr"></span> )</td>
                                                                    <td colspan="2"><input type="text" id="amount_total" name="amount_total" readonly class="form-control text-right" /><input type="hidden" id="tax_total" name="tax_total" /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="form-group col-md-3">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="inputAddress2">Memo</label>
                                                            <textarea class="form-control " name="memo" id="memo"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 text-center">
                                                            <div id="success"></div>
                                                            <input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
                                                            <?php
                                                if ($page_module == 'inventory') {
                                                    ?>
                                                            <a href="<?php echo base_url('fpo/inventory/purchaseentry'); ?>" class="btn btn-outline-dark">Cancel</a>
                                                            <?php
                                                } elseif ($page_module == 'finance') {
                                                    ?>
                                                            <a href="<?php echo base_url('fpo/finance/purchaseentry'); ?>" class="btn btn-outline-dark">Cancel</a>
                                                            <?php
                                                } else {
                                                    ?>
                                                            <a href="<?php echo base_url('fpo/inventory/purchaseentry'); ?>" class="btn btn-outline-dark">Cancel</a>
                                                            <?php
                                                }?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <input type="hidden" name="gst_delivery_charge" id="gst_delivery_charge" value="0" />
                </form>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>

    <?php $this->load->view('templates/footer.php');?>
    <?php $this->load->view('templates/bottom.php');?>
    <?php $this->load->view('templates/datatable.php');?>
    <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo asset_url()?>js/register.js"></script>
    <script src="<?php echo asset_url()?>js/select2.min.js"></script>
    <script type="text/javascript">
        var temp_totalCount = [];
        var arrSupplyLocation = new Array();
        var arrDeliveryTo = new Array();
        var gstType = '';
        var gstEnable = "<?php echo $fpo_data -> gst_enable;?>" ;
        var lastLineIndex = 0;


        <?php
        for ($i = 0; $i < count($supplier); $i++) {
            ?>
            arrSupplyLocation[ <?php echo $supplier[$i] -> supplier_id;?> ] = <?php echo $supplier[$i] -> mailing_state;?> ;
            <?php
        } ?>
        <?php
        for ($i = 0; $i < count($location); $i++) {
            ?>
            arrDeliveryTo[ <?php echo $location[$i] -> id;?> ] = <?php echo $location[$i] -> state_id;?> ;
            <?php
        } ?>

        $(document).ready(function() {
            //document.getElementById("entry_date").focus();
            /*$('#supplier').on('change', function(e){
		var ledgerId = $(this).val();
		if(ledgerId == 'Suppliers') {
		   $('#supplier').val('0');
		}
    }); */

            $('#supplier').select2();
            //$('#delivery_to').select2();

            $('#item_description0').select2();
            $('#item_description0').val('');
            $('#select2-item_description0-container').html('Select Item Description');
            $('#inv-parent').removeClass('show open');
            $('#inv-parent .sub-menu').removeClass('show');

            $('#item_description0').on('change', function(e) {
                var selectedItem = $(this).val();
                var supName = $('#supplier').val();
                var invoiceNo = $('#invoice_no').val();
                if (supName != '' && invoiceNo != '') {
                    updateItemCount(selectedItem, 'itemCount0', 'unit0', 0, 0);
                }
            });
        });

        function calculateGrandTotal() {
            var subTotal = 0;
            var grandTotal = 0;
            var theTbl = $('#dynamic_field');
            var trs = theTbl.find("input[name='line_total[]']");
            for (var i = 0; i < trs.length; i++) {
                subTotal += parseFloat(trs[i].value || 0);
            }
            subTotal = subTotal.toFixed(2);
            $('#sub_total').val(subTotal);
            grandTotal += parseFloat(subTotal || 0);
            var shippingCharge = $('#delivery_charge').val();
            var gstShipping = 0;
            if (gstEnable == 1 && $('#includeGst').is(':checked')) {
                gstShipping = parseFloat(shippingCharge || 0) * (5 / 100);
                //shippingCharge = parseFloat(shippingCharge || 0) + parseFloat(gstShipping || 0);
                $('#gst_delivery_charge').val(gstShipping);
            } else {
                $('#gst_delivery_charge').val('0');
            }
            grandTotal = parseFloat(grandTotal || 0) + parseFloat(shippingCharge || 0);
            var discount = $('#discount').val();
            grandTotal -= parseFloat(discount || 0);
            var cess = $('#cess_available').val();
            if (cess != '') {
                grandTotal += parseFloat(cess || 0);
            }
            var adjustment = $('#adjustment').val();
            if (adjustment != '-' && adjustment != '+' && adjustment != '.' && adjustment != '-.') {
                grandTotal = grandTotal + parseFloat(adjustment || 0);
            }

            var cgstTotal = 0;
            var sgstTotal = 0;
            var igstTotal = 0;
            var taxTotal = 0;
            if (gstType == 1) {
                gstShipping = parseFloat(gstShipping || 0) / 2;
                var trs = theTbl.find("input[name='line_cgst[]']");
                for (var i = 0; i < trs.length; i++) {
                    cgstTotal += parseFloat(trs[i].value || 0);
                }
                cgstTotal = cgstTotal.toFixed(2);
                cgstTotal = parseFloat(cgstTotal || 0) + parseFloat(gstShipping || 0);
                $('#cgst').val(cgstTotal);
                taxTotal += parseFloat(cgstTotal || 0);
                grandTotal = grandTotal + parseFloat(cgstTotal || 0);
                var trs = theTbl.find("input[name='line_sgst[]']");
                for (var i = 0; i < trs.length; i++) {
                    sgstTotal += parseFloat(trs[i].value || 0);
                }
                sgstTotal = sgstTotal.toFixed(2);
                sgstTotal = parseFloat(sgstTotal || 0) + parseFloat(gstShipping || 0);
                $('#sgst').val(sgstTotal);
                taxTotal = parseFloat(taxTotal || 0)
                taxTotal = taxTotal + parseFloat(sgstTotal || 0);
                grandTotal = grandTotal + parseFloat(sgstTotal || 0);
            } else if (gstType == 2) {
                var trs = theTbl.find("input[name='line_igst[]']");
                for (var i = 0; i < trs.length; i++) {
                    igstTotal += parseFloat(trs[i].value || 0);
                }
                igstTotal = igstTotal.toFixed(2);
                igstTotal = parseFloat(igstTotal || 0) + parseFloat(gstShipping || 0);
                $('#igst').val(igstTotal);
                taxTotal = taxTotal + parseFloat(igstTotal || 0);
                grandTotal = grandTotal + parseFloat(igstTotal || 0);
            }
            taxTotal = taxTotal.toFixed(2);
            $('#tax_total').val(taxTotal);
            grandTotal = grandTotal.toFixed(2);
            $('#amount_total').val(grandTotal);
        }

        //$("#cess_applicable").hide();
        function getLineTaxCalculation(gstType, itemId, ind) {
            $.ajax({
                url: "<?php echo base_url();?>fpo/inventory/getHsncode",
                type: "POST",
                data: {
                    item_id: itemId
                },
                dataType: "html",
                cache: false,
                success: function(response) {
                    response = response.trim();
                    responseArray = $.parseJSON(response);
                    if (responseArray.status == 1) {
                        if (gstType == 1) {
                            var tax_cgst = responseArray.items[0].tax_cgst;
                            var tax_sgst = responseArray.items[0].tax_sgst;
                            $("#percent_cgst_" + ind).html(tax_cgst);
                            $("#percent_sgst_" + ind).html(tax_sgst);
                            $("#line_percent_cgst" + ind).val(tax_cgst);
                            $("#line_percent_sgst" + ind).val(tax_sgst);

                            //if(responseArray.items[0].tax_cess_applicable==1){
                            //$("#cess_applicable").show();
                            //}
                        } else if (gstType == 2) {
                            var tax_igst = responseArray.items[0].tax_igst;
                            $("#percent_igst_" + ind).html(tax_igst);
                            $("#line_percent_igst" + ind).val(tax_igst);
                        }
                    }
                },
            });
        }

        $('#dynamic_field').on('keyup', 'tr input[name="qty[]"], tr input[name="price[]"], tr input[name="line_discount[]"]', function() {
            var qty = $(this).parents('tr').find('input[name="qty[]"]').val();
            var unit_price = $(this).parents('tr').find('input[name="price[]"]').val();
            var line_discount = $(this).parents('tr').find('input[name="line_discount[]"]').val();
            var line_total = parseFloat(qty || 0) * parseFloat(unit_price || 0) - parseFloat(line_discount || 0);
            line_total = line_total.toFixed(2);
            $(this).parents('tr').find('input[name="line_total[]"]').val(line_total);

            var strId = $(this).attr('id');
            var strName = $(this).attr('name');
            strName = strName.replace('[]', '');
            var ind = strId.replace(strName, '');

            if (gstType == 1) {
                var percent_cgst = $('#line_percent_cgst' + ind).val();
                var percent_sgst = $('#line_percent_sgst' + ind).val();
                var line_cgst = parseFloat(line_total || 0) * (parseFloat(percent_cgst || 0) / 100);
                var line_sgst = parseFloat(line_total || 0) * (parseFloat(percent_sgst || 0) / 100);
                line_cgst = line_cgst.toFixed(2);
                line_sgst = line_sgst.toFixed(2);
                $('#line_cgst' + ind).val(line_cgst);
                $('#line_sgst' + ind).val(line_sgst);
                $('#value_cgst_' + ind).html(line_cgst);
                $('#value_sgst_' + ind).html(line_sgst);
            } else if (gstType == 2) {
                var percent_igst = $('#line_percent_igst' + ind).val();
                var line_igst = parseFloat(line_total || 0) * (parseFloat(percent_igst || 0) / 100);
                line_igst = line_igst.toFixed(2);
                $('#line_igst' + ind).val(line_igst);
                $('#value_igst_' + ind).html(line_igst);
            }

            calculateGrandTotal();
        });

        $('#dynamic_field').on('change', 'tr select[name="item_description[]"]', function() {
            if ($(this).val() == "new_item") {
                window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
            }
            var str = $(this).attr('id');
            var ind = str.replace('item_description', '');
            if ($(this).val() != '') {
                var supply = $('#supplier').val();

                var delivery = $('#delivery_to').val();
                if (supply && delivery != '') {
                    document.getElementById('supplier').setAttribute("disabled", "true");
                    document.getElementById('delivery_to').setAttribute("disabled", "true");
                }

                if (gstEnable == 1) {
                    var itemId = $(this).val();
                    var supplyLocationId = $('#supplier').val();
                    var deliveryToBranchCode = $('#delivery_to').val();
                    var deliveryToState = arrDeliveryTo[deliveryToBranchCode];
                    if (supply == '4020501' || supply == '4020502')
                        var supplyLocationState = deliveryToState;
                    else
                        var supplyLocationState = arrSupplyLocation[supplyLocationId];
                    if (supplyLocationState == deliveryToState) {
                        gstType = 1;
                        getLineTaxCalculation(gstType, itemId, ind);
                        $('#div_igst_' + ind).hide();
                        $('#div_cgst_' + ind).show();
                        $('#div_sgst_' + ind).show();

                        $('#labelCGST').show();
                        $('#divCGSTTotal').show();
                        $('#labelSGST').show();
                        $('#divSGSTTotal').show();
                        $('#labelIGST').hide();
                        $('#divIGSTTotal').hide();
                    } else {
                        gstType = 2;
                        getLineTaxCalculation(gstType, itemId, ind);
                        $('#div_igst_' + ind).show();
                        $('#div_cgst_' + ind).hide();
                        $('#div_sgst_' + ind).hide();

                        $('#labelIGST').show();
                        $('#divIGSTTotal').show();
                        $('#labelCGST').hide();
                        $('#divCGSTTotal').hide();
                        $('#labelSGST').hide();
                        $('#divSGSTTotal').hide();
                    }
                }
            } else {
                $(this).parents('tr').find('input[type=text], select').each(function() {
                    $(this).val('');
                });
                if (gstEnable == 1) {
                    $('#row' + ind + 'child').find('input[type=hidden]').each(function() {
                        $(this).val('');
                    });
                    $('#row' + ind + 'child').find("span[class!='fa fa-inr']").each(function() {
                        $(this).html('0');
                    });
                }
                calculateGrandTotal();
            }
        });


        $('#dynamic_field').on('keyup', '#delivery_charge, #discount, #adjustment,#cess_available', function() {
            calculateGrandTotal();
        });

        $(document).on('click', '#includeGst', function() {
            calculateGrandTotal();
        });

        /*$('#dynamic_field').on('change', '#adjustment', function () {
        		var adjust_val = $(this).val();
        		var amount_val = $('#amount_total').val();
        		if(adjust_val > amount_val){
        			swal('',"Adjustment should not be greater than total");
        		}
        });

        $('#dynamic_field').on('keyup', '#adjustment', function () {
        		var adjust_val = $(this).val();
        		var amount_val = $('#amount_total').val();
        		if(adjust_val > amount_val){
        			swal('',"Adjustment should not be greater than total");
        		}
        });*/

        $('#dynamic_field').on('keyup', 'tr input[name="line_discount[]"]', function() {

            var line_total = +$(this).parents('tr').find('input[name="line_total[]"]').val();
            var discount = +$(this).val();
            if (discount > line_total) {
                $(this).parents('tr').find('input[name="line_discount[]"]').val('');
                $(this).parents('tr').find('input[name="line_discount[]"]').focus();
                swal('', "Discount should not be greater than line total");
            }
        });

        $('#dynamic_field').on('click', 'tr input[name="line_discount[]"]', function() {

            var line_total = +$(this).parents('tr').find('input[name="line_total[]"]').val();
            var discount = +$(this).val();
            if (discount > line_total) {
                $(this).parents('tr').find('input[name="line_discount[]"]').val('');
                $(this).parents('tr').find('input[name="line_discount[]"]').focus();
                swal('', "Discount should not be greater than line total");
            }
        });

        $('#dynamic_field').on('change', 'tr input[name="line_discount[]"]', function() {

            var line_total = +$(this).parents('tr').find('input[name="line_total[]"]').val();
            var discount = +$(this).val();
            if (discount > line_total) {
                $(this).parents('tr').find('input[name="line_discount[]"]').val('');
                $(this).parents('tr').find('input[name="line_discount[]"]').focus();
                swal('', "Discount should not be greater than line total");
            }
        });

        $('#dynamic_field').on('change', 'tr input[name="invoiced[]"]', function() {

            var line_qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
            var invoiced = +$(this).val();
            if (invoiced > line_qty) {
                $(this).parents('tr').find('input[name="invoiced[]"]').val('');
                $(this).parents('tr').find('input[name="invoiced[]"]').focus();
                swal('', "Quantity Invoiced should not be greater than quantity received");
            }
        });
        //mrp alert 27 march
        $('#dynamic_field').on('change', 'tr input[name="mrp[]"]', function() {
            var price = +$(this).parents('tr').find('input[name="price[]"]').val();
            var mrp = +$(this).val();
            if (mrp < price) {
                $(this).parents('tr').find('input[name="mrp[]"]').val('');
                $(this).parents('tr').find('input[name="mrp[]"]').focus();
                swal('', "MRP should not be lesser than unit price");
            }
        });
        //ends//

        $('#dynamic_field').on('keyup', 'tr input[name="invoiced[]"]', function() {

            var line_qty = +$(this).parents('tr').find('input[name="qty[]"]').val();
            var invoiced = +$(this).val();
            if (invoiced > line_qty) {
                $(this).parents('tr').find('input[name="invoiced[]"]').val('');
                $(this).parents('tr').find('input[name="invoiced[]"]').focus();
                swal('', "Quantity Invoiced should not be greater than quantity received");
            }
        });
        $('#dynamic_field').on('change', 'select[id="item_description0"]', function() {
            var row = $(this).val();
            if (row == "new_item") {
                window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
            } else {

            }
        });

        $('#invoice_date').on('change', function() {
            var dep_dt = $(this).val();
            $('#eff_input').val(dep_dt);
            var eff_dt = new Date(dep_dt);
            // dt_cl is being set to a string here:
            var dt_cl = (eff_dt.getMonth()) + '-' + eff_dt.getDate() + '-' + eff_dt.getFullYear();

            var exp_dt = new Date().setDate(new Date(dt_cl).getDate() + 15);

        });

        $(document).ready(function() {

            $('#dynamic_field').on('change', 'input, select', function() {
                validateLocation(this);
            });
            $('#supplier').on('change', function() {
                if ($(this).val() == 'new_supplier') {
                    window.location = "<?php echo base_url('fpo/inventory/suppliers')?>";
                }
                document.getElementById("sub_supplier").value = $(this).val();
            });
            document.getElementById("sub_supplier").value = $('#supplier').val();
            $('#delivery_to').on('change', function() {
                document.getElementById("sub_delivery_to").value = $(this).val();
            });
            document.getElementById("sub_delivery_to").value = $('#delivery_to').val();
            $('#dynamic_field').on('keyup', 'input, select', function() {
                validateLocation(this);
                var item = $(this).parents('tr').find('select[name="item_description[]"]').val();

                if (item == "") {
                    $(this).val('');
                    swal('', "Please select item description");
                }
                if (item == "new_item") {
                    window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
                }
            });

            $('#dynamic_field').on('click', 'input, select', function() {
                validateLocation(this);

            });

            function validateLocation(obj) {
                if ($(obj).attr('name') == 'item_description[]' && $(obj).val() == 'new_item') {
                    window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
                } else {
                    var supply = $('#supplier').val();
                    var delivery = $('#delivery_to').val();
                    var invoiceNo = $('#invoice_no').val();

                    if (supply == "" || supply == "new_supplier") {
                        $(obj).val('');
                        if ($(obj).attr('name') == 'item_description[]') {
                            var str = $(obj).attr('id');
                            var ind = str.replace('item_description', '');
                            $('#select2-item_description' + ind + '-container').html('Select Item Description');
                        }
                        swal('', "Please select supplier");
                    } else if (invoiceNo == "") {
                        $(obj).val('');
                        if ($(obj).attr('name') == 'item_description[]') {
                            var str = $(obj).attr('id');
                            var ind = str.replace('item_description', '');
                            $('#select2-item_description' + ind + '-container').html('Select Item Description');
                        }
                        swal('', "Please provide supplier invoice no");
                    } else if (delivery == "") {
                        $(obj).val('');
                        if ($(obj).attr('name') == 'item_description[]') {
                            var str = $(obj).attr('id');
                            var ind = str.replace('item_description', '');
                            $('#select2-item_description' + ind + '-container').html('Select Item Description');
                        }
                        swal('', "Please select delivery");
                    }
                }
            }

            var i = 0;
            var j = 0;
            $(document).on('click', '.btn_add', function() {
                var validate = true;
                $('#dynamic_field').find('tr input[id=item_description' + i + '],tr input[id=qty' + i + '],tr input[id=invoiced' + i + '],tr input[id=price' + i + '],tr select[id=unit' + i + '],tr input[id=line_total' + i + ']').each(
                    function() {

                        if ($(this).val() == "") {
                            validate = false;
                        }
                    });

                if (validate) {
                    if (document.getElementById('item_description' + i + '')) {
                        document.getElementById('item_description' + i + '').setAttribute("readonly", "true");
                        document.getElementById('qty' + i + '').setAttribute("readonly", "true");
                        document.getElementById('invoiced' + i + '').setAttribute("readonly", "true");
                        document.getElementById('line_discount' + i + '').setAttribute("readonly", "true");
                        document.getElementById('line_total' + i + '').setAttribute("readonly", "true");
                        document.getElementById('unit' + i + '').setAttribute("readonly", "true");
                        document.getElementById('package_unit' + i + '').setAttribute("readonly", "true");
                        document.getElementById('package_qty' + i + '').setAttribute("readonly", "true");
                        document.getElementById('price' + i + '').setAttribute("readonly", "true");
                        document.getElementById('mrp' + i + '').setAttribute("readonly", "true");
                    }
                    j = i;
                    i++;
                    lastLineIndex = i;

                    /*$('#dynamic_field').on('change','select', function () {
			var row = $(this).closest('tr');

			$('select[id="item_description'+i+'"]', row).each(function() {
				if($(this).val()=='new_item'){
					window.location = "<?php echo base_url('fpo/masterdata/addproductfpo')?>";
				}else{

				}
			});
		});*/

                    var str_add = '<tr id="row' + i + '" class="dynamic-added">';
                    str_add += '<td class="text-center" width="20%">';
                    str_add += '<select class="form-control" id="item_description' + i + '" name="item_description[]">';
                    str_add += '<option value="">Select Item Description</option>';
                    str_add += '</select><p id="itemCount' + i + '" class="text-danger itemCount mt-2 mb-0 pb-0 pt-0"></p>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="8%">';
                    str_add += '<input type="text" id="qty' + i + '" name="qty[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="8%">';
                    str_add += '<input type="text" id="invoiced' + i + '" name="invoiced[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="9%">';
                    str_add += '<select class="form-control" id="unit' + i + '" name="unit[]">';
                    str_add += '<option value="">UOM</option>';
                    str_add += '</select>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="8%">';
                    str_add += '<input type="text" id="package_qty' + i + '" name="package_qty[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="8%">';
                    str_add += '<select class="form-control" id="package_unit' + i + '" name="package_unit[]">';
                    str_add += '<option value="">UOM</option>';
                    str_add += '</select>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="10%">';
                    str_add += '<input type="text" id="price' + i + '" name="price[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="10%">';
                    str_add += '<input type="text" id="mrp' + i + '" name="mrp[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="9%">';
                    str_add += '<input type="text" id="line_discount' + i + '" name="line_discount[]" class="form-control numberOnly text-right" maxlength="6"  required="required"/>';
                    str_add += '</td>';
                    str_add += '<td class="text-center" width="14%">';
                    str_add += '<input type="text" id="line_total' + i + '" name="line_total[]" class="form-control numberOnly text-right" maxlengh="6" required="required"/>';
                    str_add += '</td>';
                    str_add += '<td width="5%"><button type="button" id="add_' + i + '" class="btn btn-success btn_add">+</button>';
                    str_add += '<button type="button" id="remove_' + i + '" class="btn btn-danger btn_remove" style="display:none" class="btn btn-danger btn_remove">-</button>';
                    str_add += '</td>';
                    str_add += '</tr>';
                    if (gstEnable == 1) {
                        str_add += '<tr id="row' + i + 'child">';
                        str_add += '	<td colspan="9" class="text-right">';

                        if (gstType == 2) {
                            str_add += '		<div id="div_igst_' + i + '" class="seLineIGST">IGST @ <span id="percent_igst_' + i + '">0</span> %: <span class="fa fa-inr"></span> <span id="value_igst_' + i + '">0</span></div>';
                        }
                        if (gstType == 1) {
                            str_add += '		<div id="div_sgst_' + i + '" class="seLineSGST">UTGST/SGST @ <span id="percent_sgst_' + i + '">0</span> %: <span class="fa fa-inr"></span> <span id="value_sgst_' + i + '">0</span></div>';
                            str_add += '		<div id="div_cgst_' + i + '" class="seLineCGST">CGST @ <span id="percent_cgst_' + i + '">0</span> %: <span class="fa fa-inr"></span> <span id="value_cgst_' + i + '">0</span></div>';
                        }
                        str_add += '		<input type="hidden" name="line_percent_cgst[]" id="line_percent_cgst' + i + '" value="" />';
                        str_add += '		<input type="hidden" name="line_percent_sgst[]" id="line_percent_sgst' + i + '" value="" />';
                        str_add += '		<input type="hidden" name="line_percent_igst[]" id="line_percent_igst' + i + '" value="" />';
                        str_add += '		<input type="hidden" name="line_cgst[]" id="line_cgst' + i + '" value="" />';
                        str_add += '		<input type="hidden" name="line_sgst[]" id="line_sgst' + i + '" value="" />';
                        str_add += '		<input type="hidden" name="line_igst[]" id="line_igst' + i + '" value="" />';
                        str_add += '	</td>';
                        str_add += '	<td colspan="2"></td>';
                        str_add += '</tr>';
                    }
                    if (gstEnable == 1) {
                        $('#dynamic_field').find('tbody tr[id="row' + j + 'child"]').after(str_add);
                    } else {
                        $('#dynamic_field').find('tbody tr[id="row' + j + '"]').after(str_add);
                    }

                    $('#add_' + j).hide();
                    $('#remove_' + j).show();
                    initnumberOnly();

                    $("#item_description" + i + " option").remove();
                    $.ajax({
                        url: '<?php echo base_url('fpo/inventory/getproducts')?>',
                        type: "GET",
                        success: function(response) {
                            responsearr = $.parseJSON(response);
                            var div_data = '<option value="">Select Item Description</option>';
                            $.each(responsearr, function(key, value) {
                                div_data += "<option value=" + value.id + ">" + value.product_name + " - " + value.classification + "</option>";
                            });
                            div_data += "<option value='new_item'>Add New Item</option>";
                            $(div_data).appendTo('#item_description' + i + '');
                        }
                    });

                    $("#unit" + i + " option").remove();
                    $.ajax({
                        url: '<?php echo base_url(' fpo/inventory/getquantityunit ')?>',
                        type: "GET",
                        success: function(response) {
                            responsearr = $.parseJSON(response);
                            var div_unit = '<option value="">UOM</option>';
                            $.each(responsearr, function(key, value) {
                                div_unit += "<option value=" + value.id + ">" + value.short_name + "</option>";
                            });
                            $(div_unit).appendTo('#unit' + i + '');
                        }
                    });

                    $("#package_unit" + i + " option").remove();
                    $.ajax({
                        url: '<?php echo base_url('fpo/inventory/getquantityunit')?>',
                        type: "GET",
                        success: function(response) {
                            responsearr = $.parseJSON(response);
                            var div_unit1 = '<option value="">UOM</option>';
                            $.each(responsearr, function(key, value) {
                                div_unit1 += "<option value=" + value.id + ">" + value.short_name + "</option>";
                            });
                            $(div_unit1).appendTo('#package_unit' + i + '');
                        }
                    });

                    $("#item_description" + i).select2();
                    $('#item_description' + i).on('change', function(e) {
                        var selectedItem = $(this).val();
                        if (selectedItem != '') {
                            var qtyIndex = (i - 1);
                            var qty_Value = $('#qty' + qtyIndex).val();
                            var uom_Value = $('#unit' + qtyIndex).val();
                            updateItemCount(selectedItem, 'itemCount' + i, 'unit' + i, qty_Value, uom_Value);
                        } else {
                            $('#unit' + i).val('');
                        }
                    });

                    return true; // you can submit form or send ajax or whatever you want here
                } else {
                    swal('', "Provide all the data");
                    return false;
                }

            });


            $(document).on('click', '.btn_remove', function() {
                $(this).parents('tr').find('input[name="line_total[]"]').val(0);
                var arr = $(this).attr("id").split("_");
                $('#row' + arr[1] + '').remove();
                if (gstEnable == 1) {
                    $('#row' + arr[1] + 'child').remove();
                }
                calculateGrandTotal();
            });

            $(document).on('click', '#sendMessageButton', function() {
                var itemRows = $('#dynamic_field').find('select[name="item_description[]"]').length;
                var formValidate = true;
                if ($('#supplier').val() == '' || $('#invoice_no').val() == '' || $('#delivery_to').val() == '') {
                    formValidate = false;
                } else if (lastLineIndex == 0) {
                    if ($('#item_description' + lastLineIndex).val() == '' || $('#qty' + lastLineIndex).val() == '' || $('#invoiced' + lastLineIndex).val() == '' || $('#unit' + lastLineIndex).val() == '' || $('#price' + lastLineIndex)
                        .val() == '') {
                        formValidate = false;
                    }
                } else if (lastLineIndex > 0) {
                    if (itemRows > 1) {
                        if ($('#item_description' + lastLineIndex).val() == '' && $('#qty' + lastLineIndex).val() == '' && $('#invoiced' + lastLineIndex).val() == '' && $('#unit' + lastLineIndex).val() == '' && $('#price' +
                                lastLineIndex).val() == '') {} else {
                            if ($('#item_description' + lastLineIndex).val() == '' || $('#qty' + lastLineIndex).val() == '' || $('#invoiced' + lastLineIndex).val() == '' || $('#unit' + lastLineIndex).val() == '' || $('#price' +
                                    lastLineIndex).val() == '') {
                                formValidate = false;
                            }
                        }
                    } else {
                        if ($('#item_description' + lastLineIndex).val() == '' || $('#qty' + lastLineIndex).val() == '' || $('#invoiced' + lastLineIndex).val() == '' || $('#unit' + lastLineIndex).val() == '' || $('#price' +
                                lastLineIndex).val() == '') {
                            formValidate = false;
                        }
                    }
                }
                if (!formValidate) {
                    swal('', "Provide all the data");
                    return false;
                }
            });

            var invoice_date = document.getElementById("invoice_date").value;
            var entry_date = document.getElementById("entry_date").value;

            if (invoice_date != '') {
                var invoice = updatePaymentDay(invoice_date);
                if (invoice !== '') {
                    document.getElementById("invoice_day").value = invoice;
                }
            }

            if (entry_date != '') {
                var entry = updatePaymentDay(entry_date);
                if (entry !== '') {
                    document.getElementById("entry_day").value = entry;
                }
            }


            $('input[id="entry_date"]').on('change', function(e) {
                e.preventDefault();
                var dateval = "";
                if ($(this).val()) {
                    dateval = $(this).val();
                } else {
                    dateval = new Date().getDay();
                }

                var entry_day = updatePaymentDay(dateval);

                if (entry_day !== '') {
                    document.getElementById("entry_day").value = entry_day;
                }
            });

            $('input[id="invoice_date"]').on('change', function(e) {
                e.preventDefault();
                var dateval = "";
                if ($(this).val()) {
                    dateval = $(this).val();
                } else {
                    dateval = new Date().getDay();
                }

                var invoice_day = updatePaymentDay(dateval);
                if (invoice_day !== '') {
                    document.getElementById("invoice_day").value = invoice_day;
                }
            });



            function updatePaymentDay(dateval) {
                var day = "";
                switch (new Date(dateval).getDay()) {
                    case 0:
                        day = "Sunday";
                        break;
                    case 1:
                        day = "Monday";
                        break;
                    case 2:
                        day = "Tuesday";
                        break;
                    case 3:
                        day = "Wednesday";
                        break;
                    case 4:
                        day = "Thursday"
                        break;
                    case 5:
                        day = "Friday";
                        break;
                    case 6:
                        day = "Saturday";
                        break;
                }
                return day;
            }


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
                $('#entry_date').attr('max', maxDate);
                $('#invoice_date').attr('max', maxDate);
                $('#entry_date').val(maxDate);
                $('#invoice_date').val(maxDate);
            });
        });
        /*(function($) {
		$.fn.inputFilter = function(inputFilter) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
		  if (inputFilter(this.value)) {
		  this.oldValue = this.value;
		  this.oldSelectionStart = this.selectionStart;
		  this.oldSelectionEnd = this.selectionEnd;
		  } else if (this.hasOwnProperty("oldValue")) {
		  this.value = this.oldValue;
		  this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
		  }
		});
		};
	 }(jQuery));

	$(".inputfilter").inputFilter(function(value) {
	return /^-?\d*$/.test(value); });*/

        $(document).on('keydown', '#adjustment', function(e) {
            var input = $(this);
            var oldVal = input.val();
            var regex = new RegExp(input.attr('pattern'), 'g');

            setTimeout(function() {
                var newVal = input.val();
                if (!regex.test(newVal)) {
                    input.val(oldVal);
                }
            }, 0);
        });

        $('#invoice_no').on('keyup', function() {
            if ($('#supplier').val() == '' || $('#supplier').val() == 'new_supplier') {
                $(this).val('');
                swal('', "Please select supplier");
            }
        });

        function verifyInvoiceNumber(invoicenumber) {
            if (invoicenumber) {
                $.ajax({
                    url: "<?php echo base_url();?>fpo/inventory/checkinvoiceno/" + invoicenumber,
                    type: "GET",
                    data: "",
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        responspayment_typem();
                        responseArray = $.parseJSON(response);
                        if (responseArray.status == 1) {
                            $("#invoice_validate").html("<div class='alert alert-success'>" + responseArray.message + "</div>");
                        } else {
                            $("#invoice_no").focus();
                            $("#invoice_no").val('');
                            $("#invoice_validate").html("<div class='alert alert-danger'>" + responseArray.message + "</div>");
                        }
                    }
                });
            }
        }

        function checkSupplierInvoiceNo() {
            var invoiceNo = $('#invoice_no').val();
            var supplierId = $('#supplier').val();
            if (invoiceNo != '' && supplierId != '') {
                var data = {
                    invoiceNo: invoiceNo,
                    supplierId: supplierId
                };

                $.ajax({
                    url: "<?php echo base_url();?>fpo/inventory/checkSupplierInvoiceNo",
                    method: "POST",
                    data: data,
                    cache: false,
                    dataType: "html",
                    success: function(response) {
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        if (responseArray.status == 1) {
                            $("#invoice_validate").html("<div class='alert alert-success'>" + responseArray.message + "</div>");
                        } else {
                            $("#invoice_no").focus();
                            $("#invoice_no").val('');
                            $("#invoice_validate").html("<div class='alert alert-danger'>" + responseArray.message + "</div>");
                        }
                    }
                });
            }
        }

        function updateItemCount(selectedItem, itemCount, UOM_Value, qty_value, uom_id) {
            if (selectedItem != '') {
                $.ajax({
                    url: "<?php echo base_url();?>fpo/finance/getProductCountByID/" + selectedItem,
                    type: "GET",
                    data: '',
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        //console.log(responseArray.productCount);
                        if (responseArray.productCount.qty != null) {
                            if (temp_totalCount[selectedItem]) {
                                temp_totalCount[selectedItem] = (Number(temp_totalCount[selectedItem]) + Number(qty_value));
                            } else if (temp_totalCount[selectedItem] == undefined) {
                                temp_totalCount[selectedItem] = Number(responseArray.productCount.qty);
                            } else {
                                temp_totalCount[selectedItem] = (Number(responseArray.productCount.qty) + Number(qty_value));
                            }

                            $('#' + itemCount).html('<strong> Stock: ' + temp_totalCount[selectedItem] + ' ' + responseArray.productCount.uom_name + '</strong>');
                            if (responseArray.productCount.uom != 0 && responseArray.productCount.uom != null) {
                                $('#' + UOM_Value).val(responseArray.productCount.uom);
                            } else {
                                $('#' + UOM_Value).val('');
                            }
                        } else {
                            if (temp_totalCount[selectedItem] != undefined) {
                                temp_totalCount[selectedItem] = (Number(temp_totalCount[selectedItem]) + Number(qty_value));
                            } else if (temp_totalCount[selectedItem] == undefined) {
                                temp_totalCount[selectedItem] = 0;
                            }
                            $('#' + itemCount).html('<strong> Stock: ' + temp_totalCount[selectedItem] + '</strong>');
                            $('#' + UOM_Value).val('');
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        //alert('Error!!! Try again');
                    }
                });
            } else {
                $('#' + itemCount).html('');
            }
        }
    </script>
</body>

</html>
