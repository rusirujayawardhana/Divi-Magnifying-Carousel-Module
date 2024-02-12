<?php
/*
Plugin Name: Carousel with magnific popup
Plugin URI:  www.sample-extension.com
Description: Carousel with magnific popup
Version:     1.0.0
Author:      rusiru jay
Author URI:  https://devrusiru.github.io/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: saex-sample-extension
Domain Path: /languages

Sample Extension is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Sample Extension is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Sample Extension. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'saex_initialize_extension' ) ):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
function saex_initialize_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/SampleExtension.php';
}
add_action( 'divi_extensions_init', 'saex_initialize_extension' );
endif;
