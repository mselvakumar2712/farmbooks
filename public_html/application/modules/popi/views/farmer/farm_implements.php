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
                        <h1>List Farmer's Farm Implements</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a class="" href="<?php echo base_url('popi/farmer/profilelist');?>">Farmer Profile </a></li>
                            <li><a class="active" href="#">Farm Implements</a></li>
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
								<a href="<?php //echo base_url('fpo/farmer/addlivestock');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Add More Live Stock</span>
									</button>
								</a>
-->
							 </div>
						   </div>							
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>Farmer Name</th>
								<th>Name</th>
								<th>Make</th>
								<th>Model</th>
								<th>Year</th>
                                <th>Available for Hire</th>
                                <th>Purchase by Loan</th>
                                <th>Insurance Coverage</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="farm_implements_list">							
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
        url:"<?php echo base_url();?>popi/farmer/farmimplement_list",
        type:"GET",
        dataType:"html",
        cache:false,			
        success:function(response){		  
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            if(responseArray.status == 1){
              var farmimplement_list = "";
              var count=1;
                $.each(responseArray.farmimplement_list,function(key,value){
                    if(value.available_for_hire == 1) {
                        var available_for_hire = "Yes";                   
                    } else {
                       var available_for_hire = "No";
                    }
                    
                    if(value.purchase_by_loan == 1) {
                        var purchase_by_loan = "Yes";                   
                    } else {
                       var purchase_by_loan = "No";
                    }
                    
                    if(value.insurance_coverage == 1) {
                        var insurance_coverage = "Yes";                   
                    } else {
                       var insurance_coverage = "No";
                    }
                    
                    if(value.implement_make != null) {
                        var implement_make = value.implement_make;
                    } else {
                         var implement_make = "";
                    }
                    if(value.implement_model != null) {
                        var implement_model = value.implement_model;
                    } else {
                         var implement_model = "";
                    }
                    
                    if(value.farm_implements == 1) {
                        farmimplement_list += '<tr><td>'+value.profile_name+'</td><td>'+value.implement_name+'</td><td>'+implement_make+'</td><td>'+implement_model+'</td><td>'+value.year+'</td><td>'+available_for_hire+'</td><td>'+purchase_by_loan+'</td><td>'+insurance_coverage+'</td><td><a href="<?php echo base_url("popi/farmer/view_farmimplement?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("popi/farmer/view_farmimplement?id='+value.id+'");?>" class="btn btn-warning mt-2 btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                    }
                });
                $('#farm_implements_list').html(farmimplement_list);
                $('#example').DataTable();
            }
        },
        error:function(){	   
            $('#example').DataTable();
        } 
    });
});
</script>