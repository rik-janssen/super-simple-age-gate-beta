<?php

/* ---------------------------------------- */
/* creating the site offline functionality  */

function bcAGGT_age_gate(){
	
    // check if the option is set
    if( get_option('bcAGGT_site_offline') == 1 ) {
        $bcAGGT_site_uc_status = true; // site is offline so run
    }else{
        $bcAGGT_site_uc_status = false; // site is online so not run
    }
    
    
    // here it all comes together: is the status OFFLINE and loggedin TRUE?
    if ($bcAGGT_site_uc_status == true){   


			
			// when the user wants to show a pretty page..
        	include plugin_dir_path( __DIR__ ).'template/wp-gate-page.php';
			
        
    }
}

	add_action('wp_footer', 'bcAGGT_age_gate');



// quick check if we are on a login page
function bcAGGT_is_login_page() {
	
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	
}

/* ---------------------------------------- */
/* Fetch image information by ID            */

function bcAGGT_get_image($img_ID){
	
	
	$imgid = (isset( $img_ID )) ? $img_ID : "";
	$img   = wp_get_attachment_image_src($imgid, 'full');
	
	return $img[0];
	
}


function wpshout_frontend_post() {
wpshout_save_post_if_submitted();
?>
<div id="postbox">
    <form id="new_post" name="new_post" method="post">

    <p><label for="title">Title</label><br />
        <input type="text" id="title" value="" tabindex="1" size="20" name="title" />
    </p>


    <?php wp_nonce_field( 'wps-frontend-post' ); ?>

    <p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>
    
    </form>
</div>
    <?php
}


function wpshout_save_post_if_submitted() {
    // Stop running function if form wasn't submitted
    if ( !isset($_POST['title']) ) {
        return;
    }

    // Check that the nonce was set and valid
    if( !wp_verify_nonce($_POST['_wpnonce'], 'wps-frontend-post') ) {
        echo 'Did not save because your form seemed to be invalid. Sorry';
        return;
    }

// setcookie( 'age-gate', $_POST['title'], time()+300600 );



}
