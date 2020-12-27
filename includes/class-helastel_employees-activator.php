<?php

/**
 * Fired during plugin activation
 *
 * @link       helastel.employees.com
 * @since      1.0.0
 *
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 * @author     dralexsand <dr.alex.sand.111@gmail.com>
 */
class Helastel_employees_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        global $wpdb;

        require_once HELASTEL_DIR . 'includes/class-helastel_employees-dbtables.php';
        $tablesInstance = new Helastel_employees_Dbtables();
        $tablesInstance->CreateTables();

	}

}
