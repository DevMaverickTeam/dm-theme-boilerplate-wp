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
