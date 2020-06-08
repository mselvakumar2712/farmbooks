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
                        <h1>Credit Status</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Market</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/market/creditstatus');?>">Credit Status</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">		
            <div class="animated fadeIn">
		        <form method="POST" action="<?php echo base_url('fpo/Market/postCreditStatus')?>" name="sentMessage" novalidate="novalidate" >
				<div class="table-responsive">  
				<table class="table table-bordered">
					<thead>
						<tr bgcolor="#afd66b">		
							<th class="text-center">Description</th>
							<th class="text-center">Dissallow Invoices</th>
						</tr>
					</thead>
					<tbody>
                        <?php if(count($credit_status) != 0) { 
                        foreach($credit_status as $credit_status){ ?>
                            <tr>
                                <td class="text-center"><?php echo $credit_status->reason_description; ?></td>
                                <td class="text-center"><?php echo ($credit_status->dissallow_invoices == 1)?"Yes":"No"; ?></td>
                            </tr>		                                     
                        <?php } ?>
                        <?php } else { ?>
					       <tr>
						      <td colspan="2" class="text-center">No records found</td>
                            </tr>													
                        <?php } ?>
					</tbody>
					<!--<tbody>
					<tr>
						<td colspan="3" class="text-center" >  
                            <input type="checkbox" id="in_active" name="in_active" class="form-check-input">show Inactive
                        </td>
						<td colspan="1" class="text-center" >
                            <input id="sendMessageButton" value="Update" class="btn btn-success text-center" type="submit">
                        </td>
					</tr>													
					</tbody>-->
				</table> 
			</div>
			<div class="container">
				<div class="row ">
					<div class="form-group col-md-2">
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Description</label>
						<input  class="form-control" type="text"  placeholder="Description" id="description" name="description" required="required"  data-validation-required-message="Please enter description.">
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-4">
						<label for="inputAddress2">Dissallow invoicing ?</label>
						<select  class="form-control" id="dissallow_invoicing" name="dissallow_invoicing" required="required" data-validation-required-message="Please select dissallow invoicing.">
							<option value="1" selected>Yes</option>
							<option value="2">No</option>
						</select>
						<p class="help-block text-danger"></p>
					</div>
					<div class="form-group col-md-2">	
					</div>				
				</div>
				 <div class="form-row">
				  <div class="form-group col-md-12 text-center">
				  <div id="success"></div>
					<button id="sendMessageButton" align="center" name="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>				
				  </div>
				 
				  </div>
			</div>
            </form>			
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->
</div>
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?> 
<?php $this->load->view('templates/datatable.php');?>
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
</body>
</html>