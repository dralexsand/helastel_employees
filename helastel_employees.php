<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              helastel.employees.com
 * @since             1.0.0
 * @package           Helastel_employees
 *
 * @wordpress-plugin
 * Plugin Name:       helastel_employees
 * Plugin URI:        helastel.employees.com
 * Description:       This is plugin for helastel test
 * Version:           1.0.0
 * Author:            dralexsand
 * Author URI:        helastel.employees.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       helastel_employees
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'HELASTEL_DIR' ) ) {
    define('HELASTEL_DIR', plugin_dir_path(__FILE__));
}

if ( ! defined( 'HELASTEL_URL' ) ) {
    define('HELASTEL_URL', plugins_url()."/hotelsplugin");
}

if ( ! defined( 'HELASTEL_PREFIX' ) ) {
    define('HELASTEL_PREFIX', 'hs_');
}

if ( ! defined( 'UPLOADFILES_DIR' ) ) {
    define('UPLOADFILES_DIR', ABSPATH."wp-content/uploads");
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HELASTEL_EMPLOYEES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-helastel_employees-activator.php
 */
function activate_helastel_employees() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-helastel_employees-activator.php';
	Helastel_employees_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-helastel_employees-deactivator.php
 */
function deactivate_helastel_employees() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-helastel_employees-deactivator.php';
	Helastel_employees_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_helastel_employees' );
register_deactivation_hook( __FILE__, 'deactivate_helastel_employees' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-helastel_employees.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_helastel_employees() {

	$plugin = new Helastel_employees();
	$plugin->run();

}
run_helastel_employees();
