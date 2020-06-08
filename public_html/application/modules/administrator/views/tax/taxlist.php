<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><?php $this->load->view('templates/top.php');?>
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
						<h1>List Tax</h1>  
					 </div>             
				 </div>          
			 </div>          
			 <div class="col-sm-8">  
				 <div class="page-header float-right">  
					 <div class="page-title">  
						 <ol class="breadcrumb text-right">	
							<li><a href="#">Tax</a></li> 
							<li><a class="active" href="<?php echo base_url('administrator/tax');?>">List Tax</a></li> 
						 <!--<li class="active">List FIG </li>--> 
						 </ol>  
					 </div> 
				 </div> 
			 </div> 
	 </div>  
	<div class="content mt-3">	
		<div class="animated fadeIn">  
			<div class="container">
				<div class="" style="text-align:right;margin-bottom:20px;" >
					<a href="<?php echo base_url('administrator/tax/taxadd');?>">
						<button type="button" class="btn btn-success btn-labeled">
							<i class="fa fa-plus-square"></i><span class="ml-2"> Add Tax</span>
						</button>	
					</a>		
				</div>		
			</div>		
			<div class="row">  
				<div class="col-md-12">  
					<div class="card">		
						<div class="card-body">
							<table id="example" class="table table-striped table-bordered" width="100%">
								<thead>	
									<tr>
										<th width="10%">Type </th>
										<th width="13%">HSN Code</th>
										<th width="7%">IGST (%) </th>
										<th width="8%">CGST (%) </th>
										<th width="7%">SGST (%) </th>
                              <th width="12%">Effective Date</th>
										<th width="30%">Goods Description </th>
										<th width="13%">Action</th>																
									</tr>	
								</thead>	
							<tbody id="productfpolist">
								<?php  foreach($tax_info as $row): ?>
								<tr> 
									<td><?php  if($row->type_id==1){
										echo "Goods";
									}else if($row->type_id==2){
										echo "Service";
									} else if($row->type_id==3){
										echo "Unprocessed";
									}
									?></td>										
									<td><?php echo $row->hsn_code; ?></td>
									<td><?php echo $row->igst; ?></td>
									<td><?php echo $row->cgst; ?></td>
									<td><?php echo $row->sgst_utgst; ?></td>
                           <td><?php echo fpo_display_date($row->effective_date); ?></td>									
									<td><?php echo $row->short_description; ?></td>								
									<td>				
									<a href="<?php echo base_url('administrator/tax/taxedit/' . $row->id); ?>"  class="btn btn-success btn-sm " title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
									<a href="<?php echo base_url('administrator/tax/taxview/' . $row->id); ?>"  class="btn btn-warning btn-sm ml-2" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
									</td>							
								</tr>
							<?php endforeach; ?>
							</tbody>
							</table>
						</div>   
					</div>   
				</div>  
			</div>   
		</div>
	<!-- .animated --> 
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