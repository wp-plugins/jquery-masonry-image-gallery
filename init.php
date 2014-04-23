<?php

/*

Plugin Name:  jQuery Masonry Image Gallery
Plugin URI:   http://willrees.com/2013/02/jquery-masonry-and-native-wordpress-image-galleries/
Description:  Injects jQuery Masonry for native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.
Version:      2.1.5
Author:       Will Rees
Author URI:   http://willrees.com
License:

  Copyright 2014 Will Rees (rees.will@gmail.com)

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
		
		global $select_options, $radio_options;
		
		if ( ! isset( $_REQUEST['settings-updated'] ) )
		
		$_REQUEST['settings-updated'] = false;
		
?>

			<div class="wrap">
				
				<h2>jQuery Masonry Image Gallery Options</h2>
				
					<form method="post" action="options.php">
					
						<?php settings_fields('jmig_options_options'); ?>
						<?php $jmig_options = get_option('jmig_option'); ?>
					
							<table class="form-table">
					
								<p>Check this box <strong>ONLY</strong> if you need to maintain the column count in the WordPress gallery short code. Might be necessary in some themes.</p>
						
									<tr valign="top"><th scope="row"><strong>DO NOT</strong> allow Masonry to layout your gallery columns?</th>
							
										<td><input name="jmig_option[fixed_layout]" type="checkbox" value="1" <?php checked( '1', (isset($jmig_options['fixed_layout'])) ); ?> /></td>
									
									</tr>
						
							</table>
					
								<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
					</form>
					
			</div>
			
	<?php	
		
		}
		
		
		function jmig_options_validate($input) {
			
			global $select_options, $radio_options;
				
				return $input;
		}

}

else {

	// START USING MASONRY 3 OPTIONS INSTEAD OF MASONRY 2. SHOULD BE A LITTLE FASTER AND RESPONSIVE.
	
	if ($wp_version >= '3.9') {
	
		function jmig_css() {
	
			global $post;
			global $wp_styles;
			global $is_IE;
				
				if( has_shortcode( $post->post_content, 'gallery') ) {

					wp_enqueue_style('jmig_stylesheet',
					plugins_url( 'styles/jmig-masonry-v3.css' , __FILE__ ),
					array(),
					'2.1.5'
					);

						$jmig_options = get_option('jmig_option');

							if(!isset($jmig_options['fixed_layout'])) { 	

								$thumbnail_width = get_option( 'thumbnail_size_w' );
								$custom_css = '.gallery-item, .gallery-item img {width: ' . $thumbnail_width . 'px !important;}';
		
									wp_add_inline_style( 'jmig_stylesheet', $custom_css );
							}
								
								if ($is_IE) {
										
									wp_enqueue_style( 'jmig-lte-IE9',
									plugins_url( 'styles/jmig-lte-ie9.css' , __FILE__ ),
									array(),
									'2.1.5'
									);
											
										$wp_styles->add_data( 'jmig-lte-IE9', 'conditional', 'lte IE 9' );
										
								}
					
				}

		}

			add_action( 'wp_enqueue_scripts', 'jmig_css', 99 );

		function jmig_js() {
			
			global $post;
			
				if( has_shortcode( $post->post_content, 'gallery') ) {
					
					wp_register_script('masonryInit',
					plugins_url( 'js/masonry-init-v3.js' , __FILE__ ),
					array('masonry'),
					'2.1.5', 
					true);
		      
						wp_enqueue_script('masonryInit');
						
				}
	  
		}
			
			add_action( 'wp_enqueue_scripts', 'jmig_js');
		
	}
	
	//LEGACY CODE BELOW FOR WORDPRESS VERSIONS 3.8.X TO 3.6.X.
	
	elseif ($wp_version >= '3.6') {
	
		$jmig_options = get_option('jmig_option');

			if(!isset($jmig_options['fixed_layout'])) { 
					
				function jmig_css() {
		
					global $post;
		
						if( has_shortcode( $post->post_content, 'gallery') ) {
	
							wp_enqueue_style('jmig_stylesheet',
							plugins_url( 'styles/jmig-masonry-v2.css' , __FILE__ ),
							array(),
							'1.6'
							);
	    
								$thumbnail_width = get_option( 'thumbnail_size_w' );
								$custom_css = '.gallery-item, .gallery-item img {width: ' . $thumbnail_width . 'px !important;}';
		
									wp_add_inline_style( 'jmig_stylesheet', $custom_css );
					
						}
	
				}
	
					add_action( 'wp_enqueue_scripts', 'jmig_css', 99 );
	
			}
	
				function jmig_js() {
					
					global $post;
					
						if( has_shortcode( $post->post_content, 'gallery') ) {
							
							wp_register_script('masonryInit',
							plugins_url( 'js/masonry-init-v2.js' , __FILE__ ),
							array('jquery-masonry'),
							'1.6', 
							true);
				      
								wp_enqueue_script('masonryInit');
								
						}
			  
				}
			
					add_action( 'wp_enqueue_scripts', 'jmig_js');
		
	}

	//BELOW IS ONLY FOR WORDPRESS 3.5.X ...#oldmanriver
			
	else {
	
		$jmig_options = get_option('jmig_option');
		
			if(!isset($jmig_options['fixed_layout'])) {
			
				function jmig_css() 
				
					{
						wp_enqueue_style('jmig_stylesheet',
						plugins_url( 'styles/jmig-masonry-v2.css' , __FILE__ ),
						array(),
						'1.6'
						);
		        
							$thumbnail_width = get_option( 'thumbnail_size_w' );
							$custom_css = '.gallery-item, .gallery-item img {width: ' . $thumbnail_width . 'px !important;}';
				
								wp_add_inline_style( 'jmig_stylesheet', $custom_css );
							
					}
		
						add_action( 'wp_enqueue_scripts', 'jmig_css', 99 );
			
			}
			
				function masonry_init() {
				
						wp_register_script('masonryInit',
						plugins_url( 'js/masonry-init-v2.js' , __FILE__ ),
						array('jquery-masonry'),
				        '1.6', 
						true);
		        
							wp_enqueue_script('masonryInit');
		     
				}
		  
					add_action('wp_enqueue_scripts', 'masonry_init');
	
	}
  
}

?>