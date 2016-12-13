<?php
/*
Plugin Name: A2Z Project Manager
Plugin URI: http://web-apps.ninja/
Description: A complete project management tool for WordPress.
Version: 1.0.0
Author: A.r Promy
Author URI: http://web-apps.ninja/
License: GPL2
*/

/**
 * Copyright (c) YEAR A.R. Promy (email: promyaaa@gmail.com). All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Autoload class files in classes folder
 *
 * Loaded all class under classes folder loaded autometically
 *
 * @since 1.0.0
 *
 * @param string  $class requested class name
 */
function a2zpm_autoload( $class ) {
    if ( stripos( $class, 'A2ZPM_' ) !== false ) {
        $class_name = str_replace( array( 'A2ZPM_', '_' ), array( '', '-' ), $class );
        $file_path = __DIR__ . '/classes/' . strtolower( $class_name ) . '.php';

        if ( file_exists( $file_path ) ) {
            require_once $file_path;
        }
    }
}

spl_autoload_register( 'a2zpm_autoload' );

/**
 * A2Z_PM class
 *
 * @class A2Z_PM The class that holds the entire A2Z_PM plugin
 */
class A2Z_PM {

    /**
     * Constructor for the A2Z_PM class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     *
     * @since 1.0.0
     *
     * @uses register_activation_hook()
     * @uses register_deactivation_hook()
     * @uses is_admin()
     * @uses add_action()
     *
     * @return void [don't expect anyting]
     */
    public function __construct() {
        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        // Define all constants
        $this->define_constants();

        // Include required files
        $this->includes();

        // instantiate classes
        $this->instantiate();

        // Initialize the action and filters hooks
        $this->init_actions_filters();

        do_action( 'a2zpm_loaded' );
    }

    /**
     * Initializes the A2Z_PM() class
     *
     * Checks for an existing A2Z_PM() instance
     * and if it doesn't find one, creates it.
     *
     * @return $instance [plugin main instance]
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new A2Z_PM();
        }

        return $instance;
    }

    /**
     * Placeholder for activation function
     *
     * @return 1.0.0
     */
    public function activate() {

    }

    /**
     * Placeholder for deactivation function
     *
     * @return void
     */
    public function deactivate() {

    }

    /**
     * Define all constants
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function define_constants() {
        define( 'A2ZPM_VERSION', '1.0.0' );
        define( 'A2ZPM_TEXTDOMAIN', 'a2zpm' );
        define( 'A2ZPM_FILE', __FILE__ );
        define( 'A2ZPM_PATH', dirname( A2ZPM_FILE ) );
        define( 'A2ZPM_INCLUDES', A2ZPM_PATH . '/includes' );
        define( 'A2ZPM_VIEWS', A2ZPM_PATH . '/views' );
        define( 'A2ZPM_JS_TEMPLATE', A2ZPM_PATH . '/views/js-templates' );
        define( 'A2ZPM_URL', plugins_url( '', A2ZPM_FILE ) );
        define( 'A2ZPM_ASSETS', A2ZPM_URL . '/assets' );
    }

    /**
     * Includes all files
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function includes() {
        if ( is_admin() ) {
            new A2ZPM_Ajax();
            new A2ZPM_Admin_Menu();
            new A2ZPM_Form_Handler();
        }

        // Required all functions file from includes folder
        require_once A2ZPM_INCLUDES. '/functions.php';
        require_once A2ZPM_INCLUDES. '/functions-projects.php';
    }

    /**
     * Instantiate all necessaru classes
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function instantiate() {

    }

    /**
     * Trigger all global actions and filters
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function init_actions_filters() {
        add_action( 'init', array( $this, 'localization_setup' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'admin_footer', array( $this, 'load_js_templates' ) );
    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( A2ZPM_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * Enqueue pluging scripts
     *
     * @since 1.0.0
     *
     * @uses wp_enqueue_script()
     * @uses wp_localize_script()
     * @uses wp_enqueue_style
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'a2zpm-styles', plugins_url( 'assets/css/a2zpm.css', __FILE__ ), false, date( 'Ymd' ) );
        wp_enqueue_style( 'a2zpm-magnific-popup-style', plugins_url( 'assets/css/magnific-popup.css', __FILE__ ), false, date( 'Ymd' ) );

        wp_enqueue_script( 'a2zpm-magnific-popup', plugins_url( 'assets/js/jquery.magnific-popup.js', __FILE__ ), array( 'jquery' ), false, true );
        wp_enqueue_script( 'a2zpm-vue', plugins_url( 'assets/js/vue.js', __FILE__ ), array( 'jquery' ), false, true );
        wp_enqueue_script( 'a2zpm-scripts', plugins_url( 'assets/js/a2zpm.js', __FILE__ ), array( 'jquery', 'a2zpm-vue' ), false, true );

        $localize_script = array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            '_wpnonce' => wp_create_nonce( 'a2zpm_nonce' )
        );

        wp_localize_script( 'a2zpm-scripts', 'a2zpm', $localize_script );
    }

    /**
    * Load all js template
    *
    * @since 1.0.0
    *
    * @return void
    **/
    public function load_js_templates() {
        a2zpm_get_js_template( A2ZPM_JS_TEMPLATE. '/new-project.php', 'a2zpm-new-project' );
    }

} // A2Z_PM

add_action( 'plugins_loaded', 'a2zpm_loaded_plugin', 20 );

function a2zpm_loaded_plugin() {
    $a2zpm = A2Z_PM::init();
}