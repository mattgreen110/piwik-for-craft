$(function() {

	// Track Downloads
	$('.track-download').on("click", function(e) {
		$.ajax({
			type: "GET",
			url: 'http://' + window.location.host + "/index.php/actions/piwik/tracking/trackAction",
			data: {
				actionUrl: $(this).attr('href'),
				actionType: $(this).attr('data-action-type')
			}
		}).done(function( msg ) { });
	});

	// Track Events
	$('.track-event').on("click", function(e) {
		$.ajax({
			type: "GET",
			url: 'http://' + window.location.host + "/index.php/actions/piwik/tracking/trackEvent",
			data: {
				category: $(this).attr('data-category'),
				action: $(this).attr('data-action'),
				name: $(this).attr('data-name'),
				value: $(this).attr('data-value')
			}
		}).done(function( msg ) { });
	});

});