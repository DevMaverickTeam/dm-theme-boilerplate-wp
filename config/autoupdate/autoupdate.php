<?php

// Guide for setting up the autoupdate functioality: https://rudrastyh.com/wordpress/theme-updates-from-custom-server.html

// NOTEs:
// 1. Since Apr 4, this uses transients. It normally is implemented like this: https://github.com/rudrastyh/misha-update-checker/blob/main/misha-update-checker.php
// 2. Unlike the Plugins, the theme apparently 'seems' to only check for updates if it is active. The reason is actually the use of the 'wp_get_theme();' to get the current theme's version, instead of a constant. This will always be incorrect, as it returns the version of the currentl active theme.


require_once 'controllers/AjaxAbstract.php';
require_once 'controllers/AjaxAutoupdate.php';

class DM_Project_AutoUpdateTheme
{
	private $infoJsonUrl = 'https://updates.server.com/some-folders/themes/dm-boilerplate-theme/info.json';
	private $version = null; // Populate in constructor
	private $themeFolderName = null; // Populate in constructor
	private $cacheTransientName = 'dm_theme_autoupdate_transient';

	public function __construct()
	{
		$this->version = $this->getCurrentThemeVersion();
		$this->themeFolderName = get_stylesheet(); // Returns folder name of the current theme, either child or parent. Ex: "divi-child"

		add_filter('site_transient_update_themes', array($this, 'showAvalableUpdatesData'));
		add_action('upgrader_process_complete', array($this, 'purge'), 10, 2);

		add_action('admin_enqueue_scripts', array($this, 'enqueueAdminAssets'));
	}

	// Reads the version set in style.css. This works correctly even in child themes.
	private function getCurrentThemeVersion()
	{
		$theme = wp_get_theme();
		return $theme->get('Version');
	}

	private function request()
	{
		$remote = get_transient($this->cacheTransientName);

		if (false === $remote) {

			$remote = wp_remote_get(
				$this->infoJsonUrl,
				array(
					'timeout' => 10,
					'headers' => array(
						'Accept' => 'application/json'
					)
				)
			);

			if ($this->remoteResponseIsError($remote))
				return false;

			set_transient($this->cacheTransientName, $remote, 12 * HOUR_IN_SECONDS);
		}

		$remote = json_decode(wp_remote_retrieve_body($remote));

		return $remote;
	}

	// This probably runs every time the Plugins page is shown.
	// NB: Some optimisations to be done with the transient.
	function showAvalableUpdatesData($transient)
	{
		if (empty($transient)) return $transient;

		// connect to a remote server where the update information is stored
		$remote = $this->request();

		if (!$remote) {
			return $transient; // who knows, maybe JSON is not valid
		}

		$data = array(
			'theme' => $this->themeFolderName,
			'url' => $remote->details_url,
			'requires' => $remote->requires,
			'requires_php' => $remote->requires_php,
			'new_version' => $remote->version,
			'package' => $remote->download_url,
		);

		// check all the versions now
		if ($this->newThemeVersionIsAvailableAndIsCompatible($remote)) {
			$transient->response[$this->themeFolderName] = $data;
		} else {
			$transient->no_update[$this->themeFolderName] = $data;
		}

		return $transient;
	}

	private function remoteResponseIsError($remote)
	{
		return is_wp_error($remote) || 200 !== wp_remote_retrieve_response_code($remote) || empty(wp_remote_retrieve_body($remote));
	}

	private function newThemeVersionIsAvailableAndIsCompatible($remote)
	{
		return $remote
			&& version_compare(trim($this->version), $remote->version, '<')
			&& version_compare($remote->requires, get_bloginfo('version'), '<')
			&& version_compare($remote->requires_php, PHP_VERSION, '<');
	}

	// just clean the cache when new theme version is installed
	public function purge($upgrader, $options)
	{
		if ('update' === $options['action'] && 'theme' === $options['type']) {
			delete_transient($this->cacheTransientName);
		}
	}

	// Only enqueue the dm-theme-autoupdate.js script on the /wp-admin/themes.php page
	public function enqueueAdminAssets()
	{
		if ($_SERVER['REQUEST_URI'] != '/wp-admin/themes.php') return;
		
		// JS
		wp_register_script('dm-theme-autoupdate', get_stylesheet_directory_uri() . '/config/autoupdate/js/dm-theme-autoupdate.js', [], $this->version, true);
		wp_enqueue_script('dm-theme-autoupdate');
	}
}

new DM_Project_AutoUpdateTheme;
