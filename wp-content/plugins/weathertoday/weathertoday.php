<?php
/**
 * Plugin Name: Weather Today
 * Plugin URI: http://heochaua.tk
 * Description: Weather Today
 * Version: 1.0
 * Author: HeoChauA
 * Author URI: http://heochaua.tk
 * License: GPLv2
 */

include_once('init/weathertoday.admin.php');
//require_once('init/functions.php');

// Admin settings.
if(is_admin()) {
  $settings = new WeatherTodaySettingsPage();
}

//include_once('init/shortcode.php');
include_once('options/options.php');

/* Add Stylesheet and Scripts */
/*add_action('admin_init', 'social_post_plugin_scripts');
function social_post_plugin_scripts() {  
  wp_register_script('social-post-script', plugin_dir_url( __FILE__ ) . 'dist/js/scripts.js', array('jquery'), FALSE, '1.0.0', TRUE); // Custom scripts
  wp_enqueue_script('social-post-script'); // Enqueue it!
}*/