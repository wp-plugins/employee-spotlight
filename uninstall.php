<?php
/**
 *  Uninstall Employee Spotlight
 *
 * Uninstalling deletes notifications and terms initializations
 *
 * @package EMPSLIGHT_COM
 * @version 1.2.0
 * @since WPAS 4.0
 */
if (!defined('WP_UNINSTALL_PLUGIN')) exit;
if (!current_user_can('activate_plugins')) return;
function empslight_com_uninstall() {
	//delete options
	$options_to_delete = Array(
		'empslight_com_notify_list',
		'empslight_com_ent_list',
		'empslight_com_attr_list',
		'empslight_com_shc_list',
		'empslight_com_tax_list',
		'empslight_com_rel_list',
		'empslight_com_license_key',
		'empslight_com_license_status',
		'empslight_com_comment_list',
		'empslight_com_access_views',
		'empslight_com_limitby_auth_caps',
		'empslight_com_limitby_caps',
		'empslight_com_has_limitby_cap',
		'empslight_com_setup_pages'
	);
	if (!empty($options_to_delete)) {
		foreach ($options_to_delete as $option) {
			delete_option($option);
		}
	}
	$emd_activated_plugins = get_option('emd_activated_plugins');
	if (!empty($emd_activated_plugins)) {
		$emd_activated_plugins = array_diff($emd_activated_plugins, Array(
			'empslight-com'
		));
		update_option('emd_activated_plugins', $emd_activated_plugins);
	}
}
if (is_multisite()) {
	global $wpdb;
	$blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
	if ($blogs) {
		foreach ($blogs as $blog) {
			switch_to_blog($blog['blog_id']);
			empslight_com_uninstall();
		}
		restore_current_blog();
	}
} else {
	empslight_com_uninstall();
}
