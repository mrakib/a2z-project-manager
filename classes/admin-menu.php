<?php
/**
* Menu handling for Admin
*
* @since 1.0.0
*/
class A2ZPM_Admin_Menu {

    /**
     * Autometically loaded when class initiate
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ), 80 );
    }

    /**
    * Register all menu
    *
    * @since 0.0.1
    *
    * @return void
    **/
    public function admin_menu() {
        $position = apply_filters( 'a2zpm_menu_position', 27 );

        add_menu_page( __( 'Project Management', A2ZPM_TEXTDOMAIN ), __( 'Projects', A2ZPM_TEXTDOMAIN ), 'manage_options', 'a2zpm-project', array( $this, 'a2zpm_project' ), 'dashicons-clipboard', $position );

        add_submenu_page( 'a2zpm-project', __( 'Settings', A2ZPM_TEXTDOMAIN ), __( 'Settings', A2ZPM_TEXTDOMAIN ), 'manage_options', 'a2zpm-settings', array( $this, 'settings_page' ) );
        // add_submenu_page( 'erp-company', __( 'Tools', WPDL_LISTING_TEXTDOMAIN ), __( 'Tools', WPDL_LISTING_TEXTDOMAIN ), 'manage_options', 'erp-tools', array( $this, 'tools_page' ) );

        do_action( 'a2zpm_load_menu', $position );
    }

    /**
     * Load Project main file
     *
     * @since 1.0.0
     *
     * @return void
     **/
    function a2zpm_project() {
        $section = isset( $_GET['section'] ) ? $_GET['section'] : '';

        switch ( $section ) {
            case 'new-project':
                include A2ZPM_VIEWS . '/projects/new-projects.php';
                break;

            case 'project-details':
                $project_id = isset( $_GET['project_id'] ) ? $_GET['project_id'] : 0;

                if ( ! $project_id ) {
                    return;
                }

                include A2ZPM_VIEWS . '/projects/projects-details.php';
                break;

            default:
                include A2ZPM_VIEWS . '/projects/projects.php';
                break;
        }
    }

    /**
     * Settings page
     *
     * @since 1.0.0
     *
     * @return void
     **/
    function settings_page() {
        echo 'Loaded settings options';
    }
}