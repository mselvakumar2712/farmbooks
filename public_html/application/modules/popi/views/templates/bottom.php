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

</style>
<!-- chat icon mar 06-->
<div class="icon-bar"> 
  <a href="#" class="chat float-left"><i class="far fa-comments"></i></a> 
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
         jQuery("textarea").keypress(function() {
               var textareaValue = $(this).val();
               var txt = textareaValue.charAt(0).toUpperCase() + textareaValue.slice(1);
               $(this).val(txt);
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
           /*  jQuery(".form-control").keypress(function (event) {
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
            });  */ 
           jQuery("input, select").keypress(function (event) {
                if (event.keyCode == 13) {
                    textboxes = $("input,select");
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
</script>