<?php
/*
Plugin Name: LotekMedia Popup Form
Description: Create and add popup forms for your website.
Author: John Mann
Version: 1.0
Plugin URI: http://github.com/lotekmedia/WordPress/ltm-popup-form/
Author URI: http://johnmann.org
License:

  Copyright 2014 LoTekMedia (john@lotekmedia.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
$ltm_popup_settings = get_option('ltm_popup_settings');

add_action( 'wp_footer', 'ltm_popup_form' );
function ltm_popup_form()
{
    global $ltm_popup_settings;
  
	$display = "dontshow";
	if(is_home() && $ltm_popup_settings['LTM_Popup_On_Homepage'] == 'YES') {	$display = "show";	}
	if(is_single() && $ltm_popup_settings['LTM_Popup_On_Posts'] == 'YES') {	$display = "show";	}
	if(is_page() && $ltm_popup_settings['LTM_Popup_On_Pages'] == 'YES') {	$display = "show";	}
	if(is_archive() && $ltm_popup_settings['LTM_Popup_On_Archives'] == 'YES') {	$display = "show";	}
	if(is_search() && $ltm_popup_settings['LTM_Popup_On_Search'] == 'YES') {	$display = "show";	}
	
	if($display === "show")
	{
		?>
    <style>
        a.show-popup{
        background-color:  <?php echo($ltm_popup_settings['LTM_Popup_Background_Color']); ?>;
        color: <?php echo($ltm_popup_settings['LTM_Popup_Text_Color']); ?>;
        }
        a.show-popup:hover {
            background-color: <?php echo($ltm_popup_settings['LTM_Popup_Background_Hover_Color']); ?>;
        }
    </style>
<a class="show-popup" href='javascript:ltmPopupOpenForm("ltm-popup-box-container","ltm-popup-box-container-body","ltm-popup-box-container-footer");'><?php echo($ltm_popup_settings['LTM_Popup_Caption']) ?></a>
<div style="display: none;" id="ltm-popup-box-container">
  <div id="ltm-popup-box-container-header">
    <div id="ltm-popup-box-title"><?php echo $ltm_popup_settings['LTM_Popup_Title']; ?></div>
    <div id="ltm-popup-box-close"><a href="javascript:ltmPopupHideForm('ltm-popup-box-container','ltm-popup-box-container-footer');">X</a></div>
  </div>
  <div id="ltm-popup-box-container-body">
    <div class="ltm-popup-message"><?php echo $ltm_popup_settings['LTM_Popup_Message']; ?></div>
    <form action="#" name="ltm-popup-form" id="ltm-popup-form">
      <div id="ltm-popup-box-label"> <?php _e('Your Name', 'ltm-popup'); ?> </div>
      <div id="ltm-popup-box-label">
        <input name="ltm-popup-name" class="ltm-popup-textbox" type="text" id="ltm-popup-name" maxlength="100">
      </div>
      <div id="ltm-popup-box-label"> <?php _e('Your Email', 'ltm-popup'); ?> </div>
      <div id="ltm-popup-box-label">
        <input name="ltm-popup-email" class="ltm-popup-textbox" type="text" id="ltm-popup-email" maxlength="120">
      </div>
      <div id="ltm-popup-box-alert"> <span id="ltm-popup-alert-message"></span> </div>
      <div id="ltm-popup-box-label">
        <input type="button" name="button" class="ltm-popup-button" style="background-color: <?php echo($ltm_popup_settings['LTM_Popup_Button_Color']); ?>" value="<?php echo($ltm_popup_settings['LTM_Popup_Button_Text']); ?>" onClick="javascript:ltmPopupSubmit(this.parentNode,'<?php _e(plugins_url('ltm-popup-save.php', __FILE__)); ?>')">
      </div>
    </form>
  </div>
</div>
<div style="display: none;" id="ltm-popup-box-container-footer"></div>
<?php
	}
}

add_action('admin_menu', 'ltm_popup_add_to_menu');
function ltm_popup_add_to_menu() 
{
	add_options_page( 'LTM Popup Form', 'LTM Popup Form', 'manage_options', '__ltm-popup-admin-page__', 'ltm_popup_admin' );
}


add_action('wp_enqueue_scripts', 'ltm_popup_add_javascript_files');
function ltm_popup_add_javascript_files() 
{
		wp_enqueue_style( 'ltm-popup-form', plugins_url('styles/ltm-popup-form.css', __FILE__ ));
		wp_enqueue_script( 'ltm-popup', plugins_url('scripts/ltm-popup.js', __FILE__ ));
		wp_enqueue_script( 'ltm-popup-form', plugins_url('scripts/ltm-popup-form.js', __FILE__ ));
}   

add_action( 'admin_enqueue_scripts', 'ltm_popup_admin_enqueue_scripts' );
//Enqueues scripts for the plugin admin page (color picker and media uploader)
function ltm_popup_admin_enqueue_scripts(){
 if (isset($_GET['page']) && $_GET['page'] == '__ltm-popup-admin-page__') {
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'ltm-popup-form', plugins_url('scripts/ltm-popup-admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
 }
}


add_action( 'admin_init','ltm_popup_register_settings');
//Registers the options and loads the text domain for localization
function ltm_popup_register_settings(){
  register_setting( 'ltm_popup_group', 'ltm_popup_settings');
  ltm_popup_textdomain();
}

function ltm_popup_textdomain() 
{
	  load_plugin_textdomain( 'ltm-popup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

function ltm_popup_admin()
{
	include('ltm-popup-setting.php');
}

?>