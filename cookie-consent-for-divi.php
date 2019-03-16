<?php
/*
Plugin Name: Divi Cookie Consent
Plugin URI:  https://divipeople.com/product/cookie-consent-for-divi
Description: Divi Cookie Consent is a free WordPress plugin for alerting users about the use of cookies on your website.
Version:     1.0.1
Author:      DiviPeople
Author URI:  https://divipeople.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: divi-cookie-consent
Domain Path: /languages

Divi Cookie Consent is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Cookie Consent is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Cookie Consent. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'DCC_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
define( 'DCC_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

$plugin_name = plugin_basename( __FILE__ );

/**
 * Cookie Consent Scripts
 */
function dcc_scripts() {
	wp_enqueue_style( 'dcc-style', DCC_PLUGIN_URL . 'assets/css/cookieconsent.min.css');
	wp_enqueue_script( 'dcc-script', DCC_PLUGIN_URL . 'assets/js/cookieconsent.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'dcc_scripts' );

/**
 *  Divi Cookie Consent
 */
if ( ! function_exists( 'dcc_customizer_init' ) ) {

  /**
   * Divi Cookie Consent
   *
   * @since 1.0.0
   * @return void
   */
  function dcc_customizer_init() {
		require_once DCC_PLUGIN_PATH . 'inc/class-dcc-customizer.php';
  }

}

add_action( 'after_setup_theme', 'dcc_customizer_init' );

/**
 * DCC Settings Link
 */
if ( ! function_exists( 'dcc_setting_links' ) ) {

  /**
   * DCC Settings Link
   */
  function dcc_setting_links( $links ) {

    $link_text = esc_html__( 'Settings', 'divi-cookie-consent' );

    $args = array( 
      'et_customizer_option_set' => 'theme', 
      'autofocus[panel]' => 'dcc-customizer-panel', 
      'url' => rawurlencode( home_url() ),
    );

    $customizer_url = admin_url( 'customize.php' );
    $setting_url = add_query_arg( $args, $customizer_url );
    $settings_link = sprintf( '<a href="%1$s"> %2$s </a>', $setting_url, $link_text );
    array_push( $links, $settings_link );
    
    return $links;

  }
  
}

add_filter( "plugin_action_links_$plugin_name", "dcc_setting_links");