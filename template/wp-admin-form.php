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
        <table class="bcAGGT_forms form-table">
			
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
													array('op_name'=>'Classic Dark', 'op_value'=>'classic_dark')
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
					$get_a_message = sprintf( __( 'Are you over %s years old? Confirm this with your birth-date below.', 'betagate' ), $selected_age );
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


<div class="bcAGGT_gate_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcAGGT_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-gate-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
