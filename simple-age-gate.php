<?php 
/**
* Plugin Name: Super Simple Age Gate
* Plugin URI: https://betacore.tech/plugins/super-simple-age-gate-for-wordpress/
* Description:  It's all about keeping the youngsters out of your sites while enabling crawlers to know what is on your pages. Works with Wordpress 5.3.
* Version: 1.7.1
* Author: Beta
* Author URI: https://betacore.tech/
* Text Domain: betagate
* Domain Path: /lang
**/

/* Includes */
include_once('inc/functions-nav.php'); // the wp-admin navigation
include_once('inc/functions-wp-admin.php'); // the wp-admin navigation
include_once('inc/functions-gate.php'); // gate mode stuff


/* make the plugin page row better */

function bcAGGT_pl_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( 'https://www.paypal.com/donate/?token=y9x2_N0_18pSbdHE9l9jivsqB3aTKgWQ3qGgxg_t6VUUmSU6B2H1hUcANUBzhX5xV0qg2G&country.x=NL&locale.x=NL' ) . '">' . __( 'Donate', 'betagate' ) . '</a>'
    ), $links );

    $links = array_merge( array(
		'<a href="' . esc_url( admin_url( '/users.php?page=bcAGGT_gate_settings' ) ) . '">' . __( 'Settings', 'betagate' ) . '</a>'
    ), $links );
    
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'bcAGGT_pl_links' );
?>