<?php 
/**
* Plugin Name: Super Simple Age Gate | Beta
* Plugin URI: https://betacore.tech/super-simple-age-gate-for-wordpress/
* Description:  It's all about keeping the youngsters out of your sites while enabling crawlers to know what is on your pages.
* Version: 1.1
* Author: Beta
* Author URI: https://betacore.tech/
* Text Domain: betagate
* Domain Path: /lang
**/

/* Load lang */
function bcLOADLANG_gate() {
    load_plugin_textdomain( 'betagate', false, dirname(plugin_basename( __FILE__ )). '/lang' );
}

add_action( 'init', 'bcLOADLANG_gate' );


/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-wp-admin.php'); // the wp-admin navigation
include_once('inc/functions-gate.php'); // gate mode stuff



?>
