<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
   <body class="login">
      <?php $this->load->view('templates/loginmenu.php');?>
      <section id="login">      
         <!-- Contents -->
         <div class="container"> 
            <div class="row">
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
		      </div>	  
				<div class="row">
               <div class="col-md-6 offset-md-3">                  
                  <div class="col-lg-12 text-center">
                     <h2 class="section-heading mt-2">Login</h2>
                  </div>
                  <div class="col-md-8 offset-md-2">
                     <form id="loginForm" name="sentMessage" novalidate="novalidate" action="<?php echo base_url('staff');?>" method="post">
                        <div class="form-group mt-4 mb-2">
                           <h5 class="text-green text-center">Mobile No.</h5>
                           <input type="text" name="mobile_no" placeholder="9876543210" class="form-username text-center numberOnly" id="mobile_no" minlength=10 maxlength=10 data-validation-required-message="Please enter your mobile no." required="required">
                           <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mt-2">
                           <h5 class="text-green text-center">Password</h5>
                           <input type="password" name="password" placeholder="password" class="form-password text-center" pattern="\S{6,30}" title="Password should have atleast 6 characters."  id="password" data-validation-required-message="Please enter password." required="required">
                           <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group row mt-4">
                           <div class="col-sm-12 text-center">
                              <div id="success"></div>
                                 <button type="submit" name="save" id="sendMessageButton" class="btn btn-primary btn-lg btn-labeled ">
                                    Sign in
                                 </button> 
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
				</div>
			</div>
		</section>
      <?php $this->load->view('templates/footer1.php');?>      
      <?php $this->load->view('templates/bottom.php');?>   
	   <?php $this->load->view('templates/datatable.php');?> 
		<script src="<?php echo asset_url()?>js/login.js"></script>    
   </body>
</html>