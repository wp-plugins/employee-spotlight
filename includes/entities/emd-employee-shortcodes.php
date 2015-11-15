<?php
/**
 * Entity Related Shortcode Functions
 *
 * @package EMPSLIGHT_COM
 * @version 1.3.0
 * @since WPAS 4.0
 */
if (!defined('ABSPATH')) exit;
/**
 * Shortcode function
 *
 * @since WPAS 4.0
 * @param array $atts
 * @param array $args
 * @param string $form_name
 * @param int $pageno
 *
 * @return html
 */
function empslight_com_employee_circle_grid_set_shc($atts, $args = Array() , $form_name = '', $pageno = 1) {
	$fields = Array(
		'app' => 'empslight_com',
		'class' => 'emd_employee',
		'shc' => 'employee_circle_grid',
		'form' => $form_name,
		'has_pages' => true,
		'pageno' => $pageno,
		'pgn_class' => '',
		'theme' => 'na',
		'hier' => 0,
		'hier_type' => 'ul',
		'hier_depth' => - 1,
		'hier_class' => '',
		'has_json' => 0,
	);
	$args_default = array(
		'posts_per_page' => '12',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'filter' => ''
	);
	return emd_shc_get_layout_list($atts, $args, $args_default, $fields);
}
add_shortcode('employee_circle_grid', 'employee_circle_grid_list');
function employee_circle_grid_list($atts) {
	$show_shc = 1;
	if ($show_shc == 1) {
		wp_enqueue_script('jquery');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('jq-css');
		wp_enqueue_script('jquery-ui-button');
		wp_enqueue_style('employee-circle-grid-cdn');
		wp_enqueue_script('employee-circle-grid-js');
		add_action('wp_footer', 'empslight_com_enq_allview');
		$list = "<div class='emd-container'>";
		$list.= empslight_com_employee_circle_grid_set_shc($atts);
		$list.= "</div>";
	} else {
		$list = '<div class="alert alert-info not-authorized">You are not authorized to access this content.</div>';
	}
	return $list;
}
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode', 11);
