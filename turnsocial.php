<?php
/*
Plugin Name: TurnSocial Toolbar
Plugin URI: http://turnsocial.com/wordpress
Description: Add your social content to your blog
Version: 0.1.2
Author: David Kelso
Author URI: http://turnsocial.com
License: ISC
*/

// Add the toolbar to regular page views
add_action('wp_footer', 'add_turnsocial_tag');
function add_turnsocial_tag() {
  // update_option('turnsocial_key', NULL);
  $key = get_option('turnsocial_key');
  if (!$key) return false;

  echo '<script type="text/javascript" src="http://turnsocial.com/bar/'.$key.'.js"></script>';
}


// Add a notice to the admin page if the key hasn't been specified
add_action('admin_notices', 'turnsocial_warning');
function turnsocial_warning() {
	if ( !get_option('turnsocial_key') && !isset($_POST['turnsocial_key']) ) {
    require('admin_warning.php');
  }
}

// Add the configuration page to the plugins admin menu
add_action('admin_menu', 'turnsocial_plugin_menu');
function turnsocial_plugin_menu() {
  add_submenu_page( 
    'plugins.php',
    'TurnSocial Configuration', 
    'TurnSocial Configuration', 
    'manage_options', 
    'turnsocial-config', 
    'turnsocial_config_page'
  );
}


function turnsocial_config_page() {
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
  
  // Check whether page load is actually a form submission
  if( isset($_POST['turnsocial_key'])) {
    $settings_saved = true;
    update_option('turnsocial_key', $_POST['turnsocial_key']);
  } 

  require('admin_page.php');
}

// TODO: This makes the css show on all pages - need some way to restrict it
// to just the TS admin oage
add_action("admin_print_styles", 'add_turnsocial_admin_styles');
function add_turnsocial_admin_styles() {
  wp_enqueue_style( 'turnsocial_styles', WP_PLUGIN_URL . '/turnsocial/styles.css');
}


register_uninstall_hook(__FILE__, 'turnsocial_uninstall_hook');
function turnsocial_uninstall_hook() {
  delete_option('turnsocial_key');
}
?>
