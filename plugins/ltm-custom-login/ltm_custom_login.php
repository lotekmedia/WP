<?php
/*
Plugin Name: LotekMedia Custom Login
Plugin URI: https://github.com/lotekmedia/WP/tree/master/Custom_Login
Description: This is a plugin to customize your login page
Version: 1.3.0
Author: John Mann
Author URI: http://lotekmedia.com
Author Email: john@lotekmedia.com
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
$ltm_login_settings = get_option('ltm_login_settings');

//Returns the login url from the settings
function ltm_custom_login_url(){
  global $ltm_login_settings;
  return $ltm_login_settings['login_url'];
}

//Sets the header image on the page and adds custom CSS based on settings 
function ltm_custom_header_title(){
  global $ltm_login_settings;
  echo '<style type="text/css">                                                                   
        .login h1 a {
         background-image:url('.$ltm_login_settings["login_image"] . ') !important; 
         background-size: 100%;
         height: 150px;
         width: 310px;
        }
        body.login{
          background-color: '.$ltm_login_settings["login_background_color"].' !important;
        }
        .login #nav a, .login #backtoblog a{';
        if (isset( $ltm_login_settings['login_link_shadow'] ) ) {
            echo 'text-shadow: #fff 0 1px 0';
        }
        else { 
            echo  'text-shadow:none;';
        }
        if (isset( $ltm_login_settings['login_link_color'] ) ) {
            echo 'color: '.$ltm_login_settings["login_link_color"].' !important;';
        };
        echo '}
        .login #nav a:hover, .login #backtoblog a:hover{';
        if (isset( $ltm_login_settings['login_link_hover_color'] ) ) {
            echo 'color: '.$ltm_login_settings["login_link_hover_color"].' !important;';
        };
        echo '}';

  echo '</style>';
}

//Adds the admin settings page
function ltm_add_admin(){
  add_options_page( 'LTM Custom Login', 'LTM Login', 'administrator', '__ltm_login_admin_page__', 'ltm_custom_login_appearance');
}

//Registers the options and loads the text domain for localization
function ltm_register_settings(){
  register_setting( 'ltm_custom_login_group', 'ltm_login_settings');
  ltm_plugin_textdomain();
}

//Enqueues scripts for the plugin admin page (color picker and media uploader)
function ltm_admin_enqueue_scripts(){
 if (isset($_GET['page']) && $_GET['page'] == '__ltm_login_admin_page__') {
  wp_enqueue_media();
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_style('thickbox');
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'ltm-script-handle', plugins_url('scripts/ltm_custom_login.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
 }
}

//Loads the admin page
function ltm_custom_login_appearance(){
  include('ltm_login_admin_page.php');
}

//adds all needed actions and filters
add_action( 'admin_enqueue_scripts', 'ltm_admin_enqueue_scripts' );
add_action( 'login_head','ltm_custom_header_title');
add_action( 'admin_init','ltm_register_settings');
add_action( 'admin_menu', 'ltm_add_admin');
add_filter( 'login_headerurl', 'ltm_custom_login_url' );

//Loads the localized text
function ltm_plugin_textdomain() {
  load_plugin_textdomain( 'ltm_customlogin', false, '/ltm_customlogin/languages/' );
}
