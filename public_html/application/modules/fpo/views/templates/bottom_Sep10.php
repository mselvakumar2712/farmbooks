<!DOCTYPE html>
<html lang="en">
<style>
.icon-bar {
   position: fixed;
   top: 90%;
   -webkit-transform: translateY(-50%);
   -ms-transform: translateY(-50%);
   transform: translateY(-50%);
}
.icon-bar a {
   display: block;
   text-align: center;
   padding: .3rem .75rem;
   margin-left: 10px;
   border-radius: 50%;
   transition: all 0.3s ease;
   color: white;
   font-size: 30px;
}
.chat {
   background: #007901 !important;
   color: white;
   float:left;
}
.modal-backdrop {
    position: fixed;
    z-index: 1040;
    opacity: 0.3;
    filter: alpha(opacity=30);
    background-color: overlay ! important; 
}
</style>
   <div class="icon-bar"> 
     <a href="#" class="chat float-left" data-toggle="modal" data-target="#myModal"><i class="far fa-comments"></i></a> 
   </div>
   <!-- The Modal -->
   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         <!-- <h4 class="modal-title">Modal Heading</h4>-->
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
               <div class="modal-overlay"></div>
        <form  name="sentMessage" method="post" action="" novalidate="novalidate" id="support_form">
  
         <div class="container" id="search">
         <div class="form-group col-md-12">
                  <label for="inputAddress">Type <span class="text-danger">*</span></label>
                  <select id="support_name" name="support_name" class="form-control" required>
                       <option value="" >Select type</option> 
                      
               </select>
               <p class="help-block text-danger"></p>
            </div>
              <div class="form-group col-md-12">
                  <label for="inputAddress">Comments </label>
                  <textarea class="form-control" id="comments" name="comments"></textarea>
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <div class="modal-footer">
        	<input id="sendMessageSubmitButton" value="Send" class="btn btn-success text-center" type="button">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>         
		</form>         
        </div>
        <!-- Modal footer -->              
      </div>
    </div>
  </div>
  

<!-- chat icon ends-->
      <script src="<?php echo asset_url()?>vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo asset_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Plugin JavaScript -->
      <script src="<?php echo asset_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Contact form JavaScript -->
      <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>   
   
      <!-- Custom scripts for this template -->
      <script src="<?php echo asset_url()?>js/main.js"></script>

      <script src="<?php echo asset_url()?>js/sweetalert2.js"></script>	  

	  <script>
         jQuery.ajax({
						url: '<?php echo base_url('fpo/dashboard/supportEnquiry')?>',
						type: "GET",
						data:"",
						success:function(response) {
							responsearr=jQuery.parseJSON(response);
							//console.log(response);
                     if(responsearr.status == 1 && responsearr.supportEnquiry.length != 0){
                        jQuery.each(responsearr.supportEnquiry, function(key, value) {	
                           var div_data="<option value="+value.id+">"+value.name+"</option>";
                          jQuery(div_data).appendTo('#support_name');	                            							
                        });
                     } else {
                        
                     }
						}
					});
  
     jQuery('#sendMessageSubmitButton').on('click', function(event){
                  var support_name = jQuery('#support_name').val();
                  var comments = jQuery('#comments').val();
                  if(support_name != ''){                  
                  //alert(supportData);
                  var messageData = {"support_name":support_name, "comments":comments};
                  jQuery.ajax({
                     url:"<?php echo base_url();?>fpo/dashboard/enquiry_information",
                     type:"POST",
                     data:messageData,
                     dataType:"html",
                     cache:false,			
                     success:function(response){		  
                        response=response.trim();
                        responseArray=jQuery.parseJSON(response);
                        //console.log(response);    						
                        if(responseArray.status == 1) {
                           swal("Thank You!", responseArray.message, "success"); 
                           //location.reload();
                           setTimeout((function() {
                             window.location.reload();
                           }), 3000);
                        } else {
                           swal("", responseArray.message, "warning");
                        }
                     },
                     error:function(response){
                        swal("Sorry", 'Error!!! Try again', "warning");
                     } 					
                  });  
                  } else {
                     swal("", "Provide the support type", "warning");
                  }                  
         });                    
     
         jQuery("textarea").keypress(function() {
               var textareaValue = jQuery(this).val();
               var txt = textareaValue.charAt(0).toUpperCase() + textareaValue.slice(1);
               jQuery(this).val(txt);
            });

         function gridMenuShow() {
            jQuery( "#grid" ).toggle();
         }
         jQuery('#right-panel').on('click', function(event){
            if(event.target.tagName.toLowerCase() != 'i' && event.target.id.toLowerCase() != 'notification'){
               if(document.getElementById("grid").style.display == "block"){ 
                  document.getElementById("grid").style.display = "none";
               }
            }
         });
         jQuery(document).ready(function() {            
                    
            //sweetalert
            jQuery('a.signout').click(function() {
               swal({
                title: 'Are you sure?',
                text: "You want to logout!",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
               }).then((result) => {
                if (result.value) {          
                 
                 window.location.replace("<?php echo base_url('administrator/login/signout')?>");
                }else {
                 //swal("Cancelled", "You have cancelled the logout action", "info");
                 return false;
                }
               });      
            });
            
            /* jQuery(".form-control").keypress(function (event) {
                if (event.keyCode == 13) {
                    textboxes = $(".form-control:not([readonly])");
                    currentBoxNumber = textboxes.index(this);
                    if (textboxes[currentBoxNumber + 1] != null) {
                        nextBox = textboxes[currentBoxNumber + 1];
                        nextBox.focus();
                        nextBox.select();
                    }
                    event.preventDefault();
                    return false;
                }
            }); */
            jQuery("input, select,textarea").keypress(function (event) {
                if (event.keyCode == 13) {
                    textboxes = $("input,select,textarea");
                    currentBoxNumber = textboxes.index(this);
                    nextBox = textboxes[currentBoxNumber + 1];
                    if (nextBox != null) {                        
                        if($(nextBox).is(":hidden")){
                           currentBoxNumber = currentBoxNumber+1;
                           for(i = currentBoxNumber; 1<=textboxes.length; i++){
                              nextBox = textboxes[currentBoxNumber];
                              if($(nextBox).is(":hidden")){
                                 currentBoxNumber = currentBoxNumber+1;
                              }else{
                                 break;
                              }
                           }
                           //nextBox = textboxes[currentBoxNumber + 3];              
                        }
                        if($(nextBox).is("[readonly]")){
                           currentBoxNumber = currentBoxNumber+1;
                           for(i = currentBoxNumber; 1<=textboxes.length; i++){
                              nextBox = textboxes[currentBoxNumber];
                              if($(nextBox).is("[readonly]")){
                                 currentBoxNumber = currentBoxNumber+1;
                              }else{
                                 break;
                              }
                           }
                           //nextBox = textboxes[currentBoxNumber + 3];              
                        }
                        //
                        nextBox.focus();
                        if(nextBox.type != 'select-one')
                           nextBox.select();
                        nextBox.classList.add("temp-focus");
                        event.preventDefault();
                    }else if(currentBoxNumber == (textboxes.length)-1) {
                        nextBox = textboxes[(textboxes.length)-1];
                        //var submit = nextBox.closest('form').find(':submit');
                        //alert(submit);
                        $(':submit').focus();
                        $(':submit').addClass("temp-focus");
                    }
                    return false;
                }
            });
         });
jQuery(window).on('load', function(){
	jQuery(".loading").fadeOut("fast");
});

//pincode
function getPincode( pin_code ) {
    if(pin_code.length == 6) {
        $.ajax({
			url:"<?php echo base_url();?>administrator/Login/getlocation/"+pin_code,
			type:"GET",
			data:"",
			dataType:"html",
            cache:false,			
			success:function(response) {
            //console.log(response);                
				response=response.trim();
				responseArray=$.parseJSON(response);
				//alert(responseArray.status);
                if(responseArray.status == 1) {
                    var state = '';
					var district = '';
					var block ='<option value="">Select Block</option>';
					var taluk_id ='<option value="">Select Taluk</option>';
                    var village = '<option value="">Select Village</option>';
                    var gram_panchayat = '<option value="">Select Gram Panchayat</option>';
    				/* $.each(responseArray.getlocation['villageInfo'],function(key, value){
                        village += '<option value='+value.id+'>'+value.name+'</option>'
                    });

                    $.each(responseArray.getlocation['panchayatInfo'],function(key, value){
                        gram_panchayat += '<option value='+value.id+'>'+value.name+'</option>'
                    });	*/
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
                    $('.sel_village').html(village);
                    $('.sel_panchayat').html(gram_panchayat);
					$('.sel_state').html(state);
					$('.sel_district').html(district);
					$('.sel_block').html(block);
					$('.sel_taluk').html(taluk_id);
                } else {
					$(".this_pin_code").val('');
					$(".this_pin_code").focus();
					$("#pincode_validate").html("<div class='alert alert-danger'>"+responseArray.message+"</div>");
					$(".sel_state").html('<option value="">Select State</option>');
					$(".sel_district").html('<option value="">Select District</option>');
					$(".sel_taluk").html('<option value="">Select Taluk</option>');
					$(".sel_block").html('<option value="">Select Block</option>');
					$(".sel_panchayat").html('<option value="">Select Gram Panchayat</option>');
					$(".sel_village").html('<option value="">Select Village</option>');
                }
            },
			error:function(response){
				alert('Error!!! Try again');
			} 			
         }); 
    }
}

jQuery("#module_code").change(function(){
	var module_code = jQuery(this).val();
	if(module_code!=''){
		showModuleByCode(module_code);
	}
});	 

function showModuleByCode(module_code){
	jQuery(function($){
		jQuery.ajax({
			url:"<?php echo base_url();?>administrator/Login/getModuleByCode/"+module_code,
			type:"GET",
			data:"",
			dataType:"html",
			cache:false,			
			success:function(response) {
				console.log(response);                
				response=response.trim();
				responseArray=$.parseJSON(response);				
				if(responseArray.status == 1 && responseArray.moduleCode){ 
					window.location = "<?php echo base_url(); ?>/"+responseArray.moduleCode.module_url; 
				} else {
					swal('Sorry!', 'Given code is not matched our modules');
					jQuery("#module_code").val('');
				}
			},
			error:function(response){
				swal('Sorry!', 'Error, While fetching records from table');
			} 			
		}); 
	});
}
</script>