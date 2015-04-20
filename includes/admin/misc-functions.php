<?php
/**
 * Misc Admin Functions
 *
 * @package EMPSLIGHT_COM
 * @version 1.0.0
 * @since WPAS 4.0
 */
if (!defined('ABSPATH')) exit;
add_action('edit_form_advanced', 'empslight_com_force_post_builtin');
/**
 * Add required js check for builtin fields and taxonomies
 *
 * @since WPAS 4.0
 *
 * @return js
 */
function empslight_com_force_post_builtin() {
	$post = get_post();
	if (in_array($post->post_type, Array(
		'emd_employee'
	))) { ?>
   <script type='text/javascript'>
       jQuery('#publish').click(function(){
           var msg = [];
           <?php if (in_array($post->post_type, Array(
			'emd_employee'
		))) { ?>
   var title = jQuery('[id^="titlediv"]').find('#title');
   if(title.val().length < 1) {
       jQuery('#title').addClass('error');
       msg.push('<?php _e('Title', 'empslight-com'); ?>');
   }
<?php
		} ?>
           
           
           
           if(msg.length > 0){
              jQuery('#publish').removeClass('button-primary-disabled');
              jQuery('#ajax-loading').attr( 'style','');
              jQuery('#post').siblings('#message').remove();
              jQuery('#post').before('<div id="message" class="error"><p>'+msg.join(', ')+' <?php _e('required', 'empslight-com'); ?>.</p></div>');
              return false; 
           }
       }); 
    </script>
<?php
	}
}
