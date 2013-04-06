<?php
/*
Plugin Name: LotekMedia Custom Login Plugin
Plugin URI: http://github.com/lotekmedia/wp/ltm_custom_login
Description: This is just testing the plugin concept and publishing. This is my first attempt
Version: 0.0.1A
Author: John Mann
Author URI: http://lotekmedia.com
Author Email: john@lotekmedia.com
License:

  Copyright 2013 LoTekMedia (john@lotekmedia.com)

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

function ltm_custom_login_url(){
  global $ltm_login_settings;
  return $ltm_login_settings['login_url'];
} 
function ltm_custom_header_title(){
  global $ltm_login_settings;
  echo '<style type="text/css">                                                                   
        .login h1 a {
         background-image:url('.$ltm_login_settings["login_image"] . ') !important; 
         background-size: 100%;
         height: 150px;
         width: 310px;
         margin-left: 8px;
        }
        body.login{
          background-color: '.$ltm_login_settings["login_background_color"].' !important;
        }
        .login #nav, .login #backtoblog {';
    if (isset( $ltm_login_settings['login_link_shadow'] ) ) {
      echo 'text-shadow: #fff 0 1px 0
          }';
        }
    else { 
      echo  'text-shadow:none};';
        }
  echo '</style>';
}

function ltm_add_admin(){
  add_options_page( 'LTM Custom Login', 'LTM Login', 'administrator', '__ltm_login_admin_page__', 'ltm_custom_login_appearance');
}

function ltm_register_settings(){
  register_setting( 'ltm_custom_login_group', 'ltm_login_settings');
  ltm_plugin_textdomain();
}

function ltm_admin_enqueue_scripts(){
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  wp_enqueue_style('thickbox');
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'ltm-script-handle', plugins_url('scripts/ltm_custom_login.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


function ltm_custom_login_appearance(){
  include('ltm_login_admin_page.php');
}

add_action( 'admin_enqueue_scripts', 'ltm_admin_enqueue_scripts' );
add_action( 'login_head','ltm_custom_header_title');
add_action( 'admin_init','ltm_register_settings');
add_action( 'admin_menu', 'ltm_add_admin');

add_filter( 'login_headerurl', 'ltm_custom_login_url' );

function ltm_plugin_textdomain() {
  load_plugin_textdomain( 'ltm_customlogin', false, '/ltm_customlogin/languages/' );
}
?>