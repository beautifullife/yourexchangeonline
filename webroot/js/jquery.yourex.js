jQuery(document).ready(function(){

	jQuery("#search-form").submit(function(event){
		var search_form = jQuery(this);
		var action_search_form = search_form.attr('action');
		var get_input_search = jQuery('#search-input').val();
		if (get_input_search != '' && get_input_search != undefined) {
			search_form.attr('action', action_search_form + get_input_search);
		}
	});

});
