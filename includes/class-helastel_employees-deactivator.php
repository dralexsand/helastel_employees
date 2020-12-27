<?php

/**
 * Fired during plugin deactivation
 *
 * @link       helastel.employees.com
 * @since      1.0.0
 *
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 * @author     dralexsand <dr.alex.sand.111@gmail.com>
 */
class Helastel_employees_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        require_once HELASTEL_DIR . 'includes/class-helastel_employees-dbtables.php';
        $tablesInstance = new Helastel_employees_Dbtables();
        $tablesInstance->DropTables();
	}

}
