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
                        <h1>Add District</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a href="<?php echo base_url('administrator/masterdata/districtlist');?>">District</a></li>
                            <li class="active">Add District</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('success');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('danger')){?>
			<div class="alert alert-danger alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('danger');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('info')){?>
			<div class="alert alert-info alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('info');?></strong> 
			</div>
			<?php }elseif($this->session->flashdata('warning')){?>
			<div class="alert alert-warning alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('warning');?></strong> 
			</div>
			<?php }?>
            <div class="animated fadeIn">
				  <form   id="districtform" name="sentMessage" action="<?php echo base_url('administrator/masterdata/post_district')?>" method="post" novalidate="novalidate" >
                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
										<div class="container-fluid">
										  <div class="row row-space">
												<div class="form-group col-md-6">
													<label for="inputAddress2">State Name <span class="text-danger">*</span></label>
													<select  class="form-control" id="state_name" name="state_name" required="required" data-validation-required-message="Please Select state name .">
													<option value="">Select State Name </option>
													<?php for($i=0; $i<count($state);$i++) { ?>										
													 <option value="<?php echo $state[$i]->state_code; ?>"><?php echo $state[$i]->name; ?></option>
													<?php } ?>
													</select>
													<p class="help-block text-danger"></p>
												</div>
												<div class="form-group col-md-6">
													<label for="inputAddress2">District Name (In English) <span class="text-danger">*</span></label>
													<input type="text" class="form-control "  id="district_name" name="district_name" placeholder="District Name In English"  required="required" data-validation-required-message="Please enter district name.">
													<p class="help-block text-danger"></p>
												</div>													
										 </div>
										<div class="row row-space">
											
											<div class="form-group col-md-6">						    
												<label for="inputAddress2">District Name (In Local Language)  <span class="text-danger">*</span></label>
												<input type="text" class="form-control "  id="district_name_local" name="district_name_local" placeholder="District Name In Local Language"  required="required" data-validation-required-message="Please enter district name in local language.">
												<p class="help-block text-danger"></p>
											</div>		
										</div>						  										
										 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<input id="sendMessageButton" value="Save" class="btn btn-success text-center" type="submit">
												<a href="<?php echo base_url('administrator/masterdata/districtlist');?>" class="btn btn-outline-dark">Cancel</a>	
											  </div>
											 
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
$(document).ready(function() {
    
});

$.fn.serializeObject = function() {
  var o = {};
  var a = this.serializeArray();
  $.each(a, function() {
    if (o[this.name] !== undefined) {
      if (!o[this.name].push) {
        o[this.name] = [o[this.name]];
      }
      o[this.name].push(this.value || '');
    } else {
      o[this.name] = this.value || '';
    }
  });
  return o;
};    
</script>
</body>
</html>