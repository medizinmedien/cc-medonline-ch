<?php
/*
Plugin Name:       Custom Code for medonline.ch
Plugin URI:        https://github.com/medizinmedien/cc-medonline-ch
Description:       A plugin to provide functionality specific for medonline.ch
Version:           0.1
Author:            Frank St&uuml;rzebecher
GitHub Plugin URI: https://github.com/medizinmedien/cc-medonline-ch
*/

if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * Protect posts and pages with Custom Field 'is_private' from public view.
 */
add_action( 'template_redirect', 'cc_medonline_ch_protect_a_post', 1 );
function cc_medonline_ch_protect_a_post() {
	global $post;
	$otat_protected = function_exists( 'is_otat_protected_post' ) && is_otat_protected_post();
	if ( ! is_user_logged_in() && ! empty( get_metadata( 'post', $post->ID, 'is_private', true ) ) && ! $otat_protected ) {
		auth_redirect();
	}
}

