jQuery( document ).ready( function ( $ )
{
	var $form = $( '#post' );
	$form.calx({'ajaxUrl': ajaxurl + '?action=emd_calc_formula'});
});
