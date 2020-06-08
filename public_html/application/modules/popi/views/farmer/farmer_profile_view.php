<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
#step-1 .form-group .value label, #step-2 .form-group .value label {
     color: #59B210;
}
#step-1 , #step-2 {
    font-size: 1.2rem;
}
.land_detail_button , .farm_implement_button, .live_stock_button {
    float: left;
    display: none;
    margin: 0px 10px 25px 10px;
}
    
    #step-1 .value label {
        text-transform: capitalize;
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
                        <h1>View Farmer Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a href="<?php echo base_url('popi/farmer/profilelist'); ?>">Farmer Profile</a></li>
				            <li class="active">View Farmer Profile</li>
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
				            <div class="container">
							<br />
							     <form action="#" id="farmer_profileForm"  name="farmer_profileForm" method="post"  enctype="multipart/form-data" >

                    <div>
                        <div class="col-md-12" style="text-align:right;margin-bottom:20px;">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <div class="land_detail_button" style="">
                                    <a href="<?php echo base_url('popi/farmer/addland?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Land Detail</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="farm_implement_button" style=";">
                                    <a href="<?php echo base_url('popi/farmer/add_farmimplement?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Farm Implement</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="live_stock_button" style="">
                                    <a href="<?php echo base_url('popi/farmer/addlivestock?id='.$farmer_list[0]->id);?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                             <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Live Stock</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div id="step-1"><input type="hidden" name="id" value="<?php echo $farmer_list[0]->id; ?>" id="id">
                                <div id="form-step-0" class="form-horizontal" role="form" data-toggle="validator">
                                <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-4">
                                        <label for="">Name of the Farmer</label>
                                        <div class="value">
                                            <label id="farmer_profile_name" name="farmer_profile_name" readonly><?php echo $farmer_list[0]->profile_name; ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Alias Name</label>
                                        <div class="value">
                                            <label id="farmer_alias_name" name="farmer_alias_name" readonly><?php echo $farmer_list[0]->alias_name; ?></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Father Name/Spouse Name</label>
                                        <div class="value">
                                            <label id="farmer_father_spouse_name" name="farmer_father_spouse_name" readonly><?php echo $farmer_list[0]->father_spouse_name; ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Number of Dependents</label>
                                        <div class="value">
                                            <label id="farmer_number_dependents" name="farmer_number_dependents" readonly><?php echo $farmer_list[0]->no_of_dependents; ?></label>
                                        </div>                                        					
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Mobile Number</label>
                                        <div class="value">
                                            <label id="farmer_mobile_num" name="farmer_mobile_num" readonly><?php echo $farmer_list[0]->mobile; ?></label>
                                        </div>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">AADHAAR Number</label>
                                        <div class="value">
                                            <label id="farmer_aadhaar_num" name="farmer_aadhaar_num" readonly><?php echo $farmer_list[0]->aadhar_no; ?></label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">PINCODE</label>
                                        <div class="value">
                                            <label id="farmer_pin_code" name="farmer_pin_code" readonly><?php echo $farmer_list[0]->pin_code; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">State</label>
                                        <div class="value">
                                            <label id="farmer_state" name="farmer_state" readonly><?php echo $farmer_list[0]->state_name; ?></label>
                                        </div> 
                                    </div>                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">District</label>
                                        <div class="value">
                                            <label id="farmer_district" name="farmer_district" readonly><?php echo $farmer_list[0]->district_name; ?></label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-1">
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Block</label>
                                        <div class="value">
                                            <label id="farmer_block" name="farmer_block" readonly><?php echo $farmer_list[0]->block_name; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Taluk</label>
                                        <div class="value">
                                            <label id="farmer_taluk" name="farmer_taluk" readonly><?php echo $farmer_list[0]->taluk_name; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">						    
                                        <label for="inputAddress2">Gram Panchayat</label>
                                        <div class="value">
                                            <label id="farmer_gram_panchayat" name="farmer_gram_panchayat" readonly><?php echo $farmer_list[0]->panchayat_name; ?></label>
                                        </div>                                         
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-1">								
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Village</label>
                                        <div class="value">
                                            <label id="farmer_village" name="farmer_village" readonly><?php echo $farmer_list[0]->village_name; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Door No</label>
                                        <div class="value">
                                            <label id="farmer_door_no" name="farmer_door_no" readonly><?php echo $farmer_list[0]->door_no; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Street</label>
                                        <div class="value">
                                            <label id="farmer_street" name="farmer_street" readonly style="text-transform: capitalize;"><?php echo $farmer_list[0]->street; ?></label>
                                        </div> 
                                    </div>
                                </div>
                                <div class="form-group col-md-12">	
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Date of Birth</label>
                                        <div class="value">
                                            <label id="farmer_dob" name="farmer_dob" readonly><?php echo $farmer_list[0]->dob; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Age</label>
                                        <div class="value">
                                            <label id="farmer_age" name="farmer_age" readonly><?php echo $farmer_list[0]->age; ?></label>
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputAddress2">Income Category</label>
                                        <div class="value">
                                            <label id="farmer_income_category" name="farmer_income_category" readonly><?php echo ($farmer_list[0]->income_category == 1)?"Above Poverty Line (APL)":"Below Poverty Line (BPL)"; ?></label>
                                        </div> 
                                    </div>                                    
                                </div>                                
                                    
                                <div class="form-group col-md-12">	
                                    <div class="col-md-4">
                                        <label class="text-center">Land Holdings</label>	
                                        <div class="value">
                                            <label id="land_holdings" name="land_holdings" readonly><?php echo ($farmer_list[0]->land_holdings == 1)?'Yes':'No'; ?></label>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-center">Farm Implements</label>	
                                        <div class="value">
                                            <label id="farm_implements" name="farm_implements" readonly><?php echo ($farmer_list[0]->farm_implements == 1)?'Yes':'No'; ?></label>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-4">
                                        <label class="text-center">Live Stocks</label>	
                                        <div class="value">
                                            <label id="live_stocks" name="live_stocks" readonly><?php echo ($farmer_list[0]->live_stocks == 1)?'Yes':'No'; ?></label>
                                        </div>                                        
                                    </div>
                                </div>
                                    
                                <div class="form-group col-md-12">	
                                    <div class="form-group col-md-4">
                                          <label class="form-check-label" for="gridCheck">Is Promoter</label>
                                            <div class="value">
                                                <label id="farmer_ispromotor" name="farmer_ispromotor" readonly><?php echo ($farmer_list[0]->is_promotor == 1)?'Yes':'No'; ?></label>
                                            </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                          <label class="form-check-label" for="gridCheck">Willing to be a trader?</label>
                                            <div class="value">
                                                <label id="farmer_ispromotor" name="farmer_ispromotor" readonly><?php echo ($farmer_list[0]->is_trader == 1)?'Yes':'No'; ?></label>
                                            </div> 
                                    </div>
                                    <div class="form-group col-md-4" id="filediv">
                                        <label for="inputAddress2">Photo</label>
                                        <div>
                                            <img id="farmer_photo" src="<?php echo base_url('assets/uploads/farmer/'.$farmer_list[0]->photo); ?>" class="img-responsive" alt="farmer_photo"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

				    </div>
                                     
                                     
								<div class="form-group text-center col-md-12  mt-4 ">   
                                    <div id="success"></div>
                                    <a href="<?php echo base_url('popi/farmer/editfarmer/'.$farmer_list[0]->id); ?>" id="" class="btn btn-fs btn-success text-center"><i class="fa fa-edit"></i> Edit</a>
									<a href="<?php echo base_url('popi/farmer/profilelist'); ?>" id="ok" class="btn btn-fs btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>	
								</div>
						       </form>
						     </div>
					      </div>
                       </div>
                     </div>
                  </div>
               </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?> 
<script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
</body>
</html>
<script type="text/javascript">
if('<?php echo $farmer_list[0]->land_holdings; ?>' == 1) {
    $('.land_detail_button').show();
}

if('<?php echo $farmer_list[0]->farm_implements; ?>' == 1) {
	$('.farm_implement_button').show();
}  
    
if('<?php echo $farmer_list[0]->live_stocks; ?>' == 1) {
	$('.live_stock_button').show();    
}  
		
alignAadhaar('<?php echo $farmer_list[0]->aadhar_no; ?>');
function alignAadhaar(aadhaar_value){
    if (aadhaar_value.length > 0 && aadhaar_value.length == 12) {
        aadhaar_value = aadhaar_value.match(new RegExp('.{1,4}', 'g')).join(" ");
    }
    document.getElementById('farmer_aadhaar_num').innerHTML = aadhaar_value;
}         
</script>