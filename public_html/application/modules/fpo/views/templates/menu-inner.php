<!-- Header-->
<header id="header" class="header">
    <div class="header-menu">
        <?php if($page_module=='dashboard'){?>
        <div class="col-12 col-sm-1 text-center mobile-center">
            <img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
        </div>
        <div class="col-12 col-sm-11">
            <?php }else if($page_module =='fpo-profile'){?>
            <div class="col-12 col-sm-1 text-center mobile-center">
                <img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO">
            </div>
            <div class="col-12 col-sm-11">
                <?php }else{?>
                <div class="col-sm-2">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>
                <div class="col-12 col-sm-10">
                    <?php }?>
                    <div class="header-left float-right mt-2 text-right">
                        <label class="text-success">
                            <a class="text-success text-capitalize" href="#">
                                <?php //echo 'Hi, '.character_limiter($_SESSION['name'], 12);?>
                                <?php
                                 $loggername = word_limiter($_SESSION['name'],2);
                                 echo 'Hi, '.character_limiter($loggername, 10);
                              ?>
                            </a>
                        </label>
                    </div>
                    <div class="user-area dropdown float-right text-center">
                        <a class="nav-link signout" href="#"><i class="fa fa-power-off text-danger"></i></a>
                    </div>
                    <!--<div class="user-area dropdown float-right text-center">
                     <a class="nav-link" href="#"><i class="fa fa-cog text-success"></i></a>
                  </div>-->


                    <div class="header-left float-right">
                        <div class="dropdown for-notification">
                            <div class="btn-group" style="right:0;" role="group" aria-label="...">
                                <div class="btn-group" role="group" style="right:0;">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-cog fa-x text-success"></i>
                                    </button>
                                    <ul class="dropdown-menu" style="border: 1px solid #a9c33a;">
                                        <li style="border-bottom: 1px solid #a9c33a;">
                                            <a href="<?php echo base_url('fpo/fpo/profile/'.$_SESSION['user_id']);?>">
                                                <p class="">Profile</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="" href="<?php echo base_url('fpo/fpo/changepassword/'.$this->session->userdata('user_id'));?>">
                                                <p class="">Change Password</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-left float-right">
                        <div class="dropdown for-notification">
                            <div class="btn-group" style="right:0;" role="group" aria-label="...">
                                <div class="btn-group" role="group" style="right:0;">
                                    <button type="button" onclick="location.href='<?php echo base_url('fpo/ticket/ticketlist');?>';" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bell text-success mb-3"></i>
                                        <span class="count bg-danger">5</span>
                                        <span class="caret"></span>
                                    </button>
                                    <a href="<?php echo base_url('fpo/dashboard/active_module/approver');?>" class="btn btn-default dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                                        <p class="text-success"><b>Queue</b></p>
                                        <span class="count bg-danger">10</span>
                                        <span class="caret"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown for-notification buttons float-right">
                        <button class="grid-view text-success" type="button" id="notification" data-toggle="" aria-haspopup="true" aria-expanded="false" onclick="gridMenuShow();"><i class="fa fa-th"></i></button>
                        <div id="grid" class="grid">
                            <div class="container-fluid">
                                <div class="row grid-wrepper-row">
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/profile');?>"><img src="<?php echo asset_url()?>img/icons/profile.png" class="img-fluid">
                                            <p class="text-center mt-2">Profile </p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2 text-center" href="<?php echo base_url('fpo/dashboard/active_module/farmer');?>"><img src="<?php echo asset_url()?>img/icons/farmer.png" class="img-fluid">
                                            <p class="text-center mt-2">Farmer </p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/user');?>"><img src="<?php echo asset_url()?>img/icons/user.png" class="img-fluid">
                                            <p class="text-center mt-2">User </p>
                                        </a>
                                    </div>
                                    <!-- <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/role');?>"><img src="<?php echo asset_url()?>img/icons/role.png" class="img-fluid">
                                            <p class="text-center mt-2">Role</p>
                                        </a>
                                    </div>-->
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/finance');?>"><img src="<?php echo asset_url()?>img/icons/finance.png" class="img-fluid">
                                            <p class="text-center mt-2">Finance</p>
                                        </a>
                                    </div>
                                    <!-- <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/inventory');?>"><img src="<?php echo asset_url()?>img/icons/f-diary.png" class="img-fluid">
                                            <p class="text-center mt-2">Inventory</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/market');?>"><img src="<?php echo asset_url()?>img/icons/market.png" class="img-fluid">
                                            <p class="text-center mt-2">Sales</p>
                                        </a>
                                    </div> -->
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/operation');?>"><img src="<?php echo asset_url()?>img/icons/fpo.png" class="img-fluid">
                                            <p class="text-center mt-2">Operation</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/share');?>"><img src="<?php echo asset_url()?>img/icons/share.png" class="img-fluid">
                                            <p class="text-center mt-2">Share</p>
                                        </a>
                                    </div>

                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/crop');?>"><img src="<?php echo asset_url()?>img/icons/crop.png" class="img-fluid">
                                            <p class="text-center mt-2">Crop</p>
                                        </a>
                                    </div>
                                    <!-- <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/production'); ?>"><img src="<?php echo asset_url(); ?>img/icons/production.png" class="img-fluid">
                                            <p class="text-center mt-2">Production</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" target="blank" href="http://35.197.91.188/EaszERP/"><img src="<?php echo asset_url()?>img/icons/supply-chain.png" class="img-fluid">
                                            <p class="text-center mt-2">Supply Chain</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" target="blank" href="<?php echo $ecommerce_url; ?>"><img src="<?php echo asset_url()?>img/icons/e-commerce.png" class="img-fluid">
                                            <p class="text-center mt-2">E-commerce</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="#"><img src="<?php echo asset_url()?>img/icons/loan.png" class="img-fluid">
                                            <p class="text-center mt-2">Loan</p>
                                        </a>
                                    </div>

                                    <div class="col-4 text-center">
                                        <a class="mt-2" target="blank" href="http://104.196.222.48/EaszHCM"><img src="<?php echo asset_url()?>img/icons/hr.png" class="img-fluid">
                                            <p class="text-center mt-2">HR</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" target="blank" href="http://104.196.222.48/EaszHCM"><img src="<?php echo asset_url()?>img/icons/hiring.png" class="img-fluid">
                                            <p class="text-center mt-2">Hiring</p>
                                        </a>
                                    </div> -->
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/setting');?>"><img src="<?php echo asset_url()?>img/icons/settings.png" class="img-fluid">
                                            <p class="text-center mt-2">Settings</p>
                                        </a>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="mt-2" href="<?php echo base_url('fpo/dashboard/active_module/search');?>"><img src="<?php echo asset_url()?>img/icons/quick-link.png" class="img-fluid">
                                            <p class="text-center mt-2">Quick Link</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-left float-right">
                        <label class="btn btn-default">
                            <input class="form-control text-uppercase" id="module_code" name="module_code" placeholder="Quick Link">
                        </label>
                    </div>
                </div>

            </div>
</header><!-- /header -->
<script>
    var menuClick = 0;

    function gridMenuShow() {
        if (menuClick == 0) {
            document.getElementById("grid").style.display = "block";
            menuClick = 1;
        } else {
            document.getElementById("grid").style.display = "none";
            menuClick = 0;
        }

    }

    /* $("#searchSubmit").click(function(){
        var panchayatCode = $('#search_panchayat').val();
        var villageCode = $('#search_village').val();
        var mobile_number = $('#mobile_num').val();
        loadFarmers(panchayatCode, villageCode, mobile_number);
    });  */


    function loadFarmers(module_code) {
        if (module_code != "") {
            var formedCode = {
                'module_code': module_code
            };
            $.ajax({
                url: "<?php echo base_url();?>fpo/dashboard/searchByModule",
                type: "POST",
                data: formedCode,
                dataType: "html",
                cache: false,
                success: function(response) {
                    console.log(response);
                    response = response.trim();
                    responseArray = $.parseJSON(response);
                    if (responseArray.status == 1) {
                        var search_list = "";
                        var count = 1;
                        if (responseArray.search_list.length != 0) {

                            console.log(responseArray.search_list.length);

                        } else {}
                    }
                },
                error: function() {}
            });
        } else {
            swal("Sorry", "Provide any field");
        }
    }
</script>
