<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header_landing.php');?>
<style>
.carousel-indicators li{
   position:relative;
   display:none;   
}
</style>
   <body class="login">
      <header>
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="carousel-item active" style="background-image: url('<?php echo asset_url()?>img/img_4.jpg')">
                  <div class="carousel-caption d-none d-md-block"></div>
               </div>
              <div class="container-fluid img_logo">
                  <div class="col-md-12 text-center">           
                     <img class="img-fluid mt-5" src="<?php echo asset_url()?>img/app-icon.png" style="margin:auto;" alt="FPO">                  
                  </div>
                  <div class="col-md-12 text-center">           
                     <img class="img-fluid mt-5" src="<?php echo asset_url()?>img/logo.png" alt="FPO">
                  </div>
                    <div class="col-md-12 text-center">           
                    <a href="<?php echo base_url('/');?>"><input id="launch" value="Launch" style="background-color: #2665ab;" class="btn btn-lg btn-fs text-white -text-center mt-5" type="button"></a>				  
                  </div>
               </div>
            </div>            
         </div>
      </header>
      <footer class="footer">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-sm-6 text-left">
                     <span class="f-13">Copyrights © <?php echo date("Y");?> Yesteam Solution Private Limited</span>
                  </div>
                  <div class="col-md-6 col-sm-6 text-right">
                     <span class="f-13"> Powered by <span class="text-green">Traversit Group</span></span>
                  </div>
               </div>
            </div>
      </footer>
      <?php $this->load->view('templates/bottom.php');?>		     	
   </body>
</html>