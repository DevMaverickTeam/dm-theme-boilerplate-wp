<?php
class DM_Project_Custom_Taxonomy {

    public function __construct() {
        add_action( 'init', array( $this, 'all_custom_taxonomies' ) );
    }

	public function all_custom_taxonomies() {
		$custom_taxonomies = [
			[
				'taxonomy_type' => 'custom_taxonomy',
				'singular' => 'Custom Taxonomy',
				'plural' => 'Custom Taxonomies',
				'slug' => 'custom-taxonomy',
				'custom_post_type' => 'post',
			],
			[
				'taxonomy_type' => 'second_custom_taxonomy',
				'singular' => 'Second Custom Taxonomy',
				'plural' => 'Other Custom Taxonomies',
				'slug' => 'second-custom-taxonomy',
				'custom_post_type' => 'my_custom_post_type',
			],


		];

		foreach ($custom_taxonomies as $key => $custom_taxonomy) {
			$this -> dm_register_custom_taxonomy( $custom_taxonomy );
		}
	}

    private function dm_register_custom_taxonomy( $data ) {

        $singular  = $data['singular'];
        $plural    = ( isset( $data['plural'] ) ) ? $data['plural'] : $data['singular'] . 's';
        $custom_taxonomy = $data['taxonomy_type'];
        $slug = $data['slug'];
        $custom_post_type = $data['custom_post_type'];

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
            'show_admin_column'  => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => $slug ),
            'capability_type'    => 'post',
            'has_archive'        => false,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'author', 'thumbnail', 'excerpt', 'comments' )
        );

        register_taxonomy( $custom_taxonomy, array($custom_post_type) , $args );

    }


} // End class

new DM_Project_Custom_Taxonomy;
