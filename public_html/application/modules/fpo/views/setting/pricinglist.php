<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.form-control {
   font-style: normal ! important;
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
                        <h1>List of Pricing</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Setting</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/setting/pricing');?>">List of Pricing</a></li>
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
								<!--<th width="15%" >Purchase Date</th>-->
                        <th width="40%">Product Name</th>
                        <th width="18%">Purchase Price ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                        <th width="10%">MRP ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
                        <th width="18%">Selling Price ( <span class="fa fa-inr" aria-hidden="true"></span> )</th>
							  </tr>
							</thead>
							<tbody id="pricelist">
                        <?php $i=0;foreach($price_list as $row): ?>
                           <tr>
                           <input type="hidden" class="form-control" name="price_id" id="<?php echo 'price_id_'.$i; ?>" value="<?php echo $row->po_detail_item; ?>">
                           <!--<td><?php //echo fpo_display_date($row->ord_date); ?></td>-->
                           <td><?php echo $row->product_name;?></td>
                           <td align="right"><?php echo number_format($row->price, 2); ?></td>
                           <td align="right"><?php echo ($row->mrp > 0) ?number_format($row->mrp, 2):'NA'; ?></td>
                           <td><input type="text" class="form-control numberOnly text-right selling_price" maxlength="6" name="selling_price" id="<?php echo 'sellingPrice_'.$i; ?>" value="<?php echo number_format($row->selling_price, 2); ?>" onChange="sellingPriceUpdate(this.value, <?php echo $row->po_detail_item; ?>, <?php echo $row->mrp; ?>)"></td>
                           </tr>
                           <?php $i++; endforeach; ?>                           
                     </tbody>
                      <tfoot>
                         <tr>
                           <td align="right" class="text-success" colspan="5"><b>* Edit selling price and press enter to update</b></td>
                         </tr>
                     </tfoot>
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
	$('#example').DataTable({"aaSorting": []});
});

function sellingPriceUpdate(sellingPrice, purchaseOrderID,mrp){
   if(mrp > 0 && sellingPrice > mrp){ 
      swal('Sorry',"Selling price should not be grater than MRP", 'warning');
      setTimeout((function() {
        window.location.reload();
      }), 1500);
    }else{
      $.ajax({
         url:"<?php echo base_url();?>fpo/setting/updatesellingprice/"+sellingPrice+'/'+purchaseOrderID,
         type:"GET",
         data:"",
         success:function(response){		  
            response=response.trim();
            responseArray=jQuery.parseJSON(response);            
              if(responseArray.status == 1) {
                  swal('Success', "Updated Successfully!");
               } else {
                  swal("Sorry!", 'Not updated');
               } 
            },
            error:function(response){
            swal("Sorry", 'Error!!! Try again', "warning");
            }       
      });
   }
}
</script>