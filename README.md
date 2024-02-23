# DM Boilerplate

## Description
This is a WordPress boilerplate/starter theme. The purpose of this theme is to be the starting point for your new WordPress project. While this theme was created to be a boilerplate, you can still use it as it is for your website. The theme is light, bloatware-free, and created based on our years of developing different WordPress projects. The theme uses: Bootstrap 5, Material Symbols, and is built based on _s. Page templates include a Right-sidebar (default template), Full Width, Blank with container, and Blank no container. Other features: Widgetized footer area, WooCommerce ready, Compatible with Visual Composer, Compatible with WPBakery, Compatible with Elementor. 

This theme is licensed under the GPL. You can use this theme as you like.

Page templates
* Right-sidebar (default page template)
* Full-Width
* Blank with container
* Blank no container

Other features:
* Currently using Bootstrap v5.3.2
* Material Symbols
* Widgetized footer area
* WooCommerce ready
* Compatible with Visual Composer / WPBakery
* Compatible with Elementor

---

## Installation

* Download ZIP file
* Upload to your themes folder
* Unzip folder
* OR upload directly to your WordPress theme via the interface

---

## Development

If you want to use this as your started point for development, you can do the followings. 
* Get the repo
* Run `npm install` to get SCSS set and working

In `functions.php` at the bottom fo the file you will find a bunch of lines commented. 
You can enable those based on your needs. 

### Assets
`assets.php` will help you manage all the enqueued assets from one place (CSS, JS and fonts).

### ACF Style
`acf-style.php` includes some basic style for the ACF plugin. 
Nothing fancy, just making the ACF easier to navigate on the Admin side. 

### Shortcodes
`shortcodes.php` will allow you to manage the WordPress shortcodes from a single place. 
In there you will find 3 example of shortcodes that can be used, with associated files already:
- dm-shortcode-passing-variable: renders content from a file while passing a variable
- dm-shortcode-rendered-only-on-front: renders content from a file, but not on admin side
- dm-shortcode-simple: renders content from a file

### Custom Post Types
`post-types.php` contains examples on how to define Custom Post Types.

### Custom taxonomies
`custom-taxonomies.php` contains examples on how to define Custom Taxonomies.

### ACF Option Pages
`acf-option-pages.php` contains examples on how to define ACF Options page for your Admin Dashboard.

### Material Symbols
The theme is using [Material Symbols](https://fonts.google.com/icons). 
Refer to that in order to add icons. 
