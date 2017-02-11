<?php
/**
 * Plugin Name: Lana Facebook Share
 * Plugin URI: http://wp.lanaprojekt.hu/blog/wordpress-plugins/lana-facebook-share/
 * Description: Facebook like and share button.
 * Version: 1.0.6
 * Author: Lana Design
 * Author URI: http://wp.lanaprojekt.hu/blog/
 */

defined( 'ABSPATH' ) or die();
define( 'LANA_FACEBOOK_SHARE_VERSION', '1.0.6' );

/**
 * Language
 * load
 */
load_plugin_textdomain( 'lana-facebook-share', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

/**
 * Plugin Settings link
 *
 * @param $links
 *
 * @return mixed
 */
function lana_facebook_share_plugin_settings_link( $links ) {
	$settings_link = '<a href="options-general.php?page=lana-facebook-share-settings.php">' . __( 'Settings', 'lana-facebook-share' ) . '</a>';
	array_unshift( $links, $settings_link );

	return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'lana_facebook_share_plugin_settings_link' );

/**
 * Add Lana Facebook Share Settings page
 * in Options page
 */
function lana_facebook_share_settings_menu() {
	add_options_page( __( 'Lana Facebook Share Settings', 'lana-facebook-share' ), __( 'Lana Facebook Share', 'lana-facebook-share' ), 'manage_options', 'lana-facebook-share-settings.php', 'lana_facebook_share_settings' );

	/** call register settings function */
	add_action( 'admin_init', 'lana_facebook_share_register_settings' );
}

add_action( 'admin_menu', 'lana_facebook_share_settings_menu' );

/**
 * Register settings
 */
function lana_facebook_share_register_settings() {
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_button_layout' );
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_button_share' );
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_content_before_in_post' );
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_content_after_in_post' );
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_content_before_in_page' );
	register_setting( 'lana-facebook-share-settings-group', 'lana_facebook_share_content_after_in_page' );
}

/**
 * Lana Facebook Share Settings page
 */
function lana_facebook_share_settings() {
	?>
    <div class="wrap">
        <h2><?php _e( 'Lana Facebook Share Settings', 'lana-facebook-share' ); ?></h2>

        <form method="post" action="options.php">
			<?php settings_fields( 'lana-facebook-share-settings-group' ); ?>

            <h2 class="title"><?php _e( 'Button Settings', 'lana-facebook-share' ); ?></h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_button_layout">
							<?php _e( 'Layout', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_button_layout" id="lana_facebook_share_button_layout">
                            <option value="standard"
								<?php selected( get_option( 'lana_facebook_share_button_layout', 'button_count' ), 'standard' ); ?>>
								<?php _e( 'standard', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="box_count"
								<?php selected( get_option( 'lana_facebook_share_button_layout', 'button_count' ), 'box_count' ); ?>>
								<?php _e( 'box count', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="button_count"
								<?php selected( get_option( 'lana_facebook_share_button_layout', 'button_count' ), 'button_count' ); ?>>
								<?php _e( 'button count', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="button"
								<?php selected( get_option( 'lana_facebook_share_button_layout', 'button_count' ), 'button' ); ?>>
								<?php _e( 'button', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_button_share">
							<?php _e( 'Share Button', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_button_share" id="lana_facebook_share_button_share">
                            <option value="false"
								<?php selected( get_option( 'lana_facebook_share_button_share', 'true' ), 'false' ); ?>>
								<?php _e( 'Disabled', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="true"
								<?php selected( get_option( 'lana_facebook_share_button_share', 'true' ), 'true' ); ?>>
								<?php _e( 'Enabled', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
            </table>

            <h2 class="title"><?php _e( 'Post type Settings', 'lana-facebook-share' ); ?></h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_content_before_in_post">
							<?php _e( 'Content Before (in post)', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_content_before_in_post"
                                id="lana_facebook_share_content_before_in_post">
                            <option value="0"
								<?php selected( get_option( 'lana_facebook_share_content_before_in_post', '0' ), '0' ); ?>>
								<?php _e( 'Disabled', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="1"
								<?php selected( get_option( 'lana_facebook_share_content_before_in_post', '0' ), '1' ); ?>>
								<?php _e( 'Enabled', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_content_after_in_post">
							<?php _e( 'Content After (in post)', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_content_after_in_post"
                                id="lana_facebook_share_content_after_in_post">
                            <option value="0"
								<?php selected( get_option( 'lana_facebook_share_content_after_in_post', '1' ), '0' ); ?>>
								<?php _e( 'Disabled', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="1"
								<?php selected( get_option( 'lana_facebook_share_content_after_in_post', '1' ), '1' ); ?>>
								<?php _e( 'Enabled', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
            </table>

            <h2 class="title"><?php _e( 'Page type Settings', 'lana-facebook-share' ); ?></h2>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_content_before_in_page">
							<?php _e( 'Content Before (in page)', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_content_before_in_page"
                                id="lana_facebook_share_content_before_in_page">
                            <option value="0"
								<?php selected( get_option( 'lana_facebook_share_content_before_in_page', '0' ), '0' ); ?>>
								<?php _e( 'Disabled', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="1"
								<?php selected( get_option( 'lana_facebook_share_content_before_in_page', '0' ), '1' ); ?>>
								<?php _e( 'Enabled', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="lana_facebook_share_content_after_in_page">
							<?php _e( 'Content After (in page)', 'lana-facebook-share' ); ?>
                        </label>
                    </th>
                    <td>
                        <select name="lana_facebook_share_content_after_in_page"
                                id="lana_facebook_share_content_after_in_page">
                            <option value="0"
								<?php selected( get_option( 'lana_facebook_share_content_after_in_page', '1' ), '0' ); ?>>
								<?php _e( 'Disabled', 'lana-facebook-share' ); ?>
                            </option>
                            <option value="1"
								<?php selected( get_option( 'lana_facebook_share_content_after_in_page', '1' ), '1' ); ?>>
								<?php _e( 'Enabled', 'lana-facebook-share' ); ?>
                            </option>
                        </select>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" class="button-primary"
                       value="<?php _e( 'Save Changes', 'lana-facebook-share' ) ?>"/>
            </p>

        </form>
    </div>
	<?php
}

/**
 * Lana Facebook Share
 * option convert to boolean wp function
 *
 * @param $option
 *
 * @return string
 */
function lana_facebook_share_to_boolean_wp_function( $option ) {

	$option = filter_var( $option, FILTER_VALIDATE_BOOLEAN );

	if ( $option == true ) {
		return '__return_true';
	}

	if ( $option == false ) {
		return '__return_false';
	}

	return '';
}

/**
 * Lana Facebook Share
 * settings add to filter
 */
function lana_facebook_share_settings_filter() {

	/**
	 * Post type settings
	 */
	$content_before_in_post = get_option( 'lana_facebook_share_content_before_in_post', '0' );
	if ( lana_facebook_share_to_boolean_wp_function( $content_before_in_post ) != '' ) {
		add_filter( 'lana_fb_share_content_before_in_post', lana_facebook_share_to_boolean_wp_function( $content_before_in_post ), 1 );
	}

	$content_after_in_post = get_option( 'lana_facebook_share_content_after_in_post', '1' );
	if ( lana_facebook_share_to_boolean_wp_function( $content_after_in_post ) != '' ) {
		add_filter( 'lana_fb_share_content_after_in_post', lana_facebook_share_to_boolean_wp_function( $content_after_in_post ), 1 );
	}

	/**
	 * Page type settings
	 */
	$content_before_in_page = get_option( 'lana_facebook_share_content_before_in_page', '0' );
	if ( lana_facebook_share_to_boolean_wp_function( $content_before_in_page ) != '' ) {
		add_filter( 'lana_fb_share_content_before_in_page', lana_facebook_share_to_boolean_wp_function( $content_before_in_page ), 1 );
	}

	$content_after_in_page = get_option( 'lana_facebook_share_content_after_in_page', '1' );
	if ( lana_facebook_share_to_boolean_wp_function( $content_after_in_page ) != '' ) {
		add_filter( 'lana_fb_share_content_after_in_page', lana_facebook_share_to_boolean_wp_function( $content_after_in_page ), 1 );
	}
}

add_action( 'init', 'lana_facebook_share_settings_filter', 1 );

/**
 * Lana Facebook Share
 * add facebook like button to content
 *
 * @param $content
 *
 * @return string
 */
function lana_facebook_share_add_button_to_content( $content ) {

	global $post;

	if ( ! is_singular() && ! is_home() ) {
		return $content;
	}

	if ( preg_match_all( '/' . get_shortcode_regex( array( 'lana_fb_hide' ) ) . '/s', $content, $container_matches ) == true ) {
		return str_replace( '[lana_fb_hide]', '', $content );
	}

	/**
	 * Filter post
	 */
	if ( 'post' == $post->post_type ) {

		add_filter( 'lana_fb_share_content_before', lana_facebook_share_to_boolean_wp_function( apply_filters( 'lana_fb_share_content_before_in_post', false ) ) );
		add_filter( 'lana_fb_share_content_after', lana_facebook_share_to_boolean_wp_function( apply_filters( 'lana_fb_share_content_after_in_post', true ) ) );

		if ( apply_filters( 'lana_fb_share_content_hide_in_post', false ) ) {
			add_filter( 'lana_fb_share_content_before', '__return_false' );
			add_filter( 'lana_fb_share_content_after', '__return_false' );
		}
	}

	/**
	 * Filter page
	 */
	if ( 'page' == $post->post_type ) {

		add_filter( 'lana_fb_share_content_before', lana_facebook_share_to_boolean_wp_function( apply_filters( 'lana_fb_share_content_before_in_page', false ) ) );
		add_filter( 'lana_fb_share_content_after', lana_facebook_share_to_boolean_wp_function( apply_filters( 'lana_fb_share_content_after_in_page', true ) ) );

		if ( apply_filters( 'lana_fb_share_content_hide_in_page', false ) ) {
			add_filter( 'lana_fb_share_content_before', '__return_false' );
			add_filter( 'lana_fb_share_content_after', '__return_false' );
		}

		if ( get_page_template_slug() ) {

			$content_before_in_page_template_slug = apply_filters( 'lana_fb_share_content_before_in_' . get_page_template_slug(), '' );
			if ( $content_before_in_page_template_slug != '' && lana_facebook_share_to_boolean_wp_function( $content_before_in_page_template_slug ) != '' ) {
				add_filter( 'lana_fb_share_content_before', lana_facebook_share_to_boolean_wp_function( $content_before_in_page_template_slug ), 1 );
			}

			$content_after_in_page_template_slug = apply_filters( 'lana_fb_share_content_after_in_' . get_page_template_slug(), '' );
			if ( $content_after_in_page_template_slug != '' && lana_facebook_share_to_boolean_wp_function( $content_after_in_page_template_slug ) != '' ) {
				add_filter( 'lana_fb_share_content_after', lana_facebook_share_to_boolean_wp_function( $content_after_in_page_template_slug ), 1 );
			}

			if ( apply_filters( 'lana_fb_share_content_hide_in_' . get_page_template_slug(), false ) ) {
				add_filter( 'lana_fb_share_content_before', '__return_false' );
				add_filter( 'lana_fb_share_content_after', '__return_false' );
			}
		}
	}

	/**
	 * Add fb share
	 * before content
	 */
	if ( apply_filters( 'lana_fb_share_content_before', false ) ) {
		$content = '[lana_fb_share]' . $content;
	}

	/**
	 * Add fb share
	 * after content
	 */
	if ( apply_filters( 'lana_fb_share_content_after', true ) ) {
		$content = $content . '[lana_fb_share]';
	}

	return $content;
}

add_filter( 'the_content', 'lana_facebook_share_add_button_to_content' );

/**
 * Lana Facebook Share Button Shortcode
 *
 * @param $atts
 *
 * @return string
 */
function lana_fb_share_shortcode( $atts ) {
	global $post;

	$layout = get_option( 'lana_facebook_share_button_layout', 'button_count' );
	$share  = get_option( 'lana_facebook_share_button_share', 'true' );

	$height = 65;

	if ( $layout == 'standard' ) {
		$height = 35;
	}

	if ( $layout == 'box_count' ) {
		$height = 65;

		if ( $share == 'true' ) {
			$height = 85;
		}
	}

	if ( $layout == 'button_count' ) {
		$height = 20;
	}

	if ( $layout == 'button' ) {
		$height = 20;
	}

	$atts = apply_filters( 'lana_fb_share_shortcode_atts', $atts, $layout );

	$a = shortcode_atts( array(
		'href'       => get_the_permalink( $post ),
		'layout'     => $layout,
		'action'     => 'like',
		'share'      => $share,
		'size'       => 'small',
		'height'     => $height,
		'show_faces' => 'false'
	), $atts );

	$output = '<iframe class="lana-facebook-share" src="https://www.facebook.com/plugins/like.php?' . http_build_query( $a ) . '" width="100%" height="' . $a['height'] . 'px" style="border:none;overflow:hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';

	return $output;
}

add_shortcode( 'lana_fb_share', 'lana_fb_share_shortcode' );

/**
 * Lana Facebook Share Button Hide Shortcode
 * @return string
 */
function lana_fb_hide_shortcode() {
	return '[lana_fb_hide]';
}

add_shortcode( 'lana_fb_hide', 'lana_fb_hide_shortcode' );

/**
 * Init Widget
 */
add_action( 'widgets_init', function () {
	include 'includes/class-lana-fb-hide-widget.php';
	register_widget( 'Lana_Fb_Hide_Widget' );
} );
