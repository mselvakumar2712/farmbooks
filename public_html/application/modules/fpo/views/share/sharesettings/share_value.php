<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>

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
                        <h1>Share Value</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
							 <li><a href="#">Share Management</a></li>
                            <li class="active">Share Value</li>
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
					<form action="<?php echo base_url('fpo/share/post_shares_value')?>" method="post"  id="gstform" name="sentMessage" novalidate="novalidate" >                   
				    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body">
									<div class="table-responsive">  
										<table class="table table-bordered">
											<thead>
												<tr bgcolor="#afd66b">	
													<th class="text-center">No. of Shares Issued</th>
                                                    <th class="text-center">Available Shares</th>
                                                    <th class="text-center">Share Price</th>
                                                    <th class="text-center">Issued Date</th>
                                                   <th class="text-center">Min. Threshold</th>
                                                   <th class="text-center">Max. Threshold</th>
                                                   <th class="text-center">Action</th>
												</tr>
											</thead>
											<tbody id="bankdetails">
											<?php if(count($sharevalue_list) !== 0){
												$available_share = $share_available; 
												foreach($sharevalue_list as $row): 
												$sharerelease = $row->shares_released; ?>
											<tr>                                     
												<td><?php echo $row->shares_released; ?></td>
												<td><?php echo $available_share; //($available_share) ? ($available_share):($row->shares_available); ?></td>
												<td class="text-right"><?php echo $row->unit_price; ?></td>
												<td><?php echo fpo_display_date($row->effective_date); ?></td>
												<td><?php echo $row->minimum_threshold; ?></td>
												<td><?php echo $row->maximum_threshold; ?></td>	
												<td>
													<a href="<?php echo base_url('fpo/share/shareshistory'); ?>" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a>
												</td>                                              
											</tr>
											<?php endforeach; 
											} else {?>	
											<tr>
												<td align="center" colspan="7">No Data Available In Table</td>
											</tr>
											<?php } ?>
											</tbody>
										</table> 
									</div>
                                    
									<div class="container-fluid">
									  <div class="row row-space  mt-4" > 
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">Authorized Capital (Shares) <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly" <?php if(!empty($sharevalue_list[0]->auth_capital_units)){echo "readonly";}?> value="<?php if(!empty($sharevalue_list[0]->auth_capital_units)) { echo $sharevalue_list[0]->auth_capital_units; }?>" name="share_capital" maxlength="9" required  id="share_capital" data-validation-required-message="Please enter authorized capital  " placeholder="Authorized Capital (Units)" >
                                   <?php if(!empty($sharevalue_list[0]->auth_capital_amount)){?>
                                   <label class="text-danger ml-2" id="totalcount">Authorized Capital: <span class='fa fa-inr'></span><?php  echo $sharevalue_list[0]->auth_capital_amount;?> </label>
                                   <?php }else{?>
                                    <label class="text-danger ml-2" id="totalcount"></label>
                                   <?php } ?>
                                     <div class="help-block with-errors text-danger"></div>
                                 </div>
											
										    <div class="form-group col-md-3">
												<label for="inputAddress2">Share Price  (Per Share) <span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly" <?php if(!empty($sharevalue_list[0]->unit_price)){echo "readonly";}?> value="<?php if(!empty($sharevalue_list[0]->unit_price)) { echo $sharevalue_list[0]->unit_price; }?>" name="unit_price" maxlength="4"  id="unit_price" placeholder="Share Price" required="required" data-validation-required-message="Please enter share price ">
                                    <div id="validate_units" class="help-block with-errors text-danger" ></div>
											</div>
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">No. of Shares Issued<span class="text-danger">*</span></label>
												<input type="text" class="form-control numberOnly" onfocusout="validate_shares()" name="shares_released" maxlength="6"  id="shares_released" placeholder="No. of Shares Issued" required="required" data-validation-required-message="Please enter no. of shares released ">
												<div id="validate_shares"  class="help-block with-errors text-danger"></div>
											</div>
                                 <div class="form-group col-md-3">
												<label for="inputAddress2">Issued Date <span class="text-danger">*</span></label>
												<input type="date" class="form-control"  name="shares_released_date" value="<?php echo date('Y-m-d'); ?>"   id="shares_released_date"  required="required" data-validation-required-message="Please select issued date"  max="2050-12-31">
												<div class="help-block with-errors text-danger"></div>
											</div>
									  </div>
									  <div class="row row-space  mt-4" > 
											<div class="form-group col-md-3">
												<label for="inputAddress2">Minimum Threshold   </label>
												<input type="text" class="form-control numberOnly" onfocusout="validate_minthreshold()" name="min_threshold" maxlength="5"  id="min_threshold" placeholder="Minimum Threshold ">
												<div id="validate_threshold" class="help-block with-errors text-danger"></div>
											</div>
										    <div class="form-group col-md-3">
												<label for="inputAddress2">Maximum Threshold  </label>
												<input type="text" class="form-control numberOnly"   name="max_threshold" maxlength="5"  id="max_threshold" placeholder="Maximum Threshold ">
												<div class="help-block with-errors text-danger"></div>
											</div>
                                 <div class="form-group col-md-3">
											<input type="checkbox" name="paid_capital" id="paid_capital" value="1" class="">&nbsp; &nbsp;Setup Paid up Capital
                                 <!--<span for="inputAddress2">Paid Up Capital</span>-->
                                 <input type="text" class="form-control numberOnly mt-2"   name="sharetotal"  readonly id="paidvalue1" style="display:none;" placeholder="Paid up Capital ">
                                 
                              </div>
                              <div class="form-group col-md-3" id="label1" style="display:none;">
												<label for="inputAddress2"> </label>
												<p class="text-success"> Share Price * No.of Shares Issued</p>
												<div class="help-block with-errors text-danger"></div>
										</div>
									  </div>
                             <div class="row row-space  mt-4" id="label2" style="display:none;"> 
											<div class="form-group col-md-3">
												<label for="inputAddress2">By Cash</label>
												<input type="text" class="form-control numberOnly"  onfocusout="validatebycash()"   name="by_cash" maxlength="6"  id="by_cash" placeholder="By Cash">
											   <div id="validate_bycash" class="help-block with-errors text-danger"></div>
                                 </div>
										    <div class="form-group col-md-3">
												<label for="inputAddress2">By Bank</label>
												<select class="form-control" name="by_bank" id="by_bank">
                                    <option value="0">Select Bank </option>
                                   <?php for($i=0; $i<count($banks);$i++) { ?>
                                   <option value="<?php echo $banks[$i]->id; ?>"><?php echo $banks[$i]->bank_account_name; ?></option>
                                   <?php } ?>
                                    </select>
                                    <p id="validate_bankcash" class=" text-danger"></p>
											</div>
									  </div>
                                 <div class="form-group col-md-12 mt-4">	
                                    <div class="row row-space">
                                         <div class="form-group col-md-12 text-center">
                                             <div id="success"></div>
                                             <button id="sendMessageButton" class="btn btn-success btn-fs text-center" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Issue Share</button>
                                             <a href="<?php echo base_url('fpo/share/sharesvalue');?>" class="btn btn-outline-dark btn-fs"><i class="fa fa-close" aria-hidden="true"></i> Cancel</a>	
                                         </div>											 
                                     </div>
											 </div>
										  </div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
            </div><!-- .animated -->
        </div><!-- .content -->
     	</div>
		
<?php $this->load->view('templates/footer.php');?>         
<?php $this->load->view('templates/bottom.php');?>
<?php $this->load->view('templates/datatable.php');?>	  
<script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>
<script src="<?php echo asset_url()?>js/register.js"></script>
<script>
function validatebycash() { 
   var bycash=parseInt(document.getElementById("by_cash").value);
   var paid_capital=parseInt(document.getElementById("paidvalue1").value); 
   document.getElementById("validate_bankcash").innerHTML = "";
   document.getElementById("validate_bycash").innerHTML = "";
	if( bycash > paid_capital )
	{
		$("#by_cash").val('');
		$("#by_cash").focus();   
		$("#validate_bycash").append("By cash  is not greater than paid up capital");
		return false;
	}else{
      if(paid_capital && bycash){
      paid_capital -=bycash;
      $("#validate_bycash").append("Balance  :<span class='fa fa-inr'></span>"+paid_capital);
      $("#validate_bankcash").append("To Bank  :<span class='fa fa-inr'></span>"+paid_capital);
      }
   }
   
   var paidcapital=parseInt(document.getElementById("paidvalue1").value); 
   if(bycash == paidcapital){
      $("#by_bank").prop('disabled',true);
   }else{
     $("#by_bank").prop('disabled',false);
   }
   
}
$("#shares_released_date").on('change', function() {
   var share_released_date=new Date($(this).val());
   var monthcount=share_released_date.getMonth();
   var yearname=share_released_date.getFullYear();
   if(monthcount){
      monthcount++;
   }
  var year=(new Date()).getFullYear();
  if(monthcount < 3){
   if(yearname == year){
      $('#label2').show();
   }else if(year-1 == yearname){
       if(monthcount < 3){
          $('#label2').hide();
       }else{
          $('#label2').show();
       }
   }      
  } else {
    
  }

  
});

$("#unit_price").on('focusout', function() {
  var authorizedcapital = document.getElementById('share_capital').value;
  var unitprice = document.getElementById('unit_price').value;
  var result = parseInt(authorizedcapital) * parseInt(unitprice);
  document.getElementById("totalcount").innerHTML = "Authorized Capital: <span class='fa fa-inr'></span>"+result;
  //document.getElementById("sharetotal").value = result;
   getcalculatepaidup();
});

 
$("#sendMessageButton").click(function() {
	var min=parseInt(document.getElementById("min_threshold").value);
	var max=parseInt(document.getElementById("max_threshold").value);
	if(min && max){
	if( min > max )
	{
		
		$("#min_threshold").val('');
		$("#min_threshold").focus();
		$("#validate_threshold").append("minimum threshold is not greater than maximum threshold");
		return false;
	}
	}
   
   var share_capital=parseInt(document.getElementById("share_capital").value);
	var shares_released=parseInt(document.getElementById("shares_released").value);
	if(share_capital && shares_released){
	if( shares_released > share_capital )
	{
		
		$("#shares_released").val('');
		$("#share_capital").focus();
		$("#validate_threshold").append("No. of Shares Issued is not greater than Authorized Capital");
		return false;
	}
	}
});
$(function(){
	var dtToday = new Date();    
	var month = dtToday.getMonth() + 1;
	var day = dtToday.getDate();
	var year = dtToday.getFullYear();
	if(month < 10)
	month = '0' + month.toString();
	if(day < 10)
	day = '0' + day.toString();       
	var maxDate = year + '-' + month + '-' + day;
	$('#shares_released_date').attr('max', maxDate);

});

function validate_minthreshold(){
	
	var min=parseInt(document.getElementById("min_threshold").value);
	var max=parseInt(document.getElementById("max_threshold").value);
	if(min && max){
	if( min > max )
	{
		$("#min_threshold").val('');
		$("#min_threshold").focus();
		$("#validate_threshold").append("minimum threshold is not greater than maximum threshold");
		return false;
	}
	}
 
}

function validate_shares(){
	var share_capital=parseInt(document.getElementById("share_capital").value);
   var share_price=parseInt(document.getElementById("unit_price").value);
	var shares_released=parseInt(document.getElementById("shares_released").value);
   var share_avl=parseInt(<?php if(isset( $sharerelease)){echo $sharerelease;}else{ echo 0;}?>);
   if(share_avl != 0){
   shares_released +=share_avl;
   } 


      document.getElementById("paidvalue1").value="";     
   
	if(share_capital && shares_released){
	if( shares_released > share_capital )
	{

		$("#shares_released").val('');      
		$("#shares_released").focus();
		swal('',"No. of shares issued exceeds the authorised capital.");
		return false;
	}else{
     getcalculatepaidup();
   }
	}
 
}

function getcalculatepaidup(){  
      var share_price=parseInt(document.getElementById("unit_price").value);
      var no_share_released=parseInt(document.getElementById("shares_released").value);
         if(no_share_released !="" ){
            if(share_price !=""){
               var result = parseInt(share_price) * parseInt(no_share_released);
            }
         if(result !="" ){
            document.getElementById("paidvalue1").value = result;
            } 
         }
}
 $(document).ready(function () {
     $('#paid_capital').click(function () {
        var share_released=document.getElementById("shares_released").value;
        var unit_price=document.getElementById("unit_price").value;
         if(unit_price == ''){
             document.getElementById("paid_capital").checked = false;
             swal('',"Please Fill Share Price");
         }
         getcalculatepaidup();
        if(share_released !=''){
         var $this = $(this);
         if ($this.is(':checked')) {
            $('#paidvalue1').show();
            $('#label1').show();
            $('#label2').show();
            var share_released_date=new Date($('#shares_released_date').val());
            var monthcount=share_released_date.getMonth();
            var yearname=share_released_date.getFullYear();
            if(monthcount){
            monthcount++;
            }
            var year=(new Date()).getFullYear();
              if(monthcount < 3){
               if(yearname == year){
                  $('#label2').show();
               }else if(year-1 == yearname){
                   if(monthcount < 3){
                      $('#label2').hide();
                   }else{
                      $('#label2').show();
                   }
               }      
              }
            
         } else {
             $('#paidvalue1').hide();
             $('#label1').hide();
             $('#label2').hide();
         }
        }else{
          document.getElementById("paid_capital").checked = false;
          swal('',"Please Fill No.of Shares Issued Field");
        }
     });
 });
 document.getElementById("unit_price").onkeyup=function(){
    var input=parseInt(this.value);
    if(input<0 || input>1000)
      
      $("#unit_price").val('');
     
		$("#unit_price").focus();
      
       
    return false;
}   
</script>	 
</body>
</html>