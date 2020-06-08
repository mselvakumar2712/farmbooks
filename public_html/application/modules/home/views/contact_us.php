<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header.php');?>
<style>
@media only screen and (max-width: 768px) {
  .mobileinput {
   position:relative;
   right:35px;
   width:100%;
  }
}
</style>
   <body>
      <?php $this->load->view('templates/loginmenu.php');?>
      <main class="body-container">     
      <div id="about-us" class="container">
         <section class="home-intro">
           <h2 class="text-uppercase border-bottom pb-3">Contact Us / New FPO</h2>
         </section>

         <section class="fts-three mt-3">
           <div class="row">
             <div class="col-md-6 col-sm-6 text-center">
                <div class="container position-relative">
                  <form id="contactus"  name="sentMessage" action="<?php echo base_url('home/postcontact');?>" method="post">
                     <h6 class="text-danger">Please fill out your details below to schedule a call </h6>
                      <div class="input-group mb-3">
                       <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-o"></i></span>
                       </div>
                       <input type="text" class="form-control" placeholder="Name"  id="name"  name="name" aria-label="Name" aria-describedby="basic-addon1"  data-validation-required-message="Please enter your name." required="required">
                     </div>
                     <div class="input-group mb-3">
                       <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon2"><i class="fa fa-building-o "></i></span>
                       </div>
                       <input type="text" class="form-control" placeholder="FPO / POPI Name"  id="fpo_name"  name="fpo_name" aria-label="Fponame" aria-describedby="basic-addon2"  data-validation-required-message="Please enter fpo name." required="required">
                     </div>
                     <div class="input-group mb-3">
                       <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fa fa-flag-o "></i></span>
                       </div>
                         <select class="form-control" name="state" id="state" required="required" data-validation-required-message="Please select your state.">
                         <option value="">Select State</option>
                            <?php for($i=0; $i<count($statelist);$i++) { ?>			
                            <option value="<?php echo $statelist[$i]->id;?>"><?php echo $statelist[$i]->name; ?></option>
                            <?php } ?>
                        </select>
                        <p class="help-block text-danger"></p>
                      </div>
                      <div class="input-group ">
                       <div class="input-group-prepend">
                         <div class="input-group-text " id="basic-addon3" style="width:20%;display:inline-block"><img src="<?php echo asset_url()?>img/home/india_flag.png" width="30%"/>  (+ 91)</div>
                       </div>
                       <input type="text" class="form-control col-xs-12 mobileinput numberOnly"  placeholder="Mobile Number"  style="margin-left: 98px;position: relative;bottom: 38px;"id="mobile_no" maxlength="10" minlength="10" name="mobile_no" aria-label="Fponame" aria-describedby="basic-addon3"  data-validation-required-message="Please enter your mobile no." required="required">
                     </div>
                      <div class="input-group mb-3" style="position: relative;bottom: 15px;">
                       <div class="input-group-prepend">
                         <span class="input-group-text" id="basic-addon4"><i class="fa fa-envelope-o"></i></span>
                       </div>
                       <input type="email" class="form-control" placeholder="Email"  id="email"  name="email" aria-label="Fponame" aria-describedby="basic-addon4"  data-validation-required-message="Please enter your email." required="required">
                     </div>

                     <div class="form-group">
                        <button type="submit" name="save" id="sendMessageButton" class="btn btn-success w-100 signout">Submit</button>
                     </div>      
                  </form>
                  </div>
             </div>

             <div class="col-md-6 col-sm-6 text-center mt-5">
               <h4 class="text-success  mt-5">YESTEAM SOLUTION PRIVATE LIMITED</h4>
               <p class="mt-2">#19, Nethaji Bypass Road,</p>
               <p>Dharmapuri 636701, Tamilnadu, India.</p>
               <p><i class="fa fa-phone mr-1"></i>(+91) 4346 200000</p>
               <p><i class="fa fa-envelope mr-1"></i><a href="#">sales@farmbooks.live</a></p>
               <p><i class="fa fa-envelope mr-1"></i><a href="#">support@farmbooks.live</a></p>
             </div>
           </div>

         </section>

       </div>

      </main>
  
      <?php $this->load->view('templates/footer.php');?>      
      <?php $this->load->view('templates/bottom.php');?>
      <script type="text/javascript" src="<?php echo asset_url();?>dist/lib/jquery.min.js" ></script>
      <script type="text/javascript" src="<?php echo asset_url();?>dist/lib/validator.min.js"></script>  
   </body>
</html>