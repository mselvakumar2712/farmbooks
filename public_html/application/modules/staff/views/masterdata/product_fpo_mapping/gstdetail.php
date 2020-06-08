<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<style>
.modal {
    position:relative !important;
    right: 0;
    left: 0;
    z-index: 1;
    display: none;
    overflow: hidden;
    outline: 0;
}
.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

/* Modal Body */
.modal-body
{
	width:100% !important;
}

/* Modal Footer */
.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 100% !important;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    animation-name: animatetop;
    animation-duration: 0.4s;
	 z-index:1;
}

/* Add Animation */
@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}
.modalbody
{
}
.text-success {
    color: #28a745!important;
}
.text-green {
    color: #59B210!important;
}
text-center
{
	text-align:center;
}
.modal{
	display:block !important;
	
}
.modal-backdrop
{
    opacity:0.5 !important;
}
#success
{
	max-width:1020px !important;
	width:100% !important;
}
.padding-content
{
	padding:10px;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 0px !important; 
	margin-left: 0px !important; 
    
}
</style>
<body id="page-top">
   <?php $this->load->view('templates/side-bar.php');?>
	<div  id="myModal" class="modal mt-10">
	<?php $this->load->view('templates/menu-inner.php');?>
		<div class="container" id="success">
			<div class="modal-content">
				<div class="row">
					<div class="col-md-10">&nbsp;</div>
						<div class="col-md-2 text-center">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.location.href='<?php echo base_url('staff/masterdata/addproductfpo')?>';"><span aria-hidden="true">&times;</span></button>
						</div>
				</div>
				<div class="row">
					<div class="col-md-4">&nbsp;</div>
					<div class="col-md-4">
						<h2 class="text-success text-center">GST Rates</h2>
					</div>
					
				</div>
				<div class="modal-body">
					 <table id="example" class="table table-striped table-bordered">
							<thead>
							  <tr>
								<th width="10%">HSN Code</th>
								<th>Item Description </th>
								<th width="10%">IGST (%)</th>
							 </tr>
							</thead>
							<tbody id="fpolist">
							<?php foreach($taxvalue as $row): ?>
									<tr> 							
										<td><?php echo $row->hsn_category; ?></td>
										<td><?php echo $row->item_description; ?></td>
										<td class="text-right"><?php echo $row->igst; ?></td>					
									</tr>
								<?php endforeach; ?>
							</tbody>
						  </table>
				</div>
			</div>
		</div> 
	</div>
</body>
<?php $this->load->view('templates/bottom.php');?>

