<?php
/*
Plugin Name: Export User Emails
Plugin URI: https://www.pickplugins.com
Description: Get all user email.
Version: 1.0.0
Text Domain: users-email
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


function export_user_emails($atts, $content = null ){

	$atts = shortcode_atts(
		array(
			'roles' => "subscriber",

		), $atts);

	$html = '';
	$roles = $atts['roles'];

	$roles = explode(',',$roles);

	$args = array('role__in'     => $roles);

	$all_users = get_users($args);

	foreach ($all_users as $user) {

		echo $user->user_email;
		echo '<br>';

	}


}

add_shortcode('export_user_emails','export_user_emails');