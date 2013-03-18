$(function(){
	$('[data-role="related"]').each(function(){
		var relatedTarget = $(this).parent().parent().find('#'+$(this).attr('data-target'));
		if($(this).attr('data-post') === $(relatedTarget).parent().parent().attr('id')){
			var relatedTargetPos = $(relatedTarget).position();
			$(this).css('top',relatedTargetPos.top);
		}
	});
});