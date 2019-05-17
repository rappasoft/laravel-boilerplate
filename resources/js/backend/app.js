import '@coreui/coreui'
import 'jquery-validation'


jQuery.validator.setDefaults({
	invalidHandler: function() {
		var submits = $(this).find('[type="submit"]');
		submits.attr('disabled', false);
		$('.nav-tabs a strong.required').remove();
		$('.tab-content.tab-validate .tab-pane:has(input.is-invalid)').each(function() {
			var id = $(this).attr('id');
			$('.nav-tabs,.nav-pills').find('a[href^="#' + id + '"]').append(' <strong class="required text-danger">***</strong> ');
		});
	},
	errorElement: "em",
	errorPlacement: function errorPlacement(error, element) {
		error.addClass("invalid-feedback");
		if (element.prop("type") === "checkbox") {
		error.insertAfter(element.parent("label"));
		} else {
		error.insertAfter(element);
		}
	},
	highlight: function highlight(element) {
		$(element)
		.addClass("is-invalid")
		.removeClass("is-valid");
	},
	unhighlight: function unhighlight(element) {
		$(element)
		.addClass("is-valid")
		.removeClass("is-invalid");
	}

  });

var validator = $('form').not('.no-validate').validate({

});
