<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
		<table align="center"  cellpadding="0" cellspacing="0" class="display-width-inner" width="100%" >
			<tbody>							
				<tr>
					<td height="10" ></td>
				</tr>
				<tr class="text-center">
					<td colspan="12" align="center"><p>	SHARE APPLICATION FORM</p></td>
				</tr>
				<tr class="text-center">
					<td colspan="4" align="center"></td>
					<td colspan="4" align="center"><p><hr></p></td>
					<td colspan="4" align="center"></td>
				</tr>
				<tr>
						<td height="10" ></td>
				</tr>
				<tr class="text-center">
					<td colspan="12" align="center"><p>(Private & confidential, not for circulation)</p></td>
				</tr>
				<tr></tr>
			</tbody>	
		</table>
		<table  align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>			
						<td align="left">		
						<div style="width:100%;vertical-align:top;" >
							<table align="center" border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
								<tbody>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>							
									<td >To </td>							
									</tr>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4">M/S.  <?php echo ucwords($fpo_info['producer_organisation_name']); ?></td>
									</tr>
									<?php if(!empty($fpo_info['door_no'] and  $fpo_info['street'])){?>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><?php echo $fpo_info['door_no'].','.ucwords($fpo_info['street']);?></td>
									</tr>
									<?php }else if(!empty($fpo_info['street'])){?>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><?php echo ucwords($fpo_info['street']);?></td>
									</tr>
									<?php }?>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td ><?php echo $fpo_info['village_name'].', '.$fpo_info['taluk_name'].', '.$fpo_info['state_name'].' - '.$fpo_info['pin_code'];?></td>
									</tr>
									<tr>
										<td height="20" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td >Sir/Madam ,</td>
									</tr>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td ><strong>Sub:  </strong><strong><i>APPLICATION FOR THE ALLOCATION OF EQUITY SHARES OF Rs.<?php echo ($no_share_unit_price !=='') ? $no_share_unit_price:" ";?> FACE VALUE EACH</i></strong></td>
									</tr>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td style="text-align:justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please refer to the offer document issued by you. Having read and understood the terms of offer and the instructions,
										apply for the allotment of equity shares to me/us. The application is an irrevocable offer by me/us. The amount
										payable on application as shown below is remitted. On allotment, please place my/our name(s) on the Register of
										shareholder(s). I/We bind myself/ourselves by the provisions as contained in the scheme.
										</td>
									</tr>
									
								</tbody>	
							</table>
						</div>
						</td>
					</tr>
			</tbody>	
		</table>
	<div style="display:inline-block; width:100%; " >&nbsp;</div>
	<div style="display:inline-block; width:100%; " >
		<table align="center" border="1" bgcolor="#ffffff" cellpadding="10" cellspacing="0" class="display-width-inner" style="width:100%" >
			<tbody>

				<tr>

				<td  colspan="6" >
					<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
						<tbody>
						<tr class="text-center">
						<td colspan="2">&nbsp;</td>								
						<td colspan="2"   align="center">In Figures</td>
						<td colspan="1"  align="center">In words</td>									
						</tr>
						<tr>
							<td height="10" ></td>
						</tr>
						<tr class="text-center">
						<td colspan="2">No. of shares.:</td>								
						<td colspan="2"   align="right"><?php echo $generate_application['no_of_share'];?></td>
						<td colspan="1"  style="font-size: 8pt;"align="center">    <?php echo ($no_share_words !='') ? $no_share_words : "" ;  ?></td>									
						</tr>
						<tr>
							<td height="10" ></td>
						</tr>
						<tr class="text-center">
						<td colspan="2">Amount (<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>):</td>								
						<td colspan="2"    align="right"><?php $num=$generate_application['no_of_share']; echo $no_share_amount;?></td>
						<td colspan="1" style="font-size: 8pt;" align="center"><?php echo ($no_share_total_words !='') ? "&nbsp;&nbsp;".$no_share_total_words.' ONLY' : "" ;  ?></td>									
						</tr>				
					  </tbody>	
					</table>
				</td>
				<td  colspan="6" width="250pt" >
					<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
					<tbody>
					<tr class="text-center">
					<td colspan="2">&nbsp;</td>	
					<td >Date:</td>		
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td ><strong>FOR OFFICE USE ONLY</strong></td>							
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >Date of receipt of application</td>							
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >Sl. No :</td>							
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					</tbody>	
					</table>
				</td>
				</tr>							
			</tbody>	
		</table>
	</div>
	<div style="display:inline-block; width:100%; " >&nbsp;</div>
		<table align="center"  cellpadding="0" cellspacing="0" class="display-width-inner" width="100%" >
			<tbody>							
			<tr>
				<td height="10" ></td>
			</tr>
			<tr class="text-center">
				<td colspan="1">&nbsp;</td>
				<td ><p>I am/we are applying as (Tick) whichever is applicable</p></td>
			</tr>
		</tbody>	
	</table>
	<div style="display:inline-block; width:100%; " >&nbsp;</div>
			<div style="display:inline-block; width:100%; " >
			<table align="center" border="1" bgcolor="#ffffff" cellpadding="10" cellspacing="0" class="display-width-inner" style="width:100%" >
				<tbody>	
					<tr>
					<td>Cheque/Demand Draft drawn on</td>
					<td>Cheque/DD No</td>
					<td>Date</th>
					<td>Amount </td>
					</tr>
					<tr>
					<td width="20%">
						<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
							<tbody>									
							<tr class="text-center">
							</tr>									
												
						  </tbody>	
						</table>
					</td>
					<td width="17%">
						<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
							<tbody>									
							<tr class="text-center">								
							</tr>																							
						  </tbody>	
						</table>
					</td>
					<td  width="15%">
					</td>
					<td width="15%" >
					</td>
					<td  width="40%">
						<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
							<tbody>
							<tr>
							<td  colspan="5">
								<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner" >
								<tbody>
								<tr class="text-left">
								<td colspan="1"></td>	
								<td >Person &nbsp;</td>	
								<td >( <?php if($generate_application['member_type']==1){?> <span style="font-family: Arial Unicode MS, Lucida Grande">&#10004;</span><?php }else{ echo '&nbsp;&nbsp;&nbsp;';}?>)</td>	
								</tr>
								<tr>
									<td height="10" ></td>
								</tr>
								<tr>
								<td colspan="1">&nbsp;</td>								
								<td >Producer Institution &nbsp;</td>	
								<td >(<?php if($generate_application['member_type']==2){?> <span style="font-family: Arial Unicode MS, Lucida Grande">&#10004;</span><?php }else{ echo '&nbsp;&nbsp;&nbsp;';}?> )</td>
								</tr>
								</tbody>	
								</table>
							</td>
							</tr>
							<tr>
							<td height="10" ></td>
							</tr>								
						  </tbody>	
						</table>
					</td>
					</tr>
					
				</tbody>
			</table>
	</div>
	
	<div style="display:inline-block; width:100%;height:20px; "  >&nbsp;</div>
	<div style="display:inline-block; width:100%; ">		
		<table align="center" border="1" bgcolor="#ffffff" cellpadding="10" cellspacing="0" class="display-width-inner" style="width:100%" >
		<tbody>
			<tr class="text-center">
			<td colspan="6"  align="center">APPLICANT’S NAME IN FULL</td>
			<td colspan="6"  align="center">Name of father/husband</td>
			</tr>
			<tr>
			<td colspan="6" align="center"><?php echo ($generate_application['member_type']==2) ? ucwords($generate_application['producer_organisation_name']) : ucwords($generate_application['profile_name']) ;?></td>
			<td colspan="6"><?php echo ($generate_application['member_type']==2) ? '- NA -' : ucwords($generate_application['father_spouse_name']) ;?></td>
			</tr>
			<tr>
			<td colspan="2">Nominee’s Name</td>
			<?php if($generate_application['member_type']==1){?>
			<td colspan="4"><?php echo ($generate_application['nominee_name'] !='') ? ucwords($generate_application['nominee_name']) : "" ;?></td>
			<td colspan="6"><?php echo ($generate_application['nominee_father_name'] !='') ? ucwords($generate_application['nominee_father_name']) : "" ;?></td>
			<?php } 
				if($generate_application['member_type']==2) {?>
			<td colspan="4" ><?php echo "- NA -" ;?></td>
			<td colspan="6" ><?php echo "- NA -" ;?></td>
			<?php }?>
			</tr>
		</tbody>	
	</table>
	</div>				

	<div style="display:inline-block; width:100%;height:60px; "  >&nbsp;</div>
	<div style="display:inline-block; width:100%; " >
		<table align="center" border="1" bgcolor="#ffffff" cellpadding="10" cellspacing="0" class="table2 display-width-inner"  style="width:100%" >
			<tbody>						
				<tr>
					<td  colspan="12" >
					<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
					<tbody>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr class="text-center">
					<td colspan="1">Name (IN CAPITAL LETTERS) : </td>
					<td colspan="1">&nbsp;<?php echo ($generate_application['member_type']==2) ? strtoupper($generate_application['producer_organisation_name']) : strtoupper($generate_application['profile_name']) ;?></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>							
					<td  colspan="1" >Address : </td>
					<td colspan="1"><?php echo ($generate_application['member_type']==2) ? ucwords($generate_application['producer_organisation_name']) : ucwords($generate_application['profile_name']);?></td>										
					</tr>
					<?php if($generate_application['member_type']==2){?>
					<?php if(!empty($generate_application['fpo_doorno'] and  $generate_application['fpo_street'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo $generate_application['fpo_doorno'].','.ucwords($generate_application['fpo_street']);?></td>
					</tr>
					<?php }else if(!empty($generate_application['fpo_street'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo ucwords($generate_application['fpo_street']);?></td>
					</tr>
					<?php }?>
					<?php }else if($generate_application['member_type']==1){?>
					<?php if(!empty($generate_application['farmer_doorno'] and  $generate_application['farmer_street'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo $generate_application['farmer_doorno'].','.ucwords($generate_application['farmer_street']);?></td>
					</tr>
					<?php }else if(!empty($generate_application['farmer_street'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo ucwords($generate_application['farmer_street']);?></td>
					</tr>
					<?php }?>
					<?php }?>
					<?php if(!empty($address['village_name'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo $address['village_name'].', '.$address['taluk_name'].', '.$address['state_name'].' - '.$address['pin_code'];?></td>
					</tr>
					<?php }else if(!empty($address['taluk_name'] & $address['state_name'] & $address['pin_code'])){?>
					<tr>
					<td colspan="1">&nbsp;</td>
					<td ><?php echo $address['taluk_name'].', '.$address['state_name'].' - '.$address['pin_code'];?></td>
					</tr>
					<?php } ?>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>						
					<td colspan="1">Phone No :&nbsp;<?php echo ($generate_application['fpo_landline'] !='') ? $generate_application['fpo_landline'] : "" ;?></td>
					<td colspan="1">Mobile No :&nbsp;<?php echo ($generate_application['member_type']==1) ? $generate_application['farmer_mobile'] : $generate_application['fpo_mobile'] ;?></td>						
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>							
					<td colspan="1">E-Mail :&nbsp;<?php echo ($generate_application['fpo_email'] !='') ? $generate_application['fpo_email'] : "" ;?></td>	
					<td  colspan="1" >Fax :</td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					</tbody>
					<tbody>
					</tbody>	
					</table>
				</td>
				</tr>
				<tr>						
					<td colspan="3">Applicant</td>
					<td colspan="3">PAN</td>
					<td colspan="6" >SPECIMEN SIGNATURE</td>
				</tr>
				<tr>						
					<td colspan="3" height="20"><?php echo ($generate_application['member_type']==2) ? ucwords($generate_application['producer_organisation_name']) : ucwords($generate_application['profile_name']);?></td>
					<?php if($generate_application['member_type']==1) {?>
					<td colspan="3" height="20"><?php echo ($generate_application['pan_number'] !=='') ? strtoupper($generate_application['pan_number']) : "" ;?></td>					
					<?php }else if($generate_application['member_type']==2) {?>
					<td colspan="3" height="20"><?php echo ($generate_application['fpo_pan'] !== '') ? strtoupper($generate_application['fpo_pan']) : "" ;?></td>
					<?php }?>
					<td colspan="6" height="20">&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</div>
	<table align="center"  cellpadding="0" cellspacing="0" class="display-width-inner"  >
		<tbody>							
			<tr>
				<td height="10" ></td>
			</tr>
			<tr class="text-center">
				<td colspan="1"></td>
				<td colspan="10" ><p>........................................................................Tear Here....................................................................</p></td>
				<td colspan="1"></td>
			</tr>
		</tbody>	
	</table>
	<div style="display:inline-block; width:100%;height:20px; "  >&nbsp;</div>
	<div style="display:inline-block; width:100%; " >
		<table align="center" border="1" bgcolor="#ffffff" cellpadding="10" cellspacing="0" class="display-width-inner"  style="width:100%" >				
			<tbody>
				<tr>
				<td><strong>Address for Correspondence:</strong></td>
				<td style="border:none"></td>
				<td style="">Receiver’s Stamp</td>
				</tr>
				<tr>
					<td ><table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner">
					<tbody>
					<tr class="text-left" >
					<td colspan="2">&nbsp;</td>	
					<td ><strong>M/S : </strong><?php echo ucwords($fpo_info['producer_organisation_name']); ?></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<?php if(!empty($fpo_info['door_no'] and  $fpo_info['street'])){?>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>
					<td ><?php echo $fpo_info['door_no'].','.ucwords($fpo_info['street']);?></td>
					</tr>
					<?php }else if(!empty($fpo_info['street'])){?>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>
					<td ><?php echo ucwords($fpo_info['street']);?></td>
					</tr>
					<?php }?>
					</tbody>	
					</table></td>
					<td  >
					<table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
					<tbody>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr class="text-center">
					<td colspan="2">&nbsp;</td>	
					<td >Name / S:..........................................................................</td>		
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >CHEQUE/ Demand Draft/ Cash</td>							
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>	
					<td>  ON :..................................................................................</td>					   
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >CHEQUE/DD NO :............................................................</td>
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >DT :...................................................................................</td>
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >AMOUNT (<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>) :..................................................................</td>							
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>
					<td colspan="2">&nbsp;</td>								
					<td >Please draw the Cheque/DD in favour of :<strong>M/S;</strong></td>			
					</tr>
					<tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<tr>
						<td height="20" ></td>
					</tr>
					<td colspan="1"></td>		
					<td ><?php echo ucwords($fpo_info['producer_organisation_name']); ?> <?php if(!empty($fpo_info['door_no'] and  $fpo_info['street'])){ echo 'and '.$fpo_info['door_no'].','.ucwords($fpo_info['street']);}else if(!empty($fpo_info['street'])){ echo 'and '.ucwords($fpo_info['street']);}?></td>			
					</tr>
					</tbody>
					<tbody>
					<tr>
						<td height="10" ></td>
					</tr>
					</tbody>	
					</table>
					</td>
					<td ><table  border="0" cellpadding="0" cellspacing="0" class="display-width-inner">
					<tbody>
					<tr class="text-center" >
					<td colspan="3">&nbsp;</td>	
					<td >Received on</td>		
					</tr>
					</tbody>	
					</table></td>
				</tr>
			</tbody>	
		</table>
	</div>
	<div style="display:inline-block; width:100%;  vertical-align:top;" >
			<table align="center"  cellpadding="0" cellspacing="0" class="display-width-inner" width="100%" >
				<tbody>							
					<tr>
						<td height="10" ></td>
					</tr>
					<tr class="text-center">
						<td colspan="1">&nbsp;</td>
						<td>Note:  <strong><i> Cheques and Drafts are subject to realization</i></strong></td>
					</tr>
				</tbody>	
			</table>
		</div>	
	</body>
</html>