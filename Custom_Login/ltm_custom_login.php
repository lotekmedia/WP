<?php
/*
Plugin Name: LotekMedia Login TEST Plugin
Plugin URI: http://github.com/lotekmedia/test-plugin
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
function ltm_custom_login_url(){
	return 'http://lotekmedia.com';
}	
function ltm_custom_header_title(){
	echo '<style type="text/css">                                                                   
        .login h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/headers/wheel.jpg) !important; 
     </style>';
}
add_filter( 'login_headerurl', 'ltm_custom_login_url' );
add_action( 'login_head','ltm_custom_header_title');