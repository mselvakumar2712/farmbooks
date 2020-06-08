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
                        <h1>List FIG Representative</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Profile Management</a></li>
                            <li><a class="active" href="<?php echo base_url('staff/fig/figrepresentativelist');?>">List FIG Representative</a></li>
                            <!--<li class="active"> FIG Representative </li>-->
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
               <div class="container">
				<div class="" style="text-align:right;margin-bottom:20px;" >
				<a href="<?php echo base_url('staff/fig/addfigrepresent');?>">
					<button type="button" class="btn btn-success btn-labeled">
						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add FIG Representative</span>
					</button>
				</a>
			 </div>
			 </div>
			<div class="row">
                <div class="col-md-12">
                    <div class="card">
						<div class="card-body">
							<table id="example" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th>Farmer Interest Group Name</th>
									<th>Farmer/FPO Name</th>
									<th>Designation</th>
									<th>Date of Appointment</th>
									<th>Action</th>
								 </tr>
								</thead>
								<tbody id="figrepresent">
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
        //FIG list API CALL
     $.ajax({
		url:"<?php echo base_url();?>staff/fig/figrepresentlist",
		type:"GET",
		data:"",
		dataType:"html",
		cache:false,
		success:function(response){
		console.log(response);
		//alert(response);	
		 response=response.trim();
		responseArray=$.parseJSON(response);
		console.log(responseArray.figrepresent_list);
		if(responseArray.status == 1){
            var figrepresent = "";
            $.each(responseArray.figrepresent_list,function(key,value){
            if(value.representative_type == 1) {
                var representative_type = "President";
            } else if(value.representative_type == 2) {
                var representative_type = "Secretary";   
            } else if(value.representative_type == 3) {
                var representative_type = "Treasurer";
            } else {
                var representative_type = "Director";
            }
                
            var member_name = (value.profile_name)?value.profile_name:value.producer_organisation_name;
                
			figrepresent += '<tr><td>'+value.FIG_Name+'</td><td>'+member_name+'</td><td>'+representative_type+'</td><td>'+value.appointment_date+'</td><td><a href="<?php echo base_url("staff/fig/viewfigrepresent/'+value.id+'");?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a></td></tr>';
			});
			$('#figrepresent').html(figrepresent);
			$('#example').DataTable();
			} 
		},
		error:function(){
		 $('#example').DataTable();
		} 
		});
});


</script>