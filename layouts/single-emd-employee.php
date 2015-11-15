<?php $real_post = $post;
$ent_attrs = get_option('empslight_com_attr_list');
?>
<div style="position:relative" class="emd-container">
<div class="mainDetails row">
    <div class="person-photo col-md-4">
        <img alt="<?php echo get_the_title(); ?>" class="img-circle" src="<?php if (get_post_meta($post->ID, 'emd_employee_photo')) {
	$sval = get_post_meta($post->ID, 'emd_employee_photo');
	echo wp_get_attachment_url($sval[0]);
} ?>">
    </div>
    <div class="person-detail col-md-8">
        <div class="empjobtitle"><strong class="emptitle"><?php echo esc_html(emd_mb_meta('emd_employee_jobtitle')); ?>
</strong></div>
        <div class="tax-groups"> Groups: <?php echo get_the_term_list(get_the_ID() , 'groups', '', ' ', ''); ?> </div>
        <div class="tax-office-locations"> Location: <?php echo get_the_term_list(get_the_ID() , 'office_locations', '', ' ', ''); ?> </div>
        <div class="person-address">
            <?php echo ((emd_mb_meta('emd_employee_phone')) ? "
            <div class=\"person-phone\"><i class=\"fa fa-phone fa-fw\"></i>" . emd_mb_meta('emd_employee_phone') . "</div>
            " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_mobile')) ? "
            <div class=\"person-mobile\"><i class=\"fa fa-mobile fa-fw\"></i> " . emd_mb_meta('emd_employee_mobile') . "</div>
            " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_primary_address')) ? "
            <div class=\"person-priaddress\"><i class=\"fa fa-map-marker fa-fw\"></i>" . emd_mb_meta('emd_employee_primary_address') . "</div>
            " : ""); ?> 
        </div>
        <div class="person-link">
            <?php echo ((emd_mb_meta('emd_employee_email')) ? "<a class=\"social-icon email animate fa fa-envelope fa-fw\" href=\"mailto:" . emd_mb_meta('emd_employee_email') . "\"></a>" : ""); ?> 
            <span class="social"><?php echo ((emd_mb_meta('emd_employee_facebook')) ? "<a class=\"social-icon facebook animate fa fa-facebook fa-fw\" href=\"" . emd_mb_meta('emd_employee_facebook') . "\"></a>" : ""); ?> <?php echo ((emd_mb_meta('emd_employee_twitter')) ? "<a class=\"social-icon twitter animate fa fa-twitter fa-fw\" href=\"" . emd_mb_meta('emd_employee_twitter') . "\"></a>" : ""); ?> <?php echo ((emd_mb_meta('emd_employee_github')) ? "<a class=\"social-icon github animate fa fa-github-alt fa-fw\" href=\"" . emd_mb_meta('emd_employee_github') . "\"></a>" : ""); ?> <?php echo ((emd_mb_meta('emd_employee_google')) ? "<a class=\"social-icon google-plus animate fa fa-google-plus fa-fw\" href=\"" . emd_mb_meta('emd_employee_google') . "\"></a>" : ""); ?> <?php echo ((emd_mb_meta('emd_employee_linkedin')) ? "<a class=\"social-icon linkedin animate fa fa-linkedin fa-fw\" href=\"" . emd_mb_meta('emd_employee_linkedin') . "\"></a>" : ""); ?> </span>
        </div>
    </div>
</div>
<div class="emp-content"> <?php echo $post->post_content; ?> </div>
</div><!--container-end-->