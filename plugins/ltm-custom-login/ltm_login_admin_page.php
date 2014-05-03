  <?php global $ltm_login_settings;?> 
  <div class="wrap">  
    <h2>LTM Custom Login Settings</h2>
    <form name="ltm_custom_login_form" method="post" action="options.php">  
      <?php settings_fields('ltm_custom_login_group'); ?>
        <h4>LoTekMedia Custom Login</h4>  
        <p>
          <?php _e('Custom Login URL','ltm_customlogin') ?>: <input type="text" size="80" name="ltm_login_settings[login_url]" value="<?php if ( isset( $ltm_login_settings['login_url'] ) ) echo $ltm_login_settings['login_url']; ?>" />
        </p>
        <p>
          <?php _e('Custom Login Image','ltm_customlogin'); ?>: <input id="upload_image" type="text" size="80" name="ltm_login_settings[login_image]" value="<?php if ( isset( $ltm_login_settings['login_image'] ) ) echo $ltm_login_settings['login_image']; ?>" />
          <input id="upload_image_button" type="button" value="Upload Image" />
        </p>  
        <p>
        <p>
          <?php _e('Custom Login Background','ltm_customlogin'); ?>: <input name="ltm_login_settings[login_background_color]" id="login_background_color" type="text" value="<?php if ( isset( $ltm_login_settings['login_background_color'] ) ) echo $ltm_login_settings['login_background_color']; ?>" />
        </p>
        <p>
          <?php _e('Custom Login Link Color','ltm_customlogin'); ?>: <input name="ltm_login_settings[login_link_color]" id="login_link_color" type="text" value="<?php if ( isset( $ltm_login_settings['login_link_color'] ) ) echo $ltm_login_settings['login_link_color']; ?>" />
        </p>
        <p>
          <?php _e('Custom Login Link Hover Color','ltm_customlogin'); ?>: <input name="ltm_login_settings[login_link_hover_color]" id="login_link_hover_color" type="text" value="<?php if ( isset( $ltm_login_settings['login_link_hover_color'] ) ) echo $ltm_login_settings['login_link_hover_color']; ?>" />
        </p>
        <p>
          <?php _e('Use link shadow on login page?','ltm_customlogin'); ?>: 
          <input name="ltm_login_settings[login_link_shadow]" id="login_link_shadow" type="checkbox" <?php if ( isset( $ltm_login_settings['login_link_shadow'] ) ) echo 'checked=checked' ?>/>
        </p>
        <hr />  
        <p class="submit">  
        <input type="submit" class="button-primary" name="Submit" value="<?php echo _e('Save Settings','ltm_customlogin'); ?>" />  
        </p>  
    </form>  
</div>
