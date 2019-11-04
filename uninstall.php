<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}else{

	delete_option( 'bcAGGT_gate_active' );
	delete_option( 'bcAGGT_gate_age' );
	delete_option( 'bcAGGT_gate_theme' );
	delete_option( 'bcAGGT_gate_logo' );
	delete_option( 'bcAGGT_gate_message' );
    delete_option( 'bcAGGT_gate_message_footer' );
	delete_option( 'bcAGGT_gate_background_image' );
	delete_option( 'bcAGGT_gate_css' );
	delete_option( 'bcAGGT_gate_cookienotice' );
    delete_option( 'bcAGGT_gate_cookietime' );
	delete_option( 'bcAGGT_page_cookie' );
	delete_option( 'bcAGGT_page_privacy' );
    delete_option( 'bcAGGT_page_disclaimer' );

	
}
?>