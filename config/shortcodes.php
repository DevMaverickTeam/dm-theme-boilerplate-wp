<?php

class DM_Shortcodes {

	public function __construct() {
		add_action( 'init', array( $this, 'register_shortcodes' ) );
	}

	public function register_shortcodes() {
		add_shortcode('dm-shortcode-passing-variable',  array( $this, 'dm_shortcode_passing_variable')); 
		add_shortcode('dm-shortcode-rendered-only-on-front', array( $this, 'dm_shortcode_rendered_only_on_front'));
        add_shortcode('dm-shortcode-simple', array( $this, 'dm_shortcode_simple'));
	}


	// NB: Make sure to include "/" in the template path;
	private function render_template($template_path = '', $variables = '') {
		if ( is_admin() ) return 'This shortcode only works on the frontend';
	
		ob_start();
        $variables = $variables;
		require(get_stylesheet_directory() . $template_path);
		return ob_get_clean();
	}

	function dm_shortcode_passing_variable($atts) { 
        $a = shortcode_atts( array(
            'exclude' => '',
        ), $atts );
    
		return $this->render_template('/template-parts/shortcodes/shortcode-example-variable.php', $a);	
	}

	function dm_shortcode_rendered_only_on_front() {
		if ( is_admin() ) return 'This shortcode only works on the frontend';
	
		ob_start();
		require(get_stylesheet_directory() . '/template-parts/shortcodes/shortcode-example-simple.php');
		return ob_get_clean();
	}

    function dm_shortcode_simple() {
        return $this->render_template('/template-parts/shortcodes/shortcode-example-simple.php');
	}

} 

$shortcodes = new DM_Shortcodes;
