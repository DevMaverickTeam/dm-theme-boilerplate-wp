<?php

class DM_Project_Assets {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        add_action( 'wp_head', array( $this, 'enqueue_head_variables' ) );
    }

    public function register_assets() {
        // CSS
        wp_register_style( 'dm-main-min', get_template_directory_uri() . '/inc/assets/main.min.css', [] );

        // Fonts

        // JS
        wp_register_script( 'dm-script', get_template_directory_uri() . '/inc/assets/js/script.js', [], '', true );

    }


    public function enqueue_assets() {

        wp_enqueue_style( 'dm-main-min' );
        wp_enqueue_script( 'dm-script' );

    }


    public function enqueue_head_variables() {

    }

} // End class

new DM_Project_Assets;
