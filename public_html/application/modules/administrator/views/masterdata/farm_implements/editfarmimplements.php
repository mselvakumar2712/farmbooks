<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                            <h1>Add Farm Implements</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="#">Master Data</a></li>
                                <li><a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>">Farm Implements</a></li>
                                <li class="active">Add Farm Implements</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('administrator/masterdata/update_farmimplements/'.$farmimplements_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate">
                        <input type="hidden" name="farmimplements_id" value="<?php echo $farmimplements_info['id']?>" id="farmimplements_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row row-space  mt-4">
                                                <div class="form-group col-md-3">&nbsp;</div>
                                                <div class="form-group col-md-6">
                                                    <label class=" form-control-label">Type of Implement <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check-inline form-check">
                                                                <label for="inline-radio1" class="form-check-label">
                                                                    <input type="radio" id="implement_type" name="implement_type" <?php if($farmimplements_info['Primary_Yes']==1){ echo "checked" ;}?> value="1" class="form-check-input"
                                                                      required="required" data-validation-required-message="Please Check ownership." disabled><span class="ml-1">Primary</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check-inline form-check">
                                                                <label for="inline-radio2" class="form-check-label">
                                                                    <input type="radio" id="implement_type" name="implement_type" <?php if($farmimplements_info['Primary_Yes']==2){ echo "checked" ;}?> value="2" class="form-check-input"
                                                                      required="required" data-validation-required-message="Please Check ownership." disabled><span class="ml-1">Attachment</span>

                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-3">&nbsp;</div>
                                            </div>
                                            <div class="row row-space  ">
                                                <div class="form-group col-md-3">&nbsp;</div>
                                                <div class="form-group col-md-5" id="implements_primary" style="display:none;">
                                                    <label for="inputAddress2">Primary </label>
                                                    <input type="text" id="primary" name="primary" <?php if($farmimplements_info['Primary_Yes']==1){?>value="<?php echo $farmimplements_info['name'];?>" <?php }?>maxlength="50" class="form-control"
                                                      maxlength="75" placeholder="Primary" required="required" data-validation-required-message="Please enter primary." disabled>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-5" id="implements_attach" style="display:none;">
                                                    <label for="inputAddress2">Attachment </label>
                                                    <input type="text" id="attachment" name="attachment" maxlength="50" class="form-control" maxlength="75"
                                                      <?php if($farmimplements_info['Primary_Yes']==2){?>value="<?php echo $farmimplements_info['name'];?>" <?php }?> placeholder="Attachment" required="required"
                                                      data-validation-required-message="Please enter attachment." disabled>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-3">&nbsp;</div>
                                            </div>
                                            <div class="row row-space  ">
                                                <div class="form-group col-md-3">&nbsp;</div>
                                                <div class="form-group col-md-5">
                                                    <label for="inputAddress2">Name Local </label>
                                                    <input type="text" id="name_local" name="name_local" value="<?php echo $farmimplements_info['name_local'];?>" class="form-control" maxlength="75" placeholder="Name local" required="required" data-validation-required-message="Please enter local name." disabled>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-3">&nbsp;</div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <div id="success"></div>
                                                <button id="edit" class="btn btn-success text-center" type="button"> <i class="fa fa-edit"></i> Edit</button>
                                                <button id="sendMessageButton" class="btn btn-success text-center" type="submit" style="display:none;"> <i class="fa fa-check-circle"></i> Update</button>
                                                <!--	<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
                                                <a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>"><button id="ok" href="" class="btn btn-outline-dark text-center" type="button"><i class="fa fa-arrow-circle-left"></i>
                                                        Back</button></a>
                                                <a href="<?php echo base_url('administrator/masterdata/farmimplementslist');?>"><button id="cancel" href="" style="display:none" class="btn btn-outline-dark text-center" type="button"><i
                                                          class="fa fa-close" aria-hidden="true"></i> Cancel</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>

    <?php $this->load->view('templates/footer.php');?>
    <?php $this->load->view('templates/bottom.php');?>
    <?php $this->load->view('templates/datatable.php');?>
    <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo asset_url()?>js/register.js"></script>
    <script>
        $('#edit').click(function() {
            $('#editfig').toggleClass('view');
            $("#sendMessageButton").show();
            $("#cancel").show();
            $("#edit").hide();
            $("#ok").hide();
            $('input').each(function() {
                var inp = $(this);
                //var button = $(this);
                if (inp.attr('disabled')) {
                    inp.removeAttr('disabled');
                    document.getElementById("sendMessageButton").disabled = false;
                    document.getElementById("cancel").disabled = false;
                } else {
                    //inp.attr('disabled', 'disabled');
                }
            });
            $('select').each(function() {
                var inp = $(this);
                if (inp.attr('disabled')) {
                    inp.removeAttr('disabled');
                    document.getElementById("sendMessageButton").disabled = false;
                    document.getElementById("cancel").disabled = false;
                } else {
                    inp.attr('disabled', 'disabled');
                }
            });
        });

        $(document).ready(function() {

            var implements_type = $("input[name='implement_type']");
            var chk = "";
            if (implements_type) {

                if (implements_type.is(':checked')) {
                    $("input[name='implement_type']:checked").each(function() {
                        chk = $(this).val() + ",";
                        chk = chk.slice(0, -1);
                    });
                    // return value of checkbox checked
                    if (chk == 1) {
                        $('#implements_primary').show();
                        $('#implements_attach').hide();
                    } else if (chk == 2) {
                        $('#implements_attach').show();
                        $('#implements_primary').hide();
                    } else {
                        $('#implements_primary').hide();
                        $('#implements_attach').hide();
                    }
                }
            }
            $('input').on('click', function() {

                if (implements_type.is(':checked')) {
                    $("input[name='implement_type']:checked").each(function() {
                        chk = $(this).val() + ",";
                        chk = chk.slice(0, -1);
                    });
                    // return value of checkbox checked
                    if (chk == 1) {
                        $('#implements_primary').show();
                        $('#implements_attach').hide();
                    } else if (chk == 2) {
                        $('#implements_attach').show();
                        $('#implements_primary').hide();
                    } else {
                        $('#implements_primary').hide();
                        $('#implements_attach').hide();
                    }
                }
            });
            //sweetalert
            $('a.del').click(function() {
                var farm_id = <?php echo $farmimplements_info['id'] ?> ;
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $(this).prop("disabled", true);
                        $.ajax({
                            url: "<?php echo base_url();?>administrator/masterdata/delete_farmimplements/" + farm_id,
                            type: "POST",
                            data: {
                                this_delete: farm_id,
                            },
                            cache: false,
                            success: function() {
                                setTimeout(function() {
                                    window.location.replace("<?php echo base_url('administrator/masterdata/farmimplementslist')?>");
                                }, 1000);
                            },
                            error: function() {

                                setTimeout(function() {
                                    swal("Error in progress. Try again!!!");
                                }, 1000);
                            },
                            complete: function() {
                                setTimeout(function() {
                                    $(this).prop("disabled", true); // Re-enable submit button when AJAX call is complete
                                }, 1000);
                            }
                        });
                    } else {
                        swal("Cancelled", "You have cancelled the farm implements information delete action", "info");
                        return false;
                    }
                });
            });
        });
    </script>
</body>

</html>
