<?php
/**
 * Entity Widget Classes
 *
 * @package EMPSLIGHT_COM
 * @version 1.3.0
 * @since WPAS 4.0
 */
if (!defined('ABSPATH')) exit;
/**
 * Entity widget class extends Emd_Widget class
 *
 * @since WPAS 4.0
 */
class empslight_com_recent_employees_widget extends Emd_Widget {
	public $title;
	public $text_domain = 'empslight-com';
	public $class_label;
	public $class = 'emd_employee';
	public $type = 'entity';
	public $has_pages = false;
	public $css_label = 'recent-members';
	public $id = 'empslight_com_recent_employees_widget';
	public $query_args = array(
		'post_type' => 'emd_employee',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'context' => 'empslight_com_recent_employees_widget',
	);
	public $filter = '';
	public $header = '';
	public $footer = '';
	/**
	 * Instantiate entity widget class with params
	 *
	 * @since WPAS 4.0
	 */
	public function __construct() {
		parent::__construct($this->id, __('Recent Members', 'empslight-com') , __('Employees', 'empslight-com') , __('The most recent employees', 'empslight-com'));
	}
	/**
	 * Get header and footer for layout
	 *
	 * @since WPAS 4.6
	 */
	protected function get_header_footer() {
		$this->header = '';
		$this->footer = '';
	}
	/**
	 * Enqueue css and js for widget
	 *
	 * @since WPAS 4.5
	 */
	protected function enqueue_scripts() {
		if (is_active_widget(false, false, $this->id_base) && !is_admin()) {
			wp_enqueue_script('jquery');
			wp_enqueue_style('recent-employees-css');
			wp_enqueue_script('recent-employees-js');
		}
	}
	/**
	 * Returns widget layout
	 *
	 * @since WPAS 4.0
	 */
	public static function layout() {
		global $post;
		$ent_attrs = get_option('empslight_com_attr_list');
		$layout = "<div class=\"widget-thumb\">
<div class=\"person-img\" data-backimg=\"";
		if (get_post_meta($post->ID, 'emd_employee_photo')) {
			$sval = get_post_meta($post->ID, 'emd_employee_photo');
			$layout.= wp_get_attachment_url($sval[0]);
		}
		$layout.= "\"> </div>
<a href=\"" . get_permalink() . "\" class=\"person-name\">" . get_the_title() . "</a>
</div>";
		return $layout;
	}
}
/**
 * Entity widget class extends Emd_Widget class
 *
 * @since WPAS 4.0
 */
class empslight_com_featured_employees_widget extends Emd_Widget {
	public $title;
	public $text_domain = 'empslight-com';
	public $class_label;
	public $class = 'emd_employee';
	public $type = 'entity';
	public $has_pages = false;
	public $css_label = 'featured-employees';
	public $id = 'empslight_com_featured_employees_widget';
	public $query_args = array(
		'post_type' => 'emd_employee',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'context' => 'empslight_com_featured_employees_widget',
	);
	public $filter = 'attr::emd_employee_featured::is::1';
	public $header = '';
	public $footer = '';
	/**
	 * Instantiate entity widget class with params
	 *
	 * @since WPAS 4.0
	 */
	public function __construct() {
		parent::__construct($this->id, __('Featured Employees', 'empslight-com') , __('Employees', 'empslight-com') , __('The most recent employees', 'empslight-com'));
	}
	/**
	 * Get header and footer for layout
	 *
	 * @since WPAS 4.6
	 */
	protected function get_header_footer() {
		$this->header = '';
		$this->footer = '';
	}
	/**
	 * Enqueue css and js for widget
	 *
	 * @since WPAS 4.5
	 */
	protected function enqueue_scripts() {
		if (is_active_widget(false, false, $this->id_base) && !is_admin()) {
			wp_enqueue_script('jquery');
			wp_enqueue_style('featured-employees-css');
			wp_enqueue_script('featured-employees-js');
		}
	}
	/**
	 * Returns widget layout
	 *
	 * @since WPAS 4.0
	 */
	public static function layout() {
		global $post;
		$ent_attrs = get_option('empslight_com_attr_list');
		$layout = "<div class=\"widget-thumb\">
<div class=\"person-img\" data-backimg=\"";
		if (get_post_meta($post->ID, 'emd_employee_photo')) {
			$sval = get_post_meta($post->ID, 'emd_employee_photo');
			$layout.= wp_get_attachment_url($sval[0]);
		}
		$layout.= "\"> </div>
<a href=\"" . get_permalink() . "\" class=\"person-name\">" . get_the_title() . "</a>
</div>";
		return $layout;
	}
}
$access_views = get_option('empslight_com_access_views', Array());
if (empty($access_views['widgets']) || (!empty($access_views['widgets']) && in_array('recent_employees', $access_views['widgets']) && current_user_can('view_recent_employees'))) {
	register_widget('empslight_com_recent_employees_widget');
}
if (empty($access_views['widgets']) || (!empty($access_views['widgets']) && in_array('featured_employees', $access_views['widgets']) && current_user_can('view_featured_employees'))) {
	register_widget('empslight_com_featured_employees_widget');
}
