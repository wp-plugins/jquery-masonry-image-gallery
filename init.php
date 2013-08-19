<?php

/*

Plugin Name:  jQuery Masonry Image Gallery
Plugin URI:   http://willre.es/2013/02/jquery-masonry-and-native-wordpress-image-galleries/
Description:  Injects jQuery Masonry for native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.
Version:      1.0
Author:       Will Rees
Author URI:   http://willre.es
License:

  Copyright 2013 Will Rees (rees.will@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/

/* Add required Styles using wp_enqueue_style */

function jmig_css() 
	
	{
	
		global $post;
	
		if ( function_exists('has_shortcode') AND has_shortcode( $post->post_content, 'gallery') )
		
			{

				wp_enqueue_style('jmig_stylesheet',
				plugins_url( 'jmig.css' , __FILE__ )
				);
        
					$thumbnail_width = get_option( 'thumbnail_size_w' );
					$custom_css = '.gallery-item {width: ' . $thumbnail_width . 'px !important}';
		
					wp_add_inline_style( 'jmig_stylesheet', $custom_css );
					
			}

	}

		add_action( 'wp_enqueue_scripts', 'jmig_css' );

/* Add required jQuery using wp_enqueue_script */

function jmig_js()

	{
		global $post;
		
		if ( function_exists('has_shortcode') AND has_shortcode( $post->post_content, 'gallery') )
		
			{
				// register your script location, dependencies and version
				wp_register_script('masonryInit',
				plugins_url( 'masonry-init.js' , __FILE__ ),
				array('jquery', 'jquery-masonry'),
				'0.4', 
				true);
	      
	       
				// enqueue the script
				wp_enqueue_script('masonryInit');
			}
  
	}

		add_action( 'wp_enqueue_scripts', 'jmig_js');

?>