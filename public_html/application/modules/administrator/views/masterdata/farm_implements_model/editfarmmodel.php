<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($farmimplements_info);
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />

<body>
    <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>
            <div class="breadcrumbs">
                <div class="col-sm-5">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>View Farm Implements Model</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>">Farm Implements Model</a></li>
                                <li class="active"> View Farm Implements Model</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <form action="<?php echo base_url('administrator/masterdata/update_farmimplements_model/'.$farmimplements_info['id'])?>" method="post" id="figform" name="sentMessage" novalidate="novalidate">
                        <input type="hidden" name="farmimplements_id" value="<?php echo $farmimplements_info['id']?>" id="farmimplements_id" readonly>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="row row-space">
                                                <div class="form-group col-md-6">
                                                    <label class=" form-control-label">Type of Implement <span class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-check-inline form-check">
                                                                <label for="implement_type1" class="form-check-label">
                                                                    <input type="radio" id="implement_type" disabled name="implement_type" <?php if($farmimplements_info['Primary_Yes']==1){ echo "checked" ;}?> value="1" class="form-check-input"
                                                                      required="required" data-validation-required-message="Please Check implement." readonly><span class="ml-1">Primary</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-check-inline form-check">
                                                                <label for="implement_type2" class="form-check-label">
                                                                    <input type="radio" id="implement_type" disabled name="implement_type" <?php if($farmimplements_info['Primary_Yes']==2){ echo "checked" ;}?> value="2" class="form-check-input"
                                                                      required="required" data-validation-required-message="Please Check implement." readonly><span class="ml-1">Attachment</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Implement Name <span class="text-danger">*</span></label>
                                                    <select class="form-control" id="implement_name" readonly name="implement_name" required="required" data-validation-required-message="Please Select implement name ." disabled>
                                                        <option value="">Select Implement Name </option>
                                                        <?php
                                                        if($farmimplements_info['Primary_Yes'] == 1){
                                                          foreach($farm_implements as $farm_implements){
                                                            if($farm_implements->id == $farmimplements_info['Implements_id'])
                                                              echo "<option value='".$farm_implements->id."' selected='selected'>".$farm_implements->name."</option>";
                                                            else
                                                              echo "<option value='".$farm_implements->id."'>".$farm_implements->name."</option>";
                                                          }
                                                        } else {
                                                          foreach($farm_implements_attach as $farm_implements_attach){
                                                            if($farm_implements_attach->id == $farmimplements_info['Implements_id'])
                                                              echo "<option value='".$farm_implements_attach->id."' selected='selected'>".$farm_implements_attach->name."</option>";
                                                            else
                                                              echo "<option value='".$farm_implements_attach->id."'>".$farm_implements_attach->name."</option>";
                                                          }
                                                        }
                                                        ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="row row-space">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Make</label>
                                                    <input type="text" class="form-control" readonly maxlength="50" value="<?php echo $farmimplements_info['Make']?>" id="make" name="make" placeholder="Make" required="required"
                                                      data-validation-required-message="Please enter make.">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress2">Model</label>
                                                    <input type="text" class="form-control" disabled maxlength="50" value="<?php echo $farmimplements_info['Model']?>" id="model" name="model" placeholder="Model" required="required"
                                                      data-validation-required-message="Please enter model .">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <div id="success"></div>
                                                <button id="edit" class="btn btn-success text-center" type="button"><i class="fa fa-edit"></i> Edit</button>
                                                <button id="sendMessageButton" class="btn btn-success text-center" type="submit" style="display:none;"><i class="fa fa-check-circle"></i> Update</button>
                                                <!--<a href="#" id="" class="del btn btn-danger"> Delete</a>-->
                                                <a href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>"><button id="ok" href="" class="btn btn-outline-dark text-center" type="button"> <i
                                                          class="fa fa-arrow-circle-left"></i> Back</button></a>
                                                <a href="<?php echo base_url('administrator/masterdata/farmimplementsmodellist');?>"><button id="cancel" href="" style="display:none" class="btn btn-outline-dark text-center" type="button"> <i
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
    <script src="<?php echo asset_url()?>js/select2.min.js"></script>
    <script>
        $('input[name=implement_type]').on('change', function() {
            var implement_id = $("input[name='implement_type']:checked").val();
            //var implement_id = $("#implement_type").val();
            //	alert(implement_id)
            getTypeByImplement(implement_id);
        });



        function getTypeByImplement(implement_id) {
            $("#implement_name option").remove();
            if (implement_id != '') {
                $.ajax({
                    url: "<?php echo base_url();?>administrator/Masterdata/getTypeByImplement/" + implement_id,
                    type: "GET",
                    data: "",
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        console.log(responseArray);
                        if (responseArray.status == 1) {
                            if (Object.keys(responseArray).length > 0) {
                                //   $("#implement_name").append($('<option></option>').val(0).html('Select Implements'));
                            }
                            $.each(responseArray.type_implement_list, function(key, value) {
                                $("#implement_name").append($('<option></option>').val(value.id).html(value.Name));
                            });
                        }
                    },
                    error: function(response) {
                        alert('Error!!! Try again');
                    }
                });
            } else {
                swal("Sorry!", "Select the Implement Name");
            }
        }

        $(document).ready(function() {
            $('.make').select2({
                placeholder: "Select Make", //placeholder
                tags: true
            });

        })

        $('#implement_name').on('change', function() {
            var implement_id = $(this).val();
            getImplementByName(implement_id);
        });

        //new
        function getImplementByName(farmimplements_id) {
            $("#make option").remove();
            if (farmimplements_id != '') {
                $.ajax({
                    url: "<?php echo base_url();?>administrator/Masterdata/getImplementByName/" + farmimplements_id,
                    type: "GET",
                    data: "",
                    dataType: "html",
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        response = response.trim();
                        responseArray = $.parseJSON(response);
                        console.log(responseArray);
                        if (responseArray.status == 1) {
                            if (Object.keys(responseArray).length > 0) {
                                $("#make").append($('<option></option>').val(0).html('Select Make'));

                            }
                            $.each(responseArray.type_implement_name, function(key, value) {
                                $("#make").append($('<option></option>').val(value.id).html(value.Make));
                            });
                        }
                    },
                    error: function(response) {
                        alert('Error!!! Try again');
                    }
                });
            } else {
                swal("Sorry!", "Select the Implement Name");
            }
        }

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
                    inp.attr('disabled', 'disabled');
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
            // $("input[name='implement_type']").removeAttr('disabled', true);
            document.getElementById("implement_type").disabled = false;

            // $("input[name='implement_type']").prop('disabled', 'disabled');
        });
        /*  $(document).ready(function() {
			// sweetalert
			$('a.del').click(function() {
				var farm_id = <?php echo $farmimplements_info['id']?>;
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
					  url: "<?php echo base_url();?>administrator/masterdata/delete_farmimplementsmodel/"+farm_id,
					  type: "POST",
					  data: {
						 this_delete: farm_id,
					  },
					  cache: false,
					  success: function() {
						 setTimeout(function() {
						  window.location.replace("<?php echo base_url('administrator/masterdata/farmimplementsmakelist')?>");
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
				 }else {
					swal("Cancelled", "You have cancelled the farm implements make and model information delete action", "info");
					return false;
				 }
			  });
			});
			}); */


        $("#model").focusout(function() {
            $('#implement_type').removeAttr("disabled", false);
        });
    </script>
</body>

</html>
