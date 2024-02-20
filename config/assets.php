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
        wp_register_style( 'dm-theme-boilerplate-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );

        // Fonts
        wp_register_style( 'dm-theme-boilerplate-fonts', 'https://fonts.googleapis.com/css2?family=Halant:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap' );

        // JS
        wp_register_script('dm-theme-boilerplate-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', [], '', true );
        wp_register_script('dm-theme-boilerplate-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', [], '', true );
        wp_register_script('dm-theme-boilerplate-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.min.js', [], '', true );
        wp_register_script( 'dm-script', get_template_directory_uri() . '/inc/assets/js/script.js', [], '', true );
    }


    public function enqueue_assets() {
        wp_enqueue_style( 'dm-theme-boilerplate-style', get_stylesheet_uri() );
        wp_enqueue_style('dm-main-min');
        wp_enqueue_style('dm-theme-boilerplate-bootstrap-css');
        wp_enqueue_style('dm-theme-boilerplate-fonts');

        wp_enqueue_script('jquery');
        wp_enqueue_script('dm-theme-boilerplate-popper');
        wp_enqueue_script('dm-theme-boilerplate-bootstrapjs');
        wp_enqueue_script('dm-theme-boilerplate-themejs');
        wp_enqueue_script('dm-script');

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }


    public function enqueue_head_variables() {

    }

} // End class

new DM_Project_Assets;
