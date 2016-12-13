<?php

/**
* Handle all form
*/
class A2ZPM_Ajax {

    /**
     * Autometically loaded when class initiate
     *
     * @since 1.0.0
     */
    public function __construct() {
        add_action( 'wp_ajax_a2zpm-project-create', array( $this, 'save_new_project' ), 10 );
    }

    /**
    * Verify all nonce seecurity
    *
    * @since 1.0.0
    *
    * @return void
    **/
    public function verify_nonce( $action ) {
        if ( ! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], $action ) ) {
            wp_send_json_error( __( 'Error: Nonce verification failed', 'erp' ) );
        }
    }

    /**
    * Save new project
    *
    * @since 1.0.0
    *
    * @return void
    **/
    public function save_new_project() {
        $this->verify_nonce( 'a2zpm_nonce' );

        parse_str( $_POST['form_data'], $postdata );

        $my_post = array(
            'post_title'    => wp_strip_all_tags( $postdata['project_name'] ),
            'post_content'  => wp_strip_all_tags( $postdata['project_desc'] ),
            'post_author'   => get_current_user_id(),
            'post_type'     => wp_strip_all_tags( $postdata['post_type'] )
        );

        wp_insert_post( $my_post );

        wp_send_json_success();
    }
}


