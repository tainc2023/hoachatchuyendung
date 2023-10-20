<?php
if ( ! defined('ABSPATH') ) {
	exit();
}

function ova_framework_get_template( $name = null, $data = array() ) {
    $plugin_template_dir = OFW_PATH . '/templates/';
    $template_name = (string) $name;

    $template_file = "{$template_name}.php";
    $template_path = $plugin_template_dir . $template_file;

    if ( file_exists( $template_path ) ) {
        ob_start();
        extract($data);
        include $template_path;
        echo ob_get_clean();
    }
    return 'Template not found.';
}

function ova_framework_get_template_part( $name = null, $data = array() ) {
    $plugin_template_dir = OFW_PATH . '/template-parts/';
    $template_name = (string) $name;

    $template_file = "{$template_name}.php";
    $template_path = $plugin_template_dir . $template_file;

    if ( file_exists( $template_path ) ) {
        ob_start();
        extract($data);
        include $template_path;
        echo ob_get_clean();
    }
    return 'Template not found.';
}

/** Add widgets support to current theme **/
add_filter( 'current_theme_supports-widgets', '__return_false' );