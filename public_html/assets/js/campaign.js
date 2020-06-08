$(function() {
	$("input,select,textarea").jqBootstrapValidation({
		preventSubmit: true,
		submitError: function($form, event, errors) {
			// additional error messages or events
		},
		submitSuccess: function($form, event) {      
			$this = $("#sendMessageButton");
			$this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
			$('#contactForm').submit();
		},
		filter: function() {
			return $(this).is(":visible");
		},
	});

	$("a[data-toggle=\"tab\"]").click(function(e) {
		e.preventDefault();
		$(this).tab("show");
	});
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
	$('#success').html('');
});
