=== Lana Facebook Share ===
Contributors: lanadesign
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TTVAHHGH8ZVDY
Tags: facebook, facebook like, facebook share, facebook button
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 1.0.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Facebook like and share button with speed optimization

== Description ==

Facebook like and share button.

Minimal settings page (button settings, post and page type settings) and iframe based button, due to speed optimization.

= Position settings with add_filter: =

`/** content before default: false */
add_filter( 'lana_fb_share_content_before', '__return_false' );

/** content after default: true */
add_filter( 'lana_fb_share_content_after', '__return_true' );`

= Post type settings with filter: =

`/** content before in post default: false */
add_filter( 'lana_fb_share_content_before_in_post', '__return_false' );

/** content after in post default: true */
add_filter( 'lana_fb_share_content_after_in_post', '__return_true' );

/** hide in post default: false */
add_filter( 'lana_fb_share_hide_in_post', '__return_false' );`

= Page type settings with filter: =

`/** content before in page default: false */
add_filter( 'lana_fb_share_content_before_in_page', '__return_false' );

/** content after in page default: true */
add_filter( 'lana_fb_share_content_after_in_page', '__return_true' );

/** hide in page default: false */
add_filter( 'lana_fb_share_hide_in_page', '__return_false' );`

= Page type and custom page template settings with filter: =

get_page_template_slug(), example: page-contact.php

`/** content before in page template default: none */
add_filter( 'lana_fb_share_content_before_in_{template_slug}', '__return_false' );
// or
add_filter( 'lana_fb_share_content_before_in_{template_slug}', '__return_true' );

/** content after in page template default: none */
add_filter( 'lana_fb_share_content_after_in_{template_slug}', '__return_false' );
// or
add_filter( 'lana_fb_share_content_after_in_{template_slug}', '__return_true' );

/** hide in page template default: false */
add_filter( 'lana_fb_share_hide_in_{template_slug}', '__return_false' );`

= Add show faces to shortcode: =

`/**
  * Lana Facebook Share
  * add 'show faces' to shortcode
  *
  * @param $atts
  * @param $layout
  *
  * @return mixed
  */
 function lana_fb_share_shortcode_add_show_faces( $atts, $layout ) {

 	/** only standard layout */
 	if ( $layout != 'standard' ) {
 		return $atts;
 	}

 	$atts['show_faces'] = 'true';
 	$atts['height']     = 60;

 	return $atts;
 }

 add_filter( 'lana_fb_share_shortcode_atts', 'lana_fb_share_shortcode_add_show_faces', 10, 2 );`

= Available shortcodes: =

`[lana_fb_share]` Facebook like and share button
`[lana_fb_hide]` Hide default Facebook like and share button


= Lana Blog =
[Lana Facebook Share](http://wp.lanaprojekt.hu/blog/wordpress-plugins/lana-facebook-share/)

== Installation ==

= Requires =
* WordPress at least 4.0
* PHP at least 5.3

= Instalation steps =

1. Upload the plugin files to the `/wp-content/plugins/lana-facebook-share` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress

== Frequently Asked Questions ==

Do you have questions or issues with Lana Facebook Share?
Use these support channels appropriately.

= Lana Blog =
[Support](http://wp.lanaprojekt.hu/blog/contact/)

= WordPress Forum =
[Support Forum](http://wordpress.org/support/plugin/lana-facebook-share)

== Screenshots ==

1. screenshot-1.jpg
1. screenshot-2.jpg

== Changelog ==

= 1.0.6 =
* bugfix shortcode height

= 1.0.5 =
* Add shortcode atts filter

= 1.0.4 =
* bugfix Lana Facebook Hide widget
* fix Plugin URI typo

= 1.0.3 =
* Tested in WordPress 4.7 (compatible)
* No change

= 1.0.2 =
* Add minimal settings page (button settings, post and page type settings)

= 1.0.1 =
* Bugfix content after share button in page template filter

= 1.0.0 =
* Added Lana Facebook Share
* Added Lana Facebook Hide widget

== Upgrade Notice ==

= 1.0.6 =
This version fixes shortcode height bug. Upgrade recommended.

= 1.0.5 =
This version added shortcode filter. Upgrade recommended.

= 1.0.4 =
This version fixes Lana Facebook Hide widget bug. Upgrade recommended.

= 1.0.3 =
Nothing has changed in this version. Tested in WordPress 4.7 and compatible.

= 1.0.2 =
This version added settings page. Upgrade recommended.

= 1.0.1 =
This version fixes content after share button in page template (slug) bug. Upgrade recommended.