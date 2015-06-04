<?php
/**
 * Settings Glossary Functions
 *
 * @package EMPSLIGHT_COM
 * @version 1.1.0
 * @since WPAS 4.0
 */
if (!defined('ABSPATH')) exit;
add_action('empslight_com_settings_glossary', 'empslight_com_settings_glossary');
/**
 * Display glossary information
 * @since WPAS 4.0
 *
 * @return html
 */
function empslight_com_settings_glossary() {
	global $title;
?>
<div class="wrap">
<h2><?php echo $title; ?></h2>
<p><?php _e('Employee Spotlight displays photo, bio, and contact information of your employees, founders, team or just yourself. Each employee has its own page.', 'empslight-com'); ?></p>
<p><?php _e('The below are the definitions of entities, attributes, and terms included in Employee Spotlight.', 'empslight-com'); ?></p>
<div id="glossary" class="accordion-container">
<ul class="outer-border">
<li id="emd_employee" class="control-section accordion-section">
<h3 class="accordion-section-title hndle" tabindex="1"><?php _e('Employees', 'empslight-com'); ?></h3>
<div class="accordion-section-content">
<div class="inside">
<table class="form-table"><p class"lead"><?php _e('Employees are human resources that work for your organization. Employees can be identified as staff, team members, founders, or contractors.', 'empslight-com'); ?></p><tr>
<th><?php _e('Featured', 'empslight-com'); ?></th>
<td><?php _e('Sets employee as featured which can be used to select employees in available views using Visual Shortcode Builder and Featured employee widget. Featured does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Photo', 'empslight-com'); ?></th>
<td><?php _e('Photo of the employee. 250x250 is the preferred size. Photo does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Job Title', 'empslight-com'); ?></th>
<td><?php _e(' Job Title does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Primary Address', 'empslight-com'); ?></th>
<td><?php _e(' Primary Address does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Phone', 'empslight-com'); ?></th>
<td><?php _e(' Phone is filterable in the admin area. Phone does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Mobile', 'empslight-com'); ?></th>
<td><?php _e(' Mobile is filterable in the admin area. Mobile does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Email', 'empslight-com'); ?></th>
<td><?php _e(' Email is a required field. Being a unique identifier, it uniquely distinguishes each instance of Employee entity. Email does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Facebook', 'empslight-com'); ?></th>
<td><?php _e(' Facebook does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Google+', 'empslight-com'); ?></th>
<td><?php _e(' Google+ does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Twitter', 'empslight-com'); ?></th>
<td><?php _e(' Twitter does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Linkedin', 'empslight-com'); ?></th>
<td><?php _e(' Linkedin does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Github', 'empslight-com'); ?></th>
<td><?php _e(' Github is filterable in the admin area. Github does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Bio', 'empslight-com'); ?></th>
<td><?php _e(' Bio does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Full Name', 'empslight-com'); ?></th>
<td><?php _e(' Full Name is a required field. Full Name is filterable in the admin area. Full Name does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Excerpt', 'empslight-com'); ?></th>
<td><?php _e(' Excerpt does not have a default value. ', 'empslight-com'); ?></td>
</tr><tr>
<th><?php _e('Group', 'empslight-com'); ?></th>

<td><?php _e(' Group accepts multiple values like tags', 'empslight-com'); ?>. <?php _e('Group does not have a default value', 'empslight-com'); ?>.<div class="taxdef-block"><p><?php _e('There are no preset values for <b>Group:</b>', 'empslight-com'); ?></p></div></td>
</tr>
<tr>
<th><?php _e('Location', 'empslight-com'); ?></th>

<td><?php _e(' Location accepts multiple values like tags', 'empslight-com'); ?>. <?php _e('Location does not have a default value', 'empslight-com'); ?>.<div class="taxdef-block"><p><?php _e('There are no preset values for <b>Location:</b>', 'empslight-com'); ?></p></div></td>
</tr>
</table>
</div>
</div>
</li>
</ul>
</div>
</div>
<?php
}
