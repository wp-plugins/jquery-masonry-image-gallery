=== jQuery Masonry Image Gallery ===
Contributors: phoenixMagoo
Donate link: 
Tags: gallery, jquery masonry
Requires at least: 3.5
Tested up to: 3.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Applies jQuery Masonry to native WordPress image galleries. Works best on galleries without 1:1 scaled thumbnails.

== Description ==

Applies jQuery Masonry to native WordPress image galleries. jQuery Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.

<strong>Please note:</strong> This plugin will only include 1 line of CSS in your theme. The only CSS injected is the thumbnail width that is taken directly from the Media options page. This will not alter gallery thumbnail styles such as border, padding, etc. This 1 line of CSS helps eliminate image overlap in a responsive theme during window resize.

== Installation ==

1. Upload `jquery-masonry-image-gallery` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it!

== Frequently asked questions ==

= All my thumbnails are the same size so they don't stack. Can I fix this? =

Yes. It's actually really easy. Go to the Dashboard -> Settings -> Media. Make sure "Crop thumbnail to exact dimensions (normally thumbnails are proportional)" is unchecked. You can also change the size of thumbnails as well. [Then install the Regenerate Images plugin](http://wordpress.org/plugins/regenerate-thumbnails/) and run it. Now your gallery images will stack.  

== Screenshots ==

1. Native WordPress Gallery using jQuery Masonry

2. Native WordPress Gallery not using jQuery Masonry

== Changelog ==

1.0 - Big update. Now uses the new has_shortcode function available in WP 3.6 with fallback for older version of WP. Also uses thumbnail size for better resizing during window resize. Only injects  1 line of CSS for thumbnail size.  

0.4 - Minor code update

0.3 - Galleries center when images realign on window size change.

0.2 - Fixed bug, added screenshots, plugin header, revised documentation.

0.1 - First Release

== Upgrade Notice ==

1.0 - Big update. Now uses the new has_shortcode function available in WP 3.6 with fallback for older version of WP. Also uses thumbnail size for better resizing during window resize. Only injects  1 line of CSS for thumbnail size.  

0.4 - Minor code update

0.3 - Galleries center when images realign on window size change.

0.2 - Bug Fix. Update Now.

0.1 - First Release