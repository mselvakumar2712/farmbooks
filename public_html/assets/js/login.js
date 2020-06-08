jQuery(document).ready(function($){

	$("input,select,textarea,date").jqBootstrapValidation({
			
		submitError: function($form, event, errors) {
		// additional error messages or events
		},
		submitSuccess: function($form, event) {
			
			var verifiedFrm = $('#is_verified').val();
			$this = $("#sendMessageButton");
			$this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
			$('#is_verified').val(1);
			if(verifiedFrm == 1){
				$form.submit();
				$('#is_verified').val(2);
			}
		},
		filter: function() {
			return $(this).is(":visible");
		},
	});
	/*When clicking on Full hide fail/success boxes */
	$('#name').focus(function() {
		$('#success').html('');
	});

});

var abc = 0;

function nospaces(t){
	if(t.value.match(/\s/g)){
	alert('Sorry, you are not allowed to enter any spaces');
	t.value=t.value.replace(/\s/g,'');
	}
}