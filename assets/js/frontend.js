// phpcs:ignoreFile
(function ($) {
	$("#trackForm").on("submit", function (e) {
		e.preventDefault();

		let data = $(this).serialize();

		$.post(EPT.ajaxurl, data, function (response) {
			console.log(response);
		});
	});
})(jQuery);
