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


			if($_COOKIE['requiredage']==1){
			// when the user wants to show a pretty page..
        	   include plugin_dir_path( __DIR__ ).'template/wp-gate-page.php';
            }
			
        
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
//wpshout_save_post_if_submitted();
?>
<div id="postbox">
    <form id="new_post" name="new_post" method="post">

    <p><label for="title">Title</label><br />
        <input type="text" id="day" value="" tabindex="1" size="2" name="day" />
        <input type="text" id="month" value="" tabindex="1" size="2" name="month" />
        <input type="text" id="year" value="" tabindex="1" size="4" name="year" />
    </p>


    <?php wp_nonce_field( 'wps-frontend-post' ); ?>

    <p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>
    
    </form>
</div>
    <?php
}


function wpshout_save_post_if_submitted() {
    // Stop running function if form wasn't submitted
    if ( !isset($_POST['day']) ) {
        return;
    }
    if ( !isset($_POST['month']) ) {
        return;
    }
    if ( !isset($_POST['year']) ) {
        return;
    }

    // Check that the nonce was set and valid
    if( !wp_verify_nonce($_POST['_wpnonce'], 'wps-frontend-post') ) {
        echo 'Did not save because your form seemed to be invalid. Sorry';
        return;
    }
    
    print_r(bcAGGT_check_age($_POST['day'],$_POST['month'],$_POST['year']));
    //echo $_POST['title'];
    //print_r( htmlspecialchars(isset($_COOKIE['text-cookie'])));
    //echo htmlspecialchars($_COOKIE["text-cookie"]);
    $age_check = bcAGGT_check_age($_POST['day'],$_POST['month'],$_POST['year']);
    if ($age_check['age']>18){
        return 2;  
    }else{
        return 1;
    }

}




add_action( 'init', 'my_setcookie_example' );
function my_setcookie_example() {
    
    // als sessie true is, maak cookie
    $old_enough = wpshout_save_post_if_submitted();
    
    
    if (!isset($_COOKIE['requiredage'])){
        setcookie( 'requiredage', $old_enough, time()+3600*24*100, COOKIEPATH, COOKIE_DOMAIN, false);
    }else{
        echo "dont set";
    }

    
    //echo  . '--'.;
    
    // forward
 
}



function bcAGGT_check_age($d=0,$m=0,$y=0){
    
  $birthDate = $m."/".$d."/".$y;
    
  //explode the date to get month, day and year
  $birthDate = explode("/", $birthDate);
    
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
    
  $res = array('age'=> $age, 
               'date-string' =>$birthDate
              );
    
  return $res;
    
}