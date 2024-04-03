jQuery(document).ready(function ($) {

	addCheckForUpdatedLinkOnTheThemesPage();
	function addCheckForUpdatedLinkOnTheThemesPage() {
		let button = '<a class="button" href="#" id="trigger-check-for-updates">Check For Updates</a>';

		// Adds a button just on the Theme card, not on the modal that opens up.
		$('div[data-slug=dm-boilerplate-theme] .theme-actions').prepend(button);
	}

	// Clear the autoupdate transients and reload the Plugins page
	initializeCheckForUpdatesWatcher();
	function initializeCheckForUpdatesWatcher() {

		$("#trigger-check-for-updates").on("click", function (e) {
			e.preventDefault();
			$(this).text('Checking For Updates...')

			jQuery.post(
				ajaxurl,
				{
					action: "dm_admin_clear_theme_autoupdate_transient",
				},
				function (response) {
					location.reload();
				}
			);

		});

	}

});