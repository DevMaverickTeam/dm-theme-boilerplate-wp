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
            'name'               => _x( $plural, 'post type general name', 'dm-theme-boilerplate' ),
            'singular_name'      => _x( $singular, 'post type singular name', 'dm-theme-boilerplate' ),
            'menu_name'          => _x( $plural, 'admin menu', 'dm-theme-boilerplate' ),
            'name_admin_bar'     => _x( $singular, 'add new on admin bar', 'dm-theme-boilerplate' ),
            'add_new'            => _x( 'Add New', $singular, 'dm-theme-boilerplate' ),
            'add_new_item'       => __( 'Add New ' . $singular, 'dm-theme-boilerplate' ),
            'new_item'           => __( 'New ' . $singular, 'dm-theme-boilerplate' ),
            'edit_item'          => __( 'Edit ' . $singular, 'dm-theme-boilerplate' ),
            'view_item'          => __( 'View ' . $singular, 'dm-theme-boilerplate' ),
            'all_items'          => __( 'All ' . $plural, 'dm-theme-boilerplate' ),
            'search_items'       => __( 'Search ' . $plural, 'dm-theme-boilerplate' ),
            'parent_item_colon'  => __( 'Parent ' . $plural . ':', 'dm-theme-boilerplate' ),
            'not_found'          => __( 'No ' . $plural . ' found.', 'dm-theme-boilerplate' ),
            'not_found_in_trash' => __( 'No ' . $plural . ' found in Trash.', 'dm-theme-boilerplate' )
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __( $singular .'.', 'dm-theme-boilerplate' ),
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
