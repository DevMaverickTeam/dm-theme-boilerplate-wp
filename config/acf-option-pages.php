<?php 

    if( function_exists('acf_add_options_page') ) {
    
       $parent = acf_add_options_page(array(
            'page_title' 	=> 'DM Settings',
            'menu_title'	=> 'DM Settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Site Constants'),
            'menu_title'  => __('Site Constants'),
            'parent_slug' => $parent['menu_slug'],
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Zoho Forms Shortcodes'),
            'menu_title'  => __('Zoho Forms Shortcodes'),
            'parent_slug' => $parent['menu_slug'],
        ));
        
    }
  

?>
