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
                        <h1>List Share Applications</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Share Management</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/popi');?>">List Share Applications</a></li>
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
									<a href="<?php echo base_url('administrator/share/addshareapplication');?>">
								        <button type="button" class="btn btn-success btn-labeled">
										    <i class="fa fa-plus-square"></i><span class="ml-2">  Add Share Application</span>
										</button>
								    </a>
								</div>
				            </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Farmer Name</th>
								<th>Mobile Number</th>
								<th>Aadhaar Number</th>
								<th>Farmer Interest Group(FIG)</th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="memberlist"></tbody>
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
//POPI list API CALL
				$.ajax({
						url: "<?php echo base_url();?>administrator/popi/popi_list",
						type: "GET",
						data:"",
						dataType:"html",
						cache:false,			
						success:function(response){
						console.log(response);
						//alert(response);	
						response=response.trim();
						responseArray=$.parseJSON(response);
						console.log(responseArray.popi_list);
						 if(responseArray.status == 1){
							var popilist = "";
							$.each(responseArray.popi_list,function(key,value){
							popilist += '<tr><td>'+(value.institution_type==1 ? 'POPI' :'Federation')+'</td><td>'+value.institution_name+'</td><td>'+value.mobile+'</td><td>'+value.date_formation+'</td><td>'+value.contact_person+'</td><td>'+(value.constitution==1 ? 'Trust' :'Society')+'</td><td>'+(value.status==1 ? 'Active' :'Inactive')+'</td><td><a href="<?php echo base_url("administrator/Popi/viewpopi?id='+value.id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
							});
							$('#popilist').html(popilist);
							$('#example').DataTable();
							} 
						},
						error:function(){
						
						$('#example').DataTable();
						} 
						});
});
</script>