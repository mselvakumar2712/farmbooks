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
                        <h1>LIST POPI </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li ><a class="active" href="<?php echo base_url('administrator/popi');?>">List POPI</a></li>
                            <!--<li class="active">List POPI </li>-->
                        </ol>
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
                           <div class="container">
										<div class="" style="text-align:right;margin-bottom:20px;" >
											<a href="<?php echo base_url('administrator/popi/addpopi');?>">
												<button type="button" class="btn btn-success btn-labeled">
													  <i class="fa fa-plus-square"></i><span class="ml-2">  Add POPI</span>
												</button>
											</a>
										</div>
									</div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Institution Type </th>
								<th>Institution Name </th>
								<th>Mobile Number </th>
								<th>Formation Date </th>
								<th>Contact Person  </th>
								<th>Constitution </th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="popilist">
							<?php
                        if($popi_list){
                           foreach($popi_list as $popi){
                     ?>
                           <tr>
                           <td><?php echo $popi->institution_type==1 ? 'POPI' :'Federation';?></td>
                           <td><?php echo $popi->institution_name;?></td>
                           <td><?php echo $popi->mobile;?></td>
                           <td><?php echo fpo_display_date($popi->date_formation);?></td>
                           <td><?php echo $popi->contact_person;?></td>
                           <td><?php echo $popi->constitution==1? 'Trust' :'Society';?></td>
                           <td><?php echo $popi->status == 1?"Active":"Inactive";?></td>
                           <td class="text-center">
                           <a href="<?php echo base_url('administrator/Popi/viewpopi/'.$popi->id);?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                           <a href="<?php echo base_url('administrator/Popi/viewpopi/'.$popi->id);?>"  class="btn btn-warning btn-sm mt-2" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                           </td>
                           </tr>   
                     <?php
                           }                           
                        }
                     ?>
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
   $(document).ready(function() {
      $('#example').DataTable();
   });
</script>