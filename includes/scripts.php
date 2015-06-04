<?php
/**
 * Enqueue Scripts Functions
 *
 * @package EMPSLIGHT_COM
 * @version 1.1.0
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
	if ($hook == 'edit-tags.php') {
		return;
	}
	if ($hook == 'toplevel_page_empslight_com' || $hook == 'spotlight_page_empslight_com_notify' || $hook == 'spotlight_page_empslight_com_settings') {
		wp_enqueue_script('accordion');
		return;
	} else if (in_array($hook, Array(
		'spotlight_page_empslight_com_store',
		'spotlight_page_empslight_com_designs',
		'spotlight_page_empslight_com_support'
	))) {
		wp_enqueue_style('admin-tabs', EMPSLIGHT_COM_PLUGIN_URL . 'assets/css/admin-store.css');
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
			wp_enqueue_script('unique_validate-js', EMPSLIGHT_COM_PLUGIN_URL . 'assets/js/unique_validate.js', array(
				'jquery',
				'jquery-validate'
			) , EMPSLIGHT_COM_VERSION, true);
			wp_localize_script("unique_validate-js", 'unique_vars', $unique_vars);
		}
		if ($datetime_enq == 1) {
			wp_enqueue_script("jquery-ui-timepicker", EMPSLIGHT_COM_PLUGIN_URL . 'assets/ext/emd-meta-box/js/jqueryui/jquery-ui-timepicker-addon.js', array(
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
	if (is_page()) {
		$grid_vars = Array();
		$local_vars['ajax_url'] = admin_url('admin-ajax.php');
		$wpas_shc_list = get_option('empslight_com_shc_list');
		wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
		wp_register_style('employee-circle-grid-cdn', $dir_url . 'assets/css/view-employee-circle-grid.css');
		wp_register_script('employee-circle-grid-js', $dir_url . 'assets/js/employee-circle-grid.js');
		wp_register_style('allview-css', $dir_url . '/assets/css/allview.css');
		return;
	}
	if (is_single() && get_post_type() == 'emd_employee') {
		wp_enqueue_script('jquery');
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
		wp_enqueue_style('single-employee-cdn', $dir_url . 'assets/css/view-single-employee.css');
		wp_enqueue_style('allview-css', $dir_url . '/assets/css/allview.css');
		return;
	}
}
