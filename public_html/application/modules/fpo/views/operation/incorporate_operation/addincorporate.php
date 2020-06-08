<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
    .form-control {
        text-transform: initial ! important;
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
                            <h1>Upload Incorporation Documents</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Operation Management</a></li>
                                <li><a class="active" href="<?php echo base_url('fpo/operation/addincorporate');?>">Upload Incorporation Documents</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('fpo/operation/post_incorporate')?>" method="post" enctype="multipart/form-data" id="directorform" name="sentMessage" novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <div class="table-responsive mt-3">
                                                <table class="table table-bordered" id="dynamic_field">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                                Document Name
                                                            </th>
                                                            <th class="text-center">
                                                                Document Type
                                                            </th>
                                                            <th class="text-center">
                                                                Upload
                                                            </th>
                                                            <th class="text-center">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="div1">
                                                        <tr>
                                                            <td width="30%">
                                                                <select class="form-control document_type_chng" id="document_name0" name="document_name[]" required data-validation-required-message="Select name of committee member">
                                                                    <option value="">Select Document Name</option>
                                                                    <?php for($i=0; $i<count($doc_type);$i++) { ?>
                                                                    <option value="<?php echo $doc_type[$i]->id; ?>"><?php echo $doc_type[$i]->doc_name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </td>
                                                            <td width="30%">
                                                                <select class="form-control" readonly id="document_type0" name="document_type[]" required data-validation-required-message="Select name of committee member">
                                                                    <option value="">Select Document Type</option>
                                                                </select>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </td>
                                                            <td width="30%">
                                                                <input type="file" name="file_path[]" id="file_type0" accept="application/pdf,image/jpeg" class="form-control fl_upload" />
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </td>
                                                            <td width="20%">
                                                                <button type="button" name="add" id="add" class="btn btn-success">+</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="row row-space">
                                            <div class="form-group col-md-12 text-center">
                                                <div id="success"></div>
                                                <button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                                <a href="<?php echo base_url('fpo/operation/incorporatelist');?>" class="btn btn-outline-dark"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    </div>

    <?php $this->load->view('templates/footer.php');?>
    <?php $this->load->view('templates/bottom.php');?>
    <?php $this->load->view('templates/datatable.php');?>
    <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo asset_url()?>js/register.js"></script>
    <script>
        $(document).ready(function() {
            $(".document_type_chng").change(function() {
                var val = $(this).val();
                if (val == "1" || val == "4" || val == "5" || val == "6" || val == "7" || val == "8" || val == "9") {
                    $("#document_type0").html("<option value='1'>Pdf/jpeg</option>");
                } else if (val == "2" || val == "3") {
                    $("#document_type0").html("<option value='2'>Pdf</option>");
                }
            });

            $(".fl_upload").on('change', function(event) {
                fileCount = this.files.length;
                //var oFile = $(this).files[0];
                var file = event.target.files[0];
                var FileSize = file.size / 1024;
                if (FileSize > 512) {
                    swal('', "File size exceeds 512 KB");
                    $(".fl_upload").val(''); //the tricky part is to "empty" the input file here I reset the form.
                    return;
                }
                var type_id = $(this).closest("tr").find('.document_type_chng').val();
                if (type_id == "1" || type_id == "4" || type_id == "5" || type_id == "6" || type_id == "7" || type_id == "8" || type_id == "9") {
                    if (!file.type.match('image/jp.*') && !file.type.match('application/pdf')) {
                        swal('', "only PDF/JPG file allowed to upload");
                        $(".fl_upload").val('');
                        return;
                    }
                } else if (type_id == "2" || type_id == "3") {
                    if (!file.type.match('application/pdf')) {
                        swal('', "only PDF document allowed to upload");
                        $(".fl_upload").val('');
                        return;
                    }
                }
            });

            $(document).on('click', '#sendMessageButton', function() {
                var validate = true;
                $('#div1').find('input[type=file],select').each(function() {
                    if ($(this).val() == "") {
                        validate = false;
                    }
                });
                if (validate) {
                    return true;
                } else {
                    swal('', "Provide all the data");
                    return false;
                }

            });

        });

        function initfiletype() {
            $(".document_type_chng1").change(function() {
                var val = $(this).val();

                if (val == "1" || val == "4" || val == "5" || val == "6" || val == "7" || val == "8" || val == "9") {
                    $(this).closest(".dynamic-added").find('.restrict_type').html("<option value='1'>Pdf/jpeg</option>");
                } else if (val == "2" || val == "3") {
                    $(this).closest(".dynamic-added").find('.restrict_type').html("<option value='2'>Pdf</option>");
                } else {
                    $(this).closest(".dynamic-added").find('.restrict_type').html("<option value='2'>Pdf</option>");
                }
            });

            $(".fl_upload").on('change', function(event) {
                fileCount = this.files.length;
                //var oFile = $(this).files[0];
                var file = event.target.files[0];
                var FileSize = file.size / 1024;
                if (FileSize > 512) {
                    swal('', "File size exceeds 512 KB");
                    $(".fl_upload").val(''); //the tricky part is to "empty" the input file here I reset the form.
                    return;
                }
                var type_id = $(this).closest(".dynamic-added").find('.document_type_chng1').val();
                if (type_id == "1" || type_id == "4" || type_id == "5" || type_id == "6" || type_id == "7" || type_id == "8" || type_id == "9") {
                    if (!file.type.match('image/jp.*') && !file.type.match('application/pdf')) {
                        swal('', "only PDF/JPG file allowed to upload");
                        $(this).val('');
                        return;
                    }
                } else if (type_id == "2" || type_id == "3") {
                    //  alert(type_id);
                    if (!file.type.match('application/pdf')) {
                        swal('', "only PDF document allowed to upload");
                        $(this).val('');
                        return;
                    }
                }
            });
        }


        $(document).ready(function() {
            var i = 0;
            $('#add').click(function() {
                //validate condition
                var validate = true;
                //document.getElementById("sendMessageButton").disabled =false;
                $('#dynamic_field').find('tr input[type=file], tr select').each(function() {
                    if ($(this).val() == "") {

                        validate = false;
                    }
                });
                //select
                $('#dynamic_field').on('change', 'select[id="document_name0"]', function() {
                    var row = $(this).closest('tr');
                    $('select[id="selectBox' + i + '"]', row).each(function() {

                        //alert(selectBox);

                    });
                });
                //validate check
                if (validate) {
                    //document.getElementById("sendMessageButton").disabled =false;
                    document.getElementById('document_name' + i + '').setAttribute("readonly", "true");
                    //document.getElementById('document_type'+i+'').setAttribute("readonly", "true");
                    //document.getElementById('file_type'+i+'').setAttribute("readonly", "true");
                    i++;
                    $('#dynamic_field').prepend('<tr id="row' + i + '" class="dynamic-added"><td><select class="form-control document_type_chng1" id="document_name' + i +
                        '" name="document_name[]" data-validation-required-message="Please select document."><option value="">Select Document Name</option><?php for($i=0; $i<count($doc_type);$i++) { ?><option value="<?php echo $doc_type[$i]->id; ?>"><?php echo $doc_type[$i]->doc_name; ?></option><?php } ?></select><p class="help-block text-danger"></p></td><td><select class="form-control restrict_type" id="document_type' +
                        i +
                        '" name="document_type[]" data-validation-required-message="Please select document."><option value="">Select Document Name</option></select><p class="help-block text-danger"></p></td><td><input type="file" name="file_path[]" id="file_type' +
                        i + '" class="form-control fl_upload"> </td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">-</button></td></tr>');
                    initnumberOnly();
                    initfiletype();
                    return true; // you can submit form or send ajax or whatever you want here
                } else {
                    swal('', "Provide all the data");
                    return false;
                }
            });
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
</body>

</html>
