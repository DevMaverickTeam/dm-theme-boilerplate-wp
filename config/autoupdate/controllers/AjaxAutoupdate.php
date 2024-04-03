<?php

class DM_Project_AjaxAutoupdate extends DM_Project_AjaxAbstract
{

	protected static $endpoints = [
		'dm_admin_clear_theme_autoupdate_transient' => 'clearAutoupdateTransient',
	];

	// The transient name must be the same as in the autoupdate.php file
	public function clearAutoupdateTransient()
	{
		delete_transient('dm_theme_autoupdate_transient');
	}
}

new DM_Project_AjaxAutoupdate;
