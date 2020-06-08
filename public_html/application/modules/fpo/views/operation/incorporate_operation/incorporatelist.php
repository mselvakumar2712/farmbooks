<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.table tbody td {
    text-transform: initial ! important;
}
</style>
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
                        <h1>List Upload Incorporation Documents</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Settings</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/operation/incorporatelist');?>">List Upload Incorporation Documents </a></li>
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
								<a href="<?php echo base_url('fpo/operation/addincorporate');?>">
									<button type="button" class="btn btn-success btn-labeled">
										<i class="fa fa-plus-square"></i> <span class="ml-2"> Upload Incorporation Documents</span>
									</button>
								</a>
							 </div>
						   </div>
							<table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th>S.No</th>
								<th>Certificate of Incorporation</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="incorporatelist">
							<?php
								$album = strtolower($this->session->userdata('user_id'));
								foreach($user_list as $user){?>
								<tr>
									<td><?php echo $user->id;?></td>

									<td><?php  $keywords = preg_split( "/[,]+/", $user->document_type);
									$i=0;
									foreach($keywords as $key => $value) {
										if($i > 0){
											echo ', ';
										}
										if( $value==1){
										echo 'Certificate of Incorporation';
										}else if($value==2){
										echo 'Memorandum of Association';
										}else if($value==3){
										 echo 'Articles of Association';
										}else if($value==4){
										 echo 'Others';
										}else if($value==5){
										 echo 'PAN';
										}else if($value==6){
										 echo 'TAN';
										}else if($value==7){
										 echo 'GST';
										}else if($value==8){
										 echo 'DIN';
										}else if($value==9){
										 echo 'IE Code';
										}
                    else if($value==10){
										 echo 'Certificate Of Incorporation';
										}
										$i++;
									}
								    ?></td>
									<td class="text-center">
									<?php $keywords = preg_split( "/[,]+/", $user->file_type);
									$filePaths = preg_split( "/[,]+/", $user->file_path);
									$i=0;
									foreach($filePaths as $key => $value) {
										$arr = explode('.', $value);
										$ext = $arr[1];
										if( strtolower($ext) == 'pdf')
										{
                      $value = strtolower($value);
											?>
											<a href="<?php echo base_url('assets/uploads/documents/'. $album. '/'. $value); ?>" class='btn btn-success btn-sm mt-1' title='Download'><i class='fa fa-download' aria-hidden='true' title='Download'></i></a>
											<?php
										}
										else if( strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg')
										{
											?>
											<a href="<?php echo base_url('assets/uploads/documents/'. $album. '/'. $value); ?>" class='btn btn-success btn-sm mt-1' title='View'><i class='fa fa-file-image-o' aria-hidden='true' title='Download'></i></a>
											<?php
										}

									}?>
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
});
</script>
