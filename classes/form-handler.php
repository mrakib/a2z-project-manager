<?php

/**
* Handle all form
*/
class A2ZPM_Form_Handler {

    /**
     * Autometically loaded when class initiate
     *
     * @since 1.0.0
     */
    public function __construct() {

        add_action( 'admin_init', array( $this, 'handle_project_create' ), 10 );
    }

    /**
    * handle project create
    *
    * @since 1.0.0
    *
    * @return void
    **/
    public function handle_project_create() {

        if ( isset( $_POST['a2zpm_project_create'] ) && wp_verify_nonce( $_POST['a2zpm-project-create-nonce'], 'a2zpm-project-create-action' ) ) {
            var_dump( $_POST ); die();
        }
    }
}


















