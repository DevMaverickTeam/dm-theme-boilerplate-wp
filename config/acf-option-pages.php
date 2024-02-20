<?php 

    if( function_exists('acf_add_options_page') ) {
    
       $parent = acf_add_options_page(array(
            'page_title' 	=> 'DM Settings',
            'menu_title'	=> 'DM Settings',
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Child Settings Page 1'),
            'menu_title'  => __('Child Settings Page 1'),
            'parent_slug' => $parent['menu_slug'],
        ));

        acf_add_options_sub_page(array(
            'page_title'  => __('Child Settings Page 2'),
            'menu_title'  => __('Child Settings Page 2'),
            'parent_slug' => $parent['menu_slug'],
        ));
        
    }
  

?>
