=== jQuery Masonry Image Gallery ===
Contributors: phoenixMagoo
Donate link: 
Tags: gallery, jquery masonry, masonry
Requires at least: 3.5
Tested up to: 3.9
Stable tag: 2.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Applies Masonry to native WordPress image galleries. Works best on galleries without 1:1 scaled thumbnails.

== Description ==

Applies Masonry to native WordPress image galleries. Masonry is included in WordPress, use it for image galleries. Works best on galleries <strong>without</strong> 1:1 scaled thumbnails.

<strong>Please note:</strong> This plugin will include 1 line of CSS in your theme. The only CSS injected is the thumbnail width that is taken directly from the Media options page. This will not alter gallery thumbnail styles such as border, padding, etc. This 1 line of CSS helps eliminate image overlap in a responsive theme during window resize. You can turn this off in the options page if necessary. 

This plugin also includes 1 CSS file that is for animation purposes only (Chrome, Firefox, Safari and IE 10+). The entire gallery will fade in using a CSS3 animation once all the images have loaded. This include will not alter gallery thumbnail styles such as border, padding, etc. IE 8 and IE 9 will work, but will not fade in.

== Installation ==

1. Upload `jquery-masonry-image-gallery` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. If you are using a fixed layout and/or want Masonry to respect the column count in the gallery shortcode, then go to Settings -> Jmig options and make sure the box is checked and save.
4. That's it!

== Frequently asked questions ==

= The specified amount of columns in the gallery short code is not working. What's wrong?  =

If you are using a fixed layout and/or want Masonry to respect the column count in the gallery shortcode, then go to Settings -> Jmig options and make sure the box is checked and click save.

= All my thumbnails are the same size so they don't stack. Can I fix this? =

Yes. It's actually really easy. Go to the Dashboard -> Settings -> Media. Make sure "Crop thumbnail to exact dimensions (normally thumbnails are proportional)" is unchecked. You can also change the size of thumbnails as well. [Then install the Regenerate Images plugin](http://wordpress.org/plugins/regenerate-thumbnails/) and run it. Now your gallery images will stack.  

== Screenshots ==

1. Native WordPress Gallery using jQuery Masonry

2. Native WordPress Gallery not using jQuery Masonry

== Changelog ==
2.1.2 - Better performance on WordPress 3.9+ using the vanilla js option included in Masonry 3. Galleries now fade-in after all images have loaded in modern browsers and IE 10+. Backwards compatibility included for IE 8 and IE 9 (loads, but no fade). This is the last release that will support WordPress 3.5 . The next release will still support WordPress 3.6 .

1.6 - Added options page to let users decide to either respect WordPress columns or let Masonry layout gallery

1.3 - Typo

1.2 - Better version detection

1.1 - Better backwards compatiblity with WordPress 3.5

1.0 - Big update. Now uses the new has_shortcode function available in WP 3.6 with fallback for older version of WP. Also uses thumbnail size for better resizing during window resize. Only injects  1 line of CSS for thumbnail size.  

0.4 - Minor code update

0.3 - Galleries center when images realign on window size change.

0.2 - Fixed bug, added screenshots, plugin header, revised documentation.

0.1 - First Release

== Upgrade Notice ==
2.1.2 - Better performance on WordPress 3.9+ using the vanilla js option included in Masonry 3. Galleries now fade-in after all images have loaded in modern browsers and IE 10+. Backwards compatibility included for IE 8 and IE 9 (loads, but no fade). This is the last release that will support WordPress 3.5 . The next release will still support WordPress 3.6 .

1.6 - Added options page to let users decide to either respect WordPress columns or let Masonry layout gallery

1.3 - Typo

1.2 - Better version detection

1.1 - Better backwards compatiblity with WordPress 3.5

1.0 - Big update. Now uses the new has_shortcode function available in WP 3.6 with fallback for older version of WP. Also uses thumbnail size for better resizing during window resize. Only injects  1 line of CSS for thumbnail size.  

0.4 - Minor code update

0.3 - Galleries center when images realign on window size change.

0.2 - Bug Fix. Update Now.

0.1 - First Release