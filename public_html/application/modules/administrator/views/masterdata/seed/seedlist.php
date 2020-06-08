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
                        <h1>List Seed</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Master Data</a></li>
                            <li><a class="active" href="<?php echo base_url('administrator/masterdata/seedlist');?>">List Seed</a></li>
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
				<a href="<?php echo base_url('administrator/masterdata/addseed');?>">
					<button type="button" class="btn btn-success btn-labeled">
						  <i class="fa fa-plus-square"></i><span class="ml-2"> Add Seed</span>
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
								<th>Crop Category</th>
								<th>Crop Sub Category</th>
								<th>Crop Variety </th>
								<th>Class</th>
								<th>Tenure (Days/Month/year)</th>
								<th>Harvesting Type </th>
								<th>Output</th>
								<th>Status</th>
								<th width="20%">Action</th>								
								</tr>
							</thead>
							<tbody id="uomlist">
								<?php $i=1; foreach($seed_info as $row): ?>
								<tr> 
									<td><?php $get_category_id=$row->category_id;
										for($i=0; $i<count($category);$i++) { 
											
											if($category[$i]->id==$get_category_id){
												echo $category[$i]->name;
											}
									}?></td>
									<td><?php $get_subcategory_id=$row->sub_category_id;
										for($i=0; $i<count($subcategory);$i++) { 
											
											if($subcategory[$i]->id==$get_subcategory_id){
												echo $subcategory[$i]->name;
											}
									}?></td>
									<td><?php $get_variety_id=$row->variety_id;
										for($i=0; $i<count($variety);$i++) { 											
											if($variety[$i]->id==$get_variety_id){
												echo $variety[$i]->variety;
											}
									}?></td>
									<td><?php echo $row->class; ?></td>
									<td><?php $category_id=$row->category_id;
									    $sub_category_id=$row->sub_category_id;
								        $get_variety_id=$row->variety_id;
										for($i=0; $i<count($crop_master);$i++) { 											
											if($crop_master[$i]->category_id==$category_id & $crop_master[$i]->subcategory_id==$sub_category_id & $crop_master[$i]->variety_id==$get_variety_id){
												if($crop_master[$i]->tenure_unit==1){
													echo 'Month';
												}else if($crop_master[$i]->tenure_unit==2){
													echo 'Days';
												}else if($crop_master[$i]->tenure_unit==2){
													echo 'Year';
												}
											}
									}?></td>
									<td><?php $category_id=$row->category_id;
											  $sub_category_id=$row->sub_category_id;
											  $get_variety_id=$row->variety_id;
										for($i=0; $i<count($crop_master);$i++) { 											
											if($crop_master[$i]->category_id==$category_id & $crop_master[$i]->subcategory_id==$sub_category_id & $crop_master[$i]->variety_id==$get_variety_id){
												if($crop_master[$i]->harvesting_type==1){
													echo 'Single';
												}else if($crop_master[$i]->harvesting_type==2){
													echo 'Multiple';
												}
											}
									}?></td>
									<td><?php $category_id=$row->category_id;
											  $sub_category_id=$row->sub_category_id;
											  $get_variety_id=$row->variety_id;
										for($i=0; $i<count($crop_master);$i++) { 											
											if($crop_master[$i]->category_id==$category_id & $crop_master[$i]->subcategory_id==$sub_category_id & $crop_master[$i]->variety_id==$get_variety_id){
												echo $crop_master[$i]->crop_output;
											}
									}?></td>
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
									<a href="<?php echo base_url('administrator/masterdata/viewseed/' . $row->id); ?>"  class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
									</td>							
								</tr>
							<?php endforeach; ?>
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

	});

</script>