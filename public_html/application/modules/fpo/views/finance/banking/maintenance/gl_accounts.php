<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($glgroup_info);

?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/select2.min.css" rel="stylesheet" type="text/css" />
<style>
.select2-container .select2-selection--single .select2-selection__rendered {
    border-color: green ! important;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    font-style: italic ! important;
    overflow: hidden ! important;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s;
}
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: none !important;
    border-radius: 4px;
}
#bankdetails input {
    text-align: right;
    text-decoration: none;
    font-style: normal !important;
 }
</style>

<body>
     <div class="container-fluid pl-0 pr-0">
        <?php $this->load->view('templates/side-bar.php');?>
         <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <?php $this->load->view('templates/menu-inner.php');?>

       <div class="breadcrumbs">
            <div class="row">
               <div class="col-sm-4">
                   <div class="page-header float-left">
                       <div class="page-title">
                           <h1>GL Accounts</h1>
                       </div>
                   </div>
               </div>
               <div class="col-sm-8">
                   <div class="page-header float-right">
                       <div class="page-title">
                           <ol class="breadcrumb text-right">
								<li><a href="#">Finance</a></li>
                               <li><a class="active" href="<?php echo base_url('administrator/finance/gl_accounts');?>">GL Accounts</a></li>
                               <!--<li class="active">List FIG </li>-->
                           </ol>
                       </div>
                   </div>
               </div>
            </div>
            <div class="row">
                  <div class="form-group col-md-4">
                  </div>
                  <div class="form-group col-md-3 text-center">
                     <select id="sel_gl_account" class="form-control" name="sel_gl_account">
                        <option value="" <?php if($gl_type == 'all'){ echo 'selected="selected"'; } ?> >Select Ledger</option>
                        <option value="cash" <?php if($gl_type == 'cash'){ echo 'selected="selected"'; } ?> >Cash</option>
                        <option value="bank" <?php if($gl_type == 'bank'){ echo 'selected="selected"'; } ?> >Bank</option>
                        <option value="customer" <?php if($gl_type == 'customer'){ echo 'selected="selected"'; } ?>>Customer</option>
                        <option value="supplier" <?php if($gl_type == 'supplier'){ echo 'selected="selected"'; } ?>>Supplier</option>
                        <option value="gl" <?php if($gl_type == 'gl'){ echo 'selected="selected"'; } ?>>GL</option>
                     </select>
                  </div>
                  <div class="form-group col-md-5">
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
            <form action="<?php echo base_url('fpo/finance/postglaccounts')?>" method="post" id="gl_account_form" name="sentMessage" novalidate="novalidate" >
                  <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-min-pad" id="bankdetails">
											<thead>
												<tr bgcolor="#afd66b">
													<th class="text-center" width="15%">Group Code</th>
													<th class="text-center" width="25%">Group Name</th>
                                       <th class="text-center" width="35%">Account Name</th>
                                       <th class="text-center" width="25%">Opening Balance ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
												</tr>
											</thead>
											<tbody>
											<?php
                                    if($gl_type == 'gl') {
                                       //echo "<pre>";print_r($glgroup_info);die;
                                       for($i=0;$i<count($glgroup_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $glgroup_info[$i]->account_code; ?>" name="account_code[]" class="form-control" >
                                             <?php echo $glgroup_info[$i]->account_code; ?>
                                             </td>
                                             <td><?php echo $glgroup_info[$i]->gname;?></td>
                                             <td width="35%"><?php echo $glgroup_info[$i]->account_name;?></td>

                                             <td class="row" >
                                             <input type="text" id="<?php echo $glgroup_info[$i]->account_code; ?>" <?php //if($glgroup_info[$i]->amount > 0){ echo "readonly";};?>  value="<?php echo abs($glgroup_info[$i]->amount) != 0 ?abs($glgroup_info[$i]->amount):'';?>" name="amount[]" class="form-control numberOnly col-md-6 ml-4" maxlength="9" placeholder="0" autocomplete="off">
                                             <select class="form-control col-md-4 ml-1"  name="crdr[]">
                                                <option value="" <?php echo ($glgroup_info[$i]->amount >= 0 || $glgroup_info[$i]->account_mode == 3)?'selected':''; ?>>Cr</option>
                                                <option value="-" <?php echo ($glgroup_info[$i]->amount < 0 || $glgroup_info[$i]->account_mode == 4)?'selected':''; ?>>Dr</option>
                                             </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                    }
                                    else if($gl_type == 'bank') {
                                       for($i=0;$i<count($bank_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $bank_info[$i]->id; ?>" name="account_code[]" class="form-control" >
                                             <?php echo $bank_info[$i]->account_code; ?>
                                             </td>
                                             <td><?php echo $bank_info[$i]->name;?></td>
                                             <td width="35%"><?php echo $bank_info[$i]->bank_account_name;?></td>

                                             <td class="row"><input type="text" <?php //if($bank_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($bank_info[$i]->opening_balance) != 0?abs($bank_info[$i]->opening_balance):'';?>" name="amount[]" class="form-control numberOnly col-md-6  ml-4" maxlength="9" placeholder="0" autocomplete="off">
                                             <select class="form-control col-md-4 ml-1"  name="crdr[]">
                                                <option value="" <?php echo ($bank_info[$i]->opening_balance >= 0 )?'selected':''; ?>>Cr</option>
                                                <option value="-" <?php echo ($bank_info[$i]->opening_balance < 0 )?'selected':''; ?>>Dr</option>
                                             </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                    }
                                    else if($gl_type == 'customer') {
                                      //echo "<pre>";print_r($customer_info);die;
                                       for($i=0;$i<count($customer_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $customer_info[$i]->debtor_no; ?>" name="account_code[]" class="form-control" >
                                             <?php echo $customer_info[$i]->debtor_no; ?>
                                             </td>
                                             <td><?php echo $customer_info[$i]->account_name;?></td>
                                             <td width="35%"><?php echo $customer_info[$i]->name;?></td>

                                             <td class="row"><input type="text" <?php //if($customer_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($customer_info[$i]->opening_balance) != 0 ?abs($customer_info[$i]->opening_balance):'';?>" name="amount[]" class="form-control numberOnly col-md-6 ml-4" maxlength="9" placeholder="0" autocomplete="off">
                                             <select class="form-control col-md-4 ml-1"  name="crdr[]">
                                                <option value="" <?php echo ($customer_info[$i]->transaction_type == 1 )?'selected':''; ?>>Cr</option>
                                                <option value="-" <?php echo ($customer_info[$i]->transaction_type != 1 )?'selected':''; ?>>Dr</option>
                                             </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                    }
                                    else if($gl_type == 'supplier') {
                                       for($i=0;$i<count($supplier_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $supplier_info[$i]->supplier_id; ?>" name="account_code[]" class="form-control" >
                                             <?php echo $supplier_info[$i]->supplier_id; ?>
                                             </td>
                                             <td><?php echo $supplier_info[$i]->account_name;?></td>
                                             <td width="35%"><?php echo $supplier_info[$i]->supp_name;?></td>

                                             <td class="row"><input type="text" <?php //if($supplier_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($supplier_info[$i]->opening_balance) != 0 ?abs($supplier_info[$i]->opening_balance):'';?>" name="amount[]" class="form-control numberOnly col-md-6 ml-4" maxlength="9" placeholder="0" autocomplete="off">
                                             <select class="form-control col-md-4 ml-1"  name="crdr[]">
                                                <option value="" <?php echo ($supplier_info[$i]->transaction_type == 1 )?'selected':''; ?>>Cr</option>
                                                <option value="-" <?php echo ($supplier_info[$i]->transaction_type != 1 )?'selected':''; ?>>Dr</option>
                                             </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                    }
                                    else if($gl_type == 'cash') {
                                       //echo "<pre>";print_r($cash_info);die;
                                       for($i=0;$i<count($cash_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $cash_info[$i]->account_code; ?>" name="account_code[]" class="form-control" >
                                             <?php echo $cash_info[$i]->account_code; ?>
                                             </td>
                                             <td>Cash Account</td>
                                             <td width="35%"><?php echo $cash_info[$i]->account_name;?></td>

                                             <td class="row"><input type="text" <?php //if($cash_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($cash_info[$i]->amount) != 0?abs($cash_info[$i]->amount):'';?>" name="amount[]" class="form-control numberOnly col-md-6  ml-4" maxlength="9" placeholder="0" autocomplete="off">
                                             <select class="form-control col-md-4 ml-1"  name="crdr[]">
                                                <option value="" <?php echo ($cash_info[$i]->amount > 0 )?'selected':''; ?>>Cr</option>
                                                <option value="-" <?php echo ($cash_info[$i]->amount <= 0 )?'selected':''; ?>>Dr</option>
                                             </select>
                                             </td>
                                          </tr>
                                       <?php
                                       }
                                    }
                                    else {
                                       for($i=0;$i<count($bank_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $bank_info[$i]->id; ?>" name="bank_account_code[]" class="form-control" >
                                             <?php echo $bank_info[$i]->account_code; ?>
                                             </td>
                                             <td><?php echo $bank_info[$i]->name;?></td>
                                             <td><?php echo $bank_info[$i]->bank_account_name;?></td>

                                             <td class="row">
                                                <input type="text" <?php if($bank_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($bank_info[$i]->opening_balance);?>" name="bank_amount[]" class="form-control numberOnly col-6 ml-3" maxlength="9" placeholder="0" autocomplete="off">
                                                <select class="form-control col-4 ml-1"  name="crdr[]">
                                                   <option value="">Cr</option>
                                                   <option value="-" <?php echo ($bank_info[$i]->opening_balance < 0)? "selected='selected'":"";?>>Dr</option>
                                                </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }

                                       for($i=0;$i<count($customer_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $customer_info[$i]->debtor_no; ?>" name="customer_account_code[]" class="form-control" >
                                             <?php echo $customer_info[$i]->debtor_no; ?>
                                             </td>
                                             <td><?php echo $customer_info[$i]->account_name;?></td>
                                             <td><?php echo $customer_info[$i]->name;?></td>

                                             <td class="row">
                                                <input type="text" <?php if($customer_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($customer_info[$i]->opening_balance);?>" name="customer_amount[]" class="form-control numberOnly col-6 ml-3" maxlength="9" placeholder="0" autocomplete="off">
                                                <select class="form-control col-4 ml-1"  name="crdr[]">
                                                   <option value="">Cr</option>
                                                   <option value="-" <?php echo ($customer_info[$i]->opening_balance < 0)? "selected='selected'":"";?>>Dr</option>
                                                </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }

                                       for($i=0;$i<count($supplier_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $supplier_info[$i]->supplier_id; ?>" name="supplier_account_code[]" class="form-control" >
                                             <?php echo $supplier_info[$i]->supplier_id; ?>
                                             </td>
                                             <td><?php echo $supplier_info[$i]->account_name;?></td>
                                             <td><?php echo $supplier_info[$i]->supp_name;?></td>

                                             <td class="row">
                                                <input type="text" <?php if($supplier_info[$i]->opening_balance > 0){ echo "readonly";};?>  value="<?php echo abs($supplier_info[$i]->opening_balance);?>" name="supplier_amount[]" class="form-control numberOnly col-6 ml-3" maxlength="9" placeholder="0" autocomplete="off">
                                                <select class="form-control col-4 ml-1"  name="crdr[]">
                                                   <option value="">Cr</option>
                                                   <option value="-" <?php echo ($supplier_info[$i]->opening_balance < 0)? "selected='selected'":"";?>>Dr</option>
                                                </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                       for($i=0;$i<count($glgroup_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $glgroup_info[$i]->account_code; ?>" name="gl_account_code[]" class="form-control" >
                                             <?php echo $glgroup_info[$i]->account_code; ?>
                                             </td>
                                             <td><?php echo $glgroup_info[$i]->gname;?></td>
                                             <td><?php echo $glgroup_info[$i]->account_name;?></td>

                                             <td class="row">
                                                <input type="text" id="<?php echo $glgroup_info[$i]->account_code; ?>" <?php if($glgroup_info[$i]->amount > 0){ echo "readonly";};?>  value="<?php echo abs($glgroup_info[$i]->amount);?>" name="gl_amount[]" class="form-control numberOnly col-6 ml-3" maxlength="9" placeholder="0" autocomplete="off">
                                                <select class="form-control col-4 ml-1"  name="crdr[]">
                                                   <option value="">Cr</option>
                                                   <option value="-" <?php echo ($glgroup_info[$i]->amount < 0)? "selected='selected'":"";?>>Dr</option>
                                                </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                       for($i=0;$i<count($cash_info);$i++){
                                       ?>
                                          <tr>
                                             <td>
                                             <input type="hidden" value="<?php echo $cash_info[$i]->account_code; ?>" name="gl_account_code[]" class="form-control" >
                                             <?php echo $cash_info[$i]->account_code; ?>
                                             </td>
                                             <td><?php echo $cash_info[$i]->account_name;?></td>
                                             <td><?php echo $cash_info[$i]->account_name;?></td>

                                             <td class="row">
                                                <input type="text" id="<?php echo $cash_info[$i]->account_code; ?>" <?php if($cash_info[$i]->amount > 0){ echo "readonly";};?>  value="<?php echo abs($cash_info[$i]->amount);?>" name="gl_amount[]" class="form-control numberOnly col-6 ml-3" maxlength="9" placeholder="0" autocomplete="off">
                                                <select class="form-control col-4 ml-1"  name="crdr[]">
                                                   <option value="">Cr</option>
                                                   <option value="-" <?php echo ($cash_info[$i]->amount < 0)? "selected='selected'":"";?>>Dr</option>
                                                </select>
                                             </td>

                                          </tr>
                                       <?php
                                       }
                                    }
                                 ?>
											</tbody>
                                 <?php
                                    if($gl_type == 'all') {
                                    }
                                    else {
                                       if( !empty($bank_info) || !empty($customer_info) || !empty($supplier_info) || !empty($glgroup_info) || !empty($cash_info) ) {
                                          ?>
                                             <tr>
                                                   <td colspan="5" class="text-center" ><input id="sendMessageButton" value="Update" class="btn btn-success text-center mt-2 mb-2" type="submit">	</td>
                                             </tr>
                                          <?php
                                       }
                                    }
                                 ?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
               <input type="hidden" name="hGLType" value="<?php echo $gl_type; ?>" />
 				</form>
			</div>
		</div>
      </div><!-- /#right-panel -->
	</div>
    <?php $this->load->view('templates/footer.php');?>
    <?php $this->load->view('templates/bottom.php');?>
	<?php $this->load->view('templates/datatable.php');?>
	<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
	<script src="<?php echo asset_url()?>js/register.js"></script>
   <script src="<?php echo asset_url()?>js/select2.min.js"></script>
	<script>
	$('#account_group').on('change', function() {
		$("#group_code").val(this.value);
	});
   $(document).ready(function() {
      $('#sel_gl_account').select2();
		$('#bankdetails').DataTable({"order":[]});

      $('#sel_gl_account').on('change', function() {
         var gl_type = $(this).val();
         if(gl_type == '') {
            window.location = '<?php echo base_url('fpo/finance/glaccounts'); ?>';
         }
         else {
            window.location = '<?php echo base_url('fpo/finance/glaccounts'); ?>/'+gl_type;
         }
      });
      var isfiltered = '<?php echo $gl_type;?>';
      if(isfiltered != 'all'){
         $('.dataTables_filter input[type="search"]').focus();
      }
  });
	</script>
   </body>
</html>
