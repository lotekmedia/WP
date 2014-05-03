<?php global $ltm_popup_settings;?>
<div class="wrap">
    <div class="form-wrap">
        <div id="icon-plugins" class="icon32 icon32-posts-post"><br>
        </div>
        <h2><?php _e('LTM Popup Form', 'ltm-popup'); ?></h2>
        <h3><?php _e('Popup email setting', 'ltm-popup'); ?></h3>
        <form name="ltm-popup-form" method="post" action="options.php">
            <?php settings_fields('ltm_popup_group'); ?>
            <label for="tag-image"><?php _e('Email address', 'ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_On_MyEmail]" type="text" id="ltm-popup-on-my-email" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_On_MyEmail'] ) ) echo $ltm_popup_settings['LTM_Popup_On_MyEmail']; ?>" size="75" />
            <p><?php _e('Please enter admin email address to receive mails.', 'ltm-popup'); ?></p>

            <label for="tag-image"><?php _e('Email subject', 'ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_On_Subject]" type="text" id="ltm-popup-on-subject" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_On_Subject'] ) ) echo $ltm_popup_settings['LTM_Popup_On_Subject']; ?>" size="75" />
            <p><?php _e('Please enter mail subject.', 'ltm-popup'); ?></p>

            <label for="tag-image"><?php _e('Link Text', 'ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Caption]" type="text" id="ltm-popup-caption" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Caption'] ) ) echo $ltm_popup_settings['LTM_Popup_Caption']; ?>" size="75" />
            <p><?php _e('This box is to add the contact us Text, Entered value will display in the front end.', 'ltm-popup'); ?></p>

            <div style="height:5px;"></div>
            <h3><?php _e('Popup widget setting', 'ltm-popup'); ?></h3>

            <label for="tag-title"><?php _e('Popup Background Color','ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Background_Color]" id="ltm-popup-background-color" type="text" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Background_Color'] ) ) echo $ltm_popup_settings['LTM_Popup_Background_Color']; ?>" />

            <label for="tag-title"><?php _e('Popup Background Hover Color','ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Background_Hover_Color]" id="ltm-popup-background-hover-color" type="text" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Background_Hover_Color'] ) ) echo $ltm_popup_settings['LTM_Popup_Background_Hover_Color']; ?>" />

            <label for="tag-title"><?php _e('Popup Text Color','ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Text_Color]" id="ltm-popup-text-color" type="text" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Text_Color'] ) ) echo $ltm_popup_settings['LTM_Popup_Text_Color']; ?>" />

            <label for="tag-title"><?php _e('Popup title', 'ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Title]" type="text" id="ltm-popup-title" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Title'] ) ) echo $ltm_popup_settings['LTM_Popup_Title']; ?>" size="75" />
            <p><?php _e('Please enter popup box title.', 'ltm-popup'); ?></p>

            <label for="tag-message"><?php _e('Popup Message', 'ltm-popup'); ?></label>
            <textarea name="ltm_popup_settings[LTM_Popup_Message]" style="height: 100px;width: 400px;" id="ltm-popup-message"><?php if ( isset( $ltm_popup_settings['LTM_Popup_Message'] ) ) echo $ltm_popup_settings['LTM_Popup_Message']; ?></textarea>
            <p><?php _e('Please enter message for your box.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('Popup Button Text', 'ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Button_Text]" type="text" id="ltm-popup-button-text" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Button_Text'] ) ) echo $ltm_popup_settings['LTM_Popup_Button_Text']; ?>" size="35" />
            <p><?php _e('Please enter text for submit button.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('Popup Button Color','ltm-popup'); ?></label>
            <input name="ltm_popup_settings[LTM_Popup_Button_Color]" id="ltm-popup-button-color" type="text" value="<?php if ( isset( $ltm_popup_settings['LTM_Popup_Button_Color'] ) ) echo $ltm_popup_settings['LTM_Popup_Button_Color']; ?>" />

            <label for="tag-title"><?php _e('On home page display', 'ltm-popup'); ?></label>
            <select name="ltm_popup_settings[LTM_Popup_On_Homepage]" id="ltm-popup-on-homepage">
                <option value="YES" <?php if($ltm_popup_settings['LTM_Popup_On_Homepage'] == 'YES') { echo 'selected' ; } ?>>YES</option>
                <option value="NO" <?php if($ltm_popup_settings['LTM_Popup_On_Homepage'] == 'NO') { echo 'selected' ; } ?>>NO</option>
            </select>
            <p><?php _e('Select YES if you need to display on home page.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('On posts display', 'ltm-popup'); ?></label>
            <select name="ltm_popup_settings[LTM_Popup_On_Posts]" id="ltm-popup-on-posts">
                <option value="YES" <?php if($ltm_popup_settings['LTM_Popup_On_Posts'] == 'YES') { echo 'selected' ; } ?>>YES</option>
                <option value="NO" <?php if($ltm_popup_settings['LTM_Popup_On_Posts'] == 'NO') { echo 'selected' ; } ?>>NO</option>
            </select>
            <p><?php _e('Select YES if you need to display on posts.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('On pages display', 'ltm-popup'); ?></label>
            <select name="ltm_popup_settings[LTM_Popup_On_Pages]" id="ltm-popup-on-pages">
                <option value="YES" <?php if($ltm_popup_settings['LTM_Popup_On_Pages'] == 'YES') { echo 'selected' ; } ?>>YES</option>
                <option value="NO" <?php if($ltm_popup_settings['LTM_Popup_On_Pages'] == 'NO') { echo 'selected' ; } ?>>NO</option>
            </select>
            <p><?php _e('Select YES if you need to display on wordpress pages.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('On search page display', 'ltm-popup'); ?></label>
            <select name="ltm_popup_settings[LTM_Popup_On_Search]" id="ltm-popup-on-search">
                <option value="YES" <?php if($ltm_popup_settings['LTM_Popup_On_Search'] == 'YES') { echo 'selected' ; } ?>>YES</option>
                <option value="NO" <?php if($ltm_popup_settings['LTM_Popup_On_Search'] == 'NO') { echo 'selected' ; } ?>>NO</option>
            </select>
            <p><?php _e('Select YES if you need to display on search pages.', 'ltm-popup'); ?></p>

            <label for="tag-title"><?php _e('On archive page display', 'ltm-popup'); ?></label>
            <select name="ltm_popup_settings[LTM_Popup_On_Archives]" id="ltm-popup-on-archives">
                <option value="YES" <?php if($ltm_popup_settings['LTM_Popup_On_Archives'] == 'YES') { echo 'selected' ; } ?>>YES</option>
                <option value="NO" <?php if($ltm_popup_settings['LTM_Popup_On_Archives'] == 'NO') { echo 'selected' ; } ?>>NO</option>
            </select>
            <p><?php _e('Select YES if you need to display on archive pages.', 'ltm-popup'); ?></p>

            <br />
            <input name="LTM_Popup_Submit" id="ltm-popup-submit" class="button add-new-h2" value="<?php _e('Update All Details', 'ltm-popup'); ?>" type="submit" />
        </form>
    </div>
</div>
