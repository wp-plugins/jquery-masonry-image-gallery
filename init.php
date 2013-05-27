<?php

/*

Plugin Name:  jQuery Masonry Image Gallery
Plugin URI:   http://willre.es/2013/02/jquery-masonry-and-native-wordpress-image-galleries/
Description:  Injects jQuery Masonry for native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.
Version:      0.2
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

if (!is_admin()) { 

	//Inject Theme Dependent jQuery plugins
	function masonry_init() {
	   // register your script location, dependencies and version
		  wp_register_script('masonryInit',
	      plugins_url() . '/jquery-masonry-image-gallery/masonry-init.js',
	      array('jquery', 'jquery-masonry'),
	      '1.0', 
	      true);
	      
	       
	   // enqueue the script
	   wp_enqueue_script('masonryInit');
	   
	}
	
	add_action('wp_enqueue_scripts', 'masonry_init');
}

?>