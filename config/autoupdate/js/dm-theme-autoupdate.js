jQuery(document).ready(function ($) {

	addCheckForUpdatedLinkOnTheThemesPage();
	function addCheckForUpdatedLinkOnTheThemesPage() {
		// Add a button just on the Theme card, not on the modal that opens up.
		let button = '<a class="button" href="#" id="trigger-check-for-updates">Check For Updates</a>';
		$('div[data-slug=dm-boilerplate-theme] .theme-actions').prepend(button);

		// Add a link on the Network Admin > Themes page (Multisite)
		let link = '<a href="#" id="trigger-check-for-updates">Check For Updates</a>';
		$('tr[data-slug=dm-boilerplate-theme] .theme-version-author-uri').append(" | ");
		$('tr[data-slug=dm-boilerplate-theme] .theme-version-author-uri').append(link);
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