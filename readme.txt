=== jQuery Masonry Image Gallery ===
Contributors: phoenixMagoo
Donate link: http://bit.ly/1jzZKCu
Tags: gallery, jquery masonry, masonry
Requires at least: 3.5
Tested up to: 3.9.1
Stable tag: 2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a Masonry layout to all galleries that are using the WordPress [gallery] shortcode.

== Description ==

[See Demo](http://willrees.com/jquery-masonry-wordpress-gallery-plugin-demo/?utm_source=wordpressorg&utm_medium=link&utm_campaign=jmig "See Demo")

Adds a Masonry layout to all galleries that are using the WordPress [gallery] shortcode. Looks best on galleries that are not using 1:1 ratio thumbnails.

<strong>Please note:</strong> By default this plugin includes CSS that will overwrite the existing gallery layout. However, you can turn off some or all of the jMIG layout CSS on the options page under Settings.

This plugin also includes 1 CSS file that is for animation purposes only (Chrome, Firefox, Safari and IE 10+). The entire gallery will fade in using a CSS3 animation once all the images have loaded. IE 8 and IE 9 will work, but will not fade in.

== Installation ==

1. Upload `jquery-masonry-image-gallery` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Jmig options if you need to change settings
4. That's it!

== Frequently asked questions ==

= All of my galleries looked different before I upgraded this plugin to 2.2. Can I change it back? =
Yes. Go to Dashboard -> Settings -> JMIG Options. Check the box DO NOT allow jMIG to add any CSS that modifies your gallery or gallery items, then save.

= The specified amount of columns in the gallery short code is not working. What's wrong?  =

If you are using a fixed layout and/or want Masonry to respect the column count in the gallery shortcode, then go to Settings -> Jmig options and make sure the box is checked and click save.

= All my thumbnails are the same size so they don't stack. Can I fix this? =

Yes. It's actually really easy. Go to the Dashboard -> Settings -> Media. Make sure "Crop thumbnail to exact dimensions (normally thumbnails are proportional)" is unchecked. You can also change the size of thumbnails as well. I like to set my thumbnail width between 150px and 250px, then set the height to 9999px. [Then install the Regenerate Images plugin](http://wordpress.org/plugins/regenerate-thumbnails/) and run it. Now your gallery images will stack.

== Screenshots ==

1. Native WordPress Gallery using jQuery Masonry

2. Native WordPress Gallery not using jQuery Masonry

== Changelog ==
2.2 - Adds in new layout CSS with the option to turn it off for backwards compatibility

2.1.6 - Fixed a minor issue with server side caching and IE 9 and below

2.1.5 - Better support for WordPress 3.9 (Vanilla JS now supports multiple galleries on a page or post)

2.1.4 - Better support for pages and posts with multiple galleries.

2.1.3 - Better performance on WordPress 3.9+ using the vanilla js option included in Masonry 3. Galleries now fade-in after all images have loaded in modern browsers and IE 10+. Backwards compatibility included for IE 8 and IE 9 (loads, but no fade). This is the last release that will support WordPress 3.5 . The next release will still support WordPress 3.6 .

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
2.2 - Adds in new layout CSS with the option to turn it off for backwards compatibility

2.1.6 - Fixed a minor issue with server side caching and IE 9 and below

2.1.5 - Better support for WordPress 3.9 (Vanilla JS now supports multiple galleries on a page or post)

2.1.4 - Better support for pages and posts with multiple galleries.

2.1.3 - Better performance on WordPress 3.9+ using the vanilla js option included in Masonry 3. Galleries now fade-in after all images have loaded in modern browsers and IE 10+. Backwards compatibility included for IE 8 and IE 9 (loads, but no fade). This is the last release that will support WordPress 3.5 . The next release will still support WordPress 3.6 .

1.6 - Added options page to let users decide to either respect WordPress columns or let Masonry layout gallery

1.3 - Typo

1.2 - Better version detection

1.1 - Better backwards compatiblity with WordPress 3.5

1.0 - Big update. Now uses the new has_shortcode function available in WP 3.6 with fallback for older version of WP. Also uses thumbnail size for better resizing during window resize. Only injects  1 line of CSS for thumbnail size.

0.4 - Minor code update

0.3 - Galleries center when images realign on window size change.

0.2 - Bug Fix. Update Now.

0.1 - First Release
