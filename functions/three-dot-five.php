<?php

defined('ABSPATH') or die("No script kiddies please!");

$jmig_options = get_option('jmig_option');

if (!isset($jmig_options['fixed_layout'])) {

    function jmig_css()
    {

        wp_enqueue_style('jmig_stylesheet',
            plugins_url('styles/jmig-masonry-v2.css', dirname(__FILE__)),
            array(),
            '1.6'
        );

        $thumbnail_width = get_option('thumbnail_size_w');
        $custom_css = '.gallery-item, .gallery-item img {width: ' . $thumbnail_width . 'px !important;}';

        wp_add_inline_style('jmig_stylesheet', $custom_css);

    }

    add_action('wp_enqueue_scripts', 'jmig_css', 99);

}

function masonry_init()
{

    wp_register_script('masonryInit',
        plugins_url('js/masonry-init-v2.js', dirname(__FILE__)),
        array('jquery-masonry'),
        '1.6',
        true);

    wp_enqueue_script('masonryInit');

}

add_action('wp_enqueue_scripts', 'masonry_init');

?>