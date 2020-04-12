<div class="wrap">
		
    <h1>Age Gate</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcAGGT_agegatesettings' ); ?>
        <?php do_settings_sections( 'bcAGGT_agegatesettings' ); ?>
        <table class="bcAGGT_forms form-table">
			
	            <tr valign="top">
                <th scope="row">
                    <?php _e("Activate Age Gate", 'betagate'); ?>
                </th>
                 <td>
					 

                    <?php 
                    $check_vars = array( 'name'=>'gate_active',
                                         'val'=>'1',
                                         'selected'=>get_option('bcAGGT_gate_active')
                                       );

                    bcAGGT_check_input($check_vars,"Activate the Age Gate."); ?>
		
			
                </td>
            </tr> 
            </tr> 
    		    <tr valign="top">
                <th scope="row">
                    <?php _e("Type of age gate", 'betagate'); ?>
                </th>
                 <td>
                <?php 
				$select_vars = array( 'name'=>'gate_gtype',
									 'options'=>array(
													array('op_name'=>'Yes/No form', 'op_value'=>'1'),
													array('op_name'=>'Birth date form', 'op_value'=>'0'),
													),
									 'selected'=>get_option('bcAGGT_gate_gtype')
								   );

				bcAGGT_select_box($select_vars); ?>
                </td>
            </tr>    
            <tr valign="top">
                <th scope="row">
                    <?php _e("Minimum age", 'betagate'); ?>
                </th>
                 <td>
			<?php 
				for ($i = 5; $i <= 110; $i++) {
					$age_array[$i]['op_name'] = $i.__(" Years", 'betagate');
					$age_array[$i]['op_value'] = $i;
				}
					
				if (get_option('bcAGGT_gate_age')==0){
					$selected_age = 18;
				}else{
					$selected_age = get_option('bcAGGT_gate_age');
				}			 
				$select_vars = array( 'name'=>'gate_age',
									 'options'=> $age_array,
									 'selected'=>$selected_age
								   );

				bcAGGT_select_box($select_vars); ?>
					<p><?php _e("This is the minimum age that the user has to have to be able to view the content on your website.",'betagate'); ?></p>
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Cookie notification", 'betagate'); ?>
                </th>
                 <td>
					 

                    <?php 
                    $check_vars = array( 'name'=>'gate_cookienotice',
                                         'val'=>'1',
                                         'selected'=>get_option('bcAGGT_gate_cookienotice')
                                       );

                    bcAGGT_check_input($check_vars,"If you want people to agree with placing cookies on beforehand."); ?>
		
			
                </td>
            </tr> 
            </tr> 
    		    <tr valign="top">
                <th scope="row">
                    <?php _e("Cookie Time", 'betagate'); ?>
                </th>
                 <td>
                <?php 
				$select_vars = array( 'name'=>'gate_cookietime',
									 'options'=>array(
													array('op_name'=>'1 day', 'op_value'=>'24'),
													array('op_name'=>'3 days', 'op_value'=>'72'),
                                                    array('op_name'=>'1 week', 'op_value'=>'168'),
                                                    array('op_name'=>'2 weeks', 'op_value'=>'336'),
                                                    array('op_name'=>'1 month', 'op_value'=>'744'),
                                                    array('op_name'=>'3 months', 'op_value'=>'2232'),
                                                    array('op_name'=>'1 year', 'op_value'=>'8928')
													),
									 'selected'=>get_option('bcAGGT_gate_cookietime')
								   );

				bcAGGT_select_box($select_vars); ?>
                </td>
            </tr> 
        
		</table>
		<br />
		<h2><?php _e('Styling','betagate'); ?></h2>
		<table class="bcAGGT_forms form-table">
              <tr valign="top">
                <th scope="row">
                    <?php _e("Select theme", 'betagate'); ?>
                </th>
                <td>
				<?php 
				$select_vars = array( 'name'=>'gate_theme',
									 'options'=>array(
													array('op_name'=>'Classic Light', 'op_value'=>'0'),
													array('op_name'=>'Classic Dark', 'op_value'=>'classic_dark'),
                                                    array('op_name'=>'Black and White', 'op_value'=>'rum')
													),
									 'selected'=>get_option('bcAGGT_gate_theme')
								   );

				bcAGGT_select_box($select_vars); ?>
					<p><?php _e("Select the theme you'd like to display on the frontpage.",'betagate'); ?></p>
                </td>
            </tr> 
             <tr valign="top">
                <th scope="row">
                    <?php _e("Logo", 'betagate'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'gate_logo',
									 'selected'=>get_option('bcAGGT_gate_logo')
								   );

				bcAGGT_imageselect_field($input_vars); ?>
                </td>
            </tr>  
             <tr valign="top">
                <th scope="row">
                    <?php _e("The message people see", 'betagate'); ?>
                </th>
                 <td>
					 <p><?php _e('Write a message for the people that visit your site when gate mode is enabled. You can use HTML in this field but no javascript. If you like to return to the original message, just empty this field and save.','betagate'); ?></p><br />
				<?php 
					 
				if (get_option('bcAGGT_gate_message')==""){
					$get_a_message = sprintf( __( 'Are you over 18 years old? Confirm this with your birth-date below.', 'betagate' ), $selected_age );
				}else{
					$get_a_message = get_option('bcAGGT_gate_message');
				}
					 
				$textarea_vars = array( 'name'=>'gate_message',
									 'selected'=>$get_a_message
								   );

				bcAGGT_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
            <tr valign="top">
                <th scope="row">
                    <?php _e("The footer message", 'betagate'); ?>
                </th>
                 <td>
					 <p><?php _e('Add some disclaimer or quirky footer line','betagate'); ?></p><br />
				<?php 
					 
				if (get_option('bcAGGT_gate_message_footer')==""){
					$get_a_message = sprintf( __( 'Add a disclaimer here.', 'betagate' ), $selected_age );
				}else{
					$get_a_message = get_option('bcAGGT_gate_message_footer');
				}
					 
				$textarea_vars = array( 'name'=>'gate_message_footer',
									 'selected'=>$get_a_message
								   );

				bcAGGT_textarea_field($textarea_vars); ?>
				 </td>
            </tr>
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Background image", 'betagate'); ?>
                </th>
                 <td>
				<?php 
				$input_vars = array( 'name'=>'gate_background_image',
									 'selected'=>get_option('bcAGGT_gate_background_image')
								   );
					 
							bcAGGT_imageselect_field($input_vars); ?>
                </td>
            </tr> 
             <tr valign="top">
                <th scope="row">
                    <?php _e("Some custom CSS", 'betagate'); ?>
                </th>
                 <td>
					 <p><?php _e('If you like to change some things on the homepage, use this CSS box to do so. You will not lose changes when this plugin is updated.','betagate'); ?></p><br />
				<?php 
				if(get_option('bcAGGT_gate_css')==''){
                    $custom_css_content = "";
                }else{
                    $custom_css_content = get_option('bcAGGT_gate_css');   
                }
					 
				$textarea_vars = array( 'name'=>'gate_css',
									 'selected'=>$custom_css_content 
								   );

				bcAGGT_textarea_field($textarea_vars); ?>
				 </td>
            </tr>  
		</table>	
		<br />
		<h2><?php _e('Whitelisted pages','betagate'); ?></h2>
        <p><?php _e('Unhide some of the pages like the cookies page or the privacy policy page.','betagate'); ?></p>
        <?php
        
        $args = array(
                'post_type' => 'page'
        );	
        $query = new WP_Query( $args );
        $count = 0;
        $select_vars_list[$count]['op_name'] = __('None','betagate');
        $select_vars_list[$count]['op_value'] = 0;
        $count++;
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {

            $query->the_post();
            // now $query->post is WP_Post Object, use:
            // $query->post->ID, $query->post->post_title, etc.
            $select_vars_list[$count]['op_name'] = $query->post->post_title;
            $select_vars_list[$count]['op_value'] = $query->post->ID;
            $count++;
            }
        }
        ?>
		<table class="bcSOFF_forms form-table">
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Disclaimer", 'betagate'); ?>
                </th>
                 <td>
				<?php 
                $select_vars = array( 'name'=>'page_disclaimer',
                                     'options'=> $select_vars_list,
									 'selected'=>get_option('bcAGGT_page_disclaimer')
								   );
				bcAGGT_select_box($select_vars); ?>
                </td>
            </tr> 
    		    <tr valign="top">
                <th scope="row">
                    <?php _e("Privacy Policy", 'betagate'); ?>
                </th>
                 <td>
				<?php 
                $select_vars = array( 'name'=>'page_privacy',
                                     'options'=> $select_vars_list,
									 'selected'=>get_option('bcAGGT_page_privacy')
								   );
				bcAGGT_select_box($select_vars); ?>                     
                </td>
            </tr> 
            <tr valign="top">
                <th scope="row">
                    <?php _e("Cookie policy", 'betagate'); ?>
                </th>
                 <td>

				<?php 
                $select_vars = array( 'name'=>'page_cookie',
                                     'options'=> $select_vars_list,
									 'selected'=>get_option('bcAGGT_page_cookie')
								   );
				bcAGGT_select_box($select_vars); ?>
                </td>

            </tr> 
        </table>
		<br />
		<h2><?php _e('Support Beta','betagate'); ?></h2>
		<table class="bcSOFF_forms form-table">
		    <tr valign="top">
                <th scope="row">
                    <?php _e("Show this plugin some love", 'betagate'); ?>
                </th>
                 <td>
					<a href="https://wordpress.org/plugins/super-simple-age-gate-beta/" target="_blank"><?php _e('Write a review and rate this plugin.','betagate'); ?></a>
                </td>
            </tr> 
        </table>
        <?php submit_button(); ?>
        </form>
			
</div>
<?php 

/* ------------------------ */
/* THE FOOTER.              */
$u = wp_get_current_user();

?>
<div class="bcALG_footer">

    <div class="bcALG_mailinglist">
        <form action="https://oneweekendwebsite.us20.list-manage.com/subscribe/post?u=72e22e9c5e66e05351f6c92af&amp;id=87b9e508b0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <h2>Get an email when new plugins or important updates arrive <span>and run an efficient Wordpress site!</span></h2>
            <p>Just subscribe to the Beta mailinglist and be informed. Don't worry, I don't like spam either but if you'd like some usefull nuggets of information in your inbox, I'd reccommend you join the list. I'm not biased at all. I know. Right?</p><br />
            <ul class="bcALG_mailingform">
                <li>
                    
			
					<input type="text" value="<?php echo ucfirst($u->data->user_nicename); ?>" name="FNAME" class="" id="mce-FNAME" required>
					<label for="mce-FNAME">First Name</label>
                </li>
                <li>
                    
                    
					
					<input type="text" value="<?php echo $u->data->user_email; ?>" name="EMAIL" class="required email" id="mce-EMAIL" required/>
					<label for="mce-EMAIL">Email Address</label>
                </li>
                <li>
					<input type="submit" value="Join!" name="subscribe" id="mc-embedded-subscribe" />
                </li>
				

    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_72e22e9c5e66e05351f6c92af_87b9e508b0" tabindex="-1" value=""></div>


            </ul>
        </form>
    </div>


	<div class="bcALG_logobar">
    <a href="https://betacore.tech"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
    <p class="bcALG_url"><span>By:</span> <a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
	</div>
</div>
