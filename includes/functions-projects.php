<?php

/**
 * Get all projects
 *
 * @since 1.0.0
 *
 * @return void
 **/
function a2zpm_get_projects( $args = [] ) {

    $defaults = array(
        'post_type'      => 'project',
        'post_status'    => 'any',
        'order'          => 'DESC',
        'orderby'        => 'date',
        'posts_per_page' => 10,
    );

    $args = wp_parse_args( $args, $defaults );

    $query = new WP_Query( apply_filters( 'a2zpm_get_projects', $args ) );

    if ( $query->posts ) {
        return $query->posts;
    }

    return false;
}