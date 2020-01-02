<?php


/* ---------------------------------------- */
/* Setting up the navigation */

function bcAGGT_admin_menu_sub_agegate() {
    
    // add the sub menu page for the plugin
	// https://codex.wordpress.org/Adding_Administration_Menus
    add_submenu_page( 
        'users.php', 
        'Age Gate', 
        'Age Gate', 
        'manage_options', 
        'bcAGGT_gate_settings', 
        'bcAGGT_function_for_sub'  // this should correspond with the function name
    ); 
}

add_action( 'admin_menu', 'bcAGGT_admin_menu_sub_agegate' );



?>