<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die();
}else{

	delete_option( 'bcAGGT_site_offline' );
	delete_option( 'bcAGGT_offline_redirect' );
	delete_option( 'bcAGGT_offline_header' );
	delete_option( 'bcAGGT_offline_redirect_url' );
	delete_option( 'bcAGGT_offline_background_image' );
	delete_option( 'bcAGGT_offline_logo' );
	delete_option( 'bcAGGT_offline_message' );
	delete_option( 'bcAGGT_offline_css' );
	delete_option( 'bcAGGT_offline_label' );
	delete_option( 'bcAGGT_offline_theme' );
	delete_option( 'bcAGGT_offline_analytics' );
}
?>