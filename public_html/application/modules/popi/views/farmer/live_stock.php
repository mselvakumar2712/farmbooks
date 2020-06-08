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
                        <h1>List Farmer's Live Stocks</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile Management</a></li>
                            <li><a class="" href="<?php echo base_url('popi/farmer/profilelist');?>">Farmer Profile </a></li>
                            <li><a class="active" href="#">Live Stocks</a></li>
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
								<a href="<?php echo base_url('fpo/farmer/addlivestock');?>">
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
								<th>Type</th>
								<th>Name</th>
								<th>Variety</th>
								<th>Total Count</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="livestockslist">							
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
        url: "<?php echo base_url();?>popi/farmer/livestock_list",
        type: "GET",
        dataType:"html",
        cache:false,			
        success:function(response){		  
            console.log(response);
            response=response.trim();
            responseArray=$.parseJSON(response);
            if(responseArray.status == 1){
              var livestock_list = "";
              var count=1;
                $.each(responseArray.livestock_list,function(key,value){
                    var sno=count++;
                    if(value.live_stock_type == 1) {
                        var type = "Cattle";
                    } else if(value.live_stock_type == 2) {
                        var type = "Animals";
                    } else if(value.live_stock_type == 3) {
                        var type = "Birds";
                    } else {
                       var type = "Other";
                    }
                    if(value.variety_name != null) {
                        var variety_name = value.variety_name;
                    } else {
                         var variety_name="";
                    }
                    
                    if(value.live_stock_count != 0) {
                        var live_stock_count = value.live_stock_count;  
                    } else {
                        var live_stock_count = "";
                    }
                    
                    if(value.live_stocks == 1) {            
                        livestock_list += '<tr><td>'+value.profile_name+'</td><td>'+type+'</td><td>'+value.live_stock_name+'</td><td>'+variety_name+'</td><td>'+live_stock_count+'</td><td><a href="<?php echo base_url("popi/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a><a href="<?php echo base_url("popi/farmer/viewlivestock?id='+value.id+'");?>" class="btn btn-warning ml-1 btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a></td></tr>';
                    }
                });
                $('#livestockslist').html(livestock_list);
                $('#example').DataTable();
            }
        },
        error:function(){	   
            $('#example').DataTable();
        } 
    });
});
</script>