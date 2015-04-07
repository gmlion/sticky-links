<?php
/*
Plugin Name: Sticky Links
Plugin URI: http://www.e-verbavolant.it
Description: Sticky Links fixed on the right of the page
Author: Gianmarco Leone
Author URI: http://www.e-verbavolant.it
Version: 0.1
Text Domain: sticky-links
Domain Path: /languages/
*/
require_once('class-StickyLinks.php');

$GLOBALS['StickyLinks'] = new StickyLinks();

/*function epy_load_plugin_textdomain() {
  load_plugin_textdomain( 'category-carousel', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}*/
 
/*add_action( 'plugins_loaded', 'epy_load_plugin_textdomain' );*/

?>