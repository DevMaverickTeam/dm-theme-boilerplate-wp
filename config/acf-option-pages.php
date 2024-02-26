<?php 

    if( function_exists('acf_add_options_page') ) {
    
       $parent = acf_add_options_page(array(
            'page_title' 	=> 'DM Settings',
            'menu_title'	=> 'DM Settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Child Settings Page 1', 'dm-boilerplate'),
            'menu_title'  => __('Child Settings Page 1', 'dm-boilerplate'),
            'parent_slug' => $parent['menu_slug'],
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Child Settings Page 2', 'dm-boilerplate'),
            'menu_title'  => __('Child Settings Page 2', 'dm-boilerplate'),
            'parent_slug' => $parent['menu_slug'],
        ));
        
    }
  

?>
