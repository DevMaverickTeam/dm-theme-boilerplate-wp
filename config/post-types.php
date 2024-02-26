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
            
            'name'               => printf(_x( '%s', 'post type general name', 'dm-boilerplate' ), $plural),
            'singular_name'      => printf(_x( '%s', 'post type singular name', 'dm-boilerplate' ), $singular),
            'menu_name'          => printf(_x( '%s', 'admin menu', 'dm-boilerplate' ), $plural),
            'name_admin_bar'     => printf(_x( '%s', 'add new on admin bar', 'dm-boilerplate' ), $singular),
            'add_new'            => printf(__( 'Add New %s', 'dm-boilerplate'), $singular),
            'add_new_item'       => printf(__( 'Add New %s', 'dm-boilerplate'), $singular),
            'new_item'           => printf(__( 'New %s', 'dm-boilerplate'), $singular),
            'edit_item'          => printf(__( 'Edit %s', 'dm-boilerplate'), $singular),
            'view_item'          => printf(__( 'View %s', 'dm-boilerplate' ), $singular),
            'all_items'          => printf(__( 'All %s', 'dm-boilerplate' ), $plural),
            'search_items'       => printf(__( 'Search %s', 'dm-boilerplate' ), $plural),
            'parent_item_colon'  => printf(__( 'Parent %s:', 'dm-boilerplate' ), $plural),
            'not_found'          => printf(__( 'No %s found.', 'dm-boilerplate' ), $plural),
            'not_found_in_trash' => printf(__( 'No %s found in Trash.', 'dm-boilerplate' ), $plural)
        );

        $args = array(
            'labels'             => $labels,
            'description'        => printf(__( '%s.', 'dm-boilerplate' ), $singular),
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
