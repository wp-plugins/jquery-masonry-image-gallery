<?php

/*

Plugin Name:  jQuery Masonry Image Gallery
Plugin URI:   http://willrees.com/2013/02/jquery-masonry-and-native-wordpress-image-galleries/
Description:  Injects jQuery Masonry for native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.
Version:      2.2
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

				<style>

					#jmig_option_item_margin {width: 2em !important;}

				</style>


				<h2>jQuery Masonry Image Gallery Options</h2>

					<form method="post" action="options.php">

						<?php settings_fields('jmig_options_options'); ?>
						<?php $jmig_options = get_option('jmig_option'); ?>

							<table class="form-table">

								<tr valign="top">

									<th scope="row"><?php _e( 'Gallery Item Margin (in pixels)', 'jmig_plugin' ); ?></th>

										<td>

											<input id="jmig_option_item_margin" class="regular-text" type="text" name="jmig_option[item_margin]" maxlength="2" value="<?php esc_attr_e( $jmig_options['item_margin'] ); ?>" />

											<label class="description" for="jmig_option[item_margin]"><?php _e( 'px. Please DO NOT enter \'px\'. Just enter the number. Leave blank for default 1px margin.', 'jmig_plugin' ); ?></label>

										</td>

								</tr>

							</table>

							<table class="form-table">

								<h3>If you want to remove all CSS injected by jMIG, then click both the following boxes. It will also remove the custom margin from above if one was entered.</h3>

									<tr valign="top">

										<th scope="row"><strong>DO NOT allow jMIG to add any CSS that modifies your gallery or gallery items.</strong></th>

											<td><input name="jmig_option[no_added_css]" type="checkbox" value="1" <?php checked( '1', (isset($jmig_options['no_added_css'])) ); ?> /></td>

									</tr>

									<tr valign="top">

										<th scope="row"><strong>DO NOT</strong> allow jMIG to layout your gallery columns?</th>

											<td><input name="jmig_option[fixed_layout]" type="checkbox" value="1" <?php checked( '1', (isset($jmig_options['fixed_layout'])) ); ?> /></td>

									</tr>

							</table>

								<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>

					</form>

						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">

							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="NB46DBF4VJV5G">
							<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

						</form>

			</div>

	<?php

		}

		function jmig_options_validate($input) {

			if ( ! isset( $jmig_options['fixed_layout'] ) )$jmig_options['fixed_layout'] = null;

				$jmig_options['fixed_layout'] = ( $jmig_options['fixed_layout'] == 1 ? 1 : 0 );

			if ( ! isset( $jmig_options['no_added_css'] ) )$jmig_options['no_added_css'] = null;

				$jmig_options['no_added_css'] = ( $jmig_options['no_added_css'] == 1 ? 1 : 0 );

			$jmig_options['item_margin'] = wp_filter_nohtml_kses( $jmig_options['item_margin'] );

				return $input;
		}

}

else {

	// START USING MASONRY 3 OPTIONS INSTEAD OF MASONRY 2. SHOULD BE A LITTLE FASTER AND RESPONSIVE.

	if ($wp_version >= '3.9') {

		$three_dot_nine = plugin_dir_path( __FILE__ ) . "functions/three-dot-nine.php";

			include_once($three_dot_nine);

	}

	//LEGACY CODE BELOW FOR WORDPRESS VERSIONS 3.8.X TO 3.6.X.

	elseif ($wp_version >= '3.6') {

		$three_dot_six = plugin_dir_path( __FILE__ ) . "functions/three-dot-six.php";

			include_once($three_dot_six);

	}

	//BELOW IS ONLY FOR WORDPRESS 3.5.X ...#oldmanriver

	else {

		$three_dot_five = plugin_dir_path( __FILE__ ) . "functions/three-dot-five.php";

			include_once($three_dot_five);

	}

}

?>
