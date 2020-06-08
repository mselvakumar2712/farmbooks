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
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.location.href='<?php echo base_url('administrator/Inventory/supplier_list')?>';"><span aria-hidden="true">&times;</span></button>
						</div>
				</div>
				<div class="row">
					<div class="col-md-4">&nbsp;</div>
					<div class="col-md-4">
						<h2 class="text-success text-center">Supplier Detail</h2>
					</div>
					<div class="col-md-4">&nbsp;</div>
				</div>
				<div class="modal-body">
					<div class="row row-space">
						<div class="col-md-12">
							<div class="col-md-3">
								<label>Supplier Name</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->supp_name;?></div>
							</div>
							<div class="col-md-3">
								<label>Supplier Short Name</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->supp_ref;?></div>
							</div>
							<div class="col-md-3">
								<label>Customer No</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->supp_account_no;?></div>
							</div>
							<!--<div class="col-md-3">
								<label>Accounts</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($gl_group_info as $gl_group){
														if($gl_group->account_code2 == $supplier_info[0]->gl_group_id)
														   echo $gl_group->account_name;
													 }
													 ?></div>
							</div> -->
					</div>
				</div>
				<!-- <div class="row row-space mt-3">
					<div class="col-md-12">
						<div class="col-md-3">
							<label>Group Code</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->supp_name;?></div>
						</div>
						<div class="col-md-3">
							<label>Account Name</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->gl_acc_name;?></div>
						</div>
						<div class="col-md-3">
							<label>Account Status</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php if ($supplier_info[0]->gl_acc_status == '1') {echo "Active";}else{"In Active";} ?></div>
						</div>
						<div class="col-md-3">
							<label>Payment Terms (Days)</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($payment_terms as $payment_term){
													if($payment_term->terms_indicator == $supplier_info[0]->payment_terms)
													   echo $payment_term->terms;
												 }
												 ?>	</div>
						</div>
				</div>
			</div> -->
			<div class="row row-space mt-3">
			<h4 class="">Billing Address</h4>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>PINCODE</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_pincode ?></div>
						</div>
						<div class="col-md-3">
							<label>State</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->state_name ?></div>
						</div>
						<div class="col-md-3">
							<label>District</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->district_name;?></div>
						</div>
						<div class="col-md-3">
							<label>Taluk</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($taluk_info as $taluk){
                                                    if($taluk->taluk_code == $supplier_info[0]->mailing_taluk_id)
                                                     echo $taluk->name;
                                                    else
                                                   echo $taluk->name;
                                             }
                                             ?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>Block </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($block_info as $block){
                                                if($block->block_code == $supplier_info[0]->mailing_block)
                                                   echo $block->name;
                                               
                                             }
                                             ?></div>
						</div>
						<div class="col-md-3">
							<label>Gram Panchayat</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($panchayat_info as $panchayat){
                                                if($panchayat->panchayat_code == $supplier_info[0]->mailing_panchayat)
                                                   echo $panchayat->name;
                                                
                                             }
                                             ?></div>
						</div>
						<div class="col-md-3">
							<label>Village</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($village_info as $village){
													if($village->id == $supplier_info[0]->mailing_village)
													   echo $village->name;
													
												 }
												 ?></div>
						</div>
						<div class="col-md-3">
							<label>Door No / Street</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_street;?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>Contact Person </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_contact_person;?></div>
						</div>
						<div class="col-md-3">
							<label>Mobile Number</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_mobile_no;?></div>
						</div>
						<div class="col-md-3">
							<label>STD Code</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_std_code;?></div>
						</div>
						<div class="col-md-3">
							<label>Phone Number</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_phone_no;?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>E-Mail Address </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->mailing_email_id;?></div>
						</div>
				</div>
			</div>
			<div class="row row-space mt-3">
			<h4 class="">Supply Address</h4>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>PINCODE</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_pincode;?></div>
						</div>
						<div class="col-md-3">
							<label>State</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_state_name;?></div>
						</div>
						<div class="col-md-3">
							<label>District</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_district_name;?></div>
						</div>
						<div class="col-md-3">
							<label>Taluk</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($taluk_info1 as $taluk){
                                                if($taluk->taluk_code == $supplier_info[0]->physical_taluk_id)
                                                   echo $taluk->name;
                                                
                                             }
                                             ?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>Block </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($block_info1 as $block){
                                                if($block->block_code == $supplier_info[0]->physical_block)
                                                   echo $block->name;
                                               
                                             }
                                             ?></div>
						</div>
						<div class="col-md-3">
							<label>Gram Panchayat</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($panchayat_info1 as $panchayat){
                                                if($panchayat->panchayat_code == $supplier_info[0]->physical_panchayat)
                                                   echo $panchayat->name;
                                               
                                             }
                                             ?></div>
						</div>
						<div class="col-md-3">
							<label>Village</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($village_info1 as $village){
														if($village->id == $supplier_info[0]->physical_village)
														   echo $village->name;
														
													 }
													 ?></div>
						</div>
						<div class="col-md-3">
							<label>Door No / Street</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_street;?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>Contact Person </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_contact_person;?></div>
						</div>
						<div class="col-md-3">
							<label>Mobile Number</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_mobile_no;?></div>
						</div>
						<div class="col-md-3">
							<label>STD Code</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_std_code;?></div>
						</div>
						<div class="col-md-3">
							<label>Phone Number</label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_phone_no;?></div>
						</div>
				</div>
				<div class="col-md-12 mt-3">
						<div class="col-md-3">
							<label>E-Mail Address </label>
								<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->physical_email_id;?></div>
						</div>
				</div>
			</div>
			<div class="row row-space mt-3">
			<h4 for="inputAddress2" >TAX Details</h4>
				<div class="col-md-12 mt-3">
							<div class="col-md-3">
								<label>Permanent Account Number(PAN)</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->pan_no;?></div>
							</div>
							<div class="col-md-3">
								<label>Goods & Service Tax (GST) </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->gst_no;?></div>
							</div>
							<div class="col-md-3">
								<label>Place of Supply</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($state as $state_val){
														if($state_val->id == $supplier_info[0]->supp_place)
														   echo $state_val->name;
														
													 }
													 ?></div>
							</div>
							<div class="col-md-3">
								<label>Registration Type </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php  if($supplier_info[0]->regist_type == '1') {echo "Regular";
									}else if($supplier_info[0]->regist_type == '2'){echo "Composition";}
									else if($supplier_info[0]->regist_type == '3'){echo "Consumer";}
									else if($supplier_info[0]->regist_type == '4'){echo "Unregistered";}
									else if($supplier_info[0]->regist_type == '5'){echo "Overseas";}
									else if($supplier_info[0]->regist_type == '6'){echo "Special Economic Zone" ;}
								    ?></div>
							</div>
					</div>
				</div>
				<div class="row row-space mt-3">
				<h4 for="inputAddress2" >Bank Details</h4>
				<div class="col-md-12 mt-3">
							<div class="col-md-3">
								<label>Provide Bank A/c details</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php if($supplier_info[0]->bank_detail == '1') {echo "Yes"; }else {"No";}  ?></div>
							</div>
							<div class="col-md-3">
								<label>Bank Name </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php foreach($bank_name as $bank_name_info){
														if($bank_name_info->id == $supplier_info[0]->bank_name)
														   echo $bank_name_info->name;
														
													 }
													 ?></div>
							</div>
							<div class="col-md-3">
								<label>Branch Name</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"></div>
							</div>
							<div class="col-md-3">
								<label>Enter Account Number </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->bank_account;?></div>
							</div>
					</div>
					<div class="col-md-12 mt-3">
							<div class="col-md-3">
								<label>IFSC Code</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->ifsc_code;?></div>
							</div>	
					</div>
				</div>
				<!-- <div class="row row-space mt-3">
				<h4 for="inputAddress2" >Others</h4>
				<div class="col-md-12 mt-3">
							<div class="col-md-3">
								<label>Default Credit Period (Days)</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->credit_period;?></div>
							</div>
							<div class="col-md-3">
								<label>Maintain Bill by Bill </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php if($supplier_info[0]->maintain_bill == '1'){echo "Yes";}else{ echo "No";}  ?></div>
							</div>
							<div class="col-md-3">
								<label>Transaction Type</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php if($supplier_info[0]->transaction_type == '1') { echo "Credit";}else{ echo "Debit";} ?></div>
							</div>
							<div class="col-md-3">
								<label>Opening Balance </label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->opening_balance;?></div>
							</div>
					</div>
					<div class="col-md-12 mt-3">
							<div class="col-md-3">
								<label>General Notes</label>
									<div class="text-transform text-green" style="text-transform: capitalize;"><?php echo $supplier_info[0]->notes;?></div>
							</div>	
					</div>
				</div> -->
					<input type="hidden" id="is_verified" value="0" required="required">
						<div class="col-lg-12 text-center">
							<div id="success"></div>
						</div>
				</div>
			</div>
		</div> 
	</div>
</body>
<?php $this->load->view('templates/bottom.php');?>

