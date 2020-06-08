<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/login-top.php');?>
<?php $this->load->view('templates/login-header.php');?>
   <body class="login">
      <header>
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item active" style="background-image: url('<?php echo asset_url()?>img/login-bg.jpg')">
                  <div class="carousel-caption d-none d-md-block"></div>
               </div>
               <div class="row img_logo">
                  <div class="col-md-8 text-center">           
                     <img class="img-fluid" src="<?php echo asset_url()?>img/logo.png" style="margin:auto;" alt="FPO">
                  </div>
               </div>
               <div class="row img_login">
                  <div class="col-md-5 offset-md-7 form_down" id="login_Form">                                      
                     <div class="row mt-4">
                        <div class="col-md-12 col-xs-12 col-center">                         
                        <?php if($this->session->flashdata('danger')){?>
                        <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong><?php echo $this->session->flashdata('danger');?></strong> 
                        </div>
                        <?php }?>
                        </div>
                     </div>                    
                                          
                     <div class="col-md-12 text-center offset-md-12 mobile-top-12">
                        <h2 class="section-heading mt-10">FPO Staff Login</h2>
                     </div>
                     <div class="col-md-12">
                        <form id="loginForm" name="sentMessage" novalidate="novalidate" action="<?php echo base_url('staff');?>" method="post">
                           <div class="form-group mt-4">
                              <h5 class="text-green text-center">Mobile No.</h5>
                              <input type="text" name="mobile_no" placeholder="9876543210" class="form-username text-center numberOnly" id="mobile_no" minlength=10 maxlength=10 data-validation-required-message="Please enter your mobile no." required="required">
                              <p class="help-block text-danger"></p>
                           </div>
                           <div class="form-group mt-4">
                              <h5 class="text-green text-center">Password</h5>
                              <input type="password" name="password" placeholder="password" class="form-password text-center" pattern="\S{6,8}" minlength=6 maxlength=8 title="Password should have atleast 6 characters."  id="password" data-validation-required-message="Please enter password." required="required">
                              <p class="help-block text-danger"></p>
                           </div>
                           <div class="form-group row mt-4">
                              <div class="col-sm-12 text-center">
                                 <div id="success"></div>
                                 <button type="submit" name="save" id="sendMessageButton" class="btn btn-success btn-lg btn-labeled ">Sign in</button> 
                              </div>
                           </div>
                           <div class="form-group text-center new_acc">
                              <p>Forgot your password? <a href="#">click here</a></p>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>            
         </div>
      </header>
      <?php $this->load->view('templates/footer.php');?>      
   </body>
</html>