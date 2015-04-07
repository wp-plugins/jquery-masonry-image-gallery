<?php

defined('ABSPATH') or die("No script kiddies please!");

$jmig_options = get_option('jmig_option');

if (!isset($jmig_options['no_added_css'])) {

    function jmig_html5_gallery()
    {

        add_theme_support('html5', array('gallery', 'caption'));

    }

    add_action('after_setup_theme', 'jmig_html5_gallery');

}

function jmig_css()
{

    global $wp_styles;

    $jmig_options = get_option('jmig_option');

    if (!isset($jmig_options['no_added_css'])) {

        wp_enqueue_style('jmig_stylesheet_layout',
            plugins_url('/styles/jmig-masonry-layout.css', dirname(__FILE__)),
            array(),
            '3.0'
        );
    }

    wp_enqueue_style('jmig_stylesheet',
        plugins_url('styles/jmig-masonry-v3-animation.css', dirname(__FILE__)),
        array(),
        '3.0'
    );

    if (!isset($jmig_options['no_caption_css'])) {

    wp_enqueue_style('jmig_captions',
        plugins_url('styles/jmig-maosnry-v3-captions.css', dirname(__FILE__)),
        array(),
        '3.0'
    );

    }

    if (!isset($jmig_options['fixed_layout'])) {

        $thumbnail_width = get_option('thumbnail_size_w');
        $custom_css_width = '.gallery-item, .gallery-item img, gallery-item a { width: ' . $thumbnail_width . 'px !important; max-width: ' . $thumbnail_width . 'px !important; min-width: ' . $thumbnail_width . 'px !important; }';

        wp_add_inline_style('jmig_stylesheet', $custom_css_width);

    }

    if (!isset($jmig_options['no_added_css'])) {

        if ($jmig_options['item_margin'] == NULL) {

            $custom_css_margin = '.gallery-item {margin: 1px !important}';

        } else {

            $custom_css_margin = '.gallery-item {margin: ' . $jmig_options['item_margin'] . 'px !important}';

        }

        wp_add_inline_style('jmig_stylesheet', $custom_css_margin);
    }


    wp_enqueue_style('jmig-lte-IE9',
        plugins_url('styles/jmig-lte-ie9.css', dirname(__FILE__)),
        array(),
        '3.0'
    );

    $wp_styles->add_data('jmig-lte-IE9', 'conditional', 'lte IE 9');

}

add_action('wp_enqueue_scripts', 'jmig_css', 99);

function jmig_js()
{

    $jmig_options = get_option('jmig_option');


    if (!isset($jmig_options['fixed_layout'])) {

        wp_register_script('strip_gallery_class',
            plugins_url('js/remove-gallery-class.js', dirname(__FILE__)),
            array('jquery'),
            '3.0',
            true);

        wp_enqueue_script('strip_gallery_class');

    }

    if (isset($jmig_options['use_lazy'])) {

        if (!isset($jmig_options['no_lazy_file'])) {

            wp_register_script('lazy_load',
                plugins_url('js/jquery.lazyload.min.js', dirname(__FILE__)),
                array('jquery'),
                '1.9.5',
                true);

            wp_enqueue_script('lazy_load');
        }

        wp_register_script('masonryInit',
            plugins_url('js/masonry-init-v3-lazy.js', dirname(__FILE__)),
            array('jquery-masonry'),
            '3.0',
            true);

        wp_enqueue_script('masonryInit');

    } else {

        wp_register_script('masonryInit',
            plugins_url('js/masonry-init-v3.js', dirname(__FILE__)),
            array('masonry'),
            '3.0',
            true);

        wp_enqueue_script('masonryInit');

    }

}

add_action('wp_enqueue_scripts', 'jmig_js');
?>