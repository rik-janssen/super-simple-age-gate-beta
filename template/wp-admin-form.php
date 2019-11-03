<div class="wrap">
		
    <h1>Age Gate</h1>

    <form method="post" action="options.php">
        <?php settings_fields( 'bcAGGT_offlinesettings' ); ?>
        <?php do_settings_sections( 'bcAGGT_offlinesettings' ); ?>
        <table class="bcAGGT_forms form-table">
            <tr valign="top">
                <th scope="row">
                    <?php _e("Enable Site Offline", 'betaoffline'); ?>
                </th>
                 <td>
		<?php 
		$check_vars = array( 'name'=>'site_offline',
						 	 'val'=>'1',
							 'selected'=>get_option('bcAGGT_site_offline')
						   );
		
		bcAGGT_check_input($check_vars, 'By checking this box your website will display an offline message for the outside world and Google bots while you can still view your website when logged in as admin or editor.'); ?>
                     <?php if(get_option('bcAGGT_site_offline')==1){ ?>
					 <p><strong><a href="<?php echo get_home_url(); ?>/?preview_offline=true" target="_blank"><?php _e('Preview the landingpage in offline mode','betaoffline'); ?></a></strong></p>
					 <?php } ?>
                </td>
            </tr> 
		</table>
	
        <?php submit_button(); ?>
        </form>
			
</div>


<div class="bcAGGT_offline_footer">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="bcAGGT_donate"><input name="cmd" type="hidden" value="_s-xclick"><input name="hosted_button_id" type="hidden" value="MBLCTW6UE6L5E"><input title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" name="submit" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" type="image"><img src="https://www.paypal.com/en_NL/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></form>
	<a href="https://beta-media.com/super-simple-site-offline-wordpress-plugin/"><img src="<?php echo plugin_dir_url( __DIR__ ); ?>img/betalogo-b.png" /></a>
	<h2>Check out my other plugins at</h2>
	<p><a href="https://www.betacore.tech" target="_blank">www.betacore.tech</a></p>
</div>
