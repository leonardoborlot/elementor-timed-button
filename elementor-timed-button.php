<?php
/**
 * Plugin Name: Elementor Timed Button
 * Description: Elementor button that shows after x seconds
 * Plugin URI:  https://www.powertic.com.br/
 * Version:     0.1.0
 * Author:      Powertic
 * Author URI:  https://www.powertic.com/br/
 * Text Domain: elementor-timed-button
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Load Hello World
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function elementor_timed_button_load() {
	// Load localization file
	load_plugin_textdomain( 'elementor-timed-button' );

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'elementor_timed_button_fail_load' );
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'elementor_timed_button_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/plugin.php' );
}
add_action( 'plugins_loaded', 'elementor_timed_button_load' );


/////////// PLUGIN UPDATE CHECKER ***********************
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/powerticmkt/elementor-timed-button/',
    __FILE__,
    'elementor-timed-button'
);
$myUpdateChecker->setBranch('master');
/////////// **********************************************
