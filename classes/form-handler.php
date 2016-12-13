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

            $my_post = array(
                'post_title'    => wp_strip_all_tags( $_POST['project_name'] ),
                'post_content'  => $_POST['project_desc'],
                'post_author'   => get_current_user_id()
            );
             
            // Insert the post into the database
            wp_insert_post( $my_post );
            var_dump( 'inserted' ); die();
        }
    }
}


















