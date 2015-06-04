<?php global $employee_circle_grid_count;
$ent_attrs = get_option('empslight_com_attr_list');
?>
<?php echo (($employee_circle_grid_count > 1 and ($employee_circle_grid_count % 2 == 0 or $employee_circle_grid_count % 3 == 0)) ? '
<div class="clearfix ' : ''); ?> <?php echo (($employee_circle_grid_count % 2 == 0 and $employee_circle_grid_count != 0) ? 'visible-sm-block' : ''); ?> <?php echo (($employee_circle_grid_count % 3 == 0 and $employee_circle_grid_count != 0) ? 'visible-md-block' : ''); ?> <?php echo (($employee_circle_grid_count % 4 == 0 and $employee_circle_grid_count != 0) ? 'visible-lg-block' : ''); ?> <?php echo (($employee_circle_grid_count > 1 and ($employee_circle_grid_count % 2 == 0 or $employee_circle_grid_count % 3 == 0)) ? '"></div>
' : ''); ?> 
<article class="col-md-3 col-sm-6 person">
    <div class="person-thumb in">
        <div class="person-img img-circle" data-backimg="<?php if (get_post_meta($post->ID, 'emd_employee_photo')) {
	$sval = get_post_meta($post->ID, 'emd_employee_photo');
	echo wp_get_attachment_url($sval[0]);
} ?>"></div>
        <div class="person-tag text-center">
            <a href="<?php echo get_permalink(); ?>" class="person-name"><?php echo get_the_title(); ?></a>
            <br>
            <span class="person-jobtitle">
                <small><?php echo esc_html(emd_mb_meta('emd_employee_jobtitle')); ?>
</small>
            </span>
        </div>
        <div class="person-link">
            <?php echo ((emd_mb_meta('emd_employee_email')) ? "
            <a class=\"social-icon email animate\" href=\"mailto:" . emd_mb_meta('emd_employee_email') . "\"><i class=\"fa fa-envelope fa-fw\"></i></a>
            " : ""); ?> 
            <span class="social">
                <?php echo ((emd_mb_meta('emd_employee_facebook')) ? "
                <a class=\"social-icon facebook animate\" href=\"" . emd_mb_meta('emd_employee_facebook') . "\"><i class=\"fa fa-facebook fa-fw\"></i></a>
                " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_twitter')) ? "
                <a class=\"social-icon twitter animate\" href=\"" . emd_mb_meta('emd_employee_twitter') . "\"><i class=\"fa fa-twitter fa-fw\"></i></a>
                " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_github')) ? "
                <a class=\"social-icon github animate\" href=\"" . emd_mb_meta('emd_employee_github') . "\"><i class=\"fa fa-github-alt fa-fw\"></i></a>
                " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_google')) ? "
                <a class=\"social-icon google-plus animate\" href=\"" . emd_mb_meta('emd_employee_google') . "\"><i class=\"fa fa-google-plus fa-fw\"></i></a>
                " : ""); ?> <?php echo ((emd_mb_meta('emd_employee_linkedin')) ? "
                <a class=\"social-icon linkedin animate\" href=\"" . emd_mb_meta('emd_employee_linkedin') . "\"><i class=\"fa fa-linkedin fa-fw\"></i></a>
                " : ""); ?> 
            </span>
            <a class="person-page animate" title="<?php _e('Go to the personal page of', 'empslight-com'); ?> <?php echo get_the_title(); ?>" href="<?php echo get_permalink(); ?>"><i class="fa fa-user fa-fw text-danger"></i></a>
        </div>
        <div class="panel-body hidden-xs hidden-sm"><?php echo $post->post_excerpt; ?></div>
    </article>