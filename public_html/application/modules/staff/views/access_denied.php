<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<body class="sidebar-light error-page">
    
        <div class="row">
            <div class="col-lg-12 col-lg-offset-4 col-md-12 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="error-container">
                    <div class="error-main">
                        <h1><span id="404"></span></h1>
                        <h3><span id="404-txt"></span></h3>
                        <h4><span id="404-txt-2"></span></h4>
                        <br>
                        <div class="row" id="content-404">
                           
                            <div class="col-md-12 text-center">
                                <div class="text-center">
                                    <h1><strong>404</strong> Access denied</h1>
                                </div>
                                <div class="btn-group">
                                    <a class="btn btn-white" href="<?php echo base_url('staff/dashboard'); ?>">
                                    <i class="fa fa-angle-left"></i> Go back
                                    </a>
                                    <a class="btn btn-white btn-home" href="staff/">
                                    <i class="icon-home"></i> Home Page
                                    </a>
                                </div>
                                
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