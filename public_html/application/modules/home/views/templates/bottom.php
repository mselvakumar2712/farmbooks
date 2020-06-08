      <script src="<?php echo asset_url()?>vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo asset_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo asset_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="<?php echo asset_url()?>js/main.js"></script>
            <script src="<?php echo asset_url()?>js/jqBootstrapValidation.js"></script>   

<script>  
jQuery(document).ready(function() {
     jQuery("input, select").keypress(function (event) {
       if (event.keyCode == 13) {
           textboxes = jQuery("input,select");
           currentBoxNumber = textboxes.index(this);
           nextBox = textboxes[currentBoxNumber + 1];
           if (nextBox != null) {                        
               if(jQuery(nextBox).is(":hidden")){
                  currentBoxNumber = currentBoxNumber+1;
                  for(i = currentBoxNumber; 1<=textboxes.length; i++){
                     nextBox = textboxes[currentBoxNumber];
                     if(jQuery(nextBox).is(":hidden")){
                        currentBoxNumber = currentBoxNumber+1;
                     }else{
                        break;
                     }
                  }
               }
               nextBox.focus();
               if(nextBox.type != 'select-one')
                  nextBox.select();
               nextBox.classList.add("temp-focus");
               event.preventDefault();
           }else if(currentBoxNumber == (textboxes.length)-1) {
               nextBox = textboxes[(textboxes.length)-1];
               var submit = nextBox.closest('form').find(':submit');
               jQuery(':submit').focus();
               jQuery(':submit').addClass("temp-focus");
           }
           return false;
       }
   });
});

</script>