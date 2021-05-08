<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/btimby/twister/
 * @since             0.9.0
 * @package           Twister
 *
 * @wordpress-plugin
 * Plugin Name:       Twister
 * Plugin URI:        https://github.com/btimby/twister/
 * Description:       Twitter with an s in the middle for speech.
 * Version:           0.9.0
 * Author:            Ben Timby <btimby@gmail.com>
 * Author URI:        https://github.com/btimby/twister/
 * License:           MIT
 * License URI:       https://github.com/btimby/twister/blob/main/LICENSE
 * Text Domain:       twister
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-twister-activator.php
 */
function activate_twister() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-twister-activator.php';
	Twister_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-twister-deactivator.php
 */
function deactivate_twister() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-twister-deactivator.php';
	Twister_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_twister' );
register_deactivation_hook( __FILE__, 'deactivate_twister' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-twister.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_twister() {

	$plugin = new Twister();
	$plugin->run();

}
run_twister();
