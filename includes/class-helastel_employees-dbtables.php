<?php

/**
 * @link       helastel.employees.com
 * @since      1.0.0
 *
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 */

/**
 *
 * @since      1.0.0
 * @package    Helastel_employees
 * @subpackage Helastel_employees/includes
 * @author     dralexsand <dr.alex.sand.111@gmail.com>
 */
class Helastel_employees_Dbtables
{

    private $wpdb;
    private $dbname;
    private $prefix;
    private $prefix_plugin;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;

        $this->dbname = $wpdb->dbname;
        $this->prefix = $wpdb->prefix;
        $this->prefix_plugin = $this->prefix . HELASTEL_PREFIX;
    }

    public function getPrefixPlugin()
    {
        return $this->prefix_plugin;
    }

    public function DropTables()
    {

        $tables = $this->listTables();

        foreach ($tables as $table_name) {
            $new_table_name = $this->prefix_plugin . $table_name;
            $sql = "DROP TABLES IF EXISTS " . $new_table_name;
            $this->wpdb->query($sql);
        }
    }

    public function CreateTables()
    {
        $sql = $this->loadSql();
        dbDelta($sql);
        $this->changePrefixPluginsTables();
    }

    private function changePrefixPluginTable($table_name)
    {
        $new_table_name = $this->prefix_plugin . $table_name;

        $sql = "ALTER TABLE " . $table_name
            . " RENAME TO  " . $new_table_name . ";";

        $this->wpdb->query($sql);
    }

    private function changePrefixPluginsTables()
    {
        foreach ($this->listTables() as $table_name) {
            if ($this->IsTableExist($table_name)) {
                $this->changePrefixPluginTable($table_name);
            }
        }
    }

    private function IsTableExist($table_name)
    {
        $sql = "
            SELECT 1
            FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = '"
            . $this->dbname
            . "' AND TABLE_NAME = '" . $table_name . "'";

        return empty($this->wpdb->query($sql)) ? 0 : 1;
    }

    private function loadSql()
    {
        $path_sql = HELASTEL_DIR . 'sql/helastel_test_db.sql';
        return file_get_contents($path_sql);
    }

    private function listTables()
    {
        return [
            'employee',
            'department'
        ];
    }

}
