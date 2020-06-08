<!-- Left Panel -->     
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa fa-bars"></i>
               </button>
               <a class="navbar-brand" href="<?php echo base_url('fpo/dashboard');?>"><img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:60px;" alt="FPO"></a>
               <a class="navbar-brand hidden" href="<?php echo base_url('fpo/dashboard');?>"><img class="img-fluid" src="<?php echo asset_url()?>img/logo-mobile.png" style="margin:auto; max-height:30px;" alt="FPO"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">		
                <?php if($page_module=='profile'){
                     $this->load->view('profile-side-bar.php');
                }else if($page_module=='crop'){
				     $this->load->view('cropmgmt-side-bar.php');
                }else if($page_module=='dashboard'){
				       $this->load->view('dashboard-side-bar.php');
                }else if($page_module=='master_data'){
				       $this->load->view('master-side-bar.php');
                }else if($page_module=='user'){
				       $this->load->view('user-side-bar.php');					  
				}else if($page_module=='share'){
				       $this->load->view('share-side-bar.php');
                }else if($page_module=='role'){
				       $this->load->view('role-side-bar.php');
                }else if($page_module=='finance'){
				       $this->load->view('finance-side-bar.php');
                }else if($page_module=='inventory'){
				       $this->load->view('inventory-side-bar.php');
                }else if($page_module=='operation'){
				      $this->load->view('operation-side-bar.php');
                }else if($page_module=='soil'){
				      $this->load->view('soil-side-bar.php');
                }else if($page_module=='production'){
				      $this->load->view('production-side-bar.php');
                }else if($page_module=='market'){
				      $this->load->view('market-side-bar.php');
                }else if($page_module=='supply_chain'){
				     $this->load->view('supplychain-side-bar.php');
                }else if($page_module=='ecommerce'){
				      $this->load->view('ecommerce-side-bar.php');
                }else if($page_module=='loan'){
				      $this->load->view('loan-side-bar.php');
                }else if($page_module=='hr'){
				      $this->load->view('hr-side-bar.php');
                }else if($page_module=='hiring'){
				      $this->load->view('hiring-side-bar.php');
                }else if($page_module=='setting'){
				      $this->load->view('settings-side-bar.php');
                }else if($page_module=='approver'){
				      $this->load->view('approver-side-bar.php');
                }?>														 
            </div><!-- /.navbar-collapse -->
         </nav>
      </aside><!-- /#left-panel -->
      <!-- /Left Panel -->