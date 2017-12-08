<?php 



//load_textdomain( 'zatolab', get_template_directory() . '/lang' );

/**
 * Include Vafpress Framework
 */
require_once 'vafpress/bootstrap.php';

/**
 * Include Custom Data Sources
 */
require_once 'admin/data_sources.php';

/**
 * Load options
 */
// options
$tmpl_opt  = get_template_directory() . '/admin/option/option.php';
/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => 'zl_option',                           // options key in db, required
	'page_slug'             => 'zl_option',                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	/*'menu_page'             => array('icon_url'=> 'url_to_image_file', 'position' => '59.54'),*/
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fluid',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', 'zatolab' ), // page title
	'menu_label'            => __( 'Theme Options', 'zatolab' ), // menu label
));




/**
 * Theme Functions
 * @since 1.0
 */
require 'inc/themefunctions.php';


/**
 * Install Plugins
 * @since 1.0
 */
require 'inc/plugins/installplugin.php';


/**
 * Load Class ZL_GLOBAL;
 * @since 2.0
 */
require 'inc/classes.php';
?>