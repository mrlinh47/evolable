=== Plugin Name ===
Contributors: harman79
Tags: shortlink, shortlink button, file url, column, wp list table, reveal shortlink, get shortlink, media url, admin
Requires at least: 3.8
Tested up to: 4.7
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a shortlink column in post/page, taxonomy and media manage screens. Also retrieves inner post shortlink button as for WP earlier than 4.4.

== Description ==

If you like working with shortlinks, then this plugin is for you! 

- Creates an extra column displaying shortlinks in the main post, page, categories and media list screens; for the media list screen it also adds the file URL info.
- Adds an optional button next to each shortlink. When this button is clicked the shortlink is automatically copied to the clipboard.
- Adds an inner post/page shortlink button, just as it was for WordPress versions earlier then 4.4.
- Works for built in and custom post types and taxonomies. 
- Provides settings page to customise basic appearance/functionality features.

Unless you have Javascript disabled, the auto-copy function is supported by all major browsers, apart from Safari, which does not support the execCommand copy function of Javascript.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/shortlink-column` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Shortlink Column screen to configure the plugin

== Frequently Asked Questions ==

= How do I report a bug? =

Post in the official wordpress shortlink column plugin page.

== Screenshots ==

1. Shortlink column in the posts list page 
2. Shortlink/File URL column in the media list page 
3. Shortlink column in the category list page
4. Inner post/page shortlink button 
5. Plugin settings page 

== Changelog ==

= 1.5 =
* Tested for WP 4.6; fixed a bug that was outputting wrong shortlings for built-in cat and tags; modified css of elements; improved bits of the code to remove usage of get_current_screen where unnecessary.

= 1.4.1 =
* Renamed plugin; fixed minor bug to prevent PHP notice after post quick edit; reformatted code

= 1.4 =
* Added file URL info for media list edit screen

= 1.3 =
* Simplified the inner post button shortlink function

= 1.2 =
* Added button to retrieve shortlink at inner edit post/page, as displayed in WordPress versions earlier than 4.4.
* Added extra options to show/hide the shortlink text in the columns and show/hide the inner post/page shortlink button

= 1.1 =
* Fixed Warning "Creating default object from empty value" in taxonomy edit screen. This was a minor thing showing up before screen refresh when a new taxonomy was created.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.5 =
* Tested OK for WordPress 4.7