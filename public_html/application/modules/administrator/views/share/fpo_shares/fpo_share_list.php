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
                        <h1>List FPO Shares </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Share Management</a></li>
                            <li><a class="active" href="#">List FPO Shares</a></li>
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
								<!-- <div class="" style="text-align:right;margin-bottom:20px;" >
									<a href="<?php echo base_url('administrator/share/addshareapplication_fpo');?>">
								        <button type="button" class="btn btn-success btn-labeled">
										    <i class="fa fa-plus-square"></i><span class="ml-2">  Add Share Application</span>
										</button>
								    </a>
								</div> -->
				            </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
                                <th>FPO Name</th>
								<th>Share Capital</th>
								<th>No of Shares Released</th>
								<th>Unit Price</th>
								<th>Shares Available</th>
							  </tr>
							</thead>
							<tbody id="memberlist">
                             <?php if(count($sharevalue_list) !== 0){?>
								<?php  foreach($sharevalue_list as $row): ?>
										<tr> 
											<td><?php echo $row->fpo_name; ?></td>
											<td></td>	
											<td><?php echo $row->shares_released; ?></td>
											<td class="text-right"><?php echo $row->unit_price; ?></td>
											<td><?php echo $share_available[$row->fpo_id];?></td>                                             
										</tr>
								<?php endforeach; 
							} else {?>	
							<tr>
								<td align="center" colspan="7">No Data Available In Table</td>
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