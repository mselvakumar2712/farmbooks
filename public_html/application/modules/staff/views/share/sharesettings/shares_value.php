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
                        <h1>Add Shares Value</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Settings</a></li>
                            <li class="active">Add Shares Value</li>
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
					<form action="<?php echo base_url('staff/setting/post_shares_value')?>" method="post"  id="gstform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									<div class="container-fluid">
									  <div class="row row-space  mt-4" > 
											<div class="form-group col-md-4">
												<label for="inputAddress2">Shares Released   <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly"  name="shares_released" maxlength="5"  id="shares_released" placeholder="Shares Released  " required="required" data-validation-required-message="Please enter shares released ">
												<div class="help-block with-errors text-danger"></div>
											</div>
										    <div class="form-group col-md-4">
												<label for="inputAddress2">Shares value (Unit Price) <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly"  name="shares_value" maxlength="5"  id="shares_value" placeholder="Shares Value" required="required" data-validation-required-message="Please enter shares value ">
												<div class="help-block with-errors text-danger"></div>
											</div>
									        <div class="form-group col-md-4">
												<label for="inputAddress2">Shares Released or Reversed Date <span class="text-danger">*</span></label>
												<input type="date" class="form-control"  name="shares_released_date" value="<?php echo date('Y-m-d'); ?>"   id="shares_released_date"  required="required" data-validation-required-message="Please enter shares released or reversed date "  max="2050-12-31">
												<div class="help-block with-errors text-danger"></div>
											</div>
									  </div>
									<div class="form-group col-md-12 mt-4">	
											<div class="row row-space">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
												<a href="<?php echo base_url('staff/setting/sharesvalue');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
											  </div>											 
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
$(function(){
	var dtToday = new Date();    
	var month = dtToday.getMonth() + 1;
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	month = '0' + month.toString();
	if(day < 10)
	day = '0' + day.toString();       
	var maxDate = year + '-' + month + '-' + day;
	$('#shares_released_date').attr('max', maxDate);

});

</script>	 
</body>
</html>