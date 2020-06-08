<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
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
                        <h1>List Generate Share Applications</h1>
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
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Applicant Type</th>
                                <th>Applicant Name</th>
                                <th>Shares Applied</th>
								<th>Generate Application</th>
							  </tr>
							</thead>
							<tbody id="memberlist">
                                <?php for($i=0;$i<count($generate_application);$i++){ ?>
                                <tr>
                                <td><?php echo ($generate_application[$i]->member_type == 1)? "Person":"Producer Organisation"; ?></td>
                                <td><?php echo ($generate_application[$i]->member_type == 1)? $generate_application[$i]->profile_name:$generate_application[$i]->producer_organisation_name; ?></td>
								<td><?php echo $generate_application[$i]->no_of_share; ?></td>
                                <td width="20%" align="center">
                                    <a href="<?php echo base_url('staff/share/generateapplicationpdf/' . $generate_application[$i]->id); ?>" class="btn btn-success btn-sm" title="Download">
                                        <i class="fa fa-download" aria-hidden="true" title="Download"></i>
                                    </a>
                                </td>
                                </tr>
                                <?php } ?>
                            </tbody>
						  </table>
                    </div>
                  </div>
                </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
</div>
    
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>	   
</body>
</html>
<script type="text/javascript">

</script>