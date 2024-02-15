<?php
class DM_Project_Post_Types {

    public function __construct() {
        add_action( 'init', array( $this, 'all_post_types' ) );
    }

    public function all_post_types() {
        $post_types = [
            [
                'post_type' => 'director',
                'singular' => 'Director',
                'slug' => 'director',
            ],
            [
                'post_type' => 'photographer',
                'singular' => 'Photographer',
                'slug' => 'photographer',
            ],


        ];

        foreach ($post_types as $key => $post_type) {
            $this -> dm_register_post_type( $post_type );
        }
    }

    private function dm_register_post_type( $data ) {

        $singular  = $data['singular'];
        $plural    = ( isset( $data['plural'] ) ) ? $data['plural'] : $data['singular'] . 's';
        $post_type = $data['post_type'];
        $slug = $data['slug'];

        $labels = array(
            'name'               => _x( $plural, 'post type general name', 'dm-custom-theme' ),
            'singular_name'      => _x( $singular, 'post type singular name', 'dm-custom-theme' ),
            'menu_name'          => _x( $plural, 'admin menu', 'dm-custom-theme' ),
            'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'dm-custom-theme' ),
            'add_new'            => _x( 'Add New', $singular, 'dm-custom-theme' ),
            'add_new_item'       => __( 'Add New ' . $singular, 'dm-custom-theme' ),
            'new_item'           => __( 'New ' . $singular, 'dm-custom-theme' ),
            'edit_item'          => __( 'Edit ' . $singular, 'dm-custom-theme' ),
            'view_item'          => __( 'View ' . $singular, 'dm-custom-theme' ),
            'all_items'          => __( 'All ' . $plural, 'dm-custom-theme' ),
            'search_items'       => __( 'Search ' . $plural, 'dm-custom-theme' ),
            'parent_item_colon'  => __( 'Parent ' . $plural . ':', 'dm-custom-theme' ),
            'not_found'          => __( 'No ' . $plural . ' found.', 'dm-custom-theme' ),
            'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash.', 'dm-custom-theme' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( $singular .'.', 'dm-custom-theme' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $slug ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_post_type( $post_type, $args );

    }


} // End class

new DM_Project_Post_Types;
