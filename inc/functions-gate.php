<?php

/* ---------------------------------------- */
/* creating age gate form functionality     */

function bcAGGT_age_gate(){

	global $bcAGGT_age_check_int;
	global $bcAGGT_error_message;
	global $bcAGGT_minimum_age;
    global $bcAGGT_cookie_time;
	
	// check if the age-gate already ran, if not. go for the prompt.
	if (get_option('bcAGGT_gate_active')==1){
		if ($bcAGGT_age_check_int==0){
			if (bcAGGT_bot()==false){
                $bcAGGT_page_id = get_queried_object_id();

                if(get_option('bcAGGT_page_cookie')==$bcAGGT_page_id AND $bcAGGT_page_id!=0 ){
                }elseif(get_option('bcAGGT_page_privacy')==$bcAGGT_page_id AND $bcAGGT_page_id!=0 ){
                }elseif(get_option('bcAGGT_page_disclaimer')==$bcAGGT_page_id AND $bcAGGT_page_id!=0 ){
                }else{  
				    include plugin_dir_path( __DIR__ ).'template/wp-gate-page.php';
                }

			}
		}
	}
	
}
add_action('wp_footer', 'bcAGGT_age_gate');




/* ---------------------------------------- */
/* creating age gate check functionality    */

function bcAGGT_gate_check() {
	
	global $bcAGGT_age_check_int;
	global $bcAGGT_error_message;
	global $bcAGGT_minimum_age;
    global $bcAGGT_cookie_time;
	// hier output post OF de cookie
	
    if (isset($_COOKIE['bcAGGTrequiredage'])==1){
        $bcAGGT_age_check_int = 1;	
    }else{
		$bcAGGT_age_check_int = 0;		
	}
    
	if(get_option('bcAGGT_gate_cookietime')!=''){
        $bcAGGT_cookie_time = time()+3600*get_option('bcAGGT_gate_cookietime');
    }else{
        $bcAGGT_cookie_time = time()+3600*24*30; // 1 month standard
    }

	if(get_option('bcAGGT_gate_age')==0){
		$bcAGGT_minimum_age = 18;
	}else{
		$bcAGGT_minimum_age = get_option('bcAGGT_gate_age');	
	}
	if (get_option('bcAGGT_gate_cookienotice')==1){
		$bcAGGT_cookie_notice = substr(isset($_POST['bcAGGT_cookies']),0,1);
	}else{
		$bcAGGT_cookie_notice = 1;
	}
	
	$bcAGGT_error_message = "";
	$bcAGGT_cookies = "";
 
    // Stop running function if form wasn't submitted
    if ( !isset($_POST['bcAGGT_day']) ) {
        return;
    }
    if ( !isset($_POST['bcAGGT_month']) ) {
        return;
    }
    if ( !isset($_POST['bcAGGT_year']) ) {
        return;
    }

    // Check that the nonce was set and valid
    if( !wp_verify_nonce($_POST['_wpnonce'], 'wps-frontend-post') ) {
       $bcAGGT_error_message = __("Did not save because your form seemed to be invalid. Sorry",'betagate');
       return;
    }

    
    $age_check = bcAGGT_check_age(substr($_POST['bcAGGT_day'],0,2),substr($_POST['bcAGGT_month'],0,2),substr($_POST['bcAGGT_year'],0,4));

	if ($age_check['age']>110){
		$age_check['age'] = 0;
	}
	
	if (isset($_POST['bcAGGT_day'])){
		
		if ($bcAGGT_cookie_notice==0){
			$bcAGGT_error_message = __("If you want to view the content on this website, please agree with the cookie policy.",'betagate');
		
		}else{		
			if ($age_check['age']>$bcAGGT_minimum_age){
				setcookie( 'bcAGGTrequiredage', '1', $bcAGGT_cookie_time, '/', COOKIE_DOMAIN, false);
				$bcAGGT_age_check_int = 1;


			}else{
				setcookie( 'bcAGGTrequiredage', '0', $bcAGGT_cookie_time, '/', COOKIE_DOMAIN, false);
				$bcAGGT_age_check_int = 0;
				$bcAGGT_error_message = __("Oops! It looks like you aren't old enough to visit this website. Sorry.",'betagate');
			}
		}
	}
    
    
 
}
add_action( 'init', 'bcAGGT_gate_check' );


/* ---------------------------------------- */
/* Fetch image information by ID            */

function bcAGGT_get_image($img_ID){
	
	
	$imgid = (isset( $img_ID )) ? $img_ID : "";
	$img   = wp_get_attachment_image_src($imgid, 'full');
	
	return $img[0];
	
}

/* ---------------------------------------- */
/* Return an age by date                    */

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

/* ---------------------------------------- */
/* Quick check if we are on a login page    */

function bcAGGT_is_login_page() {
	
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
	
}

/* ---------------------------------------- */
/* Google bot detection                     */
function bcAGGT_bot() {
	/*$crawlers = array(
	'Google' => 'Google',
	'MSN' => 'msnbot',
		  'Rambler' => 'Rambler',
		  'Yahoo' => 'Yahoo',
		  'AbachoBOT' => 'AbachoBOT',
		  'accoona' => 'Accoona',
		  'AcoiRobot' => 'AcoiRobot',
		  'ASPSeek' => 'ASPSeek',
		  'CrocCrawler' => 'CrocCrawler',
		  'Dumbot' => 'Dumbot',
		  'FAST-WebCrawler' => 'FAST-WebCrawler',
		  'GeonaBot' => 'GeonaBot',
		  'Gigabot' => 'Gigabot',
		  'Lycos spider' => 'Lycos',
		  'MSRBOT' => 'MSRBOT',
		  'Altavista robot' => 'Scooter',
		  'AltaVista robot' => 'Altavista',
		  'ID-Search Bot' => 'IDBot',
		  'eStyle Bot' => 'eStyle',
		  'Scrubby robot' => 'Scrubby',
		  'Facebook' => 'facebookexternalhit',
	  );
	  // to get crawlers string used in function uncomment it
	  // it is better to save it in string than use implode every time
	  // global $crawlers
	   $crawlers_agents = implode('|',$crawlers);
	  if (strpos($crawlers_agents, $USER_AGENT) === false)*/
		  return false;
	 /* else {
		return true;
	  }*/
}
