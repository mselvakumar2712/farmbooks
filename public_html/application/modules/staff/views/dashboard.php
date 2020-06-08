<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
   <body>
      <div class="container-fluid pl-0 pr-0">        
         <!-- Right Panel -->
         <div id="right-panel" class="right-panel" style="width:100vw;padding:0 !important; margin:0 !important;">
            <?php $this->load->view('templates/menu-inner.php');?>
            <!-- Header-->
            
            <div class="container">              
               <div class="col-md-12 col-xs-12 col-center">
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
               </div> 


           
               <div class="container-fluid mt-1">         
					<div class="col-md-12">
						<div class="row px-3 py-4" style="height:100%">
						<?php for($i=0;$i<count($roles);$i++){ ?>
                        <div class="col-lg-2">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body" style="text-align: center;">
									<a class="" href="<?php echo base_url('staff/dashboard/active_module/'.$roles[$i]->module_name);?>"><img src="<?php echo asset_url(); ?>img/icons/profile.png" class="img-fluid center-block"></a>
                                    <h4 class="mt-3"><?php echo $roles[$i]->module_name; ?></h4>
                                </div>
                            </div>
                        </div><!-- /# column -->
						<?php } ?>   
						</div>
					</div> 
               </div>
            </div> 
			</div>
		</div>
	<?php $this->load->view('templates/footer.php');?>      
	<?php $this->load->view('templates/bottom.php');?>   	  
</body>
</html>