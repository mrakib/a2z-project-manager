<?php

/**
 * Get all js template
 *
 * @since  1.0.0
 *
 * @param  string $file_path [description]
 * @param  string $id        [description]
 *
 * @return void
 */
function a2zpm_get_js_template( $file_path, $id ) {
    if ( file_exists( $file_path ) ) {
        echo '<script type="text/html" id="tmpl-' . $id . '">' . "\n";
        include_once $file_path;
        echo "\n" . '</script>' . "\n";
    }
}
