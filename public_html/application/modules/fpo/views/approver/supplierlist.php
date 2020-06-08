<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('templates/top.php');?>
<?php $this->load->view('templates/header-inner.php');?>
<link href="<?php echo asset_url()?>css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo asset_url()?>css/loading.css" rel="stylesheet">
<style>
.modal-dialog1 {
    max-width: 950px ! important;
    margin: 1.75rem auto;
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
                        <h1>List of Suppliers</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Approver</a></li>
                            <li><a class="active" href="<?php echo base_url('fpo/approver/supplierlist');?>">List of Suppliers</a></li>
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
								<th>Supplier Name</th>
								<th>Address</th>
								<th>Status</th>
								<th>Action</th>
							  </tr>
							</thead>
							<tbody id="supplierlist">
                       <?php foreach($supplier_list as $row): ?>
								<tr> 
                           <td><?php echo $row->supp_name; ?></td>
									<td>
                           <?php echo (isset($row->village_name)) ? ($row->village_name).',':"";
                            echo (isset($row->panchayat_name)) ? ($row->panchayat_name).',<br>':"";
                            echo (isset($row->block_name)) ? ($row->block_name).' Block,' : "";
                            echo (isset($row->taluk_name))? ($row->taluk_name).' Taluk,<br>': "";?>              
                           <?php echo (isset($row->district_name))?$row->district_name.',':'';echo (isset($row->state_name))?$row->state_name.' - '.$row->pincode:'';?>
                           </td>
									<td>
									<?php 
                           if($row->status==0) 
									{
									 echo "Waiting for approval";                            
									}	
									else if($row->status==2)
									{
									echo "Rejected";
									}                    
									?></td>																			 
									<td>
                             <a href="<?php echo base_url('fpo/approver/viewsupplier/'.$row->supplier_id); ?>" id="<?php echo $row->supplier_id; ?>" data-toggle="modal" data-target="#SupplierDetails" class="btn btn-warning btn-sm" title="View"><i class="fa fa-eye" aria-hidden="true" title="View"></i></a> 
                             <a href="#" id="<?php echo $row->supplier_id; ?>" class="btn btn-success btn-sm approve" title="Approve"><i class="fa fa-check-circle" aria-hidden="true" title="Approve"></i></a>
                             <a href="#" id="<?php echo $row->supplier_id; ?>" class="btn btn-danger btn-sm reject" title="Reject"><i class="fa fa-ban" aria-hidden="true" title="Reject"></i></a>
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
   <div id="SupplierDetails" class="modal text-center">
      <div class="modal-dialog modal-dialog1">
         <div class="modal-content">
         </div>
      </div>
   </div>
   <?php $this->load->view('templates/footer.php');?>         
   <?php $this->load->view('templates/bottom.php');?> 
   <?php $this->load->view('templates/datatable.php');?>	   
   </body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('#example').DataTable();
    $('a.approve').click(function(){
    var id =$(this).attr("id");
         swal({
          title: 'Are you sure?',
          text: "Do you want to approve!",
          type: 'info',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
         }).then((result) => {
          if (result.value) {  
           jQuery.ajax({
            url:"<?php echo base_url();?>fpo/approver/supplierstatus/"+id+"/1",
            type:"GET",
            data:"",
            dataType:"html",
            cache:false,			
            success:function(response) {
               console.log(response);                
               response=response.trim();
               responseArray=$.parseJSON(response);				
               if(responseArray.status == 1){ 
                  window.location.reload(); 
               } else {
                  //swal('Sorry!');
               }
            },
            error:function(response){
               swal('Sorry!', 'Error, While fetching records from table');
            } 			
         });
          }else {
           //swal("Cancelled", "You have cancelled the logout action", "info");
           return false;
          }
         });      
      });
        $('a.reject').click(function(){
         var id =$(this).attr("id");
         swal({
          title: 'Do you want to reject!',
          input: 'textarea',
          inputPlaceholder: "Enter the reason",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!',
          preConfirm: function (text) {
          return new Promise(function (resolve, reject) {
            setTimeout(function() {
              if (text == '') {
                swal.showValidationError('Please enter the reason.')
              }
              resolve()
            },100)
          })
          }
         }).then((result) => {
          if (result.value) {  
           jQuery.ajax({
            url:"<?php echo base_url();?>fpo/approver/supplierstatus/"+id+"/2",
            type:"GET",
            data:"",
            dataType:"html",
            cache:false,			
            success:function(response){
               console.log(response);                
               response=response.trim();
               responseArray=$.parseJSON(response);				
               if(responseArray.status == 2){ 
                  window.location.reload();
               } else {
                  //swal('Sorry!');
               }
            },
            error:function(response){
               swal('Sorry!', 'Error, While fetching records from table');
            } 			
         });
          }else {
           //swal("Cancelled", "You have cancelled the logout action", "info");
           return false;
          }
         });      
      });
});
</script>
<script>
   $("#same_address").click(CopyAdd);
	function CopyAdd() {
	if (this.checked==true) {
            var sameaddress = $("#sameaddress").html();
            var pincode = $("#pin_code").html();
            var state = $("#state").html();
            var district = $("#district").html();
            var taluk_id = $("#taluk_id").html();
            var block = $("#block").html();
            var gram_panchayat = $("#gram_panchayat").html();
            var village = $("#village").html();
            var street = $("#street").html();
				$("#physical_pin_code").html(pincode);
				document.getElementById('physical_pin_code').innerHTML = pincode;
				document.getElementById('physical_state').innerHTML = state;
				document.getElementById('physical_district').innerHTML = district;
				document.getElementById('physical_taluk_id').innerHTML = taluk_id;
				document.getElementById('physical_block').innerHTML = block;
				document.getElementById('physical_gram_panchayat').innerHTML = gram_panchayat;
				document.getElementById('physical_village').innerHTML = village;
				document.getElementById('physical_street').innerHTML =street; 
				document.getElementById('physical_pin_code').value = $("#pin_code").val();
				document.getElementById('physical_state').value = $("#state").val();
				document.getElementById('physical_district').value = $("#district").val();
				document.getElementById('physical_taluk_id').value = $("#taluk_id").val();
				document.getElementById('physical_block').value = $("#block").val();
				document.getElementById('physical_gram_panchayat').value = $("#gram_panchayat").val();
				document.getElementById('physical_village').value = $("#village").val();
				document.getElementById('physical_street').value = $("#street").val();
				document.getElementById('shipping_contact_person').value =$("#billing_contact_person").val();
				document.getElementById('shipping_phone_num').value =$("#billing_phone_num").val();
				document.getElementById('shipping_std_code').value =$("#billing_std_code").val();
				document.getElementById('shipping_email').value =$("#billing_email").val();
				document.getElementById('shipping_mobile_num').value =$("#billing_mobile_num").val();
  } else {

  }
}  
			function validateEmail(emailField){
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(emailField.value) == false) 
					{
						//alert('Invalid Email Address');
						return false;
					}

					return true;

			}

			$('#gst').change(function (event) { 
			var regExp = /^([0-9]){2}([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([0-9]){1}([a-zA-Z]){1}([a-zA-Z0-9]){1}?$/; 
			var txtgst = $(this).val(); 
			if (txtgst.length == 15 ) { 
			if( txtgst.match(regExp) ){ 
			//	alert('GST match found');
			}
			else {
			$("#gst").val('');
			alert('Not a valid GST number');
			$("#gst").focus();
			event.preventDefault(); 
			} 
			} 
			else { 
			$("#gst").val('');
			alert('Please enter 15 digits for a valid GST number');
			$("#gst").focus();
			event.preventDefault(); 
			}
			});	

	 	function activeClick(supplierval) {	
				if(supplierval.checked == true) { 
					$("#supplier option").remove() ;	
					$.ajax({
						url: '<?php echo base_url('fpo/inventory/getallsupplier')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {	
							console.log(value.supplier_id);									   
								div_data +="<option value="+value.supplier_id+">"+value.supp_name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#supplier');
						}
					});
				}else{
					 $("#supplier option").remove() ;		
					$.ajax({
						url: '<?php echo base_url('fpo/inventory/getactivesupplier')?>',
						type: "GET",
						success:function(response) {
							responsearr=$.parseJSON(response);
							console.log(response);
							var div_data = '<option value="0">New Supplier</option>';
						   $.each(responsearr, function(key, value) {
								console.log(value.supplier_id);							   
								div_data +="<option value="+value.supplier_id+">"+value.supp_name+"</option>";
							  	                            							
							});
							$(div_data).appendTo('#supplier');
						}
					});
				}
		  
		}	
		
		$('#search_item_desc').on('change', function () {
	    var description = $(this).val();
		document.getElementById('search_item_code').value=description;
		});
	/* 	
		var delivery_address='<?php echo json_encode($location);?>';
		$('form[id="supplier_search"]').submit(function(e){
			e.preventDefault();
			var supplier=document.getElementById('purchase_supplier_id').value;
			var ref=document.getElementById('search_reference').value;
			var item_code=document.getElementById('search_item_code').value;
			var fromdate=document.getElementById('search_from').value;
			var todate=document.getElementById('search_to').value;
			var location=document.getElementById('search_location').value;
			var searchdata = {"supplier":supplier,"reference":ref, "item_code":item_code,"from":fromdate,"to":todate,"location":location};
			if(searchdata)
			{
			console.log(searchdata);
				 $.ajax({
					url:"<?php echo base_url();?>fpo/inventory/suppliersearch",
					type:"POST",
					data:searchdata,
					dataType:"html",
					cache:false,			
					success:function(response){		  
					responsearr=$.parseJSON(response);
						var supplierinfo = "";
						var count=1;
						$.each(responsearr, function(key, value) {	
							var sno=count++;
							supplierinfo += '<tr><td>'+sno+'</td><td>'+value.reference+'</td><td>'+value.suppiler_name+'</td><td>'+value.suppiler_delivery_address+'</td><td></td><td>'+value.ord_date+'</td><td>'+value.total+'</td></tr>';

						});
						$('#supplier_info').html(supplierinfo);

					},
					error:function(response){
						alert('Error!!! Try again');
					} 
					
					}); 
			}
			else
			{
				alert('Please provide mandatory fields ');
			}
		});
			 */		
	$('#gram_panchayat').change(function(){

	var gram_panchayat = $("#gram_panchayat").val();
	 getVillageList( gram_panchayat );
	});  
	 $('#block').change(function(){
		
		 var block = $("#block").val();
		  getPanchayatList( block );
	 });
	 	$('#physical_gram_panchayat').change(function(){

	var gram_panchayat = $("#physical_gram_panchayat").val();
	getphysical_VillageList( gram_panchayat );
	});  
	 $('#physical_block').change(function(){
		
		 var block = $("#physical_block").val();
	    getphysical_PanchayatList( block );
	 });
 function getPanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getVillageList( panchayat_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}
function getphysical_Pincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
           response=response.trim();
				responseArray=$.parseJSON(response);
				    if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
    				
                    $.each(responseArray.getlocation['talukInfo'],function(key, value){
                        taluk_id += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['blockInfo'],function(key, value){
                       block += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['cityInfo'],function(key, value){
                        district += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['stateInfo'],function(key, value){
                        state += '<option value='+value.id+'>'+value.name+'</option>'
                    });
                    $('#physical_village').html(village);
                    $('#physical_gram_panchayat').html(gram_panchayat);
					$('#physical_state').html(state);
					$('#physical_district').html(district);
					$('#physical_block').html(block);
					$('#physical_taluk_id').html(taluk_id);
                } else {
					$(".this_physical_pincode").val('');
					$(".this_physical_pincode").focus();
					$("#physical_pincode_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$("#physical_state").html('<option value="">Select State</option>');
					$("#physical_district").html('<option value="">Select District</option>');
					$("#physical_taluk").html('<option value="">Select Taluk</option>');
					$("#physical_block").html('<option value="">Select Block</option>');
					$("#physical_panchayat").html('<option value="">Select Gram Panchayat</option>');
					$("#physical_village").html('<option value="">Select Village</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}

function getphysical_PanchayatList( block_code ) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getPanchayat/"+block_code,
			type:"GET",
			data:"",
			dataType:"html",
         cache:false,			
			success:function(response) {
            console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = "";
				var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
                $.each(responseArray.panchayatInfo, function(key, value){
                    gram_panchayat += '<option value='+value.panchayat_code+'>'+value.name+'</option>';
                });                                
                $('#physical_gram_panchayat').html(gram_panchayat);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}

function getphysical_VillageList( panchayat_code ) {
	
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getvillages/"+panchayat_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
                console.log(response);
				response=response.trim();
				responseArray=$.parseJSON(response);
                var village = '<option value="">Select Village</option>';
				var gram_panchayat = "";
                $.each(responseArray.villageInfo, function(key, value){
                    village += '<option value='+value.id+'>'+value.name+'</option>';
                });                                
                $('#physical_village').html(village);                
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
}	

 
/* 	var bankname= document.getElementById('bank_name').value; 
	var branch_name= '<?php echo $supplier_info[0]->branch_name;?>'; 
	if(branch_name !=''){
		var get_bank_id = bankname;
		getBranchByBankName(get_bank_id);
	}else{
	}

	function getBankAddressByBankName( bank_name_id ) {
		$("#branch_name option").remove();
			if(bank_name_id != ''){    
			   $.ajax({
				  url:"<?php echo base_url();?>fpo/finance/getBankAddressByBankName/"+bank_name_id,
				  type:"GET",
				   data:"",
				  dataType:"html",
				  cache:false,			
				  success:function(response) {
				  console.log(response);
					  response=response.trim();                
					  responseArray=$.parseJSON(response);
					  console.log(responseArray);
					 if(responseArray.status == 1){
						if (Object.keys(responseArray).length > 0) {
							$("#branch_name").append($('<option></option>').val(0).html('Select Branch Name'));
						}
						$.each(responseArray.bankaddress_list,function(key,value){
							$("#branch_name").append($('<option></option>').val(value.id).html(value.branch_name));
						});
					}
				  },
				  error:function(response){
					alert('Error!!! Try again');
				  }  			
			   }); 
			} else {
				swal("Sorry!", "Select the bank name");
			} 
	} */
	



		
/* 	var bank_detail = '<?php //echo $supplier_info[0]->bank_detail;?>';  
    if(bank_detail == 1) {
		$('#bank_details1').show();
		$('#bank_details2').show();
		$('#bank_details3').show();
    }else{
		$('#bank_details1').hide();
		$('#bank_details2').hide();
		$('#bank_details3').hide();
	} */

	
	$('#pan').change(function (event) { 
		var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
		var txtpan = $(this).val(); 
		if (txtpan.length == 10 ) { 
		if( txtpan.match(regExp) ){ 
		//alert('PAN match found');
		}
		else {
		$("#pan").val('');
		alert('Not a valid PAN number');
		$("#pan").focus();
		event.preventDefault(); 
		} 
		} 
		else { 
		$("#pan").val('');
		alert('Please enter 10 digits for a valid PAN number');
		$("#pan").focus();
		event.preventDefault(); 
		}  
	});
 


$('#bank_name').change(function(){
	var branch_info = $("#bank_name").val();
	getBankAddressByBankName( branch_info );
	});
  function getplaceofsupplier(id) {
       $("#supply_place option").remove();
       var state_id = id;
			$.ajax({
				url:"<?php echo base_url();?>fpo/inventory/getplacesupply/",
				type:"GET",
				data:"",
				dataType:"html",
				cache:false,			
				success:function(response) {
               console.log(response);
					response=response.trim();
					responseArray=$.parseJSON(response);
               var village = '<option value="">Select Place of Supply</option>';
					var gram_panchayat = "";
					$.each(responseArray.supplyplace, function(key, value){
						if(state_id == value.state_code) {
							village += '<option value='+value.state_code+' selected="selected">'+value.name+'</option>';
						}
						else {
							village += '<option value='+value.state_code+'>'+value.name+'</option>';
						}
					});                                
					$('#supply_place').html(village); 
				},
				error:function(response){
					alert('Error!!! Try again');
				} 			
			 }); 
	} 	
</script>