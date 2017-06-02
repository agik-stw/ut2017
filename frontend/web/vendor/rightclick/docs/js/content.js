/**
 * PopMenu Documentation
 * 
 * Scripts for Content Frame.
 * 
 * @author   Fajar Chandra
 * @since    2014.05.29
 */

$(function() {
	$('.code').before(
		'<div class="code-folder">Show/hide code</div>'
	);
	
	$(document).on('click', '.code-folder', function() {
		if($(this).next().is(':hidden'))
			$(this).next().slideDown('fast');
		else
			$(this).next().slideUp('fast');
	});
});