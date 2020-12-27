<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       helastel.employees.com
 * @since      1.0.0
 *
 * @package    Helastel_employees
 * @subpackage Helastel_employees/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Helastel_employees
 * @subpackage Helastel_employees/public
 * @author     dralexsand <dr.alex.sand.111@gmail.com>
 */
class Helastel_employees_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Helastel_employees_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Helastel_employees_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_style("bootstrap.min.css", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
        wp_enqueue_style("jquery.dataTables.min.css", plugin_dir_url(__FILE__) . 'css/jquery.dataTables.min.css', array(), $this->version, 'all');
        wp_enqueue_style("fontawesome.css", plugin_dir_url(__FILE__) . 'css/fontawesome/css/all.css', array(), $this->version, 'all');

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/helastel_employees-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Helastel_employees_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Helastel_employees_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/bootstrap.min.js', array('jquery'), $this->version, true);

        wp_enqueue_script("jquery.dataTables.min.js", plugin_dir_url(__FILE__) . 'js/jquery.dataTables.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("dataTables.buttons.min.js", plugin_dir_url(__FILE__) . 'js/datatables/dataTables.buttons.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("buttons.flash.min.js", plugin_dir_url(__FILE__) . 'js/datatables/buttons.flash.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("jszip.min.js", plugin_dir_url(__FILE__) . 'js/datatables/jszip.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("pdfmake.min.js", plugin_dir_url(__FILE__) . 'js/datatables/pdfmake.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("jvfs_fonts.js", plugin_dir_url(__FILE__) . 'js/datatables/vfs_fonts.js', array('jquery'), $this->version, true);
        wp_enqueue_script("buttons.html5.min.js", plugin_dir_url(__FILE__) . 'js/datatables/buttons.html5.min.js', array('jquery'), $this->version, true);
        wp_enqueue_script("buttons.print.min.js", plugin_dir_url(__FILE__) . 'js/datatables/buttons.print.min.js', array('jquery'), $this->version, true);

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/helastel_employees-public.js', array( 'jquery' ), $this->version, true );
		wp_enqueue_script( 'main.js', plugin_dir_url( __FILE__ ) . 'js/main.js', array( 'jquery' ), $this->version, true );

	}

}
