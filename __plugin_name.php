<?php
/*
Plugin Name: Cookie Consent
Plugin URI:  https://divipeople.com
Description: Cookie Notice Display Divi Module for WordPress
Version:     1.0.0
Author:      Divi People
Author URI:  https://divipeople.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dvppl-divi-cookie-consent
Domain Path: /languages

Cookie Consent is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Cookie Consent is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Cookie Consent. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'dvppl_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function dvppl_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/DiviCookieConsent.php';
}
add_action( 'divi_extensions_init', 'dvppl_initialize_extension' );
endif;
