// phpcs:ignoreFile
(function ($) {
	let errorMessage = "";
	let errorContainer = $("#error-container");
	let trackingInput = $("#track-form .tracking-code");
	let trackNotFound = $("#track-not-found");

	$("#track-form").on("submit", function (e) {
		e.preventDefault();
		trackNotFound.hide();

		// Check if tracking code empty then return.
		if (undefined === trackingInput || "" === trackingInput.val().trim()) {
			errorMessage = "Please provide a tracking code.";
			$(".error-message", errorContainer).text(errorMessage);
			errorContainer.fadeIn();
			return;
		}

		if (
			(trackingInput.val().startsWith("ECR") ||
				trackingInput.val().startsWith("BL")) &&
			11 <= trackingInput.val().length
		) {
			errorMessage = "";
			errorContainer.fadeOut();
		} else {
			errorMessage =
				"Tracking number starts with ECR or BL and minimum 11 characters";
			$(".error-message", errorContainer).text(errorMessage);
			errorContainer.fadeIn();
			return;
		}

		let data = $(this).serialize();
		$.post(EPT.ajaxurl, data, function (response) {
			let result = response.data.message;

			if (response.success) {
				result = JSON.parse(result);
				if (!result.success) {
					trackNotFound.fadeIn();
				}
				console.log(result);
			} else {
				errorMessage = result;
				$(".error-message", errorContainer).text(errorMessage);
				errorContainer.fadeIn();
			}
		});
	});
})(jQuery);
