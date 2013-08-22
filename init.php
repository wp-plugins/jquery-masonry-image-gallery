<?php

/*

Plugin Name:  jQuery Masonry Image Gallery
Plugin URI:   http://willrees.com/2013/02/jquery-masonry-and-native-wordpress-image-galleries/
Description:  Injects jQuery Masonry for native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.
Version:      1.6
Author:       Will Rees
Author URI:   http://willrees.com
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

if (is_admin()) {

	function cleanup_on_deactivate() {
		delete_option('jmig_option');
	}

	register_deactivation_hook(__FILE__, 'cleanup_on_deactivate');

	add_action('admin_init', 'jmig_options_init' );
	add_action('admin_menu', 'jmig_options_add_page');
	
		// Init plugin options to white list our options
		function jmig_options_init(){
			register_setting( 'jmig_options_options', 'jmig_option', 'jmig_options_validate' );
		}
		
		// Add menu page
		function jmig_options_add_page() {
			add_options_page('jQuery Masonry Image Gallery Options', 'JMIG Options', 'manage_options', 'jmig_options', 'jmig_options_do_page');
		}
		
		// Draw the menu page itself
		function jmig_options_do_page() {
			?>
			<div class="wrap">
				<h2>jQuery Masonry Image Gallery Options</h2>
				<form method="post" action="options.php">
					<?php settings_fields('jmig_options_options'); ?>
					<?php $jmig_options = get_option('jmig_option'); ?>
					<table class="form-table">
					
						<p>Check this box <strong>ONLY</strong> if you need to maintain the column count in the WordPress gallery short code. Masonry works best without this setting enabled to allow it to ignore the amount of columns specified in the gallery settings. If you have a responsive design, leave this box unchecked to avoid gallery thumbnail overlap during window resize.</p>
						<tr valign="top"><th scope="row"><strong>DO NOT</strong> allow Masonry to layout your gallery columns?</th>
							<td><input name="jmig_option[fixed_layout]" type="checkbox" value="1" <?php checked('1', $jmig_options['fixed_layout']); ?> /></td>
						</tr>
						
					</table>
					<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
					</p>
				</form>
			</div>
			<?php	
		}
		
		// Sanitize and validate input. Accepts an array, return a sanitized array.
		function jmig_options_validate($input) {
			// Our first value is either 0 or 1
			$input['fixed_layout'] = ( $input['fixed_layout'] == 1 ? 1 : 0 );
			
			return $input;
		}
	
	}

else {

	$jmig_options = get_option('jmig_option');
	
		if ($wp_version >= '3.6') {

			if($jmig_options['fixed_layout'] != '1') { 
				
				function jmig_css() {
	
					global $post;
	
						if( has_shortcode( $post->post_content, 'gallery') ) {

							wp_enqueue_style('jmig_stylesheet',
							plugins_url( 'jmig.css' , __FILE__ )
							);
        
								$thumbnail_width = get_option( 'thumbnail_size_w' );
								$custom_css = '.gallery-item {width: ' . $thumbnail_width . 'px !important}';
		
									wp_add_inline_style( 'jmig_stylesheet', $custom_css );
					
						}

				}

					add_action( 'wp_enqueue_scripts', 'jmig_css' );

			}

	function jmig_js() {
		
		global $post;
		
			if( has_shortcode( $post->post_content, 'gallery') ) {
				
				wp_register_script('masonryInit',
				plugins_url( 'masonry-init.js' , __FILE__ ),
				array('jquery', 'jquery-masonry'),
				'0.4', 
				true);
	      
					wp_enqueue_script('masonryInit');
					
			}
  
	}

		add_action( 'wp_enqueue_scripts', 'jmig_js');
		
}
		
else {
	
	if($jmig_options['fixed_layout'] != '1') {
	
		function jmig_css() 
		
			{
				wp_enqueue_style('jmig_stylesheet',
				plugins_url( 'jmig.css' , __FILE__ )
				);
        
					$thumbnail_width = get_option( 'thumbnail_size_w' );
					$custom_css = '.gallery-item {width: ' . $thumbnail_width . 'px !important}';
		
						wp_add_inline_style( 'jmig_stylesheet', $custom_css );
					
			}

	add_action( 'wp_enqueue_scripts', 'jmig_css' );
	
	}
	
		function masonry_init() {
		
				wp_register_script('masonryInit',
				plugins_url( 'masonry-init.js' , __FILE__ ),
				array('jquery', 'jquery-masonry'),
		        '0.4', 
				true);
        
					wp_enqueue_script('masonryInit');
     
		}
  
  add_action('wp_enqueue_scripts', 'masonry_init');}
  
}

?>