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
class Helastel_employees_Data
{

    private $wpdb;
    private $dbname;
    private $prefix;
    private $prefix_plugin;

    private $employee_table;
    private $department_table;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;

        $this->dbname = $wpdb->dbname;
        $this->prefix = $wpdb->prefix;
        $this->prefix_plugin = $this->prefix . HELASTEL_PREFIX;

        $this->employee_table = $this->prefix_plugin . 'employee';
        $this->department_table = $this->prefix_plugin . 'department';
    }

    /**
     * @return array|object|null
     */
    public function getTest_1_Data()
    {
        $sql = "
                SELECT 
                    e.*
                FROM
                    " . $this->employee_table . " e,
                    " . $this->employee_table . " b
                WHERE
                    e.boss_id = b.id AND e.salary > b.salary;
              ";

        return $this->wpdb->get_results($sql);
    }

    /**
     * @return array|object|null
     */
    public function getTest_2_Data()
    {
        $sql = "
        SELECT 
            e.*
        FROM
            " . $this->employee_table . " e
        WHERE
            e.salary IN (SELECT 
                    MAX(salary)
                FROM
                    " . $this->employee_table . " z
                WHERE
                    z.department = e.department);
        ";

        return $this->wpdb->get_results($sql);
    }

    /**
     * @return array|object|null
     */
    public function getTest_3_Data()
    {
        $sql = "
        SELECT 
            e.*
        FROM
            " . $this->employee_table . " e
        WHERE
            e.salary IN (SELECT 
                    MAX(salary)
                FROM
                    " . $this->employee_table . " z
                WHERE
                    z.department = e.department)
                AND e.id NOT IN (SELECT DISTINCT
                    (boss_id) AS boss_id
                FROM
                    " . $this->employee_table . "
                WHERE
                    boss_id IS NOT NULL
                GROUP BY boss_id);
        ";

        return $this->wpdb->get_results($sql);
    }


    /**
     * @param int $quantity
     * @return array|object|null
     */
    public function getTest_4_Data($quantity = 100)
    {
        $sql = "
        SELECT 
            e.department as department_id, d.name as department
        FROM
            " . $this->employee_table . " e
        INNER JOIN " . $this->department_table . " d ON d.id=e.department
        GROUP BY e.department, d.name
        HAVING COUNT(e.department) <= ".$quantity;

        return $this->wpdb->get_results($sql);
    }

    /**
     * @return array|object|null
     */
    public function getTest_5_Data()
    {
        $sql = "
        WITH max_salary AS
          (SELECT 
            department, SUM(salary) salary
        FROM
            " . $this->employee_table . "
        GROUP BY department)
        SELECT 
            *
        FROM
            max_salary s
        WHERE
            s.salary = (SELECT 
                    MAX(salary)
                FROM
                    max_salary);
        ";

        return $this->wpdb->get_results($sql);
    }

}
