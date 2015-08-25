<?php
/**
 * Enqueue Scripts Functions
 *
 * @package EMPSLIGHT_COM
 * @version 1.2.0
 * @since WPAS 4.0
 */
if (!defined('ABSPATH')) exit;
add_action('admin_enqueue_scripts', 'empslight_com_load_admin_enq');
/**
 * Enqueue style and js for each admin entity pages and settings
 *
 * @since WPAS 4.0
 * @param string $hook
 *
 */
function empslight_com_load_admin_enq($hook) {
	global $typenow;
	$dir_url = EMPSLIGHT_COM_PLUGIN_URL;
	if ($hook == 'edit-tags.php') {
		return;
	}
	if (isset($_GET['page']) && in_array($_GET['page'], Array(
		'empslight_com',
		'empslight_com_notify',
		'empslight_com_settings'
	))) {
		wp_enqueue_script('accordion');
		return;
	} else if (isset($_GET['page']) && in_array($_GET['page'], Array(
		'empslight_com_store',
		'empslight_com_designs',
		'empslight_com_support'
	))) {
		wp_enqueue_style('admin-tabs', $dir_url . 'assets/css/admin-store.css');
		return;
	}
	if (in_array($typenow, Array(
		'emd_employee'
	))) {
		$theme_changer_enq = 1;
		$datetime_enq = 0;
		$date_enq = 0;
		$sing_enq = 0;
		$tab_enq = 0;
		if ($hook == 'post.php' || $hook == 'post-new.php') {
			$unique_vars['msg'] = __('Please enter a unique value.', 'empslight-com');
			$unique_vars['reqtxt'] = __('required', 'empslight-com');
			$unique_vars['app_name'] = 'empslight_com';
			$ent_list = get_option('empslight_com_ent_list');
			if (!empty($ent_list[$typenow])) {
				$unique_vars['keys'] = $ent_list[$typenow]['unique_keys'];
				if (!empty($ent_list[$typenow]['req_blt'])) {
					$unique_vars['req_blt_tax'] = $ent_list[$typenow]['req_blt'];
				}
			}
			$tax_list = get_option('empslight_com_tax_list');
			if (!empty($tax_list[$typenow])) {
				foreach ($tax_list[$typenow] as $txn_name => $txn_val) {
					if ($txn_val['required'] == 1) {
						$unique_vars['req_blt_tax'][$txn_name] = Array(
							'hier' => $txn_val['hier'],
							'type' => $txn_val['type'],
							'label' => $txn_val['label'] . ' ' . __('Taxonomy', 'empslight-com')
						);
					}
				}
			}
			wp_enqueue_script('unique_validate-js', $dir_url . 'assets/js/unique_validate.js', array(
				'jquery',
				'jquery-validate'
			) , EMPSLIGHT_COM_VERSION, true);
			wp_localize_script("unique_validate-js", 'unique_vars', $unique_vars);
		} elseif ($hook == 'edit.php') {
			wp_enqueue_style('empslight-com-allview-css', EMPSLIGHT_COM_PLUGIN_URL . '/assets/css/allview.css');
		}
		if ($datetime_enq == 1) {
			wp_enqueue_script("jquery-ui-timepicker", $dir_url . 'assets/ext/emd-meta-box/js/jqueryui/jquery-ui-timepicker-addon.js', array(
				'jquery-ui-datepicker',
				'jquery-ui-slider'
			) , EMPSLIGHT_COM_VERSION, true);
			$tab_enq = 1;
		} elseif ($date_enq == 1) {
			wp_enqueue_script("jquery-ui-datepicker");
			$tab_enq = 1;
		}
	}
}
add_action('wp_enqueue_scripts', 'empslight_com_frontend_scripts');
/**
 * Enqueue style and js for each frontend entity pages and components
 *
 * @since WPAS 4.0
 *
 */
function empslight_com_frontend_scripts() {
	$dir_url = EMPSLIGHT_COM_PLUGIN_URL;
	$grid_vars = Array();
	$local_vars['ajax_url'] = admin_url('admin-ajax.php');
	$wpas_shc_list = get_option('empslight_com_shc_list');
	wp_register_style('recent-employees-css', EMPSLIGHT_COM_PLUGIN_URL . 'assets/css/recent-employees.css');
	wp_register_style('featured-employees-css', EMPSLIGHT_COM_PLUGIN_URL . 'assets/css/featured-employees.css');
	wp_register_script('recent-employees-js', EMPSLIGHT_COM_PLUGIN_URL . 'assets/js/recent-employees.js');
	wp_register_script('featured-employees-js', EMPSLIGHT_COM_PLUGIN_URL . 'assets/js/featured-employees.js');
	wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_register_style('employee-circle-grid-cdn', $dir_url . 'assets/css/view-employee-circle-grid.css');
	wp_register_style('single-employee-cdn', $dir_url . 'assets/css/view-single-employee.css');
	wp_register_script('employee-circle-grid-js', $dir_url . 'assets/js/employee-circle-grid.js');
	wp_register_style('employee-circle-grid-cdn', $dir_url . 'assets/css/view-employee-circle-grid.css');
	wp_register_script('employee-circle-grid-js', $dir_url . 'assets/js/employee-circle-grid.js');
	wp_register_style('empslight-com-allview-css', $dir_url . '/assets/css/allview.css');
	if (is_single() && get_post_type() == 'emd_employee') {
		wp_enqueue_script('jquery');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('single-employee-cdn');
		wp_enqueue_script('single-employee-cdn');
		wp_enqueue_style('empslight-com-allview-css');
		return;
	}
}
/**
 * Enqueue if allview css is not enqueued
 *
 * @since WPAS 4.5
 *
 */
function empslight_com_enq_allview() {
	if (!wp_style_is('empslight-com-allview-css', 'enqueued')) {
		wp_enqueue_style('empslight-com-allview-css');
	}
}
