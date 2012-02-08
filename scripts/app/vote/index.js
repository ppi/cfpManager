jQuery(document).ready(function($) {
	$( "#sortable" ).sortable({
		placeholder: "ui-state-highlight",
		handle: '.handle',
		update: function() {
			
		}
	});
	$( "#sortable" ).disableSelection();
})