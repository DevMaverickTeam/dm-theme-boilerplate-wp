<?php

class DM_Shortcodes {

	public function __construct() {
		add_action( 'init', array( $this, 'register_shortcodes' ) );
	}

	public function register_shortcodes() {
		add_shortcode('dm-industries-display',  array( $this, 'dm_industries_display_shortcode')); 
		add_shortcode('dm-contact-support-modal', array( $this, 'contact_support_modal'));
        add_shortcode('dm-sitemap-pages', array( $this, 'dm_sitemap_shortcode'));
	}


	// NB: Make sure to include "/" in the template path;
	private function render_template($template_path = '', $variables = '') {
		if ( is_admin() ) return 'This shortcode only works on the frontend';
	
		ob_start();
        $variables = $variables;
		require(get_stylesheet_directory() . $template_path);
		return ob_get_clean();
	}

	function dm_industries_display_shortcode($atts) { 
        $a = shortcode_atts( array(
            'exclude' => '',
        ), $atts );
    
		return $this->render_template('/template-parts/shortcodes/industries-display-shortcode.php', $a);	
	}

	function contact_support_modal() {
		if ( is_admin() ) return 'This shortcode only works on the frontend';
	
		ob_start();
		require(get_stylesheet_directory() . '/template-parts/modals/contact-support-modal.php');
		return ob_get_clean();
	}

    function dm_sitemap_shortcode() {
        return $this->render_template('/template-parts/shortcodes/sitemap-shortcode.php');
	}

} 

$shortcodes = new DM_Shortcodes;
