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
	 <h1>List Godown</h1>                    
	 </div>                
	 </div>            
	 </div>            
	 <div class="col-sm-8">                
	 <div class="page-header float-right">                    
	 <div class="page-title">                        
	 <ol class="breadcrumb text-right">							 
	 <li><a href="#">Master Data</a></li>                            
	 <li><a class="active" href="<?php echo base_url('staff/masterdata/godownlist');?>">List Godown</a></li>                            
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
	 <a href="<?php echo base_url('staff/masterdata/addgodown');?>">					
	 <button type="button" class="btn btn-success btn-labeled">						  
	 <i class="fa fa-plus-square"></i><span class="ml-2"> Add Godown</span>					
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
								<th>Name</th>								
								<th>Location</th>
								<th>Type</th>
								<th>Capacity</th>								
								<th>Status</th>								
								<th width="20%">Action</th>																</tr>							</thead>							<tbody id="godownlist">
								<?php $i=1; foreach($godown_info as $row): ?>
								<tr> 
									
									<td><?php echo $row->name; ?></td>
									<td><?php if ($row->location_type==1)
									{
									 echo "Inside Premises";                            
									}	
									else if($row->location_type==2)
									{
									echo "Outside Premises";
									}
									?></td>
									<td><?php if ($row->godown_type==1)
									{
									 echo "Cold Storage";                            
									}	
									else if($row->godown_type==2)
									{
									echo "Normal Godown";
									}
									else if($row->godown_type==3)
									{
									echo "Others";
									}
									?></td>	
									<td><?php echo $row->capacity; ?></td>
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
									<a href="<?php echo base_url('staff/masterdata/viewgodown/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
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
          
        //FIG list API CALL
				$.ajax({
						url:"<?php echo base_url();?>administrator/Fig/figlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						console.log(response);
						//alert(response);	
						 response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.fig_list);
						 if(responseArray.status == 1){
							var blocklist = "";
							$.each(responseArray.fig_list,function(key,value){
						//	blocklist += '<tr><td>'+value.FIG_Name+'</td><td>'+value.block+'</td><td></td><td></td><td></td><td>'+(value.status==1 ? 'Active' :'Inactive')+'</td><td><a href="<?php echo base_url("administrator/fig/viewfig?id='+value.id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
							});
						//	$('#blocklist').html(blocklist);
							$('#example').DataTable();
							} 
						},
						error:function(){
						$('#example').DataTable();
						} 
						});
				});
</script>