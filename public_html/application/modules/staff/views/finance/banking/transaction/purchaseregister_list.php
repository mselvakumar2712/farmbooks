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
                        <h1>Purchase Invoice List</h1>
                    </div>
                </div>
            </div>        
      
          <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Finance</a></li>
                            <li><a href="#">Transaction</a></li>
                            <li class="active">Purchase Invoice List</li>
                        </ol>
                    </div>
                </div>
            </div>
  </div>
        <div class="content mt-3">
			<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('success');?></strong> 
					</div>
				<?php }elseif($this->session->flashdata('danger')){?>
					<div class="alert alert-danger alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('danger');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('info')){?>
					<div class="alert alert-info alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('info');?></strong> 
					</div>
            <?php }elseif($this->session->flashdata('warning')){?>
					<div class="alert alert-warning alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong><?php echo $this->session->flashdata('warning');?></strong> 
					</div>
            <?php }?>
            <div class="animated fadeIn">			   			
                <div class="row">				
                <div class="col-md-12">
                    <div class="card">					
                     <div class="card-body">
							<table id="example" class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>Reference</th>
                        <th>Invoice No.</th>
								<th>Date</th>
								<th>Supplier</th>
								<th class="text-right">Amount <i class="fa fa-inr"></i></th>
								<th class="text-center">Action</th>							
							</tr>
							</thead>
							
							<tbody id="productfpolist">                     
								<?php  
                        //echo "<pre>";print_r($saleslist);
                      //  $album = strtolower($this->session->userdata('user_id'));
                        foreach($saleslist as $row): ?>
								<tr> 
								<td><?php echo strtoupper($row->voucher_no);?></td>
                        <td><?php echo strtoupper($row->inv_no);?></td>
								<td><?php echo fpo_display_date($row->tran_date);?></td>						
								<td><?php echo $row->customer_name;?></td>
                        <td align="right"><?php echo sprintf('%.2f',abs($row->amount)); ?><?php //echo ltrim($row->amount, '-');echo (substr($row->amount, 0, 1) == '-')?' Dr':' Cr'; ?></td>
                        <td class="text-center">                      
                            <a href="<?php echo base_url('staff/finance/viewPurchaseRegister/'.$row->voucher_no.'/'.$row->inv_no.'/'.$row->account_code); ?>" class="btn btn-warning btn-sm mt-1" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
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
	$('#example').DataTable({aaSorting: [[0, 'desc']]});
});
</script>