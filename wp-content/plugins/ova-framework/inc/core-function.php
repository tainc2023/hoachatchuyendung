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

function ova_limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}