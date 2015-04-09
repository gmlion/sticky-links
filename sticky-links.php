<?php
/*
Plugin Name: Sticky Links
Plugin URI: http://www.e-verbavolant.it
Description: Sticky Links fixed on the right of the page
Author: Gianmarco Leone
Author URI: http://www.e-verbavolant.it
Version: 1.0
Text Domain: sticky-links
Domain Path: /languages/
*/
require_once('class-StickyLinks.php');

$GLOBALS['StickyLinks'] = new StickyLinks();

/*function sticky_links_load_plugin_textdomain() {
  load_plugin_textdomain( 'sticky-links', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}*/
 
/*add_action( 'plugins_loaded', 'sticky_links_load_plugin_textdomain' );*/

?>