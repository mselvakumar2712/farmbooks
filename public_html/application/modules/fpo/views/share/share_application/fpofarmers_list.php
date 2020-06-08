<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//print_r($farmer_list);

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
                        <h1>List Existing Shareholder Setup</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Share Management</a></li>
                            <li><a class="active" >List Existing Shareholder Setup</a></li>
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
               <form action="<?php echo base_url('fpo/share/postfpo_farmer')?>" method="post" id="debit_note_form" name="sentMessage" novalidate="novalidate" >
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                          <div class="container">
                               <div class="row">
                               <div class="form-group col-md-4"></div>
                               <div class="form-group col-md-3"><label class="text-danger">Available Shares :</label><?php if(!empty($available_sharevalue)){ echo $available_sharevalue[0]->shares_released; }else{ echo 0;}?></div>
                               </div>
                               <div class="row">
                                   <div class="form-group col-md-3">
                                       <label for="">Select Panchayat</label>
                                       <select class="form-control" id="search_panchayat" name="search_panchayat">
                                          <option value="">Select Panchayat</option>
                                          <?php for($i=0; $i<count($panchayat_list);$i++) { ?>
                                          <option value="<?php echo $panchayat_list[$i]->panchayat_code; ?>"><?php echo $panchayat_list[$i]->name; ?></option>
                                          <?php } ?>
                                       </select>
                                   </div>
                                   <div class="form-group col-md-3">
                                        <label for="">Select Village</label>
                                        <select class="form-control" id="search_village" name="search_village">
                                            <option value="">Select Village</option>
                                            <?php for($i=0; $i<count($village_list);$i++) { ?>
                                          <option value="<?php echo $village_list[$i]->id; ?>"><?php echo $village_list[$i]->name; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                     <div class="form-group col-md-3">
                                        <label for="">Mobile Number</label>
                                       <input type="text" class="form-control numberOnly" id="mobile_num" maxlength="10" minlength="10" name="mobile_num" placeholder="Search with Mobile" data-validation-required-message="Provide the search text" pattern="^[6-9]\d{9}$" title="Select any FPO and try this">

                                    </div>

                                    <div class="form-group col-md-2 mt-4">
                                        <button align="center" name="searchSubmit" id="searchSubmit" class="btn btn-success btn-fs mt-1 text-center" type="button" style="padding: .375rem .25rem;"><i class="fa fa-search fa-1x" aria-hidden="true"></i> &nbsp;&nbsp;Search</button>
                                    </div>
                               </div>

                           </div>
                           <table id="example" class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                  <th>Farmer</th>
                                  <th>Mobile Number</th>
                                  <th>Date of Birth / Age</th>
                                  <th>Folio Number</th>
                                  <th>Shares Held</th>
                              </tr>
                           </thead>
                                 <tbody id="memberlist">
                                      <?php
                                      $netTotal=0;
                                      for($i=0;$i<count($farmer_list);$i++){ ?>
                                      <tr id="<?php echo $i;?>"><input type="hidden"  value="<?php echo $farmer_list[$i]->id; ?>" id="farmer_id<?php echo $i;?>" name="farmer_id[]">
                                      <td><?php echo $farmer_list[$i]->profile_name.(!empty($farmer_list[$i]->father_spouse_name)?" (".$farmer_list[$i]->father_spouse_name.")":'').(!empty($farmer_list[$i]->door_no)?"-".$farmer_list[$i]->door_no:'').(!empty($farmer_list[$i]->street)?"-".$farmer_list[$i]->street:''); ?></td>
                                      <td><?php echo $farmer_list[$i]->mobile;?></td>
                                      <td><?php echo fpo_display_date($farmer_list[$i]->dob)." / ".$farmer_list[$i]->age; ?></td>
                                      <td><input type="text" class="form-control numberOnly folio" maxlength="4" id="folio_number<?php echo $i;?>" value="<?php echo $farmer_list[$i]->folio; ?>"  name="folio_number[]"></td>
                                      <td><input type="text" class="form-control numberOnly shared" maxlength="4" value="<?php echo $farmer_list[$i]->total_share; ?>" id="shares_held<?php echo $i;?>" name="shares_held[]"></td>
                                      </tr>
                                      <?php
                                      $netTotal = $netTotal+($farmer_list[$i]->total_share*$unit_price);
                                      } ?>
                                  </tbody>
                                  <tfoot >
                                  <tr>
                                    <td colspan="3"></td>
                                    <td>Paid up capital as per list</td>
                                    <td><input type="text" class="form-control numberOnly" readonly name="total" value="<?php echo $netTotal;?>" id="total" placeholder="Total"></td>
                                   <tr>
                                    <td colspan="3"></td>
                                    <td>Paid up capital as per ledger</td>
                                    <td><label class="text-danger"><i class="fas fa-rupee-sign"></i><?php echo $paid_up_capital->share_amount;?></label></td>
                                  </tr>
                                </tfoot>
                                </table>
                                 <div class="form-row">
											  <div class="form-group col-md-12 text-center">
											  <div id="success"></div>
												<button id="sendMessageButton" class="btn btn-success text-center" type="submit"><i class="far fa-save"></i> Save</button>
												<a href="" class="btn btn-outline-dark"><i class="fa fa-arrow-circle-left"></i> Back</a>
											  </div>
								        </div>
                           </div>
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
</body>
</html>
<script type="text/javascript">
var panchayatCode = 0;
var villageCode = 0;
$("#searchSubmit").click(function(){
    var panchayatCode = $('#search_panchayat').val();
    var villageCode = $('#search_village').val();
    var mobile_number = $('#mobile_num').val();
    loadFarmers(panchayatCode, villageCode, mobile_number);
});
$("#sendMessageButton").click(function(){
      var share_available=parseInt(<?php if(!empty($available_sharevalue)){ echo $available_sharevalue[0]->shares_released; }else{ echo 0;}?>);
      var share_inputs = document.getElementsByClassName("shared");
      var share_val =0;

      for (var j=0; j < share_inputs.length; j++ ) {
         share_val += parseInt($("#"+share_inputs[j].id).val());
      }
      if(share_val > share_available){
         swal('',"Total shares held exceeds available share");
         return false;
      }
});
function loadFarmers(panchayatCode, villageCode, mobile_number) {
    if(panchayatCode || villageCode || mobile_number != "") {
        var formedCode = {'panchayatCode':panchayatCode, 'villageCode':villageCode,'mobile_number':mobile_number};

        $.ajax({
				url:"<?php echo base_url();?>fpo/share/fpofarmersByLocation",
				type:"POST",
                data:formedCode,
				dataType:"html",
				cache:false,
				success:function(response){
               console.log(response);
               response=response.trim();
               responseArray=$.parseJSON(response);
               if(responseArray.status == 1){
               var farmer_list = "";
               var count=1;
                   if(responseArray.farmer_list.length != 0) {console.log(responseArray.farmer_list.length);
                       $.each(responseArray.farmer_list,function(key,value){
                           var sno=count++;
                           var dateFormat = dateFormatChange(value.dob);

                           if(value.total_share_value == null){
                              var total_share="";
                           }else{
                                var total_share=value.total_share_value;
                           }

                           if(value.folio_number == null){
                               var folio_number="";
                           }else{
                                var folio_number=value.folio_number;
                           }

                           farmer_list += '<tr><input type="hidden" value="'+value.id+'" id="farmer_id'+sno+'" name="farmer_id[]"><td>'+value.profile_name+'</td><td>'+dateFormat+' / '+value.age+'</td><td>'+value.mobile+'</td><td><input type="text" class="form-control numberOnly folio" maxlength="4" id="folio_number'+sno+'" value="'+folio_number+'" name="folio_number[]"></td><td><input type="text" class="form-control numberOnly shared" value="'+total_share+'" maxlength="4" id="shares_held'+sno+'"  name="shares_held[]"></td></tr>';
                       });

                   } else {
                       farmer_list += '<tr><td colspan="5" class="text-center">No records found</td></tr>';
                   }
                   //$('#example').DataTable().destroy();
                   $('#memberlist').html(farmer_list);
                   //$('#example').DataTable();
               }
				},
				error:function(){
				//alert('Error!!! Try again');
				//$('#example').DataTable();
				}
			});
    } else {
        swal("Sorry", "Provide any field");
    }
}
$('#memberlist input').on('change', function () {
	var row = $(this).closest('tr');
   var shared = $('.shared', row).val();
   var folio = $('.folio', row).val();
   if(folio){
      	var folio_inputs = document.getElementsByClassName("folio");
         	for (var j=1; j < folio_inputs.length; j++ ) {

               var input_val = folio_inputs[j].value;
               if(input_val == ''){
                 var folio_val = parseInt($("#"+folio_inputs[j-1].id).val()) + 1;
                 $("#"+folio_inputs[j].id+"").val(folio_val);
               }
              /*  if(input_val == ''){
               var folio_val = parseInt($("#"+folio_inputs[j-1].id).val()) + 1;
               $("#"+folio_inputs[j].id+"").val(folio_val);
               }else{
               var folio_val = parseInt($("#"+folio_inputs[j-1].id).val());
               $("#"+folio_inputs[j].id+"").val(folio_val);
               } */

            }
   }

   if(shared){
      var share_inputs = document.getElementsByClassName("shared");
         	for (var j=0; j < share_inputs.length; j++ ) {

               var input_val=share_inputs[j].value;
               if(input_val == ''){
                 var share_val = parseInt($("#"+share_inputs[j-1].id).val());
                 $("#"+share_inputs[j].id+"").val(share_val);
                  console.log(share_inputs[j].id);
               }
            }
   }
	//console.log(shared);
});
 function dateFormatChange(dateFormat) {
            var monthShortNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var dateFormats = new Date(dateFormat);
            return dateFormats.getDate() + '-' + monthShortNames[dateFormats.getMonth()] + '-' + dateFormats.getFullYear();
 }

$(".shared").focusout(function(){
   var totalCapital = 0;
   $('.shared').each(function(){
      console.log($(this).val());
      totalCapital=(Number(totalCapital)+(Number($(this).val()) * Number(<?php echo $unit_price;?>)));
   });
   $("#total").val(totalCapital);
});

function getpaidupCapital(){
   var share_price=document.getElementsByClassName("shared").value;
}


</script>
