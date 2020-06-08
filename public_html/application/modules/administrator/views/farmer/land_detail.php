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
                        <h1>List Farmer's Land Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a class="" href="<?php echo base_url('administrator/farmer/profilelist');?>">Farmer Profile </a></li>
                            <li><a class="active" href="#">Land Details</a></li>
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
<!--
								    <a href="<?php echo base_url('administrator/farmer/addland');?>">
                                        <button type="button" class="btn btn-success btn-labeled">
                                            <i class="fa fa-plus-square"></i> <span class="ml-2"> Add Farmer's Land Detail</span>
                                        </button>
                                    </a>
-->
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Farmer Name</th>
								<th>Ownership Type</th>
								<th>Owner Name</th>
								<th>Land Type</th>
                                <th>Farmer's Address</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="landdetaillist">							
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
			$.ajax({
				url: "<?php echo base_url();?>administrator/farmer/land_list",
				type: "GET",
				dataType:"html",
				cache:false,			
				success:function(response){		  
				//console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
				if(responseArray.status == 1){
                    var land_list = "";
                    var count=1;
                    $.each(responseArray.land_list,function(key,value){
                        var sno=count++;
                        if(value.ownership_type == 1) {
                           var ownership_type = "Own";
                        } else {
                            var ownership_type = "Lease";
                        }
                        if(value.land_type == 1) {
                            var land_type = "Wet";
                        } else if(value.land_type == 2) {
                            var land_type = "Dry";
                        } else {
                           var land_type = "Both";
                        }
                        
                        if(value.address) {
                            var address = value.village_name+','+value.panchayat_name+','+value.block_name+','+value.taluk_name+','+value.district_name+','+value.state_name;
                        }
                        
                        if(value.land_holdings == 1) {                           
                            land_list += '<tr><td>'+value.profile_name+'</td><td>'+ownership_type+'</td><td>'+value.name+'</td><td>'+land_type+'</td><td>'+address+'</td><td><a href="<?php echo base_url("administrator/farmer/viewland/'+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("administrator/farmer/viewland/'+value.id+'");?>" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                        }
                    });
                    $('#landdetaillist').html(land_list);
                    $('#example').DataTable();
				}
				},
				error:function(){
				//alert('Error!!! Try again');
				$('#example').DataTable();
				} 

			});
        } );
      </script>