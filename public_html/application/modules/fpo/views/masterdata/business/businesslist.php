<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<body>
     <div class="container-fluid pl-0 pr-0">        <?php $this->load->view('templates/side-bar.php');?>         <!-- Right Panel -->        <div id="right-panel" class="right-panel">            <?php $this->load->view('templates/menu-inner.php');?>       <div class="breadcrumbs">            <div class="col-sm-4">                <div class="page-header float-left">                    <div class="page-title">                        <h1>List Nature of Business </h1>                    </div>                </div>            </div>            <div class="col-sm-8">                <div class="page-header float-right">                    <div class="page-title">                        <ol class="breadcrumb text-right">							 <li><a href="#">Master Data</a></li>                            <li><a class="active" href="<?php echo base_url('fpo/masterdata/natureofbusinesslist');?>">List Nature of Business</a></li>                            <!--<li class="active">List FIG </li>-->                        </ol>                    </div>                </div>            </div>        </div>        <div class="content mt-3">		            <div class="animated fadeIn">               <div class="container">				<div class="" style="text-align:right;margin-bottom:20px;" >				<a href="<?php echo base_url('fpo/masterdata/addnatureofbusiness');?>">					<button type="button" class="btn btn-success btn-labeled">						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add Nature of Business</span>					</button>				</a>			 </div>			 </div>			 <div class="row">                <div class="col-md-12">                    <div class="card">						<div class="card-body">						  <table id="example" class="table table-striped table-bordered" width="100%">							<thead>								<tr>
								<th>Type of Business</th>								<th>Nature of Business</th>								<th>Status</th>								<th width="20%">Action</th>																</tr>							</thead>							<tbody id="businesslist">
								<?php foreach($business_nature_info as $row): ?>
								<tr> 
								<td><?php  if($row->business_type==1){
										echo "Manufacturing";
									}else if($row->business_type==2){
										echo "Trading";
									} else if($row->business_type==3){
										echo "Services";
									}?></td>
									<td><?php echo $row->name; ?></td>
									<td>
									<?php if ($row->status==1)
									{
									 echo "Active";                            
									}	
									else
									{
									echo "In Active";
									}
									?></td>																			 
									<td >
									<a href="<?php echo base_url('fpo/masterdata/viewnatureofbusiness/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
									</td>							
								</tr>
							<?php endforeach; ?>							</tbody>						  </table>						 </div>                    </div>                </div>              </div>            </div><!-- .animated -->        </div><!-- .content -->    </div><!-- /#right-panel -->	</div>
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