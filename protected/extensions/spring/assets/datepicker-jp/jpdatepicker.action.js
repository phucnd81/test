/**
 * action for spring.widgets.DatePickerJP
 */
function changeJPDateEra(id, url){
	changeJPDate(id, url);
}
/**
 * action for spring.widgets.DatePickerJP
 * @param id
 */
function changeJPDateView(id, url){
	changeJPDate(id, url);
}
function changeJPDate(id, url_action){
	var d_era = $("#"+id + "_era");
	var d_date = $("#"+id );
	var d_view = $("#"+id + "_view");
	var search_data = {
			'Calendar[era]'  : d_era.val(),
			'Calendar[date]' : d_date.val(),
			'Calendar[view]' : d_view.val()
	};
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: url_action,
		data: search_data,
		success: function(response){
			if(response.data){
				d_date.val(response.data);
			}
			if(response.era){
				d_era.val(response.era);
			}
			if(response.view){
				d_view.val(response.view);
			}
		},
		cache: false
	});
}