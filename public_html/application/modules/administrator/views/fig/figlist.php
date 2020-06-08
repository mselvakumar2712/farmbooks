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
                        <h1>List FIG </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Profile Management</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/fig');?>">List FIG</a></li>
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
				<a href="<?php echo base_url('administrator/fig/addfig');?>">
					<button type="button" class="btn btn-success btn-labeled">
						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add FIG</span>
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
								<th>FIG Name</th>
								<th>FPO Name</th>
								<th>Block</th>
								<th>Village</th>
								<th>Status</th>
								<th width="20%">Action</th>		
								</tr>
							</thead>
							<tbody id="figlist">
							<?php foreach($fig_list as $fig){?>
							<tr>
								<td><?php echo $fig->FIG_Name;?></td>
								<td><?php echo $fig->producer_organisation_name;?></td>
								<td><?php echo $fig->block_name;?></td>
								<td><?php echo $fig->village_name;?></td>
								<td><?php echo $fig->status==1 ? 'Active' :'Inactive';?></td>
								<td class="text-center">
                        <a href="<?php echo base_url("administrator/fig/viewfig?id=".$fig->id);?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                        <a href="<?php echo base_url("administrator/fig/viewfig?id=".$fig->id);?>"  class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
                        </td>
							</tr>
							<?php }?>
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
        //FIG list API CALL
				/* $.ajax({
						url:"<?php echo base_url();?>administrator/Fig/figlist",
						type:"GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						console.log(response);
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.fig_list);
				            if(responseArray.status == 1){
                                var figlist = "";
                                $.each(responseArray.fig_list,function(key,value){
                                figlist += '<tr><td>'+value.FIG_Name+'</td><td>'+value.block_name+'</td><td>'+value.village_name+'</td><td>'+(value.status==1 ? 'Active' :'Inactive')+'</td><td><a href="<?php echo base_url("administrator/fig/viewfig?id='+value.id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
                                });
                                $('#figlist').html(figlist);
                                $('#example').DataTable();
							} 
						},
						error:function(){ */
						
					//	} 
               // });
});
</script>