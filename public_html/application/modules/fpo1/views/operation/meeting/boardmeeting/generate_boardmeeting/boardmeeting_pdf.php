<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
td.uppercase {
  text-transform: uppercase;
}
</style>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

		<table align="center" cellpadding="0" cellspacing="0" class="display-width-inner" width="100%">
			<tbody>							
				<tr>
					<td height="10" ></td>
				</tr>
				<tr class="text-center">
					<td colspan="12" align="center"><p><u><strong>NOTICE OF BOARD MEETING</strong></u></p></td>
				</tr>
				<tr class="text-center">
					<td colspan="4" align="center"></td>
					<td colspan="4" align="center"></td>
				</tr>
				<tr>
						<td height="10" ></td>
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
									<td >To</td>							
									</tr>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><strong>Mr/ Mrs. </strong><?php echo ucwords($director->name); ?></td>
									</tr>
						
									<?php if(!empty($generate_pdf['address'])){?>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><?php echo ucwords($generate_pdf['address']);?></td>
									</tr>
									<?php }?>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td ><?php echo $generate_pdf['village_name'].', '.$generate_pdf['taluk_name'].', '.$generate_pdf['state_name'].' - '.$generate_pdf['pincode'];?></td>
									</tr> 
									<tr>
										<td height="20" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td><strong>Dear Sir/Madam,</strong></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td style="text-align:justify">Notice is hereby given that a meeting of the Board of Directors of the <?php echo ucwords($fpo_info['producer_organisation_name']); ?> Company will be held at <?php  $time=$generate_pdf['meeting_time'];echo ucwords(date('h:i a', strtotime($time)));?> on <?php echo date("d-m-Y", strtotime($generate_pdf['meeting_date']));?> at registered Office / Corporate office of the company at  <?php echo ($generate_pdf['door_no']) ? ($generate_pdf['door_no'].","):""?><?php echo $generate_pdf['address']?>, <?php echo $generate_pdf['district_name']?>, <?php echo $generate_pdf['state_name']?>-<?php echo $generate_pdf['pincode']?>  
									 to interalia consider the following business as
									under :-</td>
									</tr>
								</tbody>	
							</table>
						</div>
						</td>
					</tr>
			</tbody>	
		</table>
			
		<table  align="left" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					
					<tr>			
						<td align="left">		
						<div style="width:100%;vertical-align:top;" >
							<table align="left" border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
								<tbody>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>						
									<td >Agenda</td>							
									</tr>
									<tr>
									<td colspan="4">1.<?php echo $generate_pdf['agenda']?></td>
									</tr>
									<!--<tr>
									<td colspan="4">2.</td>
									</tr>
									<tr>
									<td colspan="4">3.</td>
									</tr>
									<tr>
									<td colspan="4">4.</td>
									</tr>
									<tr>
									<td colspan="4">5.</td>
									</tr>-->
								</tbody>	
							</table>
						</div>
						</td>
					</tr>
			</tbody>	
		</table>
		
		
		<table  align="left" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%">
				<tbody>
					<tr>
						<td height="10" ></td>
					</tr>
					<tr>			
						<td align="left">		
						<div style="width:100%;vertical-align:top;" >
							<table align="left" border="0" cellpadding="0" cellspacing="0" class="display-width-inner"  >
								<tbody>
									<tr>
										<td height="10" ></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>							
									<td >You are requested to make it convenient to attend the meeting.</td>							
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><?php echo ucwords($fpo_info['producer_organisation_name']); ?></td>
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4"><?php echo ucwords($generate_pdf['ceo_name']);?></td>
									</tr>
									<tr>&nbsp;
									</tr>
									<tr>
									<td colspan="2">&nbsp;</td>
									<td colspan="4">CEO</td>
									</tr>
								</tbody>	
							</table>
						</div>
						</td>
					</tr>
			</tbody>	
		</table>
		
		
		
	</body>
</html>